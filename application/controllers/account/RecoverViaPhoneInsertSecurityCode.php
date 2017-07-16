<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaPhoneInsertSecurityCode extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$steps = $this->session->userdata('step1');
		if(!isset($steps)): redirect('recover-via-phone'); endif;
	}

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-phone-insert-security-code');
		$this->load->view('components/footer');
	}
    
}
