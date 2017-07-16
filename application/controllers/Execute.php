<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Execute extends CI_Controller {

// Save user information from registration page
public function __construct() {
    parent::__construct();
    $this->fullname  = 'required|trim|min_length[4]|max_length[50]|xss_clean';
    $this->contact   = 'required|trim|xss_clean|regex_match[/^(.*?[0-9]){10,}$/]|min_length[10]|max_length[10]';
    $this->securityc = 'required|trim|xss_clean|regex_match[/^(.*?[0-9]){6,}$/]|min_length[6]|max_length[6]';
    $this->email     = 'required|trim|is_unique[et_accounts_tbl.email]|valid_email|xss_clean';
    $this->eusername = 'required|trim|is_unique[et_accounts_tbl.username]|min_length[6]|max_length[30]|xss_clean';
    $this->username  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->password  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->cpassword = 'required|trim|min_length[6]|max_length[30]|matches[password]|xss_clean';
}

public function createuser() {
    $validator = array('success' => false, 'messages'=> array());
    $this->validate('fullname','Fullname',$this->fullname);
    $this->validate('email','Email',$this->email);
    $this->validate('username','Username',$this->eusername);
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
            'security_code' => rand(111111,999999),
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
    if($result) { 
        $securitycode = $result->security_code;
        $smsGateway = new SmsGateway('lozanojohndavid@gmail.com', '12345123');
        $deviceID = 52335;
        $number = '+63'.$data['contact'];
        $message = 'You are requesting to recover your password. this is your security code: '.$securitycode;
        $smsGateway->sendMessageToNumber($number, $message, $deviceID);
        echo json_encode(array('success' => true,'page' => 'recovery' ,'message'=>'We sent a security code to your number '.$number));
        $validator['success'] = true;
        $this->session->set_userdata(array(
          'step1' => 'Recover Via Phone Step 1',
          'securitycode' =>$securitycode,
          'contact' => $data['contact']));
      };
    } else {
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
        $validator['success'] = false;
      }
    echo json_encode($validator);
    }

}

public function recoverviaphonestep2() {
  $validator = array('success' => false, 'messages'=> array());
  $this->validate('securitycode','security code',$this->securityc);
  $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
    $data = array('securitycode' => $this->post('securitycode'));
    $result = $this->model->RecoverViaPhoneStep2($data);
      if($result) { 
          $validator['success'] = true;
          $this->session->unset_userdata('step1','contact');
          $this->session->set_userdata(array('step2' => 'Recover Via Phone Step 2'));
        echo json_encode(array('success' => true));
        };
      } else {
        foreach ($_POST as $key => $value) {
          $validator['messages'][$key] = form_error($key);
          $validator['success'] = false;
        }
    echo json_encode($validator);
  }
}

public function recoverviaphonestep3() {
  $validator = array('success' => false, 'messages'=> array());
  $this->validate('password','password',$this->password);
  $this->validate('cpassword','Confirm password',$this->cpassword);
  $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
    $data = array(
      'password' => password_hash($this->post('password'),PASSWORD_DEFAULT),
      'securitycode' => $this->session->userdata('securitycode')
      );
    $result = $this->model->RecoverViaPhoneStep3($data);
      if($result) { 
          $validator['success'] = true;
          $this->session->unset_userdata(array('step1','contact','step2','securitycode'));
          echo json_encode(array('success' => true,'message'=>'Password has been changed.'));
        };
      } else {
        foreach ($_POST as $key => $value) {
          $validator['messages'][$key] = form_error($key);
          $validator['success'] = false;
        }
    echo json_encode($validator);
  }
}

public function resendsecuritycodeviaphone() {
    $securitycode = $this->session->userdata('securitycode');
    $contact = $this->session->userdata('contact');
    $smsGateway = new SmsGateway('lozanojohndavid@gmail.com', '12345123');
    $deviceID = 52335;
    $number = '+63'.$contact;
    $message = 'You are requesting to recover your password. this is your security code: '.$securitycode;
    $smsGateway->sendMessageToNumber($number, $message, $deviceID);
    echo json_encode(array('success' => true,'page' => 'recovery' ,'message'=>'We resent a security code to your number '.$number));
    $validator['success'] = true;

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
