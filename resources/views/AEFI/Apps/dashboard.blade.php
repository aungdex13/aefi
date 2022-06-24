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
  <h1>
    แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
    <small>AEFI</small>
  </h1>
  <ol class="breadcrumb">
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <form role="form" action="{{ route('dashboard') }}" method="post">
          {{ csrf_field() }}
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="col-xs-12 col-md-3 col-ls-3">
                <select id="province" name="province" class="form-control" style="width: 100%;">
                  <option class=" filter" data-color="info" value="">ระบุจังหวัดที่ต้องการค้นหา</option>
                  @foreach ($listProvince as $k => $v)
                  <option value="{{$k}}">{{$v}}</option>
                  @endforeach
                </select>
                </div>
              <div class="col-xs-12 col-md-3 col-ls-3">
                <select id="name_of_vaccine" name="name_of_vaccine" class="form-control" style="width: 100%;">
                  <option class=" filter" data-color="info" value="">ระบุวัคซีนที่ต้องการค้นหา</option>
                  @foreach ($vac_list as $row)
                  <option value="{{$row->ID}}">{{$row->VAC_NAME_EN}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-xs-12 col-md-3 col-ls-3">
                <select id="year" name="year" class="form-control" style="width: 100%;">
                  {{-- <option class=" filter" data-color="info" value="">ระบุปีต้องการค้นหา</option> --}}
                  @foreach ($listyear as $row)
                  <option value="{{$row->year}}">ปี {{$row->year+543}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-xs-12 col-md-3 col-ls-3">
                <select id="region" name="region" class="form-control" style="width: 100%;">
                  <option class=" filter" data-color="info" value="">ระบุเขตที่ต้องการค้นหา</option>
                  <option value="01">เขต1</option>
                  <option value="02">เขต2</option>
                  <option value="03">เขต3</option>
                  <option value="04">เขต4</option>
                  <option value="05">เขต5</option>
                  <option value="06">เขต6</option>
                  <option value="07">เขต7</option>
                  <option value="08">เขต8</option>
                  <option value="09">เขต9</option>
                  <option value="10">เขต10</option>
                  <option value="11">เขต11</option>
                  <option value="12">เขต12</option>
                  <option value="13">สปคม.</option>
                </select>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-header with-border">
              <div class="col-xs-12 col-md-3 col-ls-3">
              </div>
              <div class="col-xs-12 col-md-3 col-ls-3">
                  <a type="button" href="{{ route('dashboard') }}" class="btn btn-block btn-danger">ล้างข้อมูล</a>
              </div>
              <div class="col-xs-12 col-md-3 col-ls-3">
                  <button type="submit" class="btn btn-block btn-success">ค้นหาข้อมูล</button>
              </div>
              <div class="col-xs-12 col-md-3 col-ls-3">
              </div>
            </div>
            <!-- /.box-header -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </form>
      </div>
    </div>
    <!-- /.row -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              {{-- <h3 class="box-title">Number of AEFI cases by month of onset Year {{$yearnow}}</h3> --}}

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                {{-- <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>จำนวนผู้ป่วยรายเดือน
                            @if ($province == null)
                                  จังหวัดทั้งหมด
                                @else
                                  จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
                                @endif
                                @if ($vac_list == null)
                                @else
                                  วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}}
                                @endif
                                เขต{{ isset($region) ? $region:"ทุกเขต"}}
                              </strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <div id="chartContainer" style="height: 290px;"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  @if ($province == null && $name_of_vaccine == null && $region == null)
                  <p class="text-center">
                    <strong>จำนวนผู้ป่วยรายภาค ประจำปี {{$yearnow+543}}</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">ภาคเหนือ</span>
                    <span class="progress-number"><b>{{$count_north}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: {{$count_north}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันออกเฉียงเหนือ</span>
                    <span class="progress-number"><b>{{$count_northeast}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: {{$count_northeast}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันตก</span>
                    <span class="progress-number"><b>{{$count_western}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: {{$count_western}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคกลาง</span>
                    <span class="progress-number"><b>{{$count_central}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: {{$count_central}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันออก</span>
                    <span class="progress-number"><b>{{$count_eastern}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-Tomato" style="width: {{$count_eastern}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคใต้</span>
                    <span class="progress-number"><b>{{$count_south}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-orange" style="width: {{$count_south}}px"></div>
                    </div>
                  </div>
                @elseif ($province == null && $name_of_vaccine != null  && $region == null)
                  <p class="text-center">
                    <strong>จำนวนผู้ป่วย วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}} รายจังหวัด</strong>
                  </p>
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table no-margin" id="case_lst">
                        <thead>
                        <tr>
                          <th>อำเภอ/เขต</th>
                          <th>#</th>
                          <th>จำนวนผู้ป่วย</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($count_patient_by_prov as $row)
                              @php
                              $ProvinceRate = ($row->count_patient_prov / $count_all_patient_prov[0]->count_patient_prov)*100 ;
                                // dd($DistrictRate);
                              @endphp
                              <td>{{ isset($listProvince[$row->province]) ? $listProvince[$row->province] : "ไม่ระบุอำเภอ/เขต" }}</td>
                              <td>
                                <div class="progress progress-xs progress-striped active">
                                  <div class="progress-bar progress-bar-success" style="width:{{$ProvinceRate}}%"></div>
                                </div>
                              </td>
                              <td><span class="label label-success">{{ $row->count_patient_prov }} คน</span></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.box-body -->
                @elseif($region != null)
                <p class="text-center">
                  <strong>จำนวนผู้ป่วย วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}} รายจังหวัด</strong>
                </p>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin" id="case_lst">
                      <thead>
                      <tr>
                        <th>อำเภอ/เขต</th>
                        <th>#</th>
                        <th>จำนวนผู้ป่วย</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($count_patient_by_region as $row)
                            @php
                            $ProvinceRate = ($row->count_patient_prov / $count_all_patient_prov[0]->count_patient_prov)*100 ;
                              // dd($DistrictRate);
                            @endphp
                            <td>{{ isset($listProvince[$row->province]) ? $listProvince[$row->province] : "ไม่ระบุอำเภอ/เขต" }}</td>
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:{{$ProvinceRate}}%"></div>
                              </div>
                            </td>
                            <td><span class="label label-success">{{ $row->count_patient_prov }} คน</span></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                @else
                  <p class="text-center">
                    <strong>จำนวนผู้ป่วย วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}} รายอำเภอ/เขตของจังหวัด {{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}</strong>
                  </p>
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table no-margin" id="case_lst">
                        <thead>
                        <tr>
                          <th>อำเภอ/เขต</th>
                          <th>อัตราของผู้ป่วย</th>
                          <th>จำนวนผู้ป่วย</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($count_all_district_by_province as $row)
                              @php
                              $DistrictRate = ($row->CountByDistrice / $count_all_patient_prov[0]->count_patient_prov)*100 ;
                                // dd($DistrictRate);
                              @endphp
                              <td>{{ isset($listDistrict[$row->district]) ? $listDistrict[$row->district] : "ไม่ระบุอำเภอ/เขต" }}</td>
                              <td>
                                <div class="progress progress-xs progress-striped active">
                                  <div class="progress-bar progress-bar-success" style="width:{{$DistrictRate}}%"></div>
                                </div>
                              </td>
                              <td><span class="label label-success">{{ $row->CountByDistrice }} คน</span></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.box-body -->
                @endif
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.row -->
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">จำนวนผู้ป่วยจำแนกเพศ
            @if ($province == null)
              จังหวัดทั้งหมด
            @else
              จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
            @endif
            @if ($vac_list == null)

            @else
              วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}}
            @endif
            เขต{{ isset($region) ? $region:"ทุกเขต"}} ประจำปี {{$year+543}}
          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart-responsive">
                <div id="piechartContainer" style="height: 410px; width: 100%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> เพศชาย</li>
                <li><i class="fa fa-circle-o text-yellow"></i> เพศหญิง</li>
                <li><i class="fa fa-circle-o text-green"></i> ไม่ระบุ</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">เพศชาย
                        @if ($province == null)
                          จังหวัดทั้งหมด
                        @else
                          จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
                        @endif
                        @if ($vac_list == null)
                        @else
                          วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}}
                        @endif
                <span class="pull-right text-red"> {{$count_all_gender_m[0]->count_male}} คน</span></a>
            </li>
            <li><a href="#">เพศหญิง
              @if ($province == null)
                จังหวัดทั้งหมด
              @else
                จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
              @endif
              @if ($vac_list == null)
              @else
                วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}}
              @endif
              <span class="pull-right text-yellow">{{$count_all_gender_f[0]->count_female}} คน</span></a>
            </li>
            <li><a href="#">ไม่ระบุเพศ
              @if ($province == null)
                จังหวัดทั้งหมด
              @else
                จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
              @endif
              @if ($vac_list == null)
              @else
                วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}}
              @endif
              <span class="pull-right text-green"> {{isset($count_all_gender_other[0]->count_other) ? $count_all_gender_other[0]->count_other:"0"}} คน</span></a></li>
          </ul>
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">จำนวนการรายงานผู้ป่วย AEFI จำแนกรายจังหวัด ของวัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}} เขต{{ isset($region) ? $region:"ทุกเขต"}} ประจำปี {{$year+543}}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="chart-responsive">
                <div id="chartdivMapMedical" style="height: 543px; width: 100%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        {{-- <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">อุบลราชธานี
                <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
            <li><a href="#">กรุงเทพมหานคร <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
            </li>
            <li><a href="#">เชียงใหม่
                <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
          </ul>
        </div> --}}
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
        <!-- /.row -->
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
                            <h3 class="box-title">
                                        จำนวนการรายงานผู้ป่วย AEFI จำแนกตามชนิดของวัคซีน
                                        @if ($province == null)
                                           จังหวัดทั้งหมด
                                         @else
                                           จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
                                         @endif
                                         เขต{{ isset($region) ? $region:"ทุกเขต"}} ประจำปี {{$year+543}}
                            </h3>
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
                    <div id="chartVacname" style="height: 410px; width: 100%;"></div>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- /.footer -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">จำนวนผู้ป่วยจำแนกตามกลุ่มอายุ
                @if ($province == null)
                  ในจังหวัดทั้งหมด
                @else
                  ในจังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
                @endif
                @if ($vac_list == null)
      
                @else
                  วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ทั้งหมด"}}
                @endif
                เขต{{ isset($region) ? $region:"ทุกเขต"}} ประจำปี {{$year+543}}
              </h3>
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
                    <div id="agegroup" style="height: 410px; width: 100%;"></div>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- /.footer -->
          </div>
          <!-- /.box -->
        </div>

    <!-- /.box -->
  </div>
