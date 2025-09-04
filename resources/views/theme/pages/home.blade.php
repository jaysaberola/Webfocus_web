@extends('theme.main')
@section('pagecss')
    <!-- Bootstrap CSS (assumed to be in theme.main) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">

    <style>
        /* Pop Animation Styles */
        .pop-animate {
            opacity: 1; /* Elements are visible by default */
            transform: translateY(0) scale(1); /* No transform by default */
            transition: opacity 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275), transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* Apply hidden state when JavaScript is ready */
        .js-ready .pop-animate {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }

        .js-ready .pop-animate.animate {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        /* Stagger animation delays */
        .pop-animate.stagger-1 { transition-delay: 0.1s; }
        .pop-animate.stagger-2 { transition-delay: 0.2s; }
        .pop-animate.stagger-3 { transition-delay: 0.3s; }
        .pop-animate.stagger-4 { transition-delay: 0.4s; }
        .pop-animate.stagger-5 { transition-delay: 0.5s; }

        /* Slide animations */
        .js-ready .pop-animate.slide-up {
            transform: translateY(50px);
        }
        .js-ready .pop-animate.slide-up.animate {
            transform: translateY(0);
        }

        .js-ready .pop-animate.slide-left {
            transform: translateX(-50px);
        }
        .js-ready .pop-animate.slide-left.animate {
            transform: translateX(0);
        }

        .js-ready .pop-animate.slide-right {
            transform: translateX(50px);
        }
        .js-ready .pop-animate.slide-right.animate {
            transform: translateX(0);
        }

        .js-ready .pop-animate.rotate {
            transform: rotate(-10deg) scale(0.95);
        }
        .js-ready .pop-animate.rotate.animate {
            transform: rotate(0deg) scale(1);
        }

        /* Ensure visibility if JavaScript is disabled */
        .pop-animate:not(.js-ready) {
            opacity: 1 !important;
            transform: none !important;
        }

        /* Carousel Styles */
        .testimonial-carousel .card {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .testimonial-carousel .card img {
            max-width: 100px;
            margin: 0 auto 15px;
        }

        .testimonial-carousel .card p {
            font-size: 1rem;
            font-style: italic;
            margin: 0 auto 15px;
            flex-grow: 1;
            max-width: 80%;
        }

        .testimonial-carousel .card h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .testimonial-carousel .card .position {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }

        .testimonial-carousel .flexslider {
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .testimonial-carousel .flex-control-nav {
            position: relative;
            bottom: -10px;
            text-align: center;
        }

        .testimonial-carousel .flex-control-paging li a {
            background: #ccc;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            text-indent: -9999px;
        }

        .testimonial-carousel .flex-control-paging li a.flex-active {
            background: var(--cnvs-themecolor);
        }

        .submit-testimonial-btn {
            margin-top: 50px;
            display: block;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .sub-title-extra {
            font-family: 'times new roman';
            font-size: 24px;
            opacity: .8;
        }
        .qoute-svg {
            position: absolute;
            top: -45px;
            left: -36px;
            height: 10rem !important;
            z-index: 0;
            opacity: .1;
            transform: scaleX(-1);
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
            <div class="section-1 mb-md-6">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-5">
                            <h1 class="display-4 fw-bold pop-animate slide-left">Build your own <br /> Future with <br /> <span class="circle-draw"><span>Webfocus</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <small class="pop-animate slide-left stagger-1"><i>Your solution in innovative digital transformation.</i></small>
                            <br />
                            <p class="mt-5 sub-title-extra position-relative">
                                <svg class="w-40 h-40 qoute-svg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                  <path fill-rule="evenodd" d="M6 6a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3H5a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2H6Zm9 0a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3h-1a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2h-3Z" clip-rule="evenodd"/>
                                </svg>
                                    <i>We are at the forefront of Digital IT Solutions <br /> in the Philippines. Find out why and how <br /> we can provide you value.</i>
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Image" class="shadow-lg rounded-6 pop-animate slide-right" width="720">
                            <img src="{{ asset('images/landing-2/images/hero-iphone-wf.png') }}" alt="Image" width="150" class="position-absolute mt-5 d-block d-lg-none pop-animate rotate stagger-1" style="right: 0; bottom: 0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear mt-5 mt-lg-0"></div>

            <div class="section-2 mt-5 mt-lg-0">
                <div class="container p-4 p-sm-5 p-md-6 rounded-6" style="background: linear-gradient(to bottom left, rgba(255, 224, 54, .3), rgba(216, 220, 232, .5) 70%);">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="display-5 fw-bold lh-base mb-5 pop-animate slide-up">Webfocus is the leading web development company in the Philippines since <span class="circle-draw"><span> 2001 </span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119.584"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span>.</h2>
                            <p class="mb-5 pop-animate slide-up stagger-1">WebFocus Solutions, Inc. is the leading provider of IT Solutions in the Philippines. We have enthusiastically served more than 1,600 clients, and the number keeps on growing.</p>
                            <div class="row align-items-center flex-row mt-4 gx-5 op-07">
                                <div class="col pop-animate stagger-1"><img src="{{ asset('images/conference/images/sponcors/amazon.svg') }}" alt="Clients"></div>
                                <div class="col pop-animate stagger-2"><img src="{{ asset('images/conference/images/sponcors/netflix.svg') }}" alt="Clients"></div>
                                <div class="col pop-animate stagger-3"><img src="{{ asset('images/conference/images/sponcors/google.svg') }}" alt="Clients"></div>
                                <div class="col pop-animate stagger-4"><img src="{{ asset('images/conference/images/sponcors/linkedin.svg') }}" alt="Clients"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-scroll d-none d-lg-block">
                <div class="section-sticky">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="position-relative">
                                    <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Image" class="position-relative op-0">
                                    <img src="{{ asset('images/landing-2/images/hero-iphone-2.png') }}" alt="Image" width="220" class="position-absolute mb-5" style="right: 0; bottom: -50px; opacity: 0;" data-200-start="transform: translate(0px, 0px); opacity: 0;" data-top-bottom="transform: translate(-260px, -60px); opacity: 1;">
                                    <img src="{{ asset('images/landing-2/images/hero-iphone-wf.png') }}" alt="Image" width="220" class="position-absolute mb-5" style="right: 0; bottom: -60px;" data-0="transform: translate(0px, 0px) scale(1); bottom: -60px;" data-top-bottom="transform: translate(-60px, 60px) scale(1.3); bottom: 63px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-lg-6 mw-md mt-5">
            <div class="text-center mb-lg-6">
                <h2 class="mb-1 display-6 fw-bold pop-animate slide-up">Services that we <span class="circle-draw"><span>Offer</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h2>
                <h4 class="fw-normal pop-animate slide-up stagger-1">As a key player in the IT industry, we have proven that our services work and sell. With that, we have expanded our horizon in order to meet the needs and demands of our clients.</h4>
            </div>

            <div class="clear"></div>

            <div class="overflow-hidden">
                <div class="row gutter-custom justify-content-center" style="--custom-gutter: 80px;">
                    <div class="col-sm-6">
                        <div class="card border-0 pop-animate stagger-1">
                            <img src="{{ asset('images/landing-2/images/services/3.jpg') }}" alt="card img" class="rounded-5 mb-3">
                            <div class="card-body">
                                <h2 class="text-transform-none fw-semibold h5 mb-3">Domain</h2>
                                <p class="mb-4">We can help you elevate your business online, and there is no better way to start than choosing your domain name, one that is unique and fully represents your business.</p>
                                <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill text-dark m-0 wf-btn">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card border-0 pop-animate stagger-2">
                            <img src="{{ asset('images/landing-2/images/services/2.jpg') }}" alt="card img" class="rounded-5 mb-3">
                            <div class="card-body">
                                <h2 class="text-transform-none fw-semibold h5 mb-3">Email and Web Hosting</h2>
                                <p class="mb-4">We offer powerful hosting solutions that are affordable and can store websites with fully integrated Internet solutions for both small and big organizations.</p>
                                <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill text-dark m-0 wf-btn">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card border-0 pop-animate stagger-3">
                            <img src="{{ asset('images/landing-2/images/services/1.jpg') }}" alt="card img" class="rounded-5 mb-3">
                            <div class="card-body">
                                <h2 class="text-transform-none fw-semibold h5 mb-3">Web Development</h2>
                                <p class="mb-4">Design the system, Automate the process, Transform your business. We cater a wide range of custom-built web solutions that transform business processes on the web.</p>
                                <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill text-dark m-0 wf-btn">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card border-0 pop-animate stagger-4">
                            <img src="{{ asset('images/landing-2/images/services/4.jpg') }}" alt="card img" class="rounded-5 mb-3">
                            <div class="card-body">
                                <h2 class="text-transform-none fw-semibold h5 mb-3">Pre-made Niche Demos</h2>
                                <p class="mb-4">Powerful Layout with Responsive functionality that can be adapted.</p>
                                <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill text-dark m-0 wf-btn">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-showcase-sticky sticky-top p-0 mb-0 overflow-visible">
            <div class="row g-0">
                <div class="col-md-6 position-sticky m-0 vh-40 min-vh-md-100 top-0 z-1 overflow-hidden">
                    <!-- Sticky Image Target -->
                    <div id="list-example" class="w-100 h-100" style="background: url('{{ asset('images/landing-2/images/sticky-section/video-poster.jpg') }}') no-repeat center center / cover;">
                        <!-- List Item 1 -->
                        <div class="list-group-item active" id="list-item-1-target">
                            <div class="video-wrap no-placeholder">
                                <video id="slide-video" poster="{{ asset('images/landing-2/images/sticky-section/video-poster.jpg') }}" preload="auto" loop autoplay muted playsinline>
                                    <source src="{{ asset('images/landing-2/images/sticky-section/video.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <!-- List Item 2 -->
                        <div class="list-group-item" id="list-item-2-target">
                            <div class="fslider position-absolute h-100 w-100 top-0 start-0" data-loop="true" data-pause="5000" data-animation="fade">
                                <div class="flexslider h-100">
                                    <div class="slider-wrap">
                                        <div class="slide" style="background: url('{{ asset('images/landing-2/images/sticky-section/2-1.jpg') }}') center right; background-size: cover; height: 100% !important;"></div>
                                        <div class="slide" style="background: url('{{ asset('images/landing-2/images/sticky-section/2-2.jpg') }}') center right; background-size: cover; height: 100% !important;"></div>
                                    </div>
                                </div>
                            </div>
                            <a href="https://vimeo.com/87766904" data-lightbox="iframe" class="bi-play-fill icon-stacked transform-ts bg-white h-bg-light rounded-circle text-dark h1 text-center ps-1 shadow z-9 m-0"></a>
                        </div>
                        <!-- List Item 3 -->
                        <div class="list-group-item" id="list-item-3-target" style="background-image: url('{{ asset('images/landing-2/images/sticky-section/3.jpg') }}');">
                            <a href="{{ asset('images/landing-2/images/sticky-section/3.jpg') }}" data-lightbox="image" class="bi-image icon-stacked transform-ts bg-white h-bg-light rounded-circle text-dark h1 text-center shadow m-0"></a>
                        </div>
                        <!-- List Item 4 -->
                        <div class="list-group-item" id="list-item-4-target" style="background-image: url('{{ asset('images/landing-2/images/sticky-section/1.jpg') }}');">
                            <a href="#" class="bi-link icon-stacked transform-ts bg-white h-bg-light rounded-circle text-dark h1 text-center shadow m-0"></a>
                        </div>
                    </div>
                </div>
                <!-- List Item Content -->
                <div class="col-md-6 list-group-content">
                    <!-- List Item Content 1 -->
                    <div id="list-item-1" class="min-vh-md-100 py-5 py-md-6 bg-appstore dark viewport-detect" data-viewport-rootmargin="0px 0px -40%" data-viewport-class="active" data-viewport-class-target="#list-item-1-target">
                        <i class="bi-award display-4 mb-4 color"></i>
                        <h2 class="display-4 fw-normal font-secondary"><span class="nocolor op-05">Our main Priority is of-course </span>Quality<span>.</span></h2>
                        <p class="fs-5 fw-light op-07">Monotonectally extend go forward data for pandemic deliverables. Proactively benchmark open-source human capital whereas cutting-edge "outside the box".</p>
                        <div>
                            <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill h-text-dark color op-08 h-op-1 m-0">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                        </div>
                    </div>
                    <!-- List Item Content 2 -->
                    <div id="list-item-2" class="min-vh-md-100 py-5 py-md-6 bg-appstore dark viewport-detect" data-viewport-rootmargin="0px 0px -40%" data-viewport-class="active" data-viewport-class-target="#list-item-2-target">
                        <i class="bi-tools display-4 mb-4 color"></i>
                        <h2 class="display-4 fw-normal font-secondary"><span class="nocolor op-05">Easy</span> Customization<span>.</span></h2>
                        <p class="fs-5 fw-light op-07">Monotonectally extend go forward data for pandemic deliverables. Proactively benchmark open-source human capital whereas cutting-edge "outside the box".</p>
                        <div>
                            <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill h-text-dark color op-08 h-op-1 m-0">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                        </div>
                    </div>
                    <!-- List Item Content 3 -->
                    <div id="list-item-3" class="min-vh-md-100 py-5 py-md-6 bg-appstore dark viewport-detect" data-viewport-rootmargin="0px 0px -40%" data-viewport-class="active" data-viewport-class-target="#list-item-3-target">
                        <i class="bi-people display-4 mb-4 color"></i>
                        <h2 class="display-4 fw-normal font-secondary"><span class="nocolor op-05">How we connect with your </span> Customers<span>.</span></h2>
                        <p class="fs-5 fw-light op-07">Monotonectally extend go forward data for pandemic deliverables. Proactively benchmark open-source human capital whereas cutting-edge "outside the box".</p>
                        <div>
                            <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill h-text-dark color op-08 h-op-1 m-0">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                        </div>
                    </div>
                    <!-- List Item Content 4 -->
                    <div id="list-item-4" class="min-vh-md-100 py-5 py-md-6 bg-appstore dark viewport-detect" data-viewport-rootmargin="0px 0px -40%" data-viewport-class="active" data-viewport-class-target="#list-item-4-target">
                        <i class="bi-emoji-smile display-4 mb-4 color"></i>
                        <h2 class="display-4 fw-normal font-secondary"><span class="nocolor op-05">More than </span>60K+<span class="nocolor op-05"> Happy Customers</span><span>.</span></h2>
                        <p class="fs-5 fw-light op-07">Monotonectally extend go forward data for pandemic deliverables. Proactively benchmark open-source human capital whereas cutting-edge "outside the box".</p>
                        <div>
                            <a href="#" class="button button-small button-light button-border border-color h-bg-color rounded-pill h-text-dark color op-08 h-op-1 m-0">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section my-0 bg-transparent">
            <div class="container py-lg-5">
                <div class="text-center mb-lg-6">
                    <h2 class="mb-1 display-5 fw-bold pop-animate slide-up">Hosting <span class="circle-draw"><span>Packages</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h2>
                    <h4 class="fw-normal pop-animate slide-up stagger-1">Professionally orchestrate plug-and-play action items.</h4>
                </div>
                <div class="clear mb-4"></div>
                <div class="row justify-content-center gy-5" style="--bs-gutter-x: 60px">
                    <div class="col-lg-4">
                        <div class="card border-0 bg-color rounded-6 pt-0 pop-animate slide-left">
                            <div class="card-body text-center p-5 pt-0">
                                <i class="bi-person h2 m-0 bg-white rounded-circle icon-stacked text-center" style="transform: translateY(-32px);"></i>
                                <h2 class="text-transform-none fw-bold fs-2 mb-0">Standard</h2>
                                <p>For individuals and small projects.</p>
                                <div class="text-start my-4 d-flex flex-column justify-content-center align-items-center text-start">
                                    <div>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 6 GB Allocated Storage</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 50 GB Monthly Allocated Data Cap</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 1 Hosted Domain</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Email Accounts</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Mailing List</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Email Forwarding</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple MySQL Users</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Sub-Domains</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Domain Aliases</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple FTP Sub-Accounts</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free MySQL Database</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Live Statistics</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Control Panel</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Setup</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Back-up</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Custom DNS Configuration</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Web-Based Email</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 24/7 Technical Support</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 30-Day Money-Back Guarantee</h4>
                                    </div>
                                </div>
                                <a href="#" class="button button-xlarge bg-white text-dark px-5 py-3 w-100 rounded-pill h-op-09 m-0">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 rounded-6 pt-0 pop-animate slide-up" style="background: linear-gradient(to bottom left, rgba(255, 224, 54, .3), rgba(216, 220, 232, .5) 70%);">
                            <div class="card-body text-center p-5 pt-0">
                                <i class="bi-credit-card-2-back h2 m-0 rounded-circle icon-stacked text-center bg-white text-dark" style="transform: translateY(-32px);"></i>
                                <h2 class="text-transform-none fw-bold fs-2 mb-0">Deluxe</h2>
                                <p>For growing businesses.</p>
                                <div class="text-start my-4 d-flex flex-column justify-content-center align-items-center text-start">
                                    <div>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 9 GB Allocated Storage</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 100 GB Monthly Allocated Data Cap</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 1 Hosted Domain</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Email Accounts</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Mailing List</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Email Forwarding</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple MySQL Users</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Sub-Domains</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Domain Aliases</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple FTP Sub-Accounts</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free MySQL Database</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Live Statistics</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Control Panel</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Setup</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Back-up</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Custom DNS Configuration</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Web-Based Email</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 24/7 Technical Support</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 30-Day Money-Back Guarantee</h4>
                                    </div>
                                </div>
                                <a href="#" class="button button-xlarge bg-white text-dark px-5 py-3 w-100 rounded-pill h-op-09 m-0">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 rounded-6 pt-0 pop-animate slide-right" style="background: linear-gradient(to bottom left, rgba(255, 224, 54, .3), rgba(216, 220, 232, .5) 70%);">
                            <div class="card-body text-center p-5 pt-0">
                                <i class="bi-briefcase h2 m-0 rounded-circle icon-stacked text-center bg-white text-dark" style="transform: translateY(-32px);"></i>
                                <h2 class="text-transform-none fw-bold fs-2 mb-0">Business</h2>
                                <p>For team work or organizations.</p>
                                <div class="text-start my-4 d-flex flex-column justify-content-center align-items-center text-start">
                                    <div>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 12 GB Allocated Storage</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 150 GB Monthly Allocated Data Cap</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 1 Hosted Domain</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Email Accounts</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Mailing List</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Email Forwarding</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple MySQL Users</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Sub-Domains</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple Domain Aliases</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Multiple FTP Sub-Accounts</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free MySQL Database</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Live Statistics</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Control Panel</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Setup</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Free Back-up</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Custom DNS Configuration</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> Web-Based Email</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 24/7 Technical Support</h4>
                                        <h4 class="mb-3 h6 fw-medium"><i class="bi-check-circle-fill me-2"></i> 30-Day Money-Back Guarantee</h4>
                                    </div>
                                </div>
                                <a href="#" class="button button-xlarge bg-white text-dark px-5 py-3 w-100 rounded-pill h-op-09 m-0">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 mt-lg-6">
                        <h2 class="mb-5 display-6 fw-bold">Pricing FAQs</h2>
                        <div class="px-lg-6 p-5 rounded" style="background: linear-gradient(to bottom left, rgba(255, 224, 54, .15), rgba(216, 220, 232, .3) 70%);">
                            <div class="toggle py-4 border-bottom mb-0" style="--cnvs-toggle-font-size: 1.125rem;">
                                <div class="toggle-header align-items-center">
                                    <div class="toggle-title fw-semibold">How will I get my Project after Subscribed?</div>
                                    <div class="toggle-icon">
                                        <i class="toggle-closed bi bi-plus-circle fs-4 op-05"></i>
                                        <i class="toggle-open bi bi-dash-circle fs-4"></i>
                                    </div>
                                </div>
                                <div class="toggle-content fs-6">Competently myocardinate sticky technology through competitive testing procedures. Progressively engineer customer directed e-services before frictionless scenarios. Objectively strategize next-generation web services for professional catalysts for change. Quickly productize clicks-and-mortar schemas for collaborative e-business. Dynamically customize user friendly leadership skills and interactive e-services. Objectively actualize virtual imperatives vis-a-vis enabled.</div>
                            </div>
                            <div class="toggle py-4 border-bottom mb-0" style="--cnvs-toggle-font-size: 1.125rem;">
                                <div class="toggle-header align-items-center">
                                    <div class="toggle-title fw-semibold">Can I cancel anytime my Subscription?</div>
                                    <div class="toggle-icon">
                                        <i class="toggle-closed bi bi-plus-circle fs-4 op-05"></i>
                                        <i class="toggle-open bi bi-dash-circle fs-4"></i>
                                    </div>
                                </div>
                                <div class="toggle-content fs-6">Competently myocardinate sticky technology through competitive testing procedures. Progressively engineer customer directed e-services before frictionless scenarios. Objectively strategize next-generation web services for professional catalysts for change. Quickly productize clicks-and-mortar schemas for collaborative e-business. Dynamically customize user friendly leadership skills and interactive e-services. Objectively actualize virtual imperatives vis-a-vis enabled.<br><br>Voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                            </div>
                            <div class="toggle py-4 border-bottom mb-0" style="--cnvs-toggle-font-size: 1.125rem;">
                                <div class="toggle-header align-items-center">
                                    <div class="toggle-title fw-semibold">How does Business Plan work?</div>
                                    <div class="toggle-icon">
                                        <i class="toggle-closed bi bi-plus-circle fs-4 op-05"></i>
                                        <i class="toggle-open bi bi-dash-circle fs-4"></i>
                                    </div>
                                </div>
                                <div class="toggle-content fs-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                            </div>
                            <div class="toggle py-4 mb-0" style="--cnvs-toggle-font-size: 1.125rem;">
                                <div class="toggle-header align-items-center">
                                    <div class="toggle-title fw-semibold">Is there any hidden charges?</div>
                                    <div class="toggle-icon">
                                        <i class="toggle-closed bi bi-plus-circle fs-4 op-05"></i>
                                        <i class="toggle-open bi bi-dash-circle fs-4"></i>
                                    </div>
                                </div>
                                <div class="toggle-content fs-6">Compellingly morph virtual niche markets vis-a-vis excellent paradigms. Assertively orchestrate quality deliverables vis-a-vis cross-unit e-commerce. Proactively deploy fully tested paradigms for cross-media content. Conveniently implement cross-media processes whereas highly efficient opportunities. Objectively scale flexible partnerships vis-a-vis end-to-end meta-services.<br><br>Conveniently synergize front-end content rather than high-payoff users. Professionally parallel.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section bg-color bg-opacity-10 py-0 mt-lg-4 mt-0">
                <div class="position-absolute top-0 end-0 w-100 h-100" style="background: url('{{ asset('images/landing-2/images/section-bg.svg') }}') no-repeat right 70%; background-size: 100%;"></div>
                <div class="container py-lg-6 py-4">
                    <div class="text-center mb-5">
                        <h2 class="display-4 font-secondary pop-animate slide-up">What Our Clients Say</h2>
                        <p class="pop-animate slide-up stagger-1">Hear from our satisfied clients about their experiences with WebFocus.</p>
                    </div>
                    <div class="testimonial-carousel">
                        <div class="fslider" data-loop="true" data-pause="5000" data-animation="slide" data-slideshow="true">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide">
                                        <div class="card pop-animate stagger-2">
                                            <img src="{{ asset('images/conference/images/sponcors/amazon.svg') }}" alt="Amazon Logo">
                                            <p>"WebFocus transformed our online presence with a seamless and efficient website. Their team was professional and delivered beyond our expectations."</p>
                                            <h5>John Doe</h5>
                                            <div class="position">Marketing Director</div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="card pop-animate stagger-2">
                                            <img src="{{ asset('images/conference/images/sponcors/netflix.svg') }}" alt="Netflix Logo">
                                            <p>"The hosting solutions provided by WebFocus are reliable and cost-effective. Their support team is always available to assist."</p>
                                            <h5>Jane Smith</h5>
                                            <div class="position">IT Manager</div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="card pop-animate stagger-2">
                                            <img src="{{ asset('images/conference/images/sponcors/google.svg') }}" alt="Google Logo">
                                            <p>"Working with WebFocus was a game-changer for our business. Their custom web solutions streamlined our processes significantly."</p>
                                            <h5>Mike Johnson</h5>
                                            <div class="position">Operations Lead</div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="card pop-animate stagger-2">
                                            <img src="{{ asset('images/conference/images/sponcors/linkedin.svg') }}" alt="LinkedIn Logo">
                                            <p>"Webfocus provided us with a robust domain and hosting package that perfectly suited our needs. Highly recommend their services!"</p>
                                            <h5>Sarah Williams</h5>
                                            <div class="position">CEO</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="button button-xlarge bg-white text-dark px-5 py-3 rounded-pill h-op-09 submit-testimonial-btn pop-animate stagger-3">Submit Testimonial</a>
                    </div>
                </div>
            </div>

            <div class="section bg-transparent my-0 py-0 py-lg-5">
                <div class="container text-center">
                    <h2 class="display-4 font-secondary position-relative pop-animate slide-up">
                        <svg class="promo-bg" xmlns="http://www.w3.org/2000/svg" width="612.879" height="132.494" viewBox="0 0 612.879 132.494"><g transform="translate(-9.868 -173.609)"><path d="M523.081,297.591l28,6.513,1.574,14.21S522.624,297.508,523.081,297.591Z" transform="translate(205.206 -190.859) rotate(20)" fill="#437ad4" opacity="0.96"><path d="M517.55,299.672l13.542,25.355-9.654,10.545S517.311,299.273,517.55,299.672Z" transform="translate(206.812 -190.875) rotate(20)" fill="#437ad4" opacity="0.96"><path d="M518.385,283.755l14.694-6.054,5.27,5.892S518.152,283.865,518.385,283.755Z" transform="translate(204.555 -185.345) rotate(20)" fill="#437ad4" opacity="0.96"><g transform="translate(29 -110.764)" opacity="0.735"><path d="M277.7,395.9a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,277.7,395.9Z" fill="#ffe13e"><path d="M270.866,381.5a2.419,2.419,0,1,1-1.148,3.224A2.419,2.419,0,0,1,270.866,381.5Z" fill="#ffe13e"><path d="M264.029,367.1a2.42,2.42,0,1,1-1.148,3.224A2.421,2.421,0,0,1,264.029,367.1Z" fill="#ffe13e"><path d="M257.192,352.7a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,257.192,352.7Z" fill="#ffe13e"><path d="M250.355,338.293a2.42,2.42,0,1,1-1.148,3.223A2.419,2.419,0,0,1,250.355,338.293Z" fill="#ffe13e"><path d="M290.232,389.952a2.42,2.42,0,1,1-1.149,3.223A2.419,2.419,0,0,1,290.232,389.952Z" fill="#ffe13e"><path d="M283.394,375.55a2.42,2.42,0,1,1-1.148,3.224A2.421,2.421,0,0,1,283.394,375.55Z" fill="#ffe13e"><path d="M276.557,361.149a2.419,2.419,0,1,1-1.148,3.223A2.42,2.42,0,0,1,276.557,361.149Z" fill="#ffe13e"><path d="M269.72,346.747a2.42,2.42,0,1,1-1.148,3.223A2.419,2.419,0,0,1,269.72,346.747Z" fill="#ffe13e"><path d="M262.883,332.346a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,262.883,332.346Z" fill="#ffe13e"><path d="M302.76,384a2.42,2.42,0,1,1-1.148,3.224A2.419,2.419,0,0,1,302.76,384Z" fill="#ffe13e"><path d="M295.923,369.6a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,295.923,369.6Z" fill="#ffe13e"><path d="M289.085,355.2a2.42,2.42,0,1,1-1.147,3.223A2.42,2.42,0,0,1,289.085,355.2Z" fill="#ffe13e"><path d="M282.249,340.8a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,282.249,340.8Z" fill="#ffe13e"><path d="M275.411,326.4a2.419,2.419,0,1,1-1.148,3.223A2.42,2.42,0,0,1,275.411,326.4Z" fill="#ffe13e"><path d="M315.288,378.057a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,315.288,378.057Z" fill="#ffe13e"><path d="M308.451,363.655a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,308.451,363.655Z" fill="#ffe13e"><path d="M301.614,349.254a2.419,2.419,0,1,1-1.148,3.223A2.418,2.418,0,0,1,301.614,349.254Z" fill="#ffe13e"><path d="M294.777,334.852a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,294.777,334.852Z" fill="#ffe13e"><path d="M287.94,320.45a2.42,2.42,0,1,1-1.148,3.224A2.419,2.419,0,0,1,287.94,320.45Z" fill="#ffe13e"><path d="M327.816,372.109a2.419,2.419,0,1,1-1.148,3.223A2.42,2.42,0,0,1,327.816,372.109Z" fill="#ffe13e"><path d="M320.979,357.708a2.419,2.419,0,1,1-1.148,3.223A2.418,2.418,0,0,1,320.979,357.708Z" fill="#ffe13e"><path d="M314.142,343.306a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,314.142,343.306Z" fill="#ffe13e"><path d="M307.3,328.9a2.419,2.419,0,1,1-1.148,3.224A2.419,2.419,0,0,1,307.3,328.9Z" fill="#ffe13e"><path d="M300.468,314.5a2.419,2.419,0,1,1-1.148,3.223A2.419,2.419,0,0,1,300.468,314.5Z" fill="#ffe13e"></g><path d="M310.395,171.614l-31.788-12.841.768-17.035s8.611,8.205,16.76,16.016C303.583,164.892,310.645,171.7,310.395,171.614Z" transform="matrix(0.946, 0.326, -0.326, 0.946, -197.688, -46.01)" fill="#ff5e5f" opacity="0.96"><path d="M326.343,164.5l-11.279-32.375,13.322-10.64S326.552,165.015,326.343,164.5Z" transform="matrix(0.946, 0.326, -0.326, 0.946, -209.991, -43.829)" fill="#ff5e5f" opacity="0.96"><path d="M317.452,197.985l-18.432,4.423-5.122-7.915S317.747,197.9,317.452,197.985Z" transform="matrix(0.946, 0.326, -0.326, 0.946, -196.873, -62.447)" fill="#ff5e5f" opacity="0.96"></g></svg>
                        Join WebFocus Now
                    </h2>
                    <p class="mw-xs mx-auto text-dark pop-animate slide-up stagger-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi molestiae sequi placeat facilis quis recusandae nisi nesciunt illo fuga in.</p>
                    <a href="#" class="button button-xlarge px-5 rounded-pill text-light bg-color h-op-09 mb-5 pop-animate slide-up stagger-2">Create a Project</a>
                    <h2 class="display-4 font-secondary position-relative pop-animate slide-up stagger-3">Subscribe to our Newsletter</h2>
                    <p class="mw-xs mx-auto text-dark pop-animate slide-up stagger-4">Stay updated with the latest news and offers from WebFocus. Enter your email below to join our newsletter.</p>
                    <div class="d-flex justify-content-center mt-4 pop-animate slide-up stagger-5">
                        <input type="email" class="form-control rounded-pill me-2" placeholder="Enter your email" style="max-width: 300px;">
                        <a href="#" class="button button-xlarge px-5 rounded-pill text-light bg-color h-op-09">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </section><!-- #content end -->
@endsection

@section('pagejs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"></script>
    <script>
        jQuery.noConflict();
        jQuery(document).ready(function($) {
            // Add js-ready class to body after a slight delay
            setTimeout(function() {
                $('body').addClass('js-ready');
            }, 100);

            // Initialize Flexslider for image slider in sticky section
            $('.fslider').flexslider({
                animation: 'fade',
                pauseOnHover: true,
                slideshowSpeed: 5000,
                directionNav: false,
                controlNav: false
            });

            // Initialize Flexslider for testimonial carousel
            $('.testimonial-carousel .flexslider').flexslider({
                animation: 'slide',
                pauseOnHover: true,
                slideshowSpeed: 5000,
                directionNav: false,
                controlNav: true,
                slideshow: true
            });

            // Initialize Magnific Popup for lightbox (video and image)
            $('[data-lightbox]').each(function() {
                $(this).magnificPopup({
                    type: $(this).attr('data-lightbox') === 'image' ? 'image' : 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 300
                });
            });

            // Toggle functionality for FAQ section
            $('.toggle-header').each(function() {
                $(this).next('.toggle-content')
                $(this).find('.toggle-icon .toggle-open')
            });


            // Viewport detection for sticky section content switching
            $('.viewport-detect').each(function() {
                let $this = $(this);
                let target = $this.data('viewport-class-target');
                $(window).scroll(function() {
                    let rect = $this[0].getBoundingClientRect();
                    if (rect.top < window.innerHeight * 0.6 && rect.bottom > 0) {
                        $(target).addClass('active').siblings().removeClass('active');
                    }
                });
            });

            // Smooth scroll for go-to-top button
            $('#gotoTop').click(function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 800);
            });

            // Mobile menu toggle
            $('.cnvs-hamburger').click(function() {
                $('.primary-menu').toggleClass('menu-open');
                $(this).toggleClass('active');
            });

            // Pop Animation using IntersectionObserver
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        observer.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, observerOptions);

            $('.pop-animate').each(function() {
                observer.observe(this);
            });

            // Initialize Skrollr for parallax effects (if not on mobile)
            if (!SEMICOLON.Mobile.any()) {
                var s = skrollr.init({ forceHeight: false });
            }
        });
    </script>
@endsection
