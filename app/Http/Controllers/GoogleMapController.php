<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * GoogleMap表示コントローラ
 */
class GoogleMapController extends Controller
{
    /**
     * 初期表示
     */
    public function index(Request $request) {

        $outPut = [];

        // 初期表示の座標
        $outPut['init_lat'] = "34.395084";
        $outPut['init_lng'] = "132.458412";

        return view('google_map', $outPut);
    }
}