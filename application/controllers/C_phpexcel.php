<?php
defined('BASEPATH') or exit('No direct script access allowed');



class C_phpexcel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
    }



    public function index()
    {
        echo "Start!";
        $sT = microtime(1);

        $objPHPExcel = new PHPExcel();

        // assign cell values
        $objPHPExcel->setActiveSheetindex(0);
        for ($i = 0; $i < 1000; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $nomorkol = chr(65 + $j);
                $hasil = $i * $j;
                $objPHPExcel->getActiveSheet()->setCellValue($nomorkol . $i, $hasil);
            }
        }

        // save it as excel 2003 file
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save("data/excelfromclass.xls");

        echo "<br />";
        echo "Done!" . date('y-m-d H:i:s');
        echo "<br />";

        $eT = microtime(1);

        var_dump(($eT - $sT), memory_get_usage(1), memory_get_peak_usage(1));
    }
}
