<?php
class M_datatrantib extends CI_Model{

	function get_all_datatrantib(){
		$hsl=$this->db->query("SELECT datatrantib_id,datatrantib_nama,datatrantib_author,datatrantib_pengguna_id,datatrantib_count FROM tbl_datatrantib ORDER BY datatrantib_id DESC");
		return $hsl;
	}
	function simpan_datatrantib($datatrantib,$user_id,$user_nama){
		$hsl=$this->db->query("insert into tbl_datatrantib(datatrantib_nama,datatrantib_pengguna_id,datatrantib_author) values ('$datatrantib','$user_id','$user_nama')");
		return $hsl;
	}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}
	function update_datatrantib($datatrantib_id,$datatrantib_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_datatrantib set datatrantib_nama='$datatrantib_nama',datatrantib_pengguna_id='$user_id',datatrantib_author='$user_nama' where datatrantib_id='$datatrantib_id'");
		return $hsl;
	}
	function update_datatrantib_tanpa_img($datatrantib_id,$datatrantib_nama,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_datatrantib set datatrantib_nama='$datatrantib_nama',datatrantib_pengguna_id='$user_id',datatrantib_author='$user_nama' where datatrantib_id='$datatrantib_id'");
		return $hsl;
	}
	function hapus_datatrantib($kode){
		$hsl=$this->db->query("delete from tbl_datatrantib where datatrantib_id='$kode'");
		return $hsl;
	}
	

}