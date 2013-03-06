<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tag_model extends MY_Model {


  private $tag = false;
  private $newTag = false;   
  function __construct(){
    parent::__construct();
    $this->_prefix = "tag";
    
    $this->_column = array(
                     'id'                => 'tag_id',
                     'status'            => 'tag_status',
                     'cr_date'           => 'tag_cr_date',
                     'cr_uid'            => 'tag_cr_uid',
                     'lu_date'           => 'tag_lu_date',
                     'lu_uid'            => 'tag_lu_uid' 
    );
    
    $this->_join_column = array(
                     'tag_id'            => 'tagt_tag_id',
                     'lang'              => 'tagt_lang',
                     'name'              => 'tagt_name',
                     'url'               => 'tagt_url'
    );
    
  }
  
  function get($options=""){
    if(is_numeric($options)){
      $this->load->model("tag_translate_model","tagTranslateModel");
      $where = array("where"=>array("tag_id"=>$options,"lang"=>$this->lang->lang()));
      if($this->tagTranslateModel->count_rows($where)){
        $this->db->where($this->_join_column["lang"],$this->lang->lang());
      }
    }else{
      if($this->lang->lang() == $this->lang->default_lang()){
        $options["lang"] = $this->lang->lang();
      }
      
    }
    
    $this->db->join("ci_tag_translate","ci_tag_translate.tagt_tag_id = ci_tag.tag_id");
    $mainTable = parent::get($options);
    
    return $mainTable;
  }
  
  function getShow($options=""){

    if(is_numeric($options)){
    
      $this->load->model("tag_translate_model","tagTranslateModel");
      $where = array("where"=>array("tag_id"=>$options,"lang"=>$this->lang->lang()));
      if($this->tagTranslateModel->count_rows($where)){
        $this->db->join("ci_tag_translate","ci_tag_translate.tagt_tag_id = ci_tag.tag_id");
        $this->db->where($this->_join_column["lang"],$this->lang->lang());
      }else{
        return FALSE;
      }
    }else{
      if(is_array($options)){
        foreach($options AS $key=>$value){
          if($_column = $this->_getColumn($key)){
            $this->db->where($_column,$value);
          }
          if($_join_column = $this->_getJoinColumn($key)){
            $this->db->where($_join_column,$value);
          }
        }
      }
      $this->db->join("ci_tag_translate","ci_tag_translate.tagt_tag_id = ci_tag.tag_id");
      $this->db->where($this->_join_column["lang"],$this->lang->lang());
    }
    $mainTable = parent::get($options);
    
    return $mainTable;
  }
  
  function add($options = NULL ){
    if(empty($options)){
      return FALSE;
    }
    if(!$this->getShow($options)){
      $result = parent::add($options);
    }
    return $result;
  }
  
  function post_add($options = NULL){
    if(empty($options)){
      return FALSE;
    }
    $this->load->model("tag_translate_model","tagTranslateModel");
    if(!empty($options["id"])){
      $options["tag_id"] = $options["id"];
      unset($options["id"]);
    }
    $result = $this->tagTranslateModel->add($options);
    return $result;
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
    }else if(isset($args["url"])){
      //Get list page
      ($field)?$this->db->select($field):"";

      //Get category by name
      $query = $this->db->get_where('ci_tag', array('tag_url' => $args["url"]), 1, 0);

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


  function addRecord($data=false){
  
    if($data){
      //Set data
      if(empty($data["lang"])){
        $data["lang"] = $this->lang->line();
      }
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }

      $this->db->set("tag_url", Util::url_title($data["name"]));
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
      if(empty($data["lang"])){
        $data["lang"] = $this->lang->line();
      }
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }

      $this->db->set("tag_url", Util::url_title($data["name"]));
      $query = $this->db->where("tag_id", $data["id"]);
      $query = $this->db->update("ci_tag");
    }
    
    return ;
  }

  function deleteRecord($args=false){
    if($args["id"]){
      $this->db->where("tag_id", $args["id"]);
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


  function searchRecord($args=false){
    
    if($args){
      $this->load->model("Tag_translate_model","tagTranslateModel");
      $this->db->order_by('CONVERT( tagt_name USING tis620 ) ASC');
      $result = $this->tagTranslateModel->get(array("like"=>$args));
      
      $newResult = array();
      if(!empty($result) AND count($result) > 0){
        $newResult = $result;
        return $newResult;
      }else{
        return $newResult;
      }      

    }
  }   

}
?>