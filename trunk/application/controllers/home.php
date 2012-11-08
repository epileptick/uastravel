<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
  function __construct(){
    parent::__construct();
  }


  function index(){
    //Default function for call read method
    $this->user_list();
  }  
  

  function _home_menu($select=false){
      $type["type_id"] = 1;
      $this->load->model("tagtype_model", "tagtypeModel");   
      $tagtypeQuery = $this->tagtypeModel->getRecord($type);

      $this->load->model("tag_model", "tagModel");  



      $count = 0;
      foreach ($tagtypeQuery as $key => $value) {
        //Menu Tag
        $tag["id"] = $value->tag_id;      
        $tagQuery = $this->tagModel->getRecord($tag);
        $menu[$count]->tag_id = $tagQuery[0]->id;
        $menu[$count]->name = $tagQuery[0]->name;
        $menu[$count]->url = $tagQuery[0]->url;

        //Select all
        if($select){
          $menu[$count]->select_all = 0;
        }else{
          $menu[$count]->select_all = 1;
        }
        //Select element
        if($select && $select == $tagQuery[0]->name){
          $menu[$count]->select = 1;
        }else{
          $menu[$count]->select = 0;
        }

        $count++;
      }

      return $menu;
      //print_r($menu);  exit;
  }


  function _home_list($tags){

    //print_r($tags); exit;
    $count = 0;
    $this->load->model("tagtour_model", "tagtourModel");
    $this->load->model("taglocation_model", "taglocationModel");
    foreach ($tags as $key => $valueTag) {
      //Tour Tag
      $tag["tag_id"] = $valueTag->tag_id;
      $tag["join"] = true;

      //Tour
      $tagtourQuery = $this->tagtourModel->getRecord($tag);
      if(!empty($tagtourQuery)){
        foreach ($tagtourQuery as $key => $value) {
          # code...
          $home[$count] = $value;
          $count++;
        }
      }

      //Location
      $tagLocationQuery = $this->taglocationModel->getRecord($tag);
      if(!empty($tagLocationQuery)){
        foreach ($tagLocationQuery as $key => $value) {
          # code...
          $home[$count] = $value;
          $count++;
        }
      }      

    }

    //print_r($home); exit;
    if(!empty($home)){
      return $home;
    }else{
      return ;
    }

  }  

  function user_list($tag=false){
  	//print_r($tag); exit;
    $data["menu"]= $this->_home_menu($tag);

    if($tag){
      //Tag
      $argTag["url"] = $tag;      
      $tagQuery = $this->tagModel->getRecord($argTag);

      if(!empty($tagQuery)){
      	$tagForHome[0]->tag_id = $tagQuery[0]->id;      	
	      //Tour
	     $data["home"] = $this->_home_list($tagForHome);  	
      }else{
      	$data["home"] = false;
      }

    }else{
      //Send tag for get data
      $data["home"] = $this->_home_list($data["menu"]);
    }

    //print_r($data);   exit;
    $this->_fetch('user_list', $data, false, true);

  }
}
?>