<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TourBooking_model extends MY_Model {

  function __construct(){
    parent::__construct();
    $this->_prefix = "tob";
    $this->_column = array(
                     'id'                    => $this->_prefix.'_id',
                     'agency_id'             => $this->_prefix.'_agency_id',
                     'tour_id'               => $this->_prefix.'_tour_id',
                     'price_id'              => $this->_prefix.'_price_id',
                     'price_name'            => $this->_prefix.'_price_name',
                     'tourcustomer_id'       => $this->_prefix.'_tourcustomer_id',
                     'sale_adult_price'      => $this->_prefix.'_sale_adult_price',
                     'discount_adult_price'  => $this->_prefix.'_discount_adult_price',
                     'sale_infant_price'     => $this->_prefix.'_sale_infant_price',
                     'discount_infant_price' => $this->_prefix.'_discount_infant_price',
                     'sale_child_price'      => $this->_prefix.'_sale_child_price',
                     'discount_child_price'  => $this->_prefix.'_discount_child_price',
                     'adult_amount_booking'  => $this->_prefix.'_adult_amount_booking',
                     'child_amount_booking'  => $this->_prefix.'_child_amount_booking',
                     'infant_amount_booking'  => $this->_prefix.'_child_amount_booking',
                     'total_adult_price'     => $this->_prefix.'_total_adult_price',
                     'total_child_price'     => $this->_prefix.'_total_child_price',
                     'total_infant_price'    => $this->_prefix.'_total_infant_price',
                     'total_price'           => $this->_prefix.'_total_price',
                     'cr_date'               => $this->_prefix.'_cr_date',
                     'cr_uid'                => $this->_prefix.'_cr_uid',
                     'lu_date'               => $this->_prefix.'_lu_date',
                     'lu_uid'                => $this->_prefix.'_lu_uid'
    );
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
    }else if(isset($args["tob_tourcustomer_id"])){
      //Get category by id      
      $this->db->order_by('CONVERT( tob_price_name USING tis620 ) ASC');   
      $query = $this->db->get_where('ci_tourbooking', array('tob_tourcustomer_id' => $args["tob_tourcustomer_id"]));

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( tob_price_name USING tis620 ) ASC');    
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

      foreach ($data as $key => $value) {
        foreach ($value as $columnName => $columnValue) {
          $this->db->set($columnName, $columnValue); 
        }

        $this->db->insert($this->_table);
      }

      return ;
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