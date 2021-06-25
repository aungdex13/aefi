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
            วันที่  {{$datenow}}
          @elseif ((isset($date_of_symptoms_from) ?  $date_of_symptoms_from : null) == null && (isset($date_of_symptoms_to) ?  $date_of_symptoms_to : null) == null)
            วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
          @else
            วันที่  {{$date_of_symptoms_from}} ถึง วันที่ {{$date_of_symptoms_to}}
          @endif</p>				<table id="example" class="display table-striped table-bordered" style="width:600%">
				        <thead>
				            <tr>
        							  <th>no</th>
<th>ID</th>
        								<th>รหัสผู้ป่วย</th>
				                <th>ชื่อ</th>
				                <th>นามสกุล</th>
				                <th>ที่อยู่ขณะเริ่มป่วย</th>
                        <th>จังหวัดขณะเริ่มป่วย</th>
                        <th>อำเภอขณะเริ่มป่วย</th>
                        <th>ตำบลขณะเริ่มป่วย</th>
                        <th>อายุปีขณะป่วย</th>
                        <th>อายุเดือนขณะป่วย</th>
                        <th>อายุวันขณะป่วย</th>
			<th>เพศ</th>
                        <th>ประเภทผู้ป่วย</th>
                        <th>สถานะผู้ป่วย</th>
<th>อาชีพ</th>
                        <th>ว/ด/ป ที่เกิดอาการ</th>
                        <th>เวลาที่เกิดอาการ</th>
			<th>วันรับรักษา</th>
                        <th>วัคซีนที่ได้รับ</th>
<th>เลขที่วัคซีน</th>
                        <th>เข็มที่</th>
                        <th>ชื่อผู้ผลิต</th>
                        <th>ว/ด/ป ที่ได้รับวัคซีน</th>
                        <th>เวลาที่ได้รับวัคซีน</th>
                        <th>Rash</th>
                        <th>Erythema</th>
                        <th>Urticaria</th>
                        <th>Itching</th>
                        <th>Edema</th>
                        <th>Angioedema</th>
                        <th>Fainting</th>
                        <th>Hyperventilation</th>
                        <th>Syncope</th>
                        <th>Headche</th>
                        <th>Dizziness</th>
                        <th>Fatigue</th>
                        <th>Malaise</th>
                        <th>Dyspepsia</th>
                        <th>Diarrhea</th>
                        <th>Nausea</th>
                        <th>Vomiting</th>
                        <th>Abdominal pain</th>
                        <th>Arthalgia</th>
                        <th>Myalgia</th>
                        <th>Fever38c</th>
                        <th>บวมบริเวณที่ฉีดนานเกิน3วัน</th>
                        <th>บวมลามไปถึงข้อที่ใกล้ที่สุด</th>
                        <th>Lymphadenopathy</th>
                        <th>Lymphadenitis</th>
                        <th>Sterile abscess</th>
                        <th>Bacterial abscess</th>
                        <th>Febrile convulsion</th>
                        <th>Afebrile convulsion</th>
                        <th>Encephalopathy</th>
                        <th>Flaccid paralysis</th>
                        <th>Spastic paralysis</th>
                        <th>HHE</th>
                        <th>Persistent inconsolable crying</th>
                        <th>Thrombocytopenia</th>
                        <th>Osteomyelitis</th>
                        <th>Toxic shock syndrome</th>
                        <th>Sepsis</th>
                        <th>Anaphylaxis</th>
                        <th>Transverse myelitis</th>
                        <th>GBS</th>
                        <th>Adem</th>
                        <th>Acute myocardial</th>
                        <th>Ards</th>
			<th>อาการอื่นๆ</th>
			<th>รายละเอียดอาการและการตรวจสอบ</th>
                        <th>Seriousness</th>
                        <th>conclusion</th>
                        <th>โรงพยาบาลที่รับรักษา</th>
                        <th>จังหวัดที่รายงาน</th>
			<th>ว/ด/ป ที่ส่งรายงาน</th>
                        <th>ว/ด/ป ที่รับรายงาน</th>
                        <th>ประวัติทางการแพทย์</th>

                        <th>การตรวจทางห้องปฏิบัติการ</th>
                        <th>หมายเหตุ</th>
				            </tr>
				        </thead>
				        <tbody>
							<?php foreach($selectdata as $value) : ?>
				            <tr>
				                <td>{{ $value->id }}</td>
                        <td>
                          @php
                            $vac_name = isset($value->name_of_vaccine) ? $value->name_of_vaccine : "NULL" ;
                             $cutVacName = explode(',', $vac_name);
                          @endphp
                          <p style="text-align:center;">{{date('Y',strtotime(isset($value->date_entry) ? $value->date_entry : "-"))  }}-{{str_pad(isset($cutVacName[0]) ? $cutVacName[0] : "NULL", 2, '0', STR_PAD_LEFT)}}-{{$value->id}}</p>
                        </td>								        <td>{{ $value->hn }}</td>
				                <td style="text-align: center; vertical-align: middle;" width="4%">{{ $value->first_name }}</td>
				                <td style="text-align: center; vertical-align: middle;" width="4%">{{ $value->sur_name }}</td>
				                <td>
                            {{ $value->house_number }}
                            @if ($value->village_no != null)
                              หมู่ {{ $value->village_no }}
                            @endif
                          </br>
                          </td>
                        <td>{{ isset($listProvince[ $value->province]) ?$listProvince[ $value->province] : "ไม่ระบุข้อมูล"}}</td>
                        <td>{{ isset($listDistrict[$value->district]) ? $listDistrict[$value->district]: "ไม่ระบุข้อมูล" }}</td>
                        <td>{{ isset($listsubdistrict[$value->subdistrict]) ?  $listsubdistrict[$value->subdistrict] : "ไม่ระบุข้อมูล"}}</td>
                        <td>{{ isset($value->age_while_sick_year) ? $value->age_while_sick_year: "-" }}</td>
                        <td>{{ isset($value->age_while_sick_month) ? $value->age_while_sick_month:"-" }}</td>
                        <td>{{ isset($value->age_while_sick_day) ? $value->age_while_sick_day:"-"}}</td>
								        <td>{{ $arr_gender[$value->gender] }}</td>
								        <td>{{ $arr_type_of_patient[$value->type_of_patient] }}</td>
                        <td>{{ $arr_patient_status[$value->patient_status] }}</td>
