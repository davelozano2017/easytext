<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Execute extends CI_Controller {

// Save user information from registration page
 function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Manila');
    $this->load->library('phpmailer');
    $this->fullname  = 'required|trim|min_length[4]|max_length[50]|xss_clean';
    $this->contact   = 'required|trim|xss_clean|regex_match[/^(.*?[0-9]){10,}$/]|min_length[10]|max_length[10]';
    $this->securityc = 'required|trim|xss_clean|regex_match[/^(.*?[0-9]){6,}$/]|min_length[6]|max_length[6]';
    $this->email     = 'required|trim|is_unique[et_accounts_tbl.email]|valid_email|xss_clean';
    $this->emailv    = 'required|trim|valid_email|regex_match[/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/]|xss_clean';
    $this->eusername = 'required|trim|is_unique[et_accounts_tbl.username]|min_length[6]|max_length[30]|xss_clean';
    $this->username  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->password  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->cpassword = 'required|trim|min_length[6]|max_length[30]|matches[password]|xss_clean';
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
          'page' => 'recovery-phone',
          'securitycode' =>$securitycode,
          'recovery-email' => 'no',
          'recovery-phone' => 'yes',
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

public function login() {
		$username = $this->post('username');
		$password = $this->post('password');
		$result = $this->model->UserLogin($username, $password);
		if ($result) {
			$id 	      = $this->model->GetId($username);
			$user 	    = $this->model->GetUserInformation($id);
			$fullname 	= $user->fullname;
			$role 	    = $user->role;
			$email 	    = $user->email;
			$status 	  = $user->status;
			$newdata    = array('session_id' => $id, 'logged_in' => TRUE, 'role' => $role);
      switch ([$role,$status]) {
        case [0,0]:
				  $this->session->set_userdata($newdata);
				break;

				case [1,1]:
			  $this->session->set_userdata($newdata);
				echo json_encode(array('success'=>false,'message'=>'Please activate your account'));
				break;

        case [1,0]:
			    $this->session->set_userdata($newdata);
			    echo json_encode(array('success'=>true));
				break;
			}
		}  else {
				echo json_encode(array('success'=>false,'message'=>'Invalid username or password'));
    }

	}

public function recoverviaemailstep1() {
   $validator = array('success' => false, 'messages'=> array());
    $this->validate('email','email',$this->emailv);
    $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
    $data = array('email' => $this->post('email'));
    $result = $this->model->RecoverViaEmailStep1($data);
    if($result) { 
        $fullname = $result->fullname;
        $securitycode = $result->security_code;
        $this->session->set_userdata(array(
          'fullname' => $fullname,
          'email' => $data['email'],
          'recovery-email' => 'yes',
          'recovery-phone' => 'no',
          'securitycode' => $securitycode
          ));
        $send = $this->sendemail();
        if($send) {
          $validator['success'] = true;
        }
      };
    } else {
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
        $validator['success'] = false;
      }
    echo json_encode($validator);
    }

}

public function recoverviaemailstep2() {
  $validator = array('success' => false, 'messages'=> array());
  $this->validate('securitycode','security code',$this->securityc);
  $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
    $data = array('securitycode' => $this->post('securitycode'));
    $result = $this->model->RecoverViaPhoneOrEmailStep2($data);
      if($result) { 
        $validator['success'] = true;
        $this->session->set_userdata(array(
          'phone-code' => 'no',
          'email-code' => 'yes'
          ));
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

public function recoverviaphonestep2() {
  $validator = array('success' => false, 'messages'=> array());
  $this->validate('securitycode','security code',$this->securityc);
  $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
    $data = array('securitycode' => $this->post('securitycode'));
    $result = $this->model->RecoverViaPhoneOrEmailStep2($data);
      if($result) { 
        $validator['success'] = true;
        $this->session->set_userdata(array(
          'phone-code' => 'yes',
          'email-code' => 'no'
          ));
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

public function recoverviaphoneoremailstep3() {
  $validator = array('success' => false, 'messages'=> array());
  $this->validate('password','password',$this->password);
  $this->validate('cpassword','Confirm password',$this->cpassword);
  $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {
    $data = array(
      'password' => password_hash($this->post('password'),PASSWORD_DEFAULT),
      'securitycode' => $this->session->userdata('securitycode')
      );
    $result = $this->model->RecoverViaPhoneOrEmailStep3($data);
      if($result) { 
          $validator['success'] = true;
          $this->session->unset_userdata(array(
            'email-code','phone-code','stats',
            'fullname','page','contact','recovery-email',
            'recovery-phone','securitycode','email'));
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

public function logout() {
  $array_items = array('role', 'session_id');
  $this->session->unset_userdata($array_items);
  redirect('login');
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
