<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {

  public $et_accounts_tbl = 'et_accounts_tbl';

	public function CreateUser($data) {
    return $this->db->insert($this->et_accounts_tbl,$data);
  }

  public function RecoverViaEmailStep1($data) {
    $check = $this->db->select('*')->get_where('et_accounts_tbl',array('email' => $data['email']));
    if($check->num_rows() > 0) {
      return $check->row();
    } else {
      echo json_encode(array('page' => 'recovery' ,'message'=>'Email address not found.'));
    }
  }

  public function RecoverViaPhoneStep1($data) {
    $check = $this->db->select('*')
    ->get_where('et_accounts_tbl',array('username' => $data['username'],'contact' => $data['contact']));
    if($check->num_rows() > 0) {
      return $check->row();
    } else {
      echo json_encode(array('page' => 'recovery' ,'message'=>'Invalid username or contact number'));

    }
  }

  public function RecoverViaPhoneOrEmailStep2($data) {
    $check = $this->db->select('*')->get_where('et_accounts_tbl',array('security_code' => $data['securitycode']));
    if($check->num_rows() > 0) {
      return $check;
    } else {
      echo json_encode(array('page' => 'step2' ,'message'=>'Invalid security code'));
    }
  }
  
  public function RecoverViaPhoneOrEmailStep3($data) {
    $result = $this->db->where(['security_code'=>$data['securitycode']])
    ->set(array('password' => $data['password'], 'security_code' => rand(111111,999999)))
    ->update($this->et_accounts_tbl);
    if($result) {
      return $result;
    }
  }

}
