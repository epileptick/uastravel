<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AgencyTour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "agt";
    $this->_column = array(  
                     'id'                    => 'agt_id',
                     'agency_id'             => 'agt_agency_id',
                     'tour_id'               => 'agt_tour_id',
                     'sale_adult_price'      => 'agt_sale_adult_price',
                     'net_adult_price'       => 'agt_net_adult_price',
                     'discount_adult_price'  => 'agt_discount_adult_price',
                     'sale_child_price'      => 'agt_sale_child_price',
                     'net_child_price'       => 'agt_net_child_price',
                     'discount_child_price'  => 'agt_discount_child_price'
    );
  }
 
  function mapField($result){
    
    foreach ($result as $key => $value) {
      $data = new stdClass();
      foreach ($value as $keyField => $valueFiled) {
        $keyExplode = explode("_", $keyField, 2);
        $newkey = $keyExplode[1];

        $data->$newkey = $valueFiled; 
      }
      $newResult[] = $data;      
    }

    return $newResult;
  }
  
  function getMaxPriceRecord($args=false){
    if(isset($args["tour_id"])){
      //Get category by name
      $data["agt_tour_id"] = $args["tour_id"];
      $this->db->select_max('agt_sale_adult_price');
      $query = $this->db->get_where('ci_agencytour', $args);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }
  }  
  function getRecord($args=false){
    //print_r($args); exit;

    if(isset($args["agency_id"]) && isset($args["tour_id"]) ){
      //Get category by name

      $data["agt_agency_id"] = $args["agency_id"];
      $data["agt_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_agencytour');
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["agency_id"])){
      //Get category by name

      $data["agt_agency_id"] = $args["agency_id"];
       $query = $this->db->get_where('ci_agencytour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tour_id"])){
      //Get category by name
      $data["agt_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_agencytour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_agencytour', array('agt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_agencytour");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    

  }


  function addRecord($data=false){
    //print_r($data); exit;
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        $this->db->set($columnName, $columnValue); 
      }
      $this->db->insert("ci_agencytour");

      return $this->db->insert_id();
    }
    
    return ;
  }
  
  function addMultipleRecord($args=false){

    if($args){
      $count = 0;
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);  
         $count++;
      }
      return ;
    }else{
      return ;
    }
  }     


  function updateRecord($args=false){
    //Get tagtour by tour_id
    //$agency["tour_id"] = $args["id"];
    //$query = $this->getRecord($agency);


    //Get tagtour by tour_id


    if(!empty($args["agency_tour"])){
      $agency["tour_id"] = $args["id"];
      $query = $this->getRecord($agency);      
      foreach ($args["agency_tour"] as $key => $value) {
        $args["agency_tour"][$key]["tour_id"] = $args["id"];
      }

      $input = $args["agency_tour"];


      if(empty($query) && !empty($args["agency_tour"])){

      
        //Insert new data
        $this->agencytourModel->addMultipleRecord($args["agency_tour"]);
      }else{



        //print_r($input);
        //print_r($query); exit;

        $update = false;
        $updateCount = 0;
        $updateArray = array();
        $updateData =  array();

        $deleteCount = 0;
        $deleteArray = array();

        $insert = false;
        $insertCount = 0;
        $insertArray = array();
        $insertAgencyTour = array();



        //Loop check update && delete
        foreach ($query as $keyQuery => $valueQuery) {
          foreach ($input as $keyInput => $valueInput) {         
            if($valueQuery->agency_id == $valueInput["agency_id"]){
                $update = true;
                $updateData = $valueInput;
            }
          }

          if($update){
            //Update
            $updateArray[$updateCount] = $updateData;
            $updateCount++;  
            $update = false;  
          }else{
            //Delete
            $deleteArray[$deleteCount] = $valueQuery;
            $deleteCount++; 
          }     
        }


        //Loop check insert
        foreach ($input as $keyInput => $valueInput) {
          foreach ($query as $keyQuery => $valueQuery) {          
            if($valueInput["agency_id"] == $valueQuery->agency_id){
                $insert = true;
            }
          }

          //Insert
          if($insert){
              $insert = false;  
          }else{
              $insertArray[$insertCount] = $valueInput;
              $insertAgencyTour[$insertCount]["agency_id"] = $valueInput["agency_id"];
              $insertAgencyTour[$insertCount]["tour_id"] = $args["id"];
              $insertCount++; 
          }     
        }

        if(!empty($insertArray)){ 
          $this->addMultipleRecord($insertArray);
        } //End check update new data

        if(!empty($deleteArray)){
          foreach ($deleteArray as $key => $value) {
            # code...
            $deleteAgencyTour["id"] = $value->id;
            $this->deleteRecord($deleteAgencyTour);
          }
        } //End check delete data*/


        if(!empty($updateArray)){ 
          //print_r($updateArray); exit;
          foreach ($updateArray as $key => $value) {
            # code...
            $this->_updateRecord($value);
          }
        } //End check update new data

      } //End main check new data

    }else{

      return;
    }//End check agency data

    return ;
  }  

  function _updateRecord($data=false){
    if(!empty($data["id"])){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $query = $this->db->where("agt_id", $data["id"]);
      $query = $this->db->update("ci_agencytour");
    }else if($data["tour_id"]  && $data["agency_id"]){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $query = $this->db->where("agt_tour_id", $data["tour_id"]);
      $query = $this->db->where("agt_agency_id", $data["agency_id"]);
      $query = $this->db->update("ci_agencytour");

    }
  }

  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("agt_id", $args["id"]);
      $this->db->delete("ci_agencytour");
    }else if(isset($args["tour_id"])){
      $this->db->where("agt_tour_id", $args["tour_id"]);
      $this->db->delete("ci_agencytour");
    }    
  }
}
?>