<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model {

  protected $_prefix;
  protected $_column;
  protected $_join_column;
  protected $_table;
  protected $_error_msg;
  protected $_pk;
  protected $_objData;
  protected $_join_table;


  function __construct(){
    parent::__construct();
    $this->_prefix = "";
    $this->_pk = "id";
    $this->_table = "ci_".str_replace("_model","",strtolower(get_class($this)));
    $this->_column = array();
    $this->_join_column = array();
    $this->_join_table = array();
    $this->_objData = NULL;
  }

  function add($options = NULL){
    if(!$this->pre_add($options)){
      return FALSE;
    }
    $this->_objData = $this->_save($options);
    if($this->_objData !== TRUE){
      $options[$this->_prefix."_".$this->_pk] = $this->_objData;
    }

    if(!$this->post_add($options)){
      return FALSE;
    }
    return $this->_objData;
  }

  function pre_add($options = NULL){
    return TRUE;
  }

  function post_add($options = NULL){
    return TRUE;
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

    if(isset($options['distinct']) AND !empty($options['distinct']) AND $options['distinct'] == TRUE){
      $this->db->distinct();
    }

    if(! isset($options['returnObj']) OR empty($options['returnObj'])){
        $options['returnObj'] = FALSE;
    }

    if(isset($options['limit']) AND ! empty($options['limit'])){
      if(empty($options['limit']["start"]) AND empty($options['limit']["amount"])){
        $this->db->limit($options['limit']);
      }else{
        $this->db->limit($options['limit']["amount"],$options['limit']["start"]);
      }
    }

    if(isset($options['select']) AND ! empty($options['select'])){
      if(is_array($options['select'])){
        foreach ($options['select'] as $selectKey => $selectValue) {
          if($this->_getColumn($selectValue)){
            $this->db->select($this->_getColumn($selectValue));
          }
        }
      }else{
        if($this->_getColumn($options['select'])){
          $this->db->select($this->_getColumn($options['select']));
        }
      }
    }

    if(isset($options['order']) AND ! empty($options['order'])){

      $orderPart = explode(" ",$options['order']);
      if($this->_getColumn($orderPart[0])){
        $this->db->order_by($this->_prefix."_".trim($options['order']));
      }else{
        $this->db->order_by(trim($options['order']));
      }
    }else{
      $this->db->order_by($this->_prefix."_".$this->_pk." desc");
    }

    if(!empty($options["lang"]) AND $options["lang"] == "default"){
      $options["lang"] = $this->lang->default_lang();
    }

    if(!empty($options['group'])){
      if(is_array($options['group'])){
        foreach($options['group'] AS $groupKey=>$groupValue){
          if($this->_getColumn($groupValue)){
            $this->db->group_by($this->_getColumn($groupValue));
          }
          if($this->_getJoinColumn($groupValue)){
            $this->db->group_by($this->_getJoinColumn($groupValue));
          }
          if(!$this->_getColumn($groupValue) AND !$this->_getJoinColumn($groupValue)){
            $this->db->group_by($groupValue);
          }
        }
      }else{
        if($this->_getColumn($options['group'])){
          $this->db->group_by($this->_getColumn($options['group']));
        }
        if($this->_getJoinColumn($options['group'])){
          $this->db->group_by($this->_getJoinColumn($options['group']));
        }
        if(!$this->_getColumn($options['group']) AND !$this->_getJoinColumn($options['group'])){
          $this->db->group_by($options['group']);
        }
      }
    }

    if(!is_null($options)){


      //check where clause, Is it declare?
      //Where clause can be like this array('name !=' => $name, 'id <' => $id, 'date >' => $date);
      //like this array('name !=', $name);
      if(!isset($options['where'])){
        $options['where'] = NULL;
      }

      if(!empty($options["where_in"])){
        foreach($options["where_in"] AS $whereInKey=>$whereInValue){
          if($this->_getColumn($whereInKey)){
            $this->db->where_in($this->_getColumn($whereInKey),$whereInValue);
          }else if($this->_getJoinColumn($whereInKey)){
            $this->db->where_in($this->_getJoinColumn($whereInKey),$whereInValue);
          }
        }
      }
      if(!empty($options["where_not_in"])){
        foreach($options["where_not_in"] AS $whereNotInKey=>$whereNotInValue){
          if($this->_getColumn($whereNotInKey)){
            $this->db->where_not_in($this->_getColumn($whereNotInKey),$whereNotInValue);
          }else if($this->_getJoinColumn($whereNotInKey)){
            $this->db->where_not_in($this->_getJoinColumn($whereNotInKey),$whereNotInValue);
          }
        }
      }

      if(! is_null($options['where'])){
        if(is_array($options['where'])){
          foreach( $options['where'] AS $whereField=>$whereValue){
            if(!empty($whereValue) OR is_numeric($whereValue)){
              if($this->_getColumn($whereField)){
                $this->db->where($this->_getColumn($whereField),$whereValue);
              }else if($this->_getJoinColumn($whereField)){
                $this->db->where($this->_getJoinColumn($whereField),$whereValue);
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
          if($this->_getColumn($key)){
            $this->db->where($this->_getColumn($key),$value);
          }else if($this->_getJoinColumn($key)){
            $this->db->where($this->_getJoinColumn($key),$value);
          }
        }
      }

      if(!empty($options['like'])){
        foreach( $options['like'] AS $likeField=>$likeValue){
          if(! empty($likeValue)){
            if($this->_getColumn($likeField)){
              $this->db->like($this->_getColumn($likeField),$likeValue);
            }

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
      if(isset($options['select']) AND ! empty($options['select'])){
        return $this->_mapField($result,$options['select']);
      }
      return $this->_mapField($result);
    }else{
      return FALSE;
    }
  }

  public function count_rows($options = NULL){
    $result = $this->get($options);
    if($result){
      return count($result);
    }
    return FALSE;

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

    if(!empty($options['id']) OR !empty($options['where']) OR (!empty($options['isUpdate']) && $options['isUpdate'] == TRUE)){
      if($this->_getColumn("lu_date")){
        $this->db->set($this->_getColumn("lu_date"), date( 'Y-m-d H:i:s'));
      }

      if(!empty($options['id'])){
        $this->db->where($this->_column['id'], $options['id']);

      }else if(!empty($options['where'])){
        foreach($options['where'] AS $whereKey=>$whereValue){
          if($this->_getColumn($whereKey)){
            $this->db->where($this->_getColumn($whereKey), $whereValue);
          }
        }
      }

      if(!empty($options['set']) OR !empty($options['where'])){
        foreach($options['set'] AS $setKey=>$setVal){
          if($this->_getColumn($setKey)){
            $set[$this->_getColumn($setKey)] = $setVal;
          }
        }
        if($this->_getColumn("lu_date")){
          $set[$this->_getColumn("lu_date")] = date( 'Y-m-d H:i:s');
        }
        $result = $this->db->update($this->_table,$set);
        if(!empty($options['id'])){
          $objData = $options['id'];
        }else{
          $objData = $result;
        }
      }else{
        $result = $this->db->update($this->_table);
        if($result){
          if(!empty($options['id'])){
            $objData = $options['id'];
          }else{
            $objData = TRUE;
          }

        }else{
          $objData = FALSE;
        }
      }
    }else{
      if($this->_getColumn("cr_date")){
        $this->db->set($this->_getColumn("cr_date"), date( 'Y-m-d H:i:s'));
      }
      if($this->_getColumn("lu_date")){
        $this->db->set($this->_getColumn("lu_date"), date( 'Y-m-d H:i:s'));
      }
      $result = $this->db->insert($this->_table);
      $objData = $this->db->insert_id();
    }

    if($result){
      return $objData;
    }else{
      return FALSE;
    }
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
      if(!empty($this->_column[$field])){
        $result = $this->_column[$field];
      }else{
        $result = FALSE;
      }
    }
    return $result;
  }

  public function getColumn($field = NULL){
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
      if(!empty($this->_column[$field])){
        $result = $this->_column[$field];
      }else{
        $result = FALSE;
      }
    }
    return $result;
  }

  protected function _getJoinColumn($field = NULL){
    //if field is null then return all

    if(is_null($field)){
      return $this->_join_column;
    }
    //if $field is an array then return column that there are in array
    if(is_array($field)){
      foreach($field AS $key=>$value){
        $result[$key] = $this->_join_column[$value];
      }
    }else{
      if(!empty($this->_join_column[$field])){
        $result = $this->_join_column[$field];
      }else{
        $result = FALSE;
      }
    }
    return $result;
  }

  public function getJoinColumn($field = NULL){
    //if field is null then return all
    if(is_null($field)){
      return $this->_join_column;
    }

    //if $field is an array then return column that there are in array
    if(is_array($field)){
      foreach($field AS $key=>$value){
        $result[$key] = $this->_join_column[$value];
      }
    }else{
      if(!empty($this->_join_column[$field])){
        $result = $this->_join_column[$field];
      }else{
        $result = FALSE;
      }
    }
    return $result;
  }

  protected function _mapField($result=NULL,$field = NULL){
    if(is_null($result)){
      return FALSE;
    }
    $_column = $this->_column;
    if(isset($field) AND !empty($field)){
      $_column = $field;
    }
    if(!empty($result[0]) && is_array($result[0])){
      foreach ($result as $key => $value) {
        $data = array();
        if(is_array($_column)){
          foreach($_column AS $kColumn=>$vColumn){
            $data[$kColumn] = $value[$vColumn];
          }
          if(!isset($field) AND empty($field)){
            foreach($this->_join_column AS $kjColumn=>$vjColumn){
              if(isset($value[$vjColumn])){
                $data[$kjColumn] = $value[$vjColumn];
              }else{
                $data[$kjColumn] = "";
              }
            }
          }
        }else{
          $data[$_column] = $value[$this->_prefix."_".$_column];
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