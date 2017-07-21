<?php
defined('BASEPATH') or exit ('No direct access allowed.');

class Messages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $session_id = $this->session->userdata('session_id');
        if(!isset($session_id)) { redirect('login'); };
    }

    public function index() {
        $id = $this->session->userdata('session_id');
        $data['results'] = $this->model->GetUserData($id);
        $data['getmessages'] = $this->model->GetMessagesById($id);
        $this->load->view('components/headerwithnavs',$data);
		$this->load->view('template/pages/members/messages',$data);
    }

    public function view($message_id) {
        $id = $this->session->userdata('session_id');
        $data['results'] = $this->model->GetUserData($id);
        $data['viewmessage'] = $this->model->ViewMessage($message_id);
        $query = $this->model->ViewMessageById($message_id);
        $archieve = $query->archieve;
        $important = $query->important;
        if($important == 1 || $archieve == 1) {
            redirect('messages');
        }

        
        $this->load->view('components/headerwithnavs',$data);
		$this->load->view('template/pages/members/viewmessage',$data);
    }
    
}