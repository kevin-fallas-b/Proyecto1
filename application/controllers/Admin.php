<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Sitio_model');
    }

    public function index()
    {
        if ($this->session->userdata['logged_in']['logged_in'] == TRUE) {
            //usuario autenticado, mostrar dashboard de admin
            $this->load->view('admin/dashboard');
        } else {
            //usuario no autenticado, mandar a pagina de log in
            redirect('admin');
        }
    }

    public function getusers()
    {
        echo json_encode($this->Admin_model->get_users());
    }

    public function crearusuario()
    {
        $this->Admin_model->create_user($this->input->post('nombre'), $this->input->post('correo'), $this->input->post('usuario'), $this->input->post('contra'));
    }

    public function actualizarusuario()
    {
        if (isset($_POST['contra'])) {
            $this->Admin_model->edit_user_changepass($this->input->post('id'), $this->input->post('nombre'), $this->input->post('correo'), $this->input->post('usuario'), $this->input->post('contra'));
        } else {
            $this->Admin_model->edit_user_samepass($this->input->post('id'), $this->input->post('nombre'), $this->input->post('correo'), $this->input->post('usuario'));
        }
    }

    public function getcomentarios()
    {
        echo json_encode($this->Admin_model->get_comments());
    }

    public function subirfoto()
    {
        $config['upload_path']          = './resources/img/users';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000; //10MB
        $config['file_name']           = $this->input->post('enviarid');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('txt_file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            echo $error['error'];
        } else {
            $data = array('upload_data' => $this->upload->data());
            $params = array(
                'photo' => $this->upload->data('file_name'),
            );

            $this->Admin_model->update_photo($this->input->post('enviarid'), $this->upload->data('file_name'));

            //$this->session->set_flashdata('success', "Archivo cargado al sistema exitosamente.");
        }

        $this->session->set_flashdata('tipo', 'Agregar/editar usuarios');
        redirect('dashboard', 'refresh');
    }

    public function getsecciones()
    {
        echo json_encode($this->Admin_model->get_secciones());
    }

    public function getsec()
    {
        $this->input->post('tipo');
        $devolver = json_encode($this->load->view('admin/subsecciones/nueva'));
        switch ($this->input->post('tipo')) {
            case 1:
                echo $devolver;
                break;
            case 2:
                //galeria
                $devolver = $devolver . json_encode($this->load->view('admin/subsecciones/galeria'));
                echo $devolver;
                break;
            case  3:
                //servicios
                $devolver = $devolver . json_encode($this->load->view('admin/subsecciones/servicios'));
                echo $devolver;
                break;
            case 4:
                echo $devolver;
                break;

        }
    }

    public function secnueva()
    {
        $this->Admin_model->set_seccion($this->input->post('titulo'), $this->input->post('detalle'));
    }

    public function eliminarsec()
    {
        $this->Admin_model->delete_seccion($this->input->post('id'));
    }

    public function editarsec()
    {
        $this->Admin_model->update_seccion($this->input->post('id'), $this->input->post('titulo'), $this->input->post('detalle'));
    }

    public function subirbanner()
    {
        $config['upload_path']          = './resources/img/banners';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000; //10MB
        $config['file_name']           = $this->input->post('enviarid');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('txt_file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            echo $error['error'];
        } else {
            $data = array('upload_data' => $this->upload->data());
            $params = array(
                'photo' => $this->upload->data('file_name'),
            );

            $this->Admin_model->update_banner($this->input->post('enviarid'), $this->upload->data('file_name'));

            //$this->session->set_flashdata('success', "Archivo cargado al sistema exitosamente.");
        }

        $this->session->set_flashdata('tipo', 'Editar secciones');
        redirect('dashboard', 'refresh');
    }

    public function getservicios()
    {
        echo json_encode($this->Sitio_model->get_servicios());
    }

    public function setservicio()
    {
        if ($this->input->post('id')) {
            //editar
            $this->Admin_model->update_servicio($this->input->post('id'),$this->input->post('nombre'), $this->input->post('desccorta'), $this->input->post('desc'));
        } else {
            $this->Admin_model->create_servicio($this->input->post('nombre'), $this->input->post('desccorta'), $this->input->post('desc'));
        }
    }

    public function eliminarservicio(){
        $this->Admin_model->delete_servicio($this->input->post('id'));

    }

    public function countimagen(){
        echo json_encode($this->Admin_model->count_imagen()[0]['cantidad']);
    }
}
