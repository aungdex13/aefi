@extends('AEFI.layout.template')
@section('content')

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
$arr_load_aefi_refer_status = load_aefi_refer_status();

	// dd($data);
	 ?>
<section class="content-header">
	<!-- Content Header (Page header) -->
	<h1>
		แบบรายงานการส่งต่อผู้ป่วย
		<small></small>
	</h1>

	<ol class="breadcrumb">

	</ol>

</section>
<!-- Main content -->

<section class="content">
	<form role="form" action="{{ route('InsertRefer') }}" method="post" enctype="multipart/form-data">
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
						{{-- <input type="text" id="id_aefi1" name="id_aefi1" value="{{isset($selectcase[0]->hospcode_refer) ? $selectcase[0]->hospcode_refer : null}}" class="form-control" > --}}
							<!-- /.tab-pane -->
							{{-- <div class="tab-pane" id="tab_2"> --}}
								<div class="row">
									<!--หัวข้อที่5 -->
									<div class="col-md-12">
										<!-- general form elements -->
										<div class="box box-danger">
											<div class="box-header with-border">
												<h3 class="box-title">แบบรายงานการส่งต่อผู้ป่วย</h3>
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
																					<label>ชื่อ- นามสกุลผู้ป่วย : {{isset($selectcase[0]->first_name) ? $selectcase[0]->first_name :"ไม่ระบุ"}} {{	$selectcase[0]->sur_name}} </label>
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
																					<label>โรงพยาบาลที่เข้ารับรักษาปัจจุบัน : {{	isset($list_hos[$selectcase[0]->hospcode_treat]) ? $list_hos[$selectcase[0]->hospcode_treat]  :"ไม่ระบุ" }}</label>
																				</div>
																				<div class="col-lg-3">
																					<label>ความรุนแรง : {{	isset($arr_seriousness_of_the_symptoms[$selectcase[0]->seriousness_of_the_symptoms]) ? $arr_seriousness_of_the_symptoms[$selectcase[0]->seriousness_of_the_symptoms]  :"ไม่ระบุ" }}</label>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-4">
																					<label>วันที่แจ้งส่งต่อผู้ป่วยล่าสด : {{	isset($select_refer_data->date_entry) ? $select_refer_data->date_entry  :"ไม่มีการส่งต่อผู้ป่วยก่อนหน้า" }}</label>
																				</div>
																			</div>
																		</div>
																		<hr>
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-4">
																						<label>สถานะการส่งต่อผู้ป่วย : </label>
																						<select type="text" class="form-control" name="refer_status">
																							@if ($select_refer_data == null)
																								<option value="">ไม่มีการส่งต่อผู้ป่วย</option>
																							@else
																								<option value="{{	isset($select_refer_data->refer_status) ? $select_refer_data->refer_status  :"" }}">{{	isset($arr_load_aefi_refer_status[$select_refer_data->refer_status]) ? $arr_load_aefi_refer_status[$select_refer_data->refer_status]  :"ไม่มีการส่งต่อผู้ป่วย" }}</option>
																							@endif
																							<option value="1">มีการส่งต่อผู้ป่วย</option>
																							<option value="2">ยกเลิกการส่งต่อผู้ป่วย</option>
																							{{-- <option value="3">BP Drop</option> --}}
																						</select>
																				</div>
																				<div class="col-lg-4">
																					<label>โรงพยาบาลที่ต้องการส่งต่อ : </label>
																					<select id="js-example-basic-single" name="hospcode_refer" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
																						@if ($select_refer_data == null)
																							<option value="">ไม่มีข้อมูลโรงพยาบาลที่ต้องการส่งต่อ</option>
																						@else
																						<option value="{{	isset($select_refer_data->hospcode_refer) ? $select_refer_data->hospcode_refer  :"" }}">{{	isset($list_hos[$select_refer_data->hospcode_refer]) ? $list_hos[$select_refer_data->hospcode_refer]  :"ไม่มีการส่งต่อผู้ป่วย" }}</option>
																						@endif
																					</select>
																				</div>
																				<div class="col-lg-4">
																					<label>จังหวัดของโรงพยาบาลที่ต้องการส่งต่อ : </label>
																					<select class="form-control provinces" name="province_refer" id="provinces" required>
																						@if ($select_refer_data == null)
																							<option value="">=== จังหวัด ===</option>
																							@foreach ($list as $row)
																							<option value="{{$row->province_code}}">{{$row->province_name}}</option>
																							@endforeach
																						@else
																							<option value="{{	isset($select_refer_data->province_refer) ? $select_refer_data->province_refer  :"" }}">{{	isset($arr_provinces[$select_refer_data->province_refer]) ? $arr_provinces[$select_refer_data->province_refer]  :"ไม่มีการส่งต่อผู้ป่วย" }}</option>
																							@foreach ($list as $row)
																							<option value="{{$row->province_code}}">{{$row->province_name}}</option>
																							@endforeach
																						@endif
																					</select>
																					<!-- /.p_id tname  -->
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-4">
																					<label>ผู้บันทึกข้อมูล : </label>
																					<input type="text" name="record_name" class="form-control" value="{{	isset($select_refer_data->record_name) ? $select_refer_data->record_name  :"" }}" placeholder="ระบุ">
																					</div>
																				<div class="col-lg-4">
																					<label>หน่วยงานที่บันทึกข้อมูล : </label>
																					<select id="js-example-basic-single" name="hospcode_save" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger" required>
																						@if ($select_refer_data == null)
																							<option value="">ไม่มีข้อมูลหน่วยงานที่บันทึกข้อมูล</option>
																						@else
																					<option value="{{	isset($select_refer_data->hospcode_save) ? $select_refer_data->hospcode_save  :"" }}">{{	isset($list_hos[$select_refer_data->hospcode_save]) ? $list_hos[$select_refer_data->hospcode_save]  :"ไม่มีการส่งต่อผู้ป่วย" }}</option>
																						@endif
																							{{-- <option value="{{	isset($select_refer_data->hospcode_save) ? $select_refer_data->hospcode_save  :"" }}">{{	isset($list_hos[$select_refer_data->hospcode_save]) ? $list_hos[$select_refer_data->hospcode_save]  :"ไม่มีการส่งต่อผู้ป่วย" }}</option> --}}
																					</select>
																					</div>
																					<div class="col-lg-4">
																						<label>จังหวัดของหน่วยงานที่บันทึกข้อมูล : </label>
																						<select class="form-control provinces" name="province_record_refer" id="provinces" required>
																							@if ($select_refer_data == null)
																								<option value="">=== จังหวัด ===</option>
																								@foreach ($list as $row)
																								<option value="{{$row->province_code}}">{{$row->province_name}}</option>
																								@endforeach
																							@else
																								<option value="{{	isset($select_refer_data->province_record_refer) ? $select_refer_data->province_record_refer  :"" }}">{{	isset($arr_provinces[$select_refer_data->province_record_refer]) ? $arr_provinces[$select_refer_data->province_record_refer]  :"ไม่มีการส่งต่อผู้ป่วย" }}</option>
																								@foreach ($list as $row)
																								<option value="{{$row->province_code}}">{{$row->province_name}}</option>
																								@endforeach
																							@endif
																						</select>
																						<!-- /.p_id tname  -->
																					</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="row">
																				<div class="col-lg-6">
																					<label>หมายเหตุ หรือ ข้อมูลเพิ่มเติม : </label>
																					<textarea type="text" name="other" class="form-control" rows="3" placeholder="หมายเหตุ หรือ ข้อมูลเพิ่มเติม">{{	isset($select_refer_data->other) ? $select_refer_data->other  :"" }}</textarea>
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
@include('AEFI.layout.footerScript')

