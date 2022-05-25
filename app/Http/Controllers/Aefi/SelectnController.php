<?php

	namespace App\Http\Controllers\Aefi;

	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Routing\Controller as BaseController;
	use Illuminate\Foundation\Validation\ValidatesRequests;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use DB;
	use Illuminate\Support\Str;
	use Carbon\Carbon;
	class SelectnController extends Controller
	{
		public $result;

		public function __construct(){
			$this->result = null;
				$this->middleware('auth');

		}
		public function selectdatatablecaseAEFI1()
		{
			$cabonnow =  Carbon::now();
			$datenow = $cabonnow->toDateString();
			$yearnow =  now()->year;
			$roleArrusername = auth()->user()->username;
			$roleArrhospcode = auth()->user()->hospcode;
			$roleArrprov_code = auth()->user()->prov_code;
			$roleArrregion = auth()->user()->region;
			$roleArrdist_code = auth()->user()->ampur_code;
			$district_user=$roleArrprov_code.$roleArrdist_code;
			// dd($roleArrhospcode);
			// dd($roleArrusername,$roleArrhospcode,$roleArrprov_code,$roleArrregion);
			$roleArr = auth()->user()->getRoleNames()->toArray();
			$selectgroupprov = DB::table('chospital_new')
														 ->select('chospital_new.prov_code')
														 ->where('region',$roleArrregion)
														 ->groupBy('prov_code')
														 ->get()
														 ->pluck('prov_code');

		$selectcaselstF1 = DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->leftjoin('aefi_form_2', 'aefi_form_1.id_case', '=', 'aefi_form_2.id_case')
		->leftjoin('expertmeeting', 'aefi_form_1.id_case', '=', 'expertmeeting.id_case')
		->select(	'aefi_form_1.id',
							'aefi_form_2.id_case as aefi2',
							'aefi_form_2.status as aefi2status',
							'aefi_form_1.id_case',
							'aefi_form_1.hn',
							'aefi_form_1.an',
							'aefi_form_1.first_name',
							'aefi_form_1.sur_name',
							'aefi_form_1.age_while_sick_year',
							'aefi_form_1.nationality',
							'aefi_form_1.gender',
							'aefi_form_1.other_nationality',
							'aefi_form_1.village_no',
							'aefi_form_1.province',
							'aefi_form_1.district',
							'aefi_form_1.subdistrict',
							'aefi_form_1.necessary_to_investigate',
							'aefi_form_1.case_vac_id',
							'aefi_form_1_vac.name_of_vaccine',
							'aefi_form_1.date_of_symptoms',
							'aefi_form_1.refer_status',
							'aefi_form_1.hospcode_refer',
							'aefi_form_1.diagnosis',
							'aefi_form_1.hospcode_treat',
							'aefi_form_1.province_found_event',
							'aefi_form_1.main_diagnosis',
							'aefi_form_1.minor_diagnosis',
							'expertmeeting.id_case AS expertst',
							DB::raw('MIN(aefi_form_2.status) as "maxaefi2"')
						);
		 if (count($roleArr) > 0) {
				$user_role = $roleArr[0];
			switch ($user_role) {
				case 'hospital':
					// dd("p;p");
					$caselstF1  = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aefi_form_1.user_hospcode',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_report',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_refer',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hosp_update_refer',auth()->user()->hospcode);
									})
									// ->whereDate('aefi_form_1.date_entry',$datenow)
									->whereNull('aefi_form_1.status')
									->groupBy('aefi_form_1.id_case')
									->get();

				break;
				case 'pho':
					$caselstF1 = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aefi_form_1.user_provcode',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_found_event',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_reported',auth()->user()->prov_code)
														->orWhere('aefi_form_1.prov_update_refer',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_refer',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_record_refer',auth()->user()->prov_code);
									})
									// ->whereDate('aefi_form_1.date_entry',$datenow)
									->whereNull('aefi_form_1.status')
									->groupBy('aefi_form_1.id_case')
									->get();
					break;
					case 'dpc':
					if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
							$caselstF1 = $selectcaselstF1
								->whereDate('aefi_form_1.date_entry',$datenow)
									->whereNull('aefi_form_1.status')
									->groupBy('aefi_form_1.id_case')
									->get();
					}else {
						$caselstF1 = $selectcaselstF1
								// ->where('user_region',$roleArrregion)
								// ->whereDate('aefi_form_1.date_entry',$datenow)
								->whereIn('aefi_form_1.province',$selectgroupprov)
								->whereNull('aefi_form_1.status')
								->groupBy('aefi_form_1.id_case')
								->get();
					}
						break;
						case 'ddc':
							$caselstF1 = $selectcaselstF1
							->whereDate('aefi_form_1.date_entry',$datenow)
							->whereNull('aefi_form_1.status')
							->groupBy('aefi_form_1.id_case')
							->get();
							break;
						case 'admin':
							$caselstF1 = $selectcaselstF1
							->whereDate('aefi_form_1.date_entry',$datenow)
							->whereNull('aefi_form_1.status')
							->groupBy('aefi_form_1.id_case')
							->get();
							break;
						case 'admin-dpc':
						$caselstF1 = $selectcaselstF1
						->whereDate('aefi_form_1.date_entry',$datenow)
						->whereIn('aefi_form_1.province',$selectgroupprov)
						->whereNull('aefi_form_1.status')
						->groupBy('aefi_form_1.id_case')
						->get();
						break;
			default:
				break;
		}
	}
	 //dd($caselstF1);
	 $list=$this->form1();
	 $listProvince=$this->listProvince();
	 $listDistrict=$this->listDistrict();
	 $listsubdistrict=$this->listsubdistrict();
	 $vac_list=$this->vaclist();
	 $listvac_arr=$this->listvac_arr();
	 $list_hos=$this->list_hos();
	 $vacgrouplist=$this->vacgrouplist();
		 return view('AEFI.Apps.caselstAEFI1n')
			->with('listProvince', $listProvince)
			->with('listDistrict', $listDistrict)
			->with('listsubdistrict', $listsubdistrict)
			->with('yearnow', $yearnow)
			->with('data', $caselstF1)
			->with('list', $list)
			->with('listProvince', $listProvince)
			->with('listDistrict', $listDistrict)
			->with('listsubdistrict', $listsubdistrict)
			->with('vac_list',$vac_list)
			->with('listvac_arr',$listvac_arr)
			->with('list_hos',$list_hos)
			->with('datenow',$datenow)
			->with('vacgrouplist',$vacgrouplist);

	 	}

		public function selectdatatablecaseAEFI1src(Request $req)
		{
			$cabonnow =  Carbon::now();
			$datenow = $cabonnow->toDateString();
			$yearnow =  now()->year;
			$roleArrusername = auth()->user()->username;
			$roleArrhospcode = auth()->user()->hospcode;
			$roleArrprov_code = auth()->user()->prov_code;
			$roleArrregion = auth()->user()->region;
			$roleArrdist_code = auth()->user()->ampur_code;
			$district_user=$roleArrprov_code.$roleArrdist_code;
			// $date_of_symptoms_in = $req->input('date_of_symptoms');
			// $date_of_symptoms = explode('-', $date_of_symptoms_in);
			// dd($date_of_symptoms);
			// $date_of_symptoms_from = $date_of_symptoms[0]."-".$date_of_symptoms[1]."-".$date_of_symptoms[2];
			// $date_of_symptoms_to = $date_of_symptoms[3]."-".$date_of_symptoms[4]."-".$date_of_symptoms[5];
			$first_name = $req->input('first_name');
			$sur_name = $req->input('sur_name');
			$name_of_vaccine = $req->input('name_of_vaccine');
			$hospcode_treat = $req->input('hospcode_treat');
			$province = $req->input('province');
			$id = $req->input('id');
			 // dd($date_of_symptoms_from,$date_of_symptoms_to,$name_of_vaccine,$hospcode_treat,$province);
			// dd($roleArrusername,$roleArrhospcode,$roleArrprov_code,$roleArrregion);
			$roleArr = auth()->user()->getRoleNames()->toArray();
			$selectgroupprov = DB::table('chospital_new')
														 ->select('chospital_new.prov_code')
														 ->where('region',$roleArrregion)
														 ->groupBy('prov_code')
														 ->get()
														 ->pluck('prov_code');

		$selectcaselstF1 = DB::table('aefi_form_1')
		->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		->leftjoin('aefi_form_2', 'aefi_form_1.id_case', '=', 'aefi_form_2.id_case')
		->leftjoin('expertmeeting', 'aefi_form_1.id_case', '=', 'expertmeeting.id_case')
		->select(	'aefi_form_1.id',
							'aefi_form_2.id_case as aefi2',
							// 'aefi_form_2.status as aefi2status',
							'aefi_form_1.id_case',
							'aefi_form_1.hn',
							'aefi_form_1.an',
							'aefi_form_1.first_name',
							'aefi_form_1.sur_name',
							'aefi_form_1.age_while_sick_year',
							'aefi_form_1.nationality',
							'aefi_form_1.gender',
							'aefi_form_1.other_nationality',
							'aefi_form_1.village_no',
							'aefi_form_1.province',
							'aefi_form_1.district',
							'aefi_form_1.subdistrict',
							'aefi_form_1.necessary_to_investigate',
							'aefi_form_1.case_vac_id',
							'aefi_form_1_vac.name_of_vaccine',
							'aefi_form_1.date_of_symptoms',
							'aefi_form_1.refer_status',
							'aefi_form_1.hospcode_refer',
							'aefi_form_1.diagnosis',
							'aefi_form_1.hospcode_treat',
							'aefi_form_1.province_found_event',
							'expertmeeting.status_expert_frm AS expertst',
							DB::raw('MIN(aefi_form_2.status) as "maxaefi2"')
						);
						if ($province != null) {
							$caselstWhere = $selectcaselstF1
															->where('aefi_form_1.province_found_event', '=', $province);
						}
						else{
						}
						// if ($date_of_symptoms_in != null) {
						// 	$caselstWhere = $selectcaselstF1
						// 									->whereDate('aefi_form_1.date_entry', '>=', $date_of_symptoms_from)
						// 									->whereDate('aefi_form_1.date_entry', '<=', $date_of_symptoms_to);
						// }
						// else{
						// }
						// if ($hospcode_treat != null) {
						// 	$caselstWhere = $selectcaselstF1
						// 									->where('aefi_form_1.hospcode_treat', '=', $hospcode_treat);
						// }
						// else{
						// }
						if ($first_name != null) {
							$caselstWhere = $selectcaselstF1
															->orwhere('aefi_form_1.first_name', 'LIKE', "%{$first_name}%");
															}
															else{
															}
						if ($sur_name != null) {
							$caselstWhere = $selectcaselstF1
															->orwhere('aefi_form_1.sur_name', 'LIKE', "%{$sur_name}%");
						}
						else{
						}
						if ($id != null) {
							$caselstWhere = $selectcaselstF1
															->orwhere('aefi_form_1.id', 'LIKE', "%{$id}%");
						}
						else{
						}
		 if (count($roleArr) > 0) {
				$user_role = $roleArr[0];
			switch ($user_role) {
				case 'hospital':
					// dd("p;p");
					$caselstF1  = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aefi_form_1.user_hospcode',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_report',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hospcode_refer',auth()->user()->hospcode)
														->orWhere('aefi_form_1.hosp_update_refer',auth()->user()->hospcode);
									})
									->whereNull('aefi_form_1.status')
									->groupBy('aefi_form_1.id_case')
									->get();

				break;
				case 'pho':
					$caselstF1 = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aefi_form_1.province_found_event',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_reported',auth()->user()->prov_code)
														->orWhere('aefi_form_1.prov_update_refer',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_refer',auth()->user()->prov_code)
														->orWhere('aefi_form_1.province_record_refer',auth()->user()->prov_code);
									})
									->whereNull('aefi_form_1.status')
									->groupBy('aefi_form_1.id_case')
									->get();
					break;
					case 'dpc':
					if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
							$caselstF1 = $selectcaselstF1
									->whereNull('aefi_form_1.status')
									->groupBy('aefi_form_1.id_case')
									->get();
					}else {
						$caselstF1 = $selectcaselstF1
								// ->where('user_region',$roleArrregion)
								->whereIn('aefi_form_1.province',$selectgroupprov)
								->whereNull('aefi_form_1.status')
								->groupBy('aefi_form_1.id_case')
								->get();
					}
						break;
						case 'ddc':
							$caselstF1 = $selectcaselstF1
							->whereNull('aefi_form_1.status')
							->groupBy('aefi_form_1.id_case')
							->get();
							break;
						case 'admin':
							$caselstF1 = $caselstWhere
							->whereNull('aefi_form_1.status')
							->groupBy('aefi_form_1.id_case')
							->get();
							break;
						case 'admin-dpc':
						$caselstF1 = $selectcaselstF1
						->whereIn('aefi_form_1.province',$selectgroupprov)
						->whereNull('aefi_form_1.status')
						->groupBy('aefi_form_1.id_case')
						->get();
						break;
			default:
				break;
		}
	}
	 // dd($caselstF1);
	 $list=$this->form1();
	 $listProvince=$this->listProvince();
	 $listDistrict=$this->listDistrict();
	 $listsubdistrict=$this->listsubdistrict();
	 $vac_list=$this->vaclist();
	 $listvac_arr=$this->listvac_arr();
	 $list_hos=$this->list_hos();
	 $vacgrouplist=$this->vacgrouplist();
	// dd("test");
		 return view('AEFI.Apps.caselstAEFI1n')
			->with('listProvince', $listProvince)
			->with('listDistrict', $listDistrict)
			->with('listsubdistrict', $listsubdistrict)
			->with('yearnow', $yearnow)
			->with('data', $caselstF1)
			->with('list', $list)
			->with('listProvince', $listProvince)
			->with('listDistrict', $listDistrict)
			->with('listsubdistrict', $listsubdistrict)
			->with('vac_list',$vac_list)
			->with('listvac_arr',$listvac_arr)
			->with('list_hos',$list_hos)
			->with('datenow',$datenow)
			->with('vacgrouplist',$vacgrouplist);
			// ->with('date_of_symptoms_from',$date_of_symptoms_from)
			// ->with('date_of_symptoms_to',$date_of_symptoms_to);
		}


		public function selectdatatablecaseAEFI1group()
		{
		$caselstF1group = DB::select('select id_case,hn,
		an,
		first_name,
		sur_name,
		age_while_sick_year,
		nationality,
		gender,
		other_nationality,
		village_no,
		province,
		district,
		subdistrict,
		necessary_to_investigate
		FROM aefi_form_1' );
		 //dd($caselst);
		 return view('AEFI.Apps.caselstAEFI1group')->with('data', $caselstF1group);

		}
		public function selectdatatablecaseAEFI2(Request $req)
		{
			$idcase = $req->id_case;
									$caselstF2 = DB::table('aefi_form_2')
																	->select(	'*'
																					)
																->where('status', '1' )
																->where('id_case', [$req->id_case] )
																->get();
		 return view('AEFI.Apps.caselstAEFI2')
		 				->with('data', $caselstF2)
						->with('idcase', 	$idcase);
		}

		public function selectdataAEFI2()
		{
		$aefiF2id = DB::select('select id_case FROM aefi_form_1');
		// dd($aefiF2id);
		 return view('AEFI.Apps.form2')->with('data', $aefiF2id);

		}
		public function selectalldataAEFI1(Request $req)
		{
		$EditAEFI1 = DB::table('aefi_form_1')->select('*')->where('id_case', [$req->id_case] )->get();
		 	//dd($EditAEFI1);
			if ($EditAEFI1) {
				$EditAEFI1vac = DB::table('aefi_form_1_vac')->select('*')->where('id_case', [$req->id_case] )->get();
			}
			$count_data_vac= DB::table('aefi_form_1_vac')
                     ->select(DB::raw('count(*) as vac_count'))
                     ->where('id_case', [$req->id_case])
                     ->get();
			// dd($count_data_vac);
			$list=$this->form1();
			$listProvince=$this->listProvince();
			$listDistrict=$this->listDistrict();
			$listsubdistrict=$this->listsubdistrict();
			$vac_list=$this->vaclist();
			$listvac_arr=$this->listvac_arr();
			$list_hos=$this->list_hos();
			$list_career=$this->list_career();
			$list_icd10=$this->list_icd10();
						// dd($EditAEFI1vac);
		 return view('AEFI.Apps.EditAEFI1n')
		 				->with('data', $EditAEFI1)
						->with('datavac', $EditAEFI1vac)
						->with('list', $list)
						->with('listProvince', $listProvince)
						->with('listDistrict', $listDistrict)
						->with('listsubdistrict', $listsubdistrict)
						->with('vac_list',$vac_list)
						->with('count_data_vac',$count_data_vac)
						->with('listvac_arr',$listvac_arr)
						->with('list_hos',$list_hos)
						->with('list_career',$list_career)
						->with('list_icd10',$list_icd10);

		}
		public function selectalldataAEFI2(Request $req)
		{
		$EditAEFI2 = DB::table('aefi_form_2')->select('*')->where('id_case', [$req->id_case] )->get();
			//dd($EditAEFI1);
			if ($EditAEFI2) {
				$EditAEFI2vac = DB::table('aefi_form_2_vac')->select('*')->where('id_case', [$req->id_case] )->get();
				// dd($EditAEFI2vac);
			}
			if ($EditAEFI2) {
				$EditAEFI2inv = DB::table('aefi_inv')->select('*')->where('id_case', [$req->id_case] )->get();
				// dd($EditAEFI2vac);
			}
			//dd($EditAEFI1vac);
		 return view('AEFI.Apps.EditAEFI2')->with('data', $EditAEFI2)->with('datavac', $EditAEFI2vac)->with('datainv', $EditAEFI2inv);

		}
		public function selectdatatableEditcaseAEFI2(Request $reqef2)
		{
		$ecaselstF2 = DB::table('aefi_form_1')
		->join('aefi_form_2', 'aefi_form_1.id_case', '=', 'aefi_form_2.id_case')
		->select('aefi_form_1.id_case','aefi_form_1.hn',
		'aefi_form_1.an',
		'aefi_form_1.first_name',
		'aefi_form_1.sur_name',
		'aefi_form_1.gender',
		'aefi_form_1.birthdate',
		'aefi_form_1.nationality',
		'aefi_form_1.province',
		'aefi_form_1.district',
		'aefi_form_1.subdistrict')
		->get();
		 // dd($caselstF2);
		 return view('AEFI.Apps.EditlstAEFI2')->with('data', $ecaselstF2);
		}

		public function aecode(){
			$this->result = DB::table('dt_aecode')
			->get();
			return view('AEFI.Apps.form1')->with('dataaecode', $this->result);

		}
		public function form1(){
			$list=DB::table('tbl_provinces')->get();
			 // return view('AEFI.Apps.form1')->with('list',$list);
			 return $list;
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
		protected function vaclist(){
			$arr_vaclist = DB::table('vac_tbl')
			->select('VAC_CODE','VAC_NAME_EN')
			->orderBy('VAC_CODE', 'ASC')
			->get();
			 // dd($vaclist);
			return $arr_vaclist;
		}
		protected function vacgrouplist(){
			$vacgroup_arr = DB::table('vac_tbl')
			->select('VAC_CODE','vac_group')
			->orderBy('VAC_CODE', 'ASC')
			->get();
			foreach ($vacgroup_arr as  $value) {
				$vacgroup_arr[$value->VAC_CODE] =trim($value->vac_group);
			}
			// dd($province_arr);
			return $vacgroup_arr;
		}
		protected function list_icd10(){
			$arr_icd10 = DB::table('ref_icd10')->select('code','name')->get();
			foreach ($arr_icd10 as  $value) {
				$arr_icd10[$value->code] =trim($value->name);
			}
			// dd($province_arr);
			return $arr_icd10;
		}

}
