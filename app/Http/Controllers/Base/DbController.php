<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DbController extends Controller
{
    //

    public function view(){
        // 查询结果集
        $test = DB::table('test')->where('id', '>', '10')->get();
        dd($test);
    }

    /**
     * 执行原生数据库查询
     */
    public function index(){

        // 事务
        //DB::transaction(function (){
        //    DB::rollBack();
            //DB::commit();
        //});
        // 监听查询语句

        // 运行通用语句
        //$res = DB::statement('show tables');
        // 运行删除语句
        //$res = DB::delete('DELETE FROM test WHERE id = ?',[98142]);
        // 运行更新语句
        //$res = DB::update('UPDATE test SET status = 5 where id = ?', [98142]);

        // 运行插入语句
        //$res = DB::insert('INSERT INTO test (status_no, update_at, status, work_load, remark, picture) values  (?, ?, ?, ?, ?, ?)',array(
        //    1,
        //    time(),
        //    1,
        //    1,
        //    1,
        //    1,
        //));
        //命名绑定
        //$res = DB::select('select * from test where id > :id',['id' => 1]);
        // 参数绑定
        //$res = DB::select('select * from test where id > ?',[0]);
        //dd($res);
    }
}
