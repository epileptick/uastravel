<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    
  }
  
  function view($id=""){
    if($id==""){
      show_error($this->lang->line("post_lang_id_not_exist"));
    }
    echo "Post ID: $id";
    
  }
  
  function add(){
  
    if($this->input->post("submit") != NULL){
      $postData = $this->postModel->add($this->input->post());
      if($postData){
        $this->_fetch('add_success');
      }else{
        echo "submit failed";
      }
    }else{
      $this->_fetch('add_form');
    }
    
    
  }
}

?>