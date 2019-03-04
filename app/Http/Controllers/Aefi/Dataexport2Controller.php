<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Dataexport2Controller extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function dataexport2(){
		$selectdata2=$this->selectdata2();
		 // dd($selectdata);
		return view('AEFI.Apps.dataf2export',
			[
				'selectdata2'=>$selectdata2
			]);
	}

	public function selectdata2(){
		$this->result = DB::table('aefi_form_2')
		->get();
		return $this->result;

	}
}
