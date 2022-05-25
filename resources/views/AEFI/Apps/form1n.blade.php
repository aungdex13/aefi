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
  <form role="form" action="{{ route('insertform1n') }}" method="post">
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
                            <label>เลขประจำตัวบัตรประชาชน:</label>
                          </div>
                        </div>
                        <div class="col-lg-8">
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
                            <option value="1">นาย</option>
                            <option value="2">นางสาว</option>
                            <option value="3">นาง</option>
                            <option value="4">ด.ช.</option>
                            <option value="5">ด.ญ.</option>
                          </select>
                        </div>
                        <div class="col-lg-4" id="hidden_div1" style="display: none;">
                          <input type="text" id="title_name_other" name="title_name_other" class="form-control" placeholder="คำนำหน้าชื่ออื่นๆ">
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
                              <input type="radio" name="gender" id="optionsRadios" value="" >
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
                        <div class="col-lg-8">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="birthdate" class="form-control pull-right" id="datepicker_bdate"required readonly>
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
                        <div class="col-lg-2">
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
                              @endforeach                            </select>
                            <label></br>ยาที่แพ้ :</label>
                            <input type="text" name="other_drug_history" id="other_secymptoms_after_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- อาการหลังได้รับวัคซีน -->
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
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="" >
                              ไม่ระบุ
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
                              <option  value="">กรุณาเลือก</option>
                              <?php
	  										  foreach ($arr_patient_develop_symptoms_after_previous_vaccination as $k=>$v) { ?>
                              <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
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
                              <input type="radio" name="underlying_disease" value="" >
                              ไม่ระบุ
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
                              <option  value="">กรุณาเลือก</option>
                              <?php
												  foreach ($arr_underlying_disease as $k=>$v) { ?>
                              <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
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
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="" >
                              ไม่ระบุ
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
                            <input type="radio" name="history_of_covid" value="" >
                            ไม่ระบุ
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
                          <input type="text" name="other_history_of_covid_text" id="other_history_of_covid_text" class="form-control" placeholder="ระบุเวลาที่เป็น" hidden="true">
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
                          <input type="text" name="miscarriages_pregnant_text" id="miscarriages_pregnant_text" class="form-control" placeholder="เคยแท้งมาแล้วกี่คน" hidden="true">                        </div>
                      </div>
                               
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
                    <select id="js-example-basic-single" name="hospcode_get_vac" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" >
                    </select>
                  </div>
                </div>
              </div>
              </br>
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
                      <tr class="data-contact-person">
                       
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
                <!-- /.box -->
              </div>
            </div>
          {{-- หัวข้อที่ 3 --}}
            {{-- @include('AEFI.Apps.SymptomModal.SymptomModal_1') --}}
            {{-- @include('AEFI.Apps.SymptomModal.nonSymptomModal_1') --}}
            {{-- @include('AEFI.Apps.SymptomModal.SymptomModal_2') --}}
            {{-- @include('AEFI.Apps.SymptomModal.SymptomModal_3')
            @include('AEFI.Apps.SymptomModal.SymptomModal_4')
            @include('AEFI.Apps.SymptomModal.SymptomModal_5')
            @include('AEFI.Apps.SymptomModal.SymptomModal_6') --}}
            <!-- หัวข้อที่4 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <!-- form start -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <h3 class="box-title">(4) การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน</h3>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate1" value="1">
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
                    </div>
                      <div class="row">
                      <div class="col-lg-3">
                          <label>
                            วันที่สอบสวน :
                          </label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                      </div>
                    </div>
                  </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box -->
            </div>
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
                                {{-- <option  value=""></option> --}}
                                {{-- <option  value="9999999">เสียชีวิตนอกสถานพยาบาล</option> --}}
                              </select>
                              {{-- <input type="text" id="event_location" name="event_location" class="form-control" placeholder="สถานที่เกิดเหตุการณ์"> --}}
                            </div>
                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;">
                                <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                                <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
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
				                <option  data-color="info" value=""></option>
                                <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                                <option  data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
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

                                <input type="text" class="form-control readonly pull-right" id="" name="datepicker_send_reported" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d") ; ?>" readonly>

                                {{-- <input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported" data-date-format="yyyy-mm-dd" readonly> --}}
                              </div>
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
@include('AEFI.layout.footerScriptn')
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
  $('.amphures').change(function() {
    var selectD = $(this).val();
    //alert(selectD);
    if ($(this).val() != '') {
      //var selectD=$(this).val();
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
      var rowCountSyntom = $('.data-contact-person').length - 1;
      var contactdiv = '<tr class="data-contact-person">' +
        '<td>' +
        '<select type="text" id="name_of_vaccine1" name="name_of_vaccine[' + rowCountSyntom + ']" class="form-control" required>' +
        '<option value="">กรุณาระบุชื่อวัคซีน</option>' +
        @foreach($vac_list as $row)
      '<option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>' +
      @endforeach
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccine_volume1" name="vaccine_volume[' + rowCountSyntom + ']" class="form-control">' +
        '<option value="">กรุณาระบุปริมาณที่ให้</option>' +
        <?php
      foreach($arr_vaccine_volume as $k => $v) {
        ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="route_of_vaccination1" name="route_of_vaccination[' + rowCountSyntom + ']" class="form-control">' +
        '<option value="">กรุณาระบุวิธีที่ให้</option>' +
        <?php
      foreach($arr_route_of_vaccination as $k => $v) {
          ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccination_site1" name="vaccination_site[' + rowCountSyntom + ']" class="form-control">' +
        '  <option value="">กรุณาระบุวิธีตำแหน่ง</option>' +
        <?php
      foreach($arr_vaccination_site as $k => $v) {
          ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
          '<select name="dose[' + rowCountSyntom + ']" id="dose1' + rowCount + '" class="form-control">'+
            '<option value="1">เข็มที่ 1</option>'+
  '<option value="2">เข็มที่ 2</option>'+
  '<option value="3">เข็มที่ 3</option>'+
'<option value="4">เข็มที่ 4</option>'+
  '<option value="5">เข็มที่ 5</option>'+
'<option value="6">เข็มที่ 6</option>'+
'</select>'+
'</td>' +
        '<td>' +
        '<input type="text" name="date_of_vaccination[' + rowCountSyntom + ']" value="" id="date_of_vaccination1' + rowCount + '" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly required>' +
        '</td>' +
        '<td>' +
        '<input type="time" id="time_of_vaccination1' + rowCount + '" name="time_of_vaccination[' + rowCountSyntom + ']" class="form-control" required>' +
        '</td>' +
        '<td>' +
          '<input type="radio" id="symptom' + rowCount + '_1" name="symptom_status[' + rowCountSyntom + ']" value="1" data-toggle="modal" data-target="#Symptom' + rowCount + '">' +
          '<label for="symptom1"> : มีอาการ</label><br>' +
          '<input type="radio" id="symptom' + rowCount + '_2" name="symptom_status[' + rowCountSyntom + ']" value="0" data-toggle="modal" data-target="#nonSymptom' + rowCount + '">' +
          '<label for="symptom2"> : ไม่มีอาการ</label><br>' +
          '<!-- Modal_1 -->'+
'<div class="modal fade" id="Symptom' + rowCount + '"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
'    <div class="modal-dialog modal-lg">'+
'      <div class="modal-content">'+
'        <div class="modal-header">'+
'          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>'+
'          <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>'+
'        </div>'+
'        <div class="modal-body">'+
'            <div class="tab-pane active" id="tab_1">'+
'                <div class="box-body">'+
'                {{-- คอรั่มภายใน3.1 --}}'+
'                                   <div class="col-md-12">'+
'                                    <!-- general form elements -->'+
'                                  <div class="box box-success">'+
'                                    <div class="box-header with-border">'+
'                                    <label>'+
'                                          กลุ่มอาการ'+
'                                      </label>'+
'                                      <hr>'+
'                                      <!-- checkbox3.1.1 -->'+
'                                      <div class="form-group">'+
'                                        <div class="col-md-4">'+
'                                        <label>'+
'                                        <input type="checkbox" name="rash[' + rowCountSyntom + ']" value="0027">'+
'                                      Rash(ผื่น)'+
'                                    </label>'+
'                                  </div>'+
'                                  <div class="col-md-4">'+
'                                    <label>'+
'                                    <input type="checkbox" name="erythema[' + rowCountSyntom + ']" value="0028">'+
'                                  Erythema(ผื่นแดง)'+
'                                </label>'+
'                              </div>'+
'                              <div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="urticaria[' + rowCountSyntom + ']" value="0044">'+
                                              'Urticaria'+
                                            '</label>'+
                                          '</div>'+
                                        '</div>'+
                                        '<div class="form-group">'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="itching[' + rowCountSyntom + ']" value="0026">'+
                                              'Itching(อาการคัน)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="edema[' + rowCountSyntom + ']" value="0003A">'+
                                             ' Edema'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="angioedema[' + rowCountSyntom + ']" value="0003">'+
                                              'Angioedema(บวมที่เยื่อบุ)'+
                                            '</label>'+
                                          '</div>'+
                                        '</div>'+
                                        '{{-- input content --}}'+
                                        '<!-- checkbox3.1.2  -->'+
                                        '<div class="form-group">'+
                                          '<div class="col-md-6" hidden>'+
                                            '<label>'+
                                              '<input type="checkbox" name="fainting[' + rowCountSyntom + ']" value="1">'+
                                              'Fainting'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="hyperventilation[' + rowCountSyntom + ']" value="0517">'+
                                              'Hyperventilation'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="syncope[' + rowCountSyntom + ']" value="0223">'+
                                              'Syncope(เป็นลม)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="headche[' + rowCountSyntom + ']" value="1">'+
                                             ' Headche'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                          '  <label>'+
                                              '<input type="checkbox" name="dizziness[' + rowCountSyntom + ']" value="0101">'+
                                              'Dizziness(เวียนศีรษะ)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="fatigue[' + rowCountSyntom + ']" value="0724">'+
                                              'Fatigue(อ่อนเพลีย)'+
                                            '</label>'+
                                         ' </div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="malaise[' + rowCountSyntom + ']" value="0728">'+
                                              'Malaise(ไม่สบายตัว)'+
                                            '</label>'+
                                          '</div>'+
                                        '</div>'+
                                        '<!-- checkbox3.1.3  -->'+
                                        '<div class="form-group">'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="dyspepsia[' + rowCountSyntom + ']" value="0279">'+
                                              'Dyspepsia'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="diarrhea[' + rowCountSyntom + ']" value="1">'+
                                              'Diarrhea(ถ่ายเหลว)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="nausea[' + rowCountSyntom + ']" value="0308">'+
                                              'Nausea(คลื่นไส้)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="vomiting[' + rowCountSyntom + ']" value="0228">'+
                                              'Vomiting(อาเจียน)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="abdominal_pain[' + rowCountSyntom + ']" value="0268">'+
                                              'Abdominal pain(ปวดท้อง)'+
                                            '</label>'+
                                          '</div>'+
                                        '</div>'+
                                        '<!-- checkbox3.1.4  -->'+
                                        '<div class="form-group">'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="arthalgia[' + rowCountSyntom + ']" value="1">'+
                                              'Arthalgia(ปวดข้อ)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="myalgia[' + rowCountSyntom + ']" value="0072">'+
                                              'Myalgia(ปวดเมื่อยกล้ามเนื้อ)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="fever38c[' + rowCountSyntom + ']" value="0725">'+
                                              'Fever >= 38 C (ไข้)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="swelling_at_the_injection[' + rowCountSyntom + ']" value="1">'+
                                              'บวมบริเวณที่ฉีดนานเกิน3วัน'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="swelling_beyond_nearest_joint[' + rowCountSyntom + ']" value="1">'+
                                              'บวมลามไปถึงข้อที่ใกล้ที่สุด'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="lymphadenopathy[' + rowCountSyntom + ']" value="0577">'+
                                              'Lymphadenopathy'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="lymphadenitis[' + rowCountSyntom + ']" value="0577D">'+
                                              'Lymphadenitis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="sterile_abscess[' + rowCountSyntom + ']" value="0051">'+
                                              'Sterile abscess'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="bacterial_abscess[' + rowCountSyntom + ']" value="1">'+
                                              'Bacterial abscess'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="febrile_convulsion[' + rowCountSyntom + ']" value="1">'+
                                              'Febrile convulsion(ชักจากไข้)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="afebrile_convulsion[' + rowCountSyntom + ']" value="1">'+
                                              'Afebrile convulsion(ชักจากเหตุอื่น)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="flaccid_paralysis[' + rowCountSyntom + ']" value="0139">'+
                                              'Flaccid paralysis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="spastic_paralysis[' + rowCountSyntom + ']" value="0775">'+
                                              'Spastic paralysis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="chest_pain[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Chest pain'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="sepsis[' + rowCountSyntom + ']" type="checkbox" value="0744">'+
                                              'Sepsis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                             ' <input name="sudden_cardiac_arrest[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Sudden cardiac arrest'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-3">'+
                      '<label>'+
                        '<input name="symptoms_later_immunized[' + rowCountSyntom + ']" type="checkbox" value="9999">'+
                              'อื่นๆ'+
                      '</label>'+
                    '</div>'+
                    '<div class="form-group">'+
                      '<div class="col-lg-12">'+
                        '<div id="other_symptoms_later_immunized">'+
                          '<input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized[' + rowCountSyntom + ']" class="form-control" placeholder="อื่นๆ">'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                                        '</div>'+
                                      '</div>'+
                                    '</div>'+
                                    '<!-- /.box -->'+
                                  '</div>'+
                                  '{{-- คอรั่มภายใน3.3 --}}'+
                                  '<div class="col-md-12">'+
                                    '<!-- general form elements -->'+
                                    '<div class="box box-success">'+
                                      '<!-- /.box-header -->'+
                                      '<!-- form start -->'+
                                      '<div class="box-header with-border">'+
                                        '<label>'+
                                        ' กลุ่มโรคร้ายแรง '+
                                        '</label>'+
                                        '<hr>'+
                                      '<div class="box-body">'+
                                        '{{-- input content --}}'+
                                        '<!-- checkbox3.3.1  -->'+
                                        '<div class="form-group">'+
                                          '<div class="col-md-12">'+
                                            '<label>'+
                                              ' Neuro'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="ischemic_stroke[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                               'stroke'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="hemorrhagic_stroke[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                            'Hemorrhagic stroke'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="bells_palsy[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Bells palsy'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="gbs[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Guillain-Barré syndrome (GBS)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="transverse myelitis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Transverse myelitis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="adem[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Acute disseminated encephalomyelitis (ADEM)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-12">'+
                                            '<hr>'+
                                          '<label>'+
                                            ' Cardio'+
                                          '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="myocarditis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Myocarditis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="pericarditis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Pericarditis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="acute_myocardial[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Acute Myocardial infarction'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="heart_failure[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Heart failure'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="persistent_inconsolable_crying[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Persistent inconsolable crying'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="osteomyelitis[' + rowCountSyntom + ']" type="checkbox" value="1184">'+
                                              'Osteitis/Osteomyelitis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="toxic_shock_syndrome[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Toxic shock syndrome'+
                                            '</label>'+
                                          '</div>'+ 
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="hypertension[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Hypertension'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="hypertensive_urgency[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                               'Hypertensive urgency'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-12">'+
                                            '<hr>'+
                                          '<label>'+
                                            ' Hemotology'+
                                          '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="thrombocytopenia[' + rowCountSyntom + ']" type="checkbox" value="0594">'+
                                              'Thrombocytopenia(เกล็ดเลือดต่ำ)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="deep_vein_thrombosis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Deep vein thrombosis'+                            
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="pulmonary_embolism[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Pulmonary embolism'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-12">'+
                                            '<hr>'+
                                          '<label>'+
                                            ' หญิงตั้งครรภ์'+
                                          '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="dfiu[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'DFIU (Dead fetus in utero)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="abortion[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Abortion'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="abruptio_placenta[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Abruptio placenta'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="other_pregnant_symptoms[' + rowCountSyntom + ']" type="checkbox" value="9999">'+
                                              'อื่นๆ'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="form-group">'+
                                            '<div class="col-lg-12">'+
                                              '<div id="other_symptoms_pregnant">'+
                                                '<input type="text" id="other_pregnant_symptoms_later_immunized_text" name="other_pregnant_symptoms_later_immunized[' + rowCountSyntom + ']" class="form-control" placeholder="อื่นๆ">'+
                                             ' </div>'+
                                            '</div>'+
                                          '</div>'+
                                          '<div class="col-md-12">'+
                                            '<hr>'+
                                          '<label>'+
                                             'Other'+
                                          '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="anaphylaxis[' + rowCountSyntom + ']" type="checkbox" value="2237">'+
                                              'Anaphylaxis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="ards[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              ' Acute respiratory distress syndrome (ARDS)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="hhe[' + rowCountSyntom + ']" type="checkbox" value="1704">'+
                                              'Hypotonic Hyporesponsive episode (HHE)'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="covid_19[' + rowCountSyntom + ']" type="checkbox" value="1">'+
                                              'Covid-19'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="encephalopathy[' + rowCountSyntom + ']" value="0105">'+
                                              'Encephalopathy/Encephalitis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input type="checkbox" name="meningitis[' + rowCountSyntom + ']" value="0105">'+
                                              'Meningitis'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="col-md-4">'+
                                            '<label>'+
                                              '<input name="symptoms_later_immunized[' + rowCountSyntom + ']" type="checkbox" value="9999">'+
                                              'อื่นๆ'+
                                            '</label>'+
                                          '</div>'+
                                          '<div class="form-group">'+
                                            '<div class="col-lg-12">'+
                                              '<div id="other_symptoms_later_immunized">'+
                                                '<input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized[' + rowCountSyntom + ']" class="form-control" placeholder="อื่นๆ">'+
                                              '</div>'+
                                            '</div>'+
                                         ' </div>'+
                                        '</div>'+
                                      '</div>'+
                                    '</div>'+
                                    '<!-- /.box -->'+
                                  '</div>'+
'                               </div>'+
'                  {{-- คอรั่มภายใน3.4 --}}'+
'<div class="box-footer">'+
'                  <div class="col-md-12">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <div class="box-header with-border">'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่เกิดอาการ :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="date_of_symptoms1' + rowCount + '" name="date_of_symptoms[' + rowCountSyntom + ']" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'<div class="form-group">'+
                          '<div class="col-lg-6">'+
                            '<label><font style="color:red;">*</font> เวลาที่เกิดอาการ :</label>'+
                              '<div class="input-group date">'+
                              '<div class="input-group-addon">'+
                                '<i class="fa fa-clock-o"></i>'+
                              '</div>'+
                              '<input type="time" class="form-control" id="time_of_symptoms1' + rowCount + '"  name="time_of_symptoms[' + rowCountSyntom + ']">'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่รับรักษา :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="date_of_treatment1' + rowCount + '" name="date_of_treatment[' + rowCountSyntom + ']" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่จำหน่าย :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="time_of_treatment1' + rowCount + '" name="time_of_treatment[' + rowCountSyntom + ']" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        {{-- input content --}}'+
'                        <!-- textarea -->'+
'{{-- input content --}}'+
                   '<div class="form-group">'+
                    '<div class="col-lg-12">'+
                      '<label>การวินิจฉัยหลักของแพทย์ :</label>'+
                      '{{-- <input  id="main_diagnosis1{{$i-1}}" type="text" class="form-control" name="main_diagnosis[{{$i-1}}]"> --}}'+
                      '<select name="main_diagnosis[' + rowCountSyntom + ']" class="js-example-basic-single33 form-control" data-dropdown-css-class="select2-danger" required>'+
                      '</select>'+
                   ' </div>'+
                  '</div>'+
                  '<div class="form-group">'+
                    '<div class="col-lg-12">'+
                      '<label>การวินิจฉัยรองของแพทย์ :</label>'+
                      '{{-- <input  id="minor_diagnosis1{{$i-1}}" type="text" class="form-control" name="minor_diagnosis[{{$i-1}}]"> --}}'+
                      '<select name="minor_diagnosis[' + rowCountSyntom + ']" class="js-example-basic-single33 form-control" data-dropdown-css-class="select2-danger" required>'+
                      '</select>'+
                    '</div>'+
                  '</div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-8">'+
'                            <label>รายละเอียดอาการและการตรวจสอบ</label>'+
'                            <input class="form-control" rows="5"  id="Symptoms_details1" name="Symptoms_details[' + rowCountSyntom + ']">'+
'                          </div>'+
'                        </div>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'                    <!-- /.box -->'+
'                <div class="box-footer">'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12">'+
'                      <label>'+
'                        <font style="color:red;">*</font> ความร้ายแรงของอาการ'+
'                      </label>'+
'                    </div>'+
'                  </div>'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12"  id="seriousness_of_the_symptoms_' + rowCount + '">'+
'                      <!-- checkbox3.5.1  -->'+
'                      <div class="form-group">'+
'                        <div class="col-md-2">'+
'                          <label>'+
'                            <input type="radio" name="seriousness_of_the_symptoms[' + rowCountSyntom + ']"  id="seriousness_of_the_symptoms1" value="1" >'+
'                            ไม่ร้ายแรง'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-2">'+
'                          <label>'+
'                            <input type="radio" name="seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="seriousness_of_the_symptoms1" value="2">'+
'                            ร้ายแรง'+
'                          </label>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                  </div>'+
'                  <div id="other_seriousness_of_the_symptoms_bk1">'+
'                    <div id="other_seriousness_of_the_symptoms_' + rowCount + '">'+
'                    <div class="form-group">'+
'                      <div class="col-lg-12">'+
'                        <label>ระบุ :</label>'+
'                      </div>'+
'                    </div>'+
'                    <!-- checkbox3.1.1 -->'+
'                    <div class="form-group">'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="radio" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="1">'+
'                          เสียชีวิต'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="radio" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="2">'+
'                          อันตรายถึงชีวิต'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="radio" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="3">'+
'                          พิการ/ไร้ความสามารถ'+
'                        </label>'+
'                      </div>'+
'                    </div>'+
'                    <div class="form-group">'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="radio" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="4">'+
'                          รับไว้รักษาในโรงพยาบาล'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="radio" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="5">'+
'                          ความผิดปกติแต่กำเนิด'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="radio" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="6">'+
'                          อื่นๆที่มีความสำคัญทางการแพทย์'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-lg-4">'+
'                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">'+
'                          <label></label>'+
'                          <input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms[' + rowCountSyntom + ']" class="form-control" placeholder="อื่นๆ">'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                  </div>'+
'                </div>'+
'                </div>'+
'                <!-- /.box-body -->'+
'                <div class="box-footer">'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12">'+
'                      <label>'+
'                        <font style="color:red;">*</font> สถานะผู้ป่วย'+
'                      </label>'+
'                    </div>'+
'                  </div>'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12" id="patient_status_' + rowCount + '">'+
'                      <!-- checkbox3.5.1  -->'+
'                      <div class="form-group">'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="1" >'+
'                            หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="2">'+
'                            หายโดยมีร่องรอย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="3">'+
'                            อาการดีขึ้นแต่ยังไม่หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="4">'+
'                            ไม่หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="5">'+
'                            ไม่ทราบ'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="6">'+
'                            เสียชีวิต'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-lg-4">'+
'                          <div class="input-group date">'+
'                            <div id="other_patian_sta" style="display: none">'+
'                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead[' + rowCountSyntom + ']" hidden="true" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <input type="text" id="patient_status' + rowCount + '" name="patient_status[' + rowCountSyntom + ']" hidden>'+
'                      </div>'+
'                    </div>'+
'                  </div>'+
'                  <!-- checkbox3.1.1 -->'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12">'+
'                      <label>ผ่าพิสูจน์ศพ :</label>'+
'                    </div>'+
'                  </div>'+
'                  <!-- checkbox3.1.1 -->'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12"  id="funeral_' + rowCount + '">'+
'                      <div class="col-md-2" hidden>'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="" >'+
'                          ไม่ระบุ'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="1" >'+
'                          ไม่มี'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="2">'+
'                          ไม่ทราบ'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="3">'+
'                          มี'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-lg-3">'+
'                        <div id="other_address_funeral' + rowCount + '" style="display: none">'+
'                          <label>สถานที่ทำการ :</label>'+
'                          <input type="text" id="other_address_funeral_text' + rowCount + '" name="other_address_funeral[' + rowCountSyntom + ']" class="form-control" placeholder="ระบุสถานที่ทำการ">'+
'                        </div>'+
'                      </div>'+
'                      <input type="text" id="funeral' + rowCount + '" name="funeral[' + rowCountSyntom + ']" hidden>'+
'                    </div>'+
'                  </div>'+
'                </div>'+
'    '+
'              </div>'+
'        </div>'+
'        <div class="modal-footer">'+
'            <button type="button" class="btn btn-primary" data-dismiss="modal">เสร็จสิ้น</button>'+
'            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}'+
'        </div>'+
'      </div>'+
'    </div>'+
'  </div>'+
          '</td>' +
        '<td>' +
        '<select type="text" id="manufacturer1" name="manufacturer[' + rowCountSyntom + ']" class="form-control">' +
        '<option value="">กรุณาระบชื่อผู้ผลิต</option>' +
        <?php
      foreach($arr_manufacturer as $k => $v) {
          ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="other_manufacturer1" name="other_manufacturer[' + rowCountSyntom + ']" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="lot_number1" name="lot_number[' + rowCountSyntom + ']" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date1' + rowCount + '" name="expiry_date[' + rowCountSyntom + ']" class="form-control" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        // '<td>' +
        // '<input type="text" id="name_of_diluent1" name="name_of_diluent[' + rowCountSyntom + ']" class="form-control">' +
        // '</td>' +
        '<td>' +
        // '<input type="text"  id="rash1' + rowCount + '" name="rash[' + rowCountSyntom + ']" value="0027">'+
        '<input type="text" id="lot_number_diluent1" name="lot_number_diluent[' + rowCountSyntom + ']" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date_diluent1' + rowCount + '" name="expiry_date_diluent[' + rowCountSyntom + ']" class="form-control" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        // '<td><input type="text" id="date_of_reconstitution1' + rowCount + '" name="date_of_reconstitution[' + rowCountSyntom + ']" class="form-control datepicker" data-date-format="yyyy-mm-dd"></td>' +
        // '<td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[' + rowCountSyntom + ']" class="form-control"></td>' +
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
      $('#date_of_symptoms1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_treatment1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_symptoms2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_treatment2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
    $('#datepicker_dead2' + rowCount + '').datepicker({
      dateFormat: "yy-mm-dd"
    })
      $('#rash_' + rowCount + '').change(function() {
      var s = $('#rash_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#rash' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#erythema_' + rowCount + '').change(function() {
      var s = $('#erythema_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#erythema' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#urticaria_' + rowCount + '').change(function() {
      var s = $('#urticaria_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#urticaria' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#itching_' + rowCount + '').change(function() {
      var s = $('#itching_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#itching' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#edema_' + rowCount + '').change(function() {
      var s = $('#edema_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#edema' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#angioedema_' + rowCount + '').change(function() {
      var s = $('#angioedema_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#angioedema' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#fainting_' + rowCount + '').change(function() {
      var s = $('#fainting_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#fainting' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#hyperventilation_' + rowCount + '').change(function() {
      var s = $('#hyperventilation_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#hyperventilation' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#syncope_' + rowCount + '').change(function() {
      var s = $('#syncope_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#syncope' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#headche_' + rowCount + '').change(function() {
      var s = $('#headche_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#headche' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#dizziness_' + rowCount + '').change(function() {
      var s = $('#dizziness_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#dizziness' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#fatigue_' + rowCount + '').change(function() {
      var s = $('#fatigue_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#fatigue' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#malaise_' + rowCount + '').change(function() {
      var s = $('#malaise_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#malaise' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#dyspepsia_' + rowCount + '').change(function() {
      var s = $('#dyspepsia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#dyspepsia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#diarrhea_' + rowCount + '').change(function() {
      var s = $('#diarrhea_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#diarrhea' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#nausea_' + rowCount + '').change(function() {
      var s = $('#nausea_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#nausea' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#vomiting_' + rowCount + '').change(function() {
      var s = $('#vomiting_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#vomiting' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#abdominal_pain_' + rowCount + '').change(function() {
      var s = $('#abdominal_pain_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#abdominal_pain' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#arthalgia_' + rowCount + '').change(function() {
      var s = $('#arthalgia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#arthalgia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#myalgia_' + rowCount + '').change(function() {
      var s = $('#myalgia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#myalgia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#fever38c_' + rowCount + '').change(function() {
      var s = $('#fever38c_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#fever38c' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#swelling_at_the_injection_' + rowCount + '').change(function() {
      var s = $('#swelling_at_the_injection_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#swelling_at_the_injection' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#swelling_beyond_nearest_joint_' + rowCount + '').change(function() {
      var s = $('#swelling_beyond_nearest_joint_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#swelling_beyond_nearest_joint' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#lymphadenopathy_' + rowCount + '').change(function() {
      var s = $('#lymphadenopathy_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#lymphadenopathy' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#lymphadenitis_' + rowCount + '').change(function() {
      var s = $('#lymphadenitis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#lymphadenitis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#sterile_abscess_' + rowCount + '').change(function() {
      var s = $('#sterile_abscess_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#sterile_abscess' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#bacterial_abscess_' + rowCount + '').change(function() {
      var s = $('#bacterial_abscess_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#bacterial_abscess' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#febrile_convulsion_' + rowCount + '').change(function() {
      var s = $('#febrile_convulsion_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#febrile_convulsion' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#encephalopathy_' + rowCount + '').change(function() {
      var s = $('#encephalopathy_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#encephalopathy' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#flaccid_paralysis_' + rowCount + '').change(function() {
      var s = $('#flaccid_paralysis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#flaccid_paralysis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#spastic_paralysis_' + rowCount + '').change(function() {
      var s = $('#spastic_paralysis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#spastic_paralysis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#hhe_' + rowCount + '').change(function() {
      var s = $('#hhe_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#hhe' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#persistent_inconsolable_crying_' + rowCount + '').change(function() {
      var s = $('#persistent_inconsolable_crying_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#persistent_inconsolable_crying' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#thrombocytopenia_' + rowCount + '').change(function() {
      var s = $('#thrombocytopenia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#thrombocytopenia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#osteomyelitis_' + rowCount + '').change(function() {
      var s = $('#osteomyelitis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#osteomyelitis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#toxic_shock_syndrome_' + rowCount + '').change(function() {
      var s = $('#toxic_shock_syndrome_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#toxic_shock_syndrome' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#sepsis_' + rowCount + '').change(function() {
      var s = $('#sepsis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#sepsis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#anaphylaxis_' + rowCount + '').change(function() {
      var s = $('#anaphylaxis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#anaphylaxis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#other_' + rowCount + '').change(function() {
      var s = $('#other_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#other' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#seriousness_of_the_symptoms_' + rowCount + '').change(function() {
      var s = $('#seriousness_of_the_symptoms_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#seriousness_of_the_symptoms' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#other_seriousness_of_the_symptoms_' + rowCount + '').change(function() {
      var s = $('#other_seriousness_of_the_symptoms_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#other_seriousness_of_the_symptoms' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#patient_status_' + rowCount + '').change(function() {
      var s = $('#patient_status_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#patient_status' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#funeral_' + rowCount + '').change(function() {
      var s = $('#funeral_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#funeral' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('input[name="c_funeral[]"]').on('click', function() {
      if ($(this).val() == '3') {
        $('#other_address_funeral' + rowCount + '').show();
      } else {
        $('#other_address_funeral' + rowCount + '').hide();
        $('#other_address_funeral_text' + rowCount + '').val('');
      }
    });
        $('#seriousness_of_the_symptoms_2' + rowCount + '').change(function() {
      var s = $('#seriousness_of_the_symptoms_2' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#seriousness_of_the_symptoms2' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#other_seriousness_of_the_symptoms_2' + rowCount + '').change(function() {
  var s = $('#other_seriousness_of_the_symptoms_2' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#other_seriousness_of_the_symptoms2' + rowCount + '').val((s.length > 0 ? s : ""));
});
$('#patient_status_2' + rowCount + '').change(function() {
  var s = $('#patient_status_2' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#patient_status2' + rowCount + '').val((s.length > 0 ? s : ""));
});
    $('input[name="c_patient_status2[]"]').on('click', function() {
      if ($(this).val() == '6') {
        $('#other_patian_sta2' + rowCount + '').show();
      } else {
        $('#other_patian_sta2' + rowCount + '').hide();
        $('#datepicker_dead2' + rowCount + '').val('');
      }
    });
    $('#funeral_2' + rowCount + '').change(function() {
  var s = $('#funeral_2' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#funeral2' + rowCount + '').val((s.length > 0 ? s : ""));
});


$('#chest_pain_' + rowCount + '').change(function() {
  var s = $('#chest_pain_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#chest_pain' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#myocarditis_' + rowCount + '').change(function() {
  var s = $('#myocarditis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#myocarditis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#heart_failure_' + rowCount + '').change(function() {
  var s = $('#heart_failure_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#heart_failure' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#pericarditis_' + rowCount + '').change(function() {
  var s = $('#pericarditis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#pericarditis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#sudden_cardiac_arrest_' + rowCount + '').change(function() {
  var s = $('#sudden_cardiac_arrest_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#sudden_cardiac_arrest' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#covid_19_' + rowCount + '').change(function() {
  var s = $('#covid_19_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#covid_19' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#ischemic_stroke_' + rowCount + '').change(function() {
  var s = $('#ischemic_stroke_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#ischemic_stroke' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#hemorrhagic_stroke_' + rowCount + '').change(function() {
  var s = $('#hemorrhagic_stroke_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#hemorrhagic_stroke' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#deep_vein_thrombosis_' + rowCount + '').change(function() {
  var s = $('#deep_vein_thrombosis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#deep_vein_thrombosis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#pulmonary_embolism_' + rowCount + '').change(function() {
  var s = $('#pulmonary_embolism_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#pulmonary_embolism' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#hypertension_' + rowCount + '').change(function() {
  var s = $('#hypertension_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#hypertension' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#hypertensive_urgency_' + rowCount + '').change(function() {
  var s = $('#hypertensive_urgency_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#hypertensive_urgency' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#bells_palsy_' + rowCount + '').change(function() {
  var s = $('#bells_palsy_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#bells_palsy' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#gbs_' + rowCount + '').change(function() {
  var s = $('#gbs_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#gbs' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#transverse_myelitis_' + rowCount + '').change(function() {
  var s = $('#transverse_myelitis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#transverse_myelitis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#adem_' + rowCount + '').change(function() {
  var s = $('#adem_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#adem' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#ards_' + rowCount + '').change(function() {
  var s = $('#ards_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#ards' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#acute_myocardial_' + rowCount + '').change(function() {
  var s = $('#acute_myocardial_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#acute_myocardial' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#symptoms_later_immunized_' + rowCount + '').change(function() {
  var s = $('#symptoms_later_immunized_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#symptoms_later_immunized' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#afebrile_convulsion_' + rowCount + '').change(function() {
  var s = $('#afebrile_convulsion_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#afebrile_convulsion' + rowCount + '').val((s.length > 0 ? s : ""));
});

    $('input[name="c_funeral2[]"]').on('click', function() {
      if ($(this).val() == '3') {
        $('#other_address_funeral2' + rowCount + '').show();
      } else {
        $('#other_address_funeral2' + rowCount + '').hide();
        $('#other_address_funeral_text2' + rowCount + '').val('');
      }
    });

    $(".js-example-basic-single33").select2({
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
@include('AEFI.layout.SymptomScript')
@include('AEFI.layout.nonSymptomScript')
@stop
