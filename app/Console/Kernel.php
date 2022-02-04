<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //コマンド登録
        Commands\ChatDeleteCommand::Class,
        Commands\StudyMinDeleteCommand::Class,
        Commands\ScrapingCommand::class,
        Commands\ScrapingSearchCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 時刻を指定する場合（この例は、毎日朝3時に実行）
        // $schedule->command('command:chatdelete')->dailyAt('3:00');

        // 1年ごと
        $schedule->command('command:chatdelete')->yearly();

        // 毎月ごと
        $schedule->command('command:studymindelete')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
