<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "pst";
    $this->_column = array(
                     'id'               => 'pst_id',
                     'title'            => 'pst_title',
                     'body'             => 'pst_body',
                     'status'           => 'pst_status',
                     'level'            => 'pst_level',
                     'group'            => 'pst_group',
                     'url'              => 'pst_url',
                     'cr_date'          => 'pst_cr_date',
                     'cr_uid'           => 'pst_cr_uid',
                     'lu_date'          => 'pst_lu_date',
                     'lu_uid'           => 'pst_lu_uid'
                     
    );
  }
  
  function addRecord($options=""){
    if($options==""){
      return FALSE;
    }

    if(!$this->_required("title",$options)){
      $this->_addError("invalid title");
      return FALSE;
    }
    if(!$this->_required("body",$options)){
      $this->_addError("invalid body");
      return FALSE;
    }
    
    if(!isset($options["status"])){
      $options["status"] = 1;
    }
    if(!isset($options["cr_date"])){
      $options["cr_date"] = date("Y-m-d");
    }
    if(!isset($options["cr_uid"])){
      $options["cr_uid"] = 0;
    }
    if(!isset($options["lu_date"])){
      $options["lu_date"] = date("Y-m-d");
    }
    if(!isset($options["lu_uid"])){
      $options["lu_uid"] = 0;
    }
    $options["url"] = trim($options["url"]);
    if(!isset($options["url"])||$options["url"]==""){
      $string = $options["title"];
      $string = preg_replace("`\[.*\]`U","",$string);
      $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
      $string = str_replace('%', '-percent', $string);
      $string = htmlentities($string, ENT_COMPAT, 'utf-8');
      $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
      $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
      $options["url"] = strtolower(trim($string, '-'));
    }
    
    
    
    //Set data
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    $result = $this->db->insert($this->_table);
    return $result;
  }
  
  function updateRecord($options=""){
    if($options=""){
      return FALSE;
    }
    
    if(!$this->_required("title",$options)){
      $this->_addError("invalid title");
      return FALSE;
    }
    if(!$this->_required("body",$options)){
      $this->_addError("invalid body");
      return FALSE;
    }
    if(!$this->_required("id",$options)){
      $this->_addError("id is not exist");
      return FALSE;
    }
    
    $options[lu_date] = 1;
    
    //Set data
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    $this->db->where($this->_column[id], $options[id]);
    $this->db->update($this->_table);
  }
}
?>