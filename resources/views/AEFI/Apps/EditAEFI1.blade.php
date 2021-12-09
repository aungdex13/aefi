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
$arr_title_name = load_title_name();
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
                    <input type="hidden" id="user_username" name="user_username" value="{{auth()->user()->username}}" class="form-control">
                    <input type="hidden" id="user_hospcode" name="user_hospcode" value="{{auth()->user()->hospcode}}" class="form-control">
                    <input type="hidden" id="user_provcode" name="user_provcode" value="{{auth()->user()->prov_code}}" class="form-control">
                    <input type="hidden" id="user_region" name="user_region" value="{{auth()->user()->region}}" class="form-control">
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
                          <input type="text" id="id_number" name="id_number" value="{{ $data[0]->id_number }}" class="form-control" data-inputmask='"mask": "9999999999999"' data-mask>
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
                            <option value="{{ $data[0]->title_name }}">{{ $arr_title_name[$data[0]->title_name] }}</option>
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
                        <div class="col-lg-4" id="hidden_div1" @if ($data[0]->title_name != 99)
                        style="display: none;" @endif>
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
                            <input type="radio" name="gender" id="optionsRadios1" value="" @if ($data[0]->gender == null)
                            {{ "checked" }}
                            @endif>
                              ไม่ระบุ
                          </label>
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
                          @php
                             $var = $data[0]->birthdate;
                             $date = str_replace('-', '/', $var); 
                          @endphp
                          <input type="text" name="birthdate" class="form-control pull-right" id="datepicker_bdate" value="{{ date('d/m/Y', strtotime($date)) }}" readonly>
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
                        <textarea class="form-control" name="age_while_sick_year" id="yallage" placeholder="ปี" rows="1">{{$data[0]->age_while_sick_year}}</textarea>ปี
                        {{-- <input type="text" id="age_while_sick_year" name="age_while_sick_year" class="form-control" placeholder="ปี"> --}}
                        <!-- /input-group -->
                      </div>
                      <!-- /.col-lg-4 -->
                      <div class="col-lg-3">
                        <textarea class="form-control" name="age_while_sick_month" id="mallage" placeholder="ปี" rows="1">{{$data[0]->age_while_sick_month}}</textarea>เดือน
                        {{-- <input type="text" id="age_while_sick_month" name="age_while_sick_month" class="form-control" placeholder="เดือน" value="{{$data[0]->age_while_sick_month}}"> --}}
                        <!-- /input-group -->
                      </div>
                      <!-- /.col-lg-4 -->
                      <div class="col-lg-3">
                        <textarea class="form-control" name="age_while_sick_day" id="dallage" placeholder="ปี" rows="1">{{$data[0]->age_while_sick_day}}</textarea>วัน
                        {{-- <input type="text" id="age_while_sick_day" name="age_while_sick_day" class="form-control" placeholder="วัน" value="{{$data[0]->age_while_sick_day}}"> --}}
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
          <input type="radio" name="group_age" value="1" @if ($data[0]->group_age == 1)
          {{ "checked" }}
          @endif>
          < 1 ปี
        </label>
    </div>
  </div>
  <div class="col-lg-2">
    <div class="radio">
      <label>
        <input type="radio" name="group_age" value="2"  @if ($data[0]->group_age == 2)
        {{ "checked" }}
        @endif>
        1-4 ปี
      </label>
    </div>
  </div>
    <div class="col-lg-2">
      <div class="radio">
        <label>
          <input type="radio" name="group_age" value="3"  @if ($data[0]->group_age == 3)
          {{ "checked" }}
          @endif>
          5-17 ปี
        </label>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="radio">
        <label>
          <input type="radio" name="group_age" id="G_age1" value="4" @if ($data[0]->group_age == 4)
          {{ "checked" }}
          @endif>
          18-20 ปี
         </label> 
        </div> 
      </div>
      <div class="col-lg-3">
      </div>
      <div class="col-lg-2">
        <div class="radio">
            <label>
              <input type="radio" name="group_age" id="G_age2" value="5" @if ($data[0]->group_age == 5)
              {{ "checked" }}
              @endif>
              21-40 ปี
            </label>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="radio">
          <label>
            <input type="radio" name="group_age" id="G_age3" value="6" @if ($data[0]->group_age == 6)
            {{ "checked" }}
            @endif>
            41-60 ปี
          </label>
        </div>
      </div>                     
      <div class="col-lg-2">
        <div class="radio">
          <label>
            <input type="radio" name="group_age" id="G_age4" value="7" @if ($data[0]->group_age == 7)
            {{ "checked" }}
            @endif>
            61-80 ปี
          </label>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="radio">
          <label>
            <input type="radio" name="group_age" id="G_age5" value="8" @if ($data[0]->group_age == 8)
            {{ "checked" }}
            @endif>
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
                              <input type="radio" name="nationality" value="" @if ($data[0]->nationality == null)
                              {{ "checked" }}
                              @endif>
                                ไม่ระบุ
                            </label>
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
                        <div class="col-lg-3">
                          <div class="radio">

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
                        <div class="col-lg-2" hidden>
                          <div class="radio">
                            <label>
                              <input type="radio" name="type_of_patient" id="type_of_patient" value="" @if ($data[0]->type_of_patient == null)
                              {{ "checked" }}
                              @endif>
                                ไม่ระบุ
                            </label>
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
                        <div class="col-lg-4">
                          <div class="radio">
                            <label>
                              <input type="radio" name="type_of_patient" id="type_of_patient2" value="3" @if ($data[0]->type_of_patient == 3)
                              {{ "checked" }}
                              @endif>
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
                            อาชีพ:
                          </label>
                        </div>
                        <div class="col-lg-6">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              {{-- <i class="fa fa-calendar"></i> --}}
                            </div>
                            <select id="js-example-basic-single2" name="career_code" class="js-example-basic-single2 form-control" data-dropdown-css-class="select2-danger">
                              <option class="" data-color="info" value="{{isset($data[0]->career_code) ? $data[0]->career_code:null}}">
                                {{ isset($list_career[$data[0]->career_code]) ? $list_career[$data[0]->career_code]:"ไม่ระบุข้อมูล"}}
                              </option>
                            </select>
                            {{-- <input type="text" name="career" class="form-control" id="career" value="{{$data[0]->career}}" placeholder="อาชีพ"> --}}
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
                            <input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="" @if ($data[0]->history_of_vaccine_drug_allergies_of_patient == null)
                            {{ "checked" }}
                            @endif>
                              ไม่ระบุ
                          </label>
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
                        <div id="other_vaccination_history" @if ($data[0]->history_of_vaccine_drug_allergies_of_patient != 2)
                        style="display: none"
                        @endif>
                          <label>วัคซีนที่แพ้ :</label>
                          <select id="other_vaccination_history_text" name="other_vaccination_history" class="form-control select2" style="width: 100%;">
                            <option class="badge filter badge-info" data-color="info" value="{{ $data[0]->other_vaccination_history }}">
                              {{ isset($arr_history_of_vaccine[$data[0]->other_vaccination_history]) ? $arr_history_of_vaccine[$data[0]->other_vaccination_history]:"" }}</option>
                            <?php
										  foreach ($arr_history_of_vaccine as $k=>$v) { ?>
                            <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                            <?php } ?>
                          </select>
                          <label></br>ยาที่แพ้ :</label>
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
                          <input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="" @if ($data[0]->patient_develop_symptoms_after_previous_vaccination == null)
                          {{ "checked" }}
                          @endif>
                            ไม่ระบุ
                        </label>
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
                      <div id="other_patient_develop_symptoms_after_previous_vaccination" @if ($data[0]->patient_develop_symptoms_after_previous_vaccination != 2)
                      style="display: none"
                      @endif>
                        <label>อาการ :</label>
                        <select id="other_patient_develop_symptoms_after_previous_vaccination_text" name="other_patient_develop_symptoms_after_previous_vaccination" class="form-control select2" style="width: 100%;">
                          <option class="badge filter badge-info" data-color="info" value="{{ $data[0]->other_patient_develop_symptoms_after_previous_vaccination }}">
                            {{ isset($arr_patient_develop_symptoms_after_previous_vaccination[$data[0]->other_patient_develop_symptoms_after_previous_vaccination]) ? $arr_patient_develop_symptoms_after_previous_vaccination[$data[0]->other_patient_develop_symptoms_after_previous_vaccination]:"" }}
                          </option>
                          <?php
	  										  foreach ($arr_patient_develop_symptoms_after_previous_vaccination as $k=>$v) { ?>
                          <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                          <?php } ?>
                        </select>
                        <label></br>อาการอื่นๆ :</label>
                        <input type="text" name="other_text_patient_develop_symptoms_after_previous_vaccination" id="other_patient_develop_symptoms_after_previous_vaccination" class="form-control"
                          value="{{ $data[0]->other_text_patient_develop_symptoms_after_previous_vaccination}}">
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
                        <input type="radio" name="underlying_disease" value="" @if ($data[0]->underlying_disease == null)
                        {{ "checked" }}
                        @endif>
                          ไม่ระบุ
                      </label>
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
                    <div id="other_underlying_disease" @if ($data[0]->underlying_disease != 2)
                    style="display: none"
                    @endif>
                      <select id="other_underlying_disease_text" name="other_underlying_disease" class="form-control select2" style="width: 100%;">
                        <option class="badge filter badge-info" data-color="info" value="{{ $data[0]->other_underlying_disease }}">
                          {{ isset($arr_underlying_disease[$data[0]->other_underlying_disease]) ? $arr_underlying_disease[$data[0]->other_underlying_disease]:"" }}</option>
                        <?php
												  foreach ($arr_underlying_disease as $k=>$v) { ?>
                        <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                        <?php } ?>
                      </select>
                      <label></br>โรคประจำตัวอื่นๆ :</label>
                      <input type="text" name="other_text_underlying_disease" id="other_text_underlying_disease" class="form-control" value="{{ $data[0]->other_text_underlying_disease }}">
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
                      <input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="" @if ($data[0]->history_of_drug_use_within_1_month_before_getting_vaccination == null)
                      {{ "checked" }}
                      @endif>
                        ไม่ระบุ
                    </label>
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
                  <div id="other_history_of_drug_use_within_1_month_vaccination" @if ($data[0]->other_history_of_drug_use_within_1_month_vaccination != 2)
                  style="display: none"
                  @endif>
                    <input type="text" id="other_history_of_drug_use_within_1_month_vaccination_text" name="other_history_of_drug_use_within_1_month_vaccination" class="form-control" placeholder="ระบุ" hidden="true"
                      value="{{ $data[0]->other_history_of_drug_use_within_1_month_vaccination }}">
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
              <div class="col-lg-3">
                <div class="radio">
                  <label>
                    <input type="radio" name="history_of_covid" value="" @if ($data[0]->history_of_covid == null)
                    {{ "checked" }}
                    @endif>
                      ไม่ระบุ
                  </label>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="radio">
                  <label>
                    <input type="radio" name="history_of_covid" value="1" @if ($data[0]->history_of_covid == 1)
                    {{ "checked" }}
                    @endif>
                      ไม่เคย
                  </label>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="radio">
                  <label>
                    <input type="radio" name="history_of_covid" value="2" @if ($data[0]->history_of_covid == 2)
                    {{ "checked" }}
                    @endif>
                      เคย
                  </label>
                </div>
              </div>
              <div class="col-lg-12">
                <div id="other_history_of_covid" @if ($data[0]->history_of_covid != 2)
                style="display: none"
                @endif>
                  <input type="text" name="other_history_of_covid_text" id="other_history_of_covid_text" class="form-control" placeholder="ระบุเวลาที่เป็น" hidden="true" value="{{ $data[0]->other_history_of_covid_text }}">
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
            <textarea class="form-control" name="other_medical_history" rows="3">{{ $data[0]->other_medical_history }}</textarea>
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
              <option value="">=== จังหวัด ===</option>
              @foreach ($list as $row)
              <option value="{{$row->province_code}}">{{$row->province_name}}</option>
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
              <option value="">=== อำเภอ ===</option>
            </select>
            <!-- /.p_id tname  -->
          </div>
          <div class="col-lg-3">
            <select class="form-control district" name="subdistrict">
              <option value="{{ $data[0]->subdistrict }}">{{ isset($listsubdistrict[$data[0]->subdistrict]) ?  $listsubdistrict[$data[0]->subdistrict] : "ไม่ระบุข้อมูล"}}</option>
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
        {{-- <div class="form-group">
        <div class="row">
          <div class="col-lg-4">
            <label>สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข) :</label>
            <select id="js-example-basic-single" name="hospcode_get_vac" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" >
            </select>
          </div>
        </div>
      </div> --}}
      </br>
        <div class="form-group">
        <div class="row">
          <div class="col-lg-4">
            <label>สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข) :</label>
            <select id="js-example-basic-single" name="hospcode_get_vac" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger">
              <option class="badge filter badge-info" data-color="info" value="{{$data[0]->hospcode_get_vac}}">
                {{ isset($list_hos[$data[0]->hospcode_get_vac]) ? $list_hos[$data[0]->hospcode_get_vac]:"ไม่ระบุข้อมูล"}}
              </option>
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
                  <font style="color:red;">*</font> ชนิดวัคซีน
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
                {{-- <th>ชื่อตัวทำละลาย</th> --}}
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
                          <input type="text" id="heart_failure{{$i}}" name="heart_failure[{{$i-1}}]"  value="{{isset($value->heart_failure) ? $value->heart_failure:""}}">
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
                      <input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date" value="{{$data[0]->necessary_to_investigate_date}}" data-date-format="yyyy-mm-dd" readonly>
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
                        <input type="text" class="form-control pull-right" id="datepicker_found_event" name="date_found_event" value="{{$data[0]->date_found_event}}" data-date-format="yyyy-mm-dd" readonly>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label>โรงพยาบาลที่รับรักษา :</label>
                      <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                        <option class="" data-color="info" value="{{$data[0]->hospcode_treat}}">
                          {{ isset($list_hos[$data[0]->hospcode_treat]) ? $list_hos[$data[0]->hospcode_treat]:"ไม่ระบุข้อมูล"}}
                        </option>
                      </select>
                      {{-- <input type="text" id="event_location" name="event_location" class="form-control" placeholder="สถานที่เกิดเหตุการณ์"> --}}
                    </div>
                    <div class="col-lg-4">
                      <label>จังหวัด :</label>
                      <select id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;">
                        <option class="" data-color="info" value="{{$data[0]->province_found_event}}">
                          {{ isset($listProvince[$data[0]->province_found_event]) ? $listProvince[$data[0]->province_found_event]:"ไม่ระบุข้อมูล"}}</option>
                        <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                        <option class="" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
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
                        <option class="" data-color="info" value="{{$data[0]->hospcode_report}}">
                          {{ isset($list_hos[$data[0]->hospcode_report]) ? $list_hos[$data[0]->hospcode_report]:"ไม่ระบุข้อมูล"}}
                        </option>
                      </select>
                      {{-- <input type="text" id="unit_reported" name="unit_reported" class="form-control" value="{{$data[0]->unit_reported}}"> --}}
                    </div>
                    <div class="col-lg-4">
                      <label>จังหวัด :</label>
                      <select id="province_reported" name="province_reported" class="form-control" style="width: 100%;">
                        <option class="" data-color="info" value="{{$data[0]->province_reported}}">{{ isset($listProvince[$data[0]->province_reported]) ? $listProvince[$data[0]->province_reported] : "ไม่ระบุข้อมูล" }}
                        </option>
                        <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                        <option class="" data-color="info" value="<?php echo $k ; ?>"> <?php echo $v ; ?></option>
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
                        <input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported" value="{{$data[0]->datepicker_send_reported}}" data-date-format="yyyy-mm-dd" readonly>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label>ว/ด/ป ที่รับรายงาน :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker_resiver" name="datepicker_resiver" value="{{$data[0]->datepicker_resiver}}" data-date-format="yyyy-mm-dd" readonly>
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
                    <textarea class="form-control" rows="3" id="more_reviews" name="more_reviews">{{$data[0]->more_reviews}}</textarea>
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
                        <input type="checkbox" name="assessment1" @if ($data[0]->assessment1 == '1' || $data[0]->assessment1 == 'on')
                        {{ "checked" }}
                        @endif>
                          ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label>
                        <input type="checkbox" name="assessment2" @if ($data[0]->assessment2 == '1' || $data[0]->assessment2 == 'on')
                        {{ "checked" }}
                        @endif>
                          ใช่
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label>
                        <input type="checkbox" name="assessment3" @if ($data[0]->assessment3 == '1' || $data[0]->assessment3 == 'on')
                        {{ "checked" }}
                        @endif>
                          น่าจะใช่
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label>
                        <input type="checkbox" name="assessment4" @if ($data[0]->assessment4 == '1' || $data[0]->assessment4 == 'on')
                        {{ "checked" }}
                        @endif>
                          อาจจะใช่
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label>
                        <input type="checkbox" name="assessment5" @if ($data[0]->assessment5 == '1' || $data[0]->assessment5 == 'on')
                        {{ "checked" }}
                        @endif>
                          ไม่ใช่
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>
                        <input type="checkbox" name="assessment6" @if ($data[0]->assessment6 == '1' || $data[0]->assessment6 == 'on')
                        {{ "checked" }}
                        @endif>
                          ความบกพร่องของวัคซีน
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label>
                        <input type="checkbox" name="assessment7" @if ($data[0]->assessment7 == '1' || $data[0]->assessment7 == 'on')
                        {{ "checked" }}
                        @endif>
                          ความคลาดเคลื่อนด้านการให้บริการ
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label>
                        <input type="checkbox" name="assessment8" @if ($data[0]->assessment8 == '1' || $data[0]->assessment8 == 'on')
                        {{ "checked" }}
                        @endif>
                          เหตุบังเอิญ/เห็นพ้อง
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label>
                        <input type="checkbox" name="assessment9" @if ($data[0]->assessment9 == '1' || $data[0]->assessment9 == 'on')
                        {{ "checked" }}
                        @endif>
                          ความกลัว/ความกังวล
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label>
                        <input type="checkbox" name="assessment10" @if ($data[0]->assessment10 == '1' || $data[0]->assessment10 == 'on')
                        {{ "checked" }}
                        @endif>
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
                      <textarea class="form-control" rows="3" id="lab_result" name="lab_result">{{$data[0]->lab_result}}</textarea>
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
      });ห
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
      var rowCountSyntom = $('.data-contact-person').length;
      // alert(rowCount);
      var contactdiv = '<tr class="data-contact-person">' +
        '<td>' +
        '<select type="text" id="name_of_vaccine1" name="name_of_vaccine[]' + rowCount + '" class="form-control" required>' +
        '<option value="">กรุณาระบชนิดวัคซีน</option>' +
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
'</select>'+
        '</td>' +

        '<td>' +
        '<input type="text" name="date_of_vaccination[]' + rowCount + '" value="" id="date_of_vaccination1' + rowCount + '" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="time_of_vaccination1' + rowCount + '" name="time_of_vaccination[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
          '<input type="radio" id="symptom' + rowCount + '_1" name="symptom_status[' + rowCountSyntom + ']" value="1" data-toggle="modal" data-target="#Symptom' + rowCount + '">' +
          '<label for="symptom1"> : มีอาการ</label><br>' +
          '<input type="radio" id="symptom' + rowCount + '_2" name="symptom_status[' + rowCountSyntom + ']" value="0">' +
          '<label for="symptom2"> : ไม่มีอาการ</label><br>' +
          '<!-- Modal_1 -->'+
'<div class="modal fade" id="Symptom' + rowCount + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
'    <div class="modal-dialog modal-lg">'+
'      <div class="modal-content">'+
'        <div class="modal-header">'+
'          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>'+
'          <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>'+
'        </div>'+
'        <div class="modal-body">'+
'            <div class="tab-pane active" id="tab_1">'+
'                <div class="box-body">'+
'                  {{-- คอรั่มภายใน3.1 --}}'+
'                  <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <div class="box-header with-border">'+
'                        <!-- checkbox3.1.1 -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="rash_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="c_rash" name="c_rash[]" value="0027">'+
'                              Rash'+
'                            </label>'+
'                            <input type="text" id="rash' + rowCount + '" name="rash[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="erythema_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="erythema1" name="c_erythema[]" value="0028">'+
'                              Erythema'+
'                            </label>'+
'                            <input type="text" id="erythema' + rowCount + '" name="erythema[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="urticaria_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="urticaria1" name="c_urticaria[]" value="0044">'+
'                              Urticaria'+
'                            </label>'+
'                            <input type="text" id="urticaria' + rowCount + '" name="urticaria[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="itching_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="itching1" name="c_itching[]" value="0026">'+
'                              Itching'+
'                            </label>'+
'                            <input type="text" id="itching' + rowCount + '" name="itching[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="edema_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="edema1" name="c_edema[]" value="0003A">'+
'                              Edema'+
'                            </label>'+
'                            <input type="text" id="edema' + rowCount + '" name="edema[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-5" id="angioedema_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="angioedema1" name="c_angioedema[]" value="0003">'+
'                              Angioedema'+
'                            </label>'+
'                            <input type="text" id="angioedema' + rowCount + '" name="angioedema[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'    '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- checkbox3.1.2  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="fainting_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="fainting1" name="c_fainting[]" value="1">'+
'                              Fainting'+
'                            </label>'+
'                            <input type="text" id="fainting' + rowCount + '" name="fainting[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-6" id="hyperventilation_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="hyperventilation1" name="c_hyperventilation[]" value="0517">'+
'                              Hyperventilation'+
'                            </label>'+
'                            <input type="text" id="hyperventilation' + rowCount + '" name="hyperventilation[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="syncope_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="syncope1" name="c_syncope[]" value="0223">'+
'                              Syncope'+
'                            </label>'+
'                            <input type="text" id="syncope' + rowCount + '" name="syncope[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="headche_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="headche1" name="c_headche[]" value="1">'+
'                              Headche'+
'                            </label>'+
'                            <input type="text" id="headche' + rowCount + '" name="headche[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="dizziness_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="dizziness1" name="c_dizziness[]" value="0101">'+
'                              Dizziness'+
'                            </label>'+
'                            <input type="text" id="dizziness' + rowCount + '" name="dizziness[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="fatigue_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="fatigue" name="c_fatigue[]" value="0724">'+
'                              Fatigue'+
'                            </label>'+
'                            <input type="text" id="fatigue' + rowCount + '" name="fatigue[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="malaise_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="malaise" name="c_malaise[]" value="0728">'+
'                              Malaise'+
'                            </label>'+
'                            <input type="text" id="malaise' + rowCount + '" name="malaise[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-body -->'+
'                      <div class="box-footer">'+
'                        <!-- checkbox3.1.3  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="dyspepsia_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="dyspepsia" name="c_dyspepsia[]" value="0279">'+
'                              Dyspepsia'+
'                            </label>'+
'                            <input type="text" id="dyspepsia' + rowCount + '" name="dyspepsia[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="diarrhea_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="diarrhea" name="c_diarrhea[]" value="1">'+
'                              Diarrhea'+
'                            </label>'+
'                            <input type="text" id="diarrhea' + rowCount + '" name="diarrhea[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="nausea_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="nausea" name="c_nausea[]" value="0308">'+
'                              Nausea'+
'                            </label>'+
'                            <input type="text" id="nausea' + rowCount + '" name="nausea[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="vomiting_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="vomiting" name="c_vomiting[]" value="0228">'+
'                              Vomiting'+
'                            </label>'+
'                            <input type="text" id="vomiting' + rowCount + '" name="vomiting[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-6" id="abdominal_pain_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="abdominal_pain1" name="c_abdominal_pain[]" value="0268">'+
'                              Abdominal pain'+
'                            </label>'+
'                            <input type="text" id="abdominal_pain' + rowCount + '" name="abdominal_pain[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-body -->'+
'                      <div class="box-footer">'+
'                        <!-- checkbox3.1.4  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="arthalgia_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="arthalgia1" name="c_arthalgia[]" value="1">'+
'                              Arthalgia'+
'                            </label>'+
'                            <input type="text" id="arthalgia' + rowCount + '" name="arthalgia[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="myalgia_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="myalgia1" name="c_myalgia[]" value="0072">'+
'                              Myalgia'+
'                            </label>'+
'                            <input type="text" id="myalgia' + rowCount + '" name="myalgia[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'    '+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'                  {{-- คอรั่มภายใน3.2 --}}'+
'                  <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <div class="box-header with-border">'+
'                        <!-- checkbox3.2.1 -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-5" id="fever38c_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="fever38c1" name="c_fever38c[]" value="0725">'+
'                              Fever >= 38 C'+
'                            </label>'+
'                            <input type="text" id="fever38c' + rowCount + '" name="fever38c[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'    '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <div class="box-body">'+
'                          {{-- input content --}}'+
'                          <!-- checkbox3.2.2  -->'+
'                          <div class="form-group">'+
'                            <div class="col-md-12" id="swelling_at_the_injection_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="swelling_at_the_injection1" name="c_swelling_at_the_injection[]" value="1">'+
'                                บวมบริเวณที่ฉีดนานเกิน3วัน'+
'                              </label>'+
'                              <input type="text" id="swelling_at_the_injection' + rowCount + '" name="swelling_at_the_injection[]" hidden>'+
'                            </div>'+
'                            <div class="col-md-12" id="swelling_beyond_nearest_joint_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="swelling_beyond_nearest_joint1" name="c_swelling_beyond_nearest_joint[]" value="1">'+
'                                บวมลามไปถึงข้อที่ใกล้ที่สุด'+
'                              </label>'+
'                              <input type="text" id="swelling_beyond_nearest_joint' + rowCount + '" name="swelling_beyond_nearest_joint[]" hidden>'+
'                            </div>'+
'                            <div class="col-md-12" id="lymphadenopathy_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="lymphadenopathy1" name="c_lymphadenopathy[]" value="0577">'+
'                                Lymphadenopathy'+
'                              </label>'+
'                              <input type="text" id="lymphadenopathy' + rowCount + '" name="lymphadenopathy[]" hidden>'+
'                            </div>'+
'                            <div class="col-md-12" id="lymphadenitis_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="lymphadenitis1" name="c_lymphadenitis[]" value="0577D">'+
'                                Lymphadenitis'+
'                              </label>'+
'                              <input type="text" id="lymphadenitis' + rowCount + '" name="lymphadenitis[]" hidden>'+
'                            </div>'+
'                          </div>'+
'                          <div class="form-group">'+
'                            <div class="col-md-6" id="sterile_abscess_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="sterile_abscess1" name="c_sterile_abscess[]" value="0051">'+
'                                Sterile abscess'+
'                              </label>'+
'                              <input type="text" id="sterile_abscess' + rowCount + '" name="sterile_abscess[]" hidden>'+
'                            </div>'+
'                            <div class="col-md-6" id="bacterial_abscess_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="bacterial_abscess1" name="c_bacterial_abscess[]" value="1">'+
'                                Bacterial abscess'+
'                              </label>'+
'                              <input type="text" id="bacterial_abscess' + rowCount + '" name="bacterial_abscess[]" hidden>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-body -->'+
'                      <div class="box-footer">'+
'                        <!-- checkbox3.2.3  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-12" id="febrile_convulsion_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="febrile_convulsion1" name="c_febrile_convulsion[]" value="1">'+
'                              Febrile convulsion'+
'                            </label>'+
'                            <input type="text" id="febrile_convulsion' + rowCount + '" name="febrile_convulsion[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="afebrile_convulsion_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="afebrile_convulsion" name="c_afebrile_convulsion[]" value="1">'+
'                              Afebrile convulsion'+
'                            </label>'+
'                            <input type="text" id="afebrile_convulsion' + rowCount + '" name="afebrile_convulsion[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="encephalopathy_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="encephalopathy1" name="c_encephalopathy[]" value="0105">'+
'                              Encephalopathy/Encephalitis'+
'                            </label>'+
'                            <input type="text" id="encephalopathy' + rowCount + '" name="encephalopathy[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-6" id="flaccid_paralysis_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="flaccid_paralysis1" name="c_flaccid_paralysis[]" value="0139">'+
'                              Flaccid paralysis'+
'                            </label>'+
'                            <input type="text" id="flaccid_paralysis' + rowCount + '" name="flaccid_paralysis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-6" id="spastic_paralysis_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="spastic_paralysis1" name="c_spastic_paralysis[]" value="0775">'+
'                              Spastic paralysis'+
'                            </label>'+
'                            <input type="text" id="spastic_paralysis' + rowCount + '" name="spastic_paralysis[]" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'    '+
'                  </div>'+
'                  <!-- /.box -->'+
'                  {{-- คอรั่มภายใน3.3 --}}'+
'                  <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'    '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- checkbox3.3.1  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-12" id="hhe_' + rowCount + '">'+
'                            <label>'+
'                              <input id="hhe1" name="c_hhe[]" type="checkbox" value="1704">'+
'                              Hypotonic Hyporesponsive episode (HHE)'+
'                            </label>'+
'                            <input type="text" id="hhe' + rowCount + '" name="hhe[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="persistent_inconsolable_crying_' + rowCount + '">'+
'                            <label>'+
'                              <input id="persistent_inconsolable_crying1" name="c_persistent_inconsolable_crying[]" type="checkbox" value="1">'+
'                              Persistent inconsolable crying'+
'                            </label>'+
'                            <input type="text" id="persistent_inconsolable_crying' + rowCount + '" name="persistent_inconsolable_crying[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="thrombocytopenia_' + rowCount + '">'+
'                            <label>'+
'                              <input id="thrombocytopenia1" name="c_thrombocytopenia[]" type="checkbox" value="0594">'+
'                              Thrombocytopenia'+
'                            </label>'+
'                            <input type="text" id="thrombocytopenia' + rowCount + '" name="thrombocytopenia[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="osteomyelitis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="osteomyelitis1" name="c_osteomyelitis[]" type="checkbox" value="1184">'+
'                              Osteitis/Osteomyelitis'+
'                            </label>'+
'                            <input type="text" id="osteomyelitis' + rowCount + '" name="osteomyelitis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="toxic_shock_syndrome_' + rowCount + '">'+
'                            <label>'+
'                              <input id="toxic_shock_syndrome1" name="c_toxic_shock_syndrome[]" type="checkbox" value="1">'+
'                              Toxic shock syndrome'+
'                            </label>'+
'                            <input type="text" id="toxic_shock_syndrome' + rowCount + '" name="toxic_shock_syndrome[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="sepsis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="sepsis1" name="c_sepsis[]" type="checkbox" value="0744">'+
'                              Sepsis'+
'                            </label>'+
'                            <input type="text" id="sepsis' + rowCount + '" name="sepsis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="anaphylaxis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="anaphylaxis1" name="c_anaphylaxis[]" type="checkbox" value="2237">'+
'                              Anaphylaxis'+
'                            </label>'+
'                            <input type="text" id="anaphylaxis' + rowCount + '" name="anaphylaxis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="gbs_' + rowCount + '">'+
'                            <label>'+
'                              <input id="gbs" name="c_gbs[]" type="checkbox" value="1">'+
'                              Guillain-Barré syndrome (GBS)'+
'                            </label>'+
'                            <input type="text" id="gbs' + rowCount + '" name="gbs[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="transverse_myelitis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="transverse myelitis1" name="c_transverse myelitis[]" type="checkbox" value="1">'+
'                              Transverse myelitis'+
'                            </label>'+
'                            <input type="text" id="transverse_myelitis' + rowCount + '" name="transverse_myelitis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="adem_' + rowCount + '">'+
'                            <label>'+
'                              <input id="adem1" name="c_adem[]" type="checkbox" value="1">'+
'                              Acute disseminated encephalomyelitis (ADEM)'+
'                            </label>'+
'                            <input type="text" id="adem' + rowCount + '" name="adem[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="acute_myocardial_' + rowCount + '">'+
'                            <label>'+
'                              <input id="acute_myocardial1" name="c_acute_myocardial[]" type="checkbox" value="1">'+
'                              Acute Myocardial'+
'                            </label>'+
'                            <input type="text" id="acute_myocardial' + rowCount + '" name="acute_myocardial[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="ards_' + rowCount + '">'+
'                            <label>'+
'                              <input id="ards1" name="c_ards[]" type="checkbox" value="1">'+
'                               Acute respiratory distress syndrome (ARDS)'+
'                            </label>'+
'                            <input type="text" id="ards' + rowCount + '" name="ards[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="symptoms_later_immunized_' + rowCount + '">'+
'                            <label>'+
'                              <input id="symptoms_later_immunized" name="c_symptoms_later_immunized[]" type="checkbox" value="9999">'+
'                              other'+
'                            </label>'+
'                            <input type="text" id="symptoms_later_immunized' + rowCount + '" name="symptoms_later_immunized[]" hidden>'+
'                          </div>'+
'                          <div class="form-group">'+
'                            <div class="col-lg-12">'+
'                              <div id="other_symptoms_later_immunized" style="display: none">'+
'                                <input type="text" id="other_symptoms_later_immunized_text1" name="other_symptoms_later_immunized[]" class="form-control" placeholder="" hidden="true">'+
'                              </div>'+
'                              {{-- <div id="other_symptoms_later_immunized_t" style="display: none">'+
'                                <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">'+
'                              </div> --}}'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'{{-- คอรั่มภายใน3.3 --}}'+
'                   <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
''+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- checkbox3.3.1  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-12" id="chest_pain_' + rowCount + '" >'+
'                            <label>'+
'                              <input name="c_chest_pain[]" type="checkbox" value="1">'+
'                              Chest pain'+
'                            </label>'+
'                            <input type="text" id="chest_pain' + rowCount + '" name="chest_pain[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="myocarditis_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_myocarditis[]" type="checkbox" value="1">'+
'                              Myocarditis'+
'                            </label>'+
'                            <input type="text" id="myocarditis' + rowCount + '" name="myocarditis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="heart_failure_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_heart_failure[]" type="checkbox" value="1">'+
'                              Heart failure'+
'                            </label>'+
'                            <input type="text" id="heart_failure' + rowCount + '" name="heart_failure[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="pericarditis_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_pericarditis[]" type="checkbox" value="1">'+
'                              Pericarditis'+
'                            </label>'+
'                            <input type="text" id="pericarditis' + rowCount + '" name="pericarditis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="sudden_cardiac_arrest_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_sudden_cardiac_arrest[]" type="checkbox" value="1">'+
'                              Sudden cardiac arrest'+
'                            </label>'+
'                            <input type="text" id="sudden_cardiac_arrest' + rowCount + '" name="sudden_cardiac_arrest[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="covid_19_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_covid_19[]" type="checkbox" value="1">'+
'                              Covid-19'+
'                            </label>'+
'                            <input type="text" id="covid_19' + rowCount + '" name="covid_19[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="ischemic_stroke_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_ischemic_stroke[]" type="checkbox" value="1">'+
'                              Ischemic stroke'+
'                            </label>'+
'                            <input type="text" id="ischemic_stroke' + rowCount + '" name="ischemic_stroke[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="hemorrhagic_stroke_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_hemorrhagic_stroke[]" type="checkbox" value="1">'+
'                            Hemorrhagic stroke'+
'                            </label>'+
'                            <input type="text" id="hemorrhagic_stroke' + rowCount + '" name="hemorrhagic_stroke[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="deep_vein_thrombosis_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_deep_vein_thrombosis[]" type="checkbox" value="1">'+
'                              Deep vein thrombosis                            '+
'		                      	</label>'+
'                            <input type="text" id="deep_vein_thrombosis' + rowCount + '" name="deep_vein_thrombosis[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="pulmonary_embolism_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_pulmonary_embolism[]" type="checkbox" value="1">'+
'                              Pulmonary embolism'+
'                            </label>'+
'                            <input type="text" id="pulmonary_embolism' + rowCount + '" name="pulmonary_embolism[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="hypertension_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_hypertension[]" type="checkbox" value="1">'+
'                              Hypertension'+
'                            </label>'+
'                            <input type="text" id="hypertension' + rowCount + '" name="hypertension[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="hypertensive_urgency_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_hypertensive_urgency[]" type="checkbox" value="1">'+
'                               Hypertensive urgency'+
'                            </label>'+
'                            <input type="text" id="hypertensive_urgency' + rowCount + '" name="hypertensive_urgency[]" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="bells_palsy_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_bells_palsy[]" type="checkbox" value="1">'+
'                              Bells palsy'+
'                            </label>'+
'                            <input type="text" id="bells_palsy' + rowCount + '" name="bells_palsy[]" hidden>'+
'                          </div>'+
''+
'                          </div>'+
'                        </div>'+
''+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'                  {{-- คอรั่มภายใน3.4 --}}'+
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
'                              <input type="text" class="form-control pull-right" id="date_of_symptoms1' + rowCount + '" name="date_of_symptoms[]" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <div class="bootstrap-timepicker">'+
'                          <div class="form-group">'+
'                            <div class="col-lg-6">'+
'                              <label>เวลาที่เกิดอาการ :</label>'+
'                              <div class="input-group">'+
'                                <input  id="time_of_symptoms1' + rowCount + '" type="text" class="form-control" name="time_of_symptoms[]">'+
'    '+
'                                <div class="input-group-addon">'+
'                                  <i class="fa fa-clock-o"></i>'+
'                                </div>'+
'                              </div>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่รับรักษา :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="date_of_treatment1' + rowCount + '" name="date_of_treatment[]" data-date-format="yyyy-mm-dd" readonly>'+
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
'                              <input type="text" class="form-control pull-right" id="time_of_treatment1' + rowCount + '" name="time_of_treatment[]" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'   '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- textarea -->'+
'                        <div class="form-group">'+
'                          <div class="col-lg-8">'+
'                            <label>รายละเอียดอาการและการตรวจสอบ</label>'+
'                            <input class="form-control" rows="5"  id="Symptoms_details1" name="Symptoms_details[]">'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-8">'+
'                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis1" name="diagnosis[]" class="form-control" placeholder="">'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'                </div>'+
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
'                            <input type="radio" name="c_seriousness_of_the_symptoms[]"  id="seriousness_of_the_symptoms1" value="1" >'+
'                            ไม่ร้ายแรง'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-2">'+
'                          <label>'+
'                            <input type="radio" name="c_seriousness_of_the_symptoms[]" id="seriousness_of_the_symptoms1" value="2">'+
'                            ร้ายแรง'+
'                          </label>'+
'                        </div>'+
'                        <input type="text" id="seriousness_of_the_symptoms" name="seriousness_of_the_symptoms[]" hidden>'+
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
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms1" value="1">'+
'                          เสียชีวิต'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms1" value="2">'+
'                          อันตรายถึงชีวิต'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms1" value="3">'+
'                          พิการ/ไร้ความสามารถ'+
'                        </label>'+
'                      </div>'+
'                    </div>'+
'                    <div class="form-group">'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms1" value="4">'+
'                          รับไว้รักษาในโรงพยาบาล'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms1" value="5">'+
'                          ความผิดปกติแต่กำเนิด'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms1" value="6">'+
'                          อื่นๆที่มีความสำคัญทางการแพทย์'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-lg-4">'+
'                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">'+
'                          <label></label>'+
'                          <input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms[]" class="form-control" placeholder="อื่นๆ">'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                    <input type="text" id="other_seriousness_of_the_symptoms' + rowCount + '" name="other_seriousness_of_the_symptoms[]" hidden>'+
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
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="1" >'+
'                            หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="2">'+
'                            หายโดยมีร่องรอย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="3">'+
'                            อาการดีขึ้นแต่ยังไม่หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="4">'+
'                            ไม่หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="5">'+
'                            ไม่ทราบ'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="6">'+
'                            เสียชีวิต'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-lg-4">'+
'                          <div class="input-group date">'+
'                            <div id="other_patian_sta" style="display: none">'+
'                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead[]" hidden="true" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <input type="text" id="patient_status' + rowCount + '" name="patient_status[]" hidden>'+
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
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[]" value="" >'+
'                          ไม่ระบุ'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[]" value="1" >'+
'                          ไม่มี'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[]" value="2">'+
'                          ไม่ทราบ'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[]" value="3">'+
'                          มี'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-lg-3">'+
'                        <div id="other_address_funeral' + rowCount + '" style="display: none">'+
'                          <label>สถานที่ทำการ :</label>'+
'                          <input type="text" id="other_address_funeral_text' + rowCount + '" name="other_address_funeral[]" class="form-control" placeholder="ระบุสถานที่ทำการ">'+
'                        </div>'+
'                      </div>'+
'                      <input type="text" id="funeral' + rowCount + '" name="funeral[]" hidden>'+
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
        '<input type="text" id="datepicker_expiry_date1' + rowCount + '" name="expiry_date[]' + rowCount + '" class="form-control" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        // '<td>' +
        // '<input type="text" id="name_of_diluent1" name="name_of_diluent[]' + rowCount + '" class="form-control">' +
        // '</td>' +
        '<td>' +
        '<input type="text" id="lot_number_diluent1" name="lot_number_diluent[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date_diluent1' + rowCount + '" name="expiry_date_diluent[]' + rowCount + '" class="form-control" data-date-format="yyyy-mm-dd" readonly>' +
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
      $('#date_of_symptoms1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_treatment1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment1' + rowCount + '').datepicker({
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
  });
</script>
@include('AEFI.layout.SymptomScript')
@include('AEFI.layout.SymptomEditScript')
@include('AEFI.layout.nonSymptomScript')
@stop
