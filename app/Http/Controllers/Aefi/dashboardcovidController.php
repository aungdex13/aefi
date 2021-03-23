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
	class DashboardcovidController extends Controller
	{
		public function dashboardcovid(){
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
			$count_seriousness_of_the_symptoms = $this->count_seriousness_of_the_symptoms();
			$count_seriousness_of_the_symptoms_m = $this->count_seriousness_of_the_symptoms_m();
			$count_seriousness_of_the_symptoms_f = $this->count_seriousness_of_the_symptoms_f();
			$count_vacname = $this->count_vacname();
			$listvac_arr =  $this->listvac_arr();
			$count_groupage = $this->count_groupage();
			$count_all_seriousness_of_the_symptoms= $this->count_all_seriousness_of_the_symptoms();
			return view('AEFI.Apps.dashboardcovid',compact(
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
			 'count_seriousness_of_the_symptoms',
			 'count_seriousness_of_the_symptoms_m',
			 'count_seriousness_of_the_symptoms_f',
			 'count_vacname',
			 'listvac_arr',
			 'count_groupage'
		 ));
		}

		protected function count_prov(){
			$yearnow =  now()->year;
	    $count_prov = DB::table('aefi_form_1')
										 ->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_prov , aefi_form_1.province'))
										 ->where('aefi_form_1.date_of_symptoms', $yearnow)
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->where('aefi_form_1.status','=',null)
	                   ->groupBy('aefi_form_1.province')
										 ->get();
	    return $count_prov;
	  }
		protected function count_month(){
			$yearnow =  now()->year;
			$count_year =  $this->count_year()->pluck('year_entry');
					$count_month = DB::table('aefi_form_1')
												 ->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
												 ->select(DB::raw('
												  count(aefi_form_1.id) as count_patient ,
												  MONTH(date_of_symptoms) as month_entry,
													YEAR(date_of_symptoms) as year_entry,
													GROUP_CONCAT(MONTH(date_of_symptoms))'))
												 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
												 ->where('aefi_form_1.date_of_symptoms', $yearnow)
												 ->where('aefi_form_1.status','=',null)
												 ->groupBy('month_entry')
												 ->get();
			return $count_month;
}

		protected function count_year(){
			$count_year = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_patient , MONTH(date_of_symptoms) as month_entry, YEAR(date_of_symptoms) as year_entry'))
										 ->where('status','=',null)
										 ->groupBy('year_entry')
										 ->orderBy('year_entry')
										 ->get();
			return $count_year;
		}
		protected function count_north(){
			$yearnow =  now()->year;
			$count_north = DB::table('aefi_form_1')
			 							->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_north'))
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1.status','=',null)
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										  ->wherein('aefi_form_1.province',
																[
																	50,
																	51,
																	52,
																	53,
																	54,
																	55,
																	56,
																	57,
																	58
															]
																)
										 ->get();
			return $count_north;
		}
		protected function count_northeast(){
			$yearnow =  now()->year;
			 // dd($yearnow);
			$count_northeast = DB::table('aefi_form_1')
										->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_northeast'))
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1.status','=',null)
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->wherein('aefi_form_1.province',
										  [
												30,
												31,
												32,
												33,
												34,
												35,
												36,
												37,
												39,
												40,
												41,
												42,
												43,
												44,
												45,
												46,
												47,
												48,
												49,
												97,
											])
										 ->get();
			return $count_northeast;
		}
		protected function count_central(){
			$yearnow =  now()->year;
			$count_central = DB::table('aefi_form_1')
										->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_central'))
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1.status','=',null)
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->whereIn('aefi_form_1.province',
										 [
											  10,
												11,
												12,
												13,
												14,
												15,
												16,
												17,
												18,
												19,
												26,
												60,
												61,
												62,
												64,
												65,
												66,
												67,
												72,
												73,
												74,
												75
										 ])
										 ->get();
				// dd($count_month);
			return $count_central;
		}
		protected function count_eastern(){
			$yearnow =  now()->year;
			$count_eastern = DB::table('aefi_form_1')
											->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_eastern'))
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1.status','=',null)
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->wherein('aefi_form_1.province',
										 									[
																				20,
																				21,
																				22,
																				23,
																				24,
																				25,
																				27,
							 												])
										 ->get();
			return $count_eastern;
		}
		protected function count_western(){
			$yearnow =  now()->year;
			$count_western = DB::table('aefi_form_1')
											->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_western'))
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 	->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->where('aefi_form_1.status','=',null)
										 ->wherein('aefi_form_1.province',
										 										[
																					63,
																					70,
																					71,
																					76,
																					77,
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
											->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_south'))
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->where('aefi_form_1.status','=',null)
										 ->wherein('aefi_form_1.province',
										  																		[
																														80,
																														81,
																														82,
																														83,
																														84,
																														85,
																														86,
																														90,
																														91,
																														92,
																														93,
																														94,
																														95,
																														96
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
										 ->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_seriousness_of_the_symptoms'))
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->where('aefi_form_1.status',null)
										 ->get()->toArray();
			return $count_all_seriousness_of_the_symptoms;
		}
		protected function count_seriousness_of_the_symptoms(){
			$yearnow =  now()->year;
			$count_seriousness_of_the_symptoms = DB::table('aefi_form_1')
										 ->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_seriousness_of_the_symptoms,aefi_form_1.seriousness_of_the_symptoms'))
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->where('aefi_form_1.status',null)
										 ->groupBy('aefi_form_1.seriousness_of_the_symptoms')
										 ->get();
			return $count_seriousness_of_the_symptoms;
		}
		protected function count_seriousness_of_the_symptoms_m(){
			$yearnow =  now()->year;
			$count_seriousness_of_the_symptoms_m = DB::table('aefi_form_1')
										->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_seriousness_of_the_symptoms,aefi_form_1.seriousness_of_the_symptoms'))
										 ->where('aefi_form_1.gender', '=', '1')
										 ->where('aefi_form_1.status',null)
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->groupBy('aefi_form_1.seriousness_of_the_symptoms')
										 ->get();
			return $count_seriousness_of_the_symptoms_m;
		}
		protected function count_seriousness_of_the_symptoms_f(){
			$yearnow =  now()->year;
			$count_seriousness_of_the_symptoms_f = DB::table('aefi_form_1')
										->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_seriousness_of_the_symptoms,aefi_form_1.seriousness_of_the_symptoms'))
										 ->where('aefi_form_1.gender', '=', '2')
										 ->where('aefi_form_1.status',null)
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->groupBy('aefi_form_1.seriousness_of_the_symptoms')
										 ->get();
			return $count_seriousness_of_the_symptoms_f;
		}
		protected function count_vacname(){
			$count_vacname = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('count(aefi_form_1_vac.name_of_vaccine) as vac_count,name_of_vaccine'))
										 // ->where('gender', '=', '2')
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
											->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as countgroupage,aefi_form_1.group_age'))
										 ->where('aefi_form_1.status','=',null)
										 ->whereYear('aefi_form_1.date_of_symptoms', '=', "$yearnow")
										 ->where('aefi_form_1_vac.name_of_vaccine','=', '39')
										 ->groupBy('aefi_form_1.group_age')
										 ->orderBy('aefi_form_1.group_age','ASC')
										 ->get();
			return $count_groupage;
		}

}
