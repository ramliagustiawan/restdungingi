<?php
class M_tomin extends CI_Model{

    function get_all_tomin()
    {
		$hsl=$this->db->query("SELECT tomin_id,tomin_judul,tomin_isi,tomin_gambar,tomin_alamat,tomin_hp,tomin_lurah,tomin_ket FROM tbl_tomin ORDER BY tomin_id ASC");
		return $hsl;
    }
    
    function simpan_tomin($judul,$isi,$gambar,$alamat,$hp,$lurah,$ket)
    {
		$hsl=$this->db->query("insert into tbl_tomin(tomin_judul,tomin_isi,tomin_gambar,tomin_alamat,tomin_hp,tomin_lurah,tomin_ket) values ('$judul','$isi','$gambar','$alamat','$hp','$lurah','$ket')");
		return $hsl;
	}
    function get_tomin_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tomin_id,tomin_judul,tomin_isi,tomin_gambar,tomin_alamat,tomin_hp,tomin_lurah,tomin_ket FROM tbl_tomin where tomin_id='$kode'");
		return $hsl;
    }

    	function update_tomin($tomin_id, $judul, $isi, $gambar, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_tomin set tomin_judul='$judul',tomin_isi='$isi',tomin_gambar='$gambar',tomin_alamat='$alamat',tomin_hp='$hp',tomin_lurah='$lurah',tomin_ket='$ket' where tomin_id='$tomin_id'");
		return $hsl;
	}

	function update_tomin_tanpa_img($tomin_id, $judul, $isi, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_tomin set tomin_judul='$judul',tomin_isi='$isi',tomin_isi='$isi',tomin_alamat='$alamat',tomin_hp='$hp',tomin_lurah='$lurah',tomin_ket='$ket' where tomin_id='$tomin_id'");
		return $hsl;
	}




    
    function hapus_tomin($kode)
    {
		$hsl=$this->db->query("delete from tbl_tomin where tomin_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_tomin_slider()
    {
		$hsl=$this->db->query("SELECT tbl_tomin.*,DATE_FORMAT(tomin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomin where tomin_img_slider='1' ORDER BY tomin_id DESC");
		return $hsl;
	}
    function get_tomin_home()
    {
		$hsl=$this->db->query("SELECT tbl_tomin.*,DATE_FORMAT(tomin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomin ORDER BY tomin_id DESC limit 4");
		return $hsl;
	}

    function tomin_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_tomin.*,DATE_FORMAT(tomin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomin ORDER BY tomin_id DESC limit $offset,$limit");
		return $hsl;
	}

    function tomin()
    {
		$hsl=$this->db->query("SELECT tbl_tomin.*,DATE_FORMAT(tomin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomin ORDER BY tomin_id DESC");
		return $hsl;
	}
	// // function get_tomin_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_tomin.*,DATE_FORMAT(tomin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomin where tomin_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_tomin($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_tomin.*,DATE_FORMAT(tomin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomin WHERE tomin_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_tomin_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_tomin_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
