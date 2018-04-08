<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaowuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laowu {num1} {num2}';

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
        $num1 = $this->argument('num1');
        $num2 = $this->argument('num2');
        $this->oprate($num1,$num2,array());
    }

    /**
     * 问题描述：输入两个整数n和m，从数列1，2.......n中随意取几个数，使其和等于m，
     * 要求将其中所有的可能组合列出来。
     * @param $num1 和
     * @param $num2 个数
     * @param $arr 临时存放
     * @return bool
     */
    public function oprate($num1,$num2,$arr){
        if ($num1 < 0 || $num2 < 0) {
            return false;
        }

        if ($num1 < $num2) {
            $this->oprate($num1, $num1, $arr);
            return false;
        }

        $str = '';

        if ($num1 == 0) {
            foreach ($arr as $val) {
                $str .= $val . "+";
            }
            $this->info(trim($str,'+'));
            return false;
        }

        $arr[] = $num2;
        $this->oprate($num1 - $num2, $num2 - 1, $arr);

        array_pop($arr);
        $this->oprate($num1, $num2 - 1, $arr);
    }
}
