<div class="theme-box theme-box-primary">
	<h2 class="theme-box-title">About Me 
		<span class="theme-box-title-right">
			<a href="#" >Edit My Profile</a>
		</span>
	</h2>
	<div class="theme-box-content">
		<div class="text-center">
			<h4>{{ Auth::user()->name }}</h4>
			<p>Member Since {{ Auth::user()->created_at->toFormattedDateString() }}</p>
			<hr>
		</div>											
	</div>
</div>	

<div class="theme-box theme-box-primary">
	<h2 class="theme-box-title">Important Links
		<span class="theme-box-title-right">
			<a href="#" >&nbsp;</a>
		</span>
	</h2>
	<div class="theme-box-content">
		<div class="text-center">
			<p></p>	
			<ul class="dashboard-left-nav">
				<li><a href="">Manage Profile</a></li>
				<li><a href="">Change Password</a></li>
			</ul>	
		</div>											
	</div>
</div>