<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Common;

class ThanksController extends Controller
{
    public function index(Request $request)
    {   
        $user_id = Common::get_session_user_id();

        if($user_id == ""){
            return redirect('');
        }

        return view('thanks');
    }
}
