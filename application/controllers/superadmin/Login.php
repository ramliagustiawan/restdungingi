<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    function index()
    {
        $this->load->view('admin/v_login');
    }
    function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username')));
        $password = strip_tags(str_replace("'", "", $this->input->post('password')));
        $u = $username;
        $p = $password;
        $cadmin = $this->m_login->cekadmin($u, $p);

        echo json_encode($cadmin);
        if ($cadmin->num_rows() > 0) {
            $this->session->set_userdata('masuk', true);
            $this->session->set_userdata('user', $u);
            $xcadmin = $cadmin->row_array();
            if ($xcadmin['pengguna_level'] == '1') {
                $this->session->set_userdata('akses', '1');
                $idadmin = $xcadmin['pengguna_id'];
                $user_nama = $xcadmin['pengguna_nama'];
                $this->session->set_userdata('idadmin', $idadmin);
                $this->session->set_userdata('nama', $user_nama);
                redirect('superadmin/dashboard');
            } elseif ($xcadmin['pengguna_level'] == '2') {
                $this->session->set_userdata('akses', '2');
                $idadmin = $xcadmin['pengguna_id'];
                $user_nama = $xcadmin['pengguna_nama'];
                $this->session->set_userdata('idadmin', $idadmin);
                $this->session->set_userdata('nama', $user_nama);
                redirect('adminkantor/dashmember');
            } elseif ($xcadmin['pengguna_level'] == '3') {
                $this->session->set_userdata('akses', '3');
                $idadmin = $xcadmin['pengguna_id'];
                $user_nama = $xcadmin['pengguna_nama'];
                $this->session->set_userdata('idadmin', $idadmin);
                $this->session->set_userdata('nama', $user_nama);
                redirect('kepalaseksi/dashseksi');
            }
        } else {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
            redirect('superadmin/login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function blocked()
    {
        $this->load->view('admin/blocked');
    }

    function role()
    {
        $data['user'] = $this->db->get_where('tbl_pengguna', ['pengguna_username' => $this->session->userdata('pengguna_username')])->row_array();

        //title website
        $data['title'] = 'Role';

        //query data
        $data['role'] = $this->db->get('user_role')->result_array();


        $this->load->view('admin/v_role', $data);
    }

    function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('tbl_pengguna', ['pengguna_username' => $this->session->userdata('pengguna_username')])->row_array();
        //title website
        $data['title'] = 'Role Access';

        //query data
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        //query tdk menanmpilkan admin
        $this->db->where('id !=', 1);
        //query semua menu
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('admin/v_role-access', $data);
    }

    function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data =
            [
                'pengguna_id' => $role_id,
                'menu_id' => $menu_id
            ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Access Changed!
        </div>'
        );
    }
}
