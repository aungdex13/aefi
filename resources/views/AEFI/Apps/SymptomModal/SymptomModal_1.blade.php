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
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-success">
                      <div class="box-header with-border">
                        <!-- checkbox3.1.1 -->
                        <div class="form-group">
                          <div class="col-md-4" id="rash_1">
                            <label>
                              <input type="checkbox" id="c_rash" name="c_rash[]" value="0027">
                              Rash
                            </label>
                            <input type="text" id="rash" name="rash[]" hidden>
                          </div>
                          <div class="col-md-4" id="erythema_1">
                            <label>
                              <input type="checkbox" id="erythema1" name="c_erythema[]" value="0028">
                              Erythema
                            </label>
                            <input type="text" id="erythema" name="erythema[]" hidden>
                          </div>
                          <div class="col-md-4" id="urticaria_1">
                            <label>
                              <input type="checkbox" id="urticaria1" name="c_urticaria[]" value="0044">
                              Urticaria
                            </label>
                            <input type="text" id="urticaria" name="urticaria[]" hidden>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4" id="itching_1">
                            <label>
                              <input type="checkbox" id="itching1" name="c_itching[]" value="0026">
                              Itching
                            </label>
                            <input type="text" id="itching" name="itching[]" hidden>
                          </div>
                          <div class="col-md-4" id="edema_1">
                            <label>
                              <input type="checkbox" id="edema1" name="c_edema[]" value="0003A">
                              Edema
                            </label>
                            <input type="text" id="edema" name="edema[]" hidden>
                          </div>
                          <div class="col-md-5" id="angioedema_1">
                            <label>
                              <input type="checkbox" id="angioedema1" name="c_angioedema[]" value="0003">
                              Angioedema
                            </label>
                            <input type="text" id="angioedema" name="angioedema[]" hidden>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
    
                      <div class="box-body">
                        {{-- input content --}}
                        <!-- checkbox3.1.2  -->
                        <div class="form-group">
                          <div class="col-md-4" id="fainting_1">
                            <label>
                              <input type="checkbox" id="fainting1" name="c_fainting[]" value="1">
                              Fainting
                            </label>
                            <input type="text" id="fainting" name="fainting[]" hidden>
                          </div>
                          <div class="col-md-6" id="hyperventilation_1">
                            <label>
                              <input type="checkbox" id="hyperventilation1" name="c_hyperventilation[]" value="0517">
                              Hyperventilation
                            </label>
                            <input type="text" id="hyperventilation" name="hyperventilation[]" hidden>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4" id="syncope_1">
                            <label>
                              <input type="checkbox" id="syncope1" name="c_syncope[]" value="0223">
                              Syncope
                            </label>
                            <input type="text" id="syncope" name="syncope[]" hidden>
                          </div>
                          <div class="col-md-4" id="headche_1">
                            <label>
                              <input type="checkbox" id="headche1" name="c_headche[]" value="1">
                              Headche
                            </label>
                            <input type="text" id="headche" name="headche[]" hidden>
                          </div>
                          <div class="col-md-4" id="dizziness_1">
                            <label>
                              <input type="checkbox" id="dizziness1" name="c_dizziness[]" value="0101">
                              Dizziness
                            </label>
                            <input type="text" id="dizziness" name="dizziness[]" hidden>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4" id="fatigue_1">
                            <label>
                              <input type="checkbox" id="fatigue" name="c_fatigue[]" value="0724">
                              Fatigue
                            </label>
                            <input type="text" id="fatigue" name="fatigue[]" hidden>
                          </div>
                          <div class="col-md-4" id="malaise_1">
                            <label>
                              <input type="checkbox" id="malaise" name="c_malaise[]" value="0728">
                              Malaise
                            </label>
                            <input type="text" id="malaise" name="malaise[]" hidden>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.1.3  -->
                        <div class="form-group">
                          <div class="col-md-4" id="dyspepsia_1">
                            <label>
                              <input type="checkbox" id="dyspepsia" name="c_dyspepsia[]" value="0279">
                              Dyspepsia
                            </label>
                            <input type="text" id="dyspepsia" name="dyspepsia[]" hidden>
                          </div>
                          <div class="col-md-4" id="diarrhea_1">
                            <label>
                              <input type="checkbox" id="diarrhea" name="c_diarrhea[]" value="1">
                              Diarrhea
                            </label>
                            <input type="text" id="diarrhea" name="diarrhea[]" hidden>
                          </div>
                          <div class="col-md-4" id="nausea_1">
                            <label>
                              <input type="checkbox" id="nausea" name="c_nausea[]" value="0308">
                              Nausea
                            </label>
                            <input type="text" id="nausea" name="nausea[]" hidden>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4" id="vomiting_1">
                            <label>
                              <input type="checkbox" id="vomiting" name="c_vomiting[]" value="0228">
                              Vomiting
                            </label>
                            <input type="text" id="vomiting" name="vomiting[]" hidden>
                          </div>
                          <div class="col-md-6" id="abdominal_pain_1">
                            <label>
                              <input type="checkbox" id="abdominal_pain1" name="c_abdominal_pain[]" value="0268">
                              Abdominal pain
                            </label>
                            <input type="text" id="abdominal_pain" name="abdominal_pain[]" hidden>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.1.4  -->
                        <div class="form-group">
                          <div class="col-md-4" id="arthalgia_1">
                            <label>
                              <input type="checkbox" id="arthalgia1" name="c_arthalgia[]" value="1">
                              Arthalgia
                            </label>
                            <input type="text" id="arthalgia" name="arthalgia[]" hidden>
                          </div>
                          <div class="col-md-4" id="myalgia_1">
                            <label>
                              <input type="checkbox" id="myalgia1" name="c_myalgia[]" value="0072">
                              Myalgia
                            </label>
                            <input type="text" id="myalgia" name="myalgia[]" hidden>
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
                          <div class="col-md-5" id="fever38c_1">
                            <label>
                              <input type="checkbox" id="fever38c1" name="c_fever38c[]" value="0725">
                              Fever >= 38 C
                            </label>
                            <input type="text" id="fever38c" name="fever38c[]" hidden>
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
                            <div class="col-md-12" id="swelling_at_the_injection_1">
                              <label>
                                <input type="checkbox" id="swelling_at_the_injection1" name="c_swelling_at_the_injection[]" value="1">
                                บวมบริเวณที่ฉีดนานเกิน3วัน
                              </label>
                              <input type="text" id="swelling_at_the_injection" name="swelling_at_the_injection[]" hidden>
                            </div>
                            <div class="col-md-12" id="swelling_beyond_nearest_joint_1">
                              <label>
                                <input type="checkbox" id="swelling_beyond_nearest_joint1" name="c_swelling_beyond_nearest_joint[]" value="1">
                                บวมลามไปถึงข้อที่ใกล้ที่สุด
                              </label>
                              <input type="text" id="swelling_beyond_nearest_joint" name="swelling_beyond_nearest_joint[]" hidden>
                            </div>
                            <div class="col-md-12" id="lymphadenopathy_1">
                              <label>
                                <input type="checkbox" id="lymphadenopathy1" name="c_lymphadenopathy[]" value="0577">
                                Lymphadenopathy
                              </label>
                              <input type="text" id="lymphadenopathy" name="lymphadenopathy[]" hidden>
                            </div>
                            <div class="col-md-12" id="lymphadenitis_1">
                              <label>
                                <input type="checkbox" id="lymphadenitis1" name="c_lymphadenitis[]" value="0577D">
                                Lymphadenitis
                              </label>
                              <input type="text" id="lymphadenitis" name="lymphadenitis[]" hidden>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6" id="sterile_abscess_1">
                              <label>
                                <input type="checkbox" id="sterile_abscess1" name="c_sterile_abscess[]" value="0051">
                                Sterile abscess
                              </label>
                              <input type="text" id="sterile_abscess" name="sterile_abscess[]" hidden>
                            </div>
                            <div class="col-md-6" id="bacterial_abscess_1">
                              <label>
                                <input type="checkbox" id="bacterial_abscess1" name="c_bacterial_abscess[]" value="1">
                                Bacterial abscess
                              </label>
                              <input type="text" id="bacterial_abscess" name="bacterial_abscess[]" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <!-- checkbox3.2.3  -->
                        <div class="form-group">
                          <div class="col-md-12" id="febrile_convulsion_1">
                            <label>
                              <input type="checkbox" id="febrile_convulsion1" name="c_febrile_convulsion[]" value="1">
                              Febrile convulsion
                            </label>
                            <input type="text" id="febrile_convulsion" name="febrile_convulsion[]" hidden>
                          </div>
                          <div class="col-md-12" id="afebrile_convulsion_1">
                            <label>
                              <input type="checkbox" id="afebrile_convulsion1" name="c_afebrile_convulsion[]" value="1">
                              Afebrile convulsion
                            </label>
                            <input type="text" id="afebrile_convulsion" name="afebrile_convulsion[]" hidden>
                          </div>
                          <div class="col-md-12" id="encephalopathy_1">
                            <label>
                              <input type="checkbox" id="encephalopathy1" name="c_encephalopathy[]" value="0105">
                              Encephalopathy/Encephalitis
                            </label>
                            <input type="text" id="encephalopathy" name="encephalopathy[]" hidden>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6" id="flaccid_paralysis_1">
                            <label>
                              <input type="checkbox" id="flaccid_paralysis1" name="c_flaccid_paralysis[]" value="0139">
                              Flaccid paralysis
                            </label>
                            <input type="text" id="flaccid_paralysis" name="flaccid_paralysis[]" hidden>
                          </div>
                          <div class="col-md-6" id="spastic_paralysis_1">
                            <label>
                              <input type="checkbox" id="spastic_paralysis1" name="c_spastic_paralysis[]" value="0775">
                              Spastic paralysis
                            </label>
                            <input type="text" id="spastic_paralysis" name="spastic_paralysis[]" hidden>
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
                          <div class="col-md-12" id="hhe_1">
                            <label>
                              <input id="hhe1" name="c_hhe[]" type="checkbox" value="1704">
                              Hypotonic Hyporesponsive episode (HHE)
                            </label>
                            <input type="text" id="hhe" name="hhe[]" hidden>
                          </div>
                          <div class="col-md-12" id="persistent_inconsolable_crying_1">
                            <label>
                              <input id="persistent_inconsolable_crying1" name="c_persistent_inconsolable_crying[]" type="checkbox" value="1">
                              Persistent inconsolable crying
                            </label>
                            <input type="text" id="persistent_inconsolable_crying" name="persistent_inconsolable_crying[]" hidden>
                          </div>
                          <div class="col-md-12" id="thrombocytopenia_1">
                            <label>
                              <input id="thrombocytopenia1" name="c_thrombocytopenia[]" type="checkbox" value="0594">
                              Thrombocytopenia
                            </label>
                            <input type="text" id="thrombocytopenia" name="thrombocytopenia[]" hidden>
                          </div>
                          <div class="col-md-12" id="osteomyelitis_1">
                            <label>
                              <input id="osteomyelitis1" name="c_osteomyelitis[]" type="checkbox" value="1184">
                              Osteitis/Osteomyelitis
                            </label>
                            <input type="text" id="osteomyelitis" name="osteomyelitis[]" hidden>
                          </div>
                          <div class="col-md-12" id="toxic_shock_syndrome_1">
                            <label>
                              <input id="toxic_shock_syndrome1" name="c_toxic_shock_syndrome[]" type="checkbox" value="1">
                              Toxic shock syndrome
                            </label>
                            <input type="text" id="toxic_shock_syndrome" name="toxic_shock_syndrome[]" hidden>
                          </div>
                          <div class="col-md-12" id="sepsis_1">
                            <label>
                              <input id="sepsis1" name="c_sepsis[]" type="checkbox" value="0744">
                              Sepsis
                            </label>
                            <input type="text" id="sepsis" name="sepsis[]" hidden>
                          </div>
                          <div class="col-md-12" id="anaphylaxis_1">
                            <label>
                              <input id="anaphylaxis1" name="c_anaphylaxis[]" type="checkbox" value="2237">
                              Anaphylaxis
                            </label>
                            <input type="text" id="anaphylaxis" name="anaphylaxis[]" hidden>
                          </div>
                          <div class="col-md-12" id="gbs_1">
                            <label>
                              <input id="gbs1" name="c_gbs[]" type="checkbox" value="1">
                              Guillain-Barré syndrome (GBS)
                            </label>
                            <input type="text" id="gbs" name="gbs[]" hidden>
                          </div>
                          <div class="col-md-12" id="transverse myelitis_1">
                            <label>
                              <input id="transverse myelitis1" name="c_transverse myelitis[]" type="checkbox" value="1">
                              Transverse myelitis
                            </label>
                            <input type="text" id="transverse myelitis" name="transverse myelitis[]" hidden>
                          </div>
                          <div class="col-md-12" id="adem_1">
                            <label>
                              <input id="adem1" name="c_adem[]" type="checkbox" value="1">
                              Acute disseminated encephalomyelitis (ADEM)
                            </label>
                            <input type="text" id="adem" name="adem[]" hidden>
                          </div>
                          <div class="col-md-12" id="acute_myocardial_1">
                            <label>
                              <input id="acute_myocardial1" name="c_acute_myocardial[]" type="checkbox" value="1">
                              Acute Myocardial
                            </label>
                            <input type="text" id="acute_myocardial" name="acute_myocardial[]" hidden>
                          </div>
                          <div class="col-md-12" id="ards_1">
                            <label>
                              <input id="ards1" name="c_ards[]" type="checkbox" value="1">
                               Acute respiratory distress syndrome (ARDS)
                            </label>
                            <input type="text" id="ards" name="ards[]" hidden>
                          </div>
                          <div class="col-md-12" id="symptoms_later_immunized_1">
                            <label>
                              <input id="symptoms_later_immunized1" name="c_symptoms_later_immunized[]" type="checkbox" value="9999">
                              other
                            </label>
                            <input type="text" id="symptoms_later_immunized" name="symptoms_later_immunized[]" hidden>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <div id="other_symptoms_later_immunized" style="display: none">
                                <input type="text" id="other_symptoms_later_immunized_text1" name="other_symptoms_later_immunized[]" class="form-control" placeholder="" hidden="true">
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
                              <input type="text" class="form-control pull-right" id="date_of_symptoms" name="date_of_symptoms[]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="col-lg-8">
                              <label>เวลาที่เกิดอาการ :</label>
                              <div class="input-group">
                                <input  id="time_of_symptoms1" type="text" class="form-control" name="time_of_symptoms[]">
    
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
                              <input type="text" class="form-control pull-right" id="date_of_treatment" name="date_of_treatment[]" data-date-format="yyyy-mm-dd" readonly>
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
                              <input type="text" class="form-control pull-right" id="time_of_treatment" name="time_of_treatment[]" data-date-format="yyyy-mm-dd" readonly>
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
                            <input class="form-control" rows="5"  id="Symptoms_details1" name="Symptoms_details[]">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis1" name="diagnosis[]" class="form-control" placeholder="">
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
                            <input type="radio" name="c_seriousness_of_the_symptoms[]"  id="seriousness_of_the_symptoms1" value="1" >
                            ไม่ร้ายแรง
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="c_seriousness_of_the_symptoms[]" id="seriousness_of_the_symptoms1" value="2">
                            ร้ายแรง
                          </label>
                        </div>
                        <input type="text" id="seriousness_of_the_symptoms" name="seriousness_of_the_symptoms[]" hidden>
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
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms" value="1">
                          เสียชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms" value="2">
                          อันตรายถึงชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms" value="3">
                          พิการ/ไร้ความสามารถ
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms" value="4">
                          รับไว้รักษาในโรงพยาบาล
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms" value="5">
                          ความผิดปกติแต่กำเนิด
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms[]" id="other_seriousness_of_the_symptoms" value="6">
                          อื่นๆที่มีความสำคัญทางการแพทย์
                        </label>
                      </div>
                      <div class="col-lg-4">
                        <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                          <label></label>
                          <input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms[]" class="form-control" placeholder="อื่นๆ">
                        </div>
                      </div>
                    </div>
                    <input type="text" id="other_seriousness_of_the_symptoms" name="other_seriousness_of_the_symptoms[]" hidden>
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
                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="1" >
                            หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="2">
                            หายโดยมีร่องรอย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="3">
                            อาการดีขึ้นแต่ยังไม่หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="4">
                            ไม่หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="5">
                            ไม่ทราบ
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status1" name="c_patient_status[]" value="6">
                            เสียชีวิต
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group date">
                            <div id="other_patian_sta" style="display: none">
                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead[]" hidden="true" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <input type="text" id="patient_status" name="patient_status[]" hidden>
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
                      <div class="col-md-2" hidden>
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[]" value="" >
                          ไม่ระบุ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[]" value="1" >
                          ไม่มี
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[]" value="2">
                          ไม่ทราบ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral" name="c_funeral[]" value="3">
                          มี
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="other_address_funeral" style="display: none">
                          <label>สถานที่ทำการ :</label>
                          <input type="text" id="other_address_funeral_text" name="other_address_funeral[]" class="form-control" placeholder="ระบุสถานที่ทำการ">
                        </div>
                      </div>
                      <input type="text" id="funeral" name="funeral[]" hidden>
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