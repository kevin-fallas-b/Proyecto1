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
            if($this->input->post('goview')==null){
                $_POST['goview'] = 'inicio';
            }
            $data['seccion'] = $this->Sitio_model->get_seccion($this->input->post('goview'))[0];
            $data['secciones'] = $this->getSecciones();
            switch($data['seccion']['tipo']){
                case 2:
                    $data['fotos'] = $this->Sitio_model->get_fotos();
                break;
                case 3:
                    $data['servicios'] = $this->Sitio_model->get_servicios();
                break;
            }
            $this->load->view('layouts/main',$data);
        }

        public function contacto(){
            $this->Sitio_model->guardar_contacto($_POST['nombre'],$_POST['correo'],$_POST['comentario']);
            $_POST['goview'] = 'inicio';
            $this->goView();
        }
    }

?>