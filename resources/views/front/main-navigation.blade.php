<!-- *** MAIN NAVIGATION STARTS *** --> 
<div id="artigo-responsive-menu-trigger">Menu</div>
<nav class="main-nav">
	<ul>
		<li class="{{ (Route::current()->getName() == 'home') ? 'current_page_item':'' }}">
			<a href="{{URL('/')}}" title=""> Home </a> 
		</li>
		
		<li class="{{ (Route::current()->getName() == 'authordetail') ? 'current_page_item':'' }}"> <a href="{{ route('page', ['author-detail']) }}" title=""> About </a> </li>		
		
		<li class="artigo-mega-menu {{ (Route::current()->getName() == 'featured') ? 'current_page_item':'' }}"> <a href="{{ route('featured') }}" title=""> Featured Posts </a> 
			<div class="artigo-mega-menu-container col-4" style="display: none;"> 
				@if(count($featured) > 0)
				@foreach($featured as $post)
				<ul>
					<li>												
						<div class="simple-article">
							<a href="{{ route('post', [$post->seo_url])}}" title=""> 
								<img src="{{ $post->image ? '/../uploads/posts/'. $post->image : '/../images/default.png' }}" alt="" title="" > 
							</a>
							<h6> <a href="posts/{{ $post->seo_url }}" title=""> {{ $post->title }}</a> </h6>
							<span class="post-date"> <i class="ti-calendar"> </i> {{ $post->created_at->toFormattedDateString() }} </span>
						</div>		
					</li>
				</ul>
				@endforeach
				@endif
								
				{{--<ul>
					<li>
						<div class="simple-article">
							<a href="blog-detail.html" title=""> <img src="/../images/blog/simple-article4.jpg" alt="" title=""> </a>
							<h6> <a href="blog-detail.html" title=""> Quisque sit amet felis Cons </a> </h6>
							<span class="post-date"> <i class="ti-calendar"> </i> April 17, 2018 </span>
						</div>
					</li>
				</ul>
				--}}

			</div>
		</li>
		
		<li class="{{ (Route::current()->getName() == 'category') ? 'current_page_item':'' }}"> <a href="javascript:void(0);" title=""> Category </a> 
			<ul class="artigo-sub-menu">
				@foreach($categories as $cat)
					<li> <a href="{{ route('category', [$cat->slug ]) }}" title="">{{ $cat->title }}</a> </li>
				@endforeach 	
			</ul>
		</li>
		
		<li class="{{ (Route::current()->getName() == 'search') ? 'current_page_item':'' }}"> <a href="{{ route('search') }}" title=""> Search </a> </li>
		
		<li class="{{ (Route::current()->getName() == 'page') ? 'current_page_item':'' }}"> <a href="javascript:void(0);" title=""> Pages </a> 
			<ul class="artigo-sub-menu">
				<li> <a href="{{ route('page', ['terms-conditions']) }}" title=""> Terms & Conditions </a> </li>	
				<li> <a href="{{ route('page', ['privacy-policy']) }}" title=""> Privacy Policy </a> </li>
				<li> <a href="{{ route('page', ['what-we-do'] )}}" title=""> What We Do </a>
				</li>
				<li> <a href="{{ route('page', ['help']) }}" title=""> Help </a> </li>	
			</ul>
		</li>
		
		<li class="{{ (Route::current()->getName() == 'contact.create') ? 'current_page_item':'' }}"> <a href="{{ route('contact.create') }}" title=""> Contact Us</a> </li>					
	</ul>
</nav>     
<!-- *** MAIN NAVIGATION END *** -->	