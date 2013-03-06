<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Images_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "img";
    $this->_column = array(
                     'id'               => $this->_prefix.'_id',
                     'file_name'        => $this->_prefix.'_file_name',
                     'size'             => $this->_prefix.'_size',
                     'type'             => $this->_prefix.'_type',
                     'parent_id'        => $this->_prefix.'_parent_id',
                     'table_id'         => $this->_prefix.'_table_id',//1=location,2=tour
                     'url'              => $this->_prefix.'_url'
                     );
  }
  
  function addRecord($options=""){
    if($options==""){
      return FALSE;
    }
    
    $options["url"] = trim($options["url"]);
    //Set data
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    
    $result = $this->db->insert($this->_table);
    if($result){
      return $this->db->insert_id();
    }else{
      $result;
    }

  }
  
  function readRecord($options=""){
    if($options==""){
      return FALSE;
    }
    //Set data
    foreach($options AS $columnName => $columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->where($this->_column[$columnName],$columnValue);
        
      }
    }
    $this->db->from($this->_table);
    $query = $this->db->get();

    if ($query->num_rows() > 0)
    {
      foreach($query->result() as $key=>$value){
        $result[$key] = Util::objectToArray($value);
      }
      return $result;
    }else{
      return FALSE;
    }
  }
  
  function delete($options){
    $getResult = parent::get($options);
    if(!empty($getResult)){
      foreach($getResult AS $key=>$value){
        if(!empty($value)){
          $imgPath = explode("resource",$value['url']);
          $unlinkPath = "resource".$imgPath[1];
          if(file_exists($unlinkPath)){
            if(unlink($unlinkPath)){
              parent::delete($value['id']);
            }
          }else{
            parent::delete($value['id']);
          }
        }
      }
    }
  }
}
  
?>