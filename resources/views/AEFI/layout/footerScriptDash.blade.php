
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
<!-- AdminLTE for demo purposes -->
<script src="/asset/dist/js/demo.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
	$(function () {
		var linechart = new CanvasJS.Chart("linechartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "จำนวนผู้ป่วยรายเดือน"
	},
	axisY:{
		includeZero: false
	},
	data: [{
		type: "line",
		dataPoints: [
			{ y: 450 },
			{ y: 414},
			{ y: 520},
			{ y: 460 },
			{ y: 450 },
			{ y: 500 },
			{ y: 480 },
			{ y: 480 },
			{ y: 410},
			{ y: 500 },
			{ y: 480 },
			{ y: 510 }
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
		dataPoints: [
			{y: 70.45, label: "Google"},
			{y: 7.31, label: "Bing"},
			{y: 7.06, label: "Baidu"},
			{y: 4.91, label: "Yahoo"},
			{y: 10.26, label: "Others"}
		]
	}]
});
piechart.render();
var barchart = new CanvasJS.Chart("barchartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
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
		dataPoints: [
			{ y: 300878, label: "Venezuela" },
			{ y: 266455,  label: "Saudi" },
			{ y: 169709,  label: "Canada" },
			{ y: 158400,  label: "Iran" },
			{ y: 142503,  label: "Iraq" },
			{ y: 101500, label: "Kuwait" },
			{ y: 97800,  label: "UAE" },
			{ y: 80000,  label: "Russia" }
		]
	}]
});
barchart.render();

	});
</script>
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
