
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
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
    $('#datepicker_found_event').datepicker({
      autoclose: true
    })
	//Date picker
	$('#datepicker_send_reported').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_resiver').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_bdate').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_stdiag').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_hdate').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_sell').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_invest').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_dead').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_Date_of_vaccination').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_expiry_date_diluent').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_expiry_date').datepicker({
	  autoclose: true
	})
	//Date picker
	$('#datepicker_date_of_reconstitution').datepicker({
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
    $('.timepicker_strdiag').timepicker({
      showInputs: false
    })



  })
</script>
	{{-- อื่นๆ --}}
<script>
 	$(function () {
		$('input[name="other_seriousness_of_the_symptoms"]').on('click', function() {
			if ($(this).val() == '6') {
				$('#text_other_seriousness_of_the_symptoms').show();
			}
			else {
				$('#text_other_seriousness_of_the_symptoms').hide();
				$('#text_other_seriousness_of_the_symptoms_text').val('');
			}
		});
		$('input[name="symptoms_later_immunized"]').on('click', function() {
			if ($(this).val() == '8') {
				$('#other_symptoms_later_immunized').show();
			}
			else {
				$('#other_symptoms_later_immunized').hide();
				$('#other_symptoms_later_immunized_text').val('');
			}
		});
		$('input[name="History_of_drug_use_within_1_month_before_getting_vaccination"]').on('click', function() {
			if ($(this).val() == '2') {
				$('#other_History_of_drug_use_within_1_month_before_getting_vaccination').show();
			}
			else {
				$('#other_History_of_drug_use_within_1_month_before_getting_vaccination').hide();
				$('#other_History_of_drug_use_within_1_month_before_getting_vaccination_text').val('');
			}
		});
		$('input[name="Underlying_disease"]').on('click', function() {
			if ($(this).val() == '2') {
				$('#other_Underlying_disease').show();
			}
			else {
				$('#other_Underlying_disease').hide();
				$('#other_Underlying_disease_text').val('');
			}
		});
		$('input[name="Patient_develop_symptoms_after_previous_vaccination"]').on('click', function() {
			if ($(this).val() == '2') {
				$('#other_Patient_develop_symptoms_after_previous_vaccination').show();
			}
			else {
				$('#other_Patient_develop_symptoms_after_previous_vaccination').hide();
				$('#other_Patient_develop_symptoms_after_previous_vaccination_text').val('');
			}
		});
		$('input[name="History_of_vaccine_drug_allergies_of_patient"]').on('click', function() {
			if ($(this).val() == '2') {
				$('#other_vaccination_history').show();
			}
			else {
				$('#other_vaccination_history').hide();
				$('#other_vaccination_history_text').val('');
			}
		});
		$('input[name="region"]').on('click', function() {
			if ($(this).val() == '2') {
				$('#other_region').show();
			}
			else {
				$('#other_region').hide();
				$('#other_region_text').val('');
			}
		});
		$('input[name="patian_sta"]').on('click', function() {
			if ($(this).val() == '6') {
				$('#other_patian_sta').show();
			}
			else {
				$('#other_patian_sta').hide();
				$('#other_patian_sta_text').val('');
			}
		});
		$('input[name="reporter_position"]').on('click', function() {
	        if ($(this).val() == '4') {
	            $('#other_reporter_position').show();
	        }
	        else {
	            $('#other_reporter_position').hide();
				$('#other_reporter_position_text').val('');
	        }
	    });
		$('input[name="symptom_position"]').on('click', function() {
			if ($(this).val() == '4') {
				$('#other_symptom_position').show();
			}
			else {
				$('#other_symptom_position').hide();
				$('#other_symptom_position_text').val('');
			}
		});
		$('input[name="funeral"]').on('click', function() {
			if ($(this).val() == '3') {
				$('#other_address_funeral').show();
			}
			else {
				$('#other_address_funeral').hide();
				$('#other_address_funeral_text').val('');
			}
		});
		$('input[name="seriousness_of_the_symptoms"]').on('click', function() {
			if ($(this).val() == '2') {
				$('#other_seriousness_of_the_symptoms').show();
			}
			else {
				$('#other_seriousness_of_the_symptoms').hide();
				$('#other_seriousness_of_the_symptoms_text').val('');
			}
		});
	});
</script>
<script>
$(document).ready(function() {
    $('#case_lst').DataTable();
} );
 </script>
