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
    <link rel="stylesheet" href="{{ url('/theme/plugins/jssocials/jssocials.css') }}" />
    <link rel="stylesheet" href="{{ url('/theme/plugins/jssocials/jssocials-theme-flat.min.css') }}" />
    <style>
        {{ str_replace(array("'", "&#039;"), "", $job->styles ?? '') }}
        /* Match home page body styling */
        body {
            background: #fff;
            font-family: 'Inter', sans-serif;
        }

        /* Hero Section - matching home page hero */
        .job-hero {
            background: #fff;
            color: #333;
            padding: 3rem 0 2rem;
            position: relative;
            overflow: hidden;
        }
        .job-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: -1;
        }
        .job-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .job-hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        .job-hero h1 .circle-draw {
            position: relative;
            display: inline-block;
        }
        .job-hero h1 .circle-draw svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
            z-index: -1;
        }

        /* Sidebar styling */
        .job-sidebar {
            background: linear-gradient(to bottom left, rgba(255, 224, 54, .15), rgba(216, 220, 232, .3) 70%);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .job-sidebar h3 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }
        .job-sidebar .side-menu a {
            display: block;
            padding: 0.5rem 0;
            color: #666;
            text-decoration: none;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            transition: color 0.3s ease;
        }
        .job-sidebar .side-menu a:hover {
            color: var(--cnvs-themecolor);
        }

        /* Main content styling */
        .job-content {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .job-content .article-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }
        .job-content .article-meta .entry-meta {
            background: rgba(255, 224, 54, .1);
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .job-content .article-meta .entry-meta ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .job-content .article-meta .entry-meta li {
            color: #666;
            font-size: 0.9rem;
        }
        .job-content .article-meta .entry-meta i {
            color: var(--cnvs-themecolor);
            margin-right: 0.5rem;
        }
        .article-image {
            width: 100%;
            max-width: 600px;
            height: 300px;
            overflow: hidden;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .news-desc {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #444;
        }
        .news-share {
            background: linear-gradient(to bottom left, rgba(255, 224, 54, .15), rgba(216, 220, 232, .3) 70%);
            padding: 1.5rem;
            border-radius: 1rem;
            margin-top: 2rem;
        }
        .news-share h5 {
            color: #333;
            margin-bottom: 1rem;
        }
        
        /* Search form styling */
        .search .searchbar {
            position: relative;
        }
        .search .form-control {
            border-radius: 1.5rem;
            border: 2px solid #e0e0e0;
            padding: 0.75rem 1rem 0.75rem 1rem;
            padding-right: 3rem;
        }
        .search .form-submit-search {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: var(--cnvs-themecolor);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Debug info - hide in production */
        .debug-info {
            display: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .job-hero h1 {
                font-size: 2rem;
            }
            .job-content {
                padding: 1.5rem;
            }
            .job-sidebar {
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection

@section('content')
<section id="content" class="bg-transparent">
    <div class="content-wrap overflow-visible pb-0">
        <!-- Hero Background -->
        <div class="position-absolute vh-50 w-100 top-0 start-0 overflow-hidden">
            <img src="{{ asset('images/landing-2/images/hero-bg.svg') }}" alt="Hero Background" class="hero-bg">
        </div>

        <div class="position-relative">
            <!-- Job Hero Header -->
            <div class="job-hero mb-md-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h1 class="display-5 fw-bold">Job <span class="circle-draw"><span>Details</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs">"Find detailed information about this job opportunity and take the next step in your career."</p>
                        </div>
                        <div class="col-lg-4">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Job Details" class="shadow-lg rounded-6" width="400">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-3 pe-lg-4">
                        <div class="job-sidebar">
                            <div class="border-0 mb-4">
                                <h3 class="mb-3">Search Jobs</h3>
                                <div class="search">
                                    <form class="mb-0" id="frm_search" method="GET">
                                        <div class="searchbar">
                                            <input type="text" class="form-control" placeholder="Search jobs..." name="searchtxt" id="searchtxt">
                                            <button class="form-submit-search" type="submit" name="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="border-0 mb-4">
                                <h3 class="mb-3">Other Jobs</h3>
                                <div class="side-menu">
                                    @forelse ($jobPortals as $portal)
                                        <a href="{{ route('jobs.show', $portal->id) }}" class="{{ $portal->id == $job->id ? 'text-decoration-underline fw-bold' : '' }}">{{ $portal->name }}</a>
                                    @empty
                                        <p class="text-muted">No other jobs available</p>
                                    @endforelse
                                </div>
                            </div>

                            <div class="border-0">
                                <h3 class="mb-3">Quick Links</h3>
                                <div class="side-menu">
                                    <a href="{{ route('jobs.index') }}" class="button button-small button-light button-border border-color h-bg-color rounded-pill text-dark m-0 mb-2 text-center">
                                        <i class="bi bi-arrow-left me-1"></i> Back to Jobs
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="job-content">
                            <div class="article-title">
                                <h2>{{ $job->name }}</h2>
                            </div>
                            
                            <!-- Debug Info -->
                            <div class="debug-info">
                                <p>Job ID: {{ $job->id }}</p>
                                <p>Image Path: {{ $job->images->first() ? url('/storage/' . str_replace('\\', '/', $job->images->first()->image_path)) : 'No image (using fallback)' }}</p>
                                <p>Image Extension: {{ $job->images->first() ? pathinfo($job->images->first()->image_path, PATHINFO_EXTENSION) : 'none' }}</p>
                                <p>Images Count: {{ $job->images->count() }}</p>
                                <p>File Exists: {{ $job->images->first() && \Illuminate\Support\Facades\Storage::disk('public')->exists($job->images->first()->image_path) ? 'Yes' : 'No' }}</p>
                                <p>Base URL: {{ config('app.url') }}</p>
                                <p>URL Prefix: {{ config('app.url_prefix') }}</p>
                                <p>Image Dimensions: {{ $imageWidth ?? 300 }}x{{ $imageHeight ?? 180 }}px</p>
                            </div>
                            
                            <div class="article-meta">
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($job->created_at)->format('jS M Y') }}</li>
                                        <li><i class="bi bi-person"></i> Admin</li>
                                        <li><i class="bi bi-folder"></i> Job Portal</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="article-image">
                                @if($job->images->first())
                                    @php
                                        $imagePath = $job->images->first()->image_path;
                                        $imagePath = preg_match('/\.(jpg|jpeg|png|gif)$/i', $imagePath) ? $imagePath : $imagePath . '.jpg';
                                    @endphp
                                    <img src="{{ url('/storage/' . str_replace('\\', '/', $imagePath)) }}" alt="{{ $job->name }}" loading="lazy" onerror="console.error('Failed to load image for Job ID {{ $job->id }}: ' + this.src); this.src='{{ url('/theme/images/jobs/no-image.jpg') }}';">
                                @else
                                    <img src="{{ url('/theme/images/jobs/no-image.jpg') }}" alt="{{ $job->name }}" loading="lazy">
                                @endif
                            </div>
                            
                            <div class="news-desc mb-4">
                                {!! $job->description !!}
                            </div>

                            <div class="news-share">
                                <h5><i class="bi bi-share me-2"></i>Share this job:</h5>
                                <div class="share_link"></div>
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
        $('#frm_search').on('submit', function(e) {
            e.preventDefault();
            window.location.href = "{{ route('jobs.index') }}?type=searchbox&keyword=" + encodeURIComponent($('#searchtxt').val());
        });
    </script>
@endsection
