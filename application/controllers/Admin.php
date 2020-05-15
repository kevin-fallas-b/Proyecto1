<?php

    Class Admin extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model');
        }

        public function index(){
            if($this->session->userdata['logged_in']['logged_in']==TRUE){
                //usuario autenticado, mostrar dashboard de admin
                $this->load->view('admin/dashboard');
            }else{
                //usuario no autenticado, mandar a pagina de log in
                redirect('admin');
            }
        }

        public function getusers(){
            echo json_encode($this->Admin_model->get_users());
        }
    }
?>