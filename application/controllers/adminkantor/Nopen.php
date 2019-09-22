<?php
class Nopen extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_nopen');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_nopen->get_all_nopen();
		$this->load->view('admin/v_nopen', $x);
	}

	function simpan_nopen()
	{

		$user = strip_tags($this->input->post('xuser'));
		$hp = strip_tags($this->input->post('xhp'));
		$ket = strip_tags($this->input->post('xket'));
		$this->m_nopen->simpan_nopen($user, $hp, $ket);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('adminkantor/nopen');
	}

	function update_nopen()
	{
		$kode = strip_tags($this->input->post('kode'));
		$user = strip_tags($this->input->post('xuser'));
		$hp = strip_tags($this->input->post('xhp'));
		$ket = strip_tags($this->input->post('xket'));
		$this->m_nopen->update_nopen($kode, $user, $hp, $ket);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('adminkantor/nopen');
	}



	function hapus_nopen()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_nopen->hapus_nopen($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('adminkantor/nopen');
	}
}
