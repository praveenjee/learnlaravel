<div class="alert alert-danger">
	<!--<div class="alert-title">{{ $title }}:</div>-->
	<button type="button" class="close" data-dismiss="alert">×</button>
	<ul>
		@foreach ($errors as $e)
		<li>{{ $e }}</li>
		@endforeach
	</ul>
</div>