<?php
class Ektp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_kelurahan');
		$this->load->model('m_ektp');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_ektp->get_all_ektp();
		$x['alb'] = $this->m_kelurahan->get_all_kelurahan();

		$this->load->view('admin/v_ektp', $x);
	}

	function simpan_ektp()
	{

		$data = [

			'ektp_kelurahan_id' => $this->input->post('xkelurahan'),
			'ektp_judul' => $this->input->post('xjudul'),
			'ektp_alamat' => $this->input->post('xalamat'),
			'ektp_ket' => $this->input->post('xket')
		];

		$this->m_ektp->simpan_ektp($data);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/ektp');
	}

	function update_ektp()
	{
		$id = $this->input->post('kode');

		$data = [

			'ektp_kelurahan_id' => $this->input->post('xkelurahan'),
			'ektp_judul' => $this->input->post('xjudul'),
			'ektp_alamat' => $this->input->post('xalamat'),
			'ektp_ket' => $this->input->post('xket')
		];

		$this->m_ektp->update_ektp($data, $id);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/ektp');
	}



	function hapus_ektp()
	{
		$id = $this->input->post('kode');
		$this->m_ektp->hapus_ektp($id);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/ektp');
	}
}
