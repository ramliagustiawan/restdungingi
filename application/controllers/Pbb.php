<?php
class Pbb extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pbb');
		$this->load->model('m_pengunjung');
		$this->load->model('m_kelurahan');
		$this->load->model('m_tunggakan');
		$this->load->model('m_pengguna');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
		$x['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$x['data'] = $this->m_tulisan->get_all_tulisan();
		$x['pbb'] = $this->m_pbb->get_all_pbb();

		$x['data'] = $this->m_tunggakan->get_all_tunggakan();
		$x['alb'] = $this->m_kelurahan->get_all_kelurahan();

		$x['judul'] = 'Dungingi | PBB';



		$this->load->view('templates/header');
		$this->load->view('depan/v_pbb', $x);
		$this->load->view('templates/footer');
	}
}
