@extends('layouts.contact')

@section('stylesheets')
<style>
   input[type="checkbox"]{width:20px;}
</style>
@endsection

@section('content') 

<!-- *** BREADCRUMB STARTS *** -->
<div class="artigo-title-holder artigo-title-bg">
	<div class="artigo-container">
		<h1> User SignUp </h1>
	</div>
</div>
<!-- *** BREADCRUMB ENDS *** -->

<div class="artigo-content-wrap"> 
	<div class="artigo-topmargin-60"></div>
	
	<div class="artigo-row-fw artigo-fw-no-padding">
		<div class="artigo-container">
		
			<div class="artigo-row">
				<div class="artigo-col-4"></div>
				<div class="artigo-col-8">
					<div class="card">
						<h2> {{ __('Register') }} </h2>
						
						<form class="artigo-signup-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
							{{ csrf_field() }}

							<div class="artigo-row">									
								<div class="artigo-col-6">
									<input id="name" type="text" class="artigo-form-control {{ $errors->has('name') ? ' is-invalid' : '' }} required" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" autofocus>
								</div>
								
								<div class="artigo-col-6">	
									@if ($errors->has('name'))
										<div class="alert-danger" role="alert">
											{{ $errors->first('name') }}
										</div>
									@endif
								</div>
							</div>

							<div class="artigo-row"> 
								<div class="artigo-col-6">	
									<input id="email" type="email" class="artigo-form-control {{ $errors->has('email') ? ' is-invalid' : '' }} required" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" >
								</div>
								
								<div class="artigo-col-6">	
									@if ($errors->has('email'))
										<div class="alert-danger" role="alert">
											{{ $errors->first('email') }}
										</div>
									@endif
								</div>
							</div>

							<div class="artigo-row"> 
								<div class="artigo-col-6">	
									<input id="password" type="password" class="artigo-form-control {{ $errors->has('password') ? ' is-invalid' : '' }} required" name="password"  placeholder="{{ __('Password') }}">
								</div>
								
								<div class="artigo-col-6">	
									@if ($errors->has('password'))
										<div class="alert-danger" role="alert">
											{{ $errors->first('password') }}
										</div>
									@endif
								</div>
							</div>

							<div class="artigo-row"> 
								<div class="artigo-col-6">	
									<input id="password-confirm" type="password" class="artigo-form-control required" name="password_confirmation"  placeholder="{{ __('Confirm Password') }}">
								</div>
																
								<div class="artigo-col-6">	
									@if ($errors->has('password_confirmation'))
										<div class="alert-danger" role="alert">
											{{ $errors->first('password_confirmation') }}
										</div>
									@endif
								</div>
							</div>

							<div class="artigo-row">									
								<div class="artigo-col-6">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
									
									<a class="btn btn-link" href="{{ route('login') }}">
										{{ __('Already have account.') }}
									</a>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
