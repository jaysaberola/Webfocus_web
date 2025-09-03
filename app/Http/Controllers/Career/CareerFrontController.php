<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ApplyNowRequest;


use Facades\App\Helpers\FileHelper;
use App\Helpers\Setting;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationMail;

use App\Models\{Page, Career, CareerApplicant, CareerCategory};

class CareerFrontController extends Controller
{
    public function job_list()
    {
        $page = new Page;
        $page->name = 'Careers';

        $breadcrumb = $this->breadcrumb($page);

        $careers = Career::where('is_active', 1)->orderBy('start_date','asc')->paginate(10);

        return view('theme.pages.careers', compact('page','breadcrumb', 'careers'));
    }

    public function job_details($slug)
    {
        $career = Career::where('slug', $slug)->first();

        $page = new Page();
        $page->name = $career->name;

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.career-details', compact('page', 'career','breadcrumb'));
    }


    public function apply(Request $request)
    {
        $requestData = $request->all();
        $requestData['resume'] = $request->hasFile('resume') ? FileHelper::move_to_folder($request->file('resume'), 'resume')['url'] : null;
        
        CareerApplicant::create($requestData);

        $emails = "ryanolasco@gmail.com,wsi.nolasco.ryan@gmail.com";
        $hrmails = explode(',',$emails);

        foreach($hrmails as $mail){
            Mail::to($mail)->send(new ApplicationMail(Setting::info()));
        }

        return back()->with('success','Job Application sent!');
    }

    // public function breadcrumb($category = null, $career = null)
    // {

    //     $crumbs = ['Home' => route('home')];
    //     $crumbs['Careers'] = route('careers.front.index');

    //     if ($category) {
    //         $crumbs[$category->name] = route('careers.front.category', $category->slug);
    //     }

    //     if($career) {
    //         $crumbs[$career->name] = $career->get_url();
    //     }

    //     return $crumbs;

    // }

    // public function teams()
    // {
    //     $page = new Page();
    //     $page->name = 'Careers Team';

    //     return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.teams', compact('page'));
    // }

    // public function faq()
    // {
    //     $page = new Page();
    //     $page->name = 'Careers FAQ';

    //     return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.faq', compact('page'));
    // }

    public function list()
    {
        $page = new Page();
        $page->name = 'Careers List';

        $categories = CareerCategory::where('is_active', 1)->orderBy('name')->get();

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.list', compact('page','categories','breadcrumb'));
    }

    public function jobs($categorySlug)
    {
        $careerCategory = CareerCategory::where('slug',$categorySlug)->first();

        $page = new Page();
        $page->name = $careerCategory->name;

        $categories = CareerCategory::where('is_active',1)->orderBy('name','asc')->get();
        $careers = Career::where('is_active', 1)->where('category_id', $careerCategory->id)->orderBy('name')->get();

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.' . env('FRONTEND_TEMPLATE') . '.pages.careers.jobs', compact('page', 'careers','categories','careerCategory','breadcrumb'));
    }

    public function breadcrumb($page)
    {
        return [
            'Home' => url('/'),
            $page->name => url('/').'/'.$page->slug
        ];
    }
}

