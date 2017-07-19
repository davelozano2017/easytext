<?php
defined('BASEPATH') or exit ('No direct access allowed.');

class ShowContacts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $session_id = $this->session->userdata('session_id');
        if(!isset($session_id)) { redirect('login'); };
    }

    public function index() {
        $id = $this->session->userdata('session_id');
        $data['mycontacts'] = $this->model->ShowAllMyContacts($id);
		$this->load->view('template/pages/members/showcontacts',$data);
    }
}