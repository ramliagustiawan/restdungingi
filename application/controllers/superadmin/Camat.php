<?php
class Camat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_camat');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_camat->get_all_camat();
		$this->load->view('admin/v_camat', $x);
	}

	function simpan_camat()
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
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$photo = $gbr['file_name'];
				$nip = strip_tags($this->input->post('xnip'));
				$nama = strip_tags($this->input->post('xnama'));
				$jenkel = strip_tags($this->input->post('xjenkel'));
				$periode = strip_tags($this->input->post('xperiode'));
				$mapel = strip_tags($this->input->post('xmapel'));

				$this->m_camat->simpan_camat($nip, $nama, $jenkel, $periode, $mapel, $photo);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('superadmin/camat');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/camat');
			}
		} else {
			$nip = strip_tags($this->input->post('xnip'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$periode = strip_tags($this->input->post('xperiode'));
			$mapel = strip_tags($this->input->post('xmapel'));

			$this->m_camat->simpan_camat_tanpa_img($nip, $nama, $jenkel, $periode, $mapel);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('superadmin/camat');
		}
	}

	function update_camat()
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
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $this->input->post('gambar');
				$path = './assets/images/' . $gambar;
				unlink($path);

				$photo = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$nip = strip_tags($this->input->post('xnip'));
				$nama = strip_tags($this->input->post('xnama'));
				$jenkel = strip_tags($this->input->post('xjenkel'));
				$periode = strip_tags($this->input->post('xperiode'));
				$mapel = strip_tags($this->input->post('xmapel'));

				$this->m_camat->update_camat($kode, $nip, $nama, $jenkel, $periode, $mapel, $photo);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('superadmin/camat');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/camat');
			}
		} else {
			$kode = $this->input->post('kode');
			$nip = strip_tags($this->input->post('xnip'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$periode = strip_tags($this->input->post('xperiode'));
			$mapel = strip_tags($this->input->post('xmapel'));
			$this->m_camat->update_camat_tanpa_img($kode, $nip, $nama, $jenkel, $periode, $mapel);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('superadmin/camat');
		}
	}

	function hapus_camat()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_camat->hapus_camat($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('superadmin/camat');
	}
}
