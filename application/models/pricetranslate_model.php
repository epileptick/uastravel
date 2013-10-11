<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Price_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "pri";
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


    $this->_joincolumn = array(
                     'id'                    => 'prit_id',
                     'lang'                  => 'prit_lang',
                     'price_id'              => 'prit_price_id',
                     'name'                  => 'prit_name'
    ); 
  }
 
  function mapField($result){
    


    foreach ($result as $key => $value) {
      $data = new stdClass();

      foreach ($value as $keyField => $valueFiled) {      
        if( $keyField != "prit_id"){
          $keyExplode = explode("_", $keyField, 2);
          $newkey = $keyExplode[1];
          $data->$newkey = $valueFiled; 
        }
      }
      $newResult[] = $data;      
    }
//print_r($newResult); exit;
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

    if(isset($args["agency_id"]) && isset($args["tour_id"]) ){

      $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);   
      $this->db->where('ci_price.pri_agency_id', $args["agency_id"]); 
      $query = $this->db->get("ci_price");
      //echo $this->db->last_query(); exit;

      //print_r($query->result() ); exit;
      if($query->num_rows > 0){

        foreach ($query->result() as $key => $value) {

          //Get price by tour_id
          $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);   
          $this->db->where('ci_price.pri_agency_id', $args["agency_id"]);   
          $this->db->where('ci_price_translate.prit_price_id', $value->pri_id);        
          $this->db->where('ci_price_translate.prit_lang', $this->lang->lang());
          $this->db->join('ci_price_translate', 'ci_price_translate.prit_price_id = ci_price.pri_id');
          $this->db->order_by('CONVERT( ci_price_translate.prit_name USING tis620 ) ASC');    
          $query = $this->db->get("ci_price"); 

          if($query->num_rows > 0){
            $priceTemp = $this->mapField($query->result());
            $newResult[] = $priceTemp[0];
          }else{

              $this->db->where('ci_price.pri_tour_id', $args["tour_id"]); 
              $this->db->where('ci_price.pri_agency_id', $args["agency_id"]); 
              $this->db->where('ci_price.pri_id', $value->pri_id);
              $query = $this->db->get("ci_price");

              $priceTemp = $this->mapField($query->result());
              $newResult[] = $priceTemp[0];

          }
          //echo $this->db->last_query(); echo "<br>";
        }

        //print_r($newResult); exit;

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
      
    }else if(isset($args["tour_id"]) && $args["event"] == "insert"){

      $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);   
      $query = $this->db->get("ci_price");
      //echo $this->db->last_query(); exit;


      if($query->num_rows > 0){

        foreach ($query->result() as $key => $value) {

          //Get price by tour_id
          $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);  
          $query = $this->db->get("ci_price"); 

          if($query->num_rows > 0){
            $newResult = $this->mapField($query->result());
          }else{

            //Not found & insert
            $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);  
            $query = $this->db->get("ci_price");

            $newResult = $this->mapField($query->result());
          }

        }

        //print_r($newResult); exit;

        return $newResult;
      }else{

        return false;
      }
    }else if(isset($args["tour_id"]) && $args["event"] == "display"){

      $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);   
      $query = $this->db->get("ci_price");
      //echo $this->db->last_query(); exit;


      if($query->num_rows > 0){

        foreach ($query->result() as $key => $value) {

          //Get price by tour_id
          $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);          
          $this->db->where('ci_price_translate.prit_lang', $this->lang->lang());
          $this->db->join('ci_price_translate', 'ci_price_translate.prit_price_id = ci_price.pri_id');
          $this->db->order_by('CONVERT( ci_price_translate.prit_name USING tis620 ) ASC');    
          $query = $this->db->get("ci_price"); 

          if($query->num_rows > 0){
            $newResult = $this->mapField($query->result());
          }else{

            //Not found & insert
            $this->db->where('ci_price.pri_tour_id', $args["tour_id"]);  
            $query = $this->db->get("ci_price");

            $newResult = $this->mapField($query->result());
          }

        }

        //print_r($newResult); exit;

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

    //Insert price
    foreach($data AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }

    $this->db->set("pri_cr_date", date("Y-m-d H:i:s"));
    $this->db->set("pri_lu_date", date("Y-m-d H:i:s"));
    $this->db->insert("ci_price");
    $id = $this->db->insert_id();

    //Insert price_translate
    foreach($data AS $columnJoinName=>$columnJoinValue){

        if($columnJoinName != "id"){
          if(array_key_exists($columnJoinName, $this->_joincolumn)){        
            $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
          }   
        }else{
            $this->db->set("prit_price_id", $id); 
        }
    }

    $this->db->set("prit_cr_date", date("Y-m-d H:i:s"));
    $this->db->set("prit_lu_date", date("Y-m-d H:i:s"));
    $this->db->insert("ci_price_translate");    
    
    //echo $this->db->last_query(); exit;
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

    //print_r($args["price"]); exit;
    if(!empty($args["price"])){

      //Seperate price & price translate
      $inputPriceArray = array();
      $inputPriceTranslateArray = array();
      $count = 0;
      foreach ($args["price"] as $key => $value) {
        $inputPriceTranslateArray[$count]["price_id"] = $value["id"];
        $inputPriceTranslateArray[$count]["lang"] = $value["lang"];
        $inputPriceTranslateArray[$count]["name"] = $value["name"];
        unset($value["lang"], $value["name"]);

        $inputPriceArray[$count] = $value;

        $count++;
      }
      /*
      //print_r($priceArray); 
      //print_r($priceTranslateArray); 
      exit;
      */

      $price["tour_id"] = $args["tour_id"];
      $price["event"] = "insert";
      $queryPrice = $this->getRecord($price);      

      //print_r($queryPrice); exit;
      //$input = $args["price"];

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
          if($valueInput["id"] == 0){
            unset($valueInput["id"]);
            $insertArray[$insertCount] = $valueInput;
            $insertCount++;
          }else{


            $this->db->where("prit_price_id", $valueInput["id"]);
            $this->db->where("prit_lang", $this->lang->lang());
            $queryPriceExist = $this->db->get("ci_price_translate");

            if($queryPriceExist->num_rows > 0){
              $updateArray[$updateCount] = $valueInput;
              $updateCount++;     
            }else{
              $insertArray[$insertCount] = $valueInput;
              $insertArray[$insertCount]["price_id"] = $valueInput["id"];
              unset($insertArray[$insertCount]["id"]);

              $insertCount++;
            }         
          }
        }

        //Delete
        foreach ($query as $keyQuery => $valueQuery) {
          $queryPriceID[] = $valueQuery->id;

        }

        foreach ($input as $keyInput => $valueInput) {
          $inputPriceID[] = $valueInput["id"];
        }


        $deleteArray = array_diff($queryPriceID , $inputPriceID);

        echo "insert";
        //print_r($insertArray); 

        echo "update";
        //print_r($updateArray); 

        echo "delete";
        //print_r($deleteArray); exit;

        if(!empty($insertArray)){ 
          $this->addMultipleRecord($insertArray);
        } //End check update new data

        if(!empty($deleteArray)){
          foreach ($deleteArray as $key => $value) {
            # code...
            $deletePrice["id"] = $value;
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

    //Update tour
    foreach($data AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    $this->db->set("pri_lu_date", date("Y-m-d H:i:s"));
    $this->db->where("pri_id", $data["id"]);
    $this->db->update("ci_price");



    //Update tour_translate
    $this->db->where("prit_price_id", $data["id"]);
    $this->db->where("prit_lang", $this->lang->lang());
    $query = $this->db->get("ci_price_translate");


    if($query->num_rows > 0){
      foreach($data AS $columnJoinName=>$columnJoinValue){

        if($columnJoinName != "id"){
          if(array_key_exists($columnJoinName, $this->_joincolumn)){        
            $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
          }   
        }else{
            $this->db->set("prit_price_id", $columnJoinValue); 
        }
      }
      //Found & update
      $this->db->set("prit_lu_date", date("Y-m-d H:i:s"));
      $this->db->where("prit_lang", $this->lang->lang());
      $this->db->update("ci_price_translate");
    }else{
      //print_r($data );      
      foreach($data AS $columnJoinName=>$columnJoinValue){

        if($columnJoinName != "id"){
          if(array_key_exists($columnJoinName, $this->_joincolumn)){        
            $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
          }   
        }else{
            $this->db->set("prit_price_id", $columnJoinValue); 
        }
      }      
      //Not found & insert
      $this->db->set("prit_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("prit_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_price_translate");
    }    


    //echo $this->db->last_query(); exit;
/*

    if(!empty($data["pri_id"])){
      //Insert price
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $this->db->set("pri_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("pri_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_price");
      $id = $this->db->insert_id();

      //Insert price_translate
      foreach($data AS $columnJoinName=>$columnJoinValue){
        if(array_key_exists($columnJoinName, $this->_joincolumn)){        
          $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
        }
      }

      $this->db->set("prit_price_id", $id);
      $this->db->set("prit_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("prit_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_price_translate");   

    }else if($data["pri_tour_id"]  && $data["pri_agency_id"]){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        $this->db->set($columnName, $columnValue); 
      }
      $query = $this->db->where("pri_tour_id", $data["pri_tour_id"]);
      $query = $this->db->where("pri_agency_id", $data["pri_agency_id"]);
      $query = $this->db->update("ci_price");

    }

    */
  }

  function deleteRecord($args=false){
    if(isset($args["pri_id"])){
      $this->db->where("pri_id", $args["pri_id"]);
      $this->db->delete("ci_price");

      $this->db->where("prit_price_id", $args["pri_id"]);
      $this->db->delete("ci_price_translate");
      
    }else if(isset($args["tour_id"])){


      $this->db->where("pri_id", $args["tour_id"]);
      $priceArray = $this->db->get("ci_price")->result();
      print_r($priceArray); exit;
      foreach ($priceArray as $key => $value) {
        $this->db->where("prit_price_id", $value["pri_id"]);
        $this->db->delete("ci_price_translate");
      }

      $this->db->where("pri_tour_id", $args["tour_id"]);
      $this->db->delete("ci_price");
    }    
  }
}
?>