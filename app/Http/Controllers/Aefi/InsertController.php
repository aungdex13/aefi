<?php

	namespace App\Http\Controllers\Aefi;

	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Routing\Controller as BaseController;
	use Illuminate\Foundation\Validation\ValidatesRequests;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Storage;
	use DB;
	use Illuminate\Support\Str;
	class InsertController extends Controller
	{
		use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

		public function insertform1(Request $req)
	 	{
		$arr_vac_init = load_vac_init();
		$listvac_arr = $this->listvac_arr();
		$yearnow_c =  now()->year;
		$yearnow =  now()->year+543;
		$name_of_vaccine = $req->input('name_of_vaccine');
		$vac_name_init = (isset($arr_vac_init[$name_of_vaccine[0]]) ? $arr_vac_init[$name_of_vaccine[0]]  : 'NULL' );
		// $id_vac_patient =DB::table('aefi_form_1')
        //     ->join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
        //     ->select(DB::raw('ROW_NUMBER() OVER (Order by aefi_form_1.id) AS RowNumber'),'aefi_form_1.id_case', 'aefi_form_1.id' , 'aefi_form_1_vac.name_of_vaccine')
		// 				->whereYear('aefi_form_1_vac.date_of_vaccination', '=', "$yearnow_c")
		// 				->where('aefi_form_1_vac.name_of_vaccine', '=', $name_of_vaccine[0])
		// 				// ->where('aefi_form_1.status', '=', null)
		// 				->groupBy('aefi_form_1_vac.id_case')
		// 				->orderBy('aefi_form_1.id', 'DESC')
		// 				->limit(1)
        //     ->get();
		// //  dd($id_vac_patient);
		// $max_vac_pid = 	$id_vac_patient[0]->RowNumber+1;
		// $case_vac_id = $yearnow.'-'.$vac_name_init.'-'.str_pad($max_vac_pid, 6, '0', STR_PAD_LEFT);
		// dd($case_vac_id);
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
		$age_while_sick_month = $req ->input ('age_while_sick_month');
		$age_while_sick_day = $req ->input ('age_while_sick_day');
		$group_age = $req ->input ('group_age');
		$nationality = $req ->input ('nationality');
		$other_nationality = $req ->input ('other_nationality');
		$type_of_patient = $req ->input ('type_of_patient');
		$career = $req ->input ('career');
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
			
			// 'case_vac_id'=>$case_vac_id,
			'hospcode_treat'=>$hospcode_treat,
			'hospcode_report'=>$hospcode_report,
			'hospcode_get_vac'=>$hospcode_get_vac
		);
	// echo($data);
	// $res1 = $data;
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
		$date_of_symptoms2 = $req ->input ('date_of_symptoms2');
		$time_of_symptoms = $req ->input ('time_of_symptoms');
		$date_of_treatment = $req ->input ('date_of_treatment');
		$time_of_treatment = $req ->input ('time_of_treatment');
		$time_of_symptoms2 = $req ->input ('time_of_symptoms2');
		$date_of_treatment2 = $req ->input ('date_of_treatment2');
		$time_of_treatment2 = $req ->input ('time_of_treatment2');
		$Symptoms_details = $req ->input ('Symptoms_details');
		$Symptoms_details2 = $req ->input ('Symptoms_details2');
		$text_other_seriousness_symptoms = $req ->input ('text_other_seriousness_symptoms');
		$symptoms_later_immunized = $req ->input ('symptoms_later_immunized');
		$other_symptoms_later_immunized = $req ->input ('other_symptoms_later_immunized');
		$diagnosis = $req ->input ('diagnosis');
		$diagnosis2 = $req ->input ('diagnosis2');
		$seriousness_of_the_symptoms = $req ->input ('seriousness_of_the_symptoms');
		$seriousness_of_the_symptoms2 = $req ->input ('seriousness_of_the_symptoms2');
		$other_seriousness_of_the_symptoms = $req ->input ('other_seriousness_of_the_symptoms');
		$other_seriousness_of_the_symptoms2 = $req ->input ('other_seriousness_of_the_symptoms2');
		$patient_status = $req ->input ('patient_status');
		$patient_status2 = $req ->input ('patient_status2');
		$funeral = $req ->input ('funeral');
		$funeral2 = $req ->input ('funeral2');
		$other_address_funeral = $req ->input ('other_address_funeral');
		$transverse_myelitis = $req ->input ('transverse_myelitis');
		$adem = $req ->input ('adem');
		$acute_myocardial = $req ->input ('acute_myocardial');
		$ards = $req ->input ('ards');
		$gbs = $req ->input ('gbs');
		$date_dead = $req ->input ('date_dead');
		$symptomstatus = $req ->input ('symptomstatus');
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
		'date_of_symptoms2'=>$date_of_symptoms2[$i],
		'time_of_symptoms2'=>$time_of_symptoms2[$i],
		'date_of_treatment2'=>$date_of_treatment2[$i],
		'time_of_treatment2'=>$time_of_treatment2[$i],
		'Symptoms_details2'=>$Symptoms_details2[$i],
		'symptoms_later_immunized'=>$symptoms_later_immunized[$i],
		'other_symptoms_later_immunized'=>$other_symptoms_later_immunized[$i],
		'diagnosis'=>$diagnosis[$i],
		'diagnosis2'=>$diagnosis2[$i],
		'seriousness_of_the_symptoms'=>$seriousness_of_the_symptoms[$i],
		'seriousness_of_the_symptoms2'=>$seriousness_of_the_symptoms2[$i],
		'other_seriousness_of_the_symptoms'=>$other_seriousness_of_the_symptoms[$i],
		'other_seriousness_of_the_symptoms2'=>$other_seriousness_of_the_symptoms2[$i],
		'patient_status'=>$patient_status[$i],
		'patient_status2'=>$patient_status2[$i],
		'funeral'=>$funeral[$i],
		'funeral2'=>$funeral2[$i],
		'other_address_funeral'=>$other_address_funeral[$i],
		'transverse_myelitis' => $transverse_myelitis[$i],
		'adem' => $adem[$i],
		'acute_myocardial' => $acute_myocardial[$i],
		'ards' => $ards[$i],
		'gbs'=>$gbs[$i],
		'date_entry'=>$date_entry,
		'symptomstatus'=>$symptomstatus
		];
		$x++;
		}
		// dd($data_vac);
		//  $res2= $data_vac;
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
	$file1=	$req2->file('other_instruction_1');
	$file2=	$req2->file('other_instruction_2');
	$file3=	$req2->file('other_instruction_3');
	$file4=	$req2->file('other_instruction_4');
	$file5=	$req2->file('other_instruction_5');
	$id_case=$req2->input('id_case');
	$user_id=$req2->input('user_id');
	// dd($file1,$file2,$file3,$file4,$file5);
	if ($file1 != null) {
			$path1 = Storage::putFile('file_upload', $file1);
			$filename=$file1->getClientOriginalName();
			$filenamegenerate1=str_replace("file_upload/" ,"", $path1);
			$file_type=strstr($filename, ".");
			$path = $path1;
			$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : null;
			$title_file_name = "เอกสาร AEFI2";
			$file_name = $filenamegenerate1;
			$originalfilename = $filename;
			$status = '1';
			$status_on_date_inv_1 = $req2->input('status_on_date_inv_1');
			$other_status_on_date_inv_1 = $req2->input('other_status_on_date_inv_1');
			$instruction_1 = $req2->input('instruction_1');
			$record_name = $req2->input('record_name');
			$record_position = $req2->input('record_position');
			$record_division = $req2->input('record_division');
			$record_tel = $req2->input('record_tel');
			$record_date = $req2->input('record_date');
			$date_entry = date('Y-m-d');
			$user_username = $req2 ->input ('user_username');
			$user_hospcode = $req2 ->input ('user_hospcode');
			$user_provcode = $req2 ->input ('user_provcode');
			$user_region = $req2 ->input ('user_region');
			$date_update = date('Y-m-d');
					$data = array(
						'user_id' => $user_id,
						'id_case' => $id_case,
						'title_file_name' => $title_file_name,
						'file_name' => $file_name,
						'file_type' => $file_type,
						'originalfilename' => $originalfilename,
						'path' => $path,
						'status' => $status,
						'date_entry' => $date_entry,
						'date_update' => $date_update,
						'status_on_date_inv_1' => $status_on_date_inv_1,
						'other_status_on_date_inv_1' => $other_status_on_date_inv_1,
						'instruction_1' => $instruction_1,
						'record_name' => $record_name,
						'record_position' => $record_position,
						'record_division' => $record_division,
						'record_tel' => $record_tel,
						'record_date' => $record_date,
						'user_username'=>$user_username,
						'user_hospcode'=>$user_hospcode,
						'user_provcode'=>$user_provcode,
						'user_region'=>$user_region
				);
			$res1	= DB::table('aefi_form_2')->insert($data);
		}
	if ($file2 != null) {
			$path1 = Storage::putFile('file_upload', $file2);
			$filename=$file2->getClientOriginalName();
			$filenamegenerate1=str_replace("file_upload/" ,"", $path1);
			$file_type=strstr($filename, ".");
			$path = $path1;
			$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : null;
			$title_file_name = "เอกสาร AEFI2";
			$file_name = $filenamegenerate1;
			$originalfilename = $filename;
			$status = '1';
			$status_on_date_inv_1 = $req2->input('status_on_date_inv_1');
			$other_status_on_date_inv_1 = $req2->input('other_status_on_date_inv_1');
			$instruction_1 = $req2->input('instruction_1');
			$record_name = $req2->input('record_name');
			$record_position = $req2->input('record_position');
			$record_division = $req2->input('record_division');
			$record_tel = $req2->input('record_tel');
			$record_date = $req2->input('record_date');
			$date_entry = date('Y-m-d');
			$user_username = $req2 ->input ('user_username');
			$user_hospcode = $req2 ->input ('user_hospcode');
			$user_provcode = $req2 ->input ('user_provcode');
			$user_region = $req2 ->input ('user_region');
			$date_update = date('Y-m-d');
					$data = array(
						'user_id' => $user_id,
						'id_case' => $id_case,
						'title_file_name' => $title_file_name,
						'file_name' => $file_name,
						'file_type' => $file_type,
						'originalfilename' => $originalfilename,
						'path' => $path,
						'status' => $status,
						'date_entry' => $date_entry,
						'date_update' => $date_update,
						'status_on_date_inv_1' => $status_on_date_inv_1,
						'other_status_on_date_inv_1' => $other_status_on_date_inv_1,
						'instruction_1' => $instruction_1,
						'record_name' => $record_name,
						'record_position' => $record_position,
						'record_division' => $record_division,
						'record_tel' => $record_tel,
						'record_date' => $record_date,
						'user_username'=>$user_username,
						'user_hospcode'=>$user_hospcode,
						'user_provcode'=>$user_provcode,
						'user_region'=>$user_region
				);
				// dd($data);
			$res1	= DB::table('aefi_form_2')->insert($data);
		}
	if ($file3 != null) {
			$path1 = Storage::putFile('file_upload', $file3);
			$filename=$file3->getClientOriginalName();
			$filenamegenerate1=str_replace("file_upload/" ,"", $path1);
			$file_type=strstr($filename, ".");
			$path = $path1;
			$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : null;
			$title_file_name = "เอกสาร AEFI2";
			$file_name = $filenamegenerate1;
			$originalfilename = $filename;
			$status = '1';
			$status_on_date_inv_1 = $req2->input('status_on_date_inv_1');
			$other_status_on_date_inv_1 = $req2->input('other_status_on_date_inv_1');
			$instruction_1 = $req2->input('instruction_1');
			$record_name = $req2->input('record_name');
			$record_position = $req2->input('record_position');
			$record_division = $req2->input('record_division');
			$record_tel = $req2->input('record_tel');
			$record_date = $req2->input('record_date');
			$date_entry = date('Y-m-d');
			$user_username = $req2 ->input ('user_username');
			$user_hospcode = $req2 ->input ('user_hospcode');
			$user_provcode = $req2 ->input ('user_provcode');
			$user_region = $req2 ->input ('user_region');
			$date_update = date('Y-m-d');
					$data = array(
						'user_id' => $user_id,
						'id_case' => $id_case,
						'title_file_name' => $title_file_name,
						'file_name' => $file_name,
						'file_type' => $file_type,
						'originalfilename' => $originalfilename,
						'path' => $path,
						'status' => $status,
						'date_entry' => $date_entry,
						'date_update' => $date_update,
						'status_on_date_inv_1' => $status_on_date_inv_1,
						'other_status_on_date_inv_1' => $other_status_on_date_inv_1,
						'instruction_1' => $instruction_1,
						'record_name' => $record_name,
						'record_position' => $record_position,
						'record_division' => $record_division,
						'record_tel' => $record_tel,
						'record_date' => $record_date,
						'user_username'=>$user_username,
						'user_hospcode'=>$user_hospcode,
						'user_provcode'=>$user_provcode,
						'user_region'=>$user_region
				);
				// dd($data);
			$res1	= DB::table('aefi_form_2')->insert($data);
		}
	if ($file4 != null) {
			$path1 = Storage::putFile('file_upload', $file4);
			$filename=$file4->getClientOriginalName();
			$filenamegenerate1=str_replace("file_upload/" ,"", $path1);
			$file_type=strstr($filename, ".");
			$path = $path1;
			$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : null;
			$title_file_name = "เอกสาร AEFI2";
			$file_name = $filenamegenerate1;
			$originalfilename = $filename;
			$status = '1';
			$status_on_date_inv_1 = $req2->input('status_on_date_inv_1');
			$other_status_on_date_inv_1 = $req2->input('other_status_on_date_inv_1');
			$instruction_1 = $req2->input('instruction_1');
			$record_name = $req2->input('record_name');
			$record_position = $req2->input('record_position');
			$record_division = $req2->input('record_division');
			$record_tel = $req2->input('record_tel');
			$record_date = $req2->input('record_date');
			$date_entry = date('Y-m-d');
			$user_username = $req2 ->input ('user_username');
			$user_hospcode = $req2 ->input ('user_hospcode');
			$user_provcode = $req2 ->input ('user_provcode');
			$user_region = $req2 ->input ('user_region');
			$date_update = date('Y-m-d');
					$data = array(
						'user_id' => $user_id,
						'id_case' => $id_case,
						'title_file_name' => $title_file_name,
						'file_name' => $file_name,
						'file_type' => $file_type,
						'originalfilename' => $originalfilename,
						'path' => $path,
						'status' => $status,
						'date_entry' => $date_entry,
						'date_update' => $date_update,
						'status_on_date_inv_1' => $status_on_date_inv_1,
						'other_status_on_date_inv_1' => $other_status_on_date_inv_1,
						'instruction_1' => $instruction_1,
						'record_name' => $record_name,
						'record_position' => $record_position,
						'record_division' => $record_division,
						'record_tel' => $record_tel,
						'record_date' => $record_date,
						'user_username'=>$user_username,
						'user_hospcode'=>$user_hospcode,
						'user_provcode'=>$user_provcode,
						'user_region'=>$user_region
				);
				// dd($data);
			$res1	= DB::table('aefi_form_2')->insert($data);
		}else{
		$filename=null;
		$filenamegenerate1=null;
		$file_type=null;
		$path =null;
		$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : null;
		$title_file_name = "เอกสาร AEFI2";
		$file_name = $filenamegenerate1;
		$originalfilename = $filename;
		$status = '1';
		$status_on_date_inv_1 = $req2->input('status_on_date_inv_1');
		$other_status_on_date_inv_1 = $req2->input('other_status_on_date_inv_1');
		$instruction_1 = $req2->input('instruction_1');
		$record_name = $req2->input('record_name');
		$record_position = $req2->input('record_position');
		$record_division = $req2->input('record_division');
		$record_tel = $req2->input('record_tel');
		$record_date = $req2->input('record_date');
		$date_entry = date('Y-m-d');
		$user_username = $req2 ->input ('user_username');
		$user_hospcode = $req2 ->input ('user_hospcode');
		$user_provcode = $req2 ->input ('user_provcode');
		$user_region = $req2 ->input ('user_region');
		$date_update = date('Y-m-d');
				$data = array(
					'user_id' => $user_id,
					'id_case' => $id_case,
					'title_file_name' => $title_file_name,
					'file_name' => $file_name,
					'file_type' => $file_type,
					'originalfilename' => $originalfilename,
					'path' => $path,
					'status' => $status,
					'date_entry' => $date_entry,
					'date_update' => $date_update,
					'status_on_date_inv_1' => $status_on_date_inv_1,
					'other_status_on_date_inv_1' => $other_status_on_date_inv_1,
					'instruction_1' => $instruction_1,
					'record_name' => $record_name,
					'record_position' => $record_position,
					'record_division' => $record_division,
					'record_tel' => $record_tel,
					'record_date' => $record_date,
					'user_username'=>$user_username,
					'user_hospcode'=>$user_hospcode,
					'user_provcode'=>$user_provcode,
					'user_region'=>$user_region
			);
			// dd($data);
		$res1	= DB::table('aefi_form_2')->insert($data);
	}	if ($res1) {
				$msg = " ส่งข้อมูลสำเร็จ";
				$url_rediect = "<script>alert('".$msg."'); window.location='lstf2?id_case=$id_case';</script> ";
			}else{
				$msg = " ส่งข้อมูลไม่สำเร็จ";
				$url_rediect = "<script>alert('".$msg."'); window.location='form2?id_case=$id_case';</script> ";
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
