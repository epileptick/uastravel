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
    if(parent::add($options) === FALSE){
      return FALSE;
    }else{
      return $options["tag_id"];
    }
    
  }

  function updateLang($options = NULL){
    if(empty($options)){
      return FALSE;
    }
    if(empty($options["where"])){
      return FALSE;
    }
    if(empty($options["set"])){
      return FALSE;
    }
    if(empty($options["set"]["name"])){
      return FALSE;
    }

    $this->db->where($this->_getColumn("tag_id"),$options["where"]["tag_id"]);
    $this->db->where($this->_getColumn("lang"),$options["where"]["lang"]);

    if ($this->db->count_all_results($this->_table) == 0) {
      $this->db->set($this->_getColumn("lang"),$options["where"]["lang"]);
      $this->db->set($this->_getColumn("tag_id"),$options["where"]["tag_id"]);
      $this->db->set($this->_getColumn("name"),$options["set"]["name"]);
      $this->db->set($this->_getColumn("url"),Util::url_title($options["set"]["name"]));
      $result = $this->db->insert($this->_table);
    }else{

      $this->db->where($this->_getColumn("tag_id"),$options["where"]["tag_id"]);
      $this->db->where($this->_getColumn("lang"),$options["where"]["lang"]);
      $this->db->set($this->_getColumn("name"),$options["set"]["name"]);
      $this->db->set($this->_getColumn("url"),Util::url_title($options["set"]["name"]));
      $result = $this->db->update($this->_table);
    }
    return $result;
  }
}
?>