<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class TimelineController extends Controller
{
    public function index($timeline_id)
    {   
        $common = new Common();

        $output = [];
        $output["timeline"] = $common->get_timeline_comment_info($timeline_id);
        $output["comment"] = $common->get_comment_info($timeline_id);
        $output["comment_amo"] = $common->get_comment_amo_info($timeline_id);

        return view('timeline', $output);

    }
}
