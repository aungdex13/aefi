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
      <form action="{{route('dataf1export') }}" method="post">
        {{ csrf_field() }}
      <div class="box-header with-border">
        <div class="col-lg-3">
          <input type="text" id="datepicker" name="date_of_symptoms" class="form-control" placeholder="ระบุปีที่ต้องการค้นหา" readonly>
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
        <p>ดาวน์โหลดข้อมูล</p>
				<table id="example" class="display table-striped table-bordered" style="width:150%">
				        <thead>
				            <tr>
        							  <th>no</th>
        								<th>รหัสผู้ป่วย</th>
				                <th>ชื่อ</th>
				                <th>นามสกุล</th>
				                <th>ที่อยู่ขณะเริ่มป่วย</th>
                        <th>อายุขณะป่วย</th>
				                <th>เพศ</th>
                        <th>ประเภทผู้ป่วย</th>
                        <th>สภาพผู้ป่วย</th>
                        <th>วันเริ่มป่วย</th>
				                <th>วันรับรักษา</th>
                        <th>อาการ</th>
                        <th>Seriousness</th>
                        <th>conclusion</th>
                        <th>หมายเหตุ</th>
				            </tr>
				        </thead>
				        <tbody>
							<?php foreach($selectdata as $value) : ?>
				            <tr>
				                <td>{{ $value->id_case }}</td>
								        <td>{{ $value->hn }}</td>
				                <td style="text-align: center; vertical-align: middle;" width="4%">{{ $value->first_name }}</td>
				                <td style="text-align: center; vertical-align: middle;" width="4%">{{ $value->sur_name }}</td>
				                <td>
                            {{ $value->house_number }}
                            {{ $value->village_no }}</br>
                            ตำบล :{{ isset($listsubdistrict[$value->subdistrict]) ?  $listsubdistrict[$value->subdistrict] : "ไม่ระบุข้อมูล"}}<br>
                            อำเภอ : {{ isset($listDistrict[$value->district]) ? $listDistrict[$value->district]: "ไม่ระบุข้อมูล" }}<br>
                            จังหวัด :{{ isset($listProvince[ $value->province]) ?$listProvince[ $value->province] : "ไม่ระบุข้อมูล"}}</td>
				                <td style="text-align: center; vertical-align: middle;" width="10%">{{ isset($value->age_while_sick_year) ? $value->age_while_sick_year: "-" }}ปี
                            {{ isset($value->age_while_sick_month) ? $value->age_while_sick_month:"-" }}เดือน
                            {{ isset($value->age_while_sick_day) ? $value->age_while_sick_day:"-"}}วัน</td>
								        <td>{{ $arr_type_of_patient[$value->type_of_patient] }}</td>
								        <td>{{ $arr_gender[$value->gender] }}</td>
                        <td>{{ $arr_patient_status[$value->patient_status] }}</td>
                        <td>{{ $value->date_of_symptoms }}</td>
                        <td>{{ $value->date_of_treatment}}</td>
                        <td>
                          @if ($value->rash == '0027')
                            {{"/ rash "}}
                          @endif
                          @if ($value->erythema == '0028' )
                            {{"/ erythema "}}
                          @endif
                          @if ($value->urticaria == '0044')
                            {{"/ urticaria"}}
                          @endif
                          @if ($value->itching == '0026')
                            {{"/ itching"}}
                          @endif
                          @if ($value->edema == '0003A')
                            {{"/ edema"}}
                          @endif
                          @if ($value->angioedema == '0003')
                            {{"/ angioedema"}}
                          @endif
                          @if ($value->fainting == '1')
                            {{"/ fainting"}}
                          @endif
                          @if ($value->hyperventilation == '0517')
                            {{"/ hyperventilation"}}
                          @endif
                          @if ($value->syncope == '0223')
                            {{"/ syncope"}}
                          @endif
                          @if ($value->headche == '1')
                            {{"/ headche"}}
                          @endif
                          @if ($value->dizziness == '0101')
                            {{"/ dizziness"}}
                          @endif
                          @if ($value->fatigue == '0724')
                            {{"/ fatigue"}}
                          @endif
                          @if ($value->malaise == '0728')
                            {{"/ malaise"}}
                          @endif
                          @if ($value->dyspepsia == '0279')
                            {{"/ dyspepsia"}}
                          @endif
                          @if ($value->diarrhea == '1')
                            {{"/ diarrhea"}}
                          @endif
                          @if ($value->nausea == '0308')
                            {{"/ nausea"}}
                          @endif
                          @if ($value->vomiting == '0228')
                            {{"/ vomiting"}}
                          @endif
                          @if ($value->abdominal_pain == '0268')
                            {{"/ abdominal pain"}}
                          @endif
                          @if ($value->arthalgia == '1')
                            {{"/ arthalgia"}}
                          @endif
                          @if ($value->myalgia == '0072')
                            {{"/ myalgia"}}
                          @endif
                          @if ($value->fever38c == '0725')
                            {{"/ fever38c"}}
                          @endif
                          @if ($value->swelling_at_the_injection == '1')
                            {{"/ บวมบริเวณที่ฉีดนานเกิน3วัน"}}
                          @endif
                          @if ($value->swelling_beyond_nearest_joint == '1')
                            {{"/ บวมลามไปถึงข้อที่ใกล้ที่สุด"}}
                          @endif
                          @if ($value->lymphadenopathy == '0577')
                            {{"/ lymphadenopathy"}}
                          @endif
                          @if ($value->lymphadenitis == '0577D')
                            {{"/ lymphadenitis"}}
                          @endif
                          @if ($value->sterile_abscess == '0051')
                            {{"/ sterile abscess"}}
                          @endif
                          @if ($value->bacterial_abscess == '1')
                            {{"/ bacterial abscess"}}
                          @endif
                          @if ($value->febrile_convulsion == '1')
                            {{"/ febrile convulsion"}}
                          @endif
                          @if ($value->afebrile_convulsion == '1')
                            {{"/ afebrile_convulsion"}}
                          @endif
                          @if ($value->encephalopathy == '0105')
                            {{"/ Encephalopathy/Encephalitis"}}
                          @endif
                          @if ($value->flaccid_paralysis == '0139')
                            {{"/ flaccid paralysis"}}
                          @endif
                          @if ($value->spastic_paralysis == '0775')
                            {{"/ spastic paralysis"}}
                          @endif
                          @if ($value->hhe == '1704')
                            {{"/ hhe"}}
                          @endif
                          @if ($value->persistent_inconsolable_crying == '1')
                            {{"/ persistent inconsolable crying"}}
                          @endif
                          @if ($value->thrombocytopenia == '0594')
                            {{"/ thrombocytopenia"}}
                          @endif
                          @if ($value->osteomyelitis == '1184')
                            {{"/ osteomyelitis"}}
                          @endif
                          @if ($value->toxic_shock_syndrome == '1')
                            {{"/ toxic shock syndrome"}}
                          @endif
                          @if ($value->sepsis == '0744')
                            {{"/ sepsis"}}
                          @endif
                          @if ($value->anaphylaxis == '2237')
                            {{"/ anaphylaxis"}}
                          @endif
                          @if ($value->transverse_myelitis == '1')
                            {{"/ transverse_myelitis"}}
                          @endif
                          @if ($value->gbs == '1')
                            {{"/ GBS"}}
                          @endif
                          @if ($value->adem == '1')
                            {{"/ adem"}}
                          @endif
                          @if ($value->acute_myocardial == '1')
                            {{"/ acute_myocardial"}}
                          @endif
                          @if ($value->ards == '1')
                            {{"/ ards"}}
                          @endif

                      </td>
                        <td>{{ $arr_seriousness_of_the_symptoms[$value->seriousness_of_the_symptoms] }}</td>
                        <td>{{ $value->diagnosis }}</td>
                        <td>{{ $value->more_reviews }}</td>
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
		'copy', 'excel', 'pdf', 'print'
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
