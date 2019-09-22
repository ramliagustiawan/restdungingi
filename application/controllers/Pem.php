<?php

class Pem extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_pem');
        $this->load->model('m_datapem');
        $this->load->model('m_pengunjung');
        $this->load->library('mypdf');
        $this->m_pengunjung->count_visitor();
    }

    function index()
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.

        $x['pem'] = $this->m_pem->get_all_pem();
        $x['datapem'] = $this->m_datapem->get_all_datapem();
        $x['jumlah'] = $this->m_pem->jumlah();
        $x['judul'] = 'Dungingi | Data Pemerintahan';

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_pem', $x);
        $this->load->view('templates/footer');
    }

    function detail($kode)
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.
        $x['pem'] = $this->m_pem->get_pem_by_kode($kode);
        $x['datapem'] = $this->m_datapem->get_pem_by_kode($kode);

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_detail_pem', $x);
        $this->load->view('templates/footer');
    }

    function cetak()
    {

        $x['pem'] = $this->m_pem->get_all_pem();
        $x['datapem'] = $this->m_datapem->get_all_datapem();
        $x['jumlah'] = $this->m_pem->jumlah();
        $x['judul'] = 'Dungingi | Data Pemerintahan';

        $this->mypdf->generate('laporan/v_pem', $x, 'Laporan Pemerintahan', 'F4', 'portrait');
    }

    function excel()
    {
        $x['pem'] = $this->m_pem->get_all_pem();
        $x['datapem'] = $this->m_datapem->get_all_datapem();
        $x['jumlah'] = $this->m_pem->jumlah();
        $x['judul'] = 'Dungingi | Data Pemerintahan';

        $this->load->view('laporan/excelpem', $x);
    }
}
