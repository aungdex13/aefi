<!DOCTYPE html>
<html lang="en">
<head>
<title>AEFI Systems</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">การลงทะเบียนเพื่อบันทึกข้อมูล AEFI</h4>
            </div>

            <div class="modal-body">


                <form id="registerForm" method="POST" action="{{ route('save-new-user') }}">
                     @csrf
<!---form--->           <div class="form-group">
<!---input width--->    <div class="col-xs-6">
                        <label for="InputName">ชื่อ</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="กรอกข้อมูลชื่อ" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        <br>
                        <label for="InputName">ชื่อผู้ใช้งาน(Username)</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="username" placeholder="กรอกข้อมูลชื่อผู้ใช้งาน" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    <hr>
                </div>
                </div>
                    <div class="form-group">
                    <div class="col-xs-6">

                        <label for="InputName">นามสกุล</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="surname" placeholder="กรอกข้อมูลนามสกุล" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>

                        <br>
                        <label for="InputPassword">รหัสผ่าน(Password)</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="กรอกข้อมูลรหัสผ่าน" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!--------------------------------------separator---------------------------------------------------------------> <hr>
                </div>
                </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputEmail">อีเมล์(Email)</label>
                        <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="กรอกข้อมูลอีเมล์" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!----------------------------break-------------------------------------------------------------> <br>
                     </div>
                 </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputStreetName">หน่วยงาน</label>
                        <div class="input-group">
                          <select id="js-example-basic-single" name="hospcode" class="js-example-basic-single form-control" data-dropdown-css-class="select2-danger">
                          </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        <br>
                    </div>
                </div>


                  <div class="form-group">
                  <div class="input-group-addon">
                  <input type="submit" name="submit" id="submit" value="สมัครสมาชิก" class="btn btn-success pull-right">

                  </div>
                </div>
                </form>
              </div><!---modal-body--->
          </div>
       </div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      //Initialize Select2 Elements
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
      @if ($message = Session::get('success'))
        Swal.fire({
                title: 'การลงทะเบียนสำเร็จ ',
                text: 'กรุณาส่งข้อมูลเพื่อยืนยันตัวตนจาก QR code หรือ Add Line : @675gdzyp',
                imageUrl: '{{ asset('images/aefi-ddc.png') }}',
                imageWidth: 400,
                imageHeight: 200,
                icon: 'success',

            }).then(function (result) {
                if (result.value) {
                    window.location = "{{ env('APP_URL') }}";
                }
            })
      @endif
      @if ($message = Session::get('error'))
        Swal.fire({
          icon: 'error',
          title: 'เกิดข้อผิดพลาด',
          text: '{{ $message }}',
        });
      @endif
    });
</script>
</body>
</html>
