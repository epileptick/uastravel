<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Airline extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function user_index(){

    //Check class
    if($this->uri->segment(1) == $this->router->class){
      $index = 1;
    }else if($this->uri->segment(2) == $this->router->class){
      $index = 2;
    }

    //Check path
    if($this->uri->segment($index+1) == "inquiry"){
      $this->user_inquiry();
    }else if($this->uri->segment($index+1) == "booking"){
      //Retrive input from booking form
      $args = $this->input->post(); 
      $this->user_booking($args);
    }
  }


  function user_inquiry(){
    $this->_fetch('user_inquiry', false, false, true);
  }

  function user_booking($args){


    //print_r($args); 
    $data = array();
    if(!empty($args)){

      //$error = array();
      if(trim($args['flt_firstname']) == ""){
        $data['error'][] = "Please enter firstname.";
      }

      if(trim($args['flt_lastname']) == ""){
        $data['error'][]  = "Please enter lastname.";
      }

      $this->_fetch('user_inquiry', $data, false, true);   
    }else{
      $data['error'][]  = "Please enter require field.";
      $this->_fetch('user_inquiry', $data, false, true);   
    }

/*
      $this->load->model("airlinebooking_model", "airlinebookingModel");
      $booking = $this->airlinebookingModel->addRecord($args);

      $this->sendmail_booking_user($booking);
      $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url("tour/booking/".$booking["tob_hashcode"]));  
*/
      //print_r($insert_id); exit;
    

  }
}

?>