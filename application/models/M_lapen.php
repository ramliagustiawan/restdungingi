<?php
class M_lapen extends CI_Model
{

    function get_all_lapen()
    {
        $hsl = $this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen ORDER BY id ASC");
        return $hsl;
    }
    function simpan_lapen($tanggal, $kelurahan, $lawal, $pawal, $lpawal, $llahir, $plahir, $lplahir, $lmati, $pmati, $lpmati, $ldatang, $pdatang, $lpdatang, $lpindah, $ppindah, $lppindah, $lakhir, $pakhir, $lpakhir)
    {
        $hsl = $this->db->query("INSERT INTO tbl_lapen(tanggal,kelurahan,lawal,pawal,lpawal,llahir,plahir,lplahir,lmati,pmati,lpmati,ldatang,pdatang,lpdatang,lpergi,ppergi,lppergi,lakhir,pakhir,lpakhir) VALUES ('$tanggal', '$kelurahan', '$lawal', '$pawal', '$lpawal','$llahir','$plahir','$lplahir','$lmati', '$pmati', '$lpmati', '$ldatang', '$pdatang', '$lpdatang', '$lpindah', '$ppindah', '$lppindah','$lakhir', '$pakhir', '$lpakhir')");
        return $hsl;
    }

    function get_lapen_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen where id='$kode'");
        return $hsl;
    }
    function update_lapen($kode, $tanggal, $kelurahan, $lawal, $pawal, $lpawal, $llahir, $plahir, $lplahir, $lmati, $pmati, $lpmati, $ldatang, $pdatang, $lpdatang, $lpindah, $ppindah, $lppindah, $lakhir, $pakhir, $lpakhir)
    {
        $hsl = $this->db->query("UPDATE tbl_lapen set tanggal='$tanggal', kelurahan='$kelurahan', lawal= '$lawal', pawal='$pawal', lpawal='$lpawal',llahir='$llahir',plahir='$plahir',lplahir='$lplahir', lmati='$lmati', pmati='$pmati',lpmati= '$lpmati',ldatang='$ldatang',pdatang= '$pdatang', lpdatang='$lpdatang', lpergi='$lpindah', ppergi='$ppindah',lppergi= '$lppindah',lakhir='$lakhir', pakhir='$pakhir', lpakhir='$lpakhir' where id='$kode'");
        return $hsl;
    }
    //   function update_lapen_tanpa_img($lapen_id,$judul,$isi,$tanggal)
    //   {
    // 	$hsl=$this->db->query("update tbl_lapen set lapen_judul='$judul',lapen_isi='$isi',lapen_tanggal='$tanggal' where lapen_id='$lapen_id'");
    // 	return $hsl;
    // }
    function hapus_lapen($kode)
    {
        $hsl = $this->db->query("delete from tbl_lapen where id='$kode'");
        return $hsl;
    }

    //Front-End
    function get_lapen_slider()
    {
        $hsl = $this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen where lapen_img_slider='1' ORDER BY lapen_id DESC");
        return $hsl;
    }
    function get_lapen_home()
    {
        $hsl = $this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen ORDER BY lapen_id DESC limit 4");
        return $hsl;
    }

    function lapen_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen ORDER BY lapen_id DESC limit $offset,$limit");
        return $hsl;
    }

    function lapen()
    {
        $hsl = $this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen ORDER BY lapen_id DESC");
        return $hsl;
    }
    // // function get_lapen_by_kode($kode){
    // // 	$hsl=$this->db->query("SELECT tbl_lapen.*,DATE_FORMAT(lapen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lapen where lapen_id='$kode'");
    // // 	return $hsl;
    // }


}
