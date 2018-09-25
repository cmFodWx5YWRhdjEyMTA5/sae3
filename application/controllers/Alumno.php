<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!is_logged_in()){redirect(base_url('/'));}
    }

	public function index(){

		$this->load->view('site/alumno');
	

	}







}