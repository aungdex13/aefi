<?php
if (! function_exists('load_history_of_vaccine')) {
    function load_history_of_vaccine() {

		$history_of_vaccine = array(
								'1'=>'วัณโรค',
								'2'=>'ตับอักเสบบี',
								'3'=>'คอตีบ บาดทะยัก ไอกรน ตับอักเสบบี',
								'4'=>'คอตีบ บาดทะยัก ไอกรน',
								'5'=>'คอตีบ บาดทะยัก',
								'6'=>'บาดทะยัก',
								'7'=>'โปลิโอ ชนิดหยอด',
								'8'=>'โปลิโอ ชนิดฉีด',
								'9'=>'ไข้สมองอักเสบเจอี (ชนิดเชื้อตาย)',
								'10'=>'ไข้สมองอักเสบเจอี (ชนิดเชื้อเป็น)',
								'11'=>'หัด คางทูม หัดเยอรมัน',
								'12'=>'หัด หัดเยอรมัน',
								'13'=>'ไข้หวัดใหญ่',
								'14'=>'โรคมะเร็งปากมดลูกจากเชื้อไวรัสฮิวแมนแปบพิลโลมา',
								'15'=>'โรคอุจจาระร่วงจากเชื้อไวรัสโรต้า',
								'16'=>'สัตว์เลี้ยงลูกด้วยนมทุกชนิดที่บ้า',
								'17'=>'โรคอหิวาตกโรคและอุจจาระร่วงจากเชื้ออีโคไล',
								'18'=>'โรคคอตีบ-บาดทะยัก-ไอกรน-เยื่อหุ้มสมองอักเสบจาก เชื้อฮีโมฟิลุสอินฟลูเอ็นเซ่ทัยป์บี',
								'19'=>'โรคคอตีบ-บาดทะยัก-ไอกรน-ตับอักเสบบี-เยื่อหุ้มสมองอักเสบจาก เชื้อฮีโมฟิลุสอินฟลูเอ็นเซ่ทัยป์บี',
								'20'=>'โรคคอตีบ-บาดทะยัก-ไอกรน-โปลิโอ',
								'21'=>'โรคคอตีบ-บาดทะยัก-ไอกรน-โปลิโอ-เยื่อหุ้มสมองอักเสบจากเชื้อ ฮีโมฟิลุสอินฟลูเอ็นเซ่ ทัยป์บี',
								'22'=>'โรคคอตีบ-บาดทะยัก-ไอกรน-โปลิโอ-ตับอักเสบบี-เยื่อหุ้มสมองอักเสบจากเชื้อ ฮีโมฟิลุสอินฟลูเอ็นเซ่ ทัยป์บี',
								'23'=>'โรคเยื่อหุ้มสมองอักเสบจากเชื้อฮีโมฟิลุสอินฟลูเอ็นเซ่ทัยป์บี',
								'24'=>'โรคตับอักเสบเอ',
								'25'=>'โรคตับอักเสบบี-ตับอักเสบเอ',
								'26'=>'โรคหัด-คางทูม-หัดเยอรมัน-อีสุกอีใส',
								'27'=>'โรคไข้กาฬหลังแอ่นจากเชื้อ ACYW135',
								'28'=>'โรคไข้กาฬหลังแอ่นจากเชื้อ AC',
								'29'=>'โรคจากการติดเชื้อเสตร็บโตคอคคัสนิวโมเนีย - เยื่อหุ้มสมองอักเสบจากเชื้อฮีโมฟิลุสอินฟลูเอ็นเซ่ ทัยป์บี',
								'30'=>'โรคจากการติดเชื้อเสตร็บโตคอคคัส นิวโมเนีย"',
								'31'=>'โรคจากการติดเชื้อเสตร็บโตคอคคัส นิวโมเนีย"',
								'32'=>'โรคบาดทะยัก- คอตีบ-ไอกรน',
								'33'=>'โรคไข้ทัยฟอยด์ (inactivated vaccine)',
								'34'=>'โรคไข้ทัยฟอยด์ (live attenuated)',
								'35'=>'โรคบาดทะยัก-คอตีบ-ไอกรน-โปลิโอ',
								'36'=>'โรคอีสุกอีใส',
								'37'=>'โรคไข้เหลือง'

														);
		return 	$history_of_vaccine;
    }
}

