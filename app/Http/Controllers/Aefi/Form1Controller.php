<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Form1Controller extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function index(){
		$list=$this->form1();
		$aecode=$this->aecode();
		$groupproduct=$this->groupproduct();
		// dd($list);
		return view('AEFI.Apps.form1',
			[
				'list'=>$list ,
				'aecode'=>$aecode,
				'groupproduct'=>$groupproduct
			]);
	}

	public function form1(){
		$list=DB::table('tbl_provinces')->get();
		 // return view('AEFI.Apps.form1')->with('list',$list);
		 return $list;
	}
	public function aecode(){
		$this->result = DB::table('dt_aecode')
		->get();
		return $this->result;

	}
	public function groupproduct(){
		$this->result = DB::table('dt_groupproduct')
		->get();
		return $this->result;

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
}
