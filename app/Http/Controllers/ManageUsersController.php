<?php

namespace App\Http\Controllers;
use App\User;
use App\ChospitalNew;
use Illuminate\Http\Request;
use Cache;
use DB;
class ManageUsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datas = User::all();
      $data_list_division = Cache::remember('ChospitalNewALL', 1440, function() {
         $data_arr = ChospitalNew::select('hosp_name','hospcode')->get();
         foreach ($data_arr as $data_val){
           $arr[$data_val->hospcode] = $data_val->hosp_name;
         }
         return $arr;
      });
      $listProvince=$this->listProvince();
      return view('aefi.managerusers.index',[
        'datas' => $datas,
        'datas_div' => $data_list_division,
        'listProvince' => $listProvince,
      ]);
    }

    public function updateConfirm(Request $request){

      $data_select = User::select('confirm')->where('id',$request->id)->first();
      if($data_select->confirm=="1"){
        $status_confirm = "0";
      }else{
        $status_confirm = "1";
      }
      $user = User::find($request->id);
      $user->confirm = $status_confirm;
      if($user->save()) return "ok";
    }
    protected function listProvince(){
			$province = DB::table('ref_province')
			->select('province_id','province_name')
			->orderBy('province_id', 'ASC')
			->get();
			foreach ($province as  $value) {
				$province_arr[$value->province_id] =trim($value->province_name);
			}
			// dd($province_arr);
			return $province_arr;
		}
}
