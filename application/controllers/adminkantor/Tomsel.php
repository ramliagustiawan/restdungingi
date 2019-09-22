<?php
class Tomsel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kategori');
		$this->load->model('m_tomsel');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_tomsel->get_all_tomsel();

		$this->load->view('templates/headeradmin');
		$this->load->view('admin/v_tomsel', $x);
	}
	function add_tomsel()
	{
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_add_tomsel', $x);
	}
	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->m_tomsel->get_tomsel_by_kode($kode);
		$x['kat'] = $this->m_kategori->get_all_kategori();

		$this->load->view('admin/v_edit_tomsel', $x);
	}
	function simpan_tomsel()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$alamat = strip_tags($this->input->post('xalamat'));
				$hp = strip_tags($this->input->post('xhp'));
				$lurah = strip_tags($this->input->post('xlurah'));
				$ket = strip_tags($this->input->post('xket'));

				$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
				$trim     = trim($string);
				$slug     = strtolower(str_replace(" ", "-", $trim));
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				//$imgslider=$this->input->post('ximgslider');
				$imgslider = '0';
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tomsel->simpan_tomsel($judul, $isi, $gambar, $alamat, $hp, $lurah, $ket);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('adminkantor/tomsel');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('adminkantor/tomsel');
			}
		} else {
			redirect('adminkantor/tomsel');
		}
	}

	function update_tomsel()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$tomsel_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$alamat = $this->input->post('xalamat');
				$hp = strip_tags($this->input->post('xhp'));
				$lurah = $this->input->post('xlurah');
				$ket = strip_tags($this->input->post('xket'));

				$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
				$trim     = trim($string);
				$slug     = strtolower(str_replace(" ", "-", $trim));
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				//$imgslider=$this->input->post('ximgslider');
				$imgslider = '0';
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tomsel->update_tomsel($tomsel_id, $judul, $isi, $gambar, $alamat, $hp, $lurah, $ket);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('adminkantor/tomsel');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('adminkantor/tomsel');
			}
		} else {
			$tomsel_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$isi = $this->input->post('xisi');
			$alamat = $this->input->post('xalamat');
			$hp = strip_tags($this->input->post('xhp'));
			$lurah = $this->input->post('xlurah');
			$ket = strip_tags($this->input->post('xket'));
			
			$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
			$trim     = trim($string);
			$slug     = strtolower(str_replace(" ", "-", $trim));
			$kategori_id = strip_tags($this->input->post('xkategori'));
			$data = $this->m_kategori->get_kategori_byid($kategori_id);
			$q = $data->row_array();
			$kategori_nama = $q['kategori_nama'];
			//$imgslider=$this->input->post('ximgslider');
			$imgslider = '0';
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_tomsel->update_tomsel_tanpa_img($tomsel_id, $judul, $isi, $alamat, $hp, $lurah, $ket);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('adminkantor/tomsel');
		}
	}

	function hapus_tomsel()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_tomsel->hapus_tomsel($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('adminkantor/tomsel');
	}
}
