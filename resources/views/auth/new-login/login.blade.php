<!DOCTYPE html>
<html lang="en">
<head>
<title>AEFI Systems</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.1/css/dataTables.bulma.min.css" rel="stylesheet">
</head>
<style>
/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>
<body>
<div class="container">
    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <form method="POST" action="{{ route('login') }}">
              @csrf
    			<fieldset>
    				<h2>AEFI Systems</h2>by DOE@DDC
    				<hr class="colorgraph">
    				<div class="form-group">
                        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="ชื่อผู้ใช้หรืออีเมล์">
    				</div>
    				<div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="รหัสผ่าน">
    				</div>
    				<!-- <span class="button-checkbox">
    					<button type="button" class="btn" data-color="info">Remember Me</button>
                        <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
    					<a href="" class="btn btn-link pull-right">Forgot Password?</a>
    				</span> -->
    				<hr class="colorgraph">
    				<div class="row">
    					<div class="col-xs-4 col-sm-4 col-md-4">
                <input type="submit" class="btn btn-lg btn-success btn-block" value="เข้าสู่ระบบ">
    					</div>
              <div class="col-xs-4 col-sm-4 col-md-4">
    						<a href="{{ route('resetpassword-form') }}" class="btn btn-lg btn-warning btn-block">ลืมรหัสผ่าน</a>
    					</div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <a href="{{ route('register-form') }}" class="btn btn-lg btn-primary btn-block">สมัครสมาชิก</a>
              </div>
    				</div>
    			</fieldset>
    		</form>
    	</div>
    </div>
  </br>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
          <div class="box-header with-border">
            {{-- <h3 class="box-title">สถานการณ์โรค/ข่าวกรอง :: Adverse Events Following Immunization : AEFI</h3> --}}
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- Custom Tabs -->
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab">เอกสารดาวน์โหลด</a></li>
              <li><a href="#tab_5" data-toggle="tab">สถานการณ์ AEFI COVID-19</a></li>
                      {{-- <li><a href="#tab_2" data-toggle="tab">2559</a></li>
                      <li><a href="#tab_3" data-toggle="tab">2558</a></li>
                      <li><a href="#tab_4" data-toggle="tab">2557</a></li> --}}
                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                <div class="box-body">
                    <table id="example" class="table is-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>รายชื่อเอกสาร</th>
                  <th>id</th>
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
                  <td>
                                1
                              </td>
                          </tr>
                          <tr>
                              <td>          <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_1.pdf" target="_blank">
                                          <div class="caption">
                                            <p>แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI1)</p>
                                          </div>
                                        </a>
                              </td>
                  <td>
                                2
                              </td>
                          </tr>
                          <tr>
                              <td>          <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_2.pdf" target="_blank">
                                          <div class="caption">
                                            <p>แบบสอบสวนอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI2)</p>
                                          </div>
                                        </a>
                              </td>
                  <td>
                                3
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
                  <td>
                                4
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
                  <td>
                                5
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
                  <td>
                    6
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
                  <td>
                                7
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
                  <td>
                                8
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
                  <td>
                                9
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
                  <td>
                    10
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
                <td>
                  11
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
                <td>
                  12
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
                <td>
                  13
                </td>
                          </tr>
                          <tr>
                              <td><a href="https://apps-doe.moph.go.th/boe/software/file/Vaccine induced_Immune_Thrombotic Thrombocytopenia_Thrombosis_with_Thrombocytopenia_Syndrome.pdf" target="_blank">
                                  <div class="caption">
                                    <p>ภาวะลิ่มเลือดอุดตันที่ร่วมกับเกล็ดเลือดต่ำภายหลังได้รับวัคซีน
                      Vaccine-induced Immune Thrombotic Thrombocytopenia (VITT)
                      Thrombosis with Thrombocytopenia Syndrome (TTS)</p><p style="color:red">(ใหม่)</p>
                                  </div>
                                </a>
                              </td>
                  <td>
                                14
                              </td>
                          </tr>
                          <tr>
                              <td> <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_d_a_v_Final_06082021.pdf" target="_blank">
                                <div class="caption">
                                  <p>กรณีการเสียชีวิตหลังได้รับวัคซีนโควิด 19 สลับชนิดที่ จ.ประจวบคีรีขันธ์</p><p style="color:red">(ใหม่)</p>
                                </div>
                              </a>
                            </td>
                <td>
                                15
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <a href="https://apps-doe.moph.go.th/boe/software/file/Final_poster%20myocarditis_v9_03092021.pdf" target="_blank">
                                <div class="caption">
                                  <p>โปสเตอร์ภาวะกล้ามเนื้อหัวใจและเยื่อหุ้มหัวใจอักเสบที่เกิดจากวัคซีนโควิด 19 ชนิดเอ็มอาร์เอ็นเอ</p><p style="color:red">(ใหม่)</p>
                                </div>
                              </a>
                            </td>
                <td>
                  16
                </td>
                          </tr>
                          <tr>
                              <td>
                                <a href="https://apps-doe.moph.go.th/boe/software/file/COVID%20arm_v1+logo.pdf" target="_blank">
                                <div class="caption">
                                  <p>คำแนะนำภาวะ COVID ARM</p><p style="color:red">(ใหม่)</p>
                                </div>
                              </a>
                            </td>
                <td>
                  17
                </td>
                          </tr>
                          <tr>
                              <td>
                                <a href="https://apps-doe.moph.go.th/boe/software/file/Final_COVID_ARM.jpg" target="_blank">
                                <div class="caption">
                                  <p>โปสเตอร์ COVID ARM คืออะไร</p><p style="color:red">(ใหม่)</p>
                                </div>
                              </a>
                            </td>
                <td>
                  18
                </td>
                          </tr>
                      </tbody>
                  </table>
                  </div>
                      </div>
                      <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                <div class="box-body">
                  <table id="example2" class="table is-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>รายชื่อเอกสาร</th>
                        <th>id</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                        <a href="https://ddc.moph.go.th/uploads/ckeditor2//files/2003220210813023823.pdf" target="_blank">
                        <div class="caption">
                          <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 8 สิงหาคม 2564)</p>
                        </div>
                        </a>
                      </td>
                      <td>
                        1
                      </td>
                      </tr>
                      <tr>
                        <td><a href="https://ddc.moph.go.th/uploads/ckeditor2//files/15082021_AEFI_COVID-19%20Vaccine%20Situation.pdf" target="_blank">
                          <div class="caption">
                          <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 15 สิงหาคม 2564)</p>
                          </div>
                        </a>
                        </td>
                        <td>
                        2
                        </td>
                      </tr>
                      <tr>
                        <td> <a href="https://ddc.moph.go.th/uploads/ckeditor2//files/22082021_AEFI%20Situation_COVID%20Vaccine_update.pdf" target="_blank">
                        <div class="caption">
                          <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 22 สิงหาคม 2564)</p>
                        </div>
                        </a>
                      </td>
                      <td>
                        3
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <a href="https://ddc.moph.go.th/uploads/ckeditor2//files/29082021_AEFI%20Situation_COVID%20Vaccine_update%20-%202.pdf" target="_blank">
                        <div class="caption">
                          <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 29 สิงหาคม 2564)</p>
                        </div>
                        </a>
                      </td>
                      <td>
                        4
                      </td>
                      </tr>
                      <tr>
                        <td>
                        <a href="https://ddc.moph.go.th/uploads/ckeditor2//files/05092021_AEFI%20Situation_COVID%20Vaccine_update.pdf" target="_blank">
                        <div class="caption">
                          <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 5 กันยายน 2564)</p>
                        </div>
                        </a>
                      </td>
                      <td>
                        5
                      </td>
                      </tr>
                      <tr>
                        <td>
                        <a href="https://https://ddc.moph.go.th/uploads/ckeditor2//files/19092021_AEFI%20Situation_COVID%20Vaccine_%E0%B8%AA%E0%B8%B3%E0%B8%AB%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B9%80%E0%B8%9C%E0%B8%A2%E0%B9%81%E0%B8%9E%E0%B8%A3%E0%B9%88.pdf" target="_blank">
                        <div class="caption">
                          <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 19 กันยายน 2564)</p>
                        </div>
                        </a>
                      </td>
                      <td>
                        6
                      </td>
                      </tr>
                      <tr>
                      <td>
                        <a href="https://ddc.moph.go.th/uploads/ckeditor2//files/26092021_AEFI%20Situation_COVID%20Vaccine.pdf" target="_blank">
                        <div class="caption">
                        <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 26 กันยายน 2564)</p>
                        </div>
                      </a>
                      </td>
                      <td>
                      7
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="https://ddc.moph.go.th/uploads/ckeditor2//files/03102021_AEFI%20Situation_COVID%20Vaccine.pdf" target="_blank">
                        <div class="caption">
                        <p>สถานการณ์เหตุการณ์ไม่พึงประสงค์หลังรับวัคซีนป้องกันโรคโควิด 19 (ข้อมูล ณ วันที่ 3 ตุลาคม 2564)</p>
                        </div>
                      </a>
                      </td>
                      <td>
                      8
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
                    </div>
                    <!-- /.tab-content -->
                  </div>
          </div>
          <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  {{-- <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">เอกสารดาวน์โหลด</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example_1" class="table is-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th>รายชื่อเอกสาร</th>
						  <th>id</th>
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
						  <td>
                            1
                          </td>
                      </tr>
                      <tr>
                          <td>          <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_1.pdf" target="_blank">
                                      <div class="caption">
                                        <p>แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI1)</p>
                                      </div>
                                    </a>
                          </td>
						  <td>
                            2
                          </td>
                      </tr>
                      <tr>
                          <td>          <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_2.pdf" target="_blank">
                                      <div class="caption">
                                        <p>แบบสอบสวนอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI2)</p>
                                      </div>
                                    </a>
                          </td>
						  <td>
                            3
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
						  <td>
                            4
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
						  <td>
                            5
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
							<td>
							  6
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
						  <td>
                            7
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
						  <td>
                            8
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
						  <td>
                            9
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
							<td>
							  10
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
						<td>
						  11
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
						<td>
						  12
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
						<td>
						  13
						</td>
                      </tr>
                      <tr>
                          <td><a href="https://apps-doe.moph.go.th/boe/software/file/Vaccine induced_Immune_Thrombotic Thrombocytopenia_Thrombosis_with_Thrombocytopenia_Syndrome.pdf" target="_blank">
                              <div class="caption">
                                <p>ภาวะลิ่มเลือดอุดตันที่ร่วมกับเกล็ดเลือดต่ำภายหลังได้รับวัคซีน
                  Vaccine-induced Immune Thrombotic Thrombocytopenia (VITT)
                  Thrombosis with Thrombocytopenia Syndrome (TTS)</p><p style="color:red">(ใหม่)</p>
                              </div>
                            </a>
                          </td>
						  <td>
                            14
                          </td>
                      </tr>
                      <tr>
                          <td> <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_d_a_v_Final_06082021.pdf" target="_blank">
                            <div class="caption">
                              <p>กรณีการเสียชีวิตหลังได้รับวัคซีนโควิด 19 สลับชนิดที่ จ.ประจวบคีรีขันธ์</p><p style="color:red">(ใหม่)</p>
                            </div>
                          </a>
                        </td>
						<td>
                            15
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/Final_poster%20myocarditis_v9_03092021.pdf" target="_blank">
                            <div class="caption">
                              <p>โปสเตอร์ภาวะกล้ามเนื้อหัวใจและเยื่อหุ้มหัวใจอักเสบที่เกิดจากวัคซีนโควิด 19 ชนิดเอ็มอาร์เอ็นเอ</p><p style="color:red">(ใหม่)</p>
                            </div>
                          </a>
                        </td>
						<td>
						  16
						</td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/COVID%20arm_v1+logo.pdf" target="_blank">
                            <div class="caption">
                              <p>คำแนะนำภาวะ COVID ARM</p><p style="color:red">(ใหม่)</p>
                            </div>
                          </a>
                        </td>
						<td>
						  17
						</td>
                      </tr>
                      <tr>
                          <td>
                            <a href="https://apps-doe.moph.go.th/boe/software/file/Final_COVID_ARM.jpg" target="_blank">
                            <div class="caption">
                              <p>โปสเตอร์ COVID ARM คืออะไร</p><p style="color:red">(ใหม่)</p>
                            </div>
                          </a>
                        </td>
						<td>
						  18
						</td>
                      </tr>
                  </tbody>
              </table>
              </div>
            </div>
          </div>
        </div> --}}
        </section>
    <div class="row" style="margin-top:5px;">
      <h2>เอกสารดาวน์โหลด</h2>
                    <h3>เอกสารดาวน์โหลด</h3>
              <div class="col-md-2">
                <div class="thumbnail">
                  <a href="https://apps-doe.moph.go.th/boe/software/file/AW_AEFI%20WEB_25Oct2020.pdf" target="_blank">
                    <img src="{{ asset('public/asset/dist/img/d1.jpg') }}" style="width:50%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แนวทางการเฝ้าระวังและตอบโต้เหตุการณ์ไม่พึงประสงค์ภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรคของประเทศไทย</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail">
                  <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_1.pdf" target="_blank">
                    <img src="{{ asset('public/asset/dist/img/d2.jpg') }}" style="width:50%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI1)</br></br></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail">
                  <a href="https://apps-doe.moph.go.th/boe/software/file/AEFI_2.pdf" target="_blank">
                    <img src="{{ asset('public/asset/dist/img/d3.jpg') }}" style="width:50%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แบบสอบสวนอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI2)</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail">
                  <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_system_manual.pdf" target="_blank">
                    <img src="{{ asset('public/asset/dist/img/d4.jpg') }}" style="width:50%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>คู่มือการใช้งานระบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI)</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail">
                  <a href="https://online.pubhtml5.com/nqwl/vxcg/#p=1" target="_blank">
                    <img src="{{ asset('public/asset/dist/img/d5.jpg') }}" style="width:50%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แนวทางการให้วัคซีน โควิด 19 ในสถานการณ์การระบาดปี 64 ของประเทศไทย</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail">
                  <a href="https://apps-doe.moph.go.th/boe/software/file/Adverse Event Following Immunization.pdf" target="_blank">
                    <img src="{{ asset('public/asset/dist/img/d6.jpg') }}" style="width:50%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>คํานิยามที่เกี่ยวข้องกับเหตุการณ์ไมพึงประสงค์หลังการได้รับวัคซีน
