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
			$monthnow =  now()->month ;
			$datenow =  now()->format('d M Y') ;
			$timenow =  now()->format('H:m:s') ;
			$listvac_arr =  $this->listvac_arr();
			$count_vac39 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
															COUNT(aefi_form_1_vac.name_of_vaccine)  as count_name_of_vaccine,
										 					COUNT(CASE WHEN aefi_form_1_vac.rash > 0 THEN 1 END)  as rash,
															COUNT(CASE WHEN aefi_form_1_vac.erythema > 0 THEN 1 END)  as erythema,
															COUNT(CASE WHEN aefi_form_1_vac.urticaria > 0 THEN 1 END)  as urticaria,
															COUNT(CASE WHEN aefi_form_1_vac.itching > 0 THEN 1 END)  as itching,
															COUNT(CASE WHEN aefi_form_1_vac.edema > 0 THEN 1 END)  as edema,
															COUNT(CASE WHEN aefi_form_1_vac.angioedema > 0 THEN 1 END)  as angioedema,
															COUNT(CASE WHEN aefi_form_1_vac.fainting > 0 THEN 1 END)  as fainting,
															COUNT(CASE WHEN aefi_form_1_vac.hyperventilation > 0 THEN 1 END)  as hyperventilation,
															COUNT(CASE WHEN aefi_form_1_vac.syncope > 0 THEN 1 END)  as syncope,
															COUNT(CASE WHEN aefi_form_1_vac.headche > 0 THEN 1 END)  as headche,
															COUNT(CASE WHEN aefi_form_1_vac.dizziness > 0 THEN 1 END)  as dizziness,
															COUNT(CASE WHEN aefi_form_1_vac.fatigue > 0 THEN 1 END)  as fatigue,
															COUNT(CASE WHEN aefi_form_1_vac.malaise > 0 THEN 1 END)  as malaise,
															COUNT(CASE WHEN aefi_form_1_vac.dyspepsia > 0 THEN 1 END)  as dyspepsia,
															COUNT(CASE WHEN aefi_form_1_vac.diarrhea > 0 THEN 1 END)  as diarrhea,
															COUNT(CASE WHEN aefi_form_1_vac.nausea > 0 THEN 1 END)  as nausea,
															COUNT(CASE WHEN aefi_form_1_vac.vomiting > 0 THEN 1 END)  as vomiting,
															COUNT(CASE WHEN aefi_form_1_vac.abdominal_pain > 0 THEN 1 END)  as abdominal_pain,
															COUNT(CASE WHEN aefi_form_1_vac.arthalgia > 0 THEN 1 END)  as arthalgia,
															COUNT(CASE WHEN aefi_form_1_vac.myalgia > 0 THEN 1 END)  as myalgia,
															COUNT(CASE WHEN aefi_form_1_vac.fever38c > 0 THEN 1 END)  as fever38c,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_at_the_injection > 0 THEN 1 END)  as swelling_at_the_injection,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_beyond_nearest_joint > 0 THEN 1 END)  as swelling_beyond_nearest_joint,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenopathy > 0 THEN 1 END)  as lymphadenopathy,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenitis > 0 THEN 1 END)  as lymphadenitis,
															COUNT(CASE WHEN aefi_form_1_vac.sterile_abscess > 0 THEN 1 END)  as sterile_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.bacterial_abscess > 0 THEN 1 END)  as bacterial_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.febrile_convulsion > 0 THEN 1 END)  as febrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.afebrile_convulsion > 0 THEN 1 END)  as afebrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.encephalopathy > 0 THEN 1 END)  as encephalopathy,
															COUNT(CASE WHEN aefi_form_1_vac.flaccid_paralysis > 0 THEN 1 END)  as flaccid_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.spastic_paralysis > 0 THEN 1 END)  as spastic_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.hhe > 0 THEN 1 END)  as hhe,
															COUNT(CASE WHEN aefi_form_1_vac.persistent_inconsolable_crying > 0 THEN 1 END)  as persistent_inconsolable_crying,
															COUNT(CASE WHEN aefi_form_1_vac.thrombocytopenia > 0 THEN 1 END)  as thrombocytopenia,
															COUNT(CASE WHEN aefi_form_1_vac.osteomyelitis > 0 THEN 1 END)  as osteomyelitis,
															COUNT(CASE WHEN aefi_form_1_vac.toxic_shock_syndrome > 0 THEN 1 END)  as toxic_shock_syndrome,
															COUNT(CASE WHEN aefi_form_1_vac.sepsis > 0 THEN 1 END)  as sepsis,
															COUNT(CASE WHEN aefi_form_1_vac.anaphylaxis > 0 THEN 1 END)  as anaphylaxis,
															COUNT(CASE WHEN aefi_form_1_vac.transverse_myelitis > 0 THEN 1 END)  as transverse_myelitis,
															COUNT(CASE WHEN aefi_form_1_vac.gbs > 0 THEN 1 END)  as gbs,
															COUNT(CASE WHEN aefi_form_1_vac.adem > 0 THEN 1 END)  as adem,
															COUNT(CASE WHEN aefi_form_1_vac.acute_myocardial > 0 THEN 1 END)  as acute_myocardial,
															COUNT(CASE WHEN aefi_form_1_vac.ards > 0 THEN 1 END)  as ards,
															COUNT(CASE WHEN aefi_form_1_vac.symptoms_later_immunized > 0 THEN 1 END)  as symptoms_later_immunized,
															COUNT(CASE WHEN aefi_form_1_vac.chest_pain > 0 THEN 1 END)  as chest_pain,
															COUNT(CASE WHEN aefi_form_1_vac.myocarditis > 0 THEN 1 END)  as myocarditis,
															COUNT(CASE WHEN aefi_form_1_vac.heart_failure > 0 THEN 1 END)  as heart_failure,
															COUNT(CASE WHEN aefi_form_1_vac.pericarditis > 0 THEN 1 END)  as pericarditis,
															COUNT(CASE WHEN aefi_form_1_vac.sudden_cardiac_arrest > 0 THEN 1 END)  as sudden_cardiac_arrest,
															COUNT(CASE WHEN aefi_form_1_vac.covid_19 > 0 THEN 1 END)  as covid_19,
															COUNT(CASE WHEN aefi_form_1_vac.ischemic_stroke > 0 THEN 1 END)  as ischemic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.hemorrhagic_stroke > 0 THEN 1 END)  as hemorrhagic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.deep_vein_thrombosis > 0 THEN 1 END)  as deep_vein_thrombosis,
															COUNT(CASE WHEN aefi_form_1_vac.pulmonary_embolism > 0 THEN 1 END)  as pulmonary_embolism,
															COUNT(CASE WHEN aefi_form_1_vac.hypertension > 0 THEN 1 END)  as hypertension,
															COUNT(CASE WHEN aefi_form_1_vac.hypertensive_urgency > 0 THEN 1 END)  as hypertensive_urgency,
															COUNT(CASE WHEN aefi_form_1_vac.bells_palsy > 0 THEN 1 END)  as bells_palsy,
															COUNT(CASE WHEN aefi_form_1_vac.symptom_status > 0 THEN 1 END)  as symptom_status,
															COUNT(CASE WHEN aefi_form_1_vac.abortion > 0 THEN 1 END)  as abortion,
															COUNT(CASE WHEN aefi_form_1_vac.abruptio_placenta > 0 THEN 1 END)  as abruptio_placenta,
															COUNT(CASE WHEN aefi_form_1_vac.dfiu > 0 THEN 1 END)  as dfiu,
															COUNT(CASE WHEN aefi_form_1_vac.main_diagnosis > 0 THEN 1 END)  as main_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.meningitis > 0 THEN 1 END)  as meningitis,
															COUNT(CASE WHEN aefi_form_1_vac.minor_diagnosis > 0 THEN 1 END)  as minor_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.other_pregnant_symptoms > 0 THEN 1 END)  as other_pregnant_symptoms,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized_text > 0 THEN 1 END)  as other_symptoms_later_immunized_text,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized > 0 THEN 1 END)  as other_symptoms_later_immunized'))
										->where('aefi_form_1_vac.status','=',null)
										->where('aefi_form_1_vac.name_of_vaccine','=','39')
										->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										->groupBy('aefi_form_1_vac.name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 			$count_vac40 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
															 COUNT(aefi_form_1_vac.name_of_vaccine)  as count_name_of_vaccine,
										 					COUNT(CASE WHEN aefi_form_1_vac.rash > 0 THEN 1 END)  as rash,
															COUNT(CASE WHEN aefi_form_1_vac.erythema > 0 THEN 1 END)  as erythema,
															COUNT(CASE WHEN aefi_form_1_vac.urticaria > 0 THEN 1 END)  as urticaria,
															COUNT(CASE WHEN aefi_form_1_vac.itching > 0 THEN 1 END)  as itching,
															COUNT(CASE WHEN aefi_form_1_vac.edema > 0 THEN 1 END)  as edema,
															COUNT(CASE WHEN aefi_form_1_vac.angioedema > 0 THEN 1 END)  as angioedema,
															COUNT(CASE WHEN aefi_form_1_vac.fainting > 0 THEN 1 END)  as fainting,
															COUNT(CASE WHEN aefi_form_1_vac.hyperventilation > 0 THEN 1 END)  as hyperventilation,
															COUNT(CASE WHEN aefi_form_1_vac.syncope > 0 THEN 1 END)  as syncope,
															COUNT(CASE WHEN aefi_form_1_vac.headche > 0 THEN 1 END)  as headche,
															COUNT(CASE WHEN aefi_form_1_vac.dizziness > 0 THEN 1 END)  as dizziness,
															COUNT(CASE WHEN aefi_form_1_vac.fatigue > 0 THEN 1 END)  as fatigue,
															COUNT(CASE WHEN aefi_form_1_vac.malaise > 0 THEN 1 END)  as malaise,
															COUNT(CASE WHEN aefi_form_1_vac.dyspepsia > 0 THEN 1 END)  as dyspepsia,
															COUNT(CASE WHEN aefi_form_1_vac.diarrhea > 0 THEN 1 END)  as diarrhea,
															COUNT(CASE WHEN aefi_form_1_vac.nausea > 0 THEN 1 END)  as nausea,
															COUNT(CASE WHEN aefi_form_1_vac.vomiting > 0 THEN 1 END)  as vomiting,
															COUNT(CASE WHEN aefi_form_1_vac.abdominal_pain > 0 THEN 1 END)  as abdominal_pain,
															COUNT(CASE WHEN aefi_form_1_vac.arthalgia > 0 THEN 1 END)  as arthalgia,
															COUNT(CASE WHEN aefi_form_1_vac.myalgia > 0 THEN 1 END)  as myalgia,
															COUNT(CASE WHEN aefi_form_1_vac.fever38c > 0 THEN 1 END)  as fever38c,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_at_the_injection > 0 THEN 1 END)  as swelling_at_the_injection,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_beyond_nearest_joint > 0 THEN 1 END)  as swelling_beyond_nearest_joint,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenopathy > 0 THEN 1 END)  as lymphadenopathy,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenitis > 0 THEN 1 END)  as lymphadenitis,
															COUNT(CASE WHEN aefi_form_1_vac.sterile_abscess > 0 THEN 1 END)  as sterile_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.bacterial_abscess > 0 THEN 1 END)  as bacterial_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.febrile_convulsion > 0 THEN 1 END)  as febrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.afebrile_convulsion > 0 THEN 1 END)  as afebrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.encephalopathy > 0 THEN 1 END)  as encephalopathy,
															COUNT(CASE WHEN aefi_form_1_vac.flaccid_paralysis > 0 THEN 1 END)  as flaccid_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.spastic_paralysis > 0 THEN 1 END)  as spastic_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.hhe > 0 THEN 1 END)  as hhe,
															COUNT(CASE WHEN aefi_form_1_vac.persistent_inconsolable_crying > 0 THEN 1 END)  as persistent_inconsolable_crying,
															COUNT(CASE WHEN aefi_form_1_vac.thrombocytopenia > 0 THEN 1 END)  as thrombocytopenia,
															COUNT(CASE WHEN aefi_form_1_vac.osteomyelitis > 0 THEN 1 END)  as osteomyelitis,
															COUNT(CASE WHEN aefi_form_1_vac.toxic_shock_syndrome > 0 THEN 1 END)  as toxic_shock_syndrome,
															COUNT(CASE WHEN aefi_form_1_vac.sepsis > 0 THEN 1 END)  as sepsis,
															COUNT(CASE WHEN aefi_form_1_vac.anaphylaxis > 0 THEN 1 END)  as anaphylaxis,
															COUNT(CASE WHEN aefi_form_1_vac.transverse_myelitis > 0 THEN 1 END)  as transverse_myelitis,
															COUNT(CASE WHEN aefi_form_1_vac.gbs > 0 THEN 1 END)  as gbs,
															COUNT(CASE WHEN aefi_form_1_vac.adem > 0 THEN 1 END)  as adem,
															COUNT(CASE WHEN aefi_form_1_vac.acute_myocardial > 0 THEN 1 END)  as acute_myocardial,
															COUNT(CASE WHEN aefi_form_1_vac.ards > 0 THEN 1 END)  as ards,
															COUNT(CASE WHEN aefi_form_1_vac.symptoms_later_immunized > 0 THEN 1 END)  as symptoms_later_immunized,
															COUNT(CASE WHEN aefi_form_1_vac.chest_pain > 0 THEN 1 END)  as chest_pain,
															COUNT(CASE WHEN aefi_form_1_vac.myocarditis > 0 THEN 1 END)  as myocarditis,
															COUNT(CASE WHEN aefi_form_1_vac.heart_failure > 0 THEN 1 END)  as heart_failure,
															COUNT(CASE WHEN aefi_form_1_vac.pericarditis > 0 THEN 1 END)  as pericarditis,
															COUNT(CASE WHEN aefi_form_1_vac.sudden_cardiac_arrest > 0 THEN 1 END)  as sudden_cardiac_arrest,
															COUNT(CASE WHEN aefi_form_1_vac.covid_19 > 0 THEN 1 END)  as covid_19,
															COUNT(CASE WHEN aefi_form_1_vac.ischemic_stroke > 0 THEN 1 END)  as ischemic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.hemorrhagic_stroke > 0 THEN 1 END)  as hemorrhagic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.deep_vein_thrombosis > 0 THEN 1 END)  as deep_vein_thrombosis,
															COUNT(CASE WHEN aefi_form_1_vac.pulmonary_embolism > 0 THEN 1 END)  as pulmonary_embolism,
															COUNT(CASE WHEN aefi_form_1_vac.hypertension > 0 THEN 1 END)  as hypertension,
															COUNT(CASE WHEN aefi_form_1_vac.hypertensive_urgency > 0 THEN 1 END)  as hypertensive_urgency,
															COUNT(CASE WHEN aefi_form_1_vac.bells_palsy > 0 THEN 1 END)  as bells_palsy,
															COUNT(CASE WHEN aefi_form_1_vac.symptom_status > 0 THEN 1 END)  as symptom_status,
															COUNT(CASE WHEN aefi_form_1_vac.abortion > 0 THEN 1 END)  as abortion,
															COUNT(CASE WHEN aefi_form_1_vac.abruptio_placenta > 0 THEN 1 END)  as abruptio_placenta,
															COUNT(CASE WHEN aefi_form_1_vac.dfiu > 0 THEN 1 END)  as dfiu,
															COUNT(CASE WHEN aefi_form_1_vac.main_diagnosis > 0 THEN 1 END)  as main_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.meningitis > 0 THEN 1 END)  as meningitis,
															COUNT(CASE WHEN aefi_form_1_vac.minor_diagnosis > 0 THEN 1 END)  as minor_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.other_pregnant_symptoms > 0 THEN 1 END)  as other_pregnant_symptoms,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized_text > 0 THEN 1 END)  as other_symptoms_later_immunized_text,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized > 0 THEN 1 END)  as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','40')
										->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac41 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
															 COUNT(aefi_form_1_vac.name_of_vaccine)  as count_name_of_vaccine,
										 					COUNT(CASE WHEN aefi_form_1_vac.rash > 0 THEN 1 END)  as rash,
															COUNT(CASE WHEN aefi_form_1_vac.erythema > 0 THEN 1 END)  as erythema,
															COUNT(CASE WHEN aefi_form_1_vac.urticaria > 0 THEN 1 END)  as urticaria,
															COUNT(CASE WHEN aefi_form_1_vac.itching > 0 THEN 1 END)  as itching,
															COUNT(CASE WHEN aefi_form_1_vac.edema > 0 THEN 1 END)  as edema,
															COUNT(CASE WHEN aefi_form_1_vac.angioedema > 0 THEN 1 END)  as angioedema,
															COUNT(CASE WHEN aefi_form_1_vac.fainting > 0 THEN 1 END)  as fainting,
															COUNT(CASE WHEN aefi_form_1_vac.hyperventilation > 0 THEN 1 END)  as hyperventilation,
															COUNT(CASE WHEN aefi_form_1_vac.syncope > 0 THEN 1 END)  as syncope,
															COUNT(CASE WHEN aefi_form_1_vac.headche > 0 THEN 1 END)  as headche,
															COUNT(CASE WHEN aefi_form_1_vac.dizziness > 0 THEN 1 END)  as dizziness,
															COUNT(CASE WHEN aefi_form_1_vac.fatigue > 0 THEN 1 END)  as fatigue,
															COUNT(CASE WHEN aefi_form_1_vac.malaise > 0 THEN 1 END)  as malaise,
															COUNT(CASE WHEN aefi_form_1_vac.dyspepsia > 0 THEN 1 END)  as dyspepsia,
															COUNT(CASE WHEN aefi_form_1_vac.diarrhea > 0 THEN 1 END)  as diarrhea,
															COUNT(CASE WHEN aefi_form_1_vac.nausea > 0 THEN 1 END)  as nausea,
															COUNT(CASE WHEN aefi_form_1_vac.vomiting > 0 THEN 1 END)  as vomiting,
															COUNT(CASE WHEN aefi_form_1_vac.abdominal_pain > 0 THEN 1 END)  as abdominal_pain,
															COUNT(CASE WHEN aefi_form_1_vac.arthalgia > 0 THEN 1 END)  as arthalgia,
															COUNT(CASE WHEN aefi_form_1_vac.myalgia > 0 THEN 1 END)  as myalgia,
															COUNT(CASE WHEN aefi_form_1_vac.fever38c > 0 THEN 1 END)  as fever38c,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_at_the_injection > 0 THEN 1 END)  as swelling_at_the_injection,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_beyond_nearest_joint > 0 THEN 1 END)  as swelling_beyond_nearest_joint,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenopathy > 0 THEN 1 END)  as lymphadenopathy,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenitis > 0 THEN 1 END)  as lymphadenitis,
															COUNT(CASE WHEN aefi_form_1_vac.sterile_abscess > 0 THEN 1 END)  as sterile_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.bacterial_abscess > 0 THEN 1 END)  as bacterial_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.febrile_convulsion > 0 THEN 1 END)  as febrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.afebrile_convulsion > 0 THEN 1 END)  as afebrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.encephalopathy > 0 THEN 1 END)  as encephalopathy,
															COUNT(CASE WHEN aefi_form_1_vac.flaccid_paralysis > 0 THEN 1 END)  as flaccid_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.spastic_paralysis > 0 THEN 1 END)  as spastic_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.hhe > 0 THEN 1 END)  as hhe,
															COUNT(CASE WHEN aefi_form_1_vac.persistent_inconsolable_crying > 0 THEN 1 END)  as persistent_inconsolable_crying,
															COUNT(CASE WHEN aefi_form_1_vac.thrombocytopenia > 0 THEN 1 END)  as thrombocytopenia,
															COUNT(CASE WHEN aefi_form_1_vac.osteomyelitis > 0 THEN 1 END)  as osteomyelitis,
															COUNT(CASE WHEN aefi_form_1_vac.toxic_shock_syndrome > 0 THEN 1 END)  as toxic_shock_syndrome,
															COUNT(CASE WHEN aefi_form_1_vac.sepsis > 0 THEN 1 END)  as sepsis,
															COUNT(CASE WHEN aefi_form_1_vac.anaphylaxis > 0 THEN 1 END)  as anaphylaxis,
															COUNT(CASE WHEN aefi_form_1_vac.transverse_myelitis > 0 THEN 1 END)  as transverse_myelitis,
															COUNT(CASE WHEN aefi_form_1_vac.gbs > 0 THEN 1 END)  as gbs,
															COUNT(CASE WHEN aefi_form_1_vac.adem > 0 THEN 1 END)  as adem,
															COUNT(CASE WHEN aefi_form_1_vac.acute_myocardial > 0 THEN 1 END)  as acute_myocardial,
															COUNT(CASE WHEN aefi_form_1_vac.ards > 0 THEN 1 END)  as ards,
															COUNT(CASE WHEN aefi_form_1_vac.symptoms_later_immunized > 0 THEN 1 END)  as symptoms_later_immunized,
															COUNT(CASE WHEN aefi_form_1_vac.chest_pain > 0 THEN 1 END)  as chest_pain,
															COUNT(CASE WHEN aefi_form_1_vac.myocarditis > 0 THEN 1 END)  as myocarditis,
															COUNT(CASE WHEN aefi_form_1_vac.heart_failure > 0 THEN 1 END)  as heart_failure,
															COUNT(CASE WHEN aefi_form_1_vac.pericarditis > 0 THEN 1 END)  as pericarditis,
															COUNT(CASE WHEN aefi_form_1_vac.sudden_cardiac_arrest > 0 THEN 1 END)  as sudden_cardiac_arrest,
															COUNT(CASE WHEN aefi_form_1_vac.covid_19 > 0 THEN 1 END)  as covid_19,
															COUNT(CASE WHEN aefi_form_1_vac.ischemic_stroke > 0 THEN 1 END)  as ischemic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.hemorrhagic_stroke > 0 THEN 1 END)  as hemorrhagic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.deep_vein_thrombosis > 0 THEN 1 END)  as deep_vein_thrombosis,
															COUNT(CASE WHEN aefi_form_1_vac.pulmonary_embolism > 0 THEN 1 END)  as pulmonary_embolism,
															COUNT(CASE WHEN aefi_form_1_vac.hypertension > 0 THEN 1 END)  as hypertension,
															COUNT(CASE WHEN aefi_form_1_vac.hypertensive_urgency > 0 THEN 1 END)  as hypertensive_urgency,
															COUNT(CASE WHEN aefi_form_1_vac.bells_palsy > 0 THEN 1 END)  as bells_palsy,
															COUNT(CASE WHEN aefi_form_1_vac.symptom_status > 0 THEN 1 END)  as symptom_status,
															COUNT(CASE WHEN aefi_form_1_vac.abortion > 0 THEN 1 END)  as abortion,
															COUNT(CASE WHEN aefi_form_1_vac.abruptio_placenta > 0 THEN 1 END)  as abruptio_placenta,
															COUNT(CASE WHEN aefi_form_1_vac.dfiu > 0 THEN 1 END)  as dfiu,
															COUNT(CASE WHEN aefi_form_1_vac.main_diagnosis > 0 THEN 1 END)  as main_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.meningitis > 0 THEN 1 END)  as meningitis,
															COUNT(CASE WHEN aefi_form_1_vac.minor_diagnosis > 0 THEN 1 END)  as minor_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.other_pregnant_symptoms > 0 THEN 1 END)  as other_pregnant_symptoms,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized_text > 0 THEN 1 END)  as other_symptoms_later_immunized_text,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized > 0 THEN 1 END)  as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','41')
										->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac42 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
															 COUNT(aefi_form_1_vac.name_of_vaccine)  as count_name_of_vaccine,
										 					COUNT(CASE WHEN aefi_form_1_vac.rash > 0 THEN 1 END)  as rash,
															COUNT(CASE WHEN aefi_form_1_vac.erythema > 0 THEN 1 END)  as erythema,
															COUNT(CASE WHEN aefi_form_1_vac.urticaria > 0 THEN 1 END)  as urticaria,
															COUNT(CASE WHEN aefi_form_1_vac.itching > 0 THEN 1 END)  as itching,
															COUNT(CASE WHEN aefi_form_1_vac.edema > 0 THEN 1 END)  as edema,
															COUNT(CASE WHEN aefi_form_1_vac.angioedema > 0 THEN 1 END)  as angioedema,
															COUNT(CASE WHEN aefi_form_1_vac.fainting > 0 THEN 1 END)  as fainting,
															COUNT(CASE WHEN aefi_form_1_vac.hyperventilation > 0 THEN 1 END)  as hyperventilation,
															COUNT(CASE WHEN aefi_form_1_vac.syncope > 0 THEN 1 END)  as syncope,
															COUNT(CASE WHEN aefi_form_1_vac.headche > 0 THEN 1 END)  as headche,
															COUNT(CASE WHEN aefi_form_1_vac.dizziness > 0 THEN 1 END)  as dizziness,
															COUNT(CASE WHEN aefi_form_1_vac.fatigue > 0 THEN 1 END)  as fatigue,
															COUNT(CASE WHEN aefi_form_1_vac.malaise > 0 THEN 1 END)  as malaise,
															COUNT(CASE WHEN aefi_form_1_vac.dyspepsia > 0 THEN 1 END)  as dyspepsia,
															COUNT(CASE WHEN aefi_form_1_vac.diarrhea > 0 THEN 1 END)  as diarrhea,
															COUNT(CASE WHEN aefi_form_1_vac.nausea > 0 THEN 1 END)  as nausea,
															COUNT(CASE WHEN aefi_form_1_vac.vomiting > 0 THEN 1 END)  as vomiting,
															COUNT(CASE WHEN aefi_form_1_vac.abdominal_pain > 0 THEN 1 END)  as abdominal_pain,
															COUNT(CASE WHEN aefi_form_1_vac.arthalgia > 0 THEN 1 END)  as arthalgia,
															COUNT(CASE WHEN aefi_form_1_vac.myalgia > 0 THEN 1 END)  as myalgia,
															COUNT(CASE WHEN aefi_form_1_vac.fever38c > 0 THEN 1 END)  as fever38c,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_at_the_injection > 0 THEN 1 END)  as swelling_at_the_injection,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_beyond_nearest_joint > 0 THEN 1 END)  as swelling_beyond_nearest_joint,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenopathy > 0 THEN 1 END)  as lymphadenopathy,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenitis > 0 THEN 1 END)  as lymphadenitis,
															COUNT(CASE WHEN aefi_form_1_vac.sterile_abscess > 0 THEN 1 END)  as sterile_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.bacterial_abscess > 0 THEN 1 END)  as bacterial_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.febrile_convulsion > 0 THEN 1 END)  as febrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.afebrile_convulsion > 0 THEN 1 END)  as afebrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.encephalopathy > 0 THEN 1 END)  as encephalopathy,
															COUNT(CASE WHEN aefi_form_1_vac.flaccid_paralysis > 0 THEN 1 END)  as flaccid_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.spastic_paralysis > 0 THEN 1 END)  as spastic_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.hhe > 0 THEN 1 END)  as hhe,
															COUNT(CASE WHEN aefi_form_1_vac.persistent_inconsolable_crying > 0 THEN 1 END)  as persistent_inconsolable_crying,
															COUNT(CASE WHEN aefi_form_1_vac.thrombocytopenia > 0 THEN 1 END)  as thrombocytopenia,
															COUNT(CASE WHEN aefi_form_1_vac.osteomyelitis > 0 THEN 1 END)  as osteomyelitis,
															COUNT(CASE WHEN aefi_form_1_vac.toxic_shock_syndrome > 0 THEN 1 END)  as toxic_shock_syndrome,
															COUNT(CASE WHEN aefi_form_1_vac.sepsis > 0 THEN 1 END)  as sepsis,
															COUNT(CASE WHEN aefi_form_1_vac.anaphylaxis > 0 THEN 1 END)  as anaphylaxis,
															COUNT(CASE WHEN aefi_form_1_vac.transverse_myelitis > 0 THEN 1 END)  as transverse_myelitis,
															COUNT(CASE WHEN aefi_form_1_vac.gbs > 0 THEN 1 END)  as gbs,
															COUNT(CASE WHEN aefi_form_1_vac.adem > 0 THEN 1 END)  as adem,
															COUNT(CASE WHEN aefi_form_1_vac.acute_myocardial > 0 THEN 1 END)  as acute_myocardial,
															COUNT(CASE WHEN aefi_form_1_vac.ards > 0 THEN 1 END)  as ards,
															COUNT(CASE WHEN aefi_form_1_vac.symptoms_later_immunized > 0 THEN 1 END)  as symptoms_later_immunized,
															COUNT(CASE WHEN aefi_form_1_vac.chest_pain > 0 THEN 1 END)  as chest_pain,
															COUNT(CASE WHEN aefi_form_1_vac.myocarditis > 0 THEN 1 END)  as myocarditis,
															COUNT(CASE WHEN aefi_form_1_vac.heart_failure > 0 THEN 1 END)  as heart_failure,
															COUNT(CASE WHEN aefi_form_1_vac.pericarditis > 0 THEN 1 END)  as pericarditis,
															COUNT(CASE WHEN aefi_form_1_vac.sudden_cardiac_arrest > 0 THEN 1 END)  as sudden_cardiac_arrest,
															COUNT(CASE WHEN aefi_form_1_vac.covid_19 > 0 THEN 1 END)  as covid_19,
															COUNT(CASE WHEN aefi_form_1_vac.ischemic_stroke > 0 THEN 1 END)  as ischemic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.hemorrhagic_stroke > 0 THEN 1 END)  as hemorrhagic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.deep_vein_thrombosis > 0 THEN 1 END)  as deep_vein_thrombosis,
															COUNT(CASE WHEN aefi_form_1_vac.pulmonary_embolism > 0 THEN 1 END)  as pulmonary_embolism,
															COUNT(CASE WHEN aefi_form_1_vac.hypertension > 0 THEN 1 END)  as hypertension,
															COUNT(CASE WHEN aefi_form_1_vac.hypertensive_urgency > 0 THEN 1 END)  as hypertensive_urgency,
															COUNT(CASE WHEN aefi_form_1_vac.bells_palsy > 0 THEN 1 END)  as bells_palsy,
															COUNT(CASE WHEN aefi_form_1_vac.symptom_status > 0 THEN 1 END)  as symptom_status,
															COUNT(CASE WHEN aefi_form_1_vac.abortion > 0 THEN 1 END)  as abortion,
															COUNT(CASE WHEN aefi_form_1_vac.abruptio_placenta > 0 THEN 1 END)  as abruptio_placenta,
															COUNT(CASE WHEN aefi_form_1_vac.dfiu > 0 THEN 1 END)  as dfiu,
															COUNT(CASE WHEN aefi_form_1_vac.main_diagnosis > 0 THEN 1 END)  as main_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.meningitis > 0 THEN 1 END)  as meningitis,
															COUNT(CASE WHEN aefi_form_1_vac.minor_diagnosis > 0 THEN 1 END)  as minor_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.other_pregnant_symptoms > 0 THEN 1 END)  as other_pregnant_symptoms,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized_text > 0 THEN 1 END)  as other_symptoms_later_immunized_text,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized > 0 THEN 1 END)  as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','42')
										->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac43 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
															 COUNT(aefi_form_1_vac.name_of_vaccine)  as count_name_of_vaccine,
										 					COUNT(CASE WHEN aefi_form_1_vac.rash > 0 THEN 1 END)  as rash,
															COUNT(CASE WHEN aefi_form_1_vac.erythema > 0 THEN 1 END)  as erythema,
															COUNT(CASE WHEN aefi_form_1_vac.urticaria > 0 THEN 1 END)  as urticaria,
															COUNT(CASE WHEN aefi_form_1_vac.itching > 0 THEN 1 END)  as itching,
															COUNT(CASE WHEN aefi_form_1_vac.edema > 0 THEN 1 END)  as edema,
															COUNT(CASE WHEN aefi_form_1_vac.angioedema > 0 THEN 1 END)  as angioedema,
															COUNT(CASE WHEN aefi_form_1_vac.fainting > 0 THEN 1 END)  as fainting,
															COUNT(CASE WHEN aefi_form_1_vac.hyperventilation > 0 THEN 1 END)  as hyperventilation,
															COUNT(CASE WHEN aefi_form_1_vac.syncope > 0 THEN 1 END)  as syncope,
															COUNT(CASE WHEN aefi_form_1_vac.headche > 0 THEN 1 END)  as headche,
															COUNT(CASE WHEN aefi_form_1_vac.dizziness > 0 THEN 1 END)  as dizziness,
															COUNT(CASE WHEN aefi_form_1_vac.fatigue > 0 THEN 1 END)  as fatigue,
															COUNT(CASE WHEN aefi_form_1_vac.malaise > 0 THEN 1 END)  as malaise,
															COUNT(CASE WHEN aefi_form_1_vac.dyspepsia > 0 THEN 1 END)  as dyspepsia,
															COUNT(CASE WHEN aefi_form_1_vac.diarrhea > 0 THEN 1 END)  as diarrhea,
															COUNT(CASE WHEN aefi_form_1_vac.nausea > 0 THEN 1 END)  as nausea,
															COUNT(CASE WHEN aefi_form_1_vac.vomiting > 0 THEN 1 END)  as vomiting,
															COUNT(CASE WHEN aefi_form_1_vac.abdominal_pain > 0 THEN 1 END)  as abdominal_pain,
															COUNT(CASE WHEN aefi_form_1_vac.arthalgia > 0 THEN 1 END)  as arthalgia,
															COUNT(CASE WHEN aefi_form_1_vac.myalgia > 0 THEN 1 END)  as myalgia,
															COUNT(CASE WHEN aefi_form_1_vac.fever38c > 0 THEN 1 END)  as fever38c,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_at_the_injection > 0 THEN 1 END)  as swelling_at_the_injection,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_beyond_nearest_joint > 0 THEN 1 END)  as swelling_beyond_nearest_joint,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenopathy > 0 THEN 1 END)  as lymphadenopathy,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenitis > 0 THEN 1 END)  as lymphadenitis,
															COUNT(CASE WHEN aefi_form_1_vac.sterile_abscess > 0 THEN 1 END)  as sterile_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.bacterial_abscess > 0 THEN 1 END)  as bacterial_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.febrile_convulsion > 0 THEN 1 END)  as febrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.afebrile_convulsion > 0 THEN 1 END)  as afebrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.encephalopathy > 0 THEN 1 END)  as encephalopathy,
															COUNT(CASE WHEN aefi_form_1_vac.flaccid_paralysis > 0 THEN 1 END)  as flaccid_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.spastic_paralysis > 0 THEN 1 END)  as spastic_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.hhe > 0 THEN 1 END)  as hhe,
															COUNT(CASE WHEN aefi_form_1_vac.persistent_inconsolable_crying > 0 THEN 1 END)  as persistent_inconsolable_crying,
															COUNT(CASE WHEN aefi_form_1_vac.thrombocytopenia > 0 THEN 1 END)  as thrombocytopenia,
															COUNT(CASE WHEN aefi_form_1_vac.osteomyelitis > 0 THEN 1 END)  as osteomyelitis,
															COUNT(CASE WHEN aefi_form_1_vac.toxic_shock_syndrome > 0 THEN 1 END)  as toxic_shock_syndrome,
															COUNT(CASE WHEN aefi_form_1_vac.sepsis > 0 THEN 1 END)  as sepsis,
															COUNT(CASE WHEN aefi_form_1_vac.anaphylaxis > 0 THEN 1 END)  as anaphylaxis,
															COUNT(CASE WHEN aefi_form_1_vac.transverse_myelitis > 0 THEN 1 END)  as transverse_myelitis,
															COUNT(CASE WHEN aefi_form_1_vac.gbs > 0 THEN 1 END)  as gbs,
															COUNT(CASE WHEN aefi_form_1_vac.adem > 0 THEN 1 END)  as adem,
															COUNT(CASE WHEN aefi_form_1_vac.acute_myocardial > 0 THEN 1 END)  as acute_myocardial,
															COUNT(CASE WHEN aefi_form_1_vac.ards > 0 THEN 1 END)  as ards,
															COUNT(CASE WHEN aefi_form_1_vac.symptoms_later_immunized > 0 THEN 1 END)  as symptoms_later_immunized,
															COUNT(CASE WHEN aefi_form_1_vac.chest_pain > 0 THEN 1 END)  as chest_pain,
															COUNT(CASE WHEN aefi_form_1_vac.myocarditis > 0 THEN 1 END)  as myocarditis,
															COUNT(CASE WHEN aefi_form_1_vac.heart_failure > 0 THEN 1 END)  as heart_failure,
															COUNT(CASE WHEN aefi_form_1_vac.pericarditis > 0 THEN 1 END)  as pericarditis,
															COUNT(CASE WHEN aefi_form_1_vac.sudden_cardiac_arrest > 0 THEN 1 END)  as sudden_cardiac_arrest,
															COUNT(CASE WHEN aefi_form_1_vac.covid_19 > 0 THEN 1 END)  as covid_19,
															COUNT(CASE WHEN aefi_form_1_vac.ischemic_stroke > 0 THEN 1 END)  as ischemic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.hemorrhagic_stroke > 0 THEN 1 END)  as hemorrhagic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.deep_vein_thrombosis > 0 THEN 1 END)  as deep_vein_thrombosis,
															COUNT(CASE WHEN aefi_form_1_vac.pulmonary_embolism > 0 THEN 1 END)  as pulmonary_embolism,
															COUNT(CASE WHEN aefi_form_1_vac.hypertension > 0 THEN 1 END)  as hypertension,
															COUNT(CASE WHEN aefi_form_1_vac.hypertensive_urgency > 0 THEN 1 END)  as hypertensive_urgency,
															COUNT(CASE WHEN aefi_form_1_vac.bells_palsy > 0 THEN 1 END)  as bells_palsy,
															COUNT(CASE WHEN aefi_form_1_vac.symptom_status > 0 THEN 1 END)  as symptom_status,
															COUNT(CASE WHEN aefi_form_1_vac.abortion > 0 THEN 1 END)  as abortion,
															COUNT(CASE WHEN aefi_form_1_vac.abruptio_placenta > 0 THEN 1 END)  as abruptio_placenta,
															COUNT(CASE WHEN aefi_form_1_vac.dfiu > 0 THEN 1 END)  as dfiu,
															COUNT(CASE WHEN aefi_form_1_vac.main_diagnosis > 0 THEN 1 END)  as main_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.meningitis > 0 THEN 1 END)  as meningitis,
															COUNT(CASE WHEN aefi_form_1_vac.minor_diagnosis > 0 THEN 1 END)  as minor_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.other_pregnant_symptoms > 0 THEN 1 END)  as other_pregnant_symptoms,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized_text > 0 THEN 1 END)  as other_symptoms_later_immunized_text,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized > 0 THEN 1 END)  as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','43')
										->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac44 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
															 COUNT(aefi_form_1_vac.name_of_vaccine)  as count_name_of_vaccine,
										 					COUNT(CASE WHEN aefi_form_1_vac.rash > 0 THEN 1 END)  as rash,
															COUNT(CASE WHEN aefi_form_1_vac.erythema > 0 THEN 1 END)  as erythema,
															COUNT(CASE WHEN aefi_form_1_vac.urticaria > 0 THEN 1 END)  as urticaria,
															COUNT(CASE WHEN aefi_form_1_vac.itching > 0 THEN 1 END)  as itching,
															COUNT(CASE WHEN aefi_form_1_vac.edema > 0 THEN 1 END)  as edema,
															COUNT(CASE WHEN aefi_form_1_vac.angioedema > 0 THEN 1 END)  as angioedema,
															COUNT(CASE WHEN aefi_form_1_vac.fainting > 0 THEN 1 END)  as fainting,
															COUNT(CASE WHEN aefi_form_1_vac.hyperventilation > 0 THEN 1 END)  as hyperventilation,
															COUNT(CASE WHEN aefi_form_1_vac.syncope > 0 THEN 1 END)  as syncope,
															COUNT(CASE WHEN aefi_form_1_vac.headche > 0 THEN 1 END)  as headche,
															COUNT(CASE WHEN aefi_form_1_vac.dizziness > 0 THEN 1 END)  as dizziness,
															COUNT(CASE WHEN aefi_form_1_vac.fatigue > 0 THEN 1 END)  as fatigue,
															COUNT(CASE WHEN aefi_form_1_vac.malaise > 0 THEN 1 END)  as malaise,
															COUNT(CASE WHEN aefi_form_1_vac.dyspepsia > 0 THEN 1 END)  as dyspepsia,
															COUNT(CASE WHEN aefi_form_1_vac.diarrhea > 0 THEN 1 END)  as diarrhea,
															COUNT(CASE WHEN aefi_form_1_vac.nausea > 0 THEN 1 END)  as nausea,
															COUNT(CASE WHEN aefi_form_1_vac.vomiting > 0 THEN 1 END)  as vomiting,
															COUNT(CASE WHEN aefi_form_1_vac.abdominal_pain > 0 THEN 1 END)  as abdominal_pain,
															COUNT(CASE WHEN aefi_form_1_vac.arthalgia > 0 THEN 1 END)  as arthalgia,
															COUNT(CASE WHEN aefi_form_1_vac.myalgia > 0 THEN 1 END)  as myalgia,
															COUNT(CASE WHEN aefi_form_1_vac.fever38c > 0 THEN 1 END)  as fever38c,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_at_the_injection > 0 THEN 1 END)  as swelling_at_the_injection,
															COUNT(CASE WHEN aefi_form_1_vac.swelling_beyond_nearest_joint > 0 THEN 1 END)  as swelling_beyond_nearest_joint,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenopathy > 0 THEN 1 END)  as lymphadenopathy,
															COUNT(CASE WHEN aefi_form_1_vac.lymphadenitis > 0 THEN 1 END)  as lymphadenitis,
															COUNT(CASE WHEN aefi_form_1_vac.sterile_abscess > 0 THEN 1 END)  as sterile_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.bacterial_abscess > 0 THEN 1 END)  as bacterial_abscess,
															COUNT(CASE WHEN aefi_form_1_vac.febrile_convulsion > 0 THEN 1 END)  as febrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.afebrile_convulsion > 0 THEN 1 END)  as afebrile_convulsion,
															COUNT(CASE WHEN aefi_form_1_vac.encephalopathy > 0 THEN 1 END)  as encephalopathy,
															COUNT(CASE WHEN aefi_form_1_vac.flaccid_paralysis > 0 THEN 1 END)  as flaccid_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.spastic_paralysis > 0 THEN 1 END)  as spastic_paralysis,
															COUNT(CASE WHEN aefi_form_1_vac.hhe > 0 THEN 1 END)  as hhe,
															COUNT(CASE WHEN aefi_form_1_vac.persistent_inconsolable_crying > 0 THEN 1 END)  as persistent_inconsolable_crying,
															COUNT(CASE WHEN aefi_form_1_vac.thrombocytopenia > 0 THEN 1 END)  as thrombocytopenia,
															COUNT(CASE WHEN aefi_form_1_vac.osteomyelitis > 0 THEN 1 END)  as osteomyelitis,
															COUNT(CASE WHEN aefi_form_1_vac.toxic_shock_syndrome > 0 THEN 1 END)  as toxic_shock_syndrome,
															COUNT(CASE WHEN aefi_form_1_vac.sepsis > 0 THEN 1 END)  as sepsis,
															COUNT(CASE WHEN aefi_form_1_vac.anaphylaxis > 0 THEN 1 END)  as anaphylaxis,
															COUNT(CASE WHEN aefi_form_1_vac.transverse_myelitis > 0 THEN 1 END)  as transverse_myelitis,
															COUNT(CASE WHEN aefi_form_1_vac.gbs > 0 THEN 1 END)  as gbs,
															COUNT(CASE WHEN aefi_form_1_vac.adem > 0 THEN 1 END)  as adem,
															COUNT(CASE WHEN aefi_form_1_vac.acute_myocardial > 0 THEN 1 END)  as acute_myocardial,
															COUNT(CASE WHEN aefi_form_1_vac.ards > 0 THEN 1 END)  as ards,
															COUNT(CASE WHEN aefi_form_1_vac.symptoms_later_immunized > 0 THEN 1 END)  as symptoms_later_immunized,
															COUNT(CASE WHEN aefi_form_1_vac.chest_pain > 0 THEN 1 END)  as chest_pain,
															COUNT(CASE WHEN aefi_form_1_vac.myocarditis > 0 THEN 1 END)  as myocarditis,
															COUNT(CASE WHEN aefi_form_1_vac.heart_failure > 0 THEN 1 END)  as heart_failure,
															COUNT(CASE WHEN aefi_form_1_vac.pericarditis > 0 THEN 1 END)  as pericarditis,
															COUNT(CASE WHEN aefi_form_1_vac.sudden_cardiac_arrest > 0 THEN 1 END)  as sudden_cardiac_arrest,
															COUNT(CASE WHEN aefi_form_1_vac.covid_19 > 0 THEN 1 END)  as covid_19,
															COUNT(CASE WHEN aefi_form_1_vac.ischemic_stroke > 0 THEN 1 END)  as ischemic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.hemorrhagic_stroke > 0 THEN 1 END)  as hemorrhagic_stroke,
															COUNT(CASE WHEN aefi_form_1_vac.deep_vein_thrombosis > 0 THEN 1 END)  as deep_vein_thrombosis,
															COUNT(CASE WHEN aefi_form_1_vac.pulmonary_embolism > 0 THEN 1 END)  as pulmonary_embolism,
															COUNT(CASE WHEN aefi_form_1_vac.hypertension > 0 THEN 1 END)  as hypertension,
															COUNT(CASE WHEN aefi_form_1_vac.hypertensive_urgency > 0 THEN 1 END)  as hypertensive_urgency,
															COUNT(CASE WHEN aefi_form_1_vac.bells_palsy > 0 THEN 1 END)  as bells_palsy,
															COUNT(CASE WHEN aefi_form_1_vac.symptom_status > 0 THEN 1 END)  as symptom_status,
															COUNT(CASE WHEN aefi_form_1_vac.abortion > 0 THEN 1 END)  as abortion,
															COUNT(CASE WHEN aefi_form_1_vac.abruptio_placenta > 0 THEN 1 END)  as abruptio_placenta,
															COUNT(CASE WHEN aefi_form_1_vac.dfiu > 0 THEN 1 END)  as dfiu,
															COUNT(CASE WHEN aefi_form_1_vac.main_diagnosis > 0 THEN 1 END)  as main_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.meningitis > 0 THEN 1 END)  as meningitis,
															COUNT(CASE WHEN aefi_form_1_vac.minor_diagnosis > 0 THEN 1 END)  as minor_diagnosis,
															COUNT(CASE WHEN aefi_form_1_vac.other_pregnant_symptoms > 0 THEN 1 END)  as other_pregnant_symptoms,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized_text > 0 THEN 1 END)  as other_symptoms_later_immunized_text,
															COUNT(CASE WHEN aefi_form_1_vac.other_symptoms_later_immunized > 0 THEN 1 END)  as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','44')
										->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$covid_vac = [39, 40, 41,42,43,44];
							// dd($covid_vac);
							$count_week = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->whereIn('name_of_vaccine',$covid_vac)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_week_39 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->where('name_of_vaccine',39)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_week_40 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->where('name_of_vaccine',40)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_week_41 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->where('name_of_vaccine',41)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_week_42 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->where('name_of_vaccine',42)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_week_43 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->where('name_of_vaccine',43)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_week_44 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('	WEEK(aefi_form_1_vac.date_entry) AS Week,
										 					COUNT(aefi_form_1_vac.name_of_vaccine)  as count_case
										 					'))
										 ->where('status','=',null)
										 ->where('name_of_vaccine',44)
										 ->whereYear('aefi_form_1_vac.date_entry', '=',$yearnow)
            							// ->whereMonth('aefi_form_1_vac.date_entry', '=', $monthnow)
										 ->groupBy('Week')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
							$count_prov = DB::table('aefi_form_1')
										 ->leftJoin('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
										 ->select(DB::raw('count(aefi_form_1.id) as count_prov , aefi_form_1.province , aefi_form_1.date_entry'))
										 ->where('aefi_form_1.status','=',null)
									 	 ->whereIn('aefi_form_1_vac.name_of_vaccine',[39, 40, 41, 42, 43, 44])
										 ->whereYear('aefi_form_1.date_entry' ,$yearnow)
										 ->groupBy('aefi_form_1.date_entry')
										 ->orderBy('aefi_form_1.date_entry', 'asc')
										 ->get();
			//  dd($count_prov);
			// dd($count_week);
			// dd($count_vac39,$count_vac40,$count_vac41,$count_vac42,$count_vac43,$count_vac44);							 
			return view('AEFI.Apps.dashboardcovid',compact(
			 'listProvince',
			 'listvac_arr',
			 'yearnow',
			 'datenow',
			 'timenow',
			 'count_vac39',
			 'count_vac40',
			 'count_vac41', 
			 'count_vac42',
			 'count_vac43',
			 'count_vac44',
			 'count_week',
			 'count_week_39',
			 'count_week_40',
			 'count_week_41',
			 'count_week_42',
			 'count_week_43',
			 'count_week_44',
			 'count_prov'
			 
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
