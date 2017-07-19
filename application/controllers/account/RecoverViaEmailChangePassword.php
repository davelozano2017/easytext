<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaEmailChangePassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$code = $this->session->userdata('email-code');
		$phone = $this->session->userdata('phone-code');
		if(!isset($code) == 'no') {
			redirect('recover-via-email-insert-security-code');
		} elseif($phone == 'yes') {
			redirect('recover-via-phone-change-password');
		}
		$session_id = $this->session->userdata('session_id');
		if(isset($session_id)){ redirect('profile');};
	}

	

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-email-change-password');
		$this->load->view('components/footer');
	}
    
}
