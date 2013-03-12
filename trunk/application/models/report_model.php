<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report_model extends MY_Model {

  function __construct(){
    parent::__construct();

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
  
/*
  function getTourBookingRecord($args=false, $field=false){

    if(isset($args["name"])){
      //Get category by name
      $query = $this->db->get_where('ci_agency', array('agn_name' => $args["name"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_agency', array('agn_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( agn_name USING tis620 ) ASC');    
      $query = $this->db->get("ci_agency");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    
  }


*/
  function getTourBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_tourcustomer', array('toc_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["toc_hashcode"] = $args["hashcode"];

      $this->load->model("tourcustomer_model", "tourcustomerModel");
      $booking = $this->tourcustomerModel->getRecord($args);  


      $this->load->model("tourbooking_model", "tourbookingModel");
      $args["tob_tourcustomer_id"] = $booking[0]->toc_id;
      $booking[0]->price = $this->tourbookingModel->getRecord($args); 

      //print_r($booking); exit;
      //Get all agency by tour_id
      $this->db->join('ci_agency', 'ci_agency.agn_id = ci_price.pri_agency_id');
      $this->db->where("pri_tour_id", $booking[0]->toc_tour_id);  
      $this->db->group_by("ci_price.pri_agency_id");    
      $query = $this->db->get("ci_price");
      $agencies = $query->result(); 
      //print_r($this->db->last_query());
      //print_r($agencies); exit;
 
      $data["booking"] = $booking;
      $data["agencies"] = $agencies;
//print_r($data); exit;
      return $data;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourcustomer', array('toc_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( toc_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_tourcustomer");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    } 


  }
 


function getTourOperatorBookingRecord($args=false, $field=false){

   if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_tourcustomer', array('toc_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["toc_hashcode"] = $args["hashcode"];

      $this->load->model("tourcustomer_model", "tourcustomerModel");
      $booking = $this->tourcustomerModel->getRecord($args);  


      $this->load->model("tourbooking_model", "tourbookingModel");
      $args["tob_tourcustomer_id"] = $booking[0]->toc_id;
      $booking[0]->price = $this->tourbookingModel->getRecord($args); 

      //print_r($booking); exit;
      //Get all agency by tour_id
      $this->db->join('ci_agency', 'ci_agency.agn_id = ci_price.pri_agency_id');
      $this->db->where("pri_tour_id", $booking[0]->toc_tour_id);
      //$this->db->group_by("ci_price.pri_agency_id");      
      $query = $this->db->get("ci_price");
      $agencies = $query->result(); 


      //echo $this->db->last_query(); exit;
      //print_r($this->db->last_query());
      //print_r($agencies); exit;
      $this->db->join('ci_agency', 'ci_agency.agn_id = ci_price.pri_agency_id');
      $this->db->where("pri_tour_id", $booking[0]->toc_tour_id); 
      $this->db->group_by("ci_price.pri_agency_id");      
      $query = $this->db->get("ci_price");
      $getprice = $query->result();
 

      $data["getprice"] = $getprice;
      $data["booking"] = $booking;
      $data["agencies"] = $agencies;
//print_r($data); exit;
      return $data;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourcustomer', array('toc_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( toc_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_tourcustomer");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    } 

  }
 

  function searchTourBookingRecord($args=false){
    if($args){
      if(isset($args["notlike"])){
        $this->db->where("toc_code", $args["toc_code"]);
        $this->db->order_by("toc_code", "asc");        
        $query = $this->db->get("ci_tourcustomer");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }else{    
        $this->db->like($args);
        $query = $this->db->get("ci_tourcustomer");
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



  function getHotelBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["hoc_hashcode"] = $args["hashcode"];

      $this->load->model("hotelcustomer_model", "hotelcustomerModel");
      $booking = $this->hotelcustomerModel->getRecord($args);  
      

      $this->load->model("hotelbooking_model", "hotelbookingModel");
      $args["hob_hotelcustomer_id"] = $booking[0]->hoc_id;
      $booking[0]->price = $this->hotelbookingModel->getRecord($args); 

      return $booking;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( hoc_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_hotelcustomer");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }   
  }

  function getHotelOperatorBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["hoc_hashcode"] = $args["hashcode"];

      $this->load->model("hotelcustomer_model", "hotelcustomerModel");
      $booking = $this->hotelcustomerModel->getRecord($args);  
      

      $this->load->model("hotelbooking_model", "hotelbookingModel");
      $args["hob_hotelcustomer_id"] = $booking[0]->hoc_id;
      $booking[0]->price = $this->hotelbookingModel->getRecord($args); 

      return $booking;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( hoc_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_hotelcustomer");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }   
  }
 

  function searchHotelBookingRecord($args=false){
    if($args){
      if(isset($args["notlike"])){
        $this->db->where("hoc_code", $args["hoc_code"]);
        $this->db->order_by("hoc_code", "asc");        
        $query = $this->db->get("ci_hotelcustomer");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }else{    
        $this->db->like($args);
        $query = $this->db->get("ci_hotelcustomer");
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



    function getAirlineBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_airlinebooking', array('flt_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["flt_hashcode"] = $args["hashcode"];

      $this->load->model("airlinebooking_model", "airlinebookingModel");
      $booking = $this->airlinebookingModel->getRecord($args);  
      

      $this->load->model("airlinebooking_model", "airlinebookingModel");
      $args["flt_id"] = $booking[0]->flt_id;
      $booking[0]->price = $this->airlinebookingModel->getRecord($args); 

      return $booking;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_airlinebooking', array('flt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( flt_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_airlinebooking");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }   
  }

function getAirlineOperatorBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_airlinebooking', array('flt_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["flt_hashcode"] = $args["hashcode"];

      $this->load->model("airlinebooking_model", "airlinebookingModel");
      $booking = $this->airlinebookingModel->getRecord($args);  
      

      $this->load->model("airlinebooking_model", "airlinebookingModel");
      $args["flt_id"] = $booking[0]->flt_id;
      $booking[0]->price = $this->airlinebookingModel->getRecord($args); 

      return $booking;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_airlinebooking', array('flt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( flt_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_airlinebooking");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }   
  }

 

  function searchAirlineBookingRecord($args=false){
    if($args){
      if(isset($args["notlike"])){
        $this->db->where("flt_code", $args["flt_code"]);
        $this->db->order_by("flt_code", "asc");        
        $query = $this->db->get("ci_airlinebooking");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }else{    
        $this->db->like($args);
        $query = $this->db->get("ci_airlinebooking");
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


   function getCarBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_carbooking', array('cab_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["cab_hashcode"] = $args["hashcode"];

      $this->load->model("carbooking_model", "carbookingModel");
      $booking = $this->carbookingModel->getRecord($args);  
      

      $this->load->model("carbooking_model", "carbookingModel");
      $args["cab_id"] = $booking[0]->cab_id;
      $booking[0]->price = $this->carbookingModel->getRecord($args); 

      return $booking;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_carbooking', array('cab_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( cab_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_carbooking");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }   
  }


  function getCarOperatorBookingRecord($args=false, $field=false){

    if(isset($args["code"])){
      //Get category by name
      $query = $this->db->get_where('ci_carbooking', array('cab_code' => $args["code"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if($args["hashcode"]){
      //print_r($args["hashcode"]); exit;
      $args["cab_hashcode"] = $args["hashcode"];

      $this->load->model("carbooking_model", "carbookingModel");
      $booking = $this->carbookingModel->getRecord($args);  
      

      $this->load->model("carbooking_model", "carbookingModel");
      $args["cab_id"] = $booking[0]->cab_id;
      $booking[0]->price = $this->carbookingModel->getRecord($args); 

      return $booking;

      //print_r($data["booking"]); exit;

    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_carbooking', array('cab_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( cab_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_carbooking");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }   
  }

  function searchCarBookingRecord($args=false){
    if($args){
      if(isset($args["notlike"])){
        $this->db->where("cab_code", $args["cab_code"]);
        $this->db->order_by("cab_code", "asc");        
        $query = $this->db->get("ci_carbooking");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }else{    
        $this->db->like($args);
        $query = $this->db->get("ci_carbooking");
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