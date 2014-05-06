<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class activity_new extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
function new_index(){

  if(empty($id)){
    $this->_fetch('admin_index');


  }else{
  	
  	$this->_fetch('admin_form');

  }



}


function new_add(){
	
$resultnew=$this->input->post();
var_dump($resultnew);  


	if(empty($resultnew)){
			$this->_fetch('admin_form');
	}else{

	$this->load->model('new_model','newmodel');
	$this->newmodel->add($resultnew);

	echo "แอดแล้วนะ";
	//redirect('home/index');
	
	}



	

}

}
?>

