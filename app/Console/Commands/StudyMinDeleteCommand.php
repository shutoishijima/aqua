<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use DB;

class StudyMinDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:studymindelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '今月の学習時間を先月にして先月分を削除';

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
        Log::channel('command')->debug('StudyMinDeleteCommand start');

        // ユーザーの学習時間の情報を取得
        $get_user_info = DB::select("select * from users");
        // 今月のデータを先月の学習時間に更新
        foreach($get_user_info as $month) {
            DB::update("update users set last_month_min = $month->this_month_min where user_id = $month->user_id");
        }

        // 今月の学習時間をリセット
        $sql = "update users set this_month_min = 0";
        $update = DB::update($sql);

        Log::channel('command')->debug('StudyMinDeleteCommand end');
    }
}
