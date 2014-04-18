<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagTour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tat";
    $this->_pk = "tag_id";
    $this->_column = array(
                     'tag_id'            => 'tat_tag_id',
                     'tour_id'           => 'tat_tour_id',
                     'cr_date'           => 'tat_cr_date',
                     'cr_uid'            => 'tat_cr_uid',
                     'lu_date'           => 'tat_lu_date',
                     'lu_uid'            => 'tat_lu_uid'
    );

    $this->_join_column = array(
                     'tag_id'            => 'tagt_tag_id',
                     'tagt_lang'              => 'tagt_lang',
                     'tagt_name'              => 'tagt_name',
                     'tagt_url'               => 'tagt_url',
                     'tout_lang'              => 'tout_lang',
                     'tout_url'               => 'tout_url',
                     'tout_name'              => 'tout_name',
                     'tout_short_name'        => 'tout_short_name',
                     'short_description' => 'tout_short_description',
                     'description'       => 'tout_description',
                     'detail'            => 'tout_detail',
                     'included'          => 'tout_included',
                     'remark'            => 'tout_remark',
                     'cr_date'           => 'tout_cr_date',
                     'cr_uid'            => 'tout_cr_uid',
                     'lu_date'           => 'tout_lu_date',
                     'lu_uid'            => 'tout_lu_uid',
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

    if(!empty($options["join_tour"]) AND $options["join_tour"] == TRUE){
      $this->db->join("ci_tour_translate","ci_tour_translate.tout_tour_id = ci_tagtour.tat_tour_id");
      $this->db->join("ci_tour","ci_tour.tou_id = ci_tagtour.tat_tour_id");
    }
    if(empty($options["join_tag"]) OR $options["join_tag"] != false){
      $this->db->join("ci_tag_translate","ci_tag_translate.tagt_tag_id = ci_tagtour.tat_tag_id");
    }
    $mainTable = parent::get($options);
    if(empty($mainTable) AND !empty($options["lang"])){
      unset($options["lang"]);
      $mainTable =  $this->get($options);
    }
    return $mainTable;
  }

  function getTagTourList($options = NULL){
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

  function countRecord($args = false){

    $count = 0;
    if(!empty($args["tag_id"]) && !empty($args["join"])  && !empty($args["in"]) ){
      $this->db->select('COUNT(tat_tour_id) AS count_tour');
      $this->db->from('ci_tagtour');
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');
      $this->db->where_in('tat_tag_id', $args["tag_id"]);
      $query = $this->db->get();
      $count = $query->result();
      return $count[0]->count_tour;
    }else{
      $count = $this->db->count_all('ci_tagtour');
      return $count;
    }


  }


  function getRecordFirstpage($args=false){
    //Get tour data
    $tourWhere["where_in"]["tag_id"] = $args["menu"];
    $tourWhere["where"]["tout_lang"] = $this->lang->lang();
    $tourWhere["group"] = parent::getColumn("tour_id");
    $tourWhere["join_tour"] = true;
    $tourWhere["join_tag"] = false;
    $tour = $this->get($tourWhere);

      //print_r($tour); exit;
      $count = 0;
      foreach ($tour as $key => $value) {
          $result[$key]["tour"] = $value;

          //Get tag data
          $argsTag["where"]['tour_id'] = $value["tour_id"];
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $argsTag["join_tag"] = true;
          $result[$key]["tag"] = $this->getTagTourList($argsTag);

          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value["tour_id"]);
          $priceTour = $this->db->get('ci_price')->result();

          if(!empty($priceTour)){
            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->pri_show_firstpage == 1){
                $minSalePrice = $value->pri_sale_adult_price;
                $result[$key]["price"] = $value;
                break;
              }else{
                if($value->pri_sale_adult_price < $minSalePrice){
                  $result[$key]["price"] = $value;
                  $minSalePrice = $value->pri_sale_adult_price;
                }
              }
            }
          }

          $count++;
      }

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }
  }


  function getRecordByTag($args=false){

    //Get tour data
    $tourWhere["where"]["tag_id"] = $args["tag_id"];
    $tourWhere["where"]["display"] = 1;
    $tourWhere["where"]["tout_lang"] = $this->lang->lang();
    $tourWhere["group"] = parent::getColumn("tour_id");
    $tourWhere["join_tour"] = true;
    $tourWhere["join_tag"] = false;
    $tour = $this->get($tourWhere);
    foreach ($tour as $key => $value) {
      $result[$key]["tour"] = $value;

      //Get tag data
      $argsTag["where"]['tour_id'] = $value["tour_id"];
      if(!empty($args["menu"])){
        $argsTag["where_in"]['tag_id'] = $args["menu"];
      }
      $argsTag["join_tag"] = true;
      $result[$key]["tag"] = $this->getTagTourList($argsTag);

      //Get price data
      unset($this->db);
      $this->db->where('pri_tour_id', $value["tour_id"]);
      $priceTour = $this->db->get('ci_price')->result();

      if(!empty($priceTour)){
        //Min price
        $minSalePrice = 9999999;
        foreach ($priceTour as $priceTourKey => $priceTourValue) {
          if($priceTourValue->pri_show_firstpage == 1){
            $minSalePrice = $priceTourValue->pri_sale_adult_price;
            $result[$key]["price"] = $priceTourValue;
            break;
          }else{
            if($priceTourValue->pri_sale_adult_price < $minSalePrice){
              $result[$key]["price"] = $priceTourValue;
              $minSalePrice = $priceTourValue->pri_sale_adult_price;
            }
          }
        }
      }
    }

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }
  }


  function getRecordByType($args=false){
    if($args["tag_id"] == 0){
      unset($args["tag_id"]);
    }else{
      $where["where_in"]["tag_id"][] = $args["tag_id"];
    }
    if(!empty($args['type_id'])){
      $whereType["where"]["tag_id"] = $args["type_id"];
      $resultType = $this->get($whereType);
      unset($whereType);
      if(!empty($resultType)){
        foreach ($resultType as $key => $value) {
          $whereIn[] = $value["tour_id"];
        }
        $where["where_in"]["tour_id"] = array_unique($whereIn);
      }
    }
    $where["where"]["display"] = 1;
    $where["where"]["tout_lang"] = $this->lang->lang();
    
    $where["join_tour"] = true;
    $where["join_tag"] = false;
    $where["group"] = "tour_id";
    $tour = $this->get($where);

    if(!empty($tour)){
      foreach ($tour as $key => $value) {
        $result[$key]["tour"] = $value;

        //Get tag data
        $argsTag["where"]['tour_id'] = $value["tour_id"];

        $argsTag["join_tag"] = true;
        $result[$key]["tags"] = $this->getTagTourList($argsTag);
        //Get price data
        unset($this->db);
        $this->db->where('pri_tour_id', $value["tour_id"]);
        $priceTour = $this->db->get('ci_price')->result();

        if(!empty($priceTour)){
          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $priceKey => $priceValue) {
            # code...
            if($priceValue->pri_show_firstpage == 1){
              $minSalePrice = $priceValue->pri_sale_adult_price;
              $result[$key]["price"] = $priceValue;
              break;
            }else{
              if($priceValue->pri_sale_adult_price < $minSalePrice){
                $result[$key]["price"] = $priceValue;
                $minSalePrice = $priceValue->pri_sale_adult_price;
              }
            }
          }
        }
      }
    }
    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }

  function getTourListRecordByType($args = false){
    if($args["tag_id"] == 0){
      unset($args["tag_id"]);
    }else{
      $where["where_in"]["tag_id"][] = $args["tag_id"];
    }
    if(!empty($args['type_id'])){
      $whereType["where"]["tag_id"] = $args["type_id"];
      $resultType = $this->get($whereType);
      unset($whereType);
      if(!empty($resultType)){
        foreach ($resultType as $key => $value) {
          $whereIn[] = $value["tour_id"];
        }
        $where["where_in"]["tour_id"] = array_unique($whereIn);
      }
    }
    $where["where"]["display"] = 1;
    $where["where"]["tout_lang"] = $this->lang->lang();
    
    $where["join_tour"] = true;
    $where["join_tag"] = false;
    $where["group"] = "tour_id";
    $tour = $this->get($where);

    if(!empty($tour)){
      foreach ($tour as $key => $value) {
        $result[$key]["tour"] = $value;
      }
    }
    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }


  function getRecordBySubTypeIn($args=false){


    $sql = "SELECT `tat_tour_id`
            FROM (`ci_tagtour`)
            WHERE `tat_tag_id` = $args[tag_id]
            AND tat_tour_id
            IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = $args[type_id]))
            AND tat_tour_id
            IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id IN($args[subtype_id])))
            ORDER BY tat_tour_id DESC
            LIMIT $args[offset], $args[per_page]
            ";

    $tour = $this->db->query($sql)->result();

    //print_r($tour); exit;
    $count = 0;
    foreach ($tour as $key => $value) {

      //Get tour data
      unset($this->db);
      //$this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
      $this->db->where('tou_id', $value->tat_tour_id);
      $this->db->where('tou_display', 1);
      $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $tourBuffer = $this->db->get('ci_tour')->result();


      if(!empty($tourBuffer)){

        $result[$count]["tour"] = $tourBuffer[0];

        //Get tag data
        $argsTag["where"]['tour_id'] = $value->tat_tour_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagTourList($argsTag);

        //Get price data
        unset($this->db);
        $this->db->where('pri_tour_id', $value->tat_tour_id);
        $priceTour = $this->db->get('ci_price')->result();

        if(!empty($priceTour)){

          /*
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->pri_sale_adult_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->pri_sale_adult_price;
            }
          }

          */

          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->pri_show_firstpage == 1){
              $minSalePrice = $value->pri_sale_adult_price;
              $result[$count]["price"] = $value;
              break;
            }else{
              if($value->pri_sale_adult_price < $minSalePrice){
                $result[$count]["price"] = $value;
                $minSalePrice = $value->pri_sale_adult_price;
              }
            }
          }
        }

        $count++;
      }
    }
    //print_r($result); exit;

    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }

  function getRecordBySubType($args=false){

    //SELECT tat_tour_id
    //FROM ci_tagtour
    //WHERE tat_tag_id = 30
    //AND tat_tour_id
    //IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = 29))

    $sql = "SELECT `tat_tour_id`
            FROM (`ci_tagtour`)
            WHERE `tat_tag_id` = $args[tag_id]
            AND tat_tour_id
            IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = $args[type_id]))
            AND tat_tour_id
            IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = $args[subtype_id]))
            ORDER BY tat_tour_id DESC
            LIMIT $args[offset], $args[per_page]
            ";

    $tour = $this->db->query($sql)->result();

    //print_r($tour); exit;
    $count = 0;
    foreach ($tour as $key => $value) {

      //Get tour data
      unset($this->db);
      //$this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
      $this->db->where('tou_id', $value->tat_tour_id);
      $this->db->where('tou_display', 1);
      $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $tourBuffer = $this->db->get('ci_tour')->result();


      if(!empty($tourBuffer)){

        $result[$count]["tour"] = $tourBuffer[0];

        //Get tag data
        $argsTag["where"]['tour_id'] = $value->tat_tour_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagTourList($argsTag);

        //Get price data
        unset($this->db);
        $this->db->where('pri_tour_id', $value->tat_tour_id);
        $priceTour = $this->db->get('ci_price')->result();

        if(!empty($priceTour)){

          /*
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->pri_sale_adult_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->pri_sale_adult_price;
            }
          }

          */

          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->pri_show_firstpage == 1){
              $minSalePrice = $value->pri_sale_adult_price;
              $result[$count]["price"] = $value;
              break;
            }else{
              if($value->pri_sale_adult_price < $minSalePrice){
                $result[$count]["price"] = $value;
                $minSalePrice = $value->pri_sale_adult_price;
              }
            }
          }
        }

        $count++;
      }
    }
    //print_r($result); exit;

    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }


  function getRecordHome($args=false){
    // ==================================================================
    //
    // Load Model
    //
    // ------------------------------------------------------------------
    $this->load->model("tag_model","tagModel");
    $this->load->model("type_model","typeModel");
    $this->load->model("tagtour_model","tagTourModel");
    $this->load->model("tagtype_model","tagTypeModel");

    // ==================================================================
    //
    // Get "first_page" type id.
    //
    // ------------------------------------------------------------------
    $typeWhere["where"]['parent_id'] = 0;
    $typeWhere["where"]['name'] = "first_page";
    $firstPageType = $this->typeModel->get($typeWhere);
    unset($typeWhere);

    // ==================================================================
    //
    // Get "banner" type id.
    //
    // ------------------------------------------------------------------
    $typeWhere["where"]['parent_id'] = 0;
    $typeWhere["where"]['name'] = "banner";
    $bannerType = $this->typeModel->get($typeWhere);
    unset($typeWhere);


    // ==================================================================
    //
    // Generating where for query tag_id from tagtypemodel for query tour.
    //
    // ------------------------------------------------------------------
    foreach ($firstPageType as $typeKey => $typeValue) {
      $tagIDForTourWhere[] = $typeValue["id"];
    }

    // ==================================================================
    //
    // Generating where for query tag_id from tagtypemodel for query banner (tour).
    //
    // ------------------------------------------------------------------
    foreach ($bannerType as $typeKey => $typeValue) {
      $tagIDForBannerWhere[] = $typeValue["id"];
    }

    // ==================================================================
    //
    // Get "tag_id" from tagType_model by type id for query tour.
    //
    // ------------------------------------------------------------------
    $whereTag["where_in"]["type_id"] = $tagIDForTourWhere;
    $whereTag["group"] = "tag_id";
    $inCondition = $this->tagTypeModel->getTagTypeList($whereTag);
    unset($whereTag);

    if(!empty($inCondition)){
      foreach ($inCondition as $inConditionKey => $inConditionValue) {
        $conditions[] = $inConditionValue["tag_id"];
      }
      unset($inCondition);
    }
    $whereTag["select"] = "tour_id";
    $whereTag["where_in"]["tag_id"] = $conditions;
    $whereTag["limit"]["start"] = $args["offset"];
    $whereTag["limit"]["amount"] = $args["per_page"];
    $whereTag["order"] = "tour_id DESC";
    $whereTag["distinct"] = "tour_id";
    $tourIDByTag = $this->tagTourModel->get($whereTag);
    unset($whereTag);
    unset($conditions);


    // ==================================================================
    //
    // Get "tag_id" from tagType_model by type id for query banner (tour).
    //
    // ------------------------------------------------------------------
    $whereTag["where_in"]["type_id"] = $tagIDForBannerWhere;
    $whereTag["group"] = "tag_id";
    $inCondition = $this->tagTypeModel->getTagTypeList($whereTag);
    unset($whereTag);

    if(!empty($inCondition)){
      foreach ($inCondition as $inConditionKey => $inConditionValue) {
        $conditions[] = $inConditionValue["tag_id"];
      }
      unset($inCondition);
    }
    $whereTag["select"] = "tour_id";
    $whereTag["where_in"]["tag_id"] = $conditions;
    $whereTag["limit"]["start"] = $args["offset"];
    $whereTag["limit"]["amount"] = $args["per_page"];
    $whereTag["order"] = "tour_id DESC";
    $whereTag["distinct"] = "tour_id";
    $bannerIDByTag = $this->tagTourModel->get($whereTag);
    unset($whereTag);
    unset($conditions);

    foreach ($tourIDByTag as $tourIDByTagKey => $tourIDByTagValue) {
      foreach ($bannerIDByTag as $bannerIDByTagKey => $bannerIDByTagValue) {
        if($tourIDByTagValue["tour_id"] == $bannerIDByTagValue["tour_id"]){
          unset($tourIDByTag[$tourIDByTagKey]);
        }
      }
    }


    $tourByTagTemp = array_merge($bannerIDByTag, $tourIDByTag);


    foreach ($tourByTagTemp as $tourByTagTempKey => $tourByTagTempValue) {
      //Get tour data
      unset($this->db);
      $this->db->where('tou_id', $tourByTagTempValue["tour_id"]);
      $this->db->where('tou_display', 1);
      $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $tourBuffer = $this->db->get('ci_tour')->result();

      if(!empty($tourBuffer)){

        $result[$tourByTagTempKey]["tour"] = $tourBuffer[0];
        //$result[$key]["tour"]->maintag_name = $value->maintag_name;
        //$result[$key]["tour"]->maintag_url = $value->maintag_url;

        //Get tag data
        $argsTag["where"]['tour_id'] = $tourByTagTempValue["tour_id"];
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$tourByTagTempKey]["tag"] = $this->getTagTourList($argsTag);

        //Get price data
        unset($this->db);
        $this->db->where('pri_tour_id', $tourByTagTempValue["tour_id"]);
        $priceTour = $this->db->get('ci_price')->result();

        if(!empty($bannerIDByTag)){
          foreach ($bannerIDByTag as $bannerIDByTagKey => $bannerIDByTagValue) {
            if($tourByTagTempValue["tour_id"] == $bannerIDByTagValue["tour_id"]){
              //echo "tour_id (".$tourByTagTempValue["tour_id"].") = (".$bannerIDByTagValue["tour_id"].") banner_id <BR>";
              $result[$tourByTagTempKey]["type"] = "banner";
            }
          }
        }

        if(empty($result[$tourByTagTempKey]["type"])){
          $result[$tourByTagTempKey]["type"] = "normal";
        }
        //var_dump($priceTour);exit;
        if(!empty($priceTour)){

          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $priceTourKey => $priceTourValue) {
            if($priceTourValue->pri_show_firstpage == 1){
              $minSalePrice = $priceTourValue->pri_sale_adult_price;
              $result[$tourByTagTempKey]["price"] = $priceTourValue;
              break;
            }else{
              if($priceTourValue->pri_sale_adult_price < $minSalePrice){
                $result[$tourByTagTempKey]["price"] = $priceTourValue;
                $minSalePrice = $priceTourValue->pri_sale_adult_price;
              }
            }
          }
        }
      }
    }

    //var_dump($result);exit;
    //echo $this->db->last_query(); exit;
    //print_r($result); exit;
    if(!empty($result)){
      return $result;
    }else{
      return false;
    }


  }

  function getRecordRelated($args=false){

    //header ('Content-type: text/html; charset=utf-8');
    //print_r($args["tour_tag"]);

    //Related by type [3 items]
    $this->load->model("type_model", "typeModel");

    foreach ($args["tour_tag"] as $key => $value) {
      if(!empty($value->id)){

        $args["not_id"] = 1;
        $args["parent_id"] = 0;
        $args["name"] = $value["name"];
        $typeQuery["tag"] = $this->typeModel->getRecord($args);

        if(!empty($typeQuery["tag"])){
          $query["type"] = $typeQuery["tag"];
          $query["type"][0]->tag_id = $value["id"];
        }
      }
    }

    if(!empty($query["type"])){

      $type_id = $query["type"][0]->tag_id;

      $sql = "SELECT DISTINCT `tat_tour_id`
              FROM (`ci_tagtour`) JOIN `ci_tour`
              ON `ci_tour`.`tou_id` = `ci_tagtour`.`tat_tour_id`
              WHERE `tat_tour_id` != $args[tour_id]
              AND `tat_tag_id`
              IN ($type_id)
              ORDER BY rand()
              DESC LIMIT $args[mainper_page] ";

      $tour = $this->db->query($sql)->result();

      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data

        unset($this->db);
        //$this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_id', $value->tat_tour_id);
        $this->db->where('tou_display', 1);
        $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
        $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
        $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
        $tourBuffer = $this->db->get('ci_tour')->result();



        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];

          //Get tag data
          $argsTag["where"]['tour_id'] = $value->tat_tour_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagTourList($argsTag);


          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value->tat_tour_id);
          $priceTour = $this->db->get('ci_price')->result();

          if(!empty($priceTour)){

            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->pri_show_firstpage == 1){
                $minSalePrice = $value->pri_sale_adult_price;
                $result[$count]["price"] = $value;
                break;
              }else{
                if($value->pri_sale_adult_price < $minSalePrice){
                  $result[$count]["price"] = $value;
                  $minSalePrice = $value->pri_sale_adult_price;
                }
              }
            }
          }
          $count++;
        }
      }//End related by type [3 item]

    }

    //Related by Normal Query
    $countTag = count($args["tag_id"]);
    $count = 1;
    $tag_in = "";
    foreach ($args["tag_id"] as $key => $value) {
      # code...
      if($countTag == $count){
        $tag_in .="'$value'";
      }else{
        $tag_in .="'$value',";
      }

      $count++;
    }
    //print_r($tag_in); exit;


    $sql = "SELECT DISTINCT `tat_tour_id`
            FROM (`ci_tagtour`) JOIN `ci_tour`
            ON `ci_tour`.`tou_id` = `ci_tagtour`.`tat_tour_id`
            WHERE `tat_tour_id` != $args[tour_id]
            AND `tat_tag_id`
            IN ($tag_in)
            ORDER BY rand()
            DESC LIMIT $args[per_page] ";

    $tour = $this->db->query($sql)->result();

    foreach ($tour as $key => $value) {

      unset($this->db);
      //$this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
      $this->db->where('tou_id', $value->tat_tour_id);
      $this->db->where('tou_display', 1);
      $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
      $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
      $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
      $tourBuffer = $this->db->get('ci_tour')->result();

      if(!empty($tourBuffer)){

        $result[$count]["tour"] = $tourBuffer[0];


        //Get tag data
        $argsTag["where"]['tour_id'] = $value->tat_tour_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagTourList($argsTag);


        //Get price data
        unset($this->db);
        $this->db->where('pri_tour_id', $value->tat_tour_id);
        $priceTour = $this->db->get('ci_price')->result();

        if(!empty($priceTour)){

          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->pri_show_firstpage == 1){
              $minSalePrice = $value->pri_sale_adult_price;
              $result[$count]["price"] = $value;
              break;
            }else{
              if($value->pri_sale_adult_price < $minSalePrice){
                $result[$count]["price"] = $value;
                $minSalePrice = $value->pri_sale_adult_price;
              }
            }
          }
        }

        $count++;
      }
    }



    //print_r($result); exit;
    if(!empty($result)){
      return $result;
    }else{
      return false;
    }

  }


  function getRecord($args=false){
    //print_r($args); exit;

    if(!empty($args["tag_id"]) && !empty($args["tour_id"]) && empty($args["join"]) && empty($args["firstpage"])  && empty($args["related"])){
      //Get category by name

      $data["tat_tag_id"] = $args["tag_id"];
      $data["tat_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["firstpage"])){

      //First tour
      $this->db->select('tat_tour_id, tat_tag_id');
      $this->db->where('tat_tag_id', 1);
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $firsttour = $this->db->get('ci_tagtour')->result();
      if(!empty($firsttour)){

        $count = 0;
        foreach ($firsttour as $key => $value) {
          //Get tour data
          unset($this->db);
          $this->db->select('tat_tour_id, tat_tag_id');
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where('tat_tag_id', $args["tag_id"]);
          $firsttagtourBuffer = $this->db->get('ci_tagtour')->result();
          if(!empty($firsttagtourBuffer)){
            $firsttagtour[] = $firsttagtourBuffer[0];
          }
        }

        if(!empty($firsttagtour)){
          $count = 0;
          foreach ($firsttagtour as $key => $value) {

            //Get tour data
            unset($this->db);

            $this->db->where('tou_id', $value->tat_tour_id);
            $this->db->where('tou_display', 1);
            $this->db->where('ci_tour_translate.tout_lang', $this->lang->lang());
            $this->db->join('ci_tour_translate', 'ci_tour_translate.tout_tour_id = ci_tour.tou_id');
            $this->db->order_by('CONVERT( tout_name USING tis620 ) ASC');
            $tourBuffer = $this->db->get('ci_tour')->result();

            if(!empty($tourBuffer)){
              $result[$count]["tour"] = $tourBuffer[0];


              //Get tag data
              $argsTag["where"]['tour_id'] = $value->tat_tour_id;
              $argsTag["where_in"]['tag_id'] = $args["menu"];
              $result[$count]["tag"] = $this->getTagTourList($argsTag);

              //Get price data
              unset($this->db);
              $this->db->where('pri_tour_id', $value->tat_tour_id);
              $priceTour = $this->db->get('ci_price')->result();

              if(!empty($priceTour)){

                /*
                $maxAgencyPrice = 0;
                foreach ($priceTour as $key => $value) {
                  # code...
                  if($value->pri_sale_adult_price > $maxAgencyPrice){
                    $result[$count]["price"] = $value;
                    $maxAgencyPrice = $value->pri_sale_adult_price;
                  }
                }

                */



                //Min price
                $minSalePrice = 9999999;
                foreach ($priceTour as $key => $value) {
                  # code...
                  if($value->pri_show_firstpage == 1){
                    $minSalePrice = $value->pri_sale_adult_price;
                    $result[$count]["price"] = $value;
                    break;
                  }else{
                    if($value->pri_sale_adult_price < $minSalePrice){
                      $result[$count]["price"] = $value;
                      $minSalePrice = $value->pri_sale_adult_price;
                    }
                  }
                }

              }



              $count++;
            }
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

    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["in"]) && !empty($args["related"])){

      //Related by Normal Query
      $countTag = count($args["tag_id"]);
      $count = 1;
      $tag_in = "";
      foreach ($args["tag_id"] as $key => $value) {
        # code...
        if($countTag == $count){
          $tag_in .="'$value'";
        }else{
          $tag_in .="'$value',";
        }

        $count++;
      }
      //print_r($tag_in); exit;

      $sql = "SELECT DISTINCT `tat_tour_id`
              FROM (`ci_tagtour`) JOIN `ci_tour`
              ON `ci_tour`.`tou_id` = `ci_tagtour`.`tat_tour_id`
              WHERE `tat_tour_id` != $args[tour_id]
              AND `tat_tag_id`
              IN ($tag_in)
              ORDER BY rand()
              DESC LIMIT $args[per_page] ";

      $tour = $this->db->query($sql)->result();


      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_lang', $this->lang->lang());
        $this->db->where('tou_display', 1);
        $this->db->where('tou_id', $value->tat_tour_id);
        $query = $this->db->get('ci_tour');
        $tourBuffer = $query->result();


        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];


          //Get tag data
          $argsTag["where"]['tour_id'] = $value->tat_tour_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagTourList($argsTag);


          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value->tat_tour_id);
          $priceTour = $this->db->get('ci_price')->result();

          if(!empty($priceTour)){


            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->pri_show_firstpage == 1){
                $minSalePrice = $value->pri_sale_adult_price;
                $result[$count]["price"] = $value;
                break;
              }else{
                if($value->pri_sale_adult_price < $minSalePrice){
                  $result[$count]["price"] = $value;
                  $minSalePrice = $value->pri_sale_adult_price;
                }
              }
            }
          }

          $count++;
        }
      }
      //print_r($result); exit;
      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["in"])){

      //Get distinct tour_id from ci_tagtour
      $this->db->select('tat_tour_id');
      $this->db->distinct("tat_tour_id");
      $this->db->where_in('tat_tag_id', $args["tag_id"]);
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');
      $this->db->order_by('tat_tour_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $tour = $this->db->get('ci_tagtour')->result();


      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_lang', $this->lang->lang());
        $this->db->where('tou_display', 1);
        $this->db->where('tou_id', $value->tat_tour_id);
        $query = $this->db->get('ci_tour');
        $tourBuffer = $query->result();



        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];


          //Get tag data
          $argsTag["where"]['tour_id'] = $value->tat_tour_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagTourList($argsTag);

          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value->tat_tour_id);
          $priceTour = $this->db->get('ci_price')->result();

          if(!empty($priceTour)){


            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->pri_show_firstpage == 1){
                $minSalePrice = $value->pri_sale_adult_price;
                $result[$count]["price"] = $value;
                break;
              }else{
                if($value->pri_sale_adult_price < $minSalePrice){
                  $result[$count]["price"] = $value;
                  $minSalePrice = $value->pri_sale_adult_price;
                }
              }
            }
          }

          $count++;
        }
      }
      //print_r($result); exit;
      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"]) && !empty($args["join"]) &&  $args["model"] == "home"){

      //echo "home"; exit;

      //Get distinct tour_id from ci_tagtour
      $this->db->select('tat_tour_id');
      $this->db->distinct("tat_tour_id");
      $this->db->where('tat_tag_id', $args["tag_id"]);
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');
      $this->db->order_by('tat_tour_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $tour = $this->db->get('ci_tagtour')->result();


      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_lang', $this->lang->lang());
        $this->db->where('tou_display', 1);
        $this->db->where('tou_id', $value->tat_tour_id);
        $query = $this->db->get('ci_tour');
        $tourBuffer = $query->result();


        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];


          //Get tag data
          $argsTag["where"]['tour_id'] = $value->tat_tour_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagTourList($argsTag);

          //Get tag not in menu
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_not_in('tat_tag_id', $args["menu"]);
          $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
          //$this->db->join('ci_tagtype', 'ci_tagtype.tty_tag_id = ci_tagtour.tat_tag_id');
          $alltag_not_menu = $this->db->get('ci_tagtour')->result();

          //print_r($alltag_not_menu);
          foreach ($alltag_not_menu as $key => $value) {

            $this->db->where('tty_tag_id', $value->tat_tag_id);
            $this->db->join('ci_type', 'ci_type.typ_id = ci_tagtype.tty_type_id');
            $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');
            $typeTemp = $this->db->get('ci_tagtype')->result();

            if(!empty($typeTemp)){
              $type[] = $typeTemp;
            }
          }


          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value->tat_tour_id);
          $priceTour = $this->db->get('ci_price')->result();

          if(!empty($priceTour)){

          //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->pri_show_firstpage == 1){
                $minSalePrice = $value->pri_sale_adult_price;
                $result[$count]["price"] = $value;
                break;
              }else{
                if($value->pri_sale_adult_price < $minSalePrice){
                  $result[$count]["price"] = $value;
                  $minSalePrice = $value->pri_sale_adult_price;
                }
              }
            }
          }

          $count++;
        }
      }
      //print_r($result); exit;

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"]) && !empty($args["join"])){

      //echo "home"; exit;

      //Get distinct tour_id from ci_tagtour
      $this->db->select('tat_tour_id');
      $this->db->distinct("tat_tour_id");
      $this->db->where('tat_tag_id', $args["tag_id"]);
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');
      $this->db->order_by('tat_tour_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $tour = $this->db->get('ci_tagtour')->result();


      $count = 0;
      foreach ($tour as $key => $value) {

        //Get tour data
        unset($this->db);
        $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_lang', $this->lang->lang());
        $this->db->where('tou_display', 1);
        $this->db->where('tou_id', $value->tat_tour_id);
        $query = $this->db->get('ci_tour');
        $tourBuffer = $query->result();



        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];


          //Get tag data
          $argsTag["where"]['tour_id'] = $value->tat_tour_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagTourList($argsTag);


          //Get price data
          unset($this->db);
          $this->db->where('pri_tour_id', $value->tat_tour_id);
          $priceTour = $this->db->get('ci_price')->result();

          if(!empty($priceTour)){
          //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->pri_show_firstpage == 1){
                $minSalePrice = $value->pri_sale_adult_price;
                $result[$count]["price"] = $value;
                break;
              }else{
                if($value->pri_sale_adult_price < $minSalePrice){
                  $result[$count]["price"] = $value;
                  $minSalePrice = $value->pri_sale_adult_price;
                }
              }
            }
          }

          $count++;
        }
      }
      //print_r($result); exit;

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"])){
      //Get category by name
      //print_r($args); exit;
      $data["tat_tag_id"] = $args["tag_id"];
      $query = $this->db->get_where('ci_tagtour', $data);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());

        return $newResult;
      }else{
        return false;
      }

    }else if(!empty($args["tour_id"]) && !empty($args["join"])){

      $this->db->where('tat_tour_id', $args["tour_id"]);
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
      $query = $this->db->get('ci_tagtour');
      $result = $query->result();

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["tour_id"])){
      //Get category by name
      $data["tat_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(!empty($args["id"])){
      //Get category by id
      $query = $this->db->get_where('ci_tagtour', array('agt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_tagtour");

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

      $this->db->set("tat_cr_date", date("Y-m-d H:i:s"));

      $this->db->set("tat_lu_date", date("Y-m-d H:i:s"));

      $this->db->insert($this->_table);

      return $this->db->insert_id();
    }

    return ;
  }




  function addMultipleRecord($args=false){

   //print_r($args); exit;
   //Check duplicate tag data
    if($args){
      //$tagNew = array();
      $count = 0;
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);
          //$tag[$count]->id = $tagInsertID;
          //$tag[$count]->name = $tagInput["name"];
         $count++;
      }
      return ;
    }else{
      return ;
    }
  }

  function updateRecord($args=false){

    if(!empty($args["tags"])){

      if($args["tags"]=="[]"){
        return ;
      }

      $this->load->model("tag_model", "tagModel");
      //print_r($args["tags"]); exit;
      $tags = array_unique(json_decode($args["tags"]));

      $tagInput = array();
      $count = 0;


      $tagtour["tour_id"] = $args["id"];
      $query = parent::get($tagtour);

      foreach ($tags as $key => $value) {
        $tag["where"]["tagt_name"] = $value;
        $tagQuery = $this->tagModel->get($tag);

        if(empty($tagQuery)){
          $addTag["url"] = Util::url_title($value);
          $addTag["name"] = $value;
          $addTag["lang"] = $this->lang->lang();
          $input[$count]["tag_id"] = $this->tagModel->add($addTag);
          $input[$count]["tagt_name"] = $tag["where"]["tagt_name"];
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
                $insertTag[$insertCount]["tour_id"] = $args["id"];
                $insertCount++;
            }
        }
        //return $updateArray;
      //End check empty $query
      }else{

        foreach ($input as $keyInput => $valueInput) {
          $insertArray[$insertCount] = $valueInput;
          $insertTag[$insertCount]["tag_id"] = $valueInput["tag_id"];
          $insertTag[$insertCount]["tour_id"] = $args["id"];
          $insertCount++;
        }

      }

      if(!empty($insertTag)){

        $this->addMultipleRecord($insertTag);
      }

      if(!empty($deleteArray)){

        foreach ($deleteArray as $key => $value) {
          # code...
          $deleteTag["tag_id"] = $value["tag_id"];
          $deleteTag["tour_id"] = $args["id"];
          $this->deleteRecord($deleteTag);
        }

      }
    }

    return ;
  }

  function deleteRecord($args=false){
    if(!empty($args["id"])){
      $this->db->where("tat_id", $args["id"]);
      $this->db->delete("ci_tagtour");

    }else if(!empty($args["tag_id"]) && !empty($args["tour_id"])){
      $this->db->where("tat_tag_id", $args["tag_id"]);
      $this->db->where("tat_tour_id", $args["tour_id"]);
      $this->db->delete("ci_tagtour");

    }else if(!empty($args["tour_id"])){
      $this->db->where("tat_tour_id", $args["tour_id"]);
      $this->db->delete("ci_tagtour");

    }else if(!empty($args["tag_id"])){
      $this->db->where("tat_tag_id", $args["tag_id"]);
      $this->db->delete("ci_tagtour");

    }
  }
}
?>