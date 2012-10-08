<?php
class FormUtil {
  public static function getPassedValue($key, $default = null, $source = null)
    {
      if (!$key) {
        log_message('error', 'Empty key passed to FormUtil::getPassedValue.');
        return FALSE;
      }

      $source = strtoupper($source);
      $src = ($source ? $source : 'REQUEST') . '_' . ($default != null ? $default : 'null');

      $doClean = false;
      switch (true)
      {
          case (isset($_REQUEST[$key]) && !isset($_FILES[$key]) && (!$source || $source == 'R' || $source == 'REQUEST')):
              $value = $_REQUEST[$key];
              $doClean = true;
              break;
          case isset($_GET[$key]) && (!$source || $source == 'G' || $source == 'GET'):
              $value = $_GET[$key];
              $doClean = true;
              break;
          case isset($_POST[$key]) && (!$source || $source == 'P' || $source == 'POST'):
              $value = $_POST[$key];
              $doClean = true;
              break;
          case isset($_COOKIE[$key]) && (!$source || $source == 'C' || $source == 'COOKIE'):
              $value = $_COOKIE[$key];
              $doClean = true;
              break;
          case isset($_FILES[$key]) && ($source == 'F' || $source == 'FILES'):
              $value = $_FILES[$key];
              break;
          case (isset($_GET[$key]) || isset($_POST[$key])) && ($source == 'GP' || $source == 'GETPOST'):
              if (isset($_GET[$key])) {
                  $value = $_GET[$key];
              }
              if (isset($_POST[$key])) {
                  $value = $_POST[$key];
              }
              $doClean = true;
              break;
          default:
              if ($source) {
                  static $valid = array('R', 'REQUEST', 'G', 'GET', 'P', 'POST', 'C', 'COOKIE', 'F', 'FILES', 'GP', 'GETPOST');
                  if (!in_array($source, $valid)) {
                      log_message('error', "Invalid input source [$source] received.");
                      return $default;
                  }
              }
      }

      if (isset($value) && !is_null($value)) {
          if (is_array($value)) {
              FormUtil::cleanArray($value);
          } else {
              static $alwaysclean = array('name', 'module', 'type', 'file', 'authid');
              if (in_array($key, $alwaysclean)) {
                  $doClean = true;
              }
              if ($doClean && !defined('_PNINSTALLVER')) {
                  FormUtil::cleanValue($value);
              }
          }

          return $value;
      }

      return $default;
  }
  
  function cleanArray(&$array){
      if (!is_array($array)) {
          log_message('error','Non-array passed to FormUtil::cleanArray.');
          return FALSE;
      }

      $ak = array_keys($array);
      $kc = count($ak);

      for ($i = 0; $i < $kc; $i++) {
          $key = $ak[$i];
          if (is_array($array[$key])) {
              FormUtil::cleanArray($array[$key]);
          } else {
              FormUtil::cleanValue($array[$key]);
          }
      }

      return $array;
  }
  
  function cleanValue(&$value)
    {
        if (get_magic_quotes_gpc()) {
            pnStripslashes($value);
        }
        static $replace = array();
        static $search = array('|</?\s*SCRIPT.*?>|si', '|</?\s*FRAME.*?>|si', '|</?\s*OBJECT.*?>|si', '|</?\s*META.*?>|si', '|</?\s*APPLET.*?>|si', '|</?\s*LINK.*?>|si', '|</?\s*IFRAME.*?>|si');

        $value = preg_replace($search, $replace, $value);

        $value = trim($value);
        return $value;
    }
}
?>