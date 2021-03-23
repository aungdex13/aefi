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
		$yearnow =  now()->year;
		$selectcaselstF1=DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->select('aefi_form_1.*',
		DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
						 GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
				 		 GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
				 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
				 		 GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						)
		->whereYear('date_of_symptoms','=',$yearnow);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hos':
				 $selectdata  = $selectcaselstF1
								 ->where('user_hospcode',$roleArrhospcode)
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get()->toArray();
			 break;
			 case 'pho':
				 $selectdata = $selectcaselstF1
								 ->where('user_provcode',$roleArrprov_code)
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get()->toArray();
				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173") {
						 $selectdata = $selectcaselstF1
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get()->toArray();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->where('user_region',$roleArrregion)
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get()->toArray();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						 ->groupBy('aefi_form_1.id_case')
						 ->get()->toArray();
						 break;
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get()->toArray();
							 break;
		 default:
			 break;
	 }
 }
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();
		 $listvac_arr=$this->listvac_arr();
		return view('AEFI.Apps.dataf1export',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'listvac_arr'=>$listvac_arr
			]);
	}

	public function dataexportfrm(Request $req){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		$roleArr = auth()->user()->getRoleNames()->toArray();
		$date_of_symptoms = $req->input('date_of_symptoms');
		$selectcaselstF1=DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->select('aefi_form_1.*',
		DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
						 GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
				 		 GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
				 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
				 		 GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						)
		->whereYear('date_of_symptoms','=',$date_of_symptoms);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hos':
				 $selectdata  = $selectcaselstF1
								 ->where('user_hospcode',$roleArrhospcode)
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get()->toArray();
			 break;
			 case 'pho':
				 $selectdata = $selectcaselstF1
								 ->where('user_provcode',$roleArrprov_code)
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get()->toArray();
				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173") {
						 $selectdata = $selectcaselstF1
								 // ->where('user_region',$roleArrregion)
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get()->toArray();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->where('user_region',$roleArrregion)
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get()->toArray();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						 ->groupBy('aefi_form_1.id_case')
						 ->get()->toArray();
						 break;
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get()->toArray();
							 break;
		 default:
			 break;
	 }
	}
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();
		 $listvac_arr=$this->listvac_arr();
		return view('AEFI.Apps.dataf1export',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'listvac_arr'=>$listvac_arr
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
	protected function listvac_arr(){
		$arr_vac = DB::table('vac_tbl')->select('VAC_CODE','VAC_NAME_EN')->get();
		foreach ($arr_vac as  $value) {
			$arr_vac[$value->VAC_CODE] =trim($value->VAC_NAME_EN);
		}
		// dd($province_arr);
		return $arr_vac;
	}
}
