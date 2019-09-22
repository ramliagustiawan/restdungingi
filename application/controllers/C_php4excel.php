<?php

class C_php4excel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        echo "Start!" . date('y-m-d H:i:s');
        $this->load->library('excel');

        // *
        $inputFileName = "data/bukutelp.xls";
        $inputFileType = "Excel5";
        $objReader = IOFactory::createReader($inputFileType);

        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($inputFileName);

        $objWorkSheet = $objPHPExcel->getActiveSheet();

        foreach ($objWorkSheet->getRowiterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            echo "<br />";
            foreach ($cellIterator as $cell) {
                echo $cell->getValue();
            }
        }
    }

    public function read2table()
    {

        echo "Start!" . date('y-m-d H:i:s');
        $this->load->library('excel');

        // *
        $inputFileName = "data/bukutelp.xls";
        $inputFileType = "Excel5";
        $objReader = IOFactory::createReader($inputFileType);

        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($inputFileName);

        $objWorkSheet = $objPHPExcel->getActiveSheet();

        $this->load->library('table');

        foreach ($objWorkSheet->getRowiterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);


            $baris = array();
            foreach ($cellIterator as $cell) {
                $baris[] = $cell->getValue();
            }
            $this->table->generate();

            echo "done!" . date('y-m-d H:i:s');
        }
    }
}
