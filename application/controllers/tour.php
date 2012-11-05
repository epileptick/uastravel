<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  
  function user_index(){
    //Default function for call read method
    $this->user_list();
  }

  function user_test(){
      $this->_fetch('user_test', "", false, true);
  }
  function user_list($id=false){
      $data = "";   

      //Menu
      $type["type_id"] = 1;
      $this->load->model("tagtype_model", "tagtypeModel");   
      $data["menu"] = $this->tagtypeModel->getRecord($type);


      $count = 0;
      foreach ($data["menu"] as $key => $value) {
        # code...


        $this->load->model("tag_model", "tagModel");
        $tag["id"] = $value->tag_id;
        $tagQuery = $this->tagModel->getRecord($tag);

        //print_r($tagQuery); exit;
        $data["menu"][$count]->name = $tagQuery[0]->name;
        $count++;
      }
      //print_r($data); exit;


      //Tour
      $data["tour"] = $this->tourModel->getRecord();


      $this->load->model("tag_model", "tagModel");      
      $this->_fetch('user_list', $data, false, true);

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
          $data["tag"][] = $this->tagModel->getRecord($tag);
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
    $this->admin_list();
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

        $args["url"] = Util::url_title($args["name"])."-".$insertTourID;
        $tour["id"] = $insertTourID;
        $insertTourID =  $this->tourModel->updateRecord($tour);
        
        
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
    $args["url"] = Util::url_title($args["name"])."-".$args["id"];

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


        //Query list data
        $data["tour"] = $this->tourModel->getRecord();  


        //Fetch data to list page
        $data["message"] = "Update successful !!!";
        $this->_fetch('admin_list', $data);       
    } else {
        $this->tourModel->addRecord($args);
    } 

  } 

  function admin_delete($id=false){
    //implement code here
    if($id) {
        $this->tourModel->deleteRecord($id);

        $data["tour"] = $this->tourModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('admin_list', $data);        
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

}
?>