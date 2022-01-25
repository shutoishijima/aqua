<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Map表示コントローラ
 */
class MapController extends Controller
{
    /**
     * 初期表示
     */
    public function index(Request $request) {

        $outPut = [];

        // 初期表示の座標
        $outPut['init_lat'] = "34.395084";
        $outPut['init_lng'] = "132.458412";

        return view('map', $outPut);
    }

    /**
     * ajax処理
     */
    public function map_ajax(Request $request)
    {
        // 現在地の取得有無("true":現在地取得OK、左記以外:NG)
        $success_flg = $request->input('success_flg');
        $output = [];

        // 現在地取得OK(東広島)
        if ($success_flg == "true") {
            $map = [];
            $map['lat'] = "34.431407";
            $map['lng'] = "132.743896";
            $map['name'] = "東広島　西条駅";
            $map['text'] = "説明文";
            $output[0] = $map;

        // 現在地取得NG(広島市 紙屋町)
        } else {
            $map = [];
            $map['lat'] = "34.39599";
            $map['lng'] = "132.45714";
            $map['name'] = "広島そごう";
            $map['text'] = "説明文";
            $output[0] = $map;

            $map = [];
            $map['lat'] = "34.397316";
            $map['lng'] = "132.457665";
            $map['name'] = "リーガロイヤルホテル";
            $map['text'] = "説明文";
            $output[1] = $map;

            $map = [];
            $map['lat'] = "34.396563";
            $map['lng'] = "132.459628";
            $map['name'] = "広島県庁";
            $map['text'] = "説明文";
            $output[2] = $map;
        }
        return response()->json($output);
    }
}