<!-- jQuery 3 -->
<script src="/asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="/asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="/asset/bower_components/moment/min/moment.min.js"></script>
<!-- SlimScroll -->
<script src="/asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/asset/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="/asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/asset/dist/js/adminlte.min.js"></script>
<script src="/asset/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="/asset/dist/js/pages/chartdashbard.js"></script> --}}
<!-- AdminLTE for demo purposes s-->
<script src="/asset/dist/js/demo.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
{{-- <script>
	$(function() {

		var linechart = new CanvasJS.Chart("linechartContainer", {
			animationEnabled: true,
			theme: "light2",
			title: {
				text: "จำนวนผู้ป่วยรายเดือน"
			},
			axisY: {
				includeZero: false
			},
			data: [{
				type: "line",
				dataPoints: [{
						y: 4
					},
					{
						y: 414
					},
					{
						y: 520
					},
					{
						y: 460
					},
					{
						y: 450
					},
					{
						y: 500
					},
					{
						y: 480
					},
					{
						y: 480
					},
					{
						y: 410
					},
					{
						y: 500
					},
					{
						y: 480
					},
					{
						y: 510
					}
				]
			}]
		});
		linechart.render();

		var piechart = new CanvasJS.Chart("pieechart", {
			animationEnabled: true,
			title: {
				text: "Desktop Search Engine Market Share - 2016"
			},
			data: [{
				type: "pie",
				startAngle: 240,
				yValueFormatString: "##0.00\"%\"",
				indexLabel: "{label} {y}",
				dataPoints: [{
						y: 70.45,
						label: "Google"
					},
					{
						y: 7.31,
						label: "Bing"
					},
					{
						y: 7.06,
						label: "Baidu"
					},
					{
						y: 4.91,
						label: "Yahoo"
					},
					{
						y: 10.26,
						label: "Others"
					}
				]
			}]
		});
		piechart.render();
		var barchart = new CanvasJS.Chart("barchartContainer", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title: {
				text: "Top Oil Reserves"
			},
			axisY: {
				title: "Reserves(MMbbl)"
			},
			data: [{
				type: "column",
				showInLegend: true,
				legendMarkerColor: "grey",
				legendText: "MMbbl = one million barrels",
				dataPoints: [{
						y: 300878,
						label: "Venezuela"
					},
					{
						y: 266455,
						label: "Saudi"
					},
					{
						y: 169709,
						label: "Canada"
					},
					{
						y: 158400,
						label: "Iran"
					},
					{
						y: 142503,
						label: "Iraq"
					},
					{
						y: 101500,
						label: "Kuwait"
					},
					{
						y: 97800,
						label: "UAE"
					},
					{
						y: 80000,
						label: "Russia"
					}
				]
			}]
		});
		barchart.render();

	});
</script> --}}
<script>
	window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			title: {
				text: "จำนวนผู้ป่วยรายเดือน"
			},
			axisX: {
				valueFormatString: "MMMM"
			},
			axisY: {
				title: "จำนวนผู้ป่วย",
			},
			data: [{
					type: "line",
					name: "AEFI1",
					dataPoints: [
						// @ foreach($count_month as $row)
						{
							x: new Date({{$yearnow}}, 0),
							y: {{isset($count_month[0]->count_patient) ? $count_month[0]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 1),
							y: {{isset($count_month[1]->count_patient) ? $count_month[1]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 2),
							y: {{isset($count_month[2]->count_patient) ? $count_month[2]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 3),
							y: {{isset($count_month[3]->count_patient) ? $count_month[3]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 4),
							y: {{isset($count_month[4]->count_patient) ? $count_month[4]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 5),
							y: {{isset($count_month[5]->count_patient) ? $count_month[5]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 6),
							y: {{isset($count_month[6]->count_patient) ? $count_month[6]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 7),
							y: {{isset($count_month[7]->count_patient) ? $count_month[7]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 8),
							y: {{isset($count_month[8]->count_patient) ? $count_month[8]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 9),
							y: {{isset($count_month[9]->count_patient) ? $count_month[9]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 10),
							y: {{isset($count_month[10]->count_patient) ? $count_month[10]->count_patient : 0}}
						},
						{
							x: new Date({{$yearnow}}, 11),
							y: {{isset($count_month[11]->count_patient) ? $count_month[11]->count_patient : 0}}
						},
						// {
						// 	x: new Date({{$yearnow}}, 12),
						// 	y: {{isset($count_month[12]->count_patient) ? $count_month[12]->count_patient : 0}}
						// },

						 // @ endforeach
					]
				},
				// {
				// 	type: "line",
				// 	name: "AEFI2",
				// 	dataPoints: [{
				// 			x: new Date(2019, 00, 01),
				// 			y: 2140000
				// 		},
			]
		});
		chart.render();

		var chart = new CanvasJS.Chart("piechartContainer", {
			animationEnabled: true,
			title: {
				text: "ข้อมูลความร้ายแรงของอาการ"
			},
			data: [{
				type: "pie",
				startAngle: 240,
				yValueFormatString: "##0.00\"%\"",
				indexLabel: "{label} {y}",
				dataPoints: [
					@foreach($count_seriousness_of_the_symptoms as $row)
					{
						y: {{$row->count_seriousness_of_the_symptoms}},
						label: "{{$arr_seriousness_of_the_symptoms[$row->seriousness_of_the_symptoms]}}"
					},
					@endforeach
				]
			}]
		});
		chart.render();


		var chart = new CanvasJS.Chart("barchartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			theme: "light1", // "light1", "light2", "dark1", "dark2"
			title: {
				text: "กราฟอัตราป่วยรายจังหวัด"
			},
			data: [{
				type: "column", //change type to bar, line, area, pie, etc
				//indexLabel: "{y}", //Shows y value on all Data Points
				indexLabelFontColor: "#5A5757",
				indexLabelPlacement: "outside",
				dataPoints: [{
						y: 71,
						label: "กรุงเทพมหานคร"
					},
					{
						y: 55,
						label: "เชียงใหม่"
					},
					{
						y: 43,
						label: "กาญจนบุร"
					},
					{
						y: 21,
						label: "ตาก"
					},
					{
						y: 10,
						label: "อุบลราชธานี"
					},
					{
						y: 15,
						label: "สุราษฎร์ธานี"
					},
					{
						y: 30,
						label: "ชัยภูมิ"
					},
					{
						y: 77,
						label: "แม่ฮ่องสอน"
					},
					{
						y: 50,
						label: "เพชรบูรณ์"
					},
					{
						y: 46,
						label: "ลำปาง"
					},
					{
						y: 59,
						label: "อุดรธาน"
					},
					{
						y: 39,
						label: "เชียงราย"
					},
					{
						y: 47,
						label: "น่าน"
					},
					{
						y: 80,
						label: "เลย"
					}
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
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['geochart'],
		// Note: you will need to get a mapsApiKey for your project.
		// See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
		'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
	});
	google.charts.setOnLoadCallback(drawRegionsMap);

	function drawRegionsMap() {

		var data = google.visualization.arrayToDataTable([
			['จังหวัด', 'จำนวนผู้ป่วย'],
			@foreach($count_prov as $row)
			['{{isset($listProvince[$row->province]) ? $listProvince[$row->province]:""}}', {{$row->count_prov}}],
			@endforeach
		]);

		var options = {
			region: 'TH',
			resolution: 'provinces',
			backgroundColor: '#81d4fa',
			datalessRegionColor: '#e1e1e1',
			//displayMode: 'markers',
			colorAxis: {
				colors: ['#8ec9bb', '#f2cf59', '#fa6e4f']
			},
			// colorAxis: {colors: ['white', 'yellow', 'orange', 'red']}
		};

		var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

		chart.draw(data, options);
	}
</script>
