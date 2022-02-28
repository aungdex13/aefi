<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
		$selectcaselstF1 =  DB::table('aefi_form_1')
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
													'aefi_form_1_vac.patient_status',
													'aefi_form_1.career',
													'aefi_form_1_vac.date_of_symptoms',
													'aefi_form_1_vac.time_of_symptoms',
													'aefi_form_1_vac.time_of_treatment',
													'aefi_form_1_vac.date_of_treatment',
													'aefi_form_1_vac.rash',
													'aefi_form_1_vac.erythema',
													'aefi_form_1_vac.urticaria',
													'aefi_form_1_vac.itching',
													'aefi_form_1_vac.edema',
													'aefi_form_1_vac.angioedema',
													'aefi_form_1_vac.fainting',
													'aefi_form_1_vac.hyperventilation',
													'aefi_form_1_vac.syncope',
													'aefi_form_1_vac.headche',
													'aefi_form_1_vac.dizziness',
													'aefi_form_1_vac.fatigue',
													'aefi_form_1_vac.malaise',
													'aefi_form_1_vac.dyspepsia',
													'aefi_form_1_vac.diarrhea',
													'aefi_form_1_vac.nausea',
													'aefi_form_1_vac.vomiting',
													'aefi_form_1_vac.abdominal_pain',
													'aefi_form_1_vac.arthalgia',
													'aefi_form_1_vac.myalgia',
													'aefi_form_1_vac.fever38c',
													'aefi_form_1_vac.swelling_at_the_injection',
													'aefi_form_1_vac.swelling_beyond_nearest_joint',
													'aefi_form_1_vac.lymphadenopathy',
													'aefi_form_1_vac.lymphadenitis',
													'aefi_form_1_vac.sterile_abscess',
													'aefi_form_1_vac.bacterial_abscess',
													'aefi_form_1_vac.febrile_convulsion',
													'aefi_form_1_vac.afebrile_convulsion',
													'aefi_form_1_vac.encephalopathy',
													'aefi_form_1_vac.flaccid_paralysis',
													'aefi_form_1_vac.spastic_paralysis',
													'aefi_form_1_vac.hhe',
													'aefi_form_1_vac.persistent_inconsolable_crying',
													'aefi_form_1_vac.thrombocytopenia',
													'aefi_form_1_vac.osteomyelitis',
													'aefi_form_1_vac.toxic_shock_syndrome',
													'aefi_form_1_vac.sepsis',
													'aefi_form_1_vac.anaphylaxis',
													'aefi_form_1_vac.transverse_myelitis',
													'aefi_form_1_vac.gbs',
													'aefi_form_1_vac.adem',
													'aefi_form_1_vac.acute_myocardial',
													'aefi_form_1_vac.ards',
													'aefi_form_1_vac.symptoms_later_immunized',
													'aefi_form_1_vac.other_symptoms_later_immunized',
													'aefi_form_1_vac.Symptoms_details',
													'aefi_form_1_vac.seriousness_of_the_symptoms',
													'aefi_form_1.diagnosis',
													'aefi_form_1.hospcode_treat',
													'aefi_form_1.province_reported',
													'aefi_form_1.datepicker_resiver',
													'aefi_form_1.other_medical_history',
													'aefi_form_1.lab_result',
													'aefi_form_1.more_reviews',		
													'aefi_form_1_vac.name_of_vaccine',
													'aefi_form_1_vac.lot_number',
													'aefi_form_1_vac.manufacturer',
													'aefi_form_1_vac.dose',
													'aefi_form_1_vac.date_of_vaccination',
													'aefi_form_1_vac.time_of_vaccination',
													'aefi_form_1.career_code',
													'aefi_form_1.main_diagnosis',
													'aefi_form_1.minor_diagnosis'
						// DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
						//  GROUP_CONCAT( aefi_form_1_vac.lot_number ) as "lot_number",
						//  GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
				 		//  GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
				 		//  GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
				 		//  GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						);
	//->orwhere('aefi_form_1.date_entry',$datenow);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hospital':
				$selectdata  =   $selectcaselstF1->whereDate('aefi_form_1.date_entry',$datenow)
								->whereNull('aefi_form_1.status')
								->where(function($query) {
											$query->orWhere('aefi_form_1.user_hospcode',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_report',auth()->user()->hospcode);
									})
								// ->groupBy('aefi_form_1.id_case')
								->get();
			 break;
			 			 case 'pho':
				 $selectdata = $selectcaselstF1->whereDate('aefi_form_1.date_entry',$datenow)
				 				->whereNull('aefi_form_1.status')
								->where(function($query) {
											$query->orWhere('aefi_form_1.province_found_event',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_reported',auth()->user()->prov_code);
									})
								// ->groupBy('aefi_form_1.id_case')
								->get();				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
						 $selectdata = $selectcaselstF1->whereNull('aefi_form_1.status')
								 ->whereDate('aefi_form_1.date_entry',$datenow)
								//  ->groupBy('aefi_form_1.id_case')
								 ->get();
				 }else {
					 $selectdata = $selectcaselstF1->whereDate('aefi_form_1.date_entry',$datenow)
							->whereIn('aefi_form_1.province_found_event',$selectgroupprov)
							//->whereIn('aefi_form_1.province_reported',$selectgroupprov)
							 //->orWhere('user_region',$roleArrregion)
							 ->whereNull('aefi_form_1.status')
							//  ->groupBy('aefi_form_1.id_case')
							 ->get();
				 }
					 break;
					 case 'ddc':

						 $selectdata = $selectcaselstF1->whereNull('aefi_form_1.status')
						 ->whereDate('aefi_form_1.date_entry',$datenow)
						//  ->groupBy('aefi_form_1.id_case')
						 ->get();
						 break;
						 case 'admin':
							 $selectdata =  $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							 ->whereDate('aefi_form_1.date_entry',$datenow)
							//  ->groupBy('aefi_form_1.id_case')
							 ->get();
							
							 break;
							 case 'admin-dpc':
							 $selectdata = $selectcaselstF1->whereIn('aefi_form_1.province',$selectgroupprov)
							 ->whereNull('aefi_form_1.status')
							//  ->groupBy('aefi_form_1.id_case')
							 ->get();
							 break;
		 default:
			 break;
	 }
 }

 		// dd($selectdata);
		 $listProvince=$this->listProvince();
		 $listDistrict=$this->listDistrict();
		 $listsubdistrict=$this->listsubdistrict();
		 $listvac_arr=$this->listvac_arr();
		 $list_hos=$this->list_hos();
		 $list_career=$this->list_career();
		 $vac_list=$this->vaclist();
		 $list_icd10=$this->list_icd10();
		return view('AEFI.Apps.dataf1export',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'yearnow'=>$yearnow,
				'listvac_arr'=>$listvac_arr,
				'datenow'=>$datenow,
				'list_hos'=>$list_hos,
				'list_career'=>$list_career,
				'vac_list'=>$vac_list,
				'list_icd10'=>$list_icd10,
			]);
	}

		public function dataexportfrm(Request $req){
		$roleArrusername = auth()->user()->username;
		$roleArrhospcode = auth()->user()->hospcode;
		$roleArrprov_code = auth()->user()->prov_code;
		$roleArrregion = auth()->user()->region;
		$roleArr = auth()->user()->getRoleNames()->toArray();
		$date_of_symptoms_in = $req->input('date_of_symptoms');
		$name_of_vaccine[] = $req->input('name_of_vaccine');
		if ($name_of_vaccine == [null]) {
			$name_of_vaccine = [
				1,2,3,4,5,6,7,8,9,
				10,11,12,13,14,15,16,17,18,19,
				20,21,22,23,24,25,26,27,28,29,
				30,31,32,33,34,35,36,37,38,39,
				40,41,42,43
			];
		}
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
													'aefi_form_1_vac.patient_status',
													'aefi_form_1.career',
													'aefi_form_1_vac.date_of_symptoms',
													'aefi_form_1_vac.time_of_symptoms',
													'aefi_form_1_vac.time_of_treatment',
													'aefi_form_1_vac.date_of_treatment',
													'aefi_form_1_vac.rash',
													'aefi_form_1_vac.erythema',
													'aefi_form_1_vac.urticaria',
													'aefi_form_1_vac.itching',
													'aefi_form_1_vac.edema',
													'aefi_form_1_vac.angioedema',
													'aefi_form_1_vac.fainting',
													'aefi_form_1_vac.hyperventilation',
													'aefi_form_1_vac.syncope',
													'aefi_form_1_vac.headche',
													'aefi_form_1_vac.dizziness',
													'aefi_form_1_vac.fatigue',
													'aefi_form_1_vac.malaise',
													'aefi_form_1_vac.dyspepsia',
													'aefi_form_1_vac.diarrhea',
													'aefi_form_1_vac.nausea',
													'aefi_form_1_vac.vomiting',
													'aefi_form_1_vac.abdominal_pain',
													'aefi_form_1_vac.arthalgia',
													'aefi_form_1_vac.myalgia',
													'aefi_form_1_vac.fever38c',
													'aefi_form_1_vac.swelling_at_the_injection',
													'aefi_form_1_vac.swelling_beyond_nearest_joint',
													'aefi_form_1_vac.lymphadenopathy',
													'aefi_form_1_vac.lymphadenitis',
													'aefi_form_1_vac.sterile_abscess',
													'aefi_form_1_vac.bacterial_abscess',
													'aefi_form_1_vac.febrile_convulsion',
													'aefi_form_1_vac.afebrile_convulsion',
													'aefi_form_1_vac.encephalopathy',
													'aefi_form_1_vac.flaccid_paralysis',
													'aefi_form_1_vac.spastic_paralysis',
													'aefi_form_1_vac.hhe',
													'aefi_form_1_vac.persistent_inconsolable_crying',
													'aefi_form_1_vac.thrombocytopenia',
													'aefi_form_1_vac.osteomyelitis',
													'aefi_form_1_vac.toxic_shock_syndrome',
													'aefi_form_1_vac.sepsis',
													'aefi_form_1_vac.anaphylaxis',
													'aefi_form_1_vac.transverse_myelitis',
													'aefi_form_1_vac.gbs',
													'aefi_form_1_vac.adem',
													'aefi_form_1_vac.acute_myocardial',
													'aefi_form_1_vac.ards',
													'aefi_form_1_vac.symptoms_later_immunized',
													'aefi_form_1_vac.other_symptoms_later_immunized',
													'aefi_form_1_vac.Symptoms_details',
													'aefi_form_1_vac.seriousness_of_the_symptoms',
													'aefi_form_1.diagnosis',
													'aefi_form_1.hospcode_treat',
													'aefi_form_1.province_reported',
													'aefi_form_1.datepicker_resiver',
													'aefi_form_1.other_medical_history',
													'aefi_form_1.lab_result',
													'aefi_form_1.more_reviews',
													'aefi_form_1_vac.name_of_vaccine',
													'aefi_form_1_vac.lot_number',
													'aefi_form_1_vac.manufacturer',
													'aefi_form_1_vac.dose',
													'aefi_form_1_vac.date_of_vaccination',
													'aefi_form_1_vac.time_of_vaccination',
													'aefi_form_1.career_code',
													'aefi_form_1.main_diagnosis',
													'aefi_form_1.minor_diagnosis'
		// DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
		// 				 GROUP_CONCAT( aefi_form_1_vac.lot_number ) as "lot_number",
		// 				 GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
		// 		 		 GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
		// 		 		 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
		// 		 		 GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						)
						->whereDate('aefi_form_1.date_entry', '>=', $date_of_symptoms_from)
						->whereDate('aefi_form_1.date_entry', '<=', $date_of_symptoms_to)
						->whereIn('aefi_form_1_vac.name_of_vaccine', $name_of_vaccine);
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
								//  ->groupBy('aefi_form_1.id_case')
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
								//  ->groupBy('aefi_form_1.id_case')
								 ->get();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->whereIn('aefi_form_1.province_found_event',$selectgroupprov)
								//->whereIn('aefi_form_1.province_reported',$selectgroupprov)
							 ->whereNull('aefi_form_1.status')
							//  ->groupBy('aefi_form_1.id_case')
							 ->get();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aefi_form_1.status')
						//  ->groupBy('aefi_form_1.id_case')
						 ->get();
						 break;
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aefi_form_1.status')
							//  ->groupBy('aefi_form_1.id_case')
							 ->orderBy('id')
							 ->paginate(150);
							 break;
							 case 'admin-dpc':
							 $selectdata = $selectcaselstF1
							 ->whereIn('aefi_form_1.province',$selectgroupprov)
							 ->whereNull('aefi_form_1.status')
							//  ->groupBy('aefi_form_1.id_case')
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
		 $list_career=$this->list_career();
		 $vac_list=$this->vaclist();
		 $list_icd10=$this->list_icd10();
		return view('AEFI.Apps.dataf1export',
			[
				'selectdata'=>$selectdata,
				// 'selectdatas'=>$selectdatas,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'listvac_arr'=>$listvac_arr,
				'date_of_symptoms_from'=>$date_of_symptoms_from,
				'date_of_symptoms_to'=>$date_of_symptoms_to,
				'datenow'=>$datenow,
				'list_hos'=>$list_hos,
				'list_icd10'=>$list_icd10,
				'list_career'=>$list_career,
				'vac_list'=>$vac_list
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
	protected function list_career(){
		$arr_career = DB::table('ref_career')->select('career_code','career_name')->get();
		foreach ($arr_career as  $value) {
			$arr_career[$value->career_code] =trim($value->career_name);
		}
		// dd($province_arr);
		return $arr_career;
	}
	protected function list_icd10(){
		$arr_icd10 = DB::table('ref_icd10')->select('code','name')->get();
		foreach ($arr_icd10 as  $value) {
			$arr_icd10[$value->code] =trim($value->name);
		}
		// dd($province_arr);
		return $arr_icd10;
	}
	protected function vaclist(){
		$arr_vaclist = DB::table('vac_tbl')
		->select('VAC_CODE','VAC_NAME_EN')
		->orderBy('ID', 'ASC')
		->get();
		 // dd($vaclist);
		return $arr_vaclist;
	}
}
