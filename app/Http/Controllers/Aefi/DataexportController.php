<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
class DataexportController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function dataexport(){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		// dd($roleArrusername,$roleArrhospcode,$roleArrprov_code,$roleArrregion);
	$roleArr = auth()->user()->getRoleNames()->toArray();

		$selectcaselstF1=DB::table('aefi_form_1')
		->select('*');
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hos':
				 $selectdata  = $selectcaselstF1
								 ->where('user_hospcode',$roleArrhospcode)
								 ->whereNull('aefi_form_1.status')
								 ->get()->toArray();
			 break;
			 case 'pho':
				 $selectdata = $selectcaselstF1
								 ->where('user_provcode',$roleArrprov_code)
								 ->whereNull('aefi_form_1.status')
								 ->get()->toArray();
				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173") {
						 $selectdata = $selectcaselstF1
								 // ->where('user_region',$roleArrregion)
								 ->whereNull('aefi_form_1.status')
								 ->get()->toArray();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->where('user_region',$roleArrregion)
							 ->whereNull('aefi_form_1.status')
							 ->get()->toArray();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						 ->get()->toArray();
						 break;
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
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
		return view('AEFI.Apps.dataf1export',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince
			]);
	}

	public function dataexportfrm(Request $req){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		// dd($roleArrusername,$roleArrhospcode,$roleArrprov_code,$roleArrregion);
	$roleArr = auth()->user()->getRoleNames()->toArray();
		$date_of_symptoms = $req->input('date_of_symptoms');
		$selectcaselstF1=DB::table('aefi_form_1')
		->whereYear('date_of_symptoms','=',$date_of_symptoms);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hos':
				 $selectdata  = $selectcaselstF1
								 ->where('user_hospcode',$roleArrhospcode)
								 ->whereNull('aefi_form_1.status')
								 ->get()->toArray();
			 break;
			 case 'pho':
				 $selectdata = $selectcaselstF1
								 ->where('user_provcode',$roleArrprov_code)
								 ->whereNull('aefi_form_1.status')
								 ->get()->toArray();
				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173") {
						 $selectdata = $selectcaselstF1
								 // ->where('user_region',$roleArrregion)
								 ->whereNull('aefi_form_1.status')
								 ->get()->toArray();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->where('user_region',$roleArrregion)
							 ->whereNull('aefi_form_1.status')
							 ->get()->toArray();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						 ->get()->toArray();
						 break;
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

		return view('AEFI.Apps.dataf1export',
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
