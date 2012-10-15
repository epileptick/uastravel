<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    $this->read();
  }
  

  function create($id=false){
    //implement code here  

    $args = $this->input->post();

    $validate = $this->validate($args);
    

    if($id){
      $args["id"] = $id;
      $data["language"] = $this->languageModel->getRecord($args);

      //print_r($data); exit;
      if($data["language"]>0){
        $this->_fetch('update_form', $data);
      }else{
        $this->_fetch('create_form');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('create_form');
      }else{
        $this->languageModel->addRecord($args);
        $this->_fetch('create_success');
      }
    }

  }

  
  function read($id=false){
    //implement code here

    $args["id"] = $id;
    if($args["id"]){
      $data["language"] = $this->languageModel->getRecord($args);  
      $this->_fetch('list', $data);
    }else{
      $data["language"] = $this->languageModel->getRecord();  
      $this->_fetch('list', $data);
    }

  }

  function update(){

    $args = $this->input->post();
  
    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->languageModel->updateRecord($args);
        //exit;
        $this->_fetch('create_success');        
    } else {
        $this->languageModel->addRecord($args);
    } 


  } 

  function delete($id=false){
    //implement code here
    if($id) {
        $this->languageModel->deleteRecord($id);

        $data["language"] = $this->languageModel->getRecord();  
        $this->_fetch('list', $data);        
    } 
  }  

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'language name', 'required');

    return $this->form_validation->run();

  }

}

?>