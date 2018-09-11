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
		<h1> User Login </h1>
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
						<h2> {{ __('Login') }} </h2>
						
						<form class="artigo-login-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
							{{ csrf_field() }}
							
							<div class="artigo-row">									
								<div class="artigo-col-6">
									<input id="email" type="email" class="artigo-form-control {{ $errors->has('email') ? ' is-invalid' : '' }} required" name="email" value="{{ old('email') }}"  autofocus autocomplete="off" placeholder="{{ __('E-Mail Address') }}" >
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
									<input id="password" type="password" class="artigo-form-control {{ $errors->has('password') ? ' is-invalid' : '' }} required" name="password" placeholder="{{ __('Password') }}" />
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
								<div class="artigo-col-12" style="float:left;text-align:left;">			
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} /> 
									<label> {{ __('Remember Me') }}	</label>
								</div>
							</div>

							<div class="artigo-row mb-0">
								<div class="artigo-col-6">
									<button type="submit" class="btn btn-primary">
										{{ __('Login') }}
									</button>
									
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
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
