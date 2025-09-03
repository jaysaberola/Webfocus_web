<?php

namespace App\Http\Controllers\Cms;

use App\Models\JobPortal;
use App\Models\ApplicantList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class JobsController extends Controller
{
    public function show($id = null)
    {
        $baseUrl = rtrim(config('app.url'), '/');
        $urlPrefix = config('app.url_prefix', '');
        $imageWidth = config('app.image_display_width', 300);
        $imageHeight = config('app.image_display_height', 180);

        if ($id) {
            $job = JobPortal::with('images')->findOrFail($id);
            $imagePath = $job->images->first() ? $job->images->first()->image_path : null;
            $imageUrl = $imagePath ? url('/storage/' . $imagePath) : url('/theme/images/jobs/no-image.jpg');
            $imageExists = $imagePath ? Storage::disk('public')->exists($imagePath) : false;
            $imageExtension = $imagePath ? pathinfo($imagePath, PATHINFO_EXTENSION) : 'none';
            $imageHttpStatus = $imagePath ? Http::get($imageUrl)->status() : 'N/A';
            Log::debug('Single Job Loaded', [
                'job_id' => $job->id,
                'job_name' => $job->name,
                'images_count' => $job->images->count(),
                'image_path' => $imagePath ?: 'none',
                'image_url' => $imageUrl,
                'image_extension' => $imageExtension,
                'file_exists' => $imageExists ? 'yes' : 'no',
                'image_http_status' => $imageHttpStatus,
                'storage_path' => storage_path('app/public/' . ($imagePath ?: '')),
                'base_url' => $baseUrl,
                'url_prefix' => $urlPrefix,
                'image_width' => $imageWidth,
                'image_height' => $imageHeight
            ]);
            $jobPortals = JobPortal::with('images')->paginate(6); // Changed to 5 per page
            $page = new \App\Models\Page();
            $page->name = $job->name;
            $breadcrumb = $this->breadcrumb($page, $id);
            return view('theme.pages.job-details', compact('job', 'jobPortals', 'breadcrumb', 'page', 'imageWidth', 'imageHeight'));
        } else {
            $query = JobPortal::with('images');
            $type = request()->input('type');
            $criteria = request()->input('keyword');
            $totalSearchedJobs = 0;

            if ($type === 'searchbox' && $criteria) {
                $query->where('name', 'like', "%{$criteria}%")
                      ->orWhere('description', 'like', "%{$criteria}%");
                $totalSearchedJobs = $query->count();
            }

            $jobPortals = $query->paginate(6); // Changed to 5 per page
            $sampleImage = $jobPortals->first() && $jobPortals->first()->images->first()
                ? $jobPortals->first()->images->first()->image_path
                : null;
            $sampleUrl = $sampleImage ? url('/storage/' . $sampleImage) : 'none';
            $sampleExists = $sampleImage ? Storage::disk('public')->exists($sampleImage) : false;
            $sampleExtension = $sampleImage ? pathinfo($sampleImage, PATHINFO_EXTENSION) : 'none';
            $sampleHttpStatus = $sampleImage ? Http::get($sampleUrl)->status() : 'N/A';
            Log::debug('Job Portals Loaded', [
                'job_count' => $jobPortals->count(),
                'images_loaded' => $jobPortals->pluck('images')->flatten()->count(),
                'sample_image' => $sampleImage ?: 'none',
                'sample_url' => $sampleUrl,
                'file_exists' => $sampleExists ? 'yes' : 'no',
                'sample_extension' => $sampleExtension,
                'sample_http_status' => $sampleHttpStatus,
                'storage_path' => $sampleImage ? storage_path('app/public/' . $sampleImage) : 'none',
                'base_url' => $baseUrl,
                'url_prefix' => $urlPrefix,
                'image_width' => $imageWidth,
                'image_height' => $imageHeight
            ]);
            $page = new \App\Models\Page();
            $page->name = 'Jobs List';
            $breadcrumb = $this->breadcrumb($page, $id);
            return view('theme.pages.jobs-list', compact('jobPortals', 'type', 'criteria', 'totalSearchedJobs', 'breadcrumb', 'page', 'imageWidth', 'imageHeight'));
        }
    }

    public function apply(Request $request)
    {
        Log::info('Apply Request Received', $request->all());
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'bday' => 'required|date',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
                'job_id' => 'required|exists:job_portals,id',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Failed', ['errors' => $e->errors()]);
            return response()->json(['message' => 'Validation failed. Please check your input.'], 422);
        }
        $resumePath = null;
        if ($request->hasFile('resume')) {
            try {
                $fileName = time() . '.' . $request->resume->extension();
                $request->file('resume')->storeAs('public/applications', $fileName);
                $resumePath = 'applications/' . $fileName;
            } catch (\Exception $e) {
                Log::error('File Upload Failed', ['error' => $e->getMessage()]);
                return response()->json(['message' => 'Failed to upload resume. Please try again.'], 500);
            }
        }
        try {
            $applicant = ApplicantList::create([
                'name' => $request->name,
                'bday' => $request->bday,
                'resume_path' => $resumePath,
                'job_id' => $request->job_id,
            ]);
            Log::info('Applicant Created', ['applicant_id' => $applicant->id, 'job_id' => $applicant->job_id]);
        } catch (\Exception $e) {
            Log::error('Database Insertion Failed', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to save application. Please try again.'], 500);
        }
        return response()->json(['message' => 'Application submitted successfully!'], 200);
    }

    protected function breadcrumb($page, $id = null)
    {
        return [
            'Home' => url('/'),
            $page->name => $id ? route('jobs.show', $id) : route('jobs.index')
        ];
    }
}
