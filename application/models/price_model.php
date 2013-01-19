<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Price_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "pri";
    $this->_column = array(  
                     'id'                    => 'pri_id',
                     'agency_id'             => 'pri_agency_id',
                     'tour_id'               => 'pri_tour_id',
                     'name'                  => 'pri_name',
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
  
  function getMaxPriceRecord($args=false){
    if(isset($args["tour_id"])){
      //Get category by name
      $data["pri_tour_id"] = $args["tour_id"];
      $this->db->select_max('pri_sale_adult_price');
      $query = $this->db->get_where('ci_price', $args);
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

      $data["pri_agency_id"] = $args["agency_id"];
      $data["pri_tour_id"] = $args["tour_id"];

      $this->db->order_by('CONVERT( pri_name USING tis620 ) ASC');   
      $query = $this->db->get_where('ci_price', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());      
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["agency_id"])){
      //Get category by name

      $data["pri_agency_id"] = $args["agency_id"];
      $this->db->order_by('CONVERT( pri_name USING tis620 ) ASC');   
      $query = $this->db->get_where('ci_price', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tour_id"]) && !empty($args["distinct"]) && $args["distinct"] == 1){
      //Get category by name
      $data["pri_tour_id"] = $args["tour_id"];
      $this->db->select($args['distinct_field']);
      $this->db->distinct();
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

      $this->db->order_by('CONVERT( pri_name USING tis620 ) ASC');   
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
    //print_r($data); exit;
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        $this->db->set($columnName, $columnValue); 
      }
      $this->db->insert("ci_price");

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


    if(!empty($args["price"])){
      $price["tour_id"] = $args["tour_id"];
      $query = $this->getRecord($price);      
/*      foreach ($args["price"] as $key => $value) {
        $args["price"][$key]["tour_id"] = $args["tour_id"];
      }
*/

      //print_r($query); exit;
      $input = $args["price"];

      //print_r($input); exit;
      if(empty($query) && !empty($args["price"])){

      
        //Insert new data
        $this->priceModel->addMultipleRecord($args["price"]);
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


        //Insert & Update
        foreach ($input as $keyInput => $valueInput) {         
          if($valueInput["pri_id"] == 0){
            unset($valueInput["pri_id"]);
            $insertArray[$insertCount] = $valueInput;
            $insertCount++;
          }else{
            $updateArray[$updateCount] = $valueInput;
            $updateCount++;              
          }
        }

        //Delete
        foreach ($query as $keyQuery => $valueQuery) {
          $queryPriceID[] = $valueQuery->id;
  
        }

        foreach ($input as $keyInput => $valueInput) {
          $inputPriceID[] = $valueInput["pri_id"];
        }


        $deleteArray = array_diff($queryPriceID , $inputPriceID);
/*
        print_r($insertArray); 
        print_r($updateArray); 
        print_r($deleteArray); exit;
*/
        if(!empty($insertArray)){ 
          $this->addMultipleRecord($insertArray);
        } //End check update new data

        if(!empty($deleteArray)){
          foreach ($deleteArray as $key => $value) {
            # code...
            $deletePrice["pri_id"] = $value;
            $this->deleteRecord($deletePrice);
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


    //print_r($data); exit;
    if(!empty($data["pri_id"])){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        $this->db->set($columnName, $columnValue); 
      }
      $query = $this->db->where("pri_id", $data["pri_id"]);
      $query = $this->db->update("ci_price");
    }else if($data["pri_tour_id"]  && $data["pri_agency_id"]){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        $this->db->set($columnName, $columnValue); 
      }
      $query = $this->db->where("pri_tour_id", $data["pri_tour_id"]);
      $query = $this->db->where("pri_agency_id", $data["pri_agency_id"]);
      $query = $this->db->update("ci_price");

    }
  }

  function deleteRecord($args=false){
    if(isset($args["pri_id"])){
      $this->db->where("pri_id", $args["pri_id"]);
      $this->db->delete("ci_price");
    }else if(isset($args["tour_id"])){
      $this->db->where("pri_tour_id", $args["tour_id"]);
      $this->db->delete("ci_price");
    }    
  }
}
?>