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
	class InsertController extends Controller
	{
		use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

		public function insertform1(Request $req)
	 	{
	// 		$name_of_vaccine=$req ->input('name_of_vaccine');
 	// 	 $route_of_vaccination =$req ->input('route_of_vaccination');
 	// 	 $vaccine_volume =$req ->input('vaccine_volume');
 	// 	 // var_dump($memberteam);
 	// 	 // exit;
 	// 	 // $date_entry =date('Y-m-d') ;
  // $x=0;
 	// 	 for ($i=0; $i < count($name_of_vaccine); $i++) {
 	// 		 $data_member[]  = [
 	// 								// 'no'=>$team_id[$i],
 	// 							 'name_of_vaccine' => $name_of_vaccine[$i],
 	// 							 'route_of_vaccination' => $route_of_vaccination[$i],
 	// 							 'vaccine_volume' => $vaccine_volume[$i],
 	// 						 ];
 	// 						 $x++;
 	// 					 }
 	//  // $res3 = print_r($data_member);
 	// 	 dd($data_member);
		$id_case = (isset($_POST['id_case'])) ? $_POST['id_case'] : '0';
		$hn = $req ->input ('hn');
		$an = $req ->input ('an');
		$id_number_n = $req ->input ('id_number');
		$id_number = str_replace(' ', '', $id_number_n);
		$title_name = $req ->input ('title_name');
		$first_name = $req ->input ('first_name');
		$sur_name = $req ->input ('sur_name');
		$gender = $req ->input ('gender');
		$birthdate = $req ->input ('birthdate');
		$age_while_sick_year = $req ->input ('age_while_sick_year');
		$group_age = $req ->input ('group_age');
		$nationality = $req ->input ('nationality');
		$other_nationality = $req ->input ('other_nationality');
		$type_of_patient = $req ->input ('type_of_patient');
		$history_of_vaccine_drug_allergies_of_patient = $req ->input ('history_of_vaccine_drug_allergies_of_patient');
		$other_vaccination_history = $req ->input ('other_vaccination_history');
		$other_drug_history = $req ->input ('other_drug_history');
		$patient_develop_symptoms_after_previous_vaccination = $req ->input ('patient_develop_symptoms_after_previous_vaccination');
		$other_patient_develop_symptoms_after_previous_vaccination = $req ->input ('other_patient_develop_symptoms_after_previous_vaccination');
		$underlying_disease = $req ->input ('underlying_disease');
		$other_underlying_disease = $req ->input ('other_underlying_disease');
		$history_of_drug_use_within_1_month_before_getting_vaccination = $req ->input ('history_of_drug_use_within_1_month_before_getting_vaccination');
		$other_history_of_drug_use_within_1_month_vaccination = $req ->input ('other_history_of_drug_use_within_1_month_vaccination');
		$other_medical_history = $req ->input ('other_medical_history');
		$house_number = $req ->input ('house_number');
		$village_no = $req ->input ('village_no');
		$province = $req ->input ('province');
		$district = $req ->input ('district');
		$subdistrict = $req ->input ('subdistrict');
		$phone_number_n = $req ->input ('phone_number');
		$phone_number = str_replace('-', '', $phone_number_n);
		$parent_name = $req ->input ('parent_name');
		$parent_sur_name = $req ->input ('parent_sur_name');
		$parent_phone_number = str_replace('-', '', $req ->input ('parent_phone_number'));
		$date_dead = $req ->input ('date_dead');
		$rash = $req ->input('rash');
		$erythema = $req ->input ('erythema');
		$urticaria = $req ->input ('urticaria');
		$itching = $req ->input ('itching');
		$edema = $req ->input ('edema');
		$angioedema = $req ->input ('angioedema');
		$fainting = $req ->input ('fainting');
		$hyperventilation = $req ->input ('hyperventilation');
		$syncope = $req ->input ('syncope');
		$headche = $req ->input ('headche');
		$dizziness = $req ->input ('dizziness');
		$fatigue = $req ->input ('fatigue');
		$malaise = $req ->input ('malaise');
		$dyspepsia = $req ->input ('dyspepsia');
		$diarrhea = $req ->input ('diarrhea');
		$nausea = $req ->input ('nausea');
		$vomiting = $req ->input ('vomiting');
		$abdominal_pain = $req ->input ('abdominal_pain');
		$arthalgia = $req ->input ('arthalgia');
		$myalgia = $req ->input ('myalgia');
		$fever38c = $req ->input ('fever38c');
		$swelling_at_the_injection = $req ->input ('swelling_at_the_injection');
		$swelling_beyond_nearest_joint = $req ->input ('swelling_beyond_nearest_joint');
		$lymphadenopathy = $req ->input ('lymphadenopathy');
		$lymphadenitis = $req ->input ('lymphadenitis');
		$sterile_abscess = $req ->input ('sterile_abscess');
		$bacterial_abscess = $req ->input ('bacterial_abscess');
		$febrile_convulsion = $req ->input ('febrile_convulsion');
		$afebrile_convulsion = $req ->input ('afebrile_convulsion');
		$encephalopathy = $req ->input ('encephalopathy');
		$flaccid_paralysis = $req ->input ('flaccid_paralysis');
		$spastic_paralysis = $req ->input ('spastic_paralysis');
		$hhe = $req ->input ('hhe');
		$persistent_inconsolable_crying = $req ->input ('persistent_inconsolable_crying');
		$thrombocytopenia = $req ->input ('thrombocytopenia');
		$osteomyelitis = $req ->input ('osteomyelitis');
		$toxic_shock_syndrome = $req ->input ('toxic_shock_syndrome');
		$sepsis = $req ->input ('sepsis');
		$anaphylaxis = $req ->input ('anaphylaxis');
		$other = $req ->input ('other');
		$date_of_symptoms = $req ->input ('date_of_symptoms');
		$time_of_symptoms = $req ->input ('time_of_symptoms');
		$date_of_treatment = $req ->input ('date_of_treatment');
		$time_of_treatment = $req ->input ('time_of_treatment');
		$symptoms_details = $req ->input ('symptoms_details');
		$text_other_seriousness_symptoms = $req ->input ('text_other_seriousness_symptoms');
		$symptoms_later_immunized = $req ->input ('symptoms_later_immunized');
		$other_symptoms_later_immunized = $req ->input ('other_symptoms_later_immunized');
		$diagnosis = $req ->input ('diagnosis');
		$seriousness_of_the_symptoms = $req ->input ('seriousness_of_the_symptoms');
		$other_seriousness_of_the_symptoms = $req ->input ('other_seriousness_of_the_symptoms');
		$patient_status = $req ->input ('patient_status');
		$funeral = $req ->input ('funeral');
		$other_address_funeral = $req ->input ('other_address_funeral');
		$necessary_to_investigate = $req ->input ('necessary_to_investigate');
		$necessary_to_investigate_date = $req ->input ('necessary_to_investigate_date');
		$symptom_name = $req ->input ('symptom_name');
		$symptom_position = $req ->input ('symptom_position');
		$other_symptom_position = $req ->input ('other_symptom_position');
		$reporter_name = $req ->input ('reporter_name');
		$reporter_position = $req ->input ('reporter_position');
		$other_reporter_position = $req ->input ('other_reporter_position');
		$date_found_event = $req ->input ('date_found_event');
		$event_location = $req ->input ('event_location');
		$province_found_event = $req ->input ('province_found_event');
		$unit_reported = $req ->input ('unit_reported');
		$province_reported = $req ->input ('province_reported');
		$tel_reported = str_replace('-', '', $req ->input ('tel_reported'));
		$email_reported = $req ->input ('email_reported');
		$datepicker_send_reported = $req ->input ('datepicker_send_reported');
		$datepicker_resiver = $req ->input ('datepicker_resiver');
		$more_reviews = $req ->input ('more_reviews');
		$assessment1 = $req ->input ('assessment1');
		$assessment2 = $req ->input ('assessment2');
		$assessment3 = $req ->input ('assessment3');
		$assessment4 = $req ->input ('assessment4');
		$assessment5 = $req ->input ('assessment5');
		$assessment6 = $req ->input ('assessment6');
		$assessment7 = $req ->input ('assessment7');
		$assessment8 = $req ->input ('assessment8');
		$assessment9 = $req ->input ('assessment9');
		$assessment10 = $req ->input ('assessment10');
		$date_entry = date('Y-m-d') ;
		$transverse_myelitis = $req ->input ('transverse_myelitis');
		$adem = $req ->input ('adem');
		$acute_myocardial = $req ->input ('acute_myocardial');
		$ards = $req ->input ('ards');
		$data = array(
			'id_case'=>$id_case,
			'hn'=>$hn,
			'an'=>$an,
			'id_number'=>$id_number,
			'title_name'=>$title_name,
			'first_name'=>$first_name,
			'sur_name'=>$sur_name,
			'gender'=>$gender,
			'birthdate'=>$birthdate,
			'age_while_sick_year'=>	$age_while_sick_year,
			'group_age'=>$group_age,
			'nationality'=>$nationality,
			'other_nationality'=>$other_nationality,
			'type_of_patient'=>$type_of_patient,
			'history_of_vaccine_drug_allergies_of_patient'=>$history_of_vaccine_drug_allergies_of_patient,
			'other_vaccination_history'=>$other_vaccination_history,
			'patient_develop_symptoms_after_previous_vaccination'=>$patient_develop_symptoms_after_previous_vaccination,
			'other_patient_develop_symptoms_after_previous_vaccination'=>$other_patient_develop_symptoms_after_previous_vaccination,
			'underlying_disease'=>$underlying_disease,
			'other_underlying_disease'=>$other_underlying_disease,
			'history_of_drug_use_within_1_month_before_getting_vaccination'=>$history_of_drug_use_within_1_month_before_getting_vaccination,
			'other_history_of_drug_use_within_1_month_vaccination'=>$other_history_of_drug_use_within_1_month_vaccination,
			'other_medical_history'=>$other_medical_history,
			'house_number'=>$house_number,
			'village_no'=>$village_no,
			'province'=>$province,
			'district'=>$district,
			'subdistrict'=>$subdistrict,
			'phone_number'=>$phone_number,
			'parent_name'=>$parent_name,
			'parent_sur_name'=>$parent_sur_name,
			'parent_phone_number'=>$parent_phone_number,
			'date_dead'=>$date_dead,
			'text_other_seriousness_symptoms'=>$text_other_seriousness_symptoms,
			'rash'=>(isset($rash)) ? $rash  : '0',
			'erythema'=>(isset($erythema)) ? $erythema  : '0',
			'urticaria'=>(isset($urticaria)) ? $urticaria  : '0',
			'itching'=>(isset($itching)) ? $itching  : '0',
			'edema'=>(isset($edema)) ? $edema  : '0',
			'angioedema'=>(isset($angioedema)) ? $angioedema  : '0',
			'fainting'=>(isset($fainting)) ? $fainting  : '0',
			'hyperventilation'=>(isset($hyperventilation)) ? $hyperventilation  : '0',
			'syncope'=>(isset($syncope)) ? $syncope  : '0',
			'headche'=>(isset($headche)) ? $headche  : '0',
			'dizziness'=>(isset($dizziness)) ? $dizziness  : '0',
			'fatigue'=>(isset($fatigue)) ? $fatigue  : '0',
			'malaise'=>(isset($malaise)) ? $malaise  : '0',
			'dyspepsia'=>(isset($dyspepsia)) ? $dyspepsia  : '0',
			'diarrhea'=>(isset($diarrhea)) ? $diarrhea  : '0',
			'nausea'=>(isset($nausea)) ? $nausea  : '0',
			'vomiting'=>(isset($vomiting)) ? $vomiting  : '0',
			'abdominal_pain'=>(isset($abdominal_pain)) ? $abdominal_pain  : '0',
			'arthalgia'=>(isset($arthalgia)) ? $arthalgia  : '0',
			'myalgia'=>(isset($myalgia)) ? $myalgia  : '0',
			'fever38c'=>(isset($fever38c)) ? $fever38c  : '0',
			'swelling_at_the_injection'=>(isset($swelling_at_the_injection)) ? $swelling_at_the_injection  : '0',
			'swelling_beyond_nearest_joint'=>(isset($swelling_beyond_nearest_joint)) ? $swelling_beyond_nearest_joint  : '0',
			'lymphadenopathy'=>(isset($lymphadenopathy)) ? $lymphadenopathy  : '0',
			'lymphadenitis'=>(isset($lymphadenitis)) ? $lymphadenitis  : '0',
			'sterile_abscess'=>(isset($sterile_abscess)) ? $sterile_abscess  : '0',
			'bacterial_abscess'=>(isset($bacterial_abscess)) ? $bacterial_abscess  : '0',
			'febrile_convulsion'=>(isset($febrile_convulsion)) ? $febrile_convulsion  : '0',
			'afebrile_convulsion'=>(isset($afebrile_convulsion)) ? $afebrile_convulsion  : '0',
			'encephalopathy'=>(isset($encephalopathy)) ? $encephalopathy  : '0',
			'flaccid_paralysis'=>(isset($flaccid_paralysis)) ? $flaccid_paralysis  : '0',
			'spastic_paralysis'=>(isset($spastic_paralysis)) ? $spastic_paralysis  : '0',
			'hhe'=>(isset($hhe)) ? $hhe  : '0',
			'persistent_inconsolable_crying'=>(isset($persistent_inconsolable_crying)) ? $persistent_inconsolable_crying  : '0',
			'thrombocytopenia'=>(isset($thrombocytopenia)) ? $thrombocytopenia  : '0',
			'osteomyelitis'=>(isset($osteomyelitis)) ? $osteomyelitis  : '0',
			'toxic_shock_syndrome'=>(isset($toxic_shock_syndrome)) ? $toxic_shock_syndrome  : '0',
			'sepsis'=>(isset($sepsis)) ? $sepsis  : '0',
			'anaphylaxis'=>(isset($anaphylaxis)) ? $anaphylaxis  : '0',
			'other'=>(isset($other)) ? $other  : '0',
			'date_of_symptoms'=>$date_of_symptoms,
			'time_of_symptoms'=>$time_of_symptoms,
			'date_of_treatment'=>$date_of_treatment,
			'time_of_treatment'=>$time_of_treatment,
			'symptoms_details'=>$symptoms_details,
			'symptoms_later_immunized'=>$symptoms_later_immunized,
			'other_symptoms_later_immunized'=>$other_symptoms_later_immunized,
			'diagnosis'=>$diagnosis,
			'seriousness_of_the_symptoms'=>$seriousness_of_the_symptoms,
			'other_seriousness_of_the_symptoms'=>$other_seriousness_of_the_symptoms,
			'patient_status'=>$patient_status,
			'funeral'=>$funeral,
			'other_address_funeral'=>$other_address_funeral,
			'necessary_to_investigate'=>$necessary_to_investigate,
			'necessary_to_investigate_date'=>$necessary_to_investigate_date,
			'symptom_name'=>$symptom_name,
			'symptom_position'=>$symptom_position,
			'other_symptom_position'=>$other_symptom_position,
			'reporter_name'=>$reporter_name,
			'reporter_position'=>$reporter_position,
			'other_reporter_position'=>$other_reporter_position,
			'date_found_event'=>$date_found_event,
			'event_location'=>$event_location,
			'province_found_event'=>$province_found_event,
			'unit_reported'=>$unit_reported,
			'province_reported'=>$province_reported,
			'tel_reported'=>$tel_reported,
			'email_reported'=>$email_reported,
			'datepicker_send_reported'=>$datepicker_send_reported,
			'datepicker_resiver'=>$datepicker_resiver,
			'more_reviews'=>$more_reviews,
			'assessment1'=>$assessment1,
			'assessment2'=>$assessment2,
			'assessment3'=>$assessment3,
			'assessment4'=>$assessment4,
			'assessment5'=>$assessment5,
			'assessment6'=>$assessment6,
			'assessment7'=>$assessment7,
			'assessment8'=>$assessment8,
			'assessment9'=>$assessment9,
			'assessment10'=>$assessment10,
			'transverse_myelitis' => $transverse_myelitis,
			'adem' => $adem,
			'acute_myocardial' => $acute_myocardial,
			'ards' => $ards,
			'date_entry'=>$date_entry
		);
	// echo($data);
	  $res1	= DB::table('aefi_form_1')->insert($data);
	 // dd($data);
if ($res1) {
		$name_of_vaccine = $req ->input('name_of_vaccine');
		$vaccine_volume = $req ->input('vaccine_volume');
		$route_of_vaccination = $req ->input('route_of_vaccination');
		$vaccination_site = $req ->input('vaccination_site');
		$dose = $req ->input('dose');
		$date_of_vaccination = $req ->input('date_of_vaccination');
		$time_of_vaccination = $req ->input('time_of_vaccination');
		$manufacturer =$req ->input('manufacturer');
		$lot_number = $req ->input('lot_number');
		$expiry_date = $req ->input('expiry_date');
		// $name_of_diluent = $req ->input('name_of_diluent');
		$lot_number_diluent = $req ->input('lot_number_diluent');
		$expiry_date_diluent = $req ->input('expiry_date_diluent');
		// $date_of_reconstitution = $req ->input('date_of_reconstitution');
		// $time_of_reconstitution = $req ->input('time_of_reconstitution');
$x=0;
	 for ($i=0; $i < count($name_of_vaccine); $i++) {
		 $data_vac[]  = [
		'id_case'=>$id_case,
		'hn'=>$hn,
		'name_of_vaccine'=>$name_of_vaccine[$i],
		'vaccine_volume'=>$vaccine_volume[$i],
		'route_of_vaccination'=>$route_of_vaccination[$i],
		'vaccination_site'=>$vaccination_site[$i],
		'dose'=>$dose[$i],
		'date_of_vaccination'=>$date_of_vaccination[$i],
		'time_of_vaccination'=>$time_of_vaccination[$i],
		'manufacturer'=>$manufacturer[$i],
		'lot_number'=>$lot_number[$i],
		'expiry_date'=>$expiry_date[$i],
		// 'name_of_diluent'=>$name_of_diluent[$i],
		'lot_number_diluent'=>$lot_number_diluent[$i],
		'expiry_date_diluent'=>$expiry_date_diluent[$i],
		// 'date_of_reconstitution'=>$date_of_reconstitution[$i],
		// 'time_of_reconstitution'=>$time_of_reconstitution[$i],
		'date_entry'=>$date_entry
		];
		$x++;
		}
		 // dd($data_vac);
		$res2= DB::table('aefi_form_1_vac')->insert($data_vac);
}
											if ($res2) {
												$msg = " ส่งข้อมูลสำเร็จ";
												$url_rediect = "<script>alert('".$msg."'); window.location='lstf1';</script> ";
											}else{
												$msg = " ส่งข้อมูลไม่สำเร็จ";
												$url_rediect = "<script>alert('".$msg."'); window.location='form1';</script> ";
														}
												echo $url_rediect;

}
public function insertform2(Request $req2)
{
	//dd($_FILES['other_instruction_1']);
	 // $other_instruction_1 = $_FILES['other_instruction_1']['name'];
	// dd($other_instruction_1);
     // $this->validate($req2, [
     //  'other_instruction_1'  => 'required|image|mimes:jpg,png,gif|max:2048'
     // ]);

if (!empty($req2->file('other_instruction_1'))) {
	$image=$req2->file('other_instruction_1');
	$other_instruction_1 = date('Ymd').'_'.rand() . '.' . $image->getClientOriginalExtension();
	 //dd($other_instruction_1);
	$image->move(public_path('images'), $other_instruction_1);
}else {
	$other_instruction_1="null";
	 //dd($other_instruction_1);
}

// dd($new_name);


// dd($image);
     // return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
$id_case = $req2->input ('id_case');
$prior_to_immunization_1 = $req2->input ('prior_to_immunization_1');
$other_prior_to_immunization_1 = $req2->input ('other_prior_to_immunization_1');
$prior_to_immunization_2 = $req2->input ('prior_to_immunization_2');
$other_prior_to_immunization_2 = $req2->input ('other_prior_to_immunization_2');
$prior_to_immunization_3 = $req2->input ('prior_to_immunization_3');
$other_prior_to_immunization_3 = $req2->input ('other_prior_to_immunization_3');
$prior_to_immunization_4 = $req2->input ('prior_to_immunization_4');
$other_prior_to_immunization_4 = $req2->input ('other_prior_to_immunization_4');
$prior_to_immunization_5 = $req2->input ('prior_to_immunization_5');
$other_prior_to_immunization_5 = $req2->input ('other_prior_to_immunization_5');
$prior_to_immunization_6 = $req2->input ('prior_to_immunization_6');
$other_prior_to_immunization_6 = $req2->input ('other_prior_to_immunization_6');
$prior_to_immunization_7 = $req2->input ('prior_to_immunization_7');
$other_prior_to_immunization_7 = $req2->input ('other_prior_to_immunization_7');
$prior_to_immunization_8 = $req2->input ('prior_to_immunization_8');
$other_prior_to_immunization_8 = $req2->input ('other_prior_to_immunization_8');
$for_adult_woman_1 = $req2->input ('for_adult_woman_1');
$other_for_adult_woman_1 = $req2->input ('other_for_adult_woman_1');
$for_adult_woman_2 = $req2->input ('for_adult_woman_2');
$for_infants_less_than_1_year_1 = $req2->input ('for_infants_less_than_1_year_1');
$other_for_infants_less_than_1_year_1 = $req2->input ('other_for_infants_less_than_1_year_1');
$for_infants_less_than_1_year_2 = $req2->input ('for_infants_less_than_1_year_2');
$other_for_infants_less_than_1_year_2 = $req2->input ('other_for_infants_less_than_1_year_2');
$source = $req2->input ('source');
$other_source = $req2->input ('other_source');
$source_1_2 = $req2->input ('source_1_2');
$symptoms_2 = $req2->input ('symptoms_2');
$symptoms_2_1 = $req2->input ('symptoms_2_1');
$symptoms_2_2 = $req2->input ('symptoms_2_2');
$symptoms_2_3 = $req2->input ('symptoms_2_3');
$symptoms_2_4 = $req2->input ('symptoms_2_4');
$symptoms_2_5 = $req2->input ('symptoms_2_5');
$treatment_place = $req2->input ('treatment_place');
$doctor_name = $req2->input ('doctor_name');
$status_on_date_inv_1 = $req2->input ('status_on_date_inv_1');
$other_status_on_date_inv_1 = $req2->input ('other_status_on_date_inv_1');
$status_on_date_inv_1_2 = $req2->input ('status_on_date_inv_1_2');
$other_status_on_date_inv_1_21 = $req2->input ('other_status_on_date_inv_1_21');
$other_status_on_date_inv_1_22 = $req2->input ('other_status_on_date_inv_1_22');
$other_status_on_date_inv_1_23 = $req2->input ('other_status_on_date_inv_1_23');
$instruction_1 = $req2->input ('instruction_1');
$other_instruction_1 = $other_instruction_1;
$record1 = $req2->input ('record1');
$record2 = $req2->input ('record2');
$record3 = $req2->input ('record3');
$record4 = $req2->input ('record4');
$record5 = $req2->input ('record5');
$itching = $req2->input ('itching');
$patient_immunized_1 = $req2->input ('patient_immunized_1');
$patient_immunized_2 = $req2->input ('patient_immunized_2');
$other_patient_immunized_2 = $req2->input ('other_patient_immunized_2');
$patient_immunized_3 = $req2->input ('patient_immunized_3');
$other_patient_immunized_3 = $req2->input ('other_patient_immunized_3');
$patient_immunized_4 = $req2->input ('patient_immunized_4');
$other_patient_immunized_4 = $req2->input ('other_patient_immunized_4');
$patient_immunized_5 = $req2->input ('patient_immunized_5');
$other_patient_immunized_5 = $req2->input ('other_patient_immunized_5');
$patient_immunized_6 = $req2->input ('patient_immunized_6');
$other_patient_immunized_6 = $req2->input ('other_patient_immunized_6');
$patient_immunized_7 = $req2->input ('patient_immunized_7');
$other_patient_immunized_7 = $req2->input ('other_patient_immunized_7');
$patient_immunized_8 = $req2->input ('patient_immunized_8');
$patient_immunized_8_1 = $req2->input ('patient_immunized_8_1');
$patient_immunized_9 = $req2->input ('patient_immunized_9');
$patient_immunized_9_1 = $req2->input ('patient_immunized_9_1');
$patient_immunized_10 = $req2->input ('patient_immunized_10');
$patient_immunized_10_1 = $req2->input ('patient_immunized_10_1');
$patient_immunized_10_2 = $req2->input ('patient_immunized_10_2');
$patient_immunized_11 = $req2->input ('patient_immunized_11');
$other_patient_immunized_11 = $req2->input ('other_patient_immunized_11');
$patient_immunized_12 = $req2->input ('patient_immunized_12');
$other_patient_immunized_12 = $req2->input ('other_patient_immunized_12');
$patient_immunized_13 = $req2->input ('patient_immunized_13');
$immunization_practices_1 = $req2->input ('immunization_practices_1');
$immunization_practices_1_1 = $req2->input ('immunization_practices_1_1');
$other_immunization_practices_1_1 = $req2->input ('other_immunization_practices_1_1');
$immunization_practices_1_4 = $req2->input ('immunization_practices_1_4');
$reconstitution_1 = $req2->input ('reconstitution_1');
$reconstitution_2 = $req2->input ('reconstitution_2');
$reconstitution_3 = $req2->input ('reconstitution_3');
$reconstitution_4 = $req2->input ('reconstitution_4');
$reconstitution_5 = $req2->input ('reconstitution_5');
$vaccine_storage_1 = $req2->input ('vaccine_storage_1');
$vaccine_storage_1_1 = $req2->input ('vaccine_storage_1_1');
$vaccine_storage_1_2 = $req2->input ('vaccine_storage_1_2');
$vaccine_storage_1_3 = $req2->input ('vaccine_storage_1_3');
$vaccine_storage_2= $req2->input ('vaccine_storage_2');
$vaccine_storage_3 = $req2->input ('vaccine_storage_3');
$vaccine_storage_4 = $req2->input ('vaccine_storage_4');
$vaccine_storage_5 = $req2->input ('vaccine_storage_5');
$vaccine_storage_6 = $req2->input ('vaccine_storage_6');
$vaccine_storage_7 = $req2->input ('vaccine_storage_7');
$vaccine_transportation_1 = $req2->input ('vaccine_transportation_1');
$vaccine_transportation_1_1 = $req2->input ('vaccine_transportation_1_1');
$vaccine_transportation_2 = $req2->input ('vaccine_transportation_2');
$vaccine_transportation_3 = $req2->input ('vaccine_transportation_3');
$vaccine_transportation_4 = $req2->input ('vaccine_transportation_4');
$community_inv_1 = $req2->input ('community_inv_1');
$community_inv_1_1 = $req2->input ('community_inv_1_1');
$community_inv_1_2 = $req2->input ('community_inv_1_2');
$community_inv_1_3 = $req2->input ('community_inv_1_3');
$community_inv_1_4 = $req2->input ('community_inv_1_4');
$community_inv_1_5 = $req2->input ('community_inv_1_5');
$no_ad_syringes = $req2->input ('no_ad_syringes');
$other_no_ad_syringes = $req2->input ('other_no_ad_syringes');
$events = $req2->input ('events');
$investigater_2 = $req2->input ('investigater_2');
$investigater_3 = $req2->input ('investigater_3');
$investigater_4 = $req2->input ('investigater_4');
$investigater_5 = $req2->input ('investigater_5');
$investigater_5_2 = $req2->input ('investigater_5_2');
$investigater_5_3 = $req2->input ('investigater_5_3');
$investigater_8 = $req2->input ('investigater_8');
$investigater_9 = $req2->input ('investigater_9');
$investigater_10 = $req2->input ('investigater_10');
$status = "1";
$date_entry = date('Y-m-d') ;


// dd($req2);
$data2 = array(
	'id_case'=>$id_case,
	'prior_to_immunization_1'=>$prior_to_immunization_1,
	'other_prior_to_immunization_1'=>$other_prior_to_immunization_1,
	'prior_to_immunization_2'=>$prior_to_immunization_2,
	'other_prior_to_immunization_2'=>$other_prior_to_immunization_2,
	'prior_to_immunization_3'=>$prior_to_immunization_3,
	'other_prior_to_immunization_3'=>$other_prior_to_immunization_3,
	'prior_to_immunization_4'=>$prior_to_immunization_4,
	'other_prior_to_immunization_4'=>$other_prior_to_immunization_4,
	'prior_to_immunization_5'=>$prior_to_immunization_5,
	'other_prior_to_immunization_5'=>$other_prior_to_immunization_5,
	'prior_to_immunization_6'=>$prior_to_immunization_6,
	'other_prior_to_immunization_6'=>$other_prior_to_immunization_6,
	'prior_to_immunization_7'=>$prior_to_immunization_7,
	'other_prior_to_immunization_7'=>$other_prior_to_immunization_7,
	'prior_to_immunization_8'=>$prior_to_immunization_8,
	'other_prior_to_immunization_8'=>$other_prior_to_immunization_8,
	'for_adult_woman_1'=>$for_adult_woman_1,
	'other_for_adult_woman_1'=>$other_for_adult_woman_1,
	'for_adult_woman_2'=>$for_adult_woman_2,
	'for_infants_less_than_1_year_1'=>$for_infants_less_than_1_year_1,
	'other_for_infants_less_than_1_year_1'=>$other_for_infants_less_than_1_year_1,
	'for_infants_less_than_1_year_2'=>$for_infants_less_than_1_year_2,
	'other_for_infants_less_than_1_year_2'=>$other_for_infants_less_than_1_year_2,
	'source'=>$source,
	'other_source'=>$other_source,
	'source_1_2'=>$source_1_2,
	'symptoms_2'=>$symptoms_2,
	'symptoms_2_1'=>$symptoms_2_1,
	'symptoms_2_2'=>$symptoms_2_2,
	'symptoms_2_3'=>$symptoms_2_3,
	'symptoms_2_4'=>$symptoms_2_4,
	'symptoms_2_5'=>$symptoms_2_5,
	'treatment_place'=>$treatment_place,
	'doctor_name'=>$doctor_name,
	'status_on_date_inv_1'=>$status_on_date_inv_1,
	'other_status_on_date_inv_1'=>$other_status_on_date_inv_1,
	'status_on_date_inv_1_2'=>$status_on_date_inv_1_2,
	'other_status_on_date_inv_1_21'=>$other_status_on_date_inv_1_21,
	'other_status_on_date_inv_1_22'=>$other_status_on_date_inv_1_22,
	'other_status_on_date_inv_1_23'=>$other_status_on_date_inv_1_23,
	'instruction_1'=>$instruction_1,
	'other_instruction_1'=>$other_instruction_1,
	'record1'=>$record1,
	'record2'=>$record2,
	'record3'=>$record3,
	'record4'=>$record4,
	'record5'=>$record5,
	'patient_immunized_1'=>$patient_immunized_1,
	'patient_immunized_2'=>$patient_immunized_2,
	'other_patient_immunized_2'=>$other_patient_immunized_2,
	'patient_immunized_3'=>$patient_immunized_3,
	'other_patient_immunized_3'=>$other_patient_immunized_3,
	'patient_immunized_4'=>$patient_immunized_4,
	'other_patient_immunized_4'=>$other_patient_immunized_4,
	'patient_immunized_5'=>$patient_immunized_5,
	'other_patient_immunized_5'=>$other_patient_immunized_5,
	'patient_immunized_6'=>$patient_immunized_6,
	'other_patient_immunized_6'=>$other_patient_immunized_6,
	'patient_immunized_7'=>$patient_immunized_7,
	'other_patient_immunized_7'=>$other_patient_immunized_7,
	'patient_immunized_8'=>$patient_immunized_8,
	'patient_immunized_8_1'=>$patient_immunized_8_1,
	'patient_immunized_9'=>$patient_immunized_9,
	'patient_immunized_9_1'=>$patient_immunized_9_1,
	'patient_immunized_10'=>$patient_immunized_10,
	'patient_immunized_10_1'=>$patient_immunized_10_1,
	'patient_immunized_10_2'=>$patient_immunized_10_2,
	'patient_immunized_11'=>$patient_immunized_11,
	'other_patient_immunized_11'=>$other_patient_immunized_11,
	'patient_immunized_12'=>$patient_immunized_12,
	'other_patient_immunized_12'=>$other_patient_immunized_12,
	'patient_immunized_13'=>$patient_immunized_13,
	'immunization_practices_1'=>$immunization_practices_1,
	'immunization_practices_1_1'=>$immunization_practices_1_1,
	'other_immunization_practices_1_1'=>$other_immunization_practices_1_1,
	'immunization_practices_1_4'=>$immunization_practices_1_4,
	'reconstitution_1'=>$reconstitution_1,
	'reconstitution_2'=>$reconstitution_2,
	'reconstitution_3'=>$reconstitution_3,
	'reconstitution_4'=>$reconstitution_4,
	'reconstitution_5'=>$reconstitution_5,
	'vaccine_storage_1'=>$vaccine_storage_1,
	'vaccine_storage_1_1'=>$vaccine_storage_1_1,
	'vaccine_storage_1_2'=>$vaccine_storage_1_2,
	'vaccine_storage_1_3'=>$vaccine_storage_1_3,
	'vaccine_storage_2'=>$vaccine_storage_2,
	'vaccine_storage_3'=>$vaccine_storage_3,
	'vaccine_storage_4'=>$vaccine_storage_4,
	'vaccine_storage_5'=>$vaccine_storage_5,
	'vaccine_storage_6'=>$vaccine_storage_6,
	'vaccine_storage_7'=>$vaccine_storage_7,
	'vaccine_transportation_1'=>$vaccine_transportation_1,
	'vaccine_transportation_1_1'=>$vaccine_transportation_1_1,
	'vaccine_transportation_2'=>$vaccine_transportation_2,
	'vaccine_transportation_3'=>$vaccine_transportation_3,
	'vaccine_transportation_4'=>$vaccine_transportation_4,
	'community_inv_1'=>$community_inv_1,
	'community_inv_1_1'=>$community_inv_1_1,
	'community_inv_1_2'=>$community_inv_1_2,
	'community_inv_1_3'=>$community_inv_1_3,
	'community_inv_1_4'=>$community_inv_1_4,
	'community_inv_1_5'=>$community_inv_1_5,
	'no_ad_syringes'=>$no_ad_syringes,
	'other_no_ad_syringes'=>$other_no_ad_syringes,
	'events'=>$events ,
	 'investigater_2'=>$investigater_2,
	 'investigater_3'=>$investigater_3,
	 'investigater_4'=>$investigater_4,
	 'investigater_5'=>$investigater_5,
	 'investigater_5_2'=>$investigater_5_2,
	 'investigater_5_3'=>$investigater_5_3,
	 'investigater_8'=>$investigater_8,
	 'investigater_9'=>$investigater_9,
	 'investigater_10'=>$investigater_10,
	 'status'=>$status,
	 'date_entry'=>$date_entry


);
   //dd($data2);
   $res2	= DB::table('aefi_form_2')->insert($data2);

//dd($res1);
if ($res2)
 {

	$name_vac = $req2 ->input ('name_vac');
	$recive_amount = $req2 ->input ('recive_amount');
for ($i = 0; $i < count(array_filter($name_vac)); $i++) {
	$data_vac2= array(
		'id_case'=>$id_case,
		'name_vac'=>$name_vac[$i],
		'recive_amount'=>$recive_amount[$i],
		'date_entry'=>$date_entry,
	);
		DB::table('aefi_form_2_vac')->insert($data_vac2);
	}
}
if ($res2)
 {

	$investigater_1 = $req2 ->input ('investigater_1');
	$investigater_1_2 = $req2 ->input ('investigater_1_2');
	$investigater_1_3 = $req2 ->input ('investigater_1_3');
	$investigater_1_4 = $req2 ->input ('investigater_1_4');
for ($i = 0; $i < count(array_filter($investigater_1)); $i++) {
	$data_inv= array(
		'id_case'=>$id_case,
		'investigater_1'=>$investigater_1[$i],
		'investigater_1_2'=>$investigater_1_2[$i],
		'investigater_1_3'=>$investigater_1_3[$i],
		'investigater_1_4'=>$investigater_1_4[$i],
		'date_entry'=>$date_entry,
	);
		DB::table('aefi_inv')->insert($data_inv);
	}
}
if ($res2){
	$msg2 = " ส่งข้อมูลสำเร็จ";
	$url_rediect = "<script>alert('".$msg2."'); window.location='lstf2';</script> ";
}else{
	$msg2 = " ส่งข้อมูลไม่สำเร็จ";
	$url_rediect = "<script>alert('".$msg2."'); window.location='form2';</script> ";
	}
	echo $url_rediect;

}
}
