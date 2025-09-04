
@extends('theme.main')

@section('pagecss')
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">

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
                            <h1 class="display-4 fw-bold pop-animate slide-left"><span class="circle-draw"><span>Web Development</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Creative and effective web design services for all businesses</h2>
                            <h3 class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2 mx-auto">"WebFocus Solutions, Inc. builds tailored, fast-loading, and user-friendly websites to help your business stand out."</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Website Development Packages Section -->
            <div class="section-services">
                <div class="container">
                    <div class="website-packages" style="display: flex; gap: 20px; align-items: stretch;">
                        <!-- WordPress Website Development -->
                        <div class="website-package pop-animate slide-up stagger-1" style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <img src="{{ asset('images/landing-2/images/services/wordpress.png') }}" alt="WordPress Website Development" class="pop-animate slide-up" style="max-width: 100%; height: auto;">
                            <h3>WordPress Website Development</h3>
                            <p class="pop-animate slide-up stagger-2">Our WordPress website development service offers a robust and user-friendly solution for businesses looking to establish a strong online presence. With a focus on flexibility and ease of use, we create websites that are both visually appealing and functional.</p>
                            <ul class="pop-animate slide-up stagger-3">
                                <li>Theme-Based Design</li>
                                <li>Layout and Content Population up to five (5) Pages</li>
                                <li>Basic Banner Manager</li>
                                <li>Media Library</li>
                                <li>Responsive Design and Browser Compatibility*</li>
                                <li>One (1) inquiry form up to five (5) fields</li>
                                <li>Social Media Integration</li>
                                <li>Google Analytics Integration</li>
                            </ul>
                            <p class="pop-animate slide-up stagger-4">*Responsive design and browser compatibility will depend on the template chosen by the client.</p>
                            <a href="#inquire-wordpress" class="inquire-btn pop-animate slide-up stagger-5">Inquire Now</a>
                        </div>

                        <!-- Premium Website Development -->
                        <div class="website-package pop-animate slide-up stagger-1" style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <img src="{{ asset('images/landing-2/images/services/cms.jpg') }}" alt="Premium Website Development" class="pop-animate slide-up" style="max-width: 100%; height: 25.3%;">
                            <h3>Premium Website Development</h3>
                            <p class="pop-animate slide-up stagger-2">Our premium website development service is tailored for businesses that require a custom-built solution with advanced features. We provide a fully customized CMS to give you complete control over your website's content and functionality.</p>
                            <ul class="pop-animate slide-up stagger-3">
                                <li>Custom-Built CMS (Content Management System)</li>
                                <li>Responsive/Mobile-Ready Design</li>
                                <li>SEO-Ready</li>
                                <li>One (1) electronic inquiry form up to 10 fields secured with Google re-CAPTCHA</li>
                                <li>Free Google Analytics Integration</li>
                                <li>Free Page Manager</li>
                                <li>Free File Manager</li>
                                <li>Free Banner Manager</li>
                                <li>Free News Manager</li>
                                <li>Free User Manager</li>
                            </ul>
                            <a href="#inquire-premium" class="inquire-btn pop-animate slide-up stagger-4">Inquire Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-12">
                            <h2 class="pop-animate slide-up">E-Commerce</h2>
                            <p class="pop-animate slide-up stagger-1">WebFocus provides secure and efficient e-commerce solutions, from simple online stores to advanced B2B platforms. With SSL encryption and fast payment processing, buying and selling online is safe, quick, and convenient.</p>      
                         </div>
                         </div>
                </div>

            <!-- Why Choose WebFocus Solutions Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-12">
                            <h2 class="pop-animate slide-up">Why Choose WebFocus Solutions</h2>
                            <p class="pop-animate slide-up stagger-1">Who do you need? A web designer or a web programmer? Luckily, we have both! If you want an artsy web design, we can use up all of our creative juices just for you. If you prefer a geeky website, we can speak the programming language for your satisfaction.</p>
                            <p class="pop-animate slide-up stagger-2">Your website has to be functional, user-friendly, and informative. We understand your needs and know how to create a tailored web design that fits your business. Our designs are fast-loading, browser-compatible, easy-to-use, and visually appealing. At WebFocus Solutions, Inc., we don’t settle for template-based designs. We face the challenge of making every website one-of-a-kind because every company is unique, and every client is special.</p>
                            <p class="pop-animate slide-up stagger-3">WebFocus Solutions, Inc. is a Philippine-based website development company with over 17 years of industry experience. With a team of more than 50 highly-skilled professionals, we’ve served over 1,600 satisfied clients. Our production team includes some of the finest web developers in the Philippines, from graphics designers to database programmers, ensuring top-quality websites that balance stunning visuals with easy navigation.</p>
                            <p class="pop-animate slide-up stagger-4">Our team is trained to produce websites that are both creative and intuitive, ensuring customers can navigate your site effortlessly while being captivated by its design. We work with one goal in mind: to satisfy our customers. When you see a website with stunning graphics and seamless navigation, it’s likely one of our masterpieces.</p>
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
