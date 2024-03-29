<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

// Originaly CodeIgniter i18n library by Jérôme Jaglale
// http://maestric.com/en/doc/php/codeigniter_i18n
// modification by Yeb Reitsma

/*
in case you use it with the HMVC modular extension
uncomment this and remove the other lines
load the MX_Loader class */

//require APPPATH."third_party/MX/Lang.php";

//class MY_Lang extends MX_Lang {

class MY_Lang extends CI_Lang {


    /**************************************************
     configuration
    ***************************************************/

    // languages
    private $languages = array(
        'en' => 'english',
        'th' => 'thai',
        'de' => 'german',
        'fr' => 'french',
        'nl' => 'dutch'
    );

    // special URIs (not localized)
    private $special = array (
        "admin"
    );

    // where to redirect if no language in URI
    private $uri;
    private $default_uri;
    private $lang_code;

    /**************************************************/


  function MY_Lang()
  {
    parent::__construct();

    global $CFG;
    global $URI;
    global $RTR;

    if(count(explode(".",$_SERVER['HTTP_HOST']))>2){
      $current_lang = explode(".",$_SERVER['HTTP_HOST'],2);
      if(array_key_exists($current_lang[0], $this->languages)){
        $CFG->set_item("base_url","http://".$_SERVER['HTTP_HOST']."/");
        $CFG->set_item('language', $this->languages[$current_lang[0]]);
      }else if($current_lang[0] == "www"){
        $CFG->set_item("base_url","http://".$_SERVER['HTTP_HOST']."/");
        $CFG->set_item('language', $this->languages[$this->default_lang()]);
      }else{
        header("Location: ".$CFG->item("base_url"));
      }
    }
  }

  function load($langfile = '', $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '', $force_load = FALSE)
  {
    $langfile = str_replace('.php', '', $langfile);

    if ($add_suffix == TRUE)
    {
      $langfile = str_replace('_lang.', '', $langfile).'_lang';
    }

    $langfile .= '.php';

    if (in_array($langfile, $this->is_loaded, TRUE) && $force_load == FALSE)
    {
      return;
    }

    $config =& get_config();

    if ($idiom == '')
    {
      $deft_lang = ( ! isset($config['language'])) ? 'english' : $config['language'];
      $idiom = ($deft_lang == '') ? 'english' : $deft_lang;
    }

    // Determine where the language file is and load it
    if ($alt_path != '' && file_exists($alt_path.'language/'.$idiom.'/'.$langfile))
    {
      include($alt_path.'language/'.$idiom.'/'.$langfile);
    }
    else
    {
      $found = FALSE;

      foreach (get_instance()->load->get_package_paths(TRUE) as $package_path)
      {
        if (file_exists($package_path.'language/'.$idiom.'/'.$langfile))
        {
          include($package_path.'language/'.$idiom.'/'.$langfile);
          $found = TRUE;
          break;
        }
      }

      if ($found !== TRUE)
      {
        show_error('Unable to load the requested language file: language/'.$idiom.'/'.$langfile);
      }
    }


    if ( ! isset($lang))
    {
      log_message('error', 'Language file contains no data: language/'.$idiom.'/'.$langfile);
      return;
    }

    if ($return == TRUE)
    {
      return $lang;
    }

    $this->is_loaded[] = $langfile;
    $this->language = array_merge($this->language, $lang);
    unset($lang);

    log_message('debug', 'Language file loaded: language/'.$idiom.'/'.$langfile);
    return TRUE;
  }

  // get current language
  // ex: return 'en' if language in CI config is 'english'
  function lang()
  {
      global $CFG;
      $language = $CFG->item('language');

      $lang = array_search($language, $this->languages);
      if ($lang)
      {
          return $lang;
      }

      return NULL;    // this should not happen
  }

  function is_special($lang_code)
  {
      if ((!empty($lang_code)) && (in_array($lang_code, $this->special)))
          return TRUE;
      else
          return FALSE;
  }


  function switch_uri($lang)
   {
      $request_uri = "";
      //$request_uri = $_SERVER["REQUEST_URI"];
      
      if(count(explode(".",$_SERVER['HTTP_HOST']))>2){
        $current_lang = explode(".",$_SERVER['HTTP_HOST'],2);
          if($lang != "en"){
            if(array_key_exists($lang, $this->languages)){
              $uri = "http://".$lang.".".$current_lang[1].$request_uri;
            }
          }else{
            $uri = "http://".$current_lang[1].$request_uri;
          }
      }else if($lang != "en"){
        if(array_key_exists($lang, $this->languages)){
          $uri = "http://".$lang.".".$_SERVER['HTTP_HOST'].$request_uri;
        }
      }else{
        $uri = "http://".$_SERVER['HTTP_HOST'].$request_uri;
      }

      return $uri;
   }

//check if the language exists
//when true returns an array with lang abbreviation + rest
  function get_uri_lang($uri = '')
  {
   if (!empty($uri))
   {
    $uri = ($uri[0] == '/') ? substr($uri, 1): $uri;

    $uri_expl = explode('/', $uri, 2);
    $uri_segment['lang'] = NULL;
    $uri_segment['parts'] = $uri_expl;

    if (array_key_exists($uri_expl[0], $this->languages))
    {
     $uri_segment['lang'] = $uri_expl[0];
    }
    return $uri_segment;
   }
   else
    return FALSE;
  }


  // default language: first element of $this->languages
  function default_lang()
  {
    $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
    $browser_lang = substr($browser_lang, 0,2);
    $default_lang = array_splice(array_keys($this->languages), 0,1);

    if(!empty($_COOKIE['int_lang'])) {
      $preferred_lang = filter_var($_COOKIE['int_lang'], FILTER_SANITIZE_STRING);
      return (array_key_exists($preferred_lang, $this->languages)) ? $preferred_lang : $default_lang[0];
    }else{

      //return (array_key_exists($browser_lang, $this->languages)) ? $browser_lang : $default_lang[0];
      return $default_lang[0];
    }
  }

  // add language segment to $uri (if appropriate)
  function localized($uri)
  {
   if (!empty($uri))
   {
    $uri_segment = $this->get_uri_lang($uri);
    if (!$uri_segment['lang'])
    {

     if ((!$this->is_special($uri_segment['parts'][0])) && (!preg_match('/(.+)\.[a-zA-Z0-9]{2,4}$/', $uri)))
     {
               $uri = $this->lang() . '/' . $uri;
              }
          }
   }
      return $uri;
  }
}

// END MY_Lang Class

/* End of file MY_Lang.php */
/* Location: ./application/core/MY_Lang.php */