@extends('AEFI.layout.tabletemplate')
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<h1>
  แสดงรายชื่อผู้ใช้งาน
  <small>AEFI</small>
</h1>
<ol class="breadcrumb">

</ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
		<div class="col-md-12">
		  <div class="box box-solid">
			<div class="box-header with-border">
			  <h3 class="box-title">แสดงข้อมูล :: รายชื่อผู้ใช้งาน</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Custom Tabs -->
				<div class="table-responsive">
				<table id="example" class="display nowrap">
				        <thead>
				            <tr>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>username</th>
								<th>email</th>
								<th>จังหวัด</th>
                <th>หน่วยงาน</th>
								<th>การอนุมัติ</th>
				            </tr>
				        </thead>
				        <tbody>
  							@foreach($datas as $data)
  				            <tr>
  				                <td>{{ $data->name }}</td>
                          		<td>{{ $data->sur_name }}</td>
  								<td>{{ $data->username }}</td>
								<td>{{ $data->email }}</td>
                <td>{{ $listProvince[$data->prov_code] }}</td>
								<td>@if($data->hospcode) {{ $datas_div[trim($data->hospcode)] }} @else - @endif</td>
								<td><input data-id="{{ $data->id }}" type="checkbox" @if($data->confirm == "1") checked @else @endif data-toggle="toggle" data-on="ใช้งาน" data-off="ปิดการใช้งาน"></td>
							</tr>
  							@endforeach
				        </tbody>
				    </table>
				</div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>

@include('AEFI.layout.footerScriptindex')
<script type="text/javascript">
$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});
$(document).ready(function() {
  $('#example').DataTable({
    "ordering": false,
    dom: 'Bfrtip',
    buttons: [
              'excel'
              ]
  });
  @if ($message = Session::get('success'))
      Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: '{{ $message }}'
      })
  @endif
  @if ($message = Session::get('error'))
    Swal.fire({
      icon: 'error',
      title: 'เกิดข้อผิดพลาด',
      text: '{{ $message }}'
    });
  @endif
});

$('input:checkbox').change(function() {
  $('#console-event').html('Toggle: ' + $(this).prop('checked'));

	$.ajax({
			url : "{{ route('ajax.updateConfirm') }}",
			type : "POST",
			data : {'id' : $(this).data("id"),"_token": "{{ csrf_token() }}",},
				success: function(data){
					console.log(data);
					if(data == 'ok'){
						Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'อัพเดทข้อมูลสำเร็จ',
						showConfirmButton: false,
						timer: 1500
						});
					}else{
						Swal.fire({
						position: 'top-end',
						icon: 'error',
						title: 'เกิดข้อผิดพลาดในการอัพเดทข้อมูล',
						showConfirmButton: false,
						timer: 1500
						})
					}
					},
					error : function(data){
					toastr.error('error msg: '+data);
							}
		});

})
</script>
<!-- /.content -->
@stop
