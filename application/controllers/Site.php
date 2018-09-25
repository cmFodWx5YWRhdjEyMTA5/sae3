<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){redirect(base_url('/'));}
    }

	public function index(){
		//Segun el tipo de usuario mostramos o dirijimos al panel adecuado
		$user_tipo = $this->session->userdata('tipo');
		if($user_tipo == 0 || $user_tipo == 1){
			//Alumnos o encargados
			redirect(base_url('alumno'));
		}
		echo $user_tipo;
	

	}







}