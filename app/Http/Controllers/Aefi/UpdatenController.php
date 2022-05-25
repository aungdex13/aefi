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
	class UpdatenController extends Controller
	{
		use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		public function updateform1(Request $req) {
					$id = $req->input('id');
					$id_case = $req->input('id_case');
					$hn = $req->input('hn');
					$count_data_vac = $req->input('count_data_vac');
					// dd($id,$id_case,$count_data_vac);
					if ($count_data_vac != '0') {
							 $delvac=DB::table('aefi_form_1_vac')->where('id_case', '=', $id_case)->delete();
							// dd($delvac);
							
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
									$other_manufacturer = $req ->input('other_manufacturer');
									$lot_number_diluent = $req ->input('lot_number_diluent');
									$expiry_date_diluent = $req ->input('expiry_date_diluent');
									// $date_of_reconstitution = $req ->input('date_of_reconstitution');
									// $time_of_reconstitution = $req ->input('time_of_reconstitution');
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
									$dfiu= $req ->input ('dfiu');
									$main_diagnosis= $req ->input ('main_diagnosis');
									$minor_diagnosis= $req ->input ('minor_diagnosis');
									
							$x=0;
								 for ($i=0; $i < count($name_of_vaccine); $i++) {
									 $data_vac[]  = [
									'id_case'=>$id_case,
									// 'hn'=>$hn,
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
									'other_manufacturer'=>$other_manufacturer[$i],
									'lot_number_diluent'=>$lot_number_diluent[$i],
									'expiry_date_diluent'=>$expiry_date_diluent[$i],
									// 'date_of_reconstitution'=>$date_of_reconstitution[$i],
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
									'symptoms_later_immunized'=>(isset($symptoms_later_immunized[$i])) ? $symptoms_later_immunized[$i]  : '0',
									'other_symptoms_later_immunized'=>$other_symptoms_later_immunized[$i],
									'seriousness_of_the_symptoms'=>(isset($seriousness_of_the_symptoms[$i])) ? $seriousness_of_the_symptoms[$i]  : '0',
									'other_seriousness_of_the_symptoms'=>(isset($other_seriousness_of_the_symptoms[$i])) ? $other_seriousness_of_the_symptoms[$i]  : '0',
									'patient_status'=>(isset($patient_status[$i])) ? $patient_status[$i]  : '0',
									'funeral'=>(isset($funeral[$i])) ? $funeral[$i]  : '0',
									'other_address_funeral'=>$other_address_funeral[$i],
									'transverse_myelitis' => (isset($transverse_myelitis[$i])) ? $transverse_myelitis[$i]  : '0',
									'adem' => (isset($adem[$i])) ? $adem[$i]  : '0',
									'acute_myocardial' => (isset($acute_myocardial[$i])) ? $acute_myocardial[$i]  : '0',
									'ards' => (isset($ards[$i])) ? $ards[$i]  : '0',
									'gbs'=>(isset($gbs[$i])) ? $gbs[$i]  : '0',
									'symptomstatus'=>(isset($symptomstatus[$i])) ? $symptomstatus[$i]  : '0',
									'chest_pain'=>(isset($chest_pain[$i])) ? $chest_pain[$i]  : '0',
									'myocarditis'=>(isset($myocarditis[$i])) ? $myocarditis[$i]  : '0',
									'heart_failure'=>(isset($heart_failure[$i])) ? $heart_failure[$i]  : '0',
									'pericarditis'=>(isset($pericarditis[$i])) ? $pericarditis[$i]  : '0',
									'sudden_cardiac_arrest'=>(isset($sudden_cardiac_arrest[$i])) ? $sudden_cardiac_arrest[$i]  : '0',
									'covid_19'=>(isset($covid_19[$i])) ? $covid_19[$i]  : '0',
									'ischemic_stroke'=>(isset($ischemic_stroke[$i])) ? $ischemic_stroke[$i]  : '0',
									'hemorrhagic_stroke'=>(isset($hemorrhagic_stroke[$i])) ? $hemorrhagic_stroke[$i]  : '0',
									'deep_vein_thrombosis'=>(isset($deep_vein_thrombosis[$i])) ? $deep_vein_thrombosis[$i]  : '0',
									'pulmonary_embolism'=>(isset($pulmonary_embolism[$i])) ? $pulmonary_embolism[$i]  : '0',
									'hypertension'=>(isset($hypertension[$i])) ? $hypertension[$i]  : '0',
									'hypertensive_urgency'=>(isset($hypertensive_urgency[$i])) ? $hypertensive_urgency[$i]  : '0',
									'bells_palsy'=>(isset($bells_palsy[$i])) ? $bells_palsy[$i]  : '0',
									'date_entry'=>date('Y-m-d H:i:s'),
									'symptom_status'=>(isset($symptom_status[$i])) ? $symptom_status[$i]  : '0',
									'dfiu'=>(isset($dfiu[$i])) ? $dfiu[$i]  : '0',
									'main_diagnosis'=>$main_diagnosis[$i],
									'minor_diagnosis'=>$minor_diagnosis[$i],
									];
									$x++;
									}
								//   dd($data_vac);
									$res2= DB::table('aefi_form_1_vac')->insert($data_vac);
						}else {
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
							$date_of_reconstitution = $req ->input('date_of_reconstitution');
							$time_of_reconstitution = $req ->input('time_of_reconstitution');
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
							$dfiu= $req ->input ('dfiu');
							$main_diagnosis= $req ->input ('main_diagnosis');
							$minor_diagnosis= $req ->input ('minor_diagnosis');
							// dd($symptom_status);
					$x=0;
						 for ($i=0; $i < count($name_of_vaccine); $i++) {
							 $data_vac[]  = [
							'id_case'=>$id_case,
							// 'hn'=>$hn,
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
							'symptoms_later_immunized'=>(isset($symptoms_later_immunized[$i])) ? $symptoms_later_immunized[$i]  : '0',
							'other_symptoms_later_immunized'=>$other_symptoms_later_immunized[$i],
							'diagnosis'=>(isset($diagnosis[$i])) ? $diagnosis[$i]  : '0',
							'seriousness_of_the_symptoms'=>(isset($seriousness_of_the_symptoms[$i])) ? $seriousness_of_the_symptoms[$i]  : '0',
							'other_seriousness_of_the_symptoms'=>(isset($other_seriousness_of_the_symptoms[$i])) ? $other_seriousness_of_the_symptoms[$i]  : '0',
							'patient_status'=>(isset($patient_status[$i])) ? $patient_status[$i]  : '0',
							'funeral'=>(isset($funeral[$i])) ? $funeral[$i]  : '0',
							'other_address_funeral'=>$other_address_funeral[$i],
							'transverse_myelitis' => (isset($transverse_myelitis[$i])) ? $transverse_myelitis[$i]  : '0',
							'adem' => (isset($adem[$i])) ? $adem[$i]  : '0',
							'acute_myocardial' => (isset($acute_myocardial[$i])) ? $acute_myocardial[$i]  : '0',
							'ards' => (isset($ards[$i])) ? $ards[$i]  : '0',
							'gbs'=>(isset($gbs[$i])) ? $gbs[$i]  : '0',
							'symptomstatus'=>(isset($symptomstatus[$i])) ? $symptomstatus[$i]  : '0',
							'chest_pain'=>(isset($chest_pain[$i])) ? $chest_pain[$i]  : '0',
							'myocarditis'=>(isset($myocarditis[$i])) ? $myocarditis[$i]  : '0',
							'heart_failure'=>(isset($heart_failure[$i])) ? $heart_failure[$i]  : '0',
							'pericarditis'=>(isset($pericarditis[$i])) ? $pericarditis[$i]  : '0',
							'sudden_cardiac_arrest'=>(isset($sudden_cardiac_arrest[$i])) ? $sudden_cardiac_arrest[$i]  : '0',
							'covid_19'=>(isset($covid_19[$i])) ? $covid_19[$i]  : '0',
							'ischemic_stroke'=>(isset($ischemic_stroke[$i])) ? $ischemic_stroke[$i]  : '0',
							'hemorrhagic_stroke'=>(isset($hemorrhagic_stroke[$i])) ? $hemorrhagic_stroke[$i]  : '0',
							'deep_vein_thrombosis'=>(isset($deep_vein_thrombosis[$i])) ? $deep_vein_thrombosis[$i]  : '0',
							'pulmonary_embolism'=>(isset($pulmonary_embolism[$i])) ? $pulmonary_embolism[$i]  : '0',
							'hypertension'=>(isset($hypertension[$i])) ? $hypertension[$i]  : '0',
							'hypertensive_urgency'=>(isset($hypertensive_urgency[$i])) ? $hypertensive_urgency[$i]  : '0',
							'bells_palsy'=>(isset($bells_palsy[$i])) ? $bells_palsy[$i]  : '0',
							'date_entry'=>date('Y-m-d H:i:s'),
							'symptom_status'=>(isset($symptom_status[$i])) ? $symptom_status[$i]  : '0',
							'dfiu'=>(isset($dfiu[$i])) ? $dfiu[$i]  : '0',
							'main_diagnosis'=>$main_diagnosis[$i],
							'minor_diagnosis'=>$minor_diagnosis[$i],
							];
							$x++;
							}
							//   dd($data_vac);
							$res2= DB::table('aefi_form_1_vac')->insert($data_vac);
						}
					$update	= DB::table('aefi_form_1')
					->where('id', $req->id)
					->where('id_case', $req->id_case)
					->update([
						'id_case' => $req->id_case,
						'hn' => $req->input('hn'),
						'an' => $req->input('an'),
						'id_number' => $req->input('id_number'),
						'title_name' => $req->input('title_name'),
						'first_name' => $req->input('first_name'),
						'sur_name' => $req->input ('sur_name'),
						'gender' => $req->input('gender'),
						'birthdate' => $req->input('birthdate'),
						'age_while_sick_year' => $req->input('age_while_sick_year'),
						'age_while_sick_month' => $req->input('age_while_sick_month'),
						'age_while_sick_day' => $req->input('age_while_sick_day'),
						'group_age' => $req->input ('group_age'),
						'nationality' => $req->input('nationality'),
						'other_nationality' => $req->input ('other_nationality'),
						'type_of_patient' => $req->input ('type_of_patient'),
						'career' => $req->input ('career'),
						'history_of_vaccine_drug_allergies_of_patient' => $req->input('history_of_vaccine_drug_allergies_of_patient'),
						'other_vaccination_history' => $req ->input('other_vaccination_history'),
						'other_drug_history' => $req->input('other_drug_history'),
						'patient_develop_symptoms_after_previous_vaccination' => $req->input('patient_develop_symptoms_after_previous_vaccination'),
						'other_patient_develop_symptoms_after_previous_vaccination' => $req->input('other_patient_develop_symptoms_after_previous_vaccination'),
						'underlying_disease' => $req->input('underlying_disease'),
						'other_underlying_disease' => $req->input('other_underlying_disease'),
						'history_of_drug_use_within_1_month_before_getting_vaccination' => $req->input('history_of_drug_use_within_1_month_before_getting_vaccination'),
						'other_history_of_drug_use_within_1_month_vaccination' => $req->input('other_history_of_drug_use_within_1_month_vaccination'),
						'other_medical_history' => $req->input('other_medical_history'),
						'house_number' => $req->input('house_number'),
						'village_no' => $req->input('village_no'),
						'province' => $req->input('province'),
						'district' => $req->input('district'),
						'subdistrict' => $req->input('subdistrict'),
						'phone_number' => $req->input('phone_number'),
						'parent_name' => $req->input('parent_name'),
						'parent_sur_name' => $req->input('parent_sur_name'),
						'parent_phone_number' => $req->input('parent_phone_number'),
						'symptom_name' => $req->input('symptom_name'),
						'symptom_position' => $req->input('symptom_position'),
						'other_symptom_position' => $req->input('other_symptom_position'),
						'reporter_name' => $req->input('reporter_name'),
						'reporter_position' => $req->input('reporter_position'),
						'other_reporter_position' => $req->input('other_reporter_position'),
						'date_found_event' => $req->input('date_found_event'),
						'event_location' => $req->input('event_location'),
						'province_found_event' => $req->input('province_found_event'),
						'unit_reported' => $req->input('unit_reported'),
						'province_reported' => $req->input('province_reported'),
						'tel_reported' => $req->input('tel_reported'),
						'email_reported' => $req->input('email_reported'),
						'datepicker_send_reported' => $req->input('datepicker_send_reported'),
						'datepicker_resiver' => $req->input('datepicker_resiver'),
						'more_reviews' => $req->input('more_reviews'),
						'assessment1'=> $req->input('assessment1'),
						'assessment2'=>$req->input('assessment2'),
						'assessment3'=>$req->input('assessment3'),
						'assessment4'=>$req->input('assessment4'),
						'assessment5'=>$req->input('assessment5'),
						'assessment6'=>$req->input('assessment6'),
						'assessment7'=>$req->input('assessment7'),
						'assessment8'=>$req->input('assessment8'),
						'assessment9'=>$req->input('assessment9'),
						'assessment10'=>$req->input('assessment10'),
						'date_entry' => date('Y-m-d'),
						'date_update_aefi1' => date('Y-m-d'),
						'lab_result'=> $req ->input ('lab_result'),
						'other_text_patient_develop_symptoms_after_previous_vaccination' => $req ->input ('other_text_patient_develop_symptoms_after_previous_vaccination'),
						'other_text_underlying_disease' => $req ->input ('other_text_underlying_disease'),
						'history_of_covid' => $req ->input ('history_of_covid'),
						'other_history_of_covid_text' => $req ->input ('other_history_of_covid_text'),
						'user_username'=>$req ->input ('user_username'),
						'user_hospcode'=>$req ->input ('user_hospcode'),
						'user_provcode'=>$req ->input ('user_provcode'),
						'user_region'=>$req ->input ('user_region'),
						'hospcode_treat'=>$req ->input ('hospcode_treat'),
						'hospcode_report'=>$req ->input ('hospcode_report'),
						'hospcode_get_vac'=>$req ->input ('hospcode_get_vac')

					]);
if ($update){
			$msg = " ส่งข้อมูลสำเร็จ";
			$url_rediect = "<script>alert('".$msg."'); window.location='EditAEFI1n?id_case=".$req->id_case."';</script> ";
		}else{
			$msg = " ส่งข้อมูลสำเร็จ";
				$url_rediect = "<script>alert('".$msg."'); window.location='EditAEFI1n?id_case=".$req->id_case."';</script> ";
			}
			echo $url_rediect;
}

public function updateform2(Request $req2)
{
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
   $res2	= DB::table('aefi_form_2')->update($data2);

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
		DB::table('aefi_form_2_vac')->update($data_vac2);
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
		DB::table('aefi_inv')->update($data_inv);
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
