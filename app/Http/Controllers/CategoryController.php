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
