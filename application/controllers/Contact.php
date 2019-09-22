<?php
class Contact extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_kontak');
    $this->load->model('m_pengunjung');
    $this->m_pengunjung->count_visitor();
  }
  function index()
  {
    $x['judul'] = 'Dungingi | Pengaduan';

    $this->load->view('templates/header');
    $this->load->view('depan/v_contact', $x);
    $this->load->view('templates/footer');
  }

  function kirim_pesan()
  {
    $nama = htmlspecialchars($this->input->post('xnama', TRUE), ENT_QUOTES);
    $email = htmlspecialchars($this->input->post('xemail', TRUE), ENT_QUOTES);
    $kontak = htmlspecialchars($this->input->post('xphone', TRUE), ENT_QUOTES);
    $pesan = htmlspecialchars($this->input->post('xmessage', TRUE), ENT_QUOTES);
    $inbox_tl = htmlspecialchars($this->input->post('xtl'), ENT_QUOTES);
    $this->m_kontak->kirim_pesan($nama, $email, $kontak, $pesan, $inbox_tl);
    echo $this->session->set_flashdata('msg', '<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
    redirect('contact');
  }
}
