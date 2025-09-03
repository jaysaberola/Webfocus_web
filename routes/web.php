<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\{DashboardController, FrontController, ResourceCategoryController, ResourceController, SitemapController};

// CMS Controllers
use App\Http\Controllers\Cms\{PageController, AlbumController, FileManagerController, MenuController, ArticleController, ArticleCategoryController, ArticleFrontController,JobsController};

use App\Http\Controllers\Settings\{UserController, AccountController, WebController, LogsController, RoleController, AccessController, PermissionController};

use App\Http\Controllers\Career\{CareerCategoryController, CareerController, CareerFrontController};
use App\Http\Controllers\MailingList\{SubscriberController, GroupController, CampaignController, SubscriberFrontController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 // CMS4 Front Pages
    Route::get('/home', function(){
        return redirect(route('home'));
    });

    Route::get('/', [FrontController::class, 'home'])->name('home');
    Route::get('/about', [FrontController::class, 'about'])->name('about'); // New route
     Route::get('/about/about-company', [FrontController::class, 'about_company'])->name('about.about-company'); // New route for services
     Route::get('/about/history', [FrontController::class, 'about_history'])->name('about.history'); // New route for services
     Route::get('/about/mission-vision', [FrontController::class, 'about_mission_vision'])->name('about.mission-vision'); // New route for services

    Route::get('/services', [FrontController::class, 'services'])->name('services'); // New route for services
     Route::get('/services/domain', [FrontController::class, 'services_domain'])->name('services.domain'); // New route for services
     Route::get('/services/hosting', [FrontController::class, 'services_hosting'])->name('services.hosting'); // New route for services
     Route::get('/services/web-development', [FrontController::class, 'services_web_development'])->name('services.web-development'); // New route for services
     Route::get('/services/document-management-system', [FrontController::class, 'services_dms'])->name('services.document-management-system'); // New route for services

     Route::get('/privacy-policy/', [FrontController::class, 'privacy_policy'])->name('privacy-policy');
    Route::post('/contact-us', [FrontController::class, 'contact_us'])->name('contact-us');
    Route::get('/search', [FrontController::class, 'search'])->name('search');

    Route::get('/sitemap', [SitemapController::class, 'index'])->name('sitemap');

    Route::get('/search-result',[FrontController::class, 'seach_result'])->name('search.result');

    // Portfolio
    Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');

    //News Frontend
        Route::get('/news/', [ArticleFrontController::class, 'news_list'])->name('news.front.index');
        Route::get('/news/{slug}', [ArticleFrontController::class, 'news_view'])->name('news.front.show');
        Route::get('/news/{slug}/print', [ArticleFrontController::class, 'news_print'])->name('news.front.print');
        Route::post('/news/{slug}/share', [ArticleFrontController::class, 'news_share'])->name('news.front.share');



        Route::get('/albums/preview', [FrontController::class, 'test'])->name('albums.preview');
        //Route::get('/search-result', [FrontController::class, 'seach_result'])->name('search.result');
    //

    // Resources
        Route::get('/resource-details/{slug}', [FrontController::class, 'resource_details'])->name('resource-details.front.show');
        Route::get('/resource-list', [FrontController::class, 'resource_list'])->name('resource-list.front.show');
        Route::get('/resource-category/{slug}', [FrontController::class, 'resource_category_list'])->name('resource-category.list');

        Route::get('/commission-issuance', [FrontController::class, 'commission_issuance'])->name('commision-issuance.page');
    //
        //Route::get('/mergers-acquisition', [FrontController::class, 'mergers_acquisition'])->name('mergers-acquisition.front.show');

    // Careers
        Route::get('/careers/', [CareerFrontController::class, 'job_list'])->name('careers.front.index');
        Route::get('/careers/{id}', [CareerFrontController::class, 'show'])->name('careers.front.show'); // Temporary override
        Route::post('careers-apply', [CareerFrontController::class, 'apply'])->name('careers.front.apply');
        // Route::get('careers-jobs/{categorySlug}', 'Career\CareerFrontController@jobs')->name('careers.jobs');
        // Route::get('careers-job-info/{categorySlug}/{id}', 'Career\CareerFrontController@show')->name('careers.front.show');

    // Job Portals

Route::get('/jobs', [JobsController::class, 'show'])->name('jobs.index');
Route::get('/jobs/{id}', [JobsController::class, 'show'])->name('jobs.show');
Route::post('/jobs/apply', [JobsController::class, 'apply'])->name('jobs.apply');

// Other routes...



    Route::post('/subscribe', [SubscriberFrontController::class, 'subscribe'])->name('mailing-list.front.subscribe');
    Route::get('/unsubscribe/{subscriber}/{code}', [SubscriberFrontController::class, 'unsubscribe'])->name('mailing-list.front.unsubscribe');

    Route::group(['prefix' => 'admin-panel'], function (){
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('panel.login');

    Auth::routes();

    Route::group(['middleware' => 'admin'], function (){
        // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Users
            Route::resource('users', UserController::class);
            Route::post('users/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
            Route::post('users/activate', [UserController::class, 'activate'])->name('users.activate');
            Route::get('user-search/', [UserController::class, 'search'])->name('user.search');
            Route::get('profile-log-search/', [UserController::class, 'filter'])->name('user.activity.search');
        //

        // Account
            Route::get('account/edit', [AccountController::class, 'edit'])->name('account.edit');
            Route::put('account/update', [AccountController::class, 'update'])->name('account.update');
            Route::put('account/update_email', [AccountController::class, 'update_email'])->name('account.update-email');
            Route::put('account/update_password', [AccountController::class, 'update_password'])->name('account.update-password');
        //

        // Website
            Route::get('website-settings/edit', [WebController::class, 'edit'])->name('website-settings.edit');
            Route::put('website-settings/update', [WebController::class, 'update'])->name('website-settings.update');
            Route::post('website-settings/update_contacts', [WebController::class, 'update_contacts'])->name('website-settings.update-contacts');
            Route::post('website-settings/update-ecommerce', [WebController::class, 'update_ecommerce'])->name('website-settings.update-ecommerce');
            Route::post('website-settings/update-paynamics', [WebController::class, 'update_paynamics'])->name('website-settings.update-paynamics');
            Route::post('website-settings/update_media_accounts', [WebController::class, 'update_media_accounts'])->name('website-settings.update-media-accounts');
            Route::post('website-settings/update_data_privacy', [WebController::class, 'update_data_privacy'])->name('website-settings.update-data-privacy');
            Route::post('website-settings/update_modal_content', [WebController::class, 'update_modal_content'])->name('website-settings.update-modal-content');
            Route::post('website-settings/remove_logo', [WebController::class, 'remove_logo'])->name('website-settings.remove-logo');
            Route::post('website-settings/remove_icon', [WebController::class, 'remove_icon'])->name('website-settings.remove-icon');
            Route::post('website-settings/remove_media', [WebController::class, 'remove_media'])->name('website-settings.remove-media');
        //

        // Audit
            Route::get('audit-logs', [LogsController::class, 'index'])->name('audit-logs.index');
        //

        // Roles
            Route::resource('role', RoleController::class);
            Route::post('role/delete',[RoleController::class, 'destroy'])->name('role.delete');
            Route::get('role/restore/{id}',[RoleController::class, 'restore'])->name('role.restore');
        //

        // Access
            Route::resource('access', AccessController::class);
            Route::post('roles_and_permissions/update', [AccessController::class, 'update_roles_and_permissions'])->name('role-permission.update');

            if (env('APP_DEBUG') == "true") {
                // Permission Routes
                Route::resource('permission', PermissionController::class);
                Route::post('permission/delete', [PermissionController::class, 'delete'])->name('permission.delete');
                Route::get('permission/restore/{id}', [PermissionController::class, 'restore'])->name('permission.restore');
            }
        //

        // Pages
            Route::resource('pages', PageController::class);
            Route::get('pages-advance-search', [PageController::class, 'advance_index'])->name('pages.index.advance-search');
            Route::post('pages/get-slug', [PageController::class, 'get_slug'])->name('pages.get_slug');
            Route::put('pages/{page}/default', [PageController::class, 'update_default'])->name('pages.update-default');
            Route::put('pages/{page}/customize', [PageController::class, 'update_customize'])->name('pages.update-customize');
            Route::put('pages/{page}/contact-us', [PageController::class, 'update_contact_us'])->name('pages.update-contact-us');
            Route::post('pages-change-status', [PageController::class, 'change_status'])->name('pages.change.status');
            Route::post('pages-delete', [PageController::class, 'delete'])->name('pages.delete');
            Route::get('page-restore/{page}', [PageController::class, 'restore'])->name('pages.restore');
        //

        // Albums
            Route::resource('albums', AlbumController::class);
            Route::post('albums/upload', [AlbumController::class, 'upload'])->name('albums.upload');
            Route::delete('many/album', [AlbumController::class, 'destroy_many'])->name('albums.destroy_many');
            Route::put('albums/quick/{album}', [AlbumController::class, 'quick_update'])->name('albums.quick_update');
            Route::post('albums/{album}/restore', [AlbumController::class, 'restore'])->name('albums.restore');
            Route::post('albums/banners/{album}', [AlbumController::class, 'get_album_details'])->name('albums.banners');
        //

        // News
            Route::resource('news', ArticleController::class)->except(['show', 'destroy']);
            Route::get('news-advance-search', [ArticleController::class, 'advance_index'])->name('news.index.advance-search');
            Route::post('news-get-slug', [ArticleController::class, 'get_slug'])->name('news.get-slug');
            Route::post('news-change-status', [ArticleController::class, 'change_status'])->name('news.change.status');
            Route::post('news-delete', [ArticleController::class, 'delete'])->name('news.delete');
            Route::get('news-restore/{news}', [ArticleController::class, 'restore'])->name('news.restore');

            // News Category
            Route::resource('news-categories', ArticleCategoryController::class)->except(['show']);
            Route::post('news-categories/get-slug', [ArticleCategoryController::class, 'get_slug'])->name('news-categories.get-slug');
            Route::post('news-categories/delete', [ArticleCategoryController::class, 'delete'])->name('news-categories.delete');
            Route::get('news-categories/restore/{id}', [ArticleCategoryController::class, 'restore'])->name('news-categories.restore');
        //

        // File Manager
            Route::get('laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('file-manager.show');
            Route::post('laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload')->name('unisharp.lfm.upload');
            Route::get('file-manager', [FileManagerController::class, 'index'])->name('file-manager.index');
        //

        // Menu
            Route::resource('menus', MenuController::class);
            Route::delete('many/menu', [MenuController::class, 'destroy_many'])->name('menus.destroy_many');
            Route::put('menus/quick1/{menu}', [MenuController::class, 'quick_update'])->name('menus.quick_update');
            Route::get('menu-restore/{menu}', [MenuController::class, 'restore'])->name('menus.restore');

     // Job Portals
        Route::get('admin/menu/job-portal', [MenuController::class, 'jobPortal'])->name('menus.job-portal');
        Route::post('job-portals', [MenuController::class, 'storeJobPortal'])->name('job-portals.store');
        Route::match(['post', 'put'], 'job-portals/update', [MenuController::class, 'updateJobPortal'])->name('job-portals.update');
        Route::delete('job-portals/{id}', [MenuController::class, 'destroyJobPortal'])->name('job-portals.destroy');
          Route::get('menu/job-portal-applicants/{id}', [MenuController::class, 'jobPortalApplicants'])->name('job-portals.applicants'); // New route
          Route::get('/storage/applications/{path}', [MenuController::class, 'downloadResume'])->name('download.resume')->where('path', '.*');

        //

        // Careers
        Route::resource('career-categories', CareerCategoryController::class)->except(['show']);
        Route::post('career-categories-change-status', [CareerCategoryController::class, 'change_status'])->name('career-categories.change.status');
        Route::delete('many/career-category', [CareerCategoryController::class, 'destroy_many'])->name('career-categories.destroy_many');
        Route::post('career-categories/{careerCategory}/restore', [CareerCategoryController::class, 'restore'])->name('career-categories.restore');

        Route::resource('careers', CareerController::class)->except(['show']);
        Route::get('careers-advance-search', [CareerController::class, 'advance_index'])->name('careers.index.advance-search');
        Route::post('careers-change-status', [CareerController::class, 'change_status'])->name('careers.change.status');
        Route::delete('many/career', [CareerController::class, 'destroy_many'])->name('careers.destroy_many');
        Route::post('careers/{career}/restore', [CareerController::class, 'restore'])->name('careers.restore');
        Route::get('career-applicants', [CareerController::class, 'index_applicants'])->name('careers.applicants');
        //

        // Resource Category
            Route::resource('resource-categories', ResourceCategoryController::class);
            Route::post('resource-category-delete', [ResourceCategoryController::class, 'single_delete'])->name('resource-category.single.delete');
            Route::get('resource-category-restore/{id}', [ResourceCategoryController::class, 'restore'])->name('resource-category.restore');
            Route::get('resource-category/{id}/{status}', [ResourceCategoryController::class, 'update_status'])->name('resource-category.change-status');
            Route::post('resource-categories-multiple-change-status',[ResourceCategoryController::class, 'multiple_change_status'])->name('resource-category.multiple.change.status');
            Route::post('resource-categories-multiple-delete',[ResourceCategoryController::class, 'multiple_delete'])->name('resource-category.multiple.delete');
        //

        // Resource List
            Route::resource('resources', ResourceController::class);
            Route::get('resource/{id}/{status}', [ResourceController::class, 'update_status'])->name('resources.change-status');
            Route::post('resource-delete', [ResourceController::class, 'single_delete'])->name('resources.single.delete');
            Route::get('resource-restore/{id}', [ResourceController::class, 'restore'])->name('resources.restore');
            Route::post('resources-multiple-change-status',[ResourceController::class, 'multiple_change_status'])->name('resources.multiple.change.status');
            Route::post('resources-multiple-delete',[ResourceController::class, 'multiple_delete'])->name('resources.multiple.delete');
            Route::post('resource-remove-file', [ResourceController::class, 'remove_file'])->name('resources.remove.file');
        //

        // Mailing List
        Route::resource('mailing-list/subscribers', SubscriberController::class, ['as' => 'mailing-list']);
        Route::get('mailing-list/cancelled-subscribers', [SubscriberController::class, 'unsubscribe'])->name('mailing-list.subscribers.unsubscribe');
        Route::post('mailing-list/subscribers-change-status', [SubscriberController::class, 'change_status'])->name('mailing-list.subscribers.change-status');

        Route::resource('mailing-list/groups', GroupController::class, ['as' => 'mailing-list']);
        Route::delete('delete/mailing-list/groups', [GroupController::class, 'destroy_many'])->name('mailing-list.groups.destroy_many');
        Route::post('mailing-list-groups/{id}/restore', [GroupController::class, 'restore'])->name('mailing-list.groups.restore');

        Route::resource('mailing-list/campaigns', CampaignController::class, ['as' => 'mailing-list']);
        Route::get('mailing-list/sent-campaigns', [CampaignController::class, 'sent_campaigns'])->name('mailing-list.campaigns.sent-campaigns');
        Route::delete('delete/mailing-list/campaign', [CampaignController::class, 'destroy_many'])->name('mailing-list.campaigns.destroy_many');
        Route::post('campaigns/{id}/restore', [CampaignController::class, 'restore'])->name('mailing-list.campaigns.restore');
        //

    });
});

// Pages Frontend
Route::get('/{any}', [FrontController::class, 'page'])->where('any', '.*');
