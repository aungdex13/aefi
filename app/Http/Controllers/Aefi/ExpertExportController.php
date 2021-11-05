<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Carbon\Carbon;
class ExpertExportController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function index(){
		$cabonnow =  Carbon::now();
		$datenow = $cabonnow->toDateString();
		$yearnow =  now()->year;
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		//dd($roleArrusername,$roleArrhospcode,$roleArrprov_code,$roleArrregion);
		$roleArr = auth()->user()->getRoleNames()->toArray();
$selectgroupprov = DB::table('chospital_new')
											 ->select('chospital_new.prov_code')
											 ->where('region',$roleArrregion)
											 ->groupBy('prov_code')
											 ->get()
											 ->pluck('prov_code');

		$yearnow =  now()->year;
		$selectcaselstF1=DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->join('expertmeeting', 'aefi_form_1.id_case', '=', 'expertmeeting.id_case')
		->select('aefi_form_1.id',
							'aefi_form_1.date_of_symptoms',
							'aefi_form_1.first_name',
							'aefi_form_1.sur_name',
							'aefi_form_1.gender',
							'aefi_form_1.province_reported',
							'aefi_form_1.hospcode_treat',
							'expertmeeting.r_o',
							'expertmeeting.other_r_o',
							'expertmeeting.final_diag',
							'expertmeeting.other_final_diag',
							'expertmeeting.causality',
							'expertmeeting.summary',
							'expertmeeting.expert_meet_date',
							'aefi_form_1_vac.name_of_vaccine',
							'aefi_form_1_vac.date_of_vaccination',
		DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine)  as "name_of_vaccine",
				 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination" ')
						);
	//->orwhere('aefi_form_1.date_entry',$datenow);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 // ->whereDate('aefi_form_1.date_entry',$datenow)
							 ->groupBy('aefi_form_1.id_case')
							 ->get();
							 break;
							 case 'admin-dpc':
							 $selectdata = $selectcaselstF1
							 ->whereIn('aefi_form_1.province',$selectgroupprov)
							 // ->whereDate('aefi_form_1.date_entry',$datenow)
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get();
							 break;
		 default:
			 break;
	 }
 }
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();
		 $listvac_arr=$this->listvac_arr();
		 $list_hos=$this->list_hos();
		return view('AEFI.Apps.ExpertExport',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'yearnow'=>$yearnow,
				'listvac_arr'=>$listvac_arr,
				'datenow'=>$datenow,
				'list_hos'=>$list_hos
			]);
	}

		public function indexsrc(Request $req){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		$roleArr = auth()->user()->getRoleNames()->toArray();
		$date_of_symptoms_in = $req->input('date_of_symptoms');
		$date_of_symptoms = explode('-', $date_of_symptoms_in);
		$date_of_symptoms_from = $date_of_symptoms[0]."-".$date_of_symptoms[1]."-".$date_of_symptoms[2];
		$date_of_symptoms_to = $date_of_symptoms[3]."-".$date_of_symptoms[4]."-".$date_of_symptoms[5];
		// dd($date_of_symptoms_in,$date_of_symptoms);
		$cabonnow =  Carbon::now();
		$datenow = $cabonnow->toDateString();
		$selectcaselstF1=DB::table('aefi_form_1')
		// ->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->join('expertmeeting', 'aefi_form_1.id_case', '=', 'expertmeeting.id_case')
		->select('aefi_form_1.id',
		'aefi_form_1.date_of_symptoms',
							'aefi_form_1.first_name',
							'aefi_form_1.sur_name',
							'aefi_form_1.gender',
							'aefi_form_1.province_reported',
							'aefi_form_1.hospcode_treat',
							'expertmeeting.r_o',
							'expertmeeting.other_r_o',
							'expertmeeting.final_diag',
							'expertmeeting.other_final_diag',
							'expertmeeting.causality',
							'expertmeeting.summary',
							'expertmeeting.expert_meet_date',
							// 'aefi_form_1_vac.name_of_vaccine',
							// 'aefi_form_1_vac.date_of_vaccination'
		// DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
		// 		 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination" ')
						)
						->whereDate('aefi_form_1.date_entry', '>=', $date_of_symptoms_from)
						->whereDate('aefi_form_1.date_entry', '<=', $date_of_symptoms_to);
	if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get();
							 break;
							 case 'admin-dpc':
							 $selectdata = $selectcaselstF1
							 ->whereIn('aefi_form_1.province',$selectgroupprov)
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get();
							 break;
		 default:
			 break;
	 }
	}
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();
		 $listvac_arr=$this->listvac_arr();
		 $list_hos=$this->list_hos();
		return view('AEFI.Apps.ExpertExport',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'listvac_arr'=>$listvac_arr,
				'date_of_symptoms_from'=>$date_of_symptoms_from,
				'date_of_symptoms_to'=>$date_of_symptoms_to,
				'datenow'=>$datenow,
				'list_hos'=>$list_hos
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
	protected function list_hos(){
		$arr_hos = DB::table('chospital_new')->select('hospcode','hosp_name')->get();
		foreach ($arr_hos as  $value) {
			$arr_hos[$value->hospcode] =trim($value->hosp_name);
		}
		// dd($province_arr);
		return $arr_hos;
	}
}
