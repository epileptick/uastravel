<?php
class Config {
  public static function getConfig($name=""){
    $CI =& get_instance();    
    if($name==""){
      return $CI->config->config;
    }
    
    return $CI->config->config[$name];
  }
  
  public static function setConfig($item="", $value=""){
    $CI =& get_instance();
    
    if(!isset($item)){
      return FALSE;
    }
    if(!isset($value)){
      return FALSE;
    }
    
    return $CI->config->set_item($item,$value);
    
  }
}
?>