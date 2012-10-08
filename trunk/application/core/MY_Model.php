<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {
  
  protected $_prefix;
  protected $_column;
  protected $_table;
  protected $_error_msg;
  
  function __construct(){
    parent::__construct();
    $this->_prefix = "";
    $this->_table = "ci_".str_replace("_model","",strtolower(get_class($this)));
    $this->_column = array();
  }
  
  
  public function getError(){
    return $this->_error_msg;
  }
  
  protected function _addError($error=""){
    if($error==""){
      return false;
    }
    if(!is_array($error)){
      $this->_error_msg[] = $error;
      return true;
    }
    foreach($error as $err){
      $this->_error_msg[] = $err;
    }
    return true;
  }
  
  protected function _required($required, $data)
  {
    if(!is_array($required)){
      if(!isset($data[$required])){
        return false;
      }else{
        return true;
      }
    }
    foreach($required as $field){
      if(!isset($data[$field])){
        return false;
      }
    }
    return true;
  }
  
  protected function _default($defaults, $options)
  {
    return array_merge($defaults, $options);
  }
  
  protected function _getColumn(){
    return $this->_column;
  }
}
?>