<?php
class M_umkm extends CI_Model{

	function get_all_umkm(){
		$hsl=$this->db->query("SELECT tbl_umkm.*,DATE_FORMAT(umkm_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_umkm join tbl_album on umkm_album_id=album_id ORDER BY umkm_id DESC");
		return $hsl;
	}
	function simpan_umkm($judul,$album,$user_id,$user_nama,$gambar){
		$this->db->trans_start();
            $this->db->query("insert into tbl_umkm(umkm_judul,umkm_album_id,umkm_pengguna_id,umkm_author,umkm_gambar) values ('$judul','$album','$user_id','$user_nama','$gambar')");
            $this->db->query("update tbl_album set album_count=album_count+1 where album_id='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_umkm($umkm_id,$judul,$album,$user_id,$user_nama,$gambar){
		$hsl=$this->db->query("update tbl_umkm set umkm_judul='$judul',umkm_album_id='$album',umkm_pengguna_id='$user_id',umkm_author='$user_nama',umkm_gambar='$gambar' where umkm_id='$umkm_id'");
		return $hsl;
	}
	function update_umkm_tanpa_img($umkm_id,$judul,$album,$user_id,$user_nama){
		$hsl=$this->db->query("update tbl_umkm set umkm_judul='$judul',umkm_album_id='$album',umkm_pengguna_id='$user_id',umkm_author='$user_nama' where umkm_id='$umkm_id'");
		return $hsl;
	}
	function hapus_umkm($kode,$album){
		$this->db->trans_start();
            $this->db->query("delete from tbl_umkm where umkm_id='$kode'");
            $this->db->query("update tbl_album set album_count=album_count-1 where album_id='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_umkm_home(){
		$hsl=$this->db->query("SELECT tbl_umkm.*,DATE_FORMAT(umkm_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_umkm join tbl_album on umkm_album_id=album_id ORDER BY umkm_id DESC limit 4");
		return $hsl;
	}

	function get_umkm_by_album_id($idalbum){
		$hsl=$this->db->query("SELECT tbl_umkm.*,DATE_FORMAT(umkm_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_umkm join tbl_album on umkm_album_id=album_id where umkm_album_id='$idalbum' ORDER BY umkm_id DESC");
		return $hsl;
	}
	

}