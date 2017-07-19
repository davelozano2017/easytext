<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaPhoneChangePassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$code = $this->session->userdata('phone-code');
		$email = $this->session->userdata('email-code');
		if(!isset($code) == 'no') {
			redirect('recover-via-phone-insert-security-code');
		} elseif($email == 'yes') {
			redirect('recover-via-email-change-password');
		}

		$session_id = $this->session->userdata('session_id');
		if(isset($session_id)){ redirect('profile');};

	}

	

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-phone-change-password');
		$this->load->view('components/footer');
	}
    
}
