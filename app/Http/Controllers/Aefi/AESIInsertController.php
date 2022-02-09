<?php

namespace App\Http\Controllers\aefi;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Str;
class AESIInsertController extends Controller
{
    public function insertaesiform1(Request $req)
	 	{
		$arr_vac_init = load_vac_init();
		$listvac_arr = $this->listvac_arr();
		$yearnow_c =  now()->year;
		$yearnow =  now()->year+543;
		$name_of_vaccine = $req->input('name_of_vaccine');
		// $vac_name_init = (isset($arr_vac_init[$name_of_vaccine[0]]) ? $arr_vac_init[$name_of_vaccine[0]]  : 'NULL' );
		$id_case = (isset($_POST['id_case'])) ? $_POST['id_case'] : '0';
		$hn = $req ->input ('hn');
		$an = $req ->input ('an');
		$id_number_n = $req ->input ('id_number');
		$id_number = str_replace(' ', '', $id_number_n);
		$title_name = $req ->input ('title_name');
		$first_name = $req ->input ('first_name');
		$sur_name = $req ->input ('sur_name');
		$gender = $req ->input ('gender');
		$birthdate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($req ->input ('birthdate')))));
		$age = $req ->input ('age');
		$age_while_sick_year = $req ->input ('age_while_sick_year');
		$age_while_sick_month = $req ->input ('age_while_sick_month');
		$age_while_sick_day = $req ->input ('age_while_sick_day');
		$group_age = $req ->input ('group_age');
		$nationality = $req ->input ('nationality');
		$other_nationality = $req ->input ('other_nationality');
		$type_of_patient = $req ->input ('type_of_patient');
		$career = $req ->input ('career');
		$career_code = $req ->input ('career_code');
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
		$lab_result = $req ->input ('lab_result');
		$other_text_patient_develop_symptoms_after_previous_vaccination = $req ->input ('other_text_patient_develop_symptoms_after_previous_vaccination');
		$other_text_underlying_disease = $req ->input ('other_text_underlying_disease');
		$history_of_covid = $req ->input ('history_of_covid');
		$other_history_of_covid_text = $req ->input ('other_history_of_covid_text');
		$user_username = $req ->input ('user_username');
		$user_hospcode = $req ->input ('user_hospcode');
		$user_provcode = $req ->input ('user_provcode');
		$user_region = $req ->input ('user_region');
		$hospcode_treat = $req ->input ('hospcode_treat');
		$hospcode_report = $req ->input ('hospcode_report');
		$hospcode_get_vac = $req ->input ('hospcode_get_vac');
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
			'age_while_sick_month'=>	$age_while_sick_month,
			'age_while_sick_day'=>	$age_while_sick_day,
			'group_age'=>$group_age,
			'nationality'=>$nationality,
			'other_nationality'=>$other_nationality,
			'type_of_patient'=>$type_of_patient,
			'career'=>$career,
			'career_code'=>$career_code,
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
			'date_entry'=>$date_entry,
			'lab_result'=>$lab_result,
			'other_text_patient_develop_symptoms_after_previous_vaccination'=>$other_text_patient_develop_symptoms_after_previous_vaccination,
			'other_text_underlying_disease'=>$other_text_underlying_disease,
			'history_of_covid'=>$history_of_covid,
			'other_history_of_covid_text'=>$other_history_of_covid_text,
			'user_username'=>$user_username,
			'user_hospcode'=>$user_hospcode,
			'user_provcode'=>$user_provcode,
			'user_region'=>$user_region,
			'hospcode_treat'=>$hospcode_treat,
			'hospcode_report'=>$hospcode_report,
			'hospcode_get_vac'=>$hospcode_get_vac
		);
	// $res1	= DB::table('aesi_form')->insert($data);
