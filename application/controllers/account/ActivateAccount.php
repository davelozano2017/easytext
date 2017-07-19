<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivateAccount extends CI_Controller {

	public function account($code){
		$result = $this->model->ActivateAccount($code);
		if($result) {
			$data['message'] = 'your account is now active. Please click <a href="'.site_url('login').'">here</a> to login.';
			$this->load->view('components/header');
			$this->load->view('template/pages/account/account-activate',$data);
			$this->load->view('components/footer');
		}
	}

}
