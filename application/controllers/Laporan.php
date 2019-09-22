<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Laporan extends CI_Controller
{


    public function index()
    {
        $this->load->library('mypdf');

        $data['data'] = array(
            ['nim' => '12345', 'name' => 'Pigus'],
            ['nim' => '12345', 'name' => 'Doritos']
        );
        $this->mypdf->generate('Laporan/dompdf', $data);
    }
}
