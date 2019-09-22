<?php
class M_lpm extends CI_Model{

    function get_all_lpm()
    {
		$hsl=$this->db->query("SELECT lpm_id,lpm_nama,lpm_ketua,lpm_alamat,lpm_telepon,lpm_ket FROM tbl_lpm ORDER BY lpm_id ASC");
		return $hsl;
	}

    function simpan_lpm($nama,$ketua,$alamat,$telepon,$ket)
    {
		$hsl=$this->db->query("insert into tbl_lpm(lpm_nama,lpm_ketua,lpm_alamat,lpm_telepon,lpm_ket ) values ('$nama','$ketua','$alamat','$telepon','$ket')");
		return $hsl;
	}
    function get_lpm_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm where lpm_id='$kode'");
		return $hsl;
	}
    function update_lpm($lpm_id,$nama,$ketua,$alamat,$telepon,$ket)
    {
		$hsl=$this->db->query("UPDATE tbl_lpm set lpm_id='$lpm_id',lpm_nama='$nama',lpm_ketua='$ketua',lpm_alamat='$alamat',lpm_telepon='$telepon',lpm_ket='$ket' where lpm_id='$lpm_id'");
		return $hsl;
	}
   
    function hapus_lpm($kode)
    {
		$hsl=$this->db->query("delete from tbl_lpm where lpm_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_lpm_slider()
    {
		$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm where lpm_img_slider='1' ORDER BY lpm_id DESC");
		return $hsl;
	}
    function get_lpm_home()
    {
		$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm ORDER BY lpm_id DESC limit 4");
		return $hsl;
	}

    function lpm_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm ORDER BY lpm_id DESC limit $offset,$limit");
		return $hsl;
	}

    function lpm()
    {
		$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm ORDER BY lpm_id DESC");
		return $hsl;
	}
	// // function get_lpm_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm where lpm_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_lpm($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_lpm.*,DATE_FORMAT(lpm_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_lpm WHERE lpm_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_lpm_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_lpm_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
