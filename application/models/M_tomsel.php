<?php
class M_tomsel extends CI_Model{

    function get_all_tomsel()
    {
		$hsl=$this->db->query("SELECT tomsel_id,tomsel_judul,tomsel_isi,tomsel_gambar,tomsel_alamat,tomsel_hp,tomsel_lurah,tomsel_ket FROM tbl_tomsel ORDER BY tomsel_id ASC");
		return $hsl;
    }
    
    function simpan_tomsel($judul,$isi,$gambar,$alamat,$hp,$lurah,$ket)
    {
		$hsl=$this->db->query("insert into tbl_tomsel(tomsel_judul,tomsel_isi,tomsel_gambar,tomsel_alamat,tomsel_hp,tomsel_lurah,tomsel_ket) values ('$judul','$isi','$gambar','$alamat','$hp','$lurah','$ket')");
		return $hsl;
	}
    function get_tomsel_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tomsel_id,tomsel_judul,tomsel_isi,tomsel_gambar,tomsel_alamat,tomsel_hp,tomsel_lurah,tomsel_ket FROM tbl_tomsel where tomsel_id='$kode'");
		return $hsl;
    }

   	function update_tomsel($tomsel_id, $judul, $isi, $gambar, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_tomsel set tomsel_judul='$judul',tomsel_isi='$isi',tomsel_gambar='$gambar',tomsel_alamat='$alamat',tomsel_hp='$hp',tomsel_lurah='$lurah',tomsel_ket='$ket' where tomsel_id='$tomsel_id'");
		return $hsl;
	}

	function update_tomsel_tanpa_img($tomsel_id, $judul, $isi, $alamat, $hp, $lurah, $ket)
	{
		$hsl = $this->db->query("update tbl_tomsel set tomsel_judul='$judul',tomsel_isi='$isi',tomsel_isi='$isi',tomsel_alamat='$alamat',tomsel_hp='$hp',tomsel_lurah='$lurah',tomsel_ket='$ket' where tomsel_id='$tomsel_id'");
		return $hsl;
	}





    
    function hapus_tomsel($kode)
    {
		$hsl=$this->db->query("delete from tbl_tomsel where tomsel_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_tomsel_slider()
    {
		$hsl=$this->db->query("SELECT tbl_tomsel.*,DATE_FORMAT(tomsel_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomsel where tomsel_img_slider='1' ORDER BY tomsel_id DESC");
		return $hsl;
	}
    function get_tomsel_home()
    {
		$hsl=$this->db->query("SELECT tbl_tomsel.*,DATE_FORMAT(tomsel_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomsel ORDER BY tomsel_id DESC limit 4");
		return $hsl;
	}

    function tomsel_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_tomsel.*,DATE_FORMAT(tomsel_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomsel ORDER BY tomsel_id DESC limit $offset,$limit");
		return $hsl;
	}

    function tomsel()
    {
		$hsl=$this->db->query("SELECT tbl_tomsel.*,DATE_FORMAT(tomsel_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomsel ORDER BY tomsel_id DESC");
		return $hsl;
	}
	// // function get_tomsel_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_tomsel.*,DATE_FORMAT(tomsel_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomsel where tomsel_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_tomsel($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_tomsel.*,DATE_FORMAT(tomsel_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tomsel WHERE tomsel_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_tomsel_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_tomsel_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
