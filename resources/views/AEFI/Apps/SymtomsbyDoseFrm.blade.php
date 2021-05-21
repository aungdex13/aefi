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
	// dd($data);
	 ?>
<section class="content-header">
	<!-- Content Header (Page header) -->
	<h1>
		แบบรายงานอาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคตามครั้งที่ฉีดวัคซีน
		<small></small>
	</h1>

	<ol class="breadcrumb">

	</ol>

</section>
<!-- Main content -->

<section class="content">
	<form role="form" action="{{ route('InsertExpert') }}" method="post" enctype="multipart/form-data">
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
												<h3 class="box-title">รายงานอาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคตามครั้งที่ฉีดวัคซีน</h3>
											</div>
											<form role="form">
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
																						<label>เข็มที่ / ครั้งที่  : </label>
																						{{-- <input type="text" name="r_o" class="form-control" placeholder="ระบุR/O"> --}}
																						<select type="text" class="form-control" name="r_o">
																							<option value="">กรุณาระบุเข็มที่ / ครั้งที่ </option>
																							<option value="1">1</option>
																							<option value="2">2</option>
																							<option value="3">3</option>
																							<option value="4">4</option>
																							<option value="5">5</option>
																							<option value="6">6</option>
																							<option value="7">7</option>
																							<option value="8">8</option>
																							<option value="9">9</option>
																							<option value="10">10</option>
																							<option value="11">11</option>
																							<option value="12">12</option>
																						</select>
																				</div>
																			</div>
																		</div>
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
																			<div class="col-md-6">
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
																										<textarea rows="3" type="text" id="other_symptoms_later_immunized_text" name="other_symptoms_later_immunized" class="form-control" placeholder="กรุณาระบุอาการอื่นๆเพิ่มเติม" hidden="true"></textarea>
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
