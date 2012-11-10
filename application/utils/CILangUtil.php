<?php
class LangUtil{

  public static function line($line=""){
    if(empty($line)){
      return NULL;
    }
    include(APPPATH."config/config.php");
    $config = self::get_uri_lang($_SERVER['REQUEST_URI']);
    //var_dump($config['language']);
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
  
  function get_uri_lang($uri = '')
  {
    // languages
    $languages = array(
        'en' => 'english',
        'th' => 'thai',
        'de' => 'german',
        'fr' => 'french',
        'nl' => 'dutch'
    );
     if (!empty($uri))
     {
      $uri = ($uri[0] == '/') ? substr($uri, 1): $uri;
      
      $uri_expl = explode('/', $uri, 2);
      $uri_segment['lang'] = NULL;
      $uri_segment['parts'] = $uri_expl;  
      
      if (array_key_exists($uri_expl[0], $languages))
      {
        $uri_segment['lang'] = $uri_expl[0];
        $uri_segment['language'] = $languages[$uri_segment['lang']];
      }else{
        $arrayLang = array_keys($languages);
        $uri_segment['lang'] = $arrayLang[0];
        $uri_segment['language'] = $languages[$uri_segment['lang']];
      }
      return $uri_segment;
     }
     else
      return FALSE;
    }
    
}

?>