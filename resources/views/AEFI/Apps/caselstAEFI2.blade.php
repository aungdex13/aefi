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
          <h3 class="box-title"><a href="{{ route('form2') }}?id_case={{ $idcase }}" type="button" class="btn btn-success btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI 2</a></h3>
        </div>
        {{-- <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div> --}}
        <!-- /.box-header -->
        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
            {{-- <a href="{{ route('form2') }}?id_case={{ $idcase }}" type="button" class="btn btn-success btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มข้อมูล AEFI2</a></br> --}}
          <table class="table table-bordered" id="case_lst" class="display" style="width:100%">
            <thead>
              <tr>
                <th>ชื่อ-สกุล ผู้บันทึกข้อมูล</th>
                <th>หน่วยงาน</th>
                <th>ชื่อไฟล์</th>
                {{-- <th>สภาพผู้ป่วยขณะสอบสวน</th> --}}
                <th>***</th>
              </tr>
            </thead>
            <?php foreach($data as $value) : ?>
            <tr class="data-contact-person">
              <td>
                <p style="text-align:center;">{{ $value->record_name }}</p>
              </td>
              <td>
                <p style="text-align:center;">{{ $value->record_division }}</p>
              </td>
              <td>
                <p style="text-align:center;">{{ $value->originalfilename }}</p>
              </td>
              {{-- <td>
                <p style="text-align:center;">{{ $value->status_on_date_inv_1 }}</p>
              </td> --}}
              <td>
                <div class="btn-group">
                  <a href="{{ route('downloadaefi2') }}?id_case={{ $value->id_case }}&file_name={{ $value->file_name }}" type="button" class="btn btn-warning btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>ดาวน์โหลดไฟล์ AEFI2</a>
                    <a href="{{ route('deleteAEFI2') }}?id_case={{ $value->id_case }}&file_name={{ $value->file_name }}" id="btnDelete" type="button" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');">ลบข้อมูล</a>
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
