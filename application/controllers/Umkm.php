<?php
class Umkm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_umkm');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['alb'] = $this->m_album->get_all_album();
		$x['all_umkm'] = $this->m_umkm->get_all_umkm();
		$x['judul'] = 'Dungingi | UMKM';

		$this->load->view('templates/header');
		$this->load->view('depan/v_umkm', $x);
		$this->load->view('templates/footer');
	}
	function album()
	{
		$idalbum = $this->uri->segment(3);
		$x['alb'] = $this->m_album->get_all_album();
		$x['data'] = $this->m_umkm->get_umkm_by_album_id($idalbum);

		$this->load->view('templates/header');
		$this->load->view('depan/v_umkm_per_album', $x);
		$this->load->view('templates/footer');
	}
}
