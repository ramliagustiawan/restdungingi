<?php
class Sotk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kategori');
		$this->load->model('m_sotk');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_sotk->get_all_sotk();

		$this->load->view('templates/headeradmin');
		$this->load->view('admin/v_sotk', $x);
	}
	function add_sotk()
	{
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_add_sotk', $x);
	}
	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->m_sotk->get_sotk_by_kode($kode);
		$x['kat'] = $this->m_kategori->get_all_kategori();

		$this->load->view('admin/v_edit_sotk', $x);
	}
	function simpan_sotk()
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
				$config['quality'] = '100%';
				$config['width'] = 1491;
				$config['height'] = 809;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
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
				$this->m_sotk->simpan_sotk($judul, $isi, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('superadmin/sotk');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/sotk');
			}
		} else {
			redirect('superadmin/sotk');
		}
	}

	function update_sotk()
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
				$config['quality'] = '100%';
				$config['width'] = 1491;
				$config['height'] = 809;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$sotk_id = $this->input->post('kode');
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
				$this->m_sotk->update_sotk($sotk_id, $judul, $isi, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('superadmin/sotk');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/sotk');
			}
		} else {
			$sotk_id = $this->input->post('kode');
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
			$this->m_sotk->update_sotk_tanpa_img($sotk_id, $judul, $isi, $kategori_id, $kategori_nama, $imgslider, $user_id, $user_nama, $slug);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('superadmin/sotk');
		}
	}

	function hapus_sotk()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_sotk->hapus_sotk($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('superadmin/sotk');
	}
}
