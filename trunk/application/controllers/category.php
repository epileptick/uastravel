<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {
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
      $data["category"] = $this->categoryModel->getRecord($args);

      //print_r($data); exit;
      if($data["category"]>0){
        $this->_fetch('update_form', $data);
      }else{
        $this->_fetch('create_form');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('create_form');
      }else{
        $this->categoryModel->addRecord($args);
        $data["agent"] = $this->categoryModel->getRecord();  
        $data["message"] = "Create successful !!!";
        $this->_fetch('list', $data);  
      }
    }

  }

  
  function read($id=false){
    //implement code here

    $args["id"] = $id;
    if($args["id"]){
      $data["category"] = $this->categoryModel->getRecord($args);  
      $this->_fetch('list', $data);
    }else{
      $data["category"] = $this->categoryModel->getRecord();
      $this->_fetch('list', $data);
    }

  }

  function update(){

    $args = $this->input->post();
  
    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->categoryModel->updateRecord($args);

        $data["agent"] = $this->categoryModel->getRecord();  
        $data["message"] = "Update successful !!!";
        $this->_fetch('list', $data);       
    } else {
        $this->categoryModel->addRecord($args);
    } 


  } 

  function delete($id=false){
    //implement code here
    if($id) {
        $this->categoryModel->deleteRecord($id);

        $data["agent"] = $this->categoryModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('list', $data);        
    } 
  }  

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'category name', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');

    return $this->form_validation->run();

  }

}

?>