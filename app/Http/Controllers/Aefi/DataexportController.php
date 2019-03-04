<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DataexportController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function dataexport(){
		$selectdata=$this->selectdata();
		 // dd($selectdata);
		return view('AEFI.Apps.dataf1export',
			[
				'selectdata'=>$selectdata
			]);
	}

	public function selectdata(){
		$this->result = DB::table('aefi_form_1')
		->get();
		return $this->result;

	}
}
