
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
			<span class="hidden-xs">{{ Auth::user()->name }} <span class="caret"></span></span>
		  </a>
		  <ul class="dropdown-menu">
			<!-- User image -->
			<li class="user-header">
			  <img src="/asset/dist/img/avatar04.png" class="img-circle" alt="User Image">

			  <p>
				{{ Auth::user()->name }} <span class="caret"></span>
				<small>Member since {{ Auth::user()->created_at}}</small>
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
				{{-- <div class="pull-right">
				  <a href="#" class="btn btn-default btn-flat">Sign out</a>
				</div> --}}
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
		<li>
		  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		</li>
	  </ul>
	</div>
  </nav>
  <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "จำนวนผู้ป่วยรายเดือน"
	},
	axisX: {
	valueFormatString: "MMMM"
},
	axisY: {
		title: "จำนวน",
	},
	data: [
		{
		type: "line",
		name: "AEFI1",
		dataPoints: [
			{ x: new Date(2019, 00), y: 1613000 },
			{ x: new Date(2019, 01), y: 2821000 },
			{ x: new Date(2019, 02), y: 2000000 },
			{ x: new Date(2019, 03), y: 1397000 },
			{ x: new Date(2019, 04), y: 2506000 },
			{ x: new Date(2019, 05), y: 2798000 },
			{ x: new Date(2019, 06), y: 3386000 },
			{ x: new Date(2019, 07), y: 6704000},
			{ x: new Date(2019, 08), y: 6026000 },
			{ x: new Date(2019, 09), y: 2394000 },
			{ x: new Date(2019, 10), y: 2140000 },
			{ x: new Date(2019, 11), y: 2140000 }
		]
	},
	{
		type: "line",
		name: "AEFI2",
		dataPoints: [
			{ x: new Date(2019, 00, 01), y: 2140000 },
			{ x: new Date(2019, 01, 01), y: 6704000 },
			{ x: new Date(2019, 02, 01), y: 1190000 },
			{ x: new Date(2019, 03, 01), y: 1180000 },
			{ x: new Date(2019, 04, 01), y: 2140000 },
			{ x: new Date(2019, 05, 01), y: 1270000 },
			{ x: new Date(2019, 06, 01), y: 1003000 },
			{ x: new Date(2019, 07, 01), y: 1000300 },
			{ x: new Date(2019, 08, 01), y: 1358000 },
			{ x: new Date(2019, 09, 01), y: 1400010 },
			{ x: new Date(2019, 10, 01), y: 1480000 },
			{ x: new Date(2019, 11, 01), y: 1000500 },
		]
	},
]
	});
chart.render();

var chart = new CanvasJS.Chart("piechartContainer", {
	animationEnabled: true,
	title: {
		text: "ข้อมูลวัคซีน ที่ได้รับ"	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 59.45, label: "หัด"},
			{y: 10.31, label: "วัณโรค"},
			{y: 7.06, label: "ตับอักเสบบี"},
			{y: 4.91, label: "หัด"},
			{y: 10.26, label: "โรคไข้กาฬหลังแอ่น"}
		]
	}]
});
chart.render();


var chart = new CanvasJS.Chart("barchartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "กราฟอัตราป่วยรายจังหวัด"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: [
						{  y: 71, label: "กรุงเทพมหานคร"},
						{  y: 55, label: "เชียงใหม่"},
						{  y: 43, label: "กาญจนบุร"},
						{  y: 21, label: "ตาก"},
						{  y: 10, label: "อุบลราชธานี"},
						{  y: 15, label: "สุราษฎร์ธานี"},
						{  y: 30, label: "ชัยภูมิ"},
						{  y: 77, label: "แม่ฮ่องสอน"},
						{  y: 50, label: "เพชรบูรณ์"},
						{  y: 46, label: "ลำปาง"},
						{  y: 59, label: "อุดรธาน"},
						{  y: 39, label: "เชียงราย"},
						{  y: 47, label: "น่าน"},
						{  y: 80, label: "เลย"}
		]
	}]
});
chart.render();

// var chart = new CanvasJS.Chart("barchartContainer", {
// 	animationEnabled: true,
// 	exportEnabled: true,
// 	theme: "light1", // "light1", "light2", "dark1", "dark2"
// 	title:{
// 		text: "กราฟอัตราป่วยรายจังหวัด"
// 	},
// 	data: [{
// 		type: "column", //change type to bar, line, area, pie, etc
// 		//indexLabel: "{y}", //Shows y value on all Data Points
// 		indexLabelFontColor: "#5A5757",
// 		indexLabelPlacement: "outside",
// 		dataPoints: [
// 			{  y: 71, label: "กรุงเทพมหานคร"},
// 			{  y: 55, label: "เชียงใหม่"},
// 			{  y: 43, label: "กาญจนบุร"},
// 			{  y: 21, label: "ตาก"},
// 			{  y: 10, label: "อุบลราชธานี"},
// 			{  y: 15, label: "สุราษฎร์ธานี"},
// 			{  y: 30, label: "ชัยภูมิ"},
// 			{  y: 77, label: "แม่ฮ่องสอน"},
// 			{  y: 50, label: "เพชรบูรณ์"},
// 			{  y: 46, label: "ลำปาง"},
// 			{  y: 59, label: "อุดรธาน"},
// 			{  y: 39, label: "เชียงราย"},
// 			{  y: 47, label: "น่าน"},
// 			{  y: 80, label: "เลย"}
//
//
//
// 	}]
// });
// chart.render();

}
</script>
</header>
