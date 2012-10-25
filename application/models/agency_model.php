<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agency_model extends MY_Model {

  function __construct(){
    parent::__construct();
    $this->_prefix = "agn";
    $this->_column = array(
                     'id'                => 'agn_id',
                     'name'              => 'agn_name',
                     'firstname'         => 'agn_firstname',
                     'lastname'          => 'agn_lastname',
                     'address'           => 'agn_address',
                     'email'             => 'agn_email',
                     'telephone'         => 'agn_telephone',
                     'fax'               => 'agn_fax',
                     'website'           => 'agn_website',
                     'credittime'        => 'agn_credittime',
                     'bookbank'          => 'agn_bookbank',
                     'condition'         => 'agn_condition',
                     'remark'            => 'agn_remark',
                     'cr_date'           => 'agn_cr_date',
                     'cr_uid'            => 'agn_cr_uid',
                     'lu_date'           => 'agn_lu_date',
                     'lu_uid'            => 'agn_lu_uid'  
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
    //print_r($args); exit;

    if(isset($args["name"])){
      //Get category by name
      $query = $this->db->get_where('ci_agency', array('agn_name' => $args["name"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_agency', array('agn_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";

      $query = $this->db->get("ci_agency");

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
      $result = $this->db->insert($this->_table);
    }
    
    return ;
  }
  

  function updateRecord($data=false){
    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $query = $this->db->where("agn_id", $data["id"]);
      $query = $this->db->update("ci_agency");
    }
    
    return ;
  }

  function deleteRecord($id=false){
    if($id){
      $this->db->where("agn_id", $id);
      $this->db->delete("ci_agency");
    }
  }


  function searchRecord($args=false){
    if($args){
      if(isset($args["notlike"])){
        $this->db->where("agn_name", $args["agn_name"]);
        $this->db->order_by("agn_name", "asc");        
        $query = $this->db->get("ci_agency");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }else{    
        $this->db->like($args);
        $query = $this->db->get("ci_agency");
        $newResult = array();
        if($query->num_rows > 0){
          $newResult = $this->mapField($query->result());
          return $newResult;
        }else{
          return $newResult;
        } 
      }   
    }
  }  
}
?>