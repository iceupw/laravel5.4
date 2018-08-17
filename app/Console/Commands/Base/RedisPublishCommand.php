<?php

namespace App\Console\Commands\Base;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisPublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis_publish';

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

        $values = Redis::lrange('names', 5, 10);
        dd($values);

        //Redis::pipeline(function ($pipe) {
        //    for ($i = 0; $i < 1000; $i++) {
        //        $pipe->set("key:$i", $i);
        //    }
        //});
        //
        //Redis::publish('test-channel', json_encode(['foo' => 'bar']));
    }
}
