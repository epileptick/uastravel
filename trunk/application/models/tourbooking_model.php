<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TourBooking_model extends MY_Model {

  function __construct(){
    parent::__construct();
  }



  function getRecord($args=false, $field=false){
    //print_r($args); exit;

    if(isset($args["tob_id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourbooking', array('tob_id' => $args["tob_id"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["tob_code"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourbooking', array('tob_code' => $args["tob_code"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["tob_hashcode"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourbooking', array('tob_hashcode' => $args["tob_hashcode"]), 1, 0);

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

      $tob_total_adult_price = $data["tob_adult_price"] * $data["tob_adult_amount"];
      $tob_total_child_price = $data["tob_child_price"] * $data["tob_child_amount"]; 
      $tob_total_infant_price = 0;
      $tob_total_price = $tob_total_adult_price + $tob_total_child_price;
      
      $this->db->set("tob_total_adult_price", $tob_total_adult_price);
      $this->db->set("tob_total_child_price", $tob_total_child_price);
      $this->db->set("tob_total_infant_price", $tob_total_infant_price);
      $this->db->set("tob_total_price", $tob_total_price);

      $dateExplode = explode("/", $data["tob_tranfer_date"]);
      $tob_tranfer_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];
      $this->db->set("tob_tranfer_date", $tob_tranfer_date);

      $this->db->set("tob_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("tob_lu_date", date("Y-m-d H:i:s"));
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
      $this->db->set("tob_hashcode", $hashcode);
      $this->db->set("tob_code", $code);

      $query = $this->db->where("tob_id", $id);
      $query = $this->db->update("ci_tourbooking");


      //Return
      $booking = $data;
      $booking["tob_id"] = $id;
      $booking["tob_code"] = $code;
      $booking["tob_hashcode"] = $hashcode;
      $booking["tob_total_adult_price"] = $tob_total_adult_price;
      $booking["tob_total_child_price"] = $tob_total_child_price;
      $booking["tob_total_infant_price"] = $tob_total_infant_price;
      $booking["tob_total_price"] = $tob_total_price;

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