@extends('AEFI.layout.template')
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<?php
$arr_history_of_vaccine = load_history_of_vaccine();
$arr_patient_develop_symptoms_after_previous_vaccination = load_patient_develop_symptoms_after_previous_vaccination();
$arr_underlying_disease = load_underlying_disease();
$arr_vaccine_volume = load_vaccine_volume();
$arr_route_of_vaccination = load_route_of_vaccination();
$arr_vaccination_site = load_vaccination_site();
$arr_manufacturer = load_manufacturer();

//dd($data);
 ?>
<h1>
  รายชื่อผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
  <small>AEFI</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Forms</a></li>
  <li class="active">Advanced Elements</li>
</ol>

</section>
<!-- Main content -->
<section class="content">
	<div class="row">
			<!--หัวข้อที่2 -->
			<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-info">
				<!-- /.box-header -->
				<!-- form start -->
		            <!-- /.box-header -->
					<!-- SELECT2 EXAMPLE -->
			        <div class="box box-default">
			          <div class="box-header with-border">
			            <h3 class="box-title">Select2</h3>

			            <div class="box-tools pull-right">
			              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			            </div>
			          </div>
			          <!-- /.box-header -->
			          <div class="box-body">
			            <div class="row">
			              <div class="col-md-12">
			                <div class="form-group">
			                  <label>Minimal</label>
			                  <select class="form-control select2" style="width: 100%;">
			                    <option selected="selected">Alabama</option>
			                    <option>Alaska</option>
			                    <option>California</option>
			                    <option>Delaware</option>
			                    <option>Tennessee</option>
			                    <option>Texas</option>
			                    <option>Washington</option>
			                  </select>
			                </div>
			                <!-- /.form-group -->
			              </div>
			              <!-- /.col -->
			            </div>
			            <!-- /.row -->
			          </div>
			          <!-- /.box-body -->
			        </div>
			        <!-- /.box -->

				</div>
			</div>
			<!-- /.box -->
			</div>
  <!-- /.row -->
</section>

@include('AEFI.layout.footerScript')
<!-- /.content -->
@stop
