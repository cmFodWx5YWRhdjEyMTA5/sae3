<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(is_logged_in()){redirect(base_url('/panel/'));}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('login_model');
    }

	public function index(){
		$this->load->view('login/hlogin');
		$this->load->view('login/login');
		$this->load->view('login/plogin');
	}

	public function recovery(){
		$this->load->view('login/hlogin');
		$this->load->view('login/recovery');
		$this->load->view('login/plogin');
	}

	public function login(){
		$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = array('error_message' => 'Código y Contraseña son necesarios');		
			$this->load->view('login/hlogin');
			$this->load->view('login/login',$data);
			$this->load->view('login/plogin');
		}else{
			//Los campos no estan vacios, verificamos en la base de datos
			$data = array(
				'codigo' => $this->input->post('codigo'),
				'password' => $this->input->post('password')
			);
			$id = $this->login_model->login($data);
			if($id == 0){
				$data = array('error_message' => 'Código o Contraseña incorrectas');		
				$this->load->view('login/hlogin');
				$this->load->view('login/login',$data);
				$this->load->view('login/plogin');
			}else{
				$datos = $this->login_model->login_data($id)->result()[0];
				$newdata = array(
			        'codigo'  	=> $datos->codigo,
			        'nombre'    => $datos->nombre,
			        'apellido'  => $datos->apellido,
			        'tipo'  => $datos->tipo,
			        'estado'  => $datos->estado,
			        'logged_in' => TRUE,
			        'correo' => $datos->correo,
			        'celular' => $datos->celular,
			        'valid_token' => FALSE
				);
				$this->session->set_userdata($newdata);
				if(is_logged_in()){redirect(base_url('/panel/'));}
			}
		}
	}


	public function send(){
		$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = array('error_message' => 'Código y Correo son necesarios','tipo' => 'danger');		
			$this->load->view('login/hlogin');
			$this->load->view('login/recovery',$data);
			$this->load->view('login/plogin');
		}else{
			//Los campos no estan vacios, verificamos en la base de datos
			$codigo = $this->input->post('codigo');
			$correo = $this->input->post('correo');
			$id = $this->login_model->recovery_verifica($codigo);
			if($id == 0){
				$data = array('error_message' => 'Código no valido','tipo' => 'danger');		
				$this->load->view('login/hlogin');
				$this->load->view('login/recovery',$data);
				$this->load->view('login/plogin');
			}else{
				$datos = $this->login_model->login_data($id)->result()[0];
				$msg = 'Código: '.$datos->codigo.' <br />Contraseña: '.base64_decode($datos->password). '<br /> ';

				$info = array(
					'title' => 'Recuperar Contraseña' ,
					'accion' => $msg,
					'head' => 'Se ha recibido una solitud de recuperación de contraseña, sus datos de acceso son: <br />',
					'pie' => 'Guarde este correo para futuras consultas.'
				);
				$msg = $this->load->view('email/email_general', $info, true);
				$data = array("asunto" => 'Recuperación de Contraseña',"msg" => $msg, "correo" => $correo );
		        if(send_email($data)){
		            $data = array('error_message' => '¡Correo enviado! Puede que deba esperar unos minutos antes de que reciba el correo.', 'tipo' => 'success');
		        }else{
		            $data = array('error_message' => 'No fue posible enviar el correo, por favor intente de nuevo.', 'tipo' => 'danger');
		        }

				$this->load->view('login/hlogin');
				$this->load->view('login/recovery',$data);
				$this->load->view('login/plogin');

			}
		}
	}



}
