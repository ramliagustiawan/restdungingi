<?php
class M_ektp extends CI_Model
{

	function get_all_ektp($id = null)
	{
		if ($id === null) {
			return $this->db->get('tbl_ektp')->result();
		} else {
			return $this->db->get_where('tbl_ektp', ['ektp_id'  => $id])->result_array();
		}
	}


	// function simpan_ektp($judul, $kelurahan, $alamat, $ket)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->query("insert into tbl_ektp(ektp_judul,ektp_kelurahan_id,ektp_alamat,ektp_ket ) values ('$judul','$kelurahan','$alamat','$ket')");
	// 	$this->db->query("update tbl_kelurahan set kelurahan_nama=kelurahan_nama where kelurahan_id='$kelurahan'");
	// 	$this->db->trans_complete();
	// 	if ($this->db->trans_status() == true)
	// 		return true;
	// 	else
	// 		return false;
	// }

	function simpan_ektp($data)
	{
		$this->db->insert('tbl_ektp', $data);
		return $this->db->affected_rows();
	}

	function update_ektp($data, $id)
	{
		$this->db->update('tbl_ektp', $data, ['ektp_id' => $id]);
		return $this->db->affected_rows();
	}


	// function update_ektp($ektp_id, $judul, $kelurahan, $alamat, $ket)
	// {
	// 	$hsl = $this->db->query("update tbl_ektp set ektp_judul='$judul',ektp_kelurahan_id='$kelurahan',ektp_alamat='$alamat',ektp_ket='$ket' where ektp_id='$ektp_id'");
	// 	return $hsl;
	// }

	function hapus_ektp($id)
	{
		$this->db->delete('tbl_ektp', ['ektp_id' => $id]);
		return $this->db->affected_rows();
	}


	//Front-End
	function get_ektp_home()
	{
		$hsl = $this->db->query("SELECT ektp_id,ektp_judul,ektp_kelurahan_id,ektp_alamat,ektp_ket,kelurahan_id,kelurahan_nama  FROM tbl_ektp join tbl_kelurahan on ektp_kelurahan_id=kelurahan_id ORDER BY ektp_id DESC limit 4");
		return $hsl;
	}

	function get_ektp_by_kelurahan_id($idkelurahan)
	{
		$hsl = $this->db->query("SELECT tbl_ektp.*,DATE_FORMAT(ektp_tanggal,'%d/%m/%Y') AS tanggal,kelurahan_nama FROM tbl_ektp join tbl_kelurahan on ektp_kelurahan_id=kelurahan_id where ektp_kelurahan_id='$idkelurahan' ORDER BY ektp_id DESC");
		return $hsl;
	}

	function cari_ektp($keyword)
	{
		$hsl = $this->db->query("SELECT ektp_id,ektp_judul,ektp_kelurahan_id,ektp_pengguna_id,ektp_author,ektp_hbt,ektp_lib,ektp_tld,ektp_tom,ektp_tomsel,ektp_total,kelurahan_id,kelurahan_nama FROM tbl_ektp join tbl_kelurahan on ektp_kelurahan_id=kelurahan_id WHERE kelurahan_nama LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function alamat()
	{

		$sql = "SELECT  ektp_id, ektp_hbt + ektp_tld + ektp_lib + ektp_tom + ektp_tomsel AS total FROM tbl_ektp";
		$result = $this->db->query($sql);
		return $result->row()->total;

		// $this->db->select("ektp_id,(ektp_hbt)+(ektp_lib)+(ektp_tld)+(ektp_tom)+(ektp_tomsel) as total");
		// $this->db->from("tbl_ektp");
		// return $this->db->get()->row()->total;

		// $sql = "SELECT sum(ektp_hbt) AS ektp_hbt From tbl_ektp";
		// $result = $this->db->query($sql);
		// return $result->row()->ektp_hbt;
	}
}
