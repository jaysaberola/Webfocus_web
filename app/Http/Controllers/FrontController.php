<?php

namespace App\Http\Controllers;
use App\Models\EmailRecipient;
use Illuminate\Http\Request;

use Facades\App\Helpers\ListingHelper;

use App\Http\Requests\ContactUsRequest;
use App\Helpers\Setting;

use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryAdminMail;
use App\Mail\InquiryMail;

use App\Models\{Article, Page, User, Resource, ResourceCategory};

use Auth, DB;


class FrontController extends Controller
{


    public function home()
    {
        return $this->page('home');
    }

    public function seach_result(Request $request)
    {
        $page = new Page();
        $page->name = 'Search Results';

        $breadcrumb = $this->breadcrumb($page);
        $pageLimit = 10;

        $searchtxt = $request->searchtxt;

        $pages = Page::where('status','PUBLISHED')
            ->select('name','slug')
            ->whereNotIn('slug',['footer','home'])
            ->where('name','like','%'.$searchtxt.'%')
            ->orWhere('contents','like','%'.$searchtxt.'%')
            ->orderBy('name','asc')->get();

        $news = Article::where('status','PUBLISHED')
            ->select('name','slug')
            ->where('name','like','%'.$searchtxt.'%')
            ->orWhere('contents','like','%'.$searchtxt.'%')
            ->orderBy('name','asc')->get();

        $totalItems = $pages->count()+$news->count();

        $searchResult = collect($pages)->merge($news)->paginate(10);

        return view('theme.pages.search-result', compact('searchResult', 'totalItems', 'page','breadcrumb'));
    }

    public function privacy_policy(){

        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        $page = new Page();
        $page->name = Setting::info()->data_privacy_title;

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.privacy-policy', compact('page', 'footer','breadcrumb'));

    }

    public function mergers_acquisition(Request $request)
    {
        $page = new Page();
        $page->name = "Mergers Acquisition";

        $breadcrumb = $this->breadcrumb($page);

        $articles = Article::where('status', 'Published')->where('is_featured', 1)->orderBy('date', 'asc')->limit(4)->get();

        return view('theme.pages.mergers-acquisition', compact('page', 'articles','breadcrumb'));
    }

    public function resource_list(Request $request)
    {
        $filterYear = $request->get('year',false);

        $page = Page::where('slug', 'resource-list')->first();

        $breadcrumb = $this->breadcrumb($page);

        $years = DB::select('SELECT year(created_at) as yr FROM `resources`  where deleted_at is null and status = "Active" GROUP by year(created_at) ORDER BY year(created_at)');

        $categories = ResourceCategory::where('id', '<>', 3)->where('parent_id', 0)->where('status', 'Active')->orderBy('name', 'asc')->get();
        $searchCategories = ResourceCategory::where('id', '<>', 3)->where('status', 'Active')->orderBy('name', 'asc')->get();


        $resources = Resource::where('status', 'Active');

        if($filterYear){
            $resources->whereYear('created_at', $request->year);
        }

        $resources = $resources->orderBy('name', 'asc')->paginate(10);

        $categorySlug = "";
        $slug = "";
        $keyword = "";

        return view('theme.pages.resource-list', compact('page', 'resources','categories','breadcrumb', 'categorySlug', 'years', 'filterYear', 'searchCategories', 'slug', 'keyword'));
    }

