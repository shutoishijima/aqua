<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Common;

class EditController extends Controller
{
    public function index(Request $request)
    {   
        $common = new Common();

        $output = [];
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output['file_path'] = '';

        return view('edit', $output);
    }

    public function upload_profile(Request $request){
        $user_id = Common::get_session_user_id();
        $user_text = $request->input('user_text');
        $area = $request->input('area');
        $inst = $request->input('inst');
        $job = $request->input('job');
        $salary = $request->input('salary');

        $rules = [
            'user_text' => 'max:100',
        ];
        $messages = [
            'user_text.max' => '※100文字以内で入力してください。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return redirect('edit')->withErrors($validator->errors())->withInput();
        }

        // 未入力チェック
        if ($user_text != "") {
            DB::update("update users set user_text = '$user_text' where user_id = '$user_id'");
        }
        // 未入力チェック
        if ($area != "") {
            DB::update("update users set user_area = '$area' where user_id = '$user_id'");
        }
        // 未入力チェック
        if ($inst != "") {
            DB::update("update users set user_inst = '$inst' where user_id = '$user_id'");
        }
        // 未入力チェック
        if ($job != "") {
            DB::update("update users set user_job = '$job' where user_id = '$user_id'");
        }
        // 未入力チェック
        if ($salary != "") {
            DB::update("update users set user_salary = '$salary' where user_id = '$user_id'");
        }

        return redirect('mypage');
    }
}
