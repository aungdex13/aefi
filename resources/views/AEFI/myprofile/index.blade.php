@extends('AEFI.layout.tabletemplate')
@section('content')
<section class="content-header">
<!-- Content Header (Page header) -->
<h1>
  แก้ไขข้อมูล {{ Auth::user()->name }} {{ Auth::user()->sur_name }}
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
			  <h3 class="box-title">แก้ไขข้อมูล</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- Custom Tabs -->
        <form action="{{ route('myprofile-edit') }}" method="post">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email">ชื่อ:</label>
              <input type="text" name="name" value="{{ $datas->name }}"  class="form-control"  id="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="pwd">นามสกุล:</label>
              <input type="text" name="sur_name" value="{{ $datas->sur_name }}"  class="form-control"  id="sur_name" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email">username:</label>
              <input type="text" name="username" value="{{ $datas->username }}"  class="form-control"  id="username" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="pwd">password:</label>
              <input type="text" name="password"   class="form-control"  id="password" >
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email">email:</label>
              <input type="email" name="email" value="{{ $datas->email }}"  class="form-control"  id="email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="pwd">หน่วยงาน:</label>
              <select id="js-example-basic-single" name="hospcode" class="js-example-basic-single form-control">
                @if($datas->hospcode)
                  <option value="{{ $list_hosp['hospcode'] }}">{{ $list_hosp['hosp_name'] }}</option>
                @endif
              </select>
            </div>
          </div>
          <input type="hidden" name="id" value="{{ $datas->id }}" />
          <button type="submit" class="btn btn-primary">บันทึก</button>
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
  $('#example').DataTable();
  $(".js-example-basic-single").select2({
    allowClear: true,
    language: {
    inputTooShort: function (args) {
        return "กรุณาพิมพ์คำค้นหาอย่างน้อย 3 ตัวอักษร";
    },
    noResults: function () {
        return "ไม่พบข้อมูล";
    },
    searching: function () {
        return "กำลังค้นหาข้อมูล...";
    }
    },
    placeholder: "กรุณาพิมพ์ชื่อหน่วยงานที่ต้องการ เช่น. สคร.1,โรงพยาบาลเลิดสิน,สำนักงานสาธารณสุขจังหวัดสมุทรปราการ",
    minimumInputLength: 3,
    minimumResultsForSearch: 5,
    ajax: {
     url: "{{ route('list-division-json') }}",
     type: "GET",
     dataType: 'json',
     delay: 250,
     data: function (params) {
      return {
        searchTerm: params.term // search term
      };
     },
     processResults: function (response) {
       return {
          results: response
       };
     },
     cache: true
    }
  });
});
</script>
<!-- /.content -->
@stop
