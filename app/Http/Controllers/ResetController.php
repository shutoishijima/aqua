<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Common;
use DB;

class ResetController extends Controller
{
    public function index(Request $request)
    {
        // 入力チェック処理
        // ルール
        $rules = [];
        $rules['mail'] = "required|mailcheck";
        // メッセージ
        $messages = [];
        $messages['mail.required'] = "※メールアドレスを入力して下さい。";
        $messages['mail.mailcheck'] = "※このメールアドレスは登録されていません。";

        // 入力チェック開始
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(前のページに戻す)
            return back()->withErrors($validator->errors())->withInput();
        }

        $mail = $request->input('mail');

        $sql = "insert into reset_password(reset_mail) values('$mail')";
        DB::insert($sql);

        $common = new Common();

        $subject = 'パスワード再設定メールです。';

        // 暗号化
        $encrypted = Crypt::encrypt($mail);

        $url = url("reset_password?mail=$encrypted");

        $message = "以下のリンクより15分以内にパスワードの再設定を行なってください。$url";

        $common->send_mail($mail, $subject, $message);

        // 再設定用メール送信完了ページへ
        return view('send_mail');
    }

    public function new_password(Request $request)
    {
        $mail = $request->input('mail');

        // 復号化
        $decrypted = Crypt::decrypt($mail);
        // dd($decrypted);

        $sql = "select * from reset_password where reset_mail = '$decrypted' and reset_date >= date_add(now(), interval -15 minute)";
        $res = DB::select($sql);

        // 
        if(count($res) > 0){
            $outPut = [];
            $outPut['mail'] = $decrypted;
            return view('reset_password', $outPut);
        }

        return view('expired');
    }

    public function change_password(Request $request)
    {
        // 入力チェック処理
        // ルール
        $rules = [];
        $rules['new_password'] = "required|min:6|max:15|alpha_dash";
        // メッセージ
        $messages = [];
        $messages['new_password.required'] = "パスワードを入力して下さい。";
        $messages['new_password.min'] = "６文字以上のパスワードを入力して下さい。";
        $messages['new_password.max'] = "１５文字以下のパスワードを入力して下さい。";
        $messages['new_password.alpha_dash'] = "英数字、(-)、(_)の組み合わせを入力して下さい。";

        // 入力チェック開始
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(前のページに戻す)
            return back()->withErrors($validator->errors())->withInput();
        }

        $mail = $request->input('mail');
        $pass = $request->input('new_password');

        $sql = "update users set user_pass = '$pass' where user_mail = '$mail'";
        DB::update($sql);

        return view('complete');
    }
}
