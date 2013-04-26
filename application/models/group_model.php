<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Group_model extends MY_Model {

  function __construct(){
    parent::__construct();
    $this->_prefix = "grp";
    $this->_column = array(
                     'id'                => 'grp_id',
                     'name'              => 'grp_name',
                     'level'             => 'grp_level'
    );
  }

}