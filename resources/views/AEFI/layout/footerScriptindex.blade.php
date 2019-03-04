
<!-- jQuery 3 -->
<script src="/asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- date-range-picker -->
<script src="/asset/bower_components/moment/min/moment.min.js"></script>
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
<script  src="/asset/bower_components/1543-image-hover/js/index.js"></script>

<script  src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
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
