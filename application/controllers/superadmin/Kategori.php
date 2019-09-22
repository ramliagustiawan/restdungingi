<?php
class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kategori');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_kategori', $x);
	}

	function simpan_kategori()
	{
		$kategori = strip_tags($this->input->post('xkategori'));
		$this->m_kategori->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('superadmin/kategori');
	}

	function update_kategori()
	{
		$kode = strip_tags($this->input->post('kode'));
		$kategori = strip_tags($this->input->post('xkategori'));
		$this->m_kategori->update_kategori($kode, $kategori);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('superadmin/kategori');
	}
	function hapus_kategori()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_kategori->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('superadmin/kategori');
	}
}
