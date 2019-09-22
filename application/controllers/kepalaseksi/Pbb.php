<?php
class Pbb extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('m_pbb');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_pbb->get_all_pbb();
		$this->load->view('admin/v_pbb', $x);
	}

	function simpan_pbb()
	{

		$pbbkode = strip_tags($this->input->post('xkode'));
		$kelurahan = strip_tags($this->input->post('xkelurahan'));
		$target = strip_tags($this->input->post('xtarget'));
		$realisasi = strip_tags($this->input->post('xrealisasi'));
		$denda = strip_tags($this->input->post('xdenda'));
		$total = strip_tags($this->input->post('xtotal'));
		$persen = strip_tags($this->input->post('xpersen'));
		$tanggal = strip_tags($this->input->post('xtanggal'));
		$rank = strip_tags($this->input->post('xrank'));
		$this->m_pbb->simpan_pbb($pbbkode, $kelurahan, $target, $realisasi, $denda, $total, $persen, $tanggal, $rank);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('kepalaseksi/pbb');
	}

	function update_pbb()
	{
		$kode = strip_tags($this->input->post('kode'));
		$pbbkode = strip_tags($this->input->post('xkode'));
		$kelurahan = strip_tags($this->input->post('xkelurahan'));
		$target = strip_tags($this->input->post('xtarget'));
		$realisasi = strip_tags($this->input->post('xrealisasi'));
		$denda = strip_tags($this->input->post('xdenda'));
		$total = strip_tags($this->input->post('xtotal'));
		$persen = strip_tags($this->input->post('xpersen'));
		$tanggal = strip_tags($this->input->post('xtanggal'));
		$rank = strip_tags($this->input->post('xrank'));
		$this->m_pbb->update_pbb($kode, $pbbkode, $kelurahan, $target, $realisasi, $denda, $total, $persen, $tanggal, $rank);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('kepalaseksi/pbb');
	}



	function hapus_pbb()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_pbb->hapus_pbb($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('kepalaseksi/pbb');
	}
}
