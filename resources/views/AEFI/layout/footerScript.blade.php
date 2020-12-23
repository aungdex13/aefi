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

<!-- jvectormap  -->
<script src="/asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="/asset/dist/js/pages/chartdashbard.js"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="/asset/dist/js/demo.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- Page script -->
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('#datepicker').datepicker({
      autoclose: true
    })
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    // $('#datepicker').datepicker({
    //   dateFormat: "yy-mm-dd"
    // })
    //Date picker
    $('#datepicker_found_event').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_send_reported').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_resiver').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_bdate').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_stdiag').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_hdate').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_sell').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_invest').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_dead').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_Date_of_vaccination').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date_diluent1').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date_diluent2').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date_diluent3').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date_diluent4').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date_diluent5').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date1').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date2').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date3').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date4').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#datepicker_expiry_date5').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_reconstitution1').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_reconstitution2').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_reconstitution3').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_reconstitution4').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_reconstitution5').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_vaccination1').datepicker({
      dateFormat: "yy-mm-dd"
    })
    //Date picker
    $('#date_of_vaccination2').datepicker({
      dateFormat: "yy-mm-dd"
    })

    //Date picker
    $('#date_of_vaccination3').datepicker({
      dateFormat: "yy-mm-dd"
    })

    //Date picker
    $('#date_of_vaccination4').datepicker({
      dateFormat: "yy-mm-dd"
    })

    //Date picker
    $('#date_of_vaccination5').datepicker({
      dateFormat: "yy-mm-dd"
    })


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
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
  $(function() {
    $('input[name="other_seriousness_of_the_symptoms"]').on('click', function() {
      if ($(this).val() == '6') {
        $('#text_other_seriousness_of_the_symptoms').show();
      } else {
        $('#text_other_seriousness_of_the_symptoms').hide();
        $('#text_other_seriousness_of_the_symptoms_text').val('');
      }
    });
    $('input[name="sepsis"]').on('click', function() {
      if ($(this).is(":checked")) {
        $('#other_seriousness_of_the_symptoms').show();
      } else {
        $('#other_seriousness_of_the_symptoms').hide();
        $('#other_seriousness_of_the_symptoms_text').val('');
      }
    });
    $('input[name="encephalopathy"]').on('click', function() {
      if ($(this).is(":checked")) {
        $('#other_seriousness_of_the_symptoms').show();
      } else {
        $('#other_seriousness_of_the_symptoms').hide();
        $('#other_seriousness_of_the_symptoms_text').val('');
      }
    });
    $('input[name="flaccid_paralysis"]').on('click', function() {
      if ($(this).is(":checked")) {
        $('#other_seriousness_of_the_symptoms').show();
      } else {
        $('#other_seriousness_of_the_symptoms').hide();
        $('#other_seriousness_of_the_symptoms_text').val('');
      }
    });
    $('input[name="osteomyelitis"]').on('click', function() {
      if ($(this).is(":checked")) {
        $('#other_seriousness_of_the_symptoms').show();
      } else {
        $('#other_seriousness_of_the_symptoms').hide();
        $('#other_seriousness_of_the_symptoms_text').val('');
      }
    });
    $('input[name="other_symptoms_later_immunized_chk"]').on('click', function() {
            if ($(this).is(":checked")) {
        $('#other_symptoms_later_immunized').show();
      } else {
        $('#other_symptoms_later_immunized').hide();
        $('#other_symptoms_later_immunized_text').val('');
      }
    });
    $('input[name="history_of_drug_use_within_1_month_before_getting_vaccination"]').on('click', function() {
      if ($(this).val() == '2') {
        $('#other_history_of_drug_use_within_1_month_vaccination').show();
      } else {
        $('#other_history_of_drug_use_within_1_month_vaccination').hide();
        $('#other_history_of_drug_use_within_1_month_vaccination_text').val('');
      }
    });
    $('input[name="underlying_disease"]').on('click', function() {
      if ($(this).val() == '2') {
        $('#other_underlying_disease').show();
      } else {
        $('#other_underlying_disease').hide();
        $('#other_underlying_disease_text').val('');
      }
    });
    $('input[name="patient_develop_symptoms_after_previous_vaccination"]').on('click', function() {
      if ($(this).val() == '2') {
        // alert("pass");
        $('#other_patient_develop_symptoms_after_previous_vaccination').show();
      } else {
        $('#other_patient_develop_symptoms_after_previous_vaccination').hide();
        $('#other_Patient_develop_symptoms_after_previous_vaccination_text').val('');
      }
    });
    $('input[name="history_of_vaccine_drug_allergies_of_patient"]').on('click', function() {
      if ($(this).val() == '2') {
        // alert("pass");
        $('#other_vaccination_history').show();
      } else {
        $('#other_vaccination_history').hide();
        $('#other_vaccination_history_text').val('');
      }
    });
    $('input[name="region"]').on('click', function() {
      if ($(this).val() == '2') {
        $('#other_region').show();
      } else {
        $('#other_region').hide();
        $('#other_region_text').val('');
      }
    });
    $('input[name="patian_sta"]').on('click', function() {
      if ($(this).val() == '6') {
        $('#other_patian_sta').show();
      } else {
        $('#other_patian_sta').hide();
        $('#other_patian_sta_text').val('');
      }
    });
    $('input[name="reporter_position"]').on('click', function() {
      if ($(this).val() == '4') {
        $('#other_reporter_position').show();
      } else {
        $('#other_reporter_position').hide();
        $('#other_reporter_position_text').val('');
      }
    });
    $('input[name="symptom_position"]').on('click', function() {
      if ($(this).val() == '4') {
        $('#other_symptom_position').show();
      } else {
        $('#other_symptom_position').hide();
        $('#other_symptom_position_text').val('');
      }
    });
    $('input[name="funeral"]').on('click', function() {
      if ($(this).val() == '3') {
        $('#other_address_funeral').show();
      } else {
        $('#other_address_funeral').hide();
        $('#other_address_funeral_text').val('');
      }
    });
    $('input[name="seriousness_of_the_symptoms"]').on('click', function() {
      if ($(this).val() == '2') {
        $('#other_seriousness_of_the_symptoms').show();
      } else {
        $('#other_seriousness_of_the_symptoms').hide();
        $('#other_seriousness_of_the_symptoms_text').val('');
      }
    });
  });
</script>
<script>
  $(function() {
    $('#addMore').on('click', function() {
      var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
      data.find("input").val('');
    });
    $(document).on('click', '.remove', function() {
      var trIndex = $(this).closest("tr").index();
      if (trIndex > 1) {
        $(this).closest("tr").remove();
      } else {
        alert("Sorry!! Can't remove first row!");
      }
    });
  });
</script>