<script type="text/javascript">
  $('.provinces').change(function() {
    if ($(this).val() != '') {
      var select = $(this).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('dropdown.fetch')}}",
        method: "POST",
        data: {
          select: select,
          _token: _token
        },
        success: function(result) {
          $('.amphures').html(result);
        }
      })
    }
  });
</script>
<script type="text/javascript">
  $('.amphures').change(function() {
    var selectD = $(this).val();
    if ($(this).val() != '') {
      console.log(selectD);
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('dropdown.fetchD')}}",
        method: "POST",
        data: {
          select: selectD,
          _token: _token
        },
        success: function(result) {
          $('.district').html(result);
        }
      })
    }
  });
  $(".divID1").attr("disabled", !this.checked);
  $("#checkBoxID1").click(function() {
    $(".divID1").attr("disabled", !this.checked);
  });
  $(".divID2").attr("disabled", !this.checked);
  $("#checkBoxID2").click(function() {
    $(".divID2").attr("disabled", !this.checked);
  });
  $(".divID3").attr("disabled", !this.checked);
  $("#checkBoxID3").click(function() {
    $(".divID3").attr("disabled", !this.checked);
  });
  $(".divID4").attr("disabled", !this.checked);
  $("#checkBoxID4").click(function() {
    $(".divID4").attr("disabled", !this.checked);
  });
  $(".divID5").attr("disabled", !this.checked);
  $("#checkBoxID5").click(function() {
    $(".divID5").attr("disabled", !this.checked);
  });
</script>
<script>
  function showDiv1(divId, element) {
    document.getElementById(divId).style.display = element.value == 99 ? 'block' : 'none';
  }

  // function showDiv2(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 8 ? 'block' : 'none';
  // }
  //
  // function showDiv3(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 999 ? 'block' : 'none';
  // }
  // function showDiv4(divId, element) {
  // 	document.getElementById(divId).style.display = element.value == 5 ? 'block' : 'none';
  // }
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $(document).on("click", ".deleteContact", function() {
      $(this).closest("tr").remove(); // closest used to remove the respective 'tr' in which I have my controls
    });
    $(".js-example-basic-single").select2({
      allowClear: true,
      language: {
      inputTooShort: function (args) {
          return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
      },
      noResults: function () {
          return "ไม่พบข้อมูล";
      },
      searching: function () {
          return "กำลังค้นหาข้อมูล...";
      }
      },
      placeholder: "กรุณาพิมพ์ชื่อหน่วยงานที่ต้องการ เช่น. สคร.1,โรงพยาบาลเลิดสิน,สำนักงานสาธารณสุขจังหวัดสมุทรปราการ",
      minimumInputLength: 3,
      minimumResultsForSearch: 5,
      ajax: {
       url: "{{ route('list-division-json') }}",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
    });
  });
</script>
@stop
