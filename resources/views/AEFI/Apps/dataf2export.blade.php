@extends('AEFI.layout.tabletemplate')
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<h1>
  ส่งออกข้อมูลผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
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
			  <h3 class="box-title">รายงาน 506 แบบฟอร์ม2 :: Adverse Events Following Immunization : AEFI</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Custom Tabs -->
				<table id="example" class="display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>เลขที่ผู้ป่วย</th>
								<th>รหัสผู้ป่วย</th>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>ที่อยู่ขณะเริ่มป่วย</th>
								<th>เพศ</th>
								<th>อายุขณะป่วย</th>
								<th>อาการภายหลังได้รับการสร้างภูมิคุ้มกันโรค</th>
							</tr>
						</thead>
				        <tbody>
							<?php foreach($selectdata2 as $value) : ?>
				            <tr>
				                <td>{{ $value->id_case }}</td>
								<td>{{ $value->prior_to_immunization_1}}</td>
				                <td>{{ $value->prior_to_immunization_2 }}</td>
				                <td>{{ $value->prior_to_immunization_3 }}</td>
				                <td>{{ $value->prior_to_immunization_4 }}</td>
				                <td>{{ $value->prior_to_immunization_5 }}</td>
								<td>{{ $value->symptoms_2 }}</td>
								<td>{{ $value->symptoms_2_1 }}</td>
				            </tr>
							<?php endforeach;?>
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
$('#example').DataTable( {
	dom: 'Bfrtip',
	buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
	]
} );
} );
</script>
<!-- /.content -->
@stop
