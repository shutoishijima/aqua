<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Common;
use DB;
use Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {   
        return view('add_news');
    }

    public function upload_news(Request $request)
    {   
        $news_img = $request->news_img;
        $title = $request->input('title');
        $text = $request->input('text');

        $rules = [
            'news_img' => 'required',
            'title' => 'required|max:100',
            'text' => 'required|max:500',
        ];
        $messages = [
            'news_img.required' => '※画像を選択してください。',
            'title.required' => '※タイトルを入力してください。',
            'title.max' => '※100文字以内で入力してください。',
            'text.required' => '※本文を入力してください。',
            'text.max' => '※500文字以内で入力してください。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return back()->withErrors($validator->errors())->withInput();
        }

        // ファイル名(任意) + ファイルの拡張子
        $news_img_name = time() .'.' .$news_img->getClientOriginalExtension();

        // storage/app/public/imgフォルダに画像ファイルを格納して、パスを返却
        $tmp_file_path = $request->file('news_img')->storeAs(
            'public/news_img', $news_img_name
        );

        // public不要
        $file_path = str_replace('public/', '', $tmp_file_path);

        //dd($file_path);

        $sql = "insert into news(news_title, news_text, news_img, news_img_path) values('$title', '$text', '$news_img_name', '$file_path')";
        DB::insert($sql);

        $common = new Common();

        $output = [];
        $output["users"] = $common->get_all_users_mail();

        $to_mail = $output['users'];

        $url = url("/");

        foreach($to_mail as $to_mail) {
            $to_mail = $to_mail->user_mail;
            $subject = '新着情報がUPされました！';

            $message = <<<END
            お知らせが更新されました！

            タイトル：$title

            内容：
            $text

            今すぐ確認しよう！
            $url
            \n
            END;

            $common->send_mail($to_mail, $subject, $message);
        }

        return redirect("mypage");

    }

    public function delete_news(Request $request)
    {   
        return view('delete_news');
    }

    public function destroy_news(Request $request)
    {   
        $title = $request->input('title');

        $rules = [
            'title' => 'required|max:100',
        ];
        $messages = [
            'title.required' => '※タイトルを入力してください。',
            'title.max' => '※100文字以内で入力してください。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        // チェックエラーの場合
        if ($validator->fails()) {
            // リダイレクト(初期表示のページに戻す)
            return back()->withErrors($validator->errors())->withInput();
        }

        // 削除したいnews情報取得
        $news_info = Common::delete_news_info($title);

        if($news_info != ""){
            $delFileName = $news_info[0]->news_img;
            Storage::delete('public/news_img/' . $delFileName);

            $delId = $news_info[0]->news_id;
            DB::delete("delete from news where news_id = '$delId'");
        }

        return redirect('mypage');
    }

    public function news_detail($news_id)
    {   
        $common = new Common();

        $output = [];
        $output['news_id'] = $news_id;
        $output["news"] = $common->get_all_news_info($news_id);

        return view('newspage', $output);
    }
}
