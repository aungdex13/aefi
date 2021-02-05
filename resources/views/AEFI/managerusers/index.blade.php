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
				<table id="example" class="display nowrap" style="width:100%">
				        <thead>
				            <tr>
							          <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>username</th>
                        <th>email</th>
                        <th>หน่วยงาน</th>
				            </tr>
				        </thead>
				        <tbody>
  							@foreach($datas as $data)
  				            <tr>
  				                <td>{{ $data->name }}</td>
                          <td>{{ $data->sur_name }}</td>
  								        <td>{{ $data->username }}</td>
                          <td>{{ $data->email }}</td>
                          <td>{{ $data->hospcode }}</td>
  				            </tr>
  							@endforeach
				        </tbody>
				    </table>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>

@include('AEFI.layout.footerScriptindex')
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable({
    "ordering": false
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
</script>
<!-- /.content -->
@stop
