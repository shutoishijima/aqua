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

        $output["amo"] = $common->get_contents_amount();
        $output["c1_viewed_count"] = $common->get_c1_viewed_count($user_id);
        $output["c2_viewed_count"] = $common->get_c2_viewed_count($user_id);
        $output["c3_viewed_count"] = $common->get_c3_viewed_count($user_id);
        $output["c4_viewed_count"] = $common->get_c4_viewed_count($user_id);
        $output["c5_viewed_count"] = $common->get_c5_viewed_count($user_id);
        $output["c6_viewed_count"] = $common->get_c6_viewed_count($user_id);

        return view('userpage', $output);

    }
}
