<?php
class Umkm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_album');
		$this->load->model('m_umkm');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_umkm->get_all_umkm();
		$x['alb'] = $this->m_album->get_all_album();
		$this->load->view('admin/v_umkm', $x);
	}

	function simpan_umkm()
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
				$config['width'] = 500;
				$config['height'] = 400;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$album = strip_tags($this->input->post('xalbum'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_umkm->simpan_umkm($judul, $album, $user_id, $user_nama, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('kepalaseksi/umkm');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/umkm');
			}
		} else {
			redirect('kepalaseksi/umkm');
		}
	}

	function update_umkm()
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
				$config['width'] = 500;
				$config['height'] = 400;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$umkm_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$album = strip_tags($this->input->post('xalbum'));
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_umkm->update_umkm($umkm_id, $judul, $album, $user_id, $user_nama, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('kepalaseksi/umkm');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/umkm');
			}
		} else {
			$umkm_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$album = strip_tags($this->input->post('xalbum'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_umkm->update_umkm_tanpa_img($umkm_id, $judul, $album, $user_id, $user_nama);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('kepalaseksi/umkm');
		}
	}

	function hapus_umkm()
	{
		$kode = $this->input->post('kode');
		$album = $this->input->post('album');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_umkm->hapus_umkm($kode, $album);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/umkm');
	}
}
