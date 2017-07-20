<?php
defined('BASEPATH') or exit ('No direct access allowed.');

class EditContact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $session_id = $this->session->userdata('session_id');
        if(!isset($session_id)) { redirect('login'); };
    }

    public function edit($uid) {
        $id = $this->session->userdata('session_id');
        $data['results'] = $this->model->GetUserData($id);
        $data['resultsbyid'] = $this->model->GetUserDataById($uid);
        $this->load->view('components/headerwithnavs',$data);
		$this->load->view('template/pages/members/editcontact',$data);
    }
}