<?php
class M_pbb extends CI_Model{

    function get_all_pbb()
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb ORDER BY pbb_id ASC");
		return $hsl;
	}
    function simpan_pbb($pbbkode,$kelurahan,$target,$realisasi,$denda,$total,$persen,$tanggal,$rank)
    {
		$hsl=$this->db->query("INSERT INTO tbl_pbb(pbb_kode,pbb_kelurahan,pbb_target,pbb_realisasi,pbb_denda,pbb_total,pbb_persen,pbb_tanggal,pbb_rank) VALUES ('$pbbkode','$kelurahan','$target','$realisasi','$denda','$total','$persen','$tanggal','$rank')");
		return $hsl;
	}

    function get_pbb_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb where pbb_id='$kode'");
		return $hsl;
	}
    function update_pbb($kode,$pbbkode,$kelurahan,$target,$realisasi,$denda,$total,$persen,$tanggal,$rank)
    {
		$hsl=$this->db->query("UPDATE tbl_pbb set pbb_kode='$pbbkode',pbb_kelurahan='$kelurahan',pbb_target='$target',pbb_realisasi='$realisasi',pbb_denda='$denda',pbb_total='$total',pbb_persen='$persen',pbb_tanggal='$tanggal',pbb_rank='$rank' where pbb_id='$kode'");
		return $hsl;
	}
  //   function update_pbb_tanpa_img($pbb_id,$judul,$isi,$tanggal)
  //   {
	// 	$hsl=$this->db->query("update tbl_pbb set pbb_judul='$judul',pbb_isi='$isi',pbb_tanggal='$tanggal' where pbb_id='$pbb_id'");
	// 	return $hsl;
	// }
    function hapus_pbb($kode)
    {
		$hsl=$this->db->query("delete from tbl_pbb where pbb_id='$kode'");
		return $hsl;
	}

	//Front-End
    function get_pbb_slider()
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb where pbb_img_slider='1' ORDER BY pbb_id DESC");
		return $hsl;
	}
    function get_pbb_home()
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb ORDER BY pbb_id DESC limit 4");
		return $hsl;
	}

    function pbb_perpage($offset,$limit)
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb ORDER BY pbb_id DESC limit $offset,$limit");
		return $hsl;
	}

    function pbb()
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb ORDER BY pbb_id DESC");
		return $hsl;
	}
	// // function get_pbb_by_kode($kode){
	// // 	$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb where pbb_id='$kode'");
	// // 	return $hsl;
	// }

    function cari_pbb($keyword)
    {
		$hsl=$this->db->query("SELECT tbl_pbb.*,DATE_FORMAT(pbb_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pbb WHERE pbb_judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

    function show_komentar_by_pbb_id($kode)
    {
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_pbb_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
