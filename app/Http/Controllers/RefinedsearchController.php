<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class RefinedsearchController extends Controller
{
    public function index(Request $request)
    {   
        $age = $request->input('age');
        $area = $request->input('area');
        $gender = $request->input('gender');
        $status = $request->input('status');

        $common = new Common();

        $output = [];
        $output["users"] = $common->get_research_user_info($age, $area, $gender, $status);

        return view('connection', $output);

    }

}
