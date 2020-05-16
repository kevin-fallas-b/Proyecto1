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

        public function crearusuario(){
            $this->Admin_model->create_user($this->input->post('nombre'),$this->input->post('correo'),$this->input->post('usuario'),$this->input->post('contra'));            
        }

        public function actualizarusuario(){
            if(isset($_POST['contra'])){
                $this->Admin_model->edit_user_changepass($this->input->post('id'),$this->input->post('nombre'),$this->input->post('correo'),$this->input->post('usuario'),$this->input->post('contra'));
            }else{
                $this->Admin_model->edit_user_samepass($this->input->post('id'),$this->input->post('nombre'),$this->input->post('correo'),$this->input->post('usuario'));

            }
        }


        public function getcomentarios(){
            echo json_encode($this->Admin_model->get_comments());
        }


    }
?>