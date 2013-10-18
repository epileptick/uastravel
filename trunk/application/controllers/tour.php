<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {

  var $per_page = 20;

  function __construct(){
    parent::__construct();
  }

  function user_index(){

    //Default function for call read method
    if($this->uri->segment(1) == $this->lang->line("url_lang_tour")){
      $index = 1;
      //echo $index;
    }else if($this->uri->segment(2) == $this->lang->line("url_lang_tour")){
      $index = 2;
      //echo $index;
    }

    ///////////////////////////
    // Check segment
    ///////////////////////////
    if(is_numeric($this->uri->segment($index+4))){
      ////////////////////////////
      // subtype/page
      // algorithm : http://www/tour/2/3/4/5
      // algorithm : http://www/tour/tag/type/subtype/page
      // sample : http://uastravel.com/tour/halfday/phuket/boat/10
      ////////////////////////////
      $page = $this->uri->segment($index+4);//5;
      $tag = $this->uri->segment($index+1);//2
      $type = $this->uri->segment($index+2);//3;
      $subtype = $this->uri->segment($index+3);//4;
      //echo "subtype/".$subtype;

      $this->user_listbysubtype($tag, $type, $subtype, $page);

    }else if(is_numeric($this->uri->segment($index+3))){
      ////////////////////////////
      // type/page
      // algorithm : http://www/tour/2/3/4
      // algorithm : http://www/tour/tag/type/page
      // sample : http://uastravel.com/tour/halfday/phuket/10
      ////////////////////////////
      $page = $this->uri->segment($index+3);//4;
      $tag = $this->uri->segment($index+1);//2
      $type = $this->uri->segment($index+2);//3;
      $subtype = 0;

      $this->user_listbytype($tag, $type, $page);

    }else if($this->uri->segment($index+3)){
      ////////////////////////////
      // subtype
      // algorithm : http://www/tour/2/3/4
      // algorithm : http://www/tour/tag/type/subtype
      // sample : http://uastravel.com/tour/halfday/phuket/boat
      ////////////////////////////
      $page = 0;
      $tag = $this->uri->segment($index+1);//2
      $type = $this->uri->segment($index+2);//3;
      $subtype = $this->uri->segment($index+3);//4;

      $this->user_listbysubtype($tag, $type, $subtype, $page);

      //echo "subtype";
    }else if($this->uri->segment($index+1) == "inquiry"){
      ////////////////////////////
      // tag
      // algorithm : http://www/tour/inquiry
      // post: id
      ////////////////////////////

      //Get argument from post page
      $args = $this->input->post();

      //print_r($args); exit;
      if(!empty($args['id'])){
        $this->user_inquiry($args);
      }else{
        $id = $this->uri->segment($index+2);
        $this->user_inquiry($id);
      }

    }else if($this->uri->segment($index+1) == "booking"){
      ////////////////////////////
      // tag
      // algorithm : http://www/tour/booking
      // post: id
      ////////////////////////////

      //Get argument from post page

      $segment_id = $this->uri->segment($index+2);

      if($segment_id){
        $this->user_bookingview($segment_id);
      }else{
        $args = $this->input->post();
        $this->user_booking($args);
      }

    }else if(is_numeric($this->uri->segment($index+2))){
      ////////////////////////////
      // tage/page
      // algorithm : http://www/tour/2/3
      // algorithm : http://www/tour/tag/page
      // sample : http://uastravel.com/tour/halfday/10
      ////////////////////////////
      $page = $this->uri->segment($index+2);//3;
      $tag = $this->uri->segment($index+1);//2
      $type =  0;
      $subtype = 0;
      //echo "tag/".$page;

      $this->user_listbytag($tag, $page);

    }else if($this->uri->segment($index+2)){
      ////////////////////////////
      // type
      // algorithm : http://www/tour/2/3
      // algorithm : http://www/tour/tag/type
      // sample : http://uastravel.com/tour/halfday/phuket
      ////////////////////////////
      $page = 0;
      $tag = $this->uri->segment($index+1);//2
      $type = $this->uri->segment($index+2);//3
      $subtype = 0;
      //echo "type";

      $this->user_listbytype($tag, $type, $page);


    }else if(is_numeric($this->uri->segment($index+1))){
      ////////////////////////////
      // tour/page
      // algorithm : http://www/tour/2
      // algorithm : http://www/tour/tag/page
      // sample : http://uastravel.com/tour/10
      ////////////////////////////
      $page = $this->uri->segment($index+1); //2
      $tag = 0;
      $type = 0;
      $subtype = 0;
      //echo "tour/".$page;

      $this->user_list($page);

    }else if($this->uri->segment($index+1)){
      ////////////////////////////
      // tag
      // algorithm : http://www/tour/2
      // algorithm : http://www/tour/tag
      // sample : http://uastravel.com/tour/halfday
      ////////////////////////////
      $page = 0;
      $tag = $this->uri->segment($index+1); //2
      $type = 0;
      $subtype = 0;
      //$call = "tag";

      $this->user_listbytag($tag, $page);

    }else{
      ////////////////////////////
      // tour
      // algorithm : http://www/tour
      // algorithm : http://www/tour
      // sample : http://uastravel.com/tour
      ////////////////////////////
      $page = 0;
      $tag = 0;
      $cat = 0;
      $subcat = 0;
      //echo "tour";

      $this->user_list($page);
    }
  }

  function user_test(){
      $this->_fetch('user_test', "", false, true);
  }

  function _tour_menu($argTag=false, $argType=false, $argSubType=false){

    if($argTag){
      //tour & tag
      //Query tag_name by tag_url
      $tag["url"] = $argTag;
      $this->load->model("tag_model", "tagModel");
      $tagQuery = $this->tagModel->get($tag);
      unset($tag);


      //Query tag not in database
      $empty = false;
      if(!empty($tag)){
        //Query type_id by tag_name
        $tag["name"] = $tagQuery[0]->name;
        $this->load->model("type_model", "typeModel");
        $typeQuery = $this->typeModel->getRecord($tag);
        //print_r($typeQuery); exit;

        if(!empty($typeQuery)){
          //Query tagtype by type_id
          $type["type_id"] = $typeQuery[0]->id;
          $this->load->model("tagtype_model", "tagtypeModel");
          $menuQuery = $this->tagtypeModel->getRecord($type);
          //print_r($menuQuery); exit;

          //Query type_id by parent_id
          $parent["parent_id"] = $type["type_id"];
          $this->load->model("type_model", "typeModel");
          $parenttypeQuery = $this->typeModel->getRecord($parent);
          //print_r($parenttypeQuery); exit;

          //Query tagname by type_id (Submenu)
          $type["type_id"] = $parenttypeQuery[0]->id;
          $this->load->model("tagtype_model", "tagtypeModel");
          $subMenuQuery = $this->tagtypeModel->getRecord($type);
          //print_r($subMenuQuery); exit;

        }else{
          $empty = true;
        }
      }else{
        $empty = true;
      }

    }else{
       $empty = true;
    }


  //Not type & tag & argTag
  if($empty){
    //Query tagtype by type_id
    $type["where"]["type_id"] = 4;
    $this->load->model("tagtype_model", "tagtypeModel");
    $menuQuery = $this->tagtypeModel->getTagTypeList($type);
    //var_dump($menuQuery); exit;

    //Query type_id by parent_id
    $parent["parent_id"] = $type["where"]["type_id"];
    $this->load->model("type_model", "typeModel");
    $parenttypeQuery = $this->typeModel->getRecord($parent);
    //print_r($parenttypeQuery); exit;

    //Query tagname by type_id (Submenu)
    if(!empty($parenttypeQuery[0]->id)){
      $type["where"]["type_id"] = $parenttypeQuery[0]->id;
    }

    $this->load->model("tagtype_model", "tagtypeModel");
    $subMenuQuery = $this->tagtypeModel->getTagTypeList($type);
    //print_r($subMenuQuery); exit;
  }

    //Query tagname by type_id (Menu)
    $count = 0;
    $menu_select_all = true;
    foreach ($menuQuery as $key => $value) {
      //Menu Tag
      $return["menu"][$count] = new stdClass();
      $return["menu"][$count]->tag_id = $value["tag_id"];
      $return["menu"][$count]->name = $value["name"];
      $return["menu"][$count]->url = $value["url"];

      //Select element
      if($argType && $argType == $value["url"]){
        $return["menu"][$count]->select = 1;
        $menu_select_all = false;
      }else{
        $return["menu"][$count]->select = 0;
      }

      $count++;
    }
    $return["menu_selectall"] = $menu_select_all;

    if(!empty($subMenuQuery)){
      $count = 0;
      $submenu_select_all = true;
      foreach ($subMenuQuery as $key => $value) {
    $return["submenu"][$count] = new stdClass();
        $return["submenu"][$count]->tag_id = $value["tag_id"];
        $return["submenu"][$count]->name = $value["name"];
        $return["submenu"][$count]->url = $value["url"];

        //Select element
        if($argType && $argType == $value["url"]){
          $return["submenu"][$count]->select = 1;
          $submenu_select_all = false;
        }else if($argSubType && $argSubType == $value["url"]){
          $return["submenu"][$count]->select = 1;
          $submenu_select_all = false;
        }else{
          $return["submenu"][$count]->select = 0;
        }
        $count++;
      }
      $return["submenu_selectall"] = $submenu_select_all;
    }


    //print_r($return); exit;
    return $return;

  }


  function _shuffle_assoc($list) {
    if (!is_array($list)) return $list;

    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key) {
      $random[] = $list[$key];
    }
    return $random;
  }

  function _tour_list($tags){

    $count = 0;
    $this->load->model("tagtour_model", "tagTourModel");
    $tour = $this->tagTourModel->getRecord($tags);

    //print_r($this->_shuffle_assoc($tour)); exit;

    if(!empty($tour)){
      return $this->_shuffle_assoc($tour);
    }else{
      return ;
    }
  }

  function user_list($page=0){
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");

    $data = $this->_tour_menu();
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $this->load->model("article_model","articleModel");
    $where["where"]["tag_id"] = 0;
    $where["where"]["province_id"] = 0;
    $where["where"]["display"] = 1;
    $where["where"]["type"] = 2;
    $where["where"]["lang"] = $this->lang->lang();
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    if(!empty($articleResult)){
      $articleResult[0]["body_column"] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $articleResult[0]["body"]));
    }
    $this->_assign("article",$articleResult[0]);
    unset($where);

    //Add Keyword
    $main_keyword = Util::keywordProduce(array());
    PageUtil::addVar("keywords",$main_keyword);

    //Add Description
    if(!empty($articleResult[0]["body_column"][0])){
      $max_length = 160;
      $description_length = mb_strlen(strip_tags($articleResult[0]["body_column"][0]), 'UTF-8');
        $readmore_length = mb_strlen($this->lang->line("global_lang_readmore_description"), 'UTF-8');
        $total_lenght = (($readmore_length + 5)+$description_length);
        if($total_lenght > $max_length){
          $description = (mb_substr(strip_tags($articleResult[0]["body_column"][0]),0,($max_length-($readmore_length+4))))."... ".$this->lang->line("global_lang_readmore_description");
        }else{
          $description = strip_tags($articleResult[0]["body_column"][0])." ".$this->lang->line("global_lang_readmore_description");
        }
    }else{
      $description = $this->lang->line("global_lang_home_desc");
    }
    PageUtil::addVar("description",$description);

    if(!empty($articleResult[0]["id"])){
      $this->load->model("images_model","imagesModel");
      $where["where"]["parent_id"] = $articleResult[0]["id"];
      $where["where"]["table_id"] = 4;
      $imagesResult = $this->imagesModel->get($where);
      $this->_assign("images",$imagesResult);
    }

    //Filter all
    $query["tag_id"] = $query["menu"];
    $query["join"] = true;
    $query["in"] = true;

    //Get tour
    $this->load->model("tagtour_model", "tagTourModel");
    $tour = $this->tagTourModel->getRecordFirstpage($query);
    $this->_assign("tour",$tour);

    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);
    $this->_assign("main_menu",Menu::main_menu());


    $data["caconical"] = base_url($this->lang->line("url_lang_tour"));

    if(!empty($data)){
      $this->_fetch('user_list', $data, false, true);
    }

  }

  function user_listbytag($tag=false, $page=0){

    //echo "Call user_listbytag()"; exit;
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");

    //Check menu is active
    if(empty($tag)){
      $data= $this->_tour_menu();
    }else{
      $data= $this->_tour_menu($tag);
    }
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $this->_assign("currentTag",$tag);

    //Assign Province
    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);
    $this->_assign("main_menu",Menu::main_menu());

    $argTag["url"] = $tag;
    $this->load->model("tag_model", "tagModel");
    $tagQuery = $this->tagModel->get($argTag);

    if(!empty($tagQuery)){
      $query["tag_id"] = $tagQuery[0]["id"];
      $query["join"] = true;

      $this->load->model("tagtour_model", "tagTourModel");
      $data["tour"] = $this->tagTourModel->getRecordByTag($query);
    }else{
      $data["tour"] = false;
    }

    $this->load->model("article_model","articleModel");
    $where["where"]["province_id"] = $tagQuery[0]["id"];
    $where["where"]["tag_id"] = 0;
    $where["where"]["display"] = 1;
    $where["where"]["type"] = 2;
    $where["where"]["lang"] = $this->lang->lang();
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    unset($where);
    if(empty($articleResult)){
      $where["where"]["tag_id"] = 0;
      $where["where"]["province_id"] = 0;
      $where["where"]["display"] = 1;
      $where["where"]["type"] = 2;
      $where["where"]["lang"] = $this->lang->lang();
      $where["limit"] = 1 ;
      $articleResult = $this->articleModel->get($where);
    }

    $articleResult[0]["body_column"] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $articleResult[0]["body"]));
    $this->_assign("article",$articleResult[0]);
    unset($where);

    //Add Keyword
    $main_keyword = $tagQuery[0]["name"];
    $main_keyword = Util::keywordProduce(array(0=>$main_keyword));
    PageUtil::addVar("keywords",$main_keyword);

    //Add Description
    if(!empty($articleResult[0]["body_column"][0])){
      $max_length = 160;
      $description_length = mb_strlen(strip_tags($articleResult[0]["body_column"][0]), 'UTF-8');
        $readmore_length = mb_strlen($this->lang->line("global_lang_readmore_description"), 'UTF-8');
        $total_lenght = (($readmore_length + 5)+$description_length);
        if($total_lenght > $max_length){
          $description = (mb_substr(strip_tags($articleResult[0]["body_column"][0]),0,($max_length-($readmore_length+4))))."... ".$this->lang->line("global_lang_readmore_description");
        }else{
          $description = strip_tags($articleResult[0]["body_column"][0])." ".$this->lang->line("global_lang_readmore_description");
        }
    }else{
      $description = $this->lang->line("global_lang_home_desc");
    }
    PageUtil::addVar("description",$description);


    if(!empty($articleResult[0]["id"])){
      $this->load->model("images_model","imagesModel");
      $where["where"]["parent_id"] = $articleResult[0]["id"];
      $where["where"]["table_id"] = 4;
      $imagesResult = $this->imagesModel->get($where);
      $this->_assign("images",$imagesResult);
    }
    unset($where);

    $data["caconical"] = base_url($this->lang->line("url_lang_tour")."/".trim($tag));

    if(!empty($data)){
      if($this->input->get("ajax")){
        $ajaxReturn["imagesRedered"] = $this->_fetch("ajax_article_images", $data, TRUE, TRUE);
        $ajaxReturn["bodyRedered"] = $this->_fetch("ajax_article_body", $data, TRUE, TRUE);
        //$ajaxReturn["tourList"] = $this->_fetch("ajax_tour_list", $data, TRUE, TRUE);
        $articleResult[0]["name"] = $articleResult[0]["title"];
        $ajaxReturn["data"] = $articleResult[0];

        echo json_encode($ajaxReturn);exit;
      }else{
        $this->_fetch('user_list', $data, false, true);
      }
    }

  }

  function user_listbytype($tag=false, $type=false, $page=0){
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");
    $data = $this->_tour_menu($tag, $type);

    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    //Assign Province
    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);
    $this->_assign("main_menu",Menu::main_menu());

    $this->load->model("tag_model", "tagModel");

    $argTag["url"] = $tag;
    $tagQuery = $this->tagModel->get($argTag);
    $argType["url"] = $type;
    $typeQuery = $this->tagModel->get($argType);

    if(!empty($tagQuery)  && !empty($typeQuery)){
      $query["tag_id"] = $tagQuery[0]["id"];
      $query["type_id"] = $typeQuery[0]["id"];
      $query["join"] = true;
      //Tour
      $this->load->model("tagtour_model", "tagTourModel");
      $data["tour"] = $this->tagTourModel->getRecordByType($query);
    }else{
      $data["tour"] = false;
    }



    $this->load->model("article_model","articleModel");
    $where["where"]["tag_id"] = $tagQuery[0]["id"];
    $where["where"]["province_id"] = $typeQuery[0]["id"];
    $where["where"]["display"] = 1;
    $where["where"]["type"] = 2;
    $where["where"]["lang"] = $this->lang->lang();
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    unset($where);
    if(empty($articleResult)){
      $where["where"]["tag_id"] = 0;
      $where["where"]["province_id"] = $typeQuery[0]["id"];
      $where["where"]["display"] = 1;
      $where["where"]["type"] = 2;
      $where["where"]["lang"] = $this->lang->lang();
      $where["limit"] = 1 ;
      $articleResult = $this->articleModel->get($where);
      
      if(empty($articleResult)){
        $where["where"]["tag_id"] = 0;
        $where["where"]["province_id"] = 0;
        $where["where"]["display"] = 1;
        $where["where"]["type"] = 2;
        $where["where"]["lang"] = $this->lang->lang();
        $where["limit"] = 1 ;
        $articleResult = $this->articleModel->get($where);
      }
    }
    $articleResult[0]["body_column"] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $articleResult[0]["body"]));
    $this->_assign("article",$articleResult[0]);
    unset($where);

    //Add Keyword
    $main_keyword = $tagQuery[0]["name"].$typeQuery[0]["name"];
    $main_keyword = Util::keywordProduce(array(0=>$main_keyword));
    PageUtil::addVar("keywords",$main_keyword);

    //Add Description
    if(!empty($articleResult[0]["body_column"][0])){
      $max_length = 160;
      $description_length = mb_strlen(strip_tags($articleResult[0]["body_column"][0]), 'UTF-8');
        $readmore_length = mb_strlen($this->lang->line("global_lang_readmore_description"), 'UTF-8');
        $total_lenght = (($readmore_length + 5)+$description_length);
        if($total_lenght > $max_length){
          $description = (mb_substr(strip_tags($articleResult[0]["body_column"][0]),0,($max_length-($readmore_length+4))))."... ".$this->lang->line("global_lang_readmore_description");
        }else{
          $description = strip_tags($articleResult[0]["body_column"][0])." ".$this->lang->line("global_lang_readmore_description");
        }
    }else{
      $description = $this->lang->line("global_lang_home_desc");
    }
    PageUtil::addVar("description",$description);


    if(!empty($articleResult[0]["id"])){
      $this->load->model("images_model","imagesModel");
      $where["where"]["parent_id"] = $articleResult[0]["id"];
      $where["where"]["table_id"] = 4;
      $imagesResult = $this->imagesModel->get($where);
      $this->_assign("images",$imagesResult);
    }

    $data["caconical"] = base_url($this->lang->line("url_lang_tour")."/".trim($tag)."/".trim($type));

    if(!empty($data)){
      if($this->input->get("ajax")){
        $ajaxReturn["imagesRedered"] = $this->_fetch("ajax_article_images", $data, TRUE, TRUE);
        $ajaxReturn["bodyRedered"] = $this->_fetch("ajax_article_body", $data, TRUE, TRUE);
        $ajaxReturn["tourList"] = $this->_fetch("ajax_tour_list", $data, TRUE, TRUE);
        $articleResult[0]["name"] = $articleResult[0]["title"];
        $ajaxReturn["data"] = $articleResult[0];

        echo json_encode($ajaxReturn);exit;
      }else{
        $this->_fetch('user_list', $data, false, true);
      }
    }else{
      show_404();
    }
  }


  function user_listbysubtype($tag=false, $type=false, $subtype=false, $page=0){


    //echo "Call user_listbytype()"; exit;

    $data = $this->_tour_menu($tag, $type, $subtype);

    //print_r($data); exit;
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $this->_assign("main_menu",Menu::main_menu());

    $this->load->model("tag_model", "tagModel");

    $argTag["url"] = $tag;
    $tagQuery = $this->tagModel->get($argTag);

    $argType["url"] = $type;
    $typeQuery = $this->tagModel->get($argType);

    $argSubType["url"] = $subtype;
    $subTypeQuery = $this->tagModel->get($argSubType);

    if(!empty($tagQuery) && !empty($typeQuery) && !empty($subTypeQuery) ){

      $query["tag_id"] = $tagQuery[0]["id"];
      $query["type_id"] = $typeQuery[0]["id"];
      $query["subtype_id"] = $subTypeQuery[0]["id"];

      $query["join"] = true;
      $query["per_page"] = $this->per_page;
      $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;
      //Tour
      $this->load->model("tagtour_model", "tagTourModel");
      $data["tour"] = $this->tagTourModel->getRecordBySubType($query);
    }else{
      $data["tour"] = false;
    }

    $data["caconical"] = base_url($this->lang->line("url_lang_tour")."/".trim($tag)."/".trim($type)."/".trim($subtype));

    if($this->input->get("ajax")){
      $data = "listbysubtypeAjax:".$tag;
      echo $data;
      exit;
    }

    if(!empty($query["offset"])){
      if($query["offset"]>0){
        $this->_fetch('user_listnextpage', $data, false, true);
      }else{
        //print_r($data);
        $this->_fetch('user_list', $data, false, true);
      }
    }else{
      $this->_fetch('user_list', $data, false, true);
    }
  }

  function user_search(){

    $keyword = $this->input->post();


    $data = $this->_tour_menu();
    if(!empty($keyword["search"])){

      foreach ($data["menu"] as $key => $valueTag) {
        $query["menu"][] = $valueTag->tag_id;
      }

      $data["main_menu"]= Menu::main_menu();

      $query["tou_name"] = $keyword["search"];
      $query["user_search"] = true;

      $data["tour"] = $this->tourModel->searchRecord($query);
      $data["search"] = $keyword["search"];

      $this->_fetch('user_list', $data, false, true);

    }else{
      $this->_fetch('user_list', $data, false, true);
    }
  }


  function user_view($id=false){
    if($id){
      $this->load->model("type_model", "typeModel");
      $this->load->model("tagtype_model", "tagTypeModel");

      //Tour
      $tour["where"]["tour_id"] = $id;
      $tour["where"]["lang"] = $this->lang->lang();
      $tagtour["where"]["tour_id"] = $id;
      $agencytour["tour_id"] = $id;
      $agencytour["event"] = "display";
      $extendprice["pri_tour_id"] = $id;
      $data["tour"] = $this->tourModel->get($tour);

      //Check has tour
      if(count($data["tour"]) < 1  || empty($data["tour"])){
        show_404();
      }

      //Update View
      $updateView["id"] = $data["tour"][0]["id"];
      $updateView["view"] = $data["tour"][0]["view"]+1;

      //Tag
      $this->load->model("tagtour_model", "tagTourModel");
      $data["tag"] = $this->tagTourModel->getTagTourList($tagtour);

      if(!empty($data["tag"])){
        //TagTour
        $count = 0;
        foreach ($data["tag"] as $key => $value) {
          $query["menu"][] = $value["tag_id"];
        }

        //Related Tour
        $query["tour_id"] = $id;
        $query["tag_id"] = $query["menu"];
        $query["tour_tag"] = $data["tag"];
        $query["mainper_page"] = 3;
        $query["per_page"] = 5;
        $query["offset"] = 0;
        $data["related"] = $this->tagTourModel->getRecordRelated($query);
      }


      $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
      $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

      $this->_assign("allProvince",$tagProvinceList);
      $this->_assign("main_menu",Menu::main_menu());
      foreach ($data["tag"] as $tagKey => $tagValue) {
        foreach ($tagProvinceList as $pKey => $pValue) {
          if($tagValue["tag_id"] == $pValue["tag_id"]){
            $tagProvinceID = $tagValue;
            break;
          }
        }
        if(!empty($tagProvinceID)){
          break;
        }
      }
      if(!empty($tagProvinceID["tag_id"])){
        $this->load->model("tag_translate_model","tagTranslateModel");
        $whereCurrentProvince["where"]["tag_id"] = $tagProvinceID["tag_id"];
        $currentProvince = $this->tagTranslateModel->get($whereCurrentProvince);
        if (!empty($currentProvince)) {
          foreach ($currentProvince as $key => $value) {
            $currentProvince[$value["lang"]] = $value;
          }
        }
        $this->_assign("currentProvince",$currentProvince["en"]["name"]);
      }else{
        $this->_assign("currentProvince","Thailand");
      }

      if(!empty($data["tag"])){
        foreach ($data["tag"] as $key => $value) {
          if($currentProvince[$this->lang->lang()]["name"] != $value["tagt_name"]){
            $keywordList[] = $value["tagt_name"];
          }
        }
        $keywordString = Util::keywordProduce($keywordList);
        PageUtil::addVar("keywords",$keywordString);
      }else{
        PageUtil::addVar("keywords",$this->lang->line("global_lang_home_keyword"));
      }

      //Price
      $this->load->model("price_model", "priceModel");
      $priceWhere["where"]["tour_id"] = $agencytour["tour_id"];
      $priceWhere["where"]["lang"] = $this->lang->lang();
      $priceWhere["order"] = "id ASC";
      $priceQuery = $this->priceModel->get($priceWhere);

      if(!empty($priceQuery)){
        //Min price
        $minSalePrice = 9999999;
        $minSalePriceID = 0;
        $data["firstpage_price"] = 0;
        foreach ($priceQuery as $key => $value) {
          # code...
          if($value["show_firstpage"] == 1){
              $data["firstpage_price"] = 1;
              $minSalePriceID  = $value["agency_id"];
              $minSalePrice = $value["sale_adult_price"];
            break;
          }else{
            if($value["sale_adult_price"] < $minSalePrice){
              $minSalePriceID  = $value["agency_id"];
              $minSalePrice = $value["sale_adult_price"];
            }
          }
        }

        //Price selection
        foreach ($priceQuery as $key => $value) {
          if($value["agency_id"] == $minSalePriceID){
            $data["price"][] = $value;
          }
        }
      }//End price


      //Set Title and Description
      if(!empty($data["tour"][0]["name"])){
        PageUtil::addVar("title",$data["tour"][0]["name"]);
      }else{
        PageUtil::addVar("title",$data["tour"][0]["short_name"]);
      }

      if(!empty($data["tour"][0]["short_name"])){
        $data["caconical"] = base_url($this->lang->line("url_lang_tour")."/".trim(Util::url_title($data["tour"][0]["short_name"]))."-".trim($data["tour"][0]["tour_id"]));
      }else{
        $data["caconical"] = base_url($this->lang->line("url_lang_tour")."/".trim(Util::url_title($data["tour"][0]["name"]))."-".trim($data["tour"][0]["tour_id"]));
      }

      //Set Title and Description
      if(!empty($data["tour"][0]["short_description"])){
        PageUtil::addVar("description",$data["tour"][0]["short_description"]);
      }

      //Images
      $this->load->model("images_model", "imagesModel");
      $data["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$id,'table_id'=>2)));

      //$data["caconical"] = base_url($this->lang->line("url_lang_tour")."/".trim($data["tour"][0]["url"])."-".trim($data["tour"][0]["tour_id"]));
      


      if(!empty($data)){
        if($this->input->get("ajax")){
          $ajaxReturn["imagesRedered"] = $this->_fetch("ajax_images", $data, TRUE, TRUE);

          $ajaxReturn["bodyRedered"] = $this->_fetch("ajax_body", $data, TRUE, TRUE);
          $ajaxReturn["data"] = $data["tour"][0];

          echo json_encode($ajaxReturn);exit;
        }else{
          $this->_fetch('user_view',$data, false, true);
        }
      }else{
        show_404();
      }
    }else{
      show_404();
    }

  }//End user_view function



  function user_inquiry($args){
    if($args["id"]){
      //Tour
      $tour["id"] = $args["id"];
      $tagtour["tour_id"] = $args["id"];
      $agencytour["tour_id"] = $args["id"];

      //Get Tour information
      $whereTour["where"]["id"] = $args["id"];
      $whereTour["where"]["lang"] = $this->lang->lang();
      $data["tour"] = $this->tourModel->get($whereTour);

      if(count($data["tour"]) < 1  || empty($data["tour"])){
        show_404();
      }

      //Price compute
      if(!empty($args["price_id"])){
        $this->load->model("price_model", "priceModel");
        foreach ($args["price_id"] as $key => $value) {
          $priceWhere["where"]["id"] = $value;
          $queryPrice = $this->priceModel->get($priceWhere);
          $queryPriceID = $queryPrice[0]["price_id"];
          $dataPrice[$queryPriceID] = $queryPrice[0];

          $adult_amount_booking = $args["adult_amount_booking"][$queryPriceID];
          $child_amount_booking = $args["child_amount_booking"][$queryPriceID];

          $data["price"][$queryPriceID]["id"] = $queryPriceID;
          $data["price"][$queryPriceID]["agency_id"] = $dataPrice[$queryPriceID]["agency_id"];
          $data["price"][$queryPriceID]["tour_id"] = $dataPrice[$queryPriceID]["tour_id"];
          $data["price"][$queryPriceID]["name"] = (!empty($dataPrice[$queryPriceID]["name"]) ? $dataPrice[$queryPriceID]["name"] : "-");
          $data["price"][$queryPriceID]["sale_adult_price"] = $dataPrice[$queryPriceID]["sale_adult_price"];
          $data["price"][$queryPriceID]["net_adult_price"] = $dataPrice[$queryPriceID]["net_adult_price"];
          $data["price"][$queryPriceID]["discount_adult_price"] = $dataPrice[$queryPriceID]["discount_adult_price"];
          $data["price"][$queryPriceID]["sale_child_price"] = $dataPrice[$queryPriceID]["sale_child_price"];
          $data["price"][$queryPriceID]["net_child_price"] = $dataPrice[$queryPriceID]["net_child_price"];
          $data["price"][$queryPriceID]["discount_child_price"] = $dataPrice[$queryPriceID]["discount_child_price"];
          $data["price"][$queryPriceID]["adult_amount_booking"] = $adult_amount_booking;
          $data["price"][$queryPriceID]["child_amount_booking"] = $child_amount_booking;


          $total_adult_price = $adult_amount_booking * $dataPrice[$queryPriceID]["sale_adult_price"];
          $total_child_price = $child_amount_booking * $dataPrice[$queryPriceID]["sale_child_price"];
          $data["price"][$queryPriceID]["pri_total_adult_price"] = $total_adult_price;
          $data["price"][$queryPriceID]["pri_total_child_price"] = $total_child_price;
          $data["price"][$queryPriceID]["pri_total_price"] = $total_adult_price + $total_child_price;

        }
      }

      //Return
      if(!empty($data)){
        /*
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        */
        $this->_fetch('user_inquiry', $data, false, true);
      }else{
        show_404();
      }
    }else{ //id not send
      show_404();
    }

  }//End user_booking


  function user_booking($args){

    if(!empty($args)){
      /*
      $this->recaptcha->recaptcha_check_answer(
              $_SERVER['REMOTE_ADDR'],
              $this->input->post('recaptcha_challenge_field'),
              $this->input->post('recaptcha_response_field'));
      if(!$this->recaptcha->is_valid){
        $this->_fetch("user_booking_error");
      }
      unset($args["recaptcha_challenge_field"]);
      unset($args["recaptcha_response_field"]);
      unset($args["price_id"]);
      */


      $this->load->model("tourcustomer_model", "tourcustomerModel");
      $booking = $this->tourcustomerModel->addRecord($args);

      //print_r($booking); exit;
      //Send Mail
      $this->sendmail_booking_user($booking);
      $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url($this->lang->line("url_lang_tour")."/booking/".$booking["hashcode"]));

      //print_r($insert_id); exit;
    }else{ //id not send
      //Redirect
      redirect(base_url($this->lang->line("url_lang_tour")."/inquiry/".$args["id"]));
    }


  }

  function sendmail_booking_user($booking){

/*
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: คุณ '.$booking["firstname"].' <'.$booking["email"].'>' . "\r\n";
    $headers .= 'From: uastravel.com <booking@uastravel.com>' . "\r\n";

    $to = $booking["email"];
*/

    $subject = "รายละเอียดการจองทัวร์ - www.ทัวร์เที่ยวไทย.com";


    $message = '<p>สวัสดีค่ะ คุณ '.$booking["firstname"].' '.$booking["lastname"].'</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="http://www.ทัวร์เที่ยวไทย.com">ทัวร์เที่ยวไทย.com</a></p>';
    $message .='<p>รายละเอียดการจองทัวร์ของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking["tour_name"].'('.$booking["tour_code"].')';
    $message .='  <br />ลิงค์ข้อมูลทัวร์ : <a href="'.base_url($this->lang->line("url_lang_tour").'/'.$booking["tour_url"].'-'.$booking["tour_id"].'">'.$booking["tour_name"]).'</a>';
    $message .='  <br />';

    $message .='  <br />##########  จำนวนผู้เดินทาง ##########';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["adult_amount_passenger"];
    $message .='  <br />จำนวนเด็ก : '.$booking["child_amount_passenger"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["infant_amount_passenger"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดราคา ##########';
    foreach ($booking["price"] as $key => $value) {
      $message .='  <br />';
      $message .='  <br />ชื่อแพ็คเกจ : '.$value["price_name"];
      $message .='  <br />ราคารวมของผู้ใหญ่ ('.$value["adult_amount_booking"].') : '.$value["total_adult_price"];
      $message .='  <br />ราคารวมของเด็ก ('.$value["child_amount_booking"].') : '.$value["total_child_price"];
      $message .='  <br />ราคารวมของทารก : ฟรี';
      $message .='  <br />';
    }

    $message .='  <br />ราคารวมทั้งหมด : '.$booking["grand_total_price"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["firstname"].' '.$booking["lastname"];
    //$message .='  <br />สัญชาติ : '.$booking["nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["address"].', '.$booking["city"].', '.$booking["province"].', '.$booking["zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["telephone"];
    $message .='  <br />อีเมล : '.$booking["email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking["hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking["room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking["tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["request"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมูลการจอง : <a href="'.base_url($this->lang->line("url_lang_tour")."/booking/".$booking["hashcode"].'">'.$booking["code"]).'</a>';
    $message .='  <br />';
    $message .='</blockquote>';

    $message .= '<p>หากมีข้อสงสัยกรุณาสอบถามเพิ่มเติม 082-812-1146 หรือ 076-331-280<br />
        หจก.ยูแอสทราเวล (ใบอนุญาตเลขที่ 34/000837)<br />
        เรายินดีให้บริการค่ะ</p>
          <a href="'.base_url().'">ทัวร์เที่ยวไทย.com</a>
          <br />โทร.  082-812-1146 หรือ 076-331-280
          <br />แฟกซ์. 076-331-273
          <br />80/86 หมู่บ้านศุภาลัยซิตี้ฮิลล์ ม.3
          <br />ต.รัษฎา อ.เมือง ภูเก็ต 83000
      ';



    $this->load->library('email');

    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    $this->email->from('info@uastravel.com', 'ทัวร์เที่ยวไทย.com');
    $this->email->to(trim($booking["email"]));
    //$this->email->bcc('ottowan@gmail.com');

    $this->email->subject($subject);
    $this->email->message($message);

    $this->email->send();

    //echo $message; exit;
    //mail($to,$subject,$message,$headers);
  }

  function sendmail_booking_admin($booking){


/*
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: booking@uastravel.com <booking@uastravel.com >' . "\r\n";
    $headers .= 'From: uastravel.com <info@uastravel.com>' . "\r\n";

    $to = "booking.uastravel@gmail.com";
*/


    // subject
    $subject = 'ข้อมูลการจองทัวร์ของคุณ '.$booking["firstname"]." ".$booking["lastname"];

    $message ='<p>รายละเอียดการจองทัวร์มีดังนี้</p>';
    $message .='<blockquote>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking["tour_name"].'('.$booking["tour_code"].')';
    $message .='  <br />ลิงค์ข้อมูลทัวร์ : <a href="'.base_url($this->lang->line("url_lang_tour").'/'.$booking["tour_url"].'-'.$booking["tour_id"].'">'.$booking["tour_name"]).'</a>';


    $message .='  <br />##########  จำนวนผู้เดินทาง ##########';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["adult_amount_passenger"];
    $message .='  <br />จำนวนเด็ก : '.$booking["child_amount_passenger"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["infant_amount_passenger"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดราคา ##########';
    foreach ($booking["price"] as $key => $value) {
      $message .='  <br />';
      $message .='  <br />ชื่อแพ็คเกจ : '.$value["price_name"];
      $message .='  <br />ราคารวมของผู้ใหญ่ ('.$value["adult_amount_booking"].') : '.$value["total_adult_price"];
      $message .='  <br />ราคารวมของเด็ก ('.$value["child_amount_booking"].') : '.$value["total_child_price"];
      $message .='  <br />ราคารวมของทารก : ฟรี';
      $message .='  <br />';
    }

    $message .='  <br />ราคารวมทั้งหมด : '.$booking["grand_total_price"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["firstname"].' '.$booking["lastname"];
    //$message .='  <br />สัญชาติ : '.$booking["nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["address"].', '.$booking["city"].', '.$booking["province"].', '.$booking["zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["telephone"];
    $message .='  <br />อีเมล : '.$booking["email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking["hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking["room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking["tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["request"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมูลการจอง : <a href="'.base_url($this->lang->line("url_lang_tour")."/booking/".$booking["hashcode"].'">'.$booking["code"]).'</a>';
    $message .='  <br />';
    $message .='</blockquote>';


    $this->load->library('email');

    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    $this->email->from('info@uastravel.com', 'ทัวร์เที่ยวไทย.com');
    $this->email->to('booking.uastravel@gmail.com');
    //$this->email->bcc('ottowan@gmail.com');

    $this->email->subject($subject);
    $this->email->message($message);

    $this->email->send();

    //echo $message; exit;
    //mail($to,$subject,$message,$headers);
  }


  function user_bookingview($hashcode){

    $tourcustomerWhere["where"]["hashcode"] = $hashcode;

    $this->load->model("tourcustomer_model", "tourcustomerModel");
    $data["booking"] = $this->tourcustomerModel->get($tourcustomerWhere);


    $this->load->model("tourbooking_model", "tourbookingModel");
    $tourbookingWhere["where"]["tourcustomer_id"] = $data["booking"][0]["id"];
    $data["booking"][0]["price"] = $this->tourbookingModel->get($tourbookingWhere);


    if(!empty($data["booking"] )){
      $this->_fetch('user_bookingview', $data, false, true);
    }else{
      show_404();
    }
    //print_r($data); exit;


  }

  /////////////////////////////////////////
  //
  //  Admin method
  //
  /////////////////////////////////////////
  function admin_index(){
    //Default function for call read method
    $keyword = $this->input->post();

    if(!empty($keyword["search"])){
      $this->_search("admin_list");
    }else{
      $this->admin_list();
    }
  }


  function admin_list(){

    $this->load->library('pagination');
    $this->load->model("tagtour_model","tagTourModel");

    $config['per_page'] = 15;

    //get all the URI segments for pagination and sorting
    $segment_array = $this->uri->segment_array();
    $segment_count = $this->uri->total_segments();


    $where["group"] = "tour_id";
    $where["where"]["lang"] = $this->lang->lang();
    $where["order"] = "tout_tour_id DESC";

    $config['base_url'] = site_url(join("/",$segment_array));
    $config['total_rows'] = $this->tourModel->count_rows($where);

    $result['total_rows'] = $config['total_rows'];

    //getting the records and limit setting
    if (ctype_digit($segment_array[$segment_count])) {
      $this->db->limit($config['per_page'],$segment_array[$segment_count]);
      $result['start_offset'] = $segment_array[$segment_count]+1;
      $result['end_offset'] = $segment_array[$segment_count]+$config['per_page'];
      if(($result['end_offset'])>$config['total_rows']){
        $result['end_offset'] = $result['total_rows'];
      }

      array_pop($segment_array);
    } else {
      $this->db->limit($config['per_page']);
      $result['start_offset'] = 1;

    }

      $data["tour"] = $this->tourModel->get($where);
      $count = 0;
      foreach ($data["tour"] as $key => $value) {
        $query["where"]["tour_id"] = $value["tour_id"];

        $result["tour"][$count]["tour"] = $value;

        $result["tour"][$count]["tag"] = $this->tagTourModel->getTagTourList($query);

        $count++;
      }

      $config['base_url'] = site_url(join("/",$segment_array));
      $config['uri_segment'] = count($segment_array)+1;

      if((count($result['tour'])+1)>$result['start_offset']){
        $result['end_offset'] = count($result['tour']);
      }

      //initialize pagination
      $this->pagination->initialize($config);
      //load the view


      $this->_fetch('admin_list', $result);
   }

  function admin_create($id=false){
    //implement code here

    //Get argument from post page
    $args = $this->input->post();

    $this->load->model("tagtour_model", "tagTourModel");
    $this->load->model("tag_model","tagModel");
    $this->load->model("agency_model","agencyModel");

    //Send argument to validate function
    $validate = $this->validate($args);

    $data["tag"] = $this->tagModel->get();

    $field = "agn_id, agn_name";
    $data["agency"] = $this->agencyModel->getRecord(false, $field);

    //////////
    //Query
    /////////
    if($id){
      //Query data by tour_id
      $args["id"] = $id;
      $data["tour"] = $this->tourModel->getRecord($args);


      //Check update
      if($data["tour"]>0){

        $this->load->model("price_model", "priceModel");
        $agency["tour_id"] = $id;
        $agency["distinct"] = 1;
        $agency["distinct_field"] = "pri_agency_id";
        $queryPrice = $this->priceModel->getRecord($agency);


        //print_r($queryPrice); exit;
        if(!empty($queryPrice)){
          $this->load->model("agency_model", "agencyModel");
          $count = 0;
          foreach ($queryPrice as $key => $valueAgency) {

            $agency["id"] = $valueAgency->agency_id;
            $queryAgencyInfo = $this->agencyModel->getRecord($agency);


            //print_r($queryAgencyInfo); exit;
            $data["price"][$count]["agency_id"] = $valueAgency->agency_id;
            $data["price"][$count]["agency_name"] = $queryAgencyInfo[0]->name;

            if(!empty($queryAgencyInfo)){
              $countPrice = 0;
              foreach ($queryAgencyInfo as $key => $value) {
                $price["tour_id"] = $id;
                $price["agency_id"] = $valueAgency->agency_id;
                $queryPrice = $this->priceModel->getRecord($price);
                //echo $this->db->last_query(); exit;
                $data["price"][$count]["price_data"] = $queryPrice;
                $countPrice++;
              }

            }

            //print_r($data["price"]); exit;
            $count++;

          }
        }

        //print_r($data["price"]); exit;
        //Tag

        $tagTour["where"]["tour_id"] = $id;
        $data["tag_query"] = $this->tagTourModel->getTagTourList($tagTour);
        //var_dump($this->db->last_query());
        //var_dump($data["tag_query"]); exit;

        //print_r($data); exit;
        //Send data to update form
        $this->_fetch('admin_update', $data);
      }else{
        //Send to create form
        $this->_fetch('admin_create', $data);
      }

    }else{
      //Insert New
      if($validate == FALSE){
        //Send to create form
        $data["tag"] = $this->tagModel->get();
        $this->_fetch('admin_create', $data);
      }else{
        ////////////////////////////////////////////
        //Add (Tour) main table
        ////////////////////////////////////////////
        $insertTourID =  $this->tourModel->addRecord($args);

        $this->_uploadImage($insertTourID);

        ////////////////////////////////////////////
        //Update images parent_id
        ////////////////////////////////////////////
        if(!empty($insertTourID)){
          $this->load->model("images_model","imagesModel");
          $options = array(
                            'where'=>array(
                                          'parent_id'=>$args['fakeid']
                                          ),
                            'set'=>array(
                                          'parent_id'=>$insertTourID)
                          );
          $this->imagesModel->update($options);
        }

        ////////////////////////////////////////////
        //Add (AgencyTour) relationship data table
        ////////////////////////////////////////////
        //print_r($args["price"]); exit;
        if(!empty($args["price"])){
          $this->load->model("price_model","priceModel");
          $count = 0;

          foreach ($args["price"] as $keyAgencyId => $valueAgency) {
            foreach ($valueAgency as $keyPriceId => $valuePriceId) {
              foreach ($valuePriceId as $keyPrice => $valuePrice) {
                $price[$count]["tour_id"]   = $insertTourID;
                $price[$count]["lang"]   = $this->lang->lang();
                $price[$count]["agency_id"] = $keyAgencyId;
                $price[$count]["name"] = $valuePrice["name"];
                $price[$count]["sale_adult_price"] = $valuePrice["sale_adult_price"];
                $price[$count]["net_adult_price"] = $valuePrice["net_adult_price"];
                $price[$count]["discount_adult_price"] = $valuePrice["discount_adult_price"];
                $price[$count]["sale_child_price"] = $valuePrice["sale_child_price"];
                $price[$count]["net_child_price"] = $valuePrice["net_child_price"];
                $price[$count]["discount_child_price"] = $valuePrice["discount_child_price"];
                $count++;
              }
            }

          }
          //var_dump($price); exit;
          $this->priceModel->addMultipleRecord($price);
          //print_r($args); exit;
        }



        ////////////////////////////////////////////
        //Add (TagTour) relationship data table
        ////////////////////////////////////////////
        $count = 0;
        $tagTour = false;

        $tagArray = $this->tagModel->cleanTagAndAddTag($args["tags"]);
        foreach ($tagArray as $key => $value) {
          $tagTour[$count]["tag_id"] = $value->id;
          $tagTour[$count]["tour_id"] = $insertTourID;
          $count++;
        }
        $this->tagTourModel->addMultipleRecord($tagTour);

        //Redirect
        redirect(base_url("admin/tour/"));
      }
    }

  }

  function admin_view($tag=false, $tourname=false){
    //implement code here

     //Get argument from url
    $tour["name"] = $tourname;
    $tag["name"] = $tag;



    if($tag["name"] && $tour["name"]){
      //echo "tag && tour";
    }else if($tag["name"]){
      ////////////////////////////////////////////
      //Get tag data
      ////////////////////////////////////////////
      $this->load->model("tag_model", "tagModel");
      $tagQuery["tag"] = $this->tagModel->getRecord($tag);
      $tagArgument["tag_id"] = $tagQuery["tag"][0]->id;
      //print_r($data["tag"][0]); exit;

      ////////////////////////////////////////////
      //Get tagtour data
      ////////////////////////////////////////////
      $this->load->model("tagtour_model", "tagTourModel");
      $tagtourQuery["tag"] = $this->tagTourModel->getRecord($tagArgument);

      $count = 0;
      foreach ($tagtourQuery["tag"] as $key => $value) {
        $tour["id"] = $value->tour_id;

        $tourQuery = $this->tourModel->getRecord($tour);
        $data["tour"][$count] = $tourQuery[0];
        $data["tour"][$count]->tag_id = $value->tag_id;
        $data["tour"][$count]->tag_name = $tagQuery["tag"][0]->name;
        $count++;
      }


      ////////////////////////////////////////////
      //Get tour data
      ////////////////////////////////////////////
      //var_dump($data) ; exit;
      $this->_fetch('list', $data);
      //$this->_fetch('userview', $data, false, true);
    }
  }

  function admin_update(){

    //echo "Call admin_update"; exit;
    //Get argument from post page
    //header ('Content-type: text/html; charset=utf-8');
    $args = $this->input->post();
    //$args["url"] = Util::url_title($args["name"])."-".$args["id"];

    //print_r($args); exit;

    //$args["tag"] =
    //Send argument to validate function
    $validate = $this->validate($args);

    if($args["id"]) {

        //Update & get current tour id
        $updateTourID = $this->tourModel->updateRecord($args);
        ////////////////////////////////////////////
        //Add (TagTour) relationship data table
        ////////////////////////////////////////////
        if(!empty($args["tags"])){

          if($args["tags"] == "[]"){
            $tour["tour_id"] = $args["id"];
            $this->load->model("tagtour_model", "tagTourModel");
            $this->tagTourModel->deleteRecord($tour);
          }else{
            $this->load->model("tagtour_model", "tagTourModel");
            $this->tagTourModel->updateRecord($args);
          }
        }

        //print_r($args["price"]); exit;
        if(!empty($args["price"])){
          $this->load->model("price_model","priceModel");
          $count = 0;
          $price["tour_id"] = $args["id"];
          foreach ($args["price"] as $keyAgencyId => $valueAgency) {
            foreach ($valueAgency as $keyPriceId => $valuePriceId) {
              foreach ($valuePriceId as $keyPrice => $valuePrice) {

                $price["price"][$count]["id"]   = $keyPriceId;
                $price["price"][$count]["tour_id"]   = $args["id"];
                $price["price"][$count]["agency_id"] = $keyAgencyId;
                $price["price"][$count]["lang"]   = $this->lang->lang();
                $price["price"][$count]["name"] = $valuePrice["name"];
                $price["price"][$count]["sale_adult_price"] = $valuePrice["sale_adult_price"];
                $price["price"][$count]["net_adult_price"] = $valuePrice["net_adult_price"];
                $price["price"][$count]["discount_adult_price"] = $valuePrice["discount_adult_price"];
                $price["price"][$count]["sale_child_price"] = $valuePrice["sale_child_price"];
                $price["price"][$count]["net_child_price"] = $valuePrice["net_child_price"];
                $price["price"][$count]["discount_child_price"] = $valuePrice["discount_child_price"];
                //$price_id = $this->priceModel->addRecord($price["price"][$count]);

                $count++;
              }
            }
          }
          //print_r($price); exit;
          $this->priceModel->updateRecord($price);
        }else{
          $this->load->model("price_model", "priceModel");
          $tour["tour_id"] = $args["id"];
          $this->priceModel->deleteRecord($tour);
        }

        $this->_uploadImage($args["id"]);
        //Redirect
        redirect(base_url("admin/tour"));
    } else {

        $this->tourModel->addRecord($args);
        //Redirect
        redirect(base_url("admin/tour"));
    }

  }

  function admin_delete($id=false){
    //implement code here
    if($id) {

        $this->tourModel->deleteRecord($id);

        $args["tour_id"] = $id;

        //Delete tag
        $this->load->model("tagtour_model", "tagTourModel");
        $this->tagTourModel->deleteRecord($id);

        //Delete agency
        $this->load->model("price_model", "priceModel");
        $this->priceModel->deleteRecord($id);

        //Delete Images
        $this->load->model("images_model", "imagesModel");
        $this->imagesModel->delete(array(
                                        'parent_id' => $id ,
                                        'table_id' => 2
                                        )
                                   );

        //Redirect
        redirect(base_url("admin/tour"));
    }
  }

  function admin_createtag($tag=false, $tour=false){
    //implement code here

    if($tag && $tour){
      $argTag["name"] = $tag;
      $this->load->model("tag_model", "tagModel");
      $tagQuery = $this->tagModel->getRecord($argTag);

      $tours = explode("-", $tour);

      $this->load->model("tagtour_model", "tagTourModel");
      foreach ($tours as $key => $value) {
        $args['tag_id']  = $tagQuery[0]->id;
        $args['tour_id'] = $value[0];

        $tagtour = $this->tagTourModel->getRecord($args);

        if(empty($tagtour)){
          //Add
          $this->tagTourModel->addRecord($args);
          echo "insert finished.";
        }else{
          //Delete
          $this->tagTourModel->deleteRecord($args);
          echo "delete finished.";
        }
      }


    }
  }

  function admin_setdisplay(){
    //Get argument from post page
    $args = $this->input->post();
    $this->tourModel->updateDisplayRecord($args);
    //print_r($args); exit();
  }

  function admin_setfisrtpageprice(){
    //Get argument from post page
    $args = $this->input->post();
    $this->tourModel->updateDisplayFirstpageRecord($args);
    //print_r($args); exit();
  }

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'tour name', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    $this->form_validation->set_rules('short_description', 'short_description', 'required');

    //$this->form_validation->set_rules('detail', 'detail', 'required');
    //$this->form_validation->set_rules('included', 'included', 'required');

    //Validate price

    //$this->form_validation->set_rules('net_adult_price', 'net price for adult', 'required|integer');
    //$this->form_validation->set_rules('net_child_price', 'net price for child', 'required|integer');
    //$this->form_validation->set_rules('sale_adult_price', 'sale price for adult', 'required|integer');
    //$this->form_validation->set_rules('sale_child_price', 'sale price for child', 'required|integer');

    //Validate time
    //$this->form_validation->set_rules('start_time', 'start time', 'required');
    //$this->form_validation->set_rules('end_time', 'end time', 'required');

    return $this->form_validation->run();

  }



  function validate_booking(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('tob_firstname', 'firstname name', 'required');
    $this->form_validation->set_rules('tob_lastname', 'description', 'required');
    $this->form_validation->set_rules('tob_address', 'address', 'required');

    //$this->form_validation->set_rules('detail', 'detail', 'required');
    //$this->form_validation->set_rules('included', 'included', 'required');

    //Validate price

    //$this->form_validation->set_rules('net_adult_price', 'net price for adult', 'required|integer');
    //$this->form_validation->set_rules('net_child_price', 'net price for child', 'required|integer');
    //$this->form_validation->set_rules('sale_adult_price', 'sale price for adult', 'required|integer');
    //$this->form_validation->set_rules('sale_child_price', 'sale price for child', 'required|integer');

    //Validate time
    //$this->form_validation->set_rules('start_time', 'start time', 'required');
    //$this->form_validation->set_rules('end_time', 'end time', 'required');

    return $this->form_validation->run();

  }


  function _search($render = "user_list"){
    //Get argument from post page
    $keyword = $this->input->post();


    if($keyword && $render == "user_list"){

      $data["menu"]= $this->_tour_menu();

      foreach ($data["menu"] as $key => $valueTag) {
        $query["menu"][] = $valueTag->tag_id;
      }

      $query["tou_name"] = $keyword["search"];
      $query["user_search"] = true;

      $data["tour"] = $this->tourModel->searchRecord($query);
      $data["search"] = $keyword["search"];

      $this->_fetch('user_list', $data, false, true);


    }else if($keyword && $render == "admin_list"){
      $args["tou_name"] = $keyword["search"];
      $tour = $this->tourModel->searchRecord($args);

      //print_r($data["tour"]); exit;
      $count = 0;
      foreach ($tour as $key => $value) {

        $query["join"] = true;
        $query["tour_id"] = $value->id;

        $data["tour"][$count]["tour"] = $value;

        $this->load->model("tagtour_model","tagTourModel");
        $data["tour"][$count]["tag"] = $this->tagTourModel->getRecord($query);

        $count++;
       }

      $this->_fetch($render, $data);
    }else{
      return;
    }

  }

  function _uploadImage($TourID=""){
    if(empty($TourID)){
      return FALSE;
    }

    //Upload and update Images
    $this->load->library('upload');
    $dir = Hash::make("tour_images")->hash(md5($TourID));

    if(!file_exists($dir)){
      mkdir($dir, 0755,true);
    }

    if(empty($_FILES['first_image']["name"]) AND empty($_FILES['background_image']["name"]) AND empty($_FILES['banner_image']["name"])){
      return FALSE;
    }

    if(!empty($_FILES['first_image']["name"])){
      if(file_exists($dir."/".md5($TourID)."_first.jpg")){
        Util::rrmdir($dir."/".md5($TourID)."_first.jpg");

      }

      $config[0]['upload_path'] = $dir;
      $config[0]['allowed_types'] = 'gif|jpg|png';
      $config[0]['file_name'] = md5($TourID)."_first.jpg";
      $this->upload->initialize($config[0]);
      $this->upload->do_upload("first_image");
      $_firstImg = $this->upload->data();
      $imgData["first_image"] = base_url("/".$dir."/".$_firstImg["file_name"]);

    }

    if(!empty($_FILES['background_image']["name"])){
      if(file_exists($dir."/".md5($TourID)."_background.jpg")){
        Util::rrmdir($dir."/".md5($TourID)."_background.jpg");
      }
      $config[1]['upload_path'] = $dir;
      $config[1]['allowed_types'] = 'gif|jpg|png';
      $config[1]['file_name'] = md5($TourID)."_background.jpg";
      $this->upload->initialize($config[1]);
      $this->upload->do_upload("background_image");
      $_backgroundImg = $this->upload->data();
      $imgData["background_image"] = base_url("/".$dir."/".$_backgroundImg["file_name"]);
    }

    if(!empty($_FILES['banner_image']["name"])){
      if(file_exists($dir."/".md5($TourID)."_banner.jpg")){
        Util::rrmdir($dir."/".md5($TourID)."_banner.jpg");
      }
      $config[2]['upload_path'] = $dir;
      $config[2]['allowed_types'] = 'gif|jpg|png';
      $config[2]['file_name'] = md5($TourID)."_banner.jpg";
      $this->upload->initialize($config[2]);
      $this->upload->do_upload("banner_image");
      $_bannerImg = $this->upload->data();
      $imgData["banner_image"] = base_url("/".$dir."/".$_bannerImg["file_name"]);
    }

    $imgData["id"] = $TourID;
    return $this->tourModel->updateRecord($imgData);
  }

}

?>