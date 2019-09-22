<?php
class M_nonijin extends CI_Model{

    function get_all_nonijin()
    {
		$hsl=$this->db->query("SELECT nonijin_id,nonijin_judul,nonijin_isi,nonijin_ket FROM tbl_nonijin ORDER BY nonijin_id ASC");
		return $hsl;
	}

    function simpan_nonijin($judul,$isi,$ket)
    {
		$hsl=$this->db->query("insert into tbl_nonijin(nonijin_judul,nonijin_isi,nonijin_ket ) values ('$judul','$isi','$ket')");
		return $hsl;
	}
    function get_nonijin_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT nonijin_id,nonijin_judul,nonijin_isi,nonijin_ket FROM tbl_nonijin where nonijin_id='$kode'");
		return $hsl;
	}
    function update_nonijin($nonijin_id,$judul,$isi,$ket)
    {
		$hsl=$this->db->query("UPDATE tbl_nonijin set nonijin_id='$nonijin_id',nonijin_judul='$judul',nonijin_isi='$isi',nonijin_ket='$ket' where nonijin_id='$nonijin_id'");
		return $hsl;
	}
   
    function hapus_nonijin($kode)
    {
		$hsl=$this->db->query("delete from tbl_nonijin where nonijin_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_nonijin_slider()
    {
		$hsl=$this->db->query("SELECT tbl_nonijin.*,DATE_FORMAT(nonijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nonijin where nonijin_img_slider='1' ORDER BY nonijin_id DESC");
		return $hsl;
	}
    function get_nonijin_home()
    {
		$hsl=$this->db->query("SELECT tbl_nonijin.*,DATE_FORMAT(nonijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nonijin ORDER BY nonijin_id DESC limit 4");
		return $hsl;
	}

    function nonijin_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_nonijin.*,DATE_FORMAT(nonijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nonijin ORDER BY nonijin_id DESC limit $offset,$limit");
		return $hsl;
	}

    function nonijin()
    {
		$hsl=$this->db->query("SELECT tbl_nonijin.*,DATE_FORMAT(nonijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nonijin ORDER BY nonijin_id DESC");
		return $hsl;
	}
	// // function get_nonijin_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_nonijin.*,DATE_FORMAT(nonijin_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_nonijin where nonijin_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_nonijin($keyword)
    {
		$hsl=$this->db->query("SELECT nonijin_id,nonijin_judul,nonijin_isi,nonijin_ket FROM tbl_nonijin WHERE nonijin_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
		}
		
    function show_komentar_by_nonijin_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_nonijin_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
