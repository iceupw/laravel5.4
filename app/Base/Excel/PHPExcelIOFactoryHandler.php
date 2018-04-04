<?php
/**
 * Created by PhpStorm.
 * User: haoming1
 * Date: 2015/8/16
 * Time: 11:17
 */
namespace App\Base\Excel;
use Config;
require_once './vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
class PHPExcelIOFactoryHandler extends \PHPExcel_IOFactory{

    public function __construct(){
       // echo Config::get('app.code_base2').'/util/phpexcel/PHPExcel/IOFactory.php';exit;
    }
}