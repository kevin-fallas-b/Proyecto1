<?php

    Class Sitio extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('Sitio_model');
        }

        //metodo que se ejecuta al ingresar a localhost/proyecto1
        public function index() {
            $_POST['goview'] = 'inicio';
            $this->goView();
        }


        public function getSecciones(){
            return $this->Sitio_model->get_secciones();
        }

        public function goView(){
            $data['seccion'] = $this->Sitio_model->get_seccion($this->input->post('goview'))[0];
            $data['secciones'] = $this->getSecciones();
            $this->load->view('layouts/main',$data);
        }

        
    }

?>