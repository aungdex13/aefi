<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DataAESIexportController extends Controller
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
		$selectcaselstF1 =  DB::table('aesi_form_1')
		->join('aesi_form_1_vac', 'aesi_form_1.id_case', '=', 'aesi_form_1_vac.id_case')
		->select('aesi_form_1.date_entry',
													'aesi_form_1.id',
													'aesi_form_1.hn',
													'aesi_form_1.first_name',
													'aesi_form_1.sur_name',
													'aesi_form_1.house_number',
													'aesi_form_1.village_no',
													'aesi_form_1.province',
													'aesi_form_1.district',
													'aesi_form_1.subdistrict',
													'aesi_form_1.age_while_sick_year',
													'aesi_form_1.age_while_sick_month',
													'aesi_form_1.age_while_sick_day',
													'aesi_form_1.gender',
													'aesi_form_1.type_of_patient',
													'aesi_form_1_vac.patient_status',
													'aesi_form_1.career',
													'aesi_form_1_vac.date_of_symptoms',
													'aesi_form_1_vac.time_of_symptoms',
													'aesi_form_1_vac.time_of_treatment',
													'aesi_form_1_vac.date_of_treatment',
													'aesi_form_1_vac.rash',
													'aesi_form_1_vac.erythema',
													'aesi_form_1_vac.urticaria',
													'aesi_form_1_vac.itching',
													'aesi_form_1_vac.edema',
													'aesi_form_1_vac.angioedema',
													'aesi_form_1_vac.fainting',
													'aesi_form_1_vac.hyperventilation',
													'aesi_form_1_vac.syncope',
													'aesi_form_1_vac.headche',
													'aesi_form_1_vac.dizziness',
													'aesi_form_1_vac.fatigue',
													'aesi_form_1_vac.malaise',
													'aesi_form_1_vac.dyspepsia',
													'aesi_form_1_vac.diarrhea',
													'aesi_form_1_vac.nausea',
													'aesi_form_1_vac.vomiting',
													'aesi_form_1_vac.abdominal_pain',
													'aesi_form_1_vac.arthalgia',
													'aesi_form_1_vac.myalgia',
													'aesi_form_1_vac.fever38c',
													'aesi_form_1_vac.swelling_at_the_injection',
													'aesi_form_1_vac.swelling_beyond_nearest_joint',
													'aesi_form_1_vac.lymphadenopathy',
													'aesi_form_1_vac.lymphadenitis',
													'aesi_form_1_vac.sterile_abscess',
													'aesi_form_1_vac.bacterial_abscess',
													'aesi_form_1_vac.febrile_convulsion',
													'aesi_form_1_vac.afebrile_convulsion',
													'aesi_form_1_vac.encephalopathy',
													'aesi_form_1_vac.flaccid_paralysis',
													'aesi_form_1_vac.spastic_paralysis',
													'aesi_form_1_vac.hhe',
													'aesi_form_1_vac.persistent_inconsolable_crying',
													'aesi_form_1_vac.thrombocytopenia',
													'aesi_form_1_vac.osteomyelitis',
													'aesi_form_1_vac.toxic_shock_syndrome',
													'aesi_form_1_vac.sepsis',
													'aesi_form_1_vac.anaphylaxis',
													'aesi_form_1_vac.transverse_myelitis',
													'aesi_form_1_vac.gbs',
													'aesi_form_1_vac.adem',
													'aesi_form_1_vac.acute_myocardial',
													'aesi_form_1_vac.ards',
													'aesi_form_1_vac.symptoms_later_immunized',
													'aesi_form_1_vac.other_symptoms_later_immunized',
													'aesi_form_1_vac.Symptoms_details',
													'aesi_form_1_vac.seriousness_of_the_symptoms',
													'aesi_form_1.diagnosis',
													'aesi_form_1.hospcode_treat',
													'aesi_form_1.province_reported',
													'aesi_form_1.datepicker_resiver',
													'aesi_form_1.other_medical_history',
													'aesi_form_1.lab_result',
													'aesi_form_1.more_reviews',		
													'aesi_form_1_vac.name_of_vaccine',
													'aesi_form_1_vac.lot_number',
													'aesi_form_1_vac.manufacturer',
													'aesi_form_1_vac.dose',
													'aesi_form_1_vac.date_of_vaccination',
													'aesi_form_1_vac.time_of_vaccination',
													'aesi_form_1.career_code'
						// DB::raw('GROUP_CONCAT( aesi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
						//  GROUP_CONCAT( aesi_form_1_vac.lot_number ) as "lot_number",
						//  GROUP_CONCAT( aesi_form_1_vac.manufacturer  ) as "manufacturer",
				 		//  GROUP_CONCAT( aesi_form_1_vac.dose  ) as "dose",
				 		//  GROUP_CONCAT( aesi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
				 		//  GROUP_CONCAT( aesi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						);
	//->orwhere('aesi_form_1.date_entry',$datenow);
		if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hospital':
				$selectdata  =   $selectcaselstF1->whereDate('aesi_form_1.date_entry',$datenow)
								->whereNull('aesi_form_1.status')
								->where(function($query) {
											$query->orWhere('aesi_form_1.user_hospcode',auth()->user()->hospcode)
														->orWhere('aesi_form_1.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aesi_form_1.hospcode_report',auth()->user()->hospcode);
									})
								// ->groupBy('aesi_form_1.id_case')
								->get();
			 break;
			 			 case 'pho':
				 $selectdata = $selectcaselstF1->whereDate('aesi_form_1.date_entry',$datenow)
				 				->whereNull('aesi_form_1.status')
								->where(function($query) {
											$query->orWhere('aesi_form_1.province_found_event',auth()->user()->prov_code)
														->orWhere('aesi_form_1.province_reported',auth()->user()->prov_code);
									})
								// ->groupBy('aesi_form_1.id_case')
								->get();				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
						 $selectdata = $selectcaselstF1->whereNull('aesi_form_1.status')
								 ->whereDate('aesi_form_1.date_entry',$datenow)
								//  ->groupBy('aesi_form_1.id_case')
								 ->get();
				 }else {
					 $selectdata = $selectcaselstF1->whereDate('aesi_form_1.date_entry',$datenow)
							->whereIn('aesi_form_1.province_found_event',$selectgroupprov)
							//->whereIn('aesi_form_1.province_reported',$selectgroupprov)
							 //->orWhere('user_region',$roleArrregion)
							 ->whereNull('aesi_form_1.status')
							//  ->groupBy('aesi_form_1.id_case')
							 ->get();
				 }
					 break;
					 case 'ddc':

						 $selectdata = $selectcaselstF1->whereNull('aesi_form_1.status')
						 ->whereDate('aesi_form_1.date_entry',$datenow)
						//  ->groupBy('aesi_form_1.id_case')
						 ->get();
						 break;
						 case 'admin':
							 $selectdata =  $selectcaselstF1
							 ->whereNull('aesi_form_1.status')
							 ->whereDate('aesi_form_1.date_entry',$datenow)
							//  ->groupBy('aesi_form_1.id_case')
							 ->get();
							
							 break;
							 case 'admin-dpc':
							 $selectdata = $selectcaselstF1->whereIn('aesi_form_1.province',$selectgroupprov)
							 ->whereNull('aesi_form_1.status')
							//  ->groupBy('aesi_form_1.id_case')
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
		return view('AESI.dataaesiexport',
			[
				'selectdata'=>$selectdata,
				'listsubdistrict'=>$listsubdistrict,
				'listDistrict'=>$listDistrict,
				'listProvince'=>$listProvince,
				'yearnow'=>$yearnow,
				'listvac_arr'=>$listvac_arr,
				'datenow'=>$datenow,
				'list_hos'=>$list_hos,
				'list_career'=>$list_career
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
		$selectcaselstF1= DB::table('aesi_form_1')
		->join('aesi_form_1_vac', 'aesi_form_1.id_case', '=', 'aesi_form_1_vac.id_case')
		->select('aesi_form_1.date_entry',
													'aesi_form_1.id',
													'aesi_form_1.hn',
													'aesi_form_1.first_name',
													'aesi_form_1.sur_name',
													'aesi_form_1.house_number',
													'aesi_form_1.village_no',
													'aesi_form_1.province',
													'aesi_form_1.district',
													'aesi_form_1.subdistrict',
													'aesi_form_1.age_while_sick_year',
													'aesi_form_1.age_while_sick_month',
													'aesi_form_1.age_while_sick_day',
													'aesi_form_1.gender',
													'aesi_form_1.type_of_patient',
													'aesi_form_1.patient_status',
													'aesi_form_1_vac.patient_status',
													'aesi_form_1.career',
													'aesi_form_1_vac.date_of_symptoms',
													'aesi_form_1_vac.time_of_symptoms',
													'aesi_form_1_vac.time_of_treatment',
													'aesi_form_1_vac.date_of_treatment',
													'aesi_form_1_vac.rash',
													'aesi_form_1_vac.erythema',
													'aesi_form_1_vac.urticaria',
													'aesi_form_1_vac.itching',
													'aesi_form_1_vac.edema',
													'aesi_form_1_vac.angioedema',
													'aesi_form_1_vac.fainting',
													'aesi_form_1_vac.hyperventilation',
													'aesi_form_1_vac.syncope',
													'aesi_form_1_vac.headche',
													'aesi_form_1_vac.dizziness',
													'aesi_form_1_vac.fatigue',
													'aesi_form_1_vac.malaise',
													'aesi_form_1_vac.dyspepsia',
													'aesi_form_1_vac.diarrhea',
													'aesi_form_1_vac.nausea',
													'aesi_form_1_vac.vomiting',
													'aesi_form_1_vac.abdominal_pain',
													'aesi_form_1_vac.arthalgia',
													'aesi_form_1_vac.myalgia',
													'aesi_form_1_vac.fever38c',
													'aesi_form_1_vac.swelling_at_the_injection',
													'aesi_form_1_vac.swelling_beyond_nearest_joint',
													'aesi_form_1_vac.lymphadenopathy',
													'aesi_form_1_vac.lymphadenitis',
													'aesi_form_1_vac.sterile_abscess',
													'aesi_form_1_vac.bacterial_abscess',
													'aesi_form_1_vac.febrile_convulsion',
													'aesi_form_1_vac.afebrile_convulsion',
													'aesi_form_1_vac.encephalopathy',
													'aesi_form_1_vac.flaccid_paralysis',
													'aesi_form_1_vac.spastic_paralysis',
													'aesi_form_1_vac.hhe',
													'aesi_form_1_vac.persistent_inconsolable_crying',
													'aesi_form_1_vac.thrombocytopenia',
													'aesi_form_1_vac.osteomyelitis',
													'aesi_form_1_vac.toxic_shock_syndrome',
													'aesi_form_1_vac.sepsis',
													'aesi_form_1_vac.anaphylaxis',
													'aesi_form_1_vac.transverse_myelitis',
													'aesi_form_1_vac.gbs',
													'aesi_form_1_vac.adem',
													'aesi_form_1_vac.acute_myocardial',
													'aesi_form_1_vac.ards',
													'aesi_form_1_vac.symptoms_later_immunized',
													'aesi_form_1_vac.other_symptoms_later_immunized',
													'aesi_form_1_vac.Symptoms_details',
													'aesi_form_1_vac.seriousness_of_the_symptoms',
													'aesi_form_1.diagnosis',
													'aesi_form_1.hospcode_treat',
													'aesi_form_1.province_reported',
													'aesi_form_1.datepicker_resiver',
													'aesi_form_1.other_medical_history',
													'aesi_form_1.lab_result',
													'aesi_form_1.more_reviews',
													'aesi_form_1_vac.name_of_vaccine',
													'aesi_form_1_vac.lot_number',
													'aesi_form_1_vac.manufacturer',
													'aesi_form_1_vac.dose',
													'aesi_form_1_vac.date_of_vaccination',
													'aesi_form_1_vac.time_of_vaccination',
													'aesi_form_1.career_code'
		// DB::raw('GROUP_CONCAT( aesi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
		// 				 GROUP_CONCAT( aesi_form_1_vac.lot_number ) as "lot_number",
		// 				 GROUP_CONCAT( aesi_form_1_vac.manufacturer  ) as "manufacturer",
		// 		 		 GROUP_CONCAT( aesi_form_1_vac.dose  ) as "dose",
		// 		 		 GROUP_CONCAT( aesi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
		// 		 		 GROUP_CONCAT( aesi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
						)
						->whereDate('aesi_form_1.date_entry', '>=', $date_of_symptoms_from)
						->whereDate('aesi_form_1.date_entry', '<=', $date_of_symptoms_to);
	if (count($roleArr) > 0) {
			 $user_role = $roleArr[0];
		 switch ($user_role) {
			 case 'hospital':
				 $selectdata  = $selectcaselstF1
								 ->where(function($query) {
											 $query->orWhere('aesi_form_1.user_hospcode',auth()->user()->hospcode)
														 ->orWhere('aesi_form_1.hospcode_treat',auth()->user()->hospcode)
														 ->orWhere('aesi_form_1.hospcode_report',auth()->user()->hospcode);
									 })
								 ->whereNull('aesi_form_1.status')
								//  ->groupBy('aesi_form_1.id_case')
								 ->get();			 break;
			 case 'pho':
				 $selectdata = $selectcaselstF1
				 ->whereNull('aesi_form_1.status')
				 ->where(function($query) {
							 $query->orWhere('aesi_form_1.province_found_event',auth()->user()->prov_code)
										 ->orWhere('aesi_form_1.province_reported',auth()->user()->prov_code);
					 })
				 ->groupBy('aesi_form_1.id_case')
								 ->get();				 break;
				 case 'dpc':
				 if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
						 $selectdata = $selectcaselstF1
								 // ->where('user_region',$roleArrregion)
								 ->whereNull('aesi_form_1.status')
								//  ->groupBy('aesi_form_1.id_case')
								 ->get();
				 }else {
					 $selectdata = $selectcaselstF1
							 ->whereIn('aesi_form_1.province_found_event',$selectgroupprov)
								//->whereIn('aesi_form_1.province_reported',$selectgroupprov)
							 ->whereNull('aesi_form_1.status')
							//  ->groupBy('aesi_form_1.id_case')
							 ->get();
				 }
					 break;
					 case 'ddc':
						 $selectdata = $selectcaselstF1
						 ->whereNull('aesi_form_1.status')
						//  ->groupBy('aesi_form_1.id_case')
						 ->get();
						 break;
						 case 'admin':
							 $selectdata = $selectcaselstF1
							 ->whereNull('aesi_form_1.status')
							//  ->groupBy('aesi_form_1.id_case')
							 ->orderBy('id')
							 ->paginate(150);
							 break;
							 case 'admin-dpc':
							 $selectdata = $selectcaselstF1
							 ->whereIn('aesi_form_1.province',$selectgroupprov)
							 ->whereNull('aesi_form_1.status')
							//  ->groupBy('aesi_form_1.id_case')
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
		return view('AESI.dataaesiexport',
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
				'list_career'=>$list_career
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
}