    public function resource_category_list(Request $request, $slug)
    {
        $filterYear = $request->get('year',false);
        $keyword = $request->get('keyword',false);

        $resourceCategory = ResourceCategory::where('slug', $slug)->first();

        $page = Page::where('slug', 'resource-list')->first();
        $page->name = $resourceCategory->name;

        $breadcrumb = $this->breadcrumb($page);

        $years = DB::select('SELECT year(created_at) as yr FROM `resources`  where deleted_at is null and status = "Active" GROUP by year(created_at) ORDER BY year(created_at)');


        $resources = Resource::where('category_id', $resourceCategory->id);

        if($filterYear){
            $resources->whereYear('created_at', $request->year);
        }

        if($keyword){
            $resources->where('name','like','%'.$keyword.'%');
        }

        $resources = $resources->orderBy('name', 'asc')->paginate(10);

        $categories = ResourceCategory::where('id', '<>', 3)->where('parent_id', 0)->where('status', 'Active')->orderBy('name', 'asc')->get();
        $searchCategories = ResourceCategory::where('id', '<>', 3)->where('status', 'Active')->orderBy('name', 'asc')->get();

        $categorySlug = $resourceCategory->name;

        return view('theme.pages.resource-list', compact('page', 'resources','categories','breadcrumb', 'categorySlug', 'years', 'filterYear', 'searchCategories', 'keyword', 'slug'));
    }


    public function commission_issuance(Request $request)
    {
        $searchBy = $request->get('searchBy',false);
        $keyword = $request->get('keyword',false);
        $sortBy = $request->get('sortby',false);
        $scategory = $request->get('category',false);


        if($scategory){
            $resourceCategory = ResourceCategory::where('slug', $scategory)->first();
            $resources = Resource::where('category_id', $resourceCategory->id)->where('status', 'Active');
        } else {
            $resourceCategory = ResourceCategory::where('slug', "commission-issuance")->first();
            $resources = Resource::where('category_id', $resourceCategory->id)->where('status', 'Active');
        }

        if($searchBy){

            if($searchBy == 'year'){
                $resources->whereYear('created_at', $request->keyword);
            }

            if($searchBy == 'sector'){
                $resources->whereNotNull('sector')->where('sector','like','%'.$keyword.'%');
            }

            if($searchBy == 'case'){
                $resources->whereNotNull('case_type')->where('case_type','like','%'.$keyword.'%');
            }
        }

        if($sortBy){
            $resources = $resources->orderBy('name', $sortBy)->paginate(10);
        } else {
            $resources = $resources->orderBy('name', 'asc')->paginate(10);
        }


        $categories = ResourceCategory::where('slug', "commission-issuance")->get();


        $page = new Page();
        $page->name = $resourceCategory->name;
        $categorySlug = $resourceCategory->name;

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.commission-issuance', compact('page', 'resources','categories','breadcrumb', 'categorySlug', 'searchBy', 'keyword', 'scategory', 'sortBy'));
    }

    public function resource_details($slug)
    {
        $resource = Resource::where('slug', $slug)->first();

        $page = Page::where('slug', 'resource-list')->first();
        $page->name = "$resource->name";

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.resource-details', compact('page', 'resource','breadcrumb'));

    }

    public function page($slug)
    {
        if (Auth::guest()) {
            $page = Page::where('slug', $slug)->where('status', 'PUBLISHED')->first();
        } else {
            $page = Page::where('slug', $slug)->first();
        }

        if ($page == null) {
            $view404 = 'theme.pages.404';
            if (view()->exists($view404)) {
                $page = new Page();
                $page->name = 'Page not found';
                return view($view404, compact('page'));
            }

            abort(404);
        }

        $breadcrumb = $this->breadcrumb($page);

        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        if (!empty($page->template)) {
            return view('theme.pages.'.$page->template, compact('footer', 'page', 'breadcrumb'));
        }

        $parentPage = null;
        $parentPageName = $page->name;
        $currentPageItems = [];
        $currentPageItems[] = $page->id;
        if ($page->has_parent_page() || $page->has_sub_pages()) {
            if ($page->has_parent_page()) {
                $parentPage = $page->parent_page;
                $parentPageName = $parentPage->name;
                $currentPageItems[] = $parentPage->id;
                while ($parentPage->has_parent_page()) {
                    $parentPage = $parentPage->parent_page;
                    $currentPageItems[] = $parentPage->id;
                }
            } else {
                $parentPage = $page;
                $currentPageItems[] = $parentPage->id;
            }
        }

        return view('theme.page', compact('footer', 'page', 'parentPage', 'breadcrumb', 'currentPageItems', 'parentPageName'));
    }

