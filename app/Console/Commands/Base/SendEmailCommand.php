<?php

namespace App\Console\Commands\Base;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送邮件';

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
        $name = '测试';
        $flag = Mail::send('welcome',['name'=>$name],function($message){
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
