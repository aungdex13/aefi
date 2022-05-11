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
			$listvac_arr =  $this->listvac_arr();
			$count_vac39 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
										 					count(aefi_form_1_vac.rash) as rash,
															count(aefi_form_1_vac.erythema) as vac_count_erythema,
															count(aefi_form_1_vac.urticaria) as urticaria,
															count(aefi_form_1_vac.itching) as itching,
															count(aefi_form_1_vac.edema) as edema,
															count(aefi_form_1_vac.angioedema) as angioedema,
															count(aefi_form_1_vac.fainting) as fainting,
															count(aefi_form_1_vac.hyperventilation) as hyperventilation,
															count(aefi_form_1_vac.syncope) as syncope,
															count(aefi_form_1_vac.headche) as headche,
															count(aefi_form_1_vac.dizziness) as dizziness,
															count(aefi_form_1_vac.fatigue) as fatigue,
															count(aefi_form_1_vac.malaise) as malaise,
															count(aefi_form_1_vac.dyspepsia) as dyspepsia,
															count(aefi_form_1_vac.diarrhea) as diarrhea,
															count(aefi_form_1_vac.nausea) as nausea,
															count(aefi_form_1_vac.vomiting) as vomiting,
															count(aefi_form_1_vac.abdominal_pain) as abdominal_pain,
															count(aefi_form_1_vac.arthalgia) as arthalgia,
															count(aefi_form_1_vac.myalgia) as myalgia,
															count(aefi_form_1_vac.fever38c) as fever38c,
															count(aefi_form_1_vac.swelling_at_the_injection) as swelling_at_the_injection,
															count(aefi_form_1_vac.swelling_beyond_nearest_joint) as swelling_beyond_nearest_joint,
															count(aefi_form_1_vac.lymphadenopathy) as lymphadenopathy,
															count(aefi_form_1_vac.lymphadenitis) as lymphadenitis,
															count(aefi_form_1_vac.sterile_abscess) as sterile_abscess,
															count(aefi_form_1_vac.bacterial_abscess) as bacterial_abscess,
															count(aefi_form_1_vac.febrile_convulsion) as febrile_convulsion,
															count(aefi_form_1_vac.afebrile_convulsion) as afebrile_convulsion,
															count(aefi_form_1_vac.encephalopathy) as encephalopathy,
															count(aefi_form_1_vac.flaccid_paralysis) as flaccid_paralysis,
															count(aefi_form_1_vac.spastic_paralysis) as spastic_paralysis,
															count(aefi_form_1_vac.hhe) as hhe,
															count(aefi_form_1_vac.persistent_inconsolable_crying) as persistent_inconsolable_crying,
															count(aefi_form_1_vac.thrombocytopenia) as thrombocytopenia,
															count(aefi_form_1_vac.osteomyelitis) as osteomyelitis,
															count(aefi_form_1_vac.toxic_shock_syndrome) as toxic_shock_syndrome,
															count(aefi_form_1_vac.sepsis) as sepsis,
															count(aefi_form_1_vac.anaphylaxis) as anaphylaxis,
															count(aefi_form_1_vac.transverse_myelitis) as transverse_myelitis,
															count(aefi_form_1_vac.gbs) as gbs,
															count(aefi_form_1_vac.adem) as adem,
															count(aefi_form_1_vac.acute_myocardial) as acute_myocardial,
															count(aefi_form_1_vac.ards) as ards,
															count(aefi_form_1_vac.symptoms_later_immunized) as symptoms_later_immunized,
															count(aefi_form_1_vac.other_symptoms_later_immunized) as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','39')
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 			$count_vac40 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
										 					count(aefi_form_1_vac.rash) as rash,
															count(aefi_form_1_vac.erythema) as vac_count_erythema,
															count(aefi_form_1_vac.urticaria) as urticaria,
															count(aefi_form_1_vac.itching) as itching,
															count(aefi_form_1_vac.edema) as edema,
															count(aefi_form_1_vac.angioedema) as angioedema,
															count(aefi_form_1_vac.fainting) as fainting,
															count(aefi_form_1_vac.hyperventilation) as hyperventilation,
															count(aefi_form_1_vac.syncope) as syncope,
															count(aefi_form_1_vac.headche) as headche,
															count(aefi_form_1_vac.dizziness) as dizziness,
															count(aefi_form_1_vac.fatigue) as fatigue,
															count(aefi_form_1_vac.malaise) as malaise,
															count(aefi_form_1_vac.dyspepsia) as dyspepsia,
															count(aefi_form_1_vac.diarrhea) as diarrhea,
															count(aefi_form_1_vac.nausea) as nausea,
															count(aefi_form_1_vac.vomiting) as vomiting,
															count(aefi_form_1_vac.abdominal_pain) as abdominal_pain,
															count(aefi_form_1_vac.arthalgia) as arthalgia,
															count(aefi_form_1_vac.myalgia) as myalgia,
															count(aefi_form_1_vac.fever38c) as fever38c,
															count(aefi_form_1_vac.swelling_at_the_injection) as swelling_at_the_injection,
															count(aefi_form_1_vac.swelling_beyond_nearest_joint) as swelling_beyond_nearest_joint,
															count(aefi_form_1_vac.lymphadenopathy) as lymphadenopathy,
															count(aefi_form_1_vac.lymphadenitis) as lymphadenitis,
															count(aefi_form_1_vac.sterile_abscess) as sterile_abscess,
															count(aefi_form_1_vac.bacterial_abscess) as bacterial_abscess,
															count(aefi_form_1_vac.febrile_convulsion) as febrile_convulsion,
															count(aefi_form_1_vac.afebrile_convulsion) as afebrile_convulsion,
															count(aefi_form_1_vac.encephalopathy) as encephalopathy,
															count(aefi_form_1_vac.flaccid_paralysis) as flaccid_paralysis,
															count(aefi_form_1_vac.spastic_paralysis) as spastic_paralysis,
															count(aefi_form_1_vac.hhe) as hhe,
															count(aefi_form_1_vac.persistent_inconsolable_crying) as persistent_inconsolable_crying,
															count(aefi_form_1_vac.thrombocytopenia) as thrombocytopenia,
															count(aefi_form_1_vac.osteomyelitis) as osteomyelitis,
															count(aefi_form_1_vac.toxic_shock_syndrome) as toxic_shock_syndrome,
															count(aefi_form_1_vac.sepsis) as sepsis,
															count(aefi_form_1_vac.anaphylaxis) as anaphylaxis,
															count(aefi_form_1_vac.transverse_myelitis) as transverse_myelitis,
															count(aefi_form_1_vac.gbs) as gbs,
															count(aefi_form_1_vac.adem) as adem,
															count(aefi_form_1_vac.acute_myocardial) as acute_myocardial,
															count(aefi_form_1_vac.ards) as ards,
															count(aefi_form_1_vac.symptoms_later_immunized) as symptoms_later_immunized,
															count(aefi_form_1_vac.other_symptoms_later_immunized) as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','40')
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac41 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
										 					count(aefi_form_1_vac.rash) as rash,
															count(aefi_form_1_vac.erythema) as vac_count_erythema,
															count(aefi_form_1_vac.urticaria) as urticaria,
															count(aefi_form_1_vac.itching) as itching,
															count(aefi_form_1_vac.edema) as edema,
															count(aefi_form_1_vac.angioedema) as angioedema,
															count(aefi_form_1_vac.fainting) as fainting,
															count(aefi_form_1_vac.hyperventilation) as hyperventilation,
															count(aefi_form_1_vac.syncope) as syncope,
															count(aefi_form_1_vac.headche) as headche,
															count(aefi_form_1_vac.dizziness) as dizziness,
															count(aefi_form_1_vac.fatigue) as fatigue,
															count(aefi_form_1_vac.malaise) as malaise,
															count(aefi_form_1_vac.dyspepsia) as dyspepsia,
															count(aefi_form_1_vac.diarrhea) as diarrhea,
															count(aefi_form_1_vac.nausea) as nausea,
															count(aefi_form_1_vac.vomiting) as vomiting,
															count(aefi_form_1_vac.abdominal_pain) as abdominal_pain,
															count(aefi_form_1_vac.arthalgia) as arthalgia,
															count(aefi_form_1_vac.myalgia) as myalgia,
															count(aefi_form_1_vac.fever38c) as fever38c,
															count(aefi_form_1_vac.swelling_at_the_injection) as swelling_at_the_injection,
															count(aefi_form_1_vac.swelling_beyond_nearest_joint) as swelling_beyond_nearest_joint,
															count(aefi_form_1_vac.lymphadenopathy) as lymphadenopathy,
															count(aefi_form_1_vac.lymphadenitis) as lymphadenitis,
															count(aefi_form_1_vac.sterile_abscess) as sterile_abscess,
															count(aefi_form_1_vac.bacterial_abscess) as bacterial_abscess,
															count(aefi_form_1_vac.febrile_convulsion) as febrile_convulsion,
															count(aefi_form_1_vac.afebrile_convulsion) as afebrile_convulsion,
															count(aefi_form_1_vac.encephalopathy) as encephalopathy,
															count(aefi_form_1_vac.flaccid_paralysis) as flaccid_paralysis,
															count(aefi_form_1_vac.spastic_paralysis) as spastic_paralysis,
															count(aefi_form_1_vac.hhe) as hhe,
															count(aefi_form_1_vac.persistent_inconsolable_crying) as persistent_inconsolable_crying,
															count(aefi_form_1_vac.thrombocytopenia) as thrombocytopenia,
															count(aefi_form_1_vac.osteomyelitis) as osteomyelitis,
															count(aefi_form_1_vac.toxic_shock_syndrome) as toxic_shock_syndrome,
															count(aefi_form_1_vac.sepsis) as sepsis,
															count(aefi_form_1_vac.anaphylaxis) as anaphylaxis,
															count(aefi_form_1_vac.transverse_myelitis) as transverse_myelitis,
															count(aefi_form_1_vac.gbs) as gbs,
															count(aefi_form_1_vac.adem) as adem,
															count(aefi_form_1_vac.acute_myocardial) as acute_myocardial,
															count(aefi_form_1_vac.ards) as ards,
															count(aefi_form_1_vac.symptoms_later_immunized) as symptoms_later_immunized,
															count(aefi_form_1_vac.other_symptoms_later_immunized) as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','41')
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac42 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
										 					count(aefi_form_1_vac.rash) as rash,
															count(aefi_form_1_vac.erythema) as vac_count_erythema,
															count(aefi_form_1_vac.urticaria) as urticaria,
															count(aefi_form_1_vac.itching) as itching,
															count(aefi_form_1_vac.edema) as edema,
															count(aefi_form_1_vac.angioedema) as angioedema,
															count(aefi_form_1_vac.fainting) as fainting,
															count(aefi_form_1_vac.hyperventilation) as hyperventilation,
															count(aefi_form_1_vac.syncope) as syncope,
															count(aefi_form_1_vac.headche) as headche,
															count(aefi_form_1_vac.dizziness) as dizziness,
															count(aefi_form_1_vac.fatigue) as fatigue,
															count(aefi_form_1_vac.malaise) as malaise,
															count(aefi_form_1_vac.dyspepsia) as dyspepsia,
															count(aefi_form_1_vac.diarrhea) as diarrhea,
															count(aefi_form_1_vac.nausea) as nausea,
															count(aefi_form_1_vac.vomiting) as vomiting,
															count(aefi_form_1_vac.abdominal_pain) as abdominal_pain,
															count(aefi_form_1_vac.arthalgia) as arthalgia,
															count(aefi_form_1_vac.myalgia) as myalgia,
															count(aefi_form_1_vac.fever38c) as fever38c,
															count(aefi_form_1_vac.swelling_at_the_injection) as swelling_at_the_injection,
															count(aefi_form_1_vac.swelling_beyond_nearest_joint) as swelling_beyond_nearest_joint,
															count(aefi_form_1_vac.lymphadenopathy) as lymphadenopathy,
															count(aefi_form_1_vac.lymphadenitis) as lymphadenitis,
															count(aefi_form_1_vac.sterile_abscess) as sterile_abscess,
															count(aefi_form_1_vac.bacterial_abscess) as bacterial_abscess,
															count(aefi_form_1_vac.febrile_convulsion) as febrile_convulsion,
															count(aefi_form_1_vac.afebrile_convulsion) as afebrile_convulsion,
															count(aefi_form_1_vac.encephalopathy) as encephalopathy,
															count(aefi_form_1_vac.flaccid_paralysis) as flaccid_paralysis,
															count(aefi_form_1_vac.spastic_paralysis) as spastic_paralysis,
															count(aefi_form_1_vac.hhe) as hhe,
															count(aefi_form_1_vac.persistent_inconsolable_crying) as persistent_inconsolable_crying,
															count(aefi_form_1_vac.thrombocytopenia) as thrombocytopenia,
															count(aefi_form_1_vac.osteomyelitis) as osteomyelitis,
															count(aefi_form_1_vac.toxic_shock_syndrome) as toxic_shock_syndrome,
															count(aefi_form_1_vac.sepsis) as sepsis,
															count(aefi_form_1_vac.anaphylaxis) as anaphylaxis,
															count(aefi_form_1_vac.transverse_myelitis) as transverse_myelitis,
															count(aefi_form_1_vac.gbs) as gbs,
															count(aefi_form_1_vac.adem) as adem,
															count(aefi_form_1_vac.acute_myocardial) as acute_myocardial,
															count(aefi_form_1_vac.ards) as ards,
															count(aefi_form_1_vac.symptoms_later_immunized) as symptoms_later_immunized,
															count(aefi_form_1_vac.other_symptoms_later_immunized) as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','42')
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac43 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
										 					count(aefi_form_1_vac.rash) as rash,
															count(aefi_form_1_vac.erythema) as vac_count_erythema,
															count(aefi_form_1_vac.urticaria) as urticaria,
															count(aefi_form_1_vac.itching) as itching,
															count(aefi_form_1_vac.edema) as edema,
															count(aefi_form_1_vac.angioedema) as angioedema,
															count(aefi_form_1_vac.fainting) as fainting,
															count(aefi_form_1_vac.hyperventilation) as hyperventilation,
															count(aefi_form_1_vac.syncope) as syncope,
															count(aefi_form_1_vac.headche) as headche,
															count(aefi_form_1_vac.dizziness) as dizziness,
															count(aefi_form_1_vac.fatigue) as fatigue,
															count(aefi_form_1_vac.malaise) as malaise,
															count(aefi_form_1_vac.dyspepsia) as dyspepsia,
															count(aefi_form_1_vac.diarrhea) as diarrhea,
															count(aefi_form_1_vac.nausea) as nausea,
															count(aefi_form_1_vac.vomiting) as vomiting,
															count(aefi_form_1_vac.abdominal_pain) as abdominal_pain,
															count(aefi_form_1_vac.arthalgia) as arthalgia,
															count(aefi_form_1_vac.myalgia) as myalgia,
															count(aefi_form_1_vac.fever38c) as fever38c,
															count(aefi_form_1_vac.swelling_at_the_injection) as swelling_at_the_injection,
															count(aefi_form_1_vac.swelling_beyond_nearest_joint) as swelling_beyond_nearest_joint,
															count(aefi_form_1_vac.lymphadenopathy) as lymphadenopathy,
															count(aefi_form_1_vac.lymphadenitis) as lymphadenitis,
															count(aefi_form_1_vac.sterile_abscess) as sterile_abscess,
															count(aefi_form_1_vac.bacterial_abscess) as bacterial_abscess,
															count(aefi_form_1_vac.febrile_convulsion) as febrile_convulsion,
															count(aefi_form_1_vac.afebrile_convulsion) as afebrile_convulsion,
															count(aefi_form_1_vac.encephalopathy) as encephalopathy,
															count(aefi_form_1_vac.flaccid_paralysis) as flaccid_paralysis,
															count(aefi_form_1_vac.spastic_paralysis) as spastic_paralysis,
															count(aefi_form_1_vac.hhe) as hhe,
															count(aefi_form_1_vac.persistent_inconsolable_crying) as persistent_inconsolable_crying,
															count(aefi_form_1_vac.thrombocytopenia) as thrombocytopenia,
															count(aefi_form_1_vac.osteomyelitis) as osteomyelitis,
															count(aefi_form_1_vac.toxic_shock_syndrome) as toxic_shock_syndrome,
															count(aefi_form_1_vac.sepsis) as sepsis,
															count(aefi_form_1_vac.anaphylaxis) as anaphylaxis,
															count(aefi_form_1_vac.transverse_myelitis) as transverse_myelitis,
															count(aefi_form_1_vac.gbs) as gbs,
															count(aefi_form_1_vac.adem) as adem,
															count(aefi_form_1_vac.acute_myocardial) as acute_myocardial,
															count(aefi_form_1_vac.ards) as ards,
															count(aefi_form_1_vac.symptoms_later_immunized) as symptoms_later_immunized,
															count(aefi_form_1_vac.other_symptoms_later_immunized) as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','43')
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
										 $count_vac44 = DB::table('aefi_form_1_vac')
										 ->select(DB::raw('
										 					name_of_vaccine,
										 					count(aefi_form_1_vac.rash) as rash,
															count(aefi_form_1_vac.erythema) as vac_count_erythema,
															count(aefi_form_1_vac.urticaria) as urticaria,
															count(aefi_form_1_vac.itching) as itching,
															count(aefi_form_1_vac.edema) as edema,
															count(aefi_form_1_vac.angioedema) as angioedema,
															count(aefi_form_1_vac.fainting) as fainting,
															count(aefi_form_1_vac.hyperventilation) as hyperventilation,
															count(aefi_form_1_vac.syncope) as syncope,
															count(aefi_form_1_vac.headche) as headche,
															count(aefi_form_1_vac.dizziness) as dizziness,
															count(aefi_form_1_vac.fatigue) as fatigue,
															count(aefi_form_1_vac.malaise) as malaise,
															count(aefi_form_1_vac.dyspepsia) as dyspepsia,
															count(aefi_form_1_vac.diarrhea) as diarrhea,
															count(aefi_form_1_vac.nausea) as nausea,
															count(aefi_form_1_vac.vomiting) as vomiting,
															count(aefi_form_1_vac.abdominal_pain) as abdominal_pain,
															count(aefi_form_1_vac.arthalgia) as arthalgia,
															count(aefi_form_1_vac.myalgia) as myalgia,
															count(aefi_form_1_vac.fever38c) as fever38c,
															count(aefi_form_1_vac.swelling_at_the_injection) as swelling_at_the_injection,
															count(aefi_form_1_vac.swelling_beyond_nearest_joint) as swelling_beyond_nearest_joint,
															count(aefi_form_1_vac.lymphadenopathy) as lymphadenopathy,
															count(aefi_form_1_vac.lymphadenitis) as lymphadenitis,
															count(aefi_form_1_vac.sterile_abscess) as sterile_abscess,
															count(aefi_form_1_vac.bacterial_abscess) as bacterial_abscess,
															count(aefi_form_1_vac.febrile_convulsion) as febrile_convulsion,
															count(aefi_form_1_vac.afebrile_convulsion) as afebrile_convulsion,
															count(aefi_form_1_vac.encephalopathy) as encephalopathy,
															count(aefi_form_1_vac.flaccid_paralysis) as flaccid_paralysis,
															count(aefi_form_1_vac.spastic_paralysis) as spastic_paralysis,
															count(aefi_form_1_vac.hhe) as hhe,
															count(aefi_form_1_vac.persistent_inconsolable_crying) as persistent_inconsolable_crying,
															count(aefi_form_1_vac.thrombocytopenia) as thrombocytopenia,
															count(aefi_form_1_vac.osteomyelitis) as osteomyelitis,
															count(aefi_form_1_vac.toxic_shock_syndrome) as toxic_shock_syndrome,
															count(aefi_form_1_vac.sepsis) as sepsis,
															count(aefi_form_1_vac.anaphylaxis) as anaphylaxis,
															count(aefi_form_1_vac.transverse_myelitis) as transverse_myelitis,
															count(aefi_form_1_vac.gbs) as gbs,
															count(aefi_form_1_vac.adem) as adem,
															count(aefi_form_1_vac.acute_myocardial) as acute_myocardial,
															count(aefi_form_1_vac.ards) as ards,
															count(aefi_form_1_vac.symptoms_later_immunized) as symptoms_later_immunized,
															count(aefi_form_1_vac.other_symptoms_later_immunized) as other_symptoms_later_immunized'))
										 ->where('status','=',null)
										->where('name_of_vaccine','=','44')
										 ->groupBy('name_of_vaccine')
										//  ->orderBy('vac_count','DESC')
										//  ->take(5)
										 ->get();
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
			 'count_vac44'
			 
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
