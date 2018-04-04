<?php

namespace App\Console\Commands\Base;

use App\Services\IncService;
use Illuminate\Console\Command;

class FunctionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'function {name=example}';

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
        $name = $this->argument('name');

        switch ($name){
            case 'with':
                $res = $this->with();
                break;
            default :
                $res = '不存在';
        }
        $this->info($res);
    }

    public function with(){
        $value = with(new IncService)->test();
        return $value;
    }
}
