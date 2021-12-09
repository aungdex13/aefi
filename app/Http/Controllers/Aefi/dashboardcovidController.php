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
			$listProvince=$this->listProvince();
			$yearnow =  now()->year ;
			$datenow =  now()->format('d M Y') ;
			$timenow =  now()->format('H:m:s') ;
			// dd($timenow);
			$listvac_arr =  $this->listvac_arr();
			$count_all_sinovac = Cache::remember('count_sinovac', 1020, function() {
				return DB::table('aefi_form_1')
				});
			return view('AEFI.Apps.dashboardcovid',compact(
			 'listProvince',
			 'listvac_arr',
			 'yearnow',
			 'datenow',
			 'timenow'
		 ));
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
			return $arr_vac;
		}
		}
