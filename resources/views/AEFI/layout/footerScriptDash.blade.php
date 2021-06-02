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
<!-- bootstrap datepicker -->
<script src="/asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php
	$arr_age_group = load_age_group();
	$arr_gender = load_gender();
	$arr_color_gender = load_color_gender();
	// var_dump($arr_age_group);
?>
<script>
$('#date_of_symptoms').datepicker({
	dateFormat: "yy-mm-dd"
})
	window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			exportEnabled: true,
			animationEnabled: true,
			title: {
				// text: "จำนวนผู้ป่วยรายเดือน"
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
							y: {{isset($count_month[0]->jan) ? $count_month[0]->jan : 0}}
						},
						{
							y:  {{isset($count_month[0]->feb) ? $count_month[0]->feb : 0}}
						},
						{
							y:  {{isset($count_month[0]->mar) ? $count_month[0]->mar : 0}}
						},
						{
							y: {{isset($count_month[0]->apr) ? $count_month[0]->apr : 0}}
						},
						{
							y:  {{isset($count_month[0]->may) ? $count_month[0]->may : 0}}
						},
						{
							y:  {{isset($count_month[0]->jun) ? $count_month[0]->jun : 0}}
						},
						{
							y:  {{isset($count_month[0]->jul) ? $count_month[0]->jul : 0}}
						},
						{
							y:  {{isset($count_month[0]->aug) ? $count_month[0]->aug : 0}}
						},
						{
							y:  {{isset($count_month[0]->sep) ? $count_month[0]->sep : 0}}
						},
						{
							y:  {{isset($count_month[0]->oct) ? $count_month[0]->oct : 0}}
						},
						{
							y:  {{isset($count_month[0]->nov) ? $count_month[0]->nov : 0}}
						},
						{
							y:  {{isset($count_month[0]->dec) ? $count_month[0]->dec : 0}}
						},
						// {
						// 	x: new Date({ {$yearnow}}, 12),
						// 	y: { {isset($count_month[12]->count_patient) ? $count_month[12]->count_patient : 0}}
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
			exportEnabled: true,
			animationEnabled: true,

			data: [{
				type: "pie",
				startAngle: 240,
				yValueFormatString: "##0.00\"%\"",
				indexLabel: "{label} {y}",
				colorSet:  "customColorSet1",
				dataPoints: [
					@foreach($count_all_gender as $row)
					{
						y:  ({{$row->gender_n}} / {{$countGender[0]->count_all}})*100,
						label: "{{$arr_gender[$row->gender]}}",
						color: "{{$arr_color_gender[$row->gender]}}"
					},
					@endforeach
				]
			}]
		});
		chart.render();

		var chart = new CanvasJS.Chart("chartVacname", {
			exportEnabled: true,
			animationEnabled: true,


			axisX:{
				interval: 1
			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)",
				title: "จำนวนของวัคซีน"
			},
			data: [{
				type: "bar",
				name: "companies",
				axisYType: "secondary",
				color: "#014D65",
				dataPoints: [
					@foreach($count_vacname as $row)
					{ y: {{ $row->vac_count }}, label: "{{isset($listvac_arr[$row->name_of_vaccine]) ? $listvac_arr[$row->name_of_vaccine]:""}}" },
					@endforeach
				]
			}]
		});
		chart.render();

		var chart = new CanvasJS.Chart("agegroup", {
	exportEnabled: true,
	animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		title:{
			text: ""
		},
		axisY: {

		},
		data: [{
			type: "column",
			showInLegend: true,
			legendMarkerColor: "grey",
			legendText: "",
			dataPoints: [
				@foreach($count_groupage as $row)
					{ y: {{ $row->countgroupage }} , label: "{{ $arr_age_group[$row->group_age] }}" },
				@endforeach
			]
		}]
	});
	chart.render();
}
// var jsonData = {
// 	@ foreach($count_year as $row)
//   "{ {$row->year_entry}}": [
// 			@ foreach($count_month as $rowm)
//     			{ "x": "{ {$rowm->year_entry}}-{ {$rowm->month_entry}}", "y": { {$rowm->count_patient}} },
// 			@ endforeach
//   ],
// 	@ endforeach
// }
var dataPoints = [];
var chart = new CanvasJS.Chart("chartContainertest",{
  axisX: {
    valueFormatString: "D/MM h:mm",
    intervalType: 'month',
    interval: 1
  },
  data: [{
    type: 'column',
    //xValueFormatString:"D MM h:mm",
    xValueType: "dateTime",
    showInLegend: true,
    name: "series1",
    legendText: "EnergykWh",
    dataPoints: dataPoints // this should contain only specific serial number data

  }]
});
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
			//displayMode: 'markers',o
			colorAxis: {
				colors: ['#8ec9bb', '#f2cf59', '#fa6e4f']
			},
			// colorAxis: {colors: ['white', 'yellow', 'orange', 'red']}
		};

		var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

		chart.draw(data, options);
	}
</script>
