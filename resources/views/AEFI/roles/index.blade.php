@extends('AEFI.layout.tabletemplate')
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<h1>
  จัดการกลุ่มผู้ใช้งาน
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
			  <h3 class="box-title">แสดงข้อมูล :: กลุ่มผู้ใช้งาน</h3>
        <a href="{{ route('roles.create') }}" type="button" class="btn btn-info pull-right" name=""><i class="fa fa-plus"></i> สร้างกลุ่ม</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Custom Tabs -->
				<table id="example" class="display nowrap" style="width:100%">
				        <thead>
				            <tr>
							          <th>ชื่อกลุ่มสิทธิ์-อังกฤษ</th>
                        <th>ชื่อกลุ่มสิทธิ์-ไทย</th>
                        <th>จัดการ</th>
				            </tr>
				        </thead>
				        <tbody>
  							@foreach($roles as $value)
  				            <tr>
  				                <td>{{ $value->name }}</td>
                          <td>{{ $value->hosp_detail }}</td>
  								        <td>
                            <a href="{{ route('roles.edit',$value->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
                            <form method="post" action="{{ route('roles.destroy',$value->id) }}" >
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">ลบ</button>
                            </form>
                          </td>
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
  $('#example').DataTable();
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
