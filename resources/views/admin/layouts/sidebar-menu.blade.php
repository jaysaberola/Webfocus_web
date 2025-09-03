<ul class="nav nav-aside">
    <li class="nav-item">
        <a href="{{route('home')}}" target="_blank" class="nav-link">
            <i data-feather="external-link"></i>
            <span>View Website</span>
        </a>
    </li>
    <li class="nav-label mg-t-25">CMS</li>
    <li class="nav-item @if (url()->current() == route('dashboard')) active @endif">
        <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
    </li>

    @if (auth()->user()->has_access_to_pages_module())
        <li class="nav-item with-sub @if (request()->routeIs('pages*')) active show @endif">
            <a href="" class="nav-link"><i data-feather="layers"></i> <span>Pages</span></a>
            <ul>
                <li @if (\Route::current()->getName() == 'pages.edit' || \Route::current()->getName() == 'pages.index' || \Route::current()->getName() == 'pages.index.advance-search') class="active" @endif><a href="{{ route('pages.index') }}">Manage Pages</a></li>
                @if(auth()->user()->has_access_to_route('pages.create'))
                <li @if (\Route::current()->getName() == 'pages.create') class="active" @endif><a href="{{ route('pages.create') }}">Create a Page</a></li>
                @endif

            </ul>
        </li>
    @endif

    @if (auth()->user()->has_access_to_albums_module())
        <li class="nav-item with-sub @if (request()->routeIs('albums*')) active show @endif">
            <a href="#" class="nav-link"><i data-feather="image"></i> <span>Banners</span></a>
            <ul>
                <li @if (url()->current() == route('albums.edit', 1)) class="active" @endif><a href="{{ route('albums.edit', 1) }}">Manage Home Banner</a></li>
                <li @if (\Route::current()->getName() == 'albums.index' || (\Route::current()->getName() == 'albums.edit' && url()->current() != route('albums.edit', 1))) class="active" @endif><a href="{{ route('albums.index') }}">Manage Subpage Banners</a></li>
                @if(auth()->user()->has_access_to_route('albums.create'))
                    <li @if (\Route::current()->getName() == 'albums.create') class="active" @endif><a href="{{ route('albums.create') }}">Create an Album</a></li>
                @endif
            </ul>
        </li>
    @endif

    @if (auth()->user()->has_access_to_file_manager_module())
        <li class="nav-item @if (\Route::current()->getName() == 'file-manager.index') active @endif">
            <a href="{{ route('file-manager.index') }}" class="nav-link"><i data-feather="folder"></i> <span>Files</span></a>
        </li>
    @endif
    
@if (auth()->user()->has_access_to_menu_module())
    <li class="nav-item with-sub @if (request()->routeIs('menus*')) active show @endif">
        <a href="" class="nav-link"><i data-feather="menu"></i> <span>Menu</span></a>
        <ul>
            <li @if (\Route::current()->getName() == 'menus.index' || \Route::current()->getName() == 'menus.edit') class="active" @endif>
                <a href="{{ route('menus.index') }}">Manage Menu</a>
            </li>
            <li @if (\Route::current()->getName() == 'menus.create') class="active" @endif>
                <a href="{{ route('menus.create') }}">Create a Menu</a>
            </li>
            <li @if (\Route::current()->getName() == 'menus.job-portal') class="active" @endif>
                <a href="{{ route('menus.job-portal') }}">Job Portal</a>
            </li>
        </ul>
    </li>
