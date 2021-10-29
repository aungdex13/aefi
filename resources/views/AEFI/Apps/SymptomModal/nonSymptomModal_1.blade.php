<!-- Modal_1 -->
<div class="modal fade" id="nonSymptom1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>
        </div>
        <div class="modal-body">
            <div class="tab-pane active" id="tab_1">
                <div class="box-body">

                  {{-- คอรั่มภายใน3.4 --}}
                  <div class="col-md-12">
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
                              <input type="text" class="form-control pull-right" id="date_of_symptoms2" name="date_of_symptoms2[]" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="col-lg-8">
                              <label>เวลาที่เกิดอาการ :</label>
                              <div class="input-group">
                                <input  id="time_of_symptoms1" type="text" class="form-control" name="time_of_symptoms2[]">
    
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
                              <input type="text" class="form-control pull-right" id="date_of_treatment2" name="date_of_treatment2[]" data-date-format="yyyy-mm-dd" readonly>
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
                              <input type="text" class="form-control pull-right" id="time_of_treatment2" name="time_of_treatment2[]" data-date-format="yyyy-mm-dd" readonly>
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
                          <div class="col-lg-8">
                            <label>รายละเอียดอาการและการตรวจสอบ</label>
                            <input class="form-control" rows="5"  id="Symptoms_details2" name="Symptoms_details2[]">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-8">
                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis2" name="diagnosis2[]" class="form-control" placeholder="">
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
                    <div class="col-lg-12"  id="seriousness_of_the_symptoms_2">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="c_seriousness_of_the_symptoms2[]"  id="c_seriousness_of_the_symptoms2" value="1" >
                            ไม่ร้ายแรง
                          </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" name="c_seriousness_of_the_symptoms2[]" id="c_seriousness_of_the_symptoms2" value="2">
                            ร้ายแรง
                          </label>
                        </div>
                        <input type="text" id="seriousness_of_the_symptoms2" name="seriousness_of_the_symptoms2[]">
                      </div>
                    </div>
                  </div>
                  <div id="other_seriousness_of_the_symptoms_bk2">
                    <div id="other_seriousness_of_the_symptoms_2">
                    <div class="form-group">
                      <div class="col-lg-12">
                        <label>ระบุ :</label>
                      </div>
                    </div>
                    <!-- checkbox3.1.1 -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="1">
                          เสียชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="2">
                          อันตรายถึงชีวิต
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="3">
                          พิการ/ไร้ความสามารถ
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="4">
                          รับไว้รักษาในโรงพยาบาล
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="5">
                          ความผิดปกติแต่กำเนิด
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label>
                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="6">
                          อื่นๆที่มีความสำคัญทางการแพทย์
                        </label>
                      </div>
                      <div class="col-lg-4">
                        <div id="text_other_seriousness_of_the_symptoms2" style="display: none">
                          <label></label>
                          <input type="text" id="text_other_seriousness_of_the_symptoms_text2" name="text_other_seriousness_symptoms2[]" class="form-control" placeholder="อื่นๆ">
                        </div>
                      </div>
                    </div>
                    <input type="text" id="other_seriousness_of_the_symptoms2" name="other_seriousness_of_the_symptoms2[]" >
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
                    <div class="col-lg-12" id="patient_status_2">
                      <!-- checkbox3.5.1  -->
                      <div class="form-group">
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status2" name="c_patient_status2[]" value="1" >
                            หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status2" name="c_patient_status2[]" value="2">
                            หายโดยมีร่องรอย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status2" name="c_patient_status2[]" value="3">
                            อาการดีขึ้นแต่ยังไม่หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status2" name="c_patient_status2[]" value="4">
                            ไม่หาย
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status2" name="c_patient_status2[]" value="5">
                            ไม่ทราบ
                          </label>
                        </div>
                        <div class="col-md-4">
                          <label>
                            <input type="radio" id="c_patient_status2" name="c_patient_status2[]" value="6">
                            เสียชีวิต
                          </label>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-group date">
                            <div id="other_patian_sta2" style="display: none">
                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead2" name="date_dead2[]" hidden="true" data-date-format="yyyy-mm-dd" readonly>
                            </div>
                          </div>
                        </div>
                        <input type="text" id="patient_status2" name="patient_status2[]">
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
                    <div class="col-lg-12"  id="funeral_2">
                      <div class="col-md-2" hidden>
                        <label>
                          <input type="radio" id="c_funeral2" name="c_funeral2[]" value="" >
                          ไม่ระบุ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral2" name="c_funeral2[]" value="1" >
                          ไม่มี
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral2" name="c_funeral2[]" value="2">
                          ไม่ทราบ
                        </label>
                      </div>
                      <div class="col-md-2">
                        <label>
                          <input type="radio" id="c_funeral2" name="c_funeral2[]" value="3">
                          มี
                        </label>
                      </div>
                      <div class="col-lg-3">
                        <div id="other_address_funeral2" style="display: none">
                          <label>สถานที่ทำการ :</label>
                          <input type="text" id="other_address_funeral_text2" name="other_address_funeral2[]" class="form-control" placeholder="ระบุสถานที่ทำการ">
                        </div>
                      </div>
                      <input type="text" id="funeral2" name="funeral2[]" >
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
  '<!-- Modal_1 -->'+
