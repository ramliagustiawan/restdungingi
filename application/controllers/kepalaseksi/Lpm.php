<?php
class Lpm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_lpm');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_lpm->get_all_lpm();
		$this->load->view('admin/v_lpm', $x);
	}

	function simpan_lpm()
	{

		$nama = strip_tags($this->input->post('xnama'));
		$ketua = strip_tags($this->input->post('xketua'));
		$alamat = strip_tags($this->input->post('xalamat'));
		$telepon = strip_tags($this->input->post('xtelepon'));
		$ket = strip_tags($this->input->post('xket'));
		$this->m_lpm->simpan_lpm($nama, $ketua, $alamat, $telepon, $ket);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/lpm');
	}

	function update_lpm()
	{
		$kode = strip_tags($this->input->post('kode'));
		$nama = strip_tags($this->input->post('xnama'));
		$ketua = strip_tags($this->input->post('xketua'));
		$alamat = strip_tags($this->input->post('xalamat'));
		$telepon = strip_tags($this->input->post('xtelepon'));
		$ket = strip_tags($this->input->post('xket'));
		$this->m_lpm->update_lpm($kode, $nama, $ketua, $alamat, $telepon, $ket);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/lpm');
	}

	function hapus_lpm()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_lpm->hapus_lpm($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/lpm');
	}
}
