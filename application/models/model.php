<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {

  public $et_accounts_tbl = 'et_accounts_tbl';

	public function CreateUser($data) {
    return $this->db->insert($this->et_accounts_tbl,$data);
  }


  public function RecoverViaPhoneStep1($data) {
    $check = $this->db->select('username')
    ->from('et_accounts_tbl')
    ->where(['username' => $data['username']])->get();
    if($check->num_rows() > 0) {
      return true;
    } else {
      echo json_encode(array('message'=>'username not found'));

    }
  }

}
