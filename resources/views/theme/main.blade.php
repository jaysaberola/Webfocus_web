    <!DOCTYPE html>
<html dir="ltr" lang="en-US"><!-- InstanceBegin template="/Templates/index_.dwt" codeOutsideHTMLIsLocked="false" -->
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Merriweather:wght@400;700&family=Material+Icons+Outlined&family=Material+Icons+Two+Tone&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/styles.css') }}" type="text/css" />
      <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


	<link rel="stylesheet" href="{{ asset('theme/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('theme/include/cookie-alert/cookiealert.css') }}" type="text/css"  />
	<link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/slick-theme.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/include/fontawesome/css/fontawesome.min.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage').'/icons/'.Setting::getFaviconLogo()->website_favicon }}">

	<link rel="stylesheet" href="{{ asset('theme/css/jssocials.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/jssocials-theme-plain.css') }}" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    @if(isset($page))
    	<style>
            @php
                $jsStyle = $page->styles;
                echo $jsStyle;
            @endphp
        </style>


        @if (isset($page->name) && $page->name == 'Home')
            <title>{{ Setting::info()->company_name }}</title>
        @else
            <title>{{ (empty($page->meta_title) ? $page->name:$page->meta_title) }} | {{ Setting::info()->company_name }}</title>
        @endif

        @if(!empty($page->meta_description))
            <meta name="description" content="{{ $page->meta_description }}">
        @endif

        @if(!empty($page->meta_keyword))
            <meta name="keywords" content="{{ $page->meta_keyword }}">
        @endif
    @endif

    @yield('pagecss')

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">
		@include('theme.layouts.header')

		<div class="modal-on-load" data-target="#myModal1"></div>
			<!-- Modal -->
			<div class="modal1 mfp-hide" id="myModal1">
			    <div class="block mx-auto" style="background-color: #FFF; max-width: 500px;border-radius: 16px;">
			        <div class="center" style="padding: 50px;">
			            <h3 style="font-size: 24px; font-weight: 700; padding-bottom: 18px;">Welcome to <span style="color: #ff7e00;">WebFocus</span> Solutions!</h3>
			            <p class="mb-0" style="opacity: .8;">Discover what makes us unique! Explore our innovative services, stay updated with the latest industry news, or join our team by checking out exciting career opportunities.</p>
			        </div>
			        <div class="section center m-0" style="padding: 18px;border-bottom-left-radius: 16px;border-bottom-right-radius: 16px;">
			            <a href="#" class="wf-btn" onClick="$.magnificPopup.close();return false;">Got it! </a>
			        </div>
			    </div>
			</div>

		<!-- Content
		============================================= -->
		<section id="content">
			@yield('content')
			@if(\Request::route()->getName() == 'home')
			<br>
			<input type="hidden" id="modal_status" value="{{\Setting::info()->modal_status}}">
		    @else
		    <input type="hidden" id="modal_status" value="PRIVATE">
		    @endif
		</section><!-- #content end -->

		<!-- InstanceEndEditable -->

		<!-- Footer
		============================================= -->
		@include('theme.layouts.footer')
		<!-- #footer end -->

		<!-- Cookie
		============================================= -->
		<div class="alert text-center cookiealert" role="alert" id="popupPrivacy" style="display: none;">
			<strong>Do you like cookies?</strong> &#x1F36A; {!! \Setting::info()->data_privacy_popup_content !!} <a href="{{ route('privacy-policy') }}" target="_blank">Learn more</a>
			<button type="button" id="cookieAcceptBarConfirm" class="btn btn-primary btn-sm acceptcookies px-3" aria-label="Close">
				I agree
			</button>
		</div><!-- #cookie end -->

	</div><!-- #wrapper end -->



	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-line-chevrons-up rounded-circle"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{ asset('theme/js/jquery.js') }}"></script>
	<script src="{{ asset('theme/js/plugins.min.js') }}"></script>


	<script>
        $(document).ready(function() {
            if(localStorage.getItem('popState') != 'shown'){
                $('#popupPrivacy').delay(1000).fadeIn();
            }
        });

        $('#cookieAcceptBarConfirm').click(function() // You are clicking the close button
        {
            $('#popupPrivacy').fadeOut(); // Now the pop up is hidden.
            localStorage.setItem('popState','shown');
        });
    </script>

    @yield('pagejs')

    @include('theme.layouts.banner-scripts')


	<script src="{{ asset('theme/js/slick.js') }}"></script>
	<script src="{{ asset('theme/js/slick.extension.js') }}"></script>
	<script src="{{ asset('theme/include/cookie-alert/cookiealert.js') }}"></script>
	<script src="{{ asset('theme/js/functions.js') }}"></script>

</body>
<!-- InstanceEnd --></html>
