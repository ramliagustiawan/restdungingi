<?php

class Potensi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_potensi');
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
    }

    function index()
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.

        $x['data'] = $this->m_potensi->get_all_potensi();
        $x['judul'] = 'Dungingi | Potensi Wilayah';

        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_potensi', $x);
        $this->load->view('templates/footer');
    }

    function detail($kode)
    {
        $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        //cara baca diambil dari data person yang ada di model (nama file) dan ditambah methodnya.
        $x['potensi'] = $this->m_potensi->get_potensi_by_kode($kode);
        $x['judul'] = 'Dungingi | Detail Potensi';


        //kirim data di atas di parameter bawah ini
        $this->load->view('templates/header');
        $this->load->view('depan/v_detail_potensi', $x);
        $this->load->view('templates/footer');
    }

    function cari()
    {
        $keyword = str_replace("'", "", htmlspecialchars($this->input->get('keyword', TRUE), ENT_QUOTES));
        $query = $this->m_potensi->cari_potensi($keyword);
        if ($query->num_rows() > 0) {
            $x['potensi'] = $query;
            $x['category'] = $this->db->get('tbl_kategori');
            $x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");

            //kirim data di atas di parameter bawah ini
            $this->load->view('templates/header');
            $this->load->view('depan/v_potensi', $x);
            $this->load->view('templates/footer');
        } else {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>' . $keyword . '</b></div>');
            redirect('potensi');
        }
    }
}
