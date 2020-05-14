<?php

    Class Admin extends CI_Controller{

        public function __construct() {
            parent::__construct();
        }

        public function index(){
            if($this->session->userdata['logged_in']['logged_in']==TRUE){
                //usuario autenticado, mostrar dashboard de admin
            }else{
                //usuario no autenticado, mandar a pagina de log in
                redirect('admin');
            }
        }
    }
?>