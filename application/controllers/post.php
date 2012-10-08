<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    $this->read();
  }
  


  function create(){
  
    if($this->input->post("submit") != NULL){
      $postData = $this->postModel->add($this->input->post());
      if($postData){
        $this->_fetch('add_success');
      }else{
        echo "submit failed";
      }
    }else{
      $this->_fetch('add_form');
    }
  }

  
  function read($id=false, $limit=10, $offset=0){


    if($id){ 
      //Read 1 item     
      $query = $this->db->get_where('ci_post', array('pst_url' => $id), $limit, $offset);
      $data = array(
                      "post" => $query->result()
              );

      $this->_fetch('read', $data);

    }else{
      //Read multiple item
      $query = $this->db->get('ci_post');        
      $data = array(
                      "posts" => $query->result()

              );

      $this->_fetch('list', $data);
    }
  }

  function update(){
    //implement code here

  } 


  function delete(){
    //implement code here

  }  

}

?>