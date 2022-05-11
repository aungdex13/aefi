<!-- Modal_1 -->
<div class="modal fade" id="Symptom1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                   <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                      <div class="box-header with-border">
                                        <label>
                                          กลุ่มอาการ
                                        </label>
                                        <hr>
                                        <!-- checkbox3.1.1 -->
                                        <div class="form-group">
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="rash[0]" value="0027">
                                              Rash(ผื่น)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="erythema[0]" value="0028">
                                              Erythema(ผื่นแดง)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="urticaria[0]" value="0044">
                                              Urticaria
                                            </label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="itching[0]" value="0026">
                                              Itching(อาการคัน)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="edema[0]" value="0003A">
                                              Edema
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="angioedema[0]" value="0003">
                                              Angioedema(บวมที่เยื่อบุ)
                                            </label>
                                          </div>
                                        </div>
                                        {{-- input content --}}
                                        <!-- checkbox3.1.2  -->
                                        <div class="form-group">
                                          <div class="col-md-6" hidden>
                                            <label>
                                              <input type="checkbox" name="fainting[0]" value="1">
                                              Fainting
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="hyperventilation[0]" value="0517">
                                              Hyperventilation
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="syncope[0]" value="0223">
                                              Syncope(เป็นลม)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="headche[0]" value="1">
                                              Headche
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="dizziness[0]" value="0101">
                                              Dizziness(เวียนศีรษะ)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="fatigue[0]" value="0724">
                                              Fatigue(อ่อนเพลีย)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="malaise[0]" value="0728">
                                              Malaise(ไม่สบายตัว)
                                            </label>
                                          </div>
                                        </div>
                                        <!-- checkbox3.1.3  -->
                                        <div class="form-group">
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="dyspepsia[0]" value="0279">
                                              Dyspepsia
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="diarrhea[0]" value="1">
                                              Diarrhea(ถ่ายเหลว)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="nausea[0]" value="0308">
                                              Nausea(คลื่นไส้)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="vomiting[0]" value="0228">
                                              Vomiting(อาเจียน)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="abdominal_pain[0]" value="0268">
                                              Abdominal pain(ปวดท้อง)
                                            </label>
                                          </div>
                                        </div>
                                        <!-- checkbox3.1.4  -->
                                        <div class="form-group">
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="arthalgia[0]" value="1">
                                              Arthalgia(ปวดข้อ)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="myalgia[0]" value="0072">
                                              Myalgia(ปวดเมื่อยกล้ามเนื้อ)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="fever38c[0]" value="0725">
                                              Fever >= 38 C (ไข้)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="swelling_at_the_injection[0]" value="1">
                                              บวมบริเวณที่ฉีดนานเกิน3วัน
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="swelling_beyond_nearest_joint[0]" value="1">
                                              บวมลามไปถึงข้อที่ใกล้ที่สุด
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="lymphadenopathy[0]" value="0577">
                                              Lymphadenopathy
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="lymphadenitis[0]" value="0577D">
                                              Lymphadenitis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="sterile_abscess[0]" value="0051">
                                              Sterile abscess
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="bacterial_abscess[0]" value="1">
                                              Bacterial abscess
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="febrile_convulsion[0]" value="1">
                                              Febrile convulsion(ชักจากไข้)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="afebrile_convulsion[0]" value="1">
                                              Afebrile convulsion(ชักจากเหตุอื่น)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="flaccid_paralysis[0]" value="0139">
                                              Flaccid paralysis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input type="checkbox" name="spastic_paralysis[0]" value="0775">
                                              Spastic paralysis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="chest_pain[0]" type="checkbox" value="1">
                                              Chest pain
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="sepsis[0]" type="checkbox" value="0744">
                                              Sepsis
                                            </label>
                                          </div>
                                         
                                          <div class="col-md-4">
                                            <label>
                                              <input name="sudden_cardiac_arrest[0]" type="checkbox" value="1">
                                              Sudden cardiac arrest
                                            </label>
                                          </div>
                                          
                                          <div class="col-md-3">
                                            <label>
                                              <input name="symptoms_later_immunized" type="checkbox" value="9999">
                                                    อื่นๆ
                                            </label>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                            <div class="col-lg-12">
                                              <div id="other_symptoms_later_immunized" style="display: none">
                                                <input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" class="form-control" placeholder="" hidden="true">
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
                                  
                                  
                                  {{-- คอรั่มภายใน3.3 --}}
                                  <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                      <!-- /.box-header -->
                                      <!-- form start -->
                                      <div class="box-header with-border">
                                        <label>
                                          กลุ่มโรคร้ายแรง 
                                        </label>
                                        <hr>
                                      <div class="box-body">
                                        
                                        {{-- input content --}}
                                        <!-- checkbox3.3.1  -->
                                        <div class="form-group">
                                          <div class="col-md-12">
                                            <label>
                                               Neuro
                                            </label>
                                          </div>
                                          
                                          <div class="col-md-4">
                                            <label>
                                              <input name="ischemic_stroke[0]" type="checkbox" value="1">
                                               stroke
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="hemorrhagic_stroke[0]" type="checkbox" value="1">
                                            Hemorrhagic stroke
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="bells_palsy[0]" type="checkbox" value="1">
                                              Bell's palsy
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="gbs[0]" type="checkbox" value="1">
                                              Guillain-Barré syndrome (GBS)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="transverse myelitis[0]" type="checkbox" value="1">
                                              Transverse myelitis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="adem[0]" type="checkbox" value="1">
                                              Acute disseminated encephalomyelitis (ADEM)
                                            </label>
                                          </div>
                                          <div class="col-md-12">
                                            <hr>
                                          <label>
                                             Cardio
                                          </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="myocarditis[0]" type="checkbox" value="1">
                                              Myocarditis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="pericarditis[0]" type="checkbox" value="1">
                                              Pericarditis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="acute_myocardial[0]" type="checkbox" value="1">
                                              Acute Myocardial infarction
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="heart_failure[0]" type="checkbox" value="1">
                                              Heart failure
                                            </label>
                                          </div>
                                  
                                          <div class="col-md-4">
                                            <label>
                                              <input name="persistent_inconsolable_crying[0]" type="checkbox" value="1">
                                              Persistent inconsolable crying
                                            </label>
                                          </div>
                                          
                                          <div class="col-md-4">
                                            <label>
                                              <input name="osteomyelitis[0]" type="checkbox" value="1184">
                                              Osteitis/Osteomyelitis
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="toxic_shock_syndrome[0]" type="checkbox" value="1">
                                              Toxic shock syndrome
                                            </label>
                                          </div>
                                          
                                          
                                          <div class="col-md-4">
                                            <label>
                                              <input name="hypertension[0]" type="checkbox" value="1">
                                              Hypertension
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="hypertensive_urgency[0]" type="checkbox" value="1">
                                               Hypertensive urgency
                                            </label>
                                          </div>
                                          <div class="col-md-12">
                                            <hr>
                                          <label>
                                             Hemotology
                                          </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="thrombocytopenia[0]" type="checkbox" value="0594">
                                              Thrombocytopenia(เกล็ดเลือดต่ำ)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="deep_vein_thrombosis[0]" type="checkbox" value="1">
                                              Deep vein thrombosis                            
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="pulmonary_embolism[0]" type="checkbox" value="1">
                                              Pulmonary embolism
                                            </label>
                                          </div>
                                          <div class="col-md-12">
                                            <hr>
                                          <label>
                                             หญิงตั้งครรภ์
                                          </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="dfiu[0]" type="checkbox" value="1">
                                              DFIU (Dead fetus in utero)
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="abortion[0]" type="checkbox" value="1">
                                              Abortion
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="abruptio_placenta[0]" type="checkbox" value="1">
                                              Abruptio placenta
                                            </label>
                                          </div>
                                          <div class="col-md-4">
                                            <label>
                                              <input name="other_pregnant_symptoms" type="checkbox" value="9999">
                                                    อื่นๆ
                                            </label>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                            <div class="col-lg-12">
                                              <div id="other_symptoms_pregnant" style="display: none">
                                                <input type="text" id="other_symptoms_pregnant_text" name="other_symptoms_pregnant_text" class="form-control" placeholder="" hidden="true">
                                              </div>
                                              {{-- <div id="other_symptoms_later_immunized_t" style="display: none">
                                                <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">
                                              </div> --}}
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <hr>
                                          <label>
                                             Other
                                          </label>
                                          </div>
                                          <div class="col-md-6">
                                            <label>
                                              <input name="anaphylaxis[0]" type="checkbox" value="2237">
                                              Anaphylaxis
                                            </label>
                                          </div>
                                          <div class="col-md-6">
                                            <label>
                                              <input name="ards[0]" type="checkbox" value="1">
                                               Acute respiratory distress syndrome (ARDS)
                                            </label>
                                          </div>
                                          <div class="col-md-6">
                                            <label>
                                              <input name="hhe[0]" type="checkbox" value="1704">
                                              Hypotonic Hyporesponsive episode (HHE)
                                            </label>
                                          </div>
                                          <div class="col-md-6">
                                            <label>
                                              <input name="covid_19[0]" type="checkbox" value="1">
                                              Covid-19
                                            </label>
                                          </div>
                                          <div class="col-md-6">
                                            <label>
                                              <input type="checkbox" name="encephalopathy[0]" value="0105">
                                              Encephalopathy/Encephalitis
                                            </label>
                                          </div>
                                          <div class="col-md-6">
                                            <label>
                                              <input type="checkbox" name="meningitis[0]" value="0105">
                                              Meningitis
                                            </label>
                                          </div>
                                          {{-- <div class="col-md-6">
                                            <label>
                                              <input name="symptoms_later_immunized[0]" type="checkbox" value="9999">
                                              อื่นๆ
                                            </label>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-lg-12">
                                              <div id="other_symptoms_later_immunized" style="display: none">
                                                <input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized[0]" class="form-control" placeholder="" hidden="true">
                                              </div>
                                              <div id="other_symptoms_later_immunized_t" style="display: none">
                                                <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">
                                              </div>
                                            </div>
                                          </div> --}}
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.box -->
                                  </div>
                                </div>

                  {{-- คอรั่มภายใน3.4 --}}
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label>ว/ด/ป ที่เกิดอาการ :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="date_of_symptoms" name="date_of_symptoms[0]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label><font style="color:red;">*</font> เวลาที่เกิดอาการ :</label>
                              <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                              <input type="time" class="form-control" id="time_of_symptoms"  name="time_of_symptoms[0]">
                              </div>
                            </div>
                          </div>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label>ว/ด/ป ที่รับรักษา :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="date_of_treatment" name="date_of_treatment[0]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label>ว/ด/ป ที่จำหน่าย :</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="time_of_treatment" name="time_of_treatment[0]" data-date-format="yyyy-mm-dd" readonly>
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
                          <div class="col-lg-6">
                            <label>การวินิจฉัยหลักของแพทย์ :</label>
                            <input  id="main_diagnosis1" type="text" class="form-control" name="main_diagnosis[0]">
                            {{-- <select id="js-example-basic-single3" name="minor_diagnosis[0]" class="js-example-basic-single3 form-control" data-dropdown-css-class="select2-danger" required>
                            </select> --}}
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <label>การวินิจฉัยรองของแพทย์ :</label>
                            <input  id="minor_diagnosis1" type="text" class="form-control" name="minor_diagnosis[0]">
                            {{-- <select id="js-example-basic-single3" name="minor_diagnosis[0]" class="js-example-basic-single3 form-control" data-dropdown-css-class="select2-danger" required>
                            </select> --}}
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>รายละเอียดอาการและการตรวจสอบ</label>
                            <input class="form-control" rows="5"  id="Symptoms_details1" name="Symptoms_details[0]">
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
                    <div class="col-lg-12"  id="seriousness_of_the_symptoms_1">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="c_seriousness_of_the_symptoms[0]"  id="seriousness_of_the_symptoms1" value="1" >
                            ไม่ร้ายแรง
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="c_seriousness_of_the_symptoms[0]" id="seriousness_of_the_symptoms1" value="2">
                            ร้ายแรง
                          </label>
                        </div>
                        <input type="text" id="seriousness_of_the_symptoms" name="seriousness_of_the_symptoms[0]" hidden>
                      </div>
                    </div>
                  </div>
                  <div id="other_seriousness_of_the_symptoms_bk1">
                    <div id="other_seriousness_of_the_symptoms_1">
                    <div class="form-group">
                      <div class="col-lg-12">
                        <label>ระบุ :</label>
                      </div>
                    </div>
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[0]" id="c_other_seriousness_of_the_symptoms" value="1">
                          เสียชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[0]" id="c_other_seriousness_of_the_symptoms" value="2">
                          อันตรายถึงชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[0]" id="c_other_seriousness_of_the_symptoms" value="3">
                          พิการ/ไร้ความสามารถ
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[0]" id="c_other_seriousness_of_the_symptoms" value="4">
                          รับไว้รักษาในโรงพยาบาล
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[0]" id="c_other_seriousness_of_the_symptoms" value="5">
                          ความผิดปกติแต่กำเนิด
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[0]" id="c_other_seriousness_of_the_symptoms" value="6">
                          อื่นๆที่มีความสำคัญทางการแพทย์
                        </label>
                      </div>
                      <div class="col-lg-4">
                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                          <label></label>
                          <input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms[0]" class="form-control" placeholder="อื่นๆ">
                        </div>
                      </div>
                    </div>
                    <input type="text" id="other_seriousness_of_the_symptoms" name="other_seriousness_of_the_symptoms[0]" hidden>
                  </div>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label>
                        <font style="color:red;">*</font> สถานะผู้ป่วย
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12" id="patient_status_1">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[0]" value="1" >
                            หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[0]" value="2">
                            หายโดยมีร่องรอย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[0]" value="3">
                            อาการดีขึ้นแต่ยังไม่หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[0]" value="4">
                            ไม่หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[0]" value="5">
                            ไม่ทราบ
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[0]" value="6">
                            เสียชีวิต
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group date">
                            <div id="other_patian_sta" style="display: none">
                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead[0]" ="true" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <input type="text" id="patient_status" name="patient_status[0]" hidden>
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
                    <div class="col-lg-12"  id="funeral_1">
                      <div class="col-md-2" >
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[0]" value="" >
                          ไม่ระบุ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[0]" value="1" >
                          ไม่มี
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[0]" value="2">
                          ไม่ทราบ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[0]" value="3">
                          มี
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="other_address_funeral" style="display: none">
                          <label>สถานที่ทำการ :</label>
                          <input type="text" id="other_address_funeral_text" name="other_address_funeral[0]" class="form-control" placeholder="ระบุสถานที่ทำการ">
                        </div>
                      </div>
                      <input type="text" id="funeral" name="funeral[0]" hidden>
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