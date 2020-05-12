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

    //metodo que recupera las imagenes que conforman la galeria
    public function get_fotos(){
        $query = $this->db->query("SELECT tbl_galeria.* from tbl_galeria");
        return $query->result_array();
    }
    
    //metodo que recupera los servicios que ofrece el sitio
    public function get_servicios(){
        $query = $this->db->query("SELECT tbl_servicio.* from tbl_servicio");
        return $query->result_array();
    }

    //metodo que guarda los comentarios que los usuarios le hagan al administrador del sitio
    public function guardar_contacto($nombre,$correo,$comentario){
        $query = $this->db->query("INSERT INTO `tbl_contacto`(`correo`, `nombre`, `descripcion`) VALUES ('$correo','$nombre','$comentario')");
    }
}