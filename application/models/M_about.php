<?php
class M_about extends CI_Model{

    function get_all_sejarah()
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah ORDER BY sejarah_id DESC");
		return $hsl;
	}
    function simpan_sejarah($judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("insert into tbl_sejarah(sejarah_judul,sejarah_isi,sejarah_gambar,sejarah_tanggal) values ('$judul','$isi','$gambar','$tanggal')");
		return $hsl;
	}
    function get_sejarah_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah where sejarah_id='$kode'");
		return $hsl;
	}
    function update_sejarah($sejarah_id,$judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("update tbl_sejarah set sejarah_judul='$judul',sejarah_isi='$isi',sejarah_gambar='$gambar',sejarah_tanggal='$tanggal' where sejarah_id='$sejarah_id'");
		return $hsl;
	}
    function update_sejarah_tanpa_img($sejarah_id,$judul,$isi,$tanggal)
    {
		$hsl=$this->db->query("update tbl_sejarah set sejarah_judul='$judul',sejarah_isi='$isi',sejarah_tanggal='$tanggal' where sejarah_id='$sejarah_id'");
		return $hsl;
	}
    function hapus_sejarah($kode)
    {
		$hsl=$this->db->query("delete from tbl_sejarah where sejarah_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_sejarah_slider()
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah where sejarah_img_slider='1' ORDER BY sejarah_id DESC");
		return $hsl;
	}
    function get_sejarah_home()
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah ORDER BY sejarah_id DESC limit 4");
		return $hsl;
	}

    function sejarah_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah ORDER BY sejarah_id DESC limit $offset,$limit");
		return $hsl;
	}

    function sejarah()
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah ORDER BY sejarah_id DESC");
		return $hsl;
	}
	// // function get_sejarah_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah where sejarah_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_sejarah($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(sejarah_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah WHERE sejarah_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_sejarah_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_sejarah_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
