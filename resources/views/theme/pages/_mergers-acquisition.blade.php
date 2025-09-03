@extends('theme.main')

@section('pagecss')
@endsection

@section('content')
<div class="container my-6">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-3">
                    <div class="card rounded-6 overflow-hidden mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12">
                                    <p class="mb-4 font-secondary">"{{ $article->name }}"</p>
                                    @if($article->thumbnail_url)
                                        <img src="{{ $article->thumbnail_url }}" alt="{{ $article->name }}">
                                    @else
                                        <img src="{{ asset('theme/images/news/no-image.jpg') }}" alt="{{ $article->name }}">
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('news.front.show',$article->slug) }}">Read More <span class="material-icons-outlined align-middle mb-1">trending_flat</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="bgicon icon-star3 op-02"></div>
                    </div>
                </div>
                @endforeach
            </div>  
        </div>
    </div>
</div>

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
                <img src="{{ asset('theme/images/misc/bulletin.png') }}" />
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection
