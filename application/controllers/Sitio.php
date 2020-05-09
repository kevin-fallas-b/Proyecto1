<?php

    Class Sitio extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('Sitio_model');
        }

        //metodo que se ejecuta al ingresar a localhost/proyecto1
        public function index() {
            $this->load->view('layout/main');
        }


        public function getSecciones(){
            return $this->Sitio_model->get_secciones();
        }

        public function goView($nombreseccion){
            $seccion = $this->Sitio_model->get_seccion($nombreseccion);
            array_push($seccion, $this->getSecciones());
            $this->load->view('layout/main',$seccion);
        }
    }

?>