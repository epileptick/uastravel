<?php

class Login {

  private $CI;
  
  public function __construct(){
    $this->CI =& get_instance();
  }
  
  public function checkLogin(){
    if(($this->CI->session->userdata("logged_in") === NULL OR $this->CI->session->userdata("logged_in") === FALSE OR $this->CI->session->userdata("logged_in") === 0) AND  $this->CI->uri->segment(1) == "admin"){
      if($this->CI->router->class != "user"){
        redirect(base_url("user/login"),"refresh");
      }
    }else{
      
    }
    
  }
}
