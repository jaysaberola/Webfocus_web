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
				         	<li class="@if(isset($categorySlug) && $categorySlug == $category->name) current @endif"><a href="{{ route('resource-category.list', $category->slug) }}"><div>{{$category->name}}</div></a>
				         	@if(count($category->subcategory))
				         		@include('theme.layouts.resource-subcategories',['subcategories' => $category->subcategory])
				         	@endif
				         	</li>
				 		@endforeach
				 		<li class=""><a href="{{url('/')}}/bar-exam-notes-2"><div>Bar Exam Notes</div></a></li>
				 		<li class=""><a href="https://iclp.phcc.gov.ph/" target="_blank"><div>iCLP</div></a></li>
				 		<li class=""><a href="{{url('/')}}/infographics"><div>Infographics</div></a></li>
				 		<li class=""><a href="{{url('/')}}/videos"><div>Videos</div></a></li>
				 		<li><a href="{{url('/')}}/study-modules"><div>Self-Study Module</div></a>
							<ul>
								<li><a href="{{url('/')}}/file-manager/1/Consumers/Self-Study Module/PCC-MODULE-1-1.pdf"><div>1: An Introduction to Competition Law</div></a></li>
								<li><a href="{{url('/')}}/file-manager/1/Philippine Competition Act/PCC-MODULE-2-1.pdf"><div>2: On Anti-competitive Agreements</div></a></li>
								<li><a href="{{url('/')}}/file-manager/1/Consumers/Self-Study Module/PCC-MODULE-3-1.pdf"><div>3: On Mergers & Acquisitions</div></a></li>
								<li><a href="{{url('/')}}/file-manager/1/Consumers/Self-Study Module/PCC-MODULE-4-1.pdf"><div>4: On Abuse of Dominant Position</div></a></li>
							</ul>
						</li>
						<li><a href="#"><div>Collateral</div></a>
							<ul>
								<li><a href="{{url('/')}}/primer-on-the-philippine-competition-act"><div>Primer on the Philippine Competition Act </div></a></li>
								<li><a href="{{url('/')}}/handbook-for-the-general-public"><div>Handbook for the General Public</div></a></li>
								<li><a href="{{url('/')}}/guide-for-businesses"><div>Guide for Businesses</div></a></li>
								<li><a href="{{url('/')}}/enforcement-handbook"><div>Enforcement Handbook</div></a></li>
								<li><a href="{{url('/')}}/legal-booklet"><div>Legal Booklet</div></a></li>
								<li><a href="{{url('/')}}/faqs-on-pca-and-pcc"><div>FAQs on PCA and PCC</div></a></li>
								<li><a href="{{url('/')}}/file-manager/1/Businesses/Enforcement/Leniency Program/Leniency-Program-FAQs-09302020_final.pdf"><div>FAQs on Leniency Program</div></a></li>
								<li><a href="{{url('/')}}/pcc-brochure"><div>PCC - Brochure</div></a></li>
								<li><a href="{{url('/')}}/competition-matters"><div>Competition Matters</div></a></li>
							</ul>
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
				<div class="d-md-flex">
					<div class="bd-highlight mg-r-10 mg-t-10 mt-3">
						<select id="inputState" class="form-select mb-3">
							<option value="" selected disabled>- Select Year -</option>
							@foreach($years as $year)
							<option @if($filterYear == $year->yr) selected @endif value="{{$year->yr}}">{{$year->yr}}</option>
							@endforeach
						</select>
					</div>
					<div class="d-md-flex m-auto"></div>
					
					<form method="" action="" id="filterForm">
						<div class="mg-t-10 mt-3 hsrch">
							<div class="input-group">
							  <select class="form-select" id="searchFormCategory" name="category" required>
								<option value="" selected disabled>- Select Category - </option>
								@foreach($searchCategories as $cat)
								<option @if($slug == $cat->slug) selected @endif value="{{$cat->slug}}">{{$cat->name}}</option>
								@endforeach
							  </select>

							  <input type="text" id="keyword" class="form-control" placeholder="Search" aria-label="Search" value="{{$keyword}}" required>
							  <button class="btn btn-outline-primary btn-primary" type="submit" id="button-addon2"><i class="icon-search text-white"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>


			<form method="GET" action="" id="filterYear" style="display:none;">
				<input type="text" name="keyword" id="skeyword" value="{{$keyword}}">
				<input type="text" name="year" id="year">
			</form>
			
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
		$('#filterForm').submit(function(e){
			e.preventDefault();

			$('#skeyword').val($('#keyword').val());
			var url = '{{ route("resource-category.list", ":slug") }}?keyword='+$('#keyword').val();
			window.location.href = url.replace(':slug', $('#searchFormCategory').val());
		});

		// $('#button-addon2').click(function(){
		// 	var url = '{{ route("resource-category.list", ":slug") }}?keyword='+$('#');
		// 	window.location.href = url.replace(':slug', $('#searchFormCategory').val());
		// });

		$('#inputState').change(function(){
			$('#year').val($(this).val());

			$('#filterYear').submit();
		});

		// $('#inputState').change(function(){
		// 	if($('#keyword').val() == ""){
		// 		var newURLString = window.location.href +  "&year=" + $(this).val();
		// 	} else {
		// 		var newURLString = window.location.href +  "?year=" + $(this).val();
		// 	}

    	// 	window.location.href = newURLString; 
		// });

		// $('#searchFormCategory').change(function(){
		// 	var url = '{{ route("resource-category.list", ":slug") }}';
		// 	window.location.href = url.replace(':slug', $('#searchFormCategory').val());
		// });
	</script>
@endsection




