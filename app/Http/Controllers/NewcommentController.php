<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Common;
use DB;
use Log;

class NewcommentController extends Controller
{
    public function index(Request $request)
    {   
        $new_comment = $request->input('new_comment');
        $user_id = Common::get_session_user_id();
        $timeline_id = $request->input('timeline_id');

        $rules = [
            'new_comment' => 'required',
        ];
        $messages = [
            'new_comment.required' => 'コメントを入力してください。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return back()->withErrors($validator->errors())->withInput();
        }

        $sql = "insert into comments(user_id, timeline_id, comment_text) values($user_id, $timeline_id, '$new_comment')";
        DB::insert($sql);

        Log::debug("text:" .$new_comment);

        return redirect("timeline/$timeline_id");

    }
}