<?php
class M_peta extends CI_Model{

    function get_all_peta()
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta ORDER BY peta_id DESC");
		return $hsl;
	}
    function simpan_peta($judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("insert into tbl_peta(peta_judul,peta_isi,peta_gambar,peta_tanggal) values ('$judul','$isi','$gambar','$tanggal')");
		return $hsl;
	}
    function get_peta_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta where peta_id='$kode'");
		return $hsl;
	}
    function update_peta($peta_id,$judul,$isi,$gambar,$tanggal)
    {
		$hsl=$this->db->query("update tbl_peta set peta_judul='$judul',peta_isi='$isi',peta_gambar='$gambar',peta_tanggal='$tanggal' where peta_id='$peta_id'");
		return $hsl;
	}
    function update_peta_tanpa_img($peta_id,$judul,$isi,$tanggal)
    {
		$hsl=$this->db->query("update tbl_peta set peta_judul='$judul',peta_isi='$isi',peta_tanggal='$tanggal' where peta_id='$peta_id'");
		return $hsl;
	}
    function hapus_peta($kode)
    {
		$hsl=$this->db->query("delete from tbl_peta where peta_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_peta_slider()
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta where peta_img_slider='1' ORDER BY peta_id DESC");
		return $hsl;
	}
    function get_peta_home()
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta ORDER BY peta_id DESC limit 4");
		return $hsl;
	}

    function peta_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta ORDER BY peta_id DESC limit $offset,$limit");
		return $hsl;
	}

    function peta()
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta ORDER BY peta_id DESC");
		return $hsl;
	}
	// // function get_peta_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta where peta_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_peta($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_peta.*,DATE_FORMAT(peta_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_peta WHERE peta_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_peta_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_peta_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
