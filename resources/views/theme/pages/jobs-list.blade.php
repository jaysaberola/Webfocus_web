@extends('theme.main')

@section('meta')
    <meta name="description" content="Find your dream job with our curated job listings from top companies.">
    <meta name="keywords" content="jobs, careers, job search, employment">
    <meta name="robots" content="index, follow">
@endsection

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
        .jobs-hero {
            background: transparent; /* Changed to transparent */
            color: #333;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        /* Hero Background */
        .jobs-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: -1;
        }
        .jobs-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .jobs-hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        .jobs-hero h1 .circle-draw {
            position: relative;
            display: inline-block;
        }
        .jobs-hero h1 .circle-draw svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
            z-index: -1;
        }
        .jobs-hero p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        /* Search Box - matching home page section style */
        .job-searchbox {
            background: linear-gradient(to bottom left, rgba(255, 224, 54, .3), rgba(216, 220, 232, .5) 70%);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }
        .job-searchbox input {
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }
        .job-searchbox input:focus {
            border-color: var(--cnvs-themecolor);
            box-shadow: 0 0 0 0.2rem rgba(var(--cnvs-themecolor-rgb), 0.25);
            background: #fff;
        }
        .job-searchbox .button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            background-color: var(--cnvs-themecolor);
            border: 2px solid var(--cnvs-themecolor);
            color: #fff;
        }
        .job-searchbox .button:hover,
        .job-searchbox .button:focus {
            background-color: transparent;
            color: var(--cnvs-themecolor);
            border-color: var(--cnvs-themecolor);
        }

        /* Jobs Section - matching home page services section */
        .jobs-section {
            padding: 4rem 0;
            background: transparent;
        }

        /* Job Cards - matching home page service cards */
        .job-card {
            background: #fff;
            border: 0;
            border-radius: 1.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .job-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 1.5rem 1.5rem 0 0;
        }
        .job-card-body {
            padding: 1.5rem;
        }
        .job-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
            line-height: 1.3;
        }
        .job-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .job-title a:hover {
            color: var(--cnvs-themecolor);
        }
        .job-meta {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .job-meta i {
            color: var(--cnvs-themecolor);
            margin-right: 0.5rem;
        }
        .job-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            background-color: #fff;
            border: 2px solid var(--cnvs-themecolor);
            color: var(--cnvs-themecolor);
        }
        .read-more-btn:hover,
        .read-more-btn:focus {
            background-color: var(--cnvs-themecolor);
            color: #fff;
            border-color: var(--cnvs-themecolor);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #666;
        }
        .empty-state h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .empty-state p {
            font-size: 1.1rem;
            opacity: 0.8;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }
        .pagination {
            justify-content: center;
        }
        .pagination .page-link {
            border-radius: 50%;
            margin: 0 4px;
            color: var(--cnvs-themecolor);
            border: 1px solid #e0e0e0;
        }
        .pagination .page-item.active .page-link {
            background: var(--cnvs-themecolor);
            color: #fff;
            border-color: var(--cnvs-themecolor);
        }
        .pagination .page-link:hover {
            background: #f1f3f5;
            color: var(--cnvs-themecolor);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .jobs-hero h1 {
                font-size: 2.5rem;
            }
            .jobs-hero {
                padding: 4rem 0 3rem;
            }
            .jobs-hero p {
                font-size: 1.1rem;
            }
            .job-searchbox {
                margin-top: -40px;
                padding: 1.5rem;
                border-radius: 16px;
            }
            .job-searchbox input {
                margin-bottom: 1rem;
            }
            .job-card-body {
                padding: 1.5rem;
            }
            .job-title {
                font-size: 1.3rem;
            }
            .job-meta {
                gap: 0.5rem;
            }
            .job-meta-item {
                font-size: 0.8rem;
                padding: 0.3rem 0.6rem;
            }
        }

        @media (max-width: 576px) {
            .jobs-hero h1 {
                font-size: 2rem;
            }
            .job-searchbox .button {
                width: 100%;
                justify-content: center;
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
            <div class="jobs-hero mb-md-6">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold pop-animate slide-left">Find Your <span class="circle-draw"><span>Dream Job</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Discover exciting career opportunities</h2>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"Search thousands of job opportunities and take the next step in your career journey with us."</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Jobs Platform" class="shadow-lg rounded-6 pop-animate slide-right" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Section -->
            <div class="container p-4 p-sm-5 p-md-6 rounded-6 job-searchbox pop-animate slide-up">
                <form id="frm_search" method="GET" class="row g-3 align-items-center">
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Job title, keywords..." name="searchtxt" id="searchtxt" value="{{ request('keyword') }}" aria-label="Search by job title or keywords">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Location (Optional)" name="location" aria-label="Search by location">
                    </div>
                    <div class="col-md-3 d-grid">
                        <button class="button button-light button-border border-color h-bg-color rounded-pill text-dark" type="submit" aria-label="Search for jobs"><i class="bi bi-search me-1"></i> Search Jobs</button>
                    </div>
                    <input type="hidden" name="type" value="searchbox">
                </form>
            </div>
        </div>

        <!-- Job Listings Section -->
        <div class="container py-lg-6 mw-md mt-5">
            <div class="text-center mb-lg-6">
                <h2 class="mb-1 display-6 fw-bold pop-animate slide-up">Available <span class="circle-draw"><span>Job Opportunities</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h2>
                <h4 class="fw-normal pop-animate slide-up stagger-1">Discover your next career move with our curated job listings from top companies.</h4>
            </div>

            <div class="clear"></div>

            <div class="overflow-hidden">
                <div class="row gutter-custom justify-content-center" style="--custom-gutter: 30px;">
                    @forelse ($jobPortals as $job)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card border-0 job-card pop-animate stagger-{{ $loop->iteration }}">
                            @if($job->images->first() && Storage::disk('public')->exists($job->images->first()->image_path))
                                <img src="{{ url('/storage/' . str_replace('\\', '/', $job->images->first()->image_path)) }}" alt="{{ $job->name }}" class="rounded-5 mb-3">
                            @else
                                <img src="{{ asset('theme/images/jobs/no-image.jpg') }}" alt="No Image" class="rounded-5 mb-3">
                            @endif
                            <div class="card-body job-card-body">
                                <h2 class="text-transform-none fw-semibold h5 mb-3 job-title">
                                    <a href="{{ route('jobs.show', $job->id) }}">{{ $job->name }}</a>
                                </h2>
                                <div class="job-meta mb-3">
                                    <span><i class="bi bi-calendar3"></i> {{ $job->created_at->format('M d, Y') }}</span> &nbsp; | &nbsp;
                                    <span><i class="bi bi-person"></i> Admin</span>
                                </div>
                                <p class="mb-4 job-description">{{ Str::limit($job->description, 120, '...') }}</p>
                                <a href="{{ route('jobs.show', $job->id) }}" class="button button-small button-light button-border border-color h-bg-color rounded-pill text-dark m-0 read-more-btn" aria-label="Learn more about {{ $job->name }}">Learn More <i class="bi-arrow-right me-0 ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state text-center">
                            <h3>No Jobs Found</h3>
                            <p>We couldn't find any job opportunities at the moment. Please check back later or try adjusting your search criteria.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($jobPortals->hasPages())
                <div class="text-center mt-5">
                    {{ $jobPortals->links('theme.layouts.pagination') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('pagejs')
<script>
    $('#frm_search').on('submit', function(e) {
        e.preventDefault();
        let keyword = encodeURIComponent($('#searchtxt').val());
        let location = encodeURIComponent($('input[name="location"]').val());
        window.location.href = "{{ route('jobs.index') }}?type=searchbox&keyword=" + keyword + "&location=" + location;
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
</script>
@endsection
