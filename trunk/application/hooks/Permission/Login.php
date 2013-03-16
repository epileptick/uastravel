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
      echo "Cache disable!";
      $this->CI->load->driver('cache');
      $this->CI->cache->clean();
      $this->CI->output->cache(0);
      $this->CI->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
      $this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->CI->output->set_header('Pragma: no-cache');
      $this->CI->output->set_header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    }

  }
}
