<?php

Class Sitio_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	public function get_secciones(){
        $query = $this->db->query("SELECT tbl_seccion.nombre from tbl_seccion");
        return $query->result_array();
    }

}