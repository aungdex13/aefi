@extends('AEFI.layout.template')
@section('content')
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
    <small>AEFI COVID</small>
  </h1>
  <ol class="breadcrumb">
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                  </p>
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <div id="chartContainer" style="height: 290px;"></div>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>จำนวนผู้ป่วย AEFI COVID รายภาคปี {{$yearnow+543}}</strong>
                  </p>
                  <div class="progress-group">
                    <span class="progress-text">ภาคเหนือ</span>
                    <span class="progress-number"><b>{{$count_north[0]->count_north}}</b>/คน</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: {{$count_north[0]->count_north}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันออกเฉียงเหนือ</span>
                    <span class="progress-number"><b>{{$count_northeast[0]->count_northeast}}</b>/คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: {{$count_northeast[0]->count_northeast}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันตก</span>
                    <span class="progress-number"><b>{{$count_western[0]->count_western}}</b>/คน</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: {{$count_western[0]->count_western}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคกลาง</span>
                    <span class="progress-number"><b>{{$count_central[0]->count_central}}</b>/คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: {{$count_central[0]->count_central}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันออก</span>
                    <span class="progress-number"><b>{{$count_eastern[0]->count_eastern}}</b>/คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-Tomato" style="width: {{$count_eastern[0]->count_eastern}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคใต้</span>
                    <span class="progress-number"><b>{{$count_south[0]->count_south}}</b>/คน</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-orange" style="width: {{$count_south[0]->count_south}}px"></div>
                    </div>
                  </div>
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
          <h3 class="box-title">การวินิจฉัยเบื้องต้นเกี่ยวกับความร้ายแรงของอาการของผู้ป่วย AEFI COVID</h3>

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
                <div id="piechartContainer" style="height: 370px; width: 100%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> ร้ายแรง</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> ไม่ร้ายแรง</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">เพศชาย อาการไม่รุนแรง
              {{-- <i class="fa fa-angle-down"></i> --}}
                <span class="pull-right text-light-blue"> {{$count_seriousness_of_the_symptoms_m[0]->count_seriousness_of_the_symptoms}} คน</span></a>
            </li>
            <li><a href="#">เพศหญิง อาการไม่รุนแรง
              {{-- <i class="fa fa-angle-up"></i>  --}}
              <span class="pull-right text-light-blue">{{$count_seriousness_of_the_symptoms_f[0]->count_seriousness_of_the_symptoms}} คน</span></a>
            </li>
            <li><a href="#">เพศชาย อาการรุนแรง
              {{-- <i class="fa fa-angle-left"></i> --}}
                <span class="pull-right text-red"> {{isset($count_seriousness_of_the_symptoms_m[1]->count_seriousness_of_the_symptoms) ? $count_seriousness_of_the_symptoms_m[1]->count_seriousness_of_the_symptoms:"0"}} คน</span></a></li>
            <li><a href="#">เพศหญิง อาการรุนแรง
              {{-- <i class="fa fa-angle-left"></i> --}}
                <span class="pull-right text-red"> {{isset($count_seriousness_of_the_symptoms_f[1]->count_seriousness_of_the_symptoms) ? $count_seriousness_of_the_symptoms_f[1]->count_seriousness_of_the_symptoms:"0"}} คน</span></a></li>
          </ul>
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">กราฟอัตราป่วย AEFI COVID รายจังหวัด</h3>
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
                <div id="regions_div" style="height: 543px; width: 100%;"></div>
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
          <h3 class="box-title">จำนวนของชนิดวัคซีนที่ผู้ป่วยได้รับทั้งหมด</h3>
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
                <div id="chartVacname" style="height: 370px; width: 150%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
              </ul>
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
          <h3 class="box-title">อัตราของกลุ่มอายุ ของผู้ป่วยทั้งหมดในปี {{$yearnow+543}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart-responsive">
                <div id="agegroup" style="height: 370px; width: 150%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
              </ul>
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

    <!-- /.box -->
  </div>
</section>

@include('AEFI.layout.footerScriptDashcovid')
<!-- /.content -->
@stop