    public function contact_us(ContactUsRequest $request)
    {
        //        $admins  = User::where('role_id', 1)->get();
        $client = $request->all();

        Mail::to($client['email'])->send(new InquiryMail(Setting::info(), $client));

        $recipientEmails = EmailRecipient::email_list();
        foreach ($recipientEmails as $email) {
            Mail::to($email)->send(new InquiryAdminMail(Setting::info(), $client));
        }

        if (Mail::failures()) {
            return redirect()->back()->with('error','Failed to send inquiry. Please try again later.');
        }

        return redirect()->back()->with('success','Email sent!');
    }

    public function breadcrumb($page)
    {
        return [
            'Home' => url('/'),
            $page->name => url('/').'/'.$page->slug
        ];
    }

    public function about()
    {
        \Log::info('Loading about page with partials: theme.pages.about-history, theme.pages.about-company, theme.pages.about-mission-vision');
        $page = new Page();
        $page->name = 'About Us';
        $page->slug = 'about';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.about', compact('footer', 'page', 'breadcrumb'));
    }

    public function about_company()
    {
        \Log::info('Loading about company page: theme.pages.about-company');
        $page = new Page();
        $page->name = 'Our Company';
        $page->slug = 'about/about_company';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.about-company', compact('footer', 'page', 'breadcrumb'));
    }

    public function about_history()
    {
        \Log::info('Loading about company page: theme.pages.about-history');
        $page = new Page();
        $page->name = 'History';
        $page->slug = 'about/about_history';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.about-history', compact('footer', 'page', 'breadcrumb'));
    }

    public function about_mission_vision()
    {
        \Log::info('Loading about company page: theme.pages.about-mission-vision');
        $page = new Page();
        $page->name = 'Mission & Vision';
        $page->slug = 'about/about_mission_vision';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.about-mission-vision', compact('footer', 'page', 'breadcrumb'));
    }

    public function services()
    {
        \Log::info('Loading services page with partials: theme.pages.services-domain-types, theme.pages.services-domain-explained, theme.pages.services-selection, theme.pages.services-registrar, theme.pages.services-registration');
        $page = new Page();
        $page->name = 'Services';
        $page->slug = 'services';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services', compact('footer', 'page', 'breadcrumb'));
    }

        public function services_domain()
    {
        \Log::info('Loading services page with partials: theme.pages.service-domain');
        $page = new Page();
        $page->name = 'Domain';
        $page->slug = 'services/services_domain';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.service-domain', compact('footer', 'page', 'breadcrumb'));
    }

        public function services_hosting()
    {
        \Log::info('Loading services page with partials: theme.pages.services-domain');
        $page = new Page();
        $page->name = 'Hosting';
        $page->slug = 'services/services_hosting';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services-hosting', compact('footer', 'page', 'breadcrumb'));
    }

    public function services_web_development()
    {
        \Log::info('Loading services page with partials: theme.pages.services-web-development');
        $page = new Page();
        $page->name = 'Web Development';
        $page->slug = 'services/services_web_development';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services-web-development', compact('footer', 'page', 'breadcrumb'));
    }
    public function services_dms()
    {
        \Log::info('Loading services page with partials: theme.pages.services-dms');
        $page = new Page();
        $page->name = 'Document Management System';
        $page->slug = 'services/services_dms';
        $breadcrumb = $this->breadcrumb($page);
        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();
        return view('theme.pages.services-dms', compact('footer', 'page', 'breadcrumb'));
    }

    public function portfolio() {
        $page = new Page();
        $page->name = 'Portfolio';

        return view('theme.pages.portfolio.index', compact('page'));
    }
}
