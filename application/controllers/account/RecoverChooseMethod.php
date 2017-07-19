<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoverChooseMethod extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$session_id = $this->session->userdata('session_id');
		if(isset($session_id)){ redirect('profile');};
	}
	
	public function index() {
    	$this->load->view('components/header');
		$this->load->view('template/pages/account/recover-choose-method');
		$this->load->view('components/footer');
	}

}

