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

    public function get_seccion($nombreseccion){
        $query = $this->db->query("SELECT tbl_seccion.* from tbl_seccion WHERE tbl_seccion.nombre = '$nombreseccion'");
        return $query->result_array();
    }

}