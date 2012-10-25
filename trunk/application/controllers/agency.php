<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    //echo "tour";
    $this->read();
  }
  

  function create($id=false){
    //implement code here  

    $args = $this->input->post();

    $validate = $this->validate($args);
    

    if($id){
      $args["id"] = $id;
      $data["agency"] = $this->agencyModel->getRecord($args);

      //print_r($data); exit;
      if($data["agency"]>0){
        $this->_fetch('update_form', $data);
      }else{
        $this->_fetch('create_form');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('create_form');
      }else{
        $this->agencyModel->addRecord($args);
        $data["agency"] = $this->agencyModel->getRecord();  
        $data["message"] = "Create successful !!!";
        $this->_fetch('list', $data);  
      }
    }

  }

  
  function read($id=false){
    //implement code here

    $args["id"] = $id;
    if($args["id"]){
      $data["agency"] = $this->agencyModel->getRecord($args);  
      $this->_fetch('list', $data);
    }else{
      $data["agency"] = $this->agencyModel->getRecord();  
      $this->_fetch('list', $data);
    }

  }

  function update(){

    $args = $this->input->post();
  
    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->agencyModel->updateRecord($args);
        $data["agency"] = $this->agencyModel->getRecord();  
        $data["message"] = "Update successful !!!";
        $this->_fetch('list', $data);     
    } else {
        $this->agencyModel->addRecord($args);
    } 


  } 

  function delete($id=false){
    //implement code here
    if($id) {
        $this->agencyModel->deleteRecord($id);

        $data["agent"] = $this->agencyModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('list', $data);        
    } 
  } 

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('firstname', 'firstname', 'required');
    $this->form_validation->set_rules('lastname', 'lastname', 'required');

    return $this->form_validation->run();

  }


  function phpsearch($keyword=false){
    $args["agn_name"] = $keyword;
    $data["agency"] = $this->agencyModel->searchRecord($args);
    $this->_fetch('phparray', $data, false, true);
  }  

  function hasdata($keyword=false){
    $args["notlike"] = "yes";
    $args["agn_name"] = $keyword;
    $data["agency"] = $this->agencyModel->searchRecord($args);
    $this->_fetch('textarray', $data, false, true);
  } 
}

?>