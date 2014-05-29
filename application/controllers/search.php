<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

  function __construct(){
    parent::__construct();
  }

  function _search($keyword = NULL){
    if(empty($keyword)){
      return FALSE;
    }




    $this->load->model("tag_model", "tagModel");
    $this->load->model("price_model", "priceModel");
    //Query tag_name by tag_url
    $tag["like"]["name"] = $keyword;
    $tagQuery = $this->tagModel->get($tag);
    unset($tag);
    if(empty($tagQuery)){
      $data["tour"] = NULL;
      return $data;
    }

    //Search from name
    //$whereName["like"]["name"] = $keyword;
    //s$data["tour"] = $this->tagTourModel->getTagTourList($whereName);

    foreach ($tagQuery as $key => $value) {
      $query["where_in"]["tag_id"][] = $value["tag_id"];

      $data["keywordList"][] = $value["name"];
    }
    
    $query["join_tour"] = true;
    $query["like"]["tout_name"] = $keyword; //ใช้ or_like อย่างเดียวไม่ได้ เลยต้องใส่ like ไปด้วย
    $query["or_like"]["tout_name"] = $keyword;
    $query["group"] = "tour_id";
    $query["where"]["tout_lang"] = $this->lang->lang();

    $this->load->model("tagtour_model", "tagTourModel");
    $data["tour"] = $this->tagTourModel->getTagTourList($query);

    //Price
    if (!empty($data["tour"])) {
      foreach ($data["tour"] as $key => $value) {
        $priceWhere["where"]["tour_id"] = $value["tour_id"];
        $priceWhere["where"]["lang"] = $this->lang->lang();
        $priceWhere["order"] = "id ASC";
        $priceQuery = $this->priceModel->get($priceWhere);
        $data["tour"][$key]["firstpage_price"] = 0;
        $data["tour"][$key]["selected_price"] = 0;
        if(!empty($priceQuery)){
          foreach ($priceQuery as $keyPrice => $valuePrice) {
            if($valuePrice["show_firstpage"] == 1){
              $data["tour"][$key]["firstpage_price"] = 1;
              $data["tour"][$key]["selected_price"] = $valuePrice;
            }
            //new
            $data["tour"][$key]["keyword"] = $keyword;
            //end
            $data["tour"][$key]["price"][] = $valuePrice;
          }
        }
      }
    }
    //End price

    return $data;
  }

  function user_index($keyword = NULL){


    if(empty($keyword)){
      $keyword = $this->input->get("keyword");
      if(empty($keyword)){
        show_404();
      }
      redirect(base_url("search/".$keyword), 'location', 301);
    }


     $this->_assign("main_menu",Menu::main_menu());
         // new 14/5/2557  เมนูแบบหน้าแรก
    $this->load->model('price_model',"priceModel");
    $this->load->model('tagtour_model','tagTourModel');
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");
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
    // Generating where for query tag_id from tagtypemodel for query banner (tour).
    //
    // ------------------------------------------------------------------
    foreach ($bannerType as $typeKey => $typeValue) {
      $tagIDForBannerWhere[] = $typeValue["id"];
    }
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

    $whereTag["where_in"]["tag_id"] = $conditions;
    $whereTag["order"] = "tour_id DESC";
    $whereTag["group"] = "tour_id";
    $whereTag["where"]["tout_lang"] = $this->lang->lang();
    $whereTag["join_tour"] = true;
    $promotedTour = $this->tagTourModel->get($whereTag);
    unset($whereTag);
    unset($conditions);

    if(!empty($promotedTour)){
      foreach ($promotedTour as $promotedTourKey => $promotedTourValue) {
        $priceTour = $this->priceModel->get(array("where"=>array("tour_id"=>$promotedTourValue["tour_id"])));
        //$priceTour = $this->priceModel->get(array("where"=>array("tour_id"=>"72")));
        if(!empty($priceTour)){
          //Min price
          $minSalePrice = 9999999;
          foreach ($priceTour as $priceTourKey => $priceTourValue) {
            if($priceTourValue["show_firstpage"] == 1){
              $minSalePrice = $priceTourValue["sale_adult_price"];
              $promotedTour[$promotedTourKey]["price"] = $priceTourValue;
              break;
            }else{
              if($priceTourValue["sale_adult_price"] < $minSalePrice){
                $promotedTour[$promotedTourKey]["price"] = $priceTourValue;
                $minSalePrice = $priceTourValue["sale_adult_price"];
              }
            }
          }
        }
      }
    }
  $this->_assign("promotedTour",$promotedTour);


//end











    $result = $this->_search($keyword);
    $this->_assign("currentKeyword",$keyword);
    if(empty($result["tour"])){
      $main_keyword = Util::keywordProduce();
    }else{
      PageUtil::addVar("title",$this->lang->line("search_lang_search_tour")." $keyword - ".str_replace(array("http://","/"), "", $this->config->item("base_url")));
      $main_keyword = Util::keywordProduce($result["keywordList"]);
    }
    PageUtil::addVar("keywords",$main_keyword);
    $this->_fetch("user_index",$result);
  }
}

?>