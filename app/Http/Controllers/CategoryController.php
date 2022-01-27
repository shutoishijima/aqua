<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class CategoryController extends Controller
{
    public function organization(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["amo"] = $common->get_contents_amount();
        $output["organization"] = $common->get_organization_contents();

        $output["total"] = 1;

        return view('organization', $output);
    }

    public function thinking(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["amo"] = $common->get_contents_amount();
        $output["thinking"] = $common->get_thinking_contents();

        $output["total"] = 1;

        return view('thinking', $output);
    }

    public function marketing(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["amo"] = $common->get_contents_amount();
        $output["marketing"] = $common->get_marketing_contents();

        $output["total"] = 1;

        return view('marketing', $output);
    }

    public function finance(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["amo"] = $common->get_contents_amount();
        $output["finance"] = $common->get_finance_contents();

        $output["total"] = 1;

        return view('finance', $output);
    }

    public function career(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["amo"] = $common->get_contents_amount();
        $output["career"] = $common->get_career_contents();

        $output["total"] = 1;

        return view('career', $output);
    }

    public function change(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["amo"] = $common->get_contents_amount();
        $output["change"] = $common->get_change_contents();

        $output["total"] = 1;

        return view('change', $output);
    }

    public function category_detail($content_category, $content_name)
    {   
        $common = new Common();

        $output = [];
        $output["content"] = $common->get_content_info($content_category, $content_name);
        $output["next_contents"] = $common->get_next_content_info($content_category, $content_name);
        $output["content_category"] = $content_category;
        
        //dd($output);

        return view('content_detail', $output);
    }
}
