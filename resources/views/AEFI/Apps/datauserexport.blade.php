@extends('AEFI.layout.tabletemplate')
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
?>
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<h1>
  ส่งออกข้อมูลผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
  <small>AEFI</small>
</h1>
<ol class="breadcrumb">

</ol>

</section>
<!-- Main content -->
<section class="content">
  <div class="row">
		<div class="col-md-12">
		  <div class="box box-solid">
			<div class="box-header with-border">
			  <h3 class="box-title">รายงาน :: Adverse Events Following Immunization : AEFI</h3>
			</div>
			<!-- /.box-header -->

			<div class="box-body table-responsive">
          <!-- /.form group -->
				<!-- Custom Tabs -->
        <p>ดาวน์โหลดข้อมูล</p>
				<table id="example" class="display table-striped table-bordered">
				        <thead>
				            <tr>
        							  <th>no</th>
				                <th>ชื่อ</th>
				                <th>นามสกุล</th>
				                <th>Email</th>
                        {{-- <th>อายุขณะป่วย</th> --}}
				                <th>หน่วยงาน</th>
                        <th>จังหวัด</th>
                        <th>สถานะ</th>
				            </tr>
				        </thead>
				        <tbody>
							<?php foreach($selectdata as $value) : ?>
				            <tr>
				                <td style="text-align: center; vertical-align: middle;">{{ $value->id }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $value->name }}</td>
                        <td style="text-align: center; vertical-align: middle;" >{{ $value->sur_name }}</td>
								        <td style="text-align: center; vertical-align: middle;">{{ $value->email }}</td>
				                <td style="text-align: center; vertical-align: middle;">@if($value->hospcode) {{ $data_list_division[$value->hospcode] }} @else - @endif</td>
				                {{-- <td style="text-align: center; vertical-align: middle;" width="10%">{{ isset($value->age_while_sick_year) ? $value->age_while_sick_year: "-" }}ปี --}}
                            {{-- {{ isset($value->age_while_sick_month) ? $value->age_while_sick_month:"-" }}เดือน --}}
                            {{-- {{ isset($value->age_while_sick_day) ? $value->age_while_sick_day:"-"}}วัน</td> --}}
								        <td style="text-align: center; vertical-align: middle;">{{ isset($listProvince[$value->prov_code]) ?$listProvince[$value->prov_code] : " - "}}</td>
                        <td style="text-align: center; vertical-align: middle;">
                          @if ($value->confirm == 1)
                          <font color="#2a9d8f">อนุญาตให้ใช้งาน</font>
                          @else
                          <font color="#e63946">ยังไม่อนุญาตให้ใช้งาน</font>
                        @endif
                        </td>
				            </tr>
							<?php endforeach;?>
				        </tbody>
				        {{-- <tfoot>
				            <tr>
								<th>เลขที่ผู้ป่วย</th>
				                <th>ชื่อ</th>
				                <th>นามสกุล</th>
				                <th>ที่อยู่ขณะเริ่มป่วย</th>
				                <th>เพศ</th>
				                <th>อายุขณะป่วย</th>
				                <th>อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรค</th>
				            </tr>
				        </tfoot> --}}

				    </table>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>

@include('AEFI.layout.footerScriptindex')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable( {
	dom: 'Bfrtip',
	buttons: [
		'copy', 'excel', 'print'
	]
} );
} );
</script>
<script>
$("#datepicker").datepicker( {
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years",
    minViewMode: "years"
});
</script>
<!-- /.content -->
@stop
