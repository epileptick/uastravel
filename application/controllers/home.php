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
      if(!empty($tagtypeQuery)){
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
      }else{
        $menu = FALSE;
      }
      
      return $menu;
      //print_r($menu);  exit;
  }

  function _shuffle_assoc($list) { 
    if (!is_array($list)) return $list; 

    $keys = array_keys($list); 
    shuffle($keys); 
    $random = array(); 
    foreach ($keys as $key) { 
      $random[] = $list[$key]; 
    }
    return $random; 
  }

  function _home_list($query){

    if(!empty($query)){
      foreach ($query as $key => $valueTag) {
        //Tour
        $this->load->model("tagtour_model", "tagtourModel");
        $tour = $this->tagtourModel->getRecord($query);
        
        //Location
        $this->load->model("taglocation_model", "taglocationModel");
        $location = $this->taglocationModel->getRecord($query);
      }
    }
    
    if($tour && $location){
      $home = array_merge($tour, $location);
    }else if($tour){
      $home = $tour;
    }else if($location){
      $home = $location;
    }


    //print_r($this->_shuffle_assoc($home)); exit;
    if(!empty($home)){
      return $this->_shuffle_assoc($home);
    }else{
      return FALSE;
    }
  }

  function user_list($tag=false){


    
    $per_page = 4;    
    $data["menu"]= $this->_home_menu($tag);

    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    if($tag){
      $argTag["url"] = $tag;      
      $tagQuery = $this->tagModel->getRecord($argTag);

      if(!empty($tagQuery)){
        //$query["tag_id"] = $tagQuery[0]->id;
        $query["tag_id"] = $tagQuery[0]->id;
        $query["firstpage"] = true;
        $query["join"] = true;
        $query["in"] = true;        

        $query["per_page"] = $per_page;
        $query["offset"] = ($this->uri->segment(2))?($this->uri->segment(2)-1)*$query["per_page"]:0;   

        //print_r($query); exit;

        //Tour
        $data["home"] = $this->_home_list($query);    
      }else{
        $data["home"] = false;
      }
    }else{
      //Filter all
    //$query["tag_id"] = $tagQuery[0]->id;
    $query["tag_id"] = 1;

    $query["join"] = true;
    $query["per_page"] = $per_page;
    $query["offset"] = ($this->uri->segment(1))?($this->uri->segment(1)-1)*$query["per_page"]:0;   

    //Tour
    $data["home"] = $this->_home_list($query);  
    }

    //print_r($query); exit;
    if($query["offset"]>0){
      $this->_fetch('user_listnextpage', $data, false, true);
    }else{
      //print_r($data);   
      $this->_fetch('user_list', $data, false, true);
    }

  }

  function admin_list(){
    $this->_fetch('admin_list');
  }
}
?>