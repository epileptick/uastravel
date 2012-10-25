<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tou";
    $this->_column = array(
                     'id'                => 'tou_id',
                     'language_id'       => 'tou_language_id',
                     'code'              => 'tou_code',
                     'url'               => 'tou_url',
                     'name'              => 'tou_name',
                     'description'       => 'tou_description',
                     'detail'            => 'tou_detail',
                     'included'          => 'tou_included',
                     'remark'            => 'tou_remark',
                     'discount'          => 'tou_discount',
                     'net_adult_price'   => 'tou_net_adult_price',
                     'net_child_price'   => 'tou_net_child_price',
                     'sale_adult_price'  => 'tou_sale_adult_price',
                     'sale_child_price'  => 'tou_sale_child_price',
                     'amount_time'       => 'tou_amount_time',
                     'start_date'        => 'tou_start_date',
                     'end_date'          => 'tou_end_date',
                     'start_time'        => 'tou_start_time',
                     'end_time'          => 'tou_end_time',
                     'cr_date'           => 'tou_cr_date',
                     'cr_uid'            => 'tou_cr_uid',
                     'lu_date'           => 'tou_lu_date',
                     'lu_uid'            => 'tou_lu_uid'  
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

    if(isset($args["category"]) && isset($args["tour_name"]) ){
      echo $args;
    }else if(isset($args["category"])){
      echo $args;
    }else if(isset($args["id"])){
      //Get page by id for create      
      $query = $this->db->get_where('ci_tour', array('tou_id' => $args["id"]), 1, 0);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      $this->db->order_by("tou_id", "asc");
      $query = $this->db->get("ci_tour");

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
      $this->db->insert($this->_table);
      return $this->db->insert_id(); 
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
      $query = $this->db->where("tou_id", $data["id"]);
      $query = $this->db->update("ci_tour");
    }
    
    return ;
  }
  
  function deleteRecord($id=false){
    if($id){
      $this->db->where("tou_id", $id);
      $this->db->delete("ci_tour");
    }
  }
}
?>