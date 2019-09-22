<?php
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_service');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_layanan');
		$this->load->model('m_ektp');
		$this->load->model('m_tunggakan');
		$this->load->model('m_potensi');
		$this->load->model('m_pengunjung');
		$this->load->model('m_slider');
		$this->load->model('m_poll');
		$this->load->model('model_utama');



		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['berita'] = $this->m_tulisan->get_berita_home();
		$x['pengumuman'] = $this->m_pengumuman->get_pengumuman_home();
		$x['agenda'] = $this->m_agenda->get_agenda_home();
		$x['slider'] = $this->m_slider->get_all_slider();
		$x['layanan'] = $this->m_layanan->get_layanan_home();
		$x['tunggakan'] = $this->m_tunggakan->get_tunggakan_home();
		$x['potensi'] = $this->m_potensi->get_potensi_home();
		$x['count'] = $this->m_pengunjung->statistik_pengunjung();
		$x['service'] = $this->m_service->get_service_home();
		$x['poll'] = $this->m_poll->get_all_poll();

		$x['ektp'] = $this->m_ektp->get_ektp_home();
		$x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
		$x['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$x['judul'] = 'Dungingi | Web Resmi Pemerintah Kecamatan Dungingi';


		// tampilkan pada monitor
		$this->load->view('templates/header');
		$this->load->view('depan/v_home', $x);
		$this->load->view('templates/footer');
	}

	function simpan_poll()
	{
		$sbaik = strip_tags($this->input->post('xpoll1'));
		$baik = strip_tags($this->input->post('xpoll2'));
		$cukup = strip_tags($this->input->post('xpoll3'));
		$kurang = strip_tags($this->input->post('xpoll4'));

		$this->m_poll->simpan_poll($sbaik, $baik, $cukup, $kurang);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('home');
	}

	function getData()
	{
		$this->load->model('m_poll');
		$data = $this->m_poll->getJumlah();
		echo json_encode($data);
		// $cek = json_encode($data);
		// print_r($cek);
		// exit();
	}
}
