<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HotelCustomer_model extends MY_Model {

  function __construct(){
    parent::__construct();
  }



  function getRecord($args=false, $field=false){
    //print_r($args); exit;

    if(isset($args["hoc_id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_id' => $args["hoc_id"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["hoc_code"])){
      //Get category by id      
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_code' => $args["hoc_code"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["hoc_hashcode"])){
      //Get category by id      
      $query = $this->db->get_where('ci_hotelcustomer', array('hoc_hashcode' => $args["hoc_hashcode"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( hoc_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_hotelcustomer");

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }    

  }


  function addRecord($data=false){

    if($data){

      //Price
     $hotelBooking = $data["hob_price"];
     unset($data["hob_price"]);


      //Customer
      $hotelCustomer = $data;

      //Generate hashcode
      $last_id = $this->db->query("SELECT MAX(hoc_id) as hoc_id from ci_hotelcustomer")->row();
      $next_id = $last_id->hoc_id+1;        
      $id = $next_id;
      $digit = 6-strlen($id); 
      $code = "B"; 
      for ($i=0; $i < $digit; $i++) { 
        $code .= "0";
      }
      $code .= $id;
      $hashcode = Hash::gen()->hash($code);

      $hotelCustomer["hoc_hashcode"] = $hashcode;
      $hotelCustomer["hoc_code"] = $code;   


      //Tranfer date
      $dateExplode = explode("/", $data["hoc_checkin_date"]);
      $hoc_checkin_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];  
      $hotelCustomer["hoc_checkin_date"] = $hoc_checkin_date;

      $dateExplode = explode("/", $data["hoc_checkout_date"]);
      $hoc_checkout_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];  
      $hotelCustomer["hoc_checkout_date"] = $hoc_checkout_date;

      //Date default
      $hotelCustomer["hoc_cr_date"] = date("Y-m-d H:i:s");
      $hotelCustomer["hoc_lu_date"] = date("Y-m-d H:i:s");      

      foreach ($hotelCustomer as $columnName => $columnValue) {
        $this->db->set($columnName, $columnValue); 
      }



      //Insert customer
      $this->db->insert("ci_hotelcustomer");
      $current_customer_id = $this->db->insert_id();
      foreach ($hotelBooking as $key => $value) {
        $hotelBooking[$key]["hob_hotelcustomer_id"] = $current_customer_id; 

        //Date default
        $hotelBooking[$key]["hob_cr_date"] = date("Y-m-d H:i:s");
        $hotelBooking[$key]["hob_lu_date"] = date("Y-m-d H:i:s"); 
      }

      $this->load->model("hotelbooking_model", "hotelbookingModel");
      $this->hotelbookingModel->addRecord($hotelBooking);
      //Booing price
      //print_r($tourBooking); exit;

      $hotelPrice["price"] = $hotelBooking;
      $booking = $hotelCustomer+ $hotelPrice;

      //print_r($booking); exit;

      return $booking;
    }else{
      return ;
    }

  }
  

  function updateRecord($data=false){
    return ;
  }

  function deleteRecord($id=false){
    if($id){
      $this->db->where("hoc_id", $id);
      $this->db->delete("ci_hotelcustomer");
    }
  }


  function searchRecord($args=false){

  }  
}
?>