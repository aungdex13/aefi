@extends('AEFI.layout.tabletemplate')
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
    $arr_load_nationality = load_nationality();
    $arr_necessary_to_investigate = load_necessary_to_investigate();
    $arr_vac_init = load_vac_init();
    //dd($data);
 ?>
  <h1>
    รายชื่อผู้มีอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค
    <small>AEFI</small>
  </h1>
  <ol class="breadcrumb">

  </ol>

</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <!--หัวข้อที่2 -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="{{ route('form1') }}" type="button" class="btn btn-success btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI ราย Case</a></h3>
        </div>
        {{-- <div class="box-header with-border">
          <h3 class="box-title"><a href="{{ route('lstf1group') }}" type="button" class="btn btn-warning btn-flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>เพิ่มผู้ป่วย AEFI รายกลุ่ม</a></h3>
      </div> --}}
      <!-- /.box-header -->
      <!-- form start -->
      <!-- /.box-header -->
      <div class="box-body">
    <table class="table table-bordered data-table"  style="width:100%">
        <thead>
            <tr>
              <th hidden>ID</th>
              <th style="text-align:center;">ID</th>
              <th style="text-align:center;">เลขที่ผู้ป่วย HN</th>
              <th style="text-align:center;">เลขที่ผู้ป่วย AN</th>
              <th style="text-align:center;">ชื่อ-นามสกุลผู้ป่วย</th>
              <th style="text-align:center;">อายุ</th>
              <th style="text-align:center;">เชื้อชาติ</th>
              <th style="text-align:center;">ที่อยู่</th>
              <th style="text-align:center;">มีความจำเป็นที่จะต้องสอบสวนโรค</th>
              <th style="text-align:center;">ข้อมูล AEFI2</th>
              <th style="text-align:center;">***</th>
            </tr>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

</div>
</div>
</div>
<!-- /.box -->
</div>
<!-- /.row -->
</section>

@include('AEFI.layout.footercaselstScript')
<!-- /.content -->
{{-- <script>
$(document).ready(function() {
$("#btnDelete").click(function(){
  alert("button");
});
});
</script> --}}
<script type="text/javascript">
  $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('listaefi1.list') }}",
        columns: [
            {"data": 'id'},
            {"data": 'hn'},
            {"data": 'an'},
            {"data": null, render: function(data, type, row, meta) {return row.first_name + " " + " " + row.sur_name}},
            {"data": null, render: function(data, type, row, meta)
            {return row.age_while_sick_year + " "+ "ปี" +
              " " + row.age_while_sick_month +
              " "+ "เดือน" + " " + row.age_while_sick_day + " "+ "วัน"}},
            {"data": 'nationality'},
            {"data": 'subdistrict'},
            {"data": 'necessary_to_investigate'},
            {"data": 'id_case'},
            {"data": 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>
@stop



</html>
