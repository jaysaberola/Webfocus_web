@extends('theme.main')

@section('content')

			
			<div class="container topmargin-lg bottommargin-lg">
				<div class="row" style="padding:60px 0px;">
					<div class="col-lg-6">
						<div class="error404 center mb-4 mb-lg-0">500</div>
					</div>

					<div class="col-lg-6 align-self-center ps-lg-6">
						<h3>Ooops! The server encountered an internal error or misconfiguration and was unable to complete your request.</h3>

						<div class="widget_links topmargin nobottommargin">
							<ol class="breadcrumb nobottommargin nopadding">
								<li class="breadcrumb-item"><a class="link-custom1" href="{{route('home')}}">Home</a></li>
								<li class="breadcrumb-item"><a class="link-custom1" href="{{env('APP_URL')}}/about-us">About Us</a></li>
								<li class="breadcrumb-item"><a class="link-custom1" href="{{env('APP_URL')}}/news">Latest News</a></li>
								<li class="breadcrumb-item"><a class="link-custom1" href="{{env('APP_URL')}}/contact-us">Contact Us</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			
@endsection