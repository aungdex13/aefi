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
			$count_prov = $this->count_prov();
			$listProvince=$this->listProvince();
			$count_month=$this->count_month();
			$yearnow =  now()->year ;
			$count_north = $this->count_north();
			// dd($count_north)
			$count_northeast = $this->count_northeast();
			$count_central = $this->count_central();
			$count_eastern = $this->count_eastern();
			$count_south = $this->count_south();
			$count_western = $this->count_western();
		  // dd($count_south);
			return view('AEFI.Apps.dashboard',compact(
			 'count_prov',
			 'listProvince',
			 'count_month',
			 'yearnow',
			 'count_north',
			 'count_northeast',
			 'count_central',
			 'count_eastern',
			 'count_south',
			 'count_western'
		 ));
		}
		public function selectdatadash()
		{
		$caselstF1 = DB::select('select id_case,hn,
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
		 return view('AEFI.Apps.caselstAEFI1')->with('data', $caselstF1);

	 	}
		protected function count_prov(){
	    $count_prov = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_prov , province'))
										 ->where('status','=',null)
	                   ->groupBy('province')
										 ->get();
	     // dd($count_prov);
	    return $count_prov;
	  }
		protected function count_month(){
			$yearnow =  now()->year;
			 // dd($yearnow);
			$count_month = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_patient , MONTH(date_entry) as month_entry'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 // ->groupBy('month_entry')
										 ->groupBy('month_entry')
										 ->get();
			  // dd($count_month);
			return $count_month;
		}
		protected function count_north(){
			$yearnow =  now()->year;
			$north = [	51,
									50,
									52,
									53,
									54,
									55,
									56,
									57,
									58,
							];
			 // dd($yearnow);
			$count_north = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_north'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 ->where('province','=',$north)
										 // ->groupBy('month_entry')
										 // ->groupBy('count_south')
										 ->get();
				// dd($count_north);
			return $count_north;
		}
		protected function count_northeast(){
			$yearnow =  now()->year;
			$northeast = [42,
									97,
									30,
									49,
									48,
									47,
									33,
									34,
									35,
									36,
									37,
									39,
									40,
									41,
									31,
									43,
									44,
									45,
									46,
									32,
							];
			 // dd($yearnow);
			$count_northeast = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_northeast'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 ->where('province','=',$northeast)
										 // ->groupBy('month_entry')
										 // ->groupBy('count_south')
										 ->get();
				// dd($count_month);
			return $count_northeast;
		}
		protected function count_central(){
			$yearnow =  now()->year;
			 // dd($yearnow);
			 $central = [	60,
											74,
											61,
											73,
											72,
											67,
											66,
											65,
											64,
											62,
											75,
											14,
											26,
											18,
											10,
											11,
											12,
											19,
											13,
											17,
											16,
											15,
										];
			$count_central = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_central'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 ->whereIn('province',$central)
										 // ->groupBy('month_entry')
										 // ->groupBy('count_south')
										 ->get();
				// dd($count_month);
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
			 // dd($yearnow);
			$count_eastern = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_eastern'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 ->where('province','=',$eastern)
										 // ->groupBy('month_entry')
										 // ->groupBy('count_south')
										 ->get();
				// dd($count_month);
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
			 // dd($yearnow);
			$count_western = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_western'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 ->where('province','=',$western)
										 // ->groupBy('month_entry')
										 // ->groupBy('count_south')
										 ->get();
				// dd($count_month);
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
			   // dd($south->province_code);
			$count_south = DB::table('aefi_form_1')
										 ->select(DB::raw('count(*) as count_south'))
										 ->whereYear('date_entry', '=', "$yearnow")
										 ->where('status','=',null)
										 ->where('province','=',$south)
										 // ->groupBy('month_entry')
										 // ->groupBy('count_south')
										 ->get();

				 // dd($count_south);
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
			// dd($province_arr);
			return $province_arr;
		}
}
