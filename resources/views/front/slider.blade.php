
@if(in_array(Route::current()->getName(), ['featured','posttag']))

<div class="artigo-title-holder artigo-title-bg">
	<div class="artigo-container">
		@if(Route::current()->getName() == 'featured')
		<h1> Featured Post </h1>
		@elseif(Route::current()->getName() == 'posttag')
		<h1> Tagged Post </h1>
		@endif
	</div>
</div>

@else
<div class="artigo-slider-wrap">
	<div class="artigo-row artigo-no-space-cols">
		<div class="artigo-col-2 no-space">
			<article class="artigo-blog-thumb-style">
				<a class="post-thumbnail" href="#"><img src="/../images/blog/blog-thumb-1.jpg" alt="" title=""></a>	
				<header class="entry-header">	
					<a class="entry-format" href="#"> <i class="ti-pencil"> </i> </a>							
					<div class="artigo-blog-meta">
						<div class="posted-on"> <span> POSTED </span> <time datetime="2015-02-14T17:17:52+00:00" class="entry-date">  14 JUL 2018 </time> </div>
						<h4> <a href="#" title=""> dolore magna aliqua Ut enim ad minim </a> </h4>
					</div>											
				</header>					
			</article>
		</div>
		<div class="artigo-col-2 no-space">
			<article class="artigo-blog-thumb-style">
				<a class="post-thumbnail" href="#"><img src="/../images/blog/blog-thumb-2.jpg" alt="" title=""></a>
				<header class="entry-header">	
					<a class="entry-format" href="#"> <i class="ti-video-camera"> </i> </a>							
					<div class="artigo-blog-meta">
						<div class="posted-on"> <span> POSTED </span> <time datetime="2015-02-14T17:17:52+00:00" class="entry-date">  14 JUL 2018 </time> </div>
						<h4> <a href="#" title=""> dolore magna aliqua Ut enim ad minim </a> </h4>
					</div>											
				</header>	
			</article>
		</div>
		<div class="artigo-col-2 no-space">
			<article class="artigo-blog-thumb-style">
				<a class="post-thumbnail" href="#"><img src="/../images/blog/blog-thumb-3.jpg" alt="" title=""></a>
				<header class="entry-header">	
					<a class="entry-format" href="#"> <i class="ti-headphone-alt"> </i> </a>							
					<div class="artigo-blog-meta">
						<div class="posted-on"> <span> POSTED </span> <time datetime="2015-02-14T17:17:52+00:00" class="entry-date">  14 JUL 2018 </time> </div>
						<h4> <a href="#" title=""> dolore magna aliqua Ut enim ad minim </a> </h4>
					</div>											
				</header>	
			</article>
		</div>
		<div class="artigo-col-2 no-space">
			<article class="artigo-blog-thumb-style">
				<a class="post-thumbnail" href="#"><img src="/../images/blog/blog-thumb-4.jpg" alt="" title=""></a>
				<header class="entry-header">	
					<a class="entry-format" href="#"> <i class="ti-camera"> </i> </a>							
					<div class="artigo-blog-meta">
						<div class="posted-on"> <span> POSTED </span> <time datetime="2015-02-14T17:17:52+00:00" class="entry-date">  14 JUL 2018 </time> </div>
						<h4> <a href="#" title=""> dolore magna aliqua Ut enim ad minim </a> </h4>
					</div>											
				</header>	
			</article>
		</div>
		<div class="artigo-col-2 no-space">
			<article class="artigo-blog-thumb-style">
				<a class="post-thumbnail" href="#"><img src="/../images/blog/blog-thumb-5.jpg" alt="" title=""></a>
				<header class="entry-header">	
					<a class="entry-format" href="#"> <i class="ti-link"> </i> </a>							
					<div class="artigo-blog-meta">
						<div class="posted-on"> <span> POSTED </span> <time datetime="2015-02-14T17:17:52+00:00" class="entry-date">  14 JUL 2018 </time> </div>
						<h4> <a href="#" title=""> dolore magna aliqua Ut enim ad minim </a> </h4>
					</div>											
				</header>	
			</article>
		</div>
		<div class="artigo-col-2 no-space">
			<article class="artigo-blog-thumb-style">
				<a class="post-thumbnail" href="#"><img src="/../images/blog/blog-thumb-6.jpg" alt="" title=""></a>
				<header class="entry-header">	
					<a class="entry-format" href="#"> <i class="ti-quote-left"> </i> </a>							
					<div class="artigo-blog-meta">
						<div class="posted-on"> <span> POSTED </span> <time datetime="2015-02-14T17:17:52+00:00" class="entry-date">  14 JUL 2018 </time> </div>
						<h4> <a href="#" title=""> dolore magna aliqua Ut enim ad minim </a> </h4>
					</div>											
				</header>	
			</article>
		</div>
	</div>
</div>
@endif