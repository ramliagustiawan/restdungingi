<?php

class Trantib extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_trantib');
        $this->load->model('m_datatrantib');
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

        $x['trantib'] = $this->m_trantib->get_all_trantib();
        $x['datatrantib'] = $this->m_datatrantib->get_all_datatrantib();
        $x['jumlah'] = $this->m_trantib->jumlah();
        $x['judul'] = 'Dungingi | Data Trantibum';

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_trantib', $x);
        $this->load->view('templates/footer');
    }

    function detail($kode)
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.
        $x['trantib'] = $this->m_trantib->get_trantib_by_kode($kode);
        $x['datatrantib'] = $this->m_datatrantib->get_trantib_by_kode($kode);

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_detail_trantib', $x);
        $this->load->view('templates/footer');
    }

    function cetak()
    {

        $x['trantib'] = $this->m_trantib->get_all_trantib();
        $x['datatrantib'] = $this->m_datatrantib->get_all_datatrantib();
        $x['jumlah'] = $this->m_trantib->jumlah();
        $x['judul'] = 'Dungingi | Data trantib';

        $this->mypdf->generate('laporan/v_trantib', $x, 'Laporan trantib', 'F4', 'portrait');
    }

    function excel()
    {
        $x['trantib'] = $this->m_trantib->get_all_trantib();
        $x['datatrantib'] = $this->m_datatrantib->get_all_datatrantib();
        $x['jumlah'] = $this->m_trantib->jumlah();
        $x['judul'] = 'Dungingi | Data trantib';

        $this->load->view('laporan/exceltrantib', $x);
    }
}
