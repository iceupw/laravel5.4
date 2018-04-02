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

class IncService
{
    const currPath = __DIR__;
    const incPath =  '/../Inc/';

    /**
     * 获取业务变量
     * @param $key = 文件名.变量key值（如contract.contract_status），统一使用小写
     * @param bool $default 如果没有获取到默认返回值
     * @return bool 返回相关变量
     */
    public static function get($key, $default=false) {
        if(empty($key))
            return $default;
        $key = strtolower($key);
        if(strpos($key, '.') === false)
            return $default;
        $arrKey = explode( '.', $key );
        $nums = count($arrKey);
        $lastIndex = $nums-1;
        $varKey = $arrKey[$lastIndex];
        unset($arrKey[$lastIndex]);
        $path = str_replace(' ','/',ucwords( implode(' ', $arrKey)));
        $vars = require self::currPath . self::incPath  . $path .'Inc.php';
        return isset($vars[$varKey]) ? $vars[$varKey] : $default;
    }


   

    /**
     * 获取所有变量
     * @param $key = 文件名
     * @param array $default 如果没有获取到默认返回值
     */
    public static function getAll($key, $default = []) {
        if(empty($key))
            return $default;
        $vars = require self::currPath . self::incPath  . ucfirst(strtolower($key)).'Inc.php';
        return $vars;
    }

}

