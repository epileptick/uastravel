<?php
class MY_Widget extends MY_Controller {

  protected $_CLASS;
  protected $_DATA;

  function __construct(){
    parent::__construct();
    $this->_CLASS = get_class($this);
  }

  function _fetch($template,$return=TRUE,$piece=TRUE){
  	if(empty($template)){
  		return FALSE;
  	}
    return $this->parser->parse("_Widget/".$template."_widget",$this->_DATA,$return,$piece);
  }

  function _assign($var=NULL,$data=NULL){
  	if(empty($var)){
  		return FALSE;
  	}
  	$this->_DATA[$var] = $data;
  }


}
?>