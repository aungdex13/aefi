@extends('AEFI.layout.template')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
<section class="content-header">
  <!-- Content Header (Page header) -->
  <?php
$arr_history_of_vaccine = load_history_of_vaccine();
$arr_patient_develop_symptoms_after_previous_vaccination = load_patient_develop_symptoms_after_previous_vaccination();
$arr_underlying_disease = load_underlying_disease();
$arr_vaccine_volume = load_vaccine_volume();
$arr_route_of_vaccination = load_route_of_vaccination();
$arr_vaccination_site = load_vaccination_site();
$arr_manufacturer = load_manufacturer();
$arr_seriousness_of_the_symptoms = load_seriousness_of_the_symptoms();

 ?>
 <style>
  #sinovac {
    
    width: 100%;
  }
  
  #sinovac td, #sinovac th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #sinovac tr:nth-child(even){background-color: #f2f2f2;}
  
  #sinovac tr:hover {background-color: #ddd;}
  
  #sinovac th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #F58840;
    color: black;
  }
  #Astrazeneca {
    
    width: 100%;
  }
  
  #Astrazeneca td, #Astrazeneca th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #Astrazeneca tr:nth-child(even){background-color: #f2f2f2;}
  
  #Astrazeneca tr:hover {background-color: #ddd;}
  
  #Astrazeneca th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #B983FF;
    color: black;
  }
  #Sinopharm {
    
    width: 100%;
  }
  
  #Sinopharm td, #Sinopharm th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #Sinopharm tr:nth-child(even){background-color: #f2f2f2;}
  
  #Sinopharm tr:hover {background-color: #ddd;}
  
  #Sinopharm th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #BFD8B8;
    color: black;
  }
  #Pfizer {
    width: 100%;
  }
  
  #Pfizer td, #Pfizer th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #Pfizer tr:nth-child(even){background-color: #f2f2f2;}
  
  #Pfizer tr:hover {background-color: #ddd;}
  
  #Pfizer th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #577BC1;
    color: black;
  }

  #Moderna {
    width: 100%;
  }
  
  #Moderna td, #Moderna th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #Moderna tr:nth-child(even){background-color: #f2f2f2;}
  
  #Moderna tr:hover {background-color: #ddd;}
  
  #Moderna th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #b857c1;
    color: black;
  }

  #JohnsonnJohnson {
    width: 100%;
  }
  
  #JohnsonnJohnson td, #JohnsonnJohnson th {
    border: 1px solid #000;
    padding: 8px;
  }
  
  #JohnsonnJohnson tr:nth-child(even){background-color: #f2f2f2;}
  
  #JohnsonnJohnson tr:hover {background-color: #ddd;}
  
  #JohnsonnJohnson th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #5791c1;
    color: black;
  }
  </style>
  <h1>
    แบบรายงานอาการภายหลังได้รับการสร้างเสริมภูมิคุ้มกันโรคโควิด 19
    <small>AEFI COVID</small>
  </h1>
  <ol class="breadcrumb">
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <div class="col-md-12">
                <p class="text-center">
                  อาการที่พบหลังการได้รับวัคซีนป้องกันโรคโควิด 19
                  ของผู้ป่วยที่เข้ารับการรักษาเป็นผู้ป่วยใน จำแนกตามชนิดวัคซีน
                </p>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    ข้อมูล ณ วันที่ {{$datenow}} เวลา {{$timenow}} จากฐานข้อมูล AEFI-DDC กองระบาดวิทยา กรมควบคุมโรค
                  </p>
                </div>
                </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                  </p>
                  <div class="col-md-4">
                    <!-- Sales Chart Canvas -->
                    <table id="sinovac">
                      <thead>
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Sinovac</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($count_vac39 as $row)
                        <tr>
                          <td>rash</td>
                          <td>{{$row->rash}}</td>
                        </tr>
                        <tr>
                          <td>erythema</td>
                          <td>{{$row->erythema}}</td>
                        </tr>
                          <tr>
                            <td>urticaria</td>
                            <td>{{$row->urticaria}}</td>
                        </tr>
                          <tr>
                            <td>itching</td>
                            <td>{{$row->itching}}</td>
                        </tr>
                          <tr>
                            <td>edema</td>
                            <td>{{$row->edema}}</td>
                        </tr>
                          <tr>
                            <td>angioedema</td>
                            <td>{{ $row->angioedema}}</td>
                        </tr>
                          <tr>
                            <td>fainting</td>
                            <td>{{ $row->fainting}}</td>
                        </tr>
                          <tr>
                            <td>hyperventilation</td>
                            <td>{{ $row->hyperventilation}}</td>
                        </tr>
                          <tr>
                            <td>syncope</td>
                            <td>{{ $row->syncope}}</td>
                        </tr>
                          <tr>
                            <td>headche</td>
                            <td>{{ $row->headche}}</td>
                        </tr>
                          <tr>
                            <td>dizziness</td>
                            <td>{{ $row->dizziness}}</td>
                        </tr>
                          <tr>
                            <td>fatigue</td>
                            <td>{{ $row->fatigue}}</td>
                        </tr>
                          <tr>
                            <td>malaise</td>
                            <td>{{ $row->malaise}}</td>
                        </tr>
                          <tr>
                            <td>dyspepsia</td>
                            <td>{{ $row->dyspepsia}}</td>
                        </tr>
                          <tr>
                            <td>diarrhea</td>
                            <td>{{ $row->diarrhea}}</td>
                        </tr>
                          <tr>
                            <td>nausea</td>
                            <td>{{ $row->nausea}}</td>
                        </tr>
                          <tr>
                            <td>vomiting</td>
                            <td>{{ $row->vomiting}}</td>
                        </tr>
                          <tr>
                            <td>abdominal_pain</td>
                            <td>{{ $row->abdominal_pain}}</td>
                        </tr>
                          <tr>
                            <td>arthalgia</td>
                            <td>{{ $row->arthalgia}}</td>
                        </tr>
                          <tr>
                            <td>myalgia</td>
                            <td>{{ $row->myalgia}}</td>
                        </tr>
                          <tr>
                            <td>fever38c</td>
                            <td>{{ $row->fever38c}}</td>
                        </tr>
                          <tr>
                            <td>swelling_at_the_injection</td>
                            <td>{{ $row->swelling_at_the_injection}}</td>
                        </tr>
                          <tr>
                            <td>swelling_beyond_nearest_joint</td>
                            <td>{{ $row->swelling_beyond_nearest_joint}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenopathy</td>
                            <td>{{ $row->lymphadenopathy}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenitis</td>
                            <td>{{ $row->lymphadenitis}}</td>
                        </tr>
                          <tr>
                            <td>sterile_abscess</td>
                            <td>{{ $row->sterile_abscess}}</td>
                        </tr>
                          <tr>
                            <td>bacterial_abscess</td>
                            <td>{{ $row->bacterial_abscess}}</td>
                        </tr>
                          <tr>
                            <td>febrile_convulsion</td>
                            <td>{{ $row->febrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>afebrile_convulsion</td>
                            <td>{{ $row->afebrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>encephalopathy</td>
                            <td>{{ $row->encephalopathy}}</td>
                        </tr>
                          <tr>
                            <td>flaccid_paralysis</td>
                            <td>{{ $row->flaccid_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>spastic_paralysis</td>
                            <td>{{ $row->spastic_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>hhe</td>
                            <td>{{ $row->hhe}}</td>
                        </tr>
                          <tr>
                            <td>persistent_inconsolable_crying</td>
                            <td>{{ $row->persistent_inconsolable_crying}}</td>
                        </tr>
                          <tr>
                            <td>thrombocytopenia</td>
                            <td>{{ $row->thrombocytopenia}}</td>
                        </tr>
                          <tr>
                            <td>osteomyelitis</td>
                            <td>{{ $row->osteomyelitis}}</td>
                        </tr>
                          <tr>
                            <td>toxic_shock_syndrome</td>
                            <td>{{ $row->toxic_shock_syndrome}}</td>
                        </tr>
                          <tr>
                            <td>sepsis</td>
                            <td>{{ $row->sepsis}}</td>
                        </tr>
                          <tr>
                            <td>anaphylaxis</td>
                            <td>{{ $row->anaphylaxis}}</td>
                        </tr>
                          <tr>
                            <td>gbs</td>
                            <td>{{ $row->gbs}}</td>
                        </tr>
                          <tr>
                            <td>transverse_myelitis</td>
                            <td>{{ $row->transverse_myelitis}}</td>
                        </tr>
                          <tr>
                            <td>adem</td>
                            <td>{{ $row->adem}}</td>
                        </tr>
                          <tr>
                            <td>acute_myocardial</td>
                            <td>{{ $row->acute_myocardial}}</td>
                        </tr>
                          <tr>
                            <td>ards</td>
                            <td>{{ $row->ards}}</td>
                        </tr>
                          <tr>
                            <td>chest_pain</td>
                            <td>{{ $row->chest_pain}}</td>
                        </tr>
                          <tr>
                            <td>myocarditis</td>
                            <td>{{ $row->myocarditis}}</td>
                        </tr>
                          <tr>
                            <td>heart_failure</td>
                            <td>{{ $row->heart_failure}}</td>
                        </tr>
                          <tr>
                            <td>pericarditis</td>
                            <td>{{ $row->pericarditis}}</td>
                        </tr>
                          <tr>
                            <td>sudden_cardiac_arrest</td>
                            <td>{{ $row->sudden_cardiac_arrest}}</td>
                        </tr>
                          <tr>
                            <td>covid_19</td>
                            <td>{{ $row->covid_19}}</td>
                        </tr>
                          <tr>
                            <td>ischemic_stroke</td>
                            <td>{{ $row->ischemic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>hemorrhagic_stroke</td>
                            <td>{{ $row->hemorrhagic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>deep_vein_thrombosis</td>
                            <td>{{ $row->deep_vein_thrombosis}}</td>
                        </tr>
                          <tr>
                            <td>pulmonary_embolism</td>
                            <td>{{ $row->pulmonary_embolism}}</td>
                        </tr>
                          <tr>
                            <td>hypertension</td>
                            <td>{{ $row->hypertension}}</td>
                        </tr>
                          <tr>
                            <td>hypertensive_urgency</td>
                            <td>{{ $row->hypertensive_urgency}}</td>
                        </tr>
                          <tr>
                            <td>bells_palsy</td>
                            <td>{{ $row->bells_palsy}}</td>
                        </tr>
                          <tr>
                            <td>symptom_status</td>
                            <td>{{ $row->symptom_status}}</td>
                        </tr>
                          <tr>
                            <td>abortion</td>
                            <td>{{ $row->abortion}}</td>
                        </tr>
                          <tr>
                            <td>abruptio_placenta</td>
                            <td>{{ $row->abruptio_placenta}}</td>
                        </tr>
                          <tr>
                            <td>dfiu</td>
                            <td>{{ $row->dfiu}}</td>
                        </tr>
                          <tr>
                            <td>main_diagnosis</td>
                            <td>{{ $row->main_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>meningitis</td>
                            <td>{{ $row->meningitis}}</td>
                        </tr>
                          <tr>
                            <td>minor_diagnosis</td>
                            <td>{{ $row->minor_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>other_pregnant_symptoms</td>
                            <td>{{ $row->other_pregnant_symptoms}}</td>
                        </tr>
                          <tr>
                            <td>other_symptoms_later_immunized_text</td>
                            <td>{{ $row->other_symptoms_later_immunized_text}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-4">
                    <!-- Sales Chart Canvas -->
                    <table id="Astrazeneca">
                      <thead>
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Astrazeneca</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($count_vac40 as $row)
                        <tr>
                          <td>rash</td>
                          <td>{{$row->rash}}</td>
                        </tr>
                        <tr>
                          <td>erythema</td>
                          <td>{{$row->erythema}}</td>
                        </tr>
                          <tr>
                            <td>urticaria</td>
                            <td>{{$row->urticaria}}</td>
                        </tr>
                          <tr>
                            <td>itching</td>
                            <td>{{$row->itching}}</td>
                        </tr>
                          <tr>
                            <td>edema</td>
                            <td>{{$row->edema}}</td>
                        </tr>
                          <tr>
                            <td>angioedema</td>
                            <td>{{ $row->angioedema}}</td>
                        </tr>
                          <tr>
                            <td>fainting</td>
                            <td>{{ $row->fainting}}</td>
                        </tr>
                          <tr>
                            <td>hyperventilation</td>
                            <td>{{ $row->hyperventilation}}</td>
                        </tr>
                          <tr>
                            <td>syncope</td>
                            <td>{{ $row->syncope}}</td>
                        </tr>
                          <tr>
                            <td>headche</td>
                            <td>{{ $row->headche}}</td>
                        </tr>
                          <tr>
                            <td>dizziness</td>
                            <td>{{ $row->dizziness}}</td>
                        </tr>
                          <tr>
                            <td>fatigue</td>
                            <td>{{ $row->fatigue}}</td>
                        </tr>
                          <tr>
                            <td>malaise</td>
                            <td>{{ $row->malaise}}</td>
                        </tr>
                          <tr>
                            <td>dyspepsia</td>
                            <td>{{ $row->dyspepsia}}</td>
                        </tr>
                          <tr>
                            <td>diarrhea</td>
                            <td>{{ $row->diarrhea}}</td>
                        </tr>
                          <tr>
                            <td>nausea</td>
                            <td>{{ $row->nausea}}</td>
                        </tr>
                          <tr>
                            <td>vomiting</td>
                            <td>{{ $row->vomiting}}</td>
                        </tr>
                          <tr>
                            <td>abdominal_pain</td>
                            <td>{{ $row->abdominal_pain}}</td>
                        </tr>
                          <tr>
                            <td>arthalgia</td>
                            <td>{{ $row->arthalgia}}</td>
                        </tr>
                          <tr>
                            <td>myalgia</td>
                            <td>{{ $row->myalgia}}</td>
                        </tr>
                          <tr>
                            <td>fever38c</td>
                            <td>{{ $row->fever38c}}</td>
                        </tr>
                          <tr>
                            <td>swelling_at_the_injection</td>
                            <td>{{ $row->swelling_at_the_injection}}</td>
                        </tr>
                          <tr>
                            <td>swelling_beyond_nearest_joint</td>
                            <td>{{ $row->swelling_beyond_nearest_joint}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenopathy</td>
                            <td>{{ $row->lymphadenopathy}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenitis</td>
                            <td>{{ $row->lymphadenitis}}</td>
                        </tr>
                          <tr>
                            <td>sterile_abscess</td>
                            <td>{{ $row->sterile_abscess}}</td>
                        </tr>
                          <tr>
                            <td>bacterial_abscess</td>
                            <td>{{ $row->bacterial_abscess}}</td>
                        </tr>
                          <tr>
                            <td>febrile_convulsion</td>
                            <td>{{ $row->febrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>afebrile_convulsion</td>
                            <td>{{ $row->afebrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>encephalopathy</td>
                            <td>{{ $row->encephalopathy}}</td>
                        </tr>
                          <tr>
                            <td>flaccid_paralysis</td>
                            <td>{{ $row->flaccid_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>spastic_paralysis</td>
                            <td>{{ $row->spastic_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>hhe</td>
                            <td>{{ $row->hhe}}</td>
                        </tr>
                          <tr>
                            <td>persistent_inconsolable_crying</td>
                            <td>{{ $row->persistent_inconsolable_crying}}</td>
                        </tr>
                          <tr>
                            <td>thrombocytopenia</td>
                            <td>{{ $row->thrombocytopenia}}</td>
                        </tr>
                          <tr>
                            <td>osteomyelitis</td>
                            <td>{{ $row->osteomyelitis}}</td>
                        </tr>
                          <tr>
                            <td>toxic_shock_syndrome</td>
                            <td>{{ $row->toxic_shock_syndrome}}</td>
                        </tr>
                          <tr>
                            <td>sepsis</td>
                            <td>{{ $row->sepsis}}</td>
                        </tr>
                          <tr>
                            <td>anaphylaxis</td>
                            <td>{{ $row->anaphylaxis}}</td>
                        </tr>
                          <tr>
                            <td>gbs</td>
                            <td>{{ $row->gbs}}</td>
                        </tr>
                          <tr>
                            <td>transverse_myelitis</td>
                            <td>{{ $row->transverse_myelitis}}</td>
                        </tr>
                          <tr>
                            <td>adem</td>
                            <td>{{ $row->adem}}</td>
                        </tr>
                          <tr>
                            <td>acute_myocardial</td>
                            <td>{{ $row->acute_myocardial}}</td>
                        </tr>
                          <tr>
                            <td>ards</td>
                            <td>{{ $row->ards}}</td>
                        </tr>
                          <tr>
                            <td>chest_pain</td>
                            <td>{{ $row->chest_pain}}</td>
                        </tr>
                          <tr>
                            <td>myocarditis</td>
                            <td>{{ $row->myocarditis}}</td>
                        </tr>
                          <tr>
                            <td>heart_failure</td>
                            <td>{{ $row->heart_failure}}</td>
                        </tr>
                          <tr>
                            <td>pericarditis</td>
                            <td>{{ $row->pericarditis}}</td>
                        </tr>
                          <tr>
                            <td>sudden_cardiac_arrest</td>
                            <td>{{ $row->sudden_cardiac_arrest}}</td>
                        </tr>
                          <tr>
                            <td>covid_19</td>
                            <td>{{ $row->covid_19}}</td>
                        </tr>
                          <tr>
                            <td>ischemic_stroke</td>
                            <td>{{ $row->ischemic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>hemorrhagic_stroke</td>
                            <td>{{ $row->hemorrhagic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>deep_vein_thrombosis</td>
                            <td>{{ $row->deep_vein_thrombosis}}</td>
                        </tr>
                          <tr>
                            <td>pulmonary_embolism</td>
                            <td>{{ $row->pulmonary_embolism}}</td>
                        </tr>
                          <tr>
                            <td>hypertension</td>
                            <td>{{ $row->hypertension}}</td>
                        </tr>
                          <tr>
                            <td>hypertensive_urgency</td>
                            <td>{{ $row->hypertensive_urgency}}</td>
                        </tr>
                          <tr>
                            <td>bells_palsy</td>
                            <td>{{ $row->bells_palsy}}</td>
                        </tr>
                          <tr>
                            <td>symptom_status</td>
                            <td>{{ $row->symptom_status}}</td>
                        </tr>
                          <tr>
                            <td>abortion</td>
                            <td>{{ $row->abortion}}</td>
                        </tr>
                          <tr>
                            <td>abruptio_placenta</td>
                            <td>{{ $row->abruptio_placenta}}</td>
                        </tr>
                          <tr>
                            <td>dfiu</td>
                            <td>{{ $row->dfiu}}</td>
                        </tr>
                          <tr>
                            <td>main_diagnosis</td>
                            <td>{{ $row->main_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>meningitis</td>
                            <td>{{ $row->meningitis}}</td>
                        </tr>
                          <tr>
                            <td>minor_diagnosis</td>
                            <td>{{ $row->minor_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>other_pregnant_symptoms</td>
                            <td>{{ $row->other_pregnant_symptoms}}</td>
                        </tr>
                          <tr>
                            <td>other_symptoms_later_immunized_text</td>
                            <td>{{ $row->other_symptoms_later_immunized_text}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <!-- /.chart-responsive -->
                  <div class="col-md-4">
                    <!-- Sales Chart Canvas -->
                    <table id="Sinopharm">
                      <thead>
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Sinopharm</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($count_vac41 as $row)
                        <tr>
                          <td>rash</td>
                          <td>{{$row->rash}}</td>
                        </tr>
                        <tr>
                          <td>erythema</td>
                          <td>{{$row->erythema}}</td>
                        </tr>
                          <tr>
                            <td>urticaria</td>
                            <td>{{$row->urticaria}}</td>
                        </tr>
                          <tr>
                            <td>itching</td>
                            <td>{{$row->itching}}</td>
                        </tr>
                          <tr>
                            <td>edema</td>
                            <td>{{$row->edema}}</td>
                        </tr>
                          <tr>
                            <td>angioedema</td>
                            <td>{{ $row->angioedema}}</td>
                        </tr>
                          <tr>
                            <td>fainting</td>
                            <td>{{ $row->fainting}}</td>
                        </tr>
                          <tr>
                            <td>hyperventilation</td>
                            <td>{{ $row->hyperventilation}}</td>
                        </tr>
                          <tr>
                            <td>syncope</td>
                            <td>{{ $row->syncope}}</td>
                        </tr>
                          <tr>
                            <td>headche</td>
                            <td>{{ $row->headche}}</td>
                        </tr>
                          <tr>
                            <td>dizziness</td>
                            <td>{{ $row->dizziness}}</td>
                        </tr>
                          <tr>
                            <td>fatigue</td>
                            <td>{{ $row->fatigue}}</td>
                        </tr>
                          <tr>
                            <td>malaise</td>
                            <td>{{ $row->malaise}}</td>
                        </tr>
                          <tr>
                            <td>dyspepsia</td>
                            <td>{{ $row->dyspepsia}}</td>
                        </tr>
                          <tr>
                            <td>diarrhea</td>
                            <td>{{ $row->diarrhea}}</td>
                        </tr>
                          <tr>
                            <td>nausea</td>
                            <td>{{ $row->nausea}}</td>
                        </tr>
                          <tr>
                            <td>vomiting</td>
                            <td>{{ $row->vomiting}}</td>
                        </tr>
                          <tr>
                            <td>abdominal_pain</td>
                            <td>{{ $row->abdominal_pain}}</td>
                        </tr>
                          <tr>
                            <td>arthalgia</td>
                            <td>{{ $row->arthalgia}}</td>
                        </tr>
                          <tr>
                            <td>myalgia</td>
                            <td>{{ $row->myalgia}}</td>
                        </tr>
                          <tr>
                            <td>fever38c</td>
                            <td>{{ $row->fever38c}}</td>
                        </tr>
                          <tr>
                            <td>swelling_at_the_injection</td>
                            <td>{{ $row->swelling_at_the_injection}}</td>
                        </tr>
                          <tr>
                            <td>swelling_beyond_nearest_joint</td>
                            <td>{{ $row->swelling_beyond_nearest_joint}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenopathy</td>
                            <td>{{ $row->lymphadenopathy}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenitis</td>
                            <td>{{ $row->lymphadenitis}}</td>
                        </tr>
                          <tr>
                            <td>sterile_abscess</td>
                            <td>{{ $row->sterile_abscess}}</td>
                        </tr>
                          <tr>
                            <td>bacterial_abscess</td>
                            <td>{{ $row->bacterial_abscess}}</td>
                        </tr>
                          <tr>
                            <td>febrile_convulsion</td>
                            <td>{{ $row->febrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>afebrile_convulsion</td>
                            <td>{{ $row->afebrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>encephalopathy</td>
                            <td>{{ $row->encephalopathy}}</td>
                        </tr>
                          <tr>
                            <td>flaccid_paralysis</td>
                            <td>{{ $row->flaccid_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>spastic_paralysis</td>
                            <td>{{ $row->spastic_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>hhe</td>
                            <td>{{ $row->hhe}}</td>
                        </tr>
                          <tr>
                            <td>persistent_inconsolable_crying</td>
                            <td>{{ $row->persistent_inconsolable_crying}}</td>
                        </tr>
                          <tr>
                            <td>thrombocytopenia</td>
                            <td>{{ $row->thrombocytopenia}}</td>
                        </tr>
                          <tr>
                            <td>osteomyelitis</td>
                            <td>{{ $row->osteomyelitis}}</td>
                        </tr>
                          <tr>
                            <td>toxic_shock_syndrome</td>
                            <td>{{ $row->toxic_shock_syndrome}}</td>
                        </tr>
                          <tr>
                            <td>sepsis</td>
                            <td>{{ $row->sepsis}}</td>
                        </tr>
                          <tr>
                            <td>anaphylaxis</td>
                            <td>{{ $row->anaphylaxis}}</td>
                        </tr>
                          <tr>
                            <td>gbs</td>
                            <td>{{ $row->gbs}}</td>
                        </tr>
                          <tr>
                            <td>transverse_myelitis</td>
                            <td>{{ $row->transverse_myelitis}}</td>
                        </tr>
                          <tr>
                            <td>adem</td>
                            <td>{{ $row->adem}}</td>
                        </tr>
                          <tr>
                            <td>acute_myocardial</td>
                            <td>{{ $row->acute_myocardial}}</td>
                        </tr>
                          <tr>
                            <td>ards</td>
                            <td>{{ $row->ards}}</td>
                        </tr>
                          <tr>
                            <td>chest_pain</td>
                            <td>{{ $row->chest_pain}}</td>
                        </tr>
                          <tr>
                            <td>myocarditis</td>
                            <td>{{ $row->myocarditis}}</td>
                        </tr>
                          <tr>
                            <td>heart_failure</td>
                            <td>{{ $row->heart_failure}}</td>
                        </tr>
                          <tr>
                            <td>pericarditis</td>
                            <td>{{ $row->pericarditis}}</td>
                        </tr>
                          <tr>
                            <td>sudden_cardiac_arrest</td>
                            <td>{{ $row->sudden_cardiac_arrest}}</td>
                        </tr>
                          <tr>
                            <td>covid_19</td>
                            <td>{{ $row->covid_19}}</td>
                        </tr>
                          <tr>
                            <td>ischemic_stroke</td>
                            <td>{{ $row->ischemic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>hemorrhagic_stroke</td>
                            <td>{{ $row->hemorrhagic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>deep_vein_thrombosis</td>
                            <td>{{ $row->deep_vein_thrombosis}}</td>
                        </tr>
                          <tr>
                            <td>pulmonary_embolism</td>
                            <td>{{ $row->pulmonary_embolism}}</td>
                        </tr>
                          <tr>
                            <td>hypertension</td>
                            <td>{{ $row->hypertension}}</td>
                        </tr>
                          <tr>
                            <td>hypertensive_urgency</td>
                            <td>{{ $row->hypertensive_urgency}}</td>
                        </tr>
                          <tr>
                            <td>bells_palsy</td>
                            <td>{{ $row->bells_palsy}}</td>
                        </tr>
                          <tr>
                            <td>symptom_status</td>
                            <td>{{ $row->symptom_status}}</td>
                        </tr>
                          <tr>
                            <td>abortion</td>
                            <td>{{ $row->abortion}}</td>
                        </tr>
                          <tr>
                            <td>abruptio_placenta</td>
                            <td>{{ $row->abruptio_placenta}}</td>
                        </tr>
                          <tr>
                            <td>dfiu</td>
                            <td>{{ $row->dfiu}}</td>
                        </tr>
                          <tr>
                            <td>main_diagnosis</td>
                            <td>{{ $row->main_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>meningitis</td>
                            <td>{{ $row->meningitis}}</td>
                        </tr>
                          <tr>
                            <td>minor_diagnosis</td>
                            <td>{{ $row->minor_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>other_pregnant_symptoms</td>
                            <td>{{ $row->other_pregnant_symptoms}}</td>
                        </tr>
                          <tr>
                            <td>other_symptoms_later_immunized_text</td>
                            <td>{{ $row->other_symptoms_later_immunized_text}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="col-md-4">
                    <!-- Sales Chart Canvas -->
                    <table id="Pfizer">
                      <thead>
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Pfizer</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($count_vac42 as $row)
                        <tr>
                          <td>rash</td>
                          <td>{{$row->rash}}</td>
                        </tr>
                        <tr>
                          <td>erythema</td>
                          <td>{{$row->erythema}}</td>
                        </tr>
                          <tr>
                            <td>urticaria</td>
                            <td>{{$row->urticaria}}</td>
                        </tr>
                          <tr>
                            <td>itching</td>
                            <td>{{$row->itching}}</td>
                        </tr>
                          <tr>
                            <td>edema</td>
                            <td>{{$row->edema}}</td>
                        </tr>
                          <tr>
                            <td>angioedema</td>
                            <td>{{ $row->angioedema}}</td>
                        </tr>
                          <tr>
                            <td>fainting</td>
                            <td>{{ $row->fainting}}</td>
                        </tr>
                          <tr>
                            <td>hyperventilation</td>
                            <td>{{ $row->hyperventilation}}</td>
                        </tr>
                          <tr>
                            <td>syncope</td>
                            <td>{{ $row->syncope}}</td>
                        </tr>
                          <tr>
                            <td>headche</td>
                            <td>{{ $row->headche}}</td>
                        </tr>
                          <tr>
                            <td>dizziness</td>
                            <td>{{ $row->dizziness}}</td>
                        </tr>
                          <tr>
                            <td>fatigue</td>
                            <td>{{ $row->fatigue}}</td>
                        </tr>
                          <tr>
                            <td>malaise</td>
                            <td>{{ $row->malaise}}</td>
                        </tr>
                          <tr>
                            <td>dyspepsia</td>
                            <td>{{ $row->dyspepsia}}</td>
                        </tr>
                          <tr>
                            <td>diarrhea</td>
                            <td>{{ $row->diarrhea}}</td>
                        </tr>
                          <tr>
                            <td>nausea</td>
                            <td>{{ $row->nausea}}</td>
                        </tr>
                          <tr>
                            <td>vomiting</td>
                            <td>{{ $row->vomiting}}</td>
                        </tr>
                          <tr>
                            <td>abdominal_pain</td>
                            <td>{{ $row->abdominal_pain}}</td>
                        </tr>
                          <tr>
                            <td>arthalgia</td>
                            <td>{{ $row->arthalgia}}</td>
                        </tr>
                          <tr>
                            <td>myalgia</td>
                            <td>{{ $row->myalgia}}</td>
                        </tr>
                          <tr>
                            <td>fever38c</td>
                            <td>{{ $row->fever38c}}</td>
                        </tr>
                          <tr>
                            <td>swelling_at_the_injection</td>
                            <td>{{ $row->swelling_at_the_injection}}</td>
                        </tr>
                          <tr>
                            <td>swelling_beyond_nearest_joint</td>
                            <td>{{ $row->swelling_beyond_nearest_joint}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenopathy</td>
                            <td>{{ $row->lymphadenopathy}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenitis</td>
                            <td>{{ $row->lymphadenitis}}</td>
                        </tr>
                          <tr>
                            <td>sterile_abscess</td>
                            <td>{{ $row->sterile_abscess}}</td>
                        </tr>
                          <tr>
                            <td>bacterial_abscess</td>
                            <td>{{ $row->bacterial_abscess}}</td>
                        </tr>
                          <tr>
                            <td>febrile_convulsion</td>
                            <td>{{ $row->febrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>afebrile_convulsion</td>
                            <td>{{ $row->afebrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>encephalopathy</td>
                            <td>{{ $row->encephalopathy}}</td>
                        </tr>
                          <tr>
                            <td>flaccid_paralysis</td>
                            <td>{{ $row->flaccid_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>spastic_paralysis</td>
                            <td>{{ $row->spastic_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>hhe</td>
                            <td>{{ $row->hhe}}</td>
                        </tr>
                          <tr>
                            <td>persistent_inconsolable_crying</td>
                            <td>{{ $row->persistent_inconsolable_crying}}</td>
                        </tr>
                          <tr>
                            <td>thrombocytopenia</td>
                            <td>{{ $row->thrombocytopenia}}</td>
                        </tr>
                          <tr>
                            <td>osteomyelitis</td>
                            <td>{{ $row->osteomyelitis}}</td>
                        </tr>
                          <tr>
                            <td>toxic_shock_syndrome</td>
                            <td>{{ $row->toxic_shock_syndrome}}</td>
                        </tr>
                          <tr>
                            <td>sepsis</td>
                            <td>{{ $row->sepsis}}</td>
                        </tr>
                          <tr>
                            <td>anaphylaxis</td>
                            <td>{{ $row->anaphylaxis}}</td>
                        </tr>
                          <tr>
                            <td>gbs</td>
                            <td>{{ $row->gbs}}</td>
                        </tr>
                          <tr>
                            <td>transverse_myelitis</td>
                            <td>{{ $row->transverse_myelitis}}</td>
                        </tr>
                          <tr>
                            <td>adem</td>
                            <td>{{ $row->adem}}</td>
                        </tr>
                          <tr>
                            <td>acute_myocardial</td>
                            <td>{{ $row->acute_myocardial}}</td>
                        </tr>
                          <tr>
                            <td>ards</td>
                            <td>{{ $row->ards}}</td>
                        </tr>
                          <tr>
                            <td>chest_pain</td>
                            <td>{{ $row->chest_pain}}</td>
                        </tr>
                          <tr>
                            <td>myocarditis</td>
                            <td>{{ $row->myocarditis}}</td>
                        </tr>
                          <tr>
                            <td>heart_failure</td>
                            <td>{{ $row->heart_failure}}</td>
                        </tr>
                          <tr>
                            <td>pericarditis</td>
                            <td>{{ $row->pericarditis}}</td>
                        </tr>
                          <tr>
                            <td>sudden_cardiac_arrest</td>
                            <td>{{ $row->sudden_cardiac_arrest}}</td>
                        </tr>
                          <tr>
                            <td>covid_19</td>
                            <td>{{ $row->covid_19}}</td>
                        </tr>
                          <tr>
                            <td>ischemic_stroke</td>
                            <td>{{ $row->ischemic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>hemorrhagic_stroke</td>
                            <td>{{ $row->hemorrhagic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>deep_vein_thrombosis</td>
                            <td>{{ $row->deep_vein_thrombosis}}</td>
                        </tr>
                          <tr>
                            <td>pulmonary_embolism</td>
                            <td>{{ $row->pulmonary_embolism}}</td>
                        </tr>
                          <tr>
                            <td>hypertension</td>
                            <td>{{ $row->hypertension}}</td>
                        </tr>
                          <tr>
                            <td>hypertensive_urgency</td>
                            <td>{{ $row->hypertensive_urgency}}</td>
                        </tr>
                          <tr>
                            <td>bells_palsy</td>
                            <td>{{ $row->bells_palsy}}</td>
                        </tr>
                          <tr>
                            <td>symptom_status</td>
                            <td>{{ $row->symptom_status}}</td>
                        </tr>
                          <tr>
                            <td>abortion</td>
                            <td>{{ $row->abortion}}</td>
                        </tr>
                          <tr>
                            <td>abruptio_placenta</td>
                            <td>{{ $row->abruptio_placenta}}</td>
                        </tr>
                          <tr>
                            <td>dfiu</td>
                            <td>{{ $row->dfiu}}</td>
                        </tr>
                          <tr>
                            <td>main_diagnosis</td>
                            <td>{{ $row->main_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>meningitis</td>
                            <td>{{ $row->meningitis}}</td>
                        </tr>
                          <tr>
                            <td>minor_diagnosis</td>
                            <td>{{ $row->minor_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>other_pregnant_symptoms</td>
                            <td>{{ $row->other_pregnant_symptoms}}</td>
                        </tr>
                          <tr>
                            <td>other_symptoms_later_immunized_text</td>
                            <td>{{ $row->other_symptoms_later_immunized_text}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="col-md-4">
                    <!-- Sales Chart Canvas -->
                    <table id="Moderna">
                      <thead>
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Moderna</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($count_vac43 as $row)
                        <tr>
                          <td>rash</td>
                          <td>{{$row->rash}}</td>
                        </tr>
                        <tr>
                          <td>erythema</td>
                          <td>{{$row->erythema}}</td>
                        </tr>
                          <tr>
                            <td>urticaria</td>
                            <td>{{$row->urticaria}}</td>
                        </tr>
                          <tr>
                            <td>itching</td>
                            <td>{{$row->itching}}</td>
                        </tr>
                          <tr>
                            <td>edema</td>
                            <td>{{$row->edema}}</td>
                        </tr>
                          <tr>
                            <td>angioedema</td>
                            <td>{{ $row->angioedema}}</td>
                        </tr>
                          <tr>
                            <td>fainting</td>
                            <td>{{ $row->fainting}}</td>
                        </tr>
                          <tr>
                            <td>hyperventilation</td>
                            <td>{{ $row->hyperventilation}}</td>
                        </tr>
                          <tr>
                            <td>syncope</td>
                            <td>{{ $row->syncope}}</td>
                        </tr>
                          <tr>
                            <td>headche</td>
                            <td>{{ $row->headche}}</td>
                        </tr>
                          <tr>
                            <td>dizziness</td>
                            <td>{{ $row->dizziness}}</td>
                        </tr>
                          <tr>
                            <td>fatigue</td>
                            <td>{{ $row->fatigue}}</td>
                        </tr>
                          <tr>
                            <td>malaise</td>
                            <td>{{ $row->malaise}}</td>
                        </tr>
                          <tr>
                            <td>dyspepsia</td>
                            <td>{{ $row->dyspepsia}}</td>
                        </tr>
                          <tr>
                            <td>diarrhea</td>
                            <td>{{ $row->diarrhea}}</td>
                        </tr>
                          <tr>
                            <td>nausea</td>
                            <td>{{ $row->nausea}}</td>
                        </tr>
                          <tr>
                            <td>vomiting</td>
                            <td>{{ $row->vomiting}}</td>
                        </tr>
                          <tr>
                            <td>abdominal_pain</td>
                            <td>{{ $row->abdominal_pain}}</td>
                        </tr>
                          <tr>
                            <td>arthalgia</td>
                            <td>{{ $row->arthalgia}}</td>
                        </tr>
                          <tr>
                            <td>myalgia</td>
                            <td>{{ $row->myalgia}}</td>
                        </tr>
                          <tr>
                            <td>fever38c</td>
                            <td>{{ $row->fever38c}}</td>
                        </tr>
                          <tr>
                            <td>swelling_at_the_injection</td>
                            <td>{{ $row->swelling_at_the_injection}}</td>
                        </tr>
                          <tr>
                            <td>swelling_beyond_nearest_joint</td>
                            <td>{{ $row->swelling_beyond_nearest_joint}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenopathy</td>
                            <td>{{ $row->lymphadenopathy}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenitis</td>
                            <td>{{ $row->lymphadenitis}}</td>
                        </tr>
                          <tr>
                            <td>sterile_abscess</td>
                            <td>{{ $row->sterile_abscess}}</td>
                        </tr>
                          <tr>
                            <td>bacterial_abscess</td>
                            <td>{{ $row->bacterial_abscess}}</td>
                        </tr>
                          <tr>
                            <td>febrile_convulsion</td>
                            <td>{{ $row->febrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>afebrile_convulsion</td>
                            <td>{{ $row->afebrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>encephalopathy</td>
                            <td>{{ $row->encephalopathy}}</td>
                        </tr>
                          <tr>
                            <td>flaccid_paralysis</td>
                            <td>{{ $row->flaccid_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>spastic_paralysis</td>
                            <td>{{ $row->spastic_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>hhe</td>
                            <td>{{ $row->hhe}}</td>
                        </tr>
                          <tr>
                            <td>persistent_inconsolable_crying</td>
                            <td>{{ $row->persistent_inconsolable_crying}}</td>
                        </tr>
                          <tr>
                            <td>thrombocytopenia</td>
                            <td>{{ $row->thrombocytopenia}}</td>
                        </tr>
                          <tr>
                            <td>osteomyelitis</td>
                            <td>{{ $row->osteomyelitis}}</td>
                        </tr>
                          <tr>
                            <td>toxic_shock_syndrome</td>
                            <td>{{ $row->toxic_shock_syndrome}}</td>
                        </tr>
                          <tr>
                            <td>sepsis</td>
                            <td>{{ $row->sepsis}}</td>
                        </tr>
                          <tr>
                            <td>anaphylaxis</td>
                            <td>{{ $row->anaphylaxis}}</td>
                        </tr>
                          <tr>
                            <td>gbs</td>
                            <td>{{ $row->gbs}}</td>
                        </tr>
                          <tr>
                            <td>transverse_myelitis</td>
                            <td>{{ $row->transverse_myelitis}}</td>
                        </tr>
                          <tr>
                            <td>adem</td>
                            <td>{{ $row->adem}}</td>
                        </tr>
                          <tr>
                            <td>acute_myocardial</td>
                            <td>{{ $row->acute_myocardial}}</td>
                        </tr>
                          <tr>
                            <td>ards</td>
                            <td>{{ $row->ards}}</td>
                        </tr>
                          <tr>
                            <td>chest_pain</td>
                            <td>{{ $row->chest_pain}}</td>
                        </tr>
                          <tr>
                            <td>myocarditis</td>
                            <td>{{ $row->myocarditis}}</td>
                        </tr>
                          <tr>
                            <td>heart_failure</td>
                            <td>{{ $row->heart_failure}}</td>
                        </tr>
                          <tr>
                            <td>pericarditis</td>
                            <td>{{ $row->pericarditis}}</td>
                        </tr>
                          <tr>
                            <td>sudden_cardiac_arrest</td>
                            <td>{{ $row->sudden_cardiac_arrest}}</td>
                        </tr>
                          <tr>
                            <td>covid_19</td>
                            <td>{{ $row->covid_19}}</td>
                        </tr>
                          <tr>
                            <td>ischemic_stroke</td>
                            <td>{{ $row->ischemic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>hemorrhagic_stroke</td>
                            <td>{{ $row->hemorrhagic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>deep_vein_thrombosis</td>
                            <td>{{ $row->deep_vein_thrombosis}}</td>
                        </tr>
                          <tr>
                            <td>pulmonary_embolism</td>
                            <td>{{ $row->pulmonary_embolism}}</td>
                        </tr>
                          <tr>
                            <td>hypertension</td>
                            <td>{{ $row->hypertension}}</td>
                        </tr>
                          <tr>
                            <td>hypertensive_urgency</td>
                            <td>{{ $row->hypertensive_urgency}}</td>
                        </tr>
                          <tr>
                            <td>bells_palsy</td>
                            <td>{{ $row->bells_palsy}}</td>
                        </tr>
                          <tr>
                            <td>symptom_status</td>
                            <td>{{ $row->symptom_status}}</td>
                        </tr>
                          <tr>
                            <td>abortion</td>
                            <td>{{ $row->abortion}}</td>
                        </tr>
                          <tr>
                            <td>abruptio_placenta</td>
                            <td>{{ $row->abruptio_placenta}}</td>
                        </tr>
                          <tr>
                            <td>dfiu</td>
                            <td>{{ $row->dfiu}}</td>
                        </tr>
                          <tr>
                            <td>main_diagnosis</td>
                            <td>{{ $row->main_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>meningitis</td>
                            <td>{{ $row->meningitis}}</td>
                        </tr>
                          <tr>
                            <td>minor_diagnosis</td>
                            <td>{{ $row->minor_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>other_pregnant_symptoms</td>
                            <td>{{ $row->other_pregnant_symptoms}}</td>
                        </tr>
                          <tr>
                            <td>other_symptoms_later_immunized_text</td>
                            <td>{{ $row->other_symptoms_later_immunized_text}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="col-md-4">
                    <!-- Sales Chart Canvas -->
                    <table id="JohnsonnJohnson">
                      <thead>
                      <tr>
                        <th>อาการและอาการแสดง</th>
                        <th>Johnson & Johnson</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($count_vac44 as $row)
                        <tr>
                          <td>rash</td>
                          <td>{{$row->rash}}</td>
                        </tr>
                        <tr>
                          <td>erythema</td>
                          <td>{{$row->erythema}}</td>
                        </tr>
                          <tr>
                            <td>urticaria</td>
                            <td>{{$row->urticaria}}</td>
                        </tr>
                          <tr>
                            <td>itching</td>
                            <td>{{$row->itching}}</td>
                        </tr>
                          <tr>
                            <td>edema</td>
                            <td>{{$row->edema}}</td>
                        </tr>
                          <tr>
                            <td>angioedema</td>
                            <td>{{ $row->angioedema}}</td>
                        </tr>
                          <tr>
                            <td>fainting</td>
                            <td>{{ $row->fainting}}</td>
                        </tr>
                          <tr>
                            <td>hyperventilation</td>
                            <td>{{ $row->hyperventilation}}</td>
                        </tr>
                          <tr>
                            <td>syncope</td>
                            <td>{{ $row->syncope}}</td>
                        </tr>
                          <tr>
                            <td>headche</td>
                            <td>{{ $row->headche}}</td>
                        </tr>
                          <tr>
                            <td>dizziness</td>
                            <td>{{ $row->dizziness}}</td>
                        </tr>
                          <tr>
                            <td>fatigue</td>
                            <td>{{ $row->fatigue}}</td>
                        </tr>
                          <tr>
                            <td>malaise</td>
                            <td>{{ $row->malaise}}</td>
                        </tr>
                          <tr>
                            <td>dyspepsia</td>
                            <td>{{ $row->dyspepsia}}</td>
                        </tr>
                          <tr>
                            <td>diarrhea</td>
                            <td>{{ $row->diarrhea}}</td>
                        </tr>
                          <tr>
                            <td>nausea</td>
                            <td>{{ $row->nausea}}</td>
                        </tr>
                          <tr>
                            <td>vomiting</td>
                            <td>{{ $row->vomiting}}</td>
                        </tr>
                          <tr>
                            <td>abdominal_pain</td>
                            <td>{{ $row->abdominal_pain}}</td>
                        </tr>
                          <tr>
                            <td>arthalgia</td>
                            <td>{{ $row->arthalgia}}</td>
                        </tr>
                          <tr>
                            <td>myalgia</td>
                            <td>{{ $row->myalgia}}</td>
                        </tr>
                          <tr>
                            <td>fever38c</td>
                            <td>{{ $row->fever38c}}</td>
                        </tr>
                          <tr>
                            <td>swelling_at_the_injection</td>
                            <td>{{ $row->swelling_at_the_injection}}</td>
                        </tr>
                          <tr>
                            <td>swelling_beyond_nearest_joint</td>
                            <td>{{ $row->swelling_beyond_nearest_joint}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenopathy</td>
                            <td>{{ $row->lymphadenopathy}}</td>
                        </tr>
                          <tr>
                            <td>lymphadenitis</td>
                            <td>{{ $row->lymphadenitis}}</td>
                        </tr>
                          <tr>
                            <td>sterile_abscess</td>
                            <td>{{ $row->sterile_abscess}}</td>
                        </tr>
                          <tr>
                            <td>bacterial_abscess</td>
                            <td>{{ $row->bacterial_abscess}}</td>
                        </tr>
                          <tr>
                            <td>febrile_convulsion</td>
                            <td>{{ $row->febrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>afebrile_convulsion</td>
                            <td>{{ $row->afebrile_convulsion}}</td>
                        </tr>
                          <tr>
                            <td>encephalopathy</td>
                            <td>{{ $row->encephalopathy}}</td>
                        </tr>
                          <tr>
                            <td>flaccid_paralysis</td>
                            <td>{{ $row->flaccid_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>spastic_paralysis</td>
                            <td>{{ $row->spastic_paralysis}}</td>
                        </tr>
                          <tr>
                            <td>hhe</td>
                            <td>{{ $row->hhe}}</td>
                        </tr>
                          <tr>
                            <td>persistent_inconsolable_crying</td>
                            <td>{{ $row->persistent_inconsolable_crying}}</td>
                        </tr>
                          <tr>
                            <td>thrombocytopenia</td>
                            <td>{{ $row->thrombocytopenia}}</td>
                        </tr>
                          <tr>
                            <td>osteomyelitis</td>
                            <td>{{ $row->osteomyelitis}}</td>
                        </tr>
                          <tr>
                            <td>toxic_shock_syndrome</td>
                            <td>{{ $row->toxic_shock_syndrome}}</td>
                        </tr>
                          <tr>
                            <td>sepsis</td>
                            <td>{{ $row->sepsis}}</td>
                        </tr>
                          <tr>
                            <td>anaphylaxis</td>
                            <td>{{ $row->anaphylaxis}}</td>
                        </tr>
                          <tr>
                            <td>gbs</td>
                            <td>{{ $row->gbs}}</td>
                        </tr>
                          <tr>
                            <td>transverse_myelitis</td>
                            <td>{{ $row->transverse_myelitis}}</td>
                        </tr>
                          <tr>
                            <td>adem</td>
                            <td>{{ $row->adem}}</td>
                        </tr>
                          <tr>
                            <td>acute_myocardial</td>
                            <td>{{ $row->acute_myocardial}}</td>
                        </tr>
                          <tr>
                            <td>ards</td>
                            <td>{{ $row->ards}}</td>
                        </tr>
                          <tr>
                            <td>chest_pain</td>
                            <td>{{ $row->chest_pain}}</td>
                        </tr>
                          <tr>
                            <td>myocarditis</td>
                            <td>{{ $row->myocarditis}}</td>
                        </tr>
                          <tr>
                            <td>heart_failure</td>
                            <td>{{ $row->heart_failure}}</td>
                        </tr>
                          <tr>
                            <td>pericarditis</td>
                            <td>{{ $row->pericarditis}}</td>
                        </tr>
                          <tr>
                            <td>sudden_cardiac_arrest</td>
                            <td>{{ $row->sudden_cardiac_arrest}}</td>
                        </tr>
                          <tr>
                            <td>covid_19</td>
                            <td>{{ $row->covid_19}}</td>
                        </tr>
                          <tr>
                            <td>ischemic_stroke</td>
                            <td>{{ $row->ischemic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>hemorrhagic_stroke</td>
                            <td>{{ $row->hemorrhagic_stroke}}</td>
                        </tr>
                          <tr>
                            <td>deep_vein_thrombosis</td>
                            <td>{{ $row->deep_vein_thrombosis}}</td>
                        </tr>
                          <tr>
                            <td>pulmonary_embolism</td>
                            <td>{{ $row->pulmonary_embolism}}</td>
                        </tr>
                          <tr>
                            <td>hypertension</td>
                            <td>{{ $row->hypertension}}</td>
                        </tr>
                          <tr>
                            <td>hypertensive_urgency</td>
                            <td>{{ $row->hypertensive_urgency}}</td>
                        </tr>
                          <tr>
                            <td>bells_palsy</td>
                            <td>{{ $row->bells_palsy}}</td>
                        </tr>
                          <tr>
                            <td>symptom_status</td>
                            <td>{{ $row->symptom_status}}</td>
                        </tr>
                          <tr>
                            <td>abortion</td>
                            <td>{{ $row->abortion}}</td>
                        </tr>
                          <tr>
                            <td>abruptio_placenta</td>
                            <td>{{ $row->abruptio_placenta}}</td>
                        </tr>
                          <tr>
                            <td>dfiu</td>
                            <td>{{ $row->dfiu}}</td>
                        </tr>
                          <tr>
                            <td>main_diagnosis</td>
                            <td>{{ $row->main_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>meningitis</td>
                            <td>{{ $row->meningitis}}</td>
                        </tr>
                          <tr>
                            <td>minor_diagnosis</td>
                            <td>{{ $row->minor_diagnosis}}</td>
                        </tr>
                          <tr>
                            <td>other_pregnant_symptoms</td>
                            <td>{{ $row->other_pregnant_symptoms}}</td>
                        </tr>
                          <tr>
                            <td>other_symptoms_later_immunized_text</td>
                            <td>{{ $row->other_symptoms_later_immunized_text}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.row -->
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">อัตราการรายงานAEFI COVID</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart-responsive">
                <div id="chartContainernew" style="height: 450px; width: 120%;"></div>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            {{-- <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> ร้ายแรง</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> ไม่ร้ายแรง</li>
              </ul>
            </div> --}}
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.box -->

    <!-- /.box -->
  </div>
</section>

@include('AEFI.layout.footerScriptDashcovid')
<!-- /.content -->
<script src="asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#sinovac').DataTable({
      "pageLength": 5,
      "searching": false,
      // "ordering": false,
       "order": [[ 1, 'desc' ]]
});
$('#Astrazeneca').DataTable({
      "pageLength": 5,
      "searching": false,
      // "ordering": false,
       "order": [[ 1, 'desc' ]]
});
$('#Sinopharm').DataTable({
      "pageLength": 5,
      "searching": false,
      // "ordering": false,
       "order": [[ 1, 'desc' ]]
});
$('#Pfizer').DataTable({
      "pageLength": 5,
      "searching": false,
      // "ordering": false,
       "order": [[ 1, 'desc' ]]
});
$('#Moderna').DataTable({
      "pageLength": 5,
      "searching": false,
      // "ordering": false,
       "order": [[ 1, 'desc' ]]
});
$('#JohnsonnJohnson').DataTable({
      "pageLength": 5,
      "searching": false,
      // "ordering": false,
       "order": [[ 1, 'desc' ]]
});
} );

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: ""
	},
  
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			{ label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week[0]->count_case) ? $count_week[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week[1]->count_case) ? $count_week[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week[2]->count_case) ? $count_week[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week[3]->count_case) ? $count_week[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week[4]->count_case) ? $count_week[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week[5]->count_case) ? $count_week[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week[6]->count_case) ? $count_week[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week[7]->count_case) ? $count_week[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week[8]->count_case) ? $count_week[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week[9]->count_case) ? $count_week[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week[10]->count_case) ? $count_week[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week[11]->count_case) ? $count_week[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week[12]->count_case) ? $count_week[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week[13]->count_case) ? $count_week[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week[14]->count_case) ? $count_week[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week[15]->count_case) ? $count_week[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week[16]->count_case) ? $count_week[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week[17]->count_case) ? $count_week[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week[18]->count_case) ? $count_week[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week[19]->count_case) ? $count_week[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week[20]->count_case) ? $count_week[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week[21]->count_case) ? $count_week[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week[22]->count_case) ? $count_week[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week[23]->count_case) ? $count_week[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week[24]->count_case) ? $count_week[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week[25]->count_case) ? $count_week[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week[26]->count_case) ? $count_week[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week[27]->count_case) ? $count_week[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week[28]->count_case) ? $count_week[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week[29]->count_case) ? $count_week[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week[30]->count_case) ? $count_week[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week[31]->count_case) ? $count_week[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week[32]->count_case) ? $count_week[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week[33]->count_case) ? $count_week[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week[34]->count_case) ? $count_week[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week[35]->count_case) ? $count_week[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week[36]->count_case) ? $count_week[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week[37]->count_case) ? $count_week[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week[38]->count_case) ? $count_week[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week[39]->count_case) ? $count_week[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week[40]->count_case) ? $count_week[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week[41]->count_case) ? $count_week[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week[42]->count_case) ? $count_week[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week[43]->count_case) ? $count_week[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week[44]->count_case) ? $count_week[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week[45]->count_case) ? $count_week[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week[46]->count_case) ? $count_week[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week[47]->count_case) ? $count_week[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week[48]->count_case) ? $count_week[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week[49]->count_case) ? $count_week[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week[50]->count_case) ? $count_week[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week[51]->count_case) ? $count_week[51]->count_case : "null" }} }
		]
	}]
});
chart.render();

}

var chart = new CanvasJS.Chart("chartContainernew", {
	animationEnabled: true,
	exportEnabled: true,
	// title:{
	// 	text: "Gold Medals Won in Olympics"             
	// }, 
	// axisY:{
	// 	title: "Number of Medals"
	// },
	toolTip: {
		shared: true
	},
	legend:{
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{        
		type: "spline",  
		name: "Sinovac",        
		showInLegend: true,
		dataPoints: [
      { label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week_39[0]->count_case) ? $count_week_39[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week_39[1]->count_case) ? $count_week_39[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week_39[2]->count_case) ? $count_week_39[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week_39[3]->count_case) ? $count_week_39[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week_39[4]->count_case) ? $count_week_39[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week_39[5]->count_case) ? $count_week_39[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week_39[6]->count_case) ? $count_week_39[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week_39[7]->count_case) ? $count_week_39[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week_39[8]->count_case) ? $count_week_39[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week_39[9]->count_case) ? $count_week_39[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week_39[10]->count_case) ? $count_week_39[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week_39[11]->count_case) ? $count_week_39[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week_39[12]->count_case) ? $count_week_39[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week_39[13]->count_case) ? $count_week_39[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week_39[14]->count_case) ? $count_week_39[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week_39[15]->count_case) ? $count_week_39[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week_39[16]->count_case) ? $count_week_39[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week_39[17]->count_case) ? $count_week_39[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week_39[18]->count_case) ? $count_week_39[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week_39[19]->count_case) ? $count_week_39[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week_39[20]->count_case) ? $count_week_39[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week_39[21]->count_case) ? $count_week_39[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week_39[22]->count_case) ? $count_week_39[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week_39[23]->count_case) ? $count_week_39[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week_39[24]->count_case) ? $count_week_39[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week_39[25]->count_case) ? $count_week_39[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week_39[26]->count_case) ? $count_week_39[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week_39[27]->count_case) ? $count_week_39[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week_39[28]->count_case) ? $count_week_39[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week_39[29]->count_case) ? $count_week_39[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week_39[30]->count_case) ? $count_week_39[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week_39[31]->count_case) ? $count_week_39[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week_39[32]->count_case) ? $count_week_39[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week_39[33]->count_case) ? $count_week_39[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week_39[34]->count_case) ? $count_week_39[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week_39[35]->count_case) ? $count_week_39[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week_39[36]->count_case) ? $count_week_39[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week_39[37]->count_case) ? $count_week_39[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week_39[38]->count_case) ? $count_week_39[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week_39[39]->count_case) ? $count_week_39[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week_39[40]->count_case) ? $count_week_39[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week_39[41]->count_case) ? $count_week_39[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week_39[42]->count_case) ? $count_week_39[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week_39[43]->count_case) ? $count_week_39[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week_39[44]->count_case) ? $count_week_39[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week_39[45]->count_case) ? $count_week_39[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week_39[46]->count_case) ? $count_week_39[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week_39[47]->count_case) ? $count_week_39[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week_39[48]->count_case) ? $count_week_39[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week_39[49]->count_case) ? $count_week_39[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week_39[50]->count_case) ? $count_week_39[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week_39[51]->count_case) ? $count_week_39[51]->count_case : "null" }} }
		]
	}, 
	{        
		type: "spline",
		name: "Astrazeneca",        
		showInLegend: true,
		dataPoints: [
      { label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week_40[0]->count_case) ? $count_week_40[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week_40[1]->count_case) ? $count_week_40[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week_40[2]->count_case) ? $count_week_40[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week_40[3]->count_case) ? $count_week_40[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week_40[4]->count_case) ? $count_week_40[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week_40[5]->count_case) ? $count_week_40[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week_40[6]->count_case) ? $count_week_40[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week_40[7]->count_case) ? $count_week_40[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week_40[8]->count_case) ? $count_week_40[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week_40[9]->count_case) ? $count_week_40[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week_40[10]->count_case) ? $count_week_40[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week_40[11]->count_case) ? $count_week_40[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week_40[12]->count_case) ? $count_week_40[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week_40[13]->count_case) ? $count_week_40[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week_40[14]->count_case) ? $count_week_40[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week_40[15]->count_case) ? $count_week_40[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week_40[16]->count_case) ? $count_week_40[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week_40[17]->count_case) ? $count_week_40[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week_40[18]->count_case) ? $count_week_40[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week_40[19]->count_case) ? $count_week_40[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week_40[20]->count_case) ? $count_week_40[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week_40[21]->count_case) ? $count_week_40[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week_40[22]->count_case) ? $count_week_40[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week_40[23]->count_case) ? $count_week_40[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week_40[24]->count_case) ? $count_week_40[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week_40[25]->count_case) ? $count_week_40[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week_40[26]->count_case) ? $count_week_40[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week_40[27]->count_case) ? $count_week_40[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week_40[28]->count_case) ? $count_week_40[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week_40[29]->count_case) ? $count_week_40[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week_40[30]->count_case) ? $count_week_40[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week_40[31]->count_case) ? $count_week_40[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week_40[32]->count_case) ? $count_week_40[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week_40[33]->count_case) ? $count_week_40[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week_40[34]->count_case) ? $count_week_40[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week_40[35]->count_case) ? $count_week_40[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week_40[36]->count_case) ? $count_week_40[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week_40[37]->count_case) ? $count_week_40[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week_40[38]->count_case) ? $count_week_40[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week_40[39]->count_case) ? $count_week_40[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week_40[40]->count_case) ? $count_week_40[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week_40[41]->count_case) ? $count_week_40[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week_40[42]->count_case) ? $count_week_40[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week_40[43]->count_case) ? $count_week_40[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week_40[44]->count_case) ? $count_week_40[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week_40[45]->count_case) ? $count_week_40[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week_40[46]->count_case) ? $count_week_40[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week_40[47]->count_case) ? $count_week_40[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week_40[48]->count_case) ? $count_week_40[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week_40[49]->count_case) ? $count_week_40[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week_40[50]->count_case) ? $count_week_40[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week_40[51]->count_case) ? $count_week_40[51]->count_case : "null" }} }
		]
	},
	{        
		type: "spline",  
		name: "Sinopharm",        
		showInLegend: true,
		dataPoints: [
      { label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week[0]->count_case) ? $count_week_41[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week_41[1]->count_case) ? $count_week_41[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week_41[2]->count_case) ? $count_week_41[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week_41[3]->count_case) ? $count_week_41[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week_41[4]->count_case) ? $count_week_41[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week_41[5]->count_case) ? $count_week_41[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week_41[6]->count_case) ? $count_week_41[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week_41[7]->count_case) ? $count_week_41[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week_41[8]->count_case) ? $count_week_41[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week_41[9]->count_case) ? $count_week_41[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week_41[10]->count_case) ? $count_week_41[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week_41[11]->count_case) ? $count_week_41[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week_41[12]->count_case) ? $count_week_41[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week_41[13]->count_case) ? $count_week_41[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week_41[14]->count_case) ? $count_week_41[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week_41[15]->count_case) ? $count_week_41[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week_41[16]->count_case) ? $count_week_41[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week_41[17]->count_case) ? $count_week_41[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week_41[18]->count_case) ? $count_week_41[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week_41[19]->count_case) ? $count_week_41[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week_41[20]->count_case) ? $count_week_41[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week_41[21]->count_case) ? $count_week_41[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week_41[22]->count_case) ? $count_week_41[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week_41[23]->count_case) ? $count_week_41[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week_41[24]->count_case) ? $count_week_41[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week_41[25]->count_case) ? $count_week_41[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week_41[26]->count_case) ? $count_week_41[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week_41[27]->count_case) ? $count_week_41[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week_41[28]->count_case) ? $count_week_41[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week_41[29]->count_case) ? $count_week_41[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week_41[30]->count_case) ? $count_week_41[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week_41[31]->count_case) ? $count_week_41[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week_41[32]->count_case) ? $count_week_41[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week_41[33]->count_case) ? $count_week_41[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week_41[34]->count_case) ? $count_week_41[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week_41[35]->count_case) ? $count_week_41[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week_41[36]->count_case) ? $count_week_41[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week_41[37]->count_case) ? $count_week_41[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week_41[38]->count_case) ? $count_week_41[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week_41[39]->count_case) ? $count_week_41[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week_41[40]->count_case) ? $count_week_41[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week_41[41]->count_case) ? $count_week_41[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week_41[42]->count_case) ? $count_week_41[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week_41[43]->count_case) ? $count_week_41[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week_41[44]->count_case) ? $count_week_41[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week_41[45]->count_case) ? $count_week_41[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week_41[46]->count_case) ? $count_week_41[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week_41[47]->count_case) ? $count_week_41[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week_41[48]->count_case) ? $count_week_41[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week_41[49]->count_case) ? $count_week_41[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week_41[50]->count_case) ? $count_week_41[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week_41[51]->count_case) ? $count_week_41[51]->count_case : "null" }} }
		]
	},
	{        
		type: "spline",  
		name: "Pfizer",        
		showInLegend: true,
		dataPoints: [
      { label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week_42[0]->count_case) ? $count_week_42[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week_42[1]->count_case) ? $count_week_42[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week_42[2]->count_case) ? $count_week_42[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week_42[3]->count_case) ? $count_week_42[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week_42[4]->count_case) ? $count_week_42[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week_42[5]->count_case) ? $count_week_42[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week_42[6]->count_case) ? $count_week_42[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week_42[7]->count_case) ? $count_week_42[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week_42[8]->count_case) ? $count_week_42[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week_42[9]->count_case) ? $count_week_42[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week_42[10]->count_case) ? $count_week_42[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week_42[11]->count_case) ? $count_week_42[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week_42[12]->count_case) ? $count_week_42[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week_42[13]->count_case) ? $count_week_42[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week_42[14]->count_case) ? $count_week_42[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week_42[15]->count_case) ? $count_week_42[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week_42[16]->count_case) ? $count_week_42[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week_42[17]->count_case) ? $count_week_42[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week_42[18]->count_case) ? $count_week_42[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week_42[19]->count_case) ? $count_week_42[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week_42[20]->count_case) ? $count_week_42[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week_42[21]->count_case) ? $count_week_42[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week_42[22]->count_case) ? $count_week_42[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week_42[23]->count_case) ? $count_week_42[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week_42[24]->count_case) ? $count_week_42[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week_42[25]->count_case) ? $count_week_42[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week_42[26]->count_case) ? $count_week_42[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week_42[27]->count_case) ? $count_week_42[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week_42[28]->count_case) ? $count_week_42[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week_42[29]->count_case) ? $count_week_42[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week_42[30]->count_case) ? $count_week_42[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week_42[31]->count_case) ? $count_week_42[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week_42[32]->count_case) ? $count_week_42[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week_42[33]->count_case) ? $count_week_42[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week_42[34]->count_case) ? $count_week_42[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week_42[35]->count_case) ? $count_week_42[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week_42[36]->count_case) ? $count_week_42[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week_42[37]->count_case) ? $count_week_42[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week_42[38]->count_case) ? $count_week_42[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week_42[39]->count_case) ? $count_week_42[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week_42[40]->count_case) ? $count_week_42[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week_42[41]->count_case) ? $count_week_42[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week_42[42]->count_case) ? $count_week_42[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week_42[43]->count_case) ? $count_week_42[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week_42[44]->count_case) ? $count_week_42[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week_42[45]->count_case) ? $count_week_42[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week_42[46]->count_case) ? $count_week_42[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week_42[47]->count_case) ? $count_week_42[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week_42[48]->count_case) ? $count_week_42[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week_42[49]->count_case) ? $count_week_42[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week_42[50]->count_case) ? $count_week_42[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week_42[51]->count_case) ? $count_week_42[51]->count_case : "null" }} }
		]
	},
	{        
		type: "spline",  
		name: "Moderna",        
		showInLegend: true,
		dataPoints: [
      { label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week_43[0]->count_case) ? $count_week_43[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week_43[1]->count_case) ? $count_week_43[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week_43[2]->count_case) ? $count_week_43[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week_43[3]->count_case) ? $count_week_43[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week_43[4]->count_case) ? $count_week_43[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week_43[5]->count_case) ? $count_week_43[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week_43[6]->count_case) ? $count_week_43[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week_43[7]->count_case) ? $count_week_43[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week_43[8]->count_case) ? $count_week_43[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week_43[9]->count_case) ? $count_week_43[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week_43[10]->count_case) ? $count_week_43[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week_43[11]->count_case) ? $count_week_43[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week_43[12]->count_case) ? $count_week_43[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week_43[13]->count_case) ? $count_week_43[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week_43[14]->count_case) ? $count_week_43[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week_43[15]->count_case) ? $count_week_43[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week_43[16]->count_case) ? $count_week_43[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week_43[17]->count_case) ? $count_week_43[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week_43[18]->count_case) ? $count_week_43[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week_43[19]->count_case) ? $count_week_43[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week_43[20]->count_case) ? $count_week_43[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week_43[21]->count_case) ? $count_week_43[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week_43[22]->count_case) ? $count_week_43[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week_43[23]->count_case) ? $count_week_43[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week_43[24]->count_case) ? $count_week_43[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week_43[25]->count_case) ? $count_week_43[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week_43[26]->count_case) ? $count_week_43[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week_43[27]->count_case) ? $count_week_43[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week_43[28]->count_case) ? $count_week_43[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week_43[29]->count_case) ? $count_week_43[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week_43[30]->count_case) ? $count_week_43[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week_43[31]->count_case) ? $count_week_43[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week_43[32]->count_case) ? $count_week_43[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week_43[33]->count_case) ? $count_week_43[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week_43[34]->count_case) ? $count_week_43[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week_43[35]->count_case) ? $count_week_43[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week_43[36]->count_case) ? $count_week_43[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week_43[37]->count_case) ? $count_week_43[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week_43[38]->count_case) ? $count_week_43[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week_43[39]->count_case) ? $count_week_43[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week_43[40]->count_case) ? $count_week_43[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week_43[41]->count_case) ? $count_week_43[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week_43[42]->count_case) ? $count_week_43[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week_43[43]->count_case) ? $count_week_43[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week_43[44]->count_case) ? $count_week_43[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week_43[45]->count_case) ? $count_week_43[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week_43[46]->count_case) ? $count_week_43[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week_43[47]->count_case) ? $count_week_43[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week_43[48]->count_case) ? $count_week_43[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week_43[49]->count_case) ? $count_week_43[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week_43[50]->count_case) ? $count_week_43[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week_43[51]->count_case) ? $count_week_43[51]->count_case : "null" }} }
		]
	},  
	{        
		type: "spline",  
		name: "Johnson & Johnson",        
		showInLegend: true,
		dataPoints: [
      { label: "สัปดาห์ที่ 1",  x: 1 , y: {{ isset($count_week_44[0]->count_case) ? $count_week_44[0]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 2",  x: 2 , y: {{ isset($count_week_44[1]->count_case) ? $count_week_44[1]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 3",  x: 3 , y: {{ isset($count_week_44[2]->count_case) ? $count_week_44[2]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 4",  x: 4 , y: {{ isset($count_week_44[3]->count_case) ? $count_week_44[3]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 5",  x: 5 , y: {{ isset($count_week_44[4]->count_case) ? $count_week_44[4]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 6",  x: 6 , y: {{ isset($count_week_44[5]->count_case) ? $count_week_44[5]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 7",  x: 7 , y: {{ isset($count_week_44[6]->count_case) ? $count_week_44[6]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 8",  x: 8 , y: {{ isset($count_week_44[7]->count_case) ? $count_week_44[7]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 9",  x: 9 , y: {{ isset($count_week_44[8]->count_case) ? $count_week_44[8]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 10",  x: 10 , y: {{ isset($count_week_44[9]->count_case) ? $count_week_44[9]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 11",  x: 11 , y: {{ isset($count_week_44[10]->count_case) ? $count_week_44[10]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 12",  x: 12 , y: {{ isset($count_week_44[11]->count_case) ? $count_week_44[11]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 13",  x: 13 , y: {{ isset($count_week_44[12]->count_case) ? $count_week_44[12]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 14",  x: 14 , y: {{ isset($count_week_44[13]->count_case) ? $count_week_44[13]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 15",  x: 15 , y: {{ isset($count_week_44[14]->count_case) ? $count_week_44[14]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 16",  x: 16 , y: {{ isset($count_week_44[15]->count_case) ? $count_week_44[15]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 17",  x: 17 , y: {{ isset($count_week_44[16]->count_case) ? $count_week_44[16]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 18",  x: 18 , y: {{ isset($count_week_44[17]->count_case) ? $count_week_44[17]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 19",  x: 19 , y: {{ isset($count_week_44[18]->count_case) ? $count_week_44[18]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 20",  x: 20 , y: {{ isset($count_week_44[19]->count_case) ? $count_week_44[19]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 21",  x: 21 , y: {{ isset($count_week_44[20]->count_case) ? $count_week_44[20]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 22",  x: 22 , y: {{ isset($count_week_44[21]->count_case) ? $count_week_44[21]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 23",  x: 23 , y: {{ isset($count_week_44[22]->count_case) ? $count_week_44[22]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 24",  x: 24 , y: {{ isset($count_week_44[23]->count_case) ? $count_week_44[23]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 25",  x: 25 , y: {{ isset($count_week_44[24]->count_case) ? $count_week_44[24]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 26",  x: 26 , y: {{ isset($count_week_44[25]->count_case) ? $count_week_44[25]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 27",  x: 27 , y: {{ isset($count_week_44[26]->count_case) ? $count_week_44[26]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 28",  x: 28 , y: {{ isset($count_week_44[27]->count_case) ? $count_week_44[27]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 29",  x: 29 , y: {{ isset($count_week_44[28]->count_case) ? $count_week_44[28]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 30",  x: 30 , y: {{ isset($count_week_44[29]->count_case) ? $count_week_44[29]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 31",  x: 31 , y: {{ isset($count_week_44[30]->count_case) ? $count_week_44[30]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 32",  x: 32 , y: {{ isset($count_week_44[31]->count_case) ? $count_week_44[31]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 33",  x: 33 , y: {{ isset($count_week_44[32]->count_case) ? $count_week_44[32]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 34",  x: 34 , y: {{ isset($count_week_44[33]->count_case) ? $count_week_44[33]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 35",  x: 35 , y: {{ isset($count_week_44[34]->count_case) ? $count_week_44[34]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 36",  x: 36 , y: {{ isset($count_week_44[35]->count_case) ? $count_week_44[35]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 37",  x: 37 , y: {{ isset($count_week_44[36]->count_case) ? $count_week_44[36]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 38",  x: 38 , y: {{ isset($count_week_44[37]->count_case) ? $count_week_44[37]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 39",  x: 39 , y: {{ isset($count_week_44[38]->count_case) ? $count_week_44[38]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 40",  x: 40 , y: {{ isset($count_week_44[39]->count_case) ? $count_week_44[39]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 41",  x: 41 , y: {{ isset($count_week_44[40]->count_case) ? $count_week_44[40]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 42",  x: 42 , y: {{ isset($count_week_44[41]->count_case) ? $count_week_44[41]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 43",  x: 43 , y: {{ isset($count_week_44[42]->count_case) ? $count_week_44[42]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 44",  x: 44 , y: {{ isset($count_week_44[43]->count_case) ? $count_week_44[43]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 45",  x: 45 , y: {{ isset($count_week_44[44]->count_case) ? $count_week_44[44]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 46",  x: 46 , y: {{ isset($count_week_44[45]->count_case) ? $count_week_44[45]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 47",  x: 47 , y: {{ isset($count_week_44[46]->count_case) ? $count_week_44[46]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 48",  x: 48 , y: {{ isset($count_week_44[47]->count_case) ? $count_week_44[47]->count_case : "null" }} },
			{ label: "สัปดาห์ที่ 49",  x: 49 , y: {{ isset($count_week_44[48]->count_case) ? $count_week_44[48]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 50",  x: 50 , y: {{ isset($count_week_44[49]->count_case) ? $count_week_44[49]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 51",  x: 51 , y: {{ isset($count_week_44[50]->count_case) ? $count_week_44[50]->count_case : "null" }} },
      { label: "สัปดาห์ที่ 52",  x: 52 , y: {{ isset($count_week_44[51]->count_case) ? $count_week_44[51]->count_case : "null" }} }
		]
	}]
});

chart.render();

function toggleDataSeries(e) {
	if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;            
	}
	chart.render();
}

 </script>
@stop
