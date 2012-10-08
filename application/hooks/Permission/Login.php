<?php

class Login {

  private $CI;
  
  public function __construct(){
    $this->CI =& get_instance();
  }
  
  public function checkLogin(){
    
    if($this->CI->session->userdata("logged_in")===NULL||$this->CI->session->userdata("logged_in")===FALSE||$this->CI->session->userdata("logged_in")===0){
      /*
      if($this->CI->router->method != "login"){
        redirect(base_url("/user/login/"),"refresh");
      }
      */
      
    }else{
      
    }
    
  }
}

?>