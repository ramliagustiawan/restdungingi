<?php
class M_datakesra extends CI_Model{

	function get_all_datakesra(){
		$hsl=$this->db->query("SELECT datakesra_id,datakesra_nama,datakesra_author,datakesra_pengguna_id,datakesra_count FROM tbl_datakesra ORDER BY datakesra_id DESC");
		return $hsl;
	}
	function simpan_datakesra($datakesra,$user_id,$user_nama){
		$hsl=$this->db->query("insert into tbl_datakesra(datakesra_nama,datakesra_pengguna_id,datakesra_author) values ('$datakesra','$user_id','$user_nama')");
		return $hsl;
	}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}
	function update_datakesra($datakesra_id,$datakesra_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_datakesra set datakesra_nama='$datakesra_nama',datakesra_pengguna_id='$user_id',datakesra_author='$user_nama' where datakesra_id='$datakesra_id'");
		return $hsl;
	}
	function update_datakesra_tanpa_img($datakesra_id,$datakesra_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_datakesra set datakesra_nama='$datakesra_nama',datakesra_pengguna_id='$user_id',datakesra_author='$user_nama' where datakesra_id='$datakesra_id'");
		return $hsl;
	}
	function hapus_datakesra($kode){
		$hsl=$this->db->query("delete from tbl_datakesra where datakesra_id='$kode'");
		return $hsl;
	}
	

}