<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReferController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}
	public function ReferFrm(Request $req)
	{
		$id_aefi1 = $req->id;
	$id_case = $req->id_case;
	$selectcase=DB::table('aefi_form_1')
	->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
	->select('aefi_form_1.id',
						'aefi_form_1.first_name',
						'aefi_form_1.sur_name',
						'aefi_form_1.gender',
						'aefi_form_1.career',
						'aefi_form_1.hospcode_treat',
						'aefi_form_1.seriousness_of_the_symptoms',
						'aefi_form_1.province_reported',
	DB::raw('GROUP_CONCAT( aefi_form_1_vac.name_of_vaccine ) as "name_of_vaccine",
					 GROUP_CONCAT( aefi_form_1_vac.lot_number ) as "lot_number",
					 GROUP_CONCAT( aefi_form_1_vac.manufacturer  ) as "manufacturer",
					 GROUP_CONCAT( aefi_form_1_vac.dose  ) as "dose",
					 GROUP_CONCAT( aefi_form_1_vac.date_of_vaccination   ) as "date_of_vaccination",
					 GROUP_CONCAT( aefi_form_1_vac.time_of_vaccination   ) as "time_of_vaccination" ')
				 )
				 ->where('aefi_form_1.id_case',"=",$id_case)
				 ->whereNull('aefi_form_1.status')
				 ->groupBy('aefi_form_1.id_case')
				 ->get();
	 // dd($selectcase);
	 $select_refer_data = DB::table('aefi_refer')
	 											->select(
																	'refer_status',
																	'hospcode_refer',
																	'hospcode_save',
																	'other',
																	'record_name',
																	'date_entry'
																	)
												->where('id_aefi1',$id_aefi1)
												->where('id_case',$id_case)
												->orderBy('id', 'desc')
												->first();
	// dd($select_refer_data);
	 $listvac_arr=$this->listvac_arr();
	 $list_hos=$this->list_hos();
	 return view('AEFI.Apps.ReferFrm',compact(
	 	'id_case',
		'selectcase',
		'listvac_arr',
		'list_hos',
		'select_refer_data'
	 	));

	}
	public function InsertRefer(Request $req)
	{
		$id_aefi1 = $req ->input ('id_aefi1');
		$user_username = $req ->input ('user_username');
		$user_hospcode = $req ->input ('user_hospcode');
		$user_provcode = $req ->input ('user_provcode');
		$user_region = $req ->input ('user_region');
		$user_id = $req ->input ('user_id');
		$id_case = $req ->input ('id_case');
		$refer_status = $req ->input ('refer_status');
		$hospcode_refer = $req ->input ('hospcode_refer');
		$record_name = $req ->input('record_name');
		$hospcode_save = $req ->input ('hospcode_save');
		$other = $req ->input ('other');

		$data = array(
			'id_aefi1'=>$id_aefi1,
			'user_username'=>$user_username,
			'user_hospcode'=>$user_hospcode,
			'user_provcode'=>$user_provcode,
			'user_region'=>$user_region,
			'user_id'=>$user_id,
			'id_case'=>$id_case,
			'refer_status'=>$refer_status,
			'hospcode_refer'=>$hospcode_refer,
			'record_name'=>$record_name,
			'hospcode_save'=>$hospcode_save,
			'other'=>$other,
			'date_entry' => date('Y-m-d'),
		);
	// dd($data);
		 $res1	= DB::table('aefi_refer')->insert($data);
	 	if ($res1) {
			$updatedata = DB::table('aefi_form_1')
												->where('id',"=", $id_aefi1)
												->where('id_case',"=",$id_case)
												->update([
													'user_update_refer' => $req ->input ('user_username'),
													'hosp_update_refer' => $req ->input ('user_hospcode'),
													'prov_update_refer' => $req ->input ('user_provcode'),
													'region_update_refer' => $req ->input ('user_region'),
													'refer_status' => $req ->input ('refer_status'),
													'hospcode_refer' => $req ->input ('hospcode_refer'),
													'date_update_refer' => date('Y-m-d')
												]);
	 			$msg = " ส่งข้อมูลสำเร็จ";
	 			$url_rediect = "<script>alert('".$msg."'); window.location='ReferFrm?id=$id_aefi1&id_case=$id_case';</script> ";
	 		}else{
	 			$msg = " ส่งข้อมูลไม่สำเร็จ";
	 			$url_rediect = "<script>alert('".$msg."'); window.location='ReferFrm?id=$id_aefi1&id_case=$id_case';</script> ";
	 					}
	 			echo $url_rediect;
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
}
