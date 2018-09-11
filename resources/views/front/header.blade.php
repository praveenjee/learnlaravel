<header id="artigo-masthead" class="artigo-std-header">	

	<div class="header-top-area">
		<div class="artigo-container">
			<div class="header-info">
				<p> WELCOME TO <a href="{{ URL('/') }}"> MyBlog LARAVEL! </a> PERFECT FOR BLOGGERS </p>				
			</div>
			<div class="header-info" style="float:right;">
				<ul class="login-box">
					@guest

					<li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
					<li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
					
					@else 

					<li data-role="{{Auth::user()->role}}">
						@if(Auth::user()->role == "Administrator")
						<a id="navbarDropdown" class="dropdown" href="{{ url('admin') }}" target="_blank">
							{{  __('Hello').', '. Auth::user()->name }} <i class="fa fa-caret-down"></i></a>

						@else
						<a id="navbarDropdown" class="dropdown" href="javascript:void(0);" >
								{{  __('Hello').', '. Auth::user()->name }} <i class="fa fa-caret-down"></i></a>
						@endif	
												    				   
					    <ul class="dropdown-content">
					      <li><a href="{{ route('dashboard.show') }}">My Dashboard</a></li>
					      <li><a href="javascript:void(0);">My Account</a></li>
					    </ul>
											
                    </li> 									
					<li>		
						<a class="nav-link" href="{{ route('logout') }}"
						   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>                                
                    </li>
					@endguest
				</ul>
			</div>	
			<div class="social-links-container">
				<ul class="artigo-social-links">					
					<li><a href="http://facebook.com/" title=""><i class="fa fa-facebook"></i></a></li>
					<li><a href="http://instagram.com/" title=""><i class="fa fa-instagram"></i></a></li>
					<li><a href="http://twitter.com/" title=""><i class="fa fa-twitter"></i></a></li>
					<li><a href="http://plus.google.com/" title=""><i class="fa fa-google-plus"></i></a></li>
					<li><a href="http://linkedin.com/" title=""><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</div>	

	<div class="header-main">				
		<div class="artigo-container">
			<div id="logo">
				<h1 class="site-title"><a href="{{ URL('/') }}" rel="home"> MyBlog Laravel </a></h1>
			</div>
		</div>
		
		<div class="artigo-navigation-holder">	
			<div class="artigo-container">	
				<div class="nav-inner-left">
					<a href="javascript:void(0);" class="artigo-author-popup artigo-full-screen-author"> <i class="ti-align-right"></i> </a>
				</div>

				@include( 'front.main-navigation' )

				<div class="nav-inner-right">
					<a href="javascript:void(0);" class="artigo-search artigo-full-screen-search"> <i class="ti-search"></i> </a>
				</div>

			</div>
		</div>

	</div>

</header>