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
	use Cache;
	use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model as Eloquent;
	class DashboardController extends Controller
	{
		public function dashboard(){

			$province = null;
			$date_of_symptoms = null;
			$name_of_vaccine = null;
			$count_prov = $this->count_prov();
			$listProvince=$this->listProvince();
			$listvac_arr=$this->listvac_arr();
			$count_year=$this->count_year();
			$yearnow =  now()->year ;
			$count_north = $this->count_north();
			$count_northeast = $this->count_northeast();
			$count_central = $this->count_central();
			$count_eastern = $this->count_eastern();
			$count_south = $this->count_south();
			$count_western = $this->count_western();
			$count_all_gender = $this->count_all_gender();
			$count_all_gender_m = $this->count_male();
			$count_all_gender_f = $this->count_female();
			$count_all_gender_other = $this->count_gender_other();
			$count_vacname = $this->count_vacname();
			// dd($count_vacname);
			$count_groupage = $this->count_groupage();
			$count_all_seriousness_of_the_symptoms= $this->count_all_seriousness_of_the_symptoms();
			$vac_list=$this->vaclist();
			// $countGender=$this->countGender();
			$count_all_district_by_province= "0000";
			$count_month_jan = Cache::remember('month_jan', 1020, function() {
											return DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_jan
																				 '))
											->whereMonth('aefi_form_1.date_entry', '=', '01')
											->where('aefi_form_1.status',null)
											->get();
      							});
			$count_month_feb = Cache::remember('month_feb', 1020, function() {
											return DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_feb
																				 '))
											->whereMonth('aefi_form_1.date_entry', '=', '02')
										->where('aefi_form_1.status',null)
										->get();
										});
			$count_month_mar = Cache::remember('month_mar', 1020, function() {
											return DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_mar
																				 '))
											->whereMonth('aefi_form_1.date_entry', '=', '03')
											->where('aefi_form_1.status',null)
											->get();
										});

		$count_month_apr = Cache::remember('month_apr', 1020, function() {
										return DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_apr
																			 '))
										->whereMonth('aefi_form_1.date_entry', '=', '04')
										->where('aefi_form_1.status',null)
										->get();
									});

		$count_month_may = Cache::remember('month_may', 1020, function() {
										return DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_may
																			 '))
										->whereMonth('aefi_form_1.date_entry', '=', '05')
										->where('aefi_form_1.status',null)
										->get();
									});

		$count_month_jun = Cache::remember('month_jun', 1020, function() {
										return DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_jun
																			 '))
										->whereMonth('aefi_form_1.date_entry', '=', '06')
										->where('aefi_form_1.status',null)
										->get();
									});

		$count_month_jul = Cache::remember('month_jul', 1020, function() {
										return DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_jul
																			 '))
										->whereMonth('aefi_form_1.date_entry', '=', '07')
										->where('aefi_form_1.status',null)
										->get();
									});

	  $count_month_aug = Cache::remember('month_aug', 1020, function() {
										return DB::table('aefi_form_1')
	  								->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
	  								->select(DB::raw('
	  																	count(aefi_form_1.id) as month_aug
	  																	 '))
	  								->whereMonth('aefi_form_1.date_entry', '=', '08')
	  								->where('aefi_form_1.status',null)
	  								->get();
									});

		$count_month_sep = Cache::remember('month_sep', 1020, function() {
										return DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_sep
																				 '))
											->whereMonth('aefi_form_1.date_entry', '=', '09')
											->where('aefi_form_1.status',null)
											->get();
										});

		$count_month_oct = Cache::remember('month_oct', 1020, function() {
										return DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_oct
																				 '))
											->whereMonth('aefi_form_1.date_entry', '=', '10')
											->where('aefi_form_1.status',null)
											->get();
										});

			$count_month_nov = Cache::remember('month_nov', 1020, function() {
											return DB::table('aefi_form_1')
												->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
												->select(DB::raw('
																					count(aefi_form_1.id) as month_nov
																					 '))
												->whereMonth('aefi_form_1.date_entry', '=', '11')
												->where('aefi_form_1.status',null)
												->get();
											});

				$count_month_dec = Cache::remember('month_dec', 1020, function() {
												return DB::table('aefi_form_1')
													->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
													->select(DB::raw('
																						count(aefi_form_1.id) as month_dec
																						'))
													->whereMonth('aefi_form_1.date_entry', '=', '12')
													->where('aefi_form_1.status',null)
													->get();
												});
			// dd($vac_list);
			return view('AEFI.Apps.dashboard',compact(
			 'count_prov',
			 'listProvince',
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
			 'count_all_gender_m',
			 'count_all_gender_f',
			 'count_all_gender_other',
			 'count_vacname',
			 'count_groupage',
			 'listvac_arr',
			 'vac_list',
			 'province',
			 'date_of_symptoms',
			 'name_of_vaccine',
			 'count_month_jan',
			 'count_month_feb',
			 'count_month_mar',
			 'count_month_apr',
			 'count_month_may',
			 'count_month_jun',
			 'count_month_jul',
			 'count_month_aug',
			 'count_month_sep',
			 'count_month_oct',
			 'count_month_nov',
			 'count_month_dec',
			 'count_all_district_by_province'
		 ));
		}
		public function selectdatadash(Request $req)
		{
			$province = $req->input('province');
			$date_of_symptoms = $req->input('date_of_symptoms');
			$name_of_vaccine = $req->input('name_of_vaccine');
			$count_prov_se = DB::table('aefi_form_1')
										 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_prov , aefi_form_1.province'))
										 ->where('aefi_form_1.status','=',null);
										 if ($name_of_vaccine != null) {
									 		$vac_select = $count_prov_se
									 									->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
									 	}else{
									 	}
									 	if ($province == null || $name_of_vaccine == null) {
									 		$vac_select = $count_prov_se;
									 	}else{
									 	}
									 			$count_prov = $vac_select
												->groupBy('aefi_form_1.province')
												->get();
			 // dd($count_prov);
			$listProvince=$this->listProvince();
			$listvac_arr=$this->listvac_arr();
			$count_year=$this->count_year();
			$yearnow =  now()->year ;

			$count_month_jan_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_jan
																				'))
											->whereMonth('aefi_form_1.date_entry', '=', '01');
			if ($name_of_vaccine != null) {
				$vac_select = $count_month_jan_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			}else{
			}
			if ($province != null) {
				$vac_select = $count_month_jan_se
											->Where('aefi_form_1.province',"=",$province);
			}else{
			}
			if ($province == null || $name_of_vaccine == null) {
				$vac_select = $count_month_jan_se;
			}else{
			}
					$count_month_jan = $vac_select
											->where('aefi_form_1.status',null)
											->get();

			$count_month_feb_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_feb
																				'))
											->whereMonth('aefi_form_1.date_entry', '=', '02');
			if ($name_of_vaccine != null) {
				$vac_select = $count_month_feb_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			}else{
			}
			if ($province != null) {
				$vac_select = $count_month_feb_se
											->Where('aefi_form_1.province',"=",$province);
			}else{
			}
			if ($province == null || $name_of_vaccine == null) {
				$vac_select = $count_month_feb_se;
			}else{
			}
				$count_month_feb = $vac_select
										->where('aefi_form_1.status',null)
										->get();

			$count_month_mar_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_mar
																				'))
											->whereMonth('aefi_form_1.date_entry', '=', '03');
			if ($name_of_vaccine != null) {
				$vac_select = $count_month_mar_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			}else{
			}
			if ($province != null) {
				$vac_select = $count_month_mar_se
											->Where('aefi_form_1.province',"=",$province);
			}else{
			}
			if ($province == null || $name_of_vaccine == null) {
				$vac_select = $count_month_mar_se;
			}else{
			}
					$count_month_mar = $vac_select
											->where('aefi_form_1.status',null)
											->get();

		$count_month_apr_se = DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_apr
																			'))
										->whereMonth('aefi_form_1.date_entry', '=', '04');
		if ($name_of_vaccine != null) {
			$vac_select = $count_month_apr_se
										->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
		}else{
		}
		if ($province != null) {
			$vac_select = $count_month_apr_se
										->Where('aefi_form_1.province',"=",$province);
		}else{
		}
		if ($province == null || $name_of_vaccine == null) {
			$vac_select = $count_month_apr_se;
		}else{
		}
				$count_month_apr = $vac_select
										->where('aefi_form_1.status',null)
										->get();

		$count_month_may_se = DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_may
																			'))
										->whereMonth('aefi_form_1.date_entry', '=', '05');
		if ($name_of_vaccine != null) {
			$vac_select = $count_month_may_se
										->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
		}else{
		}
		if ($province != null) {
			$vac_select = $count_month_may_se
										->Where('aefi_form_1.province',"=",$province);
		}else{
		}
		if ($province == null || $name_of_vaccine == null) {
			$vac_select = $count_month_may_se;
		}else{
		}
				$count_month_may = $vac_select
										->where('aefi_form_1.status',null)
										->get();

		$count_month_jun_se = DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_jun
																			'))
										->whereMonth('aefi_form_1.date_entry', '=', '06');
		if ($name_of_vaccine != null) {
			$vac_select = $count_month_jun_se
										->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
		}else{
		}
		if ($province != null) {
			$vac_select = $count_month_jun_se
										->Where('aefi_form_1.province',"=",$province);
		}else{
		}
		if ($province == null || $name_of_vaccine == null) {
			$vac_select = $count_month_jun_se;
		}else{
		}
				$count_month_jun = $vac_select
										->where('aefi_form_1.status',null)
										->get();

		$count_month_jul_se = DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										->select(DB::raw('
																			count(aefi_form_1.id) as month_jul
																			'))
										->whereMonth('aefi_form_1.date_entry', '=', '07');
		if ($name_of_vaccine != null) {
			$vac_select = $count_month_jul_se
										->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
		}else{
		}
		if ($province != null) {
			$vac_select = $count_month_jul_se
										->Where('aefi_form_1.province',"=",$province);
		}else{
		}
		if ($province == null || $name_of_vaccine == null) {
			$vac_select = $count_month_jul_se;
		}else{
		}
				$count_month_jul = $vac_select
										->where('aefi_form_1.status',null)
										->get();

	  $count_month_aug_se = DB::table('aefi_form_1')
	  								->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
	  								->select(DB::raw('
	  																	count(aefi_form_1.id) as month_aug
	  																	'))
	  								->whereMonth('aefi_form_1.date_entry', '=', '08');
	  if ($name_of_vaccine != null) {
	  	$vac_select = $count_month_aug_se
	  								->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
	  }else{
	  }
	  if ($province != null) {
	  	$vac_select = $count_month_aug_se
	  								->Where('aefi_form_1.province',"=",$province);
	  }else{
	  }
		if ($province == null || $name_of_vaccine == null) {
			$vac_select = $count_month_aug_se;
		}else{
		}
	  		$count_month_aug = $vac_select
	  								->where('aefi_form_1.status',null)
	  								->get();

		$count_month_sep_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_sep
																				'))
											->whereMonth('aefi_form_1.date_entry', '=', '09');
			if ($name_of_vaccine != null) {
				$vac_select = $count_month_sep_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			}else{
			}
			if ($province != null) {
				$vac_select = $count_month_sep_se
											->Where('aefi_form_1.province',"=",$province);
			}else{
			}
			if ($province == null || $name_of_vaccine == null) {
				$vac_select = $count_month_sep_se;
			}else{
			}
					$count_month_sep = $vac_select
											->where('aefi_form_1.status',null)
											->get();

		$count_month_oct_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
											->select(DB::raw('
																				count(aefi_form_1.id) as month_oct
																				'))
											->whereMonth('aefi_form_1.date_entry', '=', '10');
			if ($name_of_vaccine != null) {
				$vac_select = $count_month_oct_se
											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			}else{
			}
			if ($province != null) {
				$vac_select = $count_month_oct_se
											->Where('aefi_form_1.province',"=",$province);
			}else{
			}
			if ($province == null || $name_of_vaccine == null) {
				$vac_select = $count_month_oct_se;
			}else{
			}
					$count_month_oct = $vac_select
											->where('aefi_form_1.status',null)
											->get();

			$count_month_nov_se = DB::table('aefi_form_1')
												->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
												->select(DB::raw('
																					count(aefi_form_1.id) as month_nov
																					'))
												->whereMonth('aefi_form_1.date_entry', '=', '11');
				if ($name_of_vaccine != null) {
					$vac_select = $count_month_nov_se
												->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
				}else{
				}
				if ($province != null) {
					$vac_select = $count_month_nov_se
												->Where('aefi_form_1.province',"=",$province);
				}else{
				}
				if ($province == null || $name_of_vaccine == null) {
					$vac_select = $count_month_nov_se;
				}else{
				}
						$count_month_nov = $vac_select
												->where('aefi_form_1.status',null)
												->get();

				$count_month_dec_se = DB::table('aefi_form_1')
													->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
													->select(DB::raw('
																						count(aefi_form_1.id) as month_dec
																						'))
													->whereMonth('aefi_form_1.date_entry', '=', '12');
					if ($name_of_vaccine != null) {
						$vac_select = $count_month_dec_se
													->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
					}else{
					}
					if ($province != null) {
						$vac_select = $count_month_dec_se
													->Where('aefi_form_1.province',"=",$province);
					}else{
					}
					if ($province == null || $name_of_vaccine == null) {
						$vac_select = $count_month_dec_se;
					}else{
					}
							$count_month_dec = $vac_select
													->where('aefi_form_1.status',null)
													->get();

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
			if ($province == null || $name_of_vaccine == null) {
				$vac_select = $count_all_gender_se;
			}else{
			}
					$count_all_gender = $vac_select
											->where('aefi_form_1.status',null)
											->groupBy('aefi_form_1.gender')
											->get();
			   // dd($count_all_gender);
			// $countGender_se =  DB::table('aefi_form_1')
			// 											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
			// 											->select(DB::raw('COUNT(aefi_form_1.id_case) as count_all'));
			// 											if ($name_of_vaccine != null) {
			// 											 $vac_select = $countGender_se
			// 																		 ->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			// 										 }else{
			// 										 }
			// 										 if ($province != null) {
			// 											 $vac_select = $countGender_se
			// 																		 ->Where('aefi_form_1.province',"=",$province);
			// 										 }else {
			// 										 }
			// 										 if ($province != null && $name_of_vaccine != null) {
			// 											 $vac_select = $countGender_se
			// 																		 ->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine)
			// 																		 ->Where('aefi_form_1.province',"=",$province);
			// 										 }else {
			// 										 }
			// 										 if ($province == null || $name_of_vaccine == null) {
			// 											 $vac_select = $countGender_se;
			// 										 }else{
			// 										 }
			// 												 $countGender = $vac_select
			// 																		 ->where('aefi_form_1.status',null)
			// 																		 ->get();
												 // dd($countGender);
			$count_male = DB::table('aefi_form_1')
										->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										// ->select(DB::raw('COUNT(distinct aefi_form_1.id_case) as count_male'));
										->select(DB::raw('COUNT(aefi_form_1.id_case) as count_male'));
										 if ($name_of_vaccine != null) {
							 				$vac_select = $count_male
							 											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
							 			}else{
							 			}
							 			if ($province != null) {
							 				$vac_select = $count_male
							 											->Where('aefi_form_1.province',"=",$province);
							 			}else {
							 			}
							 			if ($province != null && $name_of_vaccine != null) {
							 				$vac_select = $count_male
							 											->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine)
							 											->Where('aefi_form_1.province',"=",$province);
							 			}else {
							 			}
										if ($province == null || $name_of_vaccine == null) {
											$vac_select = $count_male;
										}else{
										}
							 					$count_all_gender_m = $vac_select
																		->where('gender', '=', '1')
							 											->where('aefi_form_1.status',null)
							 											->get();
									 // dd($count_all_gender_m);
			$count_female = DB::table('aefi_form_1')
										 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 // ->select(DB::raw('COUNT(distinct aefi_form_1.id_case) as count_female'));
										 ->select(DB::raw('COUNT(aefi_form_1.id_case) as count_female'));
											if ($name_of_vaccine != null) {
											 $vac_select = $count_female
												->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
										 }else{
										 }
										 if ($province != null) {
											 $vac_select = $count_female
												->Where('aefi_form_1.province',"=",$province);
										 }else {
										 }
										 if ($province != null && $name_of_vaccine != null) {
											 $vac_select = $count_female
																		 ->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine)
																		 ->Where('aefi_form_1.province',"=",$province);
										 }else {
										 }
										 if ($province == null || $name_of_vaccine == null) {
											 $vac_select = $count_female;
										 }else{
										 }
												 $count_all_gender_f = $vac_select
																		 ->where('gender', '=', '2')
																		 ->where('aefi_form_1.status',null)
																		 ->get();
			$count_gender_other = DB::table('aefi_form_1')
															// ->select(DB::raw('count(*) as count_female'))
															->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
															// ->select(DB::raw('COUNT(distinct aefi_form_1.id_case) as count_other'));
															->select(DB::raw('COUNT(aefi_form_1.id_case) as count_other'));
															 if ($name_of_vaccine != null) {
																$vac_select = $count_gender_other
																			->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
															}else{
															}
															if ($province != null) {
																$vac_select = $count_gender_other
																			->Where('aefi_form_1.province',"=",$province);
															}else {
															}
															if ($province != null && $name_of_vaccine != null) {
																$vac_select = $count_gender_other
																			->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine)
																			->Where('aefi_form_1.province',"=",$province);
															}else {
															}
															if ($province == null || $name_of_vaccine == null) {
																$vac_select = $count_gender_other;
															}else{
															}
													$count_all_gender_other = $vac_select
																			->where('gender', '=', null)
																			->where('aefi_form_1.status',null)
																			->get();
			$listvac_arr =  $this->listvac_arr();
			$count_groupage_se = DB::table('aefi_form_1')
										 ->select(
										  DB::raw('CASE
																WHEN aefi_form_1.age_while_sick_year between 0 and 15 THEN "0-15"
																WHEN aefi_form_1.age_while_sick_year between 16 and 30 THEN "16-30"
																WHEN aefi_form_1.age_while_sick_year between 31 and 45 THEN "31-45"
																WHEN aefi_form_1.age_while_sick_year between 46 and 60 THEN "46-60"
																WHEN aefi_form_1.age_while_sick_year between 61 and 75 THEN "61-75"
																WHEN aefi_form_1.age_while_sick_year >= 76 THEN "มากกว่า76"
																WHEN aefi_form_1.age_while_sick_year = null THEN "ไม่ระบุ"
																END AS age_range ,
																Count(aefi_form_1.id) as countage'))
										 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->whereYear('aefi_form_1.date_entry', '=', "$yearnow");
										 if ($name_of_vaccine != null) {
											$vac_select = $count_groupage_se
														->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
										}else{
										}
										if ($province != null) {
											$vac_select = $count_groupage_se
														->Where('aefi_form_1.province',"=",$province);
										}else {
										}
										if ($province != null && $name_of_vaccine != null) {
											$vac_select = $count_groupage_se
														->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine)
														->Where('aefi_form_1.province',"=",$province);
										}else {
										}
										if ($province == null || $name_of_vaccine == null) {
											$vac_select = $count_groupage_se;
										}else{
										}
								$count_groupage = $vac_select
														->where('aefi_form_1.status','=',null)
														->groupBy('aefi_form_1.group_age')
														->orderBy('aefi_form_1.group_age','ASC')
														->get();
			$count_all_seriousness_of_the_symptoms = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_seriousness_of_the_symptoms'))
										 ->where('province',"=",$province)
										 ->where('status',null)
										 ->get();
			$vac_list=$this->vaclist();

			$count_all_district_by_province_se = DB::table('aefi_form_1')
																						->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 												->select(DB::raw('
																															count(aefi_form_1.id) as CountByDistrice,
										 																					aefi_form_1.district,
																															aefi_form_1.province
																														'));
				if ($name_of_vaccine != null) {
				 $vac_select = $count_all_district_by_province_se
												->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
			 }else{
			 }
			 if ($province != null) {
				 $vac_select = $count_all_district_by_province_se
												->Where('aefi_form_1.province',"=",$province);
			 }else {
			 }
			 if ($province == null && $name_of_vaccine == null) {
				 $count_all_district_by_province = "0000";
				}else{
				}
				$count_all_district_by_province=$vac_select
																			->where('aefi_form_1.status',null)
										 									->groupBy('aefi_form_1.district')
										 									->orderBy('aefi_form_1.district','ASC')
										 									->get();
																			// dd($count_all_district_by_province);

			$count_all_patient_prov_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_patient_prov'));
										 if ($name_of_vaccine != null) {
											$vac_select = $count_all_patient_prov_se
														->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
										}else{
										}
										if ($province != null) {
											$vac_select = $count_all_patient_prov_se
														->Where('aefi_form_1.province',"=",$province);
										}else {
										}
										if ($province == null && $name_of_vaccine == null) {
											$count_all_district_by_province = "0000";
										 }else{
										 }
										 $count_all_patient_prov=$count_all_patient_prov_se
										 ->where('aefi_form_1.status',null)
										 ->get();
			$count_all_patient_by_prov_se = DB::table('aefi_form_1')
											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id_case) as count_patient_prov , aefi_form_1.province'));
										 if ($name_of_vaccine != null) {
											$vac_select = $count_all_patient_by_prov_se
														->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
										}else{
										}
										if ($province != null) {
											$vac_select = $count_all_patient_by_prov_se
														->Where('aefi_form_1.province',"=",$province);
										}else {
										}
										if ($province == null && $name_of_vaccine == null) {
											$count_all_district_by_province = "0000";
										 }else{
										 }
										 $count_patient_by_prov=$count_all_patient_by_prov_se
										 ->where('aefi_form_1.status',null)
										 ->groupBy('aefi_form_1.province')
										 ->orderBy('count_patient_prov','desc')
										 ->get();
		     // dd($count_patient_by_prov);
					 $count_vacname_se = DB::table('aefi_form_1')
					 								->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
													->select(DB::raw('count(aefi_form_1_vac.name_of_vaccine) as vac_count, aefi_form_1_vac.name_of_vaccine'));
													// if ($name_of_vaccine != null) {
													//  $vac_select = $count_all_patient_by_prov_se
													// 			 ->Where('aefi_form_1_vac.name_of_vaccine',"=",$name_of_vaccine);
												 // }else{
												 // }
												 if ($province != null) {
													 $vac_select = $count_vacname_se
																 ->Where('aefi_form_1.province',"=",$province);
												 }else {
												 }
												 if ($province == null && $name_of_vaccine == null) {
													 $count_all_district_by_province = "0000";
													}else{
													}
													$count_vacname=$count_vacname_se
													->where('aefi_form_1_vac.status','=',null)
													->groupBy('aefi_form_1_vac.name_of_vaccine')
													->orderBy('vac_count','DESC')
													->take(5)
													->get();
													// dd($count_vacname);
			$vac_list=$this->vaclist();
			$vac_list=$this->vaclist();
			$listDistrict=$this->listDistrict();
						// dd($count_all_seriousness_of_the_symptoms);
			return view('AEFI.Apps.dashboard',compact(
			 'count_prov',
			 'listProvince',
			 'count_year',
			 'yearnow',
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
			 'name_of_vaccine',
			 'count_all_gender_m',
			 'count_all_gender_f',
			 'count_all_gender_other',
			 // 'countGender',
			 'count_month_jan',
			 'count_month_feb',
			 'count_month_mar',
			 'count_month_apr',
			 'count_month_may',
			 'count_month_jun',
			 'count_month_jul',
			 'count_month_aug',
			 'count_month_sep',
			 'count_month_oct',
			 'count_month_nov',
			 'count_month_dec',
			 'count_all_district_by_province',
			 'listDistrict',
			 'count_all_patient_prov',
			 'count_patient_by_prov'
		 ));
	 	}
		protected function count_prov(){
	    $count_prov = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_prov , province'))

										 ->where('status','=',null)
	                   ->groupBy('province')
										 ->get();
	    return $count_prov;
	  }
// 		protected function count_month(){
// 			$count_year =  $this->count_year()->pluck('year_entry');
// 			$yearnow =  now()->year ;
// 					$count_month = DB::table('aefi_form_1')
// 												 ->select(DB::raw('
// 													YEAR(date_of_symptoms) as all_year_of_symptoms,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=1,`id`,NULL)) AS `1`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=2,`id`,NULL)) AS `2`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=3,`id`,NULL)) AS `3`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=4,`id`,NULL)) AS `4`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=5,`id`,NULL)) AS `5`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=6,`id`,NULL)) AS `6`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=7,`id`,NULL)) AS `7`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=8,`id`,NULL)) AS `8`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=9,`id`,NULL)) AS `9`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=10,`id`,NULL)) AS `10`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=11,`id`,NULL)) AS `11`,
// 													COUNT(IF(MONTH(`date_of_symptoms`)=12,`id`,NULL)) AS `12`'))
// 												 // ->where('province',"=",$province)
// 												 ->where('status','=',null)
// 												 ->whereYear('date_of_symptoms', '=', "$yearnow")
// 												 ->groupBy('all_year_of_symptoms')
// 												 ->orderBy('all_year_of_symptoms')
// 												 ->get();
// 			return $count_month;
// }

		protected function count_year(){
			$count_year = Cache::remember('year', 1020, function() {
										DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_patient , MONTH(date_of_symptoms) as month_entry, YEAR(date_of_symptoms) as year_entry'))
										 ->where('status','=',null)
										 ->groupBy('year_entry')
										 ->orderBy('year_entry')
										 ->get();
										 });
			return $count_year;
		}
		protected function count_north(){
			$count_north = DB::table('aefi_form_1')
										 ->select('id')
										 ->whereYear('date_of_symptoms', '=', now()->year)
										  ->wherein('province',[50,51,52,53,54,55,56,57,58])
										 ->count();
			return $count_north;
		}
		protected function count_northeast(){
			$count_northeast = DB::table('aefi_form_1')
										 ->select('id')
										 ->whereYear('date_of_symptoms', '=', now()->year)
										 ->where('status','=',null)
										 ->wherein('province', [42,	97,	30,	49,	48,	47,	33,	34,35,	36,	37,	39,	40,	41,	31,	43,	44,	45,	46,	32])
										 ->count();
			return $count_northeast;
		}
		protected function count_central(){
			$count_central = DB::table('aefi_form_1')
										 ->select('id')
										 ->whereYear('date_of_symptoms', '=', now()->year)
										 ->where('status','=',null)
										 ->whereIn('province',[	60,	74, 61,	73,	72,	67,	66,	65,	64,	62,	75,	14,	26,	18,	10,	11,	12,	19,	13,	17,	16,	15])
										 ->count();
			return $count_central;
		}
		protected function count_eastern(){
			$count_eastern = DB::table('aefi_form_1')
										 ->select('id')
										 ->whereYear('date_of_symptoms', '=', now()->year)
										 ->where('status','=',null)
										 ->wherein('province',[96,95,94,93,92,91,90,86,84,83,82,81,80,85])
										 ->count();
			return $count_eastern;
		}
		protected function count_western(){
			$count_western = DB::table('aefi_form_1')
										 ->select('id')
										 ->whereYear('date_of_symptoms', '=', now()->year)
										 ->where('status','=',null)
										 ->wherein('province',[96,95,94,93,92,91,90,86,84,83,82,81,80,85])
										 ->count();
			return $count_western;
		}
		protected function count_south(){
			$count_south = DB::table('aefi_form_1')
										 ->select('id')
										 ->whereYear('date_of_symptoms', '=', now()->year)
										 ->where('status','=',null)
										 ->wherein('province', [96,95,94,93,92,91,90,86,84,83,82,81,80,85])
										 ->count();
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
			$arr_vac = DB::table('vac_tbl')->select('VAC_CODE','VAC_INITAILS')->get();
			foreach ($arr_vac as  $value) {
				$arr_vac[$value->VAC_CODE] =trim($value->VAC_INITAILS);
			}
			// dd($province_arr);
			return $arr_vac;
		}
		protected function count_all_seriousness_of_the_symptoms(){
			$count_all_seriousness_of_the_symptoms = Cache::remember('all_seriousness_of_the_symptoms', 1020, function() {
				DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as count_seriousness_of_the_symptoms'))
										 ->where('status',null)
										 ->get()->toArray();
										 });
			return $count_all_seriousness_of_the_symptoms;
		}
		protected function count_all_gender(){
			$count_all_gender = DB::table('aefi_form_1')
										 ->select(DB::raw('count(id) as gender_n ,gender'))
										 ->where('status',null)
										 ->groupBy('gender')
										 ->get();
			return $count_all_gender;
		}
		protected function count_male(){
			$count_male =  Cache::remember('cmale', 1020, function() {
											return DB::table('aefi_form_1')
													 ->select(DB::raw('count(aefi_form_1.id) as count_male'))
													 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
													 ->where('aefi_form_1.gender', '=', '1')
													 ->where('aefi_form_1.status',null)
													 ->get();
													 });
													 // dd($count_male);
			return $count_male;
		}
		protected function count_female(){
			$count_female = Cache::remember('cfemale', 1020, function() {
											return DB::table('aefi_form_1')
										 ->select(DB::raw('count(aefi_form_1.id) as count_female'))
										 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->where('aefi_form_1.gender', '=', '2')
										 ->where('aefi_form_1.status',null)
										 ->get();
										 });
			return $count_female;
		}
		protected function count_gender_other(){
			$count_gender_other =Cache::remember('cgender_other', 1020, function() {
														return DB::table('aefi_form_1')
													 ->select(DB::raw('count(aefi_form_1.id) as count_other'))
													 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
													 ->where('aefi_form_1.gender', null)
													 ->where('aefi_form_1.status',null)
													 ->get();
													 });
										 // dd($count_gender_other);
			return $count_gender_other;
		}
		protected function count_vacname(){
			$count_vacname = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('count(aefi_form_1_vac.name_of_vaccine) as vac_count,name_of_vaccine'))
										 ->where('status','=',null)
										 ->groupBy('name_of_vaccine')
										 ->orderBy('vac_count','DESC')
										 ->take(5)
										 ->get();
			return $count_vacname;
		}
		protected function count_groupage(){
			$count_groupage =Cache::remember('cgroupage', 1020, function() {
														return DB::table('aefi_form_1')
													 ->select(
													  DB::raw('CASE
																			WHEN aefi_form_1.age_while_sick_year between 0 and 15 THEN "0-15"
																			WHEN aefi_form_1.age_while_sick_year between 16 and 30 THEN "16-30"
																			WHEN aefi_form_1.age_while_sick_year between 31 and 45 THEN "31-45"
																			WHEN aefi_form_1.age_while_sick_year between 46 and 60 THEN "46-60"
																			WHEN aefi_form_1.age_while_sick_year between 61 and 75 THEN "61-75"
																			WHEN aefi_form_1.age_while_sick_year >= 76 THEN "มากกว่า76"
																			WHEN aefi_form_1.age_while_sick_year = null THEN "ไม่ระบุ"
																			END AS age_range ,
																			Count(aefi_form_1.id) as countage'))
														->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
													 ->where('aefi_form_1.status','=',null)
													 ->whereYear('aefi_form_1.date_entry', '=', now()->year)
													 ->groupBy('age_range')
													 ->orderBy('age_range','ASC')
													 ->get();
												 });
										 // dd($count_groupage);
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
		// protected function countGender(){
		// $countGender =  DB::table('aefi_form_1')
		// 											->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
		// 											// ->select(DB::raw('COUNT(distinct aefi_form_1.id_case) as count_all'))
		// 											->select(DB::raw('COUNT(aefi_form_1.id_case) as count_all'))
		// 																		 ->where('aefi_form_1.status',null)
		// 																		 ->get();
		//  return $countGender;
		// }
		protected function listDistrict(){
			$district = DB::table('tbl_amphures')->select('amphur_code','amphur_name')->get();
			foreach ($district as  $value) {
				$district_arr[$value->amphur_code] =trim($value->amphur_name);
			}
			// dd($province_arr);
			return $district_arr;
		}
}
