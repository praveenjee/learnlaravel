<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
	<h3>&nbsp;&nbsp;<!--General--></h3>
	<ul class="nav side-menu">

	  <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="{{ url('admin/users') }}" title="View all users">View All</a></li>
			<li><a href="{{ url('admin/users/create') }}" title="Add new user">Add New</a></li>
		</ul>
	  </li>

	  <li><a><i class="fa fa-envelope"></i> Contacts <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="{{ url('admin/contacts') }}" title="View all contacts">View All</a></li>
		</ul>
	  </li> 

	  <li><a><i class="fa fa-list"></i> Categories <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="{{ url('admin/categories') }}" title="View all categories">View All</a></li>
			<li><a href="{{ url('admin/categories/create') }}" title="Add new category">Add New</a></li>
		</ul>
	  </li>

	  <li><a><i class="fa fa-file-text"></i> Posts <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="{{ url('admin/posts') }}" title="View all posts">View All</a></li>
			<li><a href="{{ url('admin/posts/create') }}" title="Add new post">Add New</a></li>
			<!--<li><a href="{{ url('admin/comments') }}" title="View all comments">All Comments</a></li>-->
		</ul>
	  </li>

	  <li><a><i class="fa fa-file-text"></i> Pages <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="{{ url('admin/pages') }}" title="View all pages">View All</a></li>
			<li><a href="{{ url('admin/pages/create') }}" title="Add new page">Add New</a></li>
		</ul>
	  </li>

	  <li><a href="{{ url('admin/comments') }}"><i class="fa fa-comment"></i> Comments </a>		
	  </li>

	  <li>
	  	<a href="{{ route('medias.index') }}"><i class="fa fa-image"></i> Media </a>
	  </li>

	  <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="{{ url('admin/settings') }}" title="View Settings">View All</a></li>
		</ul>
	  </li>

	</ul>
  </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
	<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
	<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a id="logout2" data-toggle="tooltip" data-placement="top" title="Logout">
	<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->