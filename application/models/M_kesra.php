<?php
class M_kesra extends CI_Model{

	function get_all_kesra(){
		$hsl=$this->db->query("SELECT kesra_id,kesra_judul,kesra_datakesra_id,kesra_pengguna_id,kesra_author,kesra_hbt,kesra_lib,kesra_tld,kesra_tom,kesra_tomsel,kesra_total,datakesra_id,datakesra_nama FROM tbl_kesra join tbl_datakesra on kesra_datakesra_id=datakesra_id ORDER BY kesra_id ASC");
		return $hsl;
	}
	function simpan_kesra($judul,$datakesra,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$this->db->trans_start();
            $this->db->query("insert into tbl_kesra(kesra_judul,kesra_datakesra_id,kesra_pengguna_id,kesra_author,kesra_hbt,kesra_lib,kesra_tld,kesra_tom,kesra_tomsel,kesra_total) values ('$judul','$datakesra','$user_id','$user_nama','$hbt','$lib','$tld','$tom','$tomsel','$total')");
            $this->db->query("update tbl_datakesra set datakesra_count=datakesra_count+1 where datakesra_id='$datakesra'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_kesra($kesra_id,$judul,$datakesra,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$hsl=$this->db->query("update tbl_kesra set kesra_judul='$judul',kesra_datakesra_id='$datakesra',kesra_pengguna_id='$user_id',kesra_author='$user_nama',kesra_hbt='$hbt',kesra_lib='$lib',kesra_tld='$tld',kesra_tom='$tom',kesra_tomsel='$tomsel',kesra_total='$total' where kesra_id='$kesra_id'");
		return $hsl;
	}
	function update_kesra_tanpa_img($kesra_id,$judul,$datakesra,$user_id,$user_nama,$hbt,$lib,$tld,$tom,$tomsel,$total){
		$hsl=$this->db->query("update tbl_kesra set kesra_judul='$judul',kesra_datakesra_id='$datakesra',kesra_pengguna_id='$user_id',kesra_author='$user_nama',kesra_hbt='$hbt',kesra_lib='$lib',kesra_tld='$tld',kesra_tom='$tom',kesra_tomsel='$tomsel',kesra_total='$total'where kesra_id='$kesra_id'");
		return $hsl;
	}
	function hapus_kesra($kode,$datakesra){
		$this->db->trans_start();
            $this->db->query("delete from tbl_kesra where kesra_id='$kode'");
            $this->db->query("update tbl_datakesra set datakesra_count=datakesra_count-1 where datakesra_id='$datakesra'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	

	//Front-End
	function get_kesra_home(){
		$hsl=$this->db->query("SELECT tbl_kesra.*,DATE_FORMAT(kesra_tanggal,'%d/%m/%Y') AS tanggal,datakesra_nama FROM tbl_kesra join tbl_datakesra on kesra_datakesra_id=datakesra_id ORDER BY kesra_id DESC limit 4");
		return $hsl;
	}

	function get_kesra_by_datakesra_id($iddatakesra){
		$hsl=$this->db->query("SELECT tbl_kesra.*,DATE_FORMAT(kesra_tanggal,'%d/%m/%Y') AS tanggal,datakesra_nama FROM tbl_kesra join tbl_datakesra on kesra_datakesra_id=datakesra_id where kesra_datakesra_id='$iddatakesra' ORDER BY kesra_id DESC");
		return $hsl;
	}
	
	function cari_kesra($keyword)
    {
		$hsl=$this->db->query("SELECT kesra_id,kesra_judul,kesra_datakesra_id,kesra_pengguna_id,kesra_author,kesra_hbt,kesra_lib,kesra_tld,kesra_tom,kesra_tomsel,kesra_total,datakesra_id,datakesra_nama FROM tbl_kesra join tbl_datakesra on kesra_datakesra_id=datakesra_id WHERE datakesra_nama LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	 function jumlah()
     {
		$this->db->select('SUM(kesra_hbt+kesra_lib+kesra_tld) AS kesra_total');
		$this->db->from('tbl_kesra');
		return $this->db->get()->row()->kesra_total; 
	 }


}

