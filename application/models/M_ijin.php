<?php
class M_ijin extends CI_Model{

    function get_all_ijin()
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin ORDER BY ijin_id ASC");
		return $hsl;
	}
    function simpan_ijin($judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("insert into tbl_ijin(ijin_judul,ijin_isi,ijin_gambar,ijin_tanggal) values ('$judul','$isi','$gambar','$tanggal')");
		return $hsl;
	}
    function get_ijin_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin where ijin_id='$kode'");
		return $hsl;
	}
    function update_ijin($ijin_id,$judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("update tbl_ijin set ijin_judul='$judul',ijin_isi='$isi',ijin_gambar='$gambar',ijin_tanggal='$tanggal' where ijin_id='$ijin_id'");
		return $hsl;
	}
    function update_ijin_tanpa_img($ijin_id,$judul,$isi,$tanggal)
    {
		$hsl=$this->db->query("update tbl_ijin set ijin_judul='$judul',ijin_isi='$isi',ijin_tanggal='$tanggal' where ijin_id='$ijin_id'");
		return $hsl;
	}
    function hapus_ijin($kode)
    {
		$hsl=$this->db->query("delete from tbl_ijin where ijin_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_ijin_slider()
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin where ijin_img_slider='1' ORDER BY ijin_id DESC");
		return $hsl;
	}
    function get_ijin_home()
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin ORDER BY ijin_id DESC limit 4");
		return $hsl;
	}

    function ijin_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin ORDER BY ijin_id DESC limit $offset,$limit");
		return $hsl;
	}

    function ijin()
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin ORDER BY ijin_id DESC");
		return $hsl;
	}
	// // function get_ijin_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin where ijin_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_ijin($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_ijin.*,DATE_FORMAT(ijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_ijin WHERE ijin_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_ijin_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_ijin_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
