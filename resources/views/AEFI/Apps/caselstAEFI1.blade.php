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
    //dd($data);
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
          <h3 class="box-title"><a href="{{ route('form1') }}" type="button" class="btn btn-success btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI ราย Case</a></h3>
        </div>
        {{-- <div class="box-header with-border">
          <h3 class="box-title"><a href="{{ route('lstf1group') }}" type="button" class="btn btn-warning btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI รายกลุ่ม</a></h3>
      </div> --}}
      <!-- /.box-header -->
      <!-- form start -->
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="case_lst" class="display" style="width:100%">
          <thead>
            <tr>
              <th hidden>ID</th>
              <th style="text-align:center;">ID</th>
              <th style="text-align:center;">เลขที่ผู้ป่วย HN</th>
              <th style="text-align:center;">เลขที่ผู้ป่วย AN</th>
              <th style="text-align:center;">ชื่อ-นามสกุลผู้ป่วย</th>
              <th style="text-align:center;">อายุ</th>
              <th style="text-align:center;">เชื้อชาติ</th>
              <th style="text-align:center;">ที่อยู่</th>
              <th style="text-align:center;">มีความจำเป็นที่จะต้องสอบสวนโรค</th>
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
            <td>
              <p style="text-align:center;">{{ $value->an }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->first_name }} {{ $value->sur_name }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ isset($value->age_while_sick_year) ? $value->age_while_sick_year :"-" }}ปี {{ isset($value->age_while_sick_month) ? $value->age_while_sick_month : "-" }}เดือน {{ isset($value->age_while_sick_day) ? $value->age_while_sick_day:"-"}}วัน</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $arr_load_nationality[$value->nationality] }} {{ $value->other_nationality }}</p>
            </td>
            <td>
              <p style="text-align:center;">ตำบล : {{ isset($listsubdistrict[$value->subdistrict]) ?  $listsubdistrict[$value->subdistrict] : "ไม่ระบุข้อมูล"}}<br> อำเภอ : {{ isset($listDistrict[$value->district]) ? $listDistrict[$value->district]: "ไม่ระบุข้อมูล" }}<br> จังหวัด :{{ isset($listProvince[ $value->province]) ?$listProvince[ $value->province] : "ไม่ระบุข้อมูล"}}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $arr_necessary_to_investigate[$value->necessary_to_investigate] }}</p>
            </td>
              @if ($value->aefi2 == null)
            <td style="background-color:#fa3c4c">
                <p style="text-align:center;">ไม่มีข้อมูล AEFI2</p>
            </td>
              @else
            <td style="background-color:#44bec7">
                <p style="text-align:center;">มีการแนบข้อมูล AEFI2</p>
            </td>
              @endif
              @if ($value->refer_status == null)
            <td style="background-color:#ffc300">
                <p style="text-align:center;">ไม่มีการส่งต่อผู้ป่วย</p>
            </td>
              @elseif ($value->refer_status == 2)
                <td style="background-color:#fa3c4c">
                    <p style="text-align:center;">ยกเลิกการส่งต่อผู้ป่วย</p>
                </td>
              @else
            <td style="background-color:#44bec7">
                <p style="text-align:center;">มีการส่งต่อผู้ป่วยไปยัง {{$list_hos[$value->hospcode_refer]}}</p>
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
                  <li><a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" id="btnDelete" type="button" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');"><i class="fa  fa-trash-o" aria-hidden="true" style="color:#d9534f;"></i>ลบข้อมูล</a></li>
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
{{-- <script>
$(document).ready(function() {
    $("#btnDelete").click(function(){
        alert("button");
    });
});
</script> --}}
@stop
