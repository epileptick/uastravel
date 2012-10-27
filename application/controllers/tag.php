<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller {
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
      $data["tag"] = $this->tagModel->getRecord($args);

      //print_r($data); exit;
      if($data["tag"]>0){
        $this->_fetch('update_form', $data);
      }else{
        $this->_fetch('create_form');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('create_form');
      }else{
        $this->tagModel->addRecord($args);
        $data["tag"] = $this->tagModel->getRecord();  
        $data["message"] = "Create successful !!!";
        $this->_fetch('list', $data);  
      }
    }

  }

  
  function read($tag=false){
    //implement code here
    if($tag){
      if(is_numeric($tag)){
        $args["id"] = $tag;  
        $data["tag"] = $this->tagModel->getRecord($args);  
        $this->_fetch('list', $data);
      }else{

        $args["name"] = $tag;        
        $data["tag"] = $this->tagModel->getRecord($args);  
        $this->_fetch('list', $data);
      }
    }else{
      $data["tag"] = $this->tagModel->getRecord();
      $this->_fetch('list', $data);
    }
   
  }
  
  function search($keyword=false){
    //implement code here

    $args["tag_name"] = $keyword;

    if($keyword){
      $data["tag"] = $this->tagModel->searchRecord($args);
      $this->_fetch('list', $data);
    }else{
      return;
    }
  }


  function jsonsearch($keyword=false){
    //implement code here

    $args["tag_name"] = $keyword;
    # JSON-encode the response
    $data["tag"] = json_encode($this->tagModel->searchRecord($args));
    $this->_fetch('json', $data, false, true);
  }


  function jssearch($keyword=false){

    //print_r($keyword);
    $tag["tag_name"] = $keyword;
    $data["tag"] = $this->tagModel->searchRecord($tag);
    $this->_fetch('jsarray', $data, false, true);
  }


  function update(){

    $args = $this->input->post();
  
    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->tagModel->updateRecord($args);

        $data["tag"] = $this->tagModel->getRecord();  
        $data["message"] = "Update successful !!!";
        $this->_fetch('list', $data);       
    } else {
        $this->tagModel->addRecord($args);
    } 
  } 

  function delete($id=false){
    //implement code here
    if($id) {
        $this->tagModel->deleteRecord($id);

        $data["tag"] = $this->tagModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('list', $data);        
    } 
  }  

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'tag name', 'required');

    return $this->form_validation->run();

  }

}

?>