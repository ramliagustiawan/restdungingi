<?php
class Datatrantib extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_datatrantib');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_datatrantib->get_all_datatrantib();
		$this->load->view('admin/v_datatrantib', $x);
	}

	function simpan_datatrantib()
	{

		$datatrantib = strip_tags($this->input->post('xnama_datatrantib'));
		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$user_id = $p['pengguna_id'];
		$user_nama = $p['pengguna_nama'];
		$this->m_datatrantib->simpan_datatrantib($datatrantib, $user_id, $user_nama);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/datatrantib');
	}

	function update_datatrantib()
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
				$datatrantib_id = $this->input->post('kode');
				$datatrantib_nama = strip_tags($this->input->post('xnama_datatrantib'));
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_datatrantib->update_datatrantib($datatrantib_id, $datatrantib_nama, $user_id, $user_nama);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('kepalaseksi/datatrantib');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/datatrantib');
			}
		} else {
			$datatrantib_id = $this->input->post('kode');
			$datatrantib_nama = strip_tags($this->input->post('xnama_datatrantib'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_datatrantib->update_datatrantib_tanpa_img($datatrantib_id, $datatrantib_nama, $user_id, $user_nama);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('kepalaseksi/datatrantib');
		}
	}

	function hapus_datatrantib()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_datatrantib->hapus_datatrantib($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/datatrantib');
	}
}
