<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function admin_index(){
    $keyword = $this->input->post();
    if($keyword){
      $this->_search("admin_list");
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
      $data["tag"] = $this->tagModel->getRecord($args);

      //print_r($data); exit;
      if($data["tag"]>0){
        $this->_fetch('admin_update', $data);
      }else{
        $this->_fetch('admin_create');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('admin_create');
      }else{
        $this->tagModel->addRecord($args);
        $data["tag"] = $this->tagModel->getRecord();  
        $data["message"] = "Create successful !!!";
        $this->_fetch('admin_list', $data);  
      }
    }

  }

  
  function admin_list($tag=false){
    //implement code here
    if($tag){
      if(is_numeric($tag)){
        $args["id"] = $tag;  
        $data["tag"] = $this->tagModel->getRecord($args);  
        $this->_fetch('admin_list', $data);
      }else{

        $args["name"] = $tag;        
        $data["tag"] = $this->tagModel->getRecord($args);  
        $this->_fetch('admin_list', $data);
      }
    }else{
      $data["tag"] = $this->tagModel->getRecord();
      $this->_fetch('admin_list', $data);
    }
   
  }

  
  function admin_update(){

    $args = $this->input->post();
  
    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->tagModel->updateRecord($args);

        $data["tag"] = $this->tagModel->getRecord();  
        $data["message"] = "Update successful !!!";
        $this->_fetch('admin_list', $data);       
    } else {
        $this->tagModel->addRecord($args);
    } 
  } 

  function admin_delete($id=false){
    //implement code here
    if($id) {
        $args["id"] = $id;
        $this->tagModel->deleteRecord($args);

        $data["tag"] = $this->tagModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('admin_list', $data);        
    } 
  }  
  


  function _search($render = "user_list"){
    //Get argument from post page
    $keyword = $this->input->post();


    if($keyword){
      $args["tag_name"] = $keyword["search"];
      $data["tag"] = $this->tagModel->searchRecord($args);
      $this->_fetch($render, $data);
    }else{
      return;
    }
  }


  function search($keyword=false){
    //implement code here

    $args["tag_name"] = $keyword;

    if($keyword){
      $data["tag"] = $this->tagModel->searchRecord($args);
      $this->_fetch('user_list', $data);
    }else{
      return;
    }
  }


  function jsonsearch($keyword=false){
    //implement code here

    $args["tag_name"] = $keyword;
    # JSON-encode the response
    $data["tag"] = json_encode($this->tagModel->searchRecord($args));
    $this->_fetch('user_json', $data, false, true);
  }


  function jssearch($keyword=false){

    //print_r($keyword);
    $tag["tag_name"] = $keyword;
    $data["tag"] = $this->tagModel->searchRecord($tag);
    $this->_fetch('user_jsarray', $data, false, true);
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