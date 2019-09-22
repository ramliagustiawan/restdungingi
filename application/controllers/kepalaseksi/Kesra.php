<?php
class Kesra extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_datakesra');
		$this->load->model('m_kesra');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_kesra->get_all_kesra();
		$x['alb'] = $this->m_datakesra->get_all_datakesra();
		$x['jumlah'] = $this->m_kesra->jumlah();
		$this->load->view('admin/v_kesra', $x);
	}

	function simpan_kesra()
	{

		$judul = strip_tags($this->input->post('xjudul'));
		$datakesra = strip_tags($this->input->post('xdatakesra'));

		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$user_id = $p['pengguna_id'];
		$user_nama = $p['pengguna_nama'];
		$hbt = strip_tags($this->input->post('xhbt'));
		$lib = strip_tags($this->input->post('xlib'));
		$tld = strip_tags($this->input->post('xtld'));
		$tom = strip_tags($this->input->post('xtom'));
		$tomsel = strip_tags($this->input->post('xtomsel'));
		$total = strip_tags($this->input->post('xtotal'));

		$this->m_kesra->simpan_kesra($judul, $datakesra, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/kesra');
	}

	function update_kesra()
	{


		$kesra_id = $this->input->post('kode');
		$judul = strip_tags($this->input->post('xjudul'));
		$datakesra = strip_tags($this->input->post('xdatakesra'));
		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$user_id = $p['pengguna_id'];
		$user_nama = $p['pengguna_nama'];
		$hbt = strip_tags($this->input->post('xhbt'));
		$lib = strip_tags($this->input->post('xlib'));
		$tld = strip_tags($this->input->post('xtld'));
		$tom = strip_tags($this->input->post('xtom'));
		$tomsel = strip_tags($this->input->post('xtomsel'));
		$total = strip_tags($this->input->post('xtotal'));

		$this->m_kesra->update_kesra_tanpa_img($kesra_id, $judul, $datakesra, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/kesra');
	}



	function hapus_kesra()
	{
		$kode = $this->input->post('kode');
		$datakesra = $this->input->post('datakesra');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_kesra->hapus_kesra($kode, $datakesra);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/kesra');
	}
}
