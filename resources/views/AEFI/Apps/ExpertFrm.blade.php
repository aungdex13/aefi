@extends('AEFI.layout.templateF2')
@section('contentf2')

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
$arr_load_aefi_classification = load_aefi_classification();
	// dd($data);
	 ?>
<section class="content-header">
	<!-- Content Header (Page header) -->
	<h1>
		แบบรายงานการประชุมจากผู้เชี่ยวชาญ
		<small></small>
	</h1>

	<ol class="breadcrumb">

	</ol>

</section>
<!-- Main content -->

<section class="content">
	@if (count($selectexpertcase) > 0 )
	<form role="form" action="{{ route('UpdateExpert') }}" method="post" enctype="multipart/form-data">
	@else
		<form role="form" action="{{ route('InsertExpert') }}" method="post" enctype="multipart/form-data">
	@endif
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-12">
				<!-- Custom Tabs -->
				<div class="nav-tabs-custom">
					{{-- <ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">(3)ข้อมูลที่เกี่ยวข้องของ<br>ผู้ป่วยก่อนได้รับวัคซีน</a></li>
						<li><a href="#tab_2" data-toggle="tab">(4)อาการ/การรักษา/การวินิฉัย</a></li>
						<li><a href="#tab_3" data-toggle="tab">(5)ข้อมูลวัคซีนใน<br>วันที่ผู้ป่วยได้รับวัคซีน</a></li>
						<li><a href="#tab_4" data-toggle="tab">(6)ข้อมูลการให้บริการวัคซีนใน<br>สถานที่ที่ผู้ป่วยได้รับวัคซีน</a></li>
						<li><a href="#tab_5" data-toggle="tab">(7)ระบบลูกโซ่ความเย็นและการขนส่ง</a></li>
						<li><a href="#tab_6" data-toggle="tab">(8)การสอบสวนในชุมชน</a></li>
						<li><a href="#tab_7" data-toggle="tab">(9)ข้อมูลอื่นๆที่ตรวจพบหรือสังเกตุได้และข้อคิดเห็น</a></li>
					</ul> --}}

					<div class="tab-content">
						<input type="hidden" id="user_username" name="user_username" value="{{auth()->user()->username}}" class="form-control" >
						<input type="hidden" id="user_hospcode" name="user_hospcode" value="{{auth()->user()->hospcode}}" class="form-control" >
						<input type="hidden" id="user_provcode" name="user_provcode" value="{{auth()->user()->prov_code}}" class="form-control" >
						<input type="hidden" id="user_region" name="user_region" value="{{auth()->user()->region}}" class="form-control" >
						<input type="hidden" id="id_aefi1" name="id_aefi1" value="{{$selectcase[0]->id}}" class="form-control" >
							<!-- /.tab-pane -->
							{{-- <div class="tab-pane" id="tab_2"> --}}
								<div class="row">
									<!--หัวข้อที่5 -->
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="box box-danger">
											<div class="box-header with-border">
												<h3 class="box-title">รายงานการประชุมจากผู้เชี่ยวชาญ</h3>
											</div>
												<div class="box-body">
													{{-- คอรั่มภายใน3.2 --}}
													<div class="col-md-12">
														<!-- general form elements -->
																	{{-- คอรั่มภายใน3.2 --}}
																	<div class="col-md-12">
																		<!-- general form elements -->
																		{{-- <div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																					<label>ชื่อ-สกุล ผู้บันทึกข้อมูลรายละเอียดอาการของผู้ป่วยตามข้างบน : </label>
																					<input type="text" name="record_name" class="form-control" placeholder="ระบุ">
																				</div>
																			</div>
																		</div> --}}
																		<!-- general form elements -->
																		<div class="form-group">
																			<div class="row">
																				<input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
																					<input type="text" name="id_case" value="{{	$id_case}}" hidden>
																					@if (count($selectexpertcase) > 0 )
																					<input type="text" name="id" value="{{	$selectexpertcase[0]->id}}" hidden>
																					@else
																					@endif
																					<div class="col-lg-3">
																					<label>ชื่อ- นามสกุลผู้ป่วย : {{	isset($selectcase[0]->first_name) ? $selectcase[0]->first_name :"ไม่ระบุ"}} {{	$selectcase[0]->sur_name}} </label>
																				</div>
																				<div class="col-lg-3">
																					<label>เพศ : {{	isset($arr_gender[$selectcase[0]->gender]) ? $arr_gender[$selectcase[0]->gender]  :"ไม่ระบุ"}}</label>
																				</div>
																				<div class="col-lg-3">
																					<label>อาชีพ : {{	isset($selectcase[0]->career) ? $selectcase[0]->career  :"ไม่ระบุ"}}</label>
																				</div>
																				<div class="col-lg-3">
																					<label>จังหวัดที่รายงาน : {{	isset($arr_provinces[$selectcase[0]->province_reported]) ?$arr_provinces[$selectcase[0]->province_reported]  :"ไม่ระบุ" }}</label>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-3">
																					<label>วัคซีนที่ได้รับ : {{	isset($listvac_arr[$selectcase[0]->name_of_vaccine]) ?$listvac_arr[$selectcase[0]->name_of_vaccine]  :"ไม่ระบุ" }}</label>
																				</div>
																				<div class="col-lg-3">
																					<label>วันที่ได้รับวัคซีน : {{	isset($selectcase[0]->date_of_vaccination) ? $selectcase[0]->date_of_vaccination  :"ไม่ระบุ" }}</label>
																				</div>
																				<div class="col-lg-3">
																					<label>โรงพยาบาลที่เข้ารับรักษา : {{	isset($list_hos[$selectcase[0]->hospcode_treat]) ? $list_hos[$selectcase[0]->hospcode_treat]  :"ไม่ระบุ" }}</label>
																				</div>
																				<div class="col-lg-3">
																					<label>ความรุนแรง : {{	isset($arr_seriousness_of_the_symptoms[$selectcase[0]->seriousness_of_the_symptoms]) ? $arr_seriousness_of_the_symptoms[$selectcase[0]->seriousness_of_the_symptoms]  :"ไม่ระบุ" }}</label>
																				</div>
																			</div>
																		</div>
																		{{-- <div class="form-group">
																			<div class="row">
																				<div class="col-lg-3">
																					<label>ST No. : </label>
																					<input type="text" name="stno" class="form-control" placeholder="ระบุ ST No.">
																				</div>
																				<div class="col-lg-3">
																					<label>Skin : </label>
																						<input type="text" name="skin" class="form-control" placeholder="ระบุ Skin">
																				</div>
																				<div class="col-lg-3">
																					<label>GI : </label>
																					<input type="text" name="record_position" class="form-control" placeholder="ระบุ GI">
																				</div>
																			</div>
																		</div> --}}
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																						<label>การวินิจฉัยแรกรับของแพทย์ : </label>
																						{{-- <input type="text" name="r_o" class="form-control" placeholder="ระบุR/O"> --}}
																						<select type="text" class="form-control" name="r_o">
																							@if (count($selectexpertcase) > 0 )
																								<option value="{{$selectexpertcase[0]->r_o}}">{{isset($arr_r_o[$selectexpertcase[0]->r_o]) ? $arr_r_o[$selectexpertcase[0]->r_o] : ''}}</option>
																							@else
																							@endif
																							<option value="">กรุณาระบุ การวินิจฉัยแรกรับของแพทย์</option>
																							<option value="1">Dead</option>
																							<option value="2">Anaphylaxis</option>
																							<option value="3">Anaphylactic shock</option>
																							<option value="4">DVT</option>
																							<option value="5">Thrombocytopenia</option>
																							<option value="6">Neuropathy</option>
																							<option value="7">Seizure</option>
																							<option value="8">ISRR</option>
																							<option value="9">Syncope</option>
																							<option value="10">อื่นๆ</option>
																						</select>
																				</div>
																				<div class="col-lg-6">
																					<label>การวินิจฉัยแรกรับของแพทย์ อื่นๆ : </label>
																					<textarea type="text" name="other_r_o" class="form-control" rows="3">{{ isset($selectexpertcase[0]->other_final_diag) ? $selectexpertcase[0]->other_final_diag : "" }}</textarea>
																				</div>
																			</div>
																		</div>
																		{{-- <div class="form-group">
																			<div class="row">
																				<div class="col-lg-3">
																					<label>Respiratory : </label>
																					<input type="text" name="respiratory" class="form-control" placeholder="ระบุ Respiratory">
																				</div>
																				<div class="col-lg-3">
																					<label>Neurological : </label>
																					<input type="text" name="neurological" class="form-control" placeholder="ระบุ Neurological">
																				</div>
																				<div class="col-lg-3">
																					<label>Cardiovascular : </label>
																						<input type="text" name="cardiovascular" class="form-control" placeholder="ระบุ Cardiovascular">
																				</div>
																			</div>
																		</div> --}}
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																					<label>Final Diagnosis : </label>
																					<select type="text" name="final_diag" class="form-control">
																						@if (count($selectexpertcase) > 0 )
																							<option value="{{$selectexpertcase[0]->final_diag}}">{{isset($arr_load_final_diag[$selectexpertcase[0]->final_diag]) ? $arr_load_final_diag[$selectexpertcase[0]->final_diag] : ''}}</option>
																						@else
																						@endif
																						<option value="">กรุณาระบุ Final Diagnosis</option>
																						<option value="1">Acute Coronary Syndrome</option>
																						<option value="2">Acute myeloid leukemia</option>
																						<option value="3">Anaphylaxis</option>
																						<option value="4">Anaphylactic shock</option>
																						<option value="5">Atrial fibrillation</option>
																						<option value="6">Convulsive syncope</option>
																						<option value="7">DVT</option>
																						<option value="9">Hypersensitivity</option>
																						<option value="10">Immune TTP</option>
																						<option value="11">Intra Abdomen bleeding with Hypovolemic shock</option>
																						<option value="12">ISRR</option>
																						<option value="14">Polyneuropathy</option>
																						<option value="15">Reflex syncope</option>
																						<option value="16">Side effect</option>
																						<option value="17">ภาวะหัวใจขาดเลือด</option>
																						<option value="18">อื่นๆ</option>
																					</select>
																				</div>
																				<div class="col-lg-6">
																					<label>Final Diagnosis อื่นๆ : </label>
																					<textarea type="text" name="other_final_diag" class="form-control" rows="3" placeholder="กรอกข้อมูล Final Diagnosis อื่นๆ">{{ isset($selectexpertcase[0]->other_final_diag) ? $selectexpertcase[0]->other_final_diag : "" }}</textarea>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																					<label>Causality Assessment : </label>
																					<select type="text" name="causality" class="form-control" >
																						@if (count($selectexpertcase) > 0 )
																							<option value="{{$selectexpertcase[0]->causality}}">{{isset($arr_causality[$selectexpertcase[0]->causality]) ? $arr_causality[$selectexpertcase[0]->causality] : ''}}</option>
																						@else
																						@endif
																						<option value="">กรุณาระบุ Causality Assessment</option>
																						<option value="1">เกี่ยวข้องกับวัคซีน (Vaccine product related reaction)</option>
																						<option value="2">เกี่ยวข้องกับคุณภาพของวัคซีน (Vaccine quality defect related reaction)</option>
																						<option value="3">เกี่ยวข้องกับการให้บริการการฉีดวัคซีน (Immunization error related reaction)</option>
																						<option value="4">เกี่ยวข้องกับการฉีดวัคซีน (Immunization anxiety related reaction)</option>
																						<option value="5">เป็นเหตุการณ์ร่วมที่ไม่เกี่ยวข้องกับวัคซีนแต่บังเอิญเกิดร่วมกัน (Coincidental event)</option>
																						{{-- <option value="6">Temporal relationship</option> --}}
																						<option value="7">ยังไม่สามารถสรุปได้ว่าเกี่ยวข้องกับวัคซีน (Indeterminate  event)</option>
																						<option value="8">ข้อมูลยังไม่เพียงพอที่จะสรุป (Unclassifiable  event)</option>
																					</select>
																				</div>
																				<div class="col-lg-6">
																					<label>Summary : </label>
																					<textarea type="text" name="summary" class="form-control" rows="3" placeholder="กรอกข้อมูล Summary">{{ isset($selectexpertcase[0]->summary) ? $selectexpertcase[0]->summary : "" }}</textarea>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="row">
																				{{-- <div class="col-lg-6">
																					<label>AEFI Classification : </label>
																					<select type="text" name="aefi_classification" class="form-control" >
																						@if (count($selectexpertcase) > 0 )
																							<option value="{{$selectexpertcase[0]->aefi_classification}}">{{isset($arr_load_aefi_classification[$selectexpertcase[0]->aefi_classification]) ? $arr_load_aefi_classification[$selectexpertcase[0]->aefi_classification] : ''}}</option>
																						@else
																						@endif
																						<option value="">กรุณาระบุ AEFI Classificatio</option>
																						<option value="1">ปฏิกิริยาของวัคซีน</option>
																						<option value="2">ความบกพร่องของวัคซีน</option>
																						<option value="3">ความคลาดเคลื่อนด้านการให้บริการ</option>
																						<option value="4">ปฏิกริยาของร่างการตอบสนองต่อการฉีดวัคซีน</option>
																						<option value="5">เหตุการณ์ร่วมโดยบังเอิญ</option>
																					</select>
																						<textarea rows="3"  type="text" name="past_history" class="form-control" placeholder="ระบุ Past History"></textarea>
																				</div> --}}
																				<div class="col-lg-6">
																					<label>Expert Meeting : </label>
																					<div class="input-group date">
																						<div class="input-group-addon">
																							<i class="fa fa-calendar"></i>
																						</div>
																						<input type="text" name="expert_meet_date" class="form-control pull-right" id="datepicker_investigater_2" value="{{ isset($selectexpertcase[0]->expert_meet_date) ? $selectexpertcase[0]->expert_meet_date : "" }}" data-date-format="yyyy-mm-dd" required readonly>
																						{{-- <input type="text" id="datepicker_record5" name="record_date" class="form-control" placeholder="ระบุวันที่บันทึกข้อมูล" data-date-format="yyyy-mm-dd"> --}}
																					</div>
																				</div>
																				{{-- <div class="col-lg-3">
																					<label>Date_report : </label>
																					<div class="input-group date">
																						<div class="input-group-addon">
																							<i class="fa fa-calendar"></i>
																						</div>
																						<input type="text" name="date_report" class="form-control pull-right" id="datepicker_investigater_3" data-date-format="yyyy-mm-dd" required readonly>
																						<input type="text" id="datepicker_record5" name="record_date" class="form-control" placeholder="ระบุวันที่บันทึกข้อมูล" data-date-format="yyyy-mm-dd">
																					</div>
																				</div> --}}
																				{{-- <div class="col-lg-6">
																					<label>Past History : </label>
																						<textarea rows="3"  type="text" name="past_history" class="form-control" placeholder="ระบุ Past History"></textarea>
																				</div> --}}
																			</div>
																		</div>
																		{{-- <div class="form-group">
																			<div class="row">
																				<div class="col-lg-3">
																					<label>keyin_AEFIDDC : </label>
																					<input type="text" name="keyin_aefiddc" class="form-control" placeholder="ระบุ keyin_AEFIDDC">
																				</div>
																				<div class="col-lg-3">
																					<label>Print Data : </label>
																						<input type="text" name="printdata" class="form-control" placeholder="ระบุ Print Data">
																				</div>
																				<div class="col-lg-3">
																					<label>reviewer : </label>
																					<input type="text" name="reviewer" class="form-control" placeholder="ระบุ Reviewer">
																				</div>
																			</div>
																		</div> --}}
																	</div>
													{{-- </div> --}}
												</div>
										</div>
									</div>
								</div>
							</div>
					</div>
						<!-- /.tab-content -->
					</div>
					<!-- nav-tabs-custom -->
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<div class="col-md-3">
					</div>
					<div class="col-md-3">
						<a type="button" href="{{ route('ExpertDiagLst') }}?id_case={{$id_case}}" class="btn btn-block btn-danger">ย้อนกลับ</a>
					</div>
					<div class="col-md-3">
						<input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-block btn-success"></button>
					</div>
					<div class="col-md-3">
					</div>
				</div>
	</form>
</section>
<!-- /.content -->

@stop
