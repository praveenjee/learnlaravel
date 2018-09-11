@extends('back.layout')

@section('stylesheets')
  
  @include('back.includes.stylesheets')
	
@endsection

@section('main')
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3>Posts</h3>
	  </div>
	  <div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		  <div class="input-group">
		  {{--<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
			  <button class="btn btn-default" type="button">Go!</button>
		  </span>--}} 
		  </div>
		</div>
	  </div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>View all posts <small>Total no of posts: {{$total}}</small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li>
				@if (Session::has('message'))
					@component('back.alert-success')
						{{ Session::get('message') }}
					@endcomponent
				@endif
			  </li>
			</ul>	
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<!--<p class="text-muted font-13 m-b-30">&nbsp;</p>-->
			<div class="table-responsive">
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#ID</th>
						<th>Post Title</th>
						<th>Owner</th>
						<th>Category</th>
						<th>Photo</th>
						<!--<th>Description</th>
						<th>Meta Data</th>-->
						<th>Status</th>
						<th>Featured</th>
						<th>Create Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@if($total > 0) 
						@foreach($posts as $key => $post)
						<tr>
							<td>{{ $post->id }}</td>
							<td>
                  {{ $post->title }}
                  <small><br><br>
                    <strong>Slug:</strong>
                    {{ $post->seo_url }}
                  </small>
              </td>
			<td><a href="{{ URL::to('admin/users/' . $post->user_id . '/edit') }}">{{$post->user->name}}</a></td>	
              <td>
                @foreach($post->categories as $cat)
                <span>{{$cat->title . ','}}</span>                
                @endforeach
              </td>							
				<td>
                <img src="{{ $post->photo ? '/../uploads/posts/'. $post->photo->name : '/../images/default.png' }}" width="45" alt="" title="" data-photoId="{{$post->photo_id}}" />
              </td>								
				{{--<td>{{ str_limit($post->excerpt, 30) }}</td>
				<td>
				<strong>Meta Title:</strong> {{$post->meta_title}}<br>
                  <strong>Meta Keyword:</strong> {{$post->meta_keyword}}<br>
                  <strong>Meta Description:</strong> {{$post->meta_description}}
				</td>--}}
              <td>
                @if($post->status == 1)
                  <span style="color:green;font-weight:bold;">{{ 'Active' }}</span> &nbsp;
                @else
                  <span style="color:red;font-weight:bold;">{{ 'Inactive' }}</span> &nbsp;
                @endif
              </td>
              <td>
                @if($post->featured == 1)
                  <span style="color:green;font-weight:bold;">{{ 'Yes' }}</span> &nbsp;
                @else
                  <span style="color:red;font-weight:bold;">{{ 'No' }}</span> &nbsp;
                @endif
              </td>
              <td>
                {{ $post->created_at->diffForHumans() }}
              </td>
							<td class="text-center">
								<a href="{{ route('post', [$post->seo_url]) }}" title="View Post" target="_blank" class="actn"><i class="fa fa-eye" aria-hidden="true"></i></a>

								<a href="{{ URL::to('admin/posts/' . $post->id . '/edit') }}" title="Edit Post" class="actn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

								<a href="javascript:delpost({{$post->id}});" title="Delete Post"><i class="fa fa-trash" aria-hidden="true" class="actn"></i></a>
									
								<form action="{{ url('admin/posts', [$post->id]) }}" method="POST" id="frmDelPost_{{$post->id}}">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form> 

								<!--<a href="{{ route('comments.show', [$post->id]) }}" title="View Comments"><i class="fa fa-comment" class="actn"></i></a>-->
								<a href="{{ url('admin/comments', [$post->id]) }}" title="View Comments"><i class="fa fa-comment" class="actn"></i></a>
							</td>
						</tr>
						@endforeach
					@else
					<tr>
						<td colspan="11">Records not found.</td>						
					</tr>
					@endif		
				</tbody>
			</table>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
@endsection

@section('scripts') 
  
  @include('back.includes.scripts')

	<script>
		function delpost(uid){
			if(confirm("Are you sure want to delete this post?")){
				document.getElementById("frmDelPost_" + uid).submit();
			}
		}
	</script>
    
@endsection