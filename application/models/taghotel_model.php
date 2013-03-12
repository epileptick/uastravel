<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Taghotel_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tah";
    $this->_column = array(
                     'id'                => 'tah_id',
                     'tag_id'            => 'tah_tag_id',
                     'hotel_id'          => 'tah_hotel_id',
                     'cr_date'           => 'tah_cr_date',
                     'cr_uid'            => 'tah_cr_uid',
                     'lu_date'           => 'tah_lu_date',
                     'lu_uid'            => 'tah_lu_uid'
    );
    $this->_join_column = array(
                     'tag_id'            => 'tagt_tag_id',
                     'lang'              => 'tagt_lang',
                     'name'              => 'tagt_name',
                     'url'               => 'tagt_url'
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
    $this->db->join("ci_tag_translate","ci_tag_translate.tagt_tag_id = ci_taghotel.tah_tag_id");
    $mainTable = parent::get($options);
    if(empty($mainTable) AND !empty($options["lang"])){
      unset($options["lang"]);
      $mainTable =  $this->get($options);
    }
    return $mainTable;
  }

  function getTagHotelList($options = NULL){
    $options["where"]["lang"] = $this->lang->lang();
    $result = $this->get($options);
    unset($options["where"]["lang"]);
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
      $this->db->select('COUNT(tah_hotel_id) AS count_hotel');
      $this->db->from('ci_taghotel');
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_taghotel.tah_tag_id');
      $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
      $this->db->where_in('tah_tag_id', $args["tag_id"]);
      $query = $this->db->get();
      $count = $query->result();
      return $count[0]->count_hotel;
    }else{
      $count = $this->db->count_all('ci_taghotel');
      return $count;
    }


  }


  function getRecordFirstpage($args=false){

     //Get distinct hotel_id from ci_taghotel
      $this->db->select('tah_hotel_id');
      $this->db->distinct("tah_hotel_id");
      $this->db->where_in('tah_tag_id', $args["menu"]);
      //$this->db->where('tah_tag_id', $args["tag_id"]);
      $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
      $this->db->order_by('tah_hotel_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $hotel = $this->db->get('ci_taghotel')->result();

      $count = 0;
      foreach ($hotel as $key => $value) {

        //Get hotel data
        unset($this->db);
        //$this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
        $this->db->where('hot_id', $value->tah_hotel_id);
        $this->db->where('hot_display', 1);
        $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
        $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
        $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
        $hotelBuffer = $this->db->get('ci_hotel')->result();



        if(!empty($hotelBuffer)){
          $result[$count]["hotel"] = $hotelBuffer[0];

          //Get tag data
          $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagHotelList($argsTag);

          //Get price data
          unset($this->db);
          $this->db->where('prh_hotel_id', $value->tah_hotel_id);
          $priceTour = $this->db->get('ci_pricehotel')->result();

          if(!empty($priceTour)){
            /*
            $maxAgencyPrice = 0;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price > $maxAgencyPrice){
                $result[$count]["price"] = $value;
                $maxAgencyPrice = $value->prh_sale_room_price;
              }
            }
            */


            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price < $minSalePrice){
                $result[$count]["price"] = $value;
                $minSalePrice = $value->prh_sale_room_price;
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


  function getRecordByTag($args=false){

    //Get distinct hotel_id from ci_taghotel
    $this->db->select('tah_hotel_id');
    $this->db->distinct("tah_hotel_id");
    $this->db->where('tah_tag_id', $args["tag_id"]);
    $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
    $this->db->order_by('tah_hotel_id DESC');
    if($args["per_page"] > -1 && $args["offset"] > -1){
      $this->db->limit($args["per_page"], $args["offset"]);
    }
    $hotel = $this->db->get('ci_taghotel')->result();
    //echo $this->db->last_query(); exit;

    $count = 0;
    foreach ($hotel as $key => $value) {

      //Get hotel data
      unset($this->db);
      //$this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
      $this->db->where('hot_id', $value->tah_hotel_id);
      $this->db->where('hot_display', 1);
      $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
      $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
      $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
      $hotelBuffer = $this->db->get('ci_hotel')->result();



      if(!empty($hotelBuffer)){

        $result[$count]["hotel"] = $hotelBuffer[0];

        //Get tag data
        $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagHotelList($argsTag);

        //Get price data
        unset($this->db);
        $this->db->where('prh_hotel_id', $value->tah_hotel_id);
        //$this->db->where('prh_hotel_id', 128);
        $this->db->order_by('prh_agency_id ASC');
        $priceTour = $this->db->get('ci_pricehotel')->result();
        //print_r($priceTour);

        if(!empty($priceTour)){

          //Group agency
          $agencyArray = array();
          $countagencyArray = array();
          foreach ($priceTour as $key => $value) {
            if (isset($agencyArray[$value->prh_agency_id])){
              $countagencyArray[$value->prh_agency_id]++;
              $agencyArray[$value->prh_agency_id][] = $value;
            }else{
              $countagencyArray[$value->prh_agency_id] = 1;
              $agencyArray[$value->prh_agency_id][] = $value;
            }
          }

          //Find low price in agency
          $agencyLowPriceArray = array();
          foreach ($agencyArray as $keyAgency => $valueAgency) {
            $agencyLowPrice = $valueAgency[0]->prh_sale_room_price;
            foreach ($valueAgency as $key => $value) {
              if($value->prh_sale_room_price <= $agencyLowPrice){
                $agencyLowPriceArray[$keyAgency] = $value;
              }
            }
          }

          //Find max price for display
          /*
          $maxAgencyPrice = 0;
          foreach ($agencyLowPriceArray as $key => $value) {
            # code...
            if($value->prh_sale_room_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->prh_sale_room_price;
            }
          }
          */

          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->prh_sale_room_price < $minSalePrice){
              $result[$count]["price"] = $value;
              $minSalePrice = $value->prh_sale_room_price;
            }
          }


        }

        $count++;
      }

    }


    //print_r($result); exit;

    //print_r($result); exit;

    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }


  function getRecordByType($args=false){

    //SELECT tah_hotel_id
    //FROM ci_taghotel
    //WHERE tah_tag_id = 30
    //AND tah_hotel_id
    //IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = 29))

    $sql = "SELECT `tah_hotel_id`
            FROM (`ci_taghotel`)
            WHERE `tah_tag_id` = $args[tag_id]
            AND tah_hotel_id
            IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = $args[type_id]))
            ORDER BY tah_hotel_id DESC
            LIMIT $args[offset], $args[per_page]
            ";

    $hotel = $this->db->query($sql)->result();

    //print_r($hotel); exit;
    $count = 0;
    foreach ($hotel as $key => $value) {

      //Get hotel data
      unset($this->db);
      $this->db->where('hot_id', $value->tah_hotel_id);
      $this->db->where('hot_display', 1);
      $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
      $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
      $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
      $hotelBuffer = $this->db->get('ci_hotel')->result();

      if(!empty($hotelBuffer)){
        $result[$count]["hotel"] = $hotelBuffer[0];

        //Get tag data
        $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagHotelList($argsTag);

        //Get price data
        unset($this->db);
        $this->db->where('prh_hotel_id', $value->tah_hotel_id);
        $priceTour = $this->db->get('ci_pricehotel')->result();

        if(!empty($priceTour)){
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {

            /*
            # code...
            if($value->prh_sale_room_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->prh_sale_room_price;
            }

            */


            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price < $minSalePrice){
                $result[$count]["price"] = $value;
                $minSalePrice = $value->prh_sale_room_price;
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

    //SELECT tah_hotel_id
    //FROM ci_taghotel
    //WHERE tah_tag_id = 30
    //AND tah_hotel_id
    //IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = 29))

    $sql = "SELECT `tah_hotel_id`
            FROM (`ci_taghotel`)
            WHERE `tah_tag_id` = $args[tag_id]
            AND tah_hotel_id
            IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = $args[type_id]))
            AND tah_hotel_id
            IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = $args[subtype_id]))
            ORDER BY tah_hotel_id DESC
            LIMIT $args[offset], $args[per_page]
            ";

    $hotel = $this->db->query($sql)->result();

    //print_r($hotel); exit;
    $count = 0;
    foreach ($hotel as $key => $value) {

      //Get hotel data
      unset($this->db);
      $this->db->where('hot_id', $value->tah_hotel_id);
      $this->db->where('hot_display', 1);
      $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
      $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
      $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
      $hotelBuffer = $this->db->get('ci_hotel')->result();


      if(!empty($hotelBuffer)){

        $result[$count]["hotel"] = $hotelBuffer[0];

        //Get tag data
        $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagHotelList($argsTag);

        //Get price data
        unset($this->db);
        $this->db->where('prh_hotel_id', $value->tah_hotel_id);
        $priceTour = $this->db->get('ci_pricehotel')->result();

        if(!empty($priceTour)){

          /*
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->prh_sale_room_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->prh_sale_room_price;
            }
          }*/


          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->prh_sale_room_price < $minSalePrice){
              $result[$count]["price"] = $value;
              $minSalePrice = $value->prh_sale_room_price;
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

    //First hotel
    //$this->db->select('typ_id', 'typ_name');
    $this->db->where('typ_parent_id', 0);
    $type = $this->db->get('ci_type')->result();

    //print_r($type);
    foreach ($type as $key => $value) {
      //$this->db->select('tag_id', 'tag_name');
      $this->db->where('tag_name', $value->typ_name);
      $tagTemp = $this->db->get('ci_tag')->result();

      if(!empty($tagTemp)  && $tagTemp[0]->tag_id != 1){
        $tag[] = $tagTemp[0];
      }
    }


    //print_r($tag); exit;
    $count = 0;
    if(!empty($tag))
    foreach ($tag as $key => $value) {

      if($args["tag_id"]){
        $sql = "SELECT `tah_hotel_id`
                FROM (`ci_taghotel`)
                WHERE tah_tag_id = 1
                AND tah_hotel_id IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = $value->tag_id))
                AND tah_hotel_id IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = $args[tag_id]))
                ORDER BY tah_hotel_id DESC
                LIMIT $args[offset], $args[per_page]
                ";
      }else{

        $sql = "SELECT `tah_hotel_id`
                FROM (`ci_taghotel`)
                WHERE tah_tag_id = 1
                AND tah_hotel_id IN((SELECT tah_hotel_id FROM ci_taghotel WHERE tah_tag_id = $value->tag_id))
                ORDER BY tah_hotel_id DESC
                LIMIT $args[offset], $args[per_page]
                ";
      }

      $hotelByTagTemp = $this->db->query($sql)->result();


      //print_r($hotelByTagTemp); exit;


      if(!empty($hotelByTagTemp)){
        $hotelByTag[$count]["hotel"] = $hotelByTagTemp;
        $hotelByTag[$count]["maintag_name"] = $value->tag_name;
        $hotelByTag[$count]["maintag_url"] = $value->tag_url;
        $count++;
      }
    }

    //print_r($hotelByTag); exit;
    //Merge array

    if(empty($hotelByTag)){
      return false;
    }
    $firsthotel = array();
    $count = 0;
    foreach ($hotelByTag as $key => $valueFirst) {
      foreach ($valueFirst["hotel"] as $key => $valueLast) {
        $firsthotel[$count] = new stdClass();
        $firsthotel[$count]->tah_hotel_id = $valueLast->tah_hotel_id;
        $firsthotel[$count]->maintag_name = $valueFirst["maintag_name"];
        $firsthotel[$count]->maintag_url = $valueFirst["maintag_url"];
        $count++;
      }
    }
    //print_r($firsthotel); exit;

    $count = 0;
    foreach ($firsthotel as $key => $value) {

      //Get hotel data
      unset($this->db);
      //$this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
      $this->db->where('hot_id', $value->tah_hotel_id);
      $this->db->where('hot_display', 1);
      $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
      $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
      $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
      $hotelBuffer = $this->db->get('ci_hotel')->result();




      if(!empty($hotelBuffer)){

        $result[$count]["hotel"] = $hotelBuffer[0];
        $result[$count]["hotel"]->maintag_name = $value->maintag_name;
        $result[$count]["hotel"]->maintag_url = $value->maintag_url;


        //Get tag data
        $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagHotelList($argsTag);


        //Get price data
        unset($this->db);
        $this->db->where('prh_hotel_id', $value->tah_hotel_id);
        $priceTour = $this->db->get('ci_pricehotel')->result();

        if(!empty($priceTour)){

          /*
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->prh_sale_room_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->prh_sale_room_price;
            }
          }

          */

          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->prh_sale_room_price < $minSalePrice){
              $result[$count]["price"] = $value;
              $minSalePrice = $value->prh_sale_room_price;
            }
          }

        }

        $count++;
      }
    }


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

    //Related by type [3 items]
    $this->load->model("type_model", "typeModel");
    foreach ($args["hotel_tag"] as $key => $value) {

      if(!empty($value->id)){

        $args["not_id"] = 1;
        $args["parent_id"] = 0;
        $args["name"] = $value["name"];
        $typeQuery["tag"] = $this->typeModel->getRecord($args);

        if(!empty($typeQuery["tag"])){
          $query["type"] = $typeQuery["tag"];
          $query["type"][0]->tag_id = $value["tag_id"];
        }
      }
    }

    if(!empty($query["type"])){

      $type_id = $query["type"][0]->tag_id;

      $sql = "SELECT DISTINCT `tah_hotel_id`
              FROM (`ci_taghotel`) JOIN `ci_hotel`
              ON `ci_hotel`.`hot_id` = `ci_taghotel`.`tah_hotel_id`
              WHERE `tah_hotel_id` != $args[hotel_id]
              AND `tah_tag_id`
              IN ($type_id)
              ORDER BY rand()
              DESC LIMIT $args[mainper_page] ";

      $hotel = $this->db->query($sql)->result();

      $count = 0;
      foreach ($hotel as $key => $value) {

        //Get hotel data

        unset($this->db);
        //$this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
        $this->db->where('hot_id', $value->tah_hotel_id);
        $this->db->where('hot_display', 1);
        $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
        $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
        $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
        $hotelBuffer = $this->db->get('ci_hotel')->result();



        if(!empty($hotelBuffer)){
          $result[$count]["hotel"] = $hotelBuffer[0];
        //Get tag data
        $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagHotelList($argsTag);
        

          //Get price data
          unset($this->db);
          $this->db->where('prh_hotel_id', $value->tah_hotel_id);
          $priceTour = $this->db->get('ci_pricehotel')->result();

          if(!empty($priceTour)){

            /*
            $maxAgencyPrice = 0;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price > $maxAgencyPrice){
                $result[$count]["price"] = $value;
                $maxAgencyPrice = $value->prh_sale_room_price;
              }
            }
            */

            //Min price
            $minSalePrice = 9999999;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price < $minSalePrice && $value->prh_sale_room_price != 0){
                $result[$count]["price"] = $value;
                $minSalePrice = $value->prh_sale_room_price;
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

    $sql = "SELECT DISTINCT `tah_hotel_id`
            FROM (`ci_taghotel`) JOIN `ci_hotel`
            ON `ci_hotel`.`hot_id` = `ci_taghotel`.`tah_hotel_id`
            WHERE `tah_hotel_id` != $args[hotel_id]
            AND `tah_tag_id`
            IN ($tag_in)
            ORDER BY rand()
            DESC LIMIT $args[per_page] ";

    $hotel = $this->db->query($sql)->result();

    foreach ($hotel as $key => $value) {

      unset($this->db);
      //$this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
      $this->db->where('hot_id', $value->tah_hotel_id);
      $this->db->where('hot_display', 1);
      $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
      $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
      $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
      $hotelBuffer = $this->db->get('ci_hotel')->result();

      if(!empty($hotelBuffer)){

        $result[$count]["hotel"] = $hotelBuffer[0];


        //Get tag data
        $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
        $argsTag["where_in"]['tag_id'] = $args["menu"];
        $result[$count]["tag"] = $this->getTagHotelList($argsTag);


        //Get price data
        unset($this->db);
        $this->db->where('prh_hotel_id', $value->tah_hotel_id);
        $priceTour = $this->db->get('ci_pricehotel')->result();

        if(!empty($priceTour)){
          $maxAgencyPrice = 0;
          foreach ($priceTour as $key => $value) {
            # code...
            if($value->prh_sale_room_price > $maxAgencyPrice){
              $result[$count]["price"] = $value;
              $maxAgencyPrice = $value->prh_sale_room_price;
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

    if(!empty($args["tag_id"]) && !empty($args["hotel_id"]) && empty($args["join"]) && empty($args["firstpage"])  && empty($args["related"])){
      //Get category by name

      $data["tah_tag_id"] = $args["tag_id"];
      $data["tah_hotel_id"] = $args["hotel_id"];

      $query = $this->db->get_where('ci_taghotel', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["firstpage"])){

      //First hotel
      $this->db->select('tah_hotel_id, tah_tag_id');
      $this->db->where('tah_tag_id', 1);
      $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $firsthotel = $this->db->get('ci_taghotel')->result();
      if(!empty($firsthotel)){

        $count = 0;
        foreach ($firsthotel as $key => $value) {
          //Get hotel data
          unset($this->db);
          $this->db->select('tah_hotel_id, tah_tag_id');
          $this->db->where('tah_hotel_id', $value->tah_hotel_id);
          $this->db->where('tah_tag_id', $args["tag_id"]);
          $firsttaghotelBuffer = $this->db->get('ci_taghotel')->result();
          if(!empty($firsttaghotelBuffer)){
            $firsttaghotel[] = $firsttaghotelBuffer[0];
          }
        }

        if(!empty($firsttaghotel)){
          $count = 0;
          foreach ($firsttaghotel as $key => $value) {

            //Get hotel data
            unset($this->db);

            $this->db->where('hot_id', $value->tah_hotel_id);
            $this->db->where('hot_display', 1);
            $this->db->where('ci_hotel_translate.hott_lang', $this->lang->lang());
            $this->db->join('ci_hotel_translate', 'ci_hotel_translate.hott_hotel_id = ci_hotel.hot_id');
            $this->db->order_by('CONVERT( hott_name USING tis620 ) ASC');
            $hotelBuffer = $this->db->get('ci_hotel')->result();



            if(!empty($hotelBuffer)){
              $result[$count]["hotel"] = $hotelBuffer[0];

              //Get tag data
              $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
              $argsTag["where_in"]['tag_id'] = $args["menu"];
              $result[$count]["tag"] = $this->getTagHotelList($argsTag);

              //Get price data
              unset($this->db);
              $this->db->where('prh_hotel_id', $value->tah_hotel_id);
              $priceTour = $this->db->get('ci_pricehotel')->result();

              if(!empty($priceTour)){

                /*
                $maxAgencyPrice = 0;
                foreach ($priceTour as $key => $value) {
                  # code...
                  if($value->agt_sale_room_price > $maxAgencyPrice){
                    $result[$count]["price"] = $value;
                    $maxAgencyPrice = $value->prh_sale_room_price;
                  }
                }

                */



                //Min price
                $minSalePrice = 9999999;
                foreach ($priceTour as $key => $value) {
                  # code...
                  if($value->prh_sale_room_price < $minSalePrice){
                    $result[$count]["price"] = $value;
                    $minSalePrice = $value->prh_sale_room_price;
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

      $sql = "SELECT DISTINCT `tah_hotel_id`
              FROM (`ci_taghotel`) JOIN `ci_hotel`
              ON `ci_hotel`.`hot_id` = `ci_taghotel`.`tah_hotel_id`
              WHERE `tah_hotel_id` != $args[hotel_id]
              AND `tah_tag_id`
              IN ($tag_in)
              ORDER BY rand()
              DESC LIMIT $args[per_page] ";

      $hotel = $this->db->query($sql)->result();


      $count = 0;
      foreach ($hotel as $key => $value) {

        //Get hotel data
        unset($this->db);
        $this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
        $this->db->where('hot_lang', $this->lang->lang());
        $this->db->where('hot_display', 1);
        $this->db->where('hot_id', $value->tah_hotel_id);
        $query = $this->db->get('ci_hotel');
        $hotelBuffer = $query->result();


        if(!empty($hotelBuffer)){
          $result[$count]["hotel"] = $hotelBuffer[0];

          //Get tag data
          $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagHotelList($argsTag);


          //Get price data
          unset($this->db);
          $this->db->where('prh_hotel_id', $value->tah_hotel_id);
          $priceTour = $this->db->get('ci_pricehotel')->result();

          if(!empty($priceTour)){
            $maxAgencyPrice = 0;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price > $maxAgencyPrice){
                $result[$count]["price"] = $value;
                $maxAgencyPrice = $value->prh_sale_room_price;
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

      //Get distinct hotel_id from ci_taghotel
      $this->db->select('tah_hotel_id');
      $this->db->distinct("tah_hotel_id");
      $this->db->where_in('tah_tag_id', $args["tag_id"]);
      $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
      $this->db->order_by('tah_hotel_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $hotel = $this->db->get('ci_taghotel')->result();


      $count = 0;
      foreach ($hotel as $key => $value) {

        //Get hotel data
        unset($this->db);
        $this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
        $this->db->where('hot_lang', $this->lang->lang());
        $this->db->where('hot_display', 1);
        $this->db->where('hot_id', $value->tah_hotel_id);
        $query = $this->db->get('ci_hotel');
        $hotelBuffer = $query->result();



        if(!empty($hotelBuffer)){
          $result[$count]["hotel"] = $hotelBuffer[0];

          //Get tag data
          $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagHotelList($argsTag);

          //Get price data
          unset($this->db);
          $this->db->where('prh_hotel_id', $value->tah_hotel_id);
          $priceTour = $this->db->get('ci_pricehotel')->result();

          if(!empty($priceTour)){
            $maxAgencyPrice = 0;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price > $maxAgencyPrice){
                $result[$count]["price"] = $value;
                $maxAgencyPrice = $value->prh_sale_room_price;
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

      //Get distinct hotel_id from ci_taghotel
      $this->db->select('tah_hotel_id');
      $this->db->distinct("tah_hotel_id");
      $this->db->where('tah_tag_id', $args["tag_id"]);
      $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
      $this->db->order_by('tah_hotel_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $hotel = $this->db->get('ci_taghotel')->result();


      $count = 0;
      foreach ($hotel as $key => $value) {

        //Get hotel data
        unset($this->db);
        $this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
        $this->db->where('hot_lang', $this->lang->lang());
        $this->db->where('hot_display', 1);
        $this->db->where('hot_id', $value->tah_hotel_id);
        $query = $this->db->get('ci_hotel');
        $hotelBuffer = $query->result();


        if(!empty($hotelBuffer)){
          $result[$count]["hotel"] = $hotelBuffer[0];


          //Get tag data
          $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagHotelList($argsTag);

          //Get tag not in menu
          unset($this->db);
          $this->db->where('tah_hotel_id', $value->tah_hotel_id);
          $this->db->where_not_in('tah_tag_id', $args["menu"]);
          $this->db->join('ci_tag', 'ci_tag.tag_id = ci_taghotel.tah_tag_id');
          //$this->db->join('ci_tagtype', 'ci_tagtype.tty_tag_id = ci_taghotel.tah_tag_id');
          $alltag_not_menu = $this->db->get('ci_taghotel')->result();

          //print_r($alltag_not_menu);
          foreach ($alltag_not_menu as $key => $value) {

            $this->db->where('tty_tag_id', $value->tah_tag_id);
            $this->db->join('ci_type', 'ci_type.typ_id = ci_tagtype.tty_type_id');
            $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtype.tty_tag_id');
            $typeTemp = $this->db->get('ci_tagtype')->result();

            if(!empty($typeTemp)){
              $type[] = $typeTemp;
            }
          }


          //Get price data
          unset($this->db);
          $this->db->where('prh_hotel_id', $value->tah_hotel_id);
          $priceTour = $this->db->get('ci_pricehotel')->result();

          if(!empty($priceTour)){
            $maxAgencyPrice = 0;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price > $maxAgencyPrice){
                $result[$count]["price"] = $value;
                $maxAgencyPrice = $value->prh_sale_room_price;
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

      //Get distinct hotel_id from ci_taghotel
      $this->db->select('tah_hotel_id');
      $this->db->distinct("tah_hotel_id");
      $this->db->where('tah_tag_id', $args["tag_id"]);
      $this->db->join('ci_hotel', 'ci_hotel.hot_id = ci_taghotel.tah_hotel_id');
      $this->db->order_by('tah_hotel_id DESC');
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $hotel = $this->db->get('ci_taghotel')->result();


      $count = 0;
      foreach ($hotel as $key => $value) {

        //Get hotel data
        unset($this->db);
        $this->db->select('hot_id, hot_name, hot_code, hot_url, hot_first_image, hot_banner_image');
        $this->db->where('hot_lang', $this->lang->lang());
        $this->db->where('hot_display', 1);
        $this->db->where('hot_id', $value->tah_hotel_id);
        $query = $this->db->get('ci_hotel');
        $hotelBuffer = $query->result();



        if(!empty($hotelBuffer)){
          $result[$count]["hotel"] = $hotelBuffer[0];


          //Get tag data
          $argsTag["where"]['hotel_id'] = $value->tah_hotel_id;
          $argsTag["where_in"]['tag_id'] = $args["menu"];
          $result[$count]["tag"] = $this->getTagHotelList($argsTag);


          //Get price data
          unset($this->db);
          $this->db->where('prh_hotel_id', $value->tah_hotel_id);
          $priceTour = $this->db->get('ci_pricehotel')->result();

          if(!empty($priceTour)){
            $maxAgencyPrice = 0;
            foreach ($priceTour as $key => $value) {
              # code...
              if($value->prh_sale_room_price > $maxAgencyPrice){
                $result[$count]["price"] = $value;
                $maxAgencyPrice = $value->prh_sale_room_price;
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
      $data["tah_tag_id"] = $args["tag_id"];
      $query = $this->db->get_where('ci_taghotel', $data);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());

        return $newResult;
      }else{
        return false;
      }

    }else if(!empty($args["hotel_id"]) && !empty($args["join"])){

      $this->db->where('tah_hotel_id', $args["hotel_id"]);
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_taghotel.tah_tag_id');
      $query = $this->db->get('ci_taghotel');
      $result = $query->result();

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }

    }else if(!empty($args["hotel_id"])){
      //Get category by name
      $data["tah_hotel_id"] = $args["hotel_id"];

      $query = $this->db->get_where('ci_taghotel', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(!empty($args["id"])){
      //Get category by id
      $query = $this->db->get_where('ci_taghotel', array('agt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_taghotel");

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

      $this->db->set("tah_cr_date", date("Y-m-d H:i:s"));

      $this->db->set("tah_lu_date", date("Y-m-d H:i:s"));

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
    //Get taghotel by hotel_id



    //Get tag by tagname


    if(!empty($args["tags"])){

      if($args["tags"]=="[]"){
        return ;
      }

      //print_r($args["tags"]); exit;
      $tags = str_replace('[', '', $args["tags"]);
      $tags = str_replace(']', '', $tags);
      $tags = str_replace('"', '', $tags);
      $tags = explode(",",  $tags);
      $tags = array_unique($tags);
      $this->load->model("tag_model", "tagModel");
      $tagInput = array();
      $count = 0;





      $taghotel["hotel_id"] = $args["id"];
      $query = $this->getRecord($taghotel);


      foreach ($tags as $key => $value) {
        $tag["name"] = $value;
        $tagQuery = $this->tagModel->getRecord($tag);

        if(empty($tagQuery)){
          $tag["url"] = Util::url_title($value);
          $input[$count]->id = $this->tagModel->addRecord($tag);
          $input[$count]->name = $tag["name"];
        }else{
          $input[$count] = $tagQuery[0];
        }
        $count++;
      }


      //print_r($input);
      //print_r($query); exit;

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
            //echo "Query : ".$valueQuery->tag_id;
            //echo "<br><br>";

            foreach ($input as $keyInput => $valueInput) {
                //echo "Input : ".$valueInput->id;
                //echo "<br><br>";
                if($valueQuery->tag_id == $valueInput->id){
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
            //echo "Query : ".$valueInput->id;
            //echo "<br><br>";
            foreach ($query as $keyQuery => $valueQuery) {
                //echo "Input : ".$valueQuery->tag_id;
                //echo "<br><br>";
                if($valueInput->id == $valueQuery->tag_id){
                    $insert = true;
                    //$insertData = $valueInput;
                }
            }

            //Insert
            if($insert){
                //$updateArray[$updateCount] = $insertData;
                //$updateCount++;
                $insert = false;
            }else{
                $insertArray[$insertCount] = $valueInput;
                $insertTag[$insertCount]["tag_id"] = $valueInput->id;
                $insertTag[$insertCount]["hotel_id"] = $args["id"];
                $insertCount++;
            }
        }
        //return $updateArray;


      //End check empty $query
      }else{

        foreach ($input as $keyInput => $valueInput) {
          $insertArray[$insertCount] = $valueInput;
          $insertTag[$insertCount]["tag_id"] = $valueInput->id;
          $insertTag[$insertCount]["hotel_id"] = $args["id"];
          $insertCount++;
        }

      }



      if(!empty($insertTag)){

        $this->addMultipleRecord($insertTag);
      }

      if(!empty($deleteArray)){
        /*echo "<br><br>";
        echo "Delete : ";
        echo "<br><br>";
        print_r($deleteArray);
        echo "<br><br>";
  */
        foreach ($deleteArray as $key => $value) {
          # code...
          $deleteTag["id"] = $value->id;
          $this->deleteRecord($deleteTag);
        }

      }
      //exit;
      /*
        echo "Update : ";
        echo "<br><br>";
        print_r($updateArray);
        echo "<br><br>";
      */
      //exit;
    }else if(!empty($args["hotels"])){
      //blah blah blah
    }

    return ;
  }

  function deleteRecord($args=false){
    if(!empty($args["id"])){
      $this->db->where("tah_id", $args["id"]);
      $this->db->delete("ci_taghotel");

    }else if(!empty($args["tag_id"]) && !empty($args["hotel_id"])){
      $this->db->where("tah_tag_id", $args["tag_id"]);
      $this->db->where("tah_hotel_id", $args["hotel_id"]);
      $this->db->delete("ci_taghotel");

    }else if(!empty($args["hotel_id"])){
      $this->db->where("tah_hotel_id", $args["hotel_id"]);
      $this->db->delete("ci_taghotel");

    }else if(!empty($args["tag_id"])){
      $this->db->where("tah_tag_id", $args["tag_id"]);
      $this->db->delete("ci_taghotel");

    }
  }
}
?>