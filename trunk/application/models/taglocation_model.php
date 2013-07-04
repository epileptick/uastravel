<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagLocation_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tal";
    $this->_column = array(
                     'id'                => 'tal_id',
                     'tag_id'            => 'tal_tag_id',
                     'location_id'       => 'tal_location_id',
                     'cr_date'           => 'tal_cr_date',
                     'cr_uid'            => 'tal_cr_uid',
                     'lu_date'           => 'tal_lu_date',
                     'lu_uid'            => 'tal_lu_uid'
    );
    $this->_join_column = array(
                     'tag_id'            => 'tagt_tag_id',
                     'tagt_lang'              => 'tagt_lang',
                     'name'              => 'tagt_name',
                     'url'               => 'tagt_url',
                     'display'          => 'loc_display',
                     'longitude'        => 'loc_longitude',
                     'latitude'         => 'loc_latitude',
                     'first_image'      => 'loc_first_image',
                     'background_image' => 'loc_background_image',
                     'banner_image'     => 'loc_banner_image',
                     'title'            => 'loct_title',
                     'body'             => 'loct_body',
                     'suggestion'       => 'loct_suggestion',
                     'route'            => 'loct_route',
                     'loct_lang'        => 'loct_lang',
                     'loct_url'         => 'loct_url'
    );

  }

  function get($options = NULL){
    if(is_numeric($options)){
      $this->load->model("tag_translate_model","tagTranslateModel");
      $where = array("where"=>array("tag_id"=>$options,"lang"=>$this->lang->lang()));
      if($this->tagTranslateModel->count_rows($where)){
        $this->db->where($this->_join_column["lang"],$this->lang->lang());
      }
    }
    $this->db->join("ci_tag_translate","ci_tag_translate.tagt_tag_id = ci_taglocation.tal_tag_id");

    if(!empty($options["join_location"]) AND $options["join_location"] == TRUE){
      $this->db->join("ci_location","ci_location.loc_id = ci_taglocation.tal_location_id");
      $this->db->join("ci_location_translate","ci_location_translate.loct_loc_id = ci_taglocation.tal_location_id");
    }

    $mainTable = parent::get($options);
    if(empty($mainTable) AND !empty($options["lang"])){
      unset($options["lang"]);
      $mainTable =  $this->get($options);
    }
    return $mainTable;
  }

  function getTagLocationList($options = NULL){
    $options["where"]["tagt_lang"] = $this->lang->lang();
    $result = $this->get($options);
    unset($options["where"]["tagt_lang"]);
    $resultAll = $this->get($options);

    if(empty($result)){
      return $resultAll;
    }

    foreach ($resultAll as $keyAll => $valueAll) {
      foreach ($result as $key => $value) {
        if($valueAll["tag_id"] == $value["tag_id"]){
          unset($resultAll[$keyAll]);
        }
      }
    }
    if(empty($resultAll)){
      return $result;
    }
    return array_merge($result,$resultAll);
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
  function getRecordFirstpage($args=false){

    //Get tour data
    $locationWhere["where_in"]["tag_id"] = $args["tag_id"];
    $locationWhere["where"]["loct_lang"] = $this->lang->lang();
    $locationWhere["group"] = parent::getColumn("location_id");
    $locationWhere["join_location"] = true;
    $locationBuffer = $this->get($locationWhere);

    if(!empty($locationBuffer)){
      foreach($locationBuffer AS $key=>$value){
          $result[$key]["location"] = $value;

          //Get tag data
          $argsTag["where"]['location_id'] = $value["location_id"];
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$key]["tag"] = $this->getTagLocationList($argsTag);

      }
    }

    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }

  function getRecordByTag($args=false){

      //Get tour data
      $locationWhere["where"]["tag_id"] = $args["tag_id"];
      $locationWhere["where"]["loct_lang"] = $this->lang->lang();
      $locationWhere["join_location"] = true;
      $locationWhere["group"] = parent::getColumn("location_id");
      $locationBuffer = $this->get($locationWhere);

      foreach($locationBuffer AS $key=>$value){
          $result[$key]["location"] = $value;

          //Get tag data
          $argsTag["where"]['location_id'] = $value["location_id"];
          if(!empty($args["menu"])){
            $argsTag["where_in"]['tag_id'] = $args["menu"];
          }
          $result[$key]["tag"] = $this->getTagLocationList($argsTag);
      }

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }
  }


  function getRecord($args=false){
    //print_r($args); exit;

    if(isset($args["tag_id"]) && isset($args["location_id"]) ){
      //Get category by name

      $data["tal_tag_id"] = $args["tag_id"];
      $data["tal_location_id"] = $args["location_id"];

      $query = $this->db->get_where('ci_taglocation', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["firstpage"])){

      //First tour
      $this->db->select('tal_location_id, tal_tag_id');
      $this->db->where('tal_tag_id', 1);
      $this->db->join('ci_location', 'ci_location.loc_id = ci_taglocation.tal_location_id');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $firsttour = $this->db->get('ci_taglocation')->result();

      if(!empty($firsttour)){

        $count = 0;
        foreach ($firsttour as $key => $value) {
          //Get tour data
          unset($this->db);
          $this->db->select('tal_location_id, tal_tag_id');
          $this->db->where('tal_location_id', $value->tal_location_id);
          $this->db->where('tal_tag_id', $args["tag_id"]);
          $firsttaglocationBuffer = $this->db->get('ci_taglocation')->result();
          if(!empty($firsttaglocationBuffer)){
            $firsttaglocation[] = $firsttaglocationBuffer[0];
          }
        }

        if(!empty($firsttaglocation)){
          $count = 0;
          foreach ($firsttaglocation as $key => $value) {

            //Get tour data
            unset($this->db);
            $this->db->select('loc_id, loc_title, loc_url, loc_first_image');
            $this->db->where('loc_id', $value->tal_location_id);
            $query = $this->db->get('ci_location');
            $tourBuffer = $query->result();
            $result[$count]["location"] = $tourBuffer[0];


            //Get tag data
            $argsTag["where"]['location_id'] = $value->tal_location_id;
            $argsTag["where_in"]['tag_id'] = $args["menu"];
            $result[$count]["tag"] = $this->getTagLocationList($argsTag);

            $count++;
          }
        }else{
          return false;
        }
      }else{
        return false;
      }

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["in"])){

      //Get distinct location_id from ci_location
      $this->db->select('tal_location_id');
      $this->db->distinct("tal_location_id");
      $this->db->where_in('tal_tag_id', $args["tag_id"]);
      $this->db->join('ci_location', 'ci_location.loc_id = ci_taglocation.tal_location_id');
      $this->db->order_by('tal_location_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $location = $this->db->get('ci_taglocation')->result();


      $count = 0;
      foreach ($location as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->where('loc_id', $value->tal_location_id);
        $query = $this->db->get('ci_location');
        $locationBuffer = $query->result();
        $result[$count]["location"] = $locationBuffer[0];


        //Get tag data
        $argsTag["where"]['location_id'] = $value->tal_location_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagLocationList($argsTag);

        $count++;
      }

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }


    }else if(isset($args["tag_id"]) && $args["join"]){

      //Get distinct location_id from ci_location
      $this->db->select('tal_location_id');
      $this->db->distinct("tal_location_id");
      $this->db->where('tal_tag_id', $args["tag_id"]);
      $this->db->join('ci_location', 'ci_location.loc_id = ci_taglocation.tal_location_id');
      $this->db->order_by('tal_location_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $location = $this->db->get('ci_taglocation')->result();

      $count = 0;
      foreach ($location as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->where('loc_id', $value->tal_location_id);
        $query = $this->db->get('ci_location');
        $locationBuffer = $query->result();
        $result[$count]["location"] = $locationBuffer[0];


        //Get tag data
        $argsTag["where"]['location_id'] = $value->tal_location_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagLocationList($argsTag);

        $count++;
      }

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(isset($args["tag_id"])){
      //Get category by name

      $data["tal_tag_id"] = $args["tag_id"];
      $query = $this->db->get_where('ci_taglocation', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["location_id"])){
      //Get category by name
      $data["tal_location_id"] = $args["location_id"];

      $query = $this->db->get_where('ci_taglocation', $data);
          //print_r($query->result()); exit;
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(isset($args["id"])){
      //Get category by id
      $query = $this->db->get_where('ci_taglocation', array('tal_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_taglocation");

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
      $this->db->set("tal_cr_date", date("Y-m-d H:i:s"));

      $this->db->set("tal_lu_date", date("Y-m-d H:i:s"));

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
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);
         $count++;
      }
      return ;
    }else{
      return ;
    }


  }

  function updateRecord($args=false){
    //Get tagtour by tour_id
    //Get tag by tagname
    if($args["tags"]=="[]"){
      return true;
    }

    $tags = array_unique(json_decode($args["tags"]));

    $this->load->model("tag_model", "tagModel");
    $tagInput = array();
    $count = 0;

    $taglocation["location_id"] = $args["id"];
    $query = parent::get($taglocation);

    foreach ($tags as $key => $value) {
      $tag["name"] = $value;
      $tagQuery = $this->tagModel->get($tag);

      if(empty($tagQuery)){
        $tag["url"] = Util::url_title($value);
        $tag["lang"] = $this->lang->lang();
        $input[$count]["tag_id"] = $this->tagModel->add($tag);
        $input[$count]["name"] = $tag["name"];
      }else{
        $input[$count] = $tagQuery[0];
      }
      $count++;
    }



    $update = false;
    $updateCount = 0;
    $updateArray = array();
    $updateData =  array();

    $deleteCount = 0;
    $deleteArray = array();

    $insert = false;
    $insertCount = 0;
    $insertArray = array();

    if(!empty($query)){
      //Loop check update && delete
      foreach ($query as $keyQuery => $valueQuery) {
          foreach ($input as $keyInput => $valueInput) {
              if($valueQuery["tag_id"] == $valueInput["tag_id"]){
                  $update = true;
                  $updateData = $valueInput;
              }
          }

          if($update){
              //Update
              $updateArray[$updateCount] = $updateData;
              $updateCount++;
              $update = false;
          }else{
              //Delete
              $deleteArray[$deleteCount] = $valueQuery;
              $deleteCount++;
          }
      }

      //Loop check insert
      foreach ($input as $keyInput => $valueInput) {
          foreach ($query as $keyQuery => $valueQuery) {
              if($valueInput["tag_id"] == $valueQuery["tag_id"]){
                  $insert = true;
              }
          }

          //Insert
          if($insert){
              $insert = false;
          }else{
              $insertArray[$insertCount] = $valueInput;
              $insertTag[$insertCount]["tag_id"] = $valueInput["tag_id"];
              $insertTag[$insertCount]["location_id"] = $args["id"];
              $insertCount++;
          }
      }
      //return $updateArray;
    //End check empty $query
    }else{

      foreach ($input as $keyInput => $valueInput) {
        $insertArray[$insertCount] = $valueInput;
        $insertTag[$insertCount]["tag_id"] = $valueInput["tag_id"];
        $insertTag[$insertCount]["location_id"] = $args["id"];
        $insertCount++;
      }

    }



    if(!empty($insertTag)){

      $this->addMultipleRecord($insertTag);
    }

    if(!empty($deleteArray)){

      foreach ($deleteArray as $key => $value) {
        # code...
        $deleteTag["id"] = $value["id"];
        $this->deleteRecord($deleteTag);
      }

    }


    return ;
  }
  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("tal_id", $args["id"]);
      $this->db->delete("ci_taglocation");
    }else if(isset($args["location_id"])){
      $this->db->where("tal_location_id", $args["location_id"]);
      $this->db->delete("ci_taglocation");
    }
  }
}
?>