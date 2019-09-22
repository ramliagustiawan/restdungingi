<?php
class M_menu extends CI_Model
{

    function get_all_menu()
    {
        $hsl = $this->db->query("SELECT id,menu FROM user_menu ORDER BY id DESC");
        return $hsl;
    }

    function simpan_menu($user)
    {
        $hsl = $this->db->query("insert into user_menu(menu) values ('$user')");
        return $hsl;
    }
    function get_menu_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT user_menu.*,DATE_FORMAT(menu_tanggal,'%d/%m/%Y') AS tanggal FROM user_menu where id='$kode'");
        return $hsl;
    }
    function update_menu($kode, $user)
    {
        $hsl = $this->db->query("update user_menu set menu='$user' where id='$kode'");
        return $hsl;
    }

    function hapus_menu($kode)
    {
        $hsl = $this->db->query("delete from user_menu where id='$kode'");
        return $hsl;
    }

    // batas sub menu

    function get_all_submenu()
    {
        $hsl = $this->db->query("SELECT id,menu_id,title,url,icon,pengguna_status FROM user_sub_menu ORDER BY id ASC");
        return $hsl;
    }

    function simpan_submenu($menu, $judul, $url, $icon, $status)
    {
        $hsl = $this->db->query("insert into user_sub_menu(menu_id,title,url,icon,pengguna_status) values ('$menu'$judul','$url','$icon','$status')");
        return $hsl;
    }
    function get_submenu_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT user_sub_menu.*,DATE_FORMAT(submenu_tanggal,'%d/%m/%Y') AS tanggal FROM user_sub_menu where id='$kode'");
        return $hsl;
    }
    function update_submenu($kode, $menu, $judul, $url, $icon, $status)
    {
        $hsl = $this->db->query("update user_sub_menu set menu_id='$menu',$judul, $url, $icon, $status where id='$kode'");
        return $hsl;
    }

    function hapus_submenu($kode)
    {
        $hsl = $this->db->query("delete from user_submenu where id='$kode'");
        return $hsl;
    }

    function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
}
