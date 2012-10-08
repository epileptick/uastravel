<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {
  
  function __construct(){
    parent::__construct();
  }
  function index(){
    $this->_fetch("index");
  }
  function login(){
    if($this->session->userdata("logged_in",TRUE)){
        redirect(base_url("/user"),"refresh");
    }
    
    $data = array();
    
    if($this->input->post("submit") != NULL){
      $userData = $this->userModel->checkLogin($this->input->post());
      $data = $userData;
      if($userData != FALSE){
        $this->session->set_userdata("logged_in",TRUE);
        $this->session->set_userdata("userdata",$userData);
        redirect(base_url(),"refresh");
      }else{
        $data["error"] = $this->userModel->getError();
      }
    }

    $this->_fetch("login",$data);
  }
  
  function logout(){
    if($this->session->userdata("logged_in",TRUE)){
        $this->session->set_userdata("logged_in",FALSE);
        redirect(base_url("/user"),"refresh");
    }
  }
  
  function register(){
    
  }
  
}
?>