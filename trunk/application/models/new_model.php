<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class new_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "new";
    $this->_column = array(  
                     'id'                    => 'new_id',
                     'title'                    => 'new_title',
                     'detail'                    => 'new_detail',  
                     'type'                    => 'new_type'
    );
  }
}