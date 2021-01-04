@extends('AEFI.layout.template')
{{-- <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  width: 25px;
  font-size: 12px;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
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
  <form role="form" action="{{ route('updateform1') }}" method="post">
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
                    <input type="hidden" id="id" name="id" value="{{ $data[0]->id }}" class="form-control">
                    <input type="hidden" id="id_case" name="id_case" value="{{ $data[0]->id_case }}" class="form-control">
                    <input type="hidden" id="count_data_vac" name="count_data_vac" value="{{ $count_data_vac[0]->vac_count }}" class="form-control">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 control-label">
                          <label>เลขที่ผู้ป่วย:</label>
                        </div>
                        <div class="col-lg-4">
                          <input type="text" id="hn" name="hn" value="{{ $data[0]->hn }}" class="form-control" placeholder="HN">
                        </div>
                        <div class="col-lg-4">
                          <input type="text" id="an" name="an" value="{{ $data[0]->an }}" class="form-control" placeholder="AN">
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
                        <div class="col-lg-7">
                          <input type="text" id="id_number" name="id_number" value="{{ $data[0]->id_number }}" class="form-control" data-inputmask='"mask": "9   9999   99999   99   9"' data-mask>
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
                            <option value="{{ $data[0]->title_name }}">{{ $data[0]->title_name }}</option>
                            <option value="">กรุณาเลือก</option>
                            {{-- < ?php foreach ($mas_title_th as $key_title => $value_title) : ?> --}}
                            {{-- } --}}
                            <option value="1">นาย</option>
                            <option value="2">นางสาว</option>
                            <option value="3">นาง</option>
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
                          <input type="text" id="first_name" name="first_name" value="{{ $data[0]->first_name }}" class="form-control" placeholder="ชื่อ">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-4">
                          <input type="text" id="sur_name" name="sur_name" value="{{ $data[0]->sur_name }}" class="form-control" placeholder="นามสกุล">
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
                              <input type="radio" name="gender" id="optionsRadios1" value="1" @if ($data[0]->gender == 1)
                              {{ "checked" }}
                              @endif>
                                ชาย
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" id="optionsRadios2" value="2" @if ($data[0]->gender == 2)
                              {{ "checked" }}
                              @endif>
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
                            <font style="color:red;">*</font> วันเดือนปีเกิด:
                          </label>
                        </div>
                        <div class="col-lg-9">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="birthdate" class="form-control pull-right" id="datepicker_bdate" value="{{$data[0]->birthdate}}">
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
                          <input type="text" id="age_while_sick_year" name="age_while_sick_year" class="form-control" placeholder="ปี" value="{{$data[0]->age_while_sick_year}}">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                          <input type="text" id="age_while_sick_month" name="age_while_sick_month" class="form-control" placeholder="เดือน" value="{{$data[0]->age_while_sick_month}}">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                          <input type="text" id="age_while_sick_day" name="age_while_sick_month" class="form-control" placeholder="วัน" value="{{$data[0]->age_while_sick_day}}">
                          <!-- /input-group -->
                        </div>
                      </div>
                    </div>

                    <!-- กลุ่มอายุ -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="control-label">
                            <label>กลุ่มอายุ:</label>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="radio">
                            <label>
                              <input type="radio" name="group_age" id="G_age1" value="1" @if ($data[0]->group_age == 1)
                              {{ "checked" }}
                              @endif>
                                < 1 ปี </label> </div> </div> <div class="col-lg-2">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="group_age" id="G_age2" value="2" @if ($data[0]->group_age == 2)
                                      {{ "checked" }}
                                      @endif>
                                        1-5 ปี
                                    </label>
                                  </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="group_age" id="G_age3" value="3" @if ($data[0]->group_age == 3)
                                {{ "checked" }}
                                @endif>
                                  > 5 ปี
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- เชื้อชาติ -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="control-label">
                              <label>เชื้อชาติ:</label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="1" @if ($data[0]->nationality == 1)
                                {{ "checked" }}
                                @endif>
                                  ไทย
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="2" @if ($data[0]->nationality == 2)
                                {{ "checked" }}
                                @endif>
                                  พม่า
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="3" @if ($data[0]->nationality == 3)
                                {{ "checked" }}
                                @endif>
                                  ลาว
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="4" @if ($data[0]->nationality == 4)
                                {{ "checked" }}
                                @endif>
                                  อื่นๆ
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div id="other_nationality" style="display: none">
                              <input type="text" id="other_nationality_text" name="other_nationality" class="form-control" placeholder="ระบุสัญชาติ" hidden="true" value="{{$data[0]->other_nationality}}">
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
                                <input type="radio" name="type_of_patient" id="type_of_patient1" value="1" @if ($data[0]->type_of_patient == 1)
                                {{ "checked" }}
                                @endif>
                                  ผู้ป่วยใน
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="type_of_patient" id="type_of_patient2" value="2" @if ($data[0]->type_of_patient == 2)
                                {{ "checked" }}
                                @endif>
                                  ผู้ป่วยนอก
                              </label>
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
                            <label>ประวัติการแพ้วัคซีน :</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="1" @if ($data[0]->history_of_vaccine_drug_allergies_of_patient == 1)
                              {{ "checked" }}
                              @endif>
                                ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="2" @if ($data[0]->history_of_vaccine_drug_allergies_of_patient == 2)
                              {{ "checked" }}
                              @endif>
                                มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_vaccination_history" style="display: none">
                            <label>วัคซีนที่แพ้ :</label>
                            <select id="other_vaccination_history_text" name="other_vaccination_history" class="form-control select2" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="{{ $data[0]->other_vaccination_history }}">{{ $data[0]->other_vaccination_history }}</option>
                              <?php
										  foreach ($arr_history_of_vaccine as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                              <?php } ?>
                            </select>
                            <label>ยาที่แพ้ :</label>
                            <input type="text" name="other_drug_history" id="other_secymptoms_after_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true" value="{{ $data[0]->other_drug_history }}">
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
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="1" @if ($data[0]->patient_develop_symptoms_after_previous_vaccination == 1)
                              {{ "checked" }}
                              @endif>
                                ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="2" @if ($data[0]->patient_develop_symptoms_after_previous_vaccination == 2)
                              {{ "checked" }}
                              @endif>
                                มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_patient_develop_symptoms_after_previous_vaccination" style="display: none">
                            <label>วัคซีนที่แพ้ :</label>
                            <select id="other_patient_develop_symptoms_after_previous_vaccination_text" name="other_patient_develop_symptoms_after_previous_vaccination" class="form-control select2" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="{{ $data[0]->other_patient_develop_symptoms_after_previous_vaccination }}">{{ $data[0]->other_patient_develop_symptoms_after_previous_vaccination }}
                              </option>
                              <?php
	  										  foreach ($arr_patient_develop_symptoms_after_previous_vaccination as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                              <?php } ?>
                            </select>
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
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="underlying_disease" value="1" @if ($data[0]->underlying_disease == 1)
                              {{ "checked" }}
                              @endif>
                                ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="underlying_disease" value="2" @if ($data[0]->underlying_disease == 2)
                              {{ "checked" }}
                              @endif>
                                มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_underlying_disease" style="display: none">
                            <select id="other_underlying_disease_text" name="other_underlying_disease" class="form-control select2" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="{{ $data[0]->other_underlying_disease }}">{{ $data[0]->other_underlying_disease }}</option>
                              <?php
												  foreach ($arr_underlying_disease as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                              <?php } ?>
                            </select>
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
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="1" @if ($data[0]->history_of_drug_use_within_1_month_before_getting_vaccination == 1)
                              {{ "checked" }}
                              @endif>
                                ไม่มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="2" @if ($data[0]->history_of_drug_use_within_1_month_before_getting_vaccination == 2)
                              {{ "checked" }}
                              @endif>
                                มี
                            </label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div id="other_history_of_drug_use_within_1_month_vaccination" style="display: none">
                            <input type="text" id="other_history_of_drug_use_within_1_month_vaccination_text" name="other_history_of_drug_use_within_1_month_vaccination" class="form-control" placeholder="ระบุ" hidden="true"
                              value="{{ $data[0]->other_history_of_drug_use_within_1_month_vaccination }}">
                          </div>
                        </div>
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
                        <textarea class="form-control" name="other_medical_history" rows="3" placeholder="...">{{ $data[0]->other_medical_history }}</textarea>
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
                    <input type="text" id="house_number" name="house_number" value="{{ $data[0]->house_number }}" class="form-control" placeholder="บ้านเลขที่">
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-4">
                    <input type="text" id="village_no" name="village_no" value="{{ $data[0]->village_no }}" class="form-control" placeholder="หมู่ที่">
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
                    <select class="form-control provinces" name="province" id="provinces">
                      <option value="{{ $data[0]->province }}">{{ isset($listProvince[$data[0]->province]) ?$listProvince[$data[0]->province] : "ไม่ระบุข้อมูล"}}</option>
                      <option value="0">=== จังหวัด ===</option>
                      @foreach ($list as $row)
                      <option value="{{$row->province_id}}">{{$row->province_name}}</option>
                      @endforeach
                      {{-- @foreach ($list as $row)
									  	 <option value="{{$row->province_id}}">{{$row->province_name}}</option>
                      @endforeach --}}
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control amphures" name="district">
                      <option value="{{ $data[0]->district }}">{{ isset($listDistrict[$data[0]->district]) ? $listDistrict[$data[0]->district]: "ไม่ระบุข้อมูล" }}</option>
                      <option value="0">=== อำเภอ ===</option>
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control district" name="subdistrict">
                      <option value="{{ $data[0]->subdistrict }}">{{ isset($listsubdistrict[$data[0]->subdistrict]) ?  $listsubdistrict[$data[0]->subdistrict] : "ไม่ระบุข้อมูล"}}</option>
                      <option value="0">=== ตำบล ===</option>
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
                    <input type="text" id="phone_number" name="phone_number" value="{{ $data[0]->phone_number }}" class="form-control" placeholder="โทรศัพท์">
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
                    <input type="text" id="parent_name" name="parent_name" class="form-control" value="{{ $data[0]->parent_name }}" placeholder="ชื่อ">
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <input type="text" id="parent_sur_name" name="parent_sur_name" class="form-control" value="{{ $data[0]->parent_sur_name }}" placeholder="นามสกุล">
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <label>( กรณีผู้ป่วยอายุ < 15 ปี )</label> </div> </div> </div> <div class="form-group">
                        <div class="row">
                          <div class="col-lg-2">
                            <label>โทรศัพท์ผู้ปกครอง :</label>
                          </div>
                          <div class="col-lg-3">
                            <input type="text" id="parent_phone_number" name="parent_phone_number" value="{{ $data[0]->parent_phone_number }}" class="form-control" placeholder="โทรศัพท์ผู้ปกครอง">
                            <!-- /.p_id tname  -->
                          </div>
                        </div>
                  </div>
                </div>

              </div>
              <!-- /.box -->
            </div>
            <!--หัวข้อที่2 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">(2) ข้อมูลวัคซีน / สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข)</h3>
                </div>
                <div style="overflow: scroll;">
                  <table class="maintable" id="customers">
                    <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">+ เพิ่มข้อมูลวัคซีน</button></br>
                    <thead>
                      <tr>
                        <th>
                          <font style="color:red;">*</font> ชื่อวัคซีน
                        </th>
                        <th>ปริมานที่ให้</th>
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
                        <th>
                          <font style="color:red;">*</font> เลขที่ผลิต
                        </th>
                        <th>
                          <font style="color:red;">*</font> วันหมดอายุ
                        </th>
                        <th>ชื่อตัวทำละลาย</th>
                        <th>
                          <font style="color:red;">*</font> เลขที่ผลิต
                        </th>
                        <th>
                          <font style="color:red;">*</font> วันหมดอายุ
                        </th>
                        <th>
                          <font style="color:red;">*</font> ว/ด/ปที่ผสม
                        </th>
                        <th>
                          <font style="color:red;">*</font> เวลาที่ผสม
                        </th>
                        <th>#</th>
                        {{-- <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($datavac as $value) : ?>
                      <tr class="data-contact-person">
                        <td>
                          <select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value="" class="form-control">
                            <option value="{{$value->name_of_vaccine}}">{{isset($listvac_arr[$value->name_of_vaccine]) ? $listvac_arr[$value->name_of_vaccine]:""}}</option>
                            <option value="">กรุณาระบุชื่อวัคซีน</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume" name="vaccine_volume[]" value="" class="form-control">
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
                          <select type="text" id="route_of_vaccination1" name="route_of_vaccination[]" value="" class="form-control">
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
                          <select type="text" id="vaccination_site1" name="vaccination_site[]" value="" class="form-control">
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
                          <input type="number" id="dose1" name="dose[]" value="{{isset($value->dose) ? $value->dose:""}}" class="form-control" min="1" max="20">
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination[]" value="{{isset($value->date_of_vaccination) ? $value->date_of_vaccination:""}}" id="date_of_vaccination1" class="form-control datepicker" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination1" name="time_of_vaccination[]" value="{{isset($value->vaccination_site) ? $value->time_of_vaccination:""}}" class="form-control">
                        </td>
                        <td>
                          <select type="text" id="manufacturer1" name="manufacturer[]" value="" class="form-control">
                            <option value="{{$value->manufacturer}}">{{isset($arr_manufacturer[$value->manufacturer])?$arr_manufacturer[$value->manufacturer]:""}}</option>
                            <option value="">กรุณาระบชื่อผู้ผลิต</option>
                            <?php
                             foreach ($arr_manufacturer as $k=>$v) {
                         ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="lot_number1" name="lot_number[]" value="{{isset($value->lot_number) ? $value->lot_number:""}}" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date1" name="expiry_date[]" value="{{isset($value->expiry_date) ? $value->expiry_date:""}}" class="form-control" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="name_of_diluent1" name="name_of_diluent[]" value="{{isset($value->name_of_diluent) ? $value->name_of_diluent:""}}" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="lot_number_diluent1" name="lot_number_diluent[]" value="{{isset($value->lot_number_diluent) ? $value->lot_number_diluent:""}}" class="form-control">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent[]" value="{{isset($value->expiry_date_diluent) ? $value->expiry_date_diluent:""}}" class="form-control" data-date-format="yyyy-mm-dd">
                        </td>
                        <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution[]" value="{{isset($value->date_of_reconstitution) ? $value->date_of_reconstitution:""}}" class="form-control" data-date-format="yyyy-mm-dd"></td>
                        <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]" value="{{isset($value->time_of_reconstitution) ? $value->time_of_reconstitution:""}}" class="form-control"></td>
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                        <td>
                          <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>
                          <button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-m">ลบข้อมูลวัคซีน</button></td>
                        </td>
                      </tr>
                      <?php endforeach;?>
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
                  <div class="col-md-3">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="rash" value="0027" @if ($data[0]->rash == '0027')
                              {{ "checked" }}
                              @endif>
                                Rash
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="erythema" value="0028" @if ($data[0]->erythema == '0028')
                              {{ "checked" }}
                              @endif>
                                Erythema
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="urticaria" value="0044" @if ($data[0]->urticaria == '0044')
                              {{ "checked" }}
                              @endif>
                                Urticaria
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="itching" value="0026" @if ($data[0]->itching == '0026')
                              {{ "checked" }}
                              @endif>
                                Itching
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="edema" value="0003A" @if ($data[0]->edema == '0003A')
                              {{ "checked" }}
                              @endif>
                                Edema
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label>
                              <input type="checkbox" name="angioedema" value="0003" @if ($data[0]->angioedema == '0003')
                              {{ "checked" }}
                              @endif>
                                Angioedema
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->

                      <div class="box-body">
                        {{-- input content --}}
                        <!-- checkbox3.1.2  -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="fainting" value="1" @if ($data[0]->fainting == '1')
                              {{ "checked" }}
                              @endif>
                                Fainting
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="hyperventilation" value="0517" @if ($data[0]->hyperventilation == '0517')
                              {{ "checked" }}
                              @endif>
                                Hyperventilation
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="syncope" value="0223" @if ($data[0]->syncope == '0223')
                              {{ "checked" }}
                              @endif>
                                Syncope
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="headche" value="1" @if ($data[0]->headche == '1')
                              {{ "checked" }}
                              @endif>
                                Headche
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="dizziness" value="0101" @if ($data[0]->dizziness == '0101')
                              {{ "checked" }}
                              @endif>
                                Dizziness
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="fatigue" value="0724" @if ($data[0]->fatigue == '0724')
                              {{ "checked" }}
                              @endif>
                                Fatigue
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="malaise" value="0728" @if ($data[0]->malaise == '0728')
                              {{ "checked" }}
                              @endif>
                                Malaise
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.1.3  -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="dyspepsia" value="0279" @if ($data[0]->dyspepsia == '0279')
                              {{ "checked" }}
                              @endif>
                                Dyspepsia
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="diarrhea" value="1" @if ($data[0]->diarrhea == '1')
                              {{ "checked" }}
                              @endif>
                                Diarrhea
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="nausea" value="0308" @if ($data[0]->nausea == '0308')
                              {{ "checked" }}
                              @endif>
                                Nausea
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="vomiting" value="0228" @if ($data[0]->vomiting == '0228')
                              {{ "checked" }}
                              @endif>
                                Vomiting
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="abdominal_pain" value="0268" @if ($data[0]->abdominal_pain == '0268')
                              {{ "checked" }}
                              @endif>
                                Abdominal pain
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.1.4  -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="arthalgia" value="1" @if ($data[0]->arthalgia == '1')
                              {{ "checked" }}
                              @endif>
                                Arthalgia
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="myalgia" value="0072" @if ($data[0]->myalgia == '0072')
                              {{ "checked" }}
                              @endif>
                                Myalgia
                            </label>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.box -->
                  </div>
                  {{-- คอรั่มภายใน3.2 --}}
                  <div class="col-md-3">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.2.1 -->
                        <div class="form-group">
                          <div class="col-md-5">
                            <label>
                              <input type="checkbox" name="fever38c" value="0725" @if ($data[0]->fever38c == '0725')
                              {{ "checked" }}
                              @endif>
                                Fever >= 38 C
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
                                <input type="checkbox" name="swelling_at_the_injection" value="1" @if ($data[0]->swelling_at_the_injection == '1')
                                {{ "checked" }}
                                @endif>
                                  บวมบริเวณที่ฉีดนานเกิน3วัน
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="swelling_beyond_nearest_joint" value="1" @if ($data[0]->swelling_beyond_nearest_joint == '1')
                                {{ "checked" }}
                                @endif>
                                  บวมลามไปถึงข้อที่ใกล้ที่สุด
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="lymphadenopathy" value="0577" @if ($data[0]->lymphadenopathy == '0577')
                                {{ "checked" }}
                                @endif>
                                  Lymphadenopathy
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="lymphadenitis" value="0577D" @if ($data[0]->lymphadenitis == '0577D')
                                {{ "checked" }}
                                @endif>
                                  Lymphadenitis
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6">
                              <label>
                                <input type="checkbox" name="sterile_abscess" value="0051" @if ($data[0]->sterile_abscess == '0051')
                                {{ "checked" }}
                                @endif>
                                  Sterile abscess
                              </label>
                            </div>
                            <div class="col-md-6">
                              <label>
                                <input type="checkbox" name="bacterial_abscess" value="1" @if ($data[0]->bacterial_abscess == '1')
                                {{ "checked" }}
                                @endif>
                                  Bacterial abscess
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.2.3  -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="febrile_convulsion" value="1" @if ($data[0]->febrile_convulsion == '1')
                              {{ "checked" }}
                              @endif>
                                Febrile convulsion
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="afebrile_convulsion" value="1" @if ($data[0]->afebrile_convulsion == '1')
                              {{ "checked" }}
                              @endif>
                                Afebrile convulsion
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="encephalopathy" value="0105" @if ($data[0]->encephalopathy == '0105')
                              {{ "checked" }}
                              @endif>
                                Encephalopathy
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="flaccid_paralysis" value="0139" @if ($data[0]->flaccid_paralysis == '0139')
                              {{ "checked" }}
                              @endif>
                                Flaccid paralysis
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="spastic_paralysis" value="0775" @if ($data[0]->spastic_paralysis == '0775')
                              {{ "checked" }}
                              @endif>
                                Spastic paralysis
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.box -->
                  {{-- คอรั่มภายใน3.3 --}}
                  <div class="col-md-3">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <!-- /.box-header -->
                      <!-- form start -->

                      <div class="box-body">
                        {{-- input content --}}
                        <!-- checkbox3.3.1  -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              <input name="hhe" type="checkbox" value="1704" @if ($data[0]->hhe == '1704')
                              {{ "checked" }}
                              @endif>
                                Hypotonic Hyporesponsive episode (HHE)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="persistent_inconsolable_crying" type="checkbox" value="1" @if ($data[0]->persistent_inconsolable_crying == '1')
                              {{ "checked" }}
                              @endif>
                                Persistent inconsolable crying
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="thrombocytopenia" type="checkbox" value="0594" @if ($data[0]->thrombocytopenia == '0594')
                              {{ "checked" }}
                              @endif>
                                Thrombocytopenia
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="osteomyelitis" type="checkbox" value="1184" @if ($data[0]->osteomyelitis == '1184')
                              {{ "checked" }}
                              @endif>
                                Osteitis/Osteomyelitis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="toxic_shock_syndrome" type="checkbox" value="1" @if ($data[0]->toxic_shock_syndrome == '1')
                              {{ "checked" }}
                              @endif>
                                Toxic shock syndrome
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="sepsis" type="checkbox" value="0744" @if ($data[0]->sepsis == '0744')
                              {{ "checked" }}
                              @endif>
                                Sepsis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="anaphylaxis" type="checkbox" value="2237" @if ($data[0]->anaphylaxis == '2237')
                              {{ "checked" }}
                              @endif>
                                Anaphylaxis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="GBS)" type="checkbox" value="1">
                              Guillain-Barré syndrome (GBS)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="other_symptoms_later_immunized_chk" type="checkbox" value="9999" @if ($data[0]->other_symptoms_later_immunized == '9999')
                              {{ "checked" }}
                              @endif>
                                other
                            </label>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <div id="other_symptoms_later_immunized" style="display: none">
                                <input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
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
                  {{-- คอรั่มภายใน3.4 --}}
                  <div class="col-md-3">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>ว/ด/ป ที่เกิดอาการ :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_stdiag" name="date_of_symptoms" value="{{$data[0]->date_of_symptoms}}">
                            </div>
                          </div>
                        </div>
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="col-lg-8">
                              <label>เวลาที่เกิดอาการ :</label>
                              <div class="input-group">
                                <input type="text" class="form-control timepicker_strdiag" name="time_of_symptoms" value="{{$data[0]->time_of_symptoms}}">

                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>ว/ด/ป ที่รับรักษา :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_hdate" name="date_of_treatment" value="{{$data[0]->date_of_treatment}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>ว/ด/ป ที่จำหน่าย :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_sell" name="time_of_treatment" value="{{$data[0]->time_of_treatment}}">
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
                          <div class="col-lg-12">
                            <label>รายละเอียดอาการและการตรวจสอบ</label>
                            <textarea class="form-control" rows="3" name="Symptoms_details" value="{{$data[0]->time_of_treatment}}">{{$data[0]->time_of_treatment}}</textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis" name="diagnosis" class="form-control" placeholder="" value="{{$data[0]->diagnosis}}">
                          </div>
                        </div>
                      </div>


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
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms" value="1" @if ($data[0]->seriousness_of_the_symptoms == '1')
                            {{ "checked" }}
                            @endif>
                              ไม่ร้ายแรง
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms" value="2" @if ($data[0]->seriousness_of_the_symptoms == '2')
                            {{ "checked" }}
                            @endif>
                              ร้ายแรง
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="other_seriousness_of_the_symptoms" @if ($data[0]->seriousness_of_the_symptoms == '1')
                  {{-- {{$data[0]->other_seriousness_of_the_symptoms}} --}}
                  style="display: none"
                  @else
                  @endif>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <label>ระบุ :</label>
                      </div>
                    </div>
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="1" @if ($data[0]->other_seriousness_of_the_symptoms == '1')
                          {{ "checked" }}
                          @endif>
                            เสียชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="2" @if ($data[0]->other_seriousness_of_the_symptoms == '2')
                          {{ "checked" }}
                          @endif>
                            อันตรายถึงชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="3" @if ($data[0]->other_seriousness_of_the_symptoms == '3')
                          {{ "checked" }}
                          @endif>
                            พิการ/ไร้ความสามารถ
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="4" @if ($data[0]->other_seriousness_of_the_symptoms == '4')
                          {{ "checked" }}
                          @endif>
                            รับไว้รักษาในโรงพยาบาล
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="5" @if ($data[0]->other_seriousness_of_the_symptoms == '5')
                          {{ "checked" }}
                          @endif>
                            ความผิดปกติแต่กำเนิด
                        </label>
                      </div>
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms" value="6" @if ($data[0]->other_seriousness_of_the_symptoms == '6')
                          {{ "checked" }}
                          @endif>
                            อื่นๆที่มีความสำคัญทางการแพทย์
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                          <label></label><input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms" class="form-control" value="{{$data[0]->text_other_seriousness_symptoms}}">
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
                      <font style="color:red;">*</font> สภาพผู้ป่วย
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <!-- checkbox3.5.1  -->
                    <div class="form-group">
                      <div class="col-md-1">
                        <label>
                          <input type="radio" name="patient_status" value="1" @if ($data[0]->patient_status == '1')
                          {{ "checked" }}
                          @endif>
                            หาย
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" name="patient_status" value="2" @if ($data[0]->patient_status == '2')
                          {{ "checked" }}
                          @endif>
                            หายโดยมีร่องรอย
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" name="patient_status" value="3" @if ($data[0]->patient_status == '3')
                          {{ "checked" }}
                          @endif>
                            อาการดีขึ้นแต่ยังไม่หาย
                        </label>
                      </div>
                      <div class="col-md-1">
                        <label>
                          <input type="radio" name="patient_status" value="4" @if ($data[0]->patient_status == '4')
                          {{ "checked" }}
                          @endif>
                            ไม่หาย
                        </label>
                      </div>
                      <div class="col-md-1">
                        <label>
                          <input type="radio" name="patient_status" value="5" @if ($data[0]->patient_status == '5')
                          {{ "checked" }}
                          @endif>
                            ไม่ทราบ
                        </label>
                      </div>
                      <div class="col-md-1">
                        <label>
                          <input type="radio" name="patient_status" value="6" @if ($data[0]->patient_status == '6')
                          {{ "checked" }}
                          @endif>
                            เสียชีวิต
                        </label>
                      </div>
                      <div class="col-lg-4">
                        <div class="input-group date">
                          <div id="other_patian_sta" style="display: none">
                            <input type="text" class="form-control" id="datepicker_dead" name="date_dead" hidden="true" value="{{($data[0]->date_dead)}}">
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
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral" value="1" @if ($data[0]->funeral == '1')
                      {{ "checked" }}
                      @endif>
                        ไม่มี
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral" value="2" @if ($data[0]->funeral == '2')
                      {{ "checked" }}
                      @endif>
                        ไม่ทราบ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral" value="3" @if ($data[0]->funeral == '3')
                      {{ "checked" }}
                      @endif>
                        มี
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="other_address_funeral" style="display: none">
                      <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text" name="other_address_funeral" class="form-control" value="{{$data[0]->other_address_funeral}}">
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
                          <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate1" value="1" @if ($data[0]->necessary_to_investigate == '1')
                          {{ "checked" }}
                          @endif>
                            ไม่มี
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="radio">
                        <label>
                          <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate2" value="2" @if ($data[0]->necessary_to_investigate == '2')
                          {{ "checked" }}
                          @endif>
                            มี
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="radio">
                        <label>
                          วันที่สอบสวน :
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
                            <input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date" value="{{$data[0]->necessary_to_investigate_date}}">
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
                            <label>ชื่อผู้วินิจฉัยอาการ :</label>
                            <input type="text" id="symptom_name" name="symptom_name" class="form-control" value="{{$data[0]->symptom_name}}">
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
                                <input type="radio" name="symptom_position" value="1" @if ($data[0]->symptom_position == '1')
                                {{ "checked" }}
                                @endif>
                                  แพทย์
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="symptom_position" value="2" @if ($data[0]->symptom_position == '2')
                                {{ "checked" }}
                                @endif>
                                  เภสัชกร
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="symptom_position" value="3" @if ($data[0]->symptom_position == '3')
                                {{ "checked" }}
                                @endif>
                                  พยาบาล
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="symptom_position" value="4" @if ($data[0]->symptom_position == '4')
                                {{ "checked" }}
                                @endif>
                                  อื่นๆระบุ
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div id="other_symptom_position" style="display: none">
                              <input type="text" id="other_symptom_position_text" name="other_symptom_position" class="form-control" value="{{$data[0]->symptom_name}}" hidden="true">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>ชื่อผู้รายงาน :</label><input type="text" id="reporter_name" name="reporter_name" class="form-control" value="{{$data[0]->reporter_name}}">
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
                                <input type="radio" name="reporter_position" value="1" @if ($data[0]->reporter_position == '1')
                                {{ "checked" }}
                                @endif>
                                  งานระบาดวิทยา
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="reporter_position" value="2" @if ($data[0]->reporter_position == '2')
                                {{ "checked" }}
                                @endif>
                                  เภสัชกร
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="reporter_position" value="3" @if ($data[0]->reporter_position == '3')
                                {{ "checked" }}
                                @endif>
                                  งานEIP
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="reporter_position" value="4" @if ($data[0]->reporter_position == '4')
                                {{ "checked" }}
                                @endif>
                                  อื่นๆระบุ
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div id="other_reporter_position" style="display: none">
                              <input type="text" id="other_reporter_position_text" name="other_reporter_position" class="form-control" value="{{$data[0]->other_reporter_position}}" hidden="true">
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
                              <input type="text" class="form-control pull-right" id="datepicker_found_event" name="date_found_event" value="{{$data[0]->date_found_event}}">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <label>สถานที่เกิดเหตุการณ์ :</label><input type="text" id="event_location" name="event_location" class="form-control" value="{{$data[0]->event_location}}">
                          </div>
                          <div class="col-lg-4">
                            <label>จังหวัด :</label>
                            <select id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="{{$data[0]->province_found_event}}">
                                {{ isset($listProvince[$data[0]->province_found_event]) ? $listProvince[$data[0]->province_found_event]:"ไม่ระบุข้อมูล"}}</option>
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
                            <label>หน่วยที่รายงาน :</label><input type="text" id="unit_reported" name="unit_reported" class="form-control" value="{{$data[0]->unit_reported}}">
                          </div>
                          <div class="col-lg-4">
                            <label>จังหวัด :</label>
                            <select id="province_reported" name="province_reported" class="form-control" style="width: 100%;">
                              <option class="badge filter badge-info" data-color="info" value="{{$data[0]->province_reported}}">{{ isset($listProvince[$data[0]->province_reported]) ? $listProvince[$data[0]->province_reported] : "ไม่ระบุข้อมูล" }}
                              </option>
                              <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"> <?php echo $v ; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-lg-4">
                            <label>โทร :</label><input type="text" id="tel_reported" name="tel_reported" class="form-control" value="{{$data[0]->tel_reported}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-4">
                            <label>Email :</label><input type="text" id="email_reported" name="email_reported" class="form-control" value="{{$data[0]->email_reported}}">
                          </div>
                          <div class="col-lg-4">
                            <label>ว/ด/ป ที่ส่งรายงาน :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported" value="{{$data[0]->datepicker_send_reported}}">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <label>ว/ด/ป ที่รับรายงาน :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_resiver" name="datepicker_resiver" value="{{$data[0]->datepicker_resiver}}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                      {{-- input content --}}
                      <div class="form-group">
                        <div class="col-lg-12">
                          <label>ความคิดเห็นเพิ่มเติม</label>
                          <textarea class="form-control" rows="3" id="more_reviews" name="more_reviews">{{$data[0]->other_reporter_position}}</textarea>
                        </div>
                      </div>
                    </div>
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
                              <input type="checkbox" name="assessment1" @if ($data[0]->assessment1 == '1')
                              {{ "checked" }}
                              @endif>
                                ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="assessment2" @if ($data[0]->assessment2 == '1')
                              {{ "checked" }}
                              @endif>
                                ใช่
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="assessment3" @if ($data[0]->assessment3 == '1')
                              {{ "checked" }}
                              @endif>
                                น่าจะใช่
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="assessment4" @if ($data[0]->assessment4 == '1')
                              {{ "checked" }}
                              @endif>
                                อาจจะใช่
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="assessment5" @if ($data[0]->assessment5 == '1')
                              {{ "checked" }}
                              @endif>
                                ไม่ใช่
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="assessment6" @if ($data[0]->assessment6 == '1')
                              {{ "checked" }}
                              @endif>
                                ความบกพร่องของวัคซีน
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="assessment7" @if ($data[0]->assessment7 == '1')
                              {{ "checked" }}
                              @endif>
                                ความคลาดเคลื่อนด้านการให้บริการ
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="assessment8" @if ($data[0]->assessment8 == '1')
                              {{ "checked" }}
                              @endif>
                                เหตุบังเอิญ/เห็นพ้อง
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="assessment9" @if ($data[0]->assessment9 == '1')
                              {{ "checked" }}
                              @endif>
                                ความกลัว/ความกังวล
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="assessment10" @if ($data[0]->assessment10 == '1')
                              {{ "checked" }}
                              @endif>
                                ไม่สามารถระบุได้
                            </label>
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
                  <button type="button" class="btn btn-block btn-danger">ย้อนกลับ</button>
                </div>
                <div class="col-md-3">
                  <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-block btn-success"></button>
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
{{-- <script>
$(function(){
    $('#addMore').on('click', function() {
              var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
              data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
});
</script> --}}
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
      var contactdiv = '<tr class="data-contact-person">' +
        '<td>' +
        '<select type="text" id="name_of_vaccine1" name="name_of_vaccine[]' + rowCount + '" value="" class="form-control">' +
        '<option value="">กรุณาระบุชื่อวัคซีน</option>' +
        @foreach($vac_list as $row)
      '<option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>' +
      @endforeach
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccine_volume1" name="vaccine_volume[]' + rowCount + '" value="" class="form-control">' +
        '<option value="">กรุณาระบุปริมาณที่ให้</option>' +
        <?php
      foreach($arr_vaccine_volume as $k => $v) {
        ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="route_of_vaccination1" name="route_of_vaccination[]' + rowCount + '" value="" class="form-control">' +
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
        '<select type="text" id="vaccination_site1" name="vaccination_site[]' + rowCount + '" value="" class="form-control">' +
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
        '<input type="number" id="dose1" name="dose[]' + rowCount + '" value="" class="form-control" min="1" max="20">' +
        '</td>' +
        '<td>' +
        '<input type="text" name="date_of_vaccination[]' + rowCount + '" value="" id="date_of_vaccination1' + rowCount + '" class="form-control datepicker" data-date-format="yyyy-mm-dd">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="time_of_vaccination1' + rowCount + '" name="time_of_vaccination[]' + rowCount + '" value="" class="form-control">' +
        '</td>' +
        '<td>' +
        '<select type="text" id="manufacturer1" name="manufacturer[]' + rowCount + '" value="" class="form-control">' +
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
        '<input type="text" id="lot_number1" name="lot_number[]' + rowCount + '" value="" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date1' + rowCount + '" name="expiry_date[]' + rowCount + '" value="" class="form-control" data-date-format="yyyy-mm-dd">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="name_of_diluent1" name="name_of_diluent[]' + rowCount + '" value="" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="lot_number_diluent1" name="lot_number_diluent[]' + rowCount + '" value="" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date_diluent1' + rowCount + '" name="expiry_date_diluent[]' + rowCount + '" value="" class="form-control" data-date-format="yyyy-mm-dd">' +
        '</td>' +
        '<td><input type="text" id="date_of_reconstitution1' + rowCount + '" name="date_of_reconstitution[]' + rowCount + '" value="" class="form-control datepicker" data-date-format="yyyy-mm-dd"></td>' +
        '<td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]' + rowCount + '" value="" class="form-control"></td>' +
        '<td><button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">เพิ่มสมาชิกทีมสอบสวนโรค</button>' +
        '<button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-xs">ลบรายชื่อ</button></td>' +
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

  });
</script>
@stop
