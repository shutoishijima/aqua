<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Common;

class ChatController extends Controller
{
    public function index(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["chats"] = $common->get_all_chat_info();

        return view('chat', $output);

    }
}
