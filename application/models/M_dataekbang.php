<?php
class M_dataekbang extends CI_Model{

	function get_all_dataekbang(){
		$hsl=$this->db->query("SELECT dataekbang_id,dataekbang_nama,dataekbang_author,dataekbang_pengguna_id,dataekbang_count FROM tbl_dataekbang ORDER BY dataekbang_id DESC");
		return $hsl;
	}
	function simpan_dataekbang($dataekbang,$user_id,$user_nama){
		$hsl=$this->db->query("insert into tbl_dataekbang(dataekbang_nama,dataekbang_pengguna_id,dataekbang_author) values ('$dataekbang','$user_id','$user_nama')");
		return $hsl;
	}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}
	function update_dataekbang($dataekbang_id,$dataekbang_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_dataekbang set dataekbang_nama='$dataekbang_nama',dataekbang_pengguna_id='$user_id',dataekbang_author='$user_nama' where dataekbang_id='$dataekbang_id'");
		return $hsl;
	}
	function update_dataekbang_tanpa_img($dataekbang_id,$dataekbang_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_dataekbang set dataekbang_nama='$dataekbang_nama',dataekbang_pengguna_id='$user_id',dataekbang_author='$user_nama' where dataekbang_id='$dataekbang_id'");
		return $hsl;
	}
	function hapus_dataekbang($kode){
		$hsl=$this->db->query("delete from tbl_dataekbang where dataekbang_id='$kode'");
		return $hsl;
	}
	

}