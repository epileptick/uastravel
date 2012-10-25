<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    $locationData["location"] = $this->locationModel->get(array(
                                              'limit'=>'',
                                              'returnObj'=>'',
                                              'order'=>'',
                                              'where'=>''
                                            )
                                      );
                                      
    $this->_fetch("list",$locationData);
  }

  function create($id=NULL){
    $_post = $this->input->post();
    if($this->input->post("submit") != NULL OR $this->input->post("ajax")==TRUE){
      
      if( isset($_post["id"]) ){
        $postData = $this->locationModel->updateRecord($_post);
      }else{
        $postData = $this->locationModel->addRecord($_post);
      }
      
      if($postData){
        if($this->input->post("ajax")==TRUE){
          $data['id'] = $postData;
          $data['status'] = $this->_fetch('ajax_save_success',$data,TRUE,TRUE);
          echo json_encode($data);
          die;
        }else{ 
          $data['post_data']['id'] = $postData;
          $this->_fetch('add_success',$data);
        }
      }else{
        echo "submit failed";
      }
    }else{
      if($id==NULL){
        $data['post'] = array(
                            'loc_id' => 0,
                            'loc_latitude' => "7.951172174578056",
                            'loc_longitude' => "98.34449018537998",
                            'loc_title' => "",
                            'loc_body' => ""
                            ); 
      }else{
        $postData = $this->locationModel->readRecord(array('id'=>$id));
        if(!$postData){
          redirect(base_url("location/create"));
          die;
        }
        $data['post'] = $postData; 
      }
      $this->_fetch('add_form',$data);
    }
  }

  
  function read($id=FALSE){
    if($id){
      $locationData["location"] = $this->locationModel->get(array(
                                                                'limit'=>'',
                                                                'returnObj'=>'',
                                                                'order'=>'',
                                                                'where'=>"id=$id"
                                                              )
                                                        );
                                      
      $this->_fetch("view",$locationData);
    }
  }

  function update(){
    //implement code here
    
  }


  function delete($id=NULL){
    //implement code here
    if(is_numeric($id)){
      $this->locationModel->delete($id);
      redirect(base_url("location"));
    }
    
  }
  function ajax_delete(){
    //implement code here
    $_post = $this->input->post();
    foreach($_post AS $id=>$value){
      if(!$this->locationModel->delete($id)){
        return "FALSE";
      }
    }
    return "TRUE";
  }

}

?>