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
      <form action="{{route('aefiexportbtn') }}" method="post">
        {{ csrf_field() }}
      <div class="box-header with-border">
        <div class="col-lg-3">
          <input type="text" id="reservation" name="date_of_symptoms" class="form-control" placeholder="ระบุวันที่ที่ต้องการค้นหาข้อมูล" readonly>
          <!-- /input-group -->
        </div>
        <div class="col-lg-3">
          <select type="text" id="name_of_vaccine" name="name_of_vaccine" class="form-control">
            <option value="">ชื่อวัคซีนที่ได้รับ</option>
            @foreach ($vac_list as $row)
            <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
            @endforeach
          </select>
          <!-- /input-group -->
        </div>
        <h3 class="box-title">
          <button type="submit" class="btn btn-block  btn-success">ค้นหาข้อมูล</button>
            {{-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i>ค้นหาข้อมูล</a> --}}
        </h3>
      </div>
    </form>
			<div class="box-body table-responsive">
          <!-- /.form group -->
				<!-- Custom Tabs -->
                <p>ดาวน์โหลดข้อมูล
          @if ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null)  == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)
            วันที่  {{$datenow}}
          @elseif ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null) == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)
            วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
          @else
            วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
          @endif</p>
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
		'excel'
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
