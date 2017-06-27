<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {

	public function CreateUser($data) {

    return $this->db->insert('et_accounts_tbl',$data);

  }

}
