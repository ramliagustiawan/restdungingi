<?php
class Penduduk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_penduduk');
		$this->load->model('m_lapen');
		$this->load->library('mypdf');

		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['data'] = $this->m_penduduk->get_all_penduduk();
		$x['data'] = $this->m_lapen->get_all_lapen();
		$x['bulan'] = $this->db->get('tbl_bulan')->result();

		$x['judul'] = 'Dungingi | Data Penduduk';

		$this->load->view('templates/header', $x);
		$this->load->view('depan/v_penduduk', $x);
		$this->load->view('templates/footer', $x);
	}



	function filter($bulan)
	{

		// $x['judul'] = 'Dungingi | Laporan Penduduk';


		if ($bulan == 0) {
			$data = $this->db->get('tbl_lapen')->result();
		} else {
			$data = $this->db->get_where('tbl_lapen', ['bulan' => $bulan])->result();
		}

		$x['lapen'] = $data;
		$x['bulan'] = $bulan;
		$this->load->view('laporan/result', $x);
	}

	function cetak($bulan)
	{
		if ($bulan == 0) {
			$data = $this->db->get('tbl_lapen')->result();
		} else {
			$data = $this->db->get_where('tbl_lapen', ['bulan' => $bulan])->result();
		}

		$x['lapen'] = $data;
		$this->mypdf->generate('Laporan/v_penduduk', $x, 'Laporan Penduduk', 'F4', 'Landscape');
	}



	function excel()
	{
		$x['data'] = $this->m_penduduk->get_all_penduduk();
		$x['data'] = $this->m_lapen->get_all_lapen();
		$x['judul'] = 'Dungingi | Laporan Penduduk';

		$this->load->view('laporan/excelpenduduk', $x);
	}
}
