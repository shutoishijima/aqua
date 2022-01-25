<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Common;
use DB;

class MessageController extends Controller
{
    public function index(Request $request)
    {   
        $new_message = $request->input('new_message');
        $from_user = Common::get_session_user_id();
        $user_id = $request->input('name');

        $rules = [
            'new_message' => 'required',
        ];
        $messages = [
            'new_message.required' => 'メッセージを入力してください。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return back()->withErrors($validator->errors())->withInput();
        }

        $sql = "insert into chats(user_id, from_user, message) values($user_id, $from_user, '$new_message')";
        DB::insert($sql);

        return redirect("chat");

    }

    
}
