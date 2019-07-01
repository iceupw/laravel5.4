<?php

namespace App\Console\Commands\Message;

use Illuminate\Console\Command;

class RabbitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:rabbit';

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

    protected $httpHandler;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'http://v.juhe.cn/weather/index?format=2&cityname=%E8%8B%8F%E5%B7%9E&key=21146a4c32e0f8daf54fd9a037d11936';
        //
        $this->httpHandler = app('App\Base\Http\HttpHandler');
        $parm = array(
            'cityname' => '北京',
        );
        $ret = $this->httpHandler->curlGet($url,$parm);
        $str = json_decode($ret, true);
        $str = $str['result']['today'];
        $content = "今天{$str['date_y']} {$str['week']},{$str['city']}温度{$str['temperature']}，天气{$str['weather']}，风向{$str['wind']}，穿衣指数{$str['dressing_index']}，穿衣建议{$str['dressing_advice']}，紫外线强度{$str['uv_index']}，舒适度指数{$str['comfort_index']}，洗车指数{$str['wash_index']}，旅游指数{$str['travel_index']}，晨练指数{$str['exercise_index']}，干燥指数{$str['drying_index']}";
        $webhook = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=a77f95ef-92c2-4b86-81ee-68d8e1e1f6ad';
        $arr = array(
            'msgtype' => 'text',
            'text' => array(
                'content' => $content
            ),
        );
        $this->httpHandler->postJson($webhook, json_encode($arr));
    }
}
