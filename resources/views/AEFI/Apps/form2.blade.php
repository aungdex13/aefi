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


	// dd($data);
	 ?>
<section class="content-header">
	<!-- Content Header (Page header) -->
	<h1>
		แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
		<small>AEFI(2)</small>
	</h1>

	<ol class="breadcrumb">

	</ol>

</section>
<!-- Main content -->

<section class="content">
	<form role="form" action="{{ route('insertform2') }}" method="post" enctype="multipart/form-data">
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
							<!-- /.tab-pane -->
							{{-- <div class="tab-pane" id="tab_2"> --}}
								<div class="row">
									<!--หัวข้อที่5 -->
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="box box-danger">
											<div class="box-header with-border">
												<h3 class="box-title">อาการ/การรักษา/การวินิจฉัย</h3>
											</div>
											<form role="form">
												<div class="box-body">
													{{-- คอรั่มภายใน3.2 --}}
													<div class="col-md-12">
														<!-- general form elements -->
														<div class="box box-danger">
															<div class="box-header with-border">
																<div class="box-body">
																	{{-- คอรั่มภายใน3.2 --}}
																<div class="box-footer">
																	{{-- คอรั่มภายใน3.2 --}}
																	<div class="col-md-12">
																		<!-- general form elements -->
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="control-label">
																						<label>สภาพผู้ป่วยขณะสอบสวน :</label>
																					</div>
																				</div>
																				<input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
																				<input type="text" name="id_case" value="{{$data}}" hidden>

																				<div class="col-lg-1">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1" value="1" checked>
																							หาย
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-2">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1" value="2">
																							อาการดีขึ้นแต่ยังไม่หาย
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-1">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1" value="3">
																							พิการ
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-1">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1" value="4">
																							ไม่ทราบ
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-1">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1" value="5">
																							เสียชีวิต
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-3">
																					<div id="other_status_on_date_inv_1" style="display: none">
																						<input type="text" name="other_status_on_date_inv_1" id="other_status_on_date_inv_1_text" class="form-control" placeholder="ระบุ" hidden="true">
																					</div>
																				</div>
																			</div>
																		</div>
																		<!-- general form elements -->
																		{{-- <div class="form-group">
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="control-label">
																						<label>ผ่าพิสูจน์ศพ :</label>
																					</div>
																				</div>
																				<div class="col-lg-2">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1_2" value="1" checked>
																							มีการผ่าพิสูจน์ศพ
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-2">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1_2" value="2">
																							ไม่มีการพิสูจน์
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-2">
																					<div class="radio">
																						<label>
																							<input type="radio" name="status_on_date_inv_1_2" value="3">
																							มีแผนที่จะดำเนินการ (ระบุ วัน/เดือน/ปี)
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-6">
																					<div id="other_status_on_date_inv_1_2" style="display: none">
																						<input type="text" name="other_status_on_date_inv_1_21" id="other_status_on_date_inv_1_3_text" class="form-control" placeholder="ระบุ" hidden="true">
																						<input type="text" name="other_status_on_date_inv_1_22" id="other_status_on_date_inv_1_4_text" class="form-control" placeholder="ระบุ" hidden="true">
																						<input type="text" name="other_status_on_date_inv_1_23" id="other_status_on_date_inv_1_5_text" class="form-control" placeholder="ระบุ" hidden="true">
																					</div>
																				</div>
																			</div>
																		</div> --}}
																	</div>
																</div>
																<div class="box-footer">
																	{{-- คอรั่มภายใน3.2 --}}
																	<div class="col-md-12">
																		<!-- general form elements -->
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																					<div class="radio">
																						<label>
																							<input type="radio" name="instruction_1" value="1" checked>
																							**กรณีผู้ป่วยเข้ารับการรักษาในโรงพยาบาล ให้แนบสำเนาเอกสารเวชระเบียนทั้งหมดของผู้ป่วย เกี่ยวกับอาการป่วย การรักษา การส่งสิ่งส่การส่งสิ่งส่งตรวจ
																							ของผู้ป่วยเพื่อตรวจทางห้องปฎิบัติการและผลตรวจ การผ่าพิสูจน์ศพ และบันทึกข้อมูลเพิ่มเติมที่ไม่มีในเวชระเบียนตามที่สอบสวนได้ลงในที่ว่าง
																							ข้างล่าง เช่น สอบสวนเหตุการณ์ ประวัติครอบครัว ประวัติการเลี้ยงดู สิ่งแวดล้อมในและนอกบ้าน เป็นต้น :
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-6">
																					<div class="radio">
																						<label>
																							<input type="radio" name="instruction_1" value="2">
																							**กรณีผู้ป่วยไม่ได้รับการรักษาในโรงพยาบาล ให้บันทึกการสอบสวนผู้ป่วย เช่น สอบสวนเหตุการณ์ ประวัติครอบครัว ประวัติการเลี้ยงดู สิ่งแวดล้อมในและนอกบ้าน เป็นต้น
																							และบันทึกข้อมูลที่สอบสวนได้ลงในที่ว่างข้างล่าง
																						</label>
																					</div>
																				</div>
																				<div class="col-lg-12">
																					<div class="col-lg-6">
																						<div id="">
																							<label>Select File for Upload</label>
																							<input type="file" name="other_instruction_1" accept="image/*, application/pdf">
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="box-footer">
																	{{-- คอรั่มภายใน3.2 --}}
																	<div class="col-md-12">
																		<!-- general form elements -->
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																					<label>ชื่อ-สกุล ผู้บันทึกข้อมูลรายละเอียดอาการของผู้ป่วยตามข้างบน : </label>
																					<input type="text" name="record_name" class="form-control" placeholder="ระบุ">
																				</div>
																			</div>
																		</div>
																		<!-- general form elements -->
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-3">
																					<label>ตำแหน่ง : </label>
																					<input type="text" name="record_position" class="form-control" placeholder="ระบุตำแหน่ง">
																				</div>
																				<div class="col-lg-3">
																					<label>หน่วยงาน : </label>
																					<input type="text" name="record_division" class="form-control" placeholder="ระบุหน่วยงาน">
																				</div>
																				<div class="col-lg-3">
																					<label>โทร : </label>
																					<input type="text" name="record_tel" class="form-control" placeholder="ระบุหมายเลขติดต่อ">
																				</div>
																				<div class="col-lg-3">
																					<label>วันที่บันทึกข้อมูล : </label>
																					<div class="input-group date">
																						<div class="input-group-addon">
																							<i class="fa fa-calendar"></i>
																						</div>
																						<input type="text" id="datepicker_record5" name="record_date" class="form-control" placeholder="ระบุวันที่บันทึกข้อมูล" data-date-format="yyyy-mm-dd">
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
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
						<button type="button" class="btn btn-block btn-danger">ย้อนกลับ</button>
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
