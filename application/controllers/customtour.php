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


    $args = $this->input->post();
    if($this->uri->segment($index+2) == "tourfilter"){

      if($this->uri->segment($index+3) == "tag"){
        $this->ajax_tourfilter_tag($args); 
      }else if($this->uri->segment($index+3) == "data"){
        $this->ajax_tourfilter_data($args); 
      } 
     
    }else{

    }

  }

  function ajax_tourfilter_tag($args=false){

    //print_r($args); exit;


    //print_r($tagQuery); exit;
    $this->load->model("type_model", "typeModel"); 
    $this->load->model("tagtype_model", "tagtypeModel"); 

    $this->load->model("tag_model", "tagModel");   
    $this->load->model("tagtour_model", "tagtourModel"); 
    $this->load->model("taghotel_model", "taghotelModel"); 

    if($args["model"] == "tour"){

      //Type
      $args["name"] = "customtour_filter";
      $type = $this->typeModel->getRecord($args);

      //Third tag
      $third["type_id"] = $type[0]->id;     
      $third["parent_id"]  = $args["secondtag_id"];  
      $data["tours"]["filter"]["thirdtag"] = $this->tagtypeModel->getRecordByTypeAndParent($third); 
      $this->_fetch('ajax_filtertag', $data, false, true);  

    }

  }

  function ajax_tourfilter_data($args=false){
    //print_r($args); exit;
    if($args["model"] == "tour"){
  
      //Get default tag name
      $argTag["id"] = $args["firsttag_id"]; 
      $this->load->model("tag_model", "tagModel");     
      $tagQuery = $this->tagModel->getRecord($argTag);

      //print_r($tagQuery); exit;
      $data["tours"]["filter"]["defaulttag"] = $tagQuery[0]->name;


      $this->load->model("tagtour_model", "tagtourModel");       
      if($args["thirdtag_id"] == 0){

        $argTour["type_id"] = $args["firsttag_id"];    
        $argTour["tag_id"]  = $args["secondtag_id"];  
        $argTour["menu"][0] = $args["firsttag_id"];  
        $argTour["menu"][1] = $args["secondtag_id"];    
        $argTour["per_page"] = 20;      
        $argTour["offset"] = 0;      
        $data["tours"]["tour"] = $this->tagtourModel->getRecordByType($argTour);  
      }else{

        $explode_thirdtag = explode(",", $args["thirdtag_id"]);
        unset($explode_thirdtag[count($explode_thirdtag)-1]);
        $implode_thirdtag = implode(",", $explode_thirdtag);


        $argTour["type_id"] = $args["firsttag_id"];    
        $argTour["tag_id"]  = $args["secondtag_id"];
        $argTour["subtype_id"] = $implode_thirdtag;  

        $argTour["menu"][0] = $args["firsttag_id"];  
        $argTour["menu"][1] = $args["secondtag_id"]; 


        $count = 2;
        foreach($explode_thirdtag as $key => $value) {
          $argTour["menu"][$count] = $value; 
          $count++;
        }
  
           
        $argTour["per_page"] = 20;      
        $argTour["offset"] = 0;      
        $data["tours"]["tour"] = $this->tagtourModel->getRecordBySubTypeIn($argTour);  
      }

      //print_r($data);
      $this->_fetch('ajax_filterdata', $data, false, true);        
    }


  }


  function user_create($id = false){


     //header('Content-Type: text/xml; charset=utf-8');
    //echo "user create : ".$id;
    $data = false;

    //print_r($tagQuery); exit;
    $this->load->model("type_model", "typeModel"); 
    $this->load->model("tagtype_model", "tagtypeModel"); 

    $this->load->model("tag_model", "tagModel");   
    $this->load->model("tagtour_model", "tagtourModel"); 
    $this->load->model("taghotel_model", "taghotelModel"); 
    if($id){
      //Edit

    }else{

      ////////////////////////
      // Tour
      ////////////////////////

      //Type
      $args["name"] = "customtour_tour_filter";
      $type = $this->typeModel->getRecord($args);

      //First tag
      $first["type_id"] = $type[0]->id;      
      $first["parent_id"] = 0;
      $firsttag = $this->tagtypeModel->getCustomTourRecord($first);

      $default_tag = $firsttag[0]->name;

      //Second tag
      foreach ($firsttag as $key => $valueFirstTag) {
        $second["where_in"][] = $valueFirstTag->tag_id;
      }
      $secondtag = $this->tagtypeModel->getUniqRecordByWhereIn($second); 

      //Third tag
      $third["type_id"] = $type[0]->id;     
      $third["parent_id"]  = $secondtag[0]->tag_id;  
      //$third["parent_id"][0] = $firsttag[0]->tag_id;
      $thirdtag  = $this->tagtypeModel->getRecordByTypeAndParent($third); 

      //sprint_r($thirdtag); exit();      
      $data["tours"]["filter"]["firsttag"] = $firsttag;
      $data["tours"]["filter"]["secondtag"] = $secondtag;
      $data["tours"]["filter"]["thirdtag"] = $thirdtag;

      $data["tours"]["filter"]["defaulttag"] = $firsttag[0]->name;

      $argTour["type_id"] = $firsttag[0]->tag_id;    
      $argTour["tag_id"]  = $secondtag[0]->tag_id;   
      $argTour["menu"][0] = $firsttag[0]->tag_id;  
      $argTour["menu"][1] = $secondtag[0]->tag_id;    
      $argTour["per_page"] = 20;      
      $argTour["offset"] = 0;      
      $data["tours"]["tour"] = $this->tagtourModel->getRecordByType($argTour);  


      ////////////////////////
      // Hotel
      ////////////////////////
/*
      //Type
      $args["name"] = "customtour_hotel_filter";
      $type = $this->typeModel->getRecord($args);

      //First tag
      $first["type_id"] = $type[0]->id;      
      $first["parent_id"] = 0;
      $firsttag = $this->tagtypeModel->getCustomTourRecord($first);

      $default_tag = $firsttag[0]->name;
      //print_r($firsttag); exit;
      //Second tag
      foreach ($firsttag as $key => $valueFirstTag) {
        $second["where_in"][] = $valueFirstTag->tag_id;
      }
      $secondtag = $this->tagtypeModel->getUniqRecordByWhereIn($second); 

      //print_r($secondtag); exit;

      //Third tag
      $third["type_id"] = $type[0]->id;     
      $third["parent_id"]  = $secondtag[0]->tag_id;  
      //$third["parent_id"][0] = $firsttag[0]->tag_id;
      $thirdtag  = $this->tagtypeModel->getRecordByTypeAndParent($third); 

      //sprint_r($thirdtag); exit();      
      $data["tours"]["filter"]["firsttag"] = $firsttag;
      $data["tours"]["filter"]["secondtag"] = $secondtag;
      $data["tours"]["filter"]["thirdtag"] = $thirdtag;

      $data["tours"]["filter"]["defaulttag"] = $firsttag[0]->name;

      $argTour["type_id"] = $firsttag[0]->tag_id;    
      $argTour["tag_id"]  = $secondtag[0]->tag_id;   
      $argTour["menu"][0] = $firsttag[0]->tag_id;  
      $argTour["menu"][1] = $secondtag[0]->tag_id;    
      $argTour["per_page"] = 20;      
      $argTour["offset"] = 0;      
      $data["tours"]["tour"] = $this->tagtourModel->getRecordByType($argTour);  
*/


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