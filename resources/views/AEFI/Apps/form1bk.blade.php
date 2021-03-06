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
        <form role="form" action="{{ route('insertform1') }}" method="post">
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
                    {{ csrf_field() }}
                    <!-- เลขที่ผู้ป่วย -->
                    <input type="hidden" id="id_case" name="id_case" value="<?php echo $id_case; ?>" class="form-control">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 control-label">
                          <label>เลขที่ผู้ป่วย:</label>
                        </div>
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
                        <div class="col-lg-7">
                          <input type="text" id="id_number" name="id_number" class="form-control" data-inputmask='"mask": "9 9999 99999 99 9"' data-mask>
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
                              <input type="radio" name="gender" id="optionsRadios1" value="1" checked>
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
                            <font style="color:red;">*</font> วันเดือนปีเกิด:
                          </label>
                        </div>
                        <div class="col-lg-9">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="birthdate" class="form-control pull-right" id="datepicker_bdate" data-date-format="yyyy-mm-dd" required>
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
                          <input type="text" id="age_while_sick_year" name="age_while_sick_year" class="form-control" placeholder="ปี">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                          <input type="text" id="age_while_sick_month" name="age_while_sick_month" class="form-control" placeholder="เดือน">
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                          <input type="text" id="age_while_sick_day" name="age_while_sick_day" class="form-control" placeholder="วัน">
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
                              <input type="radio" name="group_age" id="G_age1" value="1" checked>
                              < 1 ปี </label> </div> </div> <div class="col-lg-2">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="group_age" id="G_age2" value="2">
                                    1-5 ปี
                                  </label>
                                </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="group_age" id="G_age3" value="3">
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
                                <input type="radio" name="nationality" value="1" checked>
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
                          <div class="col-lg-2">
                            <div class="radio">
                              <label>
                                <input type="radio" name="nationality" value="4">
                                อื่นๆ
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div id="other_nationality" style="display: none">
                              <input type="text" id="other_nationality_text" name="other_nationality" class="form-control" placeholder="ระบุสัญชาติ" hidden="true">
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
                                <input type="radio" name="type_of_patient" id="type_of_patient1" value="1" checked>
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
                              <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="1" checked>
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
<option class="badge filter badge-info" data-color="info" value="">กรุณาเลือก</option>
                              <?php
										  foreach ($arr_history_of_vaccine as $k=>$v) { ?>
                              <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                              <?php } ?>
                            </select>
                            <label>ยาที่แพ้ :</label>
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
                        <div class="col-lg-3">
                          <div class="radio">
                            <label>
                              <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="1" checked>
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
                            <label>วัคซีนที่แพ้ :</label>
                            <select id="other_patient_develop_symptoms_after_previous_vaccination_text" name="other_patient_develop_symptoms_after_previous_vaccination" class="form-control select2" style="width: 100%;">
