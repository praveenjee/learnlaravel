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
		<h1> Reset Password </h1>
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
						<h2>{{ __('Reset Password') }}</h2>
                
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						<form class="artigo-password-reset-form" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
							{{ csrf_field() }}

							<div class="artigo-row">									
								<div class="artigo-col-6">
									<input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} required" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}">
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
									<button type="submit" class="btn btn-primary">
										{{ __('Send Password Reset Link') }}
									</button>
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
