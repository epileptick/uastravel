<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location_translate_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "loct";
    $this->_column = array(
                     'loc_id'           => 'loct_loc_id',
                     'lang'             => 'loct_lang',
                     'title'            => 'loct_title',
                     'body'             => 'loct_body',
                     'suggestion'       => 'loct_suggestion',
                     'route'            => 'loct_route',
                     'url'              => 'loct_url',
                     'cr_date'          => 'loct_cr_date',
                     'cr_uid'           => 'loct_cr_uid',
                     'lu_date'          => 'loct_lu_date',
                     'lu_uid'           => 'loct_lu_uid'
    );
    $this->_pk ="loc_id";
  }

  function add($options = NULL){
    if(empty($options)){
      return FALSE;
    }

    $isUpdate = parent::count_rows(array("where"=>array("lang"=>$options["lang"],"loc_id"=>$options["loc_id"])));

    if($isUpdate){
      if(!empty($options["lang"])){
        $this->db->where($this->_getColumn("lang"), $options["lang"]);
        unset($options["lang"]);
      }
      if(!empty($options["loc_id"])){
        $this->db->where($this->_getColumn("loc_id"), $options["loc_id"]);
        unset($options["loc_id"]);
      }
      if(empty($options["url"])){
        $options["url"] = Util::url_title($options["title"]);
      }

      $options["isUpdate"] = TRUE;
    }


    return parent::add($options);
  }
}
?>