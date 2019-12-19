@extends('AEFI.layout.template')
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
  แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
  <small>AEFI</small>
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
<ol class="breadcrumb">

</ol>

</section>
<!-- Main content -->
<section class="content">
	<!-- Custom Tabs -->
	<div class="row">
	  <div class="col-md-12">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
		  <ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab">(1)ข้อมูลผู้ป่วย</a></li>
		<li><a href="#tab_2" data-toggle="tab">(2)ข้อมูลวัคซีน / สถานที่รับวัคซีน</a></li>
		<li><a href="#tab_3" data-toggle="tab">(3)อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรค<br>และวินิจฉัยข้อมูลการให้บริการวัคซีนใน</a></li>
		<li><a href="#tab_4" data-toggle="tab">(4)การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน</a></li>
		<li><a href="#tab_5" data-toggle="tab">(5) ข้อมูลผู้รายงาน<br>สถานที่เกิดเหตุการณ์<br>และหน่วยงานที่รายงาน</a></li>
	  </ul>
	  <div class="tab-content">
		<div class="tab-pane active" id="tab_1">
			<div class="box box-danger">
				<div class="box-header with-border">
				<h3 class="box-title">(1)ข้อมูลผู้ป่วย</h3>
				</div>
				<div class="box-body">
				  {{-- คอรั่มภายใน3.1 --}}
				  <div class="col-md-12">
				  <!-- general form elements -->
				  <div class="box box-danger">
					  <div class="box-header with-border">
					  <!-- checkbox3.1.1 -->
					  <!-- ประวัติประวัติการแพ้วัคซีน -->
					  <div class="form-group">
									<div class="row">
											<div class="col-sm-3 control-label">
											<label>เลขที่ผู้ป่วย:</label>
											</div>
										<div class="col-lg-4">
											<input type="text" id="hn" name="hn" class="form-control" placeholder="HN">
										</div>
										<div class="col-lg-4">
										<input type="text" id="an" name="an" class="form-control" placeholder="AN">
										</div>
									</div>
								</div>

								<!-- เลขบัตรประชาชน -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<div class="control-label">
												<label>เลขประจำตัวบัตรประชาชน:</label>
											</div>
										</div>
										<div class="col-lg-7">
												<input type="text" id="id_number" name="id_number" class="form-control"  data-inputmask='"mask": "9   9999   99999   99   9"' data-mask>
										</div>
									</div>
								</div>
								<!-- /.form group -->

							<!-- คำนำหน้าชื่อ -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<label>คำนำหน้า:</label>
									</div>
									<div class="col-lg-3">
										<input type="text" id="title_name" name="title_name" class="form-control" placeholder="คำนำหน้าชื่อ">
									<!-- /.p_id tname  -->
									</div>
								</div>
							</div>
								<!-- /.form group -->
								<!-- ชื่อ -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<label>ชื่อ-สกุล:</label>
									</div>
									<div class="col-lg-4">
										<input type="text" id="first_name" class="form-control" placeholder="ชื่อ">
									<!-- /input-group -->
									</div>
									<!-- /.col-lg-6 -->
									<div class="col-lg-4">
										<input type="text" id="sur_name" class="form-control" placeholder="นามสกุล">
									<!-- /input-group -->
									</div>
									<!-- /.col-lg-6 -->
								</div>
							</div>

							<!-- เพศ -->
							<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<div class="control-label">
											<label>เพศ:</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="gender" id="optionsRadios1" value="1" checked>
												ชาย
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="gender" id="optionsRadios2" value="2">
												หญิง
												</label>
											</div>
										</div>
									</div>
								</div>

									<!-- วันเดือนปีเกิด -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>วันเดือนปีเกิด:</label>
											</div>
											<div class="col-lg-9">
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input type="text" name="birthdate" class="form-control pull-right" id="datepicker_bdate">
												</div>
											</div>
										</div>
									</div>

										<!-- /.form group -->
								<div class="form-group">
										<!-- ชื่อ -->
									<div class="row">
										<div class="col-lg-3">
											<label>อายุขณะป่วย:</label>
										</div>
										<div class="col-lg-3">
											<input type="text" id="age_while_sick_year" class="form-control" placeholder="ปี">
											<!-- /input-group -->
										</div>
											<!-- /.col-lg-4 -->
										<div class="col-lg-3">
											<input type="text" id="age_while_sick_month" class="form-control" placeholder="เดือน">
											<!-- /input-group -->
										</div>
											<!-- /.col-lg-4 -->
											<div class="col-lg-3">
											<input type="text" id="age_while_sick_day" class="form-control" placeholder="วัน">
											<!-- /input-group -->
										</div>
								</div>
								</div>

							<!-- กลุ่มอายุ -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
											<div class="control-label">
											<label>กลุ่มอายุ:</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="group_age" id="G_age" value="1" checked>
												< 1 ปี
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="group_age" id="G_age" value="2">
												1-5 ปี
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="group_age" id="G_age" value="3">
												> 5 ปี
												</label>
											</div>
										</div>
									</div>
								</div>

							<!-- เชื้อชาติ -->
								<div class="form-group">
									<div class="row">
									<div class="col-lg-3">
											<div class="control-label">
											<label>เชื้อชาติ:</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="nationality" value="1" checked>
												ไทย
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="nationality" value="2" >
												พม่า
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="nationality" value="3" >
												ลาว
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="nationality" value="4">
												อื่นๆ
												</label>
											</div>
										</div>
										<div class="col-lg-4">
											<div id="other_nationality" style="display: none">
											<input type="text" id="other_nationality_text" name="other_nationality" class="form-control" placeholder="ระบุสัญชาติ" hidden="true">
											</div>
										</div>
									</div>
								</div>
							<!-- ประเภทผู้ป่วย -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3">
										<div class="control-label">
										<label>ประเภทผู้ป่วย:</label>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="radio">
											<label>
											<input type="radio" name="type_of_patient" id="type_of_patient" value="1" checked>
											ผู้ป่วยใน
											</label>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="radio">
											<label>
											<input type="radio" name="type_of_patient" id="type_of_patient" value="2">
											ผู้ป่วยนอก
											</label>
										</div>
									</div>
								</div>
							</div>
					</div>
			</div>
			<!-- /.box-body -->
			</div>

		</div>
		<!-- /.box -->
		{{-- คอรั่มภายใน3.1 --}}
		<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-danger">
			<div class="box-header with-border">
			<!-- checkbox1.2.1 -->
				<!-- ประวัติประวัติการแพ้วัคซีน -->
				<div class="form-group">
					<div class="row">
						<div class="col-lg-12">
							<div class="control-label">
							<label>ประวัติการแพ้วัคซีน :</label>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="radio">
								<label>
								<input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="1" checked>
								ไม่มี
								</label>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="radio">
								<label>
								<input type="radio" name="history_of_vaccine_drug_allergies_of_patient" value="2">
								มี
								</label>
							</div>
						</div>
						<div class="col-lg-12">
							<div id="other_vaccination_history" style="display: none">
								<label>วัคซีนที่แพ้ :</label>
							<select id="other_vaccination_history_text" name="other_vaccination_history" class="form-control select2" style="width: 100%;">
							  <?php
								  foreach ($arr_history_of_vaccine as $k=>$v) { ?>
									  <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							  <?php } ?>
							</select>
							<label>ยาที่แพ้ :</label>
								<input type="text" name="other_drug_history" id="other_secymptoms_after_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true">
							</div>
						</div>
					</div>
				</div>
					<!-- อาการหลังได้รับวัคซีน -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<div class="control-label">
								<label>อาการหลังได้รับวัคซีน :</label>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="radio">
									<label>
									<input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="1" checked>
									ไม่มี
									</label>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="radio">
									<label>
									<input type="radio" name="patient_develop_symptoms_after_previous_vaccination" value="2">
									มี
									</label>
								</div>
							</div>
							<div class="col-lg-12">
								<div id="other_patient_develop_symptoms_after_previous_vaccination" style="display: none">
									<label>วัคซีนที่แพ้ :</label>
								<select id="other_patient_develop_symptoms_after_previous_vaccination_text" name="other_patient_develop_symptoms_after_previous_vaccination" class="form-control select2" style="width: 100%;">
									<?php
									  foreach ($arr_patient_develop_symptoms_after_previous_vaccination as $k=>$v) { ?>
										  <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
								  <?php } ?>
								</select>
								</div>
							</div>
						</div>
					</div>
					<!-- โรคประจำตัว/การเจ็บป่วยในอดีต -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<div class="control-label">
								<label>โรคประจำตัว/การเจ็บป่วยในอดีต :</label>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="radio">
									<label>
									<input type="radio" name="underlying_disease" value="1" checked>
									ไม่มี
									</label>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="radio">
									<label>
									<input type="radio" name="underlying_disease" value="2">
									มี
									</label>
								</div>
							</div>
							<div class="col-lg-12">
								<div id="other_underlying_disease" style="display: none">
									<select id="other_underlying_disease_text" name="other_underlying_disease" class="form-control select2" style="width: 100%;">
										<?php
										  foreach ($arr_underlying_disease as $k=>$v) { ?>
											  <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									  <?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!-- ประวัติการแพ้วัคซีน/ยา -->
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<div class="control-label">
								<label>ประวัติการใช้ยาในรอบ1เดือน :</label>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="radio">
									<label>
									<input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="1" checked>
									ไม่มี
									</label>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="radio">
									<label>
									<input type="radio" name="history_of_drug_use_within_1_month_before_getting_vaccination" value="2">
									มี
									</label>
								</div>
							</div>
							<div class="col-lg-12">
								<div id="other_history_of_drug_use_within_1_month_vaccination" style="display: none">
								<input type="text" id="other_history_of_drug_use_within_1_month_vaccination_text" class="form-control" placeholder="ระบุ" hidden="true">
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->

			<div class="box-body">
					{{-- input content --}}
					<div class="form-group">
						<div class="col-lg-12">
							  <label>ประวัติทางการแพทย์</label>
							  <textarea class="form-control" name="other_medical_history" rows="3" placeholder="..."></textarea>
						</div>
					</div>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->
		</div>

		</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<!-- ที่อยู่ขณะเรื่มป่วย -->
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label>ที่อยู่ขณะเริ่มป่วย :</label>
						</div>
						<div class="col-lg-4">
							<input type="text" id="house_number" name="house_number" class="form-control" placeholder="บ้านเลขที่">
						<!-- /.p_id tname  -->
						</div>
						<div class="col-lg-4">
							<input type="text" id="village_no" name="village_no" class="form-control" placeholder="หมู่ที่">
						<!-- /.p_id tname  -->
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label></label>
						</div>
						<div class="col-lg-3">
							<select class="form-control provinces" name="provinces" id="provinces">
							  <option value="0">=== จังหวัด ===</option>
							  @foreach ($list as $row)
								 <option value="{{$row->province_id}}">{{$row->province_name}}</option>
							  @endforeach
							</select>
						<!-- /.p_id tname  -->
						</div>
						<div class="col-lg-3">
							<select class="form-control amphures" name="amphures">
								<option value="0">=== อำเภอ ===</option>
							</select>
						<!-- /.p_id tname  -->
						</div>
						<div class="col-lg-3">
							<select class="form-control district" name="district" >
								<option value="0">=== ตำบล ===</option>
							</select>
						<!-- /.p_id tname  -->
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label>โทรศัพท์ :</label>
						</div>
						<div class="col-lg-3">
							<input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="โทรศัพท์">
						<!-- /.p_id tname  -->
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label>ชื่อผู้ปกครอง :</label>
						</div>
						<div class="col-lg-3">
							<input type="text" id="parent_name" name="parent_name" class="form-control" placeholder="ชื่อ">
						<!-- /.p_id tname  -->
						</div>
						<div class="col-lg-3">
							<input type="text" id="parent_sur_name" name="parent_sur_name" class="form-control" placeholder="นามสกุล">
						<!-- /.p_id tname  -->
						</div>
						<div class="col-lg-3">
							<label>(กรณีผู้ป่วยอายุ<15ปี)</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label>โทรศัพท์ผู้ปกครอง :</label>
						</div>
						<div class="col-lg-3">
							<input type="text" id="parent_phone_number" name="parent_phone_number" class="form-control" placeholder="โทรศัพท์ผู้ปกครอง">
						<!-- /.p_id tname  -->
						</div>
					</div>
				</div>
			</div>

		</div>
						<!-- /.box-header -->
						</div>
				  </div>
				  <!-- /.box-body -->

					  </div>
		  </div>
		  <!-- /.box -->
		  </div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_2">
			<div class="row">
				<!--หัวข้อที่5 -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">(4)อาการ/การรักษา/การวินิจฉัย</h3>
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
									<div class="col-md-12">
									<!-- general form elements -->
									<!-- ประวัติประวัติการแพ้วัคซีน -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>แหล่งที่มาของข้อมูล :</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="radio">
													<label>
													<input type="radio" name="source" value="1" checked>

													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="radio">
													<label>
													<input type="radio" name="source" value="2">
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="radio">
													<label>
													<input type="radio" name="source" value="3">
													ไม่ทราบ
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_source" style="display: none">
												<input type="text" name="other_source" id="other_source_text" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>การชันสูตรศพทางวาจา (ระบุแหล่งที่มาของข้อมูล) :</label>
												</div>
											</div>
											<div class="col-lg-3">
												<input type="text" name="source_1_2" class="form-control" placeholder="ระบุ">
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
											<div class="col-lg-12">
												<div class="control-label">
												<label>อาการและอาการแสดง ตามลำดับเหตุการณ์หลังจากรับวัคซีน :</label>
												</div>
											</div>
											<div class="col-lg-12">
												<textarea class="form-control" name="symptoms_2" rows="3" placeholder="Enter ..."></textarea>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>การวินิจฉัยของแพทย์ :</label>
												</div>
											</div>
											<div class="col-lg-3">
												<input type="text" name="symptoms_2_1" class="form-control" placeholder="ระบุ">
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
											<div class="col-lg-4">
												<div class="control-label">
												<label>วันเดือนปีที่เกิดอาการ:</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input type="text" name="symptoms_2_2" id="datepicker_symptoms" class="form-control" placeholder="ระบุ" >
												</div>
												</div>
											</div>
											<div class="col-lg-4">
												<!-- time Picker -->
												<div class="bootstrap-timepicker">
												  <div class="form-group">
													<label>เวลาที่เริ่มเกิดอาการ :</label>

													<div class="input-group">
													  <input type="text" name="symptoms_2_3" class="form-control timepicker_Symptoms">

													  <div class="input-group-addon">
														<i class="fa fa-clock-o"></i>
													  </div>
													</div>
													<!-- /.input group -->
												  </div>
												  <!-- /.form group -->
												</div>
											</div>
											<div class="col-lg-4">
												<div class="control-label">
												<label>วันเดือนปีที่รับการรักษา:</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input type="text" id="datepicker_date_treat" id="symptoms_2_4" class="form-control" placeholder="ระบุ">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4">
												<div class="control-label">
												<label>วันเดือนปีที่จำหน่าย :</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
												<input type="text" id="datepicker_Symptoms_2_5" name="symptoms_2_5" class="form-control" placeholder="ระบุ">
												</div>
											</div>
											</div>
											<div class="col-lg-4">
												<div class="control-label">
												<label>สถานที่รักษา :</label>
												<input type="text" name="treatment_place" class="form-control" placeholder="ระบุ">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="control-label">
												<label>แพทย์ผู้รักษา :</label>
												<input type="text" name="doctor_name" class="form-control" placeholder="ระบุ">
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
											<div class="col-lg-12">
												<div class="control-label">
												<label>สภาพผู้ป่วยขณะสอบสวน :</label>
												</div>
											</div>
											<div class="col-lg-1">
												<div class="radio">
													<label>
													<input type="radio" name="status_on_date_inv_1" value="1" checked>
													หาย
													</label>
												</div>
											</div>
											<div class="col-lg-1">
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
									<div class="form-group">
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
													<div class="radio">
														<label>
														<input type="radio" name="instruction_1" value="1" >
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
																<input type="file" name="other_instruction_1">
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
												<input type="text" name="record1"  class="form-control" placeholder="ระบุ">
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-3">
												<label>ตำแหน่ง : </label>
												<input type="text" name="record2" class="form-control" placeholder="ระบุตำแหน่ง">
											</div>
											<div class="col-lg-3">
												<label>หน่วยงาน : </label>
												<input type="text" name="record3" class="form-control" placeholder="ระบุหน่วยงาน">
											</div>
											<div class="col-lg-3">
												<label>โทร : </label>
												<input type="text" name"record4" class="form-control" placeholder="ระบหมายเลขติดต่อ">
											</div>
											<div class="col-lg-3">
												<label>วันที่บันทึกข้อมูล : </label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
												<input type="text" id="datepicker_record5" name="record5" class="form-control" placeholder="ระบวันที่บันทึกข้อมูล">
											</div>
										</div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_3">
			<div class="row">
				<!--หัวข้อที่5 -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">(5)ข้อมูลวีคซีนในวันที่ผู้ป่วยได้รับวัคซีน</h3>
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
									<div class="col-md-12">
										<div class="box-header">
										  <h3 class="box-title">จำนวนผู้ได้รับวัคซีนแต่ละชนิดในสถานที่ให้วัคซีนในวันนั้น</h3>
										</div>
									<!-- general form elements -->
									<table class="table table-striped" id="maintable">
								   <tr>
									 <th>ชื่อวัคซิน</th>
									 <th>จำนวนผู้ได้รับวัคซีน</th>
								 </tr>
								   <tr class="data-contact-person">
									 <td><input type="text" id="name_vac" name="name_vac[]"  class="form-control" onkeyup="autocomplet()"></td>
									 <td><input type="text" id="recive_amount" name="recive_amount[]"  class="form-control recive_amount01" onkeyup="autocomplet()"></td>
								   </tr>
								   <tr class="data-contact-person">
									 <td><input type="text" id="name_vac" name="name_vac[]"  class="form-control" onkeyup="autocomplet()"></td>
									 <td><input type="text" id="recive_amount" name="recive_amount[]"  class="form-control recive_amount01" onkeyup="autocomplet()"></td>
								   </tr>
								   <tr class="data-contact-person">
									 <td><input type="text" id="name_vac" name="name_vac[]"  class="form-control" onkeyup="autocomplet()"></td>
									 <td><input type="text" id="recive_amount" name="recive_amount[]"  class="form-control recive_amount01" onkeyup="autocomplet()"></td>
								   </tr>
								   <tr class="data-contact-person">
									 <td><input type="text" id="name_vac" name="name_vac[]"  class="form-control" onkeyup="autocomplet()"></td>
									 <td><input type="text" id="recive_amount" name="recive_amount[]"  class="form-control recive_amount01" onkeyup="autocomplet()"></td>
								   </tr>
								   <tr class="data-contact-person">
									 <td><input type="text" id="name_vac" name="name_vac[]"  class="form-control" onkeyup="autocomplet()"></td>
									 <td><input type="text" id="recive_amount" name="recive_amount[]"  class="form-control recive_amount01" onkeyup="autocomplet()"></td>
								   </tr>
								 </table>
									</div>
								</div>
								<div class="box-footer">
									{{-- คอรั่มภายใน3.2 --}}
									<div class="col-md-12">
									<!-- general form elements -->
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>1.ผู้ป่วยได้รับวัคซีนในช่วงเวลาใด :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_1" value="1" checked>
													เป็นคนแรกๆของการให้วัคซีนในวันนั้น
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_1" value="2">
													เป็นคนท้ายๆของการให้วัคซีนในวันนั้น
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_1" value="3">
													ไม่ทราบ
													</label>
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>ในกรณีที่วัคซีนบรรจุมากกว่า 1 โด๊ส ผู้ป่วยได้รับวัคซีน :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_2" value="1" checked>
													ภายใน2-3โด๊สแรก
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_2" value="2">
													เป็นโด๊สสุดท้าย
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_2" value="3">
													ไม่ทราบ
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_2">
												<input type="text" id="other_patient_immunized_2_text" name="other_patient_immunized_2" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>2.มีข้อผิดพลาดของการสั่งใช้วัคซีนโดยไม่ได้เป็นไปตามคำแนะนำในการใช้วัคซีนหรือไม่ :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_3" value="1" checked>
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_3" value="2">
													ไม่สามารถประเมินได้
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_3" value="3">
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_3">
												<input type="text" id="other_patient_immunized_3_text" name="other_patient_immunized_3" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>3.จากการสอบสวน : ท่านคิดว่ากระบวนการการเตรียมหรือให้วัคซีนกับผู้ป่วยอาจไม่ปราศจากเชื้อ :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_4" value="1" checked>
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_4" value="2">
													ไม่สามารถประเมินได้
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_4" value="3">
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_4">
								<input type="text" id="other_patient_immunized_4_text" name="other_patient_immunized_4" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>4.จากการสอบสวน : ท่านคิดว่าลักษณะทางกายภาพของวัคซีนที่ให้กับผู้ป่วยผิดปกติ (เช่น สี ความขุ่น มีวัตถุปนเปื้อน เป็นต้น) :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_5" value="1" checked>
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_5" value="2">
													ไม่สามารถประเมินได้
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_5" value="3">
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_5">
								<input type="text" id="other_patient_immunized_5_text" name="other_patient_immunized_4" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>5.จากการสอบสวน : ท่านคิดว่ามีความผิดพลาดของผู้ให้วัคซีนในการผสมวัคซีนหรือเตรียมวัคซีน(เช่น หยิบวัคซีนหรือหยิบตัวทำละลายผิด
													 ผสมวัคซีนกับตัวทำละลายไม่ดีพอ ปริมาณของวัคซีนี่ดูดเข้ากระบอกฉีดยาไม่เหมาะสม เป็นต้น)</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_6" value="1" checked>
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_6" value="2" >
													ไม่สามารถประเมินได้
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_6" value="3">
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_6">
												<input type="text" id="other_patient_immunized_6_text" name="other_patient_immunized_6" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>7.จากการสอบสวน : ท่านคิดว่ามีความผิดพลดในการเก็บหรือขนส่งวัคซีน(เช่น ระบบลูกโซ่ความเย็นขณะส่งการเก็บรักษาวัคซีน
													 หรือในระหว่างให้บริการไม่ดี เป็นต้น) :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_7" value="1" checked>
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_7" value="2" >
													ไม่สามารถประเมินได้
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_7" value="3">
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_7">
													<input type="text" id="other_other_patient_immunized_7_text" name="other_patient_immunized_7" class="form-control" placeholder="ระบุ" hidden="true">
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>8.จำนวนผู้ได้รับวัคซีนขวดเดียวกันกับผู้ป่วย :</label>
												</div>
											</div>
											<div class="col-lg-3">
													<input type="text" name="patient_immunized_8" class="form-control" placeholder="ระบุจำนวนผู้ได้รับวัคซีนขวดเดียวกันกับผู้ป่วย">
											</div>
											<div class="col-lg-3">
													<input type="text" name="patient_immunized_8_1" class="form-control" placeholder="ระบุจำนวนผู้มีอาการป่วย">
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>9.จำนวนผู้ได้รับวัคซีนวันเดียวกันกับผู้ป่วย :</label>
												</div>
											</div>
											<div class="col-lg-3">
													<input type="text" name="patient_immunized_9" class="form-control" placeholder="จำนวนผู้ได้รับวัคซีนวันเดียวกันกับผู้ป่วย">
											</div>
											<div class="col-lg-3">
													<input type="text" name="patient_immunized_9_1" class="form-control" placeholder="ระบุจำนวนผู้มีอาการป่วย">
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>10.จำนวนผู้ได้รับวัคซีน lot no.เดียวกันในสถานบริการแห่งอื่นๆในเขตอำเภอเดียวกันจำนวนรวม :</label>
												</div>
											</div>
											<div class="col-lg-5">
													<input type="text" name="patient_immunized_10"  class="form-control" placeholder="จำนวนผู้ได้รับวัคซีน lot no.เดียวกันในสถานบริการแห่งอื่นๆในเขตอำเภอเดียวกัน">
											</div>
											<div class="col-lg-3">
													<input type="text" name="patient_immunized_10_1" class="form-control" placeholder="ระบุจำนวนสถานบริการ">
											</div>
											<div class="col-lg-3">
													<input type="text" name="patient_immunized_10_2" class="form-control" placeholder="ระบุจำนวนผู้มีอาการป่วย">
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>11.ผู้ป่วยรายนี้เป็นส่วนหนึ่งของการป่วยเป็นกลุ่มก้อน :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_11" value="1" checked>
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_11" value="2" >
													ไม่ทราบ
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_11" value="3">
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_11">
												<input type="text"  id="other_patient_immunized_11_text" name="other_patient_immunized_11" class="form-control" placeholder="มีจำนวนผู้ป่วยทั้งหมด...คน" hidden="true">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>ผู้ป่วยทั้งหมดได้รับวัคซีนขวดเดียวกัน :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_12" value="1" checked>
													ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_12" value="2" >
													ไม่ทราบ
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_12" value="3">
													ไม่ใช่
													</label>
												</div>
											</div>
											<div class="col-lg-3">
												<div id="other_patient_immunized_12">
												<input type="text"  id="other_patient_immunized_12_text" name="other_patient_immunized_12" class="form-control" placeholder="มีจำนวนขวดวัคซีน่ผู้ป่วยได้รับ...ขวด" hidden="true">
												</div>
												</div>
											</div>
										</div>
									</div>
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>12.มีการประเมินของเด็กก่อนได้รับวัคซีน :</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_13" value="1" checked>
													มี
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_13" value="2" >
													ไม่มี
													</label>
												</div>
											</div>
											<div class="col-lg-2">
												<div class="radio">
													<label>
													<input type="radio" name="patient_immunized_13" value="3">
													ไม่ทราบ
													</label>
												</div>
											</div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_4">
			<div class="row">
				<!--หัวข้อที่5 -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">(6)ข้อมูลการให้บริการวัคซีนในสถานที่ที่ผู้ป่วยได้รับวัคซีน</h3>
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
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>กระบอกฉีดยาและเข็มฉีดยาที่ใช้ : ใช้ AD syringes หรือไม่</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1" value="3">
														ไม่ทราบ
														</label>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>ถ้าไม่ใช้ AD syringes ใช้กระบอกฉีดยาชนิดใด :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1_1" value="1" checked>
														ใช้ครั้งเดียวทิ้ง
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1_1" value="2" >
														นำกลับมาใช้ใหม่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1_1" value="3">
														แก้ว
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="immunization_practices_1_1" value="4">
														อื่นๆ
														</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div id="other_immunization_practices_1_1" style="display: none">
													<input type="text" id="immunization_practices_1_1_text" name="other_immunization_practices_1_1" class="form-control" placeholder="ระบุ" hidden="true">
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
									<!-- general form elements -->
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="control-label">
												<label>รายละเอียดเพิ่มเติมและข้อคิดเห็น :</label>
												</div>
											</div>
											<div class="col-lg-12">
												<textarea name="immunization_practices_1_4" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>สำหรับวัคซีนที่ต้องผสมทำละลายผงวัคซีน :</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>ใช้กระบอกฉีดยาเดียวกันในการดูดตัวทำละลายวัคซีนชนิดเดียวกันแต่ใช้กับหลายขวดวัคซีน</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_1" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_1" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_1" value="3">
														ไม่ทราบ
														</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>ใช้กระบอกฉีดยาเดียวกันในการดูดตัวทำละลายวัคซีนโดยใช้วัคซีนหลายชนิด</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_2" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_2" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_2" value="3">
														ไม่ทราบ
														</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>แยกกระบอกฉีดยาในการดูดตัวทำละลายวัคซีนในแต่ละขวดวัคซีน</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_3" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_3" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="reconstitution_3" value="3">
														ไม่ทราบ
														</label>
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
										<div class="col-lg-12">
											<div class="control-label">
											<label>วัคซีนและตัวทำละลายที่ใช้ เป็นของบริษัทผู้ผลิตเดียวกันหรือไม่ : </label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reconstitution_4" value="1" checked>
												ใช่
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reconstitution_4" value="2" >
												ไม่ใช่
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reconstitution_4" value="3">
												ไม่ทราบ
												</label>
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
											<div class="col-lg-12">
												<div class="control-label">
												<label>รายละเอียดเพิ่มเติมและข้อคิดเห็น :</label>
												</div>
											</div>
											<div class="col-lg-12">
												<textarea name="reconstitution_5" class="form-control" rows="3" placeholder="Enter ..."></textarea>
											</div>
										</div>
									</div>
									</div>
								</div>
								<div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_5">
			<div class="row">
				<!--หัวข้อที่5 -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">(7)ระบบลูกโซ่ความเย็นและการขนส่ง (บันทึกข้อมูลส่วนนี้โดยการถาใ หรือโดยการสังเกตุ)</h3>
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
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีการบันทึกอุณหภูมิตู้เย็นหรือไม่ :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_1" value="1" checked>
														ไม่มี
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_1" value="2">
														มี
														</label>
													</div>
												</div>
												<div class="col-lg-3">
													<div id="vaccine_storage_1_1" style="display: none">
													<input type="text" id="other_vaccine_storage_1_1_text" name="vaccine_storage_1_1" class="form-control" placeholder="ระบุ" hidden="true">
													</div>
												</div>
											</div>
										</div>
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>ถ้ามี พบว่าอุณหภูมิตู้เย็นต่ำกว่า +2 หรือสูงกว่า +8 องศาเซลเซียส หลังจากนำวัคซีนเข้าไปเก็บแล้วหรือไม่ :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_1_2" value="1" checked>
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_1_2" value="2" >
														ใช่
														</label>
													</div>
												</div>
											</div>
										</div>
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>ถ้าใช่ ให้เพิ่มเติมรายละเอียดในการแก้ไขปัญหาเมื่อเกิดเหตุการณ์ฉุกเฉินในระบบลูกโซ่ความเย็น(cold chain breakdown) :</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="radio">
														<textarea name="vaccine_storage_1_3" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>ได้ปฏิบัติตามมาตรฐานการเก็บรักษา ตัวทำละลาย และการใช้กระบอกฉีดยาหรือไม่ :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_2" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_2" value="2" >
														ไม่ใช
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_2" value="3">
														ไม่ทราบ
														</label>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีสิ่งของอื่น (เข่น ยา อาหาร) นอกจากวัคซีน และตัวทำละลาย เก็บรักษาไว้ในตู้เย็นหรือไม่ :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_3" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_3" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_3" value="3">
														ไม่ทราบ
														</label>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีวัคซีนที่ผสมแล้วยังเหลืออยู่เก็บรักษาไว้ในตู้เย็นหรือไม่ :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_4" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_4" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_4" value="3">
														ไม่ทราบ
														</label>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีวัคซีนที่เสื่อมคุณภาพเก็บรักษาไว้ในตู้เย็นหรือไม่ (เช่น วัคซีนหมดอายุ ไม่มีฉลากที่ขวด VVM อยู่ในระยะ 3-4 หรือวัคซีนที่แข็งตัว)  :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_5" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_5" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_5" value="3">
														ไม่ทราบ
														</label>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีตัวทำละลายที่เสื่อมคุณภาพเก็บรักษาไว้ในตู้เย็นหรือไม่ (เช่น ตัวทำละลายหมดอายุ ขวดมีรอยร้าว คนละบริษัทกับวัคซีน ขวดบรรจุสกปรก)  :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_6" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_6" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_storage_6" value="3">
														ไม่ทราบ
														</label>
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
									<div class="col-lg-12">
										<div class="control-label">
										<label>รายละเอียดเพิ่มเติม  :</label>
										<textarea name="vaccine_storage_7" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>อุปกรณ์ที่ให้ในการขนส่ง  :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_1" value="1" checked>
														กระติกวัคซีน
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_1" value="2" >
														กล่องโฟม
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_1" value="3">
														อุปกรณอื่นๆ
														</label>
													</div>
												</div>
											</div>
										</div>
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>ระบุ :</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="radio">
														<textarea name="vaccine_transportation_1_1" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>ขนส่งวัคซีนมาที่สถานที่ให้วัคซีน  :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_2" value="1" checked>
														ก่อนวันให้บริการ
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_2" value="2" >
														ในวันที่ให้บริการ
														</label>
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีการ conditioning ice-pack หรือไม่   :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_3" value="1" checked>
														ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_3" value="2" >
														ไม่ใช่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="vaccine_transportation_3" value="3">
														ไม่ทราบ
														</label>
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
										<div class="col-lg-12">
											<div class="control-label">
											<label>รายละเอียดเพิ่มเติม  :</label>
											<textarea name="vaccine_transportation_4" class="form-control" rows="3" placeholder="Enter ..."></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_6">
			<div class="row">
				<!--หัวข้อที่5 -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">(8)การสอบสวนในชุมชน(เยี่ยมพื้นที่ สัมภาษณ์บิดามารดา ผู้ปกครอง และบุคคลอื่นๆที่เกี่ยวข้อง)</h3>
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
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="control-label">
													<label>มีเหตุการณ์ที่มีผู้ป่วยคล้ายกับผู้ป่วยรายนี้เกิดขึ้นในช่วงเวลาใกล้เคียงกับผู้ป่วยรายนี้และเกิดในตำบลเดียวกันกับผู้ป่วยรายนี้หรือไม่ :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="community_inv_1" value="1" checked>
														มี
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="community_inv_1" value="2" >
														ไม่มี
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="community_inv_1" value="3">
														ไม่ทราบ
														</label>
													</div>
												</div>
											<div class="col-lg-12">
												<div class="col-lg-4">
													<div id="other_community_inv_1">
													<input id="other_community_inv_1_text" name="community_inv_1_1" type="text" class="form-control" placeholder="ถ้ามี มีกี่ราย" hidden="true">
													<input id="other_community_inv_1_text" name="community_inv_1_2" type="text" class="form-control" placeholder="เป็นผู้ได้รับวัคซีนกี่ราย" hidden="true">
													<input id="other_community_inv_1_text" name="community_inv_1_3" type="text" class="form-control" placeholder="ไม่ได้รับวัคซีนกี่ราย" hidden="true">
													<input id="other_community_inv_1_text" name="community_inv_1_4" type="text" class="form-control" placeholder="ไม่ทราบ" hidden="true">
													<input id="other_community_inv_1_text" name="community_inv_1_5" type="text" class="form-control" placeholder="อธิบายรายละเอียด" hidden="true">
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
												<div class="col-lg-12">
													<div class="control-label">
													<label>ถ้าไม่ใช้ AD syringes ใช้กระบอกฉีดยาชนิดใด :</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="no_ad_syringes" value="1" checked>
														ใช้ครั้งเดียวทิ้ง
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="no_ad_syringes" value="2" >
														นำกลับมาใช้ใหม่
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="no_ad_syringes" value="3">
														แก้ว
														</label>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="radio">
														<label>
														<input type="radio" name="no_ad_syringes" value="4">
														อื่นๆ
														</label>
													</div>
												</div>
												<div class="col-lg-6">
													<div id="other_no_ad_syringes" style="display: none">
													<input name="other_no_ad_syringes" id="other_no_ad_syringes_text" type="text" class="form-control" placeholder="ระบุ" hidden="true">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<!-- /.tab-pane -->
		<div class="tab-pane" id="tab_7">
			<div class="row">
				<!--หัวข้อที่5 -->
				<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">(9)ข้อมูลอื่นๆที่ตรวจพบหรือสังเกตุได้และข้อคิดเห็น</h3>
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
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-3">
													<label>ข้อมูลอื่นๆที่ตรวจพบหรือสังเกตุได้และข้อคิดเห็น : </label>
													<textarea name="events" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
											<div class="col-lg-3">
												<label>ชื่อ-สกุลผู้สอบสวน : </label>
												<input name="investigater_1[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
											</div>
											<div class="col-lg-3">
												<label>ตำแหน่ง : </label>
												<input name="investigater_1_2[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
											</div>
											<div class="col-lg-3">
												<label>หน่วยงาน : </label>
												<input name="investigater_1_3[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
											</div>
											<div class="col-lg-3">
												<label>โทร : </label>
												<input name="investigater_1_4[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
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
												<div class="col-lg-3">
													<label>ชื่อ-สกุลผู้สอบสวน : </label>
													<input name="investigater_1[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>ตำแหน่ง : </label>
													<input name="investigater_1_2[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>หน่วยงาน : </label>
													<input name="investigater_1_3[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>โทร : </label>
													<input name="investigater_1_4[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
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
												<div class="col-lg-3">
													<label>ชื่อ-สกุลผู้สอบสวน : </label>
													<input name="investigater_1[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>ตำแหน่ง : </label>
													<input name="investigater_1_2[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>หน่วยงาน : </label>
													<input name="investigater_1_3[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>โทร : </label>
													<input name="investigater_1_4[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
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
												<div class="col-lg-3">
													<label>ชื่อ-สกุลผู้สอบสวน : </label>
													<input name="investigater_1[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>ตำแหน่ง : </label>
													<input name="investigater_1_2[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>หน่วยงาน : </label>
													<input name="investigater_1_3[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>โทร : </label>
													<input name="investigater_1_4[]" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
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
												<div class="col-lg-3">
													<label>วันที่สอบสวน : </label>
													<div class="input-group date">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
													<input id="datepicker_investigater_2" name="investigater_2" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
											</div>
												<div class="col-lg-3">
													<label>วันที่บันทึกแบบสอบสวน(AEFI2) : </label>
													<div class="input-group date">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
													<input id="datepicker_investigater_3" name="investigater_3" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
											</div>
												<div class="col-lg-3">
													<label>วันที่ส่งแบบสอบสวน(AEFI2) : </label>
													<div class="input-group date">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
													<input id="datepicker_investigater_4" name="investigater_4" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
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
											<div class="col-lg-3">
												<label>ชื่อ-สกุลผู้ส่งแบบสอบสวน(AEFI2) : </label>
												<input name="investigater_5" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
											</div>
											<div class="col-lg-3">
												<label>ตำแหน่ง: </label>
												<input name="investigater_5_2" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
											</div>
											<div class="col-lg-3">
												<label>หน่วยงาน : </label>
												<input name="investigater_5_3" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
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
												<div class="col-lg-3">
													<label>โทรหน่วยงาน : </label>
													<input name="investigater_8" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>มือถือ : </label>
													<input name="investigater_9" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
												<div class="col-lg-3">
													<label>E mail : </label>
													<input name="investigater_10" type="text" class="form-control" placeholder="ระบุตำแหน่ง">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>

		<!-- /.tab-pane -->
	  </div>
  <!-- /.row -->
</section>

@include('AEFI.layout.footerScript')

<script type="text/javascript">
	$('.provinces').change(function(){
		if ($(this).val()!='') {
			var select=$(this).val();
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url:"{{route('dropdown.fetch')}}",
				method:"POST",
				data:{select:select, _token:_token},
				success:function(result){
					$('.amphures').html(result);
				}
			})
		}
	});
