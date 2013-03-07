<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Type_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "typ";
    $this->_column = array(
                     'id'             => 'typ_id',
                     'name'           => 'typ_name',
                     'parent_id'      => 'typ_parent_id',
                     'description'    => 'typ_description',
                     'status'         => 'typ_status'
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
    if(isset($args["parent_id"]) && isset($args["name"])){

      if(!empty($args["not_id"])){
        $this->db->where('typ_id !=', $args["not_id"]);
      }

      $this->db->where('typ_parent_id', $args["parent_id"]);      
      $this->db->where('typ_name', $args["name"]);      
      $query = $this->db->get('ci_type');

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        //print_r($newResult); exit;
        return $newResult;
      }else{
        return false;
      }

    }else if(isset($args["name"])){

      //Get category by name
      $query = $this->db->get_where('ci_type', array('typ_name' => $args["name"]), 1, 0);

      //print_r($query->result()); exit;


      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        //print_r($newResult); exit;
        return $newResult;
      }else{
        return false;
      }
      
    }else if(isset($args["parent_id"]) && isset($args["id"])){
      //Get category by id      

      $this->db->where('typ_parent_id', $args["parent_id"]);      
      $this->db->where('typ_id', $args["id"]);      
      $query = $this->db->get('ci_type');

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_type', array('typ_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["parent_id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_type', array('typ_parent_id' => $args["parent_id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      $query = $this->db->get("ci_type");

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
      $query = $this->db->where("typ_id", $data["id"]);
      $query = $this->db->update("ci_type");
    }
    
    return ;
  }

  function deleteRecord($id){
    if($id){
      $this->db->where("typ_id", $id);
      $this->db->delete("ci_type");
    }    

  }
}
?>