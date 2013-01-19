<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Type_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "typ";
    $this->_column = array(
                     'id'             => 'typ_id',
                     'lang'           => 'typ_lang',
                     'name'           => 'typ_name',
                     'parent_id'      => 'typ_parent_id',
                     'description'    => 'typ_description',
                     'url'            => 'typ_url',
                     'status'         => 'typ_status'
    );
  }

}
?>