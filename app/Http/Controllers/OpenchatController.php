<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Common;
use DB;

class OpenchatController extends Controller
{
    public function index($from_user)
    {
        $common = new Common();

        $output = [];
        $output['users'] = $common->get_user_info(Common::get_session_user_id());
        $output['openchats'] = $common->get_open_chat_info($from_user);
        $output['from_user'] = $from_user;

        $common->update_open_chat_readed($from_user);

        return view('openchat', $output);
    }

    public function entry_message(Request $request)
    {
        $new_message = $request->input('new_message');
        $from_user = $request->input('from_user');
        $user_id = Common::get_session_user_id();

        $rules = [
            'new_message' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
         // チェックエラーの場合
         if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return redirect('')->withErrors($validator->errors())->withInput();
        }

        $sql = "insert into chats(user_id, from_user, message) values($from_user, $user_id, '$new_message')";
        DB::insert($sql);

        $common = new Common();

        $to_mail = $common->get_user_info($from_user)[0]->user_mail;
        $subject = 'テストメール題名だよ';

        $common->send_mail($to_mail, $subject, $new_message);

        // 出力値を設定
        $response = [];
        return response()->json($response);
    }
}
