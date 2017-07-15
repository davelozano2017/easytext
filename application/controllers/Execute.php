<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Controller {

// Save user information from registration page
public function __construct() {
    parent::__construct();
    $this->fullname  = 'required|trim|min_length[4]|max_length[50]|xss_clean';
    $this->contact   = 'required|trim|xss_clean';
    $this->email     = 'required|trim|is_unique[et_accounts_tbl.email]|valid_email|xss_clean';
    $this->username  = 'required|trim|is_unique[et_accounts_tbl.username]|min_length[6]|max_length[30]|xss_clean';
    $this->password  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->cpassword = 'required|trim|min_length[6]|max_length[30]|matches[password]|xss_clean';
}

public function createuser() {
    $validator = array('success' => false, 'messages'=> array());
    $this->validate('fullname','Fullname',$this->fullname);
    $this->validate('email','Email',$this->email);
    $this->validate('username','Username',$this->username);
    $this->validate('password','password',$this->password);
    $this->validate('cpassword','Confirm password',$this->cpassword);
    $this->form_validation->set_message('is_unique', '{field} already exist');
    $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {

        $data = array(
            'fullname' 	    => $this->post('fullname'),
            'email'         => $this->post('email'),
            'contact' 	    => $this->post('contact'),
            'username' 	    => $this->post('username'),
            'password'      => password_hash($this->post('password'),PASSWORD_DEFAULT),
            'security_code' => rand(11111,99999),
            'status'      	=> 1,
            'role'          => 1,
            'date'          => date('F j, \ Y h:i A')
          );
        $result = $this->model->CreateUser($data);
          if($result) { $validator['success'] = true; };
    } else {
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
        $validator['success'] = false;
      }
    }
    echo json_encode($validator);
  }

public function recoverviaphonestep1() {
   $validator = array('success' => false, 'messages'=> array());
    $this->validate('contact','contact',$this->contact);
    $this->validate('username','username',$this->username);
    $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
        $data = array(
            'username' 	    => $this->post('username'),
            'contact'       => $this->post('contact')
          );
        $result = $this->model->RecoverViaPhoneStep1($data);
          if($result) { $validator['success'] = true; };
    } else {
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
        $validator['success'] = false;
      }
    echo json_encode($validator);
    }

}


// costum method for $this->input->post();
public function post($value) {
  return $this->input->post($value);
}

// costum method for $this->form_validation->set_rules();
public function validate($param1,$param2,$param3) {
  return $this->form_validation->set_rules($param1,$param2,$param3);
}

}
