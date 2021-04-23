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
              <h4 class="modal-title" id="myModalLabel">รีเซ็ทรหัสผ่าน AEFI</h4>
            </div>

            <div class="modal-body">


                <form id="registerForm" method="POST" action="{{ route('Reset_Password_Users') }}">
                     @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputEmail">อีเมล์(Email)</label>
                        <div class="input-group">
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="กรอกข้อมูลอีเมล์" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!----------------------------break-------------------------------------------------------------> <br>
                     </div>
                 </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                          <label for="InputPassword">รหัสผ่าน(Password)</label><span id="error_password" style="color: red;"></span>
                          <div class="input-group">
                          <input type="password" id="password" class="form-control" name="password" placeholder="กรอกข้อมูลรหัสผ่าน" required>
                          <span class="input-group-addon" onclick="myFunction()"><span class="glyphicon glyphicon-eye-open"></span></span>
                      </div>
                    </br>
                    </div>
                </div>


                  <div class="form-group">
                  <div class="input-group-addon">
                  <input type="submit" name="submit" id="submit" value="รีเซ็ทรหัสผ่าน" class="btn btn-success pull-right">

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
      $("#username").focusout(function(){
            var SpacialCharacter = /[ก-๙ ]/;

            if ($(this).val().match(SpacialCharacter)) {
                $(this).css("border-color", "#FF0000");
                $("#username").val("");
                $("#error_username").text("* ไม่สามารถกรอกภาษาไทย");
                $("#error_username").focus();
            } else {
                $(this).css("border-color", "#2eb82e");
                $("#error_username").text("");
            }
      });
      $("#password").focusout(function(){
        var val_length = $(this).val().length;
        if(val_length<8){
          $(this).css("border-color", "#FF0000");
                $("#password").val("");
                $("#error_password").text("* กำหนดรหัสผ่านไม่น้อยกว่า 8 ตัวอักษร");
                $("#error_password").focus();
        }else{
                $(this).css("border-color", "#2eb82e");
                $("#error_password").text("");
        }
      });
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
                title: 'รีเซ็ทรหัสผ่านสำเร็จ ',
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

    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
</body>
</html>
