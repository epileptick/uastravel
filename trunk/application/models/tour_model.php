<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tou";
    $this->_column = array(
                     'id'                         => 'tou_id',
                     'language_id'                => 'tou_language_id',
                     'code'                       => 'tou_code',
                     'name'                       => 'tou_name',
                     'description'                => 'tou_description',
                     'detail'                     => 'tou_detail',
                     'included'                   => 'tou_included',
                     'remark'                     => 'tou_remark',
                     'discount'                   => 'tou_discount',
                     'thai_net_adult_price'       => 'tou_thai_net_adult_price',
                     'thai_net_child_price'       => 'tou_thai_net_child_price',
                     'thai_sale_adult_price'      => 'tou_thai_sale_adult_price',
                     'thai_sale_child_price'      => 'tou_thai_sale_child_price',
                     'foreigner_net_adult_price'  => 'tou_foreigner_net_adult_price',
                     'foreigner_net_child_price'  => 'tou_foreigner_net_child_price',
                     'foreigner_sale_adult_price' => 'tou_foreigner_sale_adult_price',
                     'foreigner_sale_child_price' => 'tou_foreigner_sale_child_price',
                     'amount_time'                => 'tou_amount_time',
                     'start_time'                 => 'tou_start_time',
                     'end_time'                   => 'tou_end_time',
                     'cr_date'                    => 'tou_cr_date',
                     'cr_uid'                     => 'tou_cr_uid',
                     'lu_date'                    => 'tou_lu_date',
                     'lu_uid'                     => 'tou_lu_uid'  
    );
  }
  
  
  function getRecord($data){
    $query = $this->db->get("ci_tour");
    return $query->result();
  }


  function addRecord($data=flase){
/*
    //Validate data
    if($data==""){
      return FALSE;
    }
    if(!$this->_required("name",$data)){
      $this->_addError("Please enter description");
      return FALSE;
    }
    if(!$this->_required("description",$data)){
      $this->_addError("Please enter description");
      return FALSE;
    }
    if(!$this->_required("detail",$data)){
      $this->_addError("Please enter detail");
      return FALSE;
    }

    //Validate thai price
    if(!$this->_required("thai_net_adult_price",$data)){
      $this->_addError("Please enter net price for adult(th)");
      return FALSE;
    }
    if(!$this->_required("thai_net_child_price",$data)){
      $this->_addError("Please enter net price for child(th)");
      return FALSE;
    }
    if(!$this->_required("thai_sale_adult_price",$data)){
      $this->_addError("Please enter sale price for adult(th)");
      return FALSE;
    }
    if(!$this->_required("thai_sale_child_price",$data)){
      $this->_addError("Please enter sale price for child(th)");
      return FALSE;
    }

    //Validate foreigner price
    if(!$this->_required("foreigner_net_adult_price",$data)){
      $this->_addError("Please enter net price for adult(foreigner)");
      return FALSE;
    }
    if(!$this->_required("foreigner_net_child_price",$data)){
      $this->_addError("Please enter net price for child(foreigner)");
      return FALSE;
    }
    if(!$this->_required("foreigner_sale_adult_price",$data)){
      $this->_addError("Please enter sale price for adult(foreigner)");
      return FALSE;
    }
    if(!$this->_required("foreigner_sale_child_price",$data)){
      $this->_addError("Please enter sale price for child(foreigner)");
      return FALSE;
    }


    //Validate time
    if(!$this->_required("amount_time",$data)){
      $this->_addError("Please enter net price for child(foreigner)");
      return FALSE;
    }
    if(!$this->_required("start_time",$data)){
      $this->_addError("Please enter sale price for adult(foreigner)");
      return FALSE;
    }
    if(!$this->_required("end_time",$data)){
      $this->_addError("Please enter sale price for child(foreigner)");
      return FALSE;
    }

*/

    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $result = $this->db->insert($this->_table);
    }else{


    }
    
    return ;
  }
  
  function updateRecord($data){
    $query = $this->db->where("id", $data["id"]);
    $query = $this->db->update("ci_tour", $data);
  }

  function deleteRecord(){
    $this->db->where("id", $this->url->segment(3));
    $this->delete("ci_tour");
  }
}
?>