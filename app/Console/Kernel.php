<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        \App\Console\Commands\Base\IncCommand::class,
        \App\Console\Commands\Base\ExportCommand::class,
        \App\Console\Commands\Base\WatchErrorCommand::class,
        \App\Console\Commands\Base\SendEmailCommand::class,
        \App\Console\Commands\Base\RabbitmqSet::class,
        \App\Console\Commands\Base\RabbitmqGet::class,
        \App\Console\Commands\Base\LanguageCommand::class,
        \App\Console\Commands\Base\FunctionCommand::class,
        \App\Console\Commands\LaowuCommand::class,
        \App\Console\Commands\Crm\DbTransactionCommand::class, //
        \App\Console\Commands\Base\CollectCommand::class, //laravel集合
        \App\Console\Commands\Base\RedisPublishCommand::class, // redis发布
        \App\Console\Commands\Base\RedisSubCribeCommand::class, // 缓存订阅
        \App\Console\Commands\Base\AutoCommand::class, // 自动执行任务

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$storagePath = storage_path();
        // $schedule->command('inspire')
        //          ->hourly();
        //$schedule->command('auto_command')
        //    ->everyMinute()
        //    ->withoutOverlapping()
        //    ->sendOutputTo($storagePath.'/logs/laravel.log')
        //    ->emailOutputTo('liuruijie@doumi.com');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
