<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
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

	public function deletedata2(Request $req){
		$id_case = $req->id_case ;
		$filename = $req->file_name ;
		// dd($filename);
		Storage::delete("file_upload/".$filename);
		$deletedata2 = DB::table('aefi_form_2')
											->where('id_case', $id_case)
											->where('file_name', $filename)
											->update(['status' => 2]);
		if ($deletedata2) {
			$msg = " ส่งข้อมูลสำเร็จ";
			$url_rediect = "<script>alert('".$msg."');location.href='lstf2?id_case=".$req->id_case."';</script> ";
		}else{
			$msg = "ส่งข้อมูลไม่สำเร็จ";
			$url_rediect = "<script>alert('".$msg."');location.href='lstf2?id_case=".$req->id_case."';</script> ";
		}
		echo $url_rediect;
	}
}
