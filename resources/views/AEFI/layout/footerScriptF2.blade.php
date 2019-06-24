
<!-- jQuery 3 -->
<script src="/asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="/asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="/asset/bower_components/moment/min/moment.min.js"></script>
<script src="/asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="/asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="/asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="/asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="/asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/asset/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="/asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/asset/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm-dd-yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
	//Date picker
    $('#datepicker_symptoms').datepicker({
      autoclose: true
    })
	//Date picker
	$('#datepicker_date_treat').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_Symptoms_2_5').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_record5').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_investigater_2').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_investigater_3').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_investigater_4').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_investigater_5').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_dead').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_symptom').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_treat').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_of_release').datepicker({
	  autoclose: true
	})
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
	//Timepicker
    $('.timepicker_Symptoms').timepicker({
      showInputs: false
    })



  })
</script>
	{{-- อื่นๆ --}}
<script>
 	$(function () {
		$('input[name="prior_to_immunization_1"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_1').show();
			}
			else {
				$('#other_prior_to_immunization_1').hide();
				$('#other_prior_to_immunization_1_text').val('');
			}
		});
		$('input[name="prior_to_immunization_2"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_2').show();
			}
			else {
				$('#other_prior_to_immunization_2').hide();
				$('#other_prior_to_immunization_2_text').val('');
			}
		});
		$('input[name="prior_to_immunization_3"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_3').show();
			}
			else {
				$('#other_prior_to_immunization_3').hide();
				$('#other_prior_to_immunization_3_text').val('');
			}
		});
		$('input[name="prior_to_immunization_4"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_4').show();
			}
			else {
				$('#other_prior_to_immunization_4').hide();
				$('#other_prior_to_immunization_4_text').val('');
			}
		});
		$('input[name="prior_to_immunization_5"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_5').show();
			}
			else {
				$('#other_prior_to_immunization_5').hide();
				$('#other_prior_to_immunization_5_text').val('');
			}
		});
		$('input[name="prior_to_immunization_6"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_6').show();
			}
			else {
				$('#other_prior_to_immunization_6').hide();
				$('#other_prior_to_immunization_6_text').val('');
			}
		});
		$('input[name="prior_to_immunization_7"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_7').show();
			}
			else {
				$('#other_prior_to_immunization_7').hide();
				$('#other_prior_to_immunization_7_text').val('');
			}
		});
		$('input[name="prior_to_immunization_8"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_prior_to_immunization_8').show();
			}
			else {
				$('#other_prior_to_immunization_8').hide();
				$('#other_prior_to_immunization_8_text').val('');
			}
		});
		$('input[name="for_adult_woman_1"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_for_adult_woman_1').show();
			}
			else {
				$('#other_for_adult_woman_1').hide();
				$('#other_for_adult_woman_1_text').val('');
			}
		});
		$('input[name="for_infants_less_than_1_year_1"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_for_infants_less_than_1_year_1').show();
			}
			else {
				$('#other_for_infants_less_than_1_year_1').hide();
				$('#other_for_infants_less_than_1_year_1_text').val('');
			}
		});
		$('input[name="for_infants_less_than_1_year_2_1"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_for_infants_less_than_1_year_2_1').show();
			}
			else {
				$('#other_for_infants_less_than_1_year_2_1').hide();
				$('#other_for_infants_less_than_1_year_2_1_text').val('');
			}
		});
		$('input[name="data_source"]').on('click', function() {
			if ($(this).val() == '3') {
				$('#other_data_source').show();
			}
			else {
				$('#other_data_source').hide();
				$('#other_data_source_text').val('');
			}
		});
		$('input[name="patient_during_investigation"]').on('click', function() {
			if ($(this).val() == '5') {
				$('#other_patient_during_investigation').show();
			}
			else {
				$('#other_patient_during_investigation').hide();
				$('#other_patient_during_investigation_text').val('');
			}
		});
		$('input[name="source"]').on('click', function() {
			if ($(this).val() == '5') {
				$('#other_source').show();
			}
			else {
				$('#other_source').hide();
				$('#other_source_text').val('');
			}
		});
		$('input[name="status_on_date_inv_1"]').on('click', function() {
			if ($(this).val() == '5') {
				$('#other_status_on_date_inv_1').show();
			}
			else {
				$('#other_status_on_date_inv_1').hide();
				$('#other_status_on_date_inv_1_text').val('');
			}
		});
		$('input[name="status_on_date_inv_1_2"]').on('click', function() {
			if ($(this).val() == '3') {
				$('#other_status_on_date_inv_1_2').show();
			}
			else {
				$('#other_status_on_date_inv_1_2').hide();
				$('#other_status_on_date_inv_1_2_text').val('');
				$('#other_status_on_date_inv_1_3').hide();
				$('#other_status_on_date_inv_1_3_text').val('');
				$('#other_status_on_date_inv_1_4').hide();
				$('#other_status_on_date_inv_1_4_text').val('');
				$('#other_status_on_date_inv_1_5').hide();
				$('#other_status_on_date_inv_1_5_text').val('');
			}
		});
		$('input[name="instruction_1"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_instruction_1').show();
			}
			else {
				$('#other_instruction_1').hide();
				$('#other_instruction_1_text').val('');
			}
		});
		$('input[name="patient_immunized_2"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_2').show();
			}
			else {
				$('#other_patient_immunized_2').hide();
				$('#other_patient_immunized_2_text').val('');
			}
		});
		$('input[name="patient_immunized_3"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_3').show();
			}
			else {
				$('#other_patient_immunized_3').hide();
				$('#other_patient_immunized_3_text').val('');
			}
		});
		$('input[name="patient_immunized_4"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_4').show();
			}
			else {
				$('#other_patient_immunized_4').hide();
				$('#other_patient_immunized_4_text').val('');
			}
		});
		$('input[name="patient_immunized_5"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_5').show();
			}
			else {
				$('#other_patient_immunized_5').hide();
				$('#other_patient_immunized_5_text').val('');
			}
		});
		$('input[name="patient_immunized_6"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_6').show();
			}
			else {
				$('#other_patient_immunized_6').hide();
				$('#other_patient_immunized_6_text').val('');
			}
		});
		$('input[name="patient_immunized_7"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_7').show();
			}
			else {
				$('#other_patient_immunized_7').hide();
				$('#other_patient_immunized_7_text').val('');
			}
		});
		$('input[name="patient_immunized_11"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_11').show();
			}
			else {
				$('#other_patient_immunized_11').hide();
				$('#other_patient_immunized_11_text').val('');
			}
		});
		$('input[name="patient_immunized_12"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_patient_immunized_12').show();
			}
			else {
				$('#other_patient_immunized_12').hide();
				$('#other_patient_immunized_12_text').val('');
			}
		});
		$('input[name="community_inv_1"]').on('click', function() {
			if ($(this).val() == '1') {
				$('#other_community_inv_1').show();
			}
			else {
				$('#other_community_inv_1').hide();
				$('#other_community_inv_1_text').val('');
			}
		});
		$('input[name="no_ad_syringes"]').on('click', function() {
			if ($(this).val() == '4') {
				$('#other_no_ad_syringes').show();
			}
			else {
				$('#other_no_ad_syringes').hide();
				$('#other_no_ad_syringes_text').val('');
			}
		});
	});

</script>
{{-- content table --}}
{{-- <script type="text/javascript">
$(document).ready(function () {
$(document).on("click", ".classAdd", function () { //
	var rowCount = $('.data-contact-person').length + 1;
	var contactdiv = '<tr class="data-contact-person">' +
						'<td><input type="text" id="name_vac' + rowCount + '" name="name_vac[]' + rowCount + '"  class="form-control  name_vac01" onkeyup="autocomplet()" />' +
						'<td><input type="text" id="recive_amount' + rowCount + '" name="recive_amount[]' + rowCount + '"  class="form-control  recive_amount01" onkeyup="autocomplet()" />' +
						'<td><button type="button" id="btnAdd" class="btn btn-xs btn-primary classAdd">Add More</button>' +
						'<button type="button" id="btnDelete" class="deleteContact btn btn btn-danger btn-xs">Remove</button></td>' +
					'</tr>';
	$('#maintable').append(contactdiv); // Adding these controls to Main table class
});
$(document).on("click", ".deleteContact", function () {
	$(this).closest("tr").remove(); // closest used to remove the respective 'tr' in which I have my controls
});
});

</script> --}}
