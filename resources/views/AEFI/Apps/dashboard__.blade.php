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
 ?>
<h1>
  แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
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
<div class="col-md-12">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Number of AEFI cases by month of onset Year 2019</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	                <div class="btn-group">
	                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
	                    <i class="fa fa-wrench"></i></button>
	                  <ul class="dropdown-menu" role="menu">
	                    <li><a href="#">Action</a></li>
	                    <li><a href="#">Another action</a></li>
	                    <li><a href="#">Something else here</a></li>
	                    <li class="divider"></li>
	                    <li><a href="#">Separated link</a></li>
	                  </ul>
	                </div>
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="row">
	                <div class="col-md-8">
	                  <p class="text-center">
	                    <strong>จำนวนผู้ป่วยรายเดือน: 1 มกราคม, 2562 - 31 ธันวาคม, 2562</strong>
	                  </p>

	                  <div class="chart">
	                    <!-- Sales Chart Canvas -->
	                    <canvas id="salesChart" style="height: 180px;"></canvas>
	                  </div>
	                  <!-- /.chart-responsive -->
	                </div>
	                <!-- /.col -->
	                <div class="col-md-4">
	                  <p class="text-center">
	                    <strong>จำนวนผู้ป่วยในแต่ละสัปดาห์</strong>
	                  </p>

	                  <div class="progress-group">
	                    <span class="progress-text">ผู้ป่วย ชาย</span>
	                    <span class="progress-number"><b>160</b>/คน</span>

	                    <div class="progress sm">
	                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
	                    </div>
	                  </div>
	                  <!-- /.progress-group -->
	                  <div class="progress-group">
	                    <span class="progress-text">ผู้ป่วย หญิง</span>
	                    <span class="progress-number"><b>310</b>/คน</span>

	                    <div class="progress sm">
	                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
	                    </div>
	                  </div>
	                  <!-- /.progress-group -->
	                  <div class="progress-group">
	                    <span class="progress-text">ผู้ป่วยใน</span>
	                    <span class="progress-number"><b>480</b>/คน</span>

	                    <div class="progress sm">
	                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
	                    </div>
	                  </div>
	                  <!-- /.progress-group -->
	                  <div class="progress-group">
	                    <span class="progress-text">ผู้ป่วยนอก</span>
	                    <span class="progress-number"><b>250</b>/คน</span>

	                    <div class="progress sm">
	                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
	                    </div>
	                  </div>
	                  <!-- /.progress-group -->
	                </div>
	                <!-- /.col -->
	              </div>
	              <!-- /.row -->
	            </div>
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</div>
	</div>
  <!-- /.row -->
<div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลวัคซีน ที่ได้รับ</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="fa fa-circle-o text-red"></i> วัณโรค</li>
                      <li><i class="fa fa-circle-o text-green"></i> ตับอักเสบบี</li>
                      <li><i class="fa fa-circle-o text-yellow"></i> บาดทะยัก</li>
                      <li><i class="fa fa-circle-o text-aqua"></i> โปลิโอ</li>
                      <li><i class="fa fa-circle-o text-light-blue"></i> หัด</li>
                      <li><i class="fa fa-circle-o text-gray"></i> โรคไข้กาฬหลังแอ่น</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#">วัณโรค
                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                  <li><a href="#">ตับอักเสบบี <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                  </li>
                  <li><a href="#">บาดทะยัก
                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                </ul>
              </div>
              <!-- /.footer -->
            </div>
            <!-- /.box -->
		</div>

		<div class="col-md-6">
		            <div class="box box-default">
		              <div class="box-header with-border">
		                <h3 class="box-title">กราฟแนวโน้ม อัตรป่วย</h3>

		                <div class="box-tools pull-right">
		                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                  </button>
		                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		                </div>
		              </div>
		              <!-- /.box-header -->
		              <div class="box-body">
		                <div class="row">
		                  <div class="col-md-8">
		                    <div class="chart-responsive">
		                      <canvas id="lineChart" height="150"></canvas>
		                    </div>
		                    <!-- ./chart-responsive -->
		                  </div>
		                  <!-- /.col -->
		                  <div class="col-md-4">
		                    <ul class="chart-legend clearfix">
		                      <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
		                      <li><i class="fa fa-circle-o text-green"></i> IE</li>
		                      <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
		                      <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
		                      <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
		                      <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
		                    </ul>
		                  </div>
		                  <!-- /.col -->
		                </div>
		                <!-- /.row -->
		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer no-padding">
		                <ul class="nav nav-pills nav-stacked">
		                  <li><a href="#">United States of America
		                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
		                  <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
		                  </li>
		                  <li><a href="#">China
		                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
		                </ul>
		              </div>
		              <!-- /.footer -->
		            </div>
		            <!-- /.box -->
				</div>
								<div class="col-md-12">
								            <div class="box box-default">
								              <div class="box-header with-border">
								                <h3 class="box-title">จำนวนผู้ป่วยรายสัปดาห์</h3>

								                <div class="box-tools pull-right">
								                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								                  </button>
								                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								                </div>
								              </div>
								              <!-- /.box-header -->
								              <div class="box-body">
												  <div class="box-body no-padding">
													<div class="row">
													  <div class="col-md-9 col-sm-8">
														<div class="pad">
														  <!-- Map will be created here -->
														  <div id="world-map-markers" style="height: 325px;"></div>
														</div>
													  </div>
													  <!-- /.col -->
													  <div class="col-md-3 col-sm-4">
														<div class="pad box-pane-right bg-green" style="min-height: 280px">
														  <div class="description-block margin-bottom">
															<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
															<h5 class="description-header">8390</h5>
															<span class="description-text">Visits</span>
														  </div>
														  <!-- /.description-block -->
														  <div class="description-block margin-bottom">
															<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
															<h5 class="description-header">30%</h5>
															<span class="description-text">Referrals</span>
														  </div>
														  <!-- /.description-block -->
														  <div class="description-block">
															<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
															<h5 class="description-header">70%</h5>
															<span class="description-text">Organic</span>
														  </div>
														  <!-- /.description-block -->
														</div>
													  </div>
													  <!-- /.col -->
													</div>
													<!-- /.row -->
												  </div>
								                <!-- /.row -->
								              </div>
								              <!-- /.box-body -->
								              <!-- /.footer -->
								            </div>
								            <!-- /.box -->
										</div>
	  <!-- /.box -->
  </div>
</section>

@include('AEFI.layout.footerScript')
<!-- /.content -->
@stop
