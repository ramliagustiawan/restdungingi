<?php
class Tuladenggi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_tuladenggi');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
		$x['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$x['data'] = $this->m_tulisan->get_all_tulisan();
		$x['tld'] = $this->m_tuladenggi->get_all_tld();
		$x['judul'] = 'Dungingi | Tuladenggi';



		$this->load->view('templates/header');
		$this->load->view('depan/v_tuladenggi', $x);
		$this->load->view('templates/footer');
	}
}
