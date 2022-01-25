<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use DB;

class ChatDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:chatdelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'チャットを削除';

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
        //
        Log::channel('command')->debug('ChatDeleteCommand start');

        $sql = "delete from chats where chat_date <= date_add(now(), interval -1 month)";
        Log::channel('command')->debug($sql);

        $ret = DB::delete($sql);
        Log::channel('command')->debug($ret."件削除");

        Log::channel('command')->debug('ChatDeleteCommand end');
    }
}
