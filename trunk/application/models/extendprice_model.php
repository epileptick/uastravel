<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Extendprice_model extends MY_Model {

  function __construct(){
    parent::__construct();
  }



  function getRecord($args=false, $field=false){
    //print_r($args); exit;

    if(isset($args["extp_id"])){
      //Get category by id
      $query = $this->db->get_where('ci_extendprice', array('extp_id' => $args["extp_id"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }

    }else if(isset($args["extp_tour_id"])){
      //Get category by id
      $query = $this->db->get_where('ci_extendprice', array('extp_tour_id' => $args["extp_tour_id"]));

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }

    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( extp_name USING tis620 ) ASC');
      $query = $this->db->get("ci_extendprice");

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }

  }


  function addRecord($data=false){

    if($data){

      //Insert
      foreach ($data as $columnName => $columnValue) {
        $this->db->set($columnName, $columnValue);
      }

      $this->db->insert($this->_table);
      $id = $this->db->insert_id();

      return $id;
    }else{
      return ;
    }

  }




  function addMultipleRecord($args=false){

    if($args){
      $count = 0;
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);
         $count++;
      }
      return ;
    }else{
      return ;
    }
  }


  function updateRecord($args=false){


    //Init value
    $input = $args["extendprice"];
    $extendprice["extp_tour_id"] = $args["id"];

    $update = false;
    $updateCount = 0;
    $updateArray = array();

    $delete = false;
    $deleteCount = 0;
    $deleteArray = array();

    $insert = false;
    $insertCount = 0;
    $insertArray = array();


    //Get extendprice by this tour_id
    $query = $this->getRecord($extendprice);

    //Check Update & Delete
    if(!empty($query)){
      foreach ($query as $keyQuery => $valueQuery) {
        foreach ($input as $keyInput => $valueInput) {
            if(!empty($valueInput["extp_id"])){
              if($valueQuery->extp_id == $valueInput["extp_id"]){
                $update = true;
                $updateData = $valueInput;
              }
            }
        }

        if($update){
          //Update
          $updateArray[$updateCount] = $updateData;
          $updateCount++;
          $update = false;
        }else{
          //Delete
          $deleteArray[$deleteCount] = $valueQuery;
          $deleteCount++;
        }
      }

    }

    //Check Insert
    foreach ($input as $keyInput => $valueInput) {
      if(empty($valueInput["extp_id"])){
        $insert = true;
        $valueInput["extp_tour_id"] = $args["id"];
        $insertArray[] = $valueInput;
      }
    }


    //Insert extendprice to database
    if(!empty($insertArray)){
      $this->addMultipleRecord($insertArray);
    }

    //Update extendprice to database
    if(!empty($updateArray)){
      foreach ($updateArray as $key => $value) {
        $this->_updateRecord($value);
      }
    }

    //Delete extendprice in database
    if(!empty($deleteArray)){
      foreach ($deleteArray as $key => $value) {
        $delete["extp_id"] = $value->extp_id;
        $this->deleteRecord($delete);
      }
    }

    return ;
  }

  function _updateRecord($data=false){
    if(!empty($data["extp_id"])){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        $this->db->set($columnName, $columnValue);
      }
      $query = $this->db->where("extp_id", $data["extp_id"]);
      $query = $this->db->update("ci_extendprice");
    }else if($data["extp_tour_id"]  && $data["extp_id"]){
      //Set data
      foreach ($data as $columnName => $columnValue) {
        $this->db->set($columnName, $columnValue);
      }

      $query = $this->db->where("extp_tour_id", $data["extp_tour_id"]);
      $query = $this->db->update("ci_extendprice");
    }
  }

  function deleteRecord($args=false){

    if(!empty($args["extp_id"]) && !empty($args["extp_tour_id"])){
      $this->db->where("extp_tour_id", $args["extp_tour_id"]);
      $this->db->where("extp_id", $args["extp_id"]);
      $this->db->delete("ci_extendprice");

    }else if(!empty($args["extp_id"])){
      $this->db->where("extp_id", $args["extp_id"]);
      $this->db->delete("ci_extendprice");

    }else if(!empty($args["extp_tour_id"])){
      $this->db->where("extp_tour_id", $args["extp_tour_id"]);
      $this->db->delete("ci_extendprice");

    }
  }

}
?>