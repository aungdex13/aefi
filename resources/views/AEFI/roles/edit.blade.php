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
			  <h3 class="box-title">แก้ไขข้อมูล :: กลุ่มผู้ใช้งาน</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Custom Tabs -->
        <form action="{{ route('roles.update',$role->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email">ชื่อกลุ่มสิทธิ์-อังกฤษ:</label>
              <input type="text" name="name" value="{{ $role->name }}" class="form-control"  id="name" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="pwd">ชื่อกลุ่มสิทธิ์-ไทย:</label>
              <input type="text" name="hosp_detail" value="{{ $role->hosp_detail }}" class="form-control"  id="hosp_detail" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">แก้ไข</button>
        </form>
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
});
</script>
<!-- /.content -->
@stop