if (! function_exists('patient_develop_symptoms_after_previous_vaccination')) {
    function load_patient_develop_symptoms_after_previous_vaccination() {

		$patient_develop_symptoms_after_previous_vaccination = array(
								'1'=>'Erythema',
								'2'=>'Urticaria',
								'3'=>'Itching',
								'4'=>'Edema',
								'5'=>'Angioedema',
								'6'=>'Fainting',
								'7'=>'Hyperventilation',
								'8'=>'Syncope',
								'9'=>'Headache',
								'10'=>'Dizziness',
								'11'=>'Fatigue',
								'12'=>'Malaise',
								'13'=>'Dyspepsia',
								'14'=>'Diarrhea',
								'15'=>'Nausea',
								'16'=>'Vomiting',
								'17'=>'Abdominal pain',
								'18'=>'Arthralgia',
								'19'=>'Myalgia',
								'20'=>'Fever≥38 C◦',
								'21'=>'Swelling at the injection site > 3 days',
								'22'=>'Swelling beyond nearest joint',
								'23'=>'Lymphadenopathy',
								'24'=>'Lymphadenitis',
								'25'=>'Sterile abscess',
								'26'=>'Bacterial abscess',
								'27'=>'Febrile convulsion',
								'28'=>'Afebrile convulsion',
								'29'=>'Encephalopathy',
								'30'=>'Flaccid paralysis',
								'31'=>'Spastic paralysis',
								'32'=>'Hypotonic Hyporesponsive Episode (HHE)',
								'33'=>'Persistent inconsolable crying',
								'34'=>'Thrombocytopenia',
								'35'=>'Osteitis/Osteomyelitis',
								'36'=>'Toxic shock syndrome',
								'37'=>'Sepsis',
								'38'=>'Anaphylaxis',
								'39'=>'Others'
														);
		return 	$patient_develop_symptoms_after_previous_vaccination;
    }
}
if (! function_exists('Underlying_disease')) {
    function load_Underlying_disease() {

		$underlying_disease = array(
								'1'=>'Certain infectious and parasitic diseases',
								'2'=>'Neoplasms',
								'3'=>'Diseases of the blood and blood-forming organs',
								'4'=>'Disorders involving the immune mechanism',
								'5'=>'Endocrine, nutritional and metabolic diseases',
								'6'=>'Mental and behavioural disorders',
								'7'=>'Diseases of the nervous system',
								'8'=>'Diseases of the eye and adnexa',
								'9'=>'Diseases of the ear and mastoid process',
								'10'=>'Diseases of the circulatory system',
								'11'=>'Diseases of the respiratory system',
								'12'=>'Diseases of the digestive system',
								'13'=>'Diseases of the skin and subcutaneous tissue',
								'14'=>'Diseases of the musculoskeletal system and connective tissue',
								'15'=>'Diseases of the genitourinary system',
								'16'=>'Congenital malformations',
 								'17'=>'Deformations',
  							'18'=>'Chromosomal abnormalities'
														);
		return 	$underlying_disease;
    }
}
if (! function_exists('vaccine_volume')) {
    function load_Vaccine_volume() {

		$vaccine_volume = array(
								'1'=>'0.1 มล.',
								'2'=>'0.25 มล.',
								'3'=>'0.5 มล.',
								'4'=>'1 มล.',
								'5'=>'1.5 มล.',
								'6'=>'2-3 หยด'

														);
		return 	$vaccine_volume;
    }
}
if (! function_exists('route_of_vaccination')) {
    function load_route_of_vaccination() {

		$route_of_vaccination = array(
								'1'=>'ฉีดเข้าในหนัง',
								'2'=>'ฉีดเข้ากล้ามเนื้อ',
								'3'=>'ฉีดเข้าใต้ผิวหนัง',
								'4'=>'รับประทาน',
								'5'=>'การพ่นเข้าจมูก'

														);
		return 	$route_of_vaccination;
    }
}
if (! function_exists('vaccination_site')) {
    function load_vaccination_site() {

		$vaccination_site = array(
								'1'=>'ต้นแขน (กล้ามเนื้อไหล่)',
								'2'=>'หน้าขา (กล้ามเนื้อหน้าขาส่วนกลางด้านนอก)',
								'3'=>'ชั้นไขมันบริเวณต้นแขน',
								'4'=>'ชั้นไขมันบริเวณหน้าขา',
								'5'=>'ปาก',
								'6'=>'สะโพก',
								'7'=>'จมูก'
														);
		return 	$vaccination_site;
    }
}
if (! function_exists('manufacturer')) {
    function load_manufacturer() {

		$manufacturer = array(
								'1'=>'บริษัทแกล็กโซสมิทไคล์น (ประเทศไทย)  จำกัด',
								'2'=>'บริษัทซาโนฟี่ ปาสเตอร์ จำกัด',
								'3'=>'บริษัทไบโอจีนีเทค จำกัด',
								'4'=>'บริษัทไฟเซอร์ (ประเทศไทย) จำกัด',
								'5'=>'บริษัทมาสุ จำกัด (Serum Institute of India Ltd. SII)',
								'6'=>'องค์การเภสัชกรรม',
								'7'=>'บริษัท องค์การเภสัชกรรม-เมอร์ริเออร์ชีววัตถุ จำกัด',
								'8'=>'บริษัทแอ๊บบอต ลาบอแรตอรีส จำกัด',
								'9'=>'บริษัท ดีเคเอสเอช (ประเทศไทย) จำกัด (ครูเซลล์)',
								'10'=>'บริษัทฟาร์มาติกา จำกัด',
								'11'=>'บริษัทไบโอวาลิส จำกัด',
								'12'=>'บริษัทเอ็มเอสดี (ประเทศไทย) จำกัด',
								'13'=>'บริษัทไบโอเน็ท-เอเชีย จำกัด',
                '14'=>'อ็อกซ์ฟอร์ด-แอสตราเซเนกา',
                '15'=>'ไฟเซอร์-ไบออนเทค (Pfizer-BioNTech)',
                '16'=>'สปุตนิก (Sputnik) ',
                '17'=>'โมเดอร์นา (Moderna)',
                '18'=>'บาราต (Bharat Biotech) บริษัทผู้นำเข้า Biogenetech ',
                '19'=>'Johnson&Johnson บริษัทผู้นำเข้า Jansen',
                '20'=>'Sinovac (Sinovac life science Co.,Ltd)',
                '21'=>'Sinopharm-Beijing',
                '22'=>'Sinopharm-Wuhan',
                '23'=>'Gamaleya',
                '24'=>'Casino',
                '25'=>'Vector Insitute',
                '26'=>'Chumakov Center',
                '27'=>'COVID-19 Vaccine Astrazeneca(สยามไบโอไซเอนซ์)',
                '28'=>'COVID-19 Vaccine Astrazeneca(SK Bioscience Korea)',
                														);
		return 	$manufacturer;
    }
}
if (! function_exists('provinces')) {
    function load_provinces() {

		$provinces = array(
					'10'=>'กรุงเทพมหานคร   ',
					'11'=>'สมุทรปราการ   ',
					'12'=>'นนทบุรี   ',
					'13'=>'ปทุมธานี   ',
					'14'=>'พระนครศรีอยุธยา   ',
					'15'=>'อ่างทอง   ',
					'16'=>'ลพบุรี   ',
					'17'=>'สิงห์บุรี   ',
					'18'=>'ชัยนาท   ',
					'19'=>'สระบุรี',
					'20'=>'ชลบุรี   ',
					'21'=>'ระยอง   ',
					'22'=>'จันทบุรี   ',
					'23'=>'ตราด   ',
					'24'=>'ฉะเชิงเทรา   ',
					'25'=>'ปราจีนบุรี   ',
					'26'=>'นครนายก   ',
					'27'=>'สระแก้ว   ',
					'30'=>'นครราชสีมา   ',
					'31'=>'บุรีรัมย์   ',
					'32'=>'สุรินทร์   ',
					'33'=>'ศรีสะเกษ   ',
					'34'=>'อุบลราชธานี   ',
					'35'=>'ยโสธร   ',
					'36'=>'ชัยภูมิ   ',
					'37'=>'อำนาจเจริญ   ',
					'39'=>'หนองบัวลำภู   ',
					'40'=>'ขอนแก่น   ',
					'41'=>'อุดรธานี   ',
					'42'=>'เลย   ',
					'43'=>'หนองคาย   ',
					'44'=>'มหาสารคาม   ',
					'45'=>'ร้อยเอ็ด   ',
					'46'=>'กาฬสินธุ์   ',
					'47'=>'สกลนคร   ',
					'48'=>'นครพนม   ',
					'49'=>'มุกดาหาร   ',
					'50'=>'เชียงใหม่   ',
					'51'=>'ลำพูน   ',
					'52'=>'ลำปาง   ',
					'53'=>'อุตรดิตถ์   ',
					'54'=>'แพร่   ',
					'55'=>'น่าน   ',
					'56'=>'พะเยา   ',
					'57'=>'เชียงราย   ',
					'58'=>'แม่ฮ่องสอน   ',
					'60'=>'นครสวรรค์   ',
					'61'=>'อุทัยธานี   ',
					'62'=>'กำแพงเพชร   ',
					'63'=>'ตาก   ',
					'64'=>'สุโขทัย   ',
					'65'=>'พิษณุโลก   ',
					'66'=>'พิจิตร   ',
					'67'=>'เพชรบูรณ์   ',
					'70'=>'ราชบุรี   ',
					'71'=>'กาญจนบุรี   ',
					'72'=>'สุพรรณบุรี   ',
					'73'=>'นครปฐม   ',
					'74'=>'สมุทรสาคร   ',
					'75'=>'สมุทรสงคราม   ',
					'76'=>'เพชรบุรี   ',
					'77'=>'ประจวบคีรีขันธ์   ',
					'80'=>'นครศรีธรรมราช   ',
					'81'=>'กระบี่   ',
					'82'=>'พังงา   ',
					'83'=>'ภูเก็ต   ',
					'84'=>'สุราษฎร์ธานี   ',
					'85'=>'ระนอง   ',
					'86'=>'ชุมพร   ',
					'90'=>'สงขลา   ',
					'91'=>'สตูล   ',
					'92'=>'ตรัง   ',
					'93'=>'พัทลุง   ',
					'94'=>'ปัตตานี   ',
					'95'=>'ยะลา   ',
					'96'=>'นราธิวาส   ',
					'97'=>'บึงกาฬ'
);
		return 	$provinces;
		}
	}

  if (! function_exists('title_name')) {
      function load_title_name() {

  		$title_name = array(
  								'1'=>'นาย',
  								'2'=>'นางสาว',
  								'3'=>'นาง',
                  '4'=>'ด.ช.',
                  '5'=>'ด.ญ.',
  								'99'=>'อื่นๆ',
  								''=>''
  														);
  		return 	$title_name;
      }
  }
  if (! function_exists('nationality')) {
      function load_nationality() {

  		$nationality = array(
  								'1'=>'ไทย',
  								'2'=>'พม่า',
  								'3'=>'ลาว',
  								'4'=>'อื่นๆ',
  								''=>''
  														);
  		return 	$nationality;
      }
  }

  if (! function_exists('necessary_to_investigate')) {
      function load_necessary_to_investigate() {

      $necessary_to_investigate = array(
                  '1'=>'ไม่จำเป็น',
                  '2'=>'จำเป็น',
                  ''=>''
                              );
      return 	$necessary_to_investigate;
      }
  }
  if (! function_exists('seriousness_of_the_symptoms')) {
      function load_seriousness_of_the_symptoms() {

      $seriousness_of_the_symptoms = array(
                  '1'=>'ไม่ร้ายแรง',
                  '2'=>'ร้ายแรง',
                  ''=>'ไม่ระบุ'
                              );
      return 	$seriousness_of_the_symptoms;
      }
  }
  if (! function_exists('age_group')) {
      function load_age_group() {

      $age_group = array(
                  '1'=>'น้อยกว่า 1 ปี',
                  '2'=>'ช่วง 1-5 ปี',
                  '3'=>'มากกว่า 5 ปี',
                  ''=>'ไม่ระบุ'
                              );
      return 	$age_group;
      }
  }
  if (! function_exists('gender')) {
      function load_gender() {

      $gender = array(
                  '1'=>'ชาย',
                  '2'=>'หญิง',
                  ''=>'ไม่ระบุ'

                              );
      return 	$gender;
      }
  }
  if (! function_exists('color_gender')) {
      function load_color_gender() {

      $color_gender = array(
                  '1'=>'#FF75A0',
                  '2'=>'#FCE38A',
                  null=>'#95E1D3'

                              );
      return 	$color_gender;
      }
  }
  if (! function_exists('type_of_patient')) {
      function load_type_of_patient() {

      $type_of_patient = array(
                  '1'=>'ผู้ป่วยใน',
                  '2'=>'ผู้ป่วยนอก',
                  ''=>''

                              );
      return 	$type_of_patient;
      }
  }
  if (! function_exists('patient_status')) {
      function load_patient_status() {

      $patient_status = array(
                  '1'=>'หาย',
                  '2'=>'หายโดยมีร่องรอย',
                  '3'=>'อาการดีขึ้นแต่ยังไม่หาย',
                  '4'=>'ไม่หาย',
                  '5'=>'ไม่ทราบ',
                  '6'=>'เสียชีวิต',
                  ''=>''

                              );
      return 	$patient_status;
      }
  }
  if (! function_exists('vac_init')) {
      function load_vac_init() {

      $vac_init = array(
                  '1'=>'BCG',
                  '2'=>'HB',
                  '3'=>'DTPHB',
                  '4'=>'DTP',
                  '5'=>'dT',
                  '6'=>'TT',
                  '7'=>'OPV',
                  '8'=>'IPV',
                  '9'=>'JE',
                  '10'=>'LAJE',
                  '11'=>'MMR',
                  '12'=>'MR',
                  '13'=>'Influ',
                  '14'=>'HPV',
                  '15'=>'RV',
                  '16'=>'Rabies',
                  '17'=>'Cholera',
                  '18'=>'DTP-Hib',
                  '19'=>'DTP-HB+Hib',
                  '20'=>'DTP-IPV',
                  '21'=>'DTP-IPV-Hib',
                  '22'=>'DTP-IPV-HB-Hib',
                  '23'=>'Hib',
                  '24'=>'HA',
                  '25'=>'HB-HA',
                  '26'=>'MMRV',
                  '27'=>'ACYW135',
                  '28'=>'AC',
                  '29'=>'PCV',
                  '30'=>'PCV',
                  '31'=>'PS23',
                  '32'=>'Tdap',
                  '33'=>'Ty',
                  '34'=>'Ty',
                  '35'=>'Tdap-IPV',
                  '36'=>'Var',
                  '37'=>'YellowFever',
                  '38'=>'Dengue',
                  // '39'=>'COVID19Sinovac',
                  // '40'=>'COVID19Astrazaneca',

                  ''=>'NULL'

                              );
      return 	$vac_init;
      }
  }
  if (! function_exists('r_o')) {
      function load_r_o() {

      $r_o = array(
                  '1'=>'Anaphylactic shock',
                  '2'=>'Anaphylaxis',
                  '3'=>'BP Drop',
                  '4'=>'Dead',
                  '5'=>'DVT',
                  '6'=>'Livedo',
                  '8'=>'Neuropathy',
                  '9'=>'Polyneuropathy',
                  '10'=>'Seizure',
                  '11'=>'Stroke',
                  '12'=>'Syncope',
                  '13'=>'Thrombocytopenia',
                  ''=>'NULL'

                              );
      return 	$r_o;
      }
  }
  if (! function_exists('final_diag')) {
      function load_final_diag() {

      $final_diag = array(
                  '1'=>'Acute Coronary Syndrome',
                  '2'=>'Acute myeloid leukemia',
                  '3'=>'Anaphylaxis',
                  '4'=>'Anaphylactic shock',
                  '5'=>'Atrial fibrillation',
                  '6'=>'Convulsive syncope',
                  '7'=>'DVT',
                  '8'=>'Following',
                  '9'=>'Hypersensitivity',
                  '10'=>'Immune TTP',
                  '11'=>'Intra Abdomen bleeding with Hypovolemic shock',
                  '12'=>'ISRR',
                  '13'=>'Meeting',
                  '14'=>'Polyneuropathy',
                  '15'=>'Reflex syncope',
                  '16'=>'Side effect',
                  '17'=>'ภาวะหัวใจขาดเลือด',
                  '18'=>'อื่นๆ',
                  ''=>'',

                              );
      return 	$final_diag;
      }
  }
  if (! function_exists('load_causality')) {
      function load_causality() {

      $causality = array(
        '1'=>'เกี่ยวข้องกับวัคซีน (Vaccine product related reaction)',
        '2'=>'เกี่ยวข้องกับคุณภาพของวัคซีน (Vaccine quality defect related reaction)',
        '3'=>'เกี่ยวข้องกับการให้บริการการฉีดวัคซีน (Immunization error related reaction)',
        '4'=>'เกี่ยวข้องกับการฉีดวัคซีน (Immunization anxiety related reaction)',
        '5'=>'เป็นเหตุการณ์ร่วมที่ไม่เกี่ยวข้องกับวัคซีนแต่บังเอิญเกิดร่วมกัน (Coincidental event)',
        '6'=>'Temporal relationship',
        '7'=>'ยังไม่สามารถสรุปได้ว่าเกี่ยวข้องกับวัคซีน (Indeterminate)',
        '8'=>'ข้อมูลยังไม่เพียงพอที่จะสรุป (Unclassifiable)',
        '9'=>'ให้ผู้เกี่ยวข้องติดตามข้อมูลเพิ่มเติมเพื่อนำเข้าพิจารณาใหม่',
        ''=>'NULL'
                              );
      return 	$causality;
      }
  }
  if (! function_exists('aefi_classification')) {
      function load_aefi_classification() {

      $aefi_classification = array(
                    '1'=>'ปฏิกิริยาของวัคซีน',
                    '2'=>'ความบกพร่องของวัคซีน',
                    '3'=>'ความคลาดเคลื่อนด้านการให้บริการ',
                    '4'=>'ปฏิกริยาของร่างการตอบสนองต่อการฉีดวัคซีน',
                    '5'=>'เหตุการณ์ร่วมโดยบังเอิญ',
                  );
                  return 	$aefi_classification;
                  }
                  }
  if (! function_exists('aefi_refer_status')) {
      function load_aefi_refer_status() {

      $aefi_refer_status = array(
                    '1'=>'มีการส่งต่อผู้ป่วย',
                    '2'=>'ยกเลิกการส่งต่อผู้ป่วย',
                    ''=>''


                  );
                  return 	$aefi_refer_status;
                  }
                  }
 ?>