if ($data) {
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
		$other_manufacturer = $req ->input('other_manufacturer');
		// symotom session
		$rash = (isset($_POST['rash'])) ? $_POST['rash'] : '0';
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
		$Symptoms_details = $req ->input ('Symptoms_details');
		$text_other_seriousness_symptoms = $req ->input ('text_other_seriousness_symptoms');
		$symptoms_later_immunized = $req ->input ('symptoms_later_immunized');
		$other_symptoms_later_immunized = $req ->input ('other_symptoms_later_immunized');
		$diagnosis = $req ->input ('diagnosis');
		$seriousness_of_the_symptoms = $req ->input ('seriousness_of_the_symptoms');
		$seriousness_of_the_symptoms2 = $req ->input ('seriousness_of_the_symptoms2');
		$other_seriousness_of_the_symptoms = $req ->input ('other_seriousness_of_the_symptoms');
		$patient_status = $req ->input ('patient_status');
		$patient_status2 = $req ->input ('patient_status2');
		$funeral = $req ->input ('funeral');
		$other_address_funeral = $req ->input ('other_address_funeral');
		$transverse_myelitis = $req ->input ('transverse_myelitis');
		$adem = $req ->input ('adem');
		$acute_myocardial = $req ->input ('acute_myocardial');
		$ards = $req ->input ('ards');
		$gbs = $req ->input ('gbs');
		$date_dead = $req ->input ('date_dead');
		$symptomstatus = $req ->input ('symptomstatus');
		$chest_pain = $req ->input ('chest_pain');
		$myocarditis = $req ->input ('myocarditis');
		$heart_failure = $req ->input ('heart_failure');
		$pericarditis = $req ->input ('pericarditis');
		$sudden_cardiac_arrest = $req ->input ('sudden_cardiac_arrest');
		$covid_19 = $req ->input ('covid_19');
		$ischemic_stroke = $req ->input ('ischemic_stroke');
		$hemorrhagic_stroke = $req ->input ('hemorrhagic_stroke');
		$deep_vein_thrombosis = $req ->input ('deep_vein_thrombosis');
		$pulmonary_embolism= $req ->input ('pulmonary_embolism');
		$hypertension= $req ->input ('hypertension');
		$hypertensive_urgency= $req ->input ('hypertensive_urgency');
		$bells_palsy= $req ->input ('bells_palsy');
		$symptom_status= $req ->input ('symptom_status');
		// $time_of_reconstitution = $req ->input('time_of_reconstitution');
		// dd($date_of_vaccination,$rash);
$x=0;
	 for ($i=0; $i < count($name_of_vaccine); $i++) {
		 $data_vac[]  = [
		'id_case'=>$id_case,
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
		'other_manufacturer'=>$other_manufacturer[$i],
		// 'time_of_reconstitution'=>$time_of_reconstitution[$i],
		// symptom session
		'date_dead'=>$date_dead[$i],
		'text_other_seriousness_symptoms'=>$text_other_seriousness_symptoms[$i],
		'rash'=>(isset($rash[$i])) ? $rash[$i]  : '0',
		'erythema'=>(isset($erythema[$i])) ? $erythema[$i]  : '0',
		'urticaria'=>(isset($urticaria[$i])) ? $urticaria[$i]  : '0',
		'itching'=>(isset($itching[$i])) ? $itching[$i]  : '0',
		'edema'=>(isset($edema[$i])) ? $edema[$i]  : '0',
		'angioedema'=>(isset($angioedema[$i])) ? $angioedema[$i]  : '0',
		'fainting'=>(isset($fainting[$i])) ? $fainting[$i]  : '0',
		'hyperventilation'=>(isset($hyperventilation[$i])) ? $hyperventilation[$i]  : '0',
		'syncope'=>(isset($syncope[$i])) ? $syncope[$i]  : '0',
		'headche'=>(isset($headche[$i])) ? $headche[$i]  : '0',
		'dizziness'=>(isset($dizziness[$i])) ? $dizziness[$i]  : '0',
		'fatigue'=>(isset($fatigue[$i])) ? $fatigue[$i]  : '0',
		'malaise'=>(isset($malaise[$i])) ? $malaise[$i]  : '0',
		'dyspepsia'=>(isset($dyspepsia[$i])) ? $dyspepsia[$i]  : '0',
		'diarrhea'=>(isset($diarrhea[$i])) ? $diarrhea[$i]  : '0',
		'nausea'=>(isset($nausea[$i])) ? $nausea[$i]  : '0',
		'vomiting'=>(isset($vomiting[$i])) ? $vomiting[$i]  : '0',
		'abdominal_pain'=>(isset($abdominal_pain[$i])) ? $abdominal_pain[$i]  : '0',
		'arthalgia'=>(isset($arthalgia[$i])) ? $arthalgia[$i]  : '0',
		'myalgia'=>(isset($myalgia[$i])) ? $myalgia[$i]  : '0',
		'fever38c'=>(isset($fever38c[$i])) ? $fever38c[$i]  : '0',
		'swelling_at_the_injection'=>(isset($swelling_at_the_injection[$i])) ? $swelling_at_the_injection[$i]  : '0',
		'swelling_beyond_nearest_joint'=>(isset($swelling_beyond_nearest_joint[$i])) ? $swelling_beyond_nearest_joint[$i]  : '0',
		'lymphadenopathy'=>(isset($lymphadenopathy[$i])) ? $lymphadenopathy[$i]  : '0',
		'lymphadenitis'=>(isset($lymphadenitis[$i])) ? $lymphadenitis[$i]  : '0',
		'sterile_abscess'=>(isset($sterile_abscess[$i])) ? $sterile_abscess[$i]  : '0',
		'bacterial_abscess'=>(isset($bacterial_abscess[$i])) ? $bacterial_abscess[$i]  : '0',
		'febrile_convulsion'=>(isset($febrile_convulsion[$i])) ? $febrile_convulsion[$i]  : '0',
		'afebrile_convulsion'=>(isset($afebrile_convulsion[$i])) ? $afebrile_convulsion[$i]  : '0',
		'encephalopathy'=>(isset($encephalopathy[$i])) ? $encephalopathy[$i]  : '0',
		'flaccid_paralysis'=>(isset($flaccid_paralysis[$i])) ? $flaccid_paralysis[$i]  : '0',
		'spastic_paralysis'=>(isset($spastic_paralysis[$i])) ? $spastic_paralysis[$i]  : '0',
		'hhe'=>(isset($hhe[$i])) ? $hhe[$i]  : '0',
		'persistent_inconsolable_crying'=>(isset($persistent_inconsolable_crying[$i])) ? $persistent_inconsolable_crying[$i]  : '0',
		'thrombocytopenia'=>(isset($thrombocytopenia[$i])) ? $thrombocytopenia[$i]  : '0',
		'osteomyelitis'=>(isset($osteomyelitis[$i])) ? $osteomyelitis[$i]  : '0',
		'toxic_shock_syndrome'=>(isset($toxic_shock_syndrome[$i])) ? $toxic_shock_syndrome[$i]  : '0',
		'sepsis'=>(isset($sepsis[$i])) ? $sepsis[$i]  : '0',
		'anaphylaxis'=>(isset($anaphylaxis[$i])) ? $anaphylaxis[$i]  : '0',
		'other'=>(isset($other[$i])) ? $other[$i]  : '0',
		'date_of_symptoms'=>$date_of_symptoms[$i],
		'time_of_symptoms'=>$time_of_symptoms[$i],
		'date_of_treatment'=>$date_of_treatment[$i],
		'time_of_treatment'=>$time_of_treatment[$i],
		'Symptoms_details'=>$Symptoms_details[$i],
		'symptoms_later_immunized'=>$symptoms_later_immunized[$i],
		'other_symptoms_later_immunized'=>$other_symptoms_later_immunized[$i],
		'diagnosis'=>$diagnosis[$i],
		'seriousness_of_the_symptoms'=>$seriousness_of_the_symptoms[$i],
		'other_seriousness_of_the_symptoms'=>$other_seriousness_of_the_symptoms[$i],
		'patient_status'=>$patient_status[$i],
		'funeral'=>$funeral[$i],
		'other_address_funeral'=>$other_address_funeral[$i],
		'transverse_myelitis' => $transverse_myelitis[$i],
		'adem' => $adem[$i],
		'acute_myocardial' => $acute_myocardial[$i],
		'ards' => $ards[$i],
		'gbs'=>$gbs[$i],
		'date_entry'=>$date_entry[$i],
		'symptomstatus'=>$symptomstatus,
		'chest_pain'=>$chest_pain[$i],
		'myocarditis'=>$myocarditis[$i],
		'heart_failure'=>$heart_failure[$i],
		'pericarditis'=>$pericarditis[$i],
		'sudden_cardiac_arrest'=>$sudden_cardiac_arrest[$i],
		'covid_19'=>$covid_19[$i],
		'ischemic_stroke'=>$ischemic_stroke[$i],
		'hemorrhagic_stroke'=>$hemorrhagic_stroke[$i],
		'deep_vein_thrombosis'=>$deep_vein_thrombosis[$i],
		'pulmonary_embolism'=>$pulmonary_embolism[$i],
		'hypertension'=>$hypertension[$i],
		'hypertensive_urgency'=>$hypertensive_urgency[$i],
		'bells_palsy'=>$bells_palsy[$i],
		'symptom_status'=>$symptom_status[$i]
		];
		$x++;
		}
        dd($data,$data_vac);
		//  $res2= DB::table('aefi_form_1_vac')->insert($data_vac);
	}
											if ($data_vac) {
												$msg = " ส่งข้อมูลสำเร็จ";
												$url_rediect = "<script>alert('".$msg."'); window.location='lstf1';</script> ";
											}else{
												$msg = " ส่งข้อมูลไม่สำเร็จ";
												$url_rediect = "<script>alert('".$msg."'); window.location='form1';</script> ";
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
}
