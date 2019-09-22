<?php

class Kesra extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_kesra');
        $this->load->model('m_datakesra');
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

        $x['kesra'] = $this->m_kesra->get_all_kesra();
        $x['datakesra'] = $this->m_datakesra->get_all_datakesra();
        $x['jumlah'] = $this->m_kesra->jumlah();
        $x['judul'] = 'Dungingi | Data Kesra';

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_kesra', $x);
        $this->load->view('templates/footer');
    }

    function detail($kode)
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.
        $x['kesra'] = $this->m_kesra->get_kesra_by_kode($kode);
        $x['datakesra'] = $this->m_datakesra->get_kesra_by_kode($kode);

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_detail_kesra', $x);
        $this->load->view('templates/footer');
    }

    function cetak()
    {

        $x['kesra'] = $this->m_kesra->get_all_kesra();
        $x['datakesra'] = $this->m_datakesra->get_all_datakesra();
        $x['jumlah'] = $this->m_kesra->jumlah();
        $x['judul'] = 'Dungingi | Data kesra';

        $this->mypdf->generate('laporan/v_kesra', $x, 'Laporan kesra', 'F4', 'portrait');
    }

    function excel()
    {
        $x['kesra'] = $this->m_kesra->get_all_kesra();
        $x['datakesra'] = $this->m_datakesra->get_all_datakesra();
        $x['jumlah'] = $this->m_kesra->jumlah();
        $x['judul'] = 'Dungingi | Data kesra';

        $this->load->view('laporan/excelkesra', $x);
    }
}
