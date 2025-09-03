
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
                            <h1 class="display-4 fw-bold pop-animate slide-left"><span class="circle-draw"><span>Document Management System</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Go paperless and share digital documents easily</h2>
                            <h3 class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2 mx-auto">"Streamline your document management with secure, efficient, and paperless solutions tailored for your organization."</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Document Management System Overview Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Document Management System</h2>
                            <p class="pop-animate slide-up stagger-1">We are an accredited implementation partner for document management system software applications that will help your organization to create e-documents, collaboratively edit and finalize these, completely secure and share documents within the organization. These applications allow the client to easily manage the entire document lifecycle online without paperwork and avoiding time-consuming steps. The DMS is the perfect application for ISO accreditation requirements, and also the ideal solution to reducing the use of papers and inks.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/document.jpg') }}" alt="Document Management System" class="pop-animate slide-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FileHold DMS Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/file.jpg') }}" alt="FileHold DMS" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">FileHold Document Management</h2>
                            <p class="pop-animate slide-up stagger-1">Go paperless! FileHold is a document management and records management software solution that turns cabinets of paper and electronic files into an organized, highly secure library and allows organizations to fast track to the paperless office. FileHold is easy to use, easy to install, and is affordable for small to large organizations. It integrates with existing applications and enriches Microsoft SharePoint deployments.</p>
                            <p class="pop-animate slide-up stagger-2">Features include web access, search, version control, tagging, workflow, secure user rights, mark up and annotations, redaction, scanning, OCR and indexing. Records Management features allow records to be converted to archives, put into legal hold, or be scheduled for final disposition.</p>
                            <a href="#inquire" class="inquire-btn pop-animate slide-up stagger-3">Inquire Now</a>
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
