<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function admin_index(){
    //Default function for call read method
    $keyword = $this->input->post();

    if($keyword){
      $this->_search();
    }else{
      $this->admin_list();
    }
  }
  

  function admin_create($id=false){
    //implement code here  

    $args = $this->input->post();

    $validate = $this->validate($args);
    

    if($id){
      $args["id"] = $id;
      $data["agency"] = $this->agencyModel->getRecord($args);

      //print_r($data); exit;
      if($data["agency"]>0){
        $this->_fetch('admin_update', $data);
      }else{
        $this->_fetch('admin_create');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('admin_create');
      }else{
        $this->agencyModel->addRecord($args);
        $data["agency"] = $this->agencyModel->getRecord();  
        $data["message"] = "Create successful !!!";
        $this->_fetch('admin_list', $data);  
      }
    }

  }

  function admin_list(){
    $data["agency"] = $this->agencyModel->getRecord();  
    $this->_fetch('admin_list', $data);
  }

  function admin_view($id=false){
    //implement code here

    $args["id"] = $id;
    if($args["id"]){
      $data["agency"] = $this->agencyModel->getRecord($args);  
      $this->_fetch('admin_list', $data);
    }else{
      $data["agency"] = $this->agencyModel->getRecord();  
      $this->_fetch('admin_list', $data);
    }

  }

  function admin_update(){

    $args = $this->input->post();
    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->agencyModel->updateRecord($args);
        $data["agency"] = $this->agencyModel->getRecord();  
        $data["message"] = "Update successful !!!";
        $this->_fetch('admin_list', $data);     
    } else {
        $this->agencyModel->addRecord($args);
    } 


  } 

  function admin_delete($id=false){
    //implement code here
    if($id) {
        $this->agencyModel->deleteRecord($id);

        $data["agency"] = $this->agencyModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('admin_list', $data);        
    } 
  } 

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('firstname', 'firstname', 'required');
    $this->form_validation->set_rules('lastname', 'lastname', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('telephone', 'telephone', 'required');

    return $this->form_validation->run();

  }


  function _search(){
    //Get argument from post page
    $keyword = $this->input->post();

    if($keyword){
      $args["agn_name"] = $keyword["search"];
      $data["agency"] = $this->agencyModel->searchRecord($args);
      $this->_fetch('admin_list', $data);
    }else{
      return;
    }
  }


  function phpsearch($keyword=false){
    $args["agn_name"] = $keyword;
    $data["agency"] = $this->agencyModel->searchRecord($args);
    $this->_fetch('user_phparray', $data, false, true);
  }  

  function hasdata($keyword=false){
    $args["notlike"] = "yes";
    $args["agn_name"] = $keyword;
    $data["agency"] = $this->agencyModel->searchRecord($args);
    $this->_fetch('user_textarray', $data, false, true);
  } 
}

?>