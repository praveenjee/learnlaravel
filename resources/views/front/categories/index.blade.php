@extends('layouts.category-home')

@section('content')
	
	<div class="artigo-topmargin-40"></div>
	
    <div class="artigo-row">

		<div class="artigo-col-4">				
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img1.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'lifestyle') }}"> LifeStyle </a> </h2>
				</figcaption>
			</figure>
		</div>
		<div class="artigo-col-4">
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img2.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'fashion') }}"> Fashion </a> </h2>
				</figcaption>
			</figure>					
		</div>
		<div class="artigo-col-4">
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img3.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'everyday-blog') }}"> Everyday Blog </a> </h2>
				</figcaption>
			</figure>					
		</div>

    </div> 
    
	<div class="artigo-topmargin-40"></div>
	
    <div class="artigo-row">

		<div class="artigo-col-4">				
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img1.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'inspiration') }}"> Inspiration </a> </h2>
				</figcaption>
			</figure>
		</div>
		<div class="artigo-col-4">
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img2.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'development') }}"> Development </a> </h2>
				</figcaption>
			</figure>					
		</div>
		<div class="artigo-col-4">
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img3.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'photography') }}"> Photography </a> </h2>
				</figcaption>
			</figure>					
		</div>

    </div> 
	
	<div class="artigo-topmargin-40"></div>

	<div class="artigo-row">

		<div class="artigo-col-4">				
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img1.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'design') }}"> Design </a> </h2>
				</figcaption>
			</figure>
		</div>
		
		<div class="artigo-col-4">				
			<figure class="artigo-cat-img-caption">
				<a href="#"><img src="images/showcase/category-img2.jpg" alt="" title=""> </a>
				<figcaption>
					<h2> <a href="{{ route('category.show', 'travel') }}"> Travel </a> </h2>
				</figcaption>
			</figure>
		</div>
    </div> 
@endsection
