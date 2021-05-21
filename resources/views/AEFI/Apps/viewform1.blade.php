
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AEFI 1 {{ $ViewAEFI1Data[0]->id_case }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="/asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/asset/dist/css/AdminLTE.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  section.invoice {
    font-size: 12px;
  }
  </style>
</head>
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
?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <input type="hidden" id="id" name="id" value="{{ $ViewAEFI1Data[0]->id }}" class="form-control">
  <input type="hidden" id="id_case" name="id_case" value="{{ $ViewAEFI1Data[0]->id_case }}" class="form-control">
  <input type="hidden" id="user_username" name="user_username" value="{{auth()->user()->username}}" class="form-control">
  <input type="hidden" id="user_hospcode" name="user_hospcode" value="{{auth()->user()->hospcode}}" class="form-control">
  <input type="hidden" id="user_provcode" name="user_provcode" value="{{auth()->user()->prov_code}}" class="form-control">
  <input type="hidden" id="user_region" name="user_region" value="{{auth()->user()->region}}" class="form-control">
  {{-- <input type="hidden" id="count_data_vac" name="count_data_vac" value="{{ $count_data_vac[0]->vac_count }}" class="form-control"> --}}
  <section class="invoice">
    <!-- title row -->
    {{-- <div class="form-group">
      <div class="row">
        <div class="col-sm-3 control-label">
          <label>เลขที่ผู้ป่วย:</label>
        </div>
        <div class="col-lg-4">
          <input type="text" id="hn" name="hn" value="{{ $ViewAEFI1Data[0]->hn }}" placeholder="HN">
        </div>
        <div class="col-lg-4">
          <input type="text" id="an" name="an" value="{{ $ViewAEFI1Data[0]->an }}" placeholder="AN">
        </div>
      </div>
    </div> --}}
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12">
      <p class="lead">(1)ข้อมูลผู้ป่วย</p>
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>เลขที่ผู้ป่วย : </strong><br>
                  HN {{ isset($ViewAEFI1Data[0]->hn) ? $ViewAEFI1Data[0]->hn : "ไม่ระบุข้อมูล" }} /
                  AN {{ isset($ViewAEFI1Data[0]->an) ? $ViewAEFI1Data[0]->an : "ไม่ระบุข้อมูล" }}<br>
          <strong>เลขประจำตัวบัตรประชาชน : </strong><br>
                  {{ isset($ViewAEFI1Data[0]->id_number) ? $ViewAEFI1Data[0]->id_number : "ไม่ระบุข้อมูล" }}<br>
          <strong>ชื่อ-สกุล : </strong><br>
                  {{ isset($arr_title_name[$ViewAEFI1Data[0]->title_name]) ? $arr_title_name[$ViewAEFI1Data[0]->title_name] : $ViewAEFI1Data[0]->title_name_other }}
                  {{ isset($ViewAEFI1Data[0]->first_name) ? $ViewAEFI1Data[0]->first_name : "ไม่ระบุข้อมูล" }}
                  {{ isset($ViewAEFI1Data[0]->sur_name) ? $ViewAEFI1Data[0]->sur_name : "ไม่ระบุข้อมูล" }}<br>
          <strong>เพศ : </strong>
                @if ($ViewAEFI1Data[0]->gender == 1)
                  {{"ชาย"}}<br>
                @elseif ($ViewAEFI1Data[0]->gender == 2)
                  {{"หญิง"}}<br>
                @else
                  {{"ไม่ระบุข้อมูล"}}<br>
                @endif
          <strong>วันเดือนปีเกิด :</strong>
                  {{ isset($ViewAEFI1Data[0]->birthdate) ? $ViewAEFI1Data[0]->birthdate : "ไม่ระบุข้อมูล" }}<br>
          <strong>อายุขณะป่วย : </strong>
                  {{ isset($ViewAEFI1Data[0]->age_while_sick_year) ? $ViewAEFI1Data[0]->age_while_sick_year : "" }} ปี
                  {{ isset($ViewAEFI1Data[0]->age_while_sick_month) ? $ViewAEFI1Data[0]->age_while_sick_month : "" }} เดือน
                  {{ isset($ViewAEFI1Data[0]->age_while_sick_day) ? $ViewAEFI1Data[0]->age_while_sick_day : "" }} วัน<br>
          <strong>กลุ่มอายุ:</strong>
                @if ($ViewAEFI1Data[0]->group_age == 1)
                  {{"น้อยกว่า 1 ปี"}}<br>
                @elseif ($ViewAEFI1Data[0]->group_age == 2)
                  {{"1-5 ปี"}}<br>
                @elseif ($ViewAEFI1Data[0]->group_age == 3)
                  {{"มากกว่า 5 ปี"}}<br>
                @else
                  {{"ไม่ระบุข้อมูล"}}<br>
                @endif
          <strong>เชื้อชาติ :</strong>
                @if ($ViewAEFI1Data[0]->nationality == 1)
                  {{"ไทย"}}<br>
                @elseif ($ViewAEFI1Data[0]->nationality == 2)
                  {{"พม่า"}}<br>
                @elseif ($ViewAEFI1Data[0]->nationality == 3)
                  {{"ลาว"}}<br>
                @else
                  {{ isset($ViewAEFI1Data[0]->other_nationality_text) ? $ViewAEFI1Data[0]->other_nationality_text : "ไม่ระบุข้อมูล" }}<br>
                @endif
                  {{-- {{ isset($ViewAEFI1Data[0]->nationality) ? $ViewAEFI1Data[0]->nationality :$ViewAEFI1Data[0]->other_nationality_text }}<br> --}}
          <strong>ประเภทผู้ป่วย :</strong>
                @if ($ViewAEFI1Data[0]->type_of_patient == 1)
                  {{"ผู้ป่วยใน"}}<br>
                @elseif ($ViewAEFI1Data[0]->type_of_patient == 2)
                  {{"ผู้ป่วยนอก"}}<br>
                @else
                  {{"ไม่ระบุข้อมูล"}}<br>
                @endif
          <strong>อาชีพ:</strong>
                  {{ isset($ViewAEFI1Data[0]->career) ? $ViewAEFI1Data[0]->career : "ไม่ระบุข้อมูล" }}<br>
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>ประวัติการแพ้วัคซีน : </strong>
          @if ($ViewAEFI1Data[0]->history_of_vaccine_drug_allergies_of_patient == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->history_of_vaccine_drug_allergies_of_patient == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>อาการหลังได้รับวัคซีน : </strong>
          @if ($ViewAEFI1Data[0]->patient_develop_symptoms_after_previous_vaccination == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->patient_develop_symptoms_after_previous_vaccination == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>โรคประจำตัว/การเจ็บป่วยในอดีต : </strong>
          @if ($ViewAEFI1Data[0]->underlying_disease == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->underlying_disease == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>ประวัติการใช้ยาในรอบ1เดือน : </strong>
          @if ($ViewAEFI1Data[0]->history_of_drug_use_within_1_month_before_getting_vaccination == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->history_of_drug_use_within_1_month_before_getting_vaccination == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>เคยป่วยเป็นโควิดหรือไม่ : </strong>
          @if ($ViewAEFI1Data[0]->history_of_covid == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->history_of_covid == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>ประวัติทางการแพทย์ : </strong>
          {{ isset($ViewAEFI1Data[0]->other_medical_history) ? $ViewAEFI1Data[0]->other_medical_history : "ไม่ระบุข้อมูล" }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>ที่อยู่ขณะเริ่มป่วย : </strong><br>
          {{ isset($ViewAEFI1Data[0]->house_number) ? $ViewAEFI1Data[0]->house_number : "" }}
          หมู่ {{ isset($ViewAEFI1Data[0]->village_no) ? $ViewAEFI1Data[0]->village_no : "" }}
          {{ isset($listsubdistrict[$ViewAEFI1Data[0]->subdistrict]) ?  $listsubdistrict[$ViewAEFI1Data[0]->subdistrict] : "ไม่ระบุข้อมูล"}}
          {{ isset($listDistrict[$ViewAEFI1Data[0]->district]) ? $listDistrict[$ViewAEFI1Data[0]->district]: "ไม่ระบุข้อมูล" }}
          {{ isset($listProvince[$ViewAEFI1Data[0]->province]) ?$listProvince[$ViewAEFI1Data[0]->province] : "ไม่ระบุข้อมูล"}}
          <br>
          <strong>โทรศัพท์ : </strong>{{ isset($ViewAEFI1Data[0]->phone_number) ? $ViewAEFI1Data[0]->phone_number : "ไม่ระบุข้อมูล" }}<br>
          <strong>ชื่อผู้ปกครอง : </strong><br>
          {{ isset($ViewAEFI1Data[0]->parent_name) ? $ViewAEFI1Data[0]->parent_name : "ไม่ระบุข้อมูล" }}
          {{ isset($ViewAEFI1Data[0]->parent_sur_name) ? $ViewAEFI1Data[0]->parent_sur_name : "ไม่ระบุข้อมูล" }}
          <br>
          <strong>โทรศัพท์ผู้ปกครอง : </strong>
          {{ isset($ViewAEFI1Data[0]->parent_phone_number) ? $ViewAEFI1Data[0]->parent_phone_number : "ไม่ระบุข้อมูล" }}<br>
        </address>
      </div>
      <!-- /.col -->
      {{-- <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> --}}
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <p class="lead">(2) ข้อมูลวัคซีน / สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข)</p>
        <font size="1.5" face="Courier New" >
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ชื่อวัคซีน</th>
            <th>ปริมาณที่ให้</th>
            <th>วิธีที่ให้</th>
            <th>ตำแหน่ง</th>
            <th>เข็ม/ครั้งที่</th>
            <th>ว/ด/ปที่ได้รับ</th>
            <th>ชื่อผู้ผลิต</th>
            <th>เลขที่ผลิต</th>
            <th>วันหมดอายุ</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($ViewAEFI1vacData as $value)
              <tr>
                <td>{{isset($listvac_arr[$value->name_of_vaccine]) ? $listvac_arr[$value->name_of_vaccine]:""}}</td>
                <td>{{isset($arr_vaccine_volume[$value->vaccine_volume]) ? $arr_vaccine_volume[$value->vaccine_volume]:""}}</td>
                <td>{{isset($arr_route_of_vaccination[$value->route_of_vaccination]) ? $arr_route_of_vaccination[$value->route_of_vaccination]:""}}</td>
                <td>{{isset($arr_vaccination_site[$value->vaccination_site]) ? $arr_vaccination_site[$value->vaccination_site]:""}}</td>
                <td>{{isset($value->dose) ? $value->dose:""}}</td>
                <td>{{isset($value->date_of_vaccination) ? $value->date_of_vaccination:""}}</td>
                <td>{{isset($arr_manufacturer[$value->manufacturer])?$arr_manufacturer[$value->manufacturer]:""}}</td>
                <td>{{isset($value->lot_number) ? $value->lot_number:""}}</td>
                <td>{{isset($value->expiry_date) ? $value->expiry_date:""}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </font>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">(3) อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคและวินิจฉัย</p>
        <address>
          <strong>อาการ : </strong>
          @if ($ViewAEFI1Data[0]->rash == '0027')
            {{"Rash"}}
          @else
        @endif
          @if ($ViewAEFI1Data[0]->erythema == '0028' )
            {{" / Erythema"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->urticaria == '0044')
            {{" / Urticaria"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->itching == '0026')
            {{" / Itching"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->edema == '0003A')
            {{" / Edema"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->angioedema == '0003')
            {{" / Angioedema"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->fainting == '1')
            {{" / Fainting"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->hyperventilation == '0517')
            {{" / Hyperventilation"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->syncope == '0223')
             {{" / Syncope"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->headche == '1')
            {{" / Headche"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->dizziness == '0101')
            {{" / Dizziness"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->fatigue == '0724')
            {{" / Fatigue"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->malaise == '0728')
            {{" / Malaise"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->dyspepsia == '0279')
            {{" / Dyspepsia"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->diarrhea == '1')
            {{" / Diarrhea"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->nausea == '0308')
            {{" / Nausea"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->vomiting == '0228')
            {{" / Vomiting"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->abdominal_pain == '0268')
            {{" / Abdominal pain"}}
            @else
          @endif
          @if ($ViewAEFI1Data[0]->arthalgia == '1')
            {{" / Arthalgia"}}
            @else
          @endif
          @if ($ViewAEFI1Data[0]->myalgia == '0072')
            {{" / Myalgia"}}
            @else
          @endif
          @if ($ViewAEFI1Data[0]->fever38c == '0725')
            {{" / Fever >= 38 C"}}
            @else
          @endif
          @if ($ViewAEFI1Data[0]->swelling_at_the_injection == '1')
            {{" / บวมบริเวณที่ฉีดนานเกิน3วัน"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->swelling_beyond_nearest_joint == '1')
            {{" / บวมลามไปถึงข้อที่ใกล้ที่สุด"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->lymphadenopathy == '0577')
            {{" / Lymphadenopathy"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->lymphadenitis == '0577D')
            {{" / Lymphadenitis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->sterile_abscess == '0051')
            {{" / Sterile abscess"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->bacterial_abscess == '1')
            {{" / Bacterial abscess"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->febrile_convulsion == '1')
            {{" / Febrile convulsion"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->afebrile_convulsion == '1')
            {{" / Afebrile convulsion"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->encephalopathy == '0105')
            {{" / Encephalopathy/Encephalitis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->flaccid_paralysis == '0139')
            {{" / Flaccid paralysis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->spastic_paralysis == '0775')
            {{" / Spastic paralysis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->hhe == '1704')
            {{" / Hypotonic Hyporesponsive episode (HHE)"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->persistent_inconsolable_crying == '1')
            {{" / Persistent inconsolable crying"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->thrombocytopenia == '0594')
            {{" / Thrombocytopenia"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->osteomyelitis == '1184')
            {{" / Osteitis/Osteomyelitis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->toxic_shock_syndrome == '1')
            {{" / Toxic shock syndrome"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->sepsis == '0744')
            {{" / Sepsis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->anaphylaxis == '2237')
            {{" / Anaphylaxis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->transverse_myelitis == '1')
            {{" / Transverse myelitis"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->gbs == '1')
            {{" / Guillain-Barré syndrome (GBS)"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->adem == '1')
            {{" / Acute disseminated encephalomyelitis (ADEM)"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->acute_myocardial == '1')
            {{" / Acute Myocardial"}}
          @else
          @endif
          @if ($ViewAEFI1Data[0]->ards == '1')
            {{" / Acute respiratory distress syndrome (ARDS)"}}
          @else
          {{" / "}}  {{ isset($ViewAEFI1Data[0]->other_text_patient_develop_symptoms_after_previous_vaccination) ? $ViewAEFI1Data[0]->other_text_patient_develop_symptoms_after_previous_vaccination : "ไม่ระบุข้อมูล" }}
          @endif
          <br>
          <strong>ว/ด/ป ที่เกิดอาการ : </strong>
          {{ isset($ViewAEFI1Data[0]->date_of_symptoms) ? $ViewAEFI1Data[0]->date_of_symptoms : "ไม่ระบุข้อมูล" }}<br>
          <strong>เวลาที่เกิดอาการ : </strong>
          {{ isset($ViewAEFI1Data[0]->time_of_symptoms) ? $ViewAEFI1Data[0]->time_of_symptoms : "ไม่ระบุข้อมูล" }}<br>
          <strong>ว/ด/ป ที่รับรักษา : </strong>
          {{ isset($ViewAEFI1Data[0]->date_of_treatment) ? $ViewAEFI1Data[0]->date_of_treatment : "ไม่ระบุข้อมูล" }}<br>
          <strong>ว/ด/ป ที่จำหน่าย : </strong>
          {{ isset($ViewAEFI1Data[0]->time_of_treatment) ? $ViewAEFI1Data[0]->time_of_treatment : "ไม่ระบุข้อมูล" }}<br>
          <strong>รายละเอียดอาการและการตรวจสอบ : </strong><br>
          {{ isset($ViewAEFI1Data[0]->Symptoms_details) ? $ViewAEFI1Data[0]->Symptoms_details : "ไม่ระบุข้อมูล" }}<br>
          <strong>วินิจฉัยของแพทย์  : </strong><br>
          {{ isset($ViewAEFI1Data[0]->diagnosis) ? $ViewAEFI1Data[0]->diagnosis : "ไม่ระบุข้อมูล" }}<br>
          <strong>ความร้ายแรงของอาการ  : </strong>
          @if ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 1)
            {{"ไม่ร้ายแรง"}}<br>
          @elseif ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 2)
            {{"ร้ายแรง"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>สภาพผู้ป่วย  : </strong>
          @if ($ViewAEFI1Data[0]->patient_status == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->patient_status == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>ผ่าพิสูจน์ศพ  : </strong>
          @if ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 1)
            {{"หาย"}}<br>
          @elseif ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 2)
            {{"หายโดยมีร่องรอย"}}<br>
          @elseif ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 3)
            {{"อาการดีขึ้นแต่ยังไม่หาย"}}<br>
          @elseif ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 4)
            {{"ไม่หาย"}}<br>
          @elseif ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 5)
            {{"ไม่ทราบ"}}<br>
          @elseif ($ViewAEFI1Data[0]->seriousness_of_the_symptoms == 6)
            {{"เสียชีวิต"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          </address>
      </div>
      <div class="col-xs-6">
        <p class="lead">(4) การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน</p>
        <address>
          <strong>การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน : </strong>
          @if ($ViewAEFI1Data[0]->patient_status == 1)
            {{"ไม่มี"}}<br>
          @elseif ($ViewAEFI1Data[0]->patient_status == 2)
            {{"มี"}}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>วันที่สอบสวน : </strong>
          {{ isset($ViewAEFI1Data[0]->necessary_to_investigate_date) ? $ViewAEFI1Data[0]->necessary_to_investigate_date : "ไม่ระบุข้อมูล" }}<br>
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-12">
      <p class="lead">(5) ข้อมูลผู้รายงาน สถานที่เกิดเหตุการณ์ และหน่วยงานที่รายงาน</p>
      </div>
      <div class="col-xs-4">
        <address>
          <strong>ชื่อผู้วินิจฉัยอาการ : </strong>
          {{ isset($ViewAEFI1Data[0]->symptom_name) ? $ViewAEFI1Data[0]->symptom_name : "ไม่ระบุข้อมูล" }}<br>
          <strong>ตำแหน่ง : </strong>
          @if ($ViewAEFI1Data[0]->patient_status == 1)
            {{"แพทย์"}}<br>
          @elseif ($ViewAEFI1Data[0]->patient_status == 2)
            {{"เภสัชกร"}}<br>
          @elseif ($ViewAEFI1Data[0]->patient_status == 3)
            {{"พยาบาล"}}<br>
          @elseif ($ViewAEFI1Data[0]->patient_status == 4)
            {{ isset($ViewAEFI1Data[0]->other_symptom_position) ? $ViewAEFI1Data[0]->other_symptom_position : "ไม่ระบุข้อมูล" }}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>ชื่อผู้รายงาน : </strong>
          {{ isset($ViewAEFI1Data[0]->reporter_name) ? $ViewAEFI1Data[0]->reporter_name : "ไม่ระบุข้อมูล" }}<br>
          <strong>ตำแหน่ง : </strong>
          @if ($ViewAEFI1Data[0]->reporter_position == 1)
            {{"งานระบาดวิทยา"}}<br>
          @elseif ($ViewAEFI1Data[0]->reporter_position == 2)
            {{"เภสัชกร"}}<br>
          @elseif ($ViewAEFI1Data[0]->reporter_position == 3)
            {{"งานEIP"}}<br>
          @elseif ($ViewAEFI1Data[0]->reporter_position == 4)
            {{ isset($ViewAEFI1Data[0]->other_reporter_position) ? $ViewAEFI1Data[0]->other_reporter_position : "ไม่ระบุข้อมูล" }}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>ว/ด/ป ที่พบเหตุการณ์ : </strong>
          {{ isset($ViewAEFI1Data[0]->date_found_event) ? $ViewAEFI1Data[0]->date_found_event : "ไม่ระบุข้อมูล" }}<br>
          <strong>โรงพยาบาลที่รับรักษา : </strong>
          {{ isset($list_hos[$ViewAEFI1Data[0]->hospcode_treat]) ? $ViewAEFI1Data[$data[0]->hospcode_treat]:""}}
          {{ isset($ViewAEFI1Data[0]->event_location) ? $ViewAEFI1Data[0]->event_location : "" }}<br>
          <strong>จังหวัด : </strong>
          {{ isset($listProvince[$ViewAEFI1Data[0]->province_found_event]) ? $listProvince[$ViewAEFI1Data[0]->province_found_event] : "ไม่ระบุข้อมูล" }}<br>
        </address>
      </div>
      <div class="col-xs-4">
        <address>
          <strong>หน่วยที่รายงาน : </strong>
          {{ isset($ViewAEFI1Data[0]->hospcode_report ? $ViewAEFI1Data[0]->hospcode_report:"ไม่ระบุข้อมูล"}}
          {{ isset($ViewAEFI1Data[0]->unit_reported) ? $ViewAEFI1Data[0]->unit_reported : "" }}
          {{ isset($listProvince[$ViewAEFI1Data[0]->province_reported]) ? $listProvince[$ViewAEFI1Data[0]->province_reported] : "" }}<br>
          <strong>ว/ด/ป ที่ส่งรายงาน : </strong>
          {{ isset($ViewAEFI1Data[0]->datepicker_send_reported) ? $ViewAEFI1Data[0]->datepicker_send_reported : "ไม่ระบุข้อมูล" }}<br>
          <strong>ว/ด/ป ที่รับรายงาน : </strong>
          {{ isset($ViewAEFI1Data[0]->datepicker_resiver) ? $ViewAEFI1Data[0]->datepicker_resiver : "ไม่ระบุข้อมูล" }}<br>
          <strong>ความคิดเห็นเพิ่มเติม : </strong>
          {{ isset($ViewAEFI1Data[0]->more_reviews) ? $ViewAEFI1Data[0]->more_reviews : "ไม่ระบุข้อมูล" }}<br>
        </address>
      </div>
      <div class="col-xs-4">
        <address>
          <strong>ประเมินสาเหตุเบื้องต้น : </strong>
          @if ($ViewAEFI1Data[0]->assessment1 == 1)
            {{"ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์ = ใช่"}}<br>
          @elseif ($ViewAEFI1Data[0]->assessment2 == 1)
            {{"ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์ = น่าจะใช่"}}<br>
          @elseif ($ViewAEFI1Data[0]->assessment3 == 1)
            {{"ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์ = ใช่"}}<br>
          @elseif ($ViewAEFI1Data[0]->assessment4 == 1)
            {{ "ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์ = อาจจะใช่" }}<br>
          @elseif ($ViewAEFI1Data[0]->assessment5 == 1)
            {{ "ปฏิกิริยาของวัคซีน ระดับความสัมพันธ = ไม่ใช่" }}<br>
          @elseif ($ViewAEFI1Data[0]->assessment6 == 1)
            {{ "ความบกพร่องของวัคซีน" }}<br>
          @elseif ($ViewAEFI1Data[0]->assessment7 == 1)
            {{ "ความคลาดเคลื่อนด้านการให้บริการ" }}<br>
          @elseif ($ViewAEFI1Data[0]->assessment8 == 1)
            {{ "เหตุบังเอิญ/เห็นพ้อง" }}<br>
          @elseif ($ViewAEFI1Data[0]->assessment9 == 1)
            {{ "ความกลัว/ความกังวล" }}<br>
          @elseif ($ViewAEFI1Data[0]->assessment10 == 1)
            {{ "ไม่สามารถระบุได้" }}<br>
          @else
            {{"ไม่ระบุข้อมูล"}}<br>
          @endif
          <strong>การตรวจทางห้องปฏิบัติการ : </strong>
          {{ isset($ViewAEFI1Data[0]->lab_result) ? $ViewAEFI1Data[0]->lab_result : "ไม่ระบุข้อมูล" }}<br>
          </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
