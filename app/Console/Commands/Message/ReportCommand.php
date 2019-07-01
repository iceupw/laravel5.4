<?php

namespace App\Console\Commands\Message;

use Illuminate\Console\Command;

class ReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:report';

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
        $url = 'http://v.juhe.cn/weather/index?format=2&cityname=%E8%8B%8F%E5%B7%9E&key=21146a4c32e0f8daf54fd9a037d11936';
        //
        $this->httpHandler = app('App\Base\Http\HttpHandler');

        $webhook = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=a77f95ef-92c2-4b86-81ee-68d8e1e1f6ad';
        $arr = array(
            'msgtype' => 'text',
            'text' => array(
                'content' => '啦啦啦啦啦卧槽周五了，交完周报就可以休息了，很害皮有木有'
            ),
            'mentioned_list' => ['@all']
        );

        $this->httpHandler->postJson($webhook, json_encode($arr));
    }
}
