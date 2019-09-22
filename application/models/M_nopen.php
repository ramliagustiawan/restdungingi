<?php
class M_nopen extends CI_Model{

    function get_all_nopen()
    {
		$hsl=$this->db->query("SELECT nopen_id,nopen_user,nopen_hp,nopen_ket FROM tbl_nopen ORDER BY nopen_id ASC");
		return $hsl;
	}

    function simpan_nopen($user,$hp,$ket)
    {
		$hsl=$this->db->query("insert into tbl_nopen(nopen_user,nopen_hp,nopen_ket) values ('$user','$hp','$ket')");
		return $hsl;
	}
    function get_nopen_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen where nopen_id='$kode'");
		return $hsl;
	}
    function update_nopen($nopen_id,$user,$hp,$ket)
    {
		$hsl=$this->db->query("update tbl_nopen set nopen_user='$user',nopen_hp='$hp',nopen_ket='$ket' where nopen_id='$nopen_id'");
		return $hsl;
	}
    
    function hapus_nopen($kode)
    {
		$hsl=$this->db->query("delete from tbl_nopen where nopen_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_nopen_slider()
    {
		$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen where nopen_img_slider='1' ORDER BY nopen_id DESC");
		return $hsl;
	}
    function get_nopen_home()
    {
		$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen ORDER BY nopen_id DESC limit 4");
		return $hsl;
	}

    function nopen_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen ORDER BY nopen_id DESC limit $offset,$limit");
		return $hsl;
	}

    function nopen()
    {
		$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen ORDER BY nopen_id DESC");
		return $hsl;
	}
	// // function get_nopen_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen where nopen_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_nopen($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_nopen.*,DATE_FORMAT(nopen_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nopen WHERE nopen_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_nopen_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_nopen_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