(Adverse Event Following Immunization)
และคําแนะนําเบื้องต้นสำหรับการให้วัคซีน
</p>
                    </div>
                  </a>
                </div>
              </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_covid19_06.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d8.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>เหตุการณ์ไม่พึงประสงค์ภายหลังได้รับวัคซีนโควิด 19 </p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_hz.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d9.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>รายงานผู้ป่วยงูสวัดตามหลังการฉีดวัคซีนป้องกันโควิด-19 ชนิดต่างๆ</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_thrombosis.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d10.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>ภาวะการเกิดลิ่มเลือดอุดตันในปอดกับวัคซีนโควิด 19</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_arteriovenous.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d11.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>ภาวะผิดปกติที่หลอดเลือดแดงต่อกับหลอดเลือดดำ</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/Guideline_AEFI_COVID19vaccine_DOE_17062021.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d12.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>แนวทางการเฝ้าระวังและสอบสวนเหตุการณ์ไม่พึงประสงค์ภายหลังได้รับวัคซีนป้องกันโรคโควิด-19</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/ISRR_25Apr2021.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d7.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>แนวทางปฏิบัติสำหรับอาการไม่พึงประสงค์หลังการได้รับวัคซีนป้องกันโรค
  กรณีปฏิกิริยาที่สัมพันธ์กับ ความเครียดจากการฉีดวัคซีน กลุ่มอาการคล้ายภาวะหลอดเลือดสมอง</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/Vaccine induced myocarditis_Jul29_2021_Final_v2.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d13.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>ภาวะกล้ามเนื้อหัวใจและเยื่อหุ้มหัวใจอักเสบที่เกิดจากวัคซีนโควิด 19 ชนิดเอ็มอาร์เอ็นเอ</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/Vaccine induced_Immune_Thrombotic Thrombocytopenia_Thrombosis_with_Thrombocytopenia_Syndrome.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d16.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>ภาวะลิ่มเลือดอุดตันที่ร่วมกับเกล็ดเลือดต่ำภายหลังได้รับวัคซีน
