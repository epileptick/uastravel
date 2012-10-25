<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  
  function index(){
    //Default function for call read method
    $this->read();
  }
  

  function create($id=false){
    //implement code here  

    //Get argument from post page
    $args = $this->input->post();


    //print_r($args); exit;

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


        if(is_array($data["agencyTour"])){
          $this->load->model("agency_model", "agencyModel");  
          $field = "agn_id, agn_name"; 
          foreach ($data["agencyTour"] as $key => $value) {
            # code...
            $agency["id"] = $value->agency_id;
            $queryAgency = $this->agencyModel->getRecord($agency);  
            //print_r($queryAgency);
            $data["agencyTour"][$key]->agency_name = $queryAgency[0]->name;
          }
        }

        //print_r($data["agencyTour"]); exit;

        //Query (TagTour) relationship data table by tour_id
        $this->load->model("tagtour_model", "tagtourModel");  
        $tagTour["tour_id"] = $id;
        $data["tagTour"] = $this->tagtourModel->getRecord($tagTour, $field);  
        //print_r($data["tagTour"]); exit;


        if(isset($data["tagTour"]) && $data["tagTour"]){
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
        $this->_fetch('update_form', $data);
      }else{
        //Send to create form
        $this->_fetch('create_form', $data);
      }


      ///////////////////////
      //End update (id)
      ///////////////////////
    }else{
      if($validate == FALSE){
        //Send to create form
        $this->_fetch('create_form', $data);
      }else{

        ////////////////////////////////////////////
        //Add (Tour) main table 
        //////////////////////////////////////////// 
        $insertTourID =  $this->tourModel->addRecord($args);


        ////////////////////////////////////////////
        //Add (AgencyTour) relationship data table 
        ////////////////////////////////////////////  

        //print_r($args["agency_tour"]); exit;
        $this->load->model("agencytour_model", "agencytourModel"); 
        foreach ($args["agency_tour"] as $key => $value) {
          $args["agency_tour"][$key]["tour_id"] = $insertTourID;
        }
        $this->agencytourModel->addMultipleRecord($args["agency_tour"]);


        ////////////////////////////////////////////
        //Add (TagTour) relationship data table 
        ////////////////////////////////////////////        
        $this->load->model("tagtour_model", "tagTourModel");
        $count = 0; 
        $tagTour = false;

        $tagArray = $this->cleanTagAndAddTag($args["tags"]);
        foreach ($tagArray as $key => $value) {
          $tagTour[$count]["tag_id"] = $value->id;
          $tagTour[$count]["tour_id"] = $insertTourID;
          $count++;
        }
        $this->tagTourModel->addMultipleRecord($tagTour);


        //Query list data
        $data["tour"] = $this->tourModel->getRecord();  

        //Send data to list page        
        $data["message"] = "Create successful !!!";
        $this->_fetch('list', $data); 
      }
    }

  }

  
  function read($category=false, $tourname=false){
    //implement code here

    //Get argument from url
    $args["category"] = $category;
    $args["tourname"] = $tourname;


    if($args["category"] && $args["tourname"]){

      echo "category && tourname";


      $data["tour"] = $this->tourModel->getRecord($args);

    }else if($args["category"]){
      echo "category";
      $data["tour"] = $this->tourModel->getRecord($args);
    }else{
      $data["tour"] = $this->tourModel->getRecord();   
      $this->_fetch('list', $data);
    }
  }

  function update(){


    //Get argument from post page
    $args = $this->input->post();

    //print_r($args); exit;

    //$args["tag"] =
    //Send argument to validate function
    $validate = $this->validate($args);


    if($args["id"]) {

        //Update & get current tour id
        $updateTourID = $this->tourModel->updateRecord($args);

/*
        ///////////////////////////////////////////
        // Update relationship table (AgencyTour)
        ///////////////////////////////////////////        
        $this->load->model("agencytour_model","agencytourModel"); 
        $agencyTour["agency_id"] = $args["agency_id"];
        $agencyTour["tour_id"] = $args["id"]; 
        $this->agencytourModel->updateRecord($agencyTour); 
*/


        ////////////////////////////////////////////
        //Add (TagTour) relationship data table 
        ////////////////////////////////////////////        
        $this->load->model("tagtour_model", "tagTourModel");
        $count = 0; 
        $tagTour = false;

        //Remove tag in tagtour table
        $tagTour["tour_id"] = $args["id"]; 
        $this->tagTourModel->deleteRecord($tagTour);


        //Call insert tag
        //print_r($args["tags"]); exit;
        $tagArray = $this->cleanTagAndAddTag($args["tags"]);

        //print_r($tagArray);
        foreach ($tagArray as $key => $value) {
          $tagTourAdd[$count]["tag_id"] = $value->id;
          $tagTourAdd[$count]["tour_id"] = $args["id"];
          $count++;
        }
        $this->tagTourModel->addMultipleRecord($tagTourAdd);

        ///////////////////////////////////////////
        // Update relationship table (AgencyTour)
        ///////////////////////////////////////////   
        $this->load->model("agencytour_model", "agencytourModel");
        $tagTour["tour_id"] = $args["id"]; 
        $this->agencytourModel->deleteRecord($tagTour);

        foreach ($args["agency_tour"] as $key => $value) {
          $args["agency_tour"][$key]["tour_id"] = $args["id"];
        }
        $this->agencytourModel->addMultipleRecord($args["agency_tour"]);


        //Query list data
        $data["tour"] = $this->tourModel->getRecord();  


        //Fetch data to list page
        $data["message"] = "Update successful !!!";
        $this->_fetch('list', $data);       
    } else {
        $this->tourModel->addRecord($args);
    } 

  } 

  function delete($id=false){
    //implement code here
    if($id) {
        $this->tourModel->deleteRecord($id);

        $data["tour"] = $this->tourModel->getRecord();  
        $data["message"] = "Delete successful !!!";  
        $this->_fetch('list', $data);        
    } 
  }  

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'tour name', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('detail', 'detail', 'required');
    $this->form_validation->set_rules('included', 'included', 'required');

    //Validate price
    /*
    $this->form_validation->set_rules('net_adult_price', 'net price for adult', 'required|integer');
    $this->form_validation->set_rules('net_child_price', 'net price for child', 'required|integer');
    $this->form_validation->set_rules('sale_adult_price', 'sale price for adult', 'required|integer');
    $this->form_validation->set_rules('sale_child_price', 'sale price for child', 'required|integer');
*/
    //Validate time
    $this->form_validation->set_rules('start_time', 'start time', 'required');
    $this->form_validation->set_rules('end_time', 'end time', 'required');

    return $this->form_validation->run();

  }

  function cleanTagAndAddTag($tags = false){
    ///////////////////////////////////////////
    // Add Tag table sub table
    /////////////////////////////////////////// 

    //print_r($args); exit;
    if(isset($tags)){
      //Remove tags  junk          
      $tags = str_replace('[', '', $tags);  
      $tags = str_replace(']', '', $tags);      
      $tags = str_replace('"', '', $tags);  

      $tags = explode(",",  $tags);
      $args["tags"] = array_unique($tags);

      //Load tag_model
      $this->load->model("tag_model","tagModel"); 
      $args["field"] = "tag_id, tag_name";
      $tagArray =  $this->tagModel->addMultipleRecord($args);

      return $tagArray;    
    }else{

      return false;
    }

  }

}

?>