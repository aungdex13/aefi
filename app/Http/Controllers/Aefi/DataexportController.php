<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Carbon\Carbon;
use Cache;
class DataexportController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function dataexport(){
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
		$selectcaselstF1= DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->select('aefi_form_1.date_entry',
													'aefi_form_1.id',
													'aefi_form_1.hn',
													'aefi_form_1.first_name',
													'aefi_form_1.sur_name',
													'aefi_form_1.house_number',
													'aefi_form_1.village_no',
													'aefi_form_1.province',
													'aefi_form_1.district',
													'aefi_form_1.subdistrict',
													'aefi_form_1.age_while_sick_year',
													'aefi_form_1.age_while_sick_month',
													'aefi_form_1.age_while_sick_day',
													'aefi_form_1.gender',
													'aefi_form_1.type_of_patient',
													'aefi_form_1.patient_status',
													'aefi_form_1.career',
													'aefi_form_1.date_of_symptoms',
													'aefi_form_1.time_of_symptoms',
													'aefi_form_1.time_of_treatment',
													'aefi_form_1.date_of_treatment',
													'aefi_form_1.rash',
													'aefi_form_1.erythema',
													'aefi_form_1.urticaria',
													'aefi_form_1.itching',
													'aefi_form_1.edema',
													'aefi_form_1.angioedema',
													'aefi_form_1.fainting',
													'aefi_form_1.hyperventilation',
													'aefi_form_1.syncope',
													'aefi_form_1.headche',
													'aefi_form_1.dizziness',
													'aefi_form_1.fatigue',
													'aefi_form_1.malaise',
													'aefi_form_1.dyspepsia',
													'aefi_form_1.diarrhea',
													'aefi_form_1.nausea',
													'aefi_form_1.vomiting',
													'aefi_form_1.abdominal_pain',
													'aefi_form_1.arthalgia',
													'aefi_form_1.myalgia',
													'aefi_form_1.fever38c',
													'aefi_form_1.swelling_at_the_injection',
													'aefi_form_1.swelling_beyond_nearest_joint',
													'aefi_form_1.lymphadenopathy',
													'aefi_form_1.lymphadenitis',
													'aefi_form_1.sterile_abscess',
													'aefi_form_1.bacterial_abscess',
													'aefi_form_1.febrile_convulsion',
													'aefi_form_1.afebrile_convulsion',
													'aefi_form_1.encephalopathy',
													'aefi_form_1.flaccid_paralysis',
													'aefi_form_1.spastic_paralysis',
													'aefi_form_1.hhe',
													'aefi_form_1.persistent_inconsolable_crying',
													'aefi_form_1.thrombocytopenia',
													'aefi_form_1.osteomyelitis',
													'aefi_form_1.toxic_shock_syndrome',
													'aefi_form_1.sepsis',
													'aefi_form_1.anaphylaxis',
													'aefi_form_1.transverse_myelitis',
													'aefi_form_1.gbs',
													'aefi_form_1.adem',
													'aefi_form_1.acute_myocardial',
													'aefi_form_1.ards',
													'aefi_form_1.symptoms_later_immunized',
													'aefi_form_1.other_symptoms_later_immunized',
													'aefi_form_1.Symptoms_details',
													'aefi_form_1.seriousness_of_the_symptoms',
													'aefi_form_1.diagnosis',
													'aefi_form_1.hospcode_treat',
													'aefi_form_1.province_reported',
													'aefi_form_1.datepicker_resiver',
													'aefi_form_1.other_medical_history',
													'aefi_form_1.lab_result',
													'aefi_form_1.more_reviews',		DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
						 GROUP_CONCAT( aefi_form_1_vac.lot_number ) as "lot_number",
						 GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
				 		 GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
				 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
				 		 GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						);
	//->orwhere('aefi_form_1.date_entry',$datenow);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hospital':
				$selectdata  = $selectcaselstF1
								->whereDate('aefi_form_1.date_entry',$datenow)
								->whereNull('aefi_form_1.status')
								->where(function($query) {
											$query->orWhere('aefi_form_1.user_hospcode',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_report',auth()->user()->hospcode);
									})
								->groupBy('aefi_form_1.id_case')
								->get();
			 break;
			 			 case 'pho':
				 $selectdata = $selectcaselstF1
				 				->whereDate('aefi_form_1.date_entry',$datenow)
				 				->whereNull('aefi_form_1.status')
								->where(function($query) {
											$query->orWhere('aefi_form_1.province_found_event',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_reported',auth()->user()->prov_code);
									})
								->groupBy('aefi_form_1.id_case')
								->get();				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
						 $selectdata = $selectcaselstF1
								 ->whereNull('aefi_form_1.status')
								 ->whereDate('aefi_form_1.date_entry',$datenow)
								 ->groupBy('aefi_form_1.id_case')
								 ->get();
				 }else {
					 $selectdata = $selectcaselstF1
							->whereDate('aefi_form_1.date_entry',$datenow)
							->whereIn('aefi_form_1.province_found_event',$selectgroupprov)
							//->whereIn('aefi_form_1.province_reported',$selectgroupprov)
							 //->orWhere('user_region',$roleArrregion)
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get();
				 }
					 break;
					 case 'ddc':

						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						 ->whereDate('aefi_form_1.date_entry',$datenow)
						 ->groupBy('aefi_form_1.id_case')
						 ->get();
						 break;
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 ->whereDate('aefi_form_1.date_entry',$datenow)
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
		return view('AEFI.Apps.dataf1export',
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

		public function dataexportfrm(Request $req){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		$roleArr = auth()->user()->getRoleNames()->toArray();
		$date_of_symptoms_in = $req->input('date_of_symptoms');
		$date_of_symptoms = explode('-', $date_of_symptoms_in);
		$date_of_symptoms_from = $date_of_symptoms[0]."-".$date_of_symptoms[1]."-".$date_of_symptoms[2];
		$date_of_symptoms_to = $date_of_symptoms[3]."-".$date_of_symptoms[4]."-".$date_of_symptoms[5];
		$cabonnow =  Carbon::now();
		$datenow = $cabonnow->toDateString();
$selectgroupprov = DB::table('chospital_new')
											 ->select('chospital_new.prov_code')
											 ->where('region',$roleArrregion)
											 ->groupBy('prov_code')
											 ->get()
											 ->pluck('prov_code');
		$selectcaselstF1=DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->select('aefi_form_1.date_entry',
													'aefi_form_1.id',
													'aefi_form_1.hn',
													'aefi_form_1.first_name',
													'aefi_form_1.sur_name',
													'aefi_form_1.house_number',
													'aefi_form_1.village_no',
													'aefi_form_1.province',
													'aefi_form_1.district',
													'aefi_form_1.subdistrict',
													'aefi_form_1.age_while_sick_year',
													'aefi_form_1.age_while_sick_month',
													'aefi_form_1.age_while_sick_day',
													'aefi_form_1.gender',
													'aefi_form_1.type_of_patient',
													'aefi_form_1.patient_status',
													'aefi_form_1.career',
													'aefi_form_1.date_of_symptoms',
													'aefi_form_1.time_of_symptoms',
													'aefi_form_1.time_of_treatment',
													'aefi_form_1.date_of_treatment',
													'aefi_form_1.rash',
													'aefi_form_1.erythema',
													'aefi_form_1.urticaria',
													'aefi_form_1.itching',
													'aefi_form_1.edema',
													'aefi_form_1.angioedema',
													'aefi_form_1.fainting',
													'aefi_form_1.hyperventilation',
													'aefi_form_1.syncope',
													'aefi_form_1.headche',
													'aefi_form_1.dizziness',
													'aefi_form_1.fatigue',
													'aefi_form_1.malaise',
													'aefi_form_1.dyspepsia',
													'aefi_form_1.diarrhea',
													'aefi_form_1.nausea',
													'aefi_form_1.vomiting',
													'aefi_form_1.abdominal_pain',
													'aefi_form_1.arthalgia',
													'aefi_form_1.myalgia',
													'aefi_form_1.fever38c',
													'aefi_form_1.swelling_at_the_injection',
													'aefi_form_1.swelling_beyond_nearest_joint',
													'aefi_form_1.lymphadenopathy',
													'aefi_form_1.lymphadenitis',
													'aefi_form_1.sterile_abscess',
													'aefi_form_1.bacterial_abscess',
													'aefi_form_1.febrile_convulsion',
													'aefi_form_1.afebrile_convulsion',
													'aefi_form_1.encephalopathy',
													'aefi_form_1.flaccid_paralysis',
													'aefi_form_1.spastic_paralysis',
													'aefi_form_1.hhe',
													'aefi_form_1.persistent_inconsolable_crying',
													'aefi_form_1.thrombocytopenia',
													'aefi_form_1.osteomyelitis',
													'aefi_form_1.toxic_shock_syndrome',
													'aefi_form_1.sepsis',
													'aefi_form_1.anaphylaxis',
													'aefi_form_1.transverse_myelitis',
													'aefi_form_1.gbs',
													'aefi_form_1.adem',
													'aefi_form_1.acute_myocardial',
													'aefi_form_1.ards',
													'aefi_form_1.symptoms_later_immunized',
													'aefi_form_1.other_symptoms_later_immunized',
													'aefi_form_1.Symptoms_details',
													'aefi_form_1.seriousness_of_the_symptoms',
													'aefi_form_1.diagnosis',
													'aefi_form_1.hospcode_treat',
													'aefi_form_1.province_reported',
													'aefi_form_1.datepicker_resiver',
													'aefi_form_1.other_medical_history',
													'aefi_form_1.lab_result',
													'aefi_form_1.more_reviews',
		DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
						 GROUP_CONCAT( aefi_form_1_vac.lot_number ) as "lot_number",
						 GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
				 		 GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
				 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
				 		 GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						)
						->whereDate('aefi_form_1.date_entry', '>=', $date_of_symptoms_from)
						->whereDate('aefi_form_1.date_entry', '<=', $date_of_symptoms_to);
	if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hospital':
				 $selectdata  = $selectcaselstF1
								 ->where(function($query) {
											 $query->orWhere('aefi_form_1.user_hospcode',auth()->user()->hospcode)
														 ->orWhere('aefi_form_1.hospcode_treat',auth()->user()->hospcode)
														 ->orWhere('aefi_form_1.hospcode_report',auth()->user()->hospcode);
									 })
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get();			 break;
			 case 'pho':
				 $selectdata = $selectcaselstF1
				 ->whereNull('aefi_form_1.status')
				 ->where(function($query) {
							 $query->orWhere('aefi_form_1.province_found_event',auth()->user()->prov_code)
										 ->orWhere('aefi_form_1.province_reported',auth()->user()->prov_code);
					 })
				 ->groupBy('aefi_form_1.id_case')
								 ->get();				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
						 $selectdata = $selectcaselstF1
								 // ->where('user_region',$roleArrregion)
								 ->whereNull('aefi_form_1.status')
								 ->groupBy('aefi_form_1.id_case')
								 ->get();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->whereIn('aefi_form_1.province_found_event',$selectgroupprov)
								//->whereIn('aefi_form_1.province_reported',$selectgroupprov)
							 ->whereNull('aefi_form_1.status')
							 ->groupBy('aefi_form_1.id_case')
							 ->get();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						 ->groupBy('aefi_form_1.id_case')
						 ->get();
						 break;
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
		return view('AEFI.Apps.dataf1export',
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
