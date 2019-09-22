<?php
class Datapem extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_datapem');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_datapem->get_all_datapem();
		$this->load->view('admin/v_datapem', $x);
	}

	function simpan_datapem()
	{

		$datapem = strip_tags($this->input->post('xnama_datapem'));
		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$user_id = $p['pengguna_id'];
		$user_nama = $p['pengguna_nama'];
		$this->m_datapem->simpan_datapem($datapem, $user_id, $user_nama);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/datapem');
	}

	function update_datapem()
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
				$datapem_id = $this->input->post('kode');
				$datapem_nama = strip_tags($this->input->post('xnama_datapem'));
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_datapem->update_datapem($datapem_id, $datapem_nama, $user_id, $user_nama);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('kepalaseksi/datapem');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/datapem');
			}
		} else {
			$datapem_id = $this->input->post('kode');
			$datapem_nama = strip_tags($this->input->post('xnama_datapem'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_datapem->update_datapem_tanpa_img($datapem_id, $datapem_nama, $user_id, $user_nama);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('kepalaseksi/datapem');
		}
	}

	function hapus_datapem()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_datapem->hapus_datapem($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/datapem');
	}
}
