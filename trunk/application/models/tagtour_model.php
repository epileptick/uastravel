<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagTour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tat";
    $this->_column = array(
                     'id'                => 'tat_id',
                     'tag_id'            => 'tat_tag_id',
                     'tour_id'           => 'tat_tour_id'
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

    if(isset($args["tag_id"]) && isset($args["tour_id"]) ){
      //Get category by name

      $data["tat_tag_id"] = $args["tag_id"];
      $data["tat_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tag_id"])){
      //Get category by name

      $data["tat_tag_id"] = $args["tag_id"];      
      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tour_id"])){
      //Get category by name
      $data["tat_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tagtour', array('agt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_tagtour");

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
      $query = $this->db->where("tat_tour_id", $data["tour_id"]);
      $query = $this->db->update("ci_tagtour");
    }
    
    return ;
  }

  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("tat_id", $args["id"]);
      $this->db->delete("ci_tagtour");
    }else if(isset($args["tour_id"])){
      $this->db->where("tat_tour_id", $args["tour_id"]);
      $this->db->delete("ci_tagtour");
    }
  }
}
?>