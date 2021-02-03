<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
class DownloadController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}
	public function dowloaddata2(Request $req){
		$id_case = $req->id_case ;
		$filename = $req->file_name ;
		// dd($filename,$id_case);
		return Storage::download("file_upload/".$filename);
	}
}
