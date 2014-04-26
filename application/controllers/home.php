<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
  function __construct(){
    parent::__construct();
  }

  function index(){

    $this->user_list();
  }

  function user_list(){

    $this->load->model("type_model", "typeModel");
    $this->load->model("price_model", "priceModel");
    $this->load->model("tagtype_model", "tagTypeModel");
    $this->load->model("tagtour_model", "tagTourModel");
    $this->load->model("article_model","articleModel");

    $this->_assign("main_menu",Menu::main_menu());
    //Assign Province
    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);

    $where["where"]["tag_id"] = 0;
    $where["where"]["type"] = 0;
    $where["where"]["lang"] = $this->lang->lang();
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    $articleResult[0]["body_column"] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $articleResult[0]["body"]));
    $this->_assign("article",$articleResult[0]);


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

    








  $this->load->model("type_model", "typeModel");
  $provincename["where"]["typ_name"] ='province';
  $resultname=$this->typeModel->get($provincename);

  $this->load->model("tagtype_model", "tagTypeModel");
  $provincetagtype["where"]["type_id"] =$resultname[0]['id'];
  $provincetagtype["where"]["lang"] =$this->lang->lang();
  $resulttagtypes=$this->tagTypeModel->get($provincetagtype);


  foreach ($promotedTour as $key => $promot) {
    $tourtag["where"]["tour_id"] = $promot['tour_id'];
    $tourtag["where"]["tagt_lang"] = $this->lang->lang();
    $promotedTour[$key]["tags"] = $this->tagTourModel->get($tourtag);

    foreach ($resulttagtypes as $key2 => $tagtype) {
      if(!empty($promotedTour[$key]["province"])){
        break;
      }

      foreach ($promotedTour[$key]["tags"] as $key3 => $tours) {
        if($tagtype['tag_id'] == $tours['tag_id']){
          $promotedTour[$key]["province"] = $tours['tagt_name'];
          break;
        }
      }
    }
  }
  $this->_assign("promotedTour",$promotedTour);
    $this->_fetch('user_list');
  }

  function admin_list(){
    $this->_fetch('admin_list');
  }
}
?>