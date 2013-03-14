<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_translate_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "hott";
    $this->_column = array(
                     'hotel_id'          => 'hott_hotel_id',
                     'lang'              => 'hott_lang',
                     'url'               => 'hott_url',
                     'name'              => 'hott_name',
                     'short_description' => 'hott_short_description',
                     'description'       => 'hott_description',
                     'detail'            => 'hott_detail',
                     'included'          => 'hott_included',
                     'remark'            => 'hott_remark',
                     'cr_date'           => 'hott_cr_date',
                     'cr_uid'            => 'hott_cr_uid',
                     'lu_date'           => 'hott_lu_date',
                     'lu_uid'            => 'hott_lu_uid'
    );
  }

  function add($options = NULL){
    if(empty($options)){
      return FALSE;
    }
    $isUpdate = parent::count_rows(array("where"=>array("lang"=>$options["lang"],"hotel_id"=>$options["hotel_id"])));
    if($isUpdate){
      if(!empty($options["lang"])){
        $this->db->where($this->_getColumn("lang"), $options["lang"]);
        unset($options["lang"]);
      }
      if(!empty($options["hotel_id"])){
        $this->db->where($this->_getColumn("hotel_id"), $options["hotel_id"]);
        unset($options["hotel_id"]);
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