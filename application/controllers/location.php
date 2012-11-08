<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  function _index($where=""){
    $locationData["location"] = $this->locationModel->get($where);
    return $locationData;
  }
  
  function admin_index(){
    $tag = $this->uri->segment(2);
    $where = array(
                  'limit'=>'',
                  'returnObj'=>'',
                  'order'=>'id desc',
                  'where'=>''
                );
    if(empty($tag)){
      //$where['where'] = array('');
    }
    $result = $this->_index($where);
    $this->_fetch("admin_list",$result);
  }
  
  function user_index(){
    $tag = $this->uri->segment(2);
    $where = array(
                  'limit'=>'',
                  'returnObj'=>'',
                  'order'=>'',
                  'where'=>''
                );
    if(empty($tag)){
      //$where['where'] = array('');
    }
    $result = $this->_index($where);
                                      
    $this->_fetch("user_list",$result);
  }


  function _location_menu($select=false){
      $type["type_id"] = 2;
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


  function _location_list($tags){

    //print_r($tags); exit;
    $count = 0;
    $this->load->model("taglocation_model", "taglocationModel");
    foreach ($tags as $key => $valueTag) {
      //Tour Tag
      $tagLocation["tag_id"] = $valueTag->tag_id;
      $tagLocation["join"] = true;
      $tagLocationQuery = $this->taglocationModel->getRecord($tagLocation);

      //print_r($tagLocationQuery); exit;
      if(!empty($tagLocationQuery)){
        foreach ($tagLocationQuery as $key => $value) {
          # code...
          $location[$count] = $value;
          $count++;
        }
      }

    }

    if(!empty($location)){
      return $location;
    }else{
      return ;
    }

  }  
  
  function user_list($tag=false){
    
    $data["menu"]= $this->_location_menu($tag);


    if($tag){
      //Tag
      $argTag["url"] = $tag;      
      $tagQuery = $this->tagModel->getRecord($argTag);

      if(!empty($tagQuery)){
        $tagForLocation[0]->tag_id = $tagQuery[0]->id;        
        //Tour
       $data["location"] = $this->_location_list($tagForLocation);    
      }else{
        $data["location"] = false;
      }
    }else{
      //Send tag for get data
      $data["location"] = $this->_location_list($data["menu"]);
    }

    //print_r($data); exit;
    $this->_fetch('user_list', $data, false, true);

  }


  
  function admin_create($id=NULL){
    $_post = $this->input->post();
    
    $_post['body'] = preg_replace("/<p[^>]*><\\/p[^>]*>/", '', $_post['body']); 

    if($this->input->post("submit") != NULL OR $this->input->post("ajax")==TRUE){
      
      if( isset($_post["id"]) ){ 
        $postData = $this->locationModel->updateRecord($_post);


        ////////////////////////////////////////////
        //Update (TagLocation) relationship data table 
        ////////////////////////////////////////////        
        if(!empty($_post["tags"])){ 
          $this->load->model("taglocation_model", "taglocationModel");
          $this->taglocationModel->updateRecord($_post);
        }
        


      }else{        
        $postData = $this->locationModel->addRecord($_post);
        
        if(!empty($_post["tags"])){
          ////////////////////////////////////////////
          //Add (TagTour) relationship data table 
          ////////////////////////////////////////////         
          $this->load->model("tag_model", "tagModel");
          $this->load->model("taglocation_model", "tagLocationModel");
          $count = 0;
          $tagTour = false;
          $tagArray = $this->tagModel->cleanTagAndAddTag($_post["tags"]);
          foreach ($tagArray as $key => $value) {
            $tagLocation[$count]["tag_id"] = $value->id;
            $tagLocation[$count]["location_id"] = $postData;
            $count++;
          }
          $this->tagLocationModel->addMultipleRecord($tagLocation);        
        }
      }
      //print_r($postData);  exit;
      if($postData){
        if($this->input->post("ajax")==TRUE){
          $data['id'] = $postData;
          $data['status'] = $this->_fetch('ajax_save_success',$data,TRUE,TRUE);
          echo json_encode($data);
          die;
        }else{ 
          $data['post_data']['id'] = $postData;
          //print_r($_post); exit;
          $this->_fetch('admin_add_success',$data);
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
                            'loc_body' => "",
                            'loc_suggestion' => "",
                            'loc_route' => ""
                            );
      }else{
        $postData = $this->locationModel->readRecord(array('id'=>$id));
        if(!$postData){
          redirect(base_url("admin/location/create"));
          die;
        }

        //Query (TagTour) relationship data table by tour_id
        $this->load->model("taglocation_model", "taglocationModel");  
        $tagLocation["location_id"] = $id;
        $data["tagLocation"] = $this->taglocationModel->getRecord($tagLocation);  
        //print_r($data["tagTour"]); exit;
        if(!empty($data["tagLocation"]) && $data["tagLocation"]){
          //$this->load->model("tag_model", "tagModel");
          foreach ($data["tagLocation"] as $key => $value) {
            //echo $value->tag_id; echo "<br>";
            $this->load->model("tag_model","tagModel"); 
            $tagTour["id"] = $value->tag_id;
            $tag_result = $this->tagModel->getRecord($tagTour);
            $data["tag_query"][] = $tag_result[0];
          }
        }         
        $data['post'] = $postData; 
      }

      $this->load->model("tag_model","tagModel"); 
      $field = "tag_id, tag_name";
      $data["tag"] = $this->tagModel->getRecord(false, $field);

      $this->_fetch('admin_add_form',$data);
    }
  }
  
  function user_view($id=FALSE){  
    if($id){
      $this->load->model("images_model", "imagesModel");
      $locationData["location"] = $this->locationModel->get($id);
      $locationData["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$id,'table_id'=>1)));
      //var_dump($locationData["images"]);exit;
      $locationData["location"] = $locationData["location"][0];
      //Prepare for three column
      //var_dump($locationData["location"]['body']);
      if(preg_match("#<blockquote>(.*)</blockquote>#smiU", $locationData["location"]['body'],$matches)){
        $locationData["location"]['body'] = str_replace($matches[0], '', $locationData["location"]['body']);
        $locationData["location"]['subtitle'] = strip_tags($matches[1]);
      }
      $locationData["location"]['body'] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $locationData["location"]['body']));

      //Tag
      $location["location_id"] = $id;
      $this->load->model("taglocation_model", "taglocationModel");
      $tagLocationQuery["tag"] = $this->taglocationModel->getRecord($location);
      if(!empty($tagLocationQuery["tag"])){
        //TagTour
        $count = 0;
        foreach ($tagLocationQuery["tag"] as $key => $value) {
          $this->load->model("tag_model", "tagModel");

          $tag["id"] = $value->tag_id;
          $tagQuery = $this->tagModel->getRecord($tag);
          $locationData["tag"][] = $tagQuery[0];
          $count++;
        }
      }

      $this->_fetch("user_view",$locationData,FALSE,TRUE);
    }
  }
  
  function update(){
    //implement code here
    
  }
  
  function admin_delete($id=NULL){
    //implement code here
    if(is_numeric($id)){
      $this->locationModel->delete($id);
      redirect(base_url("admin/location"));
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