<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivateAccount extends CI_Controller {

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/account-activate');
		$this->load->view('components/footer');
	}

}
