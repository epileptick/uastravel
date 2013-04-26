<?php
class Redirect {
  private $CI;

  function __construct(){
    $this->CI =& get_instance();
  }

  function RedirectClass(){
    $current_lang = $this->CI->lang->lang();
    $segment_array = $this->CI->uri->segment_array();

    $redirect = FALSE;

    if(empty($segment_array)){
      return;
    }


    $langEN = $this->CI->lang->load('url', 'english', TRUE, TRUE, '', TRUE);
    $langTH = $this->CI->lang->load('url', 'thai', TRUE, TRUE, '', TRUE);

    // ==================================================================
    //
    // clean array
    //
    // ------------------------------------------------------------------
    foreach ($langEN as $keyEN => $valueEN) {
      $langEN[$keyEN] = trim($valueEN);
    }
    foreach ($langTH as $keyTH => $valueTH) {
      $langTH[$keyTH] = trim($valueTH);
    }

    if($current_lang == "en"){
      if($segment_array[1] == "location"){
        $segment_array[1] = $langEN["url_lang_location"];
        Redirect(base_url(implode("/", $segment_array)),"301");
      }
      foreach ($langTH as $keyTH => $valueTH) {
        if($valueTH == $segment_array[1]){
          $base_url = $this->CI->config->item('base_url');
          $base_url = str_replace("http://", "", $base_url);
          $base_urlArray = explode(".", $base_url);
          if(count($base_urlArray)<3){
            $base_url = "th.".$base_url;
          }else{
            $base_urlArray[0] = "th";
            $base_url = implode(".", $base_urlArray);
          }
          $this->CI->config->set_item('base_url', 'http://'.$base_url);
           Redirect(base_url(implode("/", $segment_array)),"301");
        }
      }

      foreach ($segment_array as $keySeg => $valueSeg) {
        if(preg_match('/[ก-๙].+$/ui' ,$valueSeg)){
          Redirect(base_url());
        }
      }
    }
/*
    if($current_lang == "th"){
      if($segment_array[1] == "location"){
        $segment_array[1] = $langEN["url_lang_location"];
        Redirect(base_url(implode("/", $segment_array)),"301");
      }
      foreach ($langEN as $keyEN => $valueEN) {
        if($valueEN == $segment_array[1]){
          $base_url = $this->CI->config->item('base_url');
          $base_url = str_replace("http://", "", $base_url);
          $base_urlArray = explode(".", $base_url);
          if(count($base_urlArray)<3){
            $base_url = "en.".$base_url;
          }else{
            $base_urlArray[0] = "en";
            $base_url = implode(".", $base_urlArray);
          }
          $this->CI->config->set_item('base_url', 'http://'.$base_url);
           Redirect(base_url(implode("/", $segment_array)),"301");
        }
      }
    }
*/
  }

}
