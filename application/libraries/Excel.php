<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once
    APPPATH . '/libraries/third_party/Classes/PHPExcel.php';
require_once
    APPPATH . '/libraries/third_party/Classes/PHPExcel/IOFactory.php';

class Excel extends PHPexcel
{
    // class excel

    public function __construct()
    {
        parent::__construct();
    }
}
