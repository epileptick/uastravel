<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "loc";
    $this->_column = array(
                     'id'               => 'loc_id',
                     'title'            => 'loc_title',
                     'body'             => 'loc_body',
                     'suggestion'       => 'loc_suggestion',
                     'route'            => 'loc_route',
                     'status'           => 'loc_status',
                     'level'            => 'loc_level',
                     'group'            => 'loc_group',
                     'url'              => 'loc_url',
                     'longitude'        => 'loc_longitude',
                     'latitude'         => 'loc_latitude',
                     'cr_date'          => 'loc_cr_date',
                     'cr_uid'           => 'loc_cr_uid',
                     'lu_date'          => 'loc_lu_date',
                     'lu_uid'           => 'loc_lu_uid'
                     
    );
  }
  
  function addRecord($options=""){
    if($options==""){
      return FALSE;
    }

    if(! isset($options["title"]) OR empty($options["title"])){
      $options["title"] = $this->lang->line("location_lang_unnamed_location");
    }
    if(! isset($options["status"]) OR empty($options["status"])){
      $options["status"] = 0;
    }
    if(! isset($options["cr_date"])){
      $options["cr_date"] = date("Y-m-d");
    }
    if(! isset($options["cr_uid"])){
      $options["cr_uid"] = 0;
    }
    if(! isset($options["lu_date"])){
      $options["lu_date"] = date("Y-m-d");
    }
    if(! isset($options["lu_uid"])){
      $options["lu_uid"] = 0;
    }
    
    $string = $options["title"];
    $string = preg_replace("`\[.*\]`U","",$string);
    $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
    $string = str_replace('%', '-percent', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
    $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
    $options["url"] = strtolower(trim($string, '-'));
    $options["url"] = trim($options["url"]);
    
    
    //Set data
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    $result = $this->db->insert($this->_table);
    if($result){
      return $this->db->insert_id();
    }else{
      return $result;
    }
    
  }
  
  function updateRecord($options=""){
    if($options==""){
      return FALSE;
    }

    if(empty($options['force'])){
      $options['force'] = FALSE;
    }
    if($options['force']!=TRUE){
      if(!$this->_required("id",$options)){
        $this->_addError("id is not exist");
        return FALSE;
      }
    }
    if(! isset($options["title"]) OR empty($options["title"])){
      $options["title"] = $this->lang->line("location_lang_unnamed_location");
    }
    $options['lu_date'] = date("Y-m-d");
    
    $string = $options["title"];
    $string = preg_replace("`\[.*\]`U","",$string);
    $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
    $string = str_replace('%', '-percent', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
    $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
    $options["url"] = strtolower(trim($string, '-'));
    $options["url"] = trim($options["url"]);
    
    //Set data
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    $this->db->where($this->_column['id'], $options['id']);
    $result = $this->db->update($this->_table);

    //print_r($options);
    if($result){
      return $options['id'];
    }else{
      return $result;
    }
  }
  
  function readRecord($options=""){
    if($options==""){
      return FALSE;
    }
    if(!$this->_required("id",$options)){
      $this->_addError("invalid id");
      return FALSE;
    }
    
    if(isset($options['id'])){
      $this->db->where($this->_prefix.'_id',$options['id']);
    }
    $this->db->from($this->_table);
    $query = $this->db->get();

    if ($query->num_rows() > 0)
    {
      foreach($query->result() as $key=>$value){
        $result = Util::objectToArray($value);
      }
      return $result;
    }else{
      return FALSE;
    }
    
  }

}
?>