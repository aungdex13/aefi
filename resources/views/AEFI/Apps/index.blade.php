@extends('AEFI.layout.tabletemplate')
{{-- <link rel="stylesheet" href="/asset/bower_components/datatables.net/css/bulma.min.css"> --}}
{{-- <link rel="stylesheet" href="/asset/bower_components/datatables.net/css/dataTables.bulma.min.css"> --}}
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<h1>
  หน้าแรกผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
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
			  <h3 class="box-title">ข่าวประชาสัมพันธ์</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
				</ol>
				<div class="carousel-inner">
				  <div class="item active">
					<img src="asset/dist/img/vaccine-the-convo.jpg" alt="First slide">
					<div class="carousel-caption">
					  First Slide
					</div>
				  </div>

				  <div class="item">
					<img src="asset/dist/img/SARS-CoV-2-vaccine.jpg" alt="Second slide">
					<div class="carousel-caption">
					  Second Slide
					</div>
				  </div>

          {{-- <div class="item">
					<img src="asset/dist/img/SARS-CoV-2-vaccine.jpg" alt="Third slide">
					<div class="carousel-caption">
					  Third Slide
					</div>
				  </div> --}}
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				  <span class="fa fa-angle-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				  <span class="fa fa-angle-right"></span>
				</a>
			  </div>
			</div>
			<!-- /.box-body -->
		  <!-- /.box -->
		</div>
	</div>
	<!-- /.box -->
  </div>
  <div class="row">
		<div class="col-md-6">
		  <div class="box box-solid">
			<div class="box-header with-border">
			  <h3 class="box-title">สถานการณ์โรค/ข่าวกรอง :: Adverse Events Following Immunization : AEFI</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Custom Tabs -->
	            <div class="nav-tabs-custom">
	              <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab_1" data-toggle="tab">เอกสารดาวน์โหลด</a></li>
                  <li><a href="#tab_2" data-toggle="tab">2559</a></li>
	                <li><a href="#tab_3" data-toggle="tab">2558</a></li>
	                <li><a href="#tab_4" data-toggle="tab">2557</a></li>
	                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
	              </ul>
	              <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
            <div class="box-body">
                <table id="example" class="table is-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th>รายชื่อเอกสาร</th>

                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/AW_AEFI%20WEB_25Oct2020.pdf" target="_blank">
                                <div class="caption">
                                    <p>แนวทางการเฝ้าระวังและตอบโต้เหตุการณ์ไม่พึงประสงค์ภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรคของประเทศไทย</p>
                                </div>
                            </a>
                          </td>
                      </tr>
                      <tr>
                          <td>          <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_1.pdf" target="_blank">
                                      <div class="caption">
                                        <p>แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI1)</p>
                                      </div>
                                    </a>
                          </td>
                      </tr>
                      <tr>
                          <td>          <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_2.pdf" target="_blank">
                                      <div class="caption">
                                        <p>แบบสอบสวนอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI2)</p>
                                      </div>
                                    </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_system_manual.pdf" target="_blank">
                                      <div class="caption">
                                        <p>คู่มือการใช้งานระบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI)</p>
                                      </div>
                                    </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://online.pubhtml5.com/nqwl/vxcg/#p=1" target="_blank">
                                      <div class="caption">
                                        <p>แนวทางการให้วัคซีน โควิด 19 ในสถสนการณ์การระบาดปี64 ของประเทศไทย</p>
                                      </div>
                                    </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/ISRR_25Apr2021.pdf" target="_blank">
                                      <div class="caption">
                                        <p>แนวทางปฏิบัติสำหรับอาการไม่พึงประสงค์หลังการได้รับวัคซีนป้องกันโรค
                            กรณีปฏิกิริยาที่สัมพันธ์กับ ความเครียดจากการฉีดวัคซีน กลุ่มอาการคล้ายภาวะหลอดเลือดสมอง</p>
                                      </div>
                                    </a>
                            </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_covid19_06.pdf" target="_blank">
                                      <div class="caption">
                                        <p>เหตุการณ์ไม่พึงประสงค์ภายหลังได้รับวัคซีนโควิด 19 </p>
                                      </div>
                                    </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_hz.pdf" target="_blank">
                                      <div class="caption">
                                        <p>รายงานผู้ป่วยงูสวัดตามหลังการฉีดวัคซีนป้องกันโควิด-19 ชนิดต่างๆ</p>
                                      </div>
                                    </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_thrombosis.pdf" target="_blank">
                                      <div class="caption">
                                        <p>ภาวะการเกิดลิ่มเลือดอุดตันในปอดกับวัคซีนโควิด 19</p>
                                      </div>
                              </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                             <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_arteriovenous.pdf" target="_blank">
                                      <div class="caption">
                                        <p>ภาวะผิดปกติที่หลอดเลือดแดงต่อกับหลอดเลือดดำ</p>
                                      </div>
                              </a>
                            </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/Guideline_AEFI_COVID19vaccine_DOE_17062021.pdf" target="_blank">
                            <div class="caption">
                              <p>แนวทางการเฝ้าระวังและสอบสวนเหตุการณ์ไม่พึงประสงค์ภายหลังได้รับวัคซีนป้องกันโรคโควิด-19</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/ISRR_25Apr2021.pdf" target="_blank">
                            <div class="caption">
                              <p>แนวทางปฏิบัติสำหรับอาการไม่พึงประสงค์หลังการได้รับวัคซีนป้องกันโรค
                  กรณีปฏิกิริยาที่สัมพันธ์กับ ความเครียดจากการฉีดวัคซีน กลุ่มอาการคล้ายภาวะหลอดเลือดสมอง</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/Vaccine induced myocarditis_Jul29_2021_Final_v2.pdf" target="_blank">
                            <div class="caption">
                              <p>ภาวะกล้ามเนื้อหัวใจและเยื่อหุ้มหัวใจอักเสบที่เกิดจากวัคซีนโควิด 19 ชนิดเอ็มอาร์เอ็นเอ</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                          <td><a href="https://apps-doe.moph.go.th/boe/software/file/Vaccine induced_Immune_Thrombotic Thrombocytopenia_Thrombosis_with_Thrombocytopenia_Syndrome.pdf" target="_blank">
                              <div class="caption">
                                <p>ภาวะลิ่มเลือดอุดตันที่ร่วมกับเกล็ดเลือดต่ำภายหลังได้รับวัคซีน
                  Vaccine-induced Immune Thrombotic Thrombocytopenia (VITT)
                  Thrombosis with Thrombocytopenia Syndrome (TTS)</p>
                              </div>
                            </a>
                          </td>
                      </tr>
                      <tr>
                          <td> <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_d_a_v_Final_06082021.pdf" target="_blank">
                            <div class="caption">
                              <p>กรณีการเสียชีวิตหลังได้รับวัคซีนโควิด 19 สลับชนิดที่ จ.ประจวบคีรีขันธ์</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/Final_poster%20myocarditis_v9_03092021.pdf" target="_blank">
                            <div class="caption">
                              <p>โปสเตอร์ภาวะกล้ามเนื้อหัวใจและเยื่อหุ้มหัวใจอักเสบที่เกิดจากวัคซีนโควิด 19 ชนิดเอ็มอาร์เอ็นเอ</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/COVID%20arm_v1+logo.pdf" target="_blank">
                            <div class="caption">
                              <p>คำแนะนำภาวะ COVID ARM</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/Final_COVID_ARM.jpg" target="_blank">
                            <div class="caption">
                              <p>โปสเตอร์ COVID ARM คืออะไร</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                  </tbody>
              </table>
              </div>
                  </div>

	                <div class="tab-pane" id="tab_2">
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนตุลาคม-ธันวาคม 2559</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODE4&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="   class="btn btn-app">
			                  <i class="fa fa-save"></i> Save
			                </a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนกรกฎาคม-กันยายน 2559</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODE2&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="   class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนเมษายน-มิถุนายน 2559</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODE0&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="   class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนมกราคม -มีนาคม 2559</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODE1&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="   class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
	                </div>
	                <!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_3">
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนตุลาคม-ธันวาคม 2558</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODE0&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="  class="btn btn-app">
			                  <i class="fa fa-save"></i> Save
			                </a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนกรกฎาคม-กันยายน 2558</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODEz&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="  class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนเมษายน-มิถุนายน 2558</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODEy&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ==" class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนมกราคม -มีนาคม 2558</br>
							ดาวน์โหลดไฟล์<br>
							<a href="https://apps.doe.moph.go.th/boe/getFile.php?id=ODEx&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ==" class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
	                </div>
	                <!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_4">
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนตุลาคม-ธันวาคม 2557</br>
							ดาวน์โหลดไฟล์<br>
							<a  href="https://apps.doe.moph.go.th/boe/getFile.php?id=NTcx&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ==" class="btn btn-app">
			                  <i class="fa fa-save"></i> Save
			                </a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนกรกฎาคม-กันยายน 2557</br>
							ดาวน์โหลดไฟล์<br>
							<a  href="https://apps.doe.moph.go.th/boe/getFile.php?id=NTcy&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="  class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนเมษายน-มิถุนายน 2557</br>
							ดาวน์โหลดไฟล์<br>
							<a  href="https://apps.doe.moph.go.th/boe/getFile.php?id=NTcw&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="  class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
						<p>
							สถานการณ์การเฝ้าระวังอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค ประจำเดือนมกราคม -มีนาคม 2557</br>
							ดาวน์โหลดไฟล์<br>
							<a  href="https://apps.doe.moph.go.th/boe/getFile.php?id=NTcx&lbt=c2l0&rid=ZmlsZXNfdXBsb2FkL3N1cnZlaWxsYW5jZQ=="  class="btn btn-app">
							  <i class="fa fa-save"></i> Save
							</a>
						</p>
	                </div>
	                <!-- /.tab-pane -->
	              </div>
	              <!-- /.tab-content -->
	            </div>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
		<div class="col-md-6">
		  <div class="box box-solid">
			<div class="box-header with-border">
			  <h3 class="box-title">เว็บไซต์อื่นๆ</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="col-lg-6 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-purple">
					<div class="inner">
					  <h3>BOE</h3>
					  <h5><p>สำนักระบาดวิทยา</p></h5>
					</div>
					<div class="icon">
					  <i class="fa fa-home"></i>
					</div>
					<a href="https://apps.doe.moph.go.th/" class="small-box-footer">
					  More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				  </div>
				</div>
				<div class="col-lg-6 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-fuchsia">
					<div class="inner">
					  <h3>DDC</h3>
					  <h5><p>กรมควบคุมโรค</p></h5>
					</div>
					<div class="icon">
						<i class="fa fa-building"></i>
					</div>
					<a href="https://ddc.moph.go.th" class="small-box-footer">
					  More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				  </div>
				</div>
				<div class="col-lg-6 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>Evevtbase</h3>
		              <h5><p>โปรแกรมตรวจสอบการระบาด</p></h5>
		            </div>
		            <div class="icon">
		              <i class="fa fa-calendar"></i>
		            </div>
		            <a href="https://e-reports.doe.moph.go.th/eventbase/user/login/" class="small-box-footer">
		              More info <i class="fa fa-arrow-circle-right"></i>
		            </a>
		          </div>
		        </div>
				<div class="col-lg-6 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-teal ">
					<div class="inner">
					  <h3>JIT</h3>
					  <h5><p>Joint Investigation Team</p></h5>
					</div>
					<div class="icon">
					  <i class="fa fa-search"></i>
					</div>
					<a href="https://e-reports.doe.moph.go.th/eventbase/user/login/" class="small-box-footer">
					  More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				  </div>
				</div>
				<div class="col-lg-6 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-aqua">
					<div class="inner">
					  <h3>R506</h3>
					  <h5><p>R506 (สถานการณ์ & ฐานข้อมูลรายงาน 506)</p></h5>
					</div>
					<div class="icon">
					  <i class="fa fa-calendar"></i>
					</div>
					<a href="http://www.boe.moph.go.th/boedb/surdata/index.php" class="small-box-footer">
					  More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				  </div>
				</div>
				<div class="col-lg-6 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-teal ">
					<div class="inner">
					  <h3>WHO E-Learning</h3>
					  <h5><p>WHO E-Learning</p></h5>
					</div>
					<div class="icon">
					  <i class="fa fa-search"></i>
					</div>
					<a href="https://www.who.int/vaccine_safety/initiative/tech_support/ebasic/en/" class="small-box-footer">
					  More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				  </div>
				</div>
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-teal ">
          <div class="inner">
            <h4>แจ้งปัญหาการใช้งาน</h4>
                       <h5>
                         <p>	หากพบปัญหาระหว่างการใช้งาน กรุณา Scan QR Code เพื่อแจ้งปัญหาดังกล่าว</p>
                       </h5>
                       <h5>
                         <p>	<img src="images/aefi-ddc.png" width="120" height="110"></p>
                       </h5>          </div>
                     {{-- <div class="icon">
                       <i class="fa fa-search"></i>
                     </div> --}}
                     {{-- <a href="https://www.who.int/vaccine_safety/initiative/tech_support/ebasic/en/" class="small-box-footer">
                       More info <i class="fa fa-arrow-circle-right"></i>
                     </a> --}}

          </div>
        </div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>

	</div>
</section>

@include('AEFI.layout.footerScriptindex')
<script src="asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<!-- /.content -->
@stop
