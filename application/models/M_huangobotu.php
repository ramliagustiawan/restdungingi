<?php
class M_huangobotu extends CI_Model
{

	function get_all_huangobotu()
	{
		$hsl = $this->db->query("SELECT huangobotu_id,huangobotu_judul,huangobotu_isi,huangobotu_gambar,huangobotu_alamat,huangobotu_hp,huangobotu_lurah,huangobotu_ket FROM tbl_huangobotu ORDER BY huangobotu_id ASC");
		return $hsl;
	}

	function simpan_huangobotu($judul, $isi, $gambar, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("insert into tbl_huangobotu(huangobotu_judul,huangobotu_isi,huangobotu_gambar,huangobotu_alamat,huangobotu_hp,huangobotu_lurah,huangobotu_ket) values ('$judul','$isi','$gambar','$alamat','$hp','$lurah','$ket')");
		return $hsl;
	}
	function get_huangobotu_by_kode($kode)
	{
		$hsl = $this->db->query("SELECT huangobotu_id,huangobotu_judul,huangobotu_isi,huangobotu_gambar,huangobotu_alamat,huangobotu_hp,huangobotu_lurah,huangobotu_ket FROM tbl_huangobotu where huangobotu_id='$kode'");
		return $hsl;
	}

	function update_huangobotu($huangobotu_id, $judul, $isi, $gambar, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_huangobotu set huangobotu_judul='$judul',huangobotu_isi='$isi',huangobotu_gambar='$gambar',huangobotu_alamat='$alamat',huangobotu_hp='$hp',huangobotu_lurah='$lurah',huangobotu_ket='$ket' where huangobotu_id='$huangobotu_id'");
		return $hsl;
	}

	function update_huangobotu_tanpa_img($huangobotu_id, $judul, $isi, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_huangobotu set huangobotu_judul='$judul',huangobotu_isi='$isi',huangobotu_isi='$isi',huangobotu_alamat='$alamat',huangobotu_hp='$hp',huangobotu_lurah='$lurah',huangobotu_ket='$ket' where huangobotu_id='$huangobotu_id'");
		return $hsl;
	}

	function hapus_huangobotu($kode)
	{
		$hsl = $this->db->query("delete from tbl_huangobotu where huangobotu_id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_huangobotu_slider()
	{
		$hsl = $this->db->query("SELECT tbl_huangobotu.*,DATE_FORMAT(huangobotu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_huangobotu where huangobotu_img_slider='1' ORDER BY huangobotu_id DESC");
		return $hsl;
	}
	function get_huangobotu_home()
	{
		$hsl = $this->db->query("SELECT tbl_huangobotu.*,DATE_FORMAT(huangobotu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_huangobotu ORDER BY huangobotu_id DESC limit 4");
		return $hsl;
	}

	function huangobotu_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT tbl_huangobotu.*,DATE_FORMAT(huangobotu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_huangobotu ORDER BY huangobotu_id DESC limit $offset,$limit");
		return $hsl;
	}

	function huangobotu()
	{
		$hsl = $this->db->query("SELECT tbl_huangobotu.*,DATE_FORMAT(huangobotu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_huangobotu ORDER BY huangobotu_id DESC");
		return $hsl;
	}
	// // function get_huangobotu_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_huangobotu.*,DATE_FORMAT(huangobotu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_huangobotu where huangobotu_id='$kode'");
	// // 	return $hsl;
	// }

	function cari_huangobotu($keyword)
	{
		$hsl = $this->db->query("SELECT tbl_huangobotu.*,DATE_FORMAT(huangobotu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_huangobotu WHERE huangobotu_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function show_komentar_by_huangobotu_id($kode)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_komentar WHERE komentar_huangobotu_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}
}
