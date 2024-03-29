<?php
class Tomin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_tomin');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
		$x['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$x['data'] = $this->m_tulisan->get_all_tulisan();
		$x['tomin'] = $this->m_tomin->get_all_tomin();
		$x['judul'] = 'Dungingi | Tomulabutao';



		$this->load->view('templates/header');
		$this->load->view('depan/v_tomin', $x);
		$this->load->view('templates/footer');
	}
}
