@extends('theme.main')

@section('pagecss')
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
     <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
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

        /* Hero Section - matching home page hero */
        .news-hero {
            background: transparent;
            color: #333;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .news-hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        .news-hero h1 .circle-draw {
            position: relative;
            display: inline-block;
        }
        .news-hero h1 .circle-draw svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
            z-index: -1;
        }
        .news-hero .meta {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        /* Main Content - matching home page section styling */
        .news-content {
            margin-top: -60px;
            position: relative;
            z-index: 2;
        }
        .article-box {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .article-box h2 {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .article-body {
            font-size: 1.05rem;
            color: #444;
            line-height: 1.8;
        }
        .article-body img.main-image {
            max-width: 50%;
            float: left;
            margin: 0 1.5rem 1.5rem 0;
            border-radius: 1rem;
        }

        .sidebar {
            background: linear-gradient(to bottom left, rgba(255, 224, 54, .15), rgba(216, 220, 232, .3) 70%);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            margin-top: 5rem;
        }
        .sidebar h4 {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #333;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 0.6rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar h4 i {
            transition: transform 0.3s ease;
            color: var(--cnvs-themecolor);
        }
        .sidebar h4.collapsed i {
            transform: rotate(0deg);
        }
        .sidebar h4:not(.collapsed) i {
            transform: rotate(45deg);
        }

        .archive-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
            font-size: 0.9rem;
        }
        .archive-list li {
            margin-bottom: 0.5rem;
        }
        .archive-list li a {
            display: block;
            padding: 0.5rem;
            text-decoration: none;
            color: #666;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }
        .archive-list li a:hover {
            background: var(--cnvs-themecolor);
            color: #fff;
        }

        .sidebar form input.form-control {
            height: 40px;
            font-size: 0.9rem;
            padding-right: 2.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 1.5rem;
            transition: all 0.3s ease;
        }
        .sidebar form input.form-control:focus {
            border-color: var(--cnvs-themecolor);
            box-shadow: 0 0 0 0.2rem rgba(var(--cnvs-themecolor-rgb), 0.25);
        }
        .sidebar form button.btn {
            height: 35px;
            width: 35px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--cnvs-themecolor);
            color: #fff;
            border-radius: 50%;
            border: none;
        }
        .sidebar form button.btn:hover {
            background: var(--cnvs-themecolor);
            transform: translateY(-2px);
        }
        .category-list, .archive-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
            font-size: 0.9rem;
        }
        .category-list li, .archive-list li {
            margin-bottom: 0.5rem;
        }
        .category-list a, .archive-list a {
            text-decoration: none;
            color: #444;
            padding: 0.5rem;
            display: block;
            border-radius: 0.5rem;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .category-list a:hover, .archive-list a:hover {
            background: var(--cnvs-themecolor);
            color: #fff;
        }

        /* Share Section */
        .share-section {
            border-top: 1px solid #e0e0e0;
            margin-top: 2rem;
            padding-top: 1.5rem;
        }
        .share-section h5 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: #333;
        }
        .share-buttons {
            display: flex;
            gap: 10px;
        }
        .share-buttons a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: transform 0.3s ease;
        }
        .share-buttons a:hover {
            transform: translateY(-2px);
        }
        .share-facebook { background: #1877f2; }
        .share-twitter { background: #1da1f2; }
        .share-linkedin { background: #0077b5; }
        .share-copy { background: var(--cnvs-themecolor); }

        /* Clear floats after image */
        .article-body::after {
            content: "";
            display: block;
            clear: both;
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
            <div class="news-hero mb-md-6">
                <div class="container">
                    <div class="row col-mb-50">
                        <div class="col-lg-8">
                            <h1 class="display-4 fw-bold">{{ $news->name }}</h1>
                            <p class="meta">
                                <i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($news->date)->format('F j, Y') }}
                                &nbsp; | &nbsp; <i class="bi bi-folder"></i> {{ $news->category->name }}
                                &nbsp; | &nbsp; <i class="bi bi-person"></i> {{ $news->user->name }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<!-- Main Content + Sidebar -->
<div class="container news-content">
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-2">
            <div class="sidebar">
                <h4 data-bs-toggle="collapse" data-bs-target="#categoryList" class="collapsed">
                    Categories <i class="fas fa-plus"></i>
                </h4>
                <div class="collapse" id="categoryList">
                    <ul class="category-list">
                        {!! $categories !!}
                    </ul>
                </div>
            </div>

            <div class="sidebar">
                <h4 data-bs-toggle="collapse" data-bs-target="#archiveList" class="collapsed">
                    Archive <i class="fas fa-plus"></i>
                </h4>
                <div class="collapse" id="archiveList">
                    <ul class="archive-list">
                        {!! $dates !!}
                    </ul>
                </div>
            </div>
        </div>

        <!-- News Content Column -->
        <div class="col-lg-10">
            <div class="article-box">
                <div class="article-body">
                    <!-- Insert smaller image in content -->
                    <img src="{{ $news->thumbnail_url }}" alt="{{ $news->name }}" class="main-image">

                    {!! $news->contents !!}
                </div>

                <!-- Share Section -->
                <div class="share-section">
                    <h5>Share this article:</h5>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="share-facebook"><i class="icon-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($news->name) }}" target="_blank" class="share-twitter"><i class="icon-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::url()) }}" target="_blank" class="share-linkedin"><i class="icon-linkedin"></i></a>
                        <a href="#" onclick="navigator.clipboard.writeText('{{ Request::url() }}')" class="share-copy"><i class="icon-link"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pagejs')
<script>
    document.querySelectorAll('.sidebar h4[data-bs-toggle="collapse"]').forEach(header => {
        const target = document.querySelector(header.dataset.bsTarget);
        target.addEventListener('show.bs.collapse', () => header.classList.remove('collapsed'));
        target.addEventListener('hide.bs.collapse', () => header.classList.add('collapsed'));
    });
</script>
@endsection
