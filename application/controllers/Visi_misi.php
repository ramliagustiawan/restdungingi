<?php
class visi_misi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$x['judul'] = 'Dungingi | Visi Misi';
		$this->load->view('depan/v_visi_misi', $x);
	}
}
