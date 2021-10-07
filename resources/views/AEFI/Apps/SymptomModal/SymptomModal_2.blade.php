<!-- Modal_1 -->
<div class="modal fade" id="Symptom2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>
        </div>
        <div class="modal-body">
            <div class="tab-pane active" id="tab_1">
                <div class="box-body">
                  {{-- คอรั่มภายใน3.1 --}}
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" name="c_rash[]" value="0027">
                              <input type="text" name="rash[]">
                              Rash
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="erythema2" name="erythema[]" value="0028">
                              Erythema
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="urticaria2" name="urticaria[]" value="0044">
                              Urticaria
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="angioedema2" name="itching[]" value="0026">
                              Itching
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="angioedema2" name="edema[]" value="0003A">
                              Edema
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label>
                              <input type="checkbox" id="angioedema2" name="angioedema[]" value="0003">
                              Angioedema
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
    
                      <div class="box-body">
                        {{-- input content --}}
                        <!-- checkbox3.1.2  -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="fainting2" name="fainting[]" value="1">
                              Fainting
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" id="hyperventilation2" name="hyperventilation[]" value="0517">
                              Hyperventilation
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="syncope2" name="syncope[]" value="0223">
                              Syncope
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="headche2" name="headche[]" value="1">
                              Headche
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="dizziness2" name="dizziness[]" value="0101">
                              Dizziness
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="fatigue2" name="fatigue[]" value="0724">
                              Fatigue
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="malaise2" name="malaise[]" value="0728">
                              Malaise
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.1.3  -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="dyspepsia2" name="dyspepsia[]" value="0279">
                              Dyspepsia
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="diarrhea2" name="diarrhea[]" value="1">
                              Diarrhea
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="nausea2" name="nausea[]" value="0308">
                              Nausea
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="vomiting2" name="vomiting[]" value="0228">
                              Vomiting
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" id="abdominal_pain2" name="abdominal_pain[]" value="0268">
                              Abdominal pain
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.1.4  -->
                        <div class="form-group">
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="arthalgia2" name="arthalgia[]" value="1">
                              Arthalgia
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label>
                              <input type="checkbox" id="myalgia2" name="myalgia[]" value="0072">
                              Myalgia
                            </label>
                          </div>
                        </div>
                      </div>
    
                    </div>
                    <!-- /.box -->
                  </div>
                  {{-- คอรั่มภายใน3.2 --}}
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.2.1 -->
                        <div class="form-group">
                          <div class="col-md-5">
                            <label>
                              <input type="checkbox" id="fever38c2" name="fever38c[]" value="0725">
                              Fever >= 38 C
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
                                <input type="checkbox" id="swelling_at_the_injection2" name="swelling_at_the_injection[]" value="1">
                                บวมบริเวณที่ฉีดนานเกิน3วัน
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" id="swelling_beyond_nearest_joint2" name="swelling_beyond_nearest_joint[]" value="1">
                                บวมลามไปถึงข้อที่ใกล้ที่สุด
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" id="lymphadenopathy2" name="lymphadenopathy[]" value="0577">
                                Lymphadenopathy
                              </label>
                            </div>
                            <div class="col-md-12">
                              <label>
                                <input type="checkbox" id="lymphadenitis2" name="lymphadenitis[]" value="0577D">
                                Lymphadenitis
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6">
                              <label>
                                <input type="checkbox" id="sterile_abscess2" name="sterile_abscess[]" value="0051">
                                Sterile abscess
                              </label>
                            </div>
                            <div class="col-md-6">
                              <label>
                                <input type="checkbox" id="bacterial_abscess2" name="bacterial_abscess[]" value="1">
                                Bacterial abscess
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.2.3  -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" id="febrile_convulsion2" name="febrile_convulsion[]" value="1">
                              Febrile convulsion
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" id="afebrile_convulsion2" name="afebrile_convulsion[]" value="1">
                              Afebrile convulsion
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input type="checkbox" id="encephalopathy2" name="encephalopathy[]" value="0105">
                              Encephalopathy/Encephalitis
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" id="flaccid_paralysis2" name="flaccid_paralysis[]" value="0139">
                              Flaccid paralysis
                            </label>
                          </div>
                          <div class="col-md-6">
                            <label>
                              <input type="checkbox" id="spastic_paralysis2" name="spastic_paralysis[]" value="0775">
                              Spastic paralysis
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
    
                  </div>
                  <!-- /.box -->
                  {{-- คอรั่มภายใน3.3 --}}
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <!-- /.box-header -->
                      <!-- form start -->
    
                      <div class="box-body">
                        {{-- input content --}}
                        <!-- checkbox3.3.1  -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label>
                              <input id="hhe2" name="hhe[]" type="checkbox" value="1704">
                              Hypotonic Hyporesponsive episode (HHE)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="persistent_inconsolable_crying2" name="persistent_inconsolable_crying[]" type="checkbox" value="1">
                              Persistent inconsolable crying
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="thrombocytopenia2" name="thrombocytopenia[]" type="checkbox" value="0594">
                              Thrombocytopenia
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="osteomyelitis2" name="osteomyelitis[]" type="checkbox" value="1184">
                              Osteitis/Osteomyelitis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="toxic_shock_syndrome2" name="toxic_shock_syndrome[]" type="checkbox" value="1">
                              Toxic shock syndrome
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="sepsis2" name="sepsis[]" type="checkbox" value="0744">
                              Sepsis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="anaphylaxis2" name="anaphylaxis[]" type="checkbox" value="2237">
                              Anaphylaxis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="gbs2" name="gbs[]" type="checkbox" value="1">
                              Guillain-Barré syndrome (GBS)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="transverse myelitis2" name="transverse myelitis[]" type="checkbox" value="1">
                              Transverse myelitis
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="adem2" name="adem[]" type="checkbox" value="1">
                              Acute disseminated encephalomyelitis (ADEM)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="acute_myocardial2" name="acute_myocardial[]" type="checkbox" value="1">
                              Acute Myocardial
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="ards2" name="ards[]" type="checkbox" value="1">
                               Acute respiratory distress syndrome (ARDS)
                            </label>
                          </div>
                          <div class="col-md-12">
                            <label>
                              <input id="symptoms_later_immunized2" name="symptoms_later_immunized[]" type="checkbox" value="9999">
                              other
                            </label>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <div id="other_symptoms_later_immunized" style="display: none">
                                <input type="text" id="other_symptoms_later_immunized_text2" name="other_symptoms_later_immunized[]" class="form-control" placeholder="" hidden="true">
                              </div>
                              {{-- <div id="other_symptoms_later_immunized_t" style="display: none">
                                <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">
                              </div> --}}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box -->
                  </div>
                  {{-- คอรั่มภายใน3.4 --}}
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>ว/ด/ป ที่เกิดอาการ :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="date_of_symptoms2" name="date_of_symptoms[]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="col-lg-8">
                              <label>เวลาที่เกิดอาการ :</label>
                              <div class="input-group">
                                <input  id="time_of_symptoms2" type="text" class="form-control" name="time_of_symptoms[]">
    
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>ว/ด/ป ที่รับรักษา :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="date_of_treatment2" name="date_of_treatment[]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>ว/ด/ป ที่จำหน่าย :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="time_of_treatment2" name="time_of_treatment[]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
    
                      <div class="box-body">
                        {{-- input content --}}
                        <!-- textarea -->
                        <div class="form-group">
                          <div class="col-lg-12">
                            <label>รายละเอียดอาการและการตรวจสอบ</label>
                            <input class="form-control" rows="5"  id="Symptoms_details2" name="Symptoms_details[]">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis2" name="diagnosis[]" class="form-control" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box -->
                  </div>
                </div>
                <div class="box-footer">
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label>
                        <font style="color:red;">*</font> ความร้ายแรงของอาการ
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms_bk[]"  id="seriousness_of_the_symptoms2" value="" >
                            ไม่ระบุ
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms[]"  id="seriousness_of_the_symptoms2" value="1" >
                            ไม่ร้ายแรง
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="seriousness_of_the_symptoms[]" id="seriousness_of_the_symptoms2" value="2">
                            ร้ายแรง
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="other_seriousness_of_the_symptoms_bk1">
                    <div class="form-group">
                      <div class="col-lg-12">
                        <label>ระบุ :</label>
                      </div>
                    </div>
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms2" value="1">
                          เสียชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms2" value="2">
                          อันตรายถึงชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms2" value="3">
                          พิการ/ไร้ความสามารถ
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms2" value="4">
                          รับไว้รักษาในโรงพยาบาล
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms2" value="5">
                          ความผิดปกติแต่กำเนิด
                        </label>
                      </div>
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms2" value="6">
                          อื่นๆที่มีความสำคัญทางการแพทย์
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                          <label></label>
                          <input type="text" id="text_other_seriousness_of_the_symptoms_text2" name="text_other_seriousness_symptoms[]" class="form-control" placeholder="อื่นๆ">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label>
                        <font style="color:red;">*</font> สภาพผู้ป่วย
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="" >
                            ไม่ระบุ
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="1" >
                            หาย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="2">
                            หายโดยมีร่องรอย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="3">
                            อาการดีขึ้นแต่ยังไม่หาย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="4">
                            ไม่หาย
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="5">
                            ไม่ทราบ
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" id="patient_status2" name="patient_status[]" value="6">
                            เสียชีวิต
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group date">
                            <div id="other_patian_sta" style="display: none">
                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead2" name="date_dead[]" hidden="true" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- checkbox3.1.1 -->
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label>ผ่าพิสูจน์ศพ :</label>
                    </div>
                  </div>
                  <!-- checkbox3.1.1 -->
                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="funeral2" name="funeral[]" value="" >
                          ไม่ระบุ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="funeral2" name="funeral[]" value="1" >
                          ไม่มี
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="funeral2" name="funeral[]" value="2">
                          ไม่ทราบ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="funeral2" name="funeral[]" value="3">
                          มี
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="other_address_funeral" style="display: none">
                          <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text2" name="other_address_funeral[]" class="form-control" placeholder="ระบุสถานที่ทำการ">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
              </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">เสร็จสิ้น</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

  
  