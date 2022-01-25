<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Log;
use Session;
use Common;

class LoginController extends Controller
{
    public function login(Request $request){
        $mail = $request->input('mail');
        $pass = $request->input('pass');

        // 入力チェック処理
        // ルール
        $rules = [];
        $rules['mail'] = "logincheck:$pass";
        // メッセージ
        $messages = [];
        $messages['mail.logincheck'] = "※ログインに失敗しました。";

        // 入力チェック開始
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return redirect('/')->withErrors($validator->errors())->withInput();
        }


        $sql = "select * from users where user_mail = '$mail' and user_pass = '$pass'";
        Log::debug($sql);
        $users = DB::select($sql);
        $user_id = $users[0]->user_id;
        

        //ログイン成功
		if($user_id != ""){

            // ユーザー情報を保存する
            Session::put(Common::$SESSION_USER_ID, $user_id);

            Session::put("user_id_auth", true);
			return redirect("mypage");
		}

    }
}
