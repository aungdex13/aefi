@extends('AEFI.layout.template')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
<section class="content-header">
  <!-- Content Header (Page header) -->
  <?php
$arr_history_of_vaccine = load_history_of_vaccine();
$arr_patient_develop_symptoms_after_previous_vaccination = load_patient_develop_symptoms_after_previous_vaccination();
$arr_underlying_disease = load_underlying_disease();
$arr_vaccine_volume = load_vaccine_volume();
$arr_route_of_vaccination = load_route_of_vaccination();
$arr_vaccination_site = load_vaccination_site();
$arr_manufacturer = load_manufacturer();
$arr_seriousness_of_the_symptoms = load_seriousness_of_the_symptoms();

 ?>
 <style>
#chartdiv {
  max-width: 100%;
  height: 400px;
  background-color:#e9e9e9;
}
  </style>
  <h1>
    แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรคโควิด 19
    <small>AEFI COVID</small>
  </h1>
  <ol class="breadcrumb">
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          {{-- <h3 class="box-title">อัตราการรายงานAEFI COVID</h3> --}}

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="chart-responsive">
                <div id="chartdiv"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            {{-- <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> ร้ายแรง</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> ไม่ร้ายแรง</li>
              </ul>
            </div> --}}
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box -->

    <!-- /.box -->
  </div>
</section>

@include('AEFI.layout.footerScriptDashcovid')
<!-- /.content -->
<script src="asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/usaLow.js"></script>
{{-- <script src="https://covid.amcharts.com/data/js/us_timeline.js"></script>
<script src="https://covid.amcharts.com/data/js/us_total_timeline.js"></script> --}}
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="{{ asset('asset/bower_components/amcharts4/geodata/thailandLow.js') }}"></script>
<script src="{{ asset('asset/bower_components/amcharts4/geodata/lang/TH.js') }}"></script>

<!-- Chart code -->
<script>
  am4core.ready(function() {
  
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  // Create chart instance
  var chart = am4core.create("chartdiv", am4charts.XYChart);
  
  // Add data
  chart.data = [
                @foreach($count_prov as $row)
                            {
                              "date": "TH-{{$row->date_entry}}",
                              "value": {{$row->count_prov}}
                            },
                @endforeach
              ];
  
  // Set input format for the dates
  chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
  
  // Create axes
  var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  
  // Create series
  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = "value";
  series.dataFields.dateX = "date";
  series.tooltipText = "{value}"
  series.strokeWidth = 2;
  series.minBulletDistance = 15;
  
  // Drop-shaped tooltips
  series.tooltip.background.cornerRadius = 20;
  series.tooltip.background.strokeOpacity = 0;
  series.tooltip.pointerOrientation = "vertical";
  series.tooltip.label.minWidth = 40;
  series.tooltip.label.minHeight = 40;
  series.tooltip.label.textAlign = "middle";
  series.tooltip.label.textValign = "middle";
  
  // Make bullets grow on hover
  var bullet = series.bullets.push(new am4charts.CircleBullet());
  bullet.circle.strokeWidth = 2;
  bullet.circle.radius = 4;
  bullet.circle.fill = am4core.color("#fff");
  
  var bullethover = bullet.states.create("hover");
  bullethover.properties.scale = 1.3;
  
  // Make a panning cursor
  chart.cursor = new am4charts.XYCursor();
  chart.cursor.behavior = "panXY";
  chart.cursor.xAxis = dateAxis;
  chart.cursor.snapToSeries = series;
  
  // Create vertical scrollbar and place it before the value axis
  chart.scrollbarY = new am4core.Scrollbar();
  chart.scrollbarY.parent = chart.leftAxesContainer;
  chart.scrollbarY.toBack();
  
  // Create a horizontal scrollbar with previe and place it underneath the date axis
  chart.scrollbarX = new am4charts.XYChartScrollbar();
  chart.scrollbarX.series.push(series);
  chart.scrollbarX.parent = chart.bottomAxesContainer;
  
  dateAxis.start = 0.79;
  dateAxis.keepSelection = true;
  
  
  }); // end am4core.ready()
  </script>
  
@stop
