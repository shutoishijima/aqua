<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class ContentsController extends Controller
{
    public function index(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["contents"] = $common->get_contents_amount();
        $output["sales"] = $common->get_sale_contents();
        $output["programming"] = $common->get_programming_contents();

        return view('contents', $output);

    }

    public function sales(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["contents"] = $common->get_contents_amount();
        $output["sales"] = $common->get_sale_contents();

        $output["total"] = 1;

        return view('sale', $output);

    }

    public function programming(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["contents"] = $common->get_contents_amount();
        $output["programming"] = $common->get_programming_contents();

        $output["total"] = 1;

        return view('programming', $output);

    }
}
