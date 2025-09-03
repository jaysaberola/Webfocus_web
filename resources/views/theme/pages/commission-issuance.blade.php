@extends('theme.main')

@section('content')
<div class="container my-6">
	<div class="row">
		<div class="col-lg-3">
			<span onclick="openNav()" class="d-lg-none mb-4 btn btn-primary btn-bg"><i class="icon-list-alt"></i></span>

			<div id="mySidenav">
			  <a href="javascript:void(0)" class="closebtn d-lg-none" onclick="closeNav()">&times;</a>
			  	@if ($categories->count())
			  		<ul class="quicklinks mb-3">
	            		@foreach($categories as $category)
				         	<li class="@if(isset($categorySlug) && $categorySlug == $category->name) current @endif"><a href="{{ route('commision-issuance.page') }}"><div>{{$category->name}}</div></a>
				         	@if(count($category->subcategory))
				         		<ul style="display:block;">
				         			@foreach($category->subcategory as $subcategory)
							        <li class="@if(isset($categorySlug) && $categorySlug == $subcategory->name) current @endif"><a href="{{ route('commision-issuance.page') }}?category={{$subcategory->slug}}"><div>{{$subcategory->name}}</div></a></li>
							        @endforeach
							    </ul>
				         	@endif
				         	</li>
				 		@endforeach
						</li>
				 	</ul>
	        	@endif
			</div>
		</div>
		<div class="col-lg-9">
			<div class="fancy-title title-border">
				@if(!isset($categorySlug))
					<h2>Resource List</h2>
				@else
					<h2>{{$categorySlug}}</h2>
				@endif
			</div>
			
			<div class="filter-btn">
				<form method="GET" action="" id="sortByForm">
					<div class="d-md-flex">
						<div class="bd-highlight mg-r-10 mg-t-10 mt-3">
							<select id="inputState" class="form-select">
								<option selected disabled>Sort by</option>
								<option @if($sortBy == 'asc') selected @endif value="asc">A - Z</option>
								<option @if($sortBy == 'desc') selected @endif value="desc">Z - A</option>
							</select>
							
						</div>
						<div class="d-md-flex m-auto"></div>
						
						<div class="mg-t-10 mt-3 hsrch">
							<div class="input-group">
								<input type="hidden" name="category" value="{{$scategory}}">
							  	<select class="form-select" id="searchBy" name="searchBy" required>
									<option value="" selected disabled>- Search By - </option>
									<option @if($searchBy == 'year') selected @endif value="year">Year</option>
									<option @if($searchBy == 'sector') selected @endif value="sector">Sector/Industry</option>
									<option @if($searchBy == 'case') selected @endif value="case">Type of Case</option>
							  	</select>
							  	<input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Search" value="{{$keyword}}" required>
							  	<input type="hidden" name="sortby" id="sortby">
							  	<button class="btn btn-outline-primary btn-primary" type="submit" id="button-addon2"><i class="icon-search text-white"></i></button>
							</div>
						</div>
					</div>					
				</form>
			</div>
			
			<div class="table-responsive">
				<table class="table table-hover">
					<thead class="bg-dark text-white">
					  <tr>
						<th width="70%">Name</th>
						<th width="25%">Category</th>
						<th width="5%">View</th>
					  </tr>
					</thead>
					<tbody>
						@forelse($resources as $res)
						  	<tr>
								<td>{{$res->name}}</td>
								<td>{{$res->category}}</td>
								<td>
									@if(isset($res->contents))
									<a href="{{ route('resource-details.front.show', $res->slug)}}" target="_blank"><img src="{{asset('theme/images/pdf.png') }}" /></a>
									@else
									<a href="{{ asset('storage/'.$res->pdf_path) }}" target="_blank"><img src="{{asset('theme/images/pdf.png') }}" /></a>
									@endif
								</td>
						  	</tr>
						@empty
							<tr>
								<td colspan="4">No resources found.</td>
						  	</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			
			<br>
			{{ $resources->links('theme.layouts.pagination') }}
		</div>
	</div>
</div>
@endsection

@section('pagejs')
	<script>
		$('#inputState').change(function(){
			$('#sortby').val($(this).val());

			$('#sortByForm').submit();
		});
	</script>
@endsection




