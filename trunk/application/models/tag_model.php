<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tag_model extends MY_Model {


  private $tag = false;
  private $newTag = false;   
  function __construct(){
    parent::__construct();
    $this->_prefix = "tag";
    $this->_column = array(
                     'id'                => 'tag_id',
                     'language_id'       => 'tag_language_id',
                     'parent'            => 'tag_parent',
                     'name'              => 'tag_name',
                     'url'               => 'tag_url'
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


  
  function getRecord($args=false, $field=false){
    //print_r($args); 

    if(isset($args["name"])){
      //Get list page
      ($field)?$this->db->select($field):"";

      //Get category by name
      $query = $this->db->get_where('ci_tag', array('tag_name' => $args["name"]), 1, 0);

      //print_r($args["name"]); exit;

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get list page
      ($field)?$this->db->select($field):"";

      //Get category by id      
      $query = $this->db->get_where('ci_tag', array('tag_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{    
      //Get list page
      ($field)?$this->db->select($field):"";

      $this->db->order_by('CONVERT( tag_name USING tis620 ) ASC');
      //$this->db->order_by("tag_name", "asc"); 
      $query = $this->db->get("ci_tag");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    

  }

  function searchRecord($args=false){
    if($args){
      $this->db->like($args);
      $query = $this->db->get("ci_tag");

      //print_r($args); exit;
      $newResult = array();
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return $newResult;
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
   //Check duplicate tag data
    if($args){
      //$tagNew = array();
      $count = 0;
      foreach ($args["tags"] as $key => $value) {
        $tagInput["name"] = $value;
        $tagFound = $this->getRecord($tagInput, $args["field"]);  
        if(!$tagFound){

          $tagInsertID = $this->addRecord($tagInput);  

          $this->tag[$count]->id = $tagInsertID;
          $this->tag[$count]->name = $tagInput["name"];
          //$this->newTag[] = $value;
        }else{
          $this->tag[$count] = $tagFound[0];
        }

        $count++;
      }

      return $this->tag;
    }else{
      return ;
    }
  }  

  function updateRecord($data=false){
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $query = $this->db->where("tag_id", $data["id"]);
      $query = $this->db->update("ci_tag");
    }
    
    return ;
  }

  function deleteRecord($args=false){
    if($args["id"]){
      $this->db->where("tag_id", $id);
      $this->db->delete("ci_tag");
    }
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
      $args["field"] = "tag_id, tag_name";
      $tagArray =  $this->addMultipleRecord($args);

      return $tagArray;    
    }else{
      return false;
    }
  }  
}
?>