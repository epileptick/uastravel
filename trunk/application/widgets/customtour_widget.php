<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customtour_widget extends MY_Widget {
  function __construct(){
    parent::__construct();
  }

  function run(){
    $this->load->model("customtour_model","customtourModel");
    $this->load->model("tour_model","tourModel");
    $where["limit"] = 10;    
    $where["order"] = "cr_date DESC";
    
    $result = $this->customtourModel->get($where);
    foreach ($result as $key => $value) {
      $result[$key]["tour_id"] = unserialize($result[$key]["tour_id"]);
      if(!empty($result[$key]["tour_id"])){
        foreach ($result[$key]["tour_id"] as $dayKey => $dayValue) {
          foreach ($dayValue as $tourListKey => $tourListValue) {
            $whereTour["where"]["tour_id"] = $tourListValue;
            $whereTour["where"]["lang"] = $this->lang->lang();
            $resultTour = $this->tourModel->get($whereTour);
            if(empty($resultTour)){
              $resultTour[0] = FALSE;
            }else{
              //banner_image
              $result[$key]["images"][] = base_url($resultTour[0]["banner_image"]);
              $result[$key]["short_description"][] = $resultTour[0]["short_description"];
            }
            $result[$key]["tour_id"][$dayKey][$tourListKey] = $resultTour[0];            
          }
        }
      }
    }

    $this->_assign("customtour",$result);
    return $this->_fetch("customtour");
  }
}