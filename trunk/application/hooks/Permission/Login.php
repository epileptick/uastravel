<?php

class Login {

  private $CI;

  public function __construct(){
    $this->CI =& get_instance();
  }

  public function checkLogin(){
    $this->CI->load->library('facebook', array(
      'appId'     =>  $this->CI->config->item('appId'),
      'secret'    => $this->CI->config->item('secret'),
      'cookie' => true,
      'fileUpload' => true
    ));
    $user_data = $this->CI->session->userdata("user_data");
    if(empty($user_data["fbid"])){
      $this->CI->session->sess_destroy();
    }
    if($this->CI->uri->segment(1) == "admin"){
      if(!empty($user_data["group"]) AND ($user_data["group"] != 1)){
        show_404();
      }
    }
    if(($this->CI->session->userdata("logged_in") === NULL OR $this->CI->session->userdata("logged_in") === FALSE OR $this->CI->session->userdata("logged_in") === 0) AND  $this->CI->uri->segment(1) == "admin"){
      if($this->CI->router->class != "user"){
        redirect(base_url(),"refresh");
      }
    }else{
      //echo "Cache disable!";
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
