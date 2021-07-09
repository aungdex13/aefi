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
$arr_r_o = load_r_o();
$arr_load_final_diag = load_final_diag();
$arr_causality = load_causality();
$arr_load_aefi_classification = load_aefi_classification();
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
      <form action="{{route('ExpertExport') }}" method="post">
        {{ csrf_field() }}
      <div class="box-header with-border">
        <div class="col-lg-3">
          <input type="text" id="reservation" name="date_of_symptoms" class="form-control" placeholder="ระบุวันที่ที่ต้องการค้นหาข้อมูล" readonly>
          <!-- /input-group -->
        </div>
        <h3 class="box-title">
          <button type="submit" class="btn btn-block  btn-success">ค้นหาข้อมูล</button>
            {{-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i>ค้นหาข้อมูล</a> --}}
        </h3>
      </div>
    </from>
			<div class="box-body table-responsive">
          <!-- /.form group -->
				<!-- Custom Tabs -->
                <p>ดาวน์โหลดข้อมูล
          @if ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null)  == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)

          @elseif ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null) == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)
            วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
          @else
            วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
          @endif</p>				<table id="example" class="display table-striped table-bordered" style="width:600%">
				        <thead>
				            <tr>
                      <th hidden>ID</th>
                      <th style="text-align:center;">ID</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>เพศ</th>
        							  <th>จังหวัดที่รายงาน</th>
                        {{-- <th>วัคซีนที่ได้รับ</th>
                        <th>วันที่ได้รับวัคซีน</th> --}}
        								<th>โรงพยาบาลที่เข้ารับรักษา</th>
				                <th>การวินิจฉัยแรกรับของแพทย์</th>
                        <th>Final Diagnosis</th>
                        <th>Causality Assessment</th>
                        <th>Summary</th>
                        <th>Expert Meeting</th>
				            </tr>
				        </thead>
				        <tbody>
							<?php foreach($selectdata as $value) : ?>
				            <tr>
                      <td hidden>
                        <p style="text-align:center;">{{ isset($value->id) ? $value->id : "-"}}</p>
                      </td>
                      <td>
                        <p style="text-align:center;">
                          {{date('Y',strtotime(isset($value->date_of_symptoms) ? $value->date_of_symptoms : "-"))}}-xxx
                          {{-- {{str_pad( isset($value->name_of_vaccine) ? $value->name_of_vaccine : "NULL", 2, '0', STR_PAD_LEFT)}} --}}
                          -{{$value->id}}</p>
                      </td>
                        <td style="text-align: center; vertical-align: middle;" width="4%">{{ $value->first_name }}</td>
                        <td style="text-align: center; vertical-align: middle;" width="4%">{{ $value->sur_name }}</td>
                        <td>{{ $arr_gender[$value->gender] }}</td>
                        <td>{{ isset($listProvince[ $value->province_reported]) ?$listProvince[ $value->province_reported] : "ไม่ระบุข้อมูล"}}</td>
                        {{-- <td>
                          @php
                          $myStringvac = $value->name_of_vaccine ;
                          $myArrayvac = explode(',', $myStringvac);
                          @endphp
                          @foreach($myArrayvac as $valuev)
                          {{ isset($listvac_arr[$valuev]) ? $listvac_arr[$valuev]: "ไม่ระบุข้อมูล" }}</br>
                          @endforeach
                        </td>
                        <td>
                          @php
                          $myStringdate_of_vaccination = $value->date_of_vaccination ;
                          $myArraydate_of_vaccination = explode(',', $myStringdate_of_vaccination);
                          @endphp
                          @foreach($myArraydate_of_vaccination as $valuevs)
                          {{ isset($valuevs) ? $valuevs: "ไม่ระบุข้อมูล" }}</br>
                          @endforeach
                        </td> --}}
                        <td>{{ isset($list_hos[ $value->hospcode_treat]) ? $list_hos[ $value->hospcode_treat] : ""}}</td>
                        <td>{{  isset($arr_r_o[$value->r_o]) ? $arr_r_o[$value->r_o] : ''}} {{ isset($value->other_r_o) ? $value->other_r_o : "" }}</td>
                        <td>{{  isset($arr_load_final_diag[$value->final_diag]) ? $arr_load_final_diag[$value->final_diag] : ''}} {{ isset($value->other_final_diag) ? $value->other_final_diag : "" }}</td>
                        <td>{{  isset($arr_causality[$value->causality]) ? $arr_causality[$value->causality] : ''}}</td>
                        <td>{{ isset($value->summary) ? $value->summary : "" }}</td>
                        <td>{{ isset($value->expert_meet_date) ? $value->expert_meet_date : "" }}</td>

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
