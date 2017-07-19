<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaEmailInsertSecurityCode extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$page = $this->session->userdata('recovery-phone');
		$email = $this->session->userdata('email-code');
		$re = $this->session->userdata('recovery-email');
		
		if(!isset($re)) {
			redirect('recover-via-email');
		} elseif($page == 'yes') {
			redirect('recover-via-phone-insert-security-code');
		} elseif($email == 'yes') {
			redirect('recover-via-email-change-password');
		}

		$session_id = $this->session->userdata('session_id');
		if(isset($session_id)){ redirect('profile');};
	}
	
	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-email-insert-security-code');
		$this->load->view('components/footer');
	}
    
}
