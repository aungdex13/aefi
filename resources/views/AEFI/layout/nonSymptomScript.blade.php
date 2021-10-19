<script>

$('#seriousness_of_the_symptoms_2').change(function() {
  var s = $('#seriousness_of_the_symptoms_2 input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#seriousness_of_the_symptoms2').val((s.length > 0 ? s : ""));
});

$('#other_seriousness_of_the_symptoms_2').change(function() {
  var s = $('#other_seriousness_of_the_symptoms_2 input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#other_seriousness_of_the_symptoms2').val((s.length > 0 ? s : ""));
});

$('#patient_status_2').change(function() {
  var s = $('#patient_status_2 input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#patient_status2').val((s.length > 0 ? s : ""));
});

$('#funeral_2').change(function() {
  var s = $('#funeral_2 input:checked').map(function() {
    return this.value;
  }).get().join(',');
  $('#funeral2').val((s.length > 0 ? s : ""));
});
</script>