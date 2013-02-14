<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomTour extends MY_Controller {

  var $per_page = 20;

  function __construct(){
    parent::__construct();
    $this->lang->load('customtour', 'thai');
  }


  function user_index(){

    //print_r($this->lang->lang()); exit;
    //Default function for call read method
    if($this->uri->segment(1) == $this->router->class){
      $index = 1;
    }else if($this->uri->segment(2) == $this->router->class){
      $index = 2;
    }

    if($this->uri->segment($index+1) == "create"){
        ////////////////////////////
        // tag
        // algorithm : http://www/customtour/create/3      
        // sample : http://uastravel.com/customtour/create/1
        ////////////////////////////
        $id = $this->uri->segment($index+2);
        $this->user_create($id);      

    }else if($this->uri->segment($index+1) == "search"){
        ////////////////////////////
        // tag
        // algorithm : http://www/customtour/search/3   
        // sample : http://uastravel.com/customtour/search
        ////////////////////////////
        $keyword = $this->uri->segment($index+2); 
        $page = $this->uri->segment($index+3); 
        $this->user_search($keyword, $page);      

    }else{
      ////////////////////////////
      // customtour
      // algorithm : http://www/customtour/2  
      // sample : http://uastravel.com/customtour/10
      ////////////////////////////
      $page = $this->uri->segment($index+1);  
      //echo "customtour";

      $this->user_list($page);      
    }

  }

  function ajax_index(){
    //Default function for ajax call 
    if($this->uri->segment(1) == $this->router->class){
      $index = 1;
    }else if($this->uri->segment(2) == $this->router->class){
      $index = 2;
    }

    if($this->uri->segment($index+2) == "tourfilter"){
        ////////////////////////////
        // tag
        // algorithm : http://www/customtour/create/3      
        // sample : http://uastravel.com/customtour/create/1
        ////////////////////////////
        $location = $this->uri->segment($index+2);
        $sublocation = $this->uri->segment($index+2);

        echo $location; exit;
        $this->ajax_tourfilter($location, $sublocation);      

    }else{

    }

  }

  function ajax_tourfilter($location=false, $sublocation=false){


    $data = false;

    //Get tag id
    $argTag["name"] = $location;
    $this->load->model("tag_model", "tagModel");      
    $tagQuery = $this->tagModel->getRecord($argTag);

    print_r($tagQuery); exit;
    if($location && $sublocation){

    }else if($location){

    }else{
      $location = "";
    }
    $this->_fetch('ajax_tourfilter', $data, false, true);
  }



  function user_create($id = false){

    //echo "user create : ".$id;
    $data = false;


    if($id){
      //Edit

    }else{
      //Create



    }

    $this->_fetch('user_create', $data, false, true);

  }

  function user_list($page){
    echo "user list : ".$page;
  }

  function user_search($keyword, $page){
    echo "user list : ".$keyword."+".$page;
  }
}
?>