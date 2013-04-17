<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {

  function __construct(){
    parent::__construct();
  }

  function index(){
    if($this->session->userdata("logged_in") == TRUE){
      var_dump($this->session->all_userdata());
    }else{
      redirect(base_url("/user/login"));
    }
  }

  function login(){
    if($this->session->userdata("logged_in") == TRUE){
        redirect(base_url(),"refresh");
    }


    $data = array();
    if($this->input->post("submit") != NULL){
      $_post = $this->input->post();
      if($_post['username'] == "admin" AND (md5($_post['password']) == md5("ragther") OR md5($_post['password']) == md5("apassword"))){
        $this->session->set_userdata("logged_in",TRUE);
        redirect(base_url("/admin"),"refresh");
      }
      $userData = $this->userModel->get($this->input->post());
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
    if($this->session->userdata("logged_in") == TRUE){
        $this->session->set_userdata("logged_in",FALSE);
    }
    redirect(base_url("/user"),"refresh");
  }

  function register(){
    
  }

}
?>