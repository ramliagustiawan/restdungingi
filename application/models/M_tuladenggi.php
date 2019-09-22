<?php
class M_tuladenggi extends CI_Model{

    function get_all_tld()
    {
		$hsl=$this->db->query("SELECT tld_id,tld_judul,tld_isi,tld_gambar,tld_alamat,tld_hp,tld_lurah,tld_ket FROM tbl_tld ORDER BY tld_id ASC");
		return $hsl;
    }
    
    function simpan_tld($judul,$isi,$gambar,$alamat,$hp,$lurah,$ket)
    {
		$hsl=$this->db->query("insert into tbl_tld(tld_judul,tld_isi,tld_gambar,tld_alamat,tld_hp,tld_lurah,tld_ket) values ('$judul','$isi','$gambar','$alamat','$hp','$lurah','$ket')");
		return $hsl;
	}
    function get_tld_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tld_id,tld_judul,tld_isi,tld_gambar,tld_alamat,tld_hp,tld_lurah,tld_ket FROM tbl_tld where tld_id='$kode'");
		return $hsl;
    }

    	function update_tld($tld_id, $judul, $isi, $gambar, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_tld set tld_judul='$judul',tld_isi='$isi',tld_gambar='$gambar',tld_alamat='$alamat',tld_hp='$hp',tld_lurah='$lurah',tld_ket='$ket' where tld_id='$tld_id'");
		return $hsl;
	}

	function update_tld_tanpa_img($tld_id, $judul, $isi, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_tld set tld_judul='$judul',tld_isi='$isi',tld_isi='$isi',tld_alamat='$alamat',tld_hp='$hp',tld_lurah='$lurah',tld_ket='$ket' where tld_id='$tld_id'");
		return $hsl;
	}



    
    function hapus_tld($kode)
    {
		$hsl=$this->db->query("delete from tbl_tld where tld_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_tld_slider()
    {
		$hsl=$this->db->query("SELECT tbl_tld.*,DATE_FORMAT(tld_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tld where tld_img_slider='1' ORDER BY tld_id DESC");
		return $hsl;
	}
    function get_tld_home()
    {
		$hsl=$this->db->query("SELECT tbl_tld.*,DATE_FORMAT(tld_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tld ORDER BY tld_id DESC limit 4");
		return $hsl;
	}

    function tld_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_tld.*,DATE_FORMAT(tld_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tld ORDER BY tld_id DESC limit $offset,$limit");
		return $hsl;
	}

    function tld()
    {
		$hsl=$this->db->query("SELECT tbl_tld.*,DATE_FORMAT(tld_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tld ORDER BY tld_id DESC");
		return $hsl;
	}
	// // function get_tld_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_tld.*,DATE_FORMAT(tld_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tld where tld_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_tld($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_tld.*,DATE_FORMAT(tld_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tld WHERE tld_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_tld_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_tld_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
