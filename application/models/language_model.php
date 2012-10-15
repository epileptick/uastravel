<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Language_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "lang";
    $this->_column = array(
                     'id'                => 'lang_id',
                     'acronym'           => 'lang_acronym',
                     'name'              => 'lang_name',
                     'image'             => 'lang_image'
    );
  }
  
  function mapField($result){
    
    foreach ($result as $key => $value) {
      $data = new stdClass();
      foreach ($value as $keyField => $valueFiled) {
        $keyExplode = explode("_", $keyField, 2);
        $newkey = $keyExplode[1];

        $data->$newkey = $valueFiled; 
      }
      $newResult[] = $data;      
    }

    return $newResult;
  }
  
  function getRecord($args=false){
    //print_r($args); exit;

    if(isset($args["language"])){
      //Get category by name
      $query = $this->db->get_where('ci_language', array('lang_name' => $args["language"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_language', array('lang_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      $query = $this->db->get("ci_language");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    

  }


  function addRecord($data=false){

    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $result = $this->db->insert($this->_table);
    }
    
    return ;
  }
  

  function updateRecord($data=false){
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $query = $this->db->where("lang_id", $data["id"]);
      $query = $this->db->update("ci_language");
    }
    
    return ;
  }

  function deleteRecord($id){
    $this->db->where("lang_id", $id);
    $this->db->delete("ci_language");
  }
}
?>