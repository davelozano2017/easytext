<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('components/header');
		$this->load->view('template/pages/login');
		$this->load->view('components/footer');
	}

}
