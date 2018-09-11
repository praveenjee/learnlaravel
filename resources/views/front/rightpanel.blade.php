<div class="artigo-sidebar-holder right-sidebar">
	<aside class="widget widget_author">
		<h2 class="widget-title"> <span> About Me </span> </h2>
		<div class="widget-container">
			<div class="author-thumb">
				<img src="/../images/author.jpg" alt="" title="">
			</div>
			<ul class="artigo-social-links">
				<li><a href="http://facebook.com/" title=""><i class="ti-facebook"></i></a></li>
				<li><a href="http://twitter.com/" title=""><i class="ti-twitter"></i></a></li>
				<li><a href="http://plus.google.com/" title=""><i class="ti-google"></i></a></li>
				<li><a href="http://dribbble.com/" title=""><i class="fa fa-dribbble"></i></a></li>
			</ul>
			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt lectus aliquet quam </p>		
			<img src="/../images/sign.png" alt=""  title="">
		</div>
	</aside>	
	<aside class="widget widget_recent_entries">
		<h2 class="widget-title"> <span> Popular Posts </span> </h2>
		<div class="widget-container">
			@if(count($featured) > 0) 				
			<ul>
				@foreach($featured as $key => $post)
					@if($key == 0)
				<li>
					<img src="{{ '/../uploads/posts/' . $post->image }}" alt="" title="" class="post-thumbnail" style="width:100%;height:147px;">
					<a href="{{ route('post', [$post->seo_url]) }}" title=""> {{ $post->title }} </a>
					<span class="post-date"> <i class="ti-calendar"> </i> {{$post->created_at->toFormattedDateString()}} </span>
					<p> {{ (strlen($post->excerpt) > 50) ? str_limit($post->excerpt, 50) ."..." : $post->excerpt}} </p>
				</li>
					@else
				<li>
					<img src="{{ '/../uploads/posts/' . $post->image }}" alt="" title="" class="post-thumbnail" style="width:100%;height:80px;">
					<a href="{{ route('post', [$post->seo_url]) }}" title="" style="width:60%"> {{ $post->title }} </a>
					<span class="post-date"> <i class="ti-calendar"> </i> {{$post->created_at->toFormattedDateString()}}</span>
				</li>
				 	@endif 				
				@endforeach
			</ul>
			@endif
		</div>
	</aside>	
	<aside class="widget widget_newsletter">
		<h2 class="widget-title"> <span> Newsletter </span> </h2>
		<div class="widget-container">
			<h6> Subscribe to my Newsletter </h6>
			<p> Sign up and receive the latest <br> tips through email </p>
			<small id="emsg"></small>
			<form class="artigo-newsletter" action="{{ route('newsletter') }}" method="post">
				<input placeholder="ENTER YOUR EMAIL ADDRESS" type="email" id="newsletteremail">
				<input value="SUBSCRIBE NOW" type="button" onclick="saveNewsletter();" style="width: 100%;">
			</form>
		</div>
	</aside>	
	<aside class="widget widget_categories">
		<h2 class="widget-title"> <span> Categories </span> </h2>
		<div class="widget-container">
			<ul>
				@if(count($categories) > 0)
					@foreach($categories as $category)
						<li>
							<a href="{{ route('category', [$category->slug]) }}" title=""> {{ $category->title }} </a> <span> [{{ $category->posts_count }}] </span>
						</li>
					@endforeach	
				@endif
			</ul>
		</div>
	</aside>	
	<aside class="widget widget_categories">
		<a href="#" title=""> <img src="/../images/ad-banner.jpg" alt="" title=""> </a>
	</aside>	
	<aside class="widget widget_tag_cloud">
		<h2 class="widget-title"> <span> Tag Cloud </span> </h2>
		<div class="widget-container">
			<div class="tagcloud">
			@if(count($tags) > 0)
				@foreach($tags as $tag)
				<a href="{{ route('posttag', [$tag->id]) }}" title=""> {{ $tag->tag }} </a>
				@endforeach
			@endif	
			</div>
		</div>
	</aside>	
	<aside class="widget artigo-flickr-widget">
		<h2 class="widget-title"> <span> Flickr </span> </h2>
		<div class="widget-container">
			<div class="flickr-widget" data-lightbox="gallery" data-id="52617155@N08" data-count="9" data-image-size="s"></div>
		</div>
	</aside>	
	<aside class="widget artigo_twitter_widget">
		<h2 class="widget-title"> <span> Twitter Feed </span> </h2>
		<div class="widget-container">
			<ul class="artigo-tweets-list" data-account="envato" data-limit="1"></ul>
		</div>
	</aside>	
</div>

<script>
 function saveNewsletter(){
 	if($.trim($('#newsletteremail').val()) == ""){
 		$('#emsg').css({'color':'red'}).html('Please enter your email address.');
 		$('#newsletteremail').focus();
 		return false;
 	} else {
	    $.ajax({
	       type:'POST',
	       url:'/newsletter',
	       data: {
	       	'_token' : '<?php echo csrf_token() ?>',
	       	'email' : $.trim($('#newsletteremail').val())
	       },
	       success:function(data){
			//console.log(data);	
			$("#emsg").css({'color':'green'}).html(data.msg);
	       }
	    });
	}
 } 
</script>