<td>{{ isset($value->career) ? $value->career: "-" }}</td>
                        <td>{{ $value->date_of_symptoms }}</td>
                        <td>{{ $value->time_of_symptoms }}</td>
                        <td>{{ $value->date_of_treatment }}</td>
                        <td>
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
                          $myStringlotnumber = $value->lot_number ;
                          $myArraylotnumber = explode(',', $myStringlotnumber);
                          @endphp
                          @foreach($myArraylotnumber as $valueln)
                          {{ isset($valueln) ? $valueln: "ไม่ระบุข้อมูล" }}</br>
                          @endforeach
                        </td>
                        <td>
                          @php
                          $myStringdose = $value->dose ;
                          $myArraydose = explode(',', $myStringdose);
                          @endphp
                          @foreach($myArraydose as $valuevs)
                          {{ isset($valuevs) ? $valuevs: "ไม่ระบุข้อมูล" }}</br>
                          @endforeach
                        </td>
                        <td>
                          @php
                          $myStringmanufacturer = $value->manufacturer ;
                          $myArraymanufacturer = explode(',', $myStringmanufacturer);
                          @endphp
                          @foreach($myArraymanufacturer as $valuevs)
                          {{ isset($arr_manufacturer[$valuevs]) ? $arr_manufacturer[$valuevs]: "ไม่ระบุข้อมูล" }}</br>
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
                        </td>
                        <td>
                          @php
                          $myStringtime_of_vaccination = $value->time_of_vaccination ;
                          $myArraytime_of_vaccination = explode(',', $myStringtime_of_vaccination);
                          @endphp
                          @foreach($myArraytime_of_vaccination as $valuevs)
                          {{ isset($valuevs) ? $valuevs: "ไม่ระบุข้อมูล" }}</br>
                          @endforeach
                        </td>
                        <td>
                          @if ($value->rash == '0027')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->erythema == '0028' )
                            {{"1 "}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->urticaria == '0044')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->itching == '0026')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->edema == '0003A')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->angioedema == '0003')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->fainting == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->hyperventilation == '0517')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->syncope == '0223')
                             {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->headche == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->dizziness == '0101')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->fatigue == '0724')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->malaise == '0728')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->dyspepsia == '0279')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->diarrhea == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->nausea == '0308')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->vomiting == '0228')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->abdominal_pain == '0268')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->arthalgia == '1')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->myalgia == '0072')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->fever38c == '0725')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->swelling_at_the_injection == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->swelling_beyond_nearest_joint == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->lymphadenopathy == '0577')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->lymphadenitis == '0577D')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->sterile_abscess == '0051')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->bacterial_abscess == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->febrile_convulsion == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->afebrile_convulsion == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->encephalopathy == '0105')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->flaccid_paralysis == '0139')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->spastic_paralysis == '0775')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->hhe == '1704')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->persistent_inconsolable_crying == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->thrombocytopenia == '0594')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->osteomyelitis == '1184')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->toxic_shock_syndrome == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->sepsis == '0744')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->anaphylaxis == '2237')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->transverse_myelitis == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->gbs == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->adem == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td>
                          @if ($value->acute_myocardial == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                      </td>
                      <td>
                          @if ($value->ards == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                      </td>
                      <td>
                          @if ($value->symptoms_later_immunized == '9999')
                            {{ isset($value->other_symptoms_later_immunized) ? $value->other_symptoms_later_immunized: "" }}
                          @else
                          {{""}}
                          @endif
                      </td>
			<td>{{ $value->Symptoms_details }}</td>
                        <td>{{ $arr_seriousness_of_the_symptoms[$value->seriousness_of_the_symptoms] }}</td>
                        <td>{{ $value->diagnosis }}</td>
                        <td>{{ isset($list_hos[ $value->hospcode_treat]) ? $list_hos[ $value->hospcode_treat] : ""}}</td>
                       <td>{{ isset($listProvince[ $value->province_reported]) ?$listProvince[ $value->province_reported] : "ไม่ระบุข้อมูล"}}</td>
			                 <td>{{ isset($value->date_entry) ? $value->date_entry: "-" }}</td>
			                 <td>{{ isset($value->datepicker_resiver) ? $value->datepicker_resiver: "-" }}</td>
                        <td>{{ $value->other_medical_history }}</td>

                        <td>{{ $value->lab_result }}</td>
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
