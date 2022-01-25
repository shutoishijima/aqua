<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Goutte\Client;

/**
 * yahooトップページのニュース一覧の取得処理
 */
class ScrapingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'yahooトップページのニュース一覧の取得';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::channel('command')->debug('ScrapingCommand start!');

        // インスタンス生成
        $client = new Client();

        // URL
        $url = "https://www.yahoo.co.jp/";
        // 送信データ
        $post_data = [];

        // リクエスト送信
        $crawler = $client->request('GET', $url, $post_data);
        Log::channel('command')->debug($crawler->html());

        // 処理結果
        $res = [];
        // yahooトップページのニュース一覧の取得
        $crawler->filter('ul li article a')->each(function ($node) use (&$res) {
            // 確認用
            Log::channel('command')->debug($node->html());

            // URL
            $url = $node->attr('href');
            // タイトル
            $title = $node->filter('h1 span')->html();

            $row = [];
            $row['url'] = $url;
            $row['title'] = $title;

            // 1行毎に追加
            $res[] = $row;
        });

        // 処理結果Log出力
        Log::channel('command')->info($res);

        Log::channel('command')->debug('ScrapingCommand end!');
    }
}