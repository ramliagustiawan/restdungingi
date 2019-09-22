<?php
class M_sotk extends CI_Model{

    function get_all_sotk()
    {
		$hsl=$this->db->query("SELECT sotk_id,sotk_judul,sotk_isi,sotk_gambar FROM tbl_sotk ORDER BY sotk_id ASC");
		return $hsl;
	}

    function simpan_sotk($judul,$isi,$gambar)
    {
		$hsl=$this->db->query("insert into tbl_sotk(sotk_judul,sotk_isi,sotk_gambar ) values ('$judul','$isi','$gambar')");
		return $hsl;
	}
    function get_sotk_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT sotk_id,sotk_judul,sotk_isi,sotk_gambar FROM tbl_sotk where sotk_id='$kode'");
		return $hsl;
	}
    function update_sotk($sotk_id,$judul,$isi,$gambar)
    {
		$hsl=$this->db->query("UPDATE tbl_sotk set sotk_id='$sotk_id',sotk_judul='$judul',sotk_isi='$isi',sotk_gambar='$gambar' where sotk_id='$sotk_id'");
		return $hsl;
	}

	function update_sotk_tanpa_img($sotk_id,$judul,$isi)
    {
		$hsl=$this->db->query("update tbl_sotk set sotk_judul='$judul',sotk_isi='$isi' where sotk_id='$sotk_id'");
		return $hsl;
	}

   
    function hapus_sotk($kode)
    {
		$hsl=$this->db->query("delete from tbl_sotk where sotk_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_sotk_slider()
    {
		$hsl=$this->db->query("SELECT tbl_sotk.*,DATE_FORMAT(sotk_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sotk where sotk_img_slider='1' ORDER BY sotk_id DESC");
		return $hsl;
	}
    function get_sotk_home()
    {
		$hsl=$this->db->query("SELECT tbl_sotk.*,DATE_FORMAT(sotk_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sotk ORDER BY sotk_id DESC limit 4");
		return $hsl;
	}

    function sotk_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_sotk.*,DATE_FORMAT(sotk_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sotk ORDER BY sotk_id DESC limit $offset,$limit");
		return $hsl;
	}

    function sotk()
    {
		$hsl=$this->db->query("SELECT tbl_sotk.*,DATE_FORMAT(sotk_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sotk ORDER BY sotk_id DESC");
		return $hsl;
	}
	// // function get_sotk_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_sotk.*,DATE_FORMAT(sotk_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sotk where sotk_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_sotk($keyword)
    {
		$hsl=$this->db->query("SELECT sotk_id,sotk_judul,sotk_isi,sotk_gambar FROM tbl_sotk WHERE sotk_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
		}
		
    function show_komentar_by_sotk_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_sotk_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
