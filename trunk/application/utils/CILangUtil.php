<?php
class LangUtil{

  public static function line($line=""){
    if(empty($line)){
      return NULL;
    }
    include(APPPATH."config/config.php");
    $config = self::get_uri_lang($_SERVER['REQUEST_URI']);

    $fds = scandir(APPPATH."language/".$config);

    foreach($fds as $fd){
      if($fd != '.' AND $fd != '..' AND $fd != "index.html" AND $fd != ".svn"){
        include(APPPATH."language/".$config."/".$fd);

      }
    }
    return $lang[$line];
  }

  function get_uri_lang($uri = '')
  {
    include(APPPATH."config/config.php");

    if(count(explode(".",$_SERVER['HTTP_HOST']))>2){
      $current_lang = explode(".",$_SERVER['HTTP_HOST'],2);
      if(array_key_exists($current_lang[0], $config["language_list"])){
        $uri_segment = $config["language_list"][$current_lang[0]];
      }else if($current_lang[0] == "www"){
        $uri_segment = $config["language"];
      }
    }else{
      $uri_segment = $config["language"];
    }
    return $uri_segment;
  }

}

?>