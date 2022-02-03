<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class CategoryController extends Controller
{
    public function organization(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $content_category = '組織・リーダーシップ';
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output["amo"] = $common->get_contents_amount();
        $output["organization"] = $common->get_organization_contents();
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        $output["viewed_content"] = $common->get_viewed_history($user_id, $content_category);
        $output["viewed_count"] = $common->get_viewed_count($user_id, $content_category);

        $output["total"] = 1;

        return view('organization', $output);
    }

    public function thinking(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $content_category = '思考';
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output["amo"] = $common->get_contents_amount();
        $output["thinking"] = $common->get_thinking_contents();
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        $output["viewed_content"] = $common->get_viewed_history($user_id, $content_category);
        $output["viewed_count"] = $common->get_viewed_count($user_id, $content_category);

        $output["total"] = 1;

        return view('thinking', $output);
    }

    public function marketing(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $content_category = '戦略・マーケティング';
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output["amo"] = $common->get_contents_amount();
        $output["marketing"] = $common->get_marketing_contents();
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        $output["viewed_content"] = $common->get_viewed_history($user_id, $content_category);
        $output["viewed_count"] = $common->get_viewed_count($user_id, $content_category);

        $output["total"] = 1;

        return view('marketing', $output);
    }

    public function finance(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $content_category = '会計・財務';
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output["amo"] = $common->get_contents_amount();
        $output["finance"] = $common->get_finance_contents();
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        $output["viewed_content"] = $common->get_viewed_history($user_id, $content_category);
        $output["viewed_count"] = $common->get_viewed_count($user_id, $content_category);

        $output["total"] = 1;

        return view('finance', $output);
    }

    public function career(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $content_category = 'キャリア・志';
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output["amo"] = $common->get_contents_amount();
        $output["career"] = $common->get_career_contents();
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        $output["viewed_content"] = $common->get_viewed_history($user_id, $content_category);
        $output["viewed_count"] = $common->get_viewed_count($user_id, $content_category);

        $output["total"] = 1;

        return view('career', $output);
    }

    public function change(Request $request)
    {   
        $user_id = Common::get_session_user_id();
        $content_category = '変革';
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);
        $output["amo"] = $common->get_contents_amount();
        $output["change"] = $common->get_change_contents();
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        $output["viewed_content"] = $common->get_viewed_history($user_id, $content_category);
        $output["viewed_count"] = $common->get_viewed_count($user_id, $content_category);

        $output["total"] = 1;

        return view('change', $output);
    }

    public function category_detail($content_category, $content_name)
    {   
        $user_id = Common::get_session_user_id();
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info($user_id);    
        $output["content"] = $common->get_content_info($content_category, $content_name);
        $output["next_contents"] = $common->get_next_content_info($content_category, $content_name);
        $output["content_category"] = $content_category;
        $output["latest_content"] = $common->get_viewing_history_latest($user_id, $content_category);
        
        //dd($output);

        return view('content_detail', $output);
    }
}
