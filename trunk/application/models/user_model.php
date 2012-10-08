<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends MY_Model {
  
  function __construct(){
    parent::__construct();
    $this->_prefix = "usr";
    $this->_column = array(
                     'id'          => 'usr_id',
                     'username'    => 'usr_username',
                     'password'    => 'usr_password',
                     'facebook_id' => 'usr_facebook_id',
                     'status'      => 'usr_status',
                     'level'       => 'usr_level',
                     'group'       => 'usr_group',
                     'email'       => 'usr_email'
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
        $result = Utils::objectToArray($value);
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
        $result = Utils::objectToArray($value);
      }
      return $result;
    }else{
      return FALSE;
    }
  }
  
  
}
?>