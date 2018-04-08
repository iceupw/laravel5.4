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
        \App\Console\Commands\LaowuCommand::class

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
