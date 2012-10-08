<?php
 
class CIUser {
 
    public static function getInfo($id="")
    {
      return new CIUserAttibutes($id);
    }
     
    public static function getAuthInfo()
    {
      //Load instant
      $CI =& get_instance();
      $logged_in = $CI->session->userdata("logged_in");
      if(!$logged_in){
        return FALSE;
      }
      $user = new CIUserAttibutes();
      
      return $user->getAttrs();
    }
    
}
 
class CIUserAttibutes {
 
    private $_user_id;
    private $_user_info;
    private $CI;
    
    public function __construct($user_id="")
    {
      //Load instant
      $this->CI =& get_instance();
      
      if($user_id==""){
        $logged_in = $this->CI->session->userdata("logged_in");
        if(!$logged_in){
          $this->_user_id = 0;
        }else{
          $userdata = $this->CI->session->userdata("userdata");
          $this->_user_id = $userdata['uid'];
        }
      }else{
        $this->_user_id = $user_id;
      }
      
      if($this->_user_id != 0){
        //Load Model
        $this->CI->load->model("user_model");
        $this->_user_info = $this->CI->user_model->getUserInfo($this->_user_id);
      }
      
    }
     
    public function getAttrs()
    {
        if (is_array($this->_user_info)) {
            return $this->_user_info;
        }
        return;
    }
     
    public function getAttr($attr)
    {
        if (array_key_exists($attr, $this->_user_info)) {
            return $this->_user_info[$attr];
        }
        return;
    }
     
}