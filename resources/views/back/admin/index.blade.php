@extends('back.layout')
@section('css')
    <!--<link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">-->
    <style>
        input, th span { cursor: pointer; }
    </style>
@endsection

@section('main')
<div class="right_col" role="main">
  <div class="">
	<div class="row top_tiles">
	  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
		  <div class="icon"><i class="fa fa-envelope"></i></div>
		  <div class="count">{{ $totalContacts }}</div>
		  <h3>Total Contacts</h3>
		  <p><a href="{{ ('admin/contacts') }}">More info <span class="fa fa-arrow-circle-right"></span></a></p>
		</div>
	  </div>
	  
	  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
		  <div class="icon"><i class="fa fa-user"></i></div>
		  <div class="count">{{ $totalUsers }}</div>
		  <h3>Total Users</h3>
		  <p><a href="{{ ('admin/users') }}">More info <span class="fa fa-arrow-circle-right"></span></a></p>
		</div>
	  </div>
	  
	  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
		  <div class="icon"><i class="fa fa-pencil"></i></div>
		  <div class="count">{{ $totalPosts }}</div>
		  <h3>Total Posts</h3>
		  <p><a href="{{ ('admin/posts') }}">More info <span class="fa fa-arrow-circle-right"></span></a></p>
		</div>
	  </div>
	  
	  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
		  <div class="icon"><i class="fa fa-comments-o"></i></div>
		  <div class="count">{{ $totalCategories }}</div>
		  <h3>Total Categories</h3>
		  <p><a href="{{ ('admin/categories') }}">More info <span class="fa fa-arrow-circle-right"></span></a></p>
		</div>
	  </div>			  
	</div>           
	
	<div class="row"></div>
	
  </div>
</div>
@endsection

@section('js')
    <!--<script src="{{ asset('adminlte/js/back.js') }}"></script>-->
    <script></script>
@endsection