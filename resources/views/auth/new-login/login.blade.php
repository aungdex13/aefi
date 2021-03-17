<!DOCTYPE html>
<html lang="en">
<head>
<title>AEFI Systems</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
    					<div class="col-xs-6 col-sm-6 col-md-6">
                <input type="submit" class="btn btn-lg btn-success btn-block" value="เข้าสู่ระบบ">
    					</div>
              {{-- <div class="col-xs-6 col-sm-6 col-md-6">
    						<a href="{{ route('resetpass') }}" class="btn btn-lg btn-warning btn-block">ลืมรหัสผ่าน</a>
    					</div> --}}
              <div class="col-xs-6 col-sm-6 col-md-6">
                <a href="{{ route('register-form') }}" class="btn btn-lg btn-primary btn-block">สมัครสมาชิก</a>
              </div>
    				</div>
          </br>
            <div class="row" style="margin-top:20px;">
              <h2>เอกสารดาวน์โหลด</h2>
              <div class="col-md-6">
                <div class="thumbnail">
                  <a href="https://apps.doe.moph.go.th/boe/software/file/AW_AEFI%20WEB_25Oct2020.pdf" target="_blank">
                    <img src="{{ asset('asset/dist/img/d1.jpg') }}" style="width:100%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แนวทางการเฝ้าระวังและตอบโต้เหตุการณ์ไม่พึงประสงค์ภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรคของประเทศไทย</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="thumbnail">
                  <a href="https://apps.doe.moph.go.th/boe/software/file/AEFI_1.pdf" target="_blank">
                    <img src="{{ asset('asset/dist/img/d2.jpg') }}" style="width:100%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แบบสอบสวนอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI1)</br></br></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="thumbnail">
                  <a href="https://apps.doe.moph.go.th/boe/software/file/AEFI_2.pdf" target="_blank">
                    <img src="{{ asset('asset/dist/img/d3.jpg') }}" style="width:100%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>แบบสอบสวนอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI2)</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="thumbnail">
                  <a href="https://apps.doe.moph.go.th/boe/software/file/aefi_system_manual.pdf" target="_blank">
                    <img src="{{ asset('asset/dist/img/d4.jpg') }}" style="width:100%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>คู่มือการใช้งานระบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI)</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="thumbnail">
                  <a href="https://online.pubhtml5.com/nqwl/vxcg/#p=1" target="_blank">
                    <img src="{{ asset('asset/dist/img/d5.jpg') }}" style="width:100%">
                    {{-- <img src="/w3images/nature.jpg" alt="Nature" style="width:100%"> --}}
                    <div class="caption">
                      <p>คู่มือการใช้งานระบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรค (AEFI)</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
    			</fieldset>
    		</form>
    	</div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

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
</script>
</body>
</html>
