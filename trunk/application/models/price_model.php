<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Price_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "pri";
    $this->_column = array(  
                     'id'                    => 'pri_id',
                     'agency_id'             => 'pri_agency_id',
                     'tour_id'               => 'pri_tour_id',
                     'show_firstpage'        => 'pri_show_firstpage',
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
          $this->db->order_by('ci_price.pri_sale_adult_price ASC');    
          //$this->db->order_by('CONVERT( ci_price_translate.prit_name USING tis620 ) ASC');    
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
          $this->db->order_by('ci_price.pri_sale_adult_price ASC');    
          //$this->db->order_by('CONVERT( ci_price_translate.prit_name USING tis620 ) ASC');    
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

      $this->db->where('ci_price.pri_id', $args["id"]);   
      $query = $this->db->get("ci_price");
      //echo $this->db->last_query(); exit;


      if($query->num_rows > 0){

        foreach ($query->result() as $key => $value) {

          //Get price by id
          $this->db->where('ci_price.pri_id', $args["id"]);          
          $this->db->where('ci_price_translate.prit_lang', $this->lang->lang());
          $this->db->join('ci_price_translate', 'ci_price_translate.prit_price_id = ci_price.pri_id');
          $this->db->order_by('ci_price.pri_sale_adult_price ASC');    
          //$this->db->order_by('CONVERT( ci_price_translate.prit_name USING tis620 ) ASC');     
          $query = $this->db->get("ci_price"); 

          if($query->num_rows > 0){
            $newResult = $this->mapField($query->result());
          }else{

            //Not found & display
            $this->db->where('ci_price.pri_id', $args["id"]);  
            $query = $this->db->get("ci_price");

            $newResult = $this->mapField($query->result());
          }

        }
        return $newResult;
      }else{

        return false;
      }

      /*
      //Get category by id      
      $query = $this->db->get_where('ci_price', array('pri_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }

      */
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

    
    //Insert price translate
    //$data["price_id"] = $id;
    //$this->_addTranslateRecord($data);

    //echo $this->db->last_query(); exit;
    return $id;
  }
  

  function _addTranslateRecord($data=false){

    //Insert price_translate
    foreach($data AS $columnJoinName=>$columnJoinValue){
      if(array_key_exists($columnJoinName, $this->_joincolumn)){        
        $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
      } 
    }
    $this->db->set("prit_price_id", $data["price_id"]); 

    $this->db->set("prit_cr_date", date("Y-m-d H:i:s"));
    $this->db->set("prit_lu_date", date("Y-m-d H:i:s"));
    $this->db->insert("ci_price_translate");      
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

  function updateDisplayFirstpageRecord($args=false){

      //Set data
      if(!empty($args["id"]) && $args["display"] == "hide"){
        $this->db->set("pri_show_firstpage", 0);
      }else if(!empty($args["id"]) && $args["display"] == "show"){
        $this->db->set("pri_show_firstpage", 1);
      }
            
      $query = $this->db->where("pri_id", $args["id"]);
      $query = $this->db->update("ci_price");

      return "succees";
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

      
      //print_r($inputPriceArray);
      //print_r($inputPriceTranslateArray);
      

      //Get price by tour_id
      $price["tour_id"] = $args["tour_id"];
      $price["event"] = "insert";
      $queryPrice = $this->getRecord($price);      

      if(empty($queryPrice) && !empty($inputPriceArray)){
        foreach ($inputPriceArray as $key => $value) {
          
          $insertPriceID = $this->addRecord($value); 

          //Insert tour_translate
          $inputPriceTranslateArray[$key]["price_id"] = $insertPriceID;
          $insertPriceTranslateID = $this->_addTranslateRecord($inputPriceTranslateArray[$key]); 


        }
      }else{

        //Price
        foreach ($inputPriceArray as $key => $value) {

          if($value["id"] == 0){

            //insert price
            $insertPriceID = $this->addRecord($value); 

            //insert price translate
            $inputPriceTranslateArray[$key]["price_id"] = $insertPriceID;
            $insertPriceTranslateID = $this->_addTranslateRecord($inputPriceTranslateArray[$key]); 

          }else{
            //update

            //update && delete
            $update = false;
            foreach ($queryPrice as $keyQuery => $valueQuery) {
              foreach ($inputPriceArray as $keyInput => $valueInput) {       
                  if($valueQuery->id == $valueInput["id"]){
                    $update = true;
                    $updateData = $valueInput;
                  }
              }

              if($update){
                //Update
                $this->_updateRecord($updateData); 
                $update = false;  
              }else{
                //Delete
                $price["id"] = $valueQuery->id;
                $this->deleteRecord($price);
              }     
            }

          }
          
        }

        //Price translate
        foreach ($inputPriceTranslateArray as $key => $value) {

          if($value["price_id"] != 0){
            //update
            //Get price by id
            $this->db->where("prit_price_id", $value["price_id"]);
            $this->db->where("prit_lang", $this->lang->lang());
            $queryTranslatePrice = $this->db->get("ci_price_translate");

            //print_r($queryTranslatePrice->result()); exit;
            if($queryTranslatePrice->num_rows > 0){
                $this->_updateTranslateRecord($value);
            }else{
                $this->_addTranslateRecord($value);
            }
          }
        }
      }

      //exit;



    }else{

      return;
    }//End check price data

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

  }

  function _updateTranslateRecord($data= flase){


    //Update tour_translate
    foreach($data AS $columnJoinName=>$columnJoinValue){
      if(array_key_exists($columnJoinName, $this->_joincolumn)){        
        $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue);  
      }
    }


    $this->db->set("prit_lu_date", date("Y-m-d H:i:s"));
    $this->db->where("prit_price_id", $data["price_id"]);
    $this->db->where("prit_lang", $this->lang->lang());
    $this->db->update("ci_price_translate");


    

    //print_r($this->db->last_query()); exit;
  }


  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("pri_id", $args["id"]);
      $this->db->delete("ci_price");

      $this->db->where("prit_price_id", $args["id"]);
      $this->db->delete("ci_price_translate");
      
    }else if(isset($args["tour_id"])){

      $this->db->where("pri_tour_id", $args["tour_id"]);
      $priceArray = $this->db->get("ci_price")->result();
      //print_r($priceArray); exit;
      foreach ($priceArray as $key => $value) {
        $this->db->where("prit_price_id", $value->pri_id);
        $this->db->delete("ci_price_translate");
      }

      $this->db->where("pri_tour_id", $args["tour_id"]);
      $this->db->delete("ci_price");
    }    
  }
}
?>