<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    //metodo que se ejecuta al ingresar a localhost/proyecto1
    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
    {

        $this->form_validation->set_rules('txt_username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('txt_password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) { //Si No se cumple la validación

            $this->load->view('admin/login');
        } else {

            //Si se cumple la validación procedemos a comprobar la autenticación
            $data = array(
                'username' => $this->input->post('txt_username'),
                'password' => $this->input->post('txt_password')
            );

            $result = $this->Auth_model->login($data); //Función login del Modelo Auth

            if ($result == TRUE) { //Si autenticamos

                $username = $this->input->post('txt_username');
                $result = $this->Auth_model->get_user_information($username); //Función read_user_information del Modelo Auth

                //leemos los datos del usuario auntenticado y los ingresamos en las Variables de Sesion
                if ($result != false) {
                    $session_data = array(
                        'logged_in' => TRUE,
                        'nombre' => $result[0]->nombrereal,
                        'foto' => $result[0]->foto,
                    );

                    // Agregamos la infomación del usuario en forma de arreglo a la Variable de Sesion con nombre logged_in
                    $this->session->set_userdata('logged_in', $session_data);
                    //Función propia para cargar la vista indicada con datos precargados
                    redirect('dashboard', 'refresh'); //redireccionamos a la URL del dashboard

                }
            } else { //Si No autenticamos regreamos a la vista Login con un mensaje de error seteado
                $data = array(
                    'error_message' => 'Usuario o Contraseña incorrectos'
                );

                $this->load->view('admin/login', $data);
            }
        }
    }


    //Proceso de Logout 
	public function logout() {

		// Removemos los datos de la sesion
		$sess_array = array(
			'logged_in' => FALSE,
			'username' => '',
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->sess_destroy();
		$data['message_display'] = 'Has cerrado tu sesión de forma exitosa.';
		$this->load->view('admin/login', $data);
	}
}

?>