<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\ChospitalNew;
use Illuminate\Http\Request;
use Redirect;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datas = User::find($this->user->id);
      $list_hosp = ChospitalNew::select('hospcode','hosp_name')->where('hospcode',$datas->hospcode)->first();
      return view('aefi.myprofile.index',[
        "datas" => $datas,
        "list_hosp" => $list_hosp
      ]);
    }

    public function edit(Request $request){

      $user = User::findOrFail($request->input('id'));
      $user->name=$request->input('name');
      $user->sur_name=$request->input('sur_name');
      $user->email=$request->input('email');
      if(trim($request->input('hospcode')) != trim($user->hospcode)){
        $get_profile = ChospitalNew::where('hospcode',$request->input('hospcode'))->first();
        $user->hospcode = $get_profile->hospcode;
        $user->hosp_type_code = $get_profile->hosp_type_code;
        $user->prov_code = $get_profile->prov_code;
        $user->ampur_code = $get_profile->ampur_code;
        $user->tambol_code = $get_profile->tambol_code;
        $user->region = $get_profile->region;
        $user->role_id = $get_profile->role_id;
      }
      if (trim($request->input('password')) != '') {
        $user->password = Hash::make(trim($request->input('password')));
      }
      $user->save();
      //return Redirect::route('myprofile');
      return redirect()->back()->with('success','User updated successfully');
    }

}
