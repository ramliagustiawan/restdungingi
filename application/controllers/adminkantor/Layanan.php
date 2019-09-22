<?php
class Layanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_layanan');
		$this->load->model('m_kelurahan');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_layanan->get_all_layanan();
		$x['alb'] = $this->m_kelurahan->get_all_kelurahan();
		$this->load->view('admin/v_layanan', $x);
	}

	function simpan_layanan()
	{

		$judul = strip_tags($this->input->post('xjudul'));
		$pemohon = strip_tags($this->input->post('xpemohon'));
		$tanggal = strip_tags($this->input->post('xtanggal'));
		$kelurahan = strip_tags($this->input->post('xkelurahan'));
		$ket = strip_tags($this->input->post('xket'));

		$this->m_layanan->simpan_layanan($judul, $pemohon, $tanggal, $kelurahan, $ket);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('adminkantor/layanan');
	}

	function update_layanan()
	{
		$kode = strip_tags($this->input->post('kode'));
		$judul = strip_tags($this->input->post('xjudul'));
		$pemohon = strip_tags($this->input->post('xpemohon'));
		$tanggal = strip_tags($this->input->post('xtanggal'));
		$kelurahan = strip_tags($this->input->post('xkelurahan'));
		$ket = strip_tags($this->input->post('xket'));

		$this->m_layanan->update_layanan($kode, $judul, $pemohon, $tanggal, $kelurahan, $ket);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('adminkantor/layanan');
	}



	function hapus_layanan()
	{
		$kode = strip_tags($this->input->post('kode'));
		$kelurahan = $this->input->post('kelurahan');
		$this->m_layanan->hapus_layanan($kode, $kelurahan);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('adminkantor/layanan');
	}
}
