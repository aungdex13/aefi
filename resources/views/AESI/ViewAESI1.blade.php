
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AEFI 1 </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="/asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/asset/dist/css/AdminLTE.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  section.invoice {
    font-size: 12px;
  }
  </style>
</head>
<body onload="window.print();">
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
$arr_provinces = load_provinces();
$arr_title_name = load_title_name();
$arr_marital_status = load_marital_status();
 ?>
  <h1>
    แบบรายงานการเฝ้าระวังกลุ่มอาการที่อาจเกี่ยวข้องกับการได้รับวัคซีนโควิด 19 (AESI Form)
    <small>AESI</small>
  </h1>
  {{-- @php
	dd($groupproduct);
@endphp --}}
  {{-- @php
// dd($aecode);
foreach ($aecode as $value) {
    echo $value->AENAMETHA;
}
@endphp --}}
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 200%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
  </style>
</section>
<!-- Main content -->
<section class="content">
  <form role="form" action="{{ route('updateaesiform1') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
                              <input type="hidden" id="id" name="id" value="{{ $data[0]->id }}" class="form-control">
                              <input type="hidden" id="id_case" name="id_case" value="{{ $data[0]->id_case }}" class="form-control">
                              <input type="hidden" id="user_username" name="user_username" value="{{auth()->user()->username}}" class="form-control">
                              <input type="hidden" id="user_hospcode" name="user_hospcode" value="{{auth()->user()->hospcode}}" class="form-control">
                              <input type="hidden" id="user_provcode" name="user_provcode" value="{{auth()->user()->prov_code}}" class="form-control">
                              <input type="hidden" id="user_region" name="user_region" value="{{auth()->user()->region}}" class="form-control">
                              <input type="hidden" id="count_data_vac" name="count_data_vac" value="{{ $count_data_vac[0]->vac_count }}" class="form-control">
            <!--ส่วนที่ 1 ข้อมูลทั่วไป -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ส่วนที่ 1 ข้อมูลทั่วไป</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" placeholder="ID" value="{{isset($data[0]->id) ? $data[0]->id :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <select type="text" class="form-control" id="title_name" name="title_name">
                              <option value="{{ $data[0]->title_name }}">{{ $arr_title_name[$data[0]->title_name] }}</option>
                              <option value="">กรุณาเลือก</option>
                              <option value="1">นาย</option>
                              <option value="2">นางสาว</option>
                              <option value="3">นาง</option>
                              <option value="4">ด.ช.</option>
                              <option value="5">ด.ญ.</option>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="first_name" placeholder="ชื่อ" value="{{isset($data[0]->first_name) ? $data[0]->first_name :null}}">
                          </div>
                          <div class="col-xs-4">
                            <label>สกุล</label>
                            <input type="text" class="form-control" name="sur_name" placeholder="สกุล" value="{{isset($data[0]->sur_name) ? $data[0]->sur_name :null}}">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>HN</label>
                            <input type="text" class="form-control" name="hn" placeholder="HN" value="{{isset($data[0]->hn) ? $data[0]->hn :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>AN</label>
                            <input type="text" class="form-control" name="an" placeholder="AN" value="{{isset($data[0]->an) ? $data[0]->an :null}}">
                          </div>
                          <div class="col-xs-4">
                            <label>เลขประจำตัวประชาชน 13 หลัก </label>
                            <input type="text" class="form-control" name="id_number" placeholder="เลขประจำตัวประชาชน 13 หลัก" value="{{isset($data[0]->id_number) ? $data[0]->id_number :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>สถานภาพสมรส</label>
                            <select type="text" class="form-control" id="marital_status" name="marital_status">
                              <option value="{{ $data[0]->marital_status }}">{{ $arr_marital_status[$data[0]->marital_status] }}</option>
                              <option value="">กรุณาเลือก</option>
                              <option  value="1">โสด </option>
                              <option value="2">สมรส </option>
                              <option value="3">หม้าย </option>
                              <option value="4">หย่า </option>
                              <option value="5">แยกกันอยู่ </option>
                              <option value="5">เคยสมรสแต่ไม่ทราบสถานภาพสมรส </option>
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>อาชีพ</label>
                            <select id="js-example-basic-single2" name="career_code" class="js-example-basic-single2 form-control" data-dropdown-css-class="select2-danger">
                              <option value="{{ $data[0]->career_code }}">{{ $list_career[$data[0]->career_code] }}</option>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <label>ประวัติโรคประจำตัว</label>
                            <input type="text" class="form-control" name="congenital_disease" placeholder="ประวัติโรคประจำตัว" value="{{isset($data[0]->congenital_disease) ? $data[0]->congenital_disease :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ยาที่ใช้ประจำ</label>
                            <input type="text" class="form-control" name="regular_medication" placeholder="ยาที่ใช้ประจำ" value="{{isset($data[0]->regular_medication) ? $data[0]->regular_medication :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ที่อยู่ขณะเริ่มป่วย บ้านเลขที่</label>
                            <input type="text" class="form-control" name="house_number" placeholder="บ้านเลขที่" value="{{isset($data[0]->house_number) ? $data[0]->house_number :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>หมู่ที่</label>
                            <input type="text" class="form-control" name="village_no"  placeholder="หมู่ที่" value="{{isset($data[0]->village_no) ? $data[0]->village_no :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>จังหวัด</label>
                            <select class="form-control provinces" name="province" id="provinces" required>
                              <option value="{{ $data[0]->province }}">{{ $listProvince[$data[0]->province] }}</option>
                              <option value="">=== จังหวัด ===</option>
                              @foreach ($list as $row)
                              <option value="{{$row->province_code}}">{{$row->province_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>อำเภอ</label>
                            <select class="form-control amphures" name="district">
                              <option value="{{ $data[0]->district }}">{{ $listDistrict[$data[0]->district] }}</option>
                              <option value="">=== อำเภอ ===</option>
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>ตำบล</label>
                            <select class="form-control district" name="subdistrict">
                              <option value="{{ $data[0]->subdistrict }}">{{ $listsubdistrict[$data[0]->subdistrict] }}</option>
                              <option value="">=== ตำบล ===</option>
                            </select>
                          </div>
                          
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>หมายเลขโทรศัพท์ </label>
                            <input type="text" class="form-control" name="phone_number" placeholder="หมายเลขโทรศัพท์ " value="{{isset($data[0]->phone_number) ? $data[0]->phone_number :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <select type="text" class="form-control" id="parent_title_name" name="parent_title_name">
                              <option value="{{ $data[0]->parent_title_name }}">{{ $arr_title_name[$data[0]->parent_title_name] }}</option>
                              <option value="">กรุณาเลือก</option>
                              <option  value="1">นาย</option>
                              <option value="2">นางสาว</option>
                              <option value="3">นาง</option>
                              <option value="4">ด.ช.</option>
                              <option value="5">ด.ญ.</option>
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="parent_first_name" placeholder="ชื่อ" value="{{isset($data[0]->parent_first_name) ? $data[0]->parent_first_name :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>สกุล</label>
                            <input type="text" class="form-control" name="parent_last_name" placeholder="สกุล" value="{{isset($data[0]->parent_last_name) ? $data[0]->parent_last_name :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>โทร.</label>
                            <input type="text" class="form-control" name="parent_phone_number" placeholder="โทร." value="{{isset($data[0]->parent_phone_number) ? $data[0]->parent_phone_number :null}}">
                          </div>
                        </div>
                      </div>
                      </div>
                      <!-- /.box-header -->
                  </div>
                  </div>
              </div>
            </div> 
          </div>
            <!-- /.box -->
            <!--ส่วนที่ 2 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ส่วนที่ 2 ประวัติการเจ็บป่วย  การตรวจร่างกาย การวินิจฉัยโรค และผลการรักษา</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                        <div class="row">
                          {{-- <div class="col-xs-2">
                            <label>วันเริ่มป่วย</label>
                            <input type="text" class="form-control" id="date_of_symptoms" name="date_of_symptoms" placeholder="วันเริ่มป่วย" autocomplete="off">
                          </div>
                          <div class="col-xs-2">
                            <label>วันที่เข้ารับการรักษา</label>
                            <input type="text" class="form-control" id="date_of_treatment" name="date_of_treatment" placeholder="วันที่เข้ารับการรักษา" autocomplete="off">
                          </div>
                          <div class="col-xs-4">
                            <label>วันที่จำหน่ายผู้ป่วย</label>
                            <input type="text" class="form-control" id="date_of_dischrge" name="date_of_dischrge" placeholder="วันที่จำหน่ายผู้ป่วย" autocomplete="off">
                          </div> --}}
                          <div class="col-xs-4">
                            <label>สถานที่รักษา</label>
                            {{-- <input type="text" class="form-control" id="hospital" name="hospital" placeholder="สถานที่รักษา"> --}}
                            <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                              <option value="{{ $data[0]->hospcode_treat }}">{{ $list_hos[$data[0]->hospcode_treat] }}</option>
                            </select>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ประเภทผู้ป่วย  </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_type" id="patient_type1" value="1" @if($data[0]->patient_type == 1) checked @else @endif>
                                ผู้ป่วยนอก
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_type" id="patient_type2" value="2" @if($data[0]->patient_type == 2) checked @else @endif>
                                ผู้ป่วยใน  
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label>ใส่ท่อช่วยหายใจ   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_tube" id="patient_tube1" value="0" @if($data[0]->patient_tube == 0) checked @else @endif>
                                ไม่ใส่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_tube" id="patient_tube2" value="1" @if($data[0]->patient_tube == 1) checked @else @endif>
                                ใส่
                              </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-6">
                            <label>อาการสำคัญ</label>
                            <input type="text" class="form-control" name="chief_complaint" placeholder="อาการสำคัญ" value="{{isset($data[0]->chief_complaint) ? $data[0]->chief_complaint :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>การตรวจร่างกาย</label>
                            
                            {{-- <input type="text" class="form-control" placeholder="ยาที่ใช้ประจำ"> --}}
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>สัญญาณชีพ (Vital sign)</label>
                          </div>
                          <div class="col-xs-2">
                            <label>Temp</label>
                            <input type="text" class="form-control" name="temp" placeholder="สัญญาณชีพ (Vital sign) Temp..............C  " value="{{isset($data[0]->temp) ? $data[0]->temp :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>RR</label>
                            <input type="text" class="form-control" name="rr" placeholder="RR........./min" value="{{isset($data[0]->rr) ? $data[0]->rr :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>PR</label>
                            <input type="text" class="form-control" name="pr" placeholder="PR........./min" value="{{isset($data[0]->pr) ? $data[0]->pr :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>BP</label>
                            <input type="text" class="form-control" name="bp" placeholder="BP........./.........mmHg" value="{{isset($data[0]->bp) ? $data[0]->bp :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>GCS </label>
                          </div>
                          <div class="col-xs-2">
                            <label>E</label>
                            <input type="text" class="form-control" name="gcs_e" placeholder="E" value="{{isset($data[0]->gcs_e) ? $data[0]->gcs_e :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>M</label>
                            <input type="text" class="form-control" name="gcs_m" placeholder="M" value="{{isset($data[0]->gcs_m) ? $data[0]->gcs_m :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>V</label>
                            <input type="text" class="form-control" name="gcs_v" placeholder="V" value="{{isset($data[0]->gcs_v) ? $data[0]->gcs_v :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>Pupils ข้างซ้าย </label>
                            <input type="text" class="form-control" name="pupils_l" placeholder="Pupils ข้างซ้าย...………mm  " value="{{isset($data[0]->pupils_l) ? $data[0]->pupils_l :null}}">
                          </div>
                          <div class="col-xs-2">
                            <label>Pupils ข้างขวา</label>
                            <input type="text" class="form-control" name="pupils_r" placeholder="ข้างขวา...………mm   " value="{{isset($data[0]->pupils_r) ? $data[0]->pupils_r :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-6">
                            <label>ผลการตรวจร่างกายที่สำคัญ</label>
                            <input type="text" class="form-control" name="physical_examination" placeholder="ผลการตรวจร่างกายที่สำคัญ" value="{{isset($data[0]->physical_examination) ? $data[0]->physical_examination :null}}">
                          </div>
                          <div class="col-xs-6">
                            <label>ผลการตรวจระบบประสาทที่สำคัญ</label>
                            <input type="text" class="form-control" name="neurological_examination" placeholder="ผลการตรวจระบบประสาทที่สำคัญ (motor power, sensory, reflex ฯลฯ) " value="{{isset($data[0]->neurological_examination) ? $data[0]->neurological_examination :null}}">
                          </div>
                        </div>
                      </div>
                    </hr>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>การวินิจฉัยครั้งแรก </label>
                          </div>
                          <div class="col-xs-12">
                            <label>1.	 Respiratory system </label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Adult Respiratory Distress Syndrome, ARDS (J80)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="J80" id="J80_1" value="0"  @if($data[0]->J80 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="J80" id="J80_2" value="1" @if($data[0]->J80 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	COVID-19 (U07.1)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="U07_1" id="U07_1_1" value="0"  @if($data[0]->U07_1 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="U07_1" id="U07_1_2" value="1" @if($data[0]->U07_1 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>2.	 Cardiovascular system</label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Acute myocarditis (I40)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I40" id="I40_1" value="0"  @if($data[0]->I40 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I40" id="I40_2" value="1" @if($data[0]->I40 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Acute pericarditis (I30)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I30" id="I30_1" value="0"  @if($data[0]->I30 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I30" id="I30_2" value="1" @if($data[0]->I30 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>3.	 Neurological system</label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>		Acute transverse myelitis (G37.3)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G37_3" id="G37_1" value="0"  @if($data[0]->G37_3 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G37_3" id="G37_2" value="1" @if($data[0]->G37_3 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Guillain-Barré syndrome (GBS) (G61.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G61" id="G61_1" value="0"  @if($data[0]->G61 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G61" id="G61_2" value="1" @if($data[0]->G61 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Cerebrovascular stroke (I64)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I64" id="I64_1" value="0"  @if($data[0]->I64 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I64" id="I64_2" value="1" @if($data[0]->I64 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Bell’s palsy (G51.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G51" id="G51_1" value="0"  @if($data[0]->G51 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G51" id="G51_2" value="1" @if($data[0]->G51 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Acute disseminated encephalomyelitis, ADEM (G04.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G04" id="G04_1" value="0"  @if($data[0]->G04 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G04" id="G04_2" value="1" @if($data[0]->G04 == 0) checked @else @endif>>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Aseptic meningitis, meningitis unspecified (G03.3, G03.9)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G03" id="G03_1" value="0"  @if($data[0]->G03 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G03" id="G03_2" value="1" @if($data[0]->G03 == 1) checked @else @endif>>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label><li>	Meningoencephalitis (Encephalitis, myelitis and encephalomyelitis in other diseases classified elsewhere) (G05.8)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G05_8" id="G05_8_1" value="0"  @if($data[0]->G05_8 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G05_8" id="G05_8_2" value="1" @if($data[0]->G05_8 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>4.	Immune mediated disease </label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>		Idiopathic thrombocytopenic purpura, ITP (D69.3)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69_3" id="D69_3_1" value="0"  @if($data[0]->D69_3 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69_3" id="D69_3_2" value="1" @if($data[0]->D69_3 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Allergic purpura, Allergic vasculitis  (D69.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69" id="D69_1" value="0"  @if($data[0]->D69 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69" id="D69_2"  value="1" @if($data[0]->D69 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Kawasaki disease (M30.3)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="M30_3" id="M30_3_1" value="0"  @if($data[0]->M30_3 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="M30_3" id="M30_3_2"  value="1" @if($data[0]->title_name == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Arteritis, unspecified (I77.6)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I77_6" id="I77_6_1" value="0"  @if($data[0]->I77_6 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I77_6" id="I77_6_2"  value="1" @if($data[0]->I77_6 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Vasculitis limited to skin, not elsewhere classified (L95)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="L95" id="L95_1" value="0"  @if($data[0]->L95 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="L95" id="L95_2"  value="1" @if($data[0]->L95 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <label><li>โรค immune mediated อื่นๆ</li>   </label>
                            <input type="text" class="form-control" name="other_immune_mediated" placeholder="โรค immune mediated อื่นๆ" value="{{isset($data[0]->other_immune_mediated) ? $data[0]->other_immune_mediated :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>5.	อื่นๆ</label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>		Deep vein thrombosis, DVT (I80.2) </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I80_2" id="I80_2_1" value="0"  @if($data[0]->I80_2 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I80_2" id="I80_2_2"  value="1" @if($data[0]->I80_2 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Pulmonary embolism (I26)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I26" id="I26_1" value="0"  @if($data[0]->I26 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I26" id="I26_2"  value="1" @if($data[0]->I26 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li> Chilblain-like lesions (T69.1)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="T69_1" id="T69_1_1" value="0"  @if($data[0]->T69_1 == 0) checked @else @endif>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="T69_1" id="T69_1_2"  value="1" @if($data[0]->T69_1 == 1) checked @else @endif>
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label><li> การวินิจฉัยครั้งสุดท้าย</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_1" value="0"  @if($data[0]->last_diagnosis == 0) checked @else @endif>
                                วินิจฉัยด้วยโรคเดิม
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_2"  value="1" @if($data[0]->last_diagnosis == 1) checked @else @endif>
                                วินิจฉัยใหม่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <label>ระบุ</label>
                            <input type="text" class="form-control" name="text_last_diagnosis" placeholder="ระบุวินิจฉัยใหม่" value="{{isset($data[0]->text_last_diagnosis) ? $data[0]->text_last_diagnosis :null}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          {{-- <div class="col-xs-2">
                            <label><li> ผลการรักษา</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_1" value="0"  @if($data[0]->title_name == 0) checked @else @endif>
                                กำลังรักษา
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_2"  value="1" @if($data[0]->title_name == 0) checked @else @endif>
                                หาย 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_3" value="2">
                                ส่งต่อโรงพยาบาล 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_4" value="3">
                                อื่นๆ 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_5" value="4">
                                ไม่ทราบ 
                              </label>
                            </div>
                          </div> --}}
                          <div class="col-xs-4">
                            <label>ระบุโรงพยาบาลที่ส่งต่อ</label>
                            {{-- <input type="text" class="form-control" name="text_last_diagnosis" placeholder="ระบุโรงพยาบาลที่ส่งต่อ"> --}}
                            <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                              <option value="{{ $data[0]->hospcode_treat }}">{{ $list_hos[$data[0]->hospcode_treat] }}</option>
                            </select>
                            <label></label>
                            <input type="text" class="form-control" name="text_hospcode_treat" placeholder="ระบุอื่นๆ" value="{{isset($data[0]->text_hospcode_treat) ? $data[0]->text_hospcode_treat :null}}">
                          </div>
                        </div>
                      </div>
                      </div>
                      <!-- /.box-header -->
                  </div>
                  </div>
              </div>
            </div> 
          </div>
            <!-- /.box -->
                        <!--ส่วนที่ 3 การตรวจทางห้องปฏิบัติการ การตรวจทางรังสีวิทยา และอื่นๆ -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="box box-success">
                            <div class="box-header with-border">
                              <h3 class="box-title">ส่วนที่ 3 การตรวจทางห้องปฏิบัติการ การตรวจทางรังสีวิทยา และอื่นๆ </h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
            
                            <div class="box-body">
                              {{-- คอรั่มภายใน3.1 --}}
                              <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-success">
                                  <div class="box-header with-border">
                                    <!-- checkbox3.1.1 -->
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CXR</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CXR" id="CXR_1" value="0"  @if($data[0]->CXR == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CXR" id="CXR_2"  value="1" @if($data[0]->CXR == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="CXR_date" name="CXR_date" placeholder="วันที่" data-date-format="yyyy-mm-dd" value="{{isset($data[0]->CXR_date) ? $data[0]->CXR_date :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="CXR_results" placeholder="ผลการตรวจ" value="{{isset($data[0]->CXR_results) ? $data[0]->CXR_results :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CT</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CT" id="CT_1" value="0"  @if($data[0]->CT == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CT" id="CT_2"  value="1" @if($data[0]->CT == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>อวัยวะที่ตรวจ</label>
                                          <input type="text" class="form-control" name="CT_body_organs" placeholder="อวัยวะที่ตรวจ" value="{{isset($data[0]->CT_body_organs) ? $data[0]->CT_body_organs :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="CT_date" name="CT_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd" value="{{isset($data[0]->CT_date) ? $data[0]->CT_date :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="CT_results" placeholder="ผลการตรวจ" value="{{isset($data[0]->CT_results) ? $data[0]->CT_results :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> MRI</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="MRI" id="MRI_1" value="0"  @if($data[0]->MRI == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="MRI" id="MRI_2"  value="1" @if($data[0]->MRI == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>อวัยวะที่ตรวจ</label>
                                          <input type="text" class="form-control" name="MRI_body_organs" placeholder="อวัยวะที่ตรวจ" value="{{isset($data[0]->MRI_body_organs) ? $data[0]->MRI_body_organs :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="MRI_date" name="MRI_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd" value="{{isset($data[0]->MRI_date) ? $data[0]->MRI_date :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="MRI_results" placeholder="ผลการตรวจ" value="{{isset($data[0]->MRI_results) ? $data[0]->MRI_results :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> EKG</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="EKG" id="EKG_1" value="0"  @if($data[0]->EKG == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="EKG" id="EKG_2"  value="1" @if($data[0]->EKG == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="EKG_date" name="EKG_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd" value="{{isset($data[0]->EKG_date) ? $data[0]->EKG_date :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="EKG_results" placeholder="ผลการตรวจ" value="{{isset($data[0]->EKG_results) ? $data[0]->EKG_results :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CBC ครั้งแรก</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="first_CBC" id="first_CBC_1" value="0"  @if($data[0]->first_CBC == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="first_CBC" id="first_CBC_2"  value="1" @if($data[0]->first_CBC == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Hct</label>
                                          <input type="text" class="form-control" name="first_CBC_Hct" placeholder="Hct.........%  " value="{{isset($data[0]->first_CBC_Hct) ? $data[0]->first_CBC_Hct :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>WBC </label>
                                          <input type="text" class="form-control" name="first_CBC_WBC" placeholder="WBC.........%" value="{{isset($data[0]->first_CBC_WBC) ? $data[0]->first_CBC_WBC :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Neu</label>
                                          <input type="text" class="form-control" name="first_CBC_Neu" placeholder="Neu.........%" value="{{isset($data[0]->first_CBC_Neu) ? $data[0]->first_CBC_Neu :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Lymp </label>
                                          <input type="text" class="form-control" name="first_CBC_Lymp" placeholder="Lymp.........%" value="{{isset($data[0]->first_CBC_Lymp) ? $data[0]->first_CBC_Lymp :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Mono </label>
                                          <input type="text" class="form-control" name="first_CBC_Mono" placeholder="Mono.........%" value="{{isset($data[0]->first_CBC_Mono) ? $data[0]->first_CBC_Mono :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Eo  </label>
                                          <input type="text" class="form-control" name="first_CBC_Eo" placeholder="Eo.........%" value="{{isset($data[0]->first_CBC_Eo) ? $data[0]->first_CBC_Eo :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Baso  </label>
                                          <input type="text" class="form-control" name="first_CBC_Baso" placeholder="Baso.........%" value="{{isset($data[0]->first_CBC_Baso) ? $data[0]->first_CBC_Baso :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Plt. count </label>
                                          <input type="text" class="form-control" name="first_CBC_Plt_count" placeholder="Plt. count.........%" value="{{isset($data[0]->first_CBC_Plt_count) ? $data[0]->first_CBC_Plt_count :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <label><li> Blood Chemistry</li>   </label>
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Hct</label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Hct" placeholder="Hct.........%  " value="{{isset($data[0]->first_blood_bhemistry_Hct) ? $data[0]->first_blood_bhemistry_Hct :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>WBC </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_WBC" placeholder="WBC.........%" value="{{isset($data[0]->first_blood_bhemistry_WBC) ? $data[0]->first_blood_bhemistry_WBC :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Neu</label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Neu" placeholder="Neu.........%" value="{{isset($data[0]->first_blood_bhemistry_Neu) ? $data[0]->first_blood_bhemistry_Neu :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Lymp </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Lymp" placeholder="Lymp.........%" value="{{isset($data[0]->first_blood_bhemistry_Lymp) ? $data[0]->first_blood_bhemistry_Lymp :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Mono </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Mono" placeholder="Mono.........%" value="{{isset($data[0]->first_blood_bhemistry_Mono) ? $data[0]->first_blood_bhemistry_Mono :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Eo  </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Eo" placeholder="Eo.........%" value="{{isset($data[0]->first_blood_bhemistry_Eo) ? $data[0]->first_blood_bhemistry_Eo :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Baso  </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Baso" placeholder="Baso.........%" value="{{isset($data[0]->first_blood_bhemistry_Baso) ? $data[0]->first_blood_bhemistry_Baso :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Plt. count </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Plt_count" placeholder="Plt. count.........%" value="{{isset($data[0]->first_blood_bhemistry_Plt_count) ? $data[0]->first_blood_bhemistry_Plt_count :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <label><li> Lipid profiles</li>   </label>
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Cholesterol</label>
                                          <input type="text" class="form-control" name="cholesterol" placeholder="Cholesterol" value="{{isset($data[0]->cholesterol) ? $data[0]->cholesterol :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Triglyceride </label>
                                          <input type="text" class="form-control" name="triglyceride" placeholder="Triglyceride" value="{{isset($data[0]->triglyceride) ? $data[0]->triglyceride :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>HDL</label>
                                          <input type="text" class="form-control" name="HDL" placeholder="HDL" value="{{isset($data[0]->HDL) ? $data[0]->HDL :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>LDL </label>
                                          <input type="text" class="form-control" name="LDL" placeholder="LDL" value="{{isset($data[0]->LDL) ? $data[0]->LDL :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <label><li> Coagulogram</li>   </label>
                                        </div>
                                        <div class="col-xs-2">
                                          <label>PTT</label>
                                          <input type="text" class="form-control" name="PTT" placeholder="PTT" value="{{isset($data[0]->PTT) ? $data[0]->PTT :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>PT </label>
                                          <input type="text" class="form-control" name="PT" placeholder="PT" value="{{isset($data[0]->PT) ? $data[0]->PT :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>TT</label>
                                          <input type="text" class="form-control" name="TT" placeholder="TT" value="{{isset($data[0]->TT) ? $data[0]->TT :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>อื่นๆ </label>
                                          <input type="text" class="form-control" name="Coagulogram_other" placeholder="อื่นๆ" value="{{isset($data[0]->Coagulogram_other) ? $data[0]->Coagulogram_other :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CSF</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CSF" id="CSF_1" value="0"  @if($data[0]->CSF == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CSF" id="CSF_2"  value="1" @if($data[0]->CSF == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="CSF_date" name="CSF_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd" value="{{isset($data[0]->CSF_date) ? $data[0]->CSF_date :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ลักษณะ</label>
                                          <input type="text" class="form-control" name="CSF_nature" placeholder="ลักษณะ" value="{{isset($data[0]->CSF_nature) ? $data[0]->CSF_nature :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>Cell count: PMN</label>
                                          <input type="text" class="form-control" name="CSF_PMN" placeholder="PMN…………/ml" value="{{isset($data[0]->CSF_PMN) ? $data[0]->CSF_PMN :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>Lymp</label>
                                          <input type="text" class="form-control" name="CSF_Lymp" placeholder="Lymp ……...../ml" value="{{isset($data[0]->CSF_Lymp) ? $data[0]->CSF_Lymp :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>Protein</label>
                                          <input type="text" class="form-control" name="CSF_Protein" placeholder="Protein ………...mg/dl " value="{{isset($data[0]->CSF_Protein) ? $data[0]->CSF_Protein :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>sugar</label>
                                          <input type="text" class="form-control" name="CSF_sugar" placeholder="sugar…………mg/dl " value="{{isset($data[0]->CSF_sugar) ? $data[0]->CSF_sugar :null}}">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>อื่นๆ</label>
                                          <input type="text" class="form-control" name="CSF_other" placeholder="อื่นๆ" value="{{isset($data[0]->CSF_other) ? $data[0]->CSF_other :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> NPS for RT-PCR</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS" id="NPS_1" value="0"  @if($data[0]->NPS == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS" id="NPS_2"  value="1" @if($data[0]->NPS == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="NPS_date" name="NPS_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd" value="{{isset($data[0]->NPS_date) ? $data[0]->NPS_date :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li> ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS_PCR" id="NPS_PCR_1" value="0"  @if($data[0]->NPS_PCR == 0) checked @else @endif>
                                              Not Detected  
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS_PCR" id="NPS_PCR_2"  value="1" @if($data[0]->NPS_PCR == 1) checked @else @endif>
                                              Detected    
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ</label>
                                          <input type="text" class="form-control" name="NPS_lab" placeholder="ห้องปฏิบัติการ" value="{{isset($data[0]->title_name) ? $data[0]->title_name :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> Serum for COVID-19 IgM </li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM" id="NPS_1" value="0"  @if($data[0]->Serum_COVID_19_IgM == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM" id="NPS_2"  value="1" @if($data[0]->Serum_COVID_19_IgM == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgM  ครั้งที่ 1 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgM1_date" name="Serum_COVID_19_IgM1_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd" value="{{isset($data[0]->Serum_COVID_19_IgM1_date) ? $data[0]->Serum_COVID_19_IgM1_date :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgM  ครั้งที่ 1 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM1_PCR" id="Serum_COVID_19_IgM1_PCR_1" value="0"  @if($data[0]->Serum_COVID_19_IgM1_PCR == 0) checked @else @endif>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM1_PCR" id="Serum_COVID_19_IgM1_PCR_2"  value="1" @if($data[0]->Serum_COVID_19_IgM1_PCR == 1) checked @else @endif>
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 1</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgM2_lab" placeholder="ห้องปฏิบัติการ" value="{{isset($data[0]->Serum_COVID_19_IgM2_lab) ? $data[0]->Serum_COVID_19_IgM2_lab :null}}">
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgM  ครั้งที่ 2 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgM2_date" name="Serum_COVID_19_IgM2_date" placeholder="วันที่" data-date-format="yyyy-mm-dd" value="{{isset($data[0]->Serum_COVID_19_IgM2_date) ? $data[0]->Serum_COVID_19_IgM2_date :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgM  ครั้งที่ 2 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM2_PCR" id="Serum_COVID_19_IgM2_PCR_1" value="0"  @if($data[0]->Serum_COVID_19_IgM2_PCR == 0) checked @else @endif>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM2_PCR" id="Serum_COVID_19_IgM2_PCR_2"  value="1" @if($data[0]->Serum_COVID_19_IgM2_PCR == 1) checked @else @endif>
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 2</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgM2_lab" placeholder="ห้องปฏิบัติการ" value="{{isset($data[0]->Serum_COVID_19_IgM2_lab) ? $data[0]->Serum_COVID_19_IgM2_lab :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> Serum for COVID-19 IgG </li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG" id="NPS_1" value="0"  @if($data[0]->Serum_COVID_19_IgG == 0) checked @else @endif>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG" id="NPS_2"  value="1" @if($data[0]->Serum_COVID_19_IgG == 1) checked @else @endif>
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgG  ครั้งที่ 1 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgG1_date" name="Serum_COVID_19_IgG1_date" placeholder="วันที่" data-date-format="yyyy-mm-dd" value="{{isset($data[0]->Serum_COVID_19_IgG1_date) ? $data[0]->Serum_COVID_19_IgG1_date :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgG  ครั้งที่ 1 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG1_PCR" id="Serum_COVID_19_IgG1_PCR_1" value="0"  @if($data[0]->Serum_COVID_19_IgG1_PCR == 0) checked @else @endif>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG1_PCR" id="Serum_COVID_19_IgG1_PCR_2"  value="1" @if($data[0]->Serum_COVID_19_IgG1_PCR == 1) checked @else @endif>
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 1</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgG2_lab" placeholder="ห้องปฏิบัติการ" value="{{isset($data[0]->Serum_COVID_19_IgG2_lab) ? $data[0]->Serum_COVID_19_IgG2_lab :null}}">
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgG  ครั้งที่ 2 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgG2_date" name="Serum_COVID_19_IgG2_date" placeholder="วันที่" data-date-format="yyyy-mm-dd" value="{{isset($data[0]->Serum_COVID_19_IgG2_date) ? $data[0]->Serum_COVID_19_IgG2_date :null}}">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgG  ครั้งที่ 2 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG2_PCR" id="Serum_COVID_19_IgG2_PCR_1" value="0"  @if($data[0]->Serum_COVID_19_IgG2_PCR == 0) checked @else @endif>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG2_PCR" id="Serum_COVID_19_IgG2_PCR_2"  value="1" @if($data[0]->Serum_COVID_19_IgG2_PCR == 1) checked @else @endif>
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 2</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgG2_lab" placeholder="ห้องปฏิบัติการ" value="{{isset($data[0]->Serum_COVID_19_IgG2_lab) ? $data[0]->Serum_COVID_19_IgG2_lab :null}}">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-xs-12">
                                        <label>อื่นๆ(ระบุ)</label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label>(ระบุ)</label>
                                        <input type="text" class="form-control" name="other_examination" placeholder="(ระบุ)" value="{{isset($data[0]->other_examination) ? $data[0]->other_examination :null}}">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>วันที่</label>
                                        <input type="text" class="form-control" id="other_date_examination" name="other_date_examination" placeholder="วันที่" data-date-format="yyyy-mm-dd" value="{{isset($data[0]->other_date_examination) ? $data[0]->other_date_examination :null}}">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ชนิดตัวอย่าง</label>
                                        <input type="text" class="form-control" name="other_saple_type" placeholder="ชนิดตัวอย่าง" value="{{isset($data[0]->other_saple_type) ? $data[0]->other_saple_type :null}}">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ตรวจด้วยวิธี</label>
                                        <input type="text" class="form-control" name="other_method" placeholder="ตรวจด้วยวิธี" value="{{isset($data[0]->other_method) ? $data[0]->other_method :null}}">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ผลการตรวจ </label>
                                        <input type="text" class="form-control" name="other_examination_results" placeholder="ผลการตรวจ" value="{{isset($data[0]->other_examination_results) ? $data[0]->other_examination_results :null}}">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ห้องปฏิบัติการ</label>
                                        <input type="text" class="form-control" name="other_lab" placeholder="ห้องปฏิบัติการ" value="{{isset($data[0]->other_lab) ? $data[0]->other_lab :null}}">
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  </div>
                                  <!-- /.box-header -->
                              </div>
                              </div>
                          </div>
                        </div> 
                      </div>
                        <!-- /.box -->
   <!--ส่วนที่ 1 ข้อมูลทั่วไป -->
   <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">ส่วนที่ 4 ประวัติการได้รับวัคซีน</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <div class="box-body">
        {{-- คอรั่มภายใน3.1 --}}
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <!-- checkbox3.1.1 -->
              <div class="form-group">
              <div class="row">
                <div class="col-xs-2">
                  <label><li>วัคซีนโควิด 19 </li>   </label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="covid19" id="covid19" value="0"  @if($data[0]->covid19 == 0) checked @else @endif>
                      ไม่ได้รับ
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="covid19" id="covid19"  value="1" @if($data[0]->covid19 == 1) checked @else @endif>
                      ได้รับ
                    </label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <label>ระบุ</label>
                  <input type="text" class="form-control" name="othercovid19" placeholder="ระบุ" value="{{isset($data[0]->othercovid19) ? $data[0]->othercovid19 :null}}">
                </div>
              </div>
            </div>
              <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-info">
                    <div style="overflow: scroll;">
                      <table class="maintable" id="customers">
                        <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">+ เพิ่มข้อมูลวัคซีน</button></br>
                        <thead>
                          <tr>
                            <th>
                              <font style="color:red;">*</font> ชื่อวัคซีน
                            </th>
                            <th>ปริมาณที่ให้</th>
                            <th>วิธีที่ให้</th>
                            <th>ตำแหน่ง</th>
                            <th>เข็มที่/ครั้งที่</th>
                            <th>
                              <font style="color:red;">*</font> ว/ด/ปที่ได้รับ
                            </th>
                            <th>
                              <font style="color:red;">*</font> เวลาที่ได้รับ
                            </th>
                            <th style="width:150px;">อาการ</th>
                            <th>ชื่อผู้ผลิต</th>
                            <th>ชื่อผู้ผลิตอื่นๆ</th>
                            <th>
                              <font style="color:red;">*</font> เลขที่ผลิต
                            </th>
                            <th>
                              <font style="color:red;">*</font> วันหมดอายุ
                            </th>
                            
                            <th>
                              <font style="color:red;">*</font> เลขที่ผลิต
                            </th>
                            <th>
                              <font style="color:red;">*</font> วันหมดอายุ
                            </th>
                            {{-- <th>
                              <font style="color:red;">*</font> ว/ด/ปที่ผสม
                            </th>
                            <th>
                              <font style="color:red;">*</font> เวลาที่ผสม
                            </th> --}}
                            <th>#</th>
                            {{-- <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @if ($count_data_vac[0]->vac_count == '0')
                          <tr class="data-contact-person">
                            <td>
                              <select type="text" id="name_of_vaccine" name="name_of_vaccine[]" class="form-control" required>
                                <option value="">กรุณาระบุชนิดวัคซีน</option>
                                @foreach ($vac_list as $row)
                                <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select type="text" id="vaccine_volume" name="vaccine_volume[]" class="form-control">
                                <option value="">กรุณาระบุปริมาณที่ให้</option>
                                <?php
                                               foreach ($arr_vaccine_volume as $k=>$v) {
                                               ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select type="text" id="route_of_vaccination1" name="route_of_vaccination[]" class="form-control">
                                <option value="">กรุณาระบุวิธีที่ให้</option>
                                <?php
                                                 foreach ($arr_route_of_vaccination as $k=>$v) {
                                             ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select type="text" id="vaccination_site1" name="vaccination_site[]" class="form-control">
                                <option value="">กรุณาระบุวิธีตำแหน่ง</option>
                                <?php
                                                 foreach ($arr_vaccination_site as $k=>$v) {
                                             ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <input type="number" id="dose1" name="dose[]" class="form-control" min="1" max="20">
                            </td>
                            <td>
                              <input type="text" name="date_of_vaccination[]" id="date_of_vaccination1" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            <td>
                              <input type="text" id="time_of_vaccination1" name="time_of_vaccination[]" class="form-control">
                            </td>
                            <td>
                              <input type="radio" id="symptom1_1" name="symptom_status[0]" value="1" data-toggle="modal" data-target="#Symptom1">
                              <label for="age1"> : มีอาการ</label><br>
                              <input type="radio" id="symptom1_2" name="symptom_status[0]" value="0"  data-toggle="modal" data-target="#nonSymptom1">
                              <label for="age2"> : ไม่มีอาการ</label><br>
                            </td>
                            <td>
                              <select type="text" id="manufacturer1" name="manufacturer[]" class="form-control">
                                <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                                <?php
                                                 foreach ($arr_manufacturer as $k=>$v) {
                                             ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <input type="text" id="other_manufacturer" name="other_manufacturer[]" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="lot_number1" name="lot_number[]" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="datepicker_expiry_date1" name="expiry_date[]" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            {{-- <td>
                                        <input type="text" id="name_of_diluent1" name="name_of_diluent[]" class="form-control">
                                      </td> --}}
                            <td>
                              <input type="text" id="lot_number_diluent1" name="lot_number_diluent[]" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent[]" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            {{-- <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution[]" class="form-control" data-date-format="yyyy-mm-dd" readonly></td> --}}
                            {{-- <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]" class="form-control"></td> --}}
                            {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                            <td>
                              <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>
                            </td>
                          </tr>
                          @else
                          <?php 
                          $i = 0;
                          foreach($datavac as $value) : 
                          
                          $i++;
                          ?>
                          
                          <tr class="data-contact-person">
                            <td>
                              <select type="text" id="name_of_vaccine" name="name_of_vaccine[]" class="form-control">
                                <option value="{{$value->name_of_vaccine}}">{{isset($listvac_arr[$value->name_of_vaccine]) ? $listvac_arr[$value->name_of_vaccine]:""}}</option>
                                <option value="">กรุณาระบุชนิดวัคซีน</option>
                                @foreach ($vac_list as $row)
                                <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select type="text" id="vaccine_volume" name="vaccine_volume[]" class="form-control">
                                <option value="{{$value->vaccine_volume}}">{{isset($arr_vaccine_volume[$value->vaccine_volume]) ? $arr_vaccine_volume[$value->vaccine_volume]:""}}</option>
                                <option value="">กรุณาระบุปริมาณที่ให้</option>
                                <?php
                                       foreach ($arr_vaccine_volume as $k=>$v) {
                                       ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select type="text" id="route_of_vaccination1" name="route_of_vaccination[]" class="form-control">
                                <option value="{{$value->route_of_vaccination}}">{{isset($arr_route_of_vaccination[$value->route_of_vaccination]) ? $arr_route_of_vaccination[$value->route_of_vaccination]:""}}</option>
                                <option value="">กรุณาระบุวิธีที่ให้</option>
                                <?php
                                         foreach ($arr_route_of_vaccination as $k=>$v) {
                                     ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select type="text" id="vaccination_site1" name="vaccination_site[]" class="form-control">
                                <option value="{{$value->vaccination_site}}">{{isset($arr_vaccination_site[$value->vaccination_site]) ? $arr_vaccination_site[$value->vaccination_site]:""}}</option>
                                <option value="">กรุณาระบุตำแหน่ง</option>
                                <?php
                                         foreach ($arr_vaccination_site as $k=>$v) {
                                     ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select name="dose[]" id="dose1" class="form-control">
                          <option value="{{isset($value->dose) ? $value->dose:""}}">เข็มที่{{isset($value->dose) ? $value->dose:""}}</option>
                          <option value="">กรุณาระบุเข็มที่</option>
                          
                                  <option value="1">เข็มที่ 1</option>
                                  <option value="2">เข็มที่ 2</option>
                                  <option value="3">เข็มที่ 3</option>
                              </select>
                                          </td>
                          
                            <td>
                              <input type="text" name="date_of_vaccination[]" value="{{isset($value->date_of_vaccination) ? $value->date_of_vaccination:""}}" id="date_of_vaccination1" class="form-control datepicker date_of_vaccination"
                                data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            <td>
                              <input type="text" id="time_of_vaccination1" name="time_of_vaccination[]" value="{{isset($value->vaccination_site) ? $value->time_of_vaccination:""}}" class="form-control">
                            </td>
                            <td>
                              <input type="radio" id="symptom1_1{{isset($value->id) ? $value->id:""}}" name="symptom_status[{{$i-1}}]" value="1" data-toggle="modal" data-target="#Symptom1{{isset($value->id) ? $value->id:""}}" 
                              @if($value->symptom_status == '1')
                              {{'checked'}}
                              @else
                              
                              @endif>
                              <label > : มีอาการ</label><br>
                              <input type="radio" id="symptom1_2{{isset($value->id) ? $value->id:""}}" name="symptom_status[{{$i-1}}]" value="0"  data-toggle="modal" data-target="#nonSymptom1" 
                              @if($value->symptom_status == '0')
                              {{'checked'}}
                              @else
                              
                              @endif>
                              <label > : ไม่มีอาการ</label><br>
                              <!-- Modal_1 -->
              <div class="modal fade" id="Symptom1{{isset($value->id) ? $value->id:""}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>
                  </div>
                  <div class="modal-body">
                      <div class="tab-pane active" id="tab_1">
                          <div class="box-body">
                            {{-- คอรั่มภายใน3.1 --}}
                            <div class="col-md-6">
                              <!-- general form elements -->
                              <div class="box box-success">
                                <div class="box-header with-border">
                                  <!-- checkbox3.1.1 -->
                                  <div class="form-group">
                                    <div class="col-md-4" id="rash_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="c_rash" name="c_rash[]" value="0027" @if ($value->rash == '0027')
                                        {{ "checked" }}
                                        @endif>
                                        Rash
                                      </label>
                                      <input type="text" id="rash{{$i}}" name="rash[0]"  value="{{isset($value->rash) ? $value->rash:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="erythema_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="erythema" name="c_erythema[{{$i-1}}]" value="0028" @if ($value->erythema == '0028')
                                        {{ "checked" }}
                                        @endif>
                                        Erythema
                                      </label>
                                      <input type="text" id="erythema{{$i}}" name="erythema[{{$i-1}}]"  value="{{isset($value->erythema) ? $value->erythema:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="urticaria_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="urticaria" name="c_urticaria[{{$i-1}}]" value="0044" @if ($value->urticaria == '0044')
                                        {{ "checked" }}
                                        @endif>
                                        Urticaria
                                      </label>
                                      <input type="text" id="urticaria{{$i}}" name="urticaria[{{$i-1}}]"  value="{{isset($value->urticaria) ? $value->urticaria:""}}" hidden>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-4" id="itching_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="itching" name="c_itching[{{$i-1}}]" value="0026" @if ($value->itching == '0026')
                                        {{ "checked" }}
                                        @endif>
                                        Itching
                                      </label>
                                      <input type="text" id="itching{{$i}}" name="itching[{{$i-1}}]"  value="{{isset($value->itching) ? $value->itching:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="edema_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="edema" name="c_edema[{{$i-1}}]" value="0003A" @if ($value->edema == '0003A')
                                        {{ "checked" }}
                                        @endif>
                                        Edema
                                      </label>
                                      <input type="text" id="edema{{$i}}" name="edema[{{$i-1}}]"  value="{{isset($value->edema) ? $value->edema:""}}" hidden>
                                    </div>
                                    <div class="col-md-5" id="angioedema_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="angioedema" name="c_angioedema[{{$i-1}}]" value="0003" @if ($value->angioedema == '0003')
                                        {{ "checked" }}
                                        @endif>
                                        Angioedema
                                      </label>
                                      <input type="text" id="angioedema{{$i}}" name="angioedema[{{$i-1}}]"  value="{{isset($value->angioedema) ? $value->angioedema:""}}" hidden>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
              
                                <div class="box-body">
                                  {{-- input content --}}
                                  <!-- checkbox3.1.2  -->
                                  <div class="form-group">
                                    <div class="col-md-4" id="fainting_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="fainting" name="c_fainting[{{$i-1}}]" value="1" @if ($value->fainting == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Fainting
                                      </label>
                                      <input type="text" id="fainting{{$i}}" name="fainting[{{$i-1}}]"  value="{{isset($value->fainting) ? $value->fainting:""}}" hidden>
                                    </div>
                                    <div class="col-md-6" id="hyperventilation_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="hyperventilation" name="c_hyperventilation[{{$i-1}}]" value="0517" @if ($value->hyperventilation == '0517')
                                        {{ "checked" }}
                                        @endif>
                                        Hyperventilation
                                      </label>
                                      <input type="text" id="hyperventilation{{$i}}" name="hyperventilation[{{$i-1}}]"  value="{{isset($value->hyperventilation) ? $value->hyperventilation:""}}" hidden>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-4" id="syncope_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="syncope" name="c_syncope[{{$i-1}}]" value="0223" @if ($value->syncope == '0223')
                                        {{ "checked" }}
                                        @endif>
                                        Syncope
                                      </label>
                                      <input type="text" id="syncope{{$i}}" name="syncope[{{$i-1}}]"  value="{{isset($value->syncope) ? $value->syncope:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="headche_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="headche" name="c_headche[{{$i-1}}]" value="1" @if ($value->headche == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Headche
                                      </label>
                                      <input type="text" id="headche{{$i}}" name="headche[{{$i-1}}]"  value="{{isset($value->headche) ? $value->headche:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="dizziness_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="dizziness" name="c_dizziness[{{$i-1}}]" value="0101" @if ($value->dizziness == '0101')
                                        {{ "checked" }}
                                        @endif>
                                        Dizziness
                                      </label>
                                      <input type="text" id="dizziness{{$i}}" name="dizziness[{{$i-1}}]" value="{{isset($value->dizziness) ? $value->dizziness:""}}" hidden>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-4" id="fatigue_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="fatigue" name="c_fatigue[{{$i-1}}]" value="0724" @if ($value->fatigue == '0724')
                                        {{ "checked" }}
                                        @endif>
                                        Fatigue
                                      </label>
                                      <input type="text" id="fatigue{{$i}}" name="fatigue[{{$i-1}}]"  value="{{isset($value->fatigue) ? $value->fatigue:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="malaise_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="malaise" name="c_malaise[{{$i-1}}]" value="0728" @if ($value->malaise == '0728')
                                        {{ "checked" }}
                                        @endif>
                                        Malaise
                                      </label>
                                      <input type="text" id="malaise{{$i}}" name="malaise[{{$i-1}}]"  value="{{isset($value->malaise) ? $value->malaise:""}}" hidden>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                  <!-- checkbox3.1.3  -->
                                  <div class="form-group">
                                    <div class="col-md-4" id="dyspepsia_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="dyspepsia" name="c_dyspepsia[{{$i-1}}]" value="0279" @if ($value->dyspepsia == '0279')
                                        {{ "checked" }}
                                        @endif>
                                        Dyspepsia
                                      </label>
                                      <input type="text" id="dyspepsia{{$i}}" name="dyspepsia[{{$i-1}}]" value="{{isset($value->dyspepsia) ? $value->dyspepsia:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="diarrhea_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="diarrhea" name="c_diarrhea[{{$i-1}}]" value="1" @if ($value->diarrhea == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Diarrhea
                                      </label>
                                      <input type="text" id="diarrhea{{$i}}" name="diarrhea[{{$i-1}}]" value="{{isset($value->diarrhea) ? $value->diarrhea:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="nausea_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="nausea" name="c_nausea[{{$i-1}}]" value="0308" @if ($value->nausea == '0308')
                                        {{ "checked" }}
                                        @endif>
                                        Nausea
                                      </label>
                                      <input type="text" id="nausea{{$i}}" name="nausea[{{$i-1}}]" value="{{isset($value->nausea) ? $value->nausea:""}}" hidden>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-4" id="vomiting_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="vomiting" name="c_vomiting[{{$i-1}}]" value="0228" @if ($value->vomiting == '0228')
                                        {{ "checked" }}
                                        @endif>
                                        Vomiting
                                      </label>
                                      <input type="text" id="vomiting{{$i}}" name="vomiting[{{$i-1}}]" value="{{isset($value->vomiting) ? $value->vomiting:""}}" hidden>
                                    </div>
                                    <div class="col-md-6" id="abdominal_pain_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="abdominal_pain" name="c_abdominal_pain[{{$i-1}}]" value="0268" @if ($value->abdominal_pain == '0268')
                                        {{ "checked" }}
                                        @endif>
                                        Abdominal pain
                                      </label>
                                      <input type="text" id="abdominal_pain{{$i}}" name="abdominal_pain[{{$i-1}}]" value="{{isset($value->abdominal_pain) ? $value->abdominal_pain:""}}" hidden>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                  <!-- checkbox3.1.4  -->
                                  <div class="form-group">
                                    <div class="col-md-4" id="arthalgia_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="arthalgia" name="c_arthalgia[{{$i-1}}]" value="1" @if ($value->arthalgia == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Arthalgia
                                      </label>
                                      <input type="text" id="arthalgia{{$i}}" name="arthalgia[{{$i-1}}]" value="{{isset($value->arthalgia) ? $value->arthalgia:""}}" hidden>
                                    </div>
                                    <div class="col-md-4" id="myalgia_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="myalgia" name="c_myalgia[{{$i-1}}]" value="0072" @if ($value->myalgia == '0072')
                                        {{ "checked" }}
                                        @endif>
                                        Myalgia
                                      </label>
                                      <input type="text" id="myalgia{{$i}}" name="myalgia[{{$i-1}}]" value="{{isset($value->myalgia) ? $value->myalgia:""}}" hidden>
                                    </div>
                                  </div>
                                </div>
              
                              </div>
                              <!-- /.box -->
                            </div>
                            {{-- คอรั่มภายใน3.2 --}}
                            <div class="col-md-6">
                              <!-- general form elements -->
                              <div class="box box-success">
                                <div class="box-header with-border">
                                  <!-- checkbox3.2.1 -->
                                  <div class="form-group">
                                    <div class="col-md-5" id="fever38c_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="fever38c" name="c_fever38c[{{$i-1}}]" value="0725" @if ($value->fever38c == '0725')
                                        {{ "checked" }}
                                        @endif>
                                        Fever >= 38 C
                                      </label>
                                      <input type="text" id="fever38c{{$i}}" name="fever38c[{{$i-1}}]" value="{{isset($value->fever38c) ? $value->fever38c:""}}" hidden>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
              
                                <div class="box-body">
                                  {{-- input content --}}
                                  <div class="box-body">
                                    {{-- input content --}}
                                    <!-- checkbox3.2.2  -->
                                    <div class="form-group">
                                      <div class="col-md-12" id="swelling_at_the_injection_{{$i}}">
                                        <label>
                                          <input type="checkbox" id="swelling_at_the_injection" name="c_swelling_at_the_injection[{{$i-1}}]" value="1" @if ($value->swelling_at_the_injection == '1')
                                          {{ "checked" }}
                                          @endif>
                                          บวมบริเวณที่ฉีดนานเกิน3วัน
                                        </label>
                                        <input type="text" id="swelling_at_the_injection{{$i}}" name="swelling_at_the_injection[{{$i-1}}]" value="{{isset($value->swelling_at_the_injection) ? $value->swelling_at_the_injection:""}}" hidden>
                                      </div>
                                      <div class="col-md-12" id="swelling_beyond_nearest_joint_{{$i}}">
                                        <label>
                                          <input type="checkbox" id="swelling_beyond_nearest_joint" name="c_swelling_beyond_nearest_joint[{{$i-1}}]" value="1" @if ($value->swelling_beyond_nearest_joint == '1')
                                          {{ "checked" }}
                                          @endif>
                                          บวมลามไปถึงข้อที่ใกล้ที่สุด
                                        </label>
                                        <input type="text" id="swelling_beyond_nearest_joint{{$i}}" name="swelling_beyond_nearest_joint[{{$i-1}}]" value="{{isset($value->swelling_beyond_nearest_joint) ? $value->swelling_beyond_nearest_joint:""}}" hidden>
                                      </div>
                                      <div class="col-md-12" id="lymphadenopathy_{{$i}}">
                                        <label>
                                          <input type="checkbox" id="lymphadenopathy" name="c_lymphadenopathy[{{$i-1}}]" value="0577" @if ($value->lymphadenopathy == '0577')
                                          {{ "checked" }}
                                          @endif>
                                          Lymphadenopathy
                                        </label>
                                        <input type="text" id="lymphadenopathy{{$i}}" name="lymphadenopathy[{{$i-1}}]" value="{{isset($value->lymphadenopathy) ? $value->lymphadenopathy:""}}" hidden>
                                      </div>
                                      <div class="col-md-12" id="lymphadenitis_{{$i}}">
                                        <label>
                                          <input type="checkbox" id="lymphadenitis" name="c_lymphadenitis[{{$i-1}}]" value="0577D" @if ($value->lymphadenitis == '0577D')
                                          {{ "checked" }}
                                          @endif>
                                          Lymphadenitis
                                        </label>
                                        <input type="text" id="lymphadenitis{{$i}}" name="lymphadenitis[{{$i-1}}]" value="{{isset($value->lymphadenitis) ? $value->lymphadenitis:""}}" hidden>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-6" id="sterile_abscess_{{$i}}">
                                        <label>
                                          <input type="checkbox" id="sterile_abscess" name="c_sterile_abscess[{{$i-1}}]" value="0051" @if ($value->sterile_abscess == '0051')
                                          {{ "checked" }}
                                          @endif>
                                          Sterile abscess
                                        </label>
                                        <input type="text" id="sterile_abscess{{$i}}" name="sterile_abscess[{{$i-1}}]" value="{{isset($value->sterile_abscess) ? $value->sterile_abscess:""}}" hidden>
                                      </div>
                                      <div class="col-md-6" id="bacterial_abscess_{{$i}}">
                                        <label>
                                          <input type="checkbox" id="bacterial_abscess" name="c_bacterial_abscess[{{$i-1}}]" value="1" @if ($value->bacterial_abscess == '1')
                                          {{ "checked" }}
                                          @endif>
                                          Bacterial abscess
                                        </label>
                                        <input type="text" id="bacterial_abscess{{$i}}" name="bacterial_abscess[{{$i-1}}]" value="{{isset($value->bacterial_abscess) ? $value->bacterial_abscess:""}}" hidden>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                  <!-- checkbox3.2.3  -->
                                  <div class="form-group">
                                    <div class="col-md-12" id="febrile_convulsion_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="febrile_convulsion" name="c_febrile_convulsion[{{$i-1}}]" value="1" @if ($value->febrile_convulsion == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Febrile convulsion
                                      </label>
                                      <input type="text" id="febrile_convulsion{{$i}}" name="febrile_convulsion[{{$i-1}}]" value="{{isset($value->febrile_convulsion) ? $value->febrile_convulsion:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="afebrile_convulsion_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="afebrile_convulsion" name="c_afebrile_convulsion[{{$i-1}}]" value="1" @if ($value->afebrile_convulsion == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Afebrile convulsion
                                      </label>
                                      <input type="text" id="afebrile_convulsion{{$i}}" name="afebrile_convulsion[{{$i-1}}]" value="{{isset($value->afebrile_convulsion) ? $value->afebrile_convulsion:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="encephalopathy_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="encephalopathy" name="c_encephalopathy[{{$i-1}}]" value="0105" @if ($value->encephalopathy == '0105')
                                        {{ "checked" }}
                                        @endif>
                                        Encephalopathy/Encephalitis
                                      </label>
                                      <input type="text" id="encephalopathy{{$i}}" name="encephalopathy[{{$i-1}}]" value="{{isset($value->encephalopathy) ? $value->encephalopathy:""}}" hidden>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-6" id="flaccid_paralysis_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="flaccid_paralysis" name="c_flaccid_paralysis[{{$i-1}}]" value="0139" @if ($value->flaccid_paralysis == '0139')
                                        {{ "checked" }}
                                        @endif>
                                        Flaccid paralysis
                                      </label>
                                      <input type="text" id="flaccid_paralysis{{$i}}" name="flaccid_paralysis[{{$i-1}}]" value="{{isset($value->flaccid_paralysis) ? $value->flaccid_paralysis:""}}" hidden>
                                    </div>
                                    <div class="col-md-6" id="spastic_paralysis_{{$i}}">
                                      <label>
                                        <input type="checkbox" id="spastic_paralysis" name="c_spastic_paralysis[{{$i-1}}]" value="0775" @if ($value->spastic_paralysis == '0775')
                                        {{ "checked" }}
                                        @endif>
                                        Spastic paralysis
                                      </label>
                                      <input type="text" id="spastic_paralysis{{$i}}" name="spastic_paralysis[{{$i-1}}]" value="{{isset($value->spastic_paralysis) ? $value->spastic_paralysis:""}}" hidden>
                                    </div>
                                  </div>
                                </div>
                              </div>
              
                            </div>
                            <!-- /.box -->
                            {{-- คอรั่มภายใน3.3 --}}
                            <div class="col-md-6">
                              <!-- general form elements -->
                              <div class="box box-success">
                                <!-- /.box-header -->
                                <!-- form start -->
              
                                <div class="box-body">
                                  {{-- input content --}}
                                  <!-- checkbox3.3.1  -->
                                  <div class="form-group">
                                    <div class="col-md-12" id="hhe_{{$i}}">
                                      <label>
                                        <input id="hhe" name="c_hhe[{{$i-1}}]" type="checkbox" value="1704" @if ($value->hhe == '1704')
                                        {{ "checked" }}
                                        @endif>
                                        Hypotonic Hyporesponsive episode (HHE)
                                      </label>
                                      <input type="text" id="hhe{{$i}}" name="hhe[{{$i-1}}]" value="{{isset($value->hhe) ? $value->hhe:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="persistent_inconsolable_crying_{{$i}}">
                                      <label>
                                        <input id="persistent_inconsolable_crying" name="c_persistent_inconsolable_crying[{{$i-1}}]" type="checkbox" value="1" @if ($value->persistent_inconsolable_crying == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Persistent inconsolable crying
                                      </label>
                                      <input type="text" id="persistent_inconsolable_crying{{$i}}" name="persistent_inconsolable_crying[{{$i-1}}]" value="{{isset($value->persistent_inconsolable_crying) ? $value->persistent_inconsolable_crying:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="thrombocytopenia_{{$i}}">
                                      <label>
                                        <input id="thrombocytopenia" name="c_thrombocytopenia[{{$i-1}}]" type="checkbox" value="0594" @if ($value->thrombocytopenia == '0594')
                                        {{ "checked" }}
                                        @endif>
                                        Thrombocytopenia
                                      </label>
                                      <input type="text" id="thrombocytopenia{{$i}}" name="thrombocytopenia[{{$i-1}}]" value="{{isset($value->thrombocytopenia) ? $value->thrombocytopenia:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="osteomyelitis_{{$i}}">
                                      <label>
                                        <input id="osteomyelitis" name="c_osteomyelitis[{{$i-1}}]" type="checkbox" value="1184" @if ($value->osteomyelitis == '1184')
                                        {{ "checked" }}
                                        @endif>
                                        Osteitis/Osteomyelitis
                                      </label>
                                      <input type="text" id="osteomyelitis{{$i}}" name="osteomyelitis[{{$i-1}}]" value="{{isset($value->osteomyelitis) ? $value->osteomyelitis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="toxic_shock_syndrome_{{$i}}">
                                      <label>
                                        <input id="toxic_shock_syndrome" name="c_toxic_shock_syndrome[{{$i-1}}]" type="checkbox" value="1" @if ($value->toxic_shock_syndrome == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Toxic shock syndrome
                                      </label>
                                      <input type="text" id="toxic_shock_syndrome{{$i}}" name="toxic_shock_syndrome[{{$i-1}}]" value="{{isset($value->toxic_shock_syndrome) ? $value->toxic_shock_syndrome:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="sepsis_{{$i}}">
                                      <label>
                                        <input id="sepsis" name="c_sepsis[{{$i-1}}]" type="checkbox" value="0744" @if ($value->sepsis == '0744')
                                        {{ "checked" }}
                                        @endif>
                                        Sepsis
                                      </label>
                                      <input type="text" id="sepsis{{$i}}" name="sepsis[{{$i-1}}]" value="{{isset($value->sepsis) ? $value->sepsis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="anaphylaxis_{{$i}}">
                                      <label>
                                        <input id="anaphylaxis" name="c_anaphylaxis[{{$i-1}}]" type="checkbox" value="2237" @if ($value->anaphylaxis == '2237')
                                        {{ "checked" }}
                                        @endif>
                                        Anaphylaxis
                                      </label>
                                      <input type="text" id="anaphylaxis{{$i}}" name="anaphylaxis[{{$i-1}}]" value="{{isset($value->anaphylaxis) ? $value->anaphylaxis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="gbs_{{$i}}">
                                      <label>
                                        <input id="gbs" name="c_gbs[{{$i-1}}]" type="checkbox" value="1" @if ($value->gbs == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Guillain-Barré syndrome (GBS)
                                      </label>
                                      <input type="text" id="gbs{{$i}}" name="gbs[{{$i-1}}]" value="{{isset($value->gbs) ? $value->gbs:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="transverse_myelitis_{{$i}}">
                                      <label>
                                        <input id="transverse_myelitis" name="c_transverse_myelitis[{{$i-1}}]" type="checkbox" value="1" @if ($value->transverse_myelitis == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Transverse myelitis
                                      </label>
                                      <input type="text" id="transverse_myelitis{{$i}}" name="transverse_myelitis[{{$i-1}}]" value="{{isset($value->transverse_myelitis) ? $value->transverse_myelitis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="adem_{{$i}}">
                                      <label>
                                        <input id="adem" name="c_adem[{{$i-1}}]" type="checkbox" value="1" @if ($value->adem == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Acute disseminated encephalomyelitis (ADEM)
                                      </label>
                                      <input type="text" id="adem{{$i}}" name="adem[{{$i-1}}]" value="{{isset($value->adem) ? $value->adem:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="acute_myocardial_{{$i}}">
                                      <label>
                                        <input id="acute_myocardial" name="c_acute_myocardial[{{$i-1}}]" type="checkbox" value="1" @if ($value->acute_myocardial == '1')
                                        {{ "checked" }}
                                        @endif>
                                        Acute Myocardial
                                      </label>
                                      <input type="text" id="acute_myocardial{{$i}}" name="acute_myocardial[{{$i-1}}]" value="{{isset($value->acute_myocardial) ? $value->acute_myocardial:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="ards_{{$i}}">
                                      <label>
                                        <input id="ards" name="c_ards[{{$i-1}}]" type="checkbox" value="1" @if ($value->ards == '1')
                                        {{ "checked" }}
                                        @endif>
                                         Acute respiratory distress syndrome (ARDS)
                                      </label>
                                      <input type="text" id="ards{{$i}}" name="ards[{{$i-1}}]" value="{{isset($value->ards) ? $value->ards:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="symptoms_later_immunized_{{$i}}">
                                      <label>
                                        <input id="symptoms_later_immunized" name="c_symptoms_later_immunized[{{$i-1}}]" type="checkbox" value="9999" @if ($value->symptoms_later_immunized == '9999')
                                        {{ "checked" }}
                                        @endif>
                                        other
                                      </label>
                                      <input type="text" id="symptoms_later_immunized{{$i}}" name="symptoms_later_immunized[{{$i-1}}]" value="{{isset($value->symptoms_later_immunized) ? $value->symptoms_later_immunized:""}}" hidden>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-lg-12">
                                        <div id="other_symptoms_later_immunized" style="display: none">
                                          <input type="text" id="other_symptoms_later_immunized_text1" name="other_symptoms_later_immunized[{{$i-1}}]" class="form-control" placeholder="" hidden="true"  value="{{isset($value->other_symptoms_later_immunized) ? $value->other_symptoms_later_immunized:""}}">
                                        </div>
                                        {{-- <div id="other_symptoms_later_immunized_t" style="display: none">
                                          <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">
                                        </div> --}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.box -->
                            </div>
                            {{-- คอรั่มภายใน3.3 --}}
                            <div class="col-md-6">
                              <!-- general form elements -->
                              <div class="box box-success">
                                <!-- /.box-header -->
                                <!-- form start -->
            
                                <div class="box-body">
                                  {{-- input content --}}
                                  <!-- checkbox3.3.1  -->
                                  <div class="form-group">
                                    <div class="col-md-12" id="chest_pain_{{$i}}">
                                      <label>
                                        <input name="c_chest_pain[{{$i-1}}]" type="checkbox" value="1" @if ($value->chest_pain == '1')
                                      {{ "checked" }}
                                @endif>
                                        Chest pain
                                      </label>
                                      <input type="text" id="chest_pain{{$i}}" name="chest_pain[{{$i-1}}]"  value="{{isset($value->chest_pain) ? $value->chest_pain:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="myocarditis_{{$i}}">
                                      <label>
                                        <input name="c_chest_pain" type="checkbox" value="1" @if ($value->myocarditis == '1')
                                      {{ "checked" }}
                                @endif>
                                        Myocarditis
                                      </label>
                                      <input type="text" id="myocarditis{{$i}}" name="myocarditis[{{$i-1}}]"  value="{{isset($value->myocarditis) ? $value->myocarditis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="heart_failure_{{$i}}">
                                      <label>
                                        <input name="c_heart_failure" type="checkbox" value="1" @if ($value->heart_failure == '1')
                                      {{ "checked" }}
                                @endif>
                                        Heart failure
                                      </label>
                                      <input type="text" id="heart_failure{{$i}}" name="heart_failure[{{$i-1}}]"  value="{{isset($value->heart_failure) ? $value->heart_failure:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="pericarditis_{{$i}}">
                                      <label>
                                        <input name="pericarditis" type="checkbox" value="1" @if ($value->pericarditis == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Pericarditis
                                      </label>
                                      <input type="text" id="pericarditis{{$i}}" name="pericarditis[{{$i-1}}]"  value="{{isset($value->pericarditis) ? $value->pericarditis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="sudden_cardiac_arrest_{{$i}}">
                                      <label>
                                        <input name="sudden_cardiac_arrest" type="checkbox" value="1" @if ($value->sudden_cardiac_arrest == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Sudden cardiac arrest
                                      </label>
                                      <input type="text" id="sudden_cardiac_arrest{{$i}}" name="sudden_cardiac_arrest[{{$i-1}}]"  value="{{isset($value->sudden_cardiac_arrest) ? $value->sudden_cardiac_arrest:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="covid_19_{{$i}}">
                                      <label>
                                        <input name="covid_19" type="checkbox" value="1" @if ($value->covid_19 == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Covid-19
                                      </label>
                                      <input type="text" id="covid_19{{$i}}" name="covid_19[{{$i-1}}]"  value="{{isset($value->covid_19) ? $value->covid_19:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="ischemic_stroke_{{$i}}">
                                      <label>
                                        <input name="ischemic_stroke" type="checkbox" value="1" @if ($value->ischemic_stroke == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Ischemic stroke
                                      </label>
                                      <input type="text" id="ischemic_stroke{{$i}}" name="ischemic_stroke[{{$i-1}}]"  value="{{isset($value->ischemic_stroke) ? $value->ischemic_stroke:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="hemorrhagic_stroke_{{$i}}">
                                      <label>
                                        <input name="hemorrhagic_stroke" type="checkbox" value="1" @if ($value->hemorrhagic_stroke == '1')
                                      {{ "checked" }}
                                @endif>
            
                                      Hemorrhagic stroke
                                      </label>
                                      <input type="text" id="hemorrhagic_stroke{{$i}}" name="hemorrhagic_stroke[{{$i-1}}]"  value="{{isset($value->hemorrhagic_stroke) ? $value->hemorrhagic_stroke:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="deep_vein_thrombosis_{{$i}}">
                                      <label>
                                        <input name="deep_vein_thrombosis" type="checkbox" value="1" @if ($value->deep_vein_thrombosis == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Deep vein thrombosis                            
                                    </label>
                                    <input type="text" id="deep_vein_thrombosis{{$i}}" name="deep_vein_thrombosis[{{$i-1}}]"  value="{{isset($value->deep_vein_thrombosis) ? $value->deep_vein_thrombosis:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="pulmonary_embolism_{{$i}}">
                                      <label>
                                        <input name="pulmonary_embolism" type="checkbox" value="1" @if ($value->pulmonary_embolism == '1')
                                      {{ "checked" }}
                                @endif>
                                        Pulmonary embolism
                                      </label>
                                      <input type="text" id="pulmonary_embolism{{$i}}" name="pulmonary_embolism[{{$i-1}}]"  value="{{isset($value->pulmonary_embolism) ? $value->pulmonary_embolism:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="hypertension_{{$i}}">
                                      <label>
                                        <input name="hypertension" type="checkbox" value="1" @if ($value->hypertension == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Hypertension
                                      </label>
                                      <input type="text" id="hypertension{{$i}}" name="hypertension[{{$i-1}}]"  value="{{isset($value->hypertension) ? $value->hypertension:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="hypertensive_urgency_{{$i}}">
                                      <label>
                                        <input name="hypertensive_urgency" type="checkbox" value="1" @if ($value->hypertensive_urgency == '1')
                                      {{ "checked" }}
                                @endif>
            
                                         Hypertensive urgency
                                      </label>
                                      <input type="text" id="hypertensive_urgency{{$i}}" name="hypertensive_urgency[{{$i-1}}]"  value="{{isset($value->hypertensive_urgency) ? $value->hypertensive_urgency:""}}" hidden>
                                    </div>
                                    <div class="col-md-12" id="bells_palsy_{{$i}}">
                                      <label>
                                        <input name="bells_palsy" type="checkbox" value="1" @if ($value->bells_palsy == '1')
                                      {{ "checked" }}
                                @endif>
            
                                        Bell's palsy
                                      </label>
                                      <input type="text" id="bells_palsy{{$i}}" name="bells_palsy[{{$i-1}}]"  value="{{isset($value->bells_palsy) ? $value->bells_palsy:""}}" hidden>
                                    </div>
            
                                    </div>
                                  </div>
            
            
                              </div>
                              <!-- /.box -->
                            </div>
            
                            {{-- คอรั่มภายใน3.4 --}}
                            <div class="col-md-12">
                              <!-- general form elements -->
                              <div class="box box-success">
                                <div class="box-header with-border">
                                  <div class="form-group">
                                    <div class="col-lg-6">
                                      <label>ว/ด/ป ที่เกิดอาการ :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="date_of_symptoms" name="date_of_symptoms[{{$i-1}}]" data-date-format="yyyy-mm-dd" value="{{isset($value->date_of_symptoms) ? $value->date_of_symptoms:""}}" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                      <div class="col-lg-6">
                                        <label>เวลาที่เกิดอาการ :</label>
                                        <div class="input-group">
                                          <input  id="time_of_symptoms1" type="text" class="form-control" name="time_of_symptoms[{{$i-1}}]" value="{{isset($value->time_of_symptoms) ? $value->time_of_symptoms:""}}">
              
                                          <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-6">
                                      <label>ว/ด/ป ที่รับรักษา :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="date_of_treatment" name="date_of_treatment[{{$i-1}}]" data-date-format="yyyy-mm-dd" value="{{isset($value->date_of_treatment) ? $value->date_of_treatment:""}}" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-6">
                                      <label>ว/ด/ป ที่จำหน่าย :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="time_of_treatment" name="time_of_treatment[{{$i-1}}]" data-date-format="yyyy-mm-dd"  value="{{isset($value->time_of_treatment) ? $value->time_of_treatment:""}}" readonly>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
              
                                <div class="box-body">
                                  {{-- input content --}}
                                  <!-- textarea -->
                                  <div class="form-group">
                                    <div class="col-lg-8">
                                      <label>รายละเอียดอาการและการตรวจสอบ</label>
                                      <input class="form-control" rows="5"  id="Symptoms_details1" name="Symptoms_details[{{$i-1}}]" value="{{isset($value->Symptoms_details) ? $value->Symptoms_details:""}}">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-8">
                                      <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis1" name="diagnosis[{{$i-1}}]" class="form-control" placeholder="" value="{{isset($value->diagnosis) ? $value->diagnosis:""}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.box -->
                            </div>
                          </div>
                          <div class="box-footer">
                            <div class="form-group">
                              <div class="col-lg-12">
                                <label>
                                  <font style="color:red;">*</font> ความร้ายแรงของอาการ
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12"  id="seriousness_of_the_symptoms_{{$i}}">
                                <!-- checkbox3.5.1  -->
                                <div class="form-group">
                                  <div class="col-md-2">
                                    <label>
                                      <input type="radio" name="c_seriousness_of_the_symptoms[{{$i-1}}]"  id="seriousness_of_the_symptoms" value="1"  @if ($value->seriousness_of_the_symptoms == '1')
                                      {{ "checked" }}
                                      @endif>
                                      ไม่ร้ายแรง
                                    </label>
                                  </div>
                                  <div class="col-md-2">
                                    <label>
                                      <input type="radio" name="c_seriousness_of_the_symptoms[{{$i-1}}]" id="seriousness_of_the_symptoms" value="2" @if ($value->seriousness_of_the_symptoms == '2')
                                      {{ "checked" }}
                                      @endif>
                                      ร้ายแรง
                                    </label>
                                  </div>
                                  <input type="text" id="seriousness_of_the_symptoms{{$i}}" name="seriousness_of_the_symptoms[{{$i-1}}]" value="{{isset($value->seriousness_of_the_symptoms) ? $value->seriousness_of_the_symptoms:""}}" hidden>
                                </div>
                              </div>
                            </div>
                            <div id="other_seriousness_of_the_symptoms_bk1">
                              <div id="other_seriousness_of_the_symptoms_{{$i}}">
                              <div class="form-group">
                                <div class="col-lg-12">
                                  <label>ระบุ :</label>
                                </div>
                              </div>
                              <!-- checkbox3.1.1 -->
                              <div class="form-group">
                                <div class="col-md-4">
                                  <label>
                                    <input type="checkbox" name="c_other_seriousness_of_the_symptoms[{{$i-1}}]" id="other_seriousness_of_the_symptoms" value="1" @if ($value->other_seriousness_of_the_symptoms == '1')
                                    {{ "checked" }}
                                    @endif>
                                    เสียชีวิต
                                  </label>
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    <input type="checkbox" name="c_other_seriousness_of_the_symptoms[{{$i-1}}]" id="other_seriousness_of_the_symptoms" value="2" @if ($value->other_seriousness_of_the_symptoms == '2')
                                    {{ "checked" }}
                                    @endif>
                                    อันตรายถึงชีวิต
                                  </label>
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    <input type="checkbox" name="c_other_seriousness_of_the_symptoms[{{$i-1}}]" id="other_seriousness_of_the_symptoms" value="3" @if ($value->other_seriousness_of_the_symptoms == '3')
                                    {{ "checked" }}
                                    @endif>
                                    พิการ/ไร้ความสามารถ
                                  </label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-4">
                                  <label>
                                    <input type="checkbox" name="c_other_seriousness_of_the_symptoms[{{$i-1}}]" id="other_seriousness_of_the_symptoms" value="4" @if ($value->other_seriousness_of_the_symptoms == '4')
                                    {{ "checked" }}
                                    @endif>
                                    รับไว้รักษาในโรงพยาบาล
                                  </label>
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    <input type="checkbox" name="c_other_seriousness_of_the_symptoms[{{$i-1}}]" id="other_seriousness_of_the_symptoms" value="5" @if ($value->other_seriousness_of_the_symptoms == '5')
                                    {{ "checked" }}
                                    @endif>
                                    ความผิดปกติแต่กำเนิด
                                  </label>
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    <input type="checkbox" name="c_other_seriousness_of_the_symptoms[{{$i-1}}]" id="other_seriousness_of_the_symptoms" value="6" @if ($value->other_seriousness_of_the_symptoms == '6')
                                    {{ "checked" }}
                                    @endif>
                                    อื่นๆที่มีความสำคัญทางการแพทย์
                                  </label>
                                </div>
                                <div class="col-lg-4">
                                  <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                                    <label></label>
                                    <input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms[{{$i-1}}]" class="form-control" placeholder="อื่นๆ" value="{{isset($value->text_other_seriousness_symptoms) ? $value->text_other_seriousness_symptoms:""}}">
                                  </div>
                                </div>
                              </div>
                              <input type="text"  id="other_seriousness_of_the_symptoms{{$i}}" name="other_seriousness_of_the_symptoms[{{$i-1}}]" value="{{isset($value->other_seriousness_of_the_symptoms) ? $value->other_seriousness_of_the_symptoms:""}}" hidden>
                            </div>
                          </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <div class="form-group">
                              <div class="col-lg-12">
                                <label>
                                  <font style="color:red;">*</font> สถานะผู้ป่วย
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12" id="patient_status_{{$i}}">
                                <!-- checkbox3.5.1  -->
                                <div class="form-group">
                                  <div class="col-md-4">
                                    <label>
                                      <input type="radio" id="c_patient_status1" name="c_patient_status[{{$i-1}}]" value="1"  @if ($value->patient_status == '1')
                                      {{ "checked" }}
                                      @endif>
                                      หาย
                                    </label>
                                  </div>
                                  <div class="col-md-4">
                                    <label>
                                      <input type="radio" id="c_patient_status1" name="c_patient_status[{{$i-1}}]" value="2" @if ($value->patient_status == '2')
                                      {{ "checked" }}
                                      @endif>
                                      หายโดยมีร่องรอย
                                    </label>
                                  </div>
                                  <div class="col-md-4">
                                    <label>
                                      <input type="radio" id="c_patient_status1" name="c_patient_status[{{$i-1}}]" value="3" @if ($value->patient_status == '3')
                                      {{ "checked" }}
                                      @endif>
                                      อาการดีขึ้นแต่ยังไม่หาย
                                    </label>
                                  </div>
                                  <div class="col-md-4">
                                    <label>
                                      <input type="radio" id="c_patient_status1" name="c_patient_status[{{$i-1}}]" value="4" @if ($value->patient_status == '4')
                                      {{ "checked" }}
                                      @endif>
                                      ไม่หาย
                                    </label>
                                  </div>
                                  <div class="col-md-4">
                                    <label>
                                      <input type="radio" id="c_patient_status1" name="c_patient_status[{{$i-1}}]" value="5" @if ($value->patient_status == '5')
                                      {{ "checked" }}
                                      @endif>
                                      ไม่ทราบ
                                    </label>
                                  </div>
                                  <div class="col-md-4">
                                    <label>
                                      <input type="radio" id="c_patient_status1" name="c_patient_status[{{$i-1}}]" value="6" @if ($value->patient_status == '6')
                                      {{ "checked" }}
                                      @endif>
                                      เสียชีวิต
                                    </label>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="input-group date">
                                      <div id="other_patian_sta" style="display: none">
                                        <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead[{{$i-1}}]" hidden="true" data-date-format="yyyy-mm-dd" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <input type="text" id="patient_status{{$i}}" name="patient_status[{{$i-1}}]" value="{{isset($value->patient_status) ? $value->patient_status:""}}" hidden>
                                </div>
                              </div>
                            </div>
                            <!-- checkbox3.1.1 -->
                            <div class="form-group">
                              <div class="col-lg-12">
                                <label>ผ่าพิสูจน์ศพ :</label>
                              </div>
                            </div>
                            <!-- checkbox3.1.1 -->
                            <div class="form-group">
                              <div class="col-lg-12"  id="funeral_{{$i}}">
                                <div class="col-md-2">
                                  <label>
                                    <input type="radio" id="funeral" name="c_funeral[{{$i-1}}]" value="1"  @if($value->funeral == '1')
                                    {{ "checked" }}
                                    @endif>
                                    ไม่มี
                                  </label>
                                </div>
                                <div class="col-md-2">
                                  <label>
                                    <input type="radio" id="funeral" name="c_funeral[{{$i-1}}]" value="2" @if($value->funeral == '2')
                                    {{ "checked" }}
                                    @endif>
                                    ไม่ทราบ
                                  </label>
                                </div>
                                <div class="col-md-2">
                                  <label>
                                    <input type="radio" name="c_funeral[{{$i-1}}]" id="funeral" value="3" @if($value->funeral == '3')
                                    {{ "checked" }}
                                    @endif>
                                    ร้ายแรง
                                  </label>
                                </div>
                                <input type="text" id="funeral{{$i}}" name="funeral[{{$i-1}}]" value="{{isset($value->funeral) ? $value->funeral:""}}"  hidden>
                                <div class="col-lg-3">
                                  <div id="other_address_funeral" style="display: none">
                                    <label>สถานที่ทำการ :</label>
                                    <input type="text" id="other_address_funeral_text" name="other_address_funeral[{{$i-1}}]" class="form-control" placeholder="ระบุสถานที่ทำการ" value="{{isset($value->other_address_funeral) ? $value->other_address_funeral:""}}">
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
              
                        </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">เสร็จสิ้น</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                  </div>
                </div>
              </div>
            </div>
                
                            </td>
                            <td>
                              <select type="text" id="manufacturer1" name="manufacturer[]" class="form-control">
                                <option value="{{$value->manufacturer}}">{{isset($arr_manufacturer[$value->manufacturer])?$arr_manufacturer[$value->manufacturer]:""}}</option>
                                <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                                <?php
                                         foreach ($arr_manufacturer as $k=>$v) {
                                     ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <input type="text" id="other_manufacturer" name="other_manufacturer[]" value="{{isset($value->other_manufacturer) ? $value->other_manufacturer:""}}" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="lot_number1" name="lot_number[]" value="{{isset($value->lot_number) ? $value->lot_number:""}}" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="datepicker_expiry_date1" name="expiry_date[]" value="{{isset($value->expiry_date) ? $value->expiry_date:""}}" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            {{-- <td>
                                      <input type="text" id="name_of_diluent1" name="name_of_diluent[]" value="{{isset($value->name_of_diluent) ? $value->name_of_diluent:""}}" class="form-control">
                            </td> --}}
                            <td>
                              <input type="text" id="lot_number_diluent1" name="lot_number_diluent[]" value="{{isset($value->lot_number_diluent) ? $value->lot_number_diluent:""}}" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent[]" value="{{isset($value->expiry_date_diluent) ? $value->expiry_date_diluent:""}}" class="form-control datepicker_expiry_date_diluent"
                                data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            {{-- <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution[]" value="{{isset($value->date_of_reconstitution) ? $value->date_of_reconstitution:""}}" class="form-control" data-date-format="yyyy-mm-dd"
                            readonly></td> --}}
                            {{-- <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]" value="{{isset($value->time_of_reconstitution) ? $value->time_of_reconstitution:""}}" class="form-control"></td> --}}
                            {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                            <td>
                              <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>
                              <button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-m">ลบข้อมูลวัคซีน</button></td>
                            </td>
                          </tr>
                          <?php endforeach;?>
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box -->
                  </div>
                </div>
                <!--หัวข้อที่3 -->
                {{-- หัวข้อที่ 3 --}}
                
                @include('AEFI.Apps.SymptomModal.SymptomModal_1')
              </div>
            </div>
           
         
            </div>
            <!-- /.box-header -->
        </div>
        </div>
    </div>
  </div> 
</div>
  <!-- /.box -->
  <!--ส่วนที่ 3 การตรวจทางห้องปฏิบัติการ การตรวจทางรังสีวิทยา และอื่นๆ -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">ส่วนที่ 5 ประวัติเสี่ยงอื่นๆ </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <div class="box-body">
        {{-- คอรั่มภายใน3.1 --}}
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <!-- checkbox3.1.1 -->
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-4">
                    <label><li> เคยตรวจหาการติดเชื้อโควิด 19</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid" id="inspect_covid_1" value="0"  @if($data[0]->inspect_covid == 0) checked @else @endif>
                        ไม่ได้ตรวจ   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid" id="inspect_covid_2"  value="1" @if($data[0]->inspect_covid == 1) checked @else @endif>
                        ตรวจ 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <label><li> ผลการตรวจ </li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid_results" id="inspect_covid_results_1" value="0"  @if($data[0]->inspect_covid_results == 0) checked @else @endif>
                        ไม่ได้ตรวจ   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid_results" id="inspect_covid_results_2"  value="1" @if($data[0]->inspect_covid_results == 1) checked @else @endif>
                        ตรวจ 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>หน่วยงานที่ตรวจ</label>
                    <select id="js-example-basic-single" name="inspect_covid_location" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                      <option value="{{ $data[0]->inspect_covid_location }}">{{ $list_hos[$data[0]->inspect_covid_location] }}</option>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label>วันที่</label>
                    <input type="text" class="form-control" id="inspect_covid_date" name="inspect_covid_date" placeholder="วันที่" data-date-format="yyyy-mm-dd" value="{{isset($data[0]->inspect_covid_date) ? $data[0]->inspect_covid_date :null}}">
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยสัมผัสใกล้ชิดกับผู้ป่วยโควิด 19</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="covid_close_contact" id="covid_close_contact_1" value="0"  @if($data[0]->covid_close_contact == 0) checked @else @endif>
                        เคย   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="covid_close_contact" id="covid_close_contact_2"  value="1" @if($data[0]->covid_close_contact == 1) checked @else @endif>
                        ไม่เคย 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <label><li> ลักษณะการสัมผัส </li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="contact_nature" id="contact_nature_1" value="0"  @if($data[0]->contact_nature == 0) checked @else @endif>
                        พูดคุย   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="contact_nature" id="contact_nature_2"  value="1" @if($data[0]->contact_nature == 1) checked @else @endif>
                        อาศัยอยู่ร่วมบ้าน  
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="contact_nature" id="contact_nature_3" value="2">
                        ศึกษา/ทำงานร่วมกัน  
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>อื่นๆ</label>
                    <input type="text" class="form-control" name="other_contact_nature" placeholder="อื่นๆ" value="{{isset($data[0]->other_contact_nature) ? $data[0]->other_contact_nature :null}}">
                  </div>
                  
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยมีประวัติแพ้ยา</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="drug_allergy" id="drug_allergy_1" value="0"  @if($data[0]->drug_allergy == 0) checked @else @endif>
                        ไม่เคย     
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="drug_allergy" id="drug_allergy_2"  value="1" @if($data[0]->drug_allergy == 1) checked @else @endif>
                        เคย 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>ระบุชื่อยา</label>
                    <input type="text" class="form-control" name="drug_allergy_name" placeholder="ระบุชื่อยา" value="{{isset($data[0]->drug_allergy_name) ? $data[0]->drug_allergy_name :null}}">
                  </div>
                 
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยมีประวัติแพ้วัคซีน</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergic_vaccines" id="allergic_vaccines_1" value="0"  @if($data[0]->allergic_vaccines == 0) checked @else @endif>
                        ไม่เคย     
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergic_vaccines" id="allergic_vaccines_2"  value="1" @if($data[0]->allergic_vaccines == 1) checked @else @endif>
                        เคย
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>ระบุชื่อวัคซีน</label>
                    <input type="text" class="form-control" name="allergic_vaccines_name" placeholder="ระบุชื่อวัคซีน" value="{{isset($data[0]->allergic_vaccines_name) ? $data[0]->allergic_vaccines_name :null}}">
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยมีประวัติแพ้อาหาร และอื่นๆ  </li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergy" id="first_CBC_1" value="0"  @if($data[0]->allergy == 0) checked @else @endif>
                        ไม่เคย   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergy" id="first_CBC_2"  value="1" @if($data[0]->allergy == 1) checked @else @endif>
                        เคย 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-2">
                    <label>ระบุชนิดอาหารหรือสิ่งที่แพ้</label>
                    <input type="text" class="form-control" name="detail_allergy" placeholder="ระบุชนิดอาหารหรือสิ่งที่แพ้" value="{{isset($data[0]->detail_allergy) ? $data[0]->detail_allergy :null}}">
                  </div>
                  
                </div>
              </div>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-footer">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <a href="{{ route('lstaesi1') }}" class="btn btn-block btn-danger">ย้อนกลับ</a>
              </div>
              <div class="col-md-4">
                {{-- <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-block btn-success"></input> --}}
              </div>
              {{-- <div class="col-md-3">
              </div> --}}
            </div>
        </div>
        </div>
    </div>
  </div> 
</div>
  <!-- /.box -->
  </form>
  </div>
  <!-- /.row -->
</section>
</body>
</html>