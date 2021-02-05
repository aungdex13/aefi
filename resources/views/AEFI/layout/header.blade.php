
		<header class="main-header">
  <!-- Logo -->
  <a href="index" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>AE</b>FI</span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>AEFI</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	  <span class="sr-only">Toggle navigation</span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</a>

	<div class="navbar-custom-menu">
	  <ul class="nav navbar-nav">
		<!-- Messages: style can be found in dropdown.less-->
		<!-- User Account: style can be found in dropdown.less -->
		<li class="dropdown user user-menu">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<img src="/asset/dist/img/avatar04.png" class="user-image" alt="User Image">
			<span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->sur_name }}<span class="caret"></span></span>
		  </a>
		  <ul class="dropdown-menu">
			<!-- User image -->
			<li class="user-header">
			  <img src="/asset/dist/img/avatar04.png" class="img-circle" alt="User Image">
			  <p>
				{{ Auth::user()->name }} {{ Auth::user()->sur_name }}
				<small>Member since {{ Auth::user()->created_at}}</small>
				<small>@if(Session::get('user_role')) สิทธิ์ : {{ Session::get('user_role') }} @endif</small>
			  </p>
			</li>
			<!-- Menu Body -->
			<li class="user-body">
			  {{-- <div class="row">
				<div class="col-xs-4 text-center">
				  <a href="#">Followers</a>
				</div>
				<div class="col-xs-4 text-center">
				  <a href="#">Sales</a>
				</div>
				<div class="col-xs-4 text-center">
				  <a href="#">Friends</a>
				</div>
			  </div> --}}
			  <!-- /.row -->
			</li>
			<!-- Menu Footer-->
			<li class="user-footer">
				<div class="pull-left">
				  <a href="{{ route('myprofile') }}" class="btn btn-default btn-flat">MyProfile</a>
				</div>
			  <div class="pull-right">
				<a class="btn btn-default btn-flat" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			  </div>
			</li>
		  </ul>
		</li>
		<!-- Control Sidebar Toggle Button -->
		<!-- <li>
		  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		</li> -->
	  </ul>
	</div>
  </nav>

</header>
