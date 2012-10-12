<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tou";
    $this->_column = array(
                     'id'                => 'tou_id',
                     'language_id'       => 'tou_language_id',
                     'code'              => 'tou_code',
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
                     'start_time'        => 'tou_start_time',
                     'end_time'          => 'tou_end_time',
                     'cr_date'           => 'tou_cr_date',
                     'cr_uid'            => 'tou_cr_uid',
                     'lu_date'           => 'tou_lu_date',
                     'lu_uid'            => 'tou_lu_uid'  
    );
  }
  
  function mapField($query){

    foreach ($query as $key => $value) {
      foreach ($value as $keyField => $valueFiled) {
        //explode field name
        $keyExplode = explode("_", $keyField, 2);
        $newkey = $keyExplode[1];

        //Create new data
        $data->$newkey = $valueFiled;
      }
      $newQuery[] = $data;
    }
    return $newQuery;
  }
  
  function getRecord($id=false){

    if($id){
      $query = $this->db->get_where('ci_tour', array('tou_id' => $id), 1, 0);

      if($query->num_rows > 0){
        $newQuery = $this->mapField($query->result());
        return $newQuery;
      }else{
        return false;
      }
    }else{
      $query = $this->db->get("ci_tour");
      return $query->result();      
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
      $query = $this->db->where("tou_id", $data["id"]);
      $query = $this->db->update("ci_tour");
    }
    
    return ;
  }

  function deleteRecord(){
    $this->db->where("id", $this->url->segment(3));
    $this->delete("ci_tour");
  }
}
?>