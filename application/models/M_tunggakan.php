<?php
class M_tunggakan extends CI_Model{

	function get_all_tunggakan(){
		$hsl=$this->db->query("SELECT tunggakan_id,tunggakan_judul,tunggakan_kelurahan_id,tunggakan_jumlah,tunggakan_tahun,tunggakan_ket,kelurahan_id,kelurahan_nama FROM tbl_tunggakan join tbl_kelurahan on tunggakan_kelurahan_id=kelurahan_id ORDER BY tunggakan_id ASC");
		return $hsl;
	}
	function simpan_tunggakan($judul,$kelurahan,$jumlah,$tahun,$ket){
		$this->db->trans_start();
            $this->db->query("insert into tbl_tunggakan(tunggakan_judul,tunggakan_kelurahan_id,tunggakan_jumlah,tunggakan_tahun,tunggakan_ket ) values ('$judul','$kelurahan','$jumlah','$tahun','$ket')");
            $this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_tunggakan($tunggakan_id,$judul,$kelurahan,$jumlah,$tahun,$ket){
		$hsl=$this->db->query("update tbl_tunggakan set tunggakan_judul='$judul',tunggakan_kelurahan_id='$kelurahan',tunggakan_jumlah='$jumlah',tunggakan_tahun='$tahun',tunggakan_ket='$ket' where tunggakan_id='$tunggakan_id'");
		return $hsl;
	}
	
	function hapus_tunggakan($kode,$kelurahan){
		$this->db->trans_start();
            $this->db->query("delete from tbl_tunggakan where tunggakan_id='$kode'");
            $this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	

	//Front-End
	function get_tunggakan_home(){
		$hsl=$this->db->query("SELECT tunggakan_id,tunggakan_judul,tunggakan_kelurahan_id,tunggakan_jumlah,tunggakan_tahun,tunggakan_ket,kelurahan_id,kelurahan_nama FROM tbl_tunggakan join tbl_kelurahan on tunggakan_kelurahan_id=kelurahan_id ORDER BY tunggakan_id DESC limit 4");
		return $hsl;
	}

	function get_tunggakan_by_kelurahan_id($idkelurahan){
		$hsl=$this->db->query("SELECT tbl_tunggakan.*,DATE_FORMAT(tunggakan_tanggal,'%d/%m/%Y') AS tanggal,kelurahan_nama FROM tbl_tunggakan join tbl_kelurahan on tunggakan_kelurahan_id=kelurahan_id where tunggakan_kelurahan_id='$idkelurahan' ORDER BY tunggakan_id DESC");
		return $hsl;
	}
	
	function cari_tunggakan($keyword)
    {
		$hsl=$this->db->query("SELECT tunggakan_id,tunggakan_judul,tunggakan_kelurahan_id,tunggakan_pengguna_id,tunggakan_author,tunggakan_hbt,tunggakan_lib,tunggakan_tld,tunggakan_tom,tunggakan_tomsel,tunggakan_total,kelurahan_id,kelurahan_nama FROM tbl_tunggakan join tbl_kelurahan on tunggakan_kelurahan_id=kelurahan_id WHERE kelurahan_nama LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	 function jumlah()
     {

		$sql = "SELECT  tunggakan_id, tunggakan_hbt + tunggakan_tld + tunggakan_lib + tunggakan_tom + tunggakan_tomsel AS total FROM tbl_tunggakan";
		$result = $this->db->query($sql);
		return $result->row()->total;

		// $this->db->select("tunggakan_id,(tunggakan_hbt)+(tunggakan_lib)+(tunggakan_tld)+(tunggakan_tom)+(tunggakan_tomsel) as total");
		// $this->db->from("tbl_tunggakan");
		// return $this->db->get()->row()->total;

		// $sql = "SELECT sum(tunggakan_hbt) AS tunggakan_hbt From tbl_tunggakan";
		// $result = $this->db->query($sql);
		// return $result->row()->tunggakan_hbt;
	 }


}