</script>
<script type="text/javascript">
	$('.amphures').change(function(){
		var selectD=$(this).val();
		//alert(selectD);
		if ($(this).val()!='') {
			//var selectD=$(this).val();
			console.log(selectD);
			var _token=$('input[name="_token"]').val();
			$.ajax({
				url:"{{route('dropdown.fetchD')}}",
				method:"POST",
				data:{select:selectD, _token:_token},
				success:function(result){
					$('.district').html(result);
				}
			})
		}
	});
</script>

<!-- /.content -->
<script>
    $(document).ready(function(){
        $(".add-rowvac").click(function(){
            var name_of_vaccine = $("#name_of_vaccine").val();
            var vaccine_volume = $("#vaccine_volume").val();
			var vaccination_site = $("#vaccination_site").val();
			var dose = $("#route_of_vaccination").val();
			var date_of_vaccination = $("#vaccine_volume").val();
			var time_of_vaccination = $("#vaccination_site").val();
			var route_of_vaccination = $("#route_of_vaccination").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>"
			 + name_of_vaccine + "</td><td>"
			 + vaccine_volume + "</td><td>"
			  + vaccination_site + "</td><td>"
			  + dose + "</td><td>"
			  + date_of_vaccination + "</td><td>"
			  + time_of_vaccination + "</td><td>"
			   + route_of_vaccination + "</td></tr>";
            $("table tbody").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".add-rowSolvent").click(function(){
            var  manufacturer= $("#manufacturer").val();
            var lot_number = $("#lot_number").val();
			var datepicker_expiry_date = $("#datepicker_expiry_date").val();
			var name_of_diluent = $("#name_of_diluent").val();
			var lot_number_diluent = $("#lot_number_diluent").val();
			var datepicker_expiry_date_diluent = $("#datepicker_expiry_date_diluent").val();
			var datepicker_date_of_reconstitution = $("#datepicker_date_of_reconstitution").val();
			var time_of_reconstitution = $("#time_of_reconstitution").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>"
			 + manufacturer + "</td><td>"
			 + lot_number + "</td><td>"
			  + datepicker_expiry_date + "</td><td>"
			  + name_of_diluent + "</td><td>"
			  + lot_number_diluent + "</td><td>"
			  + datepicker_expiry_date_diluent + "</td><td>"
			  + datepicker_date_of_reconstitution + "</td><td>"
			   + time_of_reconstitution + "</td></tr>";
            $("table tbody").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>
@stop
