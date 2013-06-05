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

  public static function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") self::rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 }

  /*
	That it is an implementation of the function money_format for the
	platforms that do not it bear.

	The function accepts to same string of format accepts for the
	original function of the PHP.

	(Sorry. my writing in English is very bad)

	The function is tested using PHP 5.1.4 in Windows XP
	and Apache WebServer.
	*/
	public static function money_format($format, $number)
	{
	    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'.
	              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
	    if (setlocale(LC_MONETARY, 0) == 'C') {
	        setlocale(LC_MONETARY, '');
	    }
	    $locale = localeconv();
	    preg_match_all($regex, $format, $matches, PREG_SET_ORDER);
	    foreach ($matches as $fmatch) {
	        $value = floatval($number);
	        $flags = array(
	            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ?
	                           $match[1] : ' ',
	            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0,
	            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ?
	                           $match[0] : '+',
	            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0,
	            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0
	        );
	        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0;
	        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0;
	        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits'];
	        $conversion = $fmatch[5];

	        $positive = true;
	        if ($value < 0) {
	            $positive = false;
	            $value  *= -1;
	        }
	        $letter = $positive ? 'p' : 'n';

	        $prefix = $suffix = $cprefix = $csuffix = $signal = '';

	        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign'];
	        switch (true) {
	            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+':
	                $prefix = $signal;
	                break;
	            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+':
	                $suffix = $signal;
	                break;
	            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+':
	                $cprefix = $signal;
	                break;
	            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+':
	                $csuffix = $signal;
	                break;
	            case $flags['usesignal'] == '(':
	            case $locale["{$letter}_sign_posn"] == 0:
	                $prefix = '(';
	                $suffix = ')';
	                break;
	        }
	        if (!$flags['nosimbol']) {
	            $currency = $cprefix .
	                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) .
	                        $csuffix;
	        } else {
	            $currency = '';
	        }
	        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : '';

	        $value = number_format($value, $right, $locale['mon_decimal_point'],
	                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']);
	        $value = @explode($locale['mon_decimal_point'], $value);

	        $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
	        if ($left > 0 && $left > $n) {
	            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
	        }
	        $value = implode($locale['mon_decimal_point'], $value);
	        if ($locale["{$letter}_cs_precedes"]) {
	            $value = $prefix . $currency . $space . $value . $suffix;
	        } else {
	            $value = $prefix . $value . $space . $currency . $suffix;
	        }
	        if ($width > 0) {
	            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ?
	                     STR_PAD_RIGHT : STR_PAD_LEFT);
	        }

	        $format = str_replace($fmatch[0], $value, $format);
	    }
	    return $format;
	}
}

?>