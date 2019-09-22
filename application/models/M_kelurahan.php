<?php
class M_kelurahan extends CI_Model
{

	function get_all_kelurahan()
	{
		$hsl = $this->db->query("SELECT kelurahan_id,kelurahan_nama FROM tbl_kelurahan ORDER BY kelurahan_id ASC");
		return $hsl;

		// return $this->db->get('tbl_kelurahan')->result();
	}
}
