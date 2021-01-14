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
		 // dd($count_month);
			return view('AEFI.Apps.dashboard',compact(
			 'count_prov',
			 'listProvince',
			 'count_month',
			 'yearnow'
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
