@extends('theme.main')

@section('pagecss')
@endsection

@section('content')
<div class="container my-6">
    <div class="row">
        <div class="col-12">
            @forelse($careers as $career)
            <div class="fancy-title title-bottom-border">
                <h3>{{$career->name}}</h3>
            </div>

            <p>{{$career->teaser}}</p>
            
            <a href="{{ route('careers.front.show', $career->slug)}}" class="more-link">Read More</a>
            
            <div class="divider divider-center"><i class="icon-cloud"></i></div>
            @empty
            <div class="style-msg errormsg">
                <div class="sb-msg">No records found.</div>
            </div>
            @endforelse
            
            
            {{ $careers->links('theme.layouts.pagination') }}
            
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection
