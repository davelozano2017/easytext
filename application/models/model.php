  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class model extends CI_Model {

    public $accounts = 'et_accounts_tbl';
    public $contacts = 'et_contacts_tbl';
    public $messages = 'et_messages_tbl';

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

    public function GetMessagesById($id) {
      $result = $this->db->select(
        'et_accounts_tbl.id,et_contacts_tbl.userid,et_contacts_tbl.fullname,et_contacts_tbl.contact,
        et_messages_tbl.id, et_messages_tbl.userid, et_messages_tbl.contact, et_messages_tbl.date,
        et_messages_tbl.archieve,et_messages_tbl.important'
        )
      ->from('et_messages_tbl')
      ->join('et_contacts_tbl', 'et_messages_tbl.userid = et_contacts_tbl.userid')
      ->join('et_accounts_tbl', 'et_messages_tbl.contact = et_contacts_tbl.contact')
      ->where(array(
        'et_accounts_tbl.id' => $id, 'et_messages_tbl.userid' => $id,
         'et_messages_tbl.archieve' => 0, 'et_messages_tbl.important' => 0
      ))->get();
      return $result->result();

    }

    public function GetArchieve($id) {
      $result = $this->db->select(
        'et_accounts_tbl.id,et_contacts_tbl.userid,et_contacts_tbl.fullname,et_contacts_tbl.contact,
        et_messages_tbl.id, et_messages_tbl.userid, et_messages_tbl.contact, et_messages_tbl.date,
        et_messages_tbl.archieve,et_messages_tbl.important'
        )
      ->from('et_messages_tbl')
      ->join('et_contacts_tbl', 'et_messages_tbl.userid = et_contacts_tbl.userid')
      ->join('et_accounts_tbl', 'et_messages_tbl.contact = et_contacts_tbl.contact')
      ->where(array(
        'et_accounts_tbl.id' => $id, 'et_messages_tbl.userid' => $id,
         'et_messages_tbl.archieve' => 1, 'et_messages_tbl.important' => 0
      ))->get();
      return $result->result();

    }

    public function GetImportant($id) {
      $result = $this->db->select(
        'et_accounts_tbl.id,et_contacts_tbl.userid,et_contacts_tbl.fullname,et_contacts_tbl.contact,
        et_messages_tbl.id, et_messages_tbl.userid, et_messages_tbl.contact, et_messages_tbl.date,
        et_messages_tbl.archieve,et_messages_tbl.important'
        )
      ->from('et_messages_tbl')
      ->join('et_contacts_tbl', 'et_messages_tbl.userid = et_contacts_tbl.userid')
      ->join('et_accounts_tbl', 'et_messages_tbl.contact = et_contacts_tbl.contact')
      ->where(array(
        'et_accounts_tbl.id' => $id, 'et_messages_tbl.userid' => $id,
         'et_messages_tbl.archieve' => 0, 'et_messages_tbl.important' => 1
      ))->get();
      return $result->result();

    }

    public function ViewMessage($id) {
      $result = $this->db->select(
        'et_messages_tbl.id, et_messages_tbl.userid, et_messages_tbl.contact, 
         et_messages_tbl.message, et_messages_tbl.date, et_contacts_tbl.userid,
         et_contacts_tbl.fullname, et_contacts_tbl.contact'
      )
      ->from('et_messages_tbl')->join('et_contacts_tbl', 'et_messages_tbl.contact = et_contacts_tbl.contact')
      ->where(['et_messages_tbl.id' => $id])->get();
      return $result->result();
    }

    public function ViewMessageById($id) {
      $result = $this->db->get_where($this->messages,array('id'=>$id))->row();
      return $result;
    }

    public function GetUserDataById($id) {
      $result = $this->db->get_where($this->contacts,array('id' => $id));
      return $result->result();
    }

    public function AddContact($data) {
      $check = $this->db->select('*')->from($this->contacts)->where(['contact' => $data['contact'],'userid' => $data['userid']])->get();
      if($check->num_rows() > 0) {
            echo json_encode(array('success' => 'false1', 'message' => 'This number '."+63".$data['contact'].' is already exist in your list.'));
      } else {
        $result = $this->db->insert($this->contacts,$data);
        if($result) {
            echo json_encode(array('success' => true, 'message' => $data['fullname'].' has been added to your list.'));
            return $result;
        }
      }
    }

    public function UpdateContactById($data) {
      $contact = $data['contact'];
      $query = $this->db->get_where($this->contacts,['id'=> $data['id']])->row();
      $contactfromtable = $query->contact;
        if($contact == $contactfromtable) {
            $result = $this->db->where(['id' => $data['id'],'userid' => $data['userid']])->update($this->contacts,$data);
            echo json_encode(array('success' => true, 'message' => 'contact has been updated.'));
        } else {
          $check = $this->db->get_where($this->contacts,['contact' => $contact]);
          if($check->num_rows() > 0) {
            echo json_encode(array('success' => false, 'message' => 'This number '. "+63".$contact.' is already in used.'));
          } else {
            $result = $this->db->where(['id' => $data['id'], 'userid' => $data['userid']])->update($this->contacts,$data);
            echo json_encode(array('success' => true, 'message' => 'contact has been updated.'));
          }
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

    public function ShowMyContactByUserId($id) {
      $result = $this->db->get_where($this->contacts,['userid' => $id, 'blocklist' => 1]);
      return $result->result();
    }


    public function ShowMyContactById($id) {
      $this->db->from($this->contacts)->where('id', $id);
      return $this->db->get()->row();
    }

    public function RemoveContactById($id) {
        $result = $this->db->where(['id' => $id])->delete($this->contacts);
        return $result;
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

    public function MoveToArchieveOrImportant($data) {
      if($data['choose'] == 'Archieve') {
        $result = $this->db->where(['id'=> $data['id']])
        ->set(array('archieve' => 1))
        ->update($this->messages);
        echo json_encode(array('success' => true, 'message' => 'This message has been moved to arhieve page'));
        return $result;
      } else {
        $result = $this->db->where(['id'=> $data['id']])
        ->set(array('important' => 1))
        ->update($this->messages);
        echo json_encode(array('success' => true, 'message' => 'This message has been moved to important page'));
        return $result;
      }

    }

    public function SaveMessage($data) {
      $result = $this->db->insert($this->messages,$data);
      return $result;
    }

    private function verify($password, $hash) {
      return password_verify($password, $hash);
    }
  }
