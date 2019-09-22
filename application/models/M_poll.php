<?php
class M_poll extends CI_Model
{

    function get_all_poll()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_poll ORDER BY Sbaik ");
        return $hsl;
    }

    function getJumlah()
    {
        $sql = "SELECT SUM(Sbaik) as total1, SUM(baik) as total2, SUM(cukup) as total3, SUM(kurang) as total4 from tbl_poll ";
        return $this->db->query($sql)->result();
    }


    function simpan_poll($sbaik, $baik, $cukup, $kurang)
    {
        $hsl = $this->db->query("INSERT INTO tbl_poll (sbaik,baik,cukup,kurang) VALUES ('$sbaik', '$baik', '$cukup', '$kurang')");
        return $hsl;
    }
}
