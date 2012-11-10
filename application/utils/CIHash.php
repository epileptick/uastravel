<?php
class Hash {
  function make($sub_dir=""){
    return new HashingClass($sub_dir);
  }
}



/**
 * Hashin library
 * @Author Tee++;
 * @Published 03/06/2009
 */
class HashingClass {
  
        var $parent_dir = 'resource';
        var $sub_dir = 'sub';
        var $prefix = "";
        var $level = 2;
        var $algorithm = 'adler32';
        var $make_dir = TRUE;
        // file tailer
        var $show_file = TRUE;
        var $extension = 'hash';
        function __construct($sub_dir=""){
          $this->sub_dir = $sub_dir;
        }
        function hash($string)
        {
                $hashing = $this->hash_algorithm($string);
                $path = $this->parent_dir.'/'.$this->sub_dir;
                if ($hash_dirs = $this->_path($hashing))
                {
                        $path .= '/'.$hash_dirs;
                        if ($this->make_dir)
                                $this->_makePathRecursive($path);
                }
  
                if ($this->show_file)
                {
                        $path .= '/'.$hashing;
                }
                return $path;
        }
  
        function hash_algorithm($string)
        {
                return hash($this->algorithm, $string);
        }
  
        function _path($string)
        {
                if ($this->level <= 0)
                {
                        return;
                }
  
                $directories = array();
                for ($i=1; $i<=$this->level; $i++)
                {
                        array_push($directories, $this->prefix.substr($string, 0, $i));
                }
                return implode('/', $directories);
        }
  
        function _makePathRecursive($dir)
        {
                if (!is_dir($dir))
                        mkdir($dir, 0777, TRUE);
  
                return TRUE;
        }
        
        function setSubFolder($path="")
        {
          if ($path=="")
          {
                  return;
          }
          $this->sub_dir = $path;
          return TRUE;
        }
        
        
  
}
  
/*
##### Example Usage #####
$string = "IWannaBeARockStar";
$hashing = new Hashing;
$path = $hashing->do_hash($string);
file_put_contents($path, $string);
*/
?>