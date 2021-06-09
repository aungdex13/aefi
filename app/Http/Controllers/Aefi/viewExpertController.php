<?php

namespace App\Http\Controllers\Aefi;

use App\ViewAEFI1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ViewExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $ViewAEFI1Data = DB::table('aefi_form_1')->select('*')->where('id_case', [$req->id_case] )->get();
        if ($ViewAEFI1Data-> count() > 0) {
          $ViewAEFI1ExpertData = DB::table('expertmeeting')
          ->select('id_case','final_diag','aefi_classification','summary','expert_meet_date','other_final_diag')
          ->where('id_case', [$req->id_case] )
          ->latest('id')
          ->get();
        }
        // dd($ViewAEFI1ExpertData);
        $listProvince=$this->listProvince();
        $listDistrict=$this->listDistrict();
        $listsubdistrict=$this->listsubdistrict();
        $listvac_arr=$this->listvac_arr();
        $vaclist=$this->vaclist();
        $list_hos=$this->list_hos();
        return view('AEFI.Apps.viewExpert',[
          "ViewAEFI1Data" => $ViewAEFI1Data,
          "listProvince" =>$listProvince,
          "listDistrict" =>$listDistrict,
          "listsubdistrict" =>$listsubdistrict,
          "listvac_arr"=>$listvac_arr,
          "vaclist"=>$vaclist,
          "list_hos"=>$list_hos,
          "ViewAEFI1ExpertData"=>$ViewAEFI1ExpertData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ViewAEFI1  $viewAEFI1
     * @return \Illuminate\Http\Response
     */
    public function show(ViewAEFI1 $viewAEFI1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewAEFI1  $viewAEFI1
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewAEFI1 $viewAEFI1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewAEFI1  $viewAEFI1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewAEFI1 $viewAEFI1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewAEFI1  $viewAEFI1
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewAEFI1 $viewAEFI1)
    {
        //
    }
    protected function listProvince(){
			$province = DB::table('tbl_provinces')
			->select('province_code','province_name')
			->orderBy('province_code', 'ASC')
			->get();
			foreach ($province as  $value) {
				$province_arr[$value->province_code] =trim($value->province_name);
			}
			// dd($province_arr);
			return $province_arr;
		}
		protected function listDistrict(){
			$district = DB::table('tbl_amphures')->select('amphur_code','amphur_name')->get();
			foreach ($district as  $value) {
				$district_arr[$value->amphur_code] =trim($value->amphur_name);
			}
			// dd($province_arr);
			return $district_arr;
		}
	  protected function listsubdistrict(){
			$subdistrict = DB::table('tbl_districts')->select('district_code','district_name')->get();
			foreach ($subdistrict as  $value) {
				$district_arr[$value->district_code] =trim($value->district_name);
			}
			// dd($province_arr);
			return $district_arr;
		}
    protected function listvac_arr(){
      $arr_vac = DB::table('vac_tbl')->select('VAC_CODE','VAC_NAME_EN')->get();
      foreach ($arr_vac as  $value) {
        $arr_vac[$value->VAC_CODE] =trim($value->VAC_NAME_EN);
      }
      // dd($province_arr);
      return $arr_vac;
    }
    protected function vaclist(){
      $arr_vaclist = DB::table('vac_tbl')
      ->select('VAC_CODE','VAC_NAME_EN')
      ->orderBy('VAC_CODE', 'ASC')
      ->get();
       // dd($vaclist);
      return $arr_vaclist;
    }
    protected function list_hos(){
      $arr_hos = DB::table('chospital_new')->select('hospcode','hosp_name')->get();
      foreach ($arr_hos as  $value) {
        $arr_hos[$value->hospcode] =trim($value->hosp_name);
      }
       // dd($arr_hos);
      return $arr_hos;
    }
}
