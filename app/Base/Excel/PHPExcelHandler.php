<?php
/**
 * Created by PhpStorm.
 * User: haoming1
 * Date: 2015/8/16
 * Time: 11:17
 */
namespace App\Base\Excel;
use Config;
require_once './vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
class PHPExcelHandler extends \PHPExcel{

    public function __construct(){
        parent::__construct();
    }
}