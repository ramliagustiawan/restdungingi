<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_pengunjung');
	}
	function index()
	{
		if ($this->session->userdata('akses') == '1') {
			$x['visitor'] = $this->m_pengunjung->statistik_pengunjung();

			// $this->load->view('templates/headeradmin',$x);
			$this->load->view('admin/v_dashboard', $x);
			// $this->load->view('templates/footeradmin',$x);

		} else {
			redirect('administrator');
		}
	}
}
