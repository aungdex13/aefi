<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AEFI</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	@include('AEFI.layout.headScript')
</head>
<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">
	@include('AEFI.layout.header')
	<!-- =============================================== -->
	<!-- Left side column. contains the sidebar -->
	<aside class="main-sidebar">
		@include('AEFI.layout.sidebar')
	</aside>
	<!-- =============================================== -->
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
	</div>
	<!-- /.content-wrapper -->
	@include('AEFI.layout.footer')
	{{-- @include('AEFI.layout.footerScript') --}}
	{{-- @include('layouts.incFooter')
	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		@include('layouts.incControlSidebar')
	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
		immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('layouts.incFooterScript')
@yield('CustomJSScript')
@yield('script') --}}
</body>
</html>
