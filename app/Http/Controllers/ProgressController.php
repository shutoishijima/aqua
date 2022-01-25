<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class ProgressController extends Controller
{
    public function index($client_id)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["clients"] = $common->get_client_info();
        $output["schedules"] = $common->get_schedule($client_id);
        $output['client_id'] = $client_id;

        return view('progress', $output);

    }
}
