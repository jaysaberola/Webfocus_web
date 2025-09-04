@extends('theme.main')

@section('pagecss')
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <style>
        /* Match history page body styling */
        body {
            background: #fff;
            font-family: 'Inter', sans-serif;
        }

        /* Pop Animation Styles */
        .pop-animate {
            opacity: 0;
            transform: scale(0.8) translateY(30px);
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .pop-animate.animate {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        /* Stagger animation for multiple elements */
        .pop-animate.stagger-1 { transition-delay: 0.1s; }
        .pop-animate.stagger-2 { transition-delay: 0.2s; }
        .pop-animate.stagger-3 { transition-delay: 0.3s; }
        .pop-animate.stagger-4 { transition-delay: 0.4s; }
        .pop-animate.stagger-5 { transition-delay: 0.5s; }

        /* Different animation types */
        .pop-animate.slide-up {
            transform: translateY(50px);
        }

        .pop-animate.slide-up.animate {
            transform: translateY(0);
        }

        .pop-animate.slide-left {
            transform: translateX(-50px);
        }

        .pop-animate.slide-left.animate {
            transform: translateX(0);
        }

        .pop-animate.slide-right {
            transform: translateX(50px);
        }

        .pop-animate.slide-right.animate {
            transform: translateX(0);
        }

        .pop-animate.rotate {
            transform: rotate(-10deg) scale(0.8);
        }

        .pop-animate.rotate.animate {
            transform: rotate(0deg) scale(1);
        }

        /* Hero Section - matching history page hero */
        .services-hero {
            background: transparent;
            color: #333;
            padding: 7rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .services-hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 5rem;
            position: relative;
            z-index: 2;
        }
        .services-hero h1 .circle-draw {
            position: relative;
            display: inline-block;
        }
        .services-hero h1 .circle-draw svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
            z-index: -1;
        }
        .services-hero .lead {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
            text-align: justify;
        }

        /* Services sections - matching history page section styling */
        .section-services {
            padding: 2rem 0;
            background-color: #fff;
        }
        .section-services h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .section-services p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #666;
            margin-bottom: 1.5rem;
            text-align: justify;
        }
        .section-services ul {
            list-style-type: none;
            padding-left: 0;
        }
        .section-services ul li {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
            text-align: justify;
        }
        .section-services ul li:before {
            content: '\f058'; /* Font Awesome check-circle icon */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--cnvs-themecolor);
            position: absolute;
            left: 0;
            top: 0;
            font-size: 1rem;
        }
        .section-services img {
            margin-bottom: 2rem;
            max-width: 100%;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section-services .inquire-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: var(--cnvs-themecolor);
            color: #fff;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }
        .section-services .inquire-btn:hover {
            background-color: #005566;
        }

        /* Column layout for website development packages */
        .website-packages {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: space-between;
        }
        .website-package {
            flex: 1;
            min-width: 300px;
            background: #fff;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .website-package h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }
        .website-package ul {
            margin-bottom: 1.5rem;
        }
        .website-package img {
            margin-bottom: 1rem;
            max-width: 100%;
            height: auto;
        }

        /* Single column for Why Choose section */
        .single-column {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .single-column img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 720px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .services-hero h1 {
                font-size: 2.5rem;
            }
            .section-services h2 {
                font-size: 2rem;
            }
            .section-services {
                padding: 2rem 0;
            }
            .website-packages {
                flex-direction: column;
                align-items: center;
            }
            .website-package {
                width: 100%;
                max-width: 400px;
            }
            .single-column img {
                max-width: 100%;
            }
        }
    </style>
@endsection

@section('content')
<section id="content" class="bg-transparent">
    <div class="content-wrap overflow-visible pb-0">
        <!-- Hero Background -->
        <div class="position-absolute vh-100 w-100 top-0 start-0 overflow-hidden">
            <img src="{{ asset('images/landing-2/images/hero-bg.svg') }}" alt="Hero Background" class="hero-bg">
        </div>

        <div class="position-relative">
            <!-- Hero Header -->


             <div class="services-hero mb-md-6">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-12 text-center">
                            <h1 class="display-4 fw-bold pop-animate slide-left">About<span class="circle-draw"><span>Us</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Discover our journey, values, and commitment to excellence</h2>
                            <h3 class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2 mx-auto">"WebFocus has been in the business of providing the best I.T. Solutions in the Philippines since 2001."</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Content -->
            

            <div class="section-services">
    <div class="container">
        <div class="website-packages" style="display: flex; gap: 20px; align-items: stretch;">
            
            <!-- Web Design & Development -->
            <div class="website-package pop-animate slide-up stagger-1" 
                 style="flex: 1; display: flex; flex-direction: column; justify-content: flex-start; align-items: center; text-align: center; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background: #fff;">
                <img src="{{ asset('images/landing-2/images/services/webdev.png') }}" 
                     alt="WordPress Website Development" 
                     class="pop-animate slide-up" 
                     style="max-width: 100%; height: auto; margin-bottom: 15px;">
                <h2 class="pop-animate slide-up">Web Design & Development</h2>
                <p class="pop-animate slide-up stagger-1" style="flex-grow: 1;">We offer not only website design for our clients, we also provide the actual web development to fully build projects from scratch. The company understands the importance of having a holistic approach to constructing websites that generate both inbound traffic and leads to our clients.</p>
                <p class="pop-animate slide-up stagger-2" style="flex-grow: 1;">All of our client websites are made with the latest technology in the web development industry. We ensure that the websites are responsive to any devices and that they are secure to protect both clients and their customers.</p>
            </div>

            <!-- Web Hosting -->
            <div class="website-package pop-animate slide-up stagger-1" 
                 style="flex: 1; display: flex; flex-direction: column; justify-content: flex-start; align-items: center; text-align: center; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background: #fff;">
                <img src="{{ asset('images/landing-2/images/services/2.jpg') }}" 
                     alt="Premium Website Development" 
                     class="pop-animate slide-up" 
                     style="max-width: 100%; height: 50%; margin-bottom: 15px;">
                <h2 class="pop-animate slide-up">Web Hosting</h2>
                <p class="pop-animate slide-up stagger-1" style="flex-grow: 1;">As our portfolio grew more in the following years, we soon offered web hosting as part of their services. Web hosting is arguably one of the most important factors in the success of any website and we understand that. Our web hosting services ensure that client’s websites load lightning fast and are well taken care of with virtually no downtime.</p>
            </div>
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-12">
                            <h2 class="pop-animate slide-up">Managed I.T. Services</h2>
                            <p class="pop-animate slide-up stagger-1">We value the importance of time. We know that not everyone will be able to keep an eye on our online operations which is why we introduced our new managed I.T. services. Clients can focus more on other important aspects of their business while WSI takes care of their I.T. needs.</p>
                         </div>
                         </div>
                </div>

            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-12">
                            <h2 class="pop-animate slide-up">Continuous Innovation</h2>
                           <p class="pop-animate slide-up stagger-1">Even while still providing excellent quality through our website services, we continue to innovate. Today, we are still expanding our line of new I.T. services such as Mobile Application development, and Web App Development and System Development.</p>
                            <p class="pop-animate slide-up stagger-2">We know how to keep up with the fast pace of technology and we will not be left behind. We continue to provide outstanding web and I.T. services as evident in our clients’ testimonials and through our extensive portfolio.</p>

                         </div>
                         </div>
                </div>

        </div>
    </div>
</div>

        </div>
    </div>
</section>
@endsection

@section('pagejs')
    <script>
        jQuery.noConflict();
        jQuery(document).ready(function($) {
            // Smooth scrolling for anchor links
            $('a[href*="#"]').not('[href="#"]').click(function(event) {
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    event.preventDefault();
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 80 // Adjust for fixed header if present
                        }, 800);
                        return false;
                    }
                }
            });

            // Mobile menu toggle (consistent with home.blade.php)
            $('.cnvs-hamburger').click(function() {
                $('.primary-menu').toggleClass('menu-open');
                $(this).toggleClass('active');
            });

            // Pop Animation on Scroll
            function animateOnScroll() {
                $('.pop-animate').each(function() {
                    var $this = $(this);
                    var elementTop = $this.offset().top;
                    var elementBottom = elementTop + $this.outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    // Check if element is in viewport
                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $this.addClass('animate');
                    }
                });
            }

            // Run animation check on scroll and on page load
            $(window).on('scroll', animateOnScroll);
            animateOnScroll(); // Run once on page load
        });
    </script>
@endsection
