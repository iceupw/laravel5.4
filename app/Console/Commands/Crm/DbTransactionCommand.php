<?php
/**
 * 验证laravel事务嵌套
 * @usage
 * User: liuruijie
 * Date: 2015/7/21
 * Time: 12:46
 */
namespace App\Console\Commands\Crm;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DbTransactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dbtransaction';

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
        DB::beginTransaction();

        try{
            // 调用服务事务
            $DbtransactionService = app('App\Services\DbtransactionService');
            $DbtransactionService->test();

            // 调用错误 服务事务回滚
            $appsModel = app('App\Models\Base\AppsModel');
            $appsModel->where('id', 2)->update(['title' => '回收站1','xxxx' => '1111']);
        }catch (\Exception $exp){
            DB::rollback();
            dd($exp->getMessage());
        }finally{
            DB::commit();
        }
    }
}
