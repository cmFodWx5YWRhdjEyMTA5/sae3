<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){redirect(base_url('/'));}
		$this->load->helper('form');
		$this->load->library('form_validation');
    }

	public function index(){
		//Segun el tipo de usuario mostramos o dirijimos al panel adecuado
		echo $this->session->userdata('nombre');
		if($this->session->userdata('tipo') == 0){
			redirect(base_url('panel/user'));
		}else{
			if(valid_token()==TRUE){
				redirect(base_url('site/'));
			}else{
				redirect(base_url('panel/tokensms'));
			}
			
		}
	}

	public function tokensms(){
		if(valid_token()==TRUE){
			redirect(base_url('site/'));
		}
		$token 		= 	rand ( 111111,999999 );
		$newdata = array('token' => $token, );
		$this->session->set_userdata($newdata);
		$to = $this->session->userdata('celular');
		$data = array(
			'to' => '502'.$to,
			'text' => 'Su token de acceso para SAE 3.0 es: '.$token.'. No lo comparta con nadie. ' );
		sendsms($data);
		$this->load->view('login/hlogin');
		$this->load->view('login/token',$newdata);
		$this->load->view('login/plogin');
	}

	public function tokenemail(){
		if(valid_token()){
			redirect(base_url('site/'));
		}
		
		$token 		= 	rand ( 111111,999999 );
		$newdata = array('token' => $token, );
		$this->session->set_userdata($newdata);
		$to = $this->session->userdata('celular');
		$data 		= 	array(
			'to' => $to,
			'text' => 'Su token de acceso para SAE 3.0 es: '.$token.'. No lo comparta con nadie. ' );
		
			$correo = $this->session->userdata('correo');

			$msg = $data['text'];
			$info = array(
				'title' => 'Token de Acceso' ,
				'accion' => $msg,
				'head' => '',
				'pie' => 'Este token se envía por defecto a '.$data['to'].', si esté ya no es su número de teléfono, actualícelo en su perfil.'
			);
			$msg = $this->load->view('email/email_general', $info, true);
			$data = array("asunto" => 'Token de Acceso',"msg" => $msg, "correo" => $correo );
	        send_email($data);
	        $html = array('token' => $token , );

		$this->load->view('login/hlogin');
		$this->load->view('login/token',$html);
		$this->load->view('login/plogin');
	}

	public function validar_token(){
		if(valid_token()){
			redirect(base_url('site/'));
		}
		$tokens = $this->session->userdata('token');
		$this->form_validation->set_rules('token', 'Token', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			redirect(base_url('panel/tokensms'));
		}else{
			$token = $this->input->post('token');
			if($tokens == $token){
				$newdata = array('valid_token' => true, );
				$this->session->set_userdata($newdata);
				redirect(base_url('site/'));
			}else{
				redirect(base_url('panel/tokensms'));
			}

		}

	}



}