<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SymtomsbyDoseController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}
	public function SymtomsbyDoseLst(Request $req)
	{
	$id_case = $req->id_case;
	$selectaeficase= DB::table('aefi_form_1')
												->select(		'aefi_form_1.id',
																		'aefi_form_1.id_case',
																		'aefi_form_1.first_name',
																		'aefi_form_1.sur_name',
																		'aefi_form_1.gender',
																		'aefi_form_1.career',
																		'hospcode_report',
																		'rash',
																		'erythema',
																		'urticaria',
																		'itching',
																		'edema',
																		'angioedema',
																		'fainting',
																		'hyperventilation',
																		'syncope',
																		'headche',
																		'dizziness',
																		'fatigue',
																		'malaise',
																		'dyspepsia',
																		'diarrhea',
																		'nausea',
																		'vomiting',
																		'abdominal_pain',
																		'arthalgia',
																		'myalgia',
																		'fever38c',
																		'swelling_at_the_injection',
																		'swelling_beyond_nearest_joint',
																		'lymphadenopathy',
																		'lymphadenitis',
																		'sterile_abscess',
																		'bacterial_abscess',
																		'febrile_convulsion',
																		'afebrile_convulsion',
																		'encephalopathy',
																		'flaccid_paralysis',
																		'spastic_paralysis',
																		'hhe',
																		'persistent_inconsolable_crying',
																		'thrombocytopenia',
																		'osteomyelitis',
																		'toxic_shock_syndrome',
																		'sepsis',
																		'anaphylaxis',
																		'transverse_myelitis',
																		'gbs',
																		'adem',
																		'acute_myocardial',
																		'ards',
																		'date_entry'
																	)
												->where('id_case','=',$id_case)
												->get();
												// dd($selectaeficase);
	$selectexpertcase= DB::table('expertmeeting')
												->select(	'expert_meet_date',
																	'summary',
																	'r_o',
																	'other_r_o',
																	'final_diag',
																	'other_final_diag',
																	'id_case',
																	'id'
																	)
												->where('id_case','=',$id_case)
												->whereNull('status_expert_frm')
												->get();
												// dd($selectexpertcase);
	$list_hos=$this->list_hos();
	 return view('AEFI.Apps.SymtomsbyDoseLst',compact(
		'id_case',
		'selectexpertcase',
		'selectaeficase',
		'list_hos'
	));

	}
	public function SymtomsbyDoseFrm(Request $req)
	{
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
	 $listvac_arr=$this->listvac_arr();
	 $list_hos=$this->list_hos();
	 return view('AEFI.Apps.SymtomsbyDoseFrm',compact(
	 	'id_case',
		'selectcase',
		'listvac_arr',
		'list_hos'
	 	));

	}
	public function ExpertDiagEditFrm(Request $req)
	{
		$id = $req->id;
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
	$selectexpertcase=DB::table('expertmeeting')
	->select('*')
	->where('id',"=", $id)
	->where('id_case',"=",$id_case)
		->get();
	 // dd($selectcase);
	 $listvac_arr=$this->listvac_arr();
	 $list_hos=$this->list_hos();
	 return view('AEFI.Apps.ExpertDiagEditFrm',compact(
		'id_case',
		'selectcase',
		'listvac_arr',
		'list_hos',
		'selectexpertcase'
		));

	}
	public function InsertExpert(Request $req)
	{
		$id_aefi1 = $req ->input ('id_aefi1');
		$user_username = $req ->input ('user_username');
		$user_hospcode = $req ->input ('user_hospcode');
		$user_provcode = $req ->input ('user_provcode');
		$user_region = $req ->input ('user_region');
		$user_id = $req ->input ('user_id');
		$id_case = $req ->input ('id_case');
		$r_o = $req ->input ('r_o');
		$other_r_o = $req ->input ('other_r_o');
		$respiratory = $req ->input('respiratory');
		$neurological = $req ->input ('neurological');
		$cardiovascular = $req ->input ('cardiovascular');
		$final_diag = $req ->input ('final_diag');
		$other_final_diag = $req ->input ('other_final_diag');
		$causality = $req ->input ('causality');
		$summary = $req ->input ('summary');
		$expert_meet_date = $req ->input ('expert_meet_date');
		$date_report = $req ->input ('date_report');
		$past_history = $req ->input ('past_history');
		$keyin_aefiddc = $req ->input ('keyin_aefiddc');
		$printdata = $req ->input ('printdata');
		$reviewer = $req ->input ('reviewer');
		$date_entry = date('Y-m-d');
		$stno = $req ->input ('stno');
		$gi = $req ->input ('gi');
		$skin = $req ->input ('skin');
		$aefi_classification = $req ->input ('aefi_classification');

		$data = array(
			'id_aefi1'=>$id_aefi1,
			'user_username'=>$user_username,
			'user_hospcode'=>$user_hospcode,
			'user_provcode'=>$user_provcode,
			'user_region'=>$user_region,
			'user_id'=>$user_id,
			'id_case'=>$id_case,
			'r_o'=>$r_o,
			'other_r_o'=>$other_r_o,
			'respiratory'=>$respiratory,
			'neurological'=>$neurological,
			'cardiovascular'=>$cardiovascular,
			'final_diag'=>$final_diag,
			'other_final_diag'=>$other_final_diag,
			'causality'=>$causality,
			'summary'=>$summary,
			'expert_meet_date'=>$expert_meet_date,
			'date_report'=>$date_report,
			'past_history'=>$past_history,
			'keyin_aefiddc'=>$keyin_aefiddc,
			'printdata'=>$printdata,
			'reviewer'=>$reviewer,
			'date_entry'=>$date_entry,
			'skin'=>$skin,
			'gi'=>$gi,
			'stno'=>$stno,
			'aefi_classification'=>$aefi_classification
		);
	// dd($data);
		 $res1	= DB::table('expertmeeting')->insert($data);
	 	if ($res1) {
	 			$msg = " ส่งข้อมูลสำเร็จ";
	 			$url_rediect = "<script>alert('".$msg."'); window.location='ExpertDiagLst?id_case=$id_case';</script> ";
	 		}else{
	 			$msg = " ส่งข้อมูลไม่สำเร็จ";
	 			$url_rediect = "<script>alert('".$msg."'); window.location='ExpertDiagLst?id_case=$id_case';</script> ";
	 					}
	 			echo $url_rediect;
	}
	public function UpdateExpert(Request $req){
		$id = $req->id;
		$id_case = $req->id_case;
		$updatedata = DB::table('expertmeeting')
											->where('id',"=", $id)
											->where('id_case',"=",$id_case)
											->update([
												'id_aefi1' => $req ->input ('id_aefi1'),
												'user_username' => $req ->input ('user_username'),
												'user_hospcode' => $req ->input ('user_hospcode'),
												'user_provcode' => $req ->input ('user_provcode'),
												'user_region' => $req ->input ('user_region'),
												'user_id' => $req ->input ('user_id'),
												'id_case' => $req ->input ('id_case'),
												'r_o' => $req ->input ('r_o'),
												'other_r_o' => $req ->input ('other_r_o'),
												'respiratory' => $req ->input('respiratory'),
												'neurological' => $req ->input ('neurological'),
												'cardiovascular' => $req ->input ('cardiovascular'),
												'final_diag' => $req ->input ('final_diag'),
												'other_final_diag' => $req ->input ('other_final_diag'),
												'causality' => $req ->input ('causality'),
												'summary' => $req ->input ('summary'),
												'expert_meet_date' => $req ->input ('expert_meet_date'),
												'date_report' => $req ->input ('date_report'),
												'past_history' => $req ->input ('past_history'),
												'keyin_aefiddc' => $req ->input ('keyin_aefiddc'),
												'printdata' => $req ->input ('printdata'),
												'reviewer' => $req ->input ('reviewer'),
												'date_entry' => date('Y-m-d'),
												'stno' => $req ->input ('stno'),
												'gi' => $req ->input ('gi'),
												'skin' => $req ->input ('skin'),
												'date_update' => date('Y-m-d'),
												'aefi_classification' => $req ->input ('aefi_classification')
											]);
											if ($updatedata) {
													$msg = " ส่งข้อมูลสำเร็จ";
													$url_rediect = "<script>alert('".$msg."'); window.location='ExpertDiagLst?id_case=$id_case';</script> ";
												}else{
													$msg = " ส่งข้อมูลไม่สำเร็จ";
													$url_rediect = "<script>alert('".$msg."'); window.location='ExpertDiagLst?id_case=$id_case';</script> ";
															}
													echo $url_rediect;
	}
	public function DeleteExpert(Request $req){
		$id = $req->id;
		$id_case = $req->id_case;
		// dd($id_case);
		$deletedata = DB::table('expertmeeting')
											->where('id',"=", $id)
											->where('id_case',"=",$id_case)
											->update(['status_expert_frm' => 1]);
											if ($deletedata) {
													$msg = " ส่งข้อมูลสำเร็จ";
													$url_rediect = "<script>alert('".$msg."'); window.location='ExpertDiagLst?id_case=$id_case';</script> ";
												}else{
													$msg = " ส่งข้อมูลไม่สำเร็จ";
													$url_rediect = "<script>alert('".$msg."'); window.location='ExpertDiagLst?id_case=$id_case';</script> ";
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
