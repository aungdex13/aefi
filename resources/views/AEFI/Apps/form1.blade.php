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
	<div class="row">
		<!--หัวข้อที่5 -->
		<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-danger">
			<div class="box-header with-border">
			<h3 class="box-title">(1)ข้อมูลผู้ป่วย</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
	<form role="form" action="{{ route('insertform1') }}" method="post" >

			<div class="box-body">
				{{-- คอรั่มภายใน3.2 --}}
				<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<!-- checkbox3.2.1 -->
						<div class="form-group">
								<div class="col-md-12">
								  <label>
									ประเมินสาเหตุเบื้องต้น
								  </label>
								</div>
						</div>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
							{{-- input content --}}
							<div class="box-body">
										{{ csrf_field() }}
								<!-- เลขที่ผู้ป่วย -->
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
		<!-- /.box -->
			</div>
			<!--หัวข้อที่2 -->
			<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title">(2) ข้อมูลวัคซีน / สถานที่รับวัคซีน (รพ./รพ.สต./คลินิก/ศูนย์บริการสาธารณสุข)</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->

				<div class="box-body">
					<div class="box-header with-border">
						<div class="col-md-8">
		    				<h3 class="box-title">วัคซีน</h3>
						</div>
						<div class="col-md-4">
							<h3 class="box-title">ตัวทำละลาย</h3>
						</div>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
						<table class="table table-bordered" id="maintable">
  		                <tr>
						  <th>idx</th>
  		                  <th>ชื่อวัคซีน</th>
  		                  <th>ปริมานที่ให้</th>
  		                  <th>วิธีที่ให้</th>
  						  <th>ตำแหน่ง</th>
  						  <th>เข็มที่/ครั้งที่</th>
  						  <th>ว/ด/ปที่ได้รับ</th>
  						  <th>เวลาที่ได้รับ</th>
  						  <th>ชื่อผู้ผลิต</th>
  						  <th>เลขที่ผลิต</th>
  						  <th>วันหมดอายุ</th>
  						  <th>ชื่อตัวทำละลาย</th>
  						  <th>เลขที่ผลิต</th>
  						  <th>วันหมดอายุ</th>
  						  <th>ว/ด/ปที่ผสม</th>
  		                  <th>เวลาที่ผสม</th>
  		                </tr>
						<tr class="data-contact-person">
  						<td>
  						<select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value=""class=form-control>
							<?php
  								foreach ($arr_history_of_vaccine as $k=>$v) {
							?>
  						<option class=badge filter badge-info data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
  									<?php } ?>
  						</select>
  						</td>
  					<td>
  					<select type="text" id="vaccine_volume" name="vaccine_volume[]" value=""class="form-control">
							<?php
							foreach ($arr_vaccine_volume as $k=>$v) {
							?>
  					<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
  								<?php } ?>
  					</select>
  					</td>
  				<td>
  				<select type="text" id="route_of_vaccination" name="route_of_vaccination[]" value="" class="form-control">
					<?php
  						foreach ($arr_route_of_vaccination as $k=>$v) {
					?>
  				<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
  							<?php } ?>
  				</select>
  				</td>
  			<td>
  			<select type="text" id="vaccination_site" name="vaccination_site[]" value="" class="form-control">
				<?php
  					foreach ($arr_vaccination_site as $k=>$v) {
				?>
  			<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
  							<?php } ?>
  			</select>
  			</td>
  		<td>
  		<input type="text" id="dose" name="dose[]" value="" class="form-control">
  		</td>
  		<td><input type="text" id="datepicker" name="date_of_vaccination[]" value="" class="form-control"></td>

  		<td>
  		<input type="text" id="time_of_vaccination" name="time_of_vaccination[]" value="" class="form-control">
  		</td>
  						<td>
  						<select type="text" id="manufacturer" name="manufacturer[]" value="" class="form-control">
							<?php
  								foreach ($arr_manufacturer as $k=>$v) {
							?>
  						<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
  									 <?php } ?>
  						</select>
  						</td>
  						<td>
  						<input type="text" id="lot_number" name="lot_number[]" value="" class="form-control">
  						</td>
  						<td>
  						<input type="text" id="datepicker_expiry_date" name="expiry_date[]" value="" class="form-control">
  						</td>
  						<td>
  						<input type="text" id="name_of_diluent" name="name_of_diluent[]" value=""class="form-control">
  						</td>
  						<td>
  						<input type="text" id="lot_number_diluent" name="lot_number_diluent[]" value="" class="form-control">
  						</td>
  						<td>
  						<input type="text" id="datepicker_expiry_date_diluent" name="expiry_date_diluent[]" value="" class="form-control">
  						</td>
  						<td><input type="text" id="datepicker_date_of_reconstitution" name="date_of_reconstitution[]" value="" class="form-control"></td>
  						<td><input type="text" id="time_of_reconstitution" name="time_of_reconstitution[]" value="" class="form-control"></td>
  						</tr>

						<tr class="data-contact-person">
						<td>
						<select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value=""class=form-control>
							<?php
								foreach ($arr_history_of_vaccine as $k=>$v) {
							?>
						<option class=badge filter badge-info data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									<?php } ?>
						</select>
						</td>
					<td>
					<select type="text" id="vaccine_volume" name="vaccine_volume[]" value=""class="form-control">
							<?php
							foreach ($arr_vaccine_volume as $k=>$v) {
							?>
					<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
								<?php } ?>
					</select>
					</td>
				<td>
				<select type="text" id="route_of_vaccination" name="route_of_vaccination[]" value="" class="form-control">
					<?php
						foreach ($arr_route_of_vaccination as $k=>$v) {
					?>
				<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
				</select>
				</td>
			<td>
			<select type="text" id="vaccination_site" name="vaccination_site[]" value="" class="form-control">
				<?php
					foreach ($arr_vaccination_site as $k=>$v) {
				?>
			<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
			</select>
			</td>
		<td>
		<input type="text" id="dose" name="dose[]" value="" class="form-control">
		</td>
		<td><input type="text" id="datepicker" name="date_of_vaccination[]" value="" class="form-control"></td>

		<td>
		<input type="text" id="time_of_vaccination" name="time_of_vaccination[]" value="" class="form-control">
		</td>
						<td>
						<select type="text" id="manufacturer" name="manufacturer[]" value="" class="form-control">
							<?php
								foreach ($arr_manufacturer as $k=>$v) {
							?>
						<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									 <?php } ?>
						</select>
						</td>
						<td>
						<input type="text" id="lot_number" name="lot_number[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date" name="expiry_date[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="name_of_diluent" name="name_of_diluent[]" value=""class="form-control">
						</td>
						<td>
						<input type="text" id="lot_number_diluent" name="lot_number_diluent[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date_diluent" name="expiry_date_diluent[]" value="" class="form-control">
						</td>
						<td><input type="text" id="datepicker_date_of_reconstitution" name="date_of_reconstitution[]" value="" class="form-control"></td>
						<td><input type="text" id="time_of_reconstitution" name="time_of_reconstitution[]" value="" class="form-control"></td>
						</tr>

						<tr class="data-contact-person">
						<td>
						<select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value=""class=form-control>
							<?php
								foreach ($arr_history_of_vaccine as $k=>$v) {
							?>
						<option class=badge filter badge-info data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									<?php } ?>
						</select>
						</td>
					<td>
					<select type="text" id="vaccine_volume" name="vaccine_volume[]" value=""class="form-control">
							<?php
							foreach ($arr_vaccine_volume as $k=>$v) {
							?>
					<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
								<?php } ?>
					</select>
					</td>
				<td>
				<select type="text" id="route_of_vaccination" name="route_of_vaccination[]" value="" class="form-control">
					<?php
						foreach ($arr_route_of_vaccination as $k=>$v) {
					?>
				<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
				</select>
				</td>
			<td>
			<select type="text" id="vaccination_site" name="vaccination_site[]" value="" class="form-control">
				<?php
					foreach ($arr_vaccination_site as $k=>$v) {
				?>
			<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
			</select>
			</td>
		<td>
		<input type="text" id="dose" name="dose[]" value="" class="form-control">
		</td>
		<td><input type="text" id="datepicker" name="date_of_vaccination[]" value="" class="form-control"></td>

		<td>
		<input type="text" id="time_of_vaccination" name="time_of_vaccination[]" value="" class="form-control">
		</td>
						<td>
						<select type="text" id="manufacturer" name="manufacturer[]" value="" class="form-control">
							<?php
								foreach ($arr_manufacturer as $k=>$v) {
							?>
						<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									 <?php } ?>
						</select>
						</td>
						<td>
						<input type="text" id="lot_number" name="lot_number[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date" name="expiry_date[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="name_of_diluent" name="name_of_diluent[]" value=""class="form-control">
						</td>
						<td>
						<input type="text" id="lot_number_diluent" name="lot_number_diluent[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date_diluent" name="expiry_date_diluent[]" value="" class="form-control">
						</td>
						<td><input type="text" id="datepicker_date_of_reconstitution" name="date_of_reconstitution[]" value="" class="form-control"></td>
						<td><input type="text" id="time_of_reconstitution" name="time_of_reconstitution[]" value="" class="form-control"></td>
						</tr>

						<tr class="data-contact-person">
						<td>
						<select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value=""class=form-control>
							<?php
								foreach ($arr_history_of_vaccine as $k=>$v) {
							?>
						<option class=badge filter badge-info data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									<?php } ?>
						</select>
						</td>
					<td>
					<select type="text" id="vaccine_volume" name="vaccine_volume[]" value=""class="form-control">
							<?php
							foreach ($arr_vaccine_volume as $k=>$v) {
							?>
					<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
								<?php } ?>
					</select>
					</td>
				<td>
				<select type="text" id="route_of_vaccination" name="route_of_vaccination[]" value="" class="form-control">
					<?php
						foreach ($arr_route_of_vaccination as $k=>$v) {
					?>
				<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
				</select>
				</td>
			<td>
			<select type="text" id="vaccination_site" name="vaccination_site[]" value="" class="form-control">
				<?php
					foreach ($arr_vaccination_site as $k=>$v) {
				?>
			<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
			</select>
			</td>
		<td>
		<input type="text" id="dose" name="dose[]" value="" class="form-control">
		</td>
		<td><input type="text" id="datepicker" name="date_of_vaccination[]" value="" class="form-control"></td>

		<td>
		<input type="text" id="time_of_vaccination" name="time_of_vaccination[]" value="" class="form-control">
		</td>
						<td>
						<select type="text" id="manufacturer" name="manufacturer[]" value="" class="form-control">
							<?php
								foreach ($arr_manufacturer as $k=>$v) {
							?>
						<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									 <?php } ?>
						</select>
						</td>
						<td>
						<input type="text" id="lot_number" name="lot_number[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date" name="expiry_date[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="name_of_diluent" name="name_of_diluent[]" value=""class="form-control">
						</td>
						<td>
						<input type="text" id="lot_number_diluent" name="lot_number_diluent[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date_diluent" name="expiry_date_diluent[]" value="" class="form-control">
						</td>
						<td><input type="text" id="datepicker_date_of_reconstitution" name="date_of_reconstitution[]" value="" class="form-control"></td>
						<td><input type="text" id="time_of_reconstitution" name="time_of_reconstitution[]" value="" class="form-control"></td>
						</tr>

						<tr class="data-contact-person">
						<td>
						<select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value=""class=form-control>
							<?php
								foreach ($arr_history_of_vaccine as $k=>$v) {
							?>
						<option class=badge filter badge-info data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									<?php } ?>
						</select>
						</td>
					<td>
					<select type="text" id="vaccine_volume" name="vaccine_volume[]" value=""class="form-control">
							<?php
							foreach ($arr_vaccine_volume as $k=>$v) {
							?>
					<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
								<?php } ?>
					</select>
					</td>
				<td>
				<select type="text" id="route_of_vaccination" name="route_of_vaccination[]" value="" class="form-control">
					<?php
						foreach ($arr_route_of_vaccination as $k=>$v) {
					?>
				<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
				</select>
				</td>
			<td>
			<select type="text" id="vaccination_site" name="vaccination_site[]" value="" class="form-control">
				<?php
					foreach ($arr_vaccination_site as $k=>$v) {
				?>
			<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
			</select>
			</td>
		<td>
		<input type="text" id="dose" name="dose[]" value="" class="form-control">
		</td>
		<td><input type="text" id="datepicker" name="date_of_vaccination[]" value="" class="form-control"></td>

		<td>
		<input type="text" id="time_of_vaccination" name="time_of_vaccination[]" value="" class="form-control">
		</td>
						<td>
						<select type="text" id="manufacturer" name="manufacturer[]" value="" class="form-control">
							<?php
								foreach ($arr_manufacturer as $k=>$v) {
							?>
						<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									 <?php } ?>
						</select>
						</td>
						<td>
						<input type="text" id="lot_number" name="lot_number[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date" name="expiry_date[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="name_of_diluent" name="name_of_diluent[]" value=""class="form-control">
						</td>
						<td>
						<input type="text" id="lot_number_diluent" name="lot_number_diluent[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date_diluent" name="expiry_date_diluent[]" value="" class="form-control">
						</td>
						<td><input type="text" id="datepicker_date_of_reconstitution" name="date_of_reconstitution[]" value="" class="form-control"></td>
						<td><input type="text" id="time_of_reconstitution" name="time_of_reconstitution[]" value="" class="form-control"></td>
						</tr>

						<tr class="data-contact-person">
						<td>
						<select type="text" id="name_of_vaccine" name="name_of_vaccine[]" value=""class=form-control>
							<?php
								foreach ($arr_history_of_vaccine as $k=>$v) {
							?>
						<option class=badge filter badge-info data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									<?php } ?>
						</select>
						</td>
					<td>
					<select type="text" id="vaccine_volume" name="vaccine_volume[]" value=""class="form-control">
							<?php
							foreach ($arr_vaccine_volume as $k=>$v) {
							?>
					<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
								<?php } ?>
					</select>
					</td>
				<td>
				<select type="text" id="route_of_vaccination" name="route_of_vaccination[]" value="" class="form-control">
					<?php
						foreach ($arr_route_of_vaccination as $k=>$v) {
					?>
				<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
				</select>
				</td>
			<td>
			<select type="text" id="vaccination_site" name="vaccination_site[]" value="" class="form-control">
				<?php
					foreach ($arr_vaccination_site as $k=>$v) {
				?>
			<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
							<?php } ?>
			</select>
			</td>
		<td>
		<input type="text" id="dose" name="dose[]" value="" class="form-control">
		</td>
		<td><input type="text" id="datepicker" name="date_of_vaccination[]" value="" class="form-control"></td>

		<td>
		<input type="text" id="time_of_vaccination" name="time_of_vaccination[]" value="" class="form-control">
		</td>
						<td>
						<select type="text" id="manufacturer" name="manufacturer[]" value="" class="form-control">
							<?php
								foreach ($arr_manufacturer as $k=>$v) {
							?>
						<option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
									 <?php } ?>
						</select>
						</td>
						<td>
						<input type="text" id="lot_number" name="lot_number[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date" name="expiry_date[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="name_of_diluent" name="name_of_diluent[]" value=""class="form-control">
						</td>
						<td>
						<input type="text" id="lot_number_diluent" name="lot_number_diluent[]" value="" class="form-control">
						</td>
						<td>
						<input type="text" id="datepicker_expiry_date_diluent" name="expiry_date_diluent[]" value="" class="form-control">
						</td>
						<td><input type="text" id="datepicker_date_of_reconstitution" name="date_of_reconstitution[]" value="" class="form-control"></td>
						<td><input type="text" id="time_of_reconstitution" name="time_of_reconstitution[]" value="" class="form-control"></td>
						</tr>
  		              </table>

		            </div>
				</div>

			</div>
			<!-- /.box -->
			</div>
			<!--หัวข้อที่3 -->
			<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
				<h3 class="box-title">(3) อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรคและวินิจฉัย</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->

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
										<input type="checkbox" class="flat-red" name="rash" value="0027" checked>
										Rash
									  </label>
									</div>
									<div class="col-md-4">
									  <label>
										<input type="checkbox" class="flat-red" name="erythema" value="0028">
										Erythema
									  </label>
									</div>
									<div class="col-md-4">
									  <label>
										<input type="checkbox" class="flat-red" name="urticaria" value="0044">
										Urticaria
									  </label>
								  </div>
							</div>
							<div class="form-group">
									<div class="col-md-4">
									  <label>
										<input type="checkbox" name="itching" class="flat-red" value="0026">
										Itching
									  </label>
									</div>
									<div class="col-md-4">
									  <label>
										<input type="checkbox" name="edema" class="flat-red" value="0003A">
										Edema
									  </label>
									</div>
									<div class="col-md-5">
									  <label>
										<input type="checkbox" name="angioedema" class="flat-red" value="0003">
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
											<input type="checkbox" name="fainting" class="flat-red" value="1">
											Fainting
										  </label>
										</div>
										<div class="col-md-6">
										  <label>
											<input type="checkbox" name="hyperventilation" class="flat-red" value="0517">
											Hyperventilation
										  </label>
										</div>
								</div>
								<div class="form-group">
										<div class="col-md-4">
										  <label>
											<input type="checkbox" name="syncope" class="flat-red" value="0223">
											Syncope
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="checkbox" name="headche" class="flat-red" value="1">
											Headche
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="checkbox" name="dizziness" class="flat-red" value="0101">
											Dizziness
										  </label>
									  </div>
								</div>
								<div class="form-group">
										<div class="col-md-4">
										  <label>
											<input type="checkbox" name="fatigue" class="flat-red" value="0724">
											Fatigue
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="checkbox" name="malaise" class="flat-red" value="0728">
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
										<input type="checkbox" name="dyspepsia" class="flat-red" value="0279">
										Dyspepsia
									  </label>
									</div>
									<div class="col-md-4">
									  <label>
										<input type="checkbox" name="diarrhea" class="flat-red" value="1">
										Diarrhea
									  </label>
									</div>
									<div class="col-md-4">
									  <label>
										<input type="checkbox"name="nausea" class="flat-red" value="0308">
										Nausea
									  </label>
								  </div>
							</div>
							<div class="form-group">
									<div class="col-md-4">
									  <label>
										<input type="checkbox" name="vomiting" class="flat-red" value="0228">
										Vomiting
									  </label>
									</div>
									<div class="col-md-6">
									  <label>
										<input type="checkbox" name="abdominal_pain" class="flat-red" value="0268">
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
										<input type="checkbox" name="arthalgia" class="flat-red" value="1">
										Arthalgia
									  </label>
									</div>
									<div class="col-md-4">
									  <label>
										<input type="checkbox" name="myalgia" class="flat-red" value="0072">
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
										<input type="checkbox" name="fever38c" class="flat-red" value="0725">
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
													<input type="checkbox" name="swelling_at_the_injection" class="flat-red" value="1">
													บวมบริเวณที่ฉีดนานเกิน3วัน
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" name="swelling_beyond_nearest_joint" class="flat-red" value="1">
													บวมลามไปถึงข้อที่ใกล้ที่สุด
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" name="lymphadenopathy" class="flat-red" value="0577">
													Lymphadenopathy
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" name="lymphadenitis" class="flat-red" value="0577D">
													Lymphadenitis
												  </label>
												</div>
										</div>
										<div class="form-group">
												<div class="col-md-6">
												  <label>
													<input type="checkbox" name="sterile_abscess" class="flat-red" value="0051">
													Sterile abscess
												  </label>
												</div>
												<div class="col-md-6">
												  <label>
													<input type="checkbox" name="bacterial_abscess" class="flat-red" value="1">
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
										<input type="checkbox" name="febrile_convulsion" class="flat-red" value="1">
										Febrile convulsion
									  </label>
									</div>
									<div class="col-md-12">
									  <label>
										<input type="checkbox" name="afebrile_convulsion" class="flat-red" value="1">
										Afebrile convulsion
									  </label>
									</div>
									<div class="col-md-12">
									  <label>
										<input type="checkbox" name="encephalopathy" class="flat-red" value="0105">
										Encephalopathy
									  </label>
									</div>
							</div>
							<div class="form-group">
									<div class="col-md-6">
									  <label>
										<input type="checkbox" name="flaccid_paralysis" class="flat-red" value="0139">
										Flaccid paralysis
									  </label>
									</div>
									<div class="col-md-6">
									  <label>
										<input type="checkbox" name="spastic_paralysis" class="flat-red" value="0775">
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
											<input name="hhe" type="checkbox"   value="1704">
											Hypotonic Hyporesponsive episode (HHE)
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="persistent_inconsolable_crying" type="checkbox"  value="1">
											Persistent inconsolable crying
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="thrombocytopenia" type="checkbox"  value="0594">
											Thrombocytopenia
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="osteomyelitis" type="checkbox"  value="1184">
											Osteitis/Osteomyelitis
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="toxic_shock_syndrome" type="checkbox"  value="1">
											Toxic shock syndrome
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="sepsis" type="checkbox"  value="0744">
											Sepsis
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="anaphylaxis" type="checkbox"  value="2237">
											Anaphylaxis
										  </label>
										</div>
										<div class="col-md-12">
										  <label>
											<input name="other_symptoms_later_immunized" type="checkbox"   value="9999">
											other
										  </label>
										</div>
										<div class="form-group">
											<div class="col-lg-12">
												<div id="other_symptoms_later_immunized" style="display: none">
													<select  id="other_symptoms_later_immunized" name="other_symptoms_later_immunized" class="form-control select2" style="width: 100%;" onkeyup="autocomplet()">
														<?php
				  										  foreach ($aecode as $value) { ?>
				  											  <option class="badge filter badge-info" data-color="info" value="<?php echo $value->AECODE ; ?>"><?php echo $value->AENAMETHA ; ?> (<?php echo $value->AENAMEENG ; ?>)</option>
				  									  <?php } ?>
				  								  </select>
												</div>
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
											<input type="text" class="form-control pull-right" id="datepicker_stdiag" name="date_of_symptoms">
										</div>
									</div>
							</div>
						<div class="bootstrap-timepicker">
							<div class="form-group">
									<div class="col-lg-8">
										<label>เวลาที่เกิดอาการ :</label>
										<div class="input-group">
					                      <input type="text" class="form-control timepicker_strdiag" name="time_of_symptoms">

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
											<input type="text" class="form-control pull-right" id="datepicker_hdate" name="date_of_treatment">
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
											<input type="text" class="form-control pull-right" id="datepicker_sell" name="time_of_treatment">
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
										  <textarea class="form-control" rows="3" placeholder="Enter ..." name="Symptoms_details"></textarea>
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
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
						<div class="col-lg-12">
							  <label>ความร้ายแรงของอาการ</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							  <!-- checkbox3.5.1  -->
							  <div class="form-group">
									  <div class="col-md-2">
										<label>
										  <input type="radio" name="seriousness_of_the_symptoms" value="1" checked>
										  ไม่ร้ายแรง
										</label>
									  </div>
									  <div class="col-md-2">
										<label>
										  <input type="radio" name="seriousness_of_the_symptoms" value="2" >
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
											<input type="checkbox" class="flat-red" name="other_seriousness_of_the_symptoms" value="1">
											เสียชีวิต
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="checkbox" class="flat-red" name="other_seriousness_of_the_symptoms" value="2">
											อันตรายถึงชีวิต
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="checkbox" class="flat-red" name="other_seriousness_of_the_symptoms" value="3">
											พิการ/ไร้ความสามารถ
										  </label>
									  </div>
								</div>
								<div class="form-group">
										<div class="col-md-4">
										  <label>
											<input type="checkbox" class="flat-red" name="other_seriousness_of_the_symptoms" value="4">
											รับไว้รักษาในโรงพยาบาล
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="checkbox" class="flat-red" name="other_seriousness_of_the_symptoms" value="5">
											ความผิดปกติแต่กำเนิด
										  </label>
										</div>
										<div class="col-md-5">
										  <label>
											<input type="checkbox" class="flat-red" name="other_seriousness_of_the_symptoms" value="6">
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
							  <label>สภาพผู้ป่วย</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							  <!-- checkbox3.5.1  -->
							  <div class="form-group">
									  <div class="col-md-1">
										<label>
										  <input type="radio" name="patient_status" value="1" checked>
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
									  <div class="col-md-1">
										<label>
										  <input type="radio" name="patient_status" value="4">
										  ไม่หาย
										</label>
									  </div>
									  <div class="col-md-1">
										<label>
										  <input type="radio" name="patient_status" value="5">
										  ไม่ทราบ
										</label>
									  </div>
									  <div class="col-md-1">
										<label>
										  <input type="radio"  name="patient_status" value="6">
										  เสียชีวิต
										</label>
									  </div>
									  <div class="col-lg-4">
										 <div class="input-group date">
										  <div id="other_patian_sta" style="display: none">
										  <input type="text" class="form-control" placeholder="ระบุ ว/ด/ป เสียชีวิต" id="datepicker_dead" name="date_dead" hidden="true">
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
										<div class="col-md-4">
										  <label>
											<input type="radio" name="funeral" value="1" checked>
											ไม่มี
										  </label>
										</div>
										<div class="col-md-4">
										  <label>
											<input type="radio" name="funeral" value="2">
											ไม่ทราบ
										  </label>
										</div>
										<div class="col-md-4">
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
			<!-- /.box -->
			<!-- หัวข้อที่4 -->
			<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-warning">
				<div class="box-header with-border">
					<!-- form start -->

					<div class="form-group">
						<div class="row">
							<div class="col-lg-3">
								<h3 class="box-title">(4) การตัดสินใจว่ามีความจำเป็นที่จะสอบสวน</h3>
							</div>
							<div class="col-lg-1">
								<div class="radio">
									<label>
									<input type="radio" name="necessary_to_investigate" id="necessary_to_investigate" value="1" checked>
									ไม่มี
									</label>
								</div>
							</div>
							<div class="col-lg-1">
								<div class="radio">
									<label>
									<input type="radio" name="necessary_to_investigate" id="necessary_to_investigate" value="2">
									มี
									</label>
								</div>
							</div>
							<div class="col-lg-1">
								<div class="radio">
									<label>
									วันที่สอบสวน :
									</label>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="">
									<label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="datepicker_invest" name="necessary_to_investigate_date">
										</div>
									</label>
								</div>
							</div>
					</div>
				</div>

				</div>
				<!-- /.box-header -->

			</div>
			<!-- /.box -->
			</div>
			<!--หัวข้อที่5 -->
			<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-danger">
				<div class="box-header with-border">
				<h3 class="box-title">(5) ข้อมูลผู้รายงาน สถานที่เกิดเหตุการณ์ และหน่วยงานที่รายงาน</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->

				<div class="box-body">
					{{-- คอรั่มภายใน3.1 --}}
					<div class="col-md-8">
					<!-- general form elements -->
					<div class="box box-danger">
						<div class="box-header with-border">
						<!-- checkbox3.1.1 -->
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label>ชื่อผู้วินิจฉัยอาการ :</label><input type="text" id="symptom_name"name="symptom_name" class="form-control" placeholder="ชื่อ นามสกุล">
								</div>
							</div>
						</div>
							<!-- ประวัติการแพ้วัคซีน/ยา -->
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<div class="control-label">
										<label>ตำแหน่ง :</label>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="radio">
											<label>
											<input type="radio" name="symptom_position" value="1" checked>
											แพทย์
											</label>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="radio">
											<label>
											<input type="radio" name="symptom_position" value="2">
											เภสัชกร
											</label>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="radio">
											<label>
											<input type="radio" name="symptom_position" value="3" >
											พยาบาล
											</label>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="radio">
											<label>
											<input type="radio" name="symptom_position" value="4">
											อื่นๆระบุ
											</label>
										</div>
									</div>
									<div class="col-lg-4">
										<div id="other_symptom_position" style="display: none">
										<input type="text" id="other_symptom_position_text" name="other_symptom_position" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>ชื่อผู้รายงาน :</label><input type="text" id="reporter_name" name="reporter_name" class="form-control" placeholder="ชื่อ นามสกุล">
									</div>
								</div>
							</div>
								<!-- ประวัติการแพ้วัคซีน/ยา -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="control-label">
											<label>ตำแหน่ง :</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reporter_position" value="1" checked>
												งานระบาดวิทยา
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reporter_position" value="2">
												เภสัชกร
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reporter_position" value="3" />
												งานEIP
												</label>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="radio">
												<label>
												<input type="radio" name="reporter_position"  value="4" />
												อื่นๆระบุ
												</label>
											</div>
										</div>
										<div class="col-lg-4">
											<div id="other_reporter_position" style="display: none">
											<input type="text"  id="other_reporter_position_text" name="other_reporter_position" class="form-control" placeholder="ระบุตำแหน่ง" hidden="true">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-4">
											<label>ว/ด/ป ที่พบเหตุการณ์ :</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker_found_event" name="date_found_event">
											</div>
										</div>
										<div class="col-lg-4">
											<label>สถานที่เกิดเหตุการณ์ :</label><input type="text" id="event_location" name="event_location" class="form-control" placeholder="สถานที่เกิดเหตุการณ์">
										</div>
										<div class="col-lg-4">
											<label>จังหวัด :</label>
											<select  id="province_found_event" name="province_found_event" class="form-control" style="width: 100%;">
												<?php
												  foreach ($arr_provinces as $k=>$v) { ?>
													  <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
											  <?php } ?>
		  								  </select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-4">
											<label>หน่วยที่รายงาน :</label><input type="text" id="unit_reported" name="unit_reported" class="form-control" placeholder="หน่วยที่รายงาน">
										</div>
										<div class="col-lg-4">
											<label>จังหวัด :</label>
											<select  id="province_reported" name="province_reported" class="form-control" style="width: 100%;">
												<?php
												  foreach ($arr_provinces as $k=>$v) { ?>
													  <option class="badge filter badge-info" data-color="info" value="<?php echo $k ; ?>"><?php echo $v ; ?></option>
											  <?php } ?>
										  </select>
										</div>
										<div class="col-lg-4">
											<label>โทร :</label><input type="text" id="tel_reported" name="tel_reported" class="form-control" placeholder="โทร">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-4">
											<label>Email :</label><input type="text" id="email_reported" name="email_reported" class="form-control" placeholder="Email">
										</div>
										<div class="col-lg-4">
											<label>ว/ด/ป ที่ส่งรายงาน :</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker_send_reported" name="datepicker_send_reported">
											</div>
										</div>
										<div class="col-lg-4">
											<label>ว/ด/ป ที่รับรายงาน :</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker_resiver" name="datepicker_resiver">
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
										  <label>ความคิดเห็นเพิ่มเติม</label>
										  <textarea class="form-control" rows="3" id="more_reviews" name="more_reviews" placeholder="Enter ..."></textarea>
									</div>
								</div>
						</div>
						<!-- /.box-body -->

					</div>
					<!-- /.box -->
					</div>
					{{-- คอรั่มภายใน3.2 --}}
					<div class="col-md-4">
					<!-- general form elements -->
					<div class="box box-danger">
						<div class="box-header with-border">
							<!-- checkbox3.2.1 -->
							<div class="form-group">
									<div class="col-md-12">
									  <label>
										ประเมินสาเหตุเบื้องต้น
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
													<input type="checkbox" class="flat-red" >
													ปฏิกิริยาของวัคซีน ระดับความสัมพันธ์
												  </label>
												</div>
												<div class="col-md-6">
												  <label>
													<input type="checkbox" class="flat-red">
													ใช่
												  </label>
												</div>
												<div class="col-md-6">
												  <label>
													<input type="checkbox" class="flat-red">
													น่าจะใช่
												  </label>
												</div>
												<div class="col-md-6">
												  <label>
													<input type="checkbox" class="flat-red">
													อาจจะใช่
												  </label>
												</div>
												<div class="col-md-6">
												  <label>
													<input type="checkbox" class="flat-red">
													ไม่ใช่
												  </label>
												</div>
										</div>
										<div class="form-group">
												<div class="col-md-12">
												  <label>
													<input type="checkbox" class="flat-red" >
													ความบกพร่องของวัคซีน
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" class="flat-red">
													ความคลาดเคลื่อนด้านการให้บริการ
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" class="flat-red">
													เหตุบังเอิญ/เห็นพ้อง
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" class="flat-red">
													ความกลัว/ความกังวล
												  </label>
												</div>
												<div class="col-md-12">
												  <label>
													<input type="checkbox" class="flat-red">
													ไม่สามารถระบุได้
												  </label>
												</div>
										</div>
								</div>
						</div>
						<!-- /.box-body -->
						</div>

					</div>
					<!-- /.box -->
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
			</div>
			<!-- /.box -->
			</div>
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
$(function(){
    $('#addMore').on('click', function() {
              var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
              data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
});
</script>

@stop
