<?php
class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();


        $this->load->model('m_menu');
        $this->load->library('upload');
    }


    function index()
    {
        $x['data'] = $this->m_menu->get_all_menu();
        $this->load->view('admin/v_menu', $x);
    }

    function simpan_menu()
    {

        $user = strip_tags($this->input->post('menu'));
        $this->m_menu->simpan_menu($user);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('superadmin/menu');
    }

    function update_menu()
    {
        $kode = strip_tags($this->input->post('kode'));
        $user = strip_tags($this->input->post('menu'));
        $this->m_menu->update_menu($kode, $user);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('superadmin/menu');
    }



    function hapus_menu()
    {
        $kode = strip_tags($this->input->post('kode'));
        $this->m_menu->hapus_menu($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('superadmin/menu');
    }

    function submenu()
    {
        $data['user'] = $this->db->get_where('tbl_pengguna', ['pengguna_username' => $this->session->userdata('pengguna_username')])->row_array();

        // load model
        $this->load->model('M_menu', 'menu');

        //title website
        $data['title'] = 'Submenu Management';

        //query data
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        //rules untuk menu management
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');



        if ($this->form_validation->run() == false) {


            $this->load->view('admin/v_submenu', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'pengguna_status' => $this->input->post('pengguna_status')

            ];
            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New Submenu added!
            </div>');
            redirect('superadmin/menu/submenu');
        }
    }
}
