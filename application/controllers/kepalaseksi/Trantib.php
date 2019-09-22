<?php
class Trantib extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_datatrantib');
		$this->load->model('m_trantib');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_trantib->get_all_trantib();
		$x['alb'] = $this->m_datatrantib->get_all_datatrantib();
		$x['jumlah'] = $this->m_trantib->jumlah();
		$this->load->view('admin/v_trantib', $x);
	}

	function simpan_trantib()
	{

		$judul = strip_tags($this->input->post('xjudul'));
		$datatrantib = strip_tags($this->input->post('xdatatrantib'));

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

		$this->m_trantib->simpan_trantib($judul, $datatrantib, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/trantib');
	}

	function update_trantib()
	{


		$trantib_id = $this->input->post('kode');
		$judul = strip_tags($this->input->post('xjudul'));
		$datatrantib = strip_tags($this->input->post('xdatatrantib'));
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

		$this->m_trantib->update_trantib_tanpa_img($trantib_id, $judul, $datatrantib, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/trantib');
	}



	function hapus_trantib()
	{
		$kode = $this->input->post('kode');
		$datatrantib = $this->input->post('datatrantib');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_trantib->hapus_trantib($kode, $datatrantib);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/trantib');
	}
}
