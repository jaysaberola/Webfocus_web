<div id="top-bar" class="py-2">
	<div class="container clearfix">
		<div class="row justify-content-between">
			<div class="col-12 col-md-auto">
				<div class="top-links">
					<ul class="top-links-container">
						<li class="top-links-item"><a href="https://www.gov.ph/" target="_blank">GOVPH</a></li>
						<li class="top-links-item"><a href="{{url('/')}}/transparency-seal">Transparency Seal</a></li>
						<li class="top-links-item"><a href="{{url('/')}}/about-us/citizens-charter">Citizen's Charter</a></li>
						<li class="top-links-item"><a href="{{ route('sitemap') }}">Sitemap</a></li>
						<li class="top-links-item"><a href="{{url('/')}}/contact-us">Contact</a></li>
						<li class="top-links-item"><a href="https://ncv.microsoft.com/VKJ6eh3nJo" target="_blank">Make an Appointment</a></li>
					</ul>
				</div>
			</div>

			<div class="col-12 col-md-auto col-lg-1 col-md-12">
				<div class="input-group">							
				  	<div class="dropdown ms-2" id="visibility">
					  	<button class="btn bg-white border dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset('theme/images/icons/accessibility-icon.png') }}" width="27" />
					  	</button>
					  	<ul class="dropdown-menu one-page-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-scrollable"><i class="icon-note"></i></a></li>
							<li><a class="dropdown-item dark-btn" href="#"><i class="icon-eye-open"></i></a></li>
							<li><a class="dropdown-item" href="#" data-href="#content"><i class="icon-arrow-alt-circle-down"></i></a></li>
							<li><a class="dropdown-item" href="#" data-href="#footer"><i class="icon-chevron-down"></i></a></li>
					  	</ul>
				  	</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-scrollable" tabindex="-1" role="dialog" aria-labelledby="scrollableModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"></h4>
					<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">					
					<p>This website adopts the Web Content Accessibility Guidelines (WCAG 2.0) as the accessibility standard for all its related web development and services. WCAG 2.0 is also an international standard, ISO 40500. This certifies it as a stable and referenceable technical standard. </p>

					<p>WCAG 2.0 contains 12 guidelines organized under 4 principles: Perceivable, Operable, Understandable, and Robust (POUR for short). There are testable success criteria for each guideline. Compliance to these criteria is measured in three levels: A, AA, or AAA. A guide to understanding and implementing Web Content Accessibility Guidelines 2.0 is available at: https://www.w3.org/TR/UNDERSTANDING-WCAG20/</p>

					<p>Accessibility Features</p>

					<p>Shortcut Keys Combination Activation Combination keys used for each browser.</p>
					
					<ul class="ms-4">
						<li>Chrome for Linux press (Alt+Shift+shortcut_key) </li>
						<li>Chrome for Windows press (Alt+shortcut_key) </li>
						<li>For Firefox press (Alt+Shift+shortcut_key) </li>
						<li>For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter)</li>
						<li>On Mac OS press (Ctrl+Opt+shortcut_key)</li>
					</ul>

				</div>
			</div>
		</div>
</div>