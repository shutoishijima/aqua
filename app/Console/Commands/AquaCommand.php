<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Goutte\Client;

class AquaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:aqua';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // インスタンス生成
        $client = new Client();

        $name = "石嶋秋人";
        $pass = "root";

        // URL
        $url = "http://localhost/aqua/public/";
        // 送信データ
        $post_data = [];

        // リクエスト送信
        $crawler = $client->request('GET', $url, $post_data);

        // formサブミット
        $form = $crawler->filter('form')->first()->form();
        $form['name']->setValue($name);
        $form['pass']->setValue($pass);

        // ログインの実施
        $crawler = $client->submit($form);
        // Log::channel('command')->debug($crawler->html());


        // マイページからチャット画面へクリックの実施

        // テキストがある場合はselectLink
        // $link = $page->selectLink('次へ')->link();

        // ない場合はfilter
        $link = $crawler->filter('.header-contact a')->link();
        $crawler = $client->click($link);
        // Log::channel('command')->debug($crawler->html());

        // チャット一覧から詳細チャット画面へ遷移
        $link = $crawler->filter('.all-chat a')->link();
        $crawler = $client->click($link);
        // Log::channel('command')->debug($crawler->html());

        // 
    }
}
