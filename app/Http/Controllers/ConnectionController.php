<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class ConnectionController extends Controller
{
    public function index(Request $request)
    {   
        $common = new Common();
        $user_id = $common->get_session_user_id();

        $output = [];
        $output["users"] = $common->get_mix_user_info();

        return view('connection', $output);

    }
}
