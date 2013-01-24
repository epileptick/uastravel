<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "loc";
    $this->_column = array(
                     'id'               => 'loc_id',
                     'display'          => 'loc_display',
                     'longitude'        => 'loc_longitude',
                     'latitude'         => 'loc_latitude',
                     'first_image'      => 'loc_first_image',
                     'background_image' => 'loc_background_image',
                     'banner_image'     => 'loc_banner_image',
                     'cr_date'          => 'loc_cr_date',
                     'cr_uid'           => 'loc_cr_uid',
                     'lu_date'          => 'loc_lu_date',
                     'lu_uid'           => 'loc_lu_uid'
                     
    );
    
    $this->_join_column = array(
                     'loct_id'         => 'loct_id',
                     'lang'             => 'loct_lang',
                     'title'            => 'loct_title',
                     'body'             => 'loct_body',
                     'suggestion'       => 'loct_suggestion',
                     'route'            => 'loct_route',
                     'url'              => 'loct_url'
    );
  }
  
  function get($options=""){
    if(empty($options)){
      return FALSE;
    }
    if(is_numeric($options)){
      $this->load->model("location_translate_model","locationTranslateModel");
      $where = array("where"=>array("loc_id"=>$options,"lang"=>$this->lang->lang()));
      if($this->locationTranslateModel->count_rows($where)){
        $this->db->join("ci_location_translate","ci_location_translate.loct_loc_id = ci_location.loc_id");
        $this->db->where($this->_join_column["lang"],$this->lang->lang());
      }
    }else{
      $this->db->join("ci_location_translate","ci_location_translate.loct_loc_id = ci_location.loc_id");
      $this->db->where($this->_join_column["lang"],$this->lang->lang());
    }
    $mainTable = parent::get($options);
    return $mainTable;
  }
  
  function post_add($options = NULL){
    $this->load->model("location_translate_model","locationTranslateModel");
    $options["loc_id"] = $options["id"];
    unset($options["id"]);
    $result = $this->locationTranslateModel->add($options);
    return $result;
  }
  
  
  function updateDisplayRecord($data=false){
    if($data){
      //Set data
      if(!empty($data["id"]) && $data["display"] == "hide"){
        $this->db->set("loc_display", 0);
      }else if(!empty($data["id"]) && $data["display"] == "show"){
        $this->db->set("loc_display", 1);
      }
            
      $query = $this->db->where("loc_id", $data["id"]);
      $query = $this->db->update("ci_location");
    }
    
    return ;
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

    $options['lu_date'] = date("Y-m-d H:i:s");
    if(!empty($options["title"])){
      $string = $options["title"];
      $string = preg_replace("`\[.*\]`U","",$string);
      $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
      $string = str_replace('%', '-percent', $string);
      $string = htmlentities($string, ENT_COMPAT, 'utf-8');
      $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
      $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
      $options["url"] = strtolower(trim($string, '-'));
      $options["url"] = trim($options["url"]);
    }
    
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
  

  function getRecordRelated($args=false){
    //Related by tour
    $this->load->model("tag_model", "tagModel");
    $args["url"] = $args["tag_url"];
    $tag = $this->tagModel->getRecord($args);

    if(!empty($tag)){
      //print_r($tag); exit; 
      $tag_id = $tag[0]->id;
      $sql = "SELECT DISTINCT `tat_tour_id` 
              FROM (`ci_tagtour`) JOIN `ci_tour` 
              ON `ci_tour`.`tou_id` = `ci_tagtour`.`tat_tour_id` 
              WHERE `tat_tag_id` 
              IN ($tag_id) 
              ORDER BY rand() 
              DESC LIMIT 5 ";

      $tour = $this->db->query($sql)->result();

      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_lang', $this->lang->lang());
        $this->db->where('tou_id', $value->tat_tour_id);
        $query = $this->db->get('ci_tour');
        $tourBuffer = $query->result(); 

        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];

          //Get tag data
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          //$this->db->where_in('tat_tag_id', $args["menu"]);
          $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
          $query = $this->db->get('ci_tagtour');
          $result[$count]["tag"] = $query->result();


          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value->tat_tour_id);
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
      }//End related by tour   
    }//End check tag


    //print_r($result); exit;
    if(!empty($result)){
      return $result;
    }else{
      return false;
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



  function searchRecord($args=false){
    if(!empty($args["loc_title"]) && !empty($args["user_search"])){

      $search["loc_title"] = $args["loc_title"];
      $this->db->like($search); 
      //$this->db->order_by('CONVERT( ci_location_translate.loct_title USING tis620 ) ASC');    
      $location = $this->db->get("ci_location")->result();


      $count = 0;
      foreach ($location as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->select('loc_id, loc_title, loc_url, loc_first_image, loc_banner_image');
        $this->db->where('loc_id', $value->loc_id);
        $tourBuffer = $this->db->get('ci_location')->result();
        $result[$count]["location"] = $tourBuffer[0];


        //Get tag data
        unset($this->db);
        $this->db->where('tal_location_id', $value->loc_id);
        $this->db->where_in('tal_tag_id', $args["menu"]);
        $this->db->join('ci_tag', 'ci_tag.tag_id = ci_taglocation.tal_tag_id');
        $result[$count]["tag"] = $this->db->get('ci_taglocation')->result();
        $count++;
      }

      //print_r($result); exit;
      if(!empty($result)){
        return $result;
      }else{
        return false;
      }            
    }
  }

}
?>