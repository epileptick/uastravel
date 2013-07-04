<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_translate_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "artt";

    $this->_column = array(
                     'art_id'           => $this->_prefix.'_art_id',
                     'lang'             => $this->_prefix.'_lang',
                     'title'            => $this->_prefix.'_title',
                     'body'             => $this->_prefix.'_body',
                     'url'              => $this->_prefix.'_url'
    );
  $this->_pk ="art_id";
  }

  function add($options = NULL){
    if(empty($options)){
      return FALSE;
    }

    $isUpdate = parent::count_rows(array("where"=>array("lang"=>$options["lang"],"art_id"=>$options["art_id"])));

    if($isUpdate){
      if(!empty($options["lang"])){
        $this->db->where($this->_getColumn("lang"), $options["lang"]);
        unset($options["lang"]);
      }
      if(!empty($options["art_id"])){
        $this->db->where($this->_getColumn("art_id"), $options["art_id"]);
        unset($options["art_id"]);
      }
      $options["isUpdate"] = TRUE;
    }
    if(empty($options["url"])){
      $options["url"] = Util::url_title($options["title"]);
    }

    return parent::add($options);
  }

}
?>