<?php
class M_layanan extends CI_Model{

	function get_all_layanan(){
		$hsl=$this->db->query("SELECT tbl_layanan.*,DATE_FORMAT(layanan_tanggal,'%d/%m/%Y') AS tanggal,kelurahan_nama FROM tbl_layanan join tbl_kelurahan on layanan_kelurahan_id=kelurahan_id ORDER BY layanan_id DESC");
		return $hsl;
	}
	function simpan_layanan($judul,$pemohon,$tanggal,$kelurahan,$ket){
		$this->db->trans_start();
            $this->db->query("insert into tbl_layanan(layanan_judul,layanan_pemohon,layanan_tanggal,layanan_kelurahan_id,layanan_ket) values ('$judul','$pemohon','$tanggal','$kelurahan','$ket')");
            $this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_layanan($kode,$judul,$pemohon,$tanggal,$kelurahan,$ket){
		$hsl=$this->db->query("update tbl_layanan set layanan_judul='$judul', layanan_pemohon='$pemohon',layanan_tanggal='$tanggal',layanan_kelurahan_id='$kelurahan',layanan_ket='$ket' where layanan_id='$kode'");
		return $hsl;
	}
	
	function hapus_layanan($kode,$kelurahan){
		$this->db->trans_start();
            $this->db->query("delete from tbl_layanan where layanan_id='$kode'");
            $this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_layanan_home(){
		$hsl=$this->db->query("SELECT tbl_layanan.*,DATE_FORMAT(layanan_tanggal,'%d/%m/%Y') AS tanggal,kelurahan_nama FROM tbl_layanan join tbl_kelurahan on layanan_kelurahan_id=kelurahan_id ORDER BY layanan_id DESC limit 4");
		return $hsl;
	}

	function get_layanan_by_kelurahan_id($idkelurahan){
		$hsl=$this->db->query("SELECT tbl_layanan.*,DATE_FORMAT(layanan_tanggal,'%d/%m/%Y') AS tanggal,kelurahan_nama FROM tbl_layanan join tbl_kelurahan on layanan_kelurahan_id=kelurahan_id where layanan_kelurahan_id='$idkelurahan' ORDER BY layanan_id DESC");
		return $hsl;
	}
	

}