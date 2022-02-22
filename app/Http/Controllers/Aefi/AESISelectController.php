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
	class AESISelectController extends Controller
	{
		public $result;

		public function __construct(){
			$this->result = null;
				$this->middleware('auth');

		}
		public function selectdatatablecaseAESI1()
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

		$selectcaselstF1 = DB::table('aesi_form')
		->join('aesi_form_vac', 'aesi_form.id_case', '=', 'aesi_form_vac.id_case')
		->select(	'aesi_form.id',
							'aesi_form.id_case',
							'aesi_form.hn',
							'aesi_form.an',
							'aesi_form.first_name',
							'aesi_form.sur_name',
							'aesi_form.village_no',
							'aesi_form.province',
							'aesi_form.district',
							'aesi_form.subdistrict',
							'aesi_form_vac.name_of_vaccine',
							'aesi_form.date_of_symptoms',
							'aesi_form.diagnosis',
							'aesi_form.hospcode_treat',
							'aesi_form.province_reporter',
							'aesi_form.date_entry'
						);
		 if (count($roleArr) > 0) {
				$user_role = $roleArr[0];
			switch ($user_role) {
				case 'hospital':
					// dd("p;p");
					$caselstF1  = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aesi_form.user_hospcode',auth()->user()->hospcode)
														->orWhere('aesi_form.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aesi_form.hospcode_report',auth()->user()->hospcode)
														->orWhere('aesi_form.hospcode_refer',auth()->user()->hospcode)
														->orWhere('aesi_form.hosp_update_refer',auth()->user()->hospcode);
									})
									// ->whereDate('aesi_form.date_entry',$datenow)
									->whereNull('aesi_form.status')
									->groupBy('aesi_form.id_case')
									->get();

				break;
				case 'pho':
					$caselstF1 = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aesi_form.user_provcode',auth()->user()->prov_code)
														->orWhere('aesi_form.province_reporter',auth()->user()->prov_code)
														->orWhere('aesi_form.province_reported',auth()->user()->prov_code)
														->orWhere('aesi_form.prov_update_refer',auth()->user()->prov_code)
														->orWhere('aesi_form.province_refer',auth()->user()->prov_code)
														->orWhere('aesi_form.province_record_refer',auth()->user()->prov_code);
									})
									// ->whereDate('aesi_form.date_entry',$datenow)
									->whereNull('aesi_form.status')
									->groupBy('aesi_form.id_case')
									->get();
					break;
					case 'dpc':
					if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
							$caselstF1 = $selectcaselstF1
								->whereDate('aesi_form.date_update',$datenow)
									->whereNull('aesi_form.status')
									->groupBy('aesi_form.id_case')
									->get();
					}else {
						$caselstF1 = $selectcaselstF1
								// ->where('user_region',$roleArrregion)
								// ->whereDate('aesi_form.date_entry',$datenow)
								->whereIn('aesi_form.province',$selectgroupprov)
								->whereNull('aesi_form.status')
								->groupBy('aesi_form.id_case')
								->get();
					}
						break;
						case 'ddc':
							$caselstF1 = $selectcaselstF1
							->whereDate('aesi_form.date_update',$datenow)
							->whereNull('aesi_form.status')
							->groupBy('aesi_form.id_case')
							->get();
							break;
						case 'admin':
							$caselstF1 = $selectcaselstF1
							->whereDate('aesi_form.date_update',$datenow)
							->whereNull('aesi_form.status')
							->groupBy('aesi_form.id_case')
							->get();
							break;
						case 'admin-dpc':
						$caselstF1 = $selectcaselstF1
						->whereDate('aesi_form.date_update',$datenow)
						->whereIn('aesi_form.province',$selectgroupprov)
						->whereNull('aesi_form.status')
						->groupBy('aesi_form.id_case')
						->get();
						break;
			default:
				break;
		}
	}
	//  dd($caselstF1);
	 $list=$this->form1();
	 $listProvince=$this->listProvince();
	 $listDistrict=$this->listDistrict();
	 $listsubdistrict=$this->listsubdistrict();
	 $vac_list=$this->vaclist();
	 $listvac_arr=$this->listvac_arr();
	 $list_hos=$this->list_hos();
		 //dd($caselst);
		 return view('AESI.caselstAESI1')
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
			->with('datenow',$datenow);

	 	}

		public function selectdatatablecaseAESI1src(Request $req)
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

		$selectcaselstF1 = DB::table('aesi_form')
		->join('aesi_form_vac', 'aesi_form.id_case', '=', 'aesi_form_vac.id_case')
		->select(	'aesi_form.id',
							'aesi_form.id_case',
							'aesi_form.hn',
							'aesi_form.an',
							'aesi_form.first_name',
							'aesi_form.sur_name',
							'aesi_form.village_no',
							'aesi_form.province',
							'aesi_form.district',
							'aesi_form.subdistrict',
							'aesi_form_vac.name_of_vaccine',
							'aesi_form.date_of_symptoms',
							'aesi_form.diagnosis',
							'aesi_form.hospcode_treat',
							'aesi_form.province_reporter',
							'aesi_form.date_entry'
						);
						if ($province != null) {
							$caselstWhere = $selectcaselstF1
									->where('aesi_form.province_reporter', '=', $province);
						}
						else{
						}
						// if ($date_of_symptoms_in != null) {
						// 	$caselstWhere = $selectcaselstF1
						// 									->whereDate('aesi_form.date_entry', '>=', $date_of_symptoms_from)
						// 									->whereDate('aesi_form.date_entry', '<=', $date_of_symptoms_to);
						// }
						// else{
						// }
						// if ($hospcode_treat != null) {
						// 	$caselstWhere = $selectcaselstF1
						// 									->where('aesi_form.hospcode_treat', '=', $hospcode_treat);
						// }
						// else{
						// }
						if ($first_name != null) {
							$caselstWhere = $selectcaselstF1
															->orwhere('aesi_form.first_name', 'LIKE', "%{$first_name}%");
															}
															else{
															}
						if ($sur_name != null) {
							$caselstWhere = $selectcaselstF1
															->orwhere('aesi_form.sur_name', 'LIKE', "%{$sur_name}%");
						}
						else{
						}
						if ($id != null) {
							$caselstWhere = $selectcaselstF1
															->orwhere('aesi_form.id', 'LIKE', "%{$id}%");
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
											$query->orWhere('aesi_form.user_hospcode',auth()->user()->hospcode)
														->orWhere('aesi_form.hospcode_treat',auth()->user()->hospcode)
														->orWhere('aesi_form.hospcode_report',auth()->user()->hospcode)
														->orWhere('aesi_form.hospcode_refer',auth()->user()->hospcode)
														->orWhere('aesi_form.hosp_update_refer',auth()->user()->hospcode);
									})
									->whereNull('aesi_form.status')
									->groupBy('aesi_form.id_case')
									->get();

				break;
				case 'pho':
					$caselstF1 = $selectcaselstF1
								->where(function($query) {
											$query->orWhere('aesi_form.province_reporter',auth()->user()->prov_code)
														->orWhere('aesi_form.province_reported',auth()->user()->prov_code)
														->orWhere('aesi_form.prov_update_refer',auth()->user()->prov_code)
														->orWhere('aesi_form.province_refer',auth()->user()->prov_code)
														->orWhere('aesi_form.province_record_refer',auth()->user()->prov_code);
									})
									->whereNull('aesi_form.status')
									->groupBy('aesi_form.id_case')
									->get();
					break;
					case 'dpc':
					if ($roleArrhospcode == "41173" || $roleArrhospcode == "41169") {
							$caselstF1 = $selectcaselstF1
									->whereNull('aesi_form.status')
									->groupBy('aesi_form.id_case')
									->get();
					}else {
						$caselstF1 = $selectcaselstF1
								// ->where('user_region',$roleArrregion)
								->whereIn('aesi_form.province',$selectgroupprov)
								->whereNull('aesi_form.status')
								->groupBy('aesi_form.id_case')
								->get();
					}
						break;
						case 'ddc':
							$caselstF1 = $selectcaselstF1
							->whereNull('aesi_form.status')
							->groupBy('aesi_form.id_case')
							->get();
							break;
						case 'admin':
							$caselstF1 = $caselstWhere
							->whereNull('aesi_form.status')
							->groupBy('aesi_form.id_case')
							->get();
							break;
						case 'admin-dpc':
						$caselstF1 = $selectcaselstF1
						->whereIn('aesi_form.province',$selectgroupprov)
						->whereNull('aesi_form.status')
						->groupBy('aesi_form.id_case')
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
	// dd("test");
		 return view('AESI.caselstAESI1')
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
			->with('datenow',$datenow);
			// ->with('date_of_symptoms_from',$date_of_symptoms_from)
			// ->with('date_of_symptoms_to',$date_of_symptoms_to);
		}


		public function selectdatatablecaseAESI1group()
		{
		$caselstF1group = DB::select('select id_case,hn,
		an,
		first_name,
		sur_name,
		village_no,
		province,
		district,
		subdistrict,
		FROM aesi_form' );
		 //dd($caselst);
		 return view('AESI.Apps.caselstAESI1group')->with('data', $caselstF1group);

		}
		public function selectdatatablecaseAESI2(Request $req)
		{
			$idcase = $req->id_case;
									$caselstF2 = DB::table('aefi_form_2')
																	->select(	'*'
																					)
																->where('status', '1' )
																->where('id_case', [$req->id_case] )
																->get();
		 return view('AESI.Apps.caselstAESI2')
		 				->with('data', $caselstF2)
						->with('idcase', 	$idcase);
		}

		public function selectdataAESI2()
		{
		$aefiF2id = DB::select('select id_case FROM aesi_form');
		// dd($aefiF2id);
		 return view('AESI.Apps.form2')->with('data', $aefiF2id);

		}
		public function selectalldataAESI1(Request $req)
		{
		$EditAESI1 = DB::table('aesi_form')->select('*')->where('id_case', [$req->id_case] )->get();
		 	//dd($EditAESI1);
			if ($EditAESI1) {
				$EditAESI1vac = DB::table('aesi_form_vac')->select('*')->where('id_case', [$req->id_case] )->get();
			}
			$count_data_vac= DB::table('aesi_form_vac')
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
						// dd($EditAESI1vac);
		 return view('AESI.Apps.EditAESI1')
		 				->with('data', $EditAESI1)
						->with('datavac', $EditAESI1vac)
						->with('list', $list)
						->with('listProvince', $listProvince)
						->with('listDistrict', $listDistrict)
						->with('listsubdistrict', $listsubdistrict)
						->with('vac_list',$vac_list)
						->with('count_data_vac',$count_data_vac)
						->with('listvac_arr',$listvac_arr)
						->with('list_hos',$list_hos)
						->with('list_career',$list_career);

		}
		public function selectalldataAESI2(Request $req)
		{
		$EditAESI2 = DB::table('aefi_form_2')->select('*')->where('id_case', [$req->id_case] )->get();
			//dd($EditAESI1);
			if ($EditAESI2) {
				$EditAESI2vac = DB::table('aefi_form_2_vac')->select('*')->where('id_case', [$req->id_case] )->get();
				// dd($EditAESI2vac);
			}
			if ($EditAESI2) {
				$EditAESI2inv = DB::table('aefi_inv')->select('*')->where('id_case', [$req->id_case] )->get();
				// dd($EditAESI2vac);
			}
			//dd($EditAESI1vac);
		 return view('AESI.Apps.EditAESI2')->with('data', $EditAESI2)->with('datavac', $EditAESI2vac)->with('datainv', $EditAESI2inv);

		}
		public function selectdatatableEditcaseAESI2(Request $reqef2)
		{
		$ecaselstF2 = DB::table('aesi_form')
		->join('aefi_form_2', 'aesi_form.id_case', '=', 'aefi_form_2.id_case')
		->select('aesi_form.id_case','aesi_form.hn',
		'aesi_form.an',
		'aesi_form.first_name',
		'aesi_form.sur_name',
		'aesi_form.birthdate',
		'aesi_form.province',
		'aesi_form.district',
		'aesi_form.subdistrict')
		->get();
		 // dd($caselstF2);
		 return view('AESI.Apps.EditlstAESI2')->with('data', $ecaselstF2);
		}

		public function deletedata(Request $req){
			$deletedata = DB::table('aesi_form')
								  ->where('id_case', $req->id_case)
								  ->update(['status' => 1]);
			 if ($deletedata) {
				 $deletedata_vac = DB::table('aesi_form_vac')
													 ->where('id_case', $req->id_case)
													 ->update(['status' => 1]);
					if ($deletedata_vac) {
						$msg = " ส่งข้อมูลสำเร็จ";
						$url_rediect = "<script>alert('".$msg."');location.href='lstaesif1';</script> ";
					}else {
						$msg = "ส่งข้อมูลไม่สำเร็จ";
						$url_rediect = "<script>alert('".$msg."');location.href='lstaesif1';</script> ";
					}
			}else {
				$msg = "ส่งข้อมูลไม่สำเร็จ";
				$url_rediect = "<script>alert('".$msg."');location.href='lstaesif1';</script> ";
			}
			echo $url_rediect;
		}

		public function aecode(){
			$this->result = DB::table('dt_aecode')
			->get();
			return view('AESI.Apps.form1')->with('dataaecode', $this->result);

		}
		public function form1(){
			$list=DB::table('tbl_provinces')->get();
			 // return view('AESI.Apps.form1')->with('list',$list);
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

}
