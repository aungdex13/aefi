<?php

namespace App\Http\Controllers\Aefi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListAEFI1;
use DataTables;

class ListAEFI1Controller extends Controller
{
    public function index(Request $request)
    {
      $yearnow =  now()->year;
			$roleArrusername = auth()->user()->username;
			$roleArrhospcode = auth()->user()->hospcode;
			$roleArrprov_code = auth()->user()->prov_code;
			$roleArrregion = auth()->user()->region;
			$roleArrdist_code = auth()->user()->ampur_code;
			$district_user=$roleArrprov_code.$roleArrdist_code;
    		$roleArr = auth()->user()->getRoleNames()->toArray();
        if ($request->ajax()) {
            $selectcaselstF1 = ListAEFI1::join('aefi_form_1_vac', 'aefi_form_1.id_case', '=', 'aefi_form_1_vac.id_case')
        		->leftjoin('aefi_form_2', 'aefi_form_1.id_case', '=', 'aefi_form_2.id_case')
        		->select(	'aefi_form_1.id',
        							'aefi_form_2.id_case as aefi2',
        							'aefi_form_1.id_case',
        							'aefi_form_1.hn',
        							'aefi_form_1.an',
        							'aefi_form_1.first_name',
        							'aefi_form_1.sur_name',
        							'aefi_form_1.age_while_sick_year',
        							'aefi_form_1.nationality',
        							'aefi_form_1.gender',
        							'aefi_form_1.other_nationality',
        							'aefi_form_1.village_no',
        							'aefi_form_1.province',
        							'aefi_form_1.district',
        							'aefi_form_1.subdistrict',
        							'aefi_form_1.necessary_to_investigate',
        							'aefi_form_1.case_vac_id',
        							'aefi_form_1_vac.name_of_vaccine',
        							'aefi_form_1.date_of_symptoms',
        							'aefi_form_1_vac.main_diagnosis',
        							'aefi_form_1.minor_diagnosis'
        						);
        		 if (count($roleArr) > 0) {
        				$user_role = $roleArr[0];
        			switch ($user_role) {
        				case 'hospital':
        					// dd("p;p");
        					$caselstF1  = $selectcaselstF1
        									->Where('aefi_form_1.user_hospcode',"=",$roleArrhospcode)
        									->orWhere('aefi_form_1.hospcode_treat',"=",$roleArrhospcode)
        									->whereNull('aefi_form_1.status')
        									->groupBy('aefi_form_1.id_case')
        									->get();

        				break;
        				case 'pho':
        					$caselstF1 = $selectcaselstF1
        									->where('user_provcode',$roleArrprov_code)
        									->whereNull('aefi_form_1.status')
        									->groupBy('aefi_form_1.id_case')
        									->get();
        					break;
        					case 'dpc':
        					if ($roleArrhospcode == "41173") {
        							$caselstF1 = $selectcaselstF1
        									// ->where('user_region',$roleArrregion)
        									->whereNull('aefi_form_1.status')
        									->groupBy('aefi_form_1.id_case')
        									->get();
        					}else {
        						$caselstF1 = $selectcaselstF1
        								// ->where('user_region',$roleArrregion)
        								->whereIn('aefi_form_1.province',$selectgroupprov)
        								->whereNull('aefi_form_1.status')
        								->groupBy('aefi_form_1.id_case')
        								->get();
        					}
        						break;
        						case 'ddc':
        							$caselstF1 = $selectcaselstF1
        							->whereNull('aefi_form_1.status')
        							->groupBy('aefi_form_1.id_case')
        							->get();
        							break;
        							case 'admin':
        								$caselstF1 = $selectcaselstF1
        								->whereNull('aefi_form_1.status')
        								->groupBy('aefi_form_1.id_case')
        								->get();
        								break;
        			default:
        				break;
        		}
        	}
            // dd($data);
            return Datatables::of($selectcaselstF1)
                    ->addIndexColumn()
                    ->addColumn('action', function($selectcaselstF1){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('AEFI.new-list.listaefi1');
    }
}
