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
		$deletedata1 = DB::table('aefi_form_1')->where('id_case','=', $req->id_case)->delete();
		 if ($deletedata1) {
			$deletedatavac1 = DB::table('aefi_form_1_vac')->where('id_case','=', $req->id_case)->delete();
		}else {
			dd('fail');
		}
	}
}
