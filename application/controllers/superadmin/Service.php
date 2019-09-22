<?php
class Service extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_service');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_service->get_all_service();
		$this->load->view('admin/v_service', $x);
	}

	function simpan_service()
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
				$metod = strip_tags($this->input->post('xmetod'));

				$this->m_service->simpan_service($judul, $gambar, $metod);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('superadmin/service');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/service');
			}
		} else {
			redirect('superadmin/service');
		}
	}

	function update_service()
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
				$service_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$metod = strip_tags($this->input->post('xmetod'));

				$this->m_service->update_service($service_id, $judul, $gambar, $metod);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('superadmin/service');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/service');
			}
		} else {
			$service_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$metod = strip_tags($this->input->post('xmetod'));
			$this->m_service->update_service_tanpa_img($service_id, $judul, $metod);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('superadmin/service');
		}
	}

	function hapus_service()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_service->hapus_service($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('superadmin/service');
	}
}
