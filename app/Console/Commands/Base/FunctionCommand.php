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
            case 'action':
                $res = action('HomeController@index');
                break;
            case  'asset':
                $res = asset('1');
                break;
            case 'route':
                $res = route('welcome');
                break;
            case 'url':
                $res = secure_url('welcome');
                break;
            case 'abort':
                abort(401);
                break;
            case 'factory':
                //$user = factory(App\User::class)->make();
                break;
            case 'info':
                $res = info('this is a info');
                break;
            case 'logger':
                $res = logger('logger test');
                logger()->error('this is a debuger no parament');
                logger('this a parament',['id'=>'111111111']);
                break;
            case 'method_filed':
                $res = method_field('DELETE');
                break;
            case 'with':
                $res = $this->with();
                break;
            case 'view':
                $res = view('welcome');
                break;
            case 'value':
                $res = value(function(){
                    return '刘瑞杰';
                });
                break;
            case 'session':
                session()->put('test1',111111111);
                $res = session('test1');
                break;
            case 'retry':
                $res = retry(5,function(){
                    echo 1;
                });
                break;
            case 'response':
                $res = response('Hello World', 200);
                break;
            case 'request':
                $res = request('key', '111111');
                break;
            case 'redirect':
                $res = redirect('/home');
                break;
            case 'old':
                $res = old('key1','value');
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