@endif

    @if (auth()->user()->has_access_to_news_module() || auth()->user()->has_access_to_news_categories_module())
        <li class="nav-item with-sub @if (request()->routeIs('news*') || request()->routeIs('news-categories*')) active show @endif">
            <a href="" class="nav-link"><i data-feather="edit"></i> <span>News</span></a>
            <ul>
                @if (auth()->user()->has_access_to_news_module())
                    <li @if (\Route::current()->getName() == 'news.index' || \Route::current()->getName() == 'news.edit'  || \Route::current()->getName() == 'news.index.advance-search') class="active" @endif><a href="{{ route('news.index') }}">Manage News</a></li>
                    <li @if (\Route::current()->getName() == 'news.create') class="active" @endif><a href="{{ route('news.create') }}">Create a News</a></li>
                @endif
                @if (auth()->user()->has_access_to_news_categories_module())
                    <li @if (\Route::current()->getName() == 'news-categories.index' || \Route::current()->getName() == 'news-categories.edit') class="active" @endif><a href="{{ route('news-categories.index') }}">Manage Categories</a></li>
                    <li @if (\Route::current()->getName() == 'news-categories.create') class="active" @endif><a href="{{ route('news-categories.create') }}">Create a Category</a></li>
                @endif
            </ul>
        </li>
    @endif

    <li class="nav-item with-sub @if (request()->routeIs('account*') || request()->routeIs('website-settings*') || request()->routeIs('audit*')) active show @endif">
        <a href="" class="nav-link"><i data-feather="settings"></i> <span>Settings</span></a>
        <ul>
            <li @if (\Route::current()->getName() == 'account.edit') class="active" @endif><a href="{{ route('account.edit') }}">Account Settings</a></li>

            @if (auth()->user()->has_access_to_website_settings_module())
                <li @if (\Route::current()->getName() == 'website-settings.edit') class="active" @endif><a href="{{ route('website-settings.edit') }}">Website Settings</a></li>
            @endif

            @if (auth()->user()->has_access_to_audit_logs_module())
                <li @if (\Route::current()->getName() == 'audit-logs.index') class="active" @endif><a href="{{ route('audit-logs.index') }}">Audit Trail</a></li>
            @endif
        </ul>
    </li>
    @if (auth()->user()->is_an_admin())
        <li class="nav-item with-sub @if (request()->routeIs('users*')) active show @endif">
            <a href="" class="nav-link"><i data-feather="users"></i> <span>Users</span></a>
            <ul>
                <li @if (\Route::current()->getName() == 'users.index' || \Route::current()->getName() == 'users.edit') class="active" @endif><a href="{{ route('users.index') }}">Manage Users</a></li>
                <li @if (\Route::current()->getName() == 'users.create') class="active" @endif><a href="{{ route('users.create') }}">Create a User</a></li>
            </ul>
        </li>
    @endif
    @if (auth()->user()->is_an_admin())
        <li class="nav-item with-sub @if (request()->routeIs('role*') || request()->routeIs('access*') || request()->routeIs('permission*')) active show @endif">
            <a href="" class="nav-link"><i data-feather="user"></i> <span>Account Management</span></a>
            <ul>
                <li @if (request()->routeIs('role*')) class="active" @endif><a href="{{ route('role.index') }}">Roles</a></li>
                <li @if (request()->routeIs('access*')) class="active" @endif><a href="{{ route('access.index') }}">Access Rights</a></li>
                <li @if (request()->routeIs('permission*')) class="active" @endif><a href="{{ route('permission.index') }}">Permissions</a></li>
            </ul>
        </li>
    @endif


{{--        <li class="nav-item with-sub @if (request()->routeIs('careers*') || request()->routeIs('career-categories*')) active show @endif">--}}
{{--            <a href="" class="nav-link"><i data-feather="edit"></i> <span>Careers</span></a>--}}
{{--            <ul>--}}
{{--                @if(auth()->user()->has_access_to_route('careers.applicants'))--}}
{{--                    <li @if (\Route::current()->getName() == 'careers.applicants') class="active" @endif><a href="{{ route('careers.applicants') }}">Manage Applicants</a></li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_route('careers.index'))--}}
{{--                    <li @if (\Route::current()->getName() == 'careers.index' || \Route::current()->getName() == 'careers.edit'  || \Route::current()->getName() == 'careers.index.advance-search') class="active" @endif><a href="{{ route('careers.index') }}">Manage Careers</a></li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_route('careers.create'))--}}
{{--                    <li @if (\Route::current()->getName() == 'careers.create') class="active" @endif><a href="{{ route('careers.create') }}">Create a Career</a></li>--}}
{{--                @endif--}}

{{--                --}}{{-- @if(auth()->user()->has_access_to_route('career-categories.index'))--}}
{{--                    <li @if (\Route::current()->getName() == 'career-categories.index' || \Route::current()->getName() == 'career-categories.edit') class="active" @endif><a href="{{ route('career-categories.index') }}">Manage Categories</a></li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_route('career-categories.create'))--}}
{{--                    <li @if (\Route::current()->getName() == 'career-categories.create') class="active" @endif><a href="{{ route('career-categories.create') }}">Create a Category</a></li>--}}
{{--                @endif --}}
{{--            </ul>--}}
{{--        </li>--}}

