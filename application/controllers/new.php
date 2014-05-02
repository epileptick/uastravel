<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class new extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
function new_index($id){

  if(empty($id)){
    $this->_fetch('admin_index');

  }else{
  	$this->load->model('');

  }



}

?>

