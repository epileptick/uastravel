<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends MY_Model {

  function __construct(){
    parent::__construct();
    $this->_prefix = "usr";
    $this->_column = array(
                     'id'          => 'usr_id',
                     'fbid'        => 'usr_fbid',
                     'username'    => 'usr_username',
                     'password'    => 'usr_password',
                     'status'      => 'usr_status',
                     'group'       => 'usr_group',
                     'email'       => 'usr_email',
                     'gender'      => 'usr_gender',
                     'first_name'  => 'usr_first_name',
                     'last_name'   => 'usr_last_name',
                     'name'        => 'usr_name',
                     'hometown'    => 'usr_hometown',
                     'location'    => 'usr_location',
                     'birthday'    => 'usr_birthday'
    );
  }

  function getUserInfo($userId){
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where('usr_id', $userId);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0)
    {
      foreach($query->result() as $key=>$value){
        $result = Util::objectToArray($value);
      }
      return $result;
    }else{
      return FALSE;
    }
  }

  function AddUser($options = array()){

  }

  function UpdateUser($options = array()){

  }

  function DeleteUser($options = array()){

  }

  function GetUsers($options = array()){

  }

  /*
  array list
  username
  password - this password isn't need to encrypt


  param options array()
  return FALSE if incorrect, array if login complete
  */
  public function checkLogin($options){

    if(!$this->_required("username",$options)){
      $this->_addError("invalid username");
      return FALSE;
    }
    if(!$this->_required("password",$options)){
      $this->_addError("invalid password");
      return FALSE;
    }

    $this->db->select('*');
    $this->db->from($this->_table);
    //Set where clause
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->where($this->_column[$columnName], $columnValue);
      }
    }
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0)
    {
      foreach($query->result() as $key=>$value){
        $result = Util::objectToArray($value);
      }
      return $result;
    }else{
      return FALSE;
    }
  }
}
?>