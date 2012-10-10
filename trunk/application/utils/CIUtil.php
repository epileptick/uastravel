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
  
}

?>