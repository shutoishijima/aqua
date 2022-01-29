<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use DB;
use Common;
use Image;
use Storage;

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
    public function viewed_video($sendData) {
        $user_id = Common::get_session_user_id();

        dd($sendData);

        // DBにアップ
        DB::update("update viewing_histories set user_id = '$user_id'");

    }
}