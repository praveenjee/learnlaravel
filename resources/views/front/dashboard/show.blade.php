@extends('layouts.dashboard')

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
<div class="theme-box theme-box-primary">
	<h2 class="theme-box-title">My Bookmarked Posts 
		<span class="theme-box-title-right">
			<a href="#" >&nbsp;</a>
		</span>
	</h2>
	<div class="theme-box-content">
		<div class="text-center">
			<p>&nbsp;</p>
			<h4>Comming Soon.... </h4>
			<p>&nbsp;</p>
			
		</div>											
	</div>
</div>
@endsection