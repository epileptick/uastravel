<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
  function __construct(){
    parent::__construct();
  }


  function index(){
    //Default function for call read method

    //print_r($this->lang->lang()); exit;
    if($this->uri->segment(1) == $this->lang->lang()){
      $index = 1;
      //echo $index;
    }else{
      $index = 0;
    }


    $page = $this->uri->segment($index+1);//5;
    $this->user_list(false, $page);
  }

  function _home_menu($select=false){
      $type["type_id"] = 1;
      $currentLang = $this->lang->lang();
      $this->load->model("tagtype_model", "tagtypeModel");
      $tagtypeQuery = $this->tagtypeModel->getRecord($type);

      $this->load->model("tag_model", "tagModel");

      $count = 0;
      if(!empty($tagtypeQuery)){
        foreach ($tagtypeQuery as $key => $value) {
          //Menu Tag
          $tag["id"] = $value->tag_id;
          $tag["lang"] = $currentLang;
          $tagQuery = $this->tagModel->get($tag);

          if(!empty($tagQuery)){
            $menu[$count] = new stdClass();
            $menu[$count]->tag_id = $tagQuery[0]["id"];
            $menu[$count]->name = $tagQuery[0]["name"];
            $menu[$count]->url = $tagQuery[0]["url"];
          }


          //Select all
          if($select){
            $menu[$count]->select_all = 0;
          }else{
            $menu[$count]->select_all = 1;
          }
          //Select element
          if($select && $select == $tagQuery[0]["name"]){
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
      $this->load->model("tagtour_model", "tagtourModel");
      foreach ($query as $key => $valueTag) {
        //Tour

        $tour = $this->tagtourModel->getRecordHome($query);

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

  function user_list($tag=false, $page=0){

    $per_page = 20;
    $data["menu"]= $this->_home_menu($tag);

    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }
    $query["model"] = "home";

    if($tag){
      $argTag["url"] = $tag;
      $argTag["lang"] = $this->lang->lang();
      $tagQuery = $this->tagModel->get($argTag);

      if(!empty($tagQuery)){
        //$query["tag_id"] = $tagQuery[0]->id;
        $query["tag_id"] = $tagQuery[0]["id"];
        $query["firstpage"] = true;
        $query["join"] = true;
        $query["in"] = true;

        $query["per_page"] = $per_page;
        $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;

        //print_r($query); exit;

        //Tour
        $data["home"] = $this->_home_list($query);

        //print_r($data); exit;

      }else{
        $data["home"] = false;
      }
    }else{
      //Filter all
      //$query["tag_id"] = $tagQuery[0]->id;
      $query["tag_id"] = 1;

      $query["join"] = true;
      $query["per_page"] = $per_page;
      $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;

      //var_dump($query);
      //Tour
      $data["home"] = $this->_home_list($query);
    }
        //print_r($data); exit;
    //print_r($query); exit;
    if(!empty($query["offset"])){
      if($query["offset"]>0 ){
        $this->_fetch('user_listnextpage', $data, false, true);
      }else{

        //print_r($data);
        $this->_fetch('user_list', $data, false, true);
      }
    }else{
      //var_dump($data);
      $this->_fetch('user_list', $data, false, true);
    }

  }

  function admin_list(){
    $this->_fetch('admin_list');
  }
}
?>