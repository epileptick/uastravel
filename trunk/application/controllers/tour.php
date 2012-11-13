<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {
  function __construct(){
    parent::__construct();
  }


  function user_index(){
    //Default function for call read method
    $keyword = $this->input->post();

    if($keyword){
      $this->_search("user_list");
    }else{
      $this->user_list();
    }
  }

  function user_test(){
      $this->_fetch('user_test', "", false, true);
  }
  

  function _tour_menu($select=false){
      $type["type_id"] = 4;
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


  function _tour_list($tags){

    $count = 0;
    $this->load->model("tagtour_model", "tagtourModel");
    $tour = $this->tagtourModel->getRecord($tags);

    //print_r($tour); exit;
    if(!empty($tour)){
      return $tour;
    }else{
      return ;
    }
  }  

  function user_list($tag=false){


    $per_page = 6;
    $data["menu"]= $this->_tour_menu($tag);

    if($tag){
      //////////////////////////////////////////////////////
      // List by tag
      // algorithm : localhost/uastravel/tour/tag/page
      // example : localhost/uastravel/tour/เชียงใหม่
      //           localhost/uastravel/tour/เชียงใหม่/2
      //           localhost/uastravel/tour/เชียงใหม่/3
      //////////////////////////////////////////////////////

      //Filter by tag
      //Tag
      $argTag["url"] = $tag;      
      $tagQuery = $this->tagModel->getRecord($argTag);
      if(!empty($tagQuery)){
        $query["tag_id"] = $tagQuery[0]->id;
        $query["join"] = true;
        $query["per_page"] = $per_page;
        $query["offset"] = ($this->uri->segment(3))?($this->uri->segment(3)-1)*$query["per_page"]:0;   
        //Tour
       $data["tour"] = $this->_tour_list($query);
      }else{
        $data["tour"] = false;
      }
    }else{
      //////////////////////////////////////////////////////
      // List all 
      // algorithm : localhost/uastravel/tour/page
      // example : localhost/uastravel/tour/
      //           localhost/uastravel/tour/2
      //           localhost/uastravel/tour/3
      //////////////////////////////////////////////////////

      //Filter all
      foreach ($data["menu"] as $key => $valueTag) {
        $query["tag_id"][] = $valueTag->tag_id;
      }
      $query["join"] = true;
      $query["in"] = true;
      $query["per_page"] = $per_page;
      $query["offset"] = ($this->uri->segment(2))?($this->uri->segment(2)-1)*$query["per_page"]:0;   

      ///print_r($tagtour); exit;
      //Pagination
      /*
      $this->load->library('pagination');
      $config['per_page'] = $tagtour["per_page"];
      $config['base_url'] = base_url("tour");
      $this->load->model("tagtour_model", "tagtourModel");
      $config['total_rows'] = $this->tagtourModel->countRecord($tagtour);
      $this->pagination->initialize($config); 
      */
      //Send tag for get data
      $data["tour"] = $this->_tour_list($query);
    }
      //print_r($data);   exit;

    if($query["offset"]>0){
      $this->_fetch('user_listnextpage', $data, false, true);
    }else{
      //print_r($data);   
      $this->_fetch('user_list', $data, false, true);
    }

  }


  function user_view($id=false){
    //print_r($id); exit;


    if($id){    
      //Tour
      $tour["id"] = $id;
      $tagtour["tour_id"] = $id;
      $agencytour["tour_id"] = $id;      
      $data["tour"] = $this->tourModel->getRecord($tour); 

      //Tag
      $this->load->model("tagtour_model", "tagtourModel");
      $tagtourQuery["tag"] = $this->tagtourModel->getRecord($tagtour);
      if(!empty($tagtourQuery["tag"])){
        //TagTour
        $count = 0;
        foreach ($tagtourQuery["tag"] as $key => $value) {
          $this->load->model("tag_model", "tagModel");

          $tag["id"] = $value->tag_id;
          $tagQuery = $this->tagModel->getRecord($tag);
          $data["tag"][] = $tagQuery[0];
          $count++;
        }
      }


      //Price
      $this->load->model("agencytour_model", "agencytourModel");
      $agencytourQuery["price"] = $this->agencytourModel->getRecord($agencytour);

      if(!empty($agencytourQuery["price"])){
        $maxAgencyPrice->sale_adult_price = 0;
        foreach ($agencytourQuery["price"] as $key => $value) {
          # code...
          if($value->sale_adult_price > $maxAgencyPrice->sale_adult_price){
            $data["price"][0] = $value;
          }
        }
      }

      //Images
      $this->load->model("images_model", "imagesModel");
      $data["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$id,'table_id'=>2)));
      //print_r($data["images"]);exit;

      /*
      //Prepare for three column
      //var_dump($locationData["location"]['body']);
      if(preg_match("#<blockquote>(.*)</blockquote>#smiU", $locationData["location"]['body'],$matches)){
        $locationData["location"]['body'] = str_replace($matches[0], '', $locationData["location"]['body']);
        $locationData["location"]['subtitle'] = strip_tags($matches[1]);
      }
      $locationData["location"]['body'] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $locationData["location"]['body']));
      */

      //Return
      $this->_fetch('user_view', $data, false, true);
    }


  }


  /////////////////////////////////////////
  //
  //  Admin method
  //
  /////////////////////////////////////////
  function admin_index(){
    //Default function for call read method
    $keyword = $this->input->post();

    if(!empty($keyword["search"])){
      $this->_search("admin_list");
    }else{
      $this->admin_list();
    }
  }


  function admin_list(){

      $data["tour"] = $this->tourModel->getRecord();   
      $this->_fetch('admin_list', $data);
   }

  function admin_create($id=false){
    //implement code here  

    //Get argument from post page
    $args = $this->input->post();

    //Send argument to validate function
    $validate = $this->validate($args);

    //Load other model
    $this->load->model("language_model","languageModel");  
    $data["language"] = $this->languageModel->getRecord();    


    $this->load->model("tag_model","tagModel"); 
    $field = "tag_id, tag_name";  
    $data["tag"] = $this->tagModel->getRecord(false, $field);   


    $this->load->model("agency_model","agencyModel"); 
    $field = "agn_id, agn_name";  
    $data["agency"] = $this->agencyModel->getRecord(false, $field);   


    //print_r($data["agency"]); exit;

    ///////////////////////
    //Check update (id)
    ///////////////////////
    if($id){
      //Query data by tour_id
      $args["id"] = $id;      
      $data["tour"] = $this->tourModel->getRecord($args);

      //Check update     
      if($data["tour"]>0){

        //Query (AgencyTour) relationship data table by tour_id
        $this->load->model("agencytour_model", "agencytourModel");  
        $agencyTour["tour_id"] = $id;
        $data["agencyTour"] = $this->agencytourModel->getRecord($agencyTour);  
        
        if(!empty($data["agencyTour"])){
          $this->load->model("agency_model", "agencyModel");  
          $field = "agn_id, agn_name"; 
          foreach ($data["agencyTour"] as $key => $value) {
            $agency["id"] = $value->agency_id;
            $queryAgency = $this->agencyModel->getRecord($agency);  
            //print_r($queryAgency);
            $data["agencyTour"][$key]->agency_name = $queryAgency[0]->name;
          }
        } 
           
        //Query (TagTour) relationship data table by tour_id
        $this->load->model("tagtour_model", "tagtourModel");  
        $tagTour["tour_id"] = $id;
        $data["tagTour"] = $this->tagtourModel->getRecord($tagTour, $field);  
        //print_r($data["tagTour"]); exit;
        if(!empty($data["tagTour"]) && $data["tagTour"]){
          //$this->load->model("tag_model", "tagModel");  
          foreach ($data["tagTour"] as $key => $value) {
            //echo $value->tag_id; echo "<br>";
            $this->load->model("tag_model","tagModel"); 
            $tagTour["id"] = $value->tag_id;
            $tag_result = $this->tagModel->getRecord($tagTour);
            $data["tag_query"][] = $tag_result[0];
          }
        }
        
        //Send data to update form
        $this->_fetch('admin_update', $data);
      }else{
        //Send to create form
        $this->_fetch('admin_create', $data);
      }
    
    ///////////////////////
    //End update (id)
    ///////////////////////
    }else{
      if($validate == FALSE){
        //Send to create form

        $this->load->model("tag_model","tagModel"); 
        $field = "tag_id, tag_name";  
        $data["tag"] = $this->tagModel->getRecord(false, $field);   

        $this->_fetch('admin_create', $data);
      }else{

        ////////////////////////////////////////////
        //Add (Tour) main table 
        //////////////////////////////////////////// 
        $insertTourID =  $this->tourModel->addRecord($args);

        //$args["url"] = Util::url_title($args["name"])."-".$insertTourID;
        //$tour["id"] = $insertTourID;
        //$insertTourID =  $this->tourModel->updateRecord($tour);
        

        $this->_uploadImage($insertTourID);
        
        ////////////////////////////////////////////
        //Update images parent_id 
        //////////////////////////////////////////// 
        if(!empty($insertTourID)){
          $this->load->model("images_model","imagesModel"); 
          $options = array(
                            'where'=>array(
                                          'parent_id'=>$args['fakeid']
                                          ),
                            'set'=>array(
                                          'parent_id'=>$insertTourID)
                          );
          $this->imagesModel->update($options);
        }

        ////////////////////////////////////////////
        //Add (AgencyTour) relationship data table 
        ////////////////////////////////////////////  
        if(!empty($args["agency_tour"])){
          $this->load->model("agencytour_model", "agencytourModel"); 
          foreach ($args["agency_tour"] as $key => $value) {
            $args["agency_tour"][$key]["tour_id"] = $insertTourID;
          }
          $this->agencytourModel->addMultipleRecord($args["agency_tour"]);

        }

        ////////////////////////////////////////////
        //Add (TagTour) relationship data table 
        ////////////////////////////////////////////        
        $this->load->model("tagtour_model", "tagTourModel");
        $count = 0; 
        $tagTour = false;
        
        $this->load->model("tag_model", "tagModel");
        $tagArray = $this->tagModel->cleanTagAndAddTag($args["tags"]);
        foreach ($tagArray as $key => $value) {
          $tagTour[$count]["tag_id"] = $value->id;
          $tagTour[$count]["tour_id"] = $insertTourID;
          $count++;
        }
        $this->tagTourModel->addMultipleRecord($tagTour);
        
        //Redirect
        redirect(base_url("admin/tour/"));
      }
    }

  }

  function admin_view($tag=false, $tourname=false){
    //implement code here

     //Get argument from url
    $tour["name"] = $tourname;
    $tag["name"] = $tag;



    if($tag["name"] && $tour["name"]){

      echo "tag && tour";
    }else if($tag["name"]){
      ////////////////////////////////////////////
      //Get tag data
      ////////////////////////////////////////////        
      $this->load->model("tag_model", "tagModel");
      $tagQuery["tag"] = $this->tagModel->getRecord($tag);
      $tagArgument["tag_id"] = $tagQuery["tag"][0]->id;
      //print_r($data["tag"][0]); exit;

      ////////////////////////////////////////////
      //Get tagtour data
      ////////////////////////////////////////////        
      $this->load->model("tagtour_model", "tagtourModel");
      $tagtourQuery["tag"] = $this->tagtourModel->getRecord($tagArgument);

      $count = 0;
      foreach ($tagtourQuery["tag"] as $key => $value) {
        # code...
        $tour["id"] = $value->tour_id;

        $tourQuery = $this->tourModel->getRecord($tour);  
        $data["tour"][$count] = $tourQuery[0];
        $data["tour"][$count]->tag_id = $value->tag_id;
        $data["tour"][$count]->tag_name = $tagQuery["tag"][0]->name;
        $count++;
      }


      ////////////////////////////////////////////
      //Get tour data
      //////////////////////////////////////////// 
      //print_r($data) ; exit;
      $this->_fetch('list', $data);
      //$this->_fetch('userview', $data, false, true);          
    }
  }

  function admin_update(){


    //Get argument from post page
    $args = $this->input->post();
    //$args["url"] = Util::url_title($args["name"])."-".$args["id"];

    //print_r($args); exit;

    //$args["tag"] =
    //Send argument to validate function
    $validate = $this->validate($args);



    if($args["id"]) {

        //Update & get current tour id
        $updateTourID = $this->tourModel->updateRecord($args);

        ////////////////////////////////////////////
        //Add (TagTour) relationship data table 
        ////////////////////////////////////////////  
        if(!empty($args["tags"])){ 
          $this->load->model("tagtour_model", "tagTourModel");
          $this->tagTourModel->updateRecord($args);
        }

        ///////////////////////////////////////////
        // Update relationship table (AgencyTour)
        ///////////////////////////////////////////   
        if(!empty($args["agency_tour"])){
          $this->load->model("agencytour_model", "agencytourModel");
          $this->agencytourModel->updateRecord($args);
        }else{
          $this->load->model("agencytour_model", "agencytourModel");
          $tour["tour_id"] = $args["id"];
          $this->agencytourModel->deleteRecord($tour);
        }
        $this->_uploadImage($args["id"]);
        //Redirect
        redirect(base_url("admin/tour")); 
    } else {
        $this->tourModel->addRecord($args);
        //Redirect
        redirect(base_url("admin/tour")); 
    } 

  } 

  function admin_delete($id=false){
    //implement code here
    if($id) {
        $this->tourModel->deleteRecord($id);

        $data["tour"] = $this->tourModel->getRecord();  
        $data["message"] = "Delete successful !!!";
        //Redirect
        redirect(base_url("admin/tour"));      
    } 
  }  

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'tour name', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('short_description', 'short_description', 'required');

    //$this->form_validation->set_rules('detail', 'detail', 'required');
    //$this->form_validation->set_rules('included', 'included', 'required');

    //Validate price
    
    //$this->form_validation->set_rules('net_adult_price', 'net price for adult', 'required|integer');
    //$this->form_validation->set_rules('net_child_price', 'net price for child', 'required|integer');
    //$this->form_validation->set_rules('sale_adult_price', 'sale price for adult', 'required|integer');
    //$this->form_validation->set_rules('sale_child_price', 'sale price for child', 'required|integer');

    //Validate time
    //$this->form_validation->set_rules('start_time', 'start time', 'required');
    //$this->form_validation->set_rules('end_time', 'end time', 'required');

    return $this->form_validation->run();

  }

  function _search($render = "user_list"){
    //Get argument from post page
    $keyword = $this->input->post();

    if($keyword){
      $args["tou_name"] = $keyword["search"];
      $data["tour"] = $this->tourModel->searchRecord($args);
      $this->_fetch($render, $data);
    }else{
      return;
    }
  }
  
  function _uploadImage($TourID=""){
    if(empty($TourID)){
      return FALSE;
    }
    
    //Upload and update Images
    $this->load->library('upload');
    $dir = Hash::make("tour_images")->hash(md5($TourID));

    if(!file_exists($dir)){
      mkdir($dir, 0755,true);
    }else{
      Util::rrmdir($dir);
    }
    
    $config[0]['upload_path'] = $dir;
    $config[0]['allowed_types'] = 'gif|jpg|png';
    $config[0]['file_name'] = md5($TourID)."_first.jpg";
    $this->upload->initialize($config[0]);
    $this->upload->do_upload("frist_image");
    $_firstImg = $this->upload->data();

    
    $config[1]['upload_path'] = $dir;
    $config[1]['allowed_types'] = 'gif|jpg|png';
    $config[1]['file_name'] = md5($TourID)."_background.jpg";
    $this->upload->initialize($config[1]);
    $this->upload->do_upload("background_image");
    $_backgroundImg = $this->upload->data();

    
    $config[2]['upload_path'] = $dir;
    $config[2]['allowed_types'] = 'gif|jpg|png';
    $config[2]['file_name'] = md5($TourID)."_banner.jpg";
    $this->upload->initialize($config[2]);
    $this->upload->do_upload("banner_image");
    $_bannerImg = $this->upload->data();
    echo $this->upload->display_errors();
    
    $imgData["first_image"] = base_url("/".$dir."/".$_firstImg["file_name"]);
    $imgData["background_image"] = base_url("/".$dir."/".$_backgroundImg["file_name"]);
    $imgData["banner_image"] = base_url("/".$dir."/".$_bannerImg["file_name"]);

    $imgData["id"] = $TourID;
    return $this->tourModel->updateRecord($imgData);
  }

}
?>