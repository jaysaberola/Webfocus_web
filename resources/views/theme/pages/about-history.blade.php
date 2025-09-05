@extends('theme.main')

@section('pagecss')

    <style>
        /* Match home page body styling */
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

        /* Hero Section - matching home page hero */
        .about-hero {
            background: transparent;
            color: #333;
            padding: 9rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 5rem;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .about-hero h1 .circle-draw {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .about-hero h1 .circle-draw svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
            z-index: -1;
        }
        .about-hero h1 .circle-draw span {
            position: relative;
            z-index: 1;
        }
        .about-hero .lead {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        /* About sections - matching home page section styling */
        .section-about {
            padding: 2rem 0;
            background-color: #fff;
        }
        .section-about h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .section-about p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #666;
            margin-bottom: 1.5rem;
        }
        .section-about .bi {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.2rem;
            font-size: 1rem;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .section-about .icon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-bottom: 1rem;
        }
        .section-about img {
            margin-bottom: 5rem;
            max-width: 100%;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2.5rem;
            }
            .section-about h2 {
                font-size: 2rem;
            }
            .section-about {
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
            <div class="about-hero mb-md-6">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <h1 class="display-4 fw-bold pop-animate slide-left"> Our  <span class="circle-draw"><span>  History </span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Discover our journey, values, and commitment to excellence</h2>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"WebFocus has been in the business of providing the best I.T. Solutions in the Philippines since 2001."</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Content -->
            <div class="section-about">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Web Design & Development</h2>
                            <p class="pop-animate slide-up stagger-1">We offer not only website design for our clients, we also provide the actual web development to fully build projects from scratch. The company understands the importance of having a holistic approach to constructing websites that generate both inbound traffic and leads to our clients.</p>
                            <p class="pop-animate slide-up stagger-2">All of our client websites are made with the latest technology in the web development industry. We ensure that the websites are responsive to any devices and that they are secure to protect both clients and their customers.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/1.jpg') }}" alt="Web Design & Development" class="pop-animate slide-right">
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/2.jpg') }}" alt="Web Hosting" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Web Hosting</h2>
                            <p class="pop-animate slide-up stagger-1">As our portfolio grew more in the following years, we soon offered web hosting as part of their services. Web hosting is arguably one of the most important factors in the success of any website and we understand that. Our web hosting services ensure that client’s websites load lightning fast and are well taken care of with virtually no downtime.</p>
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Managed I.T. Services</h2>
                            <p class="pop-animate slide-up stagger-1">We value the importance of time. We know that not everyone will be able to keep an eye on our online operations which is why we introduced our new managed I.T. services. Clients can focus more on other important aspects of their business while WSI takes care of their I.T. needs.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/3.jpg') }}" alt="Managed I.T. Services" class="pop-animate slide-right">
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/4.jpg') }}" alt="Continuous Innovation" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Continuous Innovation</h2>
                            <p class="pop-animate slide-up stagger-1">Even while still providing excellent quality through our website services, we continue to innovate. Today, we are still expanding our line of new I.T. services such as Mobile Application development, and Web App Development and System Development.</p>
                            <p class="pop-animate slide-up stagger-2">We know how to keep up with the fast pace of technology and we will not be left behind. We continue to provide outstanding web and I.T. services as evident in our clients’ testimonials and through our extensive portfolio.</p>
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
