<?php
class M_libuo extends CI_Model{

    function get_all_libuo()
    {
		$hsl=$this->db->query("SELECT libuo_id,libuo_judul,libuo_isi,libuo_gambar,libuo_alamat,libuo_hp,libuo_lurah,libuo_ket FROM tbl_libuo ORDER BY libuo_id ASC");
		return $hsl;
    }
    
    function simpan_libuo($judul,$isi,$gambar,$alamat,$hp,$lurah,$ket)
    {
		$hsl=$this->db->query("insert into tbl_libuo(libuo_judul,libuo_isi,libuo_gambar,libuo_alamat,libuo_hp,libuo_lurah,libuo_ket) values ('$judul','$isi','$gambar','$alamat','$hp','$lurah','$ket')");
		return $hsl;
	}
    function get_libuo_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT libuo_id,libuo_judul,libuo_isi,libuo_gambar,libuo_alamat,libuo_hp,libuo_lurah,libuo_ket FROM tbl_libuo where libuo_id='$kode'");
		return $hsl;
    }

    function update_libuo($libuo_id,$judul,$isi,$gambar,$alamat,$hp,$lurah,$ket)
    {
		$hsl=$this->db->query("update tbl_libuo set libuo_judul='$judul',libuo_isi='$isi',libuo_gambar='$gambar',libuo_alamat='$alamat',libuo_hp='$hp',libuo_lurah='$lurah',libuo_ket='$ket' where libuo_id='$libuo_id'");
		return $hsl;
	}

	function update_libuo_tanpa_img($libuo_id,$judul,$isi,$alamat,$hp,$lurah,$ket)
	{
	$hsl=$this->db->query("update tbl_libuo set libuo_judul='$judul',libuo_isi='$isi',libuo_isi='$isi',libuo_alamat='$alamat',libuo_hp='$hp',libuo_lurah='$lurah',libuo_ket='$ket' where libuo_id='$libuo_id'");
	return $hsl;
}
  
    function hapus_libuo($kode)
    {
		$hsl=$this->db->query("delete from tbl_libuo where libuo_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_libuo_slider()
    {
		$hsl=$this->db->query("SELECT tbl_libuo.*,DATE_FORMAT(libuo_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_libuo where libuo_img_slider='1' ORDER BY libuo_id DESC");
		return $hsl;
	}
    function get_libuo_home()
    {
		$hsl=$this->db->query("SELECT tbl_libuo.*,DATE_FORMAT(libuo_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_libuo ORDER BY libuo_id DESC limit 4");
		return $hsl;
	}

    function libuo_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_libuo.*,DATE_FORMAT(libuo_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_libuo ORDER BY libuo_id DESC limit $offset,$limit");
		return $hsl;
	}

    function libuo()
    {
		$hsl=$this->db->query("SELECT tbl_libuo.*,DATE_FORMAT(libuo_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_libuo ORDER BY libuo_id DESC");
		return $hsl;
	}
	// // function get_libuo_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_libuo.*,DATE_FORMAT(libuo_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_libuo where libuo_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_libuo($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_libuo.*,DATE_FORMAT(libuo_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_libuo WHERE libuo_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_libuo_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_libuo_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
