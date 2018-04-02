<?php

namespace App\Console\Commands\Base;

use App\Services\IncService;
use Illuminate\Console\Command;

class IncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inc_read';

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
        //
        $content = IncService::get('Base.Test.name');
        $this->info($content);
    }
}
