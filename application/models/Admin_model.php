<?php

Class Admin_model extends CI_Model {

	public function get_users() {

        $query = $this->db->query("SELECT tbl_user.* from tbl_user ");
        return $query->result_array();
        
	}

}

?>