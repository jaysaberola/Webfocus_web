
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
        .section-services table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section-services th,
        .section-services td {
            border: 1px solid #e0e0e0;
            padding: 1rem;
            text-align: left;
        }
        .section-services th {
            background-color: var(--cnvs-themecolor);
            color: #fff;
            font-weight: 600;
        }
        .section-services td ul {
            list-style-type: none;
            padding-left: 0;
        }
        .section-services td ul li {
            font-size: 1.1rem;
            color: #444;
            margin-bottom: 0.5rem;
            padding-left: 0;
            text-align: justify;
        }
        .section-services td ul li:before {
            content: none;
        }
        .section-services img {
            margin-bottom: 5rem;
            max-width: 100%;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            .section-services table {
                display: block;
                overflow-x: auto;
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
                            <h1 class="display-4 fw-bold pop-animate slide-left">Our <span class="circle-draw"><span>Services</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Comprehensive IT solutions for your business needs</h2>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"We provide a wide range of digital services to help your business grow and succeed in the modern digital landscape."</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Services" class="shadow-lg rounded-6 pop-animate slide-right" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Type of Domain Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Type of Domain</h2>
                            <table class="pop-animate slide-up stagger-1">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Extensions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;">Domain Extensions</td>
                                        <td>
                                            <ul class="list-unstyled">
                                                <li><strong>Top Level Domain:</strong> .com / .net / .org</li>
                                                <li><strong>Hybrid Top Level Domain:</strong> .biz / .info / .mobi / .pro / .asia / .online</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;">Country Level Domain</td>
                                        <td>
                                            <ul class="list-unstyled">
                                                <li>.ph / .com.ph / .net.ph / .org.ph</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;">Education Domain</td>
                                        <td>
                                            <ul class="list-unstyled">
                                                <li>.edu.ph</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/1.jpg') }}" alt="Type of Domain" class="pop-animate slide-right">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Domain Name Explained Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/2.jpg') }}" alt="Domain Name Explained" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Domain Name Explained</h2>
                            <p class="pop-animate slide-up stagger-1">One of the most crucial requirements in establishing an online identity is registering a domain name. Domain names are considered very vital for any website, as it is the web address that others will use to track your website. People who would want to visit your website will type this address in the address bar of their web browsers. Most people who seek to build a great online presence tend to overlook the process of selecting a domain, which is not a right strategy to follow. A domain must always be selected only after careful review and consideration.</p>
                            <p class="pop-animate slide-up stagger-2">Practically speaking, your domain name is the core of your internet identity, your online brand. Your customers will remember this name and will use it to find your website, your products, or your services. Moreover, since no two parties can ever hold the same domain name simultaneously, your internet identity is totally unique.</p>
                            <p class="pop-animate slide-up stagger-3">A domain name is more than your internet address: it's your global identity. It puts you on the map of today's online world, opening you to literally millions of users worldwide. When you register a domain name, you'll join millions of others who are reaping the rewards of being on the web.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selection of Domain Names Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Selection of Domain Names</h2>
                            <p class="pop-animate slide-up stagger-1">Choosing the perfect domain name is crucial to the survival of your website no matter what type of site you want to build. A lot of times, people get so caught up in the design process that they forget that their domain name will usually be the first thing people see and remember.</p>
                            <p class="pop-animate slide-up stagger-2">Here’s a basic set of principles that one must follow while picking any domain name:</p>
                            <ul class="pop-animate slide-up stagger-3">
                                <li>It should be unique & short</li>
                                <li>It should be rich in keywords</li>
                                <li>It should be suggestive to the nature of the business</li>
                                <li>It should be simple and easy to memorize</li>
                                <li>It should be easy to spell and should not be complicated</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/3.jpg') }}" alt="Selection of Domain Names" class="pop-animate slide-right">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Domain Registrar Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/4.jpg') }}" alt="Domain Registrar" class="pop-animate slide-left">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Domain Registrar</h2>
                            <p class="pop-animate slide-up stagger-1">A domain registrar is basically a registered organization that is authorized by domain governing bodies to register domains. As there are several companies that provide this service, choosing one will not be difficult.</p>
                            <p class="pop-animate slide-up stagger-2">Domain names aren't actually bought and sold. In reality, they are only registered for a set period of time, usually one or two years. Once expired, anyone else may be able to register the same domain and claim ownership for a further period, unless the registration is renewed within a specific time period. Therefore, to take care of all those registrations, administer domains effectively, and provide efficient service to domain name owners, private companies are accredited by the Internet Corporation for Assigned Names and Numbers (ICANN) to serve as domain registrars.</p>
                            <p class="pop-animate slide-up stagger-3">Here are some tips that you can follow while selecting a domain registrar:</p>
                            <ul class="pop-animate slide-up stagger-4">
                                <li>Choose an ICANN accredited domain registrar</li>
                                <li>Choose a registrar that offers reasonable prices</li>
                                <li>Choose a registrar that offers complete customer support</li>
                                <li>Choose a registrar that offers add-on services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Domain Name Registration Section -->
            <div class="section-services">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h2 class="pop-animate slide-up">Domain Name Registration</h2>
                            <p class="pop-animate slide-up stagger-1">These designated registrars can process your domain name registration on your behalf and will pass the costs of this process to you, including additional fees for providing this service. They will provide a domain search service, allowing you to search for domains and check their availability. Many also provide additional services, which they usually include under the same registration fee. These services include customer service and support, administration tools, and sometimes even a free single webpage you can use for your business while your final website is still being built.</p>
                            <p class="pop-animate slide-up stagger-2">When you have selected the name that you wish to register, it is time for you to register it. The domain name registration is one of the most crucial steps in building an online identity, as a registered domain becomes a legal entity of the domain registrant and no other company or individual has any right to it. The process of registering a domain has become much simpler over the past few years.</p>
                            <p class="pop-animate slide-up stagger-3">WebFocus is the Philippines' most trusted domain name registrar and continues to provide the most value for the best possible price. Give your website a home with a WebFocus domain name!</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/services/5.jpg') }}" alt="Domain Name Registration" class="pop-animate slide-right">
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
