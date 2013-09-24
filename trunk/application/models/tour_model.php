<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tou";
    $this->_column = array(
                     'id'                => 'tou_id',
                     'code'              => 'tou_code',
                     'amount_time'       => 'tou_amount_time',
                     'start_date'        => 'tou_start_date',
                     'end_date'          => 'tou_end_date',
                     'start_month'       => 'tou_start_month',
                     'end_month'         => 'tou_end_month',
                     'start_time1'       => 'tou_start_time1',
                     'end_time1'         => 'tou_end_time1',
                     'start_time2'       => 'tou_start_time2',
                     'end_time2'         => 'tou_end_time2',
                     'start_time3'       => 'tou_start_time3',
                     'end_time3'         => 'tou_end_time3',
                     'longitude'         => 'tou_longitude',
                     'latitude'          => 'tou_latitude',
                     'first_image'       => 'tou_first_image',
                     'display'           => 'tou_display',
                     'background_image'  => 'tou_background_image',
                     'banner_image'      => 'tou_banner_image',
                     'view'              => 'tou_view',
                     'cr_date'           => 'tou_cr_date',
                     'cr_uid'            => 'tou_cr_uid',
                     'lu_date'           => 'tou_lu_date',
                     'lu_uid'            => 'tou_lu_uid'
    );

    $this->_join_column = array(
                     'id'                => 'tout_id',
                     'tour_id'           => 'tout_tour_id',
                     'lang'              => 'tout_lang',
                     'url'               => 'tout_url',
                     'name'              => 'tout_name',
                     'short_name'        => 'tout_short_name',
                     'short_description' => 'tout_short_description',
                     'description'       => 'tout_description',
                     'detail'            => 'tout_detail',
                     'included'          => 'tout_included',
                     'remark'            => 'tout_remark',
                     'cr_date'           => 'tout_cr_date',
                     'cr_uid'            => 'tout_cr_uid',
                     'lu_date'           => 'tout_lu_date',
                     'lu_uid'            => 'tout_lu_uid'
    );
  }

  function get($options = ""){
    $this->db->join("ci_tour_translate","ci_tour_translate.tout_tour_id = ci_tour.tou_id");
    $mainTable = parent::get($options);
    if(empty($mainTable) AND !empty($options["lang"])){
      unset($options["lang"]);
      $mainTable =  $this->get($options);
    }
    return $mainTable;
  }


  function mapField($result){

    foreach ($result as $key => $value) {
      $data = new stdClass();

      foreach ($value as $keyField => $valueFiled) {
        if( $keyField != "tout_id"){
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

    if(isset($args["tag"]) && isset($args["tour_name"]) ){
    }else if(isset($args["id"])){
      //Get page by id for create
      if(!empty($args["field"])){
        $this->db->select($args["field"]);
      }


      $this->db->where("tout_tour_id", $args["id"]);
      $this->db->where("tout_lang", $this->lang->lang());
      $query = $this->db->get("ci_tour_translate");

      if($query->num_rows > 0){
        //Found & update
        $this->db->where('ci_tour.tou_id', $args["id"]);
        $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
        $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
        $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
        $query = $this->db->get("ci_tour");
      }else{
        //Not found & insert
        $this->db->where('ci_tour.tou_id', $args["id"]);
        $query = $this->db->get("ci_tour");
      }




      //print_r($this->db->last_query()); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["tour_name"])){
      //Get page by id for create
      $query = $this->db->get_where('ci_tour', array('tou_name' => $args["tour_name"]), 1, 0);

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

      //$this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $query = $this->db->get("ci_tour");

      //print_r($this->db->last_query()); exit;
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
//print_r($this->_join_column);
    if($data){

      //Insert tour
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue);
        }
      }
      $this->db->set("tou_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("tou_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_tour");

      //Generate code
      $id = $this->db->insert_id();
      $digit = 6-strlen($id);
      $code = "TU";
      for ($i=0; $i < $digit; $i++) {
        $code .= "0";
      }
      $code .= $id;

      $this->db->set("tou_code", $code);
      $query = $this->db->where("tou_id", $id);
      $query = $this->db->update("ci_tour");


      //Insert tour_translate
      foreach($data AS $columnJoinName=>$columnJoinValue){
        if(array_key_exists($columnJoinName, $this->_join_column)){
          //print_r($columnJoinName); exit;
          if($columnJoinName == "name"){
            $this->db->set("tout_url", Util::url_title($columnJoinValue));
          }
          $this->db->set($this->_join_column[$columnJoinName], $columnJoinValue);
        }
      }

      $this->db->set("tout_tour_id", $id);
      $this->db->set("tout_cr_date", date("Y-m-d H:i:s"));
      $this->db->set("tout_lu_date", date("Y-m-d H:i:s"));
      $this->db->insert("ci_tour_translate");

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


      $this->db->set("tou_lu_date", date("Y-m-d H:i:s"));

      $query = $this->db->where("tou_id", $data["id"]);
      $query = $this->db->update("ci_tour");

      //End Update tour


      $this->db->where("tout_tour_id", $data["id"]);
      $this->db->where("tout_lang", $this->lang->lang());
      $query = $this->db->get("ci_tour_translate");



      //print_r($this->db->last_query()); exit;
      foreach($data AS $columnJoinName=>$columnJoinValue){
        if(array_key_exists($columnJoinName, $this->_join_column)){
          //print_r($columnJoinName); exit;
          if($columnJoinName != "id"){
            if($columnJoinName == "name"){
              $this->db->set("tout_url", Util::url_title($columnJoinValue));
            }
            $this->db->set($this->_join_column[$columnJoinName], $columnJoinValue);
          }else{

            $this->db->set("tout_tour_id", $columnJoinValue);
          }
        }
      }

      if($query->num_rows > 0){
        //Found & update
        $this->db->set("tout_lu_date", date("Y-m-d H:i:s"));
        $this->db->where("tout_tour_id", $data["id"]);
        $this->db->where("tout_lang", $this->lang->lang());
        $this->db->update("ci_tour_translate");
      }else{
        //Not found & insert
        $this->db->set("tout_cr_date", date("Y-m-d H:i:s"));
        $this->db->set("tout_lu_date", date("Y-m-d H:i:s"));
        $this->db->insert("ci_tour_translate");
      }

      //print_r($this->db->last_query()); exit;


    }

    return ;
  }


  function updateDisplayRecord($data=false){
    if($data){
      //Set data
      if(!empty($data["id"]) && $data["display"] == "hide"){
        $this->db->set("tou_display", 0);
      }else if(!empty($data["id"]) && $data["display"] == "show"){
        $this->db->set("tou_display", 1);
      }

      $query = $this->db->where("tou_id", $data["id"]);
      $query = $this->db->update("ci_tour");
    }

    return "success";
  }

  function updateDisplayFirstpageRecord($data=false){

    $this->load->model("price_model", "priceModel");
    $response = $this->priceModel->updateDisplayFirstpageRecord($data);
    return $response;
  }


  function deleteRecord($id=false){
    if($id){
      $this->db->where("tou_id", $id);
      $this->db->delete("ci_tour");

      $this->db->where("tout_tour_id", $id);
      $this->db->delete("ci_tour_translate");
    }
  }


  function searchRecord($args=false){
    if(!empty($args["tou_name"]) && !empty($args["user_search"])){

      $this->load->model("tagtour_model","tagTourModel");

      $search["tout_name"] = $args["tou_name"];
      $this->db->like($search, 'both');
      $this->db->where('ci_tour.tou_display', 1);
      $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $tour = $this->db->get("ci_tour")->result();

      //var_dump($tour); exit;
      //echo $this->db->last_query(); exit;

      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data
        unset($this->db);
        //$this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_id', $value->tou_id);
        $this->db->where('ci_tour.tou_display', 1);
        $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
        $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
        $query = $this->db->get("ci_tour");
        $tourBuffer = $query->result();
        $result[$count]["tour"] = $tourBuffer[0];


        //Get tag data
        $argsTag["where"]['tour_id'] = $value->tou_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->tagTourModel->getTagTourList($argsTag);


        //Get price data
        unset($this->db);
        $this->db->where('pri_tour_id', $value->tou_id);
        $priceTour = $this->db->get('ci_price')->result();

        if(!empty($priceTour)){
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->pri_sale_adult_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->pri_sale_adult_price;
            }
          }
        }

        $count++;
      }
      //print_r($result); exit;
      if(!empty($result)){
        return $result;
      }else{
        return false;
      }
    }else if(!empty($args["tou_name"])){
      $this->db->like($args);
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $query = $this->db->get("ci_tour");

      $newResult = array();
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }
  }
}
?>