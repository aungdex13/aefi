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
         return ChospitalNew::all();
      });
      return view('aefi.managerusers.index',[
        'datas' => $datas,
        'datas_div' => $data_list_division
      ]);
    }

}
