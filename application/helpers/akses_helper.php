<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('masuk')) {
        redirect('administrator');
    } else {
        $role_id = $ci->session->userdata('akses');
        $menu = $ci->uri->segment(1);


        // query 
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        // var_dump($queryMenu);
        // die;


        $userAccess = $ci->db->get_where(
            'user_access_menu',
            [
                'pengguna_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );


        if ($userAccess->num_rows() < 1) {
            redirect('superadmin/login/blocked');
        }
    }
}

function cek_akses($role_id, $menu_id)
{
    $ci = get_instance();

    $result = $ci->db->get_where(
        'user_access_menu',
        [
            'pengguna_id' => $role_id,
            'menu_id' => $menu_id
        ]
    );

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
