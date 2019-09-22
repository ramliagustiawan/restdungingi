<?php
class Inbox extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kontak');
	}

	function index()
	{
		$this->m_kontak->update_status_kontak();
		$x['data'] = $this->m_kontak->get_all_inbox();
		$this->load->view('admin/v_inbox', $x);
	}

	function update_inbox()
	{
		$kode = strip_tags($this->input->post('kode'));
		$inbox_tl = strip_tags($this->input->post('xtl'));

		$this->m_kontak->update_kontak($kode, $inbox_tl);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('adminkantor/inbox');
	}

	function hapus_inbox()
	{
		$kode = $this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('adminkantor/inbox');
	}
}
