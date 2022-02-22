@extends('AEFI.layout.template')
{{-- <style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 200%;
    border: 1px solid #ddd;
  }

  th,
  td {
    width: 500px;
    font-size: 12px;
    text-align: left;
    padding: 8px;
  }

</style> --}}

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
$arr_provinces = load_provinces();
 ?>
  <h1>
    แบบรายงานการเฝ้าระวังกลุ่มอาการที่อาจเกี่ยวข้องกับการได้รับวัคซีนโควิด 19 (AESI Form)
    <small>AESI</small>
  </h1>
  {{-- @php
	dd($groupproduct);
@endphp --}}
  {{-- @php
// dd($aecode);
foreach ($aecode as $value) {
    echo $value->AENAMETHA;
}
@endphp --}}
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 200%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
  </style>
</section>
<!-- Main content -->
<section class="content">
  <form role="form" action="{{ route('insertaesiform1') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
          @php
          $rannumlet = substr(sha1(mt_rand()),17,6);
          $randate = date('ymd');
          $id_case = $randate.$rannumlet;
          // echo $id_case;
          @endphp
          
            <!--ส่วนที่ 1 ข้อมูลทั่วไป -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ส่วนที่ 1 ข้อมูลทั่วไป</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ID</label>
                            <input type="hidden" id="id_case" name="id_case" value="<?php echo $id_case; ?>" class="form-control" hidden>
                            <input type="text" class="form-control" name="id" placeholder="ID">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <select type="text" class="form-control" id="title_name" name="title_name">
                              <option value="">กรุณาเลือก</option>
                              <option value="1">นาย</option>
                              <option value="2">นางสาว</option>
                              <option value="3">นาง</option>
                              <option value="4">ด.ช.</option>
                              <option value="5">ด.ญ.</option>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="first_name" placeholder="ชื่อ">
                          </div>
                          <div class="col-xs-4">
                            <label>สกุล</label>
                            <input type="text" class="form-control" name="sur_name" placeholder="สกุล">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>HN</label>
                            <input type="text" class="form-control" name="hn" placeholder="HN">
                          </div>
                          <div class="col-xs-2">
                            <label>AN</label>
                            <input type="text" class="form-control" name="an" placeholder="AN">
                          </div>
                          <div class="col-xs-4">
                            <label>เลขประจำตัวประชาชน 13 หลัก </label>
                            <input type="text" class="form-control" name="id_number" placeholder="เลขประจำตัวประชาชน 13 หลัก">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>สถานภาพสมรส</label>
                            <select type="text" class="form-control" id="marital_status" name="marital_status">
                              <option value="">กรุณาเลือก</option>
                              <option value="1">โสด </option>
                              <option value="2">สมรส </option>
                              <option value="3">หม้าย </option>
                              <option value="4">หย่า </option>
                              <option value="5">แยกกันอยู่ </option>
                              <option value="5">เคยสมรสแต่ไม่ทราบสถานภาพสมรส </option>
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>อาชีพ</label>
                            <select id="js-example-basic-single2" name="career_code" class="js-example-basic-single2 form-control" data-dropdown-css-class="select2-danger">
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <label>ประวัติโรคประจำตัว</label>
                            <input type="text" class="form-control" name="congenital_disease" placeholder="ประวัติโรคประจำตัว">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ยาที่ใช้ประจำ</label>
                            <input type="text" class="form-control" name="regular_medication" placeholder="ยาที่ใช้ประจำ">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ที่อยู่ขณะเริ่มป่วย บ้านเลขที่</label>
                            <input type="text" class="form-control" name="house_number" placeholder="บ้านเลขที่">
                          </div>
                          <div class="col-xs-2">
                            <label>หมู่ที่</label>
                            <input type="text" class="form-control" name="village_no"  placeholder="หมู่ที่">
                          </div>
                          <div class="col-xs-2">
                            <label>จังหวัด</label>
                            <select class="form-control provinces" name="province" id="provinces" required>
                              <option value="">=== จังหวัด ===</option>
                              @foreach ($list as $row)
                              <option value="{{$row->province_code}}">{{$row->province_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>อำเภอ</label>
                            <select class="form-control amphures" name="district">
                              <option value="">=== อำเภอ ===</option>
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>ตำบล</label>
                            <select class="form-control district" name="subdistrict">
                              <option value="">=== ตำบล ===</option>
                            </select>
                          </div>
                          
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>หมายเลขโทรศัพท์ </label>
                            <input type="text" class="form-control" name="phone_number" placeholder="หมายเลขโทรศัพท์ ">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <select type="text" class="form-control" id="parent_title_name" name="parent_title_name">
                              <option value="">กรุณาเลือก</option>
                              <option value="1">นาย</option>
                              <option value="2">นางสาว</option>
                              <option value="3">นาง</option>
                              <option value="4">ด.ช.</option>
                              <option value="5">ด.ญ.</option>
                            </select>
                          </div>
                          <div class="col-xs-2">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="parent_first_name" placeholder="ชื่อ">
                          </div>
                          <div class="col-xs-2">
                            <label>สกุล</label>
                            <input type="text" class="form-control" name="parent_last_name" placeholder="สกุล">
                          </div>
                          <div class="col-xs-2">
                            <label>โทร.</label>
                            <input type="text" class="form-control" name="parent_phone_number" placeholder="โทร.">
                          </div>
                        </div>
                      </div>
                      </div>
                      <!-- /.box-header -->
                  </div>
                  </div>
              </div>
            </div> 
          </div>
            <!-- /.box -->
            <!--ส่วนที่ 2 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ส่วนที่ 2 ประวัติการเจ็บป่วย  การตรวจร่างกาย การวินิจฉัยโรค และผลการรักษา</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                        <div class="row">
                          {{-- <div class="col-xs-2">
                            <label>วันเริ่มป่วย</label>
                            <input type="text" class="form-control" id="date_of_symptoms" name="date_of_symptoms" placeholder="วันเริ่มป่วย" autocomplete="off">
                          </div>
                          <div class="col-xs-2">
                            <label>วันที่เข้ารับการรักษา</label>
                            <input type="text" class="form-control" id="date_of_treatment" name="date_of_treatment" placeholder="วันที่เข้ารับการรักษา" autocomplete="off">
                          </div>
                          <div class="col-xs-4">
                            <label>วันที่จำหน่ายผู้ป่วย</label>
                            <input type="text" class="form-control" id="date_of_dischrge" name="date_of_dischrge" placeholder="วันที่จำหน่ายผู้ป่วย" autocomplete="off">
                          </div> --}}
                          <div class="col-xs-4">
                            <label>สถานที่รักษา</label>
                            {{-- <input type="text" class="form-control" id="hospital" name="hospital" placeholder="สถานที่รักษา"> --}}
                            <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>

                            </select>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ประเภทผู้ป่วย  </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_type" id="patient_type1" value="0" checked>
                                ผู้ป่วยนอก
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_type" id="patient_type2" value="2">
                                ผู้ป่วยใน  
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label>ใส่ท่อช่วยหายใจ   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_tube" id="patient_tube1" value="0" checked>
                                ไม่ใส่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="patient_tube" id="patient_tube2" value="1">
                                ใส่
                              </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-6">
                            <label>อาการสำคัญ</label>
                            <input type="text" class="form-control" name="chief_complaint" placeholder="อาการสำคัญ">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>การตรวจร่างกาย</label>
                            
                            {{-- <input type="text" class="form-control" placeholder="ยาที่ใช้ประจำ"> --}}
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>สัญญาณชีพ (Vital sign)</label>
                          </div>
                          <div class="col-xs-2">
                            <label>Temp</label>
                            <input type="text" class="form-control" name="temp" placeholder="สัญญาณชีพ (Vital sign) Temp..............C  ">
                          </div>
                          <div class="col-xs-2">
                            <label>RR</label>
                            <input type="text" class="form-control" name="rr" placeholder="RR........./min">
                          </div>
                          <div class="col-xs-2">
                            <label>PR</label>
                            <input type="text" class="form-control" name="pr" placeholder="PR........./min">
                          </div>
                          <div class="col-xs-2">
                            <label>BP</label>
                            <input type="text" class="form-control" name="bp" placeholder="BP........./.........mmHg">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>GCS </label>
                          </div>
                          <div class="col-xs-2">
                            <label>E</label>
                            <input type="text" class="form-control" name="gcs_e" placeholder="E">
                          </div>
                          <div class="col-xs-2">
                            <label>M</label>
                            <input type="text" class="form-control" name="gcs_m" placeholder="M">
                          </div>
                          <div class="col-xs-2">
                            <label>V</label>
                            <input type="text" class="form-control" name="gcs_v" placeholder="V">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>Pupils ข้างซ้าย </label>
                            <input type="text" class="form-control" name="pupils_l" placeholder="Pupils ข้างซ้าย...………mm  ">
                          </div>
                          <div class="col-xs-2">
                            <label>Pupils ข้างขวา</label>
                            <input type="text" class="form-control" name="pupils_r" placeholder="ข้างขวา...………mm   ">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-6">
                            <label>ผลการตรวจร่างกายที่สำคัญ</label>
                            <input type="text" class="form-control" name="physical_examination" placeholder="ผลการตรวจร่างกายที่สำคัญ">
                          </div>
                          <div class="col-xs-6">
                            <label>ผลการตรวจระบบประสาทที่สำคัญ</label>
                            <input type="text" class="form-control" name="neurological_examination" placeholder="ผลการตรวจระบบประสาทที่สำคัญ (motor power, sensory, reflex ฯลฯ) ">
                          </div>
                        </div>
                      </div>
                    </hr>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>การวินิจฉัยครั้งแรก </label>
                          </div>
                          <div class="col-xs-12">
                            <label>1.	 Respiratory system </label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Adult Respiratory Distress Syndrome, ARDS (J80)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="J80" id="J80_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="J80" id="J80_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	COVID-19 (U07.1)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="U07_1" id="U07_1_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="U07_1" id="U07_1_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>2.	 Cardiovascular system</label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Acute myocarditis (I40)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I40" id="I40_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I40" id="I40_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Acute pericarditis (I30)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I30" id="I30_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I30" id="I30_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>3.	 Neurological system</label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>		Acute transverse myelitis (G37.3)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G37_3" id="G37_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G37_3" id="G37_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Guillain-Barré syndrome (GBS) (G61.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G61" id="G61_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G61" id="G61_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Cerebrovascular stroke (I64)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I64" id="I64_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I64" id="I64_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Bell’s palsy (G51.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G51" id="G51_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G51" id="G51_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Acute disseminated encephalomyelitis, ADEM (G04.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G04" id="G04_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G04" id="G04_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Aseptic meningitis, meningitis unspecified (G03.3, G03.9)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G03" id="G03_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G03" id="G03_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label><li>	Meningoencephalitis (Encephalitis, myelitis and encephalomyelitis in other diseases classified elsewhere) (G05.8)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G05_8" id="G05_8_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="G05_8" id="G05_8_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>4.	Immune mediated disease </label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>		Idiopathic thrombocytopenic purpura, ITP (D69.3)  </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69_3" id="D69_3_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69_3" id="D69_3_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Allergic purpura, Allergic vasculitis  (D69.0)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69" id="D69_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="D69" id="D69_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Kawasaki disease (M30.3)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="M30_3" id="M30_3_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="M30_3" id="M30_3_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Arteritis, unspecified (I77.6)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I77_6" id="I77_6_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I77_6" id="I77_6_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Vasculitis limited to skin, not elsewhere classified (L95)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="L95" id="L95_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="L95" id="L95_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <label><li>โรค immune mediated อื่นๆ</li>   </label>
                            <input type="text" class="form-control" name="other_immune_mediated" placeholder="โรค immune mediated อื่นๆ">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12">
                            <label>5.	อื่นๆ</label>
                          </div>
                          <div class="col-xs-2">
                            <label><li>		Deep vein thrombosis, DVT (I80.2) </li> </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I80_2" id="I80_2_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I80_2" id="I80_2_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li>	Pulmonary embolism (I26)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I26" id="I26_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="I26" id="I26_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label><li> Chilblain-like lesions (T69.1)</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="T69_1" id="T69_1_1" value="0" checked>
                                ไม่ใช่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="T69_1" id="T69_1_2" value="1">
                                ใช่
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label><li> การวินิจฉัยครั้งสุดท้าย</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_1" value="0" checked>
                                วินิจฉัยด้วยโรคเดิม
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_2" value="1">
                                วินิจฉัยใหม่
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <label>ระบุ</label>
                            <input type="text" class="form-control" name="text_last_diagnosis" placeholder="ระบุวินิจฉัยใหม่">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          {{-- <div class="col-xs-2">
                            <label><li> ผลการรักษา</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_1" value="0" checked>
                                กำลังรักษา
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_2" value="1">
                                หาย 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_3" value="2">
                                ส่งต่อโรงพยาบาล 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_4" value="3">
                                อื่นๆ 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diagnosis" id="diagnosis_5" value="4">
                                ไม่ทราบ 
                              </label>
                            </div>
                          </div> --}}
                          <div class="col-xs-4">
                            <label>ระบุโรงพยาบาลที่ส่งต่อ</label>
                            {{-- <input type="text" class="form-control" name="text_last_diagnosis" placeholder="ระบุโรงพยาบาลที่ส่งต่อ"> --}}
                            <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>

                            </select>
                            <label></label>
                            <input type="text" class="form-control" name="text_hospcode_treat" placeholder="ระบุอื่นๆ">
                          </div>
                        </div>
                      </div>
                      </div>
                      <!-- /.box-header -->
                  </div>
                  </div>
              </div>
            </div> 
          </div>
            <!-- /.box -->
                        <!--ส่วนที่ 3 การตรวจทางห้องปฏิบัติการ การตรวจทางรังสีวิทยา และอื่นๆ -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="box box-success">
                            <div class="box-header with-border">
                              <h3 class="box-title">ส่วนที่ 3 การตรวจทางห้องปฏิบัติการ การตรวจทางรังสีวิทยา และอื่นๆ </h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
            
                            <div class="box-body">
                              {{-- คอรั่มภายใน3.1 --}}
                              <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-success">
                                  <div class="box-header with-border">
                                    <!-- checkbox3.1.1 -->
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CXR</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CXR" id="CXR_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CXR" id="CXR_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="CXR_date" name="CXR_date" placeholder="วันที่" data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="CXR_results" placeholder="ผลการตรวจ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CT</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CT" id="CT_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CT" id="CT_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>อวัยวะที่ตรวจ</label>
                                          <input type="text" class="form-control" name="CT_body_organs" placeholder="อวัยวะที่ตรวจ">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="CT_date" name="CT_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="CT_results" placeholder="ผลการตรวจ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> MRI</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="MRI" id="MRI_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="MRI" id="MRI_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>อวัยวะที่ตรวจ</label>
                                          <input type="text" class="form-control" name="MRI_body_organs" placeholder="อวัยวะที่ตรวจ">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="MRI_date" name="MRI_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="MRI_results" placeholder="ผลการตรวจ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> EKG</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="EKG" id="EKG_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="EKG" id="EKG_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="EKG_date" name="EKG_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="EKG_results" placeholder="ผลการตรวจ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CBC ครั้งแรก</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="first_CBC" id="first_CBC_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="first_CBC" id="first_CBC_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Hct</label>
                                          <input type="text" class="form-control" name="first_CBC_Hct" placeholder="Hct.........%  ">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>WBC </label>
                                          <input type="text" class="form-control" name="first_CBC_WBC" placeholder="WBC.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Neu</label>
                                          <input type="text" class="form-control" name="first_CBC_Neu" placeholder="Neu.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Lymp </label>
                                          <input type="text" class="form-control" name="first_CBC_Lymp" placeholder="Lymp.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Mono </label>
                                          <input type="text" class="form-control" name="first_CBC_Mono" placeholder="Mono.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Eo  </label>
                                          <input type="text" class="form-control" name="first_CBC_Eo" placeholder="Eo.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Baso  </label>
                                          <input type="text" class="form-control" name="first_CBC_Baso" placeholder="Baso.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Plt. count </label>
                                          <input type="text" class="form-control" name="first_CBC_Plt_count" placeholder="Plt. count.........%">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <label><li> Blood Chemistry</li>   </label>
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Hct</label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Hct" placeholder="Hct.........%  ">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>WBC </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_WBC" placeholder="WBC.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Neu</label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Neu" placeholder="Neu.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Lymp </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Lymp" placeholder="Lymp.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Mono </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Mono" placeholder="Mono.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Eo  </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Eo" placeholder="Eo.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Baso  </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Baso" placeholder="Baso.........%">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Plt. count </label>
                                          <input type="text" class="form-control" name="first_blood_bhemistry_Plt_count" placeholder="Plt. count.........%">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <label><li> Lipid profiles</li>   </label>
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Cholesterol</label>
                                          <input type="text" class="form-control" name="cholesterol" placeholder="Cholesterol">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>Triglyceride </label>
                                          <input type="text" class="form-control" name="triglyceride" placeholder="Triglyceride">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>HDL</label>
                                          <input type="text" class="form-control" name="HDL" placeholder="HDL">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>LDL </label>
                                          <input type="text" class="form-control" name="LDL" placeholder="LDL">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <label><li> Coagulogram</li>   </label>
                                        </div>
                                        <div class="col-xs-2">
                                          <label>PTT</label>
                                          <input type="text" class="form-control" name="PTT" placeholder="PTT">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>PT </label>
                                          <input type="text" class="form-control" name="PT" placeholder="PT">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>TT</label>
                                          <input type="text" class="form-control" name="TT" placeholder="TT">
                                        </div>
                                        <div class="col-xs-2">
                                          <label>อื่นๆ </label>
                                          <input type="text" class="form-control" name="Coagulogram_other" placeholder="อื่นๆ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> CSF</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CSF" id="CSF_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="CSF" id="CSF_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="CSF_date" name="CSF_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ลักษณะ</label>
                                          <input type="text" class="form-control" name="CSF_nature" placeholder="ลักษณะ">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>Cell count: PMN</label>
                                          <input type="text" class="form-control" name="CSF_PMN" placeholder="PMN…………/ml">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>Lymp</label>
                                          <input type="text" class="form-control" name="CSF_Lymp" placeholder="Lymp ……...../ml">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>Protein</label>
                                          <input type="text" class="form-control" name="CSF_Protein" placeholder="Protein ………...mg/dl ">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>sugar</label>
                                          <input type="text" class="form-control" name="CSF_sugar" placeholder="sugar…………mg/dl ">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>อื่นๆ</label>
                                          <input type="text" class="form-control" name="CSF_other" placeholder="อื่นๆ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> NPS for RT-PCR</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS" id="NPS_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS" id="NPS_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" id="NPS_date" name="NPS_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li> ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS_PCR" id="NPS_PCR_1" value="0" checked>
                                              Not Detected  
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="NPS_PCR" id="NPS_PCR_2" value="1">
                                              Detected    
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ</label>
                                          <input type="text" class="form-control" name="NPS_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> Serum for COVID-19 IgM </li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM" id="NPS_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM" id="NPS_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgM  ครั้งที่ 1 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgM1_date" name="Serum_COVID_19_IgM1_date" placeholder="วันที่"  data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgM  ครั้งที่ 1 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM1_PCR" id="Serum_COVID_19_IgM1_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM1_PCR" id="Serum_COVID_19_IgM1_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 1</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgM2_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgM  ครั้งที่ 2 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgM2_date" name="Serum_COVID_19_IgM2_date" placeholder="วันที่" data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgM  ครั้งที่ 2 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM2_PCR" id="Serum_COVID_19_IgM2_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgM2_PCR" id="Serum_COVID_19_IgM2_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 2</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgM2_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-xs-2">
                                          <label><li> Serum for COVID-19 IgG </li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG" id="NPS_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG" id="NPS_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgG  ครั้งที่ 1 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgG1_date" name="Serum_COVID_19_IgG1_date" placeholder="วันที่" data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgG  ครั้งที่ 1 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG1_PCR" id="Serum_COVID_19_IgG1_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG1_PCR" id="Serum_COVID_19_IgG1_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 1</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgG2_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgG  ครั้งที่ 2 : วันที่</label>
                                          <input type="text" class="form-control" id="Serum_COVID_19_IgG2_date" name="Serum_COVID_19_IgG2_date" placeholder="วันที่" data-date-format="yyyy-mm-dd">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgG  ครั้งที่ 2 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG2_PCR" id="Serum_COVID_19_IgG2_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID_19_IgG2_PCR" id="Serum_COVID_19_IgG2_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 2</label>
                                          <input type="text" class="form-control" name="Serum_COVID_19_IgG2_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-xs-12">
                                        <label>อื่นๆ(ระบุ)</label>
                                      </div>
                                      <div class="col-xs-4">
                                        <label>(ระบุ)</label>
                                        <input type="text" class="form-control" name="other_examination" placeholder="(ระบุ)">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>วันที่</label>
                                        <input type="text" class="form-control" id="other_date_examination" name="other_date_examination" placeholder="วันที่" data-date-format="yyyy-mm-dd">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ชนิดตัวอย่าง</label>
                                        <input type="text" class="form-control" name="other_saple_type" placeholder="ชนิดตัวอย่าง">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ตรวจด้วยวิธี</label>
                                        <input type="text" class="form-control" name="other_method" placeholder="ตรวจด้วยวิธี">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ผลการตรวจ </label>
                                        <input type="text" class="form-control" name="other_examination_results" placeholder="ผลการตรวจ">
                                      </div>
                                      <div class="col-xs-4">
                                        <label>ห้องปฏิบัติการ</label>
                                        <input type="text" class="form-control" name="other_lab" placeholder="ห้องปฏิบัติการ">
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                  </div>
                                  <!-- /.box-header -->
                              </div>
                              </div>
                          </div>
                        </div> 
                      </div>
                        <!-- /.box -->
   <!--ส่วนที่ 1 ข้อมูลทั่วไป -->
   <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">ส่วนที่ 4 ประวัติการได้รับวัคซีน</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <div class="box-body">
        {{-- คอรั่มภายใน3.1 --}}
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <!-- checkbox3.1.1 -->
              <div class="form-group">
              <div class="row">
                <div class="col-xs-2">
                  <label><li>วัคซีนโควิด 19 </li>   </label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="covid19" id="covid19" value="0" checked>
                      ไม่ได้รับ
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="covid19" id="covid19" value="1">
                      ได้รับ
                    </label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <label>ระบุ</label>
                  <input type="text" class="form-control" name="othercovid19" placeholder="ระบุ">
                </div>
              </div>
            </div>
              <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-info">
                    <div style="overflow: scroll;">
                      <table class="maintable" id="customers">
                        <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">+ เพิ่มข้อมูลวัคซีน</button></br>
                        <thead>
                          <tr>
                            <th>
                              <font style="color:red;">*</font> ชื่อวัคซีน
                            </th>
                            <th>ปริมาณที่ให้</th>
                            <th>วิธีที่ให้</th>
                            <th>ตำแหน่ง</th>
                            <th>เข็มที่/ครั้งที่</th>
                            <th>
                              <font style="color:red;">*</font> ว/ด/ปที่ได้รับ
                            </th>
                            <th>
                              <font style="color:red;">*</font> เวลาที่ได้รับ
                            </th>
                            <th style="width:150px;">อาการ</th>
                            <th>ชื่อผู้ผลิต</th>
                            <th>ชื่อผู้ผลิตอื่นๆ</th>
                            <th>
                              <font style="color:red;">*</font> เลขที่ผลิต
                            </th>
                            <th>
                              <font style="color:red;">*</font> วันหมดอายุ
                            </th>
                            
                            <th>
                              <font style="color:red;">*</font> เลขที่ผลิต
                            </th>
                            <th>
                              <font style="color:red;">*</font> วันหมดอายุ
                            </th>
                            {{-- <th>
                              <font style="color:red;">*</font> ว/ด/ปที่ผสม
                            </th>
                            <th>
                              <font style="color:red;">*</font> เวลาที่ผสม
                            </th> --}}
                            <th>#</th>
                            {{-- <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="data-contact-person">
                            <td>
                              <select type="text" id="name_of_vaccine" name="name_of_vaccine[]" class="form-control" required>
                                <option value="">กรุณาระบุชื่อวัคซีน</option>
                                @foreach ($vac_list as $row)
                                <option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <select type="text" id="vaccine_volume" name="vaccine_volume[]" class="form-control">
                                <option value="">กรุณาระบุปริมาณที่ให้</option>
                                <?php
                                     foreach ($arr_vaccine_volume as $k=>$v) {
                                     ?>
                                <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select type="text" id="route_of_vaccination1" name="route_of_vaccination[]" class="form-control">
                                <option value="">กรุณาระบุวิธีที่ให้</option>
                                <?php
                                       foreach ($arr_route_of_vaccination as $k=>$v) {
                                   ?>
                                <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select type="text" id="vaccination_site1" name="vaccination_site[]" class="form-control">
                                <option value="">กรุณาระบุวิธีตำแหน่ง</option>
                                <?php
                                       foreach ($arr_vaccination_site as $k=>$v) {
                                   ?>
                                <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select name="dose[]" id="dose1" class="form-control">
                                <option value="1">เข็มที่ 1</option>
                                <option value="2">เข็มที่ 2</option>
                                <option value="3">เข็มที่ 3</option>
                              </select>
                            </td>
                            <td>
                              <input type="text" name="date_of_vaccination[]" value="" id="date_of_vaccination1" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            <td>
                              <input type="text" id="time_of_vaccination1" name="time_of_vaccination[]" class="form-control">
                            </td>
                            <td>
                              <input type="radio" id="symptom1_1" name="symptom_status[0]" value="1" data-toggle="modal" data-target="#Symptom1">
                              <label for="age1"> : มีอาการ</label><br>
                              <input type="radio" id="symptom1_2" name="symptom_status[0]" value="0"  data-toggle="modal" data-target="#nonSymptom1">
                              <label for="age2"> : ไม่มีอาการ</label><br>
                            </td>
                            <td>
                              <select type="text" id="manufacturer1" name="manufacturer[]" class="form-control">
                                <option value="">กรุณาระบุชื่อผู้ผลิต</option>
                                <?php
                                       foreach ($arr_manufacturer as $k=>$v) {
                                   ?>
                                <option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <input type="text" id="other_manufacturer" name="other_manufacturer[]" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="lot_number1" name="lot_number[]" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="datepicker_expiry_date1" name="expiry_date[]" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            {{-- <td>
                              <input type="text" id="name_of_diluent1" name="name_of_diluent[]" class="form-control">
                            </td> --}}
                            <td>
                             {{-- <input type="text"  id="rash1" name="rash[]" value="0027"> --}}
                              <input type="text" id="lot_number_diluent1" name="lot_number_diluent[]" class="form-control">
                            </td>
                            <td>
                              <input type="text" id="datepicker_expiry_date_diluent1" name="expiry_date_diluent[]" class="form-control" data-date-format="yyyy-mm-dd" readonly>
                            </td>
                            {{-- <td><input type="text" id="date_of_reconstitution1" name="date_of_reconstitution[]" class="form-control" data-date-format="yyyy-mm-dd"></td> --}}
                            {{-- <td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]" class="form-control"></td> --}}
                            {{-- <td><a href='javascript:void(0);' class='remove'><span class='glyphicon glyphicon-remove'></span></a></td> --}}
                            <td>
                              <button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box -->
                  </div>
                </div>
              {{-- หัวข้อที่ 3 --}}
                @include('AEFI.Apps.SymptomModal.SymptomModal_1')
              </div>
            </div>
           
         
            </div>
            <!-- /.box-header -->
        </div>
        </div>
    </div>
  </div> 
</div>
  <!-- /.box -->
  <!--ส่วนที่ 3 การตรวจทางห้องปฏิบัติการ การตรวจทางรังสีวิทยา และอื่นๆ -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">ส่วนที่ 5 ประวัติเสี่ยงอื่นๆ </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <div class="box-body">
        {{-- คอรั่มภายใน3.1 --}}
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <!-- checkbox3.1.1 -->
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-4">
                    <label><li> เคยตรวจหาการติดเชื้อโควิด 19</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid" id="inspect_covid_1" value="0" checked>
                        ไม่ได้ตรวจ   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid" id="inspect_covid_2" value="1">
                        ตรวจ 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <label><li> ผลการตรวจ </li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid_results" id="inspect_covid_results_1" value="0" checked>
                        ไม่ได้ตรวจ   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="inspect_covid_results" id="inspect_covid_results_2" value="1">
                        ตรวจ 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <label>หน่วยงานที่ตรวจ</label>
                    <select id="js-example-basic-single" name="inspect_covid_location" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label>วันที่</label>
                    <input type="text" class="form-control" id="inspect_covid_date" name="inspect_covid_date" placeholder="วันที่" data-date-format="yyyy-mm-dd">
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยสัมผัสใกล้ชิดกับผู้ป่วยโควิด 19</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="covid_close_contact" id="covid_close_contact_1" value="0" checked>
                        เคย   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="covid_close_contact" id="covid_close_contact_2" value="1">
                        ไม่เคย 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <label><li> ลักษณะการสัมผัส </li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="contact_nature" id="contact_nature_1" value="0" checked>
                        พูดคุย   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="contact_nature" id="contact_nature_2" value="1">
                        อาศัยอยู่ร่วมบ้าน  
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="contact_nature" id="contact_nature_3" value="2">
                        ศึกษา/ทำงานร่วมกัน  
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>อื่นๆ</label>
                    <input type="text" class="form-control" name="other_contact_nature" placeholder="อื่นๆ">
                  </div>
                  
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยมีประวัติแพ้ยา</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="drug_allergy" id="drug_allergy_1" value="0" checked>
                        ไม่เคย     
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="drug_allergy" id="drug_allergy_2" value="1">
                        เคย 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>ระบุชื่อยา</label>
                    <input type="text" class="form-control" name="drug_allergy_name" placeholder="ระบุชื่อยา">
                  </div>
                 
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยมีประวัติแพ้วัคซีน</li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergic_vaccines" id="allergic_vaccines_1" value="0" checked>
                        ไม่เคย     
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergic_vaccines" id="allergic_vaccines_2" value="1">
                        เคย
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-4">
                    <label>ระบุชื่อวัคซีน</label>
                    <input type="text" class="form-control" name="allergic_vaccines_name" placeholder="ระบุชื่อวัคซีน">
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-2">
                    <label><li> เคยมีประวัติแพ้อาหาร และอื่นๆ  </li>   </label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergy" id="first_CBC_1" value="0" checked>
                        ไม่เคย   
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="allergy" id="first_CBC_2" value="1">
                        เคย 
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                  </div>
                  <div class="col-xs-2">
                    <label>ระบุชนิดอาหารหรือสิ่งที่แพ้</label>
                    <input type="text" class="form-control" name="detail_allergy" placeholder="ระบุชนิดอาหารหรือสิ่งที่แพ้">
                  </div>
                  
                </div>
              </div>
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-footer">
              <div class="col-md-3">
              </div>
              <div class="col-md-3">
                <a href="{{ route('lstaesi1') }}" class="btn btn-block btn-danger">ย้อนกลับ</a>
              </div>
              <div class="col-md-3">
                <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-block btn-success"></input>
              </div>
              <div class="col-md-3">
              </div>
            </div>
        </div>
        </div>
    </div>
  </div> 
</div>
  <!-- /.box -->
  </form>
  </div>
  <!-- /.row -->
</section>
@include('AEFI.layout.footerScriptAESI')

<script type="text/javascript">
  $('.provinces').change(function() {
    if ($(this).val() != '') {
      var select = $(this).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('dropdown.fetch')}}",
        method: "POST",
        data: {
          select: select,
          _token: _token
        },
        success: function(result) {
          $('.amphures').html(result);
        }
      })
    }
  });
</script>
<script type="text/javascript">
	$(".readonly").keydown(function(e){
        e.preventDefault();
    });
  $('.amphures').change(function() {
    var selectD = $(this).val();
    if ($(this).val() != '') {
      console.log(selectD);
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('dropdown.fetchD')}}",
        method: "POST",
        data: {
          select: selectD,
          _token: _token
        },
        success: function(result) {
          $('.district').html(result);
        }
      })
    }
  });
  $(".divID1").attr("disabled", !this.checked);
  $("#checkBoxID1").click(function() {
    $(".divID1").attr("disabled", !this.checked);
  });
  $(".divID2").attr("disabled", !this.checked);
  $("#checkBoxID2").click(function() {
    $(".divID2").attr("disabled", !this.checked);
  });
  $(".divID3").attr("disabled", !this.checked);
  $("#checkBoxID3").click(function() {
    $(".divID3").attr("disabled", !this.checked);
  });
  $(".divID4").attr("disabled", !this.checked);
  $("#checkBoxID4").click(function() {
    $(".divID4").attr("disabled", !this.checked);
  });
  $(".divID5").attr("disabled", !this.checked);
  $("#checkBoxID5").click(function() {
    $(".divID5").attr("disabled", !this.checked);
  });
</script>
<script>
  function showDiv1(divId, element) {
    document.getElementById(divId).style.display = element.value == 99 ? 'block' : 'none';
  }

  // function showDiv2(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 8 ? 'block' : 'none';
  // }
  //
  // function showDiv3(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 999 ? 'block' : 'none';
  // }
  // function showDiv4(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 5 ? 'block' : 'none';
  // }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on("click", ".classAdd", function() { //
      var rowCount = $('.data-contact-person').length + 1;
      var rowCountSyntom = $('.data-contact-person').length;
      var contactdiv = '<tr class="data-contact-person">' +
        '<td>' +
        '<select type="text" id="name_of_vaccine1" name="name_of_vaccine[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบุชื่อวัคซีน</option>' +
        @foreach($vac_list as $row)
      '<option value="{{$row->VAC_CODE}}">{{$row->VAC_NAME_EN}}</option>' +
      @endforeach
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccine_volume1" name="vaccine_volume[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบุปริมาณที่ให้</option>' +
        <?php
      foreach($arr_vaccine_volume as $k => $v) {
        ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="route_of_vaccination1" name="route_of_vaccination[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบุวิธีที่ให้</option>' +
        <?php
      foreach($arr_route_of_vaccination as $k => $v) {
          ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="vaccination_site1" name="vaccination_site[]' + rowCount + '" class="form-control">' +
        '  <option value="">กรุณาระบุวิธีตำแหน่ง</option>' +
        <?php
      foreach($arr_vaccination_site as $k => $v) {
          ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
          '<select name="dose[]' + rowCount + '" id="dose1' + rowCount + '" class="form-control">'+
  '<option value="1">เข็มที่ 1</option>'+
  '<option value="2">เข็มที่ 2</option>'+
  '<option value="3">เข็มที่ 3</option>'+
'</select>'+
'</td>' +
        '<td>' +
        '<input type="text" name="date_of_vaccination[]' + rowCount + '" value="" id="date_of_vaccination1' + rowCount + '" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="time_of_vaccination1' + rowCount + '" name="time_of_vaccination[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
          '<input type="radio" id="symptom' + rowCount + '_1" name="symptom_status[' + rowCountSyntom + ']" value="1" data-toggle="modal" data-target="#Symptom' + rowCount + '">' +
          '<label for="symptom1"> : มีอาการ</label><br>' +
          '<input type="radio" id="symptom' + rowCount + '_2" name="symptom_status[' + rowCountSyntom + ']" value="0" data-toggle="modal" data-target="#nonSymptom' + rowCount + '">' +
          '<label for="symptom2"> : ไม่มีอาการ</label><br>' +
          '<!-- Modal_1 -->'+
'<div class="modal fade" id="Symptom' + rowCount + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
'    <div class="modal-dialog modal-lg">'+
'      <div class="modal-content">'+
'        <div class="modal-header">'+
'          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>'+
'          <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>'+
'        </div>'+
'        <div class="modal-body">'+
'            <div class="tab-pane active" id="tab_1">'+
'                <div class="box-body">'+
'                  {{-- คอรั่มภายใน3.1 --}}'+
'                  <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <div class="box-header with-border">'+
'                        <!-- checkbox3.1.1 -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="rash_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="c_rash" name="c_rash[' + rowCountSyntom + ']" value="0027">'+
'                              Rash'+
'                            </label>'+
'                            <input type="text" id="rash' + rowCount + '" name="rash[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="erythema_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="erythema1" name="c_erythema[' + rowCountSyntom + ']" value="0028">'+
'                              Erythema'+
'                            </label>'+
'                            <input type="text" id="erythema' + rowCount + '" name="erythema[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="urticaria_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="urticaria1" name="c_urticaria[' + rowCountSyntom + ']" value="0044">'+
'                              Urticaria'+
'                            </label>'+
'                            <input type="text" id="urticaria' + rowCount + '" name="urticaria[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="itching_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="itching1" name="c_itching[' + rowCountSyntom + ']" value="0026">'+
'                              Itching'+
'                            </label>'+
'                            <input type="text" id="itching' + rowCount + '" name="itching[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="edema_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="edema1" name="c_edema[' + rowCountSyntom + ']" value="0003A">'+
'                              Edema'+
'                            </label>'+
'                            <input type="text" id="edema' + rowCount + '" name="edema[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-5" id="angioedema_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="angioedema" name="c_angioedema[' + rowCountSyntom + ']" value="0003">'+
'                              Angioedema'+
'                            </label>'+
'                            <input type="text" id="angioedema' + rowCount + '" name="angioedema[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'    '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- checkbox3.1.2  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="fainting_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="fainting1" name="c_fainting[' + rowCountSyntom + ']" value="1">'+
'                              Fainting'+
'                            </label>'+
'                            <input type="text" id="fainting' + rowCount + '" name="fainting[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-6" id="hyperventilation_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="hyperventilation1" name="c_hyperventilation[' + rowCountSyntom + ']" value="0517">'+
'                              Hyperventilation'+
'                            </label>'+
'                            <input type="text" id="hyperventilation' + rowCount + '" name="hyperventilation[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="syncope_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="syncope1" name="c_syncope[' + rowCountSyntom + ']" value="0223">'+
'                              Syncope'+
'                            </label>'+
'                            <input type="text" id="syncope' + rowCount + '" name="syncope[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="headche_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="headche1" name="c_headche[' + rowCountSyntom + ']" value="1">'+
'                              Headche'+
'                            </label>'+
'                            <input type="text" id="headche' + rowCount + '" name="headche[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="dizziness_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="dizziness1" name="c_dizziness[' + rowCountSyntom + ']" value="0101">'+
'                              Dizziness'+
'                            </label>'+
'                            <input type="text" id="dizziness' + rowCount + '" name="dizziness[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="fatigue_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="fatigue" name="c_fatigue[' + rowCountSyntom + ']" value="0724">'+
'                              Fatigue'+
'                            </label>'+
'                            <input type="text" id="fatigue' + rowCount + '" name="fatigue[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="malaise_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="malaise" name="c_malaise[' + rowCountSyntom + ']" value="0728">'+
'                              Malaise'+
'                            </label>'+
'                            <input type="text" id="malaise' + rowCount + '" name="malaise[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-body -->'+
'                      <div class="box-footer">'+
'                        <!-- checkbox3.1.3  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="dyspepsia_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="dyspepsia" name="c_dyspepsia[' + rowCountSyntom + ']" value="0279">'+
'                              Dyspepsia'+
'                            </label>'+
'                            <input type="text" id="dyspepsia' + rowCount + '" name="dyspepsia[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="diarrhea_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="diarrhea" name="c_diarrhea[' + rowCountSyntom + ']" value="1">'+
'                              Diarrhea'+
'                            </label>'+
'                            <input type="text" id="diarrhea' + rowCount + '" name="diarrhea[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="nausea_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="nausea" name="c_nausea[' + rowCountSyntom + ']" value="0308">'+
'                              Nausea'+
'                            </label>'+
'                            <input type="text" id="nausea' + rowCount + '" name="nausea[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="vomiting_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="vomiting" name="c_vomiting[' + rowCountSyntom + ']" value="0228">'+
'                              Vomiting'+
'                            </label>'+
'                            <input type="text" id="vomiting' + rowCount + '" name="vomiting[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-6" id="abdominal_pain_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="abdominal_pain1" name="c_abdominal_pain[' + rowCountSyntom + ']" value="0268">'+
'                              Abdominal pain'+
'                            </label>'+
'                            <input type="text" id="abdominal_pain' + rowCount + '" name="abdominal_pain[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-body -->'+
'                      <div class="box-footer">'+
'                        <!-- checkbox3.1.4  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-4" id="arthalgia_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="arthalgia1" name="c_arthalgia[' + rowCountSyntom + ']" value="1">'+
'                              Arthalgia'+
'                            </label>'+
'                            <input type="text" id="arthalgia' + rowCount + '" name="arthalgia[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-4" id="myalgia_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="myalgia1" name="c_myalgia[' + rowCountSyntom + ']" value="0072">'+
'                              Myalgia'+
'                            </label>'+
'                            <input type="text" id="myalgia' + rowCount + '" name="myalgia[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'    '+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'                  {{-- คอรั่มภายใน3.2 --}}'+
'                  <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <div class="box-header with-border">'+
'                        <!-- checkbox3.2.1 -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-5" id="fever38c_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="fever38c1" name="c_fever38c[' + rowCountSyntom + ']" value="0725">'+
'                              Fever >= 38 C'+
'                            </label>'+
'                            <input type="text" id="fever38c' + rowCount + '" name="fever38c[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'    '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <div class="box-body">'+
'                          {{-- input content --}}'+
'                          <!-- checkbox3.2.2  -->'+
'                          <div class="form-group">'+
'                            <div class="col-md-12" id="swelling_at_the_injection_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="swelling_at_the_injection1" name="c_swelling_at_the_injection[' + rowCountSyntom + ']" value="1">'+
'                                บวมบริเวณที่ฉีดนานเกิน3วัน'+
'                              </label>'+
'                              <input type="text" id="swelling_at_the_injection' + rowCount + '" name="swelling_at_the_injection[' + rowCountSyntom + ']" hidden>'+
'                            </div>'+
'                            <div class="col-md-12" id="swelling_beyond_nearest_joint_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="swelling_beyond_nearest_joint1" name="c_swelling_beyond_nearest_joint[' + rowCountSyntom + ']" value="1">'+
'                                บวมลามไปถึงข้อที่ใกล้ที่สุด'+
'                              </label>'+
'                              <input type="text" id="swelling_beyond_nearest_joint' + rowCount + '" name="swelling_beyond_nearest_joint[' + rowCountSyntom + ']" hidden>'+
'                            </div>'+
'                            <div class="col-md-12" id="lymphadenopathy_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="lymphadenopathy1" name="c_lymphadenopathy[' + rowCountSyntom + ']" value="0577">'+
'                                Lymphadenopathy'+
'                              </label>'+
'                              <input type="text" id="lymphadenopathy' + rowCount + '" name="lymphadenopathy[' + rowCountSyntom + ']" hidden>'+
'                            </div>'+
'                            <div class="col-md-12" id="lymphadenitis_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="lymphadenitis1" name="c_lymphadenitis[' + rowCountSyntom + ']" value="0577D">'+
'                                Lymphadenitis'+
'                              </label>'+
'                              <input type="text" id="lymphadenitis' + rowCount + '" name="lymphadenitis[' + rowCountSyntom + ']" hidden>'+
'                            </div>'+
'                          </div>'+
'                          <div class="form-group">'+
'                            <div class="col-md-6" id="sterile_abscess_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="sterile_abscess1" name="c_sterile_abscess[' + rowCountSyntom + ']" value="0051">'+
'                                Sterile abscess'+
'                              </label>'+
'                              <input type="text" id="sterile_abscess' + rowCount + '" name="sterile_abscess[' + rowCountSyntom + ']" hidden>'+
'                            </div>'+
'                            <div class="col-md-6" id="bacterial_abscess_' + rowCount + '">'+
'                              <label>'+
'                                <input type="checkbox" id="bacterial_abscess1" name="c_bacterial_abscess[' + rowCountSyntom + ']" value="1">'+
'                                Bacterial abscess'+
'                              </label>'+
'                              <input type="text" id="bacterial_abscess' + rowCount + '" name="bacterial_abscess[' + rowCountSyntom + ']" hidden>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-body -->'+
'                      <div class="box-footer">'+
'                        <!-- checkbox3.2.3  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-12" id="febrile_convulsion_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="febrile_convulsion1" name="c_febrile_convulsion[' + rowCountSyntom + ']" value="1">'+
'                              Febrile convulsion'+
'                            </label>'+
'                            <input type="text" id="febrile_convulsion' + rowCount + '" name="febrile_convulsion[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="afebrile_convulsion_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="afebrile_convulsion" name="c_afebrile_convulsion[' + rowCountSyntom + ']" value="1">'+
'                              Afebrile convulsion'+
'                            </label>'+
'                            <input type="text" id="afebrile_convulsion' + rowCount + '" name="afebrile_convulsion[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="encephalopathy_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="encephalopathy1" name="c_encephalopathy[' + rowCountSyntom + ']" value="0105">'+
'                              Encephalopathy/Encephalitis'+
'                            </label>'+
'                            <input type="text" id="encephalopathy' + rowCount + '" name="encephalopathy[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-md-6" id="flaccid_paralysis_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="flaccid_paralysis1" name="c_flaccid_paralysis[' + rowCountSyntom + ']" value="0139">'+
'                              Flaccid paralysis'+
'                            </label>'+
'                            <input type="text" id="flaccid_paralysis' + rowCount + '" name="flaccid_paralysis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-6" id="spastic_paralysis_' + rowCount + '">'+
'                            <label>'+
'                              <input type="checkbox" id="spastic_paralysis1" name="c_spastic_paralysis[' + rowCountSyntom + ']" value="0775">'+
'                              Spastic paralysis'+
'                            </label>'+
'                            <input type="text" id="spastic_paralysis' + rowCount + '" name="spastic_paralysis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'    '+
'                  </div>'+
'                  <!-- /.box -->'+
'                  {{-- คอรั่มภายใน3.3 --}}'+
'                  <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'    '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- checkbox3.3.1  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-12" id="hhe_' + rowCount + '">'+
'                            <label>'+
'                              <input id="hhe1" name="c_hhe[' + rowCountSyntom + ']" type="checkbox" value="1704">'+
'                              Hypotonic Hyporesponsive episode (HHE)'+
'                            </label>'+
'                            <input type="text" id="hhe' + rowCount + '" name="hhe[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="persistent_inconsolable_crying_' + rowCount + '">'+
'                            <label>'+
'                              <input id="persistent_inconsolable_crying1" name="c_persistent_inconsolable_crying[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Persistent inconsolable crying'+
'                            </label>'+
'                            <input type="text" id="persistent_inconsolable_crying' + rowCount + '" name="persistent_inconsolable_crying[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="thrombocytopenia_' + rowCount + '">'+
'                            <label>'+
'                              <input id="thrombocytopenia1" name="c_thrombocytopenia[' + rowCountSyntom + ']" type="checkbox" value="0594">'+
'                              Thrombocytopenia'+
'                            </label>'+
'                            <input type="text" id="thrombocytopenia' + rowCount + '" name="thrombocytopenia[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="osteomyelitis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="osteomyelitis1" name="c_osteomyelitis[' + rowCountSyntom + ']" type="checkbox" value="1184">'+
'                              Osteitis/Osteomyelitis'+
'                            </label>'+
'                            <input type="text" id="osteomyelitis' + rowCount + '" name="osteomyelitis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="toxic_shock_syndrome_' + rowCount + '">'+
'                            <label>'+
'                              <input id="toxic_shock_syndrome1" name="c_toxic_shock_syndrome[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Toxic shock syndrome'+
'                            </label>'+
'                            <input type="text" id="toxic_shock_syndrome' + rowCount + '" name="toxic_shock_syndrome[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="sepsis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="sepsis1" name="c_sepsis[' + rowCountSyntom + ']" type="checkbox" value="0744">'+
'                              Sepsis'+
'                            </label>'+
'                            <input type="text" id="sepsis' + rowCount + '" name="sepsis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="anaphylaxis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="anaphylaxis1" name="c_anaphylaxis[' + rowCountSyntom + ']" type="checkbox" value="2237">'+
'                              Anaphylaxis'+
'                            </label>'+
'                            <input type="text" id="anaphylaxis' + rowCount + '" name="anaphylaxis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="gbs_' + rowCount + '">'+
'                            <label>'+
'                              <input id="gbs" name="c_gbs[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Guillain-Barré syndrome (GBS)'+
'                            </label>'+
'                            <input type="text" id="gbs' + rowCount + '" name="gbs[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="transverse_myelitis_' + rowCount + '">'+
'                            <label>'+
'                              <input id="transverse myelitis1" name="c_transverse myelitis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Transverse myelitis'+
'                            </label>'+
'                            <input type="text" id="transverse_myelitis' + rowCount + '" name="transverse_myelitis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="adem_' + rowCount + '">'+
'                            <label>'+
'                              <input id="adem1" name="c_adem[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Acute disseminated encephalomyelitis (ADEM)'+
'                            </label>'+
'                            <input type="text" id="adem' + rowCount + '" name="adem[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="acute_myocardial_' + rowCount + '">'+
'                            <label>'+
'                              <input id="acute_myocardial1" name="c_acute_myocardial[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Acute Myocardial'+
'                            </label>'+
'                            <input type="text" id="acute_myocardial' + rowCount + '" name="acute_myocardial[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="ards_' + rowCount + '">'+
'                            <label>'+
'                              <input id="ards1" name="c_ards[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                               Acute respiratory distress syndrome (ARDS)'+
'                            </label>'+
'                            <input type="text" id="ards' + rowCount + '" name="ards[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="symptoms_later_immunized_' + rowCount + '">'+
'                            <label>'+
'                              <input id="symptoms_later_immunized" name="c_symptoms_later_immunized[' + rowCountSyntom + ']" type="checkbox" value="9999">'+
'                              other'+
'                            </label>'+
'                            <input type="text" id="symptoms_later_immunized' + rowCount + '" name="symptoms_later_immunized[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="form-group">'+
'                            <div class="col-lg-12">'+
'                              <div id="other_symptoms_later_immunized" style="display: none">'+
'                                <input type="text" id="other_symptoms_later_immunized_text1" name="other_symptoms_later_immunized[' + rowCountSyntom + ']" class="form-control" placeholder="" hidden="true">'+
'                              </div>'+
'                              {{-- <div id="other_symptoms_later_immunized_t" style="display: none">'+
'                                <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">'+
'                              </div> --}}'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'{{-- คอรั่มภายใน3.3 --}}'+
'                   <div class="col-md-6">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
''+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- checkbox3.3.1  -->'+
'                        <div class="form-group">'+
'                          <div class="col-md-12" id="chest_pain_' + rowCount + '" >'+
'                            <label>'+
'                              <input name="c_chest_pain[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Chest pain'+
'                            </label>'+
'                            <input type="text" id="chest_pain' + rowCount + '" name="chest_pain[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="myocarditis_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_myocarditis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Myocarditis'+
'                            </label>'+
'                            <input type="text" id="myocarditis' + rowCount + '" name="myocarditis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="heart_failure_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_heart_failure[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Heart failure'+
'                            </label>'+
'                            <input type="text" id="heart_failure' + rowCount + '" name="heart_failure[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="pericarditis_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_pericarditis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Pericarditis'+
'                            </label>'+
'                            <input type="text" id="pericarditis' + rowCount + '" name="pericarditis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="sudden_cardiac_arrest_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_sudden_cardiac_arrest[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Sudden cardiac arrest'+
'                            </label>'+
'                            <input type="text" id="sudden_cardiac_arrest' + rowCount + '" name="sudden_cardiac_arrest[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="covid_19_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_covid_19[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Covid-19'+
'                            </label>'+
'                            <input type="text" id="covid_19' + rowCount + '" name="covid_19[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="ischemic_stroke_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_ischemic_stroke[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Ischemic stroke'+
'                            </label>'+
'                            <input type="text" id="ischemic_stroke' + rowCount + '" name="ischemic_stroke[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="hemorrhagic_stroke_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_hemorrhagic_stroke[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                            Hemorrhagic stroke'+
'                            </label>'+
'                            <input type="text" id="hemorrhagic_stroke' + rowCount + '" name="hemorrhagic_stroke[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="deep_vein_thrombosis_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_deep_vein_thrombosis[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Deep vein thrombosis                            '+
'		                      	</label>'+
'                            <input type="text" id="deep_vein_thrombosis' + rowCount + '" name="deep_vein_thrombosis[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="pulmonary_embolism_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_pulmonary_embolism[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Pulmonary embolism'+
'                            </label>'+
'                            <input type="text" id="pulmonary_embolism' + rowCount + '" name="pulmonary_embolism[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="hypertension_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_hypertension[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Hypertension'+
'                            </label>'+
'                            <input type="text" id="hypertension' + rowCount + '" name="hypertension[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="hypertensive_urgency_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_hypertensive_urgency[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                               Hypertensive urgency'+
'                            </label>'+
'                            <input type="text" id="hypertensive_urgency' + rowCount + '" name="hypertensive_urgency[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
'                          <div class="col-md-12" id="bells_palsy_' + rowCount + '">'+
'                            <label>'+
'                              <input name="c_bells_palsy[' + rowCountSyntom + ']" type="checkbox" value="1">'+
'                              Bells palsy'+
'                            </label>'+
'                            <input type="text" id="bells_palsy' + rowCount + '" name="bells_palsy[' + rowCountSyntom + ']" hidden>'+
'                          </div>'+
''+
'                          </div>'+
'                        </div>'+
''+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'                  {{-- คอรั่มภายใน3.4 --}}'+
'                  <div class="col-md-12">'+
'                    <!-- general form elements -->'+
'                    <div class="box box-success">'+
'                      <div class="box-header with-border">'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่เกิดอาการ :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="date_of_symptoms1' + rowCount + '" name="date_of_symptoms[' + rowCountSyntom + ']" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <div class="bootstrap-timepicker">'+
'                          <div class="form-group">'+
'                            <div class="col-lg-6">'+
'                              <label>เวลาที่เกิดอาการ :</label>'+
'                              <div class="input-group">'+
'                                <input  id="time_of_symptoms1' + rowCount + '" type="text" class="form-control" name="time_of_symptoms[' + rowCountSyntom + ']">'+
'    '+
'                                <div class="input-group-addon">'+
'                                  <i class="fa fa-clock-o"></i>'+
'                                </div>'+
'                              </div>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่รับรักษา :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="date_of_treatment1' + rowCount + '" name="date_of_treatment[' + rowCountSyntom + ']" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-6">'+
'                            <label>ว/ด/ป ที่จำหน่าย :</label>'+
'                            <div class="input-group date">'+
'                              <div class="input-group-addon">'+
'                                <i class="fa fa-calendar"></i>'+
'                              </div>'+
'                              <input type="text" class="form-control pull-right" id="time_of_treatment1' + rowCount + '" name="time_of_treatment[' + rowCountSyntom + ']" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                      <!-- /.box-header -->'+
'                      <!-- form start -->'+
'   '+
'                      <div class="box-body">'+
'                        {{-- input content --}}'+
'                        <!-- textarea -->'+
'                        <div class="form-group">'+
'                          <div class="col-lg-8">'+
'                            <label>รายละเอียดอาการและการตรวจสอบ</label>'+
'                            <input class="form-control" rows="5"  id="Symptoms_details1" name="Symptoms_details[' + rowCountSyntom + ']">'+
'                          </div>'+
'                        </div>'+
'                        <div class="form-group">'+
'                          <div class="col-lg-8">'+
'                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis1" name="diagnosis[' + rowCountSyntom + ']" class="form-control" placeholder="">'+
'                          </div>'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                    <!-- /.box -->'+
'                  </div>'+
'                </div>'+
'                <div class="box-footer">'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12">'+
'                      <label>'+
'                        <font style="color:red;">*</font> ความร้ายแรงของอาการ'+
'                      </label>'+
'                    </div>'+
'                  </div>'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12"  id="seriousness_of_the_symptoms_' + rowCount + '">'+
'                      <!-- checkbox3.5.1  -->'+
'                      <div class="form-group">'+
'                        <div class="col-md-2">'+
'                          <label>'+
'                            <input type="radio" name="c_seriousness_of_the_symptoms[' + rowCountSyntom + ']"  id="seriousness_of_the_symptoms1" value="1" >'+
'                            ไม่ร้ายแรง'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-2">'+
'                          <label>'+
'                            <input type="radio" name="c_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="seriousness_of_the_symptoms1" value="2">'+
'                            ร้ายแรง'+
'                          </label>'+
'                        </div>'+
'                        <input type="text" id="seriousness_of_the_symptoms" name="seriousness_of_the_symptoms[' + rowCountSyntom + ']" hidden>'+
'                      </div>'+
'                    </div>'+
'                  </div>'+
'                  <div id="other_seriousness_of_the_symptoms_bk1">'+
'                    <div id="other_seriousness_of_the_symptoms_' + rowCount + '">'+
'                    <div class="form-group">'+
'                      <div class="col-lg-12">'+
'                        <label>ระบุ :</label>'+
'                      </div>'+
'                    </div>'+
'                    <!-- checkbox3.1.1 -->'+
'                    <div class="form-group">'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="1">'+
'                          เสียชีวิต'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="2">'+
'                          อันตรายถึงชีวิต'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="3">'+
'                          พิการ/ไร้ความสามารถ'+
'                        </label>'+
'                      </div>'+
'                    </div>'+
'                    <div class="form-group">'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="4">'+
'                          รับไว้รักษาในโรงพยาบาล'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="5">'+
'                          ความผิดปกติแต่กำเนิด'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-4">'+
'                        <label>'+
'                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" id="other_seriousness_of_the_symptoms1" value="6">'+
'                          อื่นๆที่มีความสำคัญทางการแพทย์'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-lg-4">'+
'                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">'+
'                          <label></label>'+
'                          <input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms[' + rowCountSyntom + ']" class="form-control" placeholder="อื่นๆ">'+
'                        </div>'+
'                      </div>'+
'                    </div>'+
'                    <input type="text" id="other_seriousness_of_the_symptoms' + rowCount + '" name="other_seriousness_of_the_symptoms[' + rowCountSyntom + ']" hidden>'+
'                  </div>'+
'                </div>'+
'                </div>'+
'                <!-- /.box-body -->'+
'                <div class="box-footer">'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12">'+
'                      <label>'+
'                        <font style="color:red;">*</font> สถานะผู้ป่วย'+
'                      </label>'+
'                    </div>'+
'                  </div>'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12" id="patient_status_' + rowCount + '">'+
'                      <!-- checkbox3.5.1  -->'+
'                      <div class="form-group">'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="1" >'+
'                            หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="2">'+
'                            หายโดยมีร่องรอย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="3">'+
'                            อาการดีขึ้นแต่ยังไม่หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="4">'+
'                            ไม่หาย'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="5">'+
'                            ไม่ทราบ'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-md-4">'+
'                          <label>'+
'                            <input type="radio" id="c_patient_status1" name="c_patient_status[' + rowCountSyntom + ']" value="6">'+
'                            เสียชีวิต'+
'                          </label>'+
'                        </div>'+
'                        <div class="col-lg-4">'+
'                          <div class="input-group date">'+
'                            <div id="other_patian_sta" style="display: none">'+
'                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead[' + rowCountSyntom + ']" hidden="true" data-date-format="yyyy-mm-dd" readonly>'+
'                            </div>'+
'                          </div>'+
'                        </div>'+
'                        <input type="text" id="patient_status' + rowCount + '" name="patient_status[' + rowCountSyntom + ']" hidden>'+
'                      </div>'+
'                    </div>'+
'                  </div>'+
'                  <!-- checkbox3.1.1 -->'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12">'+
'                      <label>ผ่าพิสูจน์ศพ :</label>'+
'                    </div>'+
'                  </div>'+
'                  <!-- checkbox3.1.1 -->'+
'                  <div class="form-group">'+
'                    <div class="col-lg-12"  id="funeral_' + rowCount + '">'+
'                      <div class="col-md-2" hidden>'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="" >'+
'                          ไม่ระบุ'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="1" >'+
'                          ไม่มี'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="2">'+
'                          ไม่ทราบ'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-md-2">'+
'                        <label>'+
'                          <input type="radio" id="c_funeral' + rowCount + '" name="c_funeral[' + rowCountSyntom + ']" value="3">'+
'                          มี'+
'                        </label>'+
'                      </div>'+
'                      <div class="col-lg-3">'+
'                        <div id="other_address_funeral' + rowCount + '" style="display: none">'+
'                          <label>สถานที่ทำการ :</label>'+
'                          <input type="text" id="other_address_funeral_text' + rowCount + '" name="other_address_funeral[' + rowCountSyntom + ']" class="form-control" placeholder="ระบุสถานที่ทำการ">'+
'                        </div>'+
'                      </div>'+
'                      <input type="text" id="funeral' + rowCount + '" name="funeral[' + rowCountSyntom + ']" hidden>'+
'                    </div>'+
'                  </div>'+
'                </div>'+
'    '+
'              </div>'+
'        </div>'+
'        <div class="modal-footer">'+
'            <button type="button" class="btn btn-primary" data-dismiss="modal">เสร็จสิ้น</button>'+
'            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}'+
'        </div>'+
'      </div>'+
'    </div>'+
'  </div>'+
          '</td>' +
        '<td>' +
        '<select type="text" id="manufacturer1" name="manufacturer[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบชื่อผู้ผลิต</option>' +
        <?php
      foreach($arr_manufacturer as $k => $v) {
          ?>
          '<option  value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="other_manufacturer1" name="other_manufacturer[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="lot_number1" name="lot_number[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date1' + rowCount + '" name="expiry_date[]' + rowCount + '" class="form-control" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        // '<td>' +
        // '<input type="text" id="name_of_diluent1" name="name_of_diluent[]' + rowCount + '" class="form-control">' +
        // '</td>' +
        '<td>' +
        // '<input type="text"  id="rash1' + rowCount + '" name="rash[]' + rowCount + '" value="0027">'+
        '<input type="text" id="lot_number_diluent1" name="lot_number_diluent[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date_diluent1' + rowCount + '" name="expiry_date_diluent[]' + rowCount + '" class="form-control" data-date-format="yyyy-mm-dd" readonly>' +
        '</td>' +
        // '<td><input type="text" id="date_of_reconstitution1' + rowCount + '" name="date_of_reconstitution[]' + rowCount + '" class="form-control datepicker" data-date-format="yyyy-mm-dd"></td>' +
        // '<td><input type="text" id="time_of_reconstitution1" name="time_of_reconstitution[]' + rowCount + '" class="form-control"></td>' +
        '<td><button type="button" id="btnAdd" class="btn btn-m btn-success classAdd">เพิ่มข้อมูลวัคซีน</button>' +
        '<button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-m">ลบข้อมูลวัคซีน</button></td>' +
        '</tr>';
      $('.maintable').append(contactdiv); // Adding these controls to Main table class
    
      $('#date_of_vaccination1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_reconstitution1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#datepicker_expiry_date1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#datepicker_expiry_date_diluent1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_symptoms1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_treatment1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment1' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_symptoms2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#date_of_treatment2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
      $('#time_of_treatment2' + rowCount + '').datepicker({
        dateFormat: "yy-mm-dd"
      })
    $('#datepicker_dead2' + rowCount + '').datepicker({
      dateFormat: "yy-mm-dd"
    })
      $('#rash_' + rowCount + '').change(function() {
      var s = $('#rash_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#rash' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#erythema_' + rowCount + '').change(function() {
      var s = $('#erythema_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#erythema' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#urticaria_' + rowCount + '').change(function() {
      var s = $('#urticaria_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#urticaria' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#itching_' + rowCount + '').change(function() {
      var s = $('#itching_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#itching' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#edema_' + rowCount + '').change(function() {
      var s = $('#edema_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#edema' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#angioedema_' + rowCount + '').change(function() {
      var s = $('#angioedema_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#angioedema' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#fainting_' + rowCount + '').change(function() {
      var s = $('#fainting_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#fainting' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#hyperventilation_' + rowCount + '').change(function() {
      var s = $('#hyperventilation_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#hyperventilation' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#syncope_' + rowCount + '').change(function() {
      var s = $('#syncope_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#syncope' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#headche_' + rowCount + '').change(function() {
      var s = $('#headche_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#headche' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#dizziness_' + rowCount + '').change(function() {
      var s = $('#dizziness_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#dizziness' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#fatigue_' + rowCount + '').change(function() {
      var s = $('#fatigue_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#fatigue' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#malaise_' + rowCount + '').change(function() {
      var s = $('#malaise_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#malaise' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#dyspepsia_' + rowCount + '').change(function() {
      var s = $('#dyspepsia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#dyspepsia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#diarrhea_' + rowCount + '').change(function() {
      var s = $('#diarrhea_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#diarrhea' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#nausea_' + rowCount + '').change(function() {
      var s = $('#nausea_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#nausea' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#vomiting_' + rowCount + '').change(function() {
      var s = $('#vomiting_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#vomiting' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#abdominal_pain_' + rowCount + '').change(function() {
      var s = $('#abdominal_pain_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#abdominal_pain' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#arthalgia_' + rowCount + '').change(function() {
      var s = $('#arthalgia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#arthalgia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#myalgia_' + rowCount + '').change(function() {
      var s = $('#myalgia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#myalgia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#fever38c_' + rowCount + '').change(function() {
      var s = $('#fever38c_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#fever38c' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#swelling_at_the_injection_' + rowCount + '').change(function() {
      var s = $('#swelling_at_the_injection_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#swelling_at_the_injection' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#swelling_beyond_nearest_joint_' + rowCount + '').change(function() {
      var s = $('#swelling_beyond_nearest_joint_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#swelling_beyond_nearest_joint' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#lymphadenopathy_' + rowCount + '').change(function() {
      var s = $('#lymphadenopathy_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#lymphadenopathy' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#lymphadenitis_' + rowCount + '').change(function() {
      var s = $('#lymphadenitis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#lymphadenitis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#sterile_abscess_' + rowCount + '').change(function() {
      var s = $('#sterile_abscess_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#sterile_abscess' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#bacterial_abscess_' + rowCount + '').change(function() {
      var s = $('#bacterial_abscess_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#bacterial_abscess' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#febrile_convulsion_' + rowCount + '').change(function() {
      var s = $('#febrile_convulsion_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#febrile_convulsion' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#encephalopathy_' + rowCount + '').change(function() {
      var s = $('#encephalopathy_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#encephalopathy' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#flaccid_paralysis_' + rowCount + '').change(function() {
      var s = $('#flaccid_paralysis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#flaccid_paralysis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#spastic_paralysis_' + rowCount + '').change(function() {
      var s = $('#spastic_paralysis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#spastic_paralysis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#hhe_' + rowCount + '').change(function() {
      var s = $('#hhe_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#hhe' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#persistent_inconsolable_crying_' + rowCount + '').change(function() {
      var s = $('#persistent_inconsolable_crying_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#persistent_inconsolable_crying' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#thrombocytopenia_' + rowCount + '').change(function() {
      var s = $('#thrombocytopenia_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#thrombocytopenia' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#osteomyelitis_' + rowCount + '').change(function() {
      var s = $('#osteomyelitis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#osteomyelitis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#toxic_shock_syndrome_' + rowCount + '').change(function() {
      var s = $('#toxic_shock_syndrome_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#toxic_shock_syndrome' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#sepsis_' + rowCount + '').change(function() {
      var s = $('#sepsis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#sepsis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#anaphylaxis_' + rowCount + '').change(function() {
      var s = $('#anaphylaxis_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#anaphylaxis' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#other_' + rowCount + '').change(function() {
      var s = $('#other_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#other' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#seriousness_of_the_symptoms_' + rowCount + '').change(function() {
      var s = $('#seriousness_of_the_symptoms_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#seriousness_of_the_symptoms' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#other_seriousness_of_the_symptoms_' + rowCount + '').change(function() {
      var s = $('#other_seriousness_of_the_symptoms_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#other_seriousness_of_the_symptoms' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#patient_status_' + rowCount + '').change(function() {
      var s = $('#patient_status_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#patient_status' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#funeral_' + rowCount + '').change(function() {
      var s = $('#funeral_' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#funeral' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('input[name="c_funeral[]"]').on('click', function() {
      if ($(this).val() == '3') {
        $('#other_address_funeral' + rowCount + '').show();
      } else {
        $('#other_address_funeral' + rowCount + '').hide();
        $('#other_address_funeral_text' + rowCount + '').val('');
      }
    });
        $('#seriousness_of_the_symptoms_2' + rowCount + '').change(function() {
      var s = $('#seriousness_of_the_symptoms_2' + rowCount + ' input:checked').map(function() {
        return this.value;
      }).get().join(',');
      $('#seriousness_of_the_symptoms2' + rowCount + '').val((s.length > 0 ? s : ""));
    });
    $('#other_seriousness_of_the_symptoms_2' + rowCount + '').change(function() {
  var s = $('#other_seriousness_of_the_symptoms_2' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#other_seriousness_of_the_symptoms2' + rowCount + '').val((s.length > 0 ? s : ""));
});
$('#patient_status_2' + rowCount + '').change(function() {
  var s = $('#patient_status_2' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#patient_status2' + rowCount + '').val((s.length > 0 ? s : ""));
});
    $('input[name="c_patient_status2[]"]').on('click', function() {
      if ($(this).val() == '6') {
        $('#other_patian_sta2' + rowCount + '').show();
      } else {
        $('#other_patian_sta2' + rowCount + '').hide();
        $('#datepicker_dead2' + rowCount + '').val('');
      }
    });
    $('#funeral_2' + rowCount + '').change(function() {
  var s = $('#funeral_2' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#funeral2' + rowCount + '').val((s.length > 0 ? s : ""));
});


$('#chest_pain_' + rowCount + '').change(function() {
  var s = $('#chest_pain_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#chest_pain' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#myocarditis_' + rowCount + '').change(function() {
  var s = $('#myocarditis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#myocarditis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#heart_failure_' + rowCount + '').change(function() {
  var s = $('#heart_failure_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#heart_failure' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#pericarditis_' + rowCount + '').change(function() {
  var s = $('#pericarditis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#pericarditis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#sudden_cardiac_arrest_' + rowCount + '').change(function() {
  var s = $('#sudden_cardiac_arrest_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#sudden_cardiac_arrest' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#covid_19_' + rowCount + '').change(function() {
  var s = $('#covid_19_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#covid_19' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#ischemic_stroke_' + rowCount + '').change(function() {
  var s = $('#ischemic_stroke_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#ischemic_stroke' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#hemorrhagic_stroke_' + rowCount + '').change(function() {
  var s = $('#hemorrhagic_stroke_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#hemorrhagic_stroke' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#deep_vein_thrombosis_' + rowCount + '').change(function() {
  var s = $('#deep_vein_thrombosis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#deep_vein_thrombosis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#pulmonary_embolism_' + rowCount + '').change(function() {
  var s = $('#pulmonary_embolism_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#pulmonary_embolism' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#hypertension_' + rowCount + '').change(function() {
  var s = $('#hypertension_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#hypertension' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#hypertensive_urgency_' + rowCount + '').change(function() {
  var s = $('#hypertensive_urgency_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#hypertensive_urgency' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#bells_palsy_' + rowCount + '').change(function() {
  var s = $('#bells_palsy_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#bells_palsy' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#gbs_' + rowCount + '').change(function() {
  var s = $('#gbs_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#gbs' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#transverse_myelitis_' + rowCount + '').change(function() {
  var s = $('#transverse_myelitis_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#transverse_myelitis' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#adem_' + rowCount + '').change(function() {
  var s = $('#adem_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#adem' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#ards_' + rowCount + '').change(function() {
  var s = $('#ards_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#ards' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#acute_myocardial_' + rowCount + '').change(function() {
  var s = $('#acute_myocardial_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#acute_myocardial' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#symptoms_later_immunized_' + rowCount + '').change(function() {
  var s = $('#symptoms_later_immunized_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#symptoms_later_immunized' + rowCount + '').val((s.length > 0 ? s : ""));
});

$('#afebrile_convulsion_' + rowCount + '').change(function() {
  var s = $('#afebrile_convulsion_' + rowCount + ' input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#afebrile_convulsion' + rowCount + '').val((s.length > 0 ? s : ""));
});

    $('input[name="c_funeral2[]"]').on('click', function() {
      if ($(this).val() == '3') {
        $('#other_address_funeral2' + rowCount + '').show();
      } else {
        $('#other_address_funeral2' + rowCount + '').hide();
        $('#other_address_funeral_text2' + rowCount + '').val('');
      }
    });
    });

    $(document).on("click", ".deleteContact", function() {
      $(this).closest("tr").remove(); // closest used to remove the respective 'tr' in which I have my controls
    });
    $(".js-example-basic-single").select2({
      allowClear: true,
      language: {
      inputTooShort: function (args) {
          return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
      },
      noResults: function () {
          return "ไม่พบข้อมูล";
      },
      searching: function () {
          return "กำลังค้นหาข้อมูล...";
      }
      },
      placeholder: "กรุณาพิมพ์ชื่อหน่วยงานที่ต้องการ เช่น. สคร.1,โรงพยาบาลเลิดสิน,สำนักงานสาธารณสุขจังหวัดสมุทรปราการ",
      minimumInputLength: 3,
      minimumResultsForSearch: 5,
      ajax: {
       url: "{{ route('list-division-json') }}",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
    });
 $(".js-example-basic-single2").select2({
      allowClear: true,
      language: {
      inputTooShort: function (args) {
          return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
      },
      noResults: function () {
          return "ไม่พบข้อมูล";
      },
      searching: function () {
          return "กำลังค้นหาข้อมูล...";
      }
      },
      placeholder: "กรุณาพิมพ์ชื่ออาชีพ",
      minimumInputLength: 3,
      minimumResultsForSearch: 5,
      ajax: {
       url: "{{ route('list-career-json') }}",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
    });
$('#datepicker_bdate').on('change', function(){
  // let dayBirth=$('#datepicker_bdate').val();
  var dayBirth=$('#datepicker_bdate').val();
      var getdayBirth=dayBirth.split("-");
      var YB=getdayBirth[2]-543;
      var MB=getdayBirth[1];
      var DB=getdayBirth[0];

      var setdayBirth=moment(YB+"-"+MB+"-"+DB);
      var setNowDate=moment();
      var ageInMilliseconds = new Date(setNowDate - setdayBirth);
      var years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 );
      var months = 12 * (years % 1);
      var days = Math.floor(30 * (months % 1)+1);
      // alert(days);
      var yearData=setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม
      var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม
      var yearReal=setNowDate.diff(setdayBirth, 'years'); // ปีจริง
      var monthDiff=Math.floor((yearData-yearReal)*12); // เดือน
      var dayDiff=Math.floor(30 * (monthDiff % 1));; // เดือน
      // var dayDiff=Math.floor(30 * (monthDiff % 1));
      var str_year_month="( "+yearReal+" ปี "+ monthDiff+" เดือน "+ days+" วัน )"; // ต่อวันเดือนปี
      // $("#age").val(str_year_month);
  $('#y_age').val(yearReal);
  $('#allage').text(str_year_month);
  $('#yallage').text(yearReal);
  $('#mallage').text(monthDiff);
  $('#dallage').text(days);
  $("#numnights").hide().slideDown(1200);
// alert(year);
})

  });
</script>
@include('AEFI.layout.SymptomScript')
@include('AEFI.layout.nonSymptomScript')
@stop
