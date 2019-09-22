<?php
class M_potensi extends CI_Model{

	function get_all_potensi(){
		$hsl=$this->db->query("SELECT potensi_id,potensi_judul,potensi_kelurahan_id,potensi_ket,potensi_gambar,kelurahan_nama FROM tbl_potensi join tbl_kelurahan on potensi_kelurahan_id=kelurahan_id ORDER BY potensi_id ASC");
		return $hsl;
	}
	
    
	function simpan_potensi($judul,$kelurahan,$ket,$gambar){
		$this->db->trans_start();
            $this->db->query("insert into tbl_potensi(potensi_judul,potensi_kelurahan_id,potensi_ket,potensi_gambar) values ('$judul','$kelurahan','$ket','$gambar')");
            $this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	function get_potensi_by_kode($kode)
    {
		$hsl=$this->db->query("SELECT potensi_id,potensi_judul,potensi_kelurahan_id,potensi_ket,potensi_gambar,kelurahan_nama FROM tbl_potensi join tbl_kelurahan on potensi_kelurahan_id=kelurahan_id where potensi_id='$kode'");
		return $hsl;
	}
	
	function update_potensi($potensi_id,$judul,$kelurahan,$ket,$gambar){
		$hsl=$this->db->query("update tbl_potensi set potensi_judul='$judul',potensi_kelurahan_id='$kelurahan',potensi_ket='$ket',potensi_gambar='$gambar' where potensi_id='$potensi_id'");
		return $hsl;
	}
	
	function update_potensi_tanpa_img($potensi_id,$judul,$kelurahan,$ket){
		$hsl=$this->db->query("update tbl_potensi set potensi_judul='$judul',potensi_kelurahan_id='$kelurahan',potensi_ket='$ket' where potensi_id='$potensi_id'");
		return $hsl;
	}
	function hapus_potensi($kode,$kelurahan){
		$this->db->trans_start();
            $this->db->query("delete from tbl_potensi where potensi_id='$kode'");
            $this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_potensi_home(){
		$hsl=$this->db->query("SELECT potensi_id,potensi_judul,potensi_kelurahan_id,potensi_ket,potensi_gambar,kelurahan_nama FROM tbl_potensi join tbl_kelurahan on potensi_kelurahan_id=kelurahan_id ORDER BY potensi_id DESC limit 4");
		return $hsl;
	}

	function get_potensi_by_kelurahan_id($idkelurahan){
		$hsl=$this->db->query("SELECT potensi_id,potensi_judul,potensi_kelurahan_id,potensi_ket,potensi_gambar,kelurahan_nama FROM tbl_potensi join tbl_kelurahan on potensi_kelurahan_id=kelurahan_id where potensi_kelurahan_id='$idkelurahan' ORDER BY potensi_id DESC");
		return $hsl;
	}
	

}