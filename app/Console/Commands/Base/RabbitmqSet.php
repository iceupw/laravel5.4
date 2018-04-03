<?php

namespace App\Console\Commands\Base;

use Illuminate\Console\Command;
use App\Base\Queue\Rabbitmq\RabbitmqClient;

class RabbitmqSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq_set';

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
        $rabbitmq = new RabbitmqClient('test');
        echo 'producter ready:';
        $arr = ['team_id'=>1 ,'project_id'=>1, 'confirm_id'=>1];
        //$arr = ['team_id'=>1 ,'project_id'=>1, 'confirm_id'=>1];
        $rabbitmq->addOne($arr);
    }
}
