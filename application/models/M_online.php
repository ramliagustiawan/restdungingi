<?php
class M_online extends CI_Model{

	function online($id_saya){
        $query = $this->db->query("SELECT id_session FROM tbl_online WHERE id_session = '".$id_saya."'");
        $query2 = mysql_fetch_array($query);

        if ($query2 == null)
        {
            mysql_query("INSERT INTO tbl_online (id, id_session) VALUES ('', '$id_saya')");
        }


    }
}
