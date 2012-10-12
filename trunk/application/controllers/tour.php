<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    //echo "tour";
    $this->read();
  }
  

  function create($id=false){
    //implement code here  
    //print_r($id); exit;
    //Load another model
    //$this->load->model("tour_model","tourModel");

    $data= $this->input->post();
    $validate = $this->validate($data);


    if($id){
      $data["tour"] = $this->tourModel->getRecord($id);

      if($data["tour"]>0){
        $this->_fetch('update_form', $data);
      }else{
        $this->_fetch('create_form');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('create_form');
      }else{
        $this->tourModel->addRecord($data);
        $this->_fetch('create_success');
      }
    }

  }

  
  function read(){
    //implement code here

    $this->_fetch('read');
  }

  function update(){


    $data= $this->input->post();
    $validate = $this->validate($data);

    //print_r($data); exit;

    if($data["id"]) {
        $this->tourModel->updateRecord($data);
    } else {
        $this->tourModel->addRecord($data);
    } 

    $this->_fetch('create_success');

  } 

  function delete(){
    //implement code here

  }  

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'tour name', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('detail', 'detail', 'required');
    $this->form_validation->set_rules('included', 'included', 'required');

    //Validate price
    $this->form_validation->set_rules('net_adult_price', 'net price for adult', 'required|integer');
    $this->form_validation->set_rules('net_child_price', 'net price for child', 'required|integer');
    $this->form_validation->set_rules('sale_adult_price', 'sale price for adult', 'required|integer');
    $this->form_validation->set_rules('sale_child_price', 'sale price for child', 'required|integer');

    //Validate time
    $this->form_validation->set_rules('start_time', 'start time', 'required');
    $this->form_validation->set_rules('end_time', 'end time', 'required');

    return $this->form_validation->run();

  }

}

?>