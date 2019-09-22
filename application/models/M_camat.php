<?php 
class M_camat extends CI_Model{

	function get_all_camat(){
		$hsl=$this->db->query("SELECT * FROM tbl_camat");
		return $hsl;

		// return $this->db->get('tbl_camat')->result_array();
	}

	function simpan_camat($nip,$nama,$jenkel,$periode,$mapel,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_camat (camat_nip,camat_nama,camat_jenkel,camat_periode,camat_mapel,camat_photo) VALUES ('$nip','$nama','$jenkel','$periode','$mapel','$photo')");
		return $hsl;
	}
	function simpan_camat_tanpa_img($nip,$nama,$jenkel,$periode,$mapel){
		$hsl=$this->db->query("INSERT INTO tbl_camat (camat_nip,camat_nama,camat_jenkel,camat_periode,camat_mapel) VALUES ('$nip','$nama','$jenkel','$periode','$mapel')");
		return $hsl;
	}

	function update_camat($kode,$nip,$nama,$jenkel,$periode,$mapel,$photo){
		$hsl=$this->db->query("UPDATE tbl_camat SET camat_nip='$nip',camat_nama='$nama',camat_jenkel='$jenkel',camat_periode='$periode',camat_mapel='$mapel',camat_photo='$photo' WHERE camat_id='$kode'");
		return $hsl;
	}
	function update_camat_tanpa_img($kode,$nip,$nama,$jenkel,$periode,$mapel){
		$hsl=$this->db->query("UPDATE tbl_camat SET camat_nip='$nip',camat_nama='$nama',camat_jenkel='$jenkel',camat_periode='$periode',camat_mapel='$mapel' WHERE camat_id='$kode'");
		return $hsl;
	}
	function hapus_camat($kode){
		$hsl=$this->db->query("DELETE FROM tbl_camat WHERE camat_id='$kode'");
		return $hsl;

		// $this->db->where('id', $id);
        // $this->db->delete('tbl_camat');


	}

	//front-end
	function camat(){
		$hsl=$this->db->query("SELECT * FROM tbl_camat");
		return $hsl;
	}
	function camat_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_camat limit $offset,$limit");
		return $hsl;
	}

}