<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaPhone extends CI_Controller {

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-phone');
		$this->load->view('components/footer');
	}
    
}
