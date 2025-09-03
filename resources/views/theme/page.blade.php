@extends('theme.main')

@section('pagecss')
    <style>
        {{ str_replace(array("'", "&#039;"), "", $page->styles ) }}
    </style>
@endsection

@section('content')
    
@php
    $featuredArticles = Article::where('is_featured', 1)->where('status', 'Published')->take(4)->get();

    $featuredArticlesHTML = '';

    if ($featuredArticles->count()) {

        $featuredArticlesHTML = '<div class="container my-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">';

        foreach ($featuredArticles as $index => $article) {
            $imageUrl = (empty($article->thumbnail_url)) ? asset('theme/images/news/no-image.jpg') : $article->thumbnail_url;

            
            $featuredArticlesHTML .= '
                <div class="col-md-3">
                    <div class="card rounded-6 overflow-hidden mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12">
                                    <p class="mb-4 font-secondary">"'. $article->name .'"</p>
                                    <img src="'. $imageUrl .'" alt="'. $article->name .'">
                                </div>
                                <div class="mt-2">
                                    <a href="'.$article->get_url().'">Read More <span class="material-icons-outlined align-middle mb-1">trending_flat</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="bgicon icon-star3 op-02"></div>
                    </div>
                </div>';
        }

        $featuredArticlesHTML .= '</div>  
                            </div>
                        </div>
                    </div>';

    }


    $keywords   = ['{Featured Articles}', '{Subscription Form}'];
    $variables  = [$featuredArticlesHTML, ''];

    $contents = str_replace($keywords,$variables,$page->contents);

@endphp

<div class="container topmargin-lg bottommargin-lg">
    <div class="row">
        @if($parentPage)
           <span onclick="closeNav()" class="dark-curtain"></span>
					<div class="col-lg-12 col-md-5 col-sm-12">
						<span onclick="openNav()" class="button button-small button-circle border-bottom ms-0 text-initial nols fw-normal noleftmargin d-lg-none mb-4"><span class="icon-chevron-left me-2 color-2"></span> Quicklinks</span>
					</div>
					<div class="col-lg-3 pe-lg-4">
						<div class="tablet-view">
							<a href="javascript:void(0)" class="closebtn d-block d-lg-none" onclick="closeNav()">&times;</a>

							<div class="card border-0">
								<h3>Quicklinks</h3>
								<div class="side-menu">
									<ul class="mb-0 pb-0">
                                        @foreach($parentPage->sub_pages as $subPage)
                                            <li @if($subPage->id == $page->id) class="active" @endif>
                                                <a href="{{ $subPage->get_url() }}"><div>{{ $subPage->name }}</div></a>
                                                @if ($subPage->has_sub_pages())
                                                    <ul>
                                                        @foreach ($subPage->sub_pages as $subSubPage)
                                                        <li @if ($subSubPage->id == $page->id) class="active" @endif>
                                                            <a href="{{ $subSubPage->get_url() }}"><div>{{ $subSubPage->name }}</div></a>
                                                            @if ($subSubPage->has_sub_pages())
                                                            <ul>
                                                                @foreach ($subSubPage->sub_pages as $subSubSubPage)
                                                                    <li @if ($subSubSubPage->id == $page->id) class="active" @endif>
                                                                        <a href="{{ $subSubSubPage->get_url() }}"><div>{{ $subSubSubPage->name }}</div></a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        {!! $contents !!}
                    </div>
                @else
                    <div class="col-lg-12">
                        {!! $contents !!}
                    </div>
                @endif
    </div>
</div>

@if(str_contains($page->contents, '{Subscription Form}'))
<div class="promo parallax promo-dark bg-color promo-full" style="background-image: url({{asset('theme/images/misc/bg2.jpg')}});margin-top:70px;" data-bottom-top="background-position:center center;">
    <div class="container">
        <div class="row align-items-center justify-content-center col-mb-30 mx-md mx-auto">
            <div class="col-lg-5 col-sm-12 col-md">
                <h3 class="h3 font-secondary fw-semibold mb-0">Want updates from us?</h3>
                <form method="post" action="{{route('mailing-list.front.subscribe')}}">
                    @csrf
                    <div class="mt-3" style="max-width: 30rem;">
                        <input class="form-control mb-2 form-control-lg" type="text" placeholder="Name" name="name" required>
                        <input class="form-control mb-2 form-control-lg" type="email" placeholder="Email" name="email" required>
                        <button type="submit" data-scrollto="#section-contact" data-easing="easeInOutExpo" data-speed="1250" data-offset="88" class="btn py-3 px-5 rounded-1 btn-dark bg-color h-op-09 m-0">Subscribe <span class="material-icons-outlined align-middle mb-1 ms-1">trending_flat</span></button>
                    </div> 
                </form>
                
            </div>
            <div class="col-lg-5 col-sm-12 col-md-auto">
                <img src="{{asset('theme/images/misc/bulletin.png')}}" />
            </div>
        </div>
    </div>
</div>
@endif

@endsection
