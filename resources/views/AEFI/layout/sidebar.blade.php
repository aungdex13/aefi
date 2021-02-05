<!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
	  <div class="pull-left image">
		<img src="../asset/dist/img/avatar04.png" class="img-circle" alt="User Image">
	  </div>
	  <div class="pull-left info">
		<p>{{ Auth::user()->name }} {{ Auth::user()->sur_name }}</br>ตำแหน่ง:{{ Auth::user()->position }}</br>หน่วยงาน:{{ Auth::user()->division }}</p>
		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	  </div>
	</div>
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu" data-widget="tree">
	  <li class="header">Menu</li>
	  <li>
		<a href="{{ route('index') }}">
		  <i class="fa fa-home"></i> <span>หน้าแรก</span>
		</a>
	  </li>
	  <li class="treeview">
		<a href="#">
		  <i class="fa fa-file-text-o"></i> <span>แบบฟอร์ม</span>
		  <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		  </span>
		</a>
		<ul class="treeview-menu">
		  <li><a href="{{ route('lstf1') }}"><i class="fa fa-circle-o"></i> แบบฟอร์ม v1</a></li>
		  <li class="treeview">
			{{-- <a href="#"><i class="fa fa-circle-o"></i>  แบบฟอร์ม v2
			  <span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li><a href="{{ route('lstf2') }}"><i class="fa fa-circle-o"></i> กรอก AEFI2</a></li>
			   <li><a href="{{ route('lstef2') }}"><i class="fa fa-circle-o"></i> แก้ไข AEFI2</a></li>
			</ul> --}}
		  </li>
		</ul>
	  </li>
	  <li>
		<a href="{{ route('dashboard') }}">
		  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		</a>
	  </li>
	  <li class="treeview">
		<a href="#">
		  <i class="fa fa-table"></i> <span>Download</span>
		  <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		  </span>
		</a>
		<ul class="treeview-menu">
		  <li><a href="{{ route('dataf1export') }}"><i class="fa fa-circle-o"></i>รายงาน AEFI 1 </a></li>
		  <li><a href="{{ route('AEFI506') }}"><i class="fa fa-circle-o"></i>รายงาน ๕๐๖</a></li>
		</ul>
	  </li>
    @hasrole('admin')
    <li class="treeview @ifActiveUrl('access-control/*',true) active @endIfActiveUrl">
		<a href="#">
		  <i class="fa fa-users"></i> <span>Access-Control</span>
		  <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		  </span>
		</a>
		<ul class="treeview-menu">
		  <li class="{{ Active::checkRoute(['roles.index','roles.create','roles.edit']) }}"><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i>จัดการกลุ่มผู้ใช้งาน</a></li>
      <li class="{{ Active::checkRoute(['listusers.index','listusers.create','listusers.edit']) }}"><a href="{{ route('listusers.index') }}"><i class="fa fa-circle-o"></i>จัดการผู้ใช้งาน</a></li>
		</ul>
	  </li>
    @endhasrole
	  {{-- <li class="treeview">
		<a href="#">
		  <i class="fa fa-table"></i> <span>รายงาน</span>
		  <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		  </span>
		</a>
		<ul class="treeview-menu">
		  <li><a href="{{ route('dataf1export') }}"><i class="fa fa-circle-o"></i>รายงาน AEFI 1 ปี 2562 </a></li>
		  <li><a href="{{ route('dataf2export') }}"><i class="fa fa-circle-o"></i>รายงาน AEFI 2 ปี 2562</a></li>
		  <li><a href="{{ route('lstf2') }}"><i class="fa fa-circle-o"></i>รายงานการสอบสวนโรค</br>รายจังหวัด ปี 2560</a></li>
		</ul>
	  </li> --}}

	</ul>
  </section>
  <!-- /.sidebar -->
