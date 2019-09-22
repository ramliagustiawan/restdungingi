<?php
class M_datapem extends CI_Model{

	function get_all_datapem(){
		$hsl=$this->db->query("SELECT datapem_id,datapem_nama,datapem_author,datapem_pengguna_id,datapem_count FROM tbl_datapem ORDER BY datapem_id DESC");
		return $hsl;
	}
	function simpan_datapem($datapem,$user_id,$user_nama){
		$hsl=$this->db->query("insert into tbl_datapem(datapem_nama,datapem_pengguna_id,datapem_author) values ('$datapem','$user_id','$user_nama')");
		return $hsl;
	}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}
	function update_datapem($datapem_id,$datapem_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_datapem set datapem_nama='$datapem_nama',datapem_pengguna_id='$user_id',datapem_author='$user_nama' where datapem_id='$datapem_id'");
		return $hsl;
	}
	function update_datapem_tanpa_img($datapem_id,$datapem_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_datapem set datapem_nama='$datapem_nama',datapem_pengguna_id='$user_id',datapem_author='$user_nama' where datapem_id='$datapem_id'");
		return $hsl;
	}
	function hapus_datapem($kode){
		$hsl=$this->db->query("delete from tbl_datapem where datapem_id='$kode'");
		return $hsl;
	}
	

}