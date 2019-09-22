<?php
class M_service extends CI_Model{

	function get_all_service(){
		$hsl=$this->db->query("SELECT service_id,service_judul,service_gambar,service_metod FROM tbl_service  ORDER BY service_id ASC");
		return $hsl;
	}
	
    
	function simpan_service($judul,$gambar,$metod){
		
            $hsl = $this->db->query("insert into tbl_service(service_judul,service_gambar,service_metod) values ('$judul','$gambar','$metod')");
            return $hsl;
    }
    
	function get_service_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT service_id,service_judul,service_gambar,service_metod FROM tbl_service  where service_id='$kode'");
		return $hsl;
	}
	
	function update_service($service_id,$judul,$gambar,$metod){
		$hsl=$this->db->query("update tbl_service set service_judul='$judul',service_gambar='$gambar',service_metod='$metod' where service_id='$service_id'");
		return $hsl;
	}
	
	function update_service_tanpa_img($service_id,$judul,$metod){
		$hsl=$this->db->query("update tbl_service set service_judul='$judul',service_metod='$metod'where service_id='$service_id'");
		return $hsl;
	}
	function hapus_service($kode){
		$hsl=$this->db->query("delete from tbl_service where service_id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_service_home(){
		$hsl=$this->db->query("SELECT service_id,service_judul,service_metod,service_gambar FROM tbl_service  ORDER BY service_id ASC limit 6");
		return $hsl;
	}

	
	

}