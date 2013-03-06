<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CarBooking_model extends MY_Model {

  function __construct(){
    parent::__construct();
  }



  function getRecord($args=false, $field=false){
    //print_r($args); exit;

    if(isset($args["cab_id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_carbooking', array('cab_id' => $args["cab_id"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["cab_code"])){
      //Get category by id      
      $query = $this->db->get_where('ci_carbooking', array('cab_code' => $args["cab_code"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["cab_hashcode"])){
      //Get category by id      
      $query = $this->db->get_where('ci_carbooking', array('cab_hashcode' => $args["cab_hashcode"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( tou_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_tourbooking");

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

       $dateExplode = explode("/", $data["cab_pickup_date"]);
      $cab_pickup_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];
      $this->db->set("cab_pickup_date", $cab_pickup_date);

      $dateExplode = explode("/", $data["cab_dropoff_date"]);
      $cab_dropoff_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];
      $this->db->set("cab_dropoff_date", $cab_dropoff_date);

      $this->db->set("cab_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("cab_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert($this->_table);
      

      //Update
      $id = $this->db->insert_id();
      $digit = 6-strlen($id); 
      $code = "B"; 
      for ($i=0; $i < $digit; $i++) { 
        $code .= "0";
      }
      $code .= $id;

      $hashcode = Hash::gen()->hash($code);
      $this->db->set("cab_hashcode", $hashcode);
      $this->db->set("cab_code", $code);

      $query = $this->db->where("cab_id", $id);
      $query = $this->db->update("ci_carbooking");


      //Return
      $booking = $data;
      $booking["cab_id"] = $id;
      $booking["cab_code"] = $code;
      $booking["cab_hashcode"] = $hashcode;
     

      return $booking;
    }else{
      return ;
    }

  }
  

  function updateRecord($data=false){
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }

      $this->db->set("agn_lu_date", date("Y-m-d H:i:s"));

      $query = $this->db->where("agn_id", $data["id"]);
      $query = $this->db->update("ci_agency");
    }
    
    return ;
  }

  function deleteRecord($id=false){
    if($id){
      $this->db->where("agn_id", $id);
      $this->db->delete("ci_agency");
    }
  }


  function searchRecord($args=false){
    if($args){
      if(isset($args["notlike"])){
        $this->db->where("agn_name", $args["agn_name"]);
        $this->db->order_by("agn_name", "asc");        
        $query = $this->db->get("ci_agency");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }else{    
        $this->db->like($args);
        $query = $this->db->get("ci_agency");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }   
    }
  }  
}
?>