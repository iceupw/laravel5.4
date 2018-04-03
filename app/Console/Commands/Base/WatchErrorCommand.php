<?php

namespace App\Console\Commands\Base;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WatchErrorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watch_system';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '监控系统错误日志并发送邮件通知';

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
        Log::error('production.ERROR:1111111111');
        $this->monitor_errorlog();
        $this->monitor_schedule();
    }
    private function monitor_errorlog(){
        $today = date('Y-m-d');
        $logFile = storage_path()."/logs/laravel-{$today}.log";
        $getLastErrorLogSh = "cat {$logFile} | grep -n production.ERROR";
        exec($getLastErrorLogSh, $errors);
        if(empty($errors)){
            exit;
        }
        $getServerNameSh = "uname -a";
        exec($getServerNameSh, $serverInfos);
        $errorNum = 0;
        $msg = '';
        foreach ($errors as $error) {
            $lineNum = substr($error, 0, strpos($error, ':'));
            $errorTime = strtotime(substr($error, strpos($error, '[') + 1, 19));
            $lastErrorTime = 0;
            $interval = 600;
            if ($errorTime - $lastErrorTime > $interval) {
                $errorNum ++;
                $msg .= '错误'.$errorNum.'******************************************';
                $getErrorDetailSh = 'sed -n "' . $lineNum . ',' . ($lineNum + 50) . 'p" ' . $logFile;
                $errorDetails = [];
                exec($getErrorDetailSh, $errorDetails);
                foreach ($errorDetails as $k=>$detail){
                    if($k!=0 && strpos($detail,'[') === 0){
                        break;
                    }
                    if(mb_strlen($detail)>1000){
                        $detail = mb_substr($detail, 0, 1000). '......';
                    }
                    $msg .= $detail."<br>";
                }
            }
        }
        if(!empty($msg)) {
            if(mb_strlen($msg)>1000000){
                $msg = mb_substr($msg, 0, 1000000). '......';
            }
            $flag = Mail::raw($msg, function($message){
                $to = '582161766@qq.com';
                $message ->to($to)->subject('测试邮件');
            });
            if($flag){
                $this->info('发送邮件成功，请查收！');
            }else{
                $this->info( '发送邮件失败，请重试！');
            }
        }
    }

    private function monitor_schedule(){
        $path = storage_path().'/framework/';
        $files = scandir($path);
        $msg = '';
        foreach ($files as $file){
            if(strpos($file, 'schedule-') === 0){
                $time = filemtime($path.$file);
                $passTime = time() - $time;
                if($passTime >= 86400){
                    $msg .= $path.$file.'<br>';
                }
            }
        }
        if($msg){
            $this->msgCenterService->sendMsg(
                1,
                ['js.crm@doumi.com'],
                [
                    'msg_title' => "脚本文件锁释放异常",
                    'content' => $msg.'<br>以上文件锁超过一天未释放'
                ]
            );
        }
    }
}
