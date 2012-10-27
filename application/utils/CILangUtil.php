<?php
class LangUtil{
  public static function line($line=""){
    if(empty($line)){
      return NULL;
    }
    include(APPPATH."config/config.php");
    
    $fds = scandir(APPPATH."language/".$config['language']);
    //var_dump($fds);
    foreach($fds as $fd){
      if($fd != '.' AND $fd != '..' AND $fd != "index.html"){
        include(APPPATH."language/".$config['language']."/".$fd);
        //var_dump(APPPATH."language/".$config['language']."/".$fd);
      }
    }
    return $lang[$line];
  }
}

?>