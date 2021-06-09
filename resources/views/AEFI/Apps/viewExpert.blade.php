
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
    font-size: 16px;
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
$arr_r_o = load_r_o();
$arr_load_final_diag = load_final_diag();
$arr_causality = load_causality();
$arr_load_aefi_classification = load_aefi_classification();
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
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        {{-- <p class="lead">(2) ข้อมูลวัคซีน / สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข)</p> --}}
        <font size="1.5" face="Courier New" >
        <table class="table">
          <thead>
          <tr>
            <th></th>
            <th style="text-align:center"><img src="{{ asset('asset/dist/img/logoddc.png') }}" style="width:15%"></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td  style="text-align:center;background-color:#fa3c4c"><p class="lead">แบบรายงานการประชุมผู้เชี่ยวชาญ</p></td>
                <td></td>
              </tr>
          </tbody>
        </table>
        </table>
      </font>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- title row -->
    {{-- <div class="form-group">
      <div class="row">
        <div class="col-sm-12">
        <p class="lead">แบบรายงานการประชุมจากผู้เชี่ยวชาญ</p>
        </div>
      </div>
    </div> --}}
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12">
      <p class="lead">ชื่อ-สกุล :  {{ isset($arr_title_name[$ViewAEFI1Data[0]->title_name]) ? $arr_title_name[$ViewAEFI1Data[0]->title_name] : $ViewAEFI1Data[0]->title_name_other }}
            {{ isset($ViewAEFI1Data[0]->first_name) ? $ViewAEFI1Data[0]->first_name : "ไม่ระบุข้อมูล" }}
            {{ isset($ViewAEFI1Data[0]->sur_name) ? $ViewAEFI1Data[0]->sur_name : "ไม่ระบุข้อมูล" }}<br></p>
      </div>
      <div class="col-sm-12">
      <p class="lead">โรงพยาบาลที่รับรักษา : {{ isset($list_hos[$ViewAEFI1Data[0]->hospcode_treat]) ? $list_hos[$ViewAEFI1Data[0]->hospcode_treat]:""}}
                {{ isset($ViewAEFI1Data[0]->event_location) ? $ViewAEFI1Data[0]->event_location : "" }}<br></p>
      </div>
      <div class="col-sm-12">
      <p class="lead">จังหวัดที่รายงาน : {{ isset($listProvince[$ViewAEFI1Data[0]->province_reported]) ? $listProvince[$ViewAEFI1Data[0]->province_reported] : "ไม่ระบุข้อมูล" }}<br></p>
      </div>
      <div class="col-sm-12">
      <p class="lead">Final Diagnosis :
        @if (count($ViewAEFI1ExpertData) > 0 )
          {{isset($arr_load_final_diag[$ViewAEFI1ExpertData[0]->final_diag]) ? $arr_load_final_diag[$ViewAEFI1ExpertData[0]->final_diag] : ''}} {{ isset($ViewAEFI1ExpertData[0]->other_final_diag) ? $ViewAEFI1ExpertData[0]->other_final_diag : "" }}</p>
        @else
         {{"ไม่ระบุข้อมูล"}}
        @endif
      </div>
      <div class="col-sm-12">
      <p class="lead">AEFI Classification :
        @if (count($ViewAEFI1ExpertData) > 0 )
          {{ isset( $arr_load_aefi_classification[$ViewAEFI1ExpertData[0]->aefi_classification]) ? $arr_load_aefi_classification[$ViewAEFI1ExpertData[0]->aefi_classification] : "ไม่ระบุข้อมูล" }}</p>
    @else
     {{"ไม่ระบุข้อมูล"}}
    @endif
      </div>
      <div class="col-sm-12">
      <p class="lead">Summary :
    @if (count($ViewAEFI1ExpertData) > 0 )
          {{ isset($ViewAEFI1ExpertData[0]->summary) ? $ViewAEFI1ExpertData[0]->summary : "ไม่ระบุข้อมูล" }}</p>
    @else
     {{"ไม่ระบุข้อมูล"}}
    @endif
      </div>
      <div class="col-sm-12">
      <p class="lead">Expert Meeting :
    @if (count($ViewAEFI1ExpertData) > 0 )
      {{ isset($ViewAEFI1ExpertData[0]->expert_meet_date) ? $ViewAEFI1ExpertData[0]->expert_meet_date : "ไม่ระบุข้อมูล" }}</p>
    @else
     {{"ไม่ระบุข้อมูล"}}
    @endif
      </div>
      <!-- /.col -->
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
