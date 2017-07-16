<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaPhoneChangePassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$steps = $this->session->userdata('step2');
		if(!isset($steps)): redirect('recover-via-phone-insert-security-code'); endif;
	}

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-phone-change-password');
		$this->load->view('components/footer');
	}
    
}
