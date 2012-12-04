<?php
class Init {
  private $CI;
  
  function __construct(){
    $this->CI =& get_instance();
  }
  
  function pageInit(){
    PageUtil::registerVar("title",TRUE);
    PageUtil::registerVar("keywords",TRUE);
    PageUtil::registerVar("description",TRUE);
    PageUtil::registerVar("stylesheet",TRUE);
    PageUtil::registerVar("javascript",TRUE);
    
  }
  
}
?>