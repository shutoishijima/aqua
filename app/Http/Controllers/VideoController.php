<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use DB;
use Common;

/**
 * 動画視聴処理
 */
class VideoController extends Controller
{
    /**
     * 動画視聴Ajax版
     *
     * @param Request $request
     * @return void
     */
    public function viewed_video(Request $request) {
        $user_id = Common::get_session_user_id();
        $content_id = $request->input('content_id');
        $content_status = $request->input('content_status');

        $viewing = DB::select("select content_status from viewing_histories where user_id = '$user_id' and content_id = '$content_id'");
        if(count($viewing) == 0) {
            DB::insert("insert into viewing_histories (user_id, content_id, content_status) values('$user_id', '$content_id', '$content_status')");
        } elseif($viewing[0]->content_status != '2') {
            DB::update("update viewing_histories set content_status = '$content_status', view_date = current_timestamp(3)
            where user_id = '$user_id' and content_id = '$content_id' ");
        }

        // 学習時間を更新
        $content_min = DB::select("select content_min from contents where content_id = '$content_id'");
        $time = $content_min[0]->content_min;
        DB::update("update users set this_month_min = this_month_min + $time
            where user_id = '$user_id'");

        $response = [];
        $response['min'] = "$time";
        $response['status'] = "ok";
        return response()->json($response);
    }

    /**
     * 動画視聴時間の更新Ajax版
     *
     * @param Request $request
     * @return void
     */
    public function add_min(Request $request) {
        $user_id = Common::get_session_user_id();
        $content_min = $request->input('content_min');

        // 学習時間を更新
        DB::update("update users set this_month_min = this_month_min + $content_min
            where user_id = '$user_id'");

        $response = [];
        $response['min'] = "$content_min";
        $response['status'] = "ok";
        return response()->json($response);
    }
}