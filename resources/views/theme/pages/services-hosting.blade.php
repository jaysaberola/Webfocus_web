
@extends('theme.main')

@section('pagecss')
      <!-- Bootstrap CSS (assumed to be in theme.main) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/font-icons.css') }}">

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
            padding: 5rem 0;
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
            margin-bottom: 5rem;
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

        /* Column layout for hosting packages */
        .hosting-packages {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: space-between;
        }
        .hosting-package {
            flex: 1;
            min-width: 280px;
            background: #fff;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .hosting-package h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }
        .hosting-package ul {
            margin-bottom: 1.5rem;
        }
        .hosting-package img {
            margin-bottom: 1rem;
            max-width: 100%;
            height: auto;
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
            .hosting-packages {
                flex-direction: column;
                align-items: center;
            }
            .hosting-package {
                width: 100%;
                max-width: 400px;
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
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold pop-animate slide-left"><span class="circle-draw"><span>Hosting</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Scalable and reliable hosting solutions for your business</h2>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"Our Shared Cloud Hosting service is designed to provide start-up businesses with cost-effective and high-performance hosting solutions."</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Hosting" class="shadow-lg rounded-6 pop-animate slide-right" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shared Cloud Hosting Overview Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Shared Cloud Hosting Packages</h2>
                            <p class="pop-animate slide-up stagger-1">With our Shared Cloud Hosting service, multiple accounts share resources under a single server. This form of hosting service perfectly fits start-up businesses as we offer small scale storage and data cap under the packages of this hosting service. The volume of accounts under our shared hosting servers is at a minimum to ensure that we maintain the optimum performance of our servers while you maximize the usage of your resources. We have three shared cloud hosting packages for you to choose from.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/1.jpg') }}" alt="Shared Cloud Hosting" class="pop-animate slide-right">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hosting Packages Section -->
            <div class="section-services">
                <div class="container">
                    <div class="hosting-packages">
                        <!-- Standard Package -->
                        <div class="hosting-package pop-animate slide-up stagger-1">
                            <img src="{{ asset('images/landing-2/images/services/2.jpg') }}" alt="Standard Package" class="pop-animate slide-up">
                            <h3>Standard</h3>
                            <ul>
                                <li>6 GB Allocated Storage</li>
                                <li>50 GB Monthly Allocated Data Cap</li>
                                <li>1 Hosted Domain</li>
                                <li>Multiple Email Accounts*</li>
                                <li>Multiple Mailing List*</li>
                                <li>Multiple Email Forwarding*</li>
                                <li>Multiple MySQL Users*</li>
                                <li>Multiple Sub-Domains*</li>
                                <li>Multiple Domain Aliases*</li>
                                <li>Multiple FTP Sub-Accounts*</li>
                                <li>Free MySQL Database</li>
                                <li>Free Live Statistics</li>
                                <li>Free Control Panel</li>
                                <li>Free Setup</li>
                                <li>Free Back-up</li>
                                <li>Custom DNS Configuration</li>
                                <li>Web-Based Email</li>
                                <li>24/7 Technical Support</li>
                                <li>30-Day Money-Back Guarantee</li>
                            </ul>
                            <a href="#inquire" class="inquire-btn">Inquire Now</a>
                        </div>

                        <!-- Deluxe Package -->
                        <div class="hosting-package pop-animate slide-up stagger-2">
                            <img src="{{ asset('images/landing-2/images/services/3.jpg') }}" alt="Deluxe Package" class="pop-animate slide-up">
                            <h3>Deluxe</h3>
                            <ul>
                                <li>9 GB Allocated Storage</li>
                                <li>100 GB Monthly Allocated Data Cap</li>
                                <li>1 Hosted Domain</li>
                                <li>Multiple Email Accounts*</li>
                                <li>Multiple Mailing List*</li>
                                <li>Multiple Email Forwarding*</li>
                                <li>Multiple MySQL Users*</li>
                                <li>Multiple Sub-Domains*</li>
                                <li>Multiple Domain Aliases*</li>
                                <li>Multiple FTP Sub-Accounts*</li>
                                <li>Free MySQL Database</li>
                                <li>Free Live Statistics</li>
                                <li>Free Control Panel</li>
                                <li>Free Setup</li>
                                <li>Free Back-up</li>
                                <li>Custom DNS Configuration</li>
                                <li>Web-Based Email</li>
                                <li>24/7 Technical Support</li>
                                <li>30-Day Money-Back Guarantee</li>
                            </ul>
                            <a href="#inquire" class="inquire-btn">Inquire Now</a>
                        </div>

                        <!-- Business Package -->
                        <div class="hosting-package pop-animate slide-up stagger-3">
                            <img src="{{ asset('images/landing-2/images/services/4.jpg') }}" alt="Business Package" class="pop-animate slide-up">
                            <h3>Business</h3>
                            <ul>
                                <li>12 GB Allocated Storage</li>
                                <li>150 GB Monthly Allocated Data Cap</li>
                                <li>1 Hosted Domain</li>
                                <li>Multiple Email Accounts*</li>
                                <li>Multiple Mailing List*</li>
                                <li>Multiple Email Forwarding*</li>
                                <li>Multiple MySQL Users*</li>
                                <li>Multiple Sub-Domains*</li>
                                <li>Multiple Domain Aliases*</li>
                                <li>Multiple FTP Sub-Accounts*</li>
                                <li>Free MySQL Database</li>
                                <li>Free Live Statistics</li>
                                <li>Free Control Panel</li>
                                <li>Free Setup</li>
                                <li>Free Back-up</li>
                                <li>Custom DNS Configuration</li>
                                <li>Web-Based Email</li>
                                <li>24/7 Technical Support</li>
                                <li>30-Day Money-Back Guarantee</li>
                            </ul>
                            <a href="#inquire" class="inquire-btn">Inquire Now</a>
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

            // Mobile menu toggle (consistent with history page)
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
