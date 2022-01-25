<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class UserpageController extends Controller
{
    public function index($user_id)
    {   
        $common = new Common();

        $output = [];
        $output['user_id'] = $user_id;
        $output["users"] = $common->get_all_user_info($user_id);

        return view('userpage', $output);

    }
}
