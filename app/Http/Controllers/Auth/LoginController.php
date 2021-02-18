<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Session;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login (Request $request)
    {
        $input = $request->all();
        $username = $request->username;

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // dd(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'], 'confirm' => 1)));

        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'], 'confirm'=>1)))
        {
           $roleArr = auth()->user()->getRoleNames()->toArray();
          if (count($roleArr) > 0) {
            $user_role = $roleArr[0];

            Session::put('user_role', $roleArr[0]);
            switch ($user_role) {
              case "admin":
                return redirect('access-control/ManageRoles');
                break;
              case "pho":
                return redirect('index');
                break;
              case "dpc":
                return redirect('index');
                break;
              case "hospital":
                return redirect('index');
                break;
              case "dho":
                return redirect('index');
                break;
              default:
        				return redirect('logout');
        				break;
            }
          } else {
            return redirect('/logout');
          }
          //return redirect('/index');
        }else{
            return redirect()->back()->with('error','กรุณาตรวจสอบชื่อผู้ใช้งานหรือรหัสผ่าน');
        }
    }
    public function ShowloginForm(){
      return view('auth.new-login.login');
    }

}
