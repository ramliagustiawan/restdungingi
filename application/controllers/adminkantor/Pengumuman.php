<?php
class Pengumuman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_pengumuman');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_pengumuman->get_all_pengumuman();
		$this->load->view('admin/v_pengumuman', $x);
	}

	function simpan_pengumuman()
	{
		$judul = strip_tags($this->input->post('xjudul'));
		$deskripsi = $this->input->post('xdeskripsi');
		$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('adminkantor/pengumuman');
	}

	function update_pengumuman()
	{
		$kode = strip_tags($this->input->post('kode'));
		$judul = strip_tags($this->input->post('xjudul'));
		$deskripsi = $this->input->post('xdeskripsi');
		$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('adminkantor/pengumuman');
	}
	function hapus_pengumuman()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('adminkantor/pengumuman');
	}
}
