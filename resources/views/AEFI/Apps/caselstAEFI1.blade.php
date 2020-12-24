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
              <th>เลขที่ผู้ป่วย HN</th>
              <th>เลขที่ผู้ป่วย AN</th>
              <th>ชื่อ-นามสกุลผู้ป่วย</th>
              <th>อายุ</th>
              <th>เชื้อชาติ</th>
              <th>ที่อยู่</th>
              <th>มีความจำเป็นที่จะต้องสอบสวนโรค</th>
              <th>***</th>
            </tr>
          </thead>
          <?php foreach($data as $value) : ?>
          <tr class="data-contact-person">
            <td>
              <p style="text-align:center;">{{ $value->hn }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->an }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->first_name }} {{ $value->sur_name }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->age_while_sick_year }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->nationality }} {{ $value->other_nationality }}</p>
            </td>
            <td>
              <p style="text-align:center;">ตำบล : {{ $value->subdistrict }}<br> อำเภอ : {{ $value->district }}<br> จังหวัด : {{ $value->province }}</p>
            </td>
            <td>
              <p style="text-align:center;">{{ $value->necessary_to_investigate }}</p>
            </td>
            <td>
              <div class="btn-group">
                <a href="{{ route('EditAEFI1') }}?id_case={{ $value->id_case }}" type="button" class="btn btn-warning btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไขข้อมูล</a>
                {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-warning">ลบข้อมูล</button> --}}
                <a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" id="btnDelete" type="button" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');">ลบข้อมูล</a>
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
