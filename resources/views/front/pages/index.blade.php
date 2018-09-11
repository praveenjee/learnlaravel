@extends('layouts.page')

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

	<div class="artigo-content-holder artigo-fw-page">

		<div class="artigo-error404">	
		{!! $page->body !!}			
		</div>

	</div>

@endsection