<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">(3) ข้อมูลวัคซีน / สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข)</h3>
    </div>
    <div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">อาการภายหลังได้รับวัคซีน เข็ม/ครั้งที่ 1</a></li>
          <li><a href="#tab_2" data-toggle="tab">อาการภายหลังได้รับวัคซีน เข็ม/ครั้งที่ 2</a></li>
          <li><a href="#tab_3" data-toggle="tab">อาการภายหลังได้รับวัคซีน เข็ม/ครั้งที่ 3</a></li>
          {{-- <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
          </li>
          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> --}}
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="box-body">
              {{-- คอรั่มภายใน3.1 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="rash" value="0027">
                          Rash
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="erythema" value="0028">
                          Erythema
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="urticaria" value="0044">
                          Urticaria
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="itching" value="0026">
                          Itching
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="edema" value="0003A">
                          Edema
                        </label>
                      </div>
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="angioedema" value="0003">
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
                          <input type="checkbox" name="fainting" value="1">
                          Fainting
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="hyperventilation" value="0517">
                          Hyperventilation
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="syncope" value="0223">
                          Syncope
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="headche" value="1">
                          Headche
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="dizziness" value="0101">
                          Dizziness
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="fatigue" value="0724">
                          Fatigue
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="malaise" value="0728">
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
                          <input type="checkbox" name="dyspepsia" value="0279">
                          Dyspepsia
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="diarrhea" value="1">
                          Diarrhea
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="nausea" value="0308">
                          Nausea
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="vomiting" value="0228">
                          Vomiting
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="abdominal_pain" value="0268">
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
                          <input type="checkbox" name="arthalgia" value="1">
                          Arthalgia
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="myalgia" value="0072">
                          Myalgia
                        </label>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box -->
              </div>
              {{-- คอรั่มภายใน3.2 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <!-- checkbox3.2.1 -->
                    <div class="form-group">
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="fever38c" value="0725">
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
                            <input type="checkbox" name="swelling_at_the_injection" value="1">
                            บวมบริเวณที่ฉีดนานเกิน3วัน
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="swelling_beyond_nearest_joint" value="1">
                            บวมลามไปถึงข้อที่ใกล้ที่สุด
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="lymphadenopathy" value="0577">
                            Lymphadenopathy
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="lymphadenitis" value="0577D">
                            Lymphadenitis
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label>
                            <input type="checkbox" name="sterile_abscess" value="0051">
                            Sterile abscess
                          </label>
                        </div>
                        <div class="col-md-6">
                          <label>
                            <input type="checkbox" name="bacterial_abscess" value="1">
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
                          <input type="checkbox" name="febrile_convulsion" value="1">
                          Febrile convulsion
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input type="checkbox" name="afebrile_convulsion" value="1">
                          Afebrile convulsion
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input type="checkbox" name="encephalopathy" value="0105">
                          Encephalopathy/Encephalitis
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="flaccid_paralysis" value="0139">
                          Flaccid paralysis
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="spastic_paralysis" value="0775">
                          Spastic paralysis
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.box -->
              {{-- คอรั่มภายใน3.3 --}}
              <div class="col-md-3">
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
                          <input name="hhe" type="checkbox" value="1704">
                          Hypotonic Hyporesponsive episode (HHE)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="persistent_inconsolable_crying" type="checkbox" value="1">
                          Persistent inconsolable crying
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="thrombocytopenia" type="checkbox" value="0594">
                          Thrombocytopenia
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="osteomyelitis" type="checkbox" value="1184">
                          Osteitis/Osteomyelitis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="toxic_shock_syndrome" type="checkbox" value="1">
                          Toxic shock syndrome
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="sepsis" type="checkbox" value="0744">
                          Sepsis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="anaphylaxis" type="checkbox" value="2237">
                          Anaphylaxis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="gbs" type="checkbox" value="1">
                          Guillain-Barré syndrome (GBS)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="transverse myelitis" type="checkbox" value="1">
                          Transverse myelitis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="adem" type="checkbox" value="1">
                          Acute disseminated encephalomyelitis (ADEM)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="acute_myocardial" type="checkbox" value="1">
                          Acute Myocardial
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="ards" type="checkbox" value="1">
                           Acute respiratory distress syndrome (ARDS)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="symptoms_later_immunized" type="checkbox" value="9999">
                          other
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
              {{-- คอรั่มภายใน3.4 --}}
              <div class="col-md-3">
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
                          <input type="text" class="form-control pull-right" id="datepicker_stdiag" name="date_of_symptoms" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <div class="col-lg-8">
                          <label>เวลาที่เกิดอาการ :</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="time_of_symptoms">

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
                          <input type="text" class="form-control pull-right" id="datepicker_hdate" name="date_of_treatment" data-date-format="yyyy-mm-dd" readonly>
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
                          <input type="text" class="form-control pull-right" id="datepicker_sell" name="time_of_treatment" data-date-format="yyyy-mm-dd" readonly>
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
                        <textarea class="form-control" rows="5" name="Symptoms_details"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-8">
                        <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis" name="diagnosis" class="form-control" placeholder="">
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
                        <input type="radio" name="seriousness_of_the_symptoms" value="" >
                        ไม่ระบุ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="seriousness_of_the_symptoms" value="1" >
                        ไม่ร้ายแรง
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="seriousness_of_the_symptoms" value="2">
                        ร้ายแรง
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="other_seriousness_of_the_symptoms" style="display: none">
                <div class="form-group">
                  <div class="col-lg-12">
                    <label>ระบุ :</label>
                  </div>
                </div>
                <!-- checkbox3.1.1 -->
                <div class="form-group">
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms" value="1">
                      เสียชีวิต
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms" value="2">
                      อันตรายถึงชีวิต
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms" value="3">
                      พิการ/ไร้ความสามารถ
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms" value="4">
                      รับไว้รักษาในโรงพยาบาล
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms" value="5">
                      ความผิดปกติแต่กำเนิด
                    </label>
                  </div>
                  <div class="col-md-5">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms" value="6">
                      อื่นๆที่มีความสำคัญทางการแพทย์
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="text_other_seriousness_of_the_symptoms" style="display: none">
                      <label></label><input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms" class="form-control" placeholder="อื่นๆ">
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
                        <input type="radio" name="patient_status" value="" >
                        ไม่ระบุ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status" value="1" >
                        หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status" value="2">
                        หายโดยมีร่องรอย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status" value="3">
                        อาการดีขึ้นแต่ยังไม่หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status" value="4">
                        ไม่หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status" value="5">
                        ไม่ทราบ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status" value="6">
                        เสียชีวิต
                      </label>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-group date">
                        <div id="other_patian_sta" style="display: none">
                          <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead" hidden="true" data-date-format="yyyy-mm-dd" readonly>
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
                      <input type="radio" name="funeral" value="" >
                      ไม่ระบุ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral" value="1" >
                      ไม่มี
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral" value="2">
                      ไม่ทราบ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral" value="3">
                      มี
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="other_address_funeral" style="display: none">
                      <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text" name="other_address_funeral" class="form-control" placeholder="ระบุสถานที่ทำการ">
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">


            <div class="box-body">
              {{-- คอรั่มภายใน3.1 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="rash_2" value="0027">
                          Rash
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="erythema_2" value="0028">
                          Erythema
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="urticaria_2" value="0044">
                          Urticaria
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="itching_2" value="0026">
                          Itching
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="edema_2" value="0003A">
                          Edema
                        </label>
                      </div>
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="angioedema_2" value="0003">
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
                          <input type="checkbox" name="fainting_2" value="1">
                          Fainting
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="hyperventilation_2" value="0517">
                          Hyperventilation
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="syncope_2" value="0223">
                          Syncope
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="headche_2" value="1">
                          Headche
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="dizziness_2" value="0101">
                          Dizziness
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="fatigue_2" value="0724">
                          Fatigue
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="malaise_2" value="0728">
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
                          <input type="checkbox" name="dyspepsia_2" value="0279">
                          Dyspepsia
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="diarrhea_2" value="1">
                          Diarrhea
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="nausea_2" value="0308">
                          Nausea
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="vomiting_2" value="0228">
                          Vomiting
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="abdominal_pain_2" value="0268">
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
                          <input type="checkbox" name="arthalgia_2" value="1">
                          Arthalgia
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="myalgia_2" value="0072">
                          Myalgia
                        </label>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box -->
              </div>
              {{-- คอรั่มภายใน3.2 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <!-- checkbox3.2.1 -->
                    <div class="form-group">
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="fever38c_2" value="0725">
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
                            <input type="checkbox" name="swelling_at_the_injection_2" value="1">
                            บวมบริเวณที่ฉีดนานเกิน3วัน
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="swelling_beyond_nearest_joint_2" value="1">
                            บวมลามไปถึงข้อที่ใกล้ที่สุด
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="lymphadenopathy_2" value="0577">
                            Lymphadenopathy
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="lymphadenitis_2" value="0577D">
                            Lymphadenitis
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label>
                            <input type="checkbox" name="sterile_abscess_2" value="0051">
                            Sterile abscess
                          </label>
                        </div>
                        <div class="col-md-6">
                          <label>
                            <input type="checkbox" name="bacterial_abscess_2" value="1">
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
                          <input type="checkbox" name="febrile_convulsion_2" value="1">
                          Febrile convulsion
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input type="checkbox" name="afebrile_convulsion_2" value="1">
                          Afebrile convulsion
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input type="checkbox" name="encephalopathy_2" value="0105">
                          Encephalopathy/Encephalitis
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="flaccid_paralysis_2" value="0139">
                          Flaccid paralysis
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="spastic_paralysis_2" value="0775">
                          Spastic paralysis
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.box -->
              {{-- คอรั่มภายใน3.3 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-warning">
                  <!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body">
                    {{-- input content --}}
                    <!-- checkbox3.3.1  -->
                    <div class="form-group">
                      <div class="col-md-12">
                        <label>
                          <input name="hhe_2" type="checkbox" value="1704">
                          Hypotonic Hyporesponsive episode (HHE)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="persistent_inconsolable_crying_2" type="checkbox" value="1">
                          Persistent inconsolable crying
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="thrombocytopenia_2" type="checkbox" value="0594">
                          Thrombocytopenia
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="osteomyelitis_2" type="checkbox" value="1184">
                          Osteitis/Osteomyelitis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="toxic_shock_syndrome_2" type="checkbox" value="1">
                          Toxic shock syndrome
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="sepsis_2" type="checkbox" value="0744">
                          Sepsis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="anaphylaxis_2" type="checkbox" value="2237">
                          Anaphylaxis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="gbs_2" type="checkbox" value="1">
                          Guillain-Barré syndrome (GBS)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="transverse myelitis_2" type="checkbox" value="1">
                          Transverse myelitis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="adem_2" type="checkbox" value="1">
                          Acute disseminated encephalomyelitis (ADEM)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="acute_myocardial_2" type="checkbox" value="1">
                          Acute Myocardial
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="ards_2" type="checkbox" value="1">
                           Acute respiratory distress syndrome (ARDS)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="symptoms_later_immunized_2" type="checkbox" value="9999">
                          other
                        </label>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-12">
                          <div id="other_symptoms_later_immunized_2" style="display: none">
                            <input type="text" id="other_symptoms_later_immunized_text_2" name="other_symptoms_later_immunized_2" class="form-control" placeholder="" hidden="true">
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
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <div class="form-group">
                      <div class="col-lg-8">
                        <label>ว/ด/ป ที่เกิดอาการ :</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker_stdiag_2" name="date_of_symptoms_2" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <div class="col-lg-8">
                          <label>เวลาที่เกิดอาการ :</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="time_of_symptoms_2">

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
                          <input type="text" class="form-control pull-right" id="datepicker_hdate_2" name="date_of_treatment_2" data-date-format="yyyy-mm-dd" readonly>
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
                          <input type="text" class="form-control pull-right" id="datepicker_sell_2" name="time_of_treatment_2" data-date-format="yyyy-mm-dd" readonly>
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
                        <textarea class="form-control" rows="5" name="Symptoms_details_2"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-8">
                        <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis_2" name="diagnosis_2" class="form-control" placeholder="">
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
                        <input type="radio" name="seriousness_of_the_symptoms_2" value="" >
                        ไม่ระบุ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="seriousness_of_the_symptoms_2" value="1" >
                        ไม่ร้ายแรง
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="seriousness_of_the_symptoms_2" value="2">
                        ร้ายแรง
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="other_seriousness_of_the_symptoms_2" style="display: none">
                <div class="form-group">
                  <div class="col-lg-12">
                    <label>ระบุ :</label>
                  </div>
                </div>
                <!-- checkbox3.1.1 -->
                <div class="form-group">
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_2" value="1">
                      เสียชีวิต
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_2" value="2">
                      อันตรายถึงชีวิต
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_2" value="3">
                      พิการ/ไร้ความสามารถ
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_2" value="4">
                      รับไว้รักษาในโรงพยาบาล
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_2" value="5">
                      ความผิดปกติแต่กำเนิด
                    </label>
                  </div>
                  <div class="col-md-5">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_2" value="6">
                      อื่นๆที่มีความสำคัญทางการแพทย์
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="text_other_seriousness_of_the_symptoms_2" style="display: none">
                      <label></label><input type="text" id="text_other_seriousness_of_the_symptoms_text_2" name="text_other_seriousness_symptoms_2" class="form-control" placeholder="อื่นๆ">
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
                        <input type="radio" name="patient_status_2" value="" >
                        ไม่ระบุ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_2" value="1" >
                        หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_2" value="2">
                        หายโดยมีร่องรอย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_2" value="3">
                        อาการดีขึ้นแต่ยังไม่หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_2" value="4">
                        ไม่หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_2" value="5">
                        ไม่ทราบ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_2" value="6">
                        เสียชีวิต
                      </label>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-group date">
                        <div id="other_patian_sta_2" style="display: none">
                          <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead_2" name="date_dead_2" hidden="true" data-date-format="yyyy-mm-dd" readonly>
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
                      <input type="radio" name="funeral_2" value="" >
                      ไม่ระบุ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral_2" value="1" >
                      ไม่มี
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral_2" value="2">
                      ไม่ทราบ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral_2" value="3">
                      มี
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="other_address_funeral_2" style="display: none">
                      <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text_2" name="other_address_funeral_2" class="form-control" placeholder="ระบุสถานที่ทำการ">
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">

            <div class="box-body">
              {{-- คอรั่มภายใน3.1 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="rash_3" value="0027">
                          Rash
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="erythema_3" value="0028">
                          Erythema
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="urticaria_3" value="0044">
                          Urticaria
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="itching_3" value="0026">
                          Itching
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="edema_3" value="0003A">
                          Edema
                        </label>
                      </div>
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="angioedema_3" value="0003">
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
                          <input type="checkbox" name="fainting_3" value="1">
                          Fainting
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="hyperventilation_3" value="0517">
                          Hyperventilation
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="syncope_3" value="0223">
                          Syncope
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="headche_3" value="1">
                          Headche
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="dizziness_3" value="0101">
                          Dizziness
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="fatigue_3" value="0724">
                          Fatigue
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="malaise_3" value="0728">
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
                          <input type="checkbox" name="dyspepsia_3" value="0279">
                          Dyspepsia
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="diarrhea_3" value="1">
                          Diarrhea
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="nausea_3" value="0308">
                          Nausea
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="vomiting_3" value="0228">
                          Vomiting
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="abdominal_pain_3" value="0268">
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
                          <input type="checkbox" name="arthalgia_3" value="1">
                          Arthalgia
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="myalgia_3" value="0072">
                          Myalgia
                        </label>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box -->
              </div>
              {{-- คอรั่มภายใน3.2 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <!-- checkbox3.2.1 -->
                    <div class="form-group">
                      <div class="col-md-5">
                        <label>
                          <input type="checkbox" name="fever38c_3" value="0725">
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
                            <input type="checkbox" name="swelling_at_the_injection_3" value="1">
                            บวมบริเวณที่ฉีดนานเกิน3วัน
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="swelling_beyond_nearest_joint_3" value="1">
                            บวมลามไปถึงข้อที่ใกล้ที่สุด
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="lymphadenopathy_3" value="0577">
                            Lymphadenopathy
                          </label>
                        </div>
                        <div class="col-md-12">
                          <label>
                            <input type="checkbox" name="lymphadenitis_3" value="0577D">
                            Lymphadenitis
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label>
                            <input type="checkbox" name="sterile_abscess_3" value="0051">
                            Sterile abscess
                          </label>
                        </div>
                        <div class="col-md-6">
                          <label>
                            <input type="checkbox" name="bacterial_abscess_3" value="1">
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
                          <input type="checkbox" name="febrile_convulsion_3" value="1">
                          Febrile convulsion
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input type="checkbox" name="afebrile_convulsion_3" value="1">
                          Afebrile convulsion
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input type="checkbox" name="encephalopathy_3" value="0105">
                          Encephalopathy/Encephalitis
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="flaccid_paralysis_3" value="0139">
                          Flaccid paralysis
                        </label>
                      </div>
                      <div class="col-md-6">
                        <label>
                          <input type="checkbox" name="spastic_paralysis_3" value="0775">
                          Spastic paralysis
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.box -->
              {{-- คอรั่มภายใน3.3 --}}
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-danger">
                  <!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body">
                    {{-- input content --}}
                    <!-- checkbox3.3.1  -->
                    <div class="form-group">
                      <div class="col-md-12">
                        <label>
                          <input name="hhe_3" type="checkbox" value="1704">
                          Hypotonic Hyporesponsive episode (HHE)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="persistent_inconsolable_crying_3" type="checkbox" value="1">
                          Persistent inconsolable crying
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="thrombocytopenia_3" type="checkbox" value="0594">
                          Thrombocytopenia
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="osteomyelitis_3" type="checkbox" value="1184">
                          Osteitis/Osteomyelitis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="toxic_shock_syndrome_3" type="checkbox" value="1">
                          Toxic shock syndrome
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="sepsis_3" type="checkbox" value="0744">
                          Sepsis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="anaphylaxis_3" type="checkbox" value="2237">
                          Anaphylaxis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="gbs_3" type="checkbox" value="1">
                          Guillain-Barré syndrome (GBS)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="transverse_myelitis_3" type="checkbox" value="1">
                          Transverse myelitis
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="adem_3" type="checkbox" value="1">
                          Acute disseminated encephalomyelitis (ADEM)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="acute_myocardial_3" type="checkbox" value="1">
                          Acute Myocardial
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="ards_3" type="checkbox" value="1">
                           Acute respiratory distress syndrome (ARDS)
                        </label>
                      </div>
                      <div class="col-md-12">
                        <label>
                          <input name="symptoms_later_immunized_3" type="checkbox" value="9999">
                          other
                        </label>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-12">
                          <div id="other_symptoms_later_immunized_3" style="display: none">
                            <input type="text" id="other_symptoms_later_immunized_text_3" name="other_symptoms_later_immunized_3" class="form-control" placeholder="" hidden="true">
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
              <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <div class="form-group">
                      <div class="col-lg-8">
                        <label>ว/ด/ป ที่เกิดอาการ :</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker_stdiag_3" name="date_of_symptoms_3" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <div class="col-lg-8">
                          <label>เวลาที่เกิดอาการ :</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="time_of_symptoms_3">

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
                          <input type="text" class="form-control pull-right" id="datepicker_hdate_3" name="date_of_treatment_3" data-date-format="yyyy-mm-dd" readonly>
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
                          <input type="text" class="form-control pull-right" id="datepicker_sell_3" name="time_of_treatment_3" data-date-format="yyyy-mm-dd" readonly>
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
                        <textarea class="form-control" rows="5" name="Symptoms_details_3"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-8">
                        <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis" name="diagnosis_3" class="form-control" placeholder="">
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
                        <input type="radio" name="seriousness_of_the_symptoms_3" value="" >
                        ไม่ระบุ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="seriousness_of_the_symptoms_3" value="1" >
                        ไม่ร้ายแรง
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="seriousness_of_the_symptoms_3" value="2">
                        ร้ายแรง
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="other_seriousness_of_the_symptoms_3" style="display: none">
                <div class="form-group">
                  <div class="col-lg-12">
                    <label>ระบุ :</label>
                  </div>
                </div>
                <!-- checkbox3.1.1 -->
                <div class="form-group">
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_3" value="1">
                      เสียชีวิต
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_3" value="2">
                      อันตรายถึงชีวิต
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_3" value="3">
                      พิการ/ไร้ความสามารถ
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_3" value="4">
                      รับไว้รักษาในโรงพยาบาล
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_3" value="5">
                      ความผิดปกติแต่กำเนิด
                    </label>
                  </div>
                  <div class="col-md-5">
                    <label>
                      <input type="checkbox" name="other_seriousness_of_the_symptoms_3" value="6">
                      อื่นๆที่มีความสำคัญทางการแพทย์
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="text_other_seriousness_of_the_symptoms_3" style="display: none">
                      <label></label><input type="text" id="text_other_seriousness_of_the_symptoms_text_3" name="text_other_seriousness_symptoms_3" class="form-control" placeholder="อื่นๆ">
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
                        <input type="radio" name="patient_status_3" value="" >
                        ไม่ระบุ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_3" value="1" >
                        หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_3" value="2">
                        หายโดยมีร่องรอย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_3" value="3">
                        อาการดีขึ้นแต่ยังไม่หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_3" value="4">
                        ไม่หาย
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_3" value="5">
                        ไม่ทราบ
                      </label>
                    </div>
                    <div class="col-md-2">
                      <label>
                        <input type="radio" name="patient_status_3" value="6">
                        เสียชีวิต
                      </label>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-group date">
                        <div id="other_patian_sta_3" style="display: none">
                          <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead_3" name="date_dead_3" hidden="true" data-date-format="yyyy-mm-dd" readonly>
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
                      <input type="radio" name="funeral_3" value="" >
                      ไม่ระบุ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral_3" value="1" >
                      ไม่มี
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral_3" value="2">
                      ไม่ทราบ
                    </label>
                  </div>
                  <div class="col-md-2">
                    <label>
                      <input type="radio" name="funeral_3" value="3">
                      มี
                    </label>
                  </div>
                  <div class="col-lg-3">
                    <div id="other_address_funeral_3" style="display: none">
                      <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text_3" name="other_address_funeral_3" class="form-control" placeholder="ระบุสถานที่ทำการ">
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
    <!-- /.box -->
  </div>
</div>
</div>

<!--หัวข้อที่2 -->
{{-- {{$vac_list}} --}}

<!--หัวข้อที่3 -->
{{-- <div class="col-md-12"> --}}
  <!-- general form elements -->
  {{-- <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">(3) อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคและวินิจฉัย</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->

    {{-- <div class="box-body"> --}}
      {{-- คอรั่มภายใน3.1 --}}
      {{-- <div class="col-md-3"> --}}
        <!-- general form elements -->
        {{-- <div class="box box-success">
          <div class="box-header with-border"> --}}
            <!-- checkbox3.1.1 -->
            {{-- <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="rash" value="0027">
                  Rash
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="erythema" value="0028">
                  Erythema
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="urticaria" value="0044">
                  Urticaria
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="itching" value="0026">
                  Itching
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="edema" value="0003A">
                  Edema
                </label>
              </div>
              <div class="col-md-5">
                <label>
                  <input type="checkbox" name="angioedema" value="0003">
                  Angioedema
                </label>
              </div>
            </div>
          </div> --}}
          <!-- /.box-header -->
          <!-- form start -->

          {{-- <div class="box-body"> --}}
            {{-- input content --}}
            <!-- checkbox3.1.2  -->
            {{-- <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="fainting" value="1">
                  Fainting
                </label>
              </div>
              <div class="col-md-6">
                <label>
                  <input type="checkbox" name="hyperventilation" value="0517">
                  Hyperventilation
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="syncope" value="0223">
                  Syncope
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="headche" value="1">
                  Headche
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="dizziness" value="0101">
                  Dizziness
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="fatigue" value="0724">
                  Fatigue
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="malaise" value="0728">
                  Malaise
                </label>
              </div>
            </div>
          </div> --}}
          <!-- /.box-body -->
          {{-- <div class="box-footer"> --}}
            <!-- checkbox3.1.3  -->
            {{-- <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="dyspepsia" value="0279">
                  Dyspepsia
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="diarrhea" value="1">
                  Diarrhea
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="nausea" value="0308">
                  Nausea
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="vomiting" value="0228">
                  Vomiting
                </label>
              </div>
              <div class="col-md-6">
                <label>
                  <input type="checkbox" name="abdominal_pain" value="0268">
                  Abdominal pain
                </label>
              </div>
            </div>
          </div> --}}
          <!-- /.box-body -->
          {{-- <div class="box-footer"> --}}
            <!-- checkbox3.1.4  -->
            {{-- <div class="form-group">
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="arthalgia" value="1">
                  Arthalgia
                </label>
              </div>
              <div class="col-md-4">
                <label>
                  <input type="checkbox" name="myalgia" value="0072">
                  Myalgia
                </label>
              </div>
            </div>
          </div>

        </div> --}}
        <!-- /.box -->
      {{-- </div> --}}
      {{-- คอรั่มภายใน3.2 --}}
      {{-- <div class="col-md-3"> --}}
        <!-- general form elements -->
        {{-- <div class="box box-success"> --}}
          {{-- <div class="box-header with-border"> --}}
            <!-- checkbox3.2.1 -->
            {{-- <div class="form-group">
              <div class="col-md-5">
                <label>
                  <input type="checkbox" name="fever38c" value="0725">
                  Fever >= 38 C
                </label>
              </div>
            </div>
          </div> --}}
          <!-- /.box-header -->
          <!-- form start -->

          {{-- <div class="box-body"> --}}
            {{-- input content --}}
            {{-- <div class="box-body"> --}}
              {{-- input content --}}
              <!-- checkbox3.2.2  -->
              {{-- <div class="form-group">
                <div class="col-md-12">
                  <label>
                    <input type="checkbox" name="swelling_at_the_injection" value="1">
                    บวมบริเวณที่ฉีดนานเกิน3วัน
                  </label>
                </div>
                <div class="col-md-12">
                  <label>
                    <input type="checkbox" name="swelling_beyond_nearest_joint" value="1">
                    บวมลามไปถึงข้อที่ใกล้ที่สุด
                  </label>
                </div>
                <div class="col-md-12">
                  <label>
                    <input type="checkbox" name="lymphadenopathy" value="0577">
                    Lymphadenopathy
                  </label>
                </div>
                <div class="col-md-12">
                  <label>
                    <input type="checkbox" name="lymphadenitis" value="0577D">
                    Lymphadenitis
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label>
                    <input type="checkbox" name="sterile_abscess" value="0051">
                    Sterile abscess
                  </label>
                </div>
                <div class="col-md-6">
                  <label>
                    <input type="checkbox" name="bacterial_abscess" value="1">
                    Bacterial abscess
                  </label>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- /.box-body -->
          {{-- <div class="box-footer"> --}}
            <!-- checkbox3.2.3  -->
            {{-- <div class="form-group">
              <div class="col-md-12">
                <label>
                  <input type="checkbox" name="febrile_convulsion" value="1">
                  Febrile convulsion
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input type="checkbox" name="afebrile_convulsion" value="1">
                  Afebrile convulsion
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input type="checkbox" name="encephalopathy" value="0105">
                  Encephalopathy/Encephalitis
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <label>
                  <input type="checkbox" name="flaccid_paralysis" value="0139">
                  Flaccid paralysis
                </label>
              </div>
              <div class="col-md-6">
                <label>
                  <input type="checkbox" name="spastic_paralysis" value="0775">
                  Spastic paralysis
                </label>
              </div>
            </div>
          </div>
        </div>

      </div> --}}
      <!-- /.box -->
      {{-- คอรั่มภายใน3.3 --}}
      {{-- <div class="col-md-3"> --}}
        <!-- general form elements -->
        {{-- <div class="box box-success"> --}}
          <!-- /.box-header -->
          <!-- form start -->

          {{-- <div class="box-body"> --}}
            {{-- input content --}}
            <!-- checkbox3.3.1  -->
            {{-- <div class="form-group">
              <div class="col-md-12">
                <label>
                  <input name="hhe" type="checkbox" value="1704">
                  Hypotonic Hyporesponsive episode (HHE)
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="persistent_inconsolable_crying" type="checkbox" value="1">
                  Persistent inconsolable crying
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="thrombocytopenia" type="checkbox" value="0594">
                  Thrombocytopenia
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="osteomyelitis" type="checkbox" value="1184">
                  Osteitis/Osteomyelitis
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="toxic_shock_syndrome" type="checkbox" value="1">
                  Toxic shock syndrome
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="sepsis" type="checkbox" value="0744">
                  Sepsis
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="anaphylaxis" type="checkbox" value="2237">
                  Anaphylaxis
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="gbs" type="checkbox" value="1">
                  Guillain-Barré syndrome (GBS)
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="transverse myelitis" type="checkbox" value="1">
                  Transverse myelitis
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="adem" type="checkbox" value="1">
                  Acute disseminated encephalomyelitis (ADEM)
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="acute_myocardial" type="checkbox" value="1">
                  Acute Myocardial
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="ards" type="checkbox" value="1">
                   Acute respiratory distress syndrome (ARDS)
                </label>
              </div>
              <div class="col-md-12">
                <label>
                  <input name="symptoms_later_immunized" type="checkbox" value="9999">
                  other
                </label>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <div id="other_symptoms_later_immunized" style="display: none">
                    <input type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" class="form-control" placeholder="" hidden="true">
                  </div> --}}
                  {{-- <div id="other_symptoms_later_immunized_t" style="display: none">
                    <input type="text" class="form-control pull-right" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" placeholder="ระบุอาการอื่นๆ">
                  </div> --}}
                {{-- </div>
              </div>
            </div>
          </div> --}}
        {{-- </div> --}}
        <!-- /.box -->
      {{-- </div> --}}
      {{-- คอรั่มภายใน3.4 --}}
      {{-- <div class="col-md-3"> --}}
        <!-- general form elements -->
        {{-- <div class="box box-success">
          <div class="box-header with-border">
            <div class="form-group">
              <div class="col-lg-8">
                <label>ว/ด/ป ที่เกิดอาการ :</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker_stdiag" name="date_of_symptoms" data-date-format="yyyy-mm-dd" readonly>
                </div>
              </div>
            </div>
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <div class="col-lg-8">
                  <label>เวลาที่เกิดอาการ :</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="time_of_symptoms">

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
                  <input type="text" class="form-control pull-right" id="datepicker_hdate" name="date_of_treatment" data-date-format="yyyy-mm-dd" readonly>
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
                  <input type="text" class="form-control pull-right" id="datepicker_sell" name="time_of_treatment" data-date-format="yyyy-mm-dd" readonly>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- /.box-header -->
          <!-- form start -->

          {{-- <div class="box-body"> --}}
            {{-- input content --}}
            <!-- textarea -->
            {{-- <div class="form-group">
              <div class="col-lg-12">
                <label>รายละเอียดอาการและการตรวจสอบ</label>
                <textarea class="form-control" rows="5" name="Symptoms_details"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-8">
                <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis" name="diagnosis" class="form-control" placeholder="">
              </div>
            </div>
          </div>


        </div> --}}
        <!-- /.box -->
      {{-- </div>
    </div> --}}
    <!-- /.box-body -->
    {{-- <div class="box-footer">
      <div class="form-group">
        <div class="col-lg-12">
          <label>
            <font style="color:red;">*</font> ความร้ายแรงของอาการ
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-12"> --}}
          <!-- checkbox3.5.1  -->
          {{-- <div class="form-group">
            <div class="col-md-2">
              <label>
                <input type="radio" name="seriousness_of_the_symptoms" value="" >
                ไม่ระบุ
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="seriousness_of_the_symptoms" value="1" >
                ไม่ร้ายแรง
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="seriousness_of_the_symptoms" value="2">
                ร้ายแรง
              </label>
            </div>
          </div>
        </div>
      </div>
      <div id="other_seriousness_of_the_symptoms" style="display: none">
        <div class="form-group">
          <div class="col-lg-12">
            <label>ระบุ :</label>
          </div>
        </div> --}}
        <!-- checkbox3.1.1 -->
        {{-- <div class="form-group">
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="other_seriousness_of_the_symptoms" value="1">
              เสียชีวิต
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="other_seriousness_of_the_symptoms" value="2">
              อันตรายถึงชีวิต
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="other_seriousness_of_the_symptoms" value="3">
              พิการ/ไร้ความสามารถ
            </label>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="other_seriousness_of_the_symptoms" value="4">
              รับไว้รักษาในโรงพยาบาล
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="other_seriousness_of_the_symptoms" value="5">
              ความผิดปกติแต่กำเนิด
            </label>
          </div>
          <div class="col-md-5">
            <label>
              <input type="checkbox" name="other_seriousness_of_the_symptoms" value="6">
              อื่นๆที่มีความสำคัญทางการแพทย์
            </label>
          </div>
          <div class="col-lg-3">
            <div id="text_other_seriousness_of_the_symptoms" style="display: none">
              <label></label><input type="text" id="text_other_seriousness_of_the_symptoms_text" name="text_other_seriousness_symptoms" class="form-control" placeholder="อื่นๆ">
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- /.box-body -->
    {{-- <div class="box-footer">
      <div class="form-group">
        <div class="col-lg-12">
          <label>
            <font style="color:red;">*</font> สภาพผู้ป่วย
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-12"> --}}
          <!-- checkbox3.5.1  -->
          {{-- <div class="form-group">
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="" >
                ไม่ระบุ
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="1" >
                หาย
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="2">
                หายโดยมีร่องรอย
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="3">
                อาการดีขึ้นแต่ยังไม่หาย
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="4">
                ไม่หาย
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="5">
                ไม่ทราบ
              </label>
            </div>
            <div class="col-md-2">
              <label>
                <input type="radio" name="patient_status" value="6">
                เสียชีวิต
              </label>
            </div>
            <div class="col-lg-4">
              <div class="input-group date">
                <div id="other_patian_sta" style="display: none">
                  <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead" hidden="true" data-date-format="yyyy-mm-dd" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- checkbox3.1.1 -->
      {{-- <div class="form-group">
        <div class="col-lg-12">
          <label>ผ่าพิสูจน์ศพ :</label>
        </div>
      </div> --}}
      <!-- checkbox3.1.1 -->
      {{-- <div class="form-group">
        <div class="col-lg-12">
          <div class="col-md-2">
            <label>
              <input type="radio" name="funeral" value="" >
              ไม่ระบุ
            </label>
          </div>
          <div class="col-md-2">
            <label>
              <input type="radio" name="funeral" value="1" >
              ไม่มี
            </label>
          </div>
          <div class="col-md-2">
            <label>
              <input type="radio" name="funeral" value="2">
              ไม่ทราบ
            </label>
          </div>
          <div class="col-md-2">
            <label>
              <input type="radio" name="funeral" value="3">
              มี
            </label>
          </div>
          <div class="col-lg-3">
            <div id="other_address_funeral" style="display: none">
              <label>สถานที่ทำการ :</label><input type="text" id="other_address_funeral_text" name="other_address_funeral" class="form-control" placeholder="ระบุสถานที่ทำการ">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> --}}
<!-- /.box -->
