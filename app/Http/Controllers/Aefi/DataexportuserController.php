<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Cache;
use App\User;
use App\ChospitalNew;
class DataexportuserController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function dataexportu(){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		$data_list_division = Cache::remember('ChospitalNewALL', 1440, function() {
			 $data_arr = ChospitalNew::select('hosp_name','hospcode')->get();
			 foreach ($data_arr as $data_val){
				 $arr[$data_val->hospcode] = $data_val->hosp_name;
			 }
			 return $arr;
		});
		$roleArr = auth()->user()->getRoleNames()->toArray();
		$selectcaselstF1=DB::table('users')
		->select('*');
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 // ->where('confirm', '=', 1)
							 ->get()->toArray();
							 break;
		 default:
			 break;
	 }
 }
		// ->where('status','=',null)

		 // dd($selectdata);
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();
		return view('AEFI.Apps.datauserexport',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'data_list_division'=>$data_list_division
			]);
	}
	public function dataexportuser(Request $req){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		// dd($roleArrusername,$roleArrhospcode,$roleArrprov_code,$roleArrregion);
	$roleArr = auth()->user()->getRoleNames()->toArray();
		$date_of_symptoms = $req->input('date_of_symptoms');
		$selectcaselstF1=DB::table('users')
		->whereYear('date_of_symptoms','=',$date_of_symptoms);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 ->get()->toArray();
							 break;
		 default:
			 break;
	 }
	}
		 // dd($selectdata);
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();

		return view('AEFI.Apps.datauserexport',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince
			]);
	}


	protected function listProvince(){
		$province = DB::table('tbl_provinces')
		->select('province_code','province_name')
		->orderBy('province_code', 'ASC')
		->get();
		foreach ($province as  $value) {
			$province_arr[$value->province_code] =trim($value->province_name);
		}
		// dd($province_arr);
		return $province_arr;
	}
	protected function listDistrict(){
		$district = DB::table('tbl_amphures')->select('amphur_code','amphur_name')->get();
		foreach ($district as  $value) {
			$district_arr[$value->amphur_code] =trim($value->amphur_name);
		}
		// dd($province_arr);
		return $district_arr;
	}
	protected function listsubdistrict(){
		$subdistrict = DB::table('tbl_districts')->select('district_code','district_name')->get();
		foreach ($subdistrict as  $value) {
			$district_arr[$value->district_code] =trim($value->district_name);
		}
		// dd($province_arr);
		return $district_arr;
	}
}
