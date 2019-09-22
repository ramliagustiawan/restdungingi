<?php
class ijin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kategori');
		$this->load->model('m_ijin');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_ijin->get_all_ijin();

		$this->load->view('templates/headeradmin');
		$this->load->view('admin/v_ijin', $x);
	}
	function add_ijin()
	{
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_add_ijin', $x);
	}
	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->m_ijin->get_ijin_by_kode($kode);
		$x['kat'] = $this->m_kategori->get_all_kategori();

		$this->load->view('admin/v_edit_ijin', $x);
	}
	function simpan_ijin()
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
				$tanggal = strip_tags($this->input->post('xtanggal'));
				$isi = $this->input->post('xisi');
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
				$this->m_ijin->simpan_ijin($judul, $isi, $gambar, $tanggal);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('adminkantor/ijin');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('adminkantor/ijin');
			}
		} else {
			redirect('adminkantor/ijin');
		}
	}

	function update_ijin()
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
				$ijin_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$tanggal = $this->input->post('xtanggal');
				$isi = $this->input->post('xisi');
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
				$this->m_ijin->update_ijin($ijin_id, $judul, $isi, $gambar, $tanggal);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('adminkantor/ijin');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('adminkantor/ijin');
			}
		} else {
			$ijin_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$isi = $this->input->post('xisi');
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
			$this->m_ijin->update_ijin_tanpa_img($ijin_id, $judul, $isi, $kategori_id, $kategori_nama, $imgslider, $user_id, $user_nama, $slug);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('adminkantor/ijin');
		}
	}

	function hapus_ijin()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_ijin->hapus_ijin($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('adminkantor/ijin');
	}
}
