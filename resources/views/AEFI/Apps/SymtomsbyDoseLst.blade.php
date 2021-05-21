@extends('AEFI.layout.tabletemplate')
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
  $arr_title_name = load_title_name();
  $arr_gender = load_gender();
  $arr_type_of_patient = load_type_of_patient();
  $arr_patient_status = load_patient_status();
  $arr_seriousness_of_the_symptoms = load_seriousness_of_the_symptoms();
  $arr_r_o = load_r_o();
  $arr_load_final_diag = load_final_diag();
  $arr_causality = load_causality();
  	// dd($data);
  	 ?>
  <h1>
    อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคตามครั้งที่ฉีดวัคซีน
    <small>AEFI</small>
  </h1>
  <ol class="breadcrumb">

  </ol>

</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!--หัวข้อที่2 -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="{{ route('SymtomsbyDoseFrm') }}?id={{ $id_case }}&id_case={{ $id_case }}" type="button" class="btn btn-success btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มรายงานอาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคตามครั้งที่ฉีดวัคซีน</a></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
          <label>ชื่อ- นามสกุลผู้ป่วย : {{	isset($selectaeficase[0]->first_name) ? $selectaeficase[0]->first_name :"ไม่ระบุ"}} {{	$selectaeficase[0]->sur_name}} </label>
        </br>
          <label>เพศ : {{	isset($arr_gender[$selectaeficase[0]->gender]) ? $arr_gender[$selectaeficase[0]->gender]  :"ไม่ระบุ"}}</label>
        </br>
          <label>อาชีพ : {{	isset($selectaeficase[0]->career) ? $selectaeficase[0]->career  :"ไม่ระบุ"}}</label>
        </br>
        </br>
          <label>อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคตามครั้งที่ฉีดวัคซีน</label>
          <table class="table table-bordered" id="case_lst" class="display" style="width:100%">
            <thead>
              <tr>
                <th>วันที่รายงานอาการ</th>
                <th>เข็มที่/ครั้งที่</th>
                <th>อาการ</th>
                <th>หน่วยงานที่บันทึกข้อมูล</th>
                <th>***</th>
              </tr>
            </thead>
            <?php foreach($selectaeficase as $value) : ?>
            <tr class="data-contact-person">
              <td>
                <p style="text-align:center;">{{ $value->date_entry }}</p>
              </td>
              <td>
                <p style="text-align:center;">1</p>
              </td>
              <td>
                <p style="text-align:center;">
                  @if ($value->rash != 0 || $value->rash != null)
                    Rash /
                  @endif
                  @if ($value->erythema != 0 || $value->erythema != null)
                    erythema /
                  @endif
                  @if ($value->urticaria != 0 || $value->urticaria != null)
                    urticaria /
                  @endif
                  @if ($value->itching != 0 || $value->itching != null)
                    itching /
                  @endif
                  @if ($value->edema != 0 || $value->edema != null)
                    edema /
                  @endif
                  @if ($value->angioedema != 0 || $value->angioedema != null)
                    angioedema /
                  @endif
                  @if ($value->fainting != 0 || $value->fainting != null)
                    fainting /
                  @endif
                  @if ($value->hyperventilation != 0 || $value->hyperventilation != null)
                    hyperventilation /
                  @endif
                  @if ($value->syncope != 0 || $value->syncope != null)
                    syncope /
                  @endif
                  @if ($value->headche != 0 || $value->headche != null)
                    headche /
                  @endif
                  @if ($value->dizziness != 0 || $value->dizziness != null)
                    dizziness /
                  @endif
                  @if ($value->fatigue != 0 || $value->fatigue != null)
                    fatigue /
                  @endif
                  @if ($value->malaise != 0 || $value->malaise != null)
                    malaise /
                  @endif
                  @if ($value->dyspepsia != 0 || $value->dyspepsia != null)
                    dyspepsia /
                  @endif
                  @if ($value->diarrhea != 0 || $value->diarrhea != null)
                    diarrhea /
                  @endif
                  @if ($value->nausea != 0 || $value->nausea != null)
                    nausea /
                  @endif
                  @if ($value->vomiting != 0 || $value->vomiting != null)
                    Rash /
                  @endif
                  @if ($value->abdominal_pain != 0 || $value->abdominal_pain != null)
                    abdominal_pain /
                  @endif
                  @if ($value->arthalgia != 0 || $value->arthalgia != null)
                    arthalgia /
                  @endif
                  @if ($value->myalgia != 0 || $value->angioedema != null)
                    Rash /
                  @endif
                  @if ($value->fever38c != 0 || $value->fever38c != null)
                    fever38c /
                  @endif
                  @if ($value->swelling_at_the_injection != 0 || $value->swelling_at_the_injection != null)
                    บวมบริเวณที่ฉีดนานเกิน3วัน /
                  @endif
                  @if ($value->swelling_beyond_nearest_joint != 0 || $value->swelling_beyond_nearest_joint != null)
                     บวมลามไปถึงข้อที่ใกล้ที่สุด /
                  @endif
                  @if ($value->lymphadenopathy != 0 || $value->lymphadenopathy != null)
                    lymphadenopathy /
                  @endif
                  @if ($value->lymphadenitis != 0 || $value->lymphadenitis != null)
                    lymphadenitis /
                  @endif
                  @if ($value->sterile_abscess != 0 || $value->sterile_abscess != null)
                    sterile_abscess /
                  @endif
                  @if ($value->bacterial_abscess != 0 || $value->bacterial_abscess != null)
                    bacterial_abscess /
                  @endif
                  @if ($value->febrile_convulsion != 0 || $value->febrile_convulsion != null)
                    febrile_convulsion /
                  @endif
                  @if ($value->afebrile_convulsion != 0 || $value->afebrile_convulsion != null)
                    afebrile_convulsion /
                  @endif
                  @if ($value->encephalopathy != 0 || $value->encephalopathy != null)
                    encephalopathy /
                  @endif
                  @if ($value->flaccid_paralysis != 0 || $value->flaccid_paralysis != null)
                    flaccid_paralysis /
                  @endif
                  @if ($value->spastic_paralysis != 0 || $value->spastic_paralysis != null)
                    spastic_paralysis /
                  @endif
                  @if ($value->hhe != 0 || $value->hhe != null)
                    hhe /
                  @endif
                  @if ($value->persistent_inconsolable_crying != 0 || $value->persistent_inconsolable_crying != null)
                    persistent_inconsolable_crying /
                  @endif
                  @if ($value->thrombocytopenia != 0 || $value->thrombocytopenia != null)
                    thrombocytopenia /
                  @endif
                  @if ($value->osteomyelitis != 0 || $value->osteomyelitis != null)
                    osteomyelitis /
                  @endif
                  @if ($value->toxic_shock_syndrome != 0 || $value->toxic_shock_syndrome != null)
                    toxic_shock_syndrome /
                  @endif
                  @if ($value->sepsis != 0 || $value->sepsis != null)
                    sepsis /
                  @endif
                  @if ($value->anaphylaxis != 0 || $value->anaphylaxis != null)
                    anaphylaxis /
                  @endif
                  @if ($value->transverse_myelitis != 0 || $value->transverse_myelitis != null)
                    transverse_myelitis /
                  @endif
                  @if ($value->gbs != 0 || $value->gbs != null)
                    gbs /
                  @endif
                  @if ($value->adem != 0 || $value->adem != null)
                    adem /
                  @endif
                  @if ($value->acute_myocardial != 0 || $value->acute_myocardial != null)
                    acute_myocardial /
                  @endif
                  @if ($value->ards != 0 || $value->ards != null)
                    ards /
                  @endif
                </p>
              </td>
              <td>
                <p style="text-align:center;">{{ isset($list_hos[$value->hospcode_report]) ? $list_hos[$value->hospcode_report] : "ไม่ระบุข้อมูล"}}</p>
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-info" data-toggle="dropdown">เมนูการใช้งาน</button>
                  {{-- <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> --}}
                    {{-- <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button> --}}
                  <ul class="dropdown-menu" role="menu">
                    {{-- <li><a href="{{ route('lstf2') }}?id_case={{ $value->id_case }}"><i class="fa fa-file-o" aria-hidden="true" style="color:#428bca;"></i>กรอก AEFI2</a></li> --}}
                    {{-- <li><a href="{{ route('viewform1') }}?id_case={{ $value->id_case }}" target="_blank"><i class="fa fa-eye" aria-hidden="true" style="color:#5cb85c;"></i>ดูข้อมูล AEFI1</a></li> --}}
                    <li><a href="{{ route('ExpertDiagEditFrm') }}?id={{ $value->id }}&id_case={{$value->id_case}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#5bc0de;"></i>แก้ไขข้อมูล</a></li>
                    {{-- <li><a href="#"><i class="fa fa-ambulance" aria-hidden="true" style="color:#e6c34a;"></i>Refer ผู้ป่วย</a></li> --}}
                    {{-- <li><a href="{{ route('ExpertDiagLst') }}?id_case={{ $value->id_case }}"><i class="fa fa-user-circle-o" aria-hidden="true" style="color:#f46732;"></i>ประชุมผู้เชี่ยวชาญ</a></li> --}}
                    <li><a href="{{ route('DeleteExpert') }}?id={{ $value->id }}&id_case={{$value->id_case}}" id="btnDelete" type="button" onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่?');"><i class="fa  fa-trash-o" aria-hidden="true" style="color:#d9534f;"></i>ลบข้อมูล</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <?php endforeach;?>
          </table>
          {{-- <button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button> --}}
          {{--
						  								 <div class="col-sm-2">
						  									 <input type="text" name="req_count[]" >
						  								 </div> --}}

          <div class="modal modal-danger fade" id="modal-warning">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">ลบข้อมูล</h4>
                </div>
                <div class="modal-body">
                  <p>หากท่านกดปุ่มตกลงข้อมูลของผู้ป่วยรายนี้จะถูกลบทั้งหมด&hellip;</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">ยกเลิก</button>
                  {{-- <a href="{{ route('deleteAEFI1') }}?id_case={{ $value->id_case }}" type="button" class="btn btn-outline">ลบข้อมูล</a> --}}
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.row -->
</section>

@include('AEFI.layout.footercaselstScript')
<!-- /.content -->
@stop
