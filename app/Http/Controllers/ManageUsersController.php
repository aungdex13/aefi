<?php

namespace App\Http\Controllers;
use App\User;
use App\ChospitalNew;
use Illuminate\Http\Request;
use Cache;

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
      return view('aefi.managerusers.index',[
        'datas' => $datas,
        'datas_div' => $data_list_division
      ]);
    }

}
