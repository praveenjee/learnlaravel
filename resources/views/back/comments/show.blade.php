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
			<h2>View All Comments <small>Total no of comments: {{$total}}</small></h2>
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
            <th>Author</th>
            <th>Email</th>
            <th>Comments</th>            
            <th>Create Date</th>
            <th class="text-center">Action</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
				<tbody>
          @if($total > 0)
          @foreach($comments as $comment)
          <tr>
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->author }}</td>
            <td>{{ $comment->email }}</td>
            <td>{{ $comment->body }}</td>
            <td>{{ $comment->created_at->diffForHumans() }}</td>
            <td>
              <a href="{{ route('post', $comment->post->seo_url) }}">View Post</a>
            </td>
            <td>
                @if($comment->is_active == 1) 
                <form name="frmChangeStatus" method="POST" action="{{url('admin/comments', [$comment->id])}}">
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="is_active" value="0">
                  <button type="submit" class="btn btn-success btn-sm">Unapprove</button>
                </form>
                @else
                <form name="frmChangeStatus" method="POST" action="{{url('admin/comments', [$comment->id])}}">
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="is_active" value="1">
                  <button type="submit" class="btn btn-info btn-sm">Approve</button>
                </form>
                @endif
            </td>
            <td>
              <form name="frmDeleteComment" method="POST" action="{{url('admin/comments', [$comment->id])}}">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
          @else
            <tr><td colspan="7">Records not found.</td></tr>
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
		function delcontact(cid){
			if(confirm("Are you sure want to delete this contact?")){
				document.getElementById("frmDelContact_" + cid).submit();
			}
		}
	</script>      
@endsection