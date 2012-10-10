<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    //echo "tour";
    $this->read();
  }
  

  function create(){
    //implement code here  

    //$this->load->model("tour_model","tourModel");

    $data= $this->input->post();
    $this->tourModel->addRecord($data);

    $this->_fetch('create');
  }

  
  function read(){
    //implement code here

    $this->_fetch('read');
  }

  function update(){
    //implement code here

  } 

  function delete(){
    //implement code here

  }  

}

?>