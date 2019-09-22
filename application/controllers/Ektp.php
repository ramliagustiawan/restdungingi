<?php

class Ektp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_kelurahan');
        $this->load->model('m_ektp');
        $this->load->model('m_pengguna');
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
    }

    function index()
    {
        $x['data'] = $this->m_ektp->get_all_ektp($id = null);
        $x['alb'] = $this->m_kelurahan->get_all_kelurahan();

        $x['judul'] = 'Dungingi | EKTP';

        // var_dump($x);
        // die;

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_ektp', $x);
        $this->load->view('templates/footer');
    }
}
