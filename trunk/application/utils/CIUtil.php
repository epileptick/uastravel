<?php
class Util {

  public static function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(array('Util','objectToArray'), $d);
		}
		else {
			// Return array
			return $d;
		}
	}
  
  public static function ThemePath(){
    return base_url('themes/'.Config::getConfig("theme_name"));
  }
  
  public static function url_title($title=false){
  	if($title){
		$string = $title;
		$string = preg_replace("`\[.*\]`U","",$string);
		$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
		$string = str_replace('%', '-percent', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
		$string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
		$string = strtolower(trim($string, '-'));
		$string = trim($string);
		return $string;
  	}else{
  		return false;
  	}

  }
}

?>