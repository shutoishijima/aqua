<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class MypageController extends Controller
{
    public function index(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output['file_path'] = '';
        $output["news"] = $common->get_all_news();

        $data = $request->session()->all();
        //dd($data);

        return view('mypage', $output);

    }
}
