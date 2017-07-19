<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {

  public $accounts = 'et_accounts_tbl';
  public $contacts = 'et_contacts_tbl';

	public function CreateUser($data) {
    return $this->db->insert($this->accounts,$data);
  }

  public function RecoverViaEmailStep1($data) {
    $check = $this->db->select('*')->get_where($this->accounts,array('email' => $data['email']));
    if($check->num_rows() > 0) {
      return $check->row();
    } else {
      echo json_encode(array('page' => 'recovery' ,'message'=>'Email address not found.'));
    }
  }

  public function RecoverViaPhoneStep1($data) {
    $check = $this->db->select('*')
    ->get_where($this->accounts,array('username' => $data['username'],'contact' => $data['contact']));
    if($check->num_rows() > 0) {
      return $check->row();
    } else {
      echo json_encode(array('page' => 'recovery' ,'message'=>'Invalid username or contact number'));

    }
  }

  public function RecoverViaPhoneOrEmailStep2($data) {
    $check = $this->db->select('*')->get_where($this->accounts,array('security_code' => $data['securitycode']));
    if($check->num_rows() > 0) {
      return $check;
    } else {
      echo json_encode(array('page' => 'step2' ,'message'=>'Invalid security code'));
    }
  }
  
  public function RecoverViaPhoneOrEmailStep3($data) {
    $result = $this->db->where(['security_code'=>$data['securitycode']])
    ->set(array('password' => $data['password'], 'security_code' => rand(111111,999999)))
    ->update($this->accounts);
    if($result) {
      return $result;
    }
  }

  public function ActivateAccount($code) {
    $result = $this->db->where(['security_code' => $code])
    ->set(array('status' => 0, 'security_code' => rand(111111,999999)))
    ->update($this->accounts);
    if($result) {
      return $result;
    }
  }

  public function updateprofile($data) {
    $result = $this->db->where(['id' => $data['id']])
    ->set(array('fullname' => $data['fullname'], 'contact' => $data['contact']))
    ->update($this->accounts);
    if($result) {
      return $result;
    }
  }

  public function changepassword($data) {
    $result = $this->db->where(['id' => $data['id']])
    ->set(array('password' => $data['password']))
    ->update($this->accounts);
    if($result) {
      return $result;
    }
  }
  
  public function UserLogin($username,$password) {
		$this->db->select('*')->from($this->accounts)->where('username', $username);
		$hash = $this->db->get()->row('password');
		return $this->verify($password, $hash);
	}

  public function GetId($username) {
		$this->db->select('*')->from($this->accounts)->where('username', $username);
		return $this->db->get()->row('id');
	}

	public function GetUserInformation($id) {
		$this->db->from($this->accounts)->where('id', $id);
		return $this->db->get()->row();
	}

  public function GetUserData($id) {
    $result = $this->db->get_where($this->accounts, array('id' => $id));
    return $result->result();
  }

  public function AddContact($data) {
    $result = $this->db->insert($this->contacts,$data);
    if($result) { 
      return $result; 
    }
  }
  

  public function ShowAllMyContacts($id) {
    $result = $this->db->select(
			'et_accounts_tbl.id, et_contacts_tbl.userid,et_contacts_tbl.id, 
       et_contacts_tbl.fullname, et_contacts_tbl.contact,
       et_contacts_tbl.blocklist')
       ->from('et_contacts_tbl')
       ->join('et_accounts_tbl','et_contacts_tbl.userid = et_accounts_tbl.id')
       ->where(['et_accounts_tbl.id' => $id])
			 ->get();
		return $result->result();
  }


  public function ShowMyContactById($id) {
		$this->db->from($this->contacts)->where('id', $id);
		return $this->db->get()->row();
	}

  public function BlockListing($id) {
		$check = $this->db->select('*')->from($this->contacts)->where(['id' => $id])->get()->row();
    $blocklist = $check->blocklist;
    $fullname = $check->fullname;
    if($blocklist == 1) {
        $result = $this->db->where(['id'=> $id])->set(array('blocklist' => 0))->update($this->contacts);
        echo json_encode(array('success' => true, 'message' => $fullname.' has been blocked.'));
      return $result;
    } else {
        $result = $this->db->where(['id'=> $id])->set(array('blocklist' => 1))->update($this->contacts);
        echo json_encode(array('success' => true, 'message' => $fullname.' has been unblocked.'));
      return $result;
    }
   
  }


  private function verify($password, $hash) {
		return password_verify($password, $hash);
	}
}
