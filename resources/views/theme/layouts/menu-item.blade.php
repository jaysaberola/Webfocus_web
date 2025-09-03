
@php $page = $item->page; @endphp
@section('pagecss')
    <style>
        /* Submenu Container Styling */
        .sub-menu-container {
            margin: 0; /* No margins to avoid box-like appearance */
            padding: 0; /* No padding to keep it minimal */
            min-width: 180px; /* Minimum width for submenu links */
            opacity: 0; /* Hidden by default */
            visibility: hidden; /* Hidden by default */
            transform: translateY(5px); /* Slight offset for animation */
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth fade-in transition */
            position: absolute; /* Position relative to parent */
            z-index: 1000; /* Ensure it appears above other content */
            background: transparent; /* Explicitly transparent background */
            border: none; /* No border */
            box-shadow: none; /* No shadow */
        }

        /* Show submenu on hover */
        .menu-item.sub-menu:hover .sub-menu-container {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Submenu Item Styling */
        .sub-menu-container .menu-item {
            display: block;
            margin: 0;
            padding: 0;
        }

        /* Submenu Link Styling */
        .sub-menu-container .menu-link {
            display: block;
            padding: 6px 12px; /* Minimal padding for clickable area */
            color: #333; /* Dark text for readability */
            font-size: 0.95rem; /* Slightly smaller font */
            text-decoration: none; /* No underline by default */
            transition: color 0.2s ease; /* Smooth color transition on hover */
            background: transparent; /* Explicitly transparent background */
            border: none; /* No border */
        }

        /* Hover effect for submenu links */
        .sub-menu-container .menu-link:hover {
            color: var(--cnvs-themecolor, #007bff); /* Theme color on hover */
            text-decoration: underline; /* Subtle underline on hover */
        }

        /* Current submenu item styling */
        .sub-menu-container .menu-item.current .menu-link {
            color: var(--cnvs-themecolor, #007bff); /* Theme color for active item */
            font-weight: 500; /* Slightly bolder for emphasis */
            text-decoration: underline; /* Underline for active item */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sub-menu-container {
                position: static; /* Stack submenus in mobile view */
                transform: none; /* Disable transform for mobile */
                opacity: 1; /* Always visible when open */
                visibility: visible; /* Always visible when open */
                background: transparent; /* Maintain transparency in mobile view */
                border: none; /* No border in mobile view */
                box-shadow: none; /* No shadow in mobile view */
            }

            .menu-item.sub-menu:hover .sub-menu-container {
                transform: none; /* Disable transform for mobile */
            }

            .sub-menu-container .menu-link {
                padding: 5px 10px; /* Adjusted padding for mobile */
                font-size: 0.9rem; /* Slightly smaller font for mobile */
                background: transparent; /* Maintain transparency in mobile view */
                border: none; /* No border in mobile view */
            }
        }
    </style>
@endsection

@if (!empty($page) && $item->is_page_type() && $page->is_published())
    <li class="menu-item @if(url()->current() == $page->get_url() || ($page->id == 1 && url()->current() == env('APP_URL'))) @if(!isset($_GET['type'])) current @endif @endif @if($item->has_sub_menus()) sub-menu @endif">
        <a href="{{$page->get_url()}}" class="menu-link" style="border-radius:0px;transition:border-radius 0.3s ease;"
            onmouseover="this.style.borderRadius='0';"
            onmouseout="this.style.borderRadius='0px';
            background-color: transparent;">
            <div>
                @if (!empty($page->label))
                    {{ $page->label }}
                @else
                    {{ $page->name }}
                @endif
            </div>
        </a>
        @if ($item->has_sub_menus())
            <ul class="sub-menu-container">
                @foreach ($item->sub_pages as $subItem)
                    @include('theme.layouts.menu-item', ['item' => $subItem])
                @endforeach
            </ul>
        @endif
    </li>
@elseif ($item->is_external_type())
    <li class="menu-item @if(isset($_GET['type']) && $_GET['type'] == 'category') @if($item->uri == url()->current().'?type='.$_GET['type'].'&criteria='.$_GET['criteria']) current @endif @endif">
        <a href="{{ $item->uri }}" class="menu-link" target="{{ $item->target }}"><div>{{ $item->label }}</div></a>
        @if ($item->has_sub_menus())
            <ul class="sub-menu-container">
                @foreach ($item->sub_pages as $subItem)
                    @include('theme.layouts.menu-item', ['item' => $subItem])
                @endforeach
            </ul>
        @endif
    </li>
@endif
