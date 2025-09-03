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
        .news-hero p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        .news-section {
            margin-top: 4rem;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            font-weight: bold;
            position: relative;
            display: inline-block;
            padding-bottom: 0.5rem;
        }
        .section-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50%;
            height: 3px;
            background: var(--cnvs-themecolor);
            border-radius: 5px;
        }

        .headline-card {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            margin-bottom: 3rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .headline-card img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            filter: brightness(70%);
            transition: transform 0.4s ease;
        }
        .headline-card:hover img {
            transform: scale(1.05);
        }
        .headline-body {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 2rem;
            color: #fff;
            background: linear-gradient(180deg, transparent, rgba(0,0,0,0.75));
            width: 100%;
        }
        .headline-body h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .headline-body h2 a {
            color: #fff;
            text-decoration: none;
        }
        .headline-body h2 a:hover {
            color: var(--cnvs-themecolor);
        }
        .headline-body p {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #ddd;
        }
        .news-meta {
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1.2rem;
            color: #ccc;
        }
        .news-meta i {
            color: var(--cnvs-themecolor);
            margin-right: 0.3rem;
        }
        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-family: 'Inter', sans-serif;
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
        .read-more-btn .bi {
            font-size: 1rem;
        }

        .read-more-alt-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.2rem;
            padding: 0.5rem 1rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            color: var(--cnvs-themecolor);
            white-space: nowrap;
        }
        .read-more-alt-btn:hover {
            color: var(--cnvs-themecolor);
            transform: translateX(3px);
        }
        .read-more-alt-btn .bi {
            font-size: 1rem;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }
        .news-card {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .news-card:hover img {
            transform: scale(1.08);
        }
        .news-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .news-card-body h2 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.6rem;
        }
        .news-card-body h2 a {
            text-decoration: none;
            color: #333;
        }
        .news-card-body h2 a:hover {
            color: var(--cnvs-themecolor);
        }
        .news-card-body p {
            flex-grow: 1;
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.2rem;
        }

        .sidebar {
            background: linear-gradient(to bottom left, rgba(255, 224, 54, .15), rgba(216, 220, 232, .3) 70%);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            font-family: 'Inter', sans-serif;
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

        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 3rem;
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
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-bold pop-animate slide-left">Latest <span class="circle-draw"><span>News</span><svg xmlns="http://www.w3.org/2000/svg" width="510" height="119" viewBox="0 0 510 119"><path d="M98.269,102.723c191.518,50.4,433.149-14.254,403.627-69.23C469.212-.827,218,3,94,25.5S-30.549,100.9,109.5,115c138.587,5.83,313.427-3.644,362.5-34.5,30.5-19.177,82.988-57.915-47-74.937" transform="translate(-0.645 -3.32)" fill="none" stroke="var(--cnvs-themecolor)" stroke-linecap="round" stroke-width="4"></svg></span></h1>
                            <h2 class="pop-animate slide-left stagger-1">Stay updated with our latest articles and insights</h2>
                            <p class="border-start border-width-4 border-color ps-4 mw-xs mt-5 pop-animate slide-left stagger-2">"Discover the latest trends, insights, and updates from our team. Stay informed with our comprehensive news coverage."</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('images/landing-2/images/browser-wf.png') }}" alt="Latest News" class="shadow-lg rounded-6 pop-animate slide-right" width="720">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container news-section">
    <div class="row g-4">
        <!-- Sidebar Widgets -->
        <div class="col-lg-3">
            <!-- Search -->
            <div class="sidebar pop-animate slide-left">
                <h4>Search News</h4>
                <form action="{{ route('news.front.index') }}" method="GET" class="position-relative">
                    <input type="hidden" name="type" value="searchbox">
                    <input type="text" name="keyword" class="form-control form-control-lg rounded-pill pe-5" placeholder="Search News..." value="{{ $search ?? '' }}">
                    <button type="submit" class="btn position-absolute end-0 top-50 translate-middle-y me-2">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Categories -->
            <div class="sidebar pop-animate slide-left stagger-1">
                <h4 data-bs-toggle="collapse" data-bs-target="#categoryList" class="collapsed">
                    Categories <i class="bi bi-plus"></i>
                </h4>
                <div class="collapse" id="categoryList">
                    <ul class="archive-list">
                        {!! $categories !!}
                    </ul>
                </div>
            </div>

            <!-- Archive -->
            <div class="sidebar pop-animate slide-left stagger-2">
                <h4 data-bs-toggle="collapse" data-bs-target="#archiveList" class="collapsed">
                    Archive <i class="bi bi-plus"></i>
                </h4>
                <div class="collapse" id="archiveList">
                    <ul class="archive-list">
                        {!! $dates !!}
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <h2 class="section-title pop-animate slide-up">Latest News</h2>

            <!-- Headline Article -->
            @if($articles->count())
                @php $headline = $articles->first(); @endphp
                <div class="headline-card pop-animate slide-up">
                    <img src="{{ $headline->thumbnail_url ?? asset('theme/images/news/no-image.jpg') }}" alt="{{ $headline->name }}">
                    <div class="headline-body">
                        <h2><a href="{{ route('news.front.show', $headline->slug) }}">{{ $headline->name }}</a></h2>
                        <div class="news-meta">
                            <span><i class="bi bi-calendar"></i>{{ \Carbon\Carbon::parse($headline->date)->format('F j, Y') }}</span>
                            <span><i class="bi bi-person"></i>{{ $headline->user->name }}</span>
                            <span><i class="bi bi-folder"></i>{{ $headline->category->name }}</span>
                        </div>
                        <p>{{ \Illuminate\Support\Str::limit($headline->teaser, 200, '...') }}</p>
                        <a href="{{ route('news.front.show', $headline->slug) }}" class="read-more-btn">Read Full Story <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            @endif

            <!-- Other Articles -->
            <h3 class="section-title pop-animate slide-up stagger-1">More Articles</h3>
            <div class="news-grid">
                @foreach($articles->skip(1) as $article)
                    <div class="news-card pop-animate stagger-{{ $loop->iteration }}">
                        <img src="{{ $article->thumbnail_url ?? asset('theme/images/news/no-image.jpg') }}" alt="{{ $article->name }}">
                        <div class="news-card-body">
                            <h2><a href="{{ route('news.front.show', $article->slug) }}">{{ $article->name }}</a></h2>
                            <div class="news-meta">
                                <span><i class="bi bi-calendar"></i>{{ \Carbon\Carbon::parse($article->date)->format('F j, Y') }}</span>
                                <span><i class="bi bi-person"></i>{{ $article->user->name }}</span>
                                <span><i class="bi bi-folder"></i>{{ $article->category->name }}</span>
                            </div>
                            <p>{{ \Illuminate\Support\Str::limit($article->teaser, 120, '...') }}</p>
                            <a href="{{ route('news.front.show', $article->slug) }}" class="read-more-alt-btn">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-5">
                {{ $articles->links('theme.layouts.pagination') }}
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
