<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Common;

class LogoutController extends Controller
{
    public function logout(Request $request){
        
        Session::forget("user_id_auth");
        Session::forget(Common::$SESSION_USER_ID);
		return redirect("/");

    }
}
