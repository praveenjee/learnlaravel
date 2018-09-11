@extends('layouts.default')

@section('content')

<div class="artigo-content-holder"> 

    <div class="artigo-row">

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="artigo-col-6">
                    <article class="artigo-blog-item format-standard">                  
                        <div class="entry-thumbnail">
                            <a class="post-thumbnail" href="{{ route('post', [$post->seo_url]) }}"> <img src="{{ ($post->image) ? '/../uploads/posts/' . $post->image : '/../images/boxed-bg.jpg' }}" alt="" title="" style="width:100%;height:283px;"> </a>
                            <div class="posted-on"> <p> Posted on <span> {{ $post->created_at->toFormattedDateString() }} </span> </p> </div>
                        </div>

                        <div class="entry-item-details">
                            <header class="entry-header">
                                <p class="entry-cat-links"> 
                                    @foreach($post->categories as $cat)
                                    <a href="{{ route('category', [$cat->slug]) }}"> {{$cat->title}} </a>
                                    @endforeach
                                </p>
                                <h4> <a href="{{ route('post', [$post->seo_url]) }}" title=""> {{ $post->title }} </a> </h4>
                            </header>

                            <div class="entry-meta-data">
                                <p class="post-author"> <a href="#" title=""> <i class="ti-user"> </i> {{ $post->authorname }} </a> </p>                                            
                                <a href="#" title="" class="post-comments"> <i class="ti-comment"> </i> 5 Comments </a> 
                            </div>

                            <div class="entry-content">
                                <p>
                                    {{ (strlen($post->excerpt) > 75) ? str_limit($post->excerpt, 75) ."..." : $post->excerpt}}
                                </p>
                            </div>

                            <footer class="entry-footer">
                                <div class="entry-readmore">
                                    <a href="{{ route('post', [$post->seo_url]) }}" title=""> Continue Reading
                                        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                            <g fill="none" stroke="#000000" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                                <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>      
                                <div class="entry-share">   
                                    <ul class="artigo-social-links">
                                        <li><a href="mailto:" title=""><i class="ti-heart"></i></a></li>
                                        <li><a href="http://facebook.com/" title=""><i class="ti-facebook"></i></a></li>
                                        <li><a href="http://twitter.com/" title=""><i class="ti-twitter"></i></a></li>
                                        <li><a href="http://dribbble.com/" title=""><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </footer>
                        </div>
                    </article>      
                </div>
            @endforeach
        @else
            <div class="artigo-col-12">
                <div style="">There is not any post availabe this time.</div>
            </div>
        @endif    

    </div>
    
    <!--<nav class="paging-navigation">
        <div class="pagination">
            <a href="#" class="prev page-numbers"> <i class="ti-arrow-left"></i> </a>
            <a href="#" class="page-numbers"> 1 </a>
            <span class="page-numbers current"> 2 </span>
            <a href="#" class="page-numbers"> 3 </a>
            <a href="#" class="page-numbers"> 4 </a>
            <a href="#" class="page-numbers"> 5 </a>
            <a href="#" class="page-numbers"> 6 </a>
            <a href="#" class="next page-numbers"> <i class="ti-arrow-right"> </i> </a>
        </div>
    </nav>-->  
    @if(count($posts) > config('app.nbrPages.front.posts'))
    {{ $posts->render('pagination.default') }}
    @endif
</div>

@endsection
