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
  <form role="form" action="{{ route('insertform1') }}" method="post">
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
                            <input type="text" class="form-control" placeholder="ID">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <input type="text" class="form-control" placeholder="คำนำหน้า">
                          </div>
                          <div class="col-xs-4">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ">
                          </div>
                          <div class="col-xs-4">
                            <label>สกุล</label>
                            <input type="text" class="form-control" placeholder="สกุล">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>HN</label>
                            <input type="text" class="form-control" placeholder="HN">
                          </div>
                          <div class="col-xs-2">
                            <label>AN</label>
                            <input type="text" class="form-control" placeholder="AN">
                          </div>
                          <div class="col-xs-4">
                            <label>เลขประจำตัวประชาชน 13 หลัก </label>
                            <input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน 13 หลัก">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>สถานภาพสมรส</label>
                            <input type="text" class="form-control" placeholder="สถานภาพสมรส">
                          </div>
                          <div class="col-xs-2">
                            <label>อาชีพ</label>
                            <input type="text" class="form-control" placeholder="อาชีพ">
                          </div>
                          <div class="col-xs-4">
                            <label>ประวัติโรคประจำตัว</label>
                            <input type="text" class="form-control" placeholder="ประวัติโรคประจำตัว">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ยาที่ใช้ประจำ</label>
                            <input type="text" class="form-control" placeholder="ยาที่ใช้ประจำ">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ที่อยู่ขณะเริ่มป่วย บ้านเลขที่</label>
                            <input type="text" class="form-control" placeholder="บ้านเลขที่">
                          </div>
                          <div class="col-xs-2">
                            <label>หมู่ที่</label>
                            <input type="text" class="form-control" placeholder="หมู่ที่">
                          </div>
                          <div class="col-xs-2">
                            <label>ตำบล</label>
                            <input type="text" class="form-control" placeholder="ตำบล">
                          </div>
                          <div class="col-xs-2">
                            <label>อำเภอ</label>
                            <input type="อำเภอ" class="form-control" placeholder="อำเภอ">
                          </div>
                          <div class="col-xs-2">
                            <label>จังหวัด</label>
                            <input type="จังหวัด" class="form-control" placeholder="จังหวัด">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>หมายเลขโทรศัพท์ </label>
                            <input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์ ">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <input type="text" class="form-control" placeholder="ชื่อผู้ปกครอง (กรณีผู้ป่วยอายุ < 15 ปี) ">
                          </div>
                          <div class="col-xs-2">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ">
                          </div>
                          <div class="col-xs-2">
                            <label>สกุล</label>
                            <input type="text" class="form-control" placeholder="สกุล">
                          </div>
                          <div class="col-xs-2">
                            <label>โทร.</label>
                            <input type="text" class="form-control" placeholder="โทร.">
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
                          <div class="col-xs-2">
                            <label>วันเริ่มป่วย</label>
                            <input type="text" class="form-control" placeholder="วันเริ่มป่วย">
                          </div>
                          <div class="col-xs-2">
                            <label>คำนำหน้า</label>
                            <input type="text" class="form-control" placeholder="วันที่เข้ารับการรักษา">
                          </div>
                          <div class="col-xs-4">
                            <label>วันที่จำหน่ายผู้ป่วย</label>
                            <input type="text" class="form-control" placeholder="วันที่จำหน่ายผู้ป่วย">
                          </div>
                          <div class="col-xs-4">
                            <label>สถานที่รักษา</label>
                            <input type="text" class="form-control" placeholder="สถานที่รักษา">
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>ประเภทผู้ป่วย  </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                ผู้ป่วยนอก
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                ผู้ป่วยใน  
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <label>ใส่ท่อช่วยหายใจ   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                ไม่ใส่
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
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
                            <input type="text" class="form-control" placeholder="อาการสำคัญ">
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
                            <input type="text" class="form-control" placeholder="สัญญาณชีพ (Vital sign) Temp..............C  ">
                          </div>
                          <div class="col-xs-2">
                            <label>RR</label>
                            <input type="text" class="form-control" placeholder="RR........./min">
                          </div>
                          <div class="col-xs-2">
                            <label>PR</label>
                            <input type="text" class="form-control" placeholder="PR........./min">
                          </div>
                          <div class="col-xs-2">
                            <label>BP</label>
                            <input type="text" class="form-control" placeholder="BP........./.........mmHg">
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
                            <input type="text" class="form-control" placeholder="E">
                          </div>
                          <div class="col-xs-2">
                            <label>M</label>
                            <input type="text" class="form-control" placeholder="M">
                          </div>
                          <div class="col-xs-2">
                            <label>V</label>
                            <input type="text" class="form-control" placeholder="V">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-2">
                            <label>Pupils ข้างซ้าย </label>
                            <input type="text" class="form-control" placeholder="Pupils ข้างซ้าย...………mm  ">
                          </div>
                          <div class="col-xs-2">
                            <label>Pupils ข้างขวา</label>
                            <input type="text" class="form-control" placeholder="ข้างขวา...………mm   ">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-6">
                            <label>ผลการตรวจร่างกายที่สำคัญ</label>
                            <input type="text" class="form-control" placeholder="ผลการตรวจร่างกายที่สำคัญ">
                          </div>
                          <div class="col-xs-6">
                            <label>ผลการตรวจระบบประสาทที่สำคัญ</label>
                            <input type="text" class="form-control" placeholder="ผลการตรวจระบบประสาทที่สำคัญ (motor power, sensory, reflex ฯลฯ) ">
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
                            <label><li>	Pulmonary embolism (I26))</li>   </label>
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
                          <div class="col-xs-2">
                            <label><li> ผลการรักษา</li>   </label>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_1" value="0" checked>
                                กำลังรักษา
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_2" value="1">
                                หาย 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_2" value="1">
                                ส่งต่อโรงพยาบาล 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_2" value="1">
                                อื่นๆ 
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="last_diagnosis" id="last_diagnosis_2" value="1">
                                ไม่ทราบ 
                              </label>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <label>ระบุ</label>
                            <input type="text" class="form-control" name="text_last_diagnosis" placeholder="ระบุโรงพยาบาลที่ส่งต่อ">
                            <label></label>
                            <input type="text" class="form-control" name="text_last_diagnosis" placeholder="ระบุอื่นๆ">
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
                        <!--ส่วนที่ 1 ข้อมูลทั่วไป -->
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
                                          <input type="text" class="form-control" name="CXR_date" placeholder="ระบุวินิจฉัยใหม่">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ผลการตรวจ</label>
                                          <input type="text" class="form-control" name="CXR_results" placeholder="ระบุวินิจฉัยใหม่">
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
                                          <input type="text" class="form-control" name="CT_body_organs" placeholder="วันที่">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" name="CT_date" placeholder="วันที่">
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
                                          <input type="text" class="form-control" name="MRI_body_organs" placeholder="วันที่">
                                        </div>
                                        <div class="col-xs-4">
                                          <label>วันที่</label>
                                          <input type="text" class="form-control" name="MRI_date" placeholder="วันที่">
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
                                          <input type="text" class="form-control" name="EKG_date" placeholder="วันที่">
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
                                          <input type="text" class="form-control" name="CSF_date" placeholder="วันที่">
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
                                          <input type="text" class="form-control" name="NPS_date" placeholder="วันที่">
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
                                              <input type="radio" name="Serum_COVID-19_IgM" id="NPS_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgM" id="NPS_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgM  ครั้งที่ 1 : วันที่</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgM1_date" placeholder="วันที่">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgM  ครั้งที่ 1 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgM1_PCR" id="Serum_COVID-19_IgM1_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgM1_PCR" id="Serum_COVID-19_IgM1_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 1</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgM2_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgM  ครั้งที่ 2 : วันที่</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgM2_date" placeholder="วันที่">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgM  ครั้งที่ 2 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgM2_PCR" id="Serum_COVID-19_IgM2_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgM2_PCR" id="Serum_COVID-19_IgM2_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 2</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgM2_lab" placeholder="ห้องปฏิบัติการ">
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
                                              <input type="radio" name="Serum_COVID-19_IgG" id="NPS_1" value="0" checked>
                                              ไม่ได้ตรวจ   
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgG" id="NPS_2" value="1">
                                              ตรวจ 
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgG  ครั้งที่ 1 : วันที่</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgG1_date" placeholder="วันที่">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgG  ครั้งที่ 1 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgG1_PCR" id="Serum_COVID-19_IgG1_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgG1_PCR" id="Serum_COVID-19_IgG1_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 1</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgG2_lab" placeholder="ห้องปฏิบัติการ">
                                        </div>
                                        <div class="col-xs-12">
                                          
                                        </div>
                                        <div class="col-xs-2">
                                          <label>IgG  ครั้งที่ 2 : วันที่</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgG2_date" placeholder="วันที่">
                                        </div>
                                        <div class="col-xs-2">
                                          <label><li>IgG  ครั้งที่ 2 : ผลการตรวจ</li>   </label>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgG2_PCR" id="Serum_COVID-19_IgG2_PCR_1" value="0" checked>
                                              Negative
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="Serum_COVID-19_IgG2_PCR" id="Serum_COVID-19_IgG2_PCR_2" value="1">
                                              Positive
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-xs-4">
                                          <label>ห้องปฏิบัติการ ครั้งที่ 2</label>
                                          <input type="text" class="form-control" name="Serum_COVID-19_IgG2_lab" placeholder="ห้องปฏิบัติการ">
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
                                        <input type="text" class="form-control" name="other_date_examination" placeholder="วันที่">
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
            <!-- หัวข้อที่4 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <!-- form start -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-3">
                        <h3 class="box-title">(4) การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน</h3>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate1" value="1" >
                            ไม่มี
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            <input type="radio" name="necessary_to_investigate" id="necessary_to_investigate2" value="2">
                            มี
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-1">
                        <div class="radio">
                          <label>
                            วันที่สอบสวน
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="">
                          <label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
              </div>
              <!-- /.box -->
            </div>
            <!--หัวข้อที่5 -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">(5) ข้อมูลผู้รายงาน สถานที่เกิดเหตุการณ์ และหน่วยงานที่รายงาน</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-6">
                              <label>ชื่อผู้วินิจฉัยอาการ :</label><input type="text" id="symptom_name" name="symptom_name" class="form-control" placeholder="ชื่อ นามสกุล">
                            </div>
                          </div>
                        </div>
                        <!-- ประวัติการแพ้วัคซีน/ยา -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="control-label">
                                <label>ตำแหน่ง :</label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="1" >
                                  แพทย์
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="2">
                                  เภสัชกร
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="3">
                                  พยาบาล
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="symptom_position" value="4">
                                  อื่นๆระบุ
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div id="other_symptom_position" style="display: none">
                                <input type="text" id="other_symptom_position_text" name="other_symptom_position" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-6">
                              <label>ชื่อผู้รายงาน :</label><input type="text" id="reporter_name" name="reporter_name" class="form-control" placeholder="ชื่อ นามสกุล">
                            </div>
                          </div>
                        </div>
                        <!-- ประวัติการแพ้วัคซีน/ยา -->
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="control-label">
                                <label>ตำแหน่ง :</label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="1" >
                                  งานระบาดวิทยา
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="2">
                                  เภสัชกร
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="3" />
                                  งานEIP
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="reporter_position" value="4" />
                                  อื่นๆระบุ
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div id="other_reporter_position" style="display: none">
                                <input type="text" id="other_reporter_position_text" name="other_reporter_position" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่พบเหตุการณ์ :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker_found_event" name="date_found_event" data-date-format="yyyy-mm-dd" readonly>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>โรงพยาบาลที่รับรักษา :</label>
                              <select id="js-example-basic-single" name="hospcode_treat" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                              </select>
                              {{-- <input type="text" id="event_location" name="event_location" class="form-control" placeholder="สถานที่เกิดเหตุการณ์"> --}}
                            </div>                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;" required>
					                    <option class="badge filter badge-info" data-color="info" value=""></option>
                                <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>หน่วยที่รายงาน :</label>
                              <select id="js-example-basic-single" name="hospcode_report" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <label>จังหวัด :</label>
                              <select id="province_reported" name="province_reported" class="form-control" style="width: 100%;" required>
				                      <option class="badge filter badge-info" data-color="info" value=""></option>
                                <?php
												  foreach ($arr_provinces as $k=>$v) { ?>
                                <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <label>โทร :</label><input type="text" id="tel_reported" name="tel_reported" class="form-control" placeholder="โทร" data-inputmask='"mask": "99-9999-9999"' data-mask>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4">
                              <label>Email :</label><input type="text" id="email_reported" name="email_reported" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่ส่งรายงาน :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>

                              <input type="text" class="form-control readonly pull-right"  name="datepicker_send_reported" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d") ; ?>" readonly>

                                {{-- <input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported" data-date-format="yyyy-mm-dd" readonly> --}}                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label>ว/ด/ป ที่รับรายงาน :</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker_resiver" name="datepicker_resiver" data-date-format="yyyy-mm-dd" readonly>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <label>ความคิดเห็นเพิ่มเติม</label>
                              <textarea class="form-control" rows="3" id="more_reviews" name="more_reviews"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  {{-- คอรั่มภายใน3.2 --}}
                  <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <!-- checkbox3.2.1 -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              ประเมินสาเหตุเบื้องต้น
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->

                      <div class="box-body">
                        {{-- input content --}}
                        <div class="box-body">
                          {{-- input content --}}
                          <!-- checkbox3.2.2  -->
                          <div class="form-group">
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment1" value="1">
                                ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์
                              </label>
                            </div>
                            <div class="col-md-2">
                              {{-- <label>
                                <input type="checkbox" name="assessment2" value="1">
                                ใช่
                              </label> --}}
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment2" value="1">
                                ใช่
                              </label>
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment3" value="1">
                                น่าจะใช่
                              </label>
                            </div>
                            <div class="col-md-2">
                              {{-- <label>
                                <input type="checkbox" name="assessment3" value="1">
                                น่าจะใช่
                              </label> --}}
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment4" value="1">
                                อาจจะใช่
                              </label>
                            </div>
                            <div class="col-md-5">
                              <label>
                                <input type="checkbox" name="assessment5" value="1">
                                ไม่ใช่
                              </label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            </br>
                            {{-- <label>
                              <input type="checkbox" name="assessment7" value="1">
                              ความคลาดเคลื่อนด้านการให้บริการ
                            </label> --}}
                          </div>
                          <div class="form-group">
                            </br>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment6" value="1">
                                ความบกพร่องของวัคซีน
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment7" value="1">
                                ความคลาดเคลื่อนด้านการให้บริการ
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment8" value="1">
                                เหตุบังเอิญ/เห็นพ้อง
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment9" value="1">
                                ความกลัว/ความกังวล
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" name="assessment10" value="1">
                                ไม่สามารถระบุได้
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <hr>
                              <label>
                                การตรวจทางห้องปฏิบัติการ
                              </label>
                              <textarea class="form-control" rows="3" id="lab_result" name="lab_result"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-3">
                    <a href="{{ route('lstf1') }}" class="btn btn-block btn-danger">ย้อนกลับ</a>
                  </div>
                  <div class="col-md-3">
                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-block btn-success"></input>
                  </div>
                  <div class="col-md-3">
                  </div>
                </div>

              </div>
              <!-- /.box -->
            </div>
  </form>
  </div>
  <!-- /.row -->
</section>
@include('AEFI.layout.footerScript')

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
      var contactdiv = '<tr class="data-contact-person">' +
        '<td>' +
        '<select type="text" id="name_of_vaccine1" name="name_of_vaccine[]' + rowCount + '" class="form-control" required>' +
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
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php } ?>
        '</select>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="route_of_vaccination1" name="route_of_vaccination[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบุวิธีที่ให้</option>' +
        <?php
      foreach($arr_route_of_vaccination as $k => $v) {
          ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
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
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
          <?php
        } ?>
        '</select>' +
        '</td>' +
        '<td>' +
'<select name="dose[]' + rowCount + '" id="dose1' + rowCount + '" class="form-control">'+
  '<option value="1">เข็มที่ 1</option>'+
  '<option value="2">เข็มที่ 2</option>'+
  '<option value="3">เข็มที่ 3</option>'+
'<option value="4">เข็มที่ 4</option>'+

'</select>'+
        '</td>' +
        '<td>' +
        '<input type="text" name="date_of_vaccination[]' + rowCount + '" id="date_of_vaccination1' + rowCount + '" class="form-control readonly datepicker" data-date-format="yyyy-mm-dd" required>' +
        '</td>' +
        '<td>' +
        '<input type="text" id="time_of_vaccination1' + rowCount + '" name="time_of_vaccination[]' + rowCount + '" class="form-control" required>' +
        '</td>' +
        '<td>' +
        '<select type="text" id="manufacturer1" name="manufacturer[]' + rowCount + '" class="form-control">' +
        '<option value="">กรุณาระบชื่อผู้ผลิต</option>' +
        <?php
      foreach($arr_manufacturer as $k => $v) {
          ?>
          '<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>' +
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
        '<input type="text" id="datepicker_expiry_date1' + rowCount + '" name="expiry_date[]' + rowCount + '" class="form-control readonly " data-date-format="yyyy-mm-dd">' +
        '</td>' +
        // '<td>' +
        // '<input type="text" id="name_of_diluent1" name="name_of_diluent[]' + rowCount + '" class="form-control">' +
        // '</td>' +
        '<td>' +
        '<input type="text" id="lot_number_diluent1" name="lot_number_diluent[]' + rowCount + '" class="form-control">' +
        '</td>' +
        '<td>' +
        '<input type="text" id="datepicker_expiry_date_diluent1' + rowCount + '" name="expiry_date_diluent[]' + rowCount + '" class="form-control readonly " data-date-format="yyyy-mm-dd">' +
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
@stop
