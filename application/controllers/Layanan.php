<?php

class Layanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_layanan');
        $this->load->model('m_kelurahan');
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
    }

    function index()
    {
        $x['data'] = $this->m_layanan->get_all_layanan();
        $x['alb'] = $this->m_kelurahan->get_all_kelurahan();
        $x['judul'] = 'Dungingi | Layanan';

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_layanan', $x);
        $this->load->view('templates/footer');
    }
}
