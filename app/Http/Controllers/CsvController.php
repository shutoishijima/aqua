<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Common;
use DB;

/**
 * CSV取込処理
 */
class CsvController extends Controller
{
    /**
     * CSV取込処理
     *
     * @param Request $request
     * @return view
     */
    public function csv_upload(Request $request) {

        // 出力値に設定
        $output = [];

        $common = new Common();
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["clients"] = $common->get_client_info();
        $output["schedules"] = $common->get_schedule(1);
        $output['client_id'] = 1;

        // CSV ファイル保存
        $tmpName = mt_rand() ."." .$request->file('csv')->guessExtension(); // TMPファイル名
        $request->file('csv')->move(public_path() ."/csv/tmp", $tmpName);
        $tmpPath = public_path() ."/csv/tmp/" .$tmpName;

        Log::debug($tmpPath);

        //Goodby CSVのconfig設定
        $config = new LexerConfig();
        // CSVのヘッダー行を無視
        $config->setIgnoreHeaderLine(true);

        $lexer = new Lexer($config);
        $interpreter = new Interpreter();

        $dataList = [];

        // 新規Observerとして、$dataList配列に値を代入
        $interpreter->addObserver(function (array $row) use (&$dataList) {
            // 各列のデータを取得
            $dataList[] = $row;
        });

        // CSVデータをパース
        $lexer->parse($tmpPath, $interpreter);

        // TMPファイル削除
        unlink($tmpPath);

        // 登録処理
        DB::table('calendars')->delete();
        $count = 0;
        foreach ($dataList as $row) {
            // 1.入力チェック
            $data1 = $row[0];
            $data2 = $row[1];
            $data3 = $row[2];
            $data4 = $row[3];
            $data5 = $row[4];
            // 2.insert実行
            Log::debug($data1 ."-" .$data2 ."-" .$data3 ."-" .$data4 ."-" .$data5);
            DB::insert("insert into calendars (user_id, client_id, start_date, end_date, client_schedule) values ('$data1', '$data2', '$data3', '$data4', '$data5')");
            $count++;
        }

        Log::debug("処理件数:" .$count);

        // Viewへ
        return back();
    }

    /**
     * CSV取込処理(クライアント)
     *
     * @param Request $request
     * @return view
     */
    public function client_csv_upload(Request $request) {

        // 出力値に設定
        $output = [];

        $common = new Common();
        $output["users"] = $common->get_user_info(Common::get_session_user_id());
        $output["clients"] = $common->get_client_info();
        $output["schedules"] = $common->get_schedule(1);
        $output['client_id'] = 1;

        // CSV ファイル保存
        $tmpName = mt_rand() ."." .$request->file('csv')->guessExtension(); // TMPファイル名
        $request->file('csv')->move(public_path() ."/csv/tmp", $tmpName);
        $tmpPath = public_path() ."/csv/tmp/" .$tmpName;

        Log::debug($tmpPath);

        //Goodby CSVのconfig設定
        $config = new LexerConfig();
        // CSVのヘッダー行を無視
        $config->setIgnoreHeaderLine(true);

        $lexer = new Lexer($config);
        $interpreter = new Interpreter();

        $dataList = [];

        // 新規Observerとして、$dataList配列に値を代入
        $interpreter->addObserver(function (array $row) use (&$dataList) {
            // 各列のデータを取得
            $dataList[] = $row;
        });

        // CSVデータをパース
        $lexer->parse($tmpPath, $interpreter);

        // TMPファイル削除
        unlink($tmpPath);

        // 登録処理
        DB::table('clients')->delete();
        $count = 0;
        foreach ($dataList as $row) {
            // 1.入力チェック
            $data1 = $row[0];
            $data2 = $row[1];
            $data3 = $row[2];
            $data4 = $row[3];
            $data5 = $row[4];
            $data6 = $row[5];
            $data7 = $row[6];
            // 2.insert実行
            Log::debug($data1 ."-" .$data2 ."-" .$data3 ."-" .$data4 ."-" .$data5 ."-" .$data6 ."-" .$data7);
            DB::insert("insert into clients (user_id, client_id, client_name, client_category1, client_category2, client_category3, client_memo) values ('$data1', '$data2', '$data3', '$data4', '$data5', '$data6', '$data7')");
            $count++;
        }

        Log::debug("処理件数:" .$count);

        // Viewへ
        return back();
    }
}