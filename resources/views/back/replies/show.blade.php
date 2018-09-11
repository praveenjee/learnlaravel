@extends('back.layout')

@section('stylesheets')
	@include('back.includes.stylesheets')  
@endsection

@section('main')
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3>Replies</h3>
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
			<h2>View All Replies <small>Total no of replies: {{$total}}</small></h2>
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
			<table id="datatable" class="table table-striped">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comments</th>            
            <th>Create Date</th>			
            <th class="text-center" colspan="3">Action</th>
          </tr>
        </thead>
				<tbody>
          @if($total > 0)
          @foreach($replies as $reply)
          <tr>
            <td>{{ $reply->id }}</td>
            <td>{{ $reply->author }}</td>
            <td>{{ $reply->email }}</td>
            <td>{{ $reply->body }}</td>
            <td>{{ $reply->created_at->diffForHumans() }}</td> 
			<td><a href="{{ route('post', $reply->comment->post->seo_url) }}" class="btn btn-link">View Post</a></td>
            <td>
                @if($reply->is_active == 1) 
                <form name="frmChangeStatus" method="POST" action="{{url('admin/comment/replies', [$reply->id])}}">
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="is_active" value="0">
                  <button type="submit" class="btn btn-success btn-sm">Unapprove</button>
                </form>
                @else
                <form name="frmChangeStatus" method="POST" action="{{url('admin/comment/replies', [$reply->id])}}">
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="is_active" value="1">
                  <button type="submit" class="btn btn-info btn-sm">Approve</button>
                </form>
                @endif
            </td>
            <td>
              <form id="frmDeletereply_{{$reply->id}}" name="frmDeletereply" method="POST" action="{{url('admin/comment/replies', [$reply->id])}}">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                  <button type="button" class="btn btn-danger btn-sm delreply" onclick="delreply({{$reply->id}});">Delete</button>
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
		function delreply(id){
			if(confirm("Are you sure want to delete this reply?")){
				document.getElementById("frmDeletereply_" + id).submit();
			}
		}
	</script>      
@endsection