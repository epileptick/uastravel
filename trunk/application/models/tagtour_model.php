<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagTour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tat";
    $this->_column = array(
                     'id'                => 'tat_id',
                     'tag_id'            => 'tat_tag_id',
                     'tour_id'           => 'tat_tour_id',
                     'cr_date'           => 'tat_cr_date',
                     'cr_uid'            => 'tat_cr_uid',
                     'lu_date'           => 'tat_lu_date',
                     'lu_uid'            => 'tat_lu_uid' 
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

     //Get distinct tour_id from ci_tagtour
      $this->db->select('tat_tour_id');
      $this->db->distinct("tat_tour_id");
      $this->db->where_in('tat_tag_id', $args["menu"]);
      //$this->db->where('tat_tag_id', $args["tag_id"]);  
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');         
      $this->db->order_by('tat_tour_id DESC');  
      if($args["per_page"] > -1 && $args["offset"] > -1){
        $this->db->limit($args["per_page"], $args["offset"]);
      }
      $tour = $this->db->get('ci_tagtour')->result(); 


      //print_r($tour); exit;
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
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_in('tat_tag_id', $args["menu"]);
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
      }
      //print_r($result); exit;

      if(!empty($result)){
        return $result;
      }else{
        return false;
      }
  }


  function getRecordByTag($args=false){
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
        unset($this->db);
        $this->db->where('tat_tour_id', $value->tat_tour_id);
        $this->db->where_in('tat_tag_id', $args["menu"]);
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
    }
    //print_r($result); exit;

    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }


  function getRecordByType($args=false){

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
            ORDER BY tat_tour_id DESC 
            LIMIT $args[offset], $args[per_page]
            ";

    $tour = $this->db->query($sql)->result();

    //print_r($tour); exit;
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
        unset($this->db);
        $this->db->where('tat_tour_id', $value->tat_tour_id);
        $this->db->where_in('tat_tag_id', $args["menu"]);
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
      $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
      $this->db->where('tou_lang', $this->lang->lang());
      $this->db->where('tou_display', 1);
      $this->db->where('tou_id', $value->tat_tour_id);
      $query = $this->db->get('ci_tour');
      $tourBuffer = $query->result(); 


      if(!empty($tourBuffer)){

        $result[$count]["tour"] = $tourBuffer[0];

        //Get tag data
        unset($this->db);
        $this->db->where('tat_tour_id', $value->tat_tour_id);
        $this->db->where_in('tat_tag_id', $args["menu"]);
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
    }
    //print_r($result); exit;

    if(!empty($result)){
      return $result;
    }else{
      return false;
    }
  }
  

  function getRecordHome($args=false){

    //First tour 
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
    foreach ($tag as $key => $value) {

      if($args["tag_id"]){
        $sql = "SELECT `tat_tour_id` 
                FROM (`ci_tagtour`) 
                WHERE tat_tag_id = 1 
                AND tat_tour_id IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = $value->tag_id)) 
                AND tat_tour_id IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = $args[tag_id]))  
                ORDER BY tat_tour_id DESC 
                LIMIT $args[offset], $args[per_page]
                ";
      }else{

        $sql = "SELECT `tat_tour_id` 
                FROM (`ci_tagtour`) 
                WHERE tat_tag_id = 1 
                AND tat_tour_id IN((SELECT tat_tour_id FROM ci_tagtour WHERE tat_tag_id = $value->tag_id)) 
                ORDER BY tat_tour_id DESC 
                LIMIT $args[offset], $args[per_page]
                ";
      }

      $tourByTagTemp = $this->db->query($sql)->result();


      //print_r($tourByTagTemp); exit;


      if(!empty($tourByTagTemp)){
        $tourByTag[$count]["tour"] = $tourByTagTemp;
        $tourByTag[$count]["maintag_name"] = $value->tag_name;
        $tourByTag[$count]["maintag_url"] = $value->tag_url;
        $count++;
      }
    }

    //print_r($tourByTag); exit;
    //Merge array

    if(empty($tourByTag)){
      return false;    
    }
    $firsttour = array();
    $count = 0;
    foreach ($tourByTag as $key => $valueFirst) {
      foreach ($valueFirst["tour"] as $key => $valueLast) {
        $firsttour[$count] = new stdClass();
        $firsttour[$count]->tat_tour_id = $valueLast->tat_tour_id;
        $firsttour[$count]->maintag_name = $valueFirst["maintag_name"];
        $firsttour[$count]->maintag_url = $valueFirst["maintag_url"];
        $count++;
      }
    }
    //print_r($firsttour); exit;

    $count = 0;
    foreach ($firsttour as $key => $value) {

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
        $result[$count]["tour"]->maintag_name = $value->maintag_name;
        $result[$count]["tour"]->maintag_url = $value->maintag_url;


        //Get tag data
        unset($this->db);
        $this->db->where('tat_tour_id', $value->tat_tour_id);
        $this->db->where_in('tat_tag_id', $args["menu"]);
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
    }

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
        $args["name"] = $value->name;
        $typeQuery["tag"] = $this->typeModel->getRecord($args);

        if(!empty($typeQuery["tag"])){
          $query["type"] = $typeQuery["tag"];
          $query["type"][0]->tag_id = $value->id;
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
        $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
        $this->db->where('tou_lang', $this->lang->lang());
        $this->db->where('tou_display', 1);
        $this->db->where('tou_id', $value->tat_tour_id);
        $query = $this->db->get('ci_tour');
        $tourBuffer = $query->result(); 

        if(!empty($tourBuffer)){
          $result[$count]["tour"] = $tourBuffer[0];

          //Get tag data
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_in('tat_tag_id', $args["menu"]);
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

      //Get tour data
      unset($this->db);
      $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
      $this->db->where('tou_lang', $this->lang->lang());
      $this->db->where('tou_display', 1);
      $this->db->where('tou_id', $value->tat_tour_id);
      $tourBuffer = $this->db->get('ci_tour')->result();

      if(!empty($tourBuffer)){

        $result[$count]["tour"] = $tourBuffer[0];


        //Get tag data
        unset($this->db);
        $this->db->where('tat_tour_id', $value->tat_tour_id);
        $this->db->where_in('tat_tag_id', $args["menu"]);
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
            $this->db->select('tou_id, tou_name, tou_code, tou_url, tou_first_image, tou_banner_image');
            $this->db->where('tou_lang', $this->lang->lang());
            $this->db->where('tou_display', 1);
            $this->db->where('tou_id', $value->tat_tour_id);
            $query = $this->db->get('ci_tour');
            $tourBuffer = $query->result(); 



            if(!empty($tourBuffer)){            
              $result[$count]["tour"] = $tourBuffer[0];


              //Get tag data
              unset($this->db);
              $this->db->where('tat_tour_id', $value->tat_tour_id);
              $this->db->where_in('tat_tag_id', $args["menu"]);
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
                  if($value->agt_sale_adult_price > $maxAgencyPrice){
                    $result[$count]["price"] = $value;
                    $maxAgencyPrice = $value->pri_sale_adult_price;
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
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_in('tat_tag_id', $args["menu"]);
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
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_in('tat_tag_id', $args["menu"]);
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
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_in('tat_tag_id', $args["menu"]);
          $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
          $result[$count]["tag"]  = $this->db->get('ci_tagtour')->result();

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
          unset($this->db);
          $this->db->where('tat_tour_id', $value->tat_tour_id);
          $this->db->where_in('tat_tag_id', $args["menu"]);
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
    //Get tagtour by tour_id



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





      $tagtour["tour_id"] = $args["id"];
      $query = $this->getRecord($tagtour);


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
                $insertTag[$insertCount]["tour_id"] = $args["id"];
                $insertCount++; 
            }     
        }
        //return $updateArray;


      //End check empty $query
      }else{ 

        foreach ($input as $keyInput => $valueInput) {
          $insertArray[$insertCount] = $valueInput;
          $insertTag[$insertCount]["tag_id"] = $valueInput->id;
          $insertTag[$insertCount]["tour_id"] = $args["id"];
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
    }else if(!empty($args["tours"])){
      //blah blah blah
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