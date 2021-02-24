<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;
use Hash;
use App\ChospitalNew;
use App\User;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    function __construct()
    {
      $mytime = Carbon::now();
      $this->current_datetime = $mytime->toDateTimeString();
      $this->year = $mytime->format('Y');
      $this->month = $mytime->format('m');

      // $this->middleware(function ($request, $next) {
      //     $this->user = Auth::user();
      //     return $next($request);
      // });
    }
	public function RegForm(){

    return view('auth.new-login.register');
	}

  public function Get_Division_All(Request $request){
    $result = ChospitalNew::query();

    if(isset($request->searchTerm)){
        $result = $result->where('hosp_name', 'like', '%' . $request->searchTerm . '%');

    $result = $result->select('hospcode','hosp_name');
    $result = $result->get();
    }
    $datas = array();
    foreach($result as $data){
      $json_datas[] = array("id"=>$data->hospcode, "text"=>$data->hosp_name);
    }
    if(count($result)>0){
      return response()->json($json_datas);
    }
  }

  public function Save_New_Users(Request $request){
      if(empty($request->hospcode)) return redirect()->back()->withInput()->with('error','กรุณาเลือกหน่วยงาน');
      $check_unique_username = 

      $check_unique_username = User::where('username',trim(strtolower($request->username)))->first();
      if ($check_unique_username) {
        return redirect()->back()->withInput()->with('error','มี (ชื่อผู้ใช้งาน)username : '.trim(strtolower($request->username)).' นี้อยู่แล้วในระบบ');
      }

      $check_unique_email = User::where('email',trim(strtolower($request->email)))->first();
      if ($check_unique_email) {
        return redirect()->back()->withInput()->with('error','มี email : '.trim(strtolower($request->email)).' นี้อยู่แล้วในระบบ');
      }

      $get_profile = ChospitalNew::where('hospcode',$request->hospcode)->first();
      $data = [
        "name" => (!empty($request->name)) ? trim($request->name) : "",
        "sur_name" => (!empty($request->surname)) ? trim($request->surname) : "",
        "email" => (!empty($request->email)) ? trim(strtolower($request->email)) : "",
        "username" => (!empty($request->username)) ? trim(strtolower($request->username)) : "",
        "password" => trim(Hash::make($request->password)),
        "position" => "",
        "division" => "",
        "hospcode" => $get_profile->hospcode,
        "hosp_type_code" => $get_profile->hosp_type_code,
        "prov_code" => $get_profile->prov_code,
        "ampur_code" => $get_profile->ampur_code,
        "tambol_code" => $get_profile->tambol_code,
        "region" => $get_profile->region,
        "role_id" => $get_profile->role_id,
        "confirm" => 0,
      ];
      //dd($data);
      $user = User::create($data);
      $user->assignRole($get_profile->role_id);
      return redirect()->back()->with('success','User created successfully');
  }

}
