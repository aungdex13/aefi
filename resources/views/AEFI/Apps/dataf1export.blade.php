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
          				<table id="example" class="display table-striped table-bordered" style="width:600%">
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
                        <th>วันที่จำหน่าย</th>
			                  <th>วันรับรักษา</th>
                        <th>วัคซีนที่ได้รับ</th>
                        <th>เลขที่วัคซีน</th>
                        <th>เข็มที่</th>
                        <th>ชื่อผู้ผลิต</th>
                        <th>ว/ด/ป ที่ได้รับวัคซีน</th>
                        <th>เวลาที่ได้รับวัคซีน</th>

                        <th @hasrole('ddc') hidden @endhasrole>Rash</th>
                        <th @hasrole('ddc') hidden @endhasrole>Erythema</th>
                        <th @hasrole('ddc') hidden @endhasrole>Urticaria</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Itching</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Edema</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Angioedema</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Fainting</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Hyperventilation</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Syncope</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Headche</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Dizziness</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Fatigue</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Malaise</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Dyspepsia</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Diarrhea</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Nausea</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Vomiting</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Abdominal pain</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Arthalgia</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Myalgia</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Fever38c</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>บวมบริเวณที่ฉีดนานเกิน3วัน</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>บวมลามไปถึงข้อที่ใกล้ที่สุด</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Lymphadenopathy</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Lymphadenitis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Sterile abscess</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Bacterial abscess</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Febrile convulsion</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Afebrile convulsion</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Encephalopathy</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Flaccid paralysis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Spastic paralysis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>HHE</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Persistent inconsolable crying</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Thrombocytopenia</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Osteomyelitis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Toxic shock syndrome</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Sepsis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Anaphylaxis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Transverse myelitis</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>GBS</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Adem</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Acute myocardial</th>
                        <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>Ards</th>
			                  <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>อาการอื่นๆ</th>
			                  <th @hasrole('ddc') hidden @endhasrole @hasrole('ddc') hidden @endhasrole>รายละเอียดอาการและการตรวจสอบ</th>

                        <th>Seriousness</th>
                        <th>conclusion</th>
                        <th>การวินิจฉัยหลักของแพทย์ </th>
                        <th>การวินิจฉัยรองของแพทย์ </th>
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
                          {{-- <p style="text-align:center;">{{date('Y',strtotime(isset($value->datepicker_send_reported) ? $value->datepicker_send_reported : "-"))  }}-{{str_pad(isset($cutVacName[0]) ? $cutVacName[0] : "NULL", 2, '0', STR_PAD_LEFT)}}-{{$value->id}}</p> --}}
                          <p style="text-align:center;">{{date('Y',strtotime(isset($value->datepicker_send_reported) ? $value->datepicker_send_reported : "-"))  }}-{{ isset($vacgrouplist[$value->name_of_vaccine]) ? $vacgrouplist[$value->name_of_vaccine] : ""}}-{{$value->id}}</p>
                        </td>
                        								        <td>{{ $value->hn }}</td>
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
                        {{-- <td>{{ isset($value->age_while_sick_year) ? $value->age_while_sick_year: "-" }}</td> --}}
                        <td>{{ isset($value->age_while_sick_month) ? $value->age_while_sick_month:"-" }}</td>
                        <td>{{ isset($value->age_while_sick_day) ? $value->age_while_sick_day:"-"}}</td>
								        <td>{{ $arr_gender[$value->gender] }}</td>
								        <td>{{ $arr_type_of_patient[$value->type_of_patient] }}</td>
                        <td>{{ $arr_patient_status[$value->patient_status] }}</td>
                        <td>{{ isset($value->career) ? $value->career: "-" }}{{ isset($list_career[$value->career_code]) ? $list_career[$value->career_code]:"ไม่ระบุข้อมูล"}}</td>
                        <td>{{ $value->date_of_symptoms }}</td>
                        <td>{{ $value->time_of_symptoms }}</td>
                        <td>{{ $value->time_of_treatment }}</td>
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
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->rash == '0027')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->erythema == '0028' )
                            {{"1 "}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->urticaria == '0044')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->itching == '0026')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->edema == '0003A')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->angioedema == '0003')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->fainting == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->hyperventilation == '0517')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->syncope == '0223')
                             {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->headche == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->dizziness == '0101')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->fatigue == '0724')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->malaise == '0728')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->dyspepsia == '0279')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->diarrhea == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->nausea == '0308')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->vomiting == '0228')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->abdominal_pain == '0268')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->arthalgia == '1')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->myalgia == '0072')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->fever38c == '0725')
                            {{"1"}}
                            @else
                            {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->swelling_at_the_injection == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->swelling_beyond_nearest_joint == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->lymphadenopathy == '0577')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->lymphadenitis == '0577D')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->sterile_abscess == '0051')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->bacterial_abscess == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->febrile_convulsion == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->afebrile_convulsion == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->encephalopathy == '0105')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->flaccid_paralysis == '0139')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->spastic_paralysis == '0775')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->hhe == '1704')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->persistent_inconsolable_crying == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->thrombocytopenia == '0594')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->osteomyelitis == '1184')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->toxic_shock_syndrome == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->sepsis == '0744')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->anaphylaxis == '2237')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->transverse_myelitis == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->gbs == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->adem == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                        </td>
                        <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->acute_myocardial == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                      </td>
                      <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->ards == '1')
                            {{"1"}}
                          @else
                          {{"0"}}
                          @endif
                      </td>
                      <td @hasrole('ddc') hidden @endhasrole>
                          @if ($value->symptoms_later_immunized == '9999')
                            {{ isset($value->other_symptoms_later_immunized) ? $value->other_symptoms_later_immunized: "" }}
                          @else
                          {{""}}
                          @endif
                      </td>
			                   <td @hasrole('ddc') hidden @endhasrole>{{ $value->Symptoms_details }}</td>
                        <td>{{ $arr_seriousness_of_the_symptoms[$value->seriousness_of_the_symptoms] }}</td>
                        <td>{{ $value->diagnosis }}</td>
                        <td>{{ isset($list_icd10[$value->main_diagnosis]) ? $list_icd10[ $value->main_diagnosis] : "" }}</td>
                        <td>{{ isset($list_icd10[$value->minor_diagnosis]) ? $list_icd10[ $value->minor_diagnosis] : "" }}</td>
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
