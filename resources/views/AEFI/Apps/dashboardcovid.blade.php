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
                <div id="piechartContainer" style="height: 370px; width: 100%;"></div>
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
 </script>
@stop
