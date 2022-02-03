<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class MypageController extends Controller
{
    public function index(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output['file_path'] = '';
        $output["news"] = $common->get_all_news();
        $output["pickup"] = $common->get_pickup();

        $output["amo"] = $common->get_contents_amount();
        $output["c1_viewed_count"] = $common->get_c1_viewed_count($user_id);
        $output["c2_viewed_count"] = $common->get_c2_viewed_count($user_id);
        $output["c3_viewed_count"] = $common->get_c3_viewed_count($user_id);
        $output["c4_viewed_count"] = $common->get_c4_viewed_count($user_id);
        $output["c5_viewed_count"] = $common->get_c5_viewed_count($user_id);
        $output["c6_viewed_count"] = $common->get_c6_viewed_count($user_id);

        $data = $request->session()->all();
        //dd($data);

        return view('mypage', $output);

    }
}
