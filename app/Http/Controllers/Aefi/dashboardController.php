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
		public function dashboard(Request $req){
			$zone = $reg->zone;
			$count_prov = $this->count_prov();
			$listProvince=$this->listProvince();
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
			 'listvac_arr',
			 'count_groupage',
			 'zone'
		 ));
		}
		public function selectdatadash()
		{
		$caselstF1 = DB::table('aefi_form_1')
										->select('id,
															id_case,
															hn,
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
															necessary_to_investigate');
		 return view('AEFI.Apps.caselstAEFI1')->with('data', $caselstF1);
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
		protected function listvac_arr(){
			$arr_vac = DB::table('vac_tbl')->select('VAC_CODE','VAC_NAME_EN')->get();
			foreach ($arr_vac as  $value) {
				$arr_vac[$value->VAC_CODE] =trim($value->VAC_NAME_EN);
			}
			return $arr_vac;
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

}
