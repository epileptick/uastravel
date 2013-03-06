<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TourCustomer_model extends MY_Model {

  function __construct(){
    parent::__construct();
  }



  function getRecord($args=false, $field=false){
    //print_r($args); exit;

    if(isset($args["toc_id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourcustomer', array('toc_id' => $args["toc_id"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["toc_code"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourcustomer', array('toc_code' => $args["toc_code"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["toc_hashcode"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tourcustomer', array('toc_hashcode' => $args["toc_hashcode"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( toc_code USING tis620 ) ASC');    
      $query = $this->db->get("ci_tourcustomer");

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
      $tourBooking = $data["tob_price"];
      unset($data["tob_price"]);


      //Customer
      $tourCustomer = $data;

      //Generate hashcode
      $last_id = $this->db->query("SELECT MAX(toc_id) as toc_id from ci_tourcustomer")->row();
      $next_id = $last_id->toc_id+1;        
      $id = $next_id;
      $digit = 6-strlen($id); 
      $code = "B"; 
      for ($i=0; $i < $digit; $i++) { 
        $code .= "0";
      }
      $code .= $id;
      $hashcode = Hash::gen()->hash($code);

      $tourCustomer["toc_hashcode"] = $hashcode;
      $tourCustomer["toc_code"] = $code;   

      //Tranfer date
      $dateExplode = explode("/", $data["toc_tranfer_date"]);
      $toc_tranfer_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];  
      $tourCustomer["toc_tranfer_date"] = $toc_tranfer_date;

      //Date default
      $tourCustomer["toc_cr_date"] = date("Y-m-d H:i:s");
      $tourCustomer["toc_lu_date"] = date("Y-m-d H:i:s");      
      //print_r($tourCustomer);exit;

      foreach ($tourCustomer as $columnName => $columnValue) {
        $this->db->set($columnName, $columnValue); 
      }



      //Insert customer
      $this->db->insert("ci_tourcustomer");
      //echo $this->db->last_query();exit;
      $current_customer_id = $this->db->insert_id();
      foreach ($tourBooking as $key => $value) {
        $tourBooking[$key]["tob_tourcustomer_id"] = $current_customer_id; 

        //Date default
        $tourBooking[$key]["tob_cr_date"] = date("Y-m-d H:i:s");
        $tourBooking[$key]["tob_lu_date"] = date("Y-m-d H:i:s"); 
      }

      $this->load->model("tourbooking_model", "tourbookingModel");
      $this->tourbookingModel->addRecord($tourBooking);
      //Booing price
      //print_r($tourBooking); exit;

      $tourPrice["price"] = $tourBooking;
      $booking = $tourCustomer+ $tourPrice;

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
      $this->db->where("toc_id", $id);
      $this->db->delete("ci_tourcustomer");
    }
  }


  function searchRecord($args=false){

  }  
}
?>