</section>

@include('AEFI.layout.footerScriptDash')
<!-- /.content -->
<script src="asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('asset/bower_components/amcharts4/core.js') }}"></script>
<script src="{{ asset('asset/bower_components/amcharts4/maps.js') }}"></script>
<script src="{{ asset('asset/bower_components/amcharts4/geodata/thailandLow.js') }}"></script>
<script src="{{ asset('asset/bower_components/amcharts4/geodata/lang/TH.js') }}"></script>
<script src="{{ asset('asset/bower_components/amcharts4/themes/animated.js') }}"></script>
<script src="{{ asset('asset/bower_components/amcharts4/charts.js') }}"></script>
<script>
  am4core.ready(function () {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end
                
                // Create map instance
                var chart = am4core.create("chartdivMapMedical", am4maps.MapChart);

                // Set map definition
                chart.geodata = am4geodata_thailandLow;
                chart.geodataNames = am4geodata_lang_TH;
                // Set projection
                // chart.projection = new am4maps.projections.AlbersUsa();

                // Create map polygon series
                var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

                //Set min/max fill color for each area
                polygonSeries.heatRules.push({
                    property: "fill",
                    target: polygonSeries.mapPolygons.template,
                    min: am4core.color("#7ED321"),
                    max: am4core.color("#FC7149")
                });

                // Make map load polygon data (state shapes and names) from GeoJSON
                polygonSeries.useGeodata = true;

                // Set heatmap values for each state
                polygonSeries.data = [
                  @foreach($count_prov as $row)
                {
                    id: "TH-{{$row->province}}",
                    value: {{$row->count_prov}}
                },
                    @endforeach
                ];

                // Set up heat legend
                let heatLegend = chart.createChild(am4maps.HeatLegend);
                heatLegend.series = polygonSeries;
                heatLegend.align = "right";
                heatLegend.valign = "bottom";
                heatLegend.width = am4core.percent(30);
                heatLegend.marginRight = am4core.percent(4);
                heatLegend.minValue = 0;
                heatLegend.maxValue = 40000000;

                // Set up custom heat map legend labels using axis ranges
                var minRange = heatLegend.valueAxis.axisRanges.create();
                minRange.value = heatLegend.minValue;
                minRange.label.text = "น้อย";
                var maxRange = heatLegend.valueAxis.axisRanges.create();
                maxRange.value = heatLegend.maxValue;
                maxRange.label.text = "มาก";

                // Blank out internal heat legend value axis labels
                heatLegend.valueAxis.renderer.labels.template.adapter.add("text", function (labelText) {
                    return "";
                });

                // Configure series tooltip
                var polygonTemplate = polygonSeries.mapPolygons.template;
                polygonTemplate.tooltipText = "{name}: {value}";
                polygonTemplate.nonScalingStroke = true;
                polygonTemplate.strokeWidth = 0.5;

                // Create hover state and set alternative fill color
                var hs = polygonTemplate.states.create("hover");
                hs.properties.fill = am4core.color("#00A1D0");
            // Enable export
            chart.exporting.menu = new am4core.ExportMenu();
            });
$(document).ready(function() {
    $('#case_lst').DataTable({
      "pageLength": 5
      // "searching": false,
      // "ordering": false,
       // "order": [[ 2, 'desc' ]]
});
} );
 </script>
@stop
