<?php
class M_trantib extends CI_Model{

	function get_all_trantib(){
		$hsl=$this->db->query("SELECT trantib_id,trantib_judul,trantib_datatrantib_id,trantib_pengguna_id,trantib_author,trantib_hbt,trantib_lib,trantib_tld,trantib_tom,trantib_tomsel,trantib_total,datatrantib_id,datatrantib_nama FROM tbl_trantib join tbl_datatrantib on trantib_datatrantib_id=datatrantib_id ORDER BY trantib_id ASC");
		return $hsl;
	}
	function simpan_trantib($judul,$datatrantib,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$this->db->trans_start();
            $this->db->query("insert into tbl_trantib(trantib_judul,trantib_datatrantib_id,trantib_pengguna_id,trantib_author,trantib_hbt,trantib_lib,trantib_tld,trantib_tom,trantib_tomsel,trantib_total) values ('$judul','$datatrantib','$user_id','$user_nama','$hbt','$lib','$tld','$tom','$tomsel','$total')");
            $this->db->query("update tbl_datatrantib set datatrantib_count=datatrantib_count+1 where datatrantib_id='$datatrantib'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_trantib($trantib_id,$judul,$datatrantib,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$hsl=$this->db->query("update tbl_trantib set trantib_judul='$judul',trantib_datatrantib_id='$datatrantib',trantib_pengguna_id='$user_id',trantib_author='$user_nama',trantib_hbt='$hbt',trantib_lib='$lib',trantib_tld='$tld',trantib_tom='$tom',trantib_tomsel='$tomsel',trantib_total='$total' where trantib_id='$trantib_id'");
		return $hsl;
	}
	function update_trantib_tanpa_img($trantib_id,$judul,$datatrantib,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$hsl=$this->db->query("update tbl_trantib set trantib_judul='$judul',trantib_datatrantib_id='$datatrantib',trantib_pengguna_id='$user_id',trantib_author='$user_nama',trantib_hbt='$hbt',trantib_lib='$lib',trantib_tld='$tld',trantib_tom='$tom',trantib_tomsel='$tomsel',trantib_total='$total'where trantib_id='$trantib_id'");
		return $hsl;
	}
	function hapus_trantib($kode,$datatrantib){
		$this->db->trans_start();
            $this->db->query("delete from tbl_trantib where trantib_id='$kode'");
            $this->db->query("update tbl_datatrantib set datatrantib_count=datatrantib_count-1 where datatrantib_id='$datatrantib'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	

	//Front-End
	function get_trantib_home(){
		$hsl=$this->db->query("SELECT tbl_trantib.*,DATE_FORMAT(trantib_tanggal,'%d/%m/%Y') AS tanggal,datatrantib_nama FROM tbl_trantib join tbl_datatrantib on trantib_datatrantib_id=datatrantib_id ORDER BY trantib_id DESC limit 4");
		return $hsl;
	}

	function get_trantib_by_datatrantib_id($iddatatrantib){
		$hsl=$this->db->query("SELECT tbl_trantib.*,DATE_FORMAT(trantib_tanggal,'%d/%m/%Y') AS tanggal,datatrantib_nama FROM tbl_trantib join tbl_datatrantib on trantib_datatrantib_id=datatrantib_id where trantib_datatrantib_id='$iddatatrantib' ORDER BY trantib_id DESC");
		return $hsl;
	}
	
	function cari_trantib($keyword)
    {
		$hsl=$this->db->query("SELECT trantib_id,trantib_judul,trantib_datatrantib_id,trantib_pengguna_id,trantib_author,trantib_hbt,trantib_lib,trantib_tld,trantib_tom,trantib_tomsel,trantib_total,datatrantib_id,datatrantib_nama FROM tbl_trantib join tbl_datatrantib on trantib_datatrantib_id=datatrantib_id WHERE datatrantib_nama LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	 function jumlah()
     {
		$this->db->select('SUM(trantib_hbt+trantib_lib+trantib_tld) AS trantib_total');
		$this->db->from('tbl_trantib');
		return $this->db->get()->row()->trantib_total; 
	 }


}

