<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recover extends CI_Controller {

	public function index() {
    $this->load->view('components/header');
		$this->load->view('template/pages/recover');
		$this->load->view('components/footer');
	}

}