Vaccine-induced Immune Thrombotic Thrombocytopenia (VITT)
Thrombosis with Thrombocytopenia Syndrome (TTS)</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/aefi_d_a_v_Final_06082021.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d15.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>กรณีการเสียชีวิตหลังได้รับวัคซีนโควิด 19 สลับชนิดที่ จ.ประจวบคีรีขันธ์</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/Final_poster%20myocarditis_v9_03092021.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d17.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>โปสเตอร์ภาวะกล้ามเนื้อหัวใจและเยื่อหุ้มหัวใจอักเสบที่เกิดจากวัคซีนโควิด 19 ชนิดเอ็มอาร์เอ็นเอ</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/COVID%20arm_v1+logo.pdf" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d18.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>คำแนะนำภาวะ COVID ARM</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="thumbnail">
          <a href="https://apps-doe.moph.go.th/boe/software/file/Final_COVID_ARM.jpg" target="_blank">
            <img src="{{ asset('public/asset/dist/img/d19.jpg') }}" style="width:50%">
            {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
            <div class="caption">
              <p>โปสเตอร์ COVID ARM คืออะไร</p>
            </div>
          </a>
        </div>
      </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bulma.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  @if ($message = Session::get('error'))
    Swal.fire({
      icon: 'error',
      title: 'เกิดข้อผิดพลาด',
      text: '{{ $message }}',
    });
  @endif
});

$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 1, "desc" ]],
		"columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ]
    });
} );
$(document).ready(function() {
    $('#example2').DataTable( {
        "order": [[ 1, "desc" ]],
		"columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ]
    });
} );
</script>
</body>
</html>
