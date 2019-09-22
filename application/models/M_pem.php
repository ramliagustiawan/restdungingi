<?php
class M_pem extends CI_Model{

	function get_all_pem(){
		$hsl=$this->db->query("SELECT pem_id,pem_judul,pem_datapem_id,pem_pengguna_id,pem_author,pem_hbt,pem_lib,pem_tld,pem_tom,pem_tomsel,pem_total,datapem_id,datapem_nama FROM tbl_pem join tbl_datapem on pem_datapem_id=datapem_id ORDER BY pem_id ASC");
		return $hsl;
	}
	function simpan_pem($judul,$datapem,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$this->db->trans_start();
            $this->db->query("insert into tbl_pem(pem_judul,pem_datapem_id,pem_pengguna_id,pem_author,pem_hbt,pem_lib,pem_tld,pem_tom,pem_tomsel,pem_total) values ('$judul','$datapem','$user_id','$user_nama','$hbt','$lib','$tld','$tom','$tomsel','$total')");
            $this->db->query("update tbl_datapem set datapem_count=datapem_count+1 where datapem_id='$datapem'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_pem($pem_id,$judul,$datapem,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$hsl=$this->db->query("update tbl_pem set pem_judul='$judul',pem_datapem_id='$datapem',pem_pengguna_id='$user_id',pem_author='$user_nama',pem_hbt='$hbt',pem_lib='$lib',pem_tld='$tld',pem_tom='$tom',pem_tomsel='$tomsel',pem_total='$total' where pem_id='$pem_id'");
		return $hsl;
	}
	function update_pem_tanpa_img($pem_id,$judul,$datapem,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$hsl=$this->db->query("update tbl_pem set pem_judul='$judul',pem_datapem_id='$datapem',pem_pengguna_id='$user_id',pem_author='$user_nama',pem_hbt='$hbt',pem_lib='$lib',pem_tld='$tld',pem_tom='$tom',pem_tomsel='$tomsel',pem_total='$total'where pem_id='$pem_id'");
		return $hsl;
	}
	function hapus_pem($kode,$datapem){
		$this->db->trans_start();
            $this->db->query("delete from tbl_pem where pem_id='$kode'");
            $this->db->query("update tbl_datapem set datapem_count=datapem_count-1 where datapem_id='$datapem'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	

	//Front-End
	function get_pem_home(){
		$hsl=$this->db->query("SELECT tbl_pem.*,DATE_FORMAT(pem_tanggal,'%d/%m/%Y') AS tanggal,datapem_nama FROM tbl_pem join tbl_datapem on pem_datapem_id=datapem_id ORDER BY pem_id DESC limit 4");
		return $hsl;
	}

	function get_pem_by_datapem_id($iddatapem){
		$hsl=$this->db->query("SELECT tbl_pem.*,DATE_FORMAT(pem_tanggal,'%d/%m/%Y') AS tanggal,datapem_nama FROM tbl_pem join tbl_datapem on pem_datapem_id=datapem_id where pem_datapem_id='$iddatapem' ORDER BY pem_id DESC");
		return $hsl;
	}
	
	function cari_pem($keyword)
    {
		$hsl=$this->db->query("SELECT pem_id,pem_judul,pem_datapem_id,pem_pengguna_id,pem_author,pem_hbt,pem_lib,pem_tld,pem_tom,pem_tomsel,pem_total,datapem_id,datapem_nama FROM tbl_pem join tbl_datapem on pem_datapem_id=datapem_id WHERE datapem_nama LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	 function jumlah()
     {
		$this->db->select('SUM(pem_hbt+pem_lib+pem_tld) AS pem_total');
		$this->db->from('tbl_pem');
		return $this->db->get()->row()->pem_total; 
	 }


}

