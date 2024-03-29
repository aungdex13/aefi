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
<script src="/asset/bower_components/canvasjs/canvasjs.min.js"></script>

<?php
	$arr_age_group = load_age_group();
	$arr_gender = load_gender();
	$arr_color_gender = load_color_gender();
	// var_dump($arr_age_group);
?>
<script>
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
							y: {{($count_month_jan[0]->month_jan == 0 ? "null" : $count_month_jan[0]->month_jan)}}, label: "มกราคม"
						},
						{
							y:  {{($count_month_feb[0]->month_feb == 0 ? "null" : $count_month_feb[0]->month_feb)}}, label: "กุมภาพันธ์"
						},
						{
							y:  {{($count_month_mar[0]->month_mar == 0 ? "null" : $count_month_mar[0]->month_mar)}}, label: "มีนาคม"
						},
						{
							y: {{($count_month_apr[0]->month_apr == 0 ? "null" : $count_month_apr[0]->month_apr)}}, label: "เมษายน"
						},
						{
							y:  {{($count_month_may[0]->month_may == 0 ? "null" : $count_month_may[0]->month_may)}}, label: "พฤษภาคม"
						},
						{
							y:  {{($count_month_jun[0]->month_jun == 0 ? "null" : $count_month_jun[0]->month_jun)}}, label: "มิถุนายน"
						},
						{
							y:  {{($count_month_jul[0]->month_jul == 0 ? "null" : $count_month_jul[0]->month_jul)}}, label: "กรกฎาคม"
						},
						{
							y:  {{($count_month_aug[0]->month_aug == 0 ? "null" : $count_month_aug[0]->month_aug)}}, label: "สิงหาคม"
						},
						{
							y:  {{($count_month_sep[0]->month_sep == 0 ? "null" : $count_month_sep[0]->month_sep)}}, label: "กันยายน"
						},
						{
							y:  {{($count_month_oct[0]->month_oct == 0 ? "null" : $count_month_oct[0]->month_oct)}}, label: "ตุลาคม"
						},
						{
							y:  {{($count_month_nov[0]->month_nov == 0 ? "null" : $count_month_nov[0]->month_nov)}}, label: "พฤศจิกายน"
						},
						{
							y:  {{($count_month_dec[0]->month_dec == 0 ? "null" : $count_month_dec[0]->month_dec)}}, label: "ธันวาคม"
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
						y:  ({{$row->gender_n}} / (
							{{isset($count_month_jan[0]->month_jan) ? $count_month_jan[0]->month_jan : 0}} +
							{{isset($count_month_feb[0]->month_feb) ? $count_month_feb[0]->month_feb : 0}} +
							{{isset($count_month_mar[0]->month_mar) ? $count_month_mar[0]->month_mar : 0}} +
							{{isset($count_month_apr[0]->month_apr) ? $count_month_apr[0]->month_apr : 0}} +
							{{isset($count_month_may[0]->month_may) ? $count_month_may[0]->month_may : 0}} +
							{{isset($count_month_jun[0]->month_jun) ? $count_month_jun[0]->month_jun : 0}} +
							{{isset($count_month_jul[0]->month_jul) ? $count_month_jul[0]->month_jul : 0}} +
							{{isset($count_month_aug[0]->month_aug) ? $count_month_aug[0]->month_aug : 0}} +
							{{isset($count_month_sep[0]->month_sep) ? $count_month_sep[0]->month_sep : 0}} +
							{{isset($count_month_oct[0]->month_oct) ? $count_month_oct[0]->month_oct : 0}} +
							{{isset($count_month_nov[0]->month_nov) ? $count_month_nov[0]->month_nov : 0}} +
							{{isset($count_month_dec[0]->month_dec) ? $count_month_dec[0]->month_dec : 0}}
						))*100,
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
     // labelPlacement: "inside",
    // tickPlacement: "inside"
  },

  axisY: {
    title: "จำนวนของวัคซีน",
  },
	dataPointWidth: 50,
  data: [{
    type: "column",
		showInLegend: true,
		legendMarkerColor: "grey",
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
		dataPointWidth: 50,
		data: [{
			type: "column",
			showInLegend: true,
			legendMarkerColor: "grey",
			dataPoints: [
				@foreach($count_groupage as $row)
					{ y: {{ $row->countage }} ,
						label: @if ($row->age_range == null)
										"ไม่ระบุ"
									 @else
									 "{{ $row->age_range }}"
									 @endif },
				@endforeach
			]
		}]
	});
	chart.render();
};
</script>
<script type='text/javascript' src='/asset/bower_components/canvasjs/loader.js'></script>
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
