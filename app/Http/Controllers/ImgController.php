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
 * 画像アップロード処理
 * php artisan storage:link
 */
class ImgController extends Controller
{
    /**
     * 画像アップロードAjax版
     *
     * @param Request $request
     * @return void
     */
    public function upload_img(Request $request) {

        // アップロードされたファイルを取得
        $file_img = $request->file('file_img');

        // Imageオブジェクトへ変換
        $image = Image::make($file_img)->encode('jpg')->orientate()->save();

        Log::debug($image);

        // ファイル名(任意) + ファイルの拡張子
        $file_name = time() .'.jpg';
        Log::debug($file_name);

        // storage/app/public/imgフォルダに画像ファイルを格納して、パスを返却
        $tmp_file_path = $request->file('file_img')->storeAs(
            'public/img', $file_name
        );

        // public不要
        $file_path = str_replace('public/', '', $tmp_file_path);
        Log::debug('storage/' .$file_path);

        $user_id = Common::get_session_user_id();

        // DBにアップする前のimg情報
        $img_info = DB::select("select user_img from users where user_id = '$user_id'");
        $delFileName = $img_info[0]->user_img;

        if($delFileName != ""){
            Storage::delete('public/img/' . $delFileName);

            $delFileName = str_replace("tr_", "", $delFileName);
            if(Storage::exists('public/img/' . $delFileName)){
                Storage::delete('public/img/' . $delFileName);
            }
        }

        // DBにアップ
        DB::update("update users set user_img = '$file_name' where user_id = '$user_id'");

        // 出力値を設定
        $response = [];
        $response['file_path'] = $file_path;
        return response()->json($response);
    }

    /**
     * 画像トリミング処理
     *
     * @param Request $request
     * @return void
     */
    public function trimming_img(Request $request) {
        $user_id = Common::get_session_user_id();
        $img_info = DB::select("select user_img from users where user_id = '$user_id'");

        $user_img = $img_info[0]->user_img;

        // 保存している画像を取得
        $path = public_path("storage/img/$user_img");

        Log::debug($path);

        // see https://qiita.com/masuda-sankosc/items/874f6128de29ece021d5
        // see https://blog.capilano-fw.com/?p=1574
        $img = Image::make($path);
        Log::debug($img);

        $width = (Integer) $request->input('width');
        $height = (Integer) $request->input('height');
        $x = (Integer) $request->input('x');
        $y = (Integer) $request->input('y');
        $img->crop($width, $height, $x, $y);

        $crop_file = "storage/img/tr_$user_img";
        $save_path = public_path($crop_file);
        $img->save($save_path);

        // DBにアップする前のimg情報
        $img_info = DB::select("select user_img from users where user_id = '$user_id'");
        $delFileName = $img_info[0]->user_img;

        Storage::delete('public/img/' . $delFileName);

        // DBにアップ
        DB::update("update users set user_img = 'tr_$user_img' where user_id = '$user_id'");

        // 出力値を設定
        $response = [];
        $response['status'] = "ok";
        $response['file_path'] = $crop_file;
        return response()->json($response);
    }
}