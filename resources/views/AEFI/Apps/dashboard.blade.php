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
              {{-- <div class="col-xs-3">
                  <input type="text" name="zone" class="form-control" placeholder="{{ isset($zone) ? $zone : "เขต"}}">
              </div> --}}
              <div class="col-xs-3">
                <select id="province" name="province" class="form-control" style="width: 100%;">
                  <option class="badge filter badge-info" data-color="info" value="">ระบุจังหวัดที่ต้องการค้นหา</option>
                  @foreach ($listProvince as $k => $v)
                  <option value="{{$k}}">{{$v}}</option>
                  @endforeach
                </select>
                  {{-- <input type="text" name="province" class="form-control" placeholder="{{ isset($province) ? $province : "จังหวัด"}}"> --}}
              </div>
              {{-- <div class="col-xs-3">
                  <input type="text" name="date_of_symptoms" id="date_of_symptoms" class="form-control" placeholder="ระบุวันที่กรอกข้อมูล" autocomplete="off" data-date-format="yyyy-mm-dd" readonly>
              </div> --}}
              <div class="col-xs-3">
                <select id="name_of_vaccine" name="name_of_vaccine" class="form-control" style="width: 100%;">
                  <option class="badge filter badge-info" data-color="info" value="">ระบุวัคซีนที่ต้องการค้นหา</option>
                  @foreach ($vac_list as $row)
                  <option value="{{$row->ID}}">{{$row->VAC_NAME_EN}}</option>
                  @endforeach
                </select>
                  {{-- <input type="text" name="name_of_vaccine" class="form-control" placeholder=""> --}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-header with-border">
              <div class="col-xs-3">
              </div>
              <div class="col-xs-3">
                  <a type="button" href="{{ route('dashboard') }}" class="btn btn-block btn-danger">ล้างข้อมูล</a>
              </div>
              <div class="col-xs-3">
                  <button type="submit" class="btn btn-block btn-success">ค้นหาข้อมูล</button>
              </div>
              <div class="col-xs-3">
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
                                  วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ไม่ระบุ"}}
                                @endif</strong>
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
                    <strong>จำนวนผู้ป่วยรายภาคปี {{$yearnow+543}}</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">ภาคเหนือ</span>
                    <span class="progress-number"><b>{{$count_north[0]->count_north}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: {{$count_north[0]->count_north}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันออกเฉียงเหนือ</span>
                    <span class="progress-number"><b>{{$count_northeast[0]->count_northeast}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: {{$count_northeast[0]->count_northeast}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันตก</span>
                    <span class="progress-number"><b>{{$count_western[0]->count_western}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: {{$count_western[0]->count_western}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคกลาง</span>
                    <span class="progress-number"><b>{{$count_central[0]->count_central}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: {{$count_central[0]->count_central}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคตะวันออก</span>
                    <span class="progress-number"><b>{{$count_eastern[0]->count_eastern}}</b> คน</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-Tomato" style="width: {{$count_eastern[0]->count_eastern}}px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">ภาคใต้</span>
                    <span class="progress-number"><b>{{$count_south[0]->count_south}}</b> คน</span>

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
          <h3 class="box-title">จำนวนผู้ป่วยจำแนกเพศ
            @if ($province == null)
              จังหวัดทั้งหมด
            @else
              จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
            @endif
            @if ($vac_list == null)

            @else
              วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ไม่ระบุ"}}
            @endif
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
                          วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ไม่ระบุ"}}
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
                วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ไม่ระบุ"}}
              @endif
              <span class="pull-right text-yellow">{{$count_all_gender_f[0]->count_female}} คน</span></a>
            </li>
            <li><a href="#">ไม่ระบเพศ
              @if ($province == null)
                จังหวัดทั้งหมด
              @else
                จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
              @endif
              @if ($vac_list == null)
              @else
                วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ไม่ระบุ"}}
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
          <h3 class="box-title">กราฟอัตราป่วยรายจังหวัด</h3>
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
                <div id="regions_div" style="height: 543px; width: 100%;"></div>
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
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">จำนวนของชนิดวัคซีนที่ผู้ป่วยได้รับทั้งหมด</h3>

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
                <div id="chartVacname" style="height: 370px; width: 150%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
                {{-- <li><i class="fa fa-circle-o text-red"></i> ร้ายแรง</li> --}}
                {{-- <li><i class="fa fa-circle-o text-green"></i> ตับอักเสบบี</li>
                <li><i class="fa fa-circle-o text-yellow"></i> บาดทะยัก</li>
                <li><i class="fa fa-circle-o text-aqua"></i> โปลิโอ</li> --}}
                {{-- <li><i class="fa fa-circle-o text-light-blue"></i> ไม่ร้ายแรง</li> --}}
                {{-- <li><i class="fa fa-circle-o text-gray"></i> โรคไข้กาฬหลังแอ่น</li> --}}
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
          <h3 class="box-title">อัตรากลุ่มอายุ ของผู้ป่วยทั้งหมดในปี {{$yearnow+543}}</h3>
          @if ($province == null)
            จังหวัดทั้งหมด
          @else
            จังหวัด{{ isset($listProvince[$province]) ?$listProvince[$province]:"ทั้งหมด"}}
          @endif
          @if ($vac_list == null)

          @else
            วัคซีน{{ isset($listvac_arr[$name_of_vaccine]) ?$listvac_arr[$name_of_vaccine]:"ไม่ระบุ"}}
          @endif
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
                {{-- <li><i class="fa fa-circle-o text-red"></i> ร้ายแรง</li> --}}
                {{-- <li><i class="fa fa-circle-o text-green"></i> ตับอักเสบบี</li>
                <li><i class="fa fa-circle-o text-yellow"></i> บาดทะยัก</li>
                <li><i class="fa fa-circle-o text-aqua"></i> โปลิโอ</li> --}}
                {{-- <li><i class="fa fa-circle-o text-light-blue"></i> ไม่ร้ายแรง</li> --}}
                {{-- <li><i class="fa fa-circle-o text-gray"></i> โรคไข้กาฬหลังแอ่น</li> --}}
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
  </div>
</section>

@include('AEFI.layout.footerScriptDash')
<!-- /.content -->
@stop
