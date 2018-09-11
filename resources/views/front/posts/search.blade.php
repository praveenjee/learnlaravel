@extends('layouts.search')

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

	<div class="artigo-content-holder">

		<div class="artigo-search-form-container"> 
			@if($keyword != "")		
			<h2> {{ $info }} </h2>
			@endif
			<p> If you are not happy with the results below please do another search </p>		
			<form role="search" method="get" class="search-form" action="{{ route('search')}}">	
				{{-- csrf_field() --}}	
				<input class="search-field" placeholder="TYPE AND HIT ENTER" name="s" type="search" autocomplete="off" autocapitalize="off">
				<button type="submit" class="search-submit"><span class="ti-search"></span></button>
			</form>
		</div>

		<div class="aricle-search-result-holder">
			@if(count($posts) > 0)
				@foreach($posts as $post)
					<article class="artigo-blog-item format-standard artigo-search-result">		
						<div class="entry-thumbnail">
							<a class="post-thumbnail" href="{{route('post', [$post->seo_url])}}"> <img src="{{ ($post->image) ? '/../uploads/posts/' . $post->image->name : '/../images/boxed-bg.jpg' }}" alt="" title="" style="width:170px;height:138px"> </a>						
						</div>

						<div class="entry-item-details">
							<header class="entry-header">							
								<h4> <a href="{{route('post', [$post->seo_url])}}" title=""> {{$post->title}} </a> </h4>					
							</header>

							<div class="entry-meta-data">							
								<p> 17, Feb 2018 </p>
								<p class="entry-cat-links"> <a href="category-page.html"> Fashion </a> </p>
								<!--<p class="post-author"> <a href="" title=""> Smashing Themes </a> </p> -->
								<a href="blog-detail.html" title="" class="post-comments"> 5 Comments </a> 
							</div>

							<div class="entry-content">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt lectus aliquet quam pretium  Quisque ac nisl tincidunt, auctor ligula ut, commodo urna...
								</p>
							</div>
						</div>
					</article>	
				@endforeach
			@else
				<article class="artigo-blog-item format-standard artigo-search-result" style="text-align: center;"><span style="">Records not found.</span>
				</article>
			@endif
			

		</div>	
		@if(count($posts) > config('app.nbrPages.front.posts'))
	    {{ $posts->render('pagination.default') }}
	    @endif
	</div>	

@endsection