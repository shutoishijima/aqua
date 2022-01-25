<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Goutte\Client;

/**
 * yahoo検索処理
 */
class ScrapingSearchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scrapingsearch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'yahoo検索処理';

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
        Log::channel('command')->debug('ScrapingSearchCommand start');

        // インスタンス生成
        $client = new Client();

        // yahooの検索キーワード
        $search_list = ["お菓子", "車", "服"];

        foreach($search_list as $seach_key) {
            // 検索用URL
            $url = "https://search.yahoo.co.jp/";
            // 送信データ
            $post_data = [];

            // リクエスト送信
            $crawler = $client->request('GET', $url, $post_data);

            // formサブミット
            $form = $crawler->filter('form')->first()->form();
            $form['p']->setValue($seach_key);
            // 検索処理の実施
            $crawler = $client->submit($form);
            // Log::channel('command')->debug($crawler->html());

            // 処理結果
            $res = [];
            $crawler->filter('ol li')->each(function ($node) use (&$res) {
                // 確認用
                // Log::channel('command')->debug($node->text());
                // URL
                $url = $node->filter('a')->attr('href');
                // タイトル
                $title = $node->text();

                $row = [];
                $row['url'] = $url;
                $row['title'] = $title;

                // 1行毎に追加
                $res[] = $row;
            });

            // 処理結果Log出力
            Log::channel('command')->info($res);
            // サイトに負荷かけないようにスリープさせる
            sleep(2);
        }

        Log::channel('command')->debug('ScrapingSearchCommand end');
    }
}