'<div class="modal fade" id="nonSymptom' + rowCount + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
  '    <div class="modal-dialog modal-lg">'+
  '      <div class="modal-content">'+
  '        <div class="modal-header">'+
  '          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>'+
  '          <h4 class="modal-title" id="myModalLabel">อาการภายหลังได้รับวัคซีน</h4>'+
  '        </div>'+
  '        <div class="modal-body">'+
  '            <div class="tab-pane active" id="tab_1">'+
  '                <div class="box-body">'+
  ''+
  '                  {{-- คอรั่มภายใน3.4 --}}'+
  '                  <div class="col-md-12">'+
  '                    <!-- general form elements -->'+
  '                    <div class="box box-success">'+
  '                      <div class="box-header with-border">'+
  '                        <div class="form-group">'+
  '                          <div class="col-lg-8">'+
  '                            <label>ว/ด/ป ที่เกิดอาการ :</label>'+
  '                            <div class="input-group date">'+
  '                              <div class="input-group-addon">'+
  '                                <i class="fa fa-calendar"></i>'+
  '                              </div>'+
  '                              <input type="text" class="form-control pull-right" id="date_of_symptoms2' + rowCount + '" name="date_of_symptoms2[]" data-date-format="yyyy-mm-dd" readonly>'+
  '                            </div>'+
  '                          </div>'+
  '                        </div>'+
  '                        <div class="bootstrap-timepicker">'+
  '                          <div class="form-group">'+
  '                            <div class="col-lg-8">'+
  '                              <label>เวลาที่เกิดอาการ :</label>'+
  '                              <div class="input-group">'+
  '                                <input  id="time_of_symptoms2' + rowCount + '" type="text" class="form-control" name="time_of_symptoms2[]">'+
  '    '+
  '                                <div class="input-group-addon">'+
  '                                  <i class="fa fa-clock-o"></i>'+
  '                                </div>'+
  '                              </div>'+
  '                            </div>'+
  '                          </div>'+
  '                        </div>'+
  '                        <div class="form-group">'+
  '                          <div class="col-lg-8">'+
  '                            <label>ว/ด/ป ที่รับรักษา :</label>'+
  '                            <div class="input-group date">'+
  '                              <div class="input-group-addon">'+
  '                                <i class="fa fa-calendar"></i>'+
  '                              </div>'+
  '                              <input type="text" class="form-control pull-right" id="date_of_treatment2' + rowCount + '" name="date_of_treatment2[]" data-date-format="yyyy-mm-dd" readonly>'+
  '                            </div>'+
  '                          </div>'+
  '                        </div>'+
  '                        <div class="form-group">'+
  '                          <div class="col-lg-8">'+
  '                            <label>ว/ด/ป ที่จำหน่าย :</label>'+
  '                            <div class="input-group date">'+
  '                              <div class="input-group-addon">'+
  '                                <i class="fa fa-calendar"></i>'+
  '                              </div>'+
  '                              <input type="text" class="form-control pull-right" id="time_of_treatment2' + rowCount + '" name="time_of_treatment2[]" data-date-format="yyyy-mm-dd" readonly>'+
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
  '                            <input class="form-control" rows="5"  id="Symptoms_details2" name="Symptoms_details2[]">'+
  '                          </div>'+
  '                        </div>'+
  '                        <div class="form-group">'+
  '                          <div class="col-lg-8">'+
  '                            <label>วินิจฉัยของแพทย์ :</label><input type="text" id="diagnosis2" name="diagnosis2[]" class="form-control" placeholder="">'+
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
  '                    <div class="col-lg-12"  id="seriousness_of_the_symptoms_2' + rowCount + '">'+
  '                      <!-- checkbox3.5.1  -->'+
  '                      <div class="form-group">'+
  '                        <div class="col-md-2">'+
  '                          <label>'+
  '                            <input type="radio" name="c_seriousness_of_the_symptoms2[]"  id="c_seriousness_of_the_symptoms2" value="1" >'+
  '                            ไม่ร้ายแรง'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-md-2">'+
  '                          <label>'+
  '                            <input type="radio" name="c_seriousness_of_the_symptoms2[]" id="c_seriousness_of_the_symptoms2" value="2">'+
  '                            ร้ายแรง'+
  '                          </label>'+
  '                        </div>'+
  '                        <input type="text" id="seriousness_of_the_symptoms2' + rowCount + '" name="seriousness_of_the_symptoms2[]">'+
  '                      </div>'+
  '                    </div>'+
  '                  </div>'+
  '                  <div id="other_seriousness_of_the_symptoms_bk2">'+
  '                    <div id="other_seriousness_of_the_symptoms_2' + rowCount + '">'+
  '                    <div class="form-group">'+
  '                      <div class="col-lg-12">'+
  '                        <label>ระบุ :</label>'+
  '                      </div>'+
  '                    </div>'+
  '                    <!-- checkbox3.1.1 -->'+
  '                    <div class="form-group">'+
  '                      <div class="col-md-4">'+
  '                        <label>'+
  '                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="1">'+
  '                          เสียชีวิต'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-4">'+
  '                        <label>'+
  '                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="2">'+
  '                          อันตรายถึงชีวิต'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-4">'+
  '                        <label>'+
  '                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="3">'+
  '                          พิการ/ไร้ความสามารถ'+
  '                        </label>'+
  '                      </div>'+
  '                    </div>'+
  '                    <div class="form-group">'+
  '                      <div class="col-md-4">'+
  '                        <label>'+
  '                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="4">'+
  '                          รับไว้รักษาในโรงพยาบาล'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-4">'+
  '                        <label>'+
  '                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="5">'+
  '                          ความผิดปกติแต่กำเนิด'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-4">'+
  '                        <label>'+
  '                          <input type="checkbox" name="c_other_seriousness_of_the_symptoms2[]" id="c_other_seriousness_of_the_symptoms2" value="6">'+
  '                          อื่นๆที่มีความสำคัญทางการแพทย์'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-lg-4">'+
  '                        <div id="text_other_seriousness_of_the_symptoms2" style="display: none">'+
  '                          <label></label>'+
  '                          <input type="text" id="text_other_seriousness_of_the_symptoms_text2" name="text_other_seriousness_symptoms2[]" class="form-control" placeholder="อื่นๆ">'+
  '                        </div>'+
  '                      </div>'+
  '                    </div>'+
  '                    <input type="text" id="other_seriousness_of_the_symptoms2' + rowCount + '" name="other_seriousness_of_the_symptoms2[]" >'+
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
  '                    <div class="col-lg-12" id="patient_status_2' + rowCount + '">'+
  '                      <!-- checkbox3.5.1  -->'+
  '                      <div class="form-group">'+
  '                        <div class="col-md-4">'+
  '                          <label>'+
  '                            <input type="radio" id="c_patient_status2' + rowCount + '" name="c_patient_status2[]" value="1" >'+
  '                            หาย'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-md-4">'+
  '                          <label>'+
  '                            <input type="radio" id="c_patient_status2' + rowCount + '" name="c_patient_status2[]" value="2">'+
  '                            หายโดยมีร่องรอย'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-md-4">'+
  '                          <label>'+
  '                            <input type="radio" id="c_patient_status2' + rowCount + '" name="c_patient_status2[]" value="3">'+
  '                            อาการดีขึ้นแต่ยังไม่หาย'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-md-4">'+
  '                          <label>'+
  '                            <input type="radio" id="c_patient_status2' + rowCount + '" name="c_patient_status2[]" value="4">'+
  '                            ไม่หาย'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-md-4">'+
  '                          <label>'+
  '                            <input type="radio" id="c_patient_status2' + rowCount + '" name="c_patient_status2[]" value="5">'+
  '                            ไม่ทราบ'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-md-4">'+
  '                          <label>'+
  '                            <input type="radio" id="c_patient_status2' + rowCount + '" name="c_patient_status2[]" value="6">'+
  '                            เสียชีวิต'+
  '                          </label>'+
  '                        </div>'+
  '                        <div class="col-lg-4">'+
  '                          <div class="input-group date">'+
  '                            <div id="other_patian_sta2' + rowCount + '" style="display: none">'+
  '                              <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead2' + rowCount + '" name="date_dead2[]" hidden="true" data-date-format="yyyy-mm-dd" readonly>'+
  '                            </div>'+
  '                          </div>'+
  '                        </div>'+
  '                        <input type="text" id="patient_status2' + rowCount + '" name="patient_status2[]" >'+
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
  '                    <div class="col-lg-12"  id="funeral_2' + rowCount + '">'+
  '                      <div class="col-md-2" hidden>'+
  '                        <label>'+
  '                          <input type="radio" id="c_funeral2' + rowCount + '" name="c_funeral2[]" value="" >'+
  '                          ไม่ระบุ'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-2">'+
  '                        <label>'+
  '                          <input type="radio" id="c_funeral2' + rowCount + '" name="c_funeral2[]" value="1" >'+
  '                          ไม่มี'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-2">'+
  '                        <label>'+
  '                          <input type="radio" id="c_funeral2' + rowCount + '" name="c_funeral2[]" value="2">'+
  '                          ไม่ทราบ'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-md-2">'+
  '                        <label>'+
  '                          <input type="radio" id="c_funeral2' + rowCount + '" name="c_funeral2[]" value="3">'+
  '                          มี'+
  '                        </label>'+
  '                      </div>'+
  '                      <div class="col-lg-3">'+
  '                        <div id="other_address_funeral2' + rowCount + '" style="display: none">'+
  '                          <label>สถานที่ทำการ :</label>'+
  '                          <input type="text" id="other_address_funeral_text2' + rowCount + '" name="other_address_funeral2[]" class="form-control" placeholder="ระบุสถานที่ทำการ">'+
  '                        </div>'+
  '                      </div>'+
  '                      <input type="text" id="funeral2' + rowCount + '" name="funeral2[]">'+
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