<?php
class MY_Controller extends CI_Controller {

  protected $_CLASS;
  protected $_DATA;

  function __construct(){
    parent::__construct();
    $this->_CLASS = ucwords(get_class($this));
    if(file_exists(APPPATH."models/".strtolower($this->_CLASS)."_model.php")){
      $this->load->model(strtolower($this->_CLASS)."_model",strtolower($this->_CLASS)."Model");
    }
  }

  function _fetch($template, $data="", $return=FALSE, $piece=FALSE){
    if(empty($template)){
      return FALSE;
    }
    if(!empty($data)){
      foreach ($data as $key => $value) {
        $this->_assign($key,$value);
      }
    }

    //Parsing
    $HTML =  $this->parser->parse("_Controller/".$this->_CLASS."/".$template,$this->_DATA,$piece);
    
    //Check if return
    if ($return == TRUE){
      return $HTML;
      
    }

    //Append output
    $this->output->append_output($HTML);

  }

  function _assign($var=NULL,$data=NULL){
    if(empty($var)){
      return FALSE;
    }
    $this->_DATA[$var] = $data;
  }
}

if (file_exists(APPPATH.'core/'.$CFG->config['subclass_prefix'].'Widget.php'))
{
  require APPPATH.'core/'.$CFG->config['subclass_prefix'].'Widget.php';
}
?>