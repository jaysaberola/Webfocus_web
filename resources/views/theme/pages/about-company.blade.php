
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
            padding: 5rem 0;
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
        }
        .about-hero h1 .circle-draw {
            position: relative;
            display: inline-block;
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
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold pop-animate slide-left">Our <span class="circle-draw"><span>Company</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Tailored solutions for your unique needs</h2>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"We believe in tailoring a service that suits your needs, whether it is for a website design or a web development project."</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Our Approach" class="shadow-lg rounded-6 pop-animate slide-right" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Content -->
            <div class="section-about">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Our Approach</h2>
                            <p class="pop-animate slide-up stagger-1">We believe in tailoring a service that suits your needs, whether it is for a website design or a web development project. In order to give you the best possible service, we first assign our top consultants to assess your current need.</p>
                            <p class="pop-animate slide-up stagger-2">A solution which is personalized is then developed to tackle your very need with consideration to the list of requirements and budget. We do not simply provide cookie-cutter solutions. There is no one-size that fits all client needs. Rest assured, the end result will be more than satisfactory thanks to our team of highly-skilled I.T. professionals.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/1.jpg') }}" alt="Our Approach" class="pop-animate slide-right">
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/2.jpg') }}" alt="Innovation" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Innovation</h2>
                            <p class="pop-animate slide-up stagger-1">We know that technology continues to evolve over time. We can confidently say that our designers, developers, system engineers, and other members of our team are always updated with the latest in technology.</p>
                            <p class="pop-animate slide-up stagger-2">We make sure that our clients’ websites and applications remain updated with the latest tech stacks so that they perform exceptionally well. Our team ensures that best practices are observed, whether it’s for designing a website, developing the backend, or even both.</p>
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Security</h2>
                            <p class="pop-animate slide-up stagger-1">Cybersecurity attacks grow exponentially every day, to the point that it can now become a part of everyone’s daily lives without people even being aware of it. There are millions of phishing, brute force attacks, and even social engineering attacks carried out every day. Thus, we make sure that your websites, applications, and servers are secured from cybersecurity threats. We help protect your online assets.</p>
                            <p class="pop-animate slide-up stagger-2">We prioritize the protection of our clients as well as our clients’ customers. Even before developing websites and applications, we make sure to take security into consideration during the planning and the development. We know the value of security for everyone involved. We also educate our clients on how to actively prevent cyberattacks on their end.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/3.jpg') }}" alt="Security" class="pop-animate slide-right">
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/4.jpg') }}" alt="Customer Service" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Customer Service</h2>
                            <p class="pop-animate slide-up stagger-1">We value the relationship we have with our clients and customers. We make it a point to answer all questions and to ensure that our clients are more than satisfied with our IT services.</p>
                            <p class="pop-animate slide-up stagger-2">Should there be a problem with your website, we are always available to investigate the issue and carry out a solution quickly in order to minimize the downtime of your site. Our tailored approach also ensures that our clients get exactly what they need. Customer satisfaction is a priority for us.</p>
                        </div>
                    </div>
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Return on Investment</h2>
                            <p class="pop-animate slide-up stagger-1">We understand that clients need to generate a return on investment from the websites, web apps, and mobile apps that we make. In the previous decade, we built up a reputation for creating a positive return on investment to our clients.</p>
                            <p class="pop-animate slide-up stagger-2">It has been proven time and time again that we deliver great value for clients who acquire our I.T. services. We provide value to our clients in the best way we can.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/5.jpg') }}" alt="Return on Investment" class="pop-animate slide-right">
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

