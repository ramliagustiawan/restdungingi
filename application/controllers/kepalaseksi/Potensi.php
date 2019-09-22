<?php
class Potensi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kelurahan');
		$this->load->model('m_potensi');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_potensi->get_all_potensi();
		$x['alb'] = $this->m_kelurahan->get_all_kelurahan();
		$this->load->view('admin/v_potensi', $x);
	}

	function simpan_potensi()
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
				$kelurahan = strip_tags($this->input->post('xkelurahan'));
				$ket = strip_tags($this->input->post('xket'));

				$this->m_potensi->simpan_potensi($judul, $kelurahan, $ket, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('kepalaseksi/potensi');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/potensi');
			}
		} else {
			redirect('kepalaseksi/potensi');
		}
	}

	function update_potensi()
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
				$potensi_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$kelurahan = strip_tags($this->input->post('xkelurahan'));
				$ket = strip_tags($this->input->post('xket'));

				$this->m_potensi->update_potensi($potensi_id, $judul, $kelurahan, $ket, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('kepalaseksi/potensi');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('kepalaseksi/potensi');
			}
		} else {
			$potensi_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$kelurahan = strip_tags($this->input->post('xkelurahan'));
			$ket = strip_tags($this->input->post('xket'));
			$this->m_potensi->update_potensi_tanpa_img($potensi_id, $judul, $kelurahan, $ket);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('kepalaseksi/potensi');
		}
	}

	function hapus_potensi()
	{
		$kode = $this->input->post('kode');
		$kelurahan = $this->input->post('kelurahan');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_potensi->hapus_potensi($kode, $kelurahan);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/potensi');
	}
}