{{--        <li class="nav-item with-sub @if (request()->routeIs('resources*') || request()->routeIs('resource-categories*')) active show @endif">--}}
{{--            <a href="" class="nav-link"><i data-feather="edit"></i> <span>Resources</span></a>--}}
{{--            <ul>--}}

{{--                @if(auth()->user()->has_access_to_route('resources.index'))--}}
{{--                    <li @if (\Route::current()->getName() == 'resources.index' || \Route::current()->getName() == 'resources.edit') class="active" @endif><a href="{{ route('resources.index') }}">Manage Resources</a></li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_route('resources.create'))--}}
{{--                    <li @if (\Route::current()->getName() == 'resources.create') class="active" @endif><a href="{{ route('resources.create') }}">Create Resources</a></li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_route('resource-categories.index'))--}}
{{--                    <li @if (\Route::current()->getName() == 'resource-categories.index' || \Route::current()->getName() == 'resource-categories.edit') class="active" @endif><a href="{{ route('resource-categories.index') }}">Manage Categories</a></li>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_route('resource-categories.create'))--}}
{{--                    <li @if (\Route::current()->getName() == 'resource-categories.create') class="active" @endif><a href="{{ route('resource-categories.create') }}">Create a Category</a></li>--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--        </li>--}}


{{--        <li class="nav-item with-sub @if (request()->routeIs('mailing-list*')) active show @endif">--}}
{{--            <a href="" class="nav-link"><i data-feather="credit-card"></i> <span>Mailing List</span></a>--}}
{{--            <ul>--}}
{{--                @if (auth()->user()->has_access_to_subscriber_module())--}}
{{--                    <li @if (\Route::current()->getName() == 'mailing-list.subscribers.index' || \Route::current()->getName() == 'mailing-list.subscribers.edit') class="active" @endif><a href="{{ route('mailing-list.subscribers.index') }}">Manage Subscribers</a></li>--}}
{{--                    @if(auth()->user()->has_access_to_route('mailing-list.subscribers.create'))--}}
{{--                        <li @if (\Route::current()->getName() == 'mailing-list.subscribers.create') class="active" @endif><a href="{{ route('mailing-list.subscribers.create') }}">Create a Subscriber</a></li>--}}
{{--                    @endif--}}
{{--                    <li @if (\Route::current()->getName() == 'mailing-list.subscribers.unsubscribe') class="active" @endif><a href="{{ route('mailing-list.subscribers.unsubscribe') }}">Cancelled Subscription</a></li>--}}
{{--                @endif--}}

{{--                @if (auth()->user()->has_access_to_subscriber_group_module())--}}
{{--                    <li @if (\Route::current()->getName() == 'mailing-list.groups.index' || \Route::current()->getName() == 'mailing-list.groups.edit') class="active" @endif><a href="{{ route('mailing-list.groups.index') }}">Manage Groups</a></li>--}}
{{--                    @if(auth()->user()->has_access_to_route('mailing-list.groups.create'))--}}
{{--                        <li @if (\Route::current()->getName() == 'mailing-list.groups.create') class="active" @endif><a href="{{ route('mailing-list.groups.create') }}">Create a Group</a></li>--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--                --}}
{{--                @if (auth()->user()->has_access_to_campaign_module())--}}
{{--                    <li @if (\Route::current()->getName() == 'mailing-list.campaigns.index' || \Route::current()->getName() == 'mailing-list.campaigns.edit') class="active" @endif><a href="{{ route('mailing-list.campaigns.index') }}">Manage Campaigns</a></li>--}}
{{--                    @if(auth()->user()->has_access_to_route('mailing-list.campaigns.create'))--}}
{{--                        <li @if (\Route::current()->getName() == 'mailing-list.campaigns.create') class="active" @endif><a href="{{ route('mailing-list.campaigns.create') }}">Create a Campaign</a></li>--}}
{{--                    @endif--}}
{{--                @endif--}}

{{--                @if(auth()->user()->has_access_to_mailing_list_sent_items_module())--}}
{{--                    <li @if (\Route::current()->getName() == 'mailing-list.campaigns.sent-campaigns') class="active" @endif><a href="{{ route('mailing-list.campaigns.sent-campaigns') }}">Sent Items</a></li>--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--        </li>--}}
</ul>
