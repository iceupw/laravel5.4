<?php

namespace App\Console\Commands\Base;

use Illuminate\Console\Command;
use App\Base\Queue\Rabbitmq\RabbitmqClient;
use DB;

class RabbitmqGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq_get';

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
        $rabbitmq = new RabbitmqClient('test');
        echo 'producter ready:';
        $rabbitmq->getOne(
            function($message) {
                $this->info($message->body);
                $res = json_decode($message->body,true);
                DB::beginTransaction();
                try{
                    //xx;
                }catch (\Exception $e){
                    DB::rollBack();
                    throw $e;
                }finally{
                    echo 2;
                    DB::commit();
                }
                if(isset($res['stop']) && $res['stop']) {
                    $this->info('停止脚本');
                    RabbitmqClient::Ack($message);
                    exit();
                }
                RabbitmqClient::Ack($message);
            },
            '',
            false
        );
        // Loop as long as the channel has callbacks registered
        while (count($rabbitmq->channel->callbacks)) {
            $rabbitmq->channel->wait();
        }
    }
}
