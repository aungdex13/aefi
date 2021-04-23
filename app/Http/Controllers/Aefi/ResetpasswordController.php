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

class ResetpasswordController extends Controller
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
	public function ResetpasswordForm(){

    return view('auth.new-login.reset');
	}

  public function Reset_Password_Users(Request $request){
      $check_unique_email = User::where('email',trim(strtolower($request->email)))->first();
      // dd($check_unique_email);
      if ($check_unique_email == null) {
        return redirect()->back()->withInput()->with('error','ไม่มี email : '.trim(strtolower($request->email)).' อยู่ในระบบ');
      }
      $email = (!empty($request->email)) ? trim(strtolower($request->email)) : "";
      $data = [
        "email" => (!empty($request->email)) ? trim(strtolower($request->email)) : "",
        "password" => trim(Hash::make($request->password))
      ];
      $user = User::where('email', $email)->update($data);
      return redirect()->back()->with('success','User created successfully');
  }

}
