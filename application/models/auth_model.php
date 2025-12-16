<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {

  // ------------------------------------------------------------------------

  private $_options = [
    'cost' => 12,
  ];

  public function __construct()
  {
    parent::__construct();
  }


  public function login($username, $password)
  {
    $exists = $this->db->where('username',$username)
                        ->get('tbl_krywn')->row();

    if(!$exists){
        return false;
    }

    if(password_verify($password,$exists->password)){
        return $exists;
    }else{
        return FALSE;
    }
  } 

  public function register($identity)
  {
    $identity['password'] = password_hash($identity['password'],PASSWORD_DEFAULT);
    $this->db->insert('tbl_krywn',$identity);
    return TRUE;
  }

  

}
