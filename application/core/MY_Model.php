<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {
  
  protected $_prefix;
  protected $_column;
  protected $_table;
  protected $_error_msg;
  protected $_pk;
  
  
  function __construct(){
    parent::__construct();
    $this->_prefix = "";
    $this->_pk = "id";
    $this->_table = "ci_".str_replace("_model","",strtolower(get_class($this)));
    $this->_column = array();
  }
  
  
  function add($options = NULL){
    return $this->_save($options);
  }
  
  function update($options = NULL){
    return $this->_save($options);
  }
  
  function delete($options = NULL){
    if(is_null($options)){
      return FALSE;
    }
    
    if(is_numeric($options) AND ! is_array($options)){
      return $this->db->delete($this->_table, array($this->_prefix."_".$this->_pk => $options)); 
    }
    
    if(!is_null($options)){
      //check where clause, Is it declare?
      //Where clause can be like this array('name !=' => $name, 'id <' => $id, 'date >' => $date);
      //like this array('name !=', $name);
      if(!isset($options['where'])){
        $options['where'] = NULL;
      }  
      if(! is_null($options['where'])){
        if(is_array($options['where'])){
          foreach( $options['where'] AS $whereField=>$whereValue){
            if(! empty($whereValue)){
              if(array_key_exists($whereField, $this->_column)){
                $this->db->where($this->_getColumn($whereField),$whereValue);
              }else{
                if((strpos($whereField,"=") !== FALSE) OR (strpos($whereField,"!=") !== FALSE) OR (strpos($whereField,"<") !== FALSE) OR (strpos($whereField,">") !== FALSE)){
                  $this->db->where($this->_prefix."_".trim($whereField),$whereValue);
                }else{
                  $this->db->where($whereField,$whereValue);
                }
              }
            }
          }
        }else{
          if(! empty($options['where'])){
            if(is_numeric($options['where'])){
              $this->db->where($this->_prefix."_".$this->_pk,$options['where']);
            }
            //else{
              //$this->db->where($this->_prefix."_".trim($options['where']));
            //}
          }
        }
      }else{
        if(is_array($options)){
          foreach($options AS $key=>$value){
            if(array_key_exists($key, $this->_column)){
              $this->db->where($this->_getColumn($key),$value);
            }else if(is_numeric($value)){
              $this->db->where($this->_prefix."_".$this->_pk,$value);
            }
          }
        }
        
      }
    }
    return $this->db->delete($this->_table);
  }
  
  function get($options = NULL){
    if(is_numeric($options) AND ! is_array($options)){
      $this->db->limit("1,0");
      $this->db->where($this->_prefix."_".$this->_pk,$options);
      $this->db->from($this->_table);
      return $this->_mapField(Util::objectToArray($this->db->get()->result()));
    }
    
    if(! isset($options['returnObj']) OR empty($options['returnObj'])){
        $options['returnObj'] = FALSE;
    }
    
    if(isset($options['limit']) AND ! empty($options['limit'])){
        $this->db->limit($options['limit']);
    }
    
    if(isset($options['order']) AND ! empty($options['order'])){
      $this->db->order_by($this->_prefix."_".trim($options['order']));
    }else{
      $this->db->order_by($this->_prefix."_".$this->_pk." desc");
    }
    
    if(!is_null($options)){
      //check where clause, Is it declare?
      //Where clause can be like this array('name !=' => $name, 'id <' => $id, 'date >' => $date);
      //like this array('name !=', $name);
      if(!isset($options['where'])){
        $options['where'] = NULL;
      }
      if(! is_null($options['where'])){
        if(is_array($options['where'])){
          foreach( $options['where'] AS $whereField=>$whereValue){
            if(! empty($whereValue)){
              if(array_key_exists($whereField, $this->_column)){
                $this->db->where($this->_getColumn($whereField),$whereValue);
              }else{
                if((strpos($whereField,"=") !== FALSE) OR (strpos($whereField,"!=") !== FALSE) OR (strpos($whereField,"<") !== FALSE) OR (strpos($whereField,">") !== FALSE)){
                  $this->db->where($this->_prefix."_".trim($whereField),$whereValue);
                }else{
                  $this->db->where($whereField,$whereValue);
                }
              }
            }
          }
        }else{
          if(! empty($options['where'])){
            if(is_numeric($options['where'])){
              $this->db->where($this->_prefix."_".$this->_pk,$options['where']);
            }else{
              //$exploded = explode("=",$options['where']);
              //$this->db->where($this->_prefix."_".trim()); 
            }
          }
        }
      }else{
        foreach($options AS $key=>$value){
          if(array_key_exists($key, $this->_column)){
            $this->db->where($this->_getColumn($key),$value);
          }
        }
      }
    }
    
    $this->db->from($this->_table);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0)
    {
      if($options['returnObj'] == FALSE){
        $result = Util::objectToArray($query->result());
      }else{
        $result = $query->result();
      }
      return $this->_mapField($result);
    }else{
      return FALSE;
    }
  }
  
  protected function _save($options = NULL){
    if(is_null($options)){
      return FALSE;
    }
    //Set data
    foreach($options AS $columnName=>$columnValue){
      if(array_key_exists($columnName, $this->_column)){
        $this->db->set($this->_column[$columnName], $columnValue); 
      }
    }
    
    if($options['id']){
      $this->db->where($this->_column['id'], $options['id']);
      $result = $this->db->update($this->_table);
      $objData = $options['id'];
    }else{
      $result = $this->db->insert($this->_table);
      $objData = $this->db->insert_id();
    }
    
    if($result){
      return $objData;
    }
    return $result;

  }
  
  public function getError(){
    return $this->_error_msg;
  }
  
  protected function _addError($error=""){
    if($error==""){
      return false;
    }
    if(!is_array($error)){
      $this->_error_msg[] = $error;
      return true;
    }
    foreach($error as $err){
      $this->_error_msg[] = $err;
    }
    return true;
  }
  
  protected function _required($required, $data)
  {
    if(!is_array($required)){
      if(!isset($data[$required])){
        return false;
      }else{
        return true;
      }
    }
    foreach($required as $field){
      if(!isset($data[$field])){
        return false;
      }
    }
    return true;
  }
  
  protected function _default($defaults, $options)
  {
    return array_merge($defaults, $options);
  }
  
  protected function _getColumn($field = NULL){
    //if field is null then return all
    if(is_null($field)){
      return $this->_column;
    }
    
    //if $field is an array then return column that there are in array
    if(is_array($field)){
      foreach($field AS $key=>$value){
        $result[$key] = $this->_column[$value];
      }
    }else{
      $result = $this->_column[$field];
    }
    return $result;
  }
  
  
  protected function _mapField($result=NULL){
    if(is_null($result)){
      return FALSE;
    }
    if(is_array($result[0])){
      foreach ($result as $key => $value) {
        $data = array();
        foreach ($value as $keyField => $valueFiled) {
          $newkey = str_replace($this->_prefix."_","",$keyField);
          $data[$newkey] = $valueFiled; 
        }
        $result[$key] = $data;
      }
    }else{
      foreach ($result as $key => $value) {
        $data = new stdClass();
        foreach ($value as $keyField => $valueFiled) {
          $newkey = str_replace($this->_prefix."_","",$keyField);
          $data->$newkey = $valueFiled; 
        }
        $result[$key] = $data;
      }
    }
    return $result;
  }
}
?>