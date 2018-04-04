<?php

namespace App\Console\Commands\Base;

use Illuminate\Console\Command;
use Excel;
use App\Base\Excel\PHPExcelHandler;

class ExportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export {filename=example}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'export filename';

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
        $filename = $this->argument('filename');
        switch ($filename){
            case 'example':
                $this->example($filename);
                break;
            case 'excel':
                $this->excel($filename);
                break;
            default:
                $this->info('暂无其它例子');
                break;
        }
    }

    public function example($filename){
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create($filename, function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->store('xls');
    }

    public function excel(){
        $filename = 'test.xls';
        $content_arr = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        $objPHPExcel = app('App\Base\Excel\PHPExcelHandler');
        $i = 1;
        foreach ($content_arr as $k => $v){
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $v[0]);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $v[1]);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $v[2]);
            $i++;
        }
        $excelIOFactory = app('App\Base\Excel\PHPExcelIOFactoryHandler');
        $objWriter = $excelIOFactory::createWriter($objPHPExcel, 'Excel2007');
        $rt = $objWriter->save($filename);
        return $rt;
    }
}
