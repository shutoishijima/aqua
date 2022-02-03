<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
use Common;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function check(Request $request){
        $name = $request->input('name');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $tel = $request->input('user_tel');
        $area = $request->input('area');
        $inst = $request->input('inst');
        $final_education = $request->input('final_education');
        $job = $request->input('job');
        $salary = $request->input('salary');
        $mail = $request->input('user_mail');
        $pass = $request->input('pass');

        $rules = [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'user_tel' => 'required|digits_between:9,11|unique:users',
            'area' => 'required',
            'inst' => 'nullable',
            'final_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'user_mail' => 'required|unique:users',
            'pass' => 'required|min:6|max:15|alpha_dash',
        ];
        $messages = [
            'name.required' => '※名前を入力してください。',
            'age.required' => '※年齢を選択してください。',
            'gender.required' => '※性別を選択してください。',
            'user_tel.required' => '※電話番号を入力してください。',
            'user_tel.digits_between' => '※電話番号が正しくありません。',
            'user_tel.unique' => '※すでに使用されている電話番号です。',
            'area.required' => '※主要エリアを選択してください。',
            'final_education.required' => '※最終学歴を選択してください。',
            'job.required' => '※現在の職種を選択してください。',
            'salary.required' => '※現在のご年収を選択してください。',
            'user_mail.required' => '※メールアドレスを入力してください。',
            'user_mail.unique' => '※すでに使用されているメールアドレスです。',
            'pass.required' => '※パスワードを入力してください。',
            'pass.min' => "６文字以上のパスワードを入力して下さい。",
            'pass.max' => "15文字以下のパスワードを入力して下さい。",
            'pass.alpha_dash' => "英数字、(-)、(_)の組み合わせを入力して下さい。",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return redirect('register')->withErrors($validator->errors())->withInput();
        }

        $outPut = [
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'user_tel' => $tel,
            'area' => $area,
            'inst' => $inst,
            'final_education' => $final_education,
            'job' => $job,
            'salary' => $salary,
            'user_mail' => $mail,
            'pass' => $pass,
        ];

        // dd($outPut);

        // ユーザー情報を保存する
        $request->session()->put("form_output", $outPut);
        
        return redirect('check');
    }

    public function checkindex(Request $request){
        //セッションから値を取り出す
		$outPut = $request->session()->get("form_output");
		
		//セッションに値が無い時はフォームに戻る
		if(!$outPut){
			return redirect('register');
		}
		return view("check", $outPut);
    }

    public function register(Request $request){
        //セッションから値を取り出す
		$outPut = $request->session()->get("form_output");

        //dd($outPut);
        
        DB::insert("insert into users
        (user_name, user_age, user_gender, user_tel, user_area, user_inst, user_final_education, user_job, user_salary, user_mail, user_pass)
        values ('$outPut[name]', '$outPut[age]', '$outPut[gender]', '$outPut[user_tel]', '$outPut[area]', '$outPut[inst]', '$outPut[final_education]', '$outPut[job]', '$outPut[salary]', '$outPut[user_mail]', '$outPut[pass]')");

        $users = DB::select("select * from users where user_name = '$outPut[name]' and user_pass = '$outPut[pass]' and user_mail = '$outPut[user_mail]'");
        $user_id = $users[0]->user_id;

        $default_viewing = DB::select("select * from contents group by content_category;");
        foreach($default_viewing as $default_viewing) {
            if($default_viewing->content_category != 'ピックアップ'){
                DB::insert("insert into viewing_histories (user_id, content_id, content_status) values('$user_id', '$default_viewing->content_id', '0')");
            }
        }

        // セッションを空にする
        $request->session()->forget("form_output");

        // ユーザー情報を保存する
        Session::put(Common::$SESSION_USER_ID, $user_id);
        return redirect('thanks');
    }

    public function back(Request $request){
        //セッションから値を取り出す
		$outPut = $request->session()->get("form_output");

        $data = $request->session()->all();
        //dd($data);

        return redirect('register')->withInput($outPut);
    }
}