<option class="badge filter badge-info" data-color="info" value="">กรุณาเลือก</option>
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
                              <input type="radio" name="underlying_disease" value="1" checked>
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
                              <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="1" checked>
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
                            <input type="text" id="other_history_of_drug_use_within_1_month_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true">
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
                      <option value="0">=== จังหวัด ===</option>
                      @foreach ($list as $row)
                      <option value="{{$row->province_id}}">{{$row->province_name}}</option>
                      @endforeach
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control amphures" name="district">
                      <option value="0">=== อำเภอ ===</option>
                    </select>
                    <!-- /.p_id tname  -->
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control district" name="subdistrict">
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
                <div style="overflow: scroll;">
                  <button type="button" id="btnAdd" class="btn btn-block btn-success">เพิ่มสมาชิกทีมสอบสวนโรค</button>
                  <table id="customers">
                    <thead>
                      <tr>
                        <th>#</th>
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
                        {{-- <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <input type="checkbox" id="checkBoxID1" name="no_lab1" value="1">
                          {{-- <input type="text" name="no_lab1" value="1" class="form-control"></td> --}}
                        </td>
                        <td>
                          <select type="text" id="name_of_vaccine1" name="name_of_vaccine1" value="" class="form-control divID1">
                            <option value="">กรุณาระบุชื่อวัคซีน</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume1" name="vaccine_volume1" value="" class="form-control divID1">
                            <option value="">กรุณาระบุปริมาณที่ให้</option>
                            <?php
                               foreach ($arr_vaccine_volume as $k=>$v) {
                               ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="route_of_vaccination1" name="route_of_vaccination1" value="" class="form-control divID1">
                            <option value="">กรุณาระบุวิธีที่ให้</option>
                            <?php
                                 foreach ($arr_route_of_vaccination as $k=>$v) {
                             ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccination_site1" name="vaccination_site1" value="" class="form-control divID1">
                            <option value="">กรุณาระบุวิธีตำแหน่ง</option>
                            <?php
                                 foreach ($arr_vaccination_site as $k=>$v) {
                             ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="number" id="dose1" name="dose1" value="" class="form-control divID1" min="1" max="20">
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination" id="date_of_vaccination1" value="" class="form-control datepicker divID1" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination1" name="time_of_vaccination1" value="" class="form-control divID1">
                        </td>
                        <td>
                          <select type="text" id="manufacturer1" name="manufacturer1" value="" class="form-control divID1">
                            <option value="">กรุณาระบชื่อผู้ผลิต</option>
                            <?php
                                 foreach ($arr_manufacturer as $k=>$v) {
                             ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="lot_number1" name="lot_number1" value="" class="form-control divID1">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date1" name="expiry_date1" value="" class="form-control divID1" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="name_of_diluent1" name="name_of_diluent1" value="" class="form-control divID1">
                        </td>
                        <td>
                          <input type="text" id="lot_number_diluent1" name="lot_number_diluent1" value="" class="form-control divID1">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent1" value="" class="form-control divID1" data-date-format="yyyy-mm-dd">
                        </td>
                        <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution1" value="" class="form-control datepicker divID1" data-date-format="yyyy-mm-dd"></td>
                        <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution1" value="" class="form-control divID1"></td>
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" id="checkBoxID2" name="no_lab2" value="2">
                          {{-- <input type="text" name="no_lab1" value="1" class="form-control"></td> --}}
                        </td>
                        <td>
                          <select type="text" id="name_of_vaccine2" name="name_of_vaccine2" value="" class="form-control divID2">
                            <option value="">กรุณาระบุชื่อวัคซีน</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume2" name="vaccine_volume2" value="" class="form-control divID2">
                            <option value="">กรุณาระบุชื่อปริมานที่ให้</option>
                            <?php
                                 foreach ($arr_vaccine_volume as $k=>$v) {
                                 ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="route_of_vaccination2" name="route_of_vaccination2" value="" class="form-control divID2">
                            <option value="">กรุณาระบุชื่อวิธีที่ให้</option>
                            <?php
                                   foreach ($arr_route_of_vaccination as $k=>$v) {
                               ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccination_site2" name="vaccination_site2" value="" class="form-control divID2">
                            <option value="">กรุณาระบุตำแหน่ง</option>
                            <?php
                                   foreach ($arr_vaccination_site as $k=>$v) {
                               ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="number" id="dose2" name="dose2" value="" class="form-control divID2" min="1" max="20">
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination" id="date_of_vaccination2" value="" class="form-control datepicker divID2" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination2" name="time_of_vaccination2" value="" class="form-control divID2">
                        </td>
                        <td>
                          <select type="text" id="manufacturer2" name="manufacturer2" value="" class="form-control divID2">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            <?php
                                   foreach ($arr_manufacturer as $k=>$v) {
                               ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="lot_number2" name="lot_number2" value="" class="form-control divID2">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date2" name="expiry_date2" value="" class="form-control divID2" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="name_of_diluent2" name="name_of_diluent2" value="" class="form-control divID2">
                        </td>
                        <td>
                          <input type="text" id="lot_number_diluent2" name="lot_number_diluent2" value="" class="form-control divID2">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent2" name="expiry_date_diluent2" value="" class="form-control divID2" data-date-format="yyyy-mm-dd">
                        </td>
                        <td><input type="text" id="date_of_reconstitution2" name="date_of_reconstitution2" value="" class="form-control datepicker divID2" data-date-format="yyyy-mm-dd"></td>
                        <td><input type="text" id="time_of_reconstitution2" name="time_of_reconstitution2" value="" class="form-control divID2"></td>
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" id="checkBoxID3" name="no_lab3" value="3">
                          {{-- <input type="text" name="no_lab1" value="1" class="form-control"></td> --}}
                        </td>
                        <td>
                          <select type="text" id="name_of_vaccine3" name="name_of_vaccine3" value="" class="form-control divID3">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume3" name="vaccine_volume3" value="" class="form-control divID3">
                            <option value="">กรุณาระบุปริมาณที่ให้</option>
                            <?php
                                   foreach ($arr_vaccine_volume as $k=>$v) {
                                   ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="route_of_vaccination3" name="route_of_vaccination3" value="" class="form-control divID3">
                            <option value="">กรุณาระบุวิธีให้</option>
                            <?php
                                     foreach ($arr_route_of_vaccination as $k=>$v) {
                                 ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccination_site3" name="vaccination_site3" value="" class="form-control divID3">
                            <option value="">กรุณาระบุตำแหน่ง</option>
                            <?php
                                     foreach ($arr_vaccination_site as $k=>$v) {
                                 ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="number" id="dose3" name="dose3" value="" class="form-control divID3" min="1" max="20">
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination" id="date_of_vaccination3" value="" class="form-control datepicker divID3" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination3" name="time_of_vaccination3" value="" class="form-control divID3">
                        </td>
                        <td>
                          <select type="text" id="manufacturer3" name="manufacturer3" value="" class="form-control divID3">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            <?php
                                     foreach ($arr_manufacturer as $k=>$v) {
                                 ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="lot_number3" name="lot_number3" value="" class="form-control divID3">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date3" name="expiry_date3" value="" class="form-control divID3" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="name_of_diluent3" name="name_of_diluent3" value="" class="form-control divID3">
                        </td>
                        <td>
                          <input type="text" id="lot_number_diluent3" name="lot_number_diluent3" value="" class="form-control divID3">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent3" name="expiry_date_diluent3" value="" class="form-control divID3" data-date-format="yyyy-mm-dd">
                        </td>
                        <td><input type="text" id="date_of_reconstitution3" name="date_of_reconstitution3" value="" class="form-control datepicker divID3" data-date-format="yyyy-mm-dd"></td>
                        <td><input type="text" id="time_of_reconstitution3" name="time_of_reconstitution3" value="" class="form-control divID3"></td>
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" id="checkBoxID4" name="no_lab4" value="4">
                          {{-- <input type="text" name="no_lab1" value="1" class="form-control"></td> --}}
                        </td>
                        <td>
                          <select type="text" id="name_of_vaccine4" name="name_of_vaccine4" value="" class="form-control divID4">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume4" name="vaccine_volume4" value="" class="form-control divID4">
                            <option value="">กรุณาระบุปริมาณที่ให้</option>
                            <?php
                                     foreach ($arr_vaccine_volume as $k=>$v) {
                                     ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="route_of_vaccination4" name="route_of_vaccination4" value="" class="form-control divID4 divID4">
                            <option value="">กรุณาระบุวิธีให้</option>
                            <?php
                                       foreach ($arr_route_of_vaccination as $k=>$v) {
                                   ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccination_site4" name="vaccination_site4" value="" class="form-control divID4">
                            <option value="">กรุณาระบุตำแหน่ง</option>
                            <?php
                                       foreach ($arr_vaccination_site as $k=>$v) {
                                   ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="number" id="dose4" name="dose4" value="" class="form-control divID4" min="1" max="20">
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination" id="date_of_vaccination4" value="" class="form-control datepicker divID4" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination4" name="time_of_vaccination4" value="" class="form-control divID4">
                        </td>
                        <td>
                          <select type="text" id="manufacturer4" name="manufacturer4" value="" class="form-control divID4">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            <?php
                                       foreach ($arr_manufacturer as $k=>$v) {
                                   ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="lot_number4" name="lot_number4" value="" class="form-control divID4">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date4" name="expiry_date4" value="" class="form-control divID4" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="name_of_diluent4" name="name_of_diluent4" value="" class="form-control divID4">
                        </td>
                        <td>
                          <input type="text" id="lot_number_diluent4" name="lot_number_diluent4" value="" class="form-control divID4">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent4" name="expiry_date_diluent4" value="" class="form-control divID4" data-date-format="yyyy-mm-dd">
                        </td>
                        <td><input type="text" id="date_of_reconstitution4" name="date_of_reconstitution4" value="" class="form-control datepicker divID4" data-date-format="yyyy-mm-dd"></td>
                        <td><input type="text" id="time_of_reconstitution4" name="time_of_reconstitution4" value="" class="form-control divID4"></td>
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" id="checkBoxID5" name="no_lab5" value="5">
                          {{-- <input type="text" name="no_lab1" value="1" class="form-control"></td> --}}
                        </td>
                        <td>
                          <select type="text" id="name_of_vaccine5" name="name_of_vaccine5" value="" class="form-control divID5">
                            <option value="">กรุณาระบุชื่อวัคซีน</option>
                            @foreach ($vac_list as $row)
                            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccine_volume5" name="vaccine_volume5" value="" class="form-control divID5">
                            <option value="">กรุณาระบุปริมาณที่ให้</option>
                            <?php
                                       foreach ($arr_vaccine_volume as $k=>$v) {
                                       ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="route_of_vaccination5" name="route_of_vaccination5" value="" class="form-control divID5">
                            <option value="">กรุณาระบุวิธีให้</option>
                            <?php
                                         foreach ($arr_route_of_vaccination as $k=>$v) {
                                     ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <select type="text" id="vaccination_site5" name="vaccination_site5" value="" class="form-control divID5">
                            <option value="">กรุณาระบุตำแหน่ง</option>
                            <?php
                                         foreach ($arr_vaccination_site as $k=>$v) {
                                     ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="number" id="dose5" name="dose5" value="" class="form-control divID5" min="1" max="20">
                        </td>
                        <td>
                          <input type="text" name="date_of_vaccination" id="date_of_vaccination5" value="" class="form-control datepicker divID5" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="time_of_vaccination5" name="time_of_vaccination5" value="" class="form-control divID5">
                        </td>
                        <td>
                          <select type="text" id="manufacturer5" name="manufacturer5" value="" class="form-control divID5">
                            <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                            <?php
                                         foreach ($arr_manufacturer as $k=>$v) {
                                     ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" id="lot_number5" name="lot_number3" value="" class="form-control divID5">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date5" name="expiry_date5" value="" class="form-control divID5" data-date-format="yyyy-mm-dd">
                        </td>
                        <td>
                          <input type="text" id="name_of_diluent5" name="name_of_diluent5" value="" class="form-control divID5">
                        </td>
                        <td>
                          <input type="text" id="lot_number_diluent5" name="lot_number_diluent5" value="" class="form-control divID5">
                        </td>
                        <td>
                          <input type="text" id="datepicker_expiry_date_diluent5" name="expiry_date_diluent5" value="" class="form-control divID5">
                        </td>
                        <td><input type="text" id="date_of_reconstitution5" name="date_of_reconstitution5" value="" class="form-control datepicker divID5" data-date-format="yyyy-mm-dd"></td>
                        <td><input type="text" id="time_of_reconstitution5" name="time_of_reconstitution5" value="" class="form-control divID5"></td>
                        {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
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
                  <div class="col-md-3">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="rash" value="0027">
                              Rash
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="erythema" value="0028">
                              Erythema
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="urticaria" value="0044">
                              Urticaria
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="itching" value="0026">
                              Itching
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="edema" value="0003A">
                              Edema
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label>
                              <input type="checkbox" name="angioedema" value="0003">
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
                              <input type="checkbox" name="fainting" value="1">
                              Fainting
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="hyperventilation" value="0517">
                              Hyperventilation
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="syncope" value="0223">
                              Syncope
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="headche" value="1">
                              Headche
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="dizziness" value="0101">
                              Dizziness
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="fatigue" value="0724">
                              Fatigue
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="malaise" value="0728">
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
                              <input type="checkbox" name="dyspepsia" value="0279">
                              Dyspepsia
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="diarrhea" value="1">
                              Diarrhea
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="nausea" value="0308">
                              Nausea
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="vomiting" value="0228">
                              Vomiting
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="abdominal_pain" value="0268">
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
                              <input type="checkbox" name="arthalgia" value="1">
                              Arthalgia
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="myalgia" value="0072">
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
                              <input type="checkbox" name="fever38c" value="0725">
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
                                <input type="checkbox" name="swelling_at_the_injection" value="1">
                                บวมบริเวณที่ฉีดนานเกิน3วัน
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="swelling_beyond_nearest_joint" value="1">
                                บวมลามไปถึงข้อที่ใกล้ที่สุด
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="lymphadenopathy" value="0577">
                                Lymphadenopathy
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="lymphadenitis" value="0577D">
                                Lymphadenitis
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6">
                              <label>
                                <input type="checkbox" name="sterile_abscess" value="0051">
                                Sterile abscess
                              </label>
                            </div>
                            <div class="col-md-6">
                              <label>
                                <input type="checkbox" name="bacterial_abscess" value="1">
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
                              <input type="checkbox" name="febrile_convulsion" value="1">
                              Febrile convulsion
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="afebrile_convulsion" value="1">
                              Afebrile convulsion
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" name="encephalopathy" value="0105">
                              Encephalopathy
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="flaccid_paralysis" value="0139">
                              Flaccid paralysis
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" name="spastic_paralysis" value="0775">
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
                              <input name="hhe" type="checkbox" value="1704">
                              Hypotonic Hyporesponsive episode (HHE)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="persistent_inconsolable_crying" type="checkbox" value="1">
                              Persistent inconsolable crying
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="thrombocytopenia" type="checkbox" value="0594">
                              Thrombocytopenia
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="osteomyelitis" type="checkbox" value="1184">
                              Osteitis/Osteomyelitis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="toxic_shock_syndrome" type="checkbox" value="1">
                              Toxic shock syndrome
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="sepsis" type="checkbox" value="0744">
                              Sepsis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input name="anaphylaxis" type="checkbox" value="2237">
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
                              <input name="other_symptoms_later_immunized_chk" type="checkbox" value="9999">
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
                              <input type="text" class="form-control pull-right" id="datepicker_stdiag" name="date_of_symptoms" data-date-format="yyyy-mm-dd">
                            </div>
                          </div>
                        </div>
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="col-lg-8">
                              <label>เวลาที่เกิดอาการ :</label>
                              <div class="input-group">
                                <input type="text" class="form-control timepicker_strdiag" name="time_of_symptoms">

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
                              <input type="text" class="form-control pull-right" id="datepicker_hdate" name="date_of_treatment" data-date-format="yyyy-mm-dd">
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
                              <input type="text" class="form-control pull-right" id="datepicker_sell" name="time_of_treatment" data-date-format="yyyy-mm-dd">
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
                            <textarea class="form-control" rows="3" name="Symptoms_details"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis" name="diagnosis" class="form-control" placeholder="">
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
                            <input type="radio" name="seriousness_of_the_symptoms" value="1" checked>
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
                  <div id="other_seriousness_of_the_symptoms" style="display: none">
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
                      <div class="col-md-4">
                        <label>
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
                            <input type="radio" name="patient_status" value="1" checked>
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
                        <div class="col-md-1">
                          <label>
                            <input type="radio" name="patient_status" value="4">
                            ไม่หาย
                          </label>
                        </div>
                        <div class="col-md-1">
                          <label>
                            <input type="radio" name="patient_status" value="5">
                            ไม่ทราบ
                          </label>
                        </div>
                        <div class="col-md-1">
                          <label>
                            <input type="radio" name="patient_status" value="6">
                            เสียชีวิต
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group date">
                            <div id="other_patian_sta" style="display: none">
                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead" hidden="true" data-date-format="yyyy-mm-dd">
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
                        <input type="radio" name="funeral" value="1" checked>
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
                            <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate1" value="1" checked>
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
                              <input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date" data-date-format="yyyy-mm-dd">
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
                                  <input type="radio" name="symptom_position" value="1" checked>
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
                                  <input type="radio" name="reporter_position" value="1" checked>
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
                                <input type="text" class="form-control pull-right" id="datepicker_found_event" name="date_found_event" data-date-format="yyyy-mm-dd">
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>สถานที่เกิดเหตุการณ์ :</label><input type="text" id="event_location" name="event_location" class="form-control" placeholder="สถานที่เกิดเหตุการณ์">
                            </div>
                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;">
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
                              <label>หน่วยที่รายงาน :</label><input type="text" id="unit_reported" name="unit_reported" class="form-control" placeholder="หน่วยที่รายงาน">
                            </div>
                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_reported" name="province_reported" class="form-control" style="width: 100%;">
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
                                <input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported" data-date-format="yyyy-mm-dd">
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่รับรายงาน :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker_resiver" name="datepicker_resiver" data-date-format="yyyy-mm-dd">
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
        </form>
      </div>
      <!-- /.box -->
    </div>
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
@stop
