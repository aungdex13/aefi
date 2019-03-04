<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AEFIController extends Controller
{
    function __construct()
    {

    }

	// public function	index(){
	//
	// }


	public function form1(){
		$list=DB::table('tbl_provinces')->get();
		 return view('AEFI.Apps.form1')->with('list',$list);
	}

		public function fetch(Request $request){
		$id=$request->get('select');
		$result=array();
		$query=DB::table('tbl_provinces')
		->join('tbl_amphures','tbl_provinces.province_id','=','tbl_amphures.province_id')
		->select('tbl_amphures.amphur_name','tbl_amphures.amphur_id','tbl_amphures.amphur_code')
		->where('tbl_provinces.province_id',$id)
		->get();
		$output='<option value="">   อำเภอ   </option>';
			foreach ($query as $row) {
				$output.='<option value="'.$row->amphur_code.'">'.$row->amphur_name.'</option>';
			}
			echo $output;
	}
	public function fetchD(Request $request){
	$idD = $request->select;
	// dd($idD);
	$resultD=array();
	$queryD=DB::table('tbl_districts')
	->select('tbl_districts.district_name','tbl_districts.district_id','tbl_districts.district_code')
	->where(DB::raw('left(tbl_districts.district_code, 4)'),'=',$idD)
	->get();

	$outputD='<option value="">   ตำบล   </option>';
		foreach ($queryD as $rowD) {
			$outputD.='<option value="'.$rowD->district_code.'">'.$rowD->district_name.'</option>';
		}
		echo $outputD;

}



	public function form2(){
		return view('AEFI.Apps.form2');
	}
	public function login(){
		return view('AEFI.Apps.login');
	}
	public function dashboard(){
		return view('AEFI.Apps.dashboard');
	}
	public function AEFI506(){
		return view('AEFI.Apps.AEFI506');
	}
	public function welcome(){
		return view('welcome');
	}
	public function dataexport(){
		return view('AEFI.Apps.dataexport');
	}
}
