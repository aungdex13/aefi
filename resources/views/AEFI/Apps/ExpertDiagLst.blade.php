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
  $arr_provinces = load_provinces();
  $arr_title_name = load_title_name();
  $arr_gender = load_gender();
  $arr_type_of_patient = load_type_of_patient();
  $arr_patient_status = load_patient_status();
  $arr_seriousness_of_the_symptoms = load_seriousness_of_the_symptoms();
  $arr_r_o = load_r_o();
  $arr_load_final_diag = load_final_diag();
  $arr_causality = load_causality();
  	// dd($data);
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
          <h3 class="box-title"><a href="{{ route('ExpertDiagFrm') }}?id_case={{ $id_case }}" type="button" class="btn btn-success btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มรายงานการประชุมผู้เชี่ยวชาญ</a></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
          <label>ชื่อ- นามสกุลผู้ป่วย : {{	isset($selectaeficase[0]->first_name) ? $selectaeficase[0]->first_name :"ไม่ระบุ"}} {{	$selectaeficase[0]->sur_name}} </label>
        </br>
          <label>เพศ : {{	isset($arr_gender[$selectaeficase[0]->gender]) ? $arr_gender[$selectaeficase[0]->gender]  :"ไม่ระบุ"}}</label>
        </br>
          <label>อาชีพ : {{	isset($selectaeficase[0]->career) ? $selectaeficase[0]->career  :"ไม่ระบุ"}}</label>
        </br>
        </br>
          <label>ผลการประชุมของผู้เชี่ยวชาญ</label>
          <table class="table table-bordered" id="case_lst" class="display" style="width:100%">
            <thead>
              <tr>
                <th>วันที่ประชุม</th>
                <th>summary</th>
                <th>R/O</th>
                <th>Final Diagnosis</th>
                <th>***</th>
              </tr>
            </thead>
            <?php foreach($selectexpertcase as $value) : ?>
            <tr class="data-contact-person">
              <td>
                <p style="text-align:center;">{{ $value->expert_meet_date }}</p>
              </td>
              <td>
                <p style="text-align:center;">{{ $value->summary }}</p>
              </td>
              <td>
                <p style="text-align:center;">{{isset($arr_r_o[$value->r_o]) ? $arr_r_o[$value->r_o] : null}} {{ $value->other_r_o }}</p>
              </td>
              <td>
                <p style="text-align:center;">{{isset($arr_load_final_diag[$value->final_diag]) ? $arr_load_final_diag[$value->final_diag] : null}} {{ $value->other_final_diag }}</p>
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info" data-toggle="dropdown">เมนูการใช้งาน</button>
                  {{-- <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> --}}
                    {{-- <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button> --}}
                  <ul class="dropdown-menu" role="menu">
                    {{-- <li><a href="{{ route('lstf2') }}?id_case={{ $value->id_case }}"><i class="fa fa-file-o" aria-hidden="true" style="color:#428bca;"></i>กรอก AEFI2</a></li> --}}
                    {{-- <li><a href="{{ route('viewform1') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-eye" aria-hidden="true" style="color:#5cb85c;"></i>ดูข้อมูล AEFI1</a></li> --}}
                    <li><a href="{{ route('ExpertDiagEditFrm') }}?id={{ $value->id }}&id_case={{$value->id_case}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#5bc0de;"></i>แก้ไขข้อมูล</a></li>
                    {{-- <li><a href="#"><i class="fa fa-ambulance" aria-hidden="true" style="color:#e6c34a;"></i>Refer ผู้ป่วย</a></li> --}}
                    {{-- <li><a href="{{ route('ExpertDiagLst') }}?id_case={{ $value->id_case }}"><i class="fa fa-user-circle-o" aria-hidden="true" style="color:#f46732;"></i>ประชุมผู้เชี่ยวชาญ</a></li> --}}
                    <li><a href="{{ route('DeleteExpert') }}?id={{ $value->id }}&id_case={{$value->id_case}}" id="btnDelete" type="button" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');"><i class="fa  fa-trash-o" aria-hidden="true" style="color:#d9534f;"></i>ลบข้อมูล</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <?php endforeach;?>
          </table>
          {{-- <button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button> --}}
          {{--
						  								 <div class="col-sm-2">
						  									 <input type="text" name="req_count[]" >
						  								 </div> --}}

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
                  {{-- <a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" type="button" class="btn btn-outline">ลบข้อมูล</a> --}}
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.row -->
</section>

@include('AEFI.layout.footercaselstScript')
<!-- /.content -->
@stop
