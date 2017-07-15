<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaEmail extends CI_Controller {

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-email');
		$this->load->view('components/footer');
	}

}
