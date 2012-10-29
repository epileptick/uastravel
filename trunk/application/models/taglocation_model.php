<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagLocation_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tao";
    $this->_column = array(
                     'id'                => 'tal_id',
                     'tag_id'            => 'tal_tag_id',
                     'location_id'       => 'tal_location_id'
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

    if(isset($args["tag_id"]) && isset($args["location_id"]) ){
      //Get category by name

      $data["tal_tag_id"] = $args["tag_id"];
      $data["tal_location_id"] = $args["location_id"];

      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tag_id"])){
      //Get category by name

      $data["tal_tag_id"] = $args["tag_id"];      
      $query = $this->db->get_where('ci_taglocation', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["location_id"])){
      //Get category by name
      $data["tal_location_id"] = $args["location_id"];

      $query = $this->db->get_where('ci_taglocation', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_taglocation', array('tal_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_taglocation");

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
      $this->db->insert($this->_table);

      return $this->db->insert_id();
    }
    
    return ;
  }
  


 
  function addMultipleRecord($args=false){

   //print_r($args); exit;
   //Check duplicate tag data
    if($args){
      //$tagNew = array();
      $count = 0;
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);  
          //$tag[$count]->id = $tagInsertID;
          //$tag[$count]->name = $tagInput["name"];
         $count++;
      }
      return ;
    }else{
      return ;
    }

    
  }   

  function updateRecord($data=false){


    //print_r($data); exit;
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      //$query = $this->db->where("agt_agency_id", $data["agency_id"]);
      $query = $this->db->where("tal_location_id", $data["location_id"]);
      $query = $this->db->update("ci_taglocation");
    }
    
    return ;
  }

  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("tal_id", $args["id"]);
      $this->db->delete("ci_taglocation");
    }else if(isset($args["location_id"])){
      $this->db->where("tal_location_id", $args["location_id"]);
      $this->db->delete("ci_taglocation");
    }
  }
}
?>