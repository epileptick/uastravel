<?php
class MY_Parser extends CI_Parser {

    const LANG_REPLACE_REGEXP = '!\{_\s*(?<key>[^\}]+)\}!';
    const LANG_INCLUDE_REGEXP = '!\{_include\s*(?<key>[^\}]+)\}!';
    static $CI = null;
    private $_data = "";
    
    
    public function parse($template, $data='', $return = FALSE,$piece=FALSE) {
        $themeName = Config::getConfig('theme_name');
        
        $this->CI = get_instance();
        $this->_data = $data;
        //prepare data
        $data['imagepath'] = base_url("/themes/".$themeName."/images");
        $data['stylepath'] = base_url("/themes/".$themeName."/style");
        $data['jspath'] = base_url("/themes/".$themeName."/js");
        $data['themepath'] = base_url("/themes/".$themeName);
        
        $data['maincontent'] = $this->CI->load->view("themes/".$themeName."/_Controller/".$template, $data, TRUE);
        if(!$piece){
          $template = $this->CI->load->view("themes/".$themeName."/master.php", $data, TRUE);
        }else{
          $template = $data['maincontent'];
        }
        
        
        
        $template = $this->replace_include_keys($template);
        $template = $this->replace_lang_keys($template);
        
        
        if(count(PageUtil::getVar("title"))>0){
          preg_match("#\<title\>(.*)\<\/title\>#i",$template,$matches);
          $originalTitle = $matches[1];
          $newTitle = $originalTitle." -";
          foreach(PageUtil::getVar("title") AS $title){
            $newTitle .= " ".$title;
          }
          $template = str_replace($originalTitle,$newTitle,$template);
        }
        
        if(count(PageUtil::getVar("keywords"))>0){
          preg_match("#\<meta name=\"keywords\" content=\"(.*)\" \/\>#i",$template,$matches);
          $originalKeywords = $matches[1];
          $newKeywords = $originalKeywords;
          foreach(PageUtil::getVar("keywords") AS $keyword){
            $newKeywords .= ", ".$keyword;
          }
          $template = str_replace($originalKeywords,$newKeywords,$template);
        }
        
        if(count(PageUtil::getVar("description"))>0){
          preg_match("#\<meta name=\"description\" content=\"(.*)\" \/\>#i",$template,$matches);
          $originalDescriptions = $matches[1];
          $newDescriptions = $originalDescriptions;
          foreach(PageUtil::getVar("description") AS $keyword){
            $newDescriptions .= " ".$keyword;
          }
          $template = str_replace($originalDescriptions,$newDescriptions,$template);
          
        }
        if(count(PageUtil::getVar("stylesheet"))>0||count(PageUtil::getVar("javascript"))>0){
          $newHead = "";
          if(count(PageUtil::getVar("stylesheet"))>0){
            foreach(PageUtil::getVar("stylesheet") AS $stylesheet){
              $newHead .= "\n".$stylesheet;
            }
          }
          if(count(PageUtil::getVar("javascript"))>0){
            foreach(PageUtil::getVar("javascript") AS $javascript){
              $newHead .= "\n".$javascript;
            }
          }
          $template = str_replace("</head>",$newHead."\n</head>",$template);
        }
        
        return $this->_parse($template, $data, $return);
    }

    protected function replace_lang_keys($template) {
        return preg_replace_callback(self::LANG_REPLACE_REGEXP, array($this, 'replace_lang_key'), $template);
    }
    
    protected function replace_include_keys($template) {
        return preg_replace_callback(self::LANG_INCLUDE_REGEXP, array($this, 'replace_include_key'), $template);
    }

    protected function replace_lang_key($key) {
    
        return $this->CI->lang->line($key[1]);
    }
    
    protected function replace_include_key($key) {
      $themeName = Config::getConfig('theme_name');
      $template = $this->CI->load->view("themes/".$themeName."/".$key["1"].".php", $this->_data, TRUE);
      $template = $this->replace_lang_keys($template);
      
      return  $this->_parse($template,  $this->_data, TRUE);
    }
    
    function _parse($template, $data, $return = FALSE)
    {
    	if ($template == '')
    	{
    		return FALSE;
    	}
      
      if($data != "")
    	foreach ($data as $key => $val)
    	{
    		if (is_array($val))
    		{
    			$template = $this->_parse_pair($key, $val, $template);
    		}
    		else
    		{
    			$template = $this->_parse_single($key, (string)$val, $template);
    		}
    	}
      
    	if ($return == FALSE)
    	{
    		$CI =& get_instance();
    		$CI->output->append_output($template);
    	}
    
    	return $template;
    }
}
?>