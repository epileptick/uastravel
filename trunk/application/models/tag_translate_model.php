<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tag_translate_model extends MY_Model {
  
  function __construct(){
    parent::__construct();
    $this->_prefix = "tagt";
    $this->_pk = "tag_id";
    $this->_column = array(
                     'tag_id'            => 'tagt_tag_id',
                     'lang'              => 'tagt_lang',
                     'name'              => 'tagt_name',
                     'url'               => 'tagt_url'
    );
  }
   
  function add($options = NULL){
    
    if(empty($options)){
      return FALSE;
    }
    if(empty($options["lang"])){
      $this->db->set($this->_getColumn("lang"), $this->lang->lang()); 
    }
    if(parent::add($options) === FALSE){
      return FALSE;
    }else{
      return $options["tag_id"];
    }
    
  }
}
?>