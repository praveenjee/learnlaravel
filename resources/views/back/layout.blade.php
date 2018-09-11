<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('messages.administration')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('adminlte/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('adminlte/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('adminlte/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
	
	<!-- jQuery custom content scroller -->
    <link href="{{ asset('adminlte/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{ asset('adminlte/css/custom.css') }}" rel="stylesheet">
	
	@yield('stylesheets')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		<!-- Fixed Sidebar Just add class menu_fixed -->
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('admin') }}" class="site_title"><i class="fa fa-paw"></i> <span>MyBlogs Admin!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ asset('adminlte/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome, Admin</span>
                <h2>Dashboard</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @include('back.leftnav')
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('adminlte/images/img.jpg') }}" alt="">Welcome, Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ url('admin/profile') }}"> Profile</a></li>
                    <li>
                      <a href="{{ url('admin/settings') }}">
                        <!--<span class="badge bg-red pull-right">50%</span>-->
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a id="logout" href="#"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    <form id="logout-form" action="{{url('logout')}}" method="POST" class="hide">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    </li>
                  </ul>
                </li>
				
				      @include('back.topnotification')
				
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
    		<section class="content">
    			@yield('main')
    		</section>
        <!-- /page content -->
		
		    @include('back.footer')
        
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('adminlte/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminlte/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('adminlte/vendors/nprogress/nprogress.js') }}"></script>	
	<!-- jQuery custom content scroller -->
    <script src="{{ asset('adminlte/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('adminlte/js/custom.min.js') }}"></script>	
	<script>
		$(document).ready(function(){
			$("#logout, #logout2").click(function(){
				document.getElementById("logout-form").submit();
			})
		});
	</script>
	@yield('scripts')
  </body>
</html>