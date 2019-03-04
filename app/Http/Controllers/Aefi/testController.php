<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class testController extends Controller
{
    function __construct()
    {

    }
	public function test(){
		return view('AEFI.Apps.test');
	}
}
