<?php

class Ekbang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_ekbang');
        $this->load->model('m_dataekbang');
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

        $x['ekbang'] = $this->m_ekbang->get_all_ekbang();
        $x['dataekbang'] = $this->m_dataekbang->get_all_dataekbang();
        $x['jumlah'] = $this->m_ekbang->jumlah();
        $x['judul'] = 'Dungingi | Data Ekbang';

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_ekbang', $x);
        $this->load->view('templates/footer');
    }

    function detail($kode)
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.
        $x['ekbang'] = $this->m_ekbang->get_ekbang_by_kode($kode);
        $x['dataekbang'] = $this->m_dataekbang->get_ekbang_by_kode($kode);

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_detail_ekbang', $x);
        $this->load->view('templates/footer');
    }

    function cetak()
    {

        $x['ekbang'] = $this->m_ekbang->get_all_ekbang();
        $x['dataekbang'] = $this->m_dataekbang->get_all_dataekbang();
        $x['jumlah'] = $this->m_ekbang->jumlah();
        $x['judul'] = 'Dungingi | Data Ekbang';

        $this->mypdf->generate('laporan/v_ekbang', $x, 'Laporan ekbang', 'F4', 'portrait');
    }

    function excel()
    {
        $x['ekbang'] = $this->m_ekbang->get_all_ekbang();
        $x['dataekbang'] = $this->m_dataekbang->get_all_dataekbang();
        $x['jumlah'] = $this->m_ekbang->jumlah();
        $x['judul'] = 'Dungingi | Data Ekbang';

        $this->load->view('laporan/excelekbang', $x);
    }
}
