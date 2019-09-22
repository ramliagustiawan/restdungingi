<?php
class Tunggakan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kelurahan');
		$this->load->model('m_tunggakan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_tunggakan->get_all_tunggakan();
		$x['alb'] = $this->m_kelurahan->get_all_kelurahan();

		$this->load->view('admin/v_tunggakan', $x);
	}

	function simpan_tunggakan()
	{

		$judul = strip_tags($this->input->post('xjudul'));
		$kelurahan = strip_tags($this->input->post('xkelurahan'));
		$jumlah = strip_tags($this->input->post('xjumlah'));
		$ket = strip_tags($this->input->post('xket'));
		$tahun = strip_tags($this->input->post('xtahun'));

		$this->m_tunggakan->simpan_tunggakan($judul, $kelurahan, $jumlah, $tahun, $ket);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/tunggakan');
	}

	function update_tunggakan()
	{


		$tunggakan_id = $this->input->post('kode');
		$judul = strip_tags($this->input->post('xjudul'));
		$kelurahan = strip_tags($this->input->post('xkelurahan'));
		$jumlah = strip_tags($this->input->post('xjumlah'));
		$ket = strip_tags($this->input->post('xket'));
		$tahun = strip_tags($this->input->post('xtahun'));

		$this->m_tunggakan->update_tunggakan($tunggakan_id, $judul, $kelurahan, $jumlah, $tahun, $ket);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/tunggakan');
	}



	function hapus_tunggakan()
	{
		$kode = $this->input->post('kode');
		$kelurahan = $this->input->post('kelurahan');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_tunggakan->hapus_tunggakan($kode, $kelurahan);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/tunggakan');
	}
}
