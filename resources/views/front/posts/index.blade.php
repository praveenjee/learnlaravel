@extends('layouts.blog-detail')

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

		<article class="artigo-blog-item format-standard artigo-blog-details">					
			<div class="entry-thumbnail">
				<a class="post-thumbnail" href="javascript:void(0);"> <img src="{{ ($post->image) ? '/../uploads/posts/' . $post->image : '/../images/boxed-bg.jpg' }}" alt="" title="" style="width:100%;height:404px;"> </a>
				<div class="posted-on"> <p> Posted on <span> {{ $post->created_at->toFormattedDateString() }} </span> </p> </div>
			</div>

			<div class="entry-item-details">
				<header class="entry-header">
					<p class="entry-cat-links"> 
						@if(count($post->allcategories) > 0)
							@foreach($post->allcategories as $category)
								<a href="{{ route('category.show', [$category->slug ]) }}"> {{ $category->title }} </a>
							@endforeach
						@endif						
					</p>
					<h4> <a href="javascript:void(0);" title=""> {{ $post->title }} </a> </h4>
				</header>

				<div class="entry-meta-data">
					<p class="post-author"> <a href="author-detail.html" title=""> <i class="ti-user"> </i> {{ $post->authorname }} </a> </p>											
					<a href="{{ route('post', [$post->seo_url]) }}" title="" class="post-comments"> <i class="ti-comment"> </i> 5 Comments </a> 
				</div>

				<div class="entry-content">
					
					{!! $post->body !!}
					
					<div class="artigo-topmargin-10"></div>
				</div>

				<footer class="entry-footer">
					<div class="entry-share">
						<h6> SHARE THIS : </h6>	
						<ul class="artigo-social-links">
							<li><a href="mailto:" title=""><i class="ti-heart"></i></a></li>
							<li><a href="http://facebook.com/" title=""><i class="ti-facebook"></i></a></li>
							<li><a href="http://twitter.com/" title=""><i class="ti-twitter"></i></a></li>
							<li><a href="http://dribbble.com/" title=""><i class="fa fa-dribbble"></i></a></li>
						</ul>
					</div>
					<div class="entry-tags">
						<h6> POSTED IN : </h6>
						<p class="entry-tag-links">
							<a href="category-page.html"> Fashion, </a><a href="category-page.html"> Travel, </a><a href="category-page.html"> News </a>
						</p>
					</div>
				</footer>					

			</div>					

		</article>	

		<div class="entry-about-author">
			<div class="author-thumb">
				<img src="/../images/author.jpg" alt="" title="">
			</div>
			<div class="author-details">
				<h5> Leisha Adam Williams </h5>													
				<p> Lorem ipsum dolor sit amet, constetur adipiscing elit. Aenean porta, lorem at egestas cursus, dolor risus diet nulla, a elementum odio lorem quis orci. </p>	
				<div class="author-share">
					<h6> Follow me : </h6>	
					<ul class="artigo-social-links">
						<li><a href="http://facebook.com/" title=""><i class="ti-facebook"></i></a></li>
						<li><a href="http://twitter.com/" title=""><i class="ti-twitter"></i></a></li>
						<li><a href="http://plus.google.com/" title=""><i class="ti-google"></i></a></li>
						<li><a href="http://dribbble.com/" title=""><i class="fa fa-dribbble"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="artigo-topmargin-50"> </div>

		<div class="entry-post-pagination">
			<div class="pagination-item-prev">
				@if($post->previous)
					<a href="{{ route('post', [ $post->previous->seo_url]) }}" title="" class="post-pagination-prev"> <i class="ti-shift-left-alt"> </i> </a>						
					<a href="{{ route('post', [ $post->previous->seo_url]) }}" title="" class="page-thumb"> <img src="{{ ($post->previous && $post->previous->image) ? '/../uploads/posts/' . $post->previous->image : '/../images/boxed-bg.jpg' }}" alt="" title="" style="width: 80px;height: 65px;"> </a>

					<h6> <a href="{{ route('post', [ $post->previous->seo_url]) }}" title=""> {{ $post->previous->title }} </a> </h6>

					<span class="post-date"> <i class="ti-calendar"> </i> {{ $post->previous->created_at->toFormattedDateString() }} </span>
				@endif
			</div>
			<div class="pagination-item-next">
				@if($post->next)
					<a href="{{ route('post', [ $post->next->seo_url]) }}" title="" class="post-pagination-next"> <i class="ti-shift-right-alt"> </i> </a>						
					<a href="{{ route('post', [ $post->next->seo_url]) }}" title="" class="page-thumb">	<img src="{{ ($post->next && $post->next->image) ? '/../uploads/posts/' . $post->next->image : '/../images/boxed-bg.jpg' }}" alt="" title="" style="width: 80px;height: 65px;"> </a>

					<h6> <a href="{{ route('post', [ $post->next->seo_url]) }}" title=""> {{ $post->next->title }} </a> </h6>

					<span class="post-date"> <i class="ti-calendar"> </i> {{ $post->next->created_at->toFormattedDateString() }} </span>
				@endif
			</div>
		</div>

		<div class="artigo-topmargin-50"> </div>

		<div class="artigo-heading aligncenter">
			<h5> YOU MAY ALSO LIKE </h5>
		</div>

		<div class="artigo-row">
			@if(count($post->others) > 0) 
				@foreach($post->others as $opost)
				<div class="artigo-col-4" data-postid="{{$opost->id}}">
					<div class="simple-article">
						<a href="{{ route('post', [$opost->seo_url]) }}" title=""> <img src="{{ '/../uploads/posts/' . $opost->image }}" alt="" title="" style="width:100%;height:202px;"> </a>
						<h6> <a href="{{ route('post', [$opost->seo_url]) }}" title=""> {{ $opost->title }} </a> </h6>
						<span class="opost-date"> <i class="ti-calendar"> </i> {{ $opost->created_at->toFormattedDateString() }} </span>
					</div>
				</div>
				@endforeach
			@endif
		</div>

		<div class="artigo-column-divider"> </div>

		<div class="comment-respond" id="respond">
			<div class="artigo-heading aligncenter">
				<h5 style="margin-bottom: 15px;"> LEAVE A COMMENT </h5>
			</div>
			@if(Auth::user())
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

				@if(Session::has('comment_message'))
				<div class="artigo-row">
					<div class="artigo-col-12" style="color:green;font-weight: bold;">
					{{ session('comment_message') }}
					</div>
				</div>
				@endif 
				<form novalidate="" class="comment-form" id="commentform" method="post" action="{{ route('post.comments.store', $post->seo_url) }}">	{{ csrf_field() }}
					<input type="hidden" name="post_id" value="{{ $post->id }}" >
					<textarea rows="2" cols="3" name="comment" id="comment"></textarea>
					<input type="submit" value="Submit Comment" class="submit" id="submitcomment" name="submit">
				</form> 
			@else
				<div class="artigo-row">
					<div class="artigo-col-12">
						Please <a href="{{ route('login') }}" style="font-weight: bold;">login</a> to leave a comment.
					</div>
				</div>
			@endif	
			<div class="artigo-topmargin-50"> </div>
		</div>

		@if(count($comments) > 0)
		<div class="comments-area">
			<div class="artigo-heading aligncenter">
				<h5> {{ count($comments) }} COMMENTS </h5>
			</div>
			
			<ol class="comment-list">
				@foreach($comments as $comment)
				<li class="comment" > 				
					<article class="comment-body">
						<footer class="comment-meta">
							<div class="comment-author"> 
								<!--<img class="avatar" src="{{ $comment->photo ? '/../uploads/users/'.$comment->photo : '/../images/blog/blog-author1.jpg' }}" alt="">--> 
								<img class="avatar" src="{{ Auth::check() ? Auth::user()->getGravatarAttribute() : '/../images/blog/blog-author1.jpg' }}" alt="Author">
								<h6> <a class="url" href="#"> {{ $comment->author }} </a> </h6>
							</div>
							<div class="comment-metadata">
								<time datetime="{{ $comment->created_at }}"> {{ $comment->created_at->diffForHumans() }} </time>
							</div>				                    
						</footer>
						<div class="comment-content">
							{{ $comment->body }}

							<!--For displaying reply message-->
							<div id='rplmsg-{{$comment->id}}' class='rplmsg'></div>
						</div>
						
						@if(Auth::check())
						<div class="reply"><a href="javascript:;" onclick="toggleReply({{$comment->id}});" class="comment-reply-link">Reply <i class="fa fa-level-down"></i></a>
						</div>
						@endif
						
						<div class="replyinput" id="replyinput_{{$comment->id}}">
							{{ Form::open(['metbod'=> 'Post', 'id'=> 'frmReply_'. $comment->id, 'action'=> 'Front\CommentRepliesController@store' ]) }} 
							<input type="hidden" name="post_id" value="{{$post->id}}" />
							<input type="hidden" name="comment_id" value="{{$comment->id}}" />
							{{ Form::textarea('body', null, ['class'=>'form-control', 'cols' => 25, 'rows' => 2, 'placeholder' => 'Reply here.']) }}
							{{ Form::button('submit', ['class'=> 'btn btn-primary savereply', 'onclick' => "saveReply($comment->id);"]) }}
							{{ Form::close() }}
						</div>	
					</article>	
					@if(count($comment->allreplies) >0 )		
						
					<ol class="children">
						@foreach($comment->allreplies as $reply)					
						<li class="comment bypostauthor">        
							<article class="comment-body">
								<footer class="comment-meta">
									<div class="comment-author"> 
										<img class="avatar" src="{{ $reply->photo ? '/../uploads/users/'.$reply->photo : '/../images/blog/blog-author2.jpg' }}" alt=""> 
										<h6> <a class="url" href="#">{{$reply->author}}</a> </h6>
									</div>
									<div class="comment-metadata">
										<time datetime="{{ $comment->created_at }}"> {{ $reply->created_at->diffForHumans() }} </time>
									</div>						                    
								</footer>
								<div class="comment-content">
									{{ $reply->body }}
								</div>
								<!--<div class="reply"><a href="#" class="comment-reply-link">Reply <i class="fa fa-level-down"></i></a></div>-->
							</article>                 
						</li>
						@endforeach						
					</ol>
					@endif
				</li>
				@endforeach								        
			</ol>

			<!--<div class="artigo-column-divider"> </div>-->			
		</div>
		@endif
	</div>

@endsection

<script>
	function toggleReply(divid)
	{
		$(".replyinput").hide();
		$("#replyinput_" + divid).show();
		$('textarea[name="body"]').css({'border':'1px solid #000'});
	} 

	function saveReply(commentId)
	{
		$('textarea[name="body"]').css({'border':'1px solid #000'});
		var input = $('#frmReply_' + commentId + ' textarea');
		if($.trim(input.val()) == ""){
	 		input.css({'border':'1px solid red'});
	 		input.focus();
	 		return false;
	 	} else {
	 		$.ajax({
		       type:'POST',
		       url:'/comment/replies',
		       data: {
		       	'_token' : '<?php echo csrf_token() ?>',
		       	'body' : $.trim(input.val()),
		       	'comment_id' : commentId
		       },
		       success:function(data){
				//console.log(data);
				$('#frmReply_' + commentId).trigger("reset");
				$("#rplmsg-"+commentId).html(data.msg).delay(5000).fadeOut();
				$('#frmReply_' + commentId + ' textarea').delay(5000).fadeOut();
		       }
		    });
	 	}
	}
</script>
