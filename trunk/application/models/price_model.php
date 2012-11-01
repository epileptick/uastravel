<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Price_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "agt";
    $this->_column = array(  
                     'id'                    => 'pri_id',
                     'agency_id'             => 'pri_agency_id',
                     'tour_id'               => 'pri_tour_id',
                     'sale_adult_price'      => 'pri_sale_adult_price',
                     'net_adult_price'       => 'pri_net_adult_price',
                     'discount_adult_price'  => 'pri_discount_adult_price',
                     'sale_child_price'      => 'pri_sale_child_price',
                     'net_child_price'       => 'pri_net_child_price',
                     'discount_child_price'  => 'pri_discount_child_price'
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
  
  function getRecord($args=false){
    //print_r($args); exit;

    if(isset($args["agency_id"]) && isset($args["tour_id"]) ){
      //Get category by name

      $data["pri_agency_id"] = $args["agency_id"];
      $data["pri_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_price');
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["agency_id"])){
      //Get category by name

      $data["pri_agency_id"] = $args["agency_id"];
       $query = $this->db->get_where('ci_price', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tour_id"])){
      //Get category by name
      $data["pri_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_price', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_price', array('pri_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_price");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    

  }


  function addRecord($data=false){

    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $this->db->insert($this->_table);

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


/*
  function updateRecord($data=false){


    //print_r($data); exit;
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      //$query = $this->db->where("agt_agency_id", $data["agency_id"]);
      $query = $this->db->where("agt_tour_id", $data["tour_id"]);
      $query = $this->db->update("ci_agencytour");
    }
    
    return ;
  }
*/


  function updateRecord($args=false){
    //Get tagtour by tour_id
    //$agency["tour_id"] = $args["id"];
    //$query = $this->getRecord($agency);


    //Get tagtour by tour_id
    $agency["tour_id"] = $args["id"];
    $query = $this->getRecord($args);
    //print_r($query); exit;



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



    //Loop check update && delete
    foreach ($query as $keyQuery => $valueQuery) {
      //echo "Query : ".$valueQuery->tag_id;
      //echo "<br><br>";
      foreach ($input as $keyInput => $valueInput) {
        //echo "Input : ".$valueInput->id;
        //echo "<br><br>";            
        if($valueQuery->tag_id == $valueInput->id){
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
      //echo "Query : ".$valueInput->id;
      //echo "<br><br>";
      foreach ($query as $keyQuery => $valueQuery) {
        //echo "Input : ".$valueQuery->tag_id;
        //echo "<br><br>";            
        if($valueInput->id == $valueQuery->tag_id){
            $insert = true;
            //$insertData = $valueInput;
        }
      }

      //Insert
      if($insert){
          //$updateArray[$updateCount] = $insertData;
          //$updateCount++;  
          $insert = false;  
      }else{
          $insertArray[$insertCount] = $valueInput;
          $insertTagTour[$insertCount]["tag_id"] = $valueInput->id;
          $insertTagTour[$insertCount]["tour_id"] = $args["id"];
          $insertCount++; 
      }     
    }
    //return $updateArray;


 

    if(!empty($insertTagTour)){
      /*echo "Insert : ";
      echo "<br><br>";
      print_r($insertTagTour);
      echo "<br><br>";    
      */     
      $this->addMultipleRecord($insertTagTour);
    }

    if(!empty($deleteArray)){
      /*echo "<br><br>";
      echo "Delete : ";
      echo "<br><br>";
      print_r($deleteArray);
      echo "<br><br>";
*/
      foreach ($deleteArray as $key => $value) {
        # code...
        $deleteTagTour["id"] = $value->id;
        $this->deleteRecord($deleteTagTour);
      }

    }
    //exit;
    /*
      echo "Update : ";
      echo "<br><br>";
      print_r($updateArray);
      echo "<br><br>";
    */
    //exit;
        
    return ;
  }  

  
  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("pri_id", $args["id"]);
      $this->db->delete("ci_price");
    }else if(isset($args["tour_id"])){
      $this->db->where("pri_tour_id", $args["tour_id"]);
      $this->db->delete("ci_price");
    }    
  }
}
?>