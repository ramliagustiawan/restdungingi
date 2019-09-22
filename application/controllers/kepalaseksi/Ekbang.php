<?php
class Ekbang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_dataekbang');
		$this->load->model('m_ekbang');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_ekbang->get_all_ekbang();
		$x['alb'] = $this->m_dataekbang->get_all_dataekbang();
		$x['jumlah'] = $this->m_ekbang->jumlah();
		$this->load->view('admin/v_ekbang', $x);
	}

	function simpan_ekbang()
	{

		$judul = strip_tags($this->input->post('xjudul'));
		$dataekbang = strip_tags($this->input->post('xdataekbang'));

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
		$this->m_ekbang->simpan_ekbang($judul, $dataekbang, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/ekbang');
	}

	function update_ekbang()
	{


		$ekbang_id = $this->input->post('kode');
		$judul = strip_tags($this->input->post('xjudul'));
		$dataekbang = strip_tags($this->input->post('xdataekbang'));
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


		$this->m_ekbang->update_ekbang_tanpa_img($ekbang_id, $judul, $dataekbang, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/ekbang');
	}



	function hapus_ekbang()
	{
		$kode = $this->input->post('kode');
		$dataekbang = $this->input->post('dataekbang');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_ekbang->hapus_ekbang($kode, $dataekbang);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/ekbang');
	}
}
