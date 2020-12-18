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
				<h3 class="box-title"></h3>
				</div>
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
						  <th>วันเดือนปีเกิด</th>
						  <th>เพศ</th>
						  <th>เชื้อชาติ</th>
						  <th>ที่อยู่</th>
						  <th>***</th>
		                </tr>
					</thead>
					<?php foreach($data as $value) : ?>
		                <tr class="data-contact-person">
						  <td><p style="text-align:center;">{{ $value->hn }}</p></td>
						  <td><p style="text-align:center;">{{ $value->an }}</p></td>
						  <td><p style="text-align:center;">{{ $value->first_name }} {{ $value->sur_name }}</p></td>
						  <td><p style="text-align:center;">{{ $value->birthdate }}</p></td>
						  <td><p style="text-align:center;">{{ $value->gender }}</p></td>
						  <td><p style="text-align:center;">{{ $value->nationality }}</p></td>
						  <td><p style="text-align:center;">{{ $value->province }} {{ $value->district }} {{ $value->subdistrict }}</p></td>
						  <td>
							  <div class="btn-group">
								<a href="{{ route('EditAEFI2') }}?id_case={{ $value->id_case }}" type="button" class="btn btn-warning btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไข AEFI2</a>
								<button type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i>ลบ</button>
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
