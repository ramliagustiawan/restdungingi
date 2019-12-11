<?php
class M_ekbang extends CI_Model
{

	function get_all_ekbang()
	{
		$hsl = $this->db->query("SELECT ekbang_id,ekbang_judul,ekbang_dataekbang_id,ekbang_pengguna_id,ekbang_author,ekbang_hbt,ekbang_lib,ekbang_tld,ekbang_tom,ekbang_tomsel,ekbang_total,dataekbang_id,dataekbang_nama FROM tbl_ekbang join tbl_dataekbang on ekbang_dataekbang_id=dataekbang_id ORDER BY ekbang_id ASC");
		return $hsl;
	}
	function simpan_ekbang($judul, $dataekbang, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total)
	{
		$this->db->trans_start();
		$this->db->query("insert into tbl_ekbang(ekbang_judul,ekbang_dataekbang_id,ekbang_pengguna_id,ekbang_author,ekbang_hbt,ekbang_lib,ekbang_tld,ekbang_tom,ekbang_tomsel,ekbang_total) values ('$judul','$dataekbang','$user_id','$user_nama','$hbt','$lib','$tld','$tom','$tomsel','$total')");
		$this->db->query("update tbl_dataekbang set dataekbang_count=dataekbang_count+1 where dataekbang_id='$dataekbang'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	function update_ekbang($ekbang_id, $judul, $dataekbang, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total)
	{
		$hsl = $this->db->query("update tbl_ekbang set ekbang_judul='$judul',ekbang_dataekbang_id='$dataekbang',ekbang_pengguna_id='$user_id',ekbang_author='$user_nama',ekbang_hbt='$hbt',ekbang_lib='$lib',ekbang_tld='$tld',ekbang_tom='$tom',ekbang_tomsel='$tomsel',ekbang_total='$total' where ekbang_id='$ekbang_id'");
		return $hsl;
	}
	function update_ekbang_tanpa_img($ekbang_id, $judul, $dataekbang, $user_id, $user_nama, $hbt, $lib, $tld, $tom, $tomsel, $total)
	{
		$hsl = $this->db->query("update tbl_ekbang set ekbang_judul='$judul',ekbang_dataekbang_id='$dataekbang',ekbang_pengguna_id='$user_id',ekbang_author='$user_nama',ekbang_hbt='$hbt',ekbang_lib='$lib',ekbang_tld='$tld',ekbang_tom='$tom',ekbang_tomsel='$tomsel',ekbang_total='$total'where ekbang_id='$ekbang_id'");
		return $hsl;
	}
	function hapus_ekbang($kode, $dataekbang)
	{
		$this->db->trans_start();
		$this->db->query("delete from tbl_ekbang where ekbang_id='$kode'");
		$this->db->query("update tbl_dataekbang set dataekbang_count=dataekbang_count-1 where dataekbang_id='$dataekbang'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}


	//Front-End
	function get_ekbang_home()
	{
		$hsl = $this->db->query("SELECT tbl_ekbang.*,DATE_FORMAT(ekbang_tanggal,'%d/%m/%Y') AS tanggal,dataekbang_nama FROM tbl_ekbang join tbl_dataekbang on ekbang_dataekbang_id=dataekbang_id ORDER BY ekbang_id DESC limit 4");
		return $hsl;
	}

	function get_ekbang_by_dataekbang_id($iddataekbang)
	{
		$hsl = $this->db->query("SELECT tbl_ekbang.*,DATE_FORMAT(ekbang_tanggal,'%d/%m/%Y') AS tanggal,dataekbang_nama FROM tbl_ekbang join tbl_dataekbang on ekbang_dataekbang_id=dataekbang_id where ekbang_dataekbang_id='$iddataekbang' ORDER BY ekbang_id DESC");
		return $hsl;
	}

	function cari_ekbang($keyword)
	{
		$hsl = $this->db->query("SELECT ekbang_id,ekbang_judul,ekbang_dataekbang_id,ekbang_pengguna_id,ekbang_author,ekbang_hbt,ekbang_lib,ekbang_tld,ekbang_tom,ekbang_tomsel,ekbang_total,dataekbang_id,dataekbang_nama FROM tbl_ekbang join tbl_dataekbang on ekbang_dataekbang_id=dataekbang_id WHERE dataekbang_nama LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function jumlah()
	{

		
		$this->db->select('SUM(ekbang_hbt+ekbang_lib+ekbang_tld) AS ekbang_total');
		$this->db->from('tbl_ekbang');
		return $this->db->get()->row()->ekbang_total; 
	}

}
