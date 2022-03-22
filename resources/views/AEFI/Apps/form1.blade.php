@extends('AEFI.layout.template')
{{-- <style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 200%;
    border: 1px solid #ddd;
  }

  th,
  td {
    width: 500px;
    font-size: 12px;
    text-align: left;
    padding: 8px;
  }

</style> --}}

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
$arr_provinces = load_provinces();
 ?>
  <h1>
    แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
    <small>AEFI</small>
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
  <form role="form" action="{{ route('insertform1') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
      <!--หัวข้อที่5 -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">(1)ข้อมูลผู้ป่วย</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->

          @php
          $rannumlet = substr(sha1(mt_rand()),17,6);
          $randate = date('ymd');
          $id_case = $randate.$rannumlet;
          // echo $id_case;
          @endphp
          <div class="box-body">
            {{-- คอรั่มภายใน3.2 --}}
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <!-- checkbox3.2.1 -->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>
                        ประเมินสาเหตุเบื้องต้น
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                  {{-- input content --}}
                  <div class="box-body">

                    <!-- เลขที่ผู้ป่วย -->
                    <input type="hidden" id="id_case" name="id_case" value="<?php echo $id_case; ?>" class="form-control">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 control-label">
                          <label>เลขที่ผู้ป่วย:</label>
                        </div>
                        <input type="hidden" id="user_username" name="user_username" value="{{auth()->user()->username}}" class="form-control" >
                        <input type="hidden" id="user_hospcode" name="user_hospcode" value="{{auth()->user()->hospcode}}" class="form-control" >
                        <input type="hidden" id="user_provcode" name="user_provcode" value="{{auth()->user()->prov_code}}" class="form-control" >
                        <input type="hidden" id="user_region" name="user_region" value="{{auth()->user()->region}}" class="form-control" >
                        <div class="col-lg-4">
                          <input type="text" id="hn" name="hn" class="form-control" placeholder="HN">
                        </div>
                        <div class="col-lg-4">
                          <input type="text" id="an" name="an" class="form-control" placeholder="AN">
                        </div>
                      </div>
                    </div>

                    <!-- เลขบัตรประชาชน -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="control-label">
                            <label><font style="color:red;">*</font>เลขประจำตัวบัตรประชาชน:</label>
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <input type="text" id="id_number" name="id_number" class="form-control" data-inputmask='"mask": "9999999999999"' data-mask required>
                        </div>
                      </div>
                    </div>
                    <!-- /.form group -->

                    <!-- คำนำหน้าชื่อ -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label>
                            <font style="color:red;">*</font> คำนำหน้า:
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <select type="text" class="form-control" id="title_name" name="title_name" required onchange="showDiv1('hidden_div1', this)">

                            <option value="">กรุณาเลือก</option>
                            {{-- < ?php foreach ($mas_title_th as $key_title => $value_title) : ?> --}}
                            {{-- } --}}
                            <option value="1">นาย</option>
                            <option value="2">นางสาว</option>
                            <option value="3">นาง</option>
                            <option value="4">ด.ช.</option>
                            <option value="5">ด.ญ.</option>
                            <option value="99">อื่นๆ</option>
                            {{-- < ?php endforeach; ?> --}}
                          </select>
                          {{-- <input type="text" id="title_name" name="title_name" class="form-control" placeholder="คำนำหน้าชื่อ"> --}}
                          <!-- /.p_id tname  -->
                        </div>
                        <div class="col-lg-4" id="hidden_div1" style="display: none;">
                          <input type="text" id="title_name_other" name="title_name_other" class="form-control" placeholder="คำนำหน้าชื่ออื่นๆ">
                          {{-- <input type="text" id="title_name" name="title_name" class="form-control" placeholder="คำนำหน้าชื่อ"> --}}
                          <!-- /.p_id tname  -->
                        </div>
                      </div>
                    </div>
                    <!-- /.form group -->
                    <!-- ชื่อ -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label>ชื่อ-สกุล:</label>
                        </div>
                        <div class="col-lg-4">
                          <input type="text" id="first_name" name="first_name" class="form-control" placeholder="ชื่อ">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-4">
                          <input type="text" id="sur_name" name="sur_name" class="form-control" placeholder="นามสกุล">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                      </div>
                    </div>
                    <!-- เพศ -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="control-label">
                            <label>เพศ:</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" id="optionsRadios" value="">
                              ไม่ระบุ
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" id="optionsRadios1" value="1">
                              ชาย
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" id="optionsRadios2" value="2">
                              หญิง
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- วันเดือนปีเกิด -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <label>
                            			วันเดือนปีเกิด:
                          </label>
                        </div>
                        <div class="col-lg-9">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="birthdate" class="form-control pull-right" id="datepicker_bdate"readonly>
                            {{-- <input type="text" class="form-control" id="birthdate" name="birthday" data-error="Please enter your Birth Date" autocomplete="off"  readonly> --}}
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- /.form group -->
                    <div class="form-group">
                      <!-- ชื่อ -->
                      <div class="row">
                        <div class="col-lg-3">
                          <label>อายุขณะป่วย:</label>
                        </div>
                        <div class="col-lg-3">
                          {{-- <div id="numnights">
                            <span >
                            <h4 class="text-primary"><br><span id="yearofbirth"></span> ปี <span id="monthofbirth"></span> เดือน <span id="dayofbirth"></span> วัน</h4>
                          </div> --}}
                        {{-- <span id="y_age"> --}}
                        <textarea class="form-control" name="age_while_sick_year" id="yallage" placeholder="ปี" rows="1"></textarea>
                          {{-- <div class="checked" id="age">tests</div> --}}
                          {{-- <input type="text" id="y_age" name="age_while_sick_year" class="form-control" placeholder="ปี"> --}}
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                          <textarea class="form-control" name="age_while_sick_month" id="mallage" placeholder="เดือน" rows="1"></textarea>
                          {{-- <input type="text" id="age_while_sick_month" name="age_while_sick_month" class="form-control" placeholder="เดือน"> --}}
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                          <textarea class="form-control" name="age_while_sick_day" id="dallage" placeholder="วัน" rows="1"></textarea>
                          {{-- <input type="text" id="age_while_sick_day" name="age_while_sick_day" class="form-control" placeholder="วัน"> --}}
                          <!-- /input-group -->
                        </div>
                      </div>
                    </div>
 <!-- กลุ่มอายุ -->
                    {{-- <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="control-label">
                            <label>กลุ่มอายุ:</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="group_age" value="1" >
                              < 1 ปี
                            </label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="radio">
                          <label>
                            <input type="radio" name="group_age" value="2" >
                            1-4 ปี
                          </label>
                        </div>
                      </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="group_age" value="3" >
                              5-17 ปี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="group_age" id="G_age1" value="4">
                              18-20 ปี
                             </label> 
                            </div> 
                          </div>
                          <div class="col-lg-3">
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                                <label>
                                  <input type="radio" name="group_age" id="G_age2" value="5">
                                  21-40 ปี
                                </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="group_age" id="G_age3" value="6">
                                41-60 ปี
                              </label>
                            </div>
                          </div>                     
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="group_age" id="G_age4" value="7">
                                61-80 ปี
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="group_age" id="G_age5" value="8">
                                >80 ปี
                              </label>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                      <!-- เชื้อชาติ -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="control-label">
                              <label>เชื้อชาติ:</label>
                            </div>
                          </div>
                          <div class="col-lg-2" hidden>
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" id="optionsRadios" value="" >
                                ไม่ระบุ
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="1">
                                ไทย
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="2">
                                พม่า
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="3">
                                ลาว
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-3">

                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="4">
                                อื่นๆ
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div id="other_nationality_d" style="display: none">
                              <input type="text" id="other_nationality_text" name="other_nationality" class="form-control" placeholder="ระบเชื้อชาติ" hidden="true">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- ประเภทผู้ป่วย -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="control-label">
                              <label>ประเภทผู้ป่วย:</label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="type_of_patient" id="type_of_patient1" value="1">
                                ผู้ป่วยใน
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="type_of_patient" id="type_of_patient2" value="2">
                                ผู้ป่วยนอก
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="type_of_patient" id="type_of_patient2" value="3">
                                สังเกตุอาการที่ห้องฉุกเฉิน
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- อาชีพ -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">
                            <label>
                               <font style="color:red;">*</font>อาชีพ:
                            </label>
                          </div>
                          <div class="col-lg-6">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                {{-- <i class="fa fa-calendar"></i> --}}
                              </div>
                              <select id="js-example-basic-single2" name="career_code" class="js-example-basic-single2 form-control" data-dropdown-css-class="select2-danger">
                              </select>
                              {{-- <input type="text" name="career" class="form-control" id="career" placeholder="อาชีพ" required> --}}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>

              </div>
              <!-- /.box -->
              {{-- คอรั่มภายใน3.1 --}}
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <!-- checkbox1.2.1 -->
                    <!-- ประวัติประวัติการแพ้วัคซีน -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="control-label">
                            <label>ประวัติการแพ้วัคซีนก่อนหน้า :</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="">
                              ไม่ทราบ
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="1">
                              ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="2">
                              มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_vaccination_history" style="display: none">
                            <label>วัคซีนที่แพ้ :</label>
                            <select id="other_vaccination_history_text" name="other_vaccination_history" class="form-control select2" style="width: 100%;">
                              <option value="">กรุณาระบุชื่อวัคซีน</option>
                              @foreach ($vac_list as $row)
                              <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                              @endforeach
                            </select>
                            <label></br>ยาที่แพ้ :</label>
                            <input type="text" name="other_drug_history" id="other_secymptoms_after_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- อาการหลังได้รับวัคซีน -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="control-label">
                            <label>อาการหลังได้รับวัคซีน :</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="">
                              ไม่ทราบ
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="1">
                              ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="2">
                              มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_patient_develop_symptoms_after_previous_vaccination" style="display: none">
                            <label>อาการ :</label>
                            <select id="other_patient_develop_symptoms_after_previous_vaccination_text" name="other_patient_develop_symptoms_after_previous_vaccination" class="form-control select2" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="">กรุณาเลือก</option>
                              <?php
	  										  foreach ($arr_patient_develop_symptoms_after_previous_vaccination as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                              <?php } ?>
                            </select></br>
                            <label></br>อาการอื่นๆ :</label>
                            <input type="text" name="other_text_patient_develop_symptoms_after_previous_vaccination" id="other_patient_develop_symptoms_after_previous_vaccination" class="form-control" placeholder="ระบุ">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- โรคประจำตัว/การเจ็บป่วยในอดีต -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="control-label">
                            <label>โรคประจำตัว/การเจ็บป่วยในอดีต :</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="underlying_disease" value="">
                              ไม่ทราบ
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="underlying_disease" value="1">
                              ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="underlying_disease" value="2">
                              มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_underlying_disease" style="display: none">
                            <select id="other_underlying_disease_text" name="other_underlying_disease" class="form-control select2" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="">กรุณาเลือก</option>
                              <?php
												  foreach ($arr_underlying_disease as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                              <?php } ?>
                            </select>
                            <label></br>โรคประจำตัวอื่นๆ :</label>
                            <input type="text" name="other_text_underlying_disease" id="other_text_underlying_disease" class="form-control" placeholder="ระบุ">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- ประวัติการแพ้วัคซีน/ยา -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="control-label">
                            <label>ประวัติการใช้ยาในรอบ1เดือน :</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="">
                              ไม่ทราบ
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="1">
                              ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="2">
                              มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_history_of_drug_use_within_1_month_vaccination" style="display: none">
                            <input type="text" name="other_history_of_drug_use_within_1_month_vaccination_text" id="other_history_of_drug_use_within_1_month_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ประวัติการป่วยcovid-->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="control-label">
                          <label>เคยป่วยเป็นโควิดหรือไม่ :</label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="radio">
                          <label>
                            <input type="radio" name="history_of_covid" value="">
                            ไม่ทราบ
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="radio">
                          <label>
                            <input type="radio" name="history_of_covid" value="1">
                            ไม่เคย
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="radio">
                          <label>
                            <input type="radio" name="history_of_covid" value="2">
                            เคย
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div id="other_history_of_covid" style="display: none">
                          <input type="text" name="other_history_of_covid_text" id="other_history_of_covid_text" class="form-control" placeholder="ระบุ" hidden="true">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <!-- ประวัติการป่วยcovid-->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="control-label">
                          <label>ตั้งครรภ์อยู่หรือไม่ :</label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="radio">
                          <label>
                            <input type="radio" name="pregnant" value="">
                            ไม่ทราบ
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="radio">
                          <label>
                            <input type="radio" name="pregnant" value="1">
                            ไม่
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="radio">
                          <label>
                            <input type="radio" name="pregnant" value="2">
                            ใช่
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div id="other_pregnant" style="display: none">
                          <input type="text" name="num_of_pregnant_text" id="num_of_pregnant_text" class="form-control" placeholder="ครรภ์ที่เท่าไหร่" hidden="true">
                          <input type="text" name="other_pregnant_text" id="other_pregnant_text" class="form-control" placeholder="ระบุอายุครรภ์" hidden="true">
                          <input type="text" name="given_pregnant_text" id="given_pregnant_text" class="form-control" placeholder="คลอดบุตรมาแล้วกี่คน" hidden="true">
                          <input type="text" name="miscarriages_pregnant_text" id="miscarriages_pregnant_text" class="form-control" placeholder="เคยแท้งมาแล้วกี่คน" hidden="true">
                        </div>
                      </div>
                      {{-- <div class="col-lg-6">
                        <div id="other_pregnant" style="display: none">
                          <input type="text" name="other_pregnant_text" id="other_pregnant_text" class="form-control" placeholder="ระบุอายุครรภ์" hidden="true">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div id="other_pregnant" style="display: none">
                          <input type="text" name="given_pregnant_text" id="given_pregnant_text" class="form-control" placeholder="คลอดบุตรมาแล้วกี่คน" hidden="true">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div id="other_pregnant" style="display: none">
                          <input type="text" name="miscarriages_pregnant_text" id="miscarriages_pregnant_text" class="form-control" placeholder="เคยแท้งมาแล้วกี่คน" hidden="true">
                        </div>
                      </div> --}}
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body">
                    {{-- input content --}}
                    <div class="form-group">
                      <div class="col-lg-12">
                        <label>ประวัติทางการแพทย์</label>
                        <textarea class="form-control" name="other_medical_history" rows="3" placeholder="..."></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->

                </div>
                <!-- /.box -->
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <!-- ที่อยู่ขณะเรื่มป่วย -->
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-2">
                    <label>
                      <font style="color:red;">*</font> ที่อยู่ขณะเริ่มป่วย :
                    </label>
                  </div>
                  <div class="col-lg-4">
                    <input type="text" id="house_number" name="house_number" class="form-control" placeholder="บ้านเลขที่" required>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-4">
                    <input type="text" id="village_no" name="village_no" class="form-control" placeholder="หมู่ที่">
                    <!-- /.p_id tname  -->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-2">
                    <label></label>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control provinces" name="province" id="provinces" required>
                      <option value="">=== จังหวัด ===</option>
                      @foreach ($list as $row)
                      <option value="{{$row->province_code}}">{{$row->province_name}}</option>
                      @endforeach
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control amphures" name="district">
                      <option value="">=== อำเภอ ===</option>
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control district" name="subdistrict">
                      <option value="">=== ตำบล ===</option>
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-2">
                    <label>โทรศัพท์ :</label>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="โทรศัพท์" data-inputmask='"mask": "99-9999-9999"' data-mask>
                    <!-- /.p_id tname  -->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-2">
                    <label>ชื่อผู้ปกครอง :</label>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" id="parent_name" name="parent_name" class="form-control" placeholder="ชื่อ">
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <input type="text" id="parent_sur_name" name="parent_sur_name" class="form-control" placeholder="นามสกุล">
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <label>( กรณีผู้ป่วยอายุ < 15 ปี )</label> </div> </div> </div> <div class="form-group">
                        <div class="row">
                          <div class="col-lg-2">
                            <label>โทรศัพท์ผู้ปกครอง :</label>
                          </div>
                          <div class="col-lg-3">
                            <input type="text" id="parent_phone_number" name="parent_phone_number" class="form-control" placeholder="โทรศัพท์ผู้ปกครอง" data-inputmask='"mask": "99-9999-9999"' data-mask>
                            <!-- /.p_id tname  -->
                          </div>
                        </div>
                  </div>
                </div>

              </div>
              <!-- /.box -->
            </div>
            <!--หัวข้อที่2 -->
            {{-- {{$vac_list}} --}}
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">(2) ข้อมูลวัคซีน / สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข)</h3>
                </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-lg-4">
                    <label>สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข) :</label>
                    <select id="js-example-basic-single" name="hospcode_get_vac" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger">
                    </select>
                  </div>
                </div>
              </div>
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
                        <th>ชื่อผู้ผลิต</th>
                        <th>ชื่อผู้ผลิตอื่นๆ</th>
                        <th>
                          เลขที่ผลิต
                        </th>
                        <th>
               วันหมดอายุ
                        </th>
                        {{-- <th>ชื่อตัวทำละลาย</th> --}}
                        <th>
                          เลขที่ผลิตตัวทำละลาย
                        </th>
                        <th>
                        วันหมดอายุตัวทำละลาย
                        </th>
                        {{-- <th>
                           ว/ด/ปที่ผสม
                        </th>
                        <th>
                           เวลาที่ผสม
                        </th> --}}
                        <th>#</th>
                        {{-- <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="data-contact-person">
                        <td>
                          <select type="text" id="name_of_vaccine" name="name_of_vaccine[]" class="form-control" required>
                            <option value="">กรุณาระบุชื่อวัคซีน</option>
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
<select name="dose[]" id="dose1" class="form-control">
  <option value="1">เข็มที่ 1</option>
  <option value="2">เข็มที่ 2</option>
  <option value="3">เข็มที่ 3</option>
<option value="4">เข็มที่ 4</option>
  <option value="5">เข็มที่ 5</option>
<option value="6">เข็มที่ 6</option>

</select>             
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination[]" id="date_of_vaccination1" class="form-control  datepicker readonly" data-date-format="yyyy-mm-dd" required>
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination1" name="time_of_vaccination[]" class="form-control" required>
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
                          <input type="text" id="datepicker_expiry_date1" name="expiry_date[]" class="form-control  readonly" data-date-format="yyyy-mm-dd">
                        </td>
                        {{-- <td>
                          <input type="text" id="name_of_diluent1" name="name_of_diluent[]" class="form-control">
                        </td> --}}
                        <td>
                          <input type="text" id="lot_number_diluent1" name="lot_number_diluent[]" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent[]" class="form-control  readonly" data-date-format="yyyy-mm-dd">
                        </td>
                        {{-- <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution[]" class="form-control" data-date-format="yyyy-mm-dd"></td> --}}
                        {{-- <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]" class="form-control"></td> --}}
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                        <td>
                          <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box -->
              </div>
            </div>
            <!--หัวข้อที่3 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">(3) อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคและวินิจฉัย</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <label>
                          กลุ่มอาการ
                        </label>
                        <hr>
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="rash" value="0027">
                              Rash(ผื่น)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="erythema" value="0028">
                              Erythema(ผื่นแดง)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="urticaria" value="0044">
                              Urticaria
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="itching" value="0026">
                              Itching(อาการคัน)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="edema" value="0003A">
                              Edema
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="angioedema" value="0003">
                              Angioedema(บวมที่เยื่อบุ)
                            </label>
                          </div>
                        </div>
                        {{-- input content --}}
                        <!-- checkbox3.1.2  -->
                        <div class="form-group">
                          <div class="col-md-6" hidden>
                            <label>
                              <input type="checkbox" name="fainting" value="1">
                              Fainting
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="hyperventilation" value="0517">
                              Hyperventilation
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="syncope" value="0223">
                              Syncope(เป็นลม)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="headche" value="1">
                              Headche
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="dizziness" value="0101">
                              Dizziness(เวียนศีรษะ)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="fatigue" value="0724">
                              Fatigue(อ่อนเพลีย)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="malaise" value="0728">
                              Malaise(ไม่สบายตัว)
                            </label>
                          </div>
                        </div>
                        <!-- checkbox3.1.3  -->
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="dyspepsia" value="0279">
                              Dyspepsia
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="diarrhea" value="1">
                              Diarrhea(ถ่ายเหลว)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="nausea" value="0308">
                              Nausea(คลื่นไส้)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="vomiting" value="0228">
                              Vomiting(อาเจียน)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="abdominal_pain" value="0268">
                              Abdominal pain(ปวดท้อง)
                            </label>
                          </div>
                        </div>
                        <!-- checkbox3.1.4  -->
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="arthalgia" value="1">
                              Arthalgia(ปวดข้อ)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="myalgia" value="0072">
                              Myalgia(ปวดเมื่อยกล้ามเนื้อ)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="fever38c" value="0725">
                              Fever >= 38 C (ไข้)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="swelling_at_the_injection" value="1">
                              บวมบริเวณที่ฉีดนานเกิน3วัน
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="swelling_beyond_nearest_joint" value="1">
                              บวมลามไปถึงข้อที่ใกล้ที่สุด
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="lymphadenopathy" value="0577">
                              Lymphadenopathy
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="lymphadenitis" value="0577D">
                              Lymphadenitis
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="sterile_abscess" value="0051">
                              Sterile abscess
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="bacterial_abscess" value="1">
                              Bacterial abscess
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="febrile_convulsion" value="1">
                              Febrile convulsion(ชักจากไข้)
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input type="checkbox" name="afebrile_convulsion" value="1">
                              Afebrile convulsion(ชักจากเหตุอื่น)
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="flaccid_paralysis" value="0139">
                              Flaccid paralysis
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="checkbox" name="spastic_paralysis" value="0775">
                              Spastic paralysis
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input name="chest_pain" type="checkbox" value="1">
                              Chest pain
                            </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input name="sepsis" type="checkbox" value="0744">
                              Sepsis
                            </label>
                          </div>
                         
                          <div class="col-md-2">
                            <label>
                              <input name="sudden_cardiac_arrest" type="checkbox" value="1">
                              Sudden cardiac arrest
                            </label>
                          </div>
                          
                        </div>
                      </div>

                    </div>
                    <!-- /.box -->
                  </div>
                  
                  {{-- คอรั่มภายใน3.3 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <!-- /.box-header -->
                      <!-- form start -->
                      <div class="box-header with-border">
                        <label>
                          กลุ่มโรคร้ายแรง 
                        </label>
                        <hr>
                      <div class="box-body">
                        
                        {{-- input content --}}
                        <!-- checkbox3.3.1  -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                               Neuro
                            </label>
                          </div>
                          
                          <div class="col-md-3">
                            <label>
                              <input name="ischemic_stroke" type="checkbox" value="1">
                               stroke
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="hemorrhagic_stroke" type="checkbox" value="1">
                            Hemorrhagic stroke
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="bells_palsy" type="checkbox" value="1">
                              Bell's palsy
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="gbs" type="checkbox" value="1">
                              Guillain-Barré syndrome (GBS)
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="transverse myelitis" type="checkbox" value="1">
                              Transverse myelitis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="adem" type="checkbox" value="1">
                              Acute disseminated encephalomyelitis (ADEM)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <hr>
                          <label>
                             Cardio
                          </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="myocarditis" type="checkbox" value="1">
                              Myocarditis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="pericarditis" type="checkbox" value="1">
                              Pericarditis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="acute_myocardial" type="checkbox" value="1">
                              Acute Myocardial infarction
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="heart_failure" type="checkbox" value="1">
                              Heart failure
                            </label>
                          </div>
                  
                          <div class="col-md-3">
                            <label>
                              <input name="persistent_inconsolable_crying" type="checkbox" value="1">
                              Persistent inconsolable crying
                            </label>
                          </div>
                          
                          <div class="col-md-3">
                            <label>
                              <input name="osteomyelitis" type="checkbox" value="1184">
                              Osteitis/Osteomyelitis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="toxic_shock_syndrome" type="checkbox" value="1">
                              Toxic shock syndrome
                            </label>
                          </div>
                          
                          
                          <div class="col-md-3">
                            <label>
                              <input name="hypertension" type="checkbox" value="1">
                              Hypertension
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="hypertensive_urgency" type="checkbox" value="1">
                               Hypertensive urgency
                            </label>
                          </div>
                          <div class="col-md-12">
                            <hr>
                          <label>
                             Hemotology
                          </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="thrombocytopenia" type="checkbox" value="0594">
                              Thrombocytopenia(เกล็ดเลือดต่ำ)
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="deep_vein_thrombosis" type="checkbox" value="1">
                              Deep vein thrombosis                            
			                      </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="pulmonary_embolism" type="checkbox" value="1">
                              Pulmonary embolism
                            </label>
                          </div>
                          <div class="col-md-12">
                            <hr>
                          <label>
                             หญิงตั้งครรภ์
                          </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="dfiu" type="checkbox" value="1">
                              DFIU (Dead fetus in utero)
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="abortion" type="checkbox" value="1">
                              Abortion
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="abruptio_placenta" type="checkbox" value="1">
                              Abruptio placenta
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="other_pregnant_symptoms" type="checkbox" value="9999">
                              อื่นๆ
                            </label>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <div id="other_symptoms_pregnant" style="display: none">
                                <input type="text" id="other_pregnant_symptoms_later_immunized_text" name="other_pregnant_symptoms_later_immunized" class="form-control" placeholder="" hidden="true">
                              </div>
                              {{-- <div id="other_symptoms_later_immunized_t" style="display: none">
                                <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">
                              </div> --}}
                            </div>
                          </div>
                          <div class="col-md-12">
                            <hr>
                          <label>
                             Other
                          </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="anaphylaxis" type="checkbox" value="2237">
                              Anaphylaxis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="ards" type="checkbox" value="1">
                               Acute respiratory distress syndrome (ARDS)
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="hhe" type="checkbox" value="1704">
                              Hypotonic Hyporesponsive episode (HHE)
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="covid_19" type="checkbox" value="1">
                              Covid-19
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input type="checkbox" name="encephalopathy" value="0105">
                              Encephalopathy/Encephalitis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input type="checkbox" name="meningitis" value="0105">
                              Meningitis
                            </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input name="symptoms_later_immunized" type="checkbox" value="9999">
                              อื่นๆ
                            </label>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <div id="other_symptoms_later_immunized" style="display: none">
                                <input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" class="form-control" placeholder="" hidden="true">
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
                </div>
                  {{-- คอรั่มภายใน3.4 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label><font style="color:red;">*</font> ว/ด/ป ที่เกิดอาการ :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control  readonly pull-right" id="datepicker_stdiag" name="date_of_symptoms" data-date-format="yyyy-mm-dd" required>
                            </div>
                          </div>
                        </div>
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="col-lg-6">
                              <label><font style="color:red;">*</font> เวลาที่เกิดอาการ :</label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="time_of_symptoms" required>

                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label><font style="color:red;">*</font> ว/ด/ป ที่รับรักษา :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control readonly pull-right" id="datepicker_hdate" name="date_of_treatment" data-date-format="yyyy-mm-dd" required>
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
                              <input type="text" class="form-control readonly pull-right" id="datepicker_sell" name="time_of_treatment" data-date-format="yyyy-mm-dd">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->

                      <div class="box-body">
                        {{-- input content --}}
                        <!-- textarea -->
                        


                    </div>
                    <!-- /.box -->
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label>
                        <font style="color:red;">*</font> ความร้ายแรงของอาการ
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-2" hidden>
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms" value="" >
                            ไม่ระบุ
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms" value="1" >
                            ไม่ร้ายแรง
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms" value="2">
                            ร้ายแรง
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="other_seriousness_of_the_symptoms_bk">
                    <div class="form-group">
                      <div class="col-lg-12">
                        <label>ระบุ :</label>
                      </div>
                    </div>
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="1">
                          เสียชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="2">
                          อันตรายถึงชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="3">
                          พิการ/ไร้ความสามารถ
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="4">
                          รับไว้รักษาในโรงพยาบาล
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label><div class="form-group">
                          <div class="form-group">
                            <div class="col-lg-12">
                              <label>การวินิจฉัยหลักของแพทย์ :</label>
                              <select id="js-example-basic-single3" name="main_diagnosis" class="js-example-basic-single3 form-control" data-dropdown-css-class="select2-danger" required>
                              </select>
                              {{-- <input type="text" id="main_diagnosis" name="main_diagnosis" class="form-control" placeholder=""> --}}
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <label>การวินิจฉัยรองของแพทย์ :</label>
                              <select id="js-example-basic-single3" name="minor_diagnosis" class="js-example-basic-single3 form-control" data-dropdown-css-class="select2-danger" required>
                              </select>
                              {{-- <input type="text" id="minor_diagnosis" name="minor_diagnosis" class="form-control" placeholder=""> --}}
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <label>รายละเอียดอาการและการตรวจสอบ</label>
                            <textarea class="form-control" rows="5" name="Symptoms_details"></textarea>
                          </div>
                        </div>
                        {{-- <div class="form-group">
                          <div class="col-lg-6">
                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis" name="diagnosis" class="form-control" placeholder="">
                          </div>
                        </div> --}}
                      </div>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="5">
                          ความผิดปกติแต่กำเนิด
                        </label>
                      </div>
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="6">
                          อื่นๆที่มีความสำคัญทางการแพทย์
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                          <label></label><input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms" class="form-control" placeholder="อื่นๆ">
                        </div>
                      </div>
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
                    <div class="col-lg-12">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-2" hidden>
                          <label>
                            <input type="radio" name="patient_status" value="">
                            ไม่ระบุ
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="patient_status" value="1" >
                            หาย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="patient_status" value="2">
                            หายโดยมีร่องรอย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="patient_status" value="3">
                            อาการดีขึ้นแต่ยังไม่หาย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="patient_status" value="4">
                            ไม่หาย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="patient_status" value="5">
                            ไม่ทราบ
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="patient_status" value="6">
                            เสียชีวิต
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group date">
                            <div id="other_patian_sta" style="display: none">
                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead" hidden="true" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
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
                    <div class="col-lg-12">
                      <div class="col-md-2" hidden>
                        <label>
                          <input type="radio" name="funeral" value="">
                          ไม่ระบุ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" name="funeral" value="1" >
                          ไม่มี
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" name="funeral" value="2">
                          ไม่ทราบ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" name="funeral" value="3">
                          มี
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="other_address_funeral" style="display: none">
                          <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text" name="other_address_funeral" class="form-control" placeholder="ระบุสถานที่ทำการ">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            <!-- /.box -->
            <!-- หัวข้อที่4 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <!-- form start -->

                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-3">
                        <h3 class="box-title">(4) การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน</h3>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate1" value="1" >
                            ไม่มี
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate2" value="2">
                            มี
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            วันที่สอบสวน
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="">
                          <label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box-header -->

              </div>
              <!-- /.box -->
            </div>
            <!--หัวข้อที่5 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">(5) ข้อมูลผู้รายงาน สถานที่เกิดเหตุการณ์ และหน่วยงานที่รายงาน</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-6">
                              <label>ชื่อผู้วินิจฉัยอาการ :</label><input type="text" id="symptom_name" name="symptom_name" class="form-control" placeholder="ชื่อ นามสกุล">
                            </div>
                          </div>
                        </div>
                        <!-- ประวัติการแพ้วัคซีน/ยา -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="control-label">
                                <label>ตำแหน่ง :</label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="1" >
                                  แพทย์
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="2">
                                  เภสัชกร
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="3">
                                  พยาบาล
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="4">
                                  อื่นๆระบุ
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div id="other_symptom_position" style="display: none">
                                <input type="text" id="other_symptom_position_text" name="other_symptom_position" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-6">
                              <label>ชื่อผู้รายงาน :</label><input type="text" id="reporter_name" name="reporter_name" class="form-control" placeholder="ชื่อ นามสกุล">
                            </div>
                          </div>
                        </div>
                        <!-- ประวัติการแพ้วัคซีน/ยา -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="control-label">
                                <label>ตำแหน่ง :</label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="1" >
                                  งานระบาดวิทยา
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="2">
                                  เภสัชกร
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="3" />
                                  งานEIP
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="4" />
                                  อื่นๆระบุ
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div id="other_reporter_position" style="display: none">
                                <input type="text" id="other_reporter_position_text" name="other_reporter_position" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่พบเหตุการณ์ :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker_found_event" name="date_found_event" data-date-format="yyyy-mm-dd" readonly>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>โรงพยาบาลที่รับรักษา :</label>
                              <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                              </select>
                              {{-- <input type="text" id="event_location" name="event_location" class="form-control" placeholder="สถานที่เกิดเหตุการณ์"> --}}
                            </div>                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;" required>
					                    <option class="badge filter badge-info" data-color="info" value=""></option>
                                <?php
												        foreach ($arr_provinces as $k=>$v) { ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>หน่วยที่รายงาน :</label>
                              <select id="js-example-basic-single" name="hospcode_report" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_reported" name="province_reported" class="form-control" style="width: 100%;" required>
				<option class="badge filter badge-info" data-color="info" value=""></option>
                                <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <label>โทร :</label><input type="text" id="tel_reported" name="tel_reported" class="form-control" placeholder="โทร" data-inputmask='"mask": "99-9999-9999"' data-mask>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>Email :</label><input type="text" id="email_reported" name="email_reported" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่ส่งรายงาน :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>

       <input type="text" class="form-control readonly pull-right"  name="datepicker_send_reported" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d") ; ?>" readonly>

                                {{-- <input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported" data-date-format="yyyy-mm-dd" readonly> --}}                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่รับรายงาน :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker_resiver" name="datepicker_resiver" data-date-format="yyyy-mm-dd" readonly>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <label>ความคิดเห็นเพิ่มเติม</label>
                              <textarea class="form-control" rows="3" id="more_reviews" name="more_reviews"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  {{-- คอรั่มภายใน3.2 --}}
                  <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <!-- checkbox3.2.1 -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              ประเมินสาเหตุเบื้องต้น
                            </label>
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
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment1" value="1">
                                ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์
                              </label>
                            </div>
                            <div class="col-md-2">
                              {{-- <label>
                                <input type="checkbox" name="assessment2" value="1">
                                ใช่
                              </label> --}}
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment2" value="1">
                                ใช่
                              </label>
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment3" value="1">
                                น่าจะใช่
                              </label>
                            </div>
                            <div class="col-md-2">
                              {{-- <label>
                                <input type="checkbox" name="assessment3" value="1">
                                น่าจะใช่
                              </label> --}}
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment4" value="1">
                                อาจจะใช่
                              </label>
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment5" value="1">
                                ไม่ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            </br>
                            {{-- <label>
                              <input type="checkbox" name="assessment7" value="1">
                              ความคลาดเคลื่อนด้านการให้บริการ
                            </label> --}}
                          </div>
                          <div class="form-group">
                            </br>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment6" value="1">
                                ความบกพร่องของวัคซีน
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment7" value="1">
                                ความคลาดเคลื่อนด้านการให้บริการ
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment8" value="1">
                                เหตุบังเอิญ/เห็นพ้อง
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment9" value="1">
                                ความกลัว/ความกังวล
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment10" value="1">
                                ไม่สามารถระบุได้
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <hr>
                              <label>
                                การตรวจทางห้องปฏิบัติการ
                              </label>
                              <textarea class="form-control" rows="3" id="lab_result" name="lab_result"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-3">
                    <a href="{{ route('lstf1') }}" class="btn btn-block btn-danger">ย้อนกลับ</a>
                  </div>
                  <div class="col-md-3">
                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-block btn-success"></input>
                  </div>
                  <div class="col-md-3">
                  </div>
                </div>

              </div>
              <!-- /.box -->
            </div>
  </form>
  </div>
  <!-- /.row -->
</section>
@include('AEFI.layout.footerScript')

<script type="text/javascript">
  $('.provinces').change(function() {
    if ($(this).val() != '') {
      var select = $(this).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('dropdown.fetch')}}",
        method: "POST",
        data: {
          select: select,
          _token: _token
        },
        success: function(result) {
          $('.amphures').html(result);
        }
      })
    }
  });
</script>
<script type="text/javascript">
	$(".readonly").keydown(function(e){
        e.preventDefault();
    });
  $('.amphures').change(function() {
    var selectD = $(this).val();
    if ($(this).val() != '') {
      console.log(selectD);
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('dropdown.fetchD')}}",
        method: "POST",
        data: {
          select: selectD,
          _token: _token
        },
        success: function(result) {
          $('.district').html(result);
        }
      })
    }
  });
  $(".divID1").attr("disabled", !this.checked);
  $("#checkBoxID1").click(function() {
    $(".divID1").attr("disabled", !this.checked);
  });
  $(".divID2").attr("disabled", !this.checked);
  $("#checkBoxID2").click(function() {
    $(".divID2").attr("disabled", !this.checked);
  });
  $(".divID3").attr("disabled", !this.checked);
  $("#checkBoxID3").click(function() {
    $(".divID3").attr("disabled", !this.checked);
  });
  $(".divID4").attr("disabled", !this.checked);
  $("#checkBoxID4").click(function() {
    $(".divID4").attr("disabled", !this.checked);
  });
  $(".divID5").attr("disabled", !this.checked);
  $("#checkBoxID5").click(function() {
    $(".divID5").attr("disabled", !this.checked);
  });
</script>
<script>
  function showDiv1(divId, element) {
    document.getElementById(divId).style.display = element.value == 99 ? 'block' : 'none';
  }

  // function showDiv2(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 8 ? 'block' : 'none';
  // }
  //
  // function showDiv3(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 999 ? 'block' : 'none';
  // }
  // function showDiv4(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 5 ? 'block' : 'none';
  // }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on("click", ".classAdd", function() { //
      var rowCount = $('.data-contact-person').length + 1;
      var contactdiv = '<tr class="data-contact-person">' +
        '<td>' +
        '<select type="text" id="name_of_vaccine1" name="name_of_vaccine[]' + rowCount + '" class="form-control" required>' +
        '<option value="">กรุณาระบุชื่อวัคซีน</option>' +
        @foreach($vac_list as $row)
      '<option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>' +
      @endforeach
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccine_volume1" name="vaccine_volume[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบุปริมาณที่ให้</option>' +
        <?php
      foreach($arr_vaccine_volume as $k => $v) {
        ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="route_of_vaccination1" name="route_of_vaccination[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบุวิธีที่ให้</option>' +
        <?php
      foreach($arr_route_of_vaccination as $k => $v) {
          ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccination_site1" name="vaccination_site[]' + rowCount + '" class="form-control">' +
        '  <option value="">กรุณาระบุวิธีตำแหน่ง</option>' +
        <?php
      foreach($arr_vaccination_site as $k => $v) {
          ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
'<select name="dose[]' + rowCount + '" id="dose1' + rowCount + '" class="form-control">'+
  '<option value="1">เข็มที่ 1</option>'+
  '<option value="2">เข็มที่ 2</option>'+
  '<option value="3">เข็มที่ 3</option>'+
'<option value="4">เข็มที่ 4</option>'+

'</select>'+
        '</td>' +
        '<td>' +
        '<input type="text" name="date_of_vaccination[]' + rowCount + '" id="date_of_vaccination1' + rowCount + '" class="form-control readonly datepicker" data-date-format="yyyy-mm-dd" required>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="time_of_vaccination1' + rowCount + '" name="time_of_vaccination[]' + rowCount + '" class="form-control" required>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="manufacturer1" name="manufacturer[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบชื่อผู้ผลิต</option>' +
        <?php
      foreach($arr_manufacturer as $k => $v) {
          ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="other_manufacturer1" name="other_manufacturer[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="lot_number1" name="lot_number[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date1' + rowCount + '" name="expiry_date[]' + rowCount + '" class="form-control readonly " data-date-format="yyyy-mm-dd">' +
        '</td>' +
        // '<td>' +
        // '<input type="text" id="name_of_diluent1" name="name_of_diluent[]' + rowCount + '" class="form-control">' +
        // '</td>' +
        '<td>' +
        '<input type="text" id="lot_number_diluent1" name="lot_number_diluent[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date_diluent1' + rowCount + '" name="expiry_date_diluent[]' + rowCount + '" class="form-control readonly " data-date-format="yyyy-mm-dd">' +
        '</td>' +
        // '<td><input type="text" id="date_of_reconstitution1' + rowCount + '" name="date_of_reconstitution[]' + rowCount + '" class="form-control datepicker" data-date-format="yyyy-mm-dd"></td>' +
        // '<td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]' + rowCount + '" class="form-control"></td>' +
        '<td><button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>' +
        '<button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-m">ลบข้อมูลวัคซีน</button></td>' +
        '</tr>';
      $('.maintable').append(contactdiv); // Adding these controls to Main table class
      $('#date_of_vaccination1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_reconstitution1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#datepicker_expiry_date1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#datepicker_expiry_date_diluent1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })

    });
    $(document).on("click", ".deleteContact", function() {
      $(this).closest("tr").remove(); // closest used to remove the respective 'tr' in which I have my controls
    });
    $(".js-example-basic-single").select2({
      allowClear: true,
      language: {
      inputTooShort: function (args) {
          return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
      },
      noResults: function () {
          return "ไม่พบข้อมูล";
      },
      searching: function () {
          return "กำลังค้นหาข้อมูล...";
      }
      },
      placeholder: "กรุณาพิมพ์ชื่อหน่วยงานที่ต้องการ เช่น. สคร.1,โรงพยาบาลเลิดสิน,สำนักงานสาธารณสุขจังหวัดสมุทรปราการ",
      minimumInputLength: 3,
      minimumResultsForSearch: 5,
      ajax: {
       url: "{{ route('list-division-json') }}",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
    });
 $(".js-example-basic-single2").select2({
      allowClear: true,
      language: {
      inputTooShort: function (args) {
          return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
      },
      noResults: function () {
          return "ไม่พบข้อมูล";
      },
      searching: function () {
          return "กำลังค้นหาข้อมูล...";
      }
      },
      placeholder: "กรุณาพิมพ์ชื่ออาชีพ",
      minimumInputLength: 3,
      minimumResultsForSearch: 5,
      ajax: {
       url: "{{ route('list-career-json') }}",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
    });
    $(".js-example-basic-single3").select2({
      allowClear: true,
      language: {
      inputTooShort: function (args) {
          return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
      },
      noResults: function () {
          return "ไม่พบข้อมูล";
      },
      searching: function () {
          return "กำลังค้นหาข้อมูล...";
      }
      },
      placeholder: "กรุณาพิมพ์ชื่อICD-10",
      minimumInputLength: 3,
      minimumResultsForSearch: 5,
      ajax: {
       url: "{{ route('list-icd10-json') }}",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
    });
$('#datepicker_bdate').on('change', function(){
  // let dayBirth=$('#datepicker_bdate').val();
  var dayBirth=$('#datepicker_bdate').val();
      var getdayBirth=dayBirth.split("-");
      var YB=getdayBirth[2]-543;
      var MB=getdayBirth[1];
      var DB=getdayBirth[0];

      var setdayBirth=moment(YB+"-"+MB+"-"+DB);
      var setNowDate=moment();
      var ageInMilliseconds = new Date(setNowDate - setdayBirth);
      var years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 );
      var months = 12 * (years % 1);
      var days = Math.floor(30 * (months % 1)+1);
      // alert(days);
      var yearData=setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม
      var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม
      var yearReal=setNowDate.diff(setdayBirth, 'years'); // ปีจริง
      var monthDiff=Math.floor((yearData-yearReal)*12); // เดือน
      var dayDiff=Math.floor(30 * (monthDiff % 1));; // เดือน
      // var dayDiff=Math.floor(30 * (monthDiff % 1));
      var str_year_month="( "+yearReal+" ปี "+ monthDiff+" เดือน "+ days+" วัน )"; // ต่อวันเดือนปี
      // $("#age").val(str_year_month);
  $('#y_age').val(yearReal);
  $('#allage').text(str_year_month);
  $('#yallage').text(yearReal);
  $('#mallage').text(monthDiff);
  $('#dallage').text(days);
  $("#numnights").hide().slideDown(1200);
// alert(year);
})

  });
</script>
@stop
