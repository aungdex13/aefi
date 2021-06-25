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
			animationEnabled: true,
			title: {
				// text: "จำนวนผู้ป่วยรายเดือน"
			},
			data: [{
					type: "line",
					name: "AEFI1",
					dataPoints: [
						// @ foreach($count_month as $row)
						{
							y: {{isset($count_month_jan[0]->month_jan) ? $count_month_jan[0]->month_jan : 0}}, label: "มกราคม"
						},
						{
							y:  {{isset($count_month_feb[0]->month_feb) ? $count_month_feb[0]->month_feb : 0}}, label: "กุมภาพันธ์"
						},
						{
							y:  {{isset($count_month_mar[0]->month_mar) ? $count_month_mar[0]->month_mar : 0}}, label: "มีนาคม"
						},
						{
							y: {{isset($count_month_apr[0]->month_apr) ? $count_month_apr[0]->month_apr : 0}}, label: "เมษายน"
						},
						{
							y:  {{isset($count_month_may[0]->month_may) ? $count_month_may[0]->month_may : 0}}, label: "พฤษภาคม"
						},
						{
							y:  {{isset($count_month_jun[0]->month_jun) ? $count_month_jun[0]->month_jun : 0}}, label: "มิถุนายน"
						},
						{
							y:  {{isset($count_month_jul[0]->month_jul) ? $count_month_jul[0]->month_jul : 0}}, label: "กรกฎาคม"
						},
						{
							y:  {{isset($count_month_aug[0]->month_aug) ? $count_month_aug[0]->month_aug : 0}}, label: "สิงหาคม"
						},
						{
							y:  {{isset($count_month_sep[0]->month_sep) ? $count_month_sep[0]->month_sep : 0}}, label: "กันยายน"
						},
						{
							y:  {{isset($count_month_oct[0]->month_oct) ? $count_month_oct[0]->month_oct : 0}}, label: "ตุลาคม"
						},
						{
							y:  {{isset($count_month_nov[0]->month_nov) ? $count_month_nov[0]->month_nov : 0}}, label: "พฤศจิกายน"
						},
						{
							y:  {{isset($count_month_dec[0]->month_dec) ? $count_month_dec[0]->month_dec : 0}}, label: "ธันวาคม"
						}
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
			// /theme: "dark2",  "light1", "light2", "dark1"title: "จำนวนของวัคซีน"
			theme: "light1", // "light1", "light2", "dark1"
  animationEnabled: true,
  exportEnabled: true,
  title: {
    // text: "Top 10 จำนวนของวัคซีน"
  },
  axisX: {
    margin: 10,
     labelPlacement: "inside",
    // tickPlacement: "inside"
  },

  axisY: {
    title: "จำนวนของวัคซีน",
  },
  data: [{
    type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
		legendText: "จำนวนวัคซีน 10 อันดับ",
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
};
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
