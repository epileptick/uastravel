<?php
class MY_Controller extends CI_Controller {

  protected $_CLASS;
  
  function __construct(){
    parent::__construct();
    $this->_CLASS = get_class($this);
    $this->load->model(strtolower($this->_CLASS)."_model",strtolower($this->_CLASS)."Model");
  }
  
  function _fetch($template,$data='',$return=FALSE,$piece=FALSE){
    return $this->parser->parse($this->_CLASS."/".$template,$data,$return,$piece);
  }
  
}
?>