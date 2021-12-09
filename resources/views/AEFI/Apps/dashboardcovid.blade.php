@extends('AEFI.layout.template')
@section('content')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
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
$arr_seriousness_of_the_symptoms = load_seriousness_of_the_symptoms();

 ?>
 <style>
  #sinovac {
    
    width: 100%;
  }
  
  #sinovac td, #sinovac th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #sinovac tr:nth-child(even){background-color: #f2f2f2;}
  
  #sinovac tr:hover {background-color: #ddd;}
  
  #sinovac th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #F58840;
    color: black;
  }
  #astrazaneca {
    
    width: 100%;
  }
  
  #astrazaneca td, #astrazaneca th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #astrazaneca tr:nth-child(even){background-color: #f2f2f2;}
  
  #astrazaneca tr:hover {background-color: #ddd;}
  
  #astrazaneca th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #B983FF;
    color: black;
  }
  #sinopharm {
    
    width: 100%;
  }
  
  #sinopharm td, #sinopharm th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #sinopharm tr:nth-child(even){background-color: #f2f2f2;}
  
  #sinopharm tr:hover {background-color: #ddd;}
  
  #sinopharm th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #BFD8B8;
    color: black;
  }
  #phizer {
    width: 100%;
  }
  
  #phizer td, #phizer th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #phizer tr:nth-child(even){background-color: #f2f2f2;}
  
  #phizer tr:hover {background-color: #ddd;}
  
  #phizer th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #577BC1;
    color: black;
  }
  </style>
  <h1>
    แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรคโควิด 19
    <small>AEFI COVID</small>
  </h1>
  <ol class="breadcrumb">
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <div class="col-md-12">
                <p class="text-center">
                  ร้อยละของอาการที่พบหลังการได้รับวัคซีนป้องกันโรคโควิด 19
                  ของผู้ป่วยที่เข้ารับการรักษาเป็นผู้ป่วยใน จำแนกตามชนิดวัคซีน
                </p>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    ข้อมูล ณ วันที่ {{$datenow}} เวลา {{$timenow}} จากฐานข้อมูล AEFI-DDC กองระบาดวิทยา กรมควบคุมโรค
                  </p>
                </div>
                </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                  </p>
                  <div class="col-md-3">
                    <!-- Sales Chart Canvas -->
                    <table id="sinovac">
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Sinovac</th>
                      </tr>
                      <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                      </tr>
                      <tr>
                        <td>Berglunds snabbköp</td>
                        <td>Christina Berglund</td>
                      </tr>
                      <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                      </tr>
                      <tr>
                        <td>Ernst Handel</td>
                        <td>Roland Mendel</td>
                      </tr>
                      <tr>
                        <td>Island Trading</td>
                        <td>Helen Bennett</td>
                      </tr>
                    </table>
                    
                  </div>
                  <div class="col-md-3">
                    <!-- Sales Chart Canvas -->
                    <table id="astrazaneca">
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Astrazaneca</th>
                      </tr>
                      <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                      </tr>
                      <tr>
                        <td>Berglunds snabbköp</td>
                        <td>Christina Berglund</td>
                      </tr>
                      <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                      </tr>
                      <tr>
                        <td>Ernst Handel</td>
                        <td>Roland Mendel</td>
                      </tr>
                      <tr>
                        <td>Island Trading</td>
                        <td>Helen Bennett</td>
                      </tr>
                    </table>
                    
                  </div>
                  <div class="col-md-3">
                    <!-- Sales Chart Canvas -->
                    <table id="sinopharm">
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Sinopharm</th>
                      </tr>
                      <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                      </tr>
                      <tr>
                        <td>Berglunds snabbköp</td>
                        <td>Christina Berglund</td>
                      </tr>
                      <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                      </tr>
                      <tr>
                        <td>Ernst Handel</td>
                        <td>Roland Mendel</td>
                      </tr>
                      <tr>
                        <td>Island Trading</td>
                        <td>Helen Bennett</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-3">
                    <!-- Sales Chart Canvas -->
                    <table id="phizer">
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Pfizer</th>
                      </tr>
                      <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                      </tr>
                      <tr>
                        <td>Berglunds snabbköp</td>
                        <td>Christina Berglund</td>
                      </tr>
                      <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                      </tr>
                      <tr>
                        <td>Ernst Handel</td>
                        <td>Roland Mendel</td>
                      </tr>
                      <tr>
                        <td>Island Trading</td>
                        <td>Helen Bennett</td>
                      </tr>
                    </table>
                  </div>
                  
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
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
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">การวินิจฉัยเบื้องต้นเกี่ยวกับความร้ายแรงของอาการของผู้ป่วย AEFI COVID</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart-responsive">
                <div id="piechartContainer" style="height: 370px; width: 100%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> ร้ายแรง</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> ไม่ร้ายแรง</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box -->

    <!-- /.box -->
  </div>
</section>

@include('AEFI.layout.footerScriptDashcovid')
<!-- /.content -->
@stop
