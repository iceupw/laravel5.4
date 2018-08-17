<?php
/**
 * 获取业务变量
 * @usage
 *      - IncService::get('contract.contract_status');
 *      - IncService::get('Workflow.test.test'); Inc/Workflow/TestInc.php 支持多级目录
 *      - $inc->get('contract.contract_status');
 * User: hepeng
 * Date: 2015/7/21
 * Time: 12:46
 */
namespace App\Services;
use Illuminate\Support\Facades\DB;

class DbtransactionService
{

    public function test(){
        //DB::beginTransaction();
        $appsModel = app('App\Models\Base\AppsModel');
        $appsModel->where('id', 1)->update(['title' => '我的电脑1']);
        $appsModel->where('id', 2)->update(['title' => '回收站1','xxxx' => '1111']);
        DB::commit();
    }

}

