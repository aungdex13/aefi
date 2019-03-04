<!DOCTYPE html>
<html>
<head>
	@include('AEFI.layout.loginheadScript')
</head>
	<!-- =============================================== -->
	<!-- Content Wrapper. Contains page content -->
		@yield('login')
	@include('AEFI.layout.loginfooterScript')
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
