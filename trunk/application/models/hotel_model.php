<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "hot";
    $this->_column = array(
                     'id'                => 'hot_id',
                     'code'              => 'hot_code',
                     'star'              => 'hot_star',
                     'display'           => 'hot_display',
                     'longitude'         => 'hot_longitude',
                     'latitude'          => 'hot_latitude',
                     'first_image'       => 'hot_first_image',
                     'background_image'  => 'hot_background_image',
                     'banner_image'      => 'hot_banner_image',
                     'cr_date'           => 'hot_cr_date',
                     'cr_uid'            => 'hot_cr_uid',
                     'lu_date'           => 'hot_lu_date',
                     'lu_uid'            => 'hot_lu_uid'  
    );

    $this->_joincolumn = array(
                     'id'                => 'hott_id',
                     'id'                => 'hott_hotel_id',
                     'lang'              => 'hott_lang',
                     'url'               => 'hott_url',
                     'name'              => 'hott_name',
                     'short_description' => 'hott_short_description',
                     'description'       => 'hott_description',
                     'detail'            => 'hott_detail',
                     'included'          => 'hott_included',
                     'remark'            => 'hott_remark',
                     'cr_date'           => 'hott_cr_date',
                     'cr_uid'            => 'hott_cr_uid',
                     'lu_date'           => 'hott_lu_date',
                     'lu_uid'            => 'hott_lu_uid'  
    );
  }
  
  
  function mapField($result){
    
    foreach ($result as $key => $value) {
      $data = new stdClass();

      foreach ($value as $keyField => $valueFiled) {      
        if( $keyField != "hott_id"){
          $keyExplode = explode("_", $keyField, 2);
          $newkey = $keyExplode[1];
          $data->$newkey = $valueFiled; 
        }
      }
      $newResult[] = $data;      
    }

    return $newResult;
  }
  
  function getRecord($args=false){

    if(isset($args["tag"]) && isset($args["hotel_name"]) ){
      echo $args;
    }else if(isset($args["id"])){
      //Get page by id for create 
      if(!empty($args["field"])){
        $this->db->select($args["field"]);
      }      


      $this->db->where("hott_hotel_id", $args["id"]);
      $this->db->where("hott_lang", $this->lang->lang());
      $query = $this->db->get("ci_hotel_translate");

      if($query->num_rows > 0){
        //Found & update
        $this->db->where('ci_hotel.hot_id', $args["id"]);      
        $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
        $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
        $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');    
        $query = $this->db->get("ci_hotel");
      }else{
        //Not found & insert  
        $this->db->where('ci_hotel.hot_id', $args["id"]);   
        $query = $this->db->get("ci_hotel");
      }




      //print_r($this->db->last_query()); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["hotel_name"])){
      //Get page by id for create      
      $query = $this->db->get_where('ci_hotel', array('hotel_name' => $args["hotel_name"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());

        //print_r($newResult); exit;
        return $newResult;
      }else{
        return false;
      }
    }else{
      //Get list page
      //$this->db->order_by("tou_id", "asc");

      ($args["field"])?$this->db->select($args["field"]):"";
      if(!empty($args["limit"]) && !empty($args["offset"])){
        $this->db->limit($args["limit"], $args["offset"]);
      }

      $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
      $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
      $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');    
      $query = $this->db->get("ci_hotel");      


      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
          
        return $newResult;
      }else{
        return false;
      }
    }    

  }
  
  function addRecord($data=false){
//print_r($data);
//print_r($this->_joincolumn);
    if($data){

      //Insert tour
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $this->db->set("hot_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("hot_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_hotel");

      //Generate code
      $id = $this->db->insert_id();
      $digit = 6-strlen($id); 
      $code = "HT"; 
      for ($i=0; $i < $digit; $i++) { 
        $code .= "0";
      }
      $code .= $id;

      $this->db->set("hot_code", $code);
      $query = $this->db->where("hot_id", $id);
      $query = $this->db->update("ci_hotel");


      //Insert tour_translate
      foreach($data AS $columnJoinName=>$columnJoinValue){
        if(array_key_exists($columnJoinName, $this->_joincolumn)){
          //print_r($columnJoinName); exit;
          if($columnJoinName == "name"){
            $this->db->set("hott_url", Util::url_title($columnJoinValue));
          }          
          $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
        }
      }

      $this->db->set("hott_hotel_id", $id);
      $this->db->set("hott_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("hott_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_hotel_translate");

      return $id; 
    }

    return ;
  }
  
  function updateRecord($data=false){
    if($data){
      //Update tour
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }


      $this->db->set("hot_lu_date", date("Y-m-d H:i:s"));
            
      $query = $this->db->where("hot_id", $data["id"]);
      $query = $this->db->update("ci_hotel");

      //End Update tour


      $this->db->where("hott_hotel_id", $data["id"]);
      $this->db->where("hott_lang", $this->lang->lang());
      $query = $this->db->get("ci_hotel_translate");



      //print_r($this->db->last_query()); exit;
      foreach($data AS $columnJoinName=>$columnJoinValue){
        if(array_key_exists($columnJoinName, $this->_joincolumn)){
          //print_r($columnJoinName); exit;
          if($columnJoinName != "id"){
            if($columnJoinName == "name"){
              $this->db->set("hott_url", Util::url_title($columnJoinValue));
            }          
            $this->db->set($this->_joincolumn[$columnJoinName], $columnJoinValue); 
          }else{

            $this->db->set("hott_hotel_id", $columnJoinValue);
          }
        }
      }      

      if($query->num_rows > 0){
        //Found & update
        $this->db->set("hott_lu_date", date("Y-m-d H:i:s"));
        $this->db->where("hott_hotel_id", $data["id"]);
        $this->db->where("hott_lang", $this->lang->lang());
        $this->db->update("ci_hotel_translate");
      }else{
        //Not found & insert
        $this->db->set("hott_cr_date", date("Y-m-d H:i:s"));
        $this->db->set("hott_lu_date", date("Y-m-d H:i:s"));
        $this->db->insert("ci_hotel_translate");
      }

      //print_r($this->db->last_query()); exit;


    }
    
    return ;
  }

  
  function updateDisplayRecord($data=false){
    if($data){
      //Set data
      if(!empty($data["id"]) && $data["display"] == "hide"){
        $this->db->set("hot_display", 0);
      }else if(!empty($data["id"]) && $data["display"] == "show"){
        $this->db->set("hot_display", 1);
      }
            
      $query = $this->db->where("hot_id", $data["id"]);
      $query = $this->db->update("ci_hotel");
    }
    
    return ;
  }  
  
  function deleteRecord($id=false){
    if($id){
      $this->db->where("hot_id", $id);
      $this->db->delete("ci_hotel");

      $this->db->where("hott_hotel_id", $id);
      $this->db->delete("ci_hotel_translate");
    }
  }


  function searchRecord($args=false){
    return ;
  }  
}
?>