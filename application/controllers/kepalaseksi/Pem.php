<?php
class Pem extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_datapem');
		$this->load->model('m_pem');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_pem->get_all_pem();
		$x['alb'] = $this->m_datapem->get_all_datapem();
		$x['jumlah'] = $this->m_pem->jumlah();
		$this->load->view('admin/v_pem', $x);
	}

	function simpan_pem()
	{

		$judul = strip_tags($this->input->post('xjudul'));
		$datapem = strip_tags($this->input->post('xdatapem'));

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

		$this->m_pem->simpan_pem($judul, $datapem, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/pem');
	}

	function update_pem()
	{


		$pem_id = $this->input->post('kode');
		$judul = strip_tags($this->input->post('xjudul'));
		$datapem = strip_tags($this->input->post('xdatapem'));
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

		$this->m_pem->update_pem_tanpa_img($pem_id, $judul, $datapem, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/pem');
	}



	function hapus_pem()
	{
		$kode = $this->input->post('kode');
		$datapem = $this->input->post('datapem');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_pem->hapus_pem($kode, $datapem);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/pem');
	}
}
