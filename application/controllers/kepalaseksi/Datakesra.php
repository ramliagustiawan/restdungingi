<?php
class Datakesra extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_datakesra');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_datakesra->get_all_datakesra();
		$this->load->view('admin/v_datakesra', $x);
	}

	function simpan_datakesra()
	{

		$datakesra = strip_tags($this->input->post('xnama_datakesra'));
		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$user_id = $p['pengguna_id'];
		$user_nama = $p['pengguna_nama'];
		$this->m_datakesra->simpan_datakesra($datakesra, $user_id, $user_nama);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/datakesra');
	}

	function update_datakesra()
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
				$datakesra_id = $this->input->post('kode');
				$datakesra_nama = strip_tags($this->input->post('xnama_datakesra'));
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_datakesra->update_datakesra($datakesra_id, $datakesra_nama, $user_id, $user_nama);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('kepalaseksi/datakesra');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/datakesra');
			}
		} else {
			$datakesra_id = $this->input->post('kode');
			$datakesra_nama = strip_tags($this->input->post('xnama_datakesra'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_datakesra->update_datakesra_tanpa_img($datakesra_id, $datakesra_nama, $user_id, $user_nama);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('kepalaseksi/datakesra');
		}
	}

	function hapus_datakesra()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_datakesra->hapus_datakesra($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/datakesra');
	}
}
