<?php

namespace App\Http\Controllers\Cms;

use Facades\App\Helpers\ListingHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MenuHasPages;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Page;
use App\Models\JobPortal;
use App\Models\JobImage;
use App\Models\ApplicantList;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        Permission::module_init($this, 'menu');
    }

    public function index()
    {
        $searchFields = ['name'];
        $filterFields = ['updated_at', 'name', 'is_active'];

        $menus = ListingHelper::sort_by('is_active')
            ->filter_fields($filterFields)
            ->simple_search(Menu::class, $searchFields);

        $filter = ListingHelper::filter_fields($filterFields)->get_filter($searchFields);

        $searchType = 'simple_search';

        return view('admin.cms4.menu.index', compact('menus','filter', 'searchType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('parent_page_id', 0)->get();

        return view('admin.cms4.menu.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Menu::has_invalid_data() || MenuHasPages::has_invalid_data()) {
            $errors = Menu::get_error_messages()
                ->merge(MenuHasPages::get_error_messages());

            return back()->withErrors($errors)->withInput();
        }

        if ($this->is_set_to_active()) {
            $this->inactive_active_menu_except(0);
        }

        $request->request->add(['user_id' => auth()->id()]);

        $menu = Menu::create(request()->all());

        $menuLinks = json_decode(request('pages_json'), true);

        foreach ($menuLinks as $index => $link) {
            $this->store_and_update_menu_links($menu->id, $link, $index, 0);
        }

        return redirect()->route('menus.index')->with('success', __('standard.menu.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $pages = Page::where('parent_page_id', 0)->get();

        return view('admin.cms4.menu.edit', compact('pages', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if (Menu::has_invalid_data() || MenuHasPages::has_invalid_data()) {
            $errors = Menu::get_error_messages()
                ->merge(MenuHasPages::get_error_messages());

            return back()->withErrors($errors)->withInput();
        }

        if ($this->is_set_to_active()) {
            $this->inactive_active_menu_except($menu->id);
        }

        $request->request->add(['user_id' => auth()->id()]);

        $menu->update(request()->all());

        $this->remove_links_from_menu(request('remove_links'));

        foreach ($menu->navigation()->where('parent_id', '!=', 0)->get() as $menuItem)
        {
            if (!$menuItem->parent_page) {
                $menuItem->forceDelete();
            }
        }

        $menuLinks = json_decode(request('pages_json'), true);

        foreach ($menuLinks as $index => $link) {
            $this->store_and_update_menu_links($menu->id, $link, $index, 0);
        }

        return back()->with('success', __('standard.menu.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Menu $menu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {
        $menu->update(['user_id' => auth()->id()]);

        if ($menu->delete()) {
            return redirect()->route('menus.index')->with('success', __('standard.menu.delete_success'));
        } else {
            return redirect()->route('menus.index')->with('error', __('standard.menu.delete_failed'));
        }
    }

    public function destroy_many()
    {
        $menuIds = explode(',', request('ids'));
        if (sizeof($menuIds) > 0 ) {
            $menus = Menu::whereIn('id', $menuIds);
            foreach ($menus as $menu) {
                $menu->update(['user_id' => auth()->id()]);
            }

            $delete = Menu::whereIn('id', $menuIds)->delete();

            if ($delete) {
                return redirect()->route('menus.index')->with('success', __('standard.menu.delete_success'));
            }
        }

        return redirect()->route('menus.index')->with('error', __('standard.menu.delete_failed'));
    }

    public function restore($menu)
    {
        $restorePage = Menu::whereId($menu)->restore();

        return back()->with('success', __('standard.menu.restore_success'));
    }

    public function store_and_update_menu_links($menuId, $link, $index, $parentId)
    {
        if ($this->is_page_type($link)) {
            $this->update_page_label($link['page_id'], $link['label']);
        }

        if ($this->is_external_type($link)) {
            $link['page_id'] = 0;
        }

        $link['page_order'] = $index + 1;
        $link['parent_id'] = $parentId;
        $link['user_id'] = auth()->id();

        if ($this->is_existing_menu_link($link)) {
            MenuHasPages::find($link['id'])->update($link);
            $parentPageId = $link['id'];
        } else {
            $link['menu_id'] = $menuId;
            $parentPage = MenuHasPages::create($link);
            $parentPageId = $parentPage->id;
        }

        if ($this->has_sub_links($link)) {
            foreach ($link['children'] as $subIndex => $subPage) {
                $this->store_and_update_menu_links($menuId, $subPage, $subIndex, $parentPageId);
            }
        }
    }

    public function remove_links_from_menu($links)
    {
        MenuHasPages::find($links ?? [])->each(function ($link, $key) {
            $link->forceDelete();
        });
    }

    public function quick_update(Request $request, Menu $menu)
    {
        if (Menu::has_invalid_data()) {
            return back()->withErrors(Menu::get_error_messages())->withInput();
        }

        if ($this->is_set_to_active()) {
            $this->inactive_active_menu_except($menu->id);
        }

        $updateData = [
            'name' => request('name'),
            'is_active' => request('is_active'),
            'user_id' => auth()->id()
        ];

        if ($menu->is_active) {
            unset($updateData['is_active']);
        }

        $menu->update($updateData);

        if($menu){
            return redirect()->route('menus.index')->with('success', __('standard.menu.update_success'));
        }

        return redirect()->route('menus.index');
    }

    public function is_existing_menu_link($link)
    {
        return (isset($link['id']));
    }

    public function has_sub_links($link)
    {
        return isset($link['children']);
    }

    public function update_page_label($id, $label)
    {
        $page = Page::withTrashed()->find($id);
        $page->label = $label;
        $page->save();
    }

    public function is_page_type($page)
    {
        return $page['type'] == 'page' && isset($page['label']);
    }

    public function is_external_type($page)
    {
        return $page['type'] == 'external';
    }

    public function is_set_to_active()
    {
        return request('is_active') == 1;
    }

    public function inactive_active_menu_except($menuId)
    {
        Menu::where('is_active', 1)->where('id', '!=', $menuId)->update(['is_active' => 0]);
    }

    public function jobPortal()
    {
        $searchFields = ['name'];
        $filterFields = ['updated_at', 'name'];

        $query = JobPortal::with('images');
        $search = request()->input('search');
        $orderBy = request()->input('orderBy', 'updated_at');
        $sortBy = request()->input('sortBy', 'desc');
        $perPage = request()->input('perPage', 10);

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $jobPortals = $query->orderBy($orderBy, $sortBy)->paginate($perPage);

        $filter = (object) [
            'search' => $search,
            'orderBy' => $orderBy,
            'sortBy' => $sortBy,
            'perPage' => $perPage,
        ];

        $searchType = 'simple_search';

        return view('admin.menu.job-portal', compact('jobPortals', 'filter', 'searchType'));
    }

    public function storeJobPortal(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'requirements' => 'required',
            'jobs_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $jobPortal = JobPortal::create([
            'name' => $request->name,
            'description' => $request->description,
            'requirements' => $request->requirements,
        ]);

if ($request->hasFile('jobs_image')) {
    $path = $request->file('jobs_image')->store('job_images', 'public');
    JobImage::create([
        'job_portal_id' => $jobPortal->id,
        'image_path' => $path,
    ]);
}

        \Log::info('JobPortal created:', ['id' => $jobPortal->id, 'name' => $jobPortal->name]);

        if ($request->ajax()) {
            $jobPortals = JobPortal::with('images')->orderBy('updated_at', 'desc')->paginate(5);
            return response()->json([
                'success' => true,
                'data' => $jobPortal->load('images'),
                'message' => __('standard.menu.create_success'),
                'html' => view('admin.menu.job-portal-table', compact('jobPortals'))->render(),
            ], 200);
        }

        return redirect()->route('menus.job-portal')->with('success', __('standard.menu.create_success'));
    }

    public function updateJobPortal(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:job_portals,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'requirements' => 'required',
            'jobs_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $jobPortal = JobPortal::find($request->id);

        if (!$jobPortal) {
            \Log::error('JobPortal not found, ID:', ['id' => $request->id]);
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => __('job_portal.not_found')], 404);
            }
            return redirect()->route('menus.job-portal')->with('error', __('job_portal.not_found'));
        }

        $data = $request->only(['name', 'description', 'requirements']);
        $updated = $jobPortal->update($data);

        if ($request->hasFile('jobs_image')) {
            $existingImage = $jobPortal->images()->first();
            if ($existingImage) {
                Storage::disk('public')->delete($existingImage->image_path);
                $existingImage->delete();
            }
            $path = $request->file('jobs_image')->store('job_images', 'public');
            JobImage::create([
                'job_portal_id' => $jobPortal->id,
                'image_path' => $path,
            ]);
        }

        \Log::info('JobPortal update result:', ['id' => $jobPortal->id, 'updated' => $updated]);
        if ($request->ajax()) {
            $jobPortals = JobPortal::with('images')->orderBy($request->input('orderBy', 'updated_at'), $request->input('sortBy', 'desc'))->paginate(5);
            return response()->json([
                'success' => $updated,
                'data' => $jobPortal->load('images'),
                'message' => $updated ? __('standard.menu.update_success') : __('job_portal.update_failed'),
                'html' => view('admin.menu.job-portal-table', compact('jobPortals'))->render(),
            ], $updated ? 200 : 500);
        }

        return redirect()->route('menus.job-portal')->with('success', __('standard.menu.update_success'));
    }

    public function destroyJobPortal($id, Request $request)
    {
        $jobPortal = JobPortal::find($id);

        if (!$jobPortal) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => __('job_portal.not_found')]);
            }
            return redirect()->route('menus.job-portal')->with('error', __('job_portal.not_found'));
        }

        foreach ($jobPortal->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        if ($jobPortal->delete()) {
            if ($request->ajax()) {
                $jobPortals = JobPortal::with('images')->orderBy($request->input('orderBy', 'updated_at'), $request->input('sortBy', 'desc'))->paginate(5);
                return response()->json([
                    'success' => true,
                    'message' => __('job_portal.delete_success'),
                    'html' => view('admin.menu.job-portal-table', compact('jobPortals'))->render(),
                ]);
            }
            return redirect()->route('menus.job-portal')->with('success', __('job_portal.delete_success'));
        } else {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => __('job_portal.delete_failed')]);
            }
            return redirect()->route('menus.job-portal')->with('error', __('job_portal.delete_failed'));
        }
    }

    public function jobPortalApplicants($id)
    {
        $jobPortal = JobPortal::findOrFail($id);
        $applicants = ApplicantList::where('job_id', $id)->paginate(10);
        return view('admin.menu.job-portal-applicants', compact('jobPortal', 'applicants'));
    }

    public function downloadResume($path)
    {
        $filePath = 'public/' . $path;
        if (Storage::exists($filePath)) {
            \Log::info('Serving resume file', ['path' => $filePath]);
            return Storage::download($filePath);
        }
        \Log::error('Resume file not found', ['path' => $filePath]);
        abort(404, 'Resume file not found');
    }
}
