<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagType_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tty";
    $this->_column = array(
                     'id'                => 'tty_id',
                     'tag_id'            => 'tty_tag_id',
                     'type_id'           => 'tty_type_id',
                     //'parent_id'         => 'tty_parent_id',
                     'index'             => 'tty_index'
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

    if(isset($args["parent_id"]) && isset($args["type_id"]) ){
      //Get category by name

      $data["tty_parent_id"] = 0;
      $data["tty_type_id"] = $args["type_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $data);

      //echo $this->db->last_query(); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tag_id"]) && isset($args["type_id"]) ){
      //Get category by name

      $data["tty_tag_id"] = $args["tag_id"];
      $data["tty_type_id"] = $args["type_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tag_id"])){
      //Get category by name

      $data["tty_tag_id"] = $args["tag_id"];      
      $query = $this->db->get_where('ci_tagtype', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["type_id"])){
      //Get category by name
      $data["tty_type_id"] = $args["type_id"];

      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');         
      $this->db->order_by('tty_index ASC'); 
      $query = $this->db->get_where('ci_tagtype', $data);
          //print_r($query->result()); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["parent_id"])){
      /*
      $parent["parent_id"] = $args["parent_id"];
      $this->load->model("type_model", "typeModel");   
      $tagtypeQuery = $this->tagtypeModel->getRecord($parent);  
      */
      //Get category by name
      $parent["tty_parent_id"] = $args["parent_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $parent);
      //echo $this->db->last_query(); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tagtype', array('tty_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_tagtype");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    

  }



  
  function getCustomTourRecord($args=false){
    //print_r($args); exit;

    if($args["parent_id"] == 0 && isset($args["type_id"]) ){
      //Get category by name

      $data["tty_parent_id"] = 0;
      $data["tty_type_id"] = $args["type_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $data);

      //echo $this->db->last_query(); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["parent_id"]) && isset($args["type_id"]) ){
      //Get category by name

      $data["tty_parent_id"] = $args["parent_id"];
      $data["tty_type_id"] = $args["type_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $data);

      //echo $this->db->last_query(); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tag_id"]) && isset($args["type_id"]) ){
      //Get category by name

      $data["tty_tag_id"] = $args["tag_id"];
      $data["tty_type_id"] = $args["type_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tag_id"])){
      //Get category by name

      $data["tty_tag_id"] = $args["tag_id"];      
      $query = $this->db->get_where('ci_tagtype', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["type_id"])){
      //Get category by name
      $data["tty_type_id"] = $args["type_id"];

      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');         
      $this->db->order_by('tty_index ASC'); 
      $query = $this->db->get_where('ci_tagtype', $data);
          //print_r($query->result()); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["parent_id"])){
      /*
      $parent["parent_id"] = $args["parent_id"];
      $this->load->model("type_model", "typeModel");   
      $tagtypeQuery = $this->tagtypeModel->getRecord($parent);  
      */
      //Get category by name
      $parent["tty_parent_id"] = $args["parent_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');      
      $query = $this->db->get_where('ci_tagtype', $parent);
      //echo $this->db->last_query(); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tagtype', array('tty_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_tagtype");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    
  }



  function getUniqRecordByWhereIn($args){

    //print_r($args); exit;

    //$this->db->where('tty_parent_id', $args["parent_id"]);
    $this->db->where_in('ci_tagtype.tty_parent_id', $args["where_in"]);
    $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id'); 
    $this->db->group_by('ci_tagtype.tty_tag_id');  
    $query = $this->db->get('ci_tagtype');
    //echo $this->db->last_query(); exit;

    if($query->num_rows > 0){
      $newResult = $this->mapField($query->result());
      return $newResult;
    }else{
      return false;
    }    
  }

  function getRecordByTypeAndParent($args){


    $this->db->where('tty_type_id', $args["type_id"]);
    $this->db->where('tty_parent_id', $args["parent_id"]);
    $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id'); 
    $this->db->group_by('ci_tagtype.tty_tag_id');  
    $query = $this->db->get('ci_tagtype');
    //echo $this->db->last_query(); exit;

    if($query->num_rows > 0){
      $newResult = $this->mapField($query->result());
      return $newResult;
    }else{
      return false;
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

   //print_r($args); exit;
   //Check duplicate tag data
    if($args){
      //$tagNew = array();
      $count = 0;
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);  
          //$tag[$count]->id = $tagInsertID;
          //$tag[$count]->name = $tagInput["name"];
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
      $query = $this->db->where("tal_location_id", $data["location_id"]);
      $query = $this->db->update("ci_taglocation");
    }
    
    return ;
  }
*/


  function updateRecord($args=false){
    //Get taglocation by tour_id
    $taglocation["type_id"] = $args["id"];
    $query = $this->getRecord($taglocation);

    //Get tag by tagname
    $tags = str_replace('[', '', $args["tags"]);  
    $tags = str_replace(']', '', $tags);      
    $tags = str_replace('"', '', $tags);  
    $tags = explode(",",  $tags);
    $tags = array_unique($tags);
    $this->load->model("tag_model", "tagModel");
    $tagInput = array();
    $count = 0;
    foreach ($tags as $key => $value) {
      $tag["name"] = $value;
      $tagQuery = $this->tagModel->getRecord($tag);

      if(empty($tagQuery)){
        $input[$count]->id = $this->tagModel->addRecord($tag);
        $input[$count]->name = $tag["name"];
      }else{
        $input[$count] = $tagQuery[0];   
      }
      $count++;
    }


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
        foreach ($query as $keyQuery => $valueQuery) {          
            if($valueInput->id == $valueQuery->tag_id){
                $insert = true;
                //$insertData = $valueInput;
            }
        }

        //Insert
        if($insert){
            $insert = false;  
        }else{
            $insertArray[$insertCount] = $valueInput;
            $insertTagLocation[$insertCount]["tag_id"] = $valueInput->id;
            $insertTagLocation[$insertCount]["type_id"] = $args["id"];
            $insertCount++; 
        }     
    }
    //return $updateArray;


 

    if(!empty($insertTagLocation)){
      $this->addMultipleRecord($insertTagLocation);
    }

    if(!empty($deleteArray)){
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
    
    exit;
     */   
    return ;
  }  
  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("tty_id", $args["id"]);
      $this->db->delete("ci_tagtype");
    }else if(isset($args["type_id"])){
      $this->db->where("tty_type_id", $args["type_id"]);
      $this->db->delete("ci_tagtype");
    }
  }
}
?>