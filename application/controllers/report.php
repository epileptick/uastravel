<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function admin_index(){
    //Default function for call read method
   
    $segment2 = $this->uri->segment(2);    
    $segment3 = $this->uri->segment(3);    
    $segment4 = $this->uri->segment(4);
    $segment5 = $this->uri->segment(5);



    if($segment2 == "report" && !empty($segment3)){

      if($segment3 == "tour"){
        if($segment4 == "list"){
          $this->admin_listtourbooking(); 
        }else if($segment4 == "custom"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewtourbooking($args);
        }else if($segment4 == "admin"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewtouroperatorbooking($args);
        }
      }else if($segment3 == "hotel"){
              if($segment4 == "list"){
          $this->admin_listhotelbooking(); 
        }else if($segment4 == "custom"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewhotelbooking($args);
        }else if($segment4 == "admin"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewhoteloperatorbooking($args);
        }
      }else if($segment3 == "airline"){
        if($segment4 == "list"){
          $this->admin_listairlinebooking(); 
        }else if($segment4 == "custom"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewairlinebooking($args);
        }else if($segment4 == "operator"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewairlineoperatorbooking($args);
        }

      }else if($segment3 == "carrent"){
        if($segment4 == "list"){
          $this->admin_listcarbooking(); 
        }else if($segment4 == "custom"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewcarbooking($args);
        }else if($segment4 == "operator"){
          $args["hashcode"] = $this->uri->segment(5);
          $this->admin_viewcaroperatorbooking($args);
        }
      }

    }else if($segment2 == "report"){
      $this->admin_listreport(); 
    }

    //
    $keyword = $this->input->post();
    if($keyword){
      $this->_search();
    }
  }


 function admin_listreport(){
    $data["report"] = $this->reportModel->getTourBookingRecord();  
    $this->_fetch('admin_listreport', $data);
  }


  function admin_listtourbooking(){
    $data["report"] = $this->reportModel->getTourBookingRecord();  
    $this->_fetch('admin_listtourbooking', $data);

  }

  function admin_viewtourbooking($args = false , $id=false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data = $this->reportModel->getTourBookingRecord($args); 
    } 


   // print_r($data["agencies"]); exit;
    if(!empty($data)){ 
      $this->_fetch('admin_tourbookingview', $data, false, true);
    }else{
      show_404();  
    }
 
  }

  function admin_viewtouroperatorbooking($args = false , $id=false){
     $data = false;
    if(!empty($args["hashcode"])){
      $data = $this->reportModel->getTourOperatorBookingRecord($args); 
    } 


    //print_r($data["data"]); exit;
    if(!empty($data)){ 
      $this->_fetch('admin_touroperatorbookingview', $data, false, true);
    }else{
      show_404();  
    }
 
  }


  function admin_listhotelbooking(){
    $data["report"] = $this->reportModel->getHotelBookingRecord();  
    $this->_fetch('admin_listhotelbooking', $data);
  }


  function admin_viewhotelbooking($args = false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data["agencies"] = $this->reportModel->getHotelBookingRecord($args); 
    } 

    if(!empty($data["agencies"])){
      $this->_fetch('admin_hotelbookingview', $data, false, true);
    }else{
      show_404();  
    }
  }
  
  function admin_viewhoteloperatorbooking($args = false , $id=false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data["booking"] = $this->reportModel->getHotelOperatorBookingRecord($args); 
    } 

    if(!empty($data["booking"])){
      $this->_fetch('admin_hoteloperatorbookingview', $data, false, true);
    }else{
      show_404();  
    }
 
  }


  function admin_listairlinebooking(){
    $data["report"] = $this->reportModel->getAirlineBookingRecord();  
    $this->_fetch('admin_listairlinebooking', $data);
  }


  function admin_viewairlinebooking($args = false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data["booking"] = $this->reportModel->getAirlineBookingRecord($args); 
    } 

    if(!empty($data["booking"])){
      $this->_fetch('admin_airlinebookingview', $data, false, true);
    }else{
      show_404();  
    }
  }

    function admin_viewairlineoperatorbooking($args = false , $id=false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data["booking"] = $this->reportModel->getAirlineOperatorBookingRecord($args); 
    } 

    if(!empty($data["booking"])){
      $this->_fetch('admin_airlineoperatorbookingview', $data, false, true);
    }else{
      show_404();  
    }
 
  }


    function admin_listcarbooking(){
    $data["report"] = $this->reportModel->getCarBookingRecord();  
    $this->_fetch('admin_listcarbooking', $data);
  }


  function admin_viewcarbooking($args = false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data["booking"] = $this->reportModel->getCarBookingRecord($args); 
    } 

    if(!empty($data["booking"])){
      $this->_fetch('admin_carbookingview', $data, false, true);
    }else{
      show_404();  
    }
  }

    function admin_viewcaroperatorbooking($args = false){
    $data = false;
    if(!empty($args["hashcode"])){
      $data["booking"] = $this->reportModel->getCarOperatorBookingRecord($args); 
    } 

    if(!empty($data["booking"])){
      $this->_fetch('admin_caroperatorbookingview', $data, false, true);
    }else{
      show_404();  
    }
  }

/*
  function admin_list(){
    $data["report"] = $this->reportModel->getRecord();  
    $this->_fetch('admin_list', $data);
    //$this->load->model("tagtour_Model","tagtourModel");
    //$data ["tour"] = $this->tagtourModel->getRecordByType($args);
  }

  function admin_view($hashcode=false){
    //implement code here
    $args["toc_hashcode"] = $hashcode;

    $this->load->model("tourcustomer_model", "tourcustomerModel");
    $data["booking"] = $this->tourcustomerModel->getRecord($args);  


    $this->load->model("tourbooking_model", "tourbookingModel");
    $args["tob_tourcustomer_id"] = $data["booking"][0]->toc_id;
    $data["booking"][0]->price = $this->tourbookingModel->getRecord($args); 


    //print_r($data["booking"]); exit;

    if(!empty($data["booking"] )){
      $this->_fetch('admin_tourbookingview', $data, false, true);
    }else{
      show_404();  
    }

  }


  function _search(){
    //Get argument from post page
    $keyword = $this->input->post();

    if($keyword){
      $args["toc_code"] = $keyword["search"];
      $data["report"] = $this->reportModel->searchTourBookingRecord($args);
      $this->_fetch('admin_listtourbooking', $data);
    }else{
      return;
    }
  }
 */ 

}

?>