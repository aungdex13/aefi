@extends('AEFI.layout.tabletemplate')
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
    $arr_load_nationality = load_nationality();
    $arr_necessary_to_investigate = load_necessary_to_investigate();
    $arr_vac_init = load_vac_init();
    $user_prov = auth()->user()->prov_code;
    $roleArr = auth()->user()->getRoleNames()->toArray();
    $roleArrhospcode = auth()->user()->hospcode;
    // dd($roleArr[0]);
 ?>
  <h1>
    รายชื่อผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
    <small>AEFI</small>
  </h1>
  <ol class="breadcrumb">

  </ol>

</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!--หัวข้อที่2 -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="{{ route('form1') }}" type="button" class="btn btn-success btn-flat" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI ราย Case</a></h3>
        </div>
      <div class="box-header with-border">
        <form action="{{route('lstf1') }}" method="post">
          {{ csrf_field() }}
        <p>ค้นหาข้อมูล รายชื่อผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค</p>
      <div class="col-lg-12">
        <div class="col-lg-3">
              <input type="text" id="reservation" name="date_of_symptoms" class="form-control" readonly>
          </div>
        {{-- <div class="col-lg-3">
          <select type="text" id="name_of_vaccine" name="name_of_vaccine" class="form-control" >
            <option value="">กรุณาระบุชื่อวัคซีน</option>
            @foreach ($vac_list as $row)
            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
            @endforeach
          </select>
          </div> --}}
        <div class="col-lg-3">
          @if ($roleArr[0] == "hospital")
            <input type="text" id="reservation" name="hospcode_treat" class="form-control" value="{{ isset($list_hos[$roleArrhospcode]) ? $list_hos[$roleArrhospcode] : "ไม่ระบุ"}}" readonly>
            {{-- <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" >
            </select> --}}
          @else
            <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" >
            </select>
          @endif
          </div>
        <div class="col-lg-3">
            {{-- <input type="text" id="title_name_other" name="title_name_other" class="form-control" placeholder="จังหวัดที่รับรักษา"> --}}
            @if ($roleArr[0] == "pho" || $roleArr[0] == "hospital" || $roleArr[0] == "dho")
              <select class="form-control provinces" name="province" id="provinces" disabled>
                <option value="{{ isset($user_prov) ? $user_prov : ""}}">{{ isset($listProvince[$user_prov]) ? $listProvince[$user_prov] : "ไม่ระบุข้อมูล"}}</option>
            @else
              <select class="form-control provinces" name="province" id="provinces" >
            @endif
            <option value="">จังหวัดที่รับรักษา</option>
              @foreach ($list as $row)
              <option value="{{$row->province_code}}">{{$row->province_name}}</option>
              @endforeach
            </select>
          </div>
      </div>
    </from>
      </div>
      <div class="box-header with-border">
      <div class="col-lg-12">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-3">
          <a href="{{ route('lstf1') }}" class="btn btn-block btn-danger">ดูข้อมูลวันที่ {{$datenow}}</a>
          </div>
        <div class="col-lg-3">
          <input type="submit" name="submit" value="ค้นหาข้อมูล" class="btn btn-block btn-info"></input>
        </div>
        <div class="col-lg-3">
        </div>
      </div>
      </div>
        {{-- <div class="box-header with-border">
          <h3 class="box-title"><a href="{{ route('lstf1group') }}" type="button" class="btn btn-warning btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI รายกลุ่ม</a></h3>
      </div> --}}
      <!-- /.box-header -->
      <!-- form start -->
      <!-- /.box-header -->
      <div class="box-body">
         {{-- {{$date_of_symptoms_from}} --}}
        <p style="color:red"> ข้อมูล รายชื่อผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำวันที่
         @if ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null)  == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)
          วันที่  {{$datenow}}
        @elseif ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null) == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)
          วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
        @else
          วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
        @endif</p>
        <table class="table table-bordered" id="case_lst" class="display" style="width:100%">
          <thead>
            <tr>
              <th hidden>ID</th>
              <th style="text-align:center;">ID</th>
              <th style="text-align:center;">เลขที่ผู้ป่วย HN</th>
              {{-- <th style="text-align:center;">เลขที่ผู้ป่วย AN</th> --}}
              <th style="text-align:center;">ชื่อ-นามสกุลผู้ป่วย</th>
              <th style="text-align:center;">อายุ</th>
              <th style="text-align:center;">การวินิจฉัยของแพทย์</th>
              <th style="text-align:center;">โรงพยาบาล</th>
              <th style="text-align:center;">จังหวัด</th>
              <th style="text-align:center;">ข้อมูล AEFI2</th>
              <th style="text-align:center;">การส่งต่อผู้ป่วย</th>
              <th style="text-align:center;">***</th>
            </tr>
          </thead>
          <?php foreach($data as $value) : ?>

          <tr class="data-contact-person">
            <td hidden>
              <p style="text-align:center;">{{ isset($value->id) ? $value->id : "-"}}</p>
            </td>
            <td>
              <p style="text-align:center;">{{date('Y',strtotime(isset($value->date_of_symptoms) ? $value->date_of_symptoms : "-"))}}-{{str_pad( isset($value->name_of_vaccine) ? $value->name_of_vaccine : "NULL", 2, '0', STR_PAD_LEFT)}}-{{$value->id}}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ isset($value->hn) ? $value->hn : "-"}}</p>
            </td>
            {{-- <td>
              <p style="text-align:center;">{{ $value->an }}</p>
            </td> --}}
            <td>
              <p style="text-align:center;">{{ $value->first_name }} {{ $value->sur_name }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ isset($value->age_while_sick_year) ? $value->age_while_sick_year :"-" }}ปี {{ isset($value->age_while_sick_month) ? $value->age_while_sick_month : "-" }}เดือน {{ isset($value->age_while_sick_day) ? $value->age_while_sick_day:"-"}}วัน</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->diagnosis }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ isset($list_hos[ $value->hospcode_treat]) ? $list_hos[ $value->hospcode_treat] : "ไม่ระบุข้อมูล"}}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ isset($listProvince[ $value->province_found_event]) ? $listProvince[ $value->province_found_event] : "ไม่ระบุข้อมูล"}}</p>
              {{-- {{$value->aefi2status}}</br>
              {{$value->maxaefi2}} --}}
            </td>
               @if ($value->maxaefi2 == null || $value->maxaefi2 == 2)
            <td style="background-color:#fa3c4c">
                <p style="text-align:center;">ไม่มี</p>
            </td>
              @else
            <td style="background-color:#44bec7">
                <p style="text-align:center;">มี</p>
            </td>
              @endif
              @if ($value->refer_status == null)
            <td style="background-color:#ffc300">
                <p style="text-align:center;">ไม่มี</p>
            </td>
              @elseif ($value->refer_status == 2)
                <td style="background-color:#fa3c4c">
                    <p style="text-align:center;">ยกเลิกการส่งต่อผู้ป่วย</p>
                </td>
              @else
            <td style="background-color:#44bec7">
                <p style="text-align:center;">ส่งต่อผู้ป่วยไปยัง {{$list_hos[$value->hospcode_refer]}}</p>
            </td>
              @endif
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-info" data-toggle="dropdown">เมนูการใช้งาน</button>
                {{-- <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> --}}
                  {{-- <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</spfan>
                </button> --}}
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('lstf2') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-file-o" aria-hidden="true" style="color:#428bca;"></i>กรอก AEFI2</a></li>
                  <li><a href="{{ route('viewform1') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-eye" aria-hidden="true" style="color:#5cb85c;"></i>ดูข้อมูล AEFI1</a></li>
                  <li><a href="{{ route('EditAEFI1') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#5bc0de;"></i>แก้ไขข้อมูล</a></li>
                  <li><a href="{{ route('ReferFrm') }}?id={{ $value->id }}&id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-ambulance" aria-hidden="true" style="color:#e6c34a;"></i>Refer ผู้ป่วย</a></li>
                  <li><a href="{{ route('SymtomsbyDoseLst') }}?id={{ $value->id }}&id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-braille" aria-hidden="true" style="color:#b00b69;"></i>อาการภายหลัง<br>ได้รับการสร้างภูมิคุ้ม<br>กันโรคตามครั้งที่ฉีด</a></li>
                  @hasrole('admin')
                  <li><a href="{{ route('ExpertDiagFrm') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-user-circle-o" aria-hidden="true" style="color:#f46732;"></i>การประชุม<br>ผู้เชี่ยวชาญ</a></li>
                  @endhasrole
                  @hasrole('admin-dpc')
                  <li><a href="{{ route('ExpertDiagFrm') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-user-circle-o" aria-hidden="true" style="color:#f46732;"></i>การประชุม<br>ผู้เชี่ยวชาญ</a></li>
                  @endhasrole
                  @hasrole('dpc')
                  @if (auth()->user()->hospcode == "41173")
                  <li><a href="{{ route('ExpertDiagFrm') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-user-circle-o" aria-hidden="true" style="color:#f46732;"></i>การประชุม<br>ผู้เชี่ยวชาญ</a></li>
                  @endif
                  @endhasrole
                  @hasrole('admin-dpc')
                  <li><a href="{{ route('viewExpert') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-list-alt" aria-hidden="true" style="color:#809C7C;"></i>รายงานการ<br>ผู้ประชุมเชี่ยวชาญ</a></li>
                  @endhasrole
                  @hasrole('admin')
                  <li><a href="{{ route('viewExpert') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-list-alt" aria-hidden="true" style="color:#809C7C;"></i>รายงานการ<br>ผู้ประชุมเชี่ยวชาญ</a></li>
                  @endhasrole
                  @hasrole('dpc')
                  @if (auth()->user()->hospcode == "41173")
                  <li><a href="{{ route('viewExpert') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-list-alt" aria-hidden="true" style="color:#809C7C;"></i>รายงานการ<br>ผู้ประชุมเชี่ยวชาญ</a></li>
                  @endif
                  @endhasrole
                  @hasrole('dpc')
                  @if (auth()->user()->hospcode == "41173")
                    <li><a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" id="btnDelete" type="button" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');"><i class="fa  fa-trash-o" aria-hidden="true" style="color:#d9534f;"></i>ลบข้อมูล</a></li>
                  @endif
                  @endhasrole
                  @hasrole('admin')
                  <li><a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" id="btnDelete" type="button" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');"><i class="fa  fa-trash-o" aria-hidden="true" style="color:#d9534f;"></i>ลบข้อมูล</a></li>
                  @endhasrole
                </ul>
              </div>
            </td>
          </tr>
          <div class="modal modal-danger fade" id="modal-warning">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">ลบข้อมูล</h4>
                </div>
                <div class="modal-body">
                  <p>หากท่านกดปุ่มตกลงข้อมูลของผู้ป่วยรายนี้จะถูกลบทั้งหมด&hellip;</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">ยกเลิก</button>
                  <a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" type="button" class="btn btn-outline">ลบข้อมูล</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          <?php endforeach;?>
        </table>
        {{-- <button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button> --}}
        {{--
						  								 <div class="col-sm-2">
						  									 <input type="text" name="req_count[]" >
						  								 </div> --}}


      </div>
    </div>
  </div>
  <!-- /.box -->
  </div>
  <!-- /.row -->
</section>

@include('AEFI.layout.footercaselstScript')
<!-- /.content -->
<script>
$(document).ready(function() {
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
});
</script>
@stop
