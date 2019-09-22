<?php
class M_visi extends CI_Model{

    function get_all_visi()
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi ORDER BY visi_id ASC");
		return $hsl;
	}
    function simpan_visi($judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("insert into tbl_visi(visi_judul,visi_isi,visi_gambar,visi_tanggal) values ('$judul','$isi','$gambar','$tanggal')");
		return $hsl;
	}
    function get_visi_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi where visi_id='$kode'");
		return $hsl;
	}
    function update_visi($visi_id,$judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("update tbl_visi set visi_judul='$judul',visi_isi='$isi',visi_gambar='$gambar',visi_tanggal='$tanggal' where visi_id='$visi_id'");
		return $hsl;
	}
    function update_visi_tanpa_img($visi_id,$judul,$isi,$tanggal)
    {
		$hsl=$this->db->query("update tbl_visi set visi_judul='$judul',visi_isi='$isi',visi_tanggal='$tanggal' where visi_id='$visi_id'");
		return $hsl;
	}
    function hapus_visi($kode)
    {
		$hsl=$this->db->query("delete from tbl_visi where visi_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_visi_slider()
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi where visi_img_slider='1' ORDER BY visi_id DESC");
		return $hsl;
	}
    function get_visi_home()
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi ORDER BY visi_id DESC limit 4");
		return $hsl;
	}

    function visi_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi ORDER BY visi_id DESC limit $offset,$limit");
		return $hsl;
	}

    function visi()
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi ORDER BY visi_id DESC");
		return $hsl;
	}
	// // function get_visi_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi where visi_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_visi($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_visi.*,DATE_FORMAT(visi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi WHERE visi_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_visi_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_visi_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
