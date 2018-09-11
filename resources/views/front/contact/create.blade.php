@extends('layouts.contact')

@section('stylesheets')
<style>
    .required:after{ 
        content:'*'; 
        color:red; 
        padding-left:5px;
		font-weight:bold;
    }
</style>
@endsection

@section('content')

<!-- *** BREADCRUMB STARTS *** -->
<div class="artigo-title-holder artigo-title-bg">
	<div class="artigo-container">
		<h1> Contact Us </h1>
	</div>
</div>
<!-- *** BREADCRUMB ENDS *** -->

<div class="artigo-content-wrap"> 

	<div class="artigo-row-fw artigo-fw-no-padding">
		<div class="artigo-map-holder" data-zoom="14" data-width="100%" data-address="Melbourne, Australia"
			data-description="<h5>Hi, we are Envato</h5><p>Lorem Ipsum is simply dummy text of the <strong> printing </strong> and <strong> typesetting </strong> <br> industry. <strong> Lorem Ipsum </strong> has been the industry's standard dummy <br> text ever since the <strong> 1500s,</strong> when an unknown printer took a <strong> galley </strong> <br> of type and scrambled it to make a type specimen book. </p></div>"
			data-icon="images/map-icon.png"
			data-iconsize="60,83">
		</div>			
	</div> 

	<div class="artigo-topmargin-60"></div>

	<div class="artigo-row-fw artigo-fw-no-padding">
		<div class="artigo-container">

			<div class="artigo-row">

				<div class="artigo-col-4">
					<h2> GET IN TOUCH WITH ME </h2>

			        <div class="artigo-topmargin-10"></div>

					<div class="artigo-contact-with-large-icon">
			        	<div class="artigo-contact-icon-holder">
			        		<i class="ti-location-pin"></i>
			        	</div>
			        	<div class="artigo-contact-text-holder">
			        		<h6> ADDRESS </h6>
			        		<p> 228 Park Avenue, New York, </p>
			        		<p> NY 10003-1502, US </p>
			        	</div>
			        </div>

			        <div class="artigo-topmargin-30"></div>

					<div class="artigo-contact-with-large-icon">
			        	<div class="artigo-contact-icon-holder">
			        		<i class="ti-tablet"></i>
			        	</div>
			        	<div class="artigo-contact-text-holder">
			        		<h6> PHONE NUMBER </h6>
			        		<p> Phone : +88 (0) 101 0000 000 </p>
			        		<p> Fax : +88 (0) 202 0000 001 </p>
			        	</div>
			        </div>

			        <div class="artigo-topmargin-30"></div>

			        <div class="artigo-contact-with-large-icon">
			        	<div class="artigo-contact-icon-holder">
			        		<i class="ti-email"></i>
			        	</div>
			        	<div class="artigo-contact-text-holder">
			        		<h6> EMAIL ADDRESS </h6>
			        		<a href="#" title=""> info@yourdomain.com </a>
			        		<a href="#" title=""> support@yourdomain.com </a>
			        	</div>
			        </div>
				</div>
				<div class="artigo-col-8">
					<h2> SEND ME A MESSAGE </h2>
					<!-- For error message alert -->
					<div class="col-sm-4 col-md-4 col-xl-12">
						@if ($errors->any())
							@component('back.alert-danger', ['errors' => $errors->all()])
								@slot('title')
									Errors
								@endslot
							@endcomponent
						@endif
						{{-- For success message alert --}}
						@if (Session::has('message'))
							@component('back.alert-success')
								{{ Session::get('message') }}
							@endcomponent 							
						@endif 
					</div>

					<form class="artigo-contact-form" method="post" action="{{ route('contact.store') }}">
						{{ csrf_field() }}
		            	<div class="artigo-contact-form-result"></div>
						<div class="artigo-form-process"></div>
						<div class="artigo-row">
			        		<div class="artigo-col-6">
			        			<input type="text" value="" name="fname" id="fname" class="artigo-form-control required" placeholder="FIRST NAME">
			        		</div>
			        		<div class="artigo-col-6">
			        			<input type="text" value="" name="lname" id="lname" class="artigo-form-control required" placeholder="LAST NAME">
			        		</div>
			        	</div>
			        	<div class="artigo-row">			        		
			        		<div class="artigo-col-6">
			        			<input type="email" value="" name="email" id="email" placeholder="YOUR EMAIL" class="artigo-form-control required email">
			        		</div>
							<div class="artigo-col-6">
			        			<input type="text" value="" name="phone" id="phone" class="artigo-form-control required" placeholder="YOUR PHONE" maxlength="10">
			        		</div>
			        	</div>
			            <textarea rows="5" cols="2" name="message" id="message" class="artigo-form-control required" placeholder="YOUR MESSAGE"></textarea>
			            <input type="submit" value="Send Message" class="submit" id="submit" name="submit"> 
			        </form>
			        
				</div>

			</div>

		</div>	
	</div>						

</div>
@endsection