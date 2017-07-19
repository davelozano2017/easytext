<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverViaPhoneInsertSecurityCode extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$page = $this->session->userdata('recovery-email');
		$phone = $this->session->userdata('phone-code');
		$re = $this->session->userdata('recovery-phone');
		if(!isset($re)) {
			redirect('recover-via-phone');
		}  elseif($page == 'yes') {
			redirect('recover-via-email-insert-security-code');
		} elseif($phone == 'yes') {
			redirect('recover-via-phone-change-password');
		}
		
		$session_id = $this->session->userdata('session_id');
		if(isset($session_id)){ redirect('profile');};
	}

	

	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-via-phone-insert-security-code');
		$this->load->view('components/footer');
	}
    
}
