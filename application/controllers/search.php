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
    $result = $this->_search($keyword);
    $this->_assign("currentKeyword",$keyword);
    if(empty($result["tour"])){
      $main_keyword = Util::keywordProduce();
    }else{
      PageUtil::addVar("title",$this->lang->line("search_lang_search_tour")." $keyword - ".str_replace(array("http://","/"), "", $this->config->item("base_url")));
      $main_keyword = Util::keywordProduce($result["keywordList"]);
    }
    PageUtil::addVar("keywords",$main_keyword);
    $this->_fetch("user_index",$result, false, true);
  }
}

?>