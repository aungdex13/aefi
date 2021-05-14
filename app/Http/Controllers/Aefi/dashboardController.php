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
	class DashboardController extends Controller
	{
		public function dashboard(){
			$province = null;
			$date_of_symptoms = null;
			$name_of_vaccine = null;
			$count_prov = $this->count_prov();
			$listProvince=$this->listProvince();
			$listvac_arr=$this->listvac_arr();
			$count_month=$this->count_month();
			$count_year=$this->count_year();
			$yearnow =  now()->year ;
			$count_north = $this->count_north();
			$count_northeast = $this->count_northeast();
			$count_central = $this->count_central();
			$count_eastern = $this->count_eastern();
			$count_south = $this->count_south();
			$count_western = $this->count_western();
			$count_all_gender = $this->count_all_gender();
			$count_male = $this->count_male();
			$count_female = $this->count_female();
			$count_gender_other = $this->count_gender_other();
			$count_vacname = $this->count_vacname();
			$listvac_arr =  $this->listvac_arr();
			$count_groupage = $this->count_groupage();
			$count_all_seriousness_of_the_symptoms= $this->count_all_seriousness_of_the_symptoms();
			$vac_list=$this->vaclist();
			// dd($vac_list);
			return view('AEFI.Apps.dashboard',compact(
			 'count_prov',
			 'listProvince',
			 'count_month',
			 'count_year',
			 'yearnow',
			 'count_north',
			 'count_northeast',
			 'count_central',
			 'count_eastern',
			 'count_south',
			 'count_western',
			 'count_all_seriousness_of_the_symptoms',
			 'count_all_gender',
			 'count_male',
			 'count_female',
			 'count_gender_other',
			 'count_vacname',
			 'count_groupage',
			 'listvac_arr',
			 'vac_list',
			 'province',
			 'date_of_symptoms',
			 'name_of_vaccine'
		 ));
		}
		public function selectdatadash(Request $req)
		{
			// $zone = $req->input('zone');
			$province = $req->input('province');
			$date_of_symptoms = $req->input('date_of_symptoms');
			$name_of_vaccine = $req->input('name_of_vaccine');
			//dd($province,$date_of_symptoms,$name_of_vaccine);
			$count_prov = $this->count_prov();
			$listProvince=$this->listProvince();
			$listvac_arr=$this->listvac_arr();
			$count_month = DB::table('aefi_form_1')
										 ->select(DB::raw('
										 count(*) as count_patient ,
											MONTH(date_of_symptoms) as month_entry,
											YEAR(date_of_symptoms) as year_entry,
											GROUP_CONCAT(MONTH(date_of_symptoms))'))
											->where('province',"=",$province)
										 ->where('status','=',null)
										 ->groupBy('year_entry')
										 ->orderBy('year_entry')
										 ->get();
			// dd($count_month);

			$count_year=$this->count_year();
			$yearnow =  now()->year ;
			$count_north = $this->count_north();
			$count_northeast = $this->count_northeast();
			$count_central = $this->count_central();
			$count_eastern = $this->count_eastern();
			$count_south = $this->count_south();
			$count_western = $this->count_western();
			$count_all_gender_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('count(aefi_form_1.id) as gender_n ,	aefi_form_1.gender '));
			if ($name_of_vaccine != null) {
				$vac_select = $count_all_gender_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			}else{
			}
			if ($province != null) {
				$vac_select = $count_all_gender_se
											->Where('aefi_form_1.province',"=",$province);
			}else {
			}
			if ($province != null && $name_of_vaccine != null) {
				$vac_select = $count_all_gender_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine)
											->Where('aefi_form_1.province',"=",$province);
			}else {
			}
					$count_all_gender = $vac_select
											->where('aefi_form_1.status',null)
											->groupBy('aefi_form_1.gender')
											->get();
			// dd($province,$name_of_vaccine,$count_all_gender);
			$count_male = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_male'))
										 ->where('province',"=",$province)
										 ->where('gender', '=', '1')
										 ->where('status',null)
										 ->get();
			$count_female = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_female'))
										 ->where('province',"=",$province)
										 ->where('gender', '=', '2')
										 ->where('status',null)
										 ->get();
			$count_gender_other = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_gender_other'))
										 ->where('province',"=",$province)
										 ->where('gender', '=', null)
										 ->where('status',null)
										 ->get();
			$count_vacname = DB::table('aefi_form_1_vac')
				 					 ->select(DB::raw('count(aefi_form_1_vac.name_of_vaccine) as vac_count,name_of_vaccine'))
									 // ->where('province',"=",$province)
				 					 ->where('status','=',null)
				 					 ->groupBy('name_of_vaccine')
				 					 ->orderBy('name_of_vaccine','DESC')
				 					 ->get();
			$listvac_arr =  $this->listvac_arr();
			$count_groupage = $this->count_groupage();
			$count_all_seriousness_of_the_symptoms = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_seriousness_of_the_symptoms'))
										 ->where('province',"=",$province)
										 ->where('status',null)
										 ->get();
			$vac_list=$this->vaclist();
						// dd($vac_list);
			return view('AEFI.Apps.dashboard',compact(
			 'count_prov',
			 'listProvince',
			 'count_month',
			 'count_year',
			 'yearnow',
			 'count_north',
			 'count_northeast',
			 'count_central',
			 'count_eastern',
			 'count_south',
			 'count_western',
			 'count_all_seriousness_of_the_symptoms',
			 'count_all_gender',
			 'count_male',
			 'count_female',
			 'count_gender_other',
			 'count_vacname',
			 'count_groupage',
			 'listvac_arr',
			 'vac_list',
			 'province',
			 'date_of_symptoms',
			 'name_of_vaccine'
		 ));
	 	}
		protected function count_prov(){
	    $count_prov = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_prov , province'))

										 ->where('status','=',null)
	                   ->groupBy('province')
										 ->get();
	    return $count_prov;
	  }
		protected function count_month(){
			$count_year =  $this->count_year()->pluck('year_entry');
					$count_month = DB::table('aefi_form_1')
												 ->select(DB::raw('
												 count(*) as count_patient ,
												  MONTH(date_of_symptoms) as month_entry,
													YEAR(date_of_symptoms) as year_entry,
													GROUP_CONCAT(MONTH(date_of_symptoms))'))
												 ->where('status','=',null)
												 ->groupBy('year_entry')
												 ->orderBy('year_entry')
												 ->get();
			return $count_month;
}

		protected function count_year(){
			$count_year = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_patient , MONTH(date_of_symptoms) as month_entry, YEAR(date_of_symptoms) as year_entry'))
										 ->where('status','=',null)
										 ->groupBy('year_entry')
										 ->orderBy('year_entry')
										 ->get();
			return $count_year;
		}
		protected function count_north(){
			$yearnow =  now()->year;
			$north = [50,51,52,53,54,55,56,57,58];
			$count_north = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_north'))
										 ->whereYear('date_of_symptoms', '=', "$yearnow")
										  ->wherein('province',[50,51,52,53,54,55,56,57,58])
										 ->get();
			return $count_north;
		}
		protected function count_northeast(){
			$yearnow =  now()->year;
			$count_northeast = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_northeast'))
										 ->whereYear('date_of_symptoms', '=', "$yearnow")
										 ->where('status','=',null)
										 ->wherein('province', [42,	97,	30,	49,	48,	47,	33,	34,35,	36,	37,	39,	40,	41,	31,	43,	44,	45,	46,	32])
										 ->get();
			return $count_northeast;
		}
		protected function count_central(){
			$yearnow =  now()->year;
			 $central = [	60,	74, 61,	73,	72,	67,	66,	65,	64,	62,	75,	14,	26,	18,	10,	11,	12,	19,	13,	17,	16,	15];
			$count_central = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_central'))
										 ->whereYear('date_of_symptoms', '=', "$yearnow")
										 ->where('status','=',null)
										 ->whereIn('province',[	60,	74, 61,	73,	72,	67,	66,	65,	64,	62,	75,	14,	26,	18,	10,	11,	12,	19,	13,	17,	16,	15])
										 ->get();
			return $count_central;
		}
		protected function count_eastern(){
			$yearnow =  now()->year;
			$eastern = [96,
									95,
									94,
									93,
									92,
									91,
									90,
									86,
									84,
									83,
									82,
									81,
									80,
									85,
							];
			$count_eastern = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_eastern'))
										 ->whereYear('date_of_symptoms', '=', "$yearnow")
										 ->where('status','=',null)
										 ->wherein('province',[96,
												 									95,
												 									94,
												 									93,
												 									92,
												 									91,
												 									90,
												 									86,
												 									84,
												 									83,
												 									82,
												 									81,
												 									80,
												 									85
							 							])
										 ->get();
			return $count_eastern;
		}
		protected function count_western(){
			$yearnow =  now()->year;
			$western = [96,
									95,
									94,
									93,
									92,
									91,
									90,
									86,
									84,
									83,
									82,
									81,
									80,
									85,
							];
			$count_western = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_western'))
										 ->whereYear('date_of_symptoms', '=', "$yearnow")
										 ->where('status','=',null)
										 ->wherein('province',[96,
												 									95,
												 									94,
												 									93,
												 									92,
												 									91,
												 									90,
												 									86,
												 									84,
												 									83,
												 									82,
												 									81,
												 									80,
												 									85,
												 							])
										 ->get();
			return $count_western;
		}
		protected function count_south(){
			$yearnow =  now()->year;
			$south = [96,
								95,
								94,
								93,
								92,
								91,
								90,
								86,
								84,
								83,
								82,
								81,
								80,
								85,
							];
			$count_south = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_south'))
										 ->whereYear('date_of_symptoms', '=', "$yearnow")
										 ->where('status','=',null)
										 ->wherein('province', [96,
							 								95,
							 								94,
							 								93,
							 								92,
							 								91,
							 								90,
							 								86,
							 								84,
							 								83,
							 								82,
							 								81,
							 								80,
							 								85,
							 							])
										 ->get();
			return $count_south;
		}
		protected function listProvince(){
			$province = DB::table('tbl_provinces')
			->select('province_code','province_name')
			->orderBy('province_code', 'ASC')
			->get();
			foreach ($province as  $value) {
				$province_arr[$value->province_code] =trim($value->province_name);
			}
			return $province_arr;
		}
		protected function listvac_arr(){
			$arr_vac = DB::table('vac_tbl')->select('VAC_CODE','VAC_NAME_EN')->get();
			foreach ($arr_vac as  $value) {
				$arr_vac[$value->VAC_CODE] =trim($value->VAC_NAME_EN);
			}
			// dd($province_arr);
			return $arr_vac;
		}
		protected function count_all_seriousness_of_the_symptoms(){
			$yearnow =  now()->year;
			$count_all_seriousness_of_the_symptoms = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_seriousness_of_the_symptoms'))
										 ->where('status',null)
										 ->get()->toArray();
			return $count_all_seriousness_of_the_symptoms;
		}
		protected function count_all_gender(){
			$yearnow =  now()->year;
			$count_all_gender = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as gender_n ,gender'))
										 ->where('status',null)
										 ->groupBy('gender')
										 ->get();
										 // dd($count_all_gender);
			return $count_all_gender;
		}
		protected function count_male(){
			$yearnow =  now()->year;
			$count_male = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_male'))
										 ->where('gender', '=', '1')
										 ->where('status',null)
										 ->get();
			return $count_male;
		}
		protected function count_female(){
			$yearnow =  now()->year;
			$count_female = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_female'))
										 ->where('gender', '=', '2')
										 ->where('status',null)
										 ->get();
			return $count_female;
		}
		protected function count_gender_other(){
			$yearnow =  now()->year;
			$count_gender_other = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_gender_other'))
										 ->where('gender', '=', null)
										 ->where('status',null)
										 ->get();
			return $count_gender_other;
		}
		protected function count_vacname(){
			$count_vacname = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('count(aefi_form_1_vac.name_of_vaccine) as vac_count,name_of_vaccine'))
										 ->where('status','=',null)
										 ->groupBy('name_of_vaccine')
										 ->orderBy('name_of_vaccine','DESC')
										 ->get();
			return $count_vacname;
		}
		protected function count_groupage(){
			$yearnow =  now()->year;
			$count_groupage = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as countgroupage,group_age'))
										 ->where('status','=',null)
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->groupBy('group_age')
										 ->orderBy('group_age','ASC')
										 ->get();
			return $count_groupage;
		}
		protected function vaclist(){
			$arr_vaclist = DB::table('vac_tbl')
			->select('ID','VAC_NAME_EN')
			->orderBy('ID', 'ASC')
			->get();
			 // dd($vaclist);
			return $arr_vaclist;
		}
}
