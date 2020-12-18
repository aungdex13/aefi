<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DeleteController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}
	public function deletedata1(Request $req){
		$deletedata = DB::table('aefi_form_1')
              				->where('id_case', $req->id_case)
              				->update(['status' => 1]);
		 if ($deletedata) {
			 $deletedata_vac = DB::table('aefi_form_1_vac')
												 ->where('id_case', $req->id_case)
												 ->update(['status' => 1]);
				if ($deletedata_vac) {
					$msg = " ส่งข้อมูลสำเร็จ";
					$url_rediect = "<script>alert('".$msg."');location.href='lstf1';</script> ";
				}else {
					$msg = "ส่งข้อมูลไม่สำเร็จ";
					$url_rediect = "<script>alert('".$msg."');location.href='lstf1';</script> ";
				}
		}else {
			$msg = "ส่งข้อมูลไม่สำเร็จ";
			$url_rediect = "<script>alert('".$msg."');location.href='lstf1';</script> ";
		}
		echo $url_rediect;
	}
}
