<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomTour extends MY_Controller {

  var $per_page = 20;

  function __construct(){
    parent::__construct();
  }


  function user_index() {
    
    //print_r($this->lang->lang()); exit;
    //Default function for call read method
    if($this->uri->segment(1) == $this->router->class){
      $index = 1;
    }else if($this->uri->segment(2) == $this->router->class){
      $index = 2;
    }

    if($this->uri->segment($index+1) == "create"){
        ////////////////////////////
        // tag
        // algorithm : http://www/customtour/create/3
        // sample : http://uastravel.com/customtour/create/1
        ////////////////////////////
        $id = $this->uri->segment($index+2);
        $this->user_create($id);

    }else if($this->uri->segment($index+1) == "add"){
        ////////////////////////////
        // tag
        // algorithm : http://www/customtour/add/
        // sample : http://uastravel.com/customtour/add/
        ////////////////////////////
        $args = $this->input->post();
        $this->user_add($args);

    }else if($this->uri->segment($index+1) == "search"){
        ////////////////////////////
        // tag
        // algorithm : http://www/customtour/search/3
        // sample : http://uastravel.com/customtour/search
        ////////////////////////////
        $keyword = $this->uri->segment($index+2);
        $page = $this->uri->segment($index+3);
        $this->user_search($keyword, $page);

    }else if($this->uri->total_segments() == 1 ){
      $this->user_list();
    }else if($this->uri->total_segments() == 2 AND is_numeric($this->uri->segment($index+1)) ){

      $this->user_list($this->uri->segment($index+1));
    }else{
      ////////////////////////////
      // customtour
      // algorithm : http://www/customtour/2
      // sample : http://uastravel.com/customtour/10
      ////////////////////////////
      $page = $this->uri->segment($index+1);

      //echo "customtour";

      $this->user_view($page);
    }

  }

  function ajax_index(){
    if(IS_AJAX){
      //Default function for ajax call
      if($this->uri->segment(1) == $this->router->class){
        $index = 1;
      }else if($this->uri->segment(2) == $this->router->class){
        $index = 2;
      }
      $args = $this->input->post();
      if($this->uri->segment($index+2) == "tourfilter"){
        if($this->uri->segment($index+3) == "tag"){
          $this->ajax_tourfilter_tag($args);
        }else if($this->uri->segment($index+3) == "data"){
          $this->ajax_tourfilter_data($args);
        }
      }else{

      }
    }
  }

  function ajax_tourfilter_tag($args=false){
    if(!IS_AJAX){
      show_404();
    }
    //print_r($args); exit;
    //print_r($tagQuery); exit;
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagtypeModel");
    $this->load->model("tag_model", "tagModel");
    $this->load->model("tagtour_model", "tagtourModel");
    $this->load->model("taghotel_model", "taghotelModel");

    if($args["model"] == "tour"){
      //Type
      $args["name"] = "customtour_tour_filter";
      $type = $this->typeModel->getRecord($args);
      //Third tag
      $third["type_id"] = $type[0]->id;
      $third["parent_id"]  = $args["secondtag_id"];
      $this->db->order_by($this->tagtypeModel->getColumn("index"), "ASC");
      $data["tours"]["filter"]["thirdtag"] = $this->tagtypeModel->getRecordByTypeAndParent($third);
      //print_r($data["tours"]["filter"]["thirdtag"]); exit;
      $this->_fetch('ajax_filtertag', $data, false, true);
    }
  }

  function ajax_tourfilter_data($args=false){
    if(!IS_AJAX){
      show_404();
    }
    //print_r($args); exit;
    if($args["model"] == "tour"){
      //Get default tag name
      $argTag["where"]["id"] = $args["firsttag_id"];
      $this->load->model("tag_model", "tagModel");
      $tagQuery = $this->tagModel->getTagList($argTag);
      //var_dump($tagQuery); exit;
      $data["tours"]["filter"]["defaulttag"] = $tagQuery[0]["name"];
      $data["tours"]["filter"]["defaulttag_id"] = $tagQuery[0]["id"];

      $this->load->model("tagtour_model", "tagtourModel");
      if($args["thirdtag_id"] == 0){
        $argTour["type_id"] = $args["firsttag_id"];
        $argTour["tag_id"]  = $args["secondtag_id"];
        $argTour["menu"][0] = $args["firsttag_id"];
        $argTour["menu"][1] = $args["secondtag_id"];
        $argTour["per_page"] = 20;
        $argTour["offset"] = 0;
        $data["tours"]["tour"] = $this->tagtourModel->getRecordByType($argTour);
      }else{
        $explode_thirdtag = explode(",", $args["thirdtag_id"]);
        unset($explode_thirdtag[count($explode_thirdtag)-1]);
        $implode_thirdtag = implode(",", $explode_thirdtag);
        $argTour["type_id"] = $args["firsttag_id"];
        $argTour["tag_id"]  = $args["secondtag_id"];
        $argTour["subtype_id"] = $implode_thirdtag;
        $argTour["menu"][0] = $args["firsttag_id"];
        $argTour["menu"][1] = $args["secondtag_id"];
        $count = 2;
        foreach($explode_thirdtag as $key => $value) {
          $argTour["menu"][$count] = $value;
          $count++;
        }
        $argTour["per_page"] = 20;
        $argTour["offset"] = 0;
        $data["tours"]["tour"] = $this->tagtourModel->getRecordBySubTypeIn($argTour);
      }

      //print_r($data);
      $this->_fetch('ajax_filterdata', $data, false, true);
    }
  }

  function ajax_get_menu_list(){
    if(!IS_AJAX){
      show_404();
    }
    $menuList = Menu::main_menu();
    $_post = $this->input->post();
    foreach ($menuList as $key => $value) {
      if($value["parent_id"] == $_post["tag_id"]){
        $data["menuList"][$key]["name"] = $value["name"];
        $data["menuList"][$key]["url"] = $value["url"];
        $data["menuList"][$key]["full_url"] = $value["full_url"];
        $data["menuList"][$key]["parent_id"] = $value["parent_id"];
        $data["menuList"][$key]["tag_id"] = $value["tag_id"];
      }
      if(!empty($value["child"])){
        foreach ($value["child"] as $ckey => $cvalue) {
          if($cvalue["parent_id"] == $_post["tag_id"]){
            $data["menuList"][$ckey]["name"] = $cvalue["name"];
            $data["menuList"][$ckey]["url"] = $cvalue["url"];
            $data["menuList"][$ckey]["full_url"] = $cvalue["full_url"];
            $data["menuList"][$ckey]["parent_id"] = $cvalue["parent_id"];
            $data["menuList"][$ckey]["tag_id"] = $cvalue["tag_id"];
          }
        }
      }
    }
    
    $this->load->model("tagtour_model", "tagtourModel");
    $this->load->model("price_model", "priceModel");

    $argTour["type_id"] = $_post["type_id"];
    $argTour["tag_id"]  = $_post["tag_id"];

    $argTour["per_page"] = 20;
    $argTour["offset"] = 0;
    $dataToFetch["tours"] = $this->tagtourModel->getRecordByType($argTour);
    if(!empty($dataToFetch["tours"])){
      foreach ($dataToFetch["tours"] as $key => $value) {
        $wherePrice["where"]["tour_id"] = $value["tour"]["tour_id"];
        $wherePrice["where"]["lang"] = $this->lang->lang();
        $dataToFetch["tours"][$key]["price_list"] = $this->priceModel->get($wherePrice);
        $dataToFetch["tours"][$key]["totalday"] = 0;
        if(!empty($value["tags"])){
          foreach ($value["tags"] as $tkey => $tvalue) {
            if($dataToFetch["tours"][$key]["totalday"] > 0){
              break;
            }
            if($tvalue["tag_id"] == 85){
              $dataToFetch["tours"][$key]["totalday"] = 0.5;
            }else if($tvalue["tag_id"] == 95){
              $dataToFetch["tours"][$key]["totalday"] = 1;
            }else if($tvalue["tag_id"] == 166){
              $dataToFetch["tours"][$key]["totalday"] = 2;
            }else if($tvalue["tag_id"] == 163){
              $dataToFetch["tours"][$key]["totalday"] = 3;
            }else if($tvalue["tag_id"] == 546){
              $dataToFetch["tours"][$key]["totalday"] = 4;
            }
          }
        }
      }
    }else{
      $dataToFetch["tours"] = NULL;
    }
    $data["packageTourList"] = $this->_fetch('ajax_filterdata', $dataToFetch, true, true);
    echo json_encode($data);
  }

  function user_create_step1(){
    $this->load->library('user_agent');
    
    if(!$this->agent->is_referral() OR strpos($this->agent->referrer(), base_url()) === FALSE){
      $_step = $this->session->userdata("step");
      if($_step == 2){
        redirect(base_url("customtour/create/step2"));
      }else if($_step == 3){
        redirect(base_url("customtour/create"));
      }
    }
    $this->session->set_userdata("step",1);
    $this->_fetch('user_create_step1' ,"");
  }

  function user_create_step2(){
    $this->load->library('user_agent');
    
    if(!$this->agent->is_referral() OR strpos($this->agent->referrer(), base_url()) === FALSE){
      $_step = $this->session->userdata("step");
      if($_step == 3){
        redirect(base_url("customtour/create"));
      }
    }


    $this->session->set_userdata("step",2);
    $this->_fetch('user_create_step2');
  }

  function user_create($id = false){


     //header('Content-Type: text/xml; charset=utf-8');
    //echo "user create : ".$id;
    $this->_assign("menuList",Menu::main_menu());
    $data = false;
    $_post = $this->input->post();


    if(!empty($_post["totalday"])){
      $this->session->set_userdata("customtour",$_post);
      $this->session->set_userdata("step",3);
    }
    $_session = $this->session->userdata("customtour");
    $_step = $this->session->userdata("step");
    if(empty($_step)){
      redirect(base_url("customtour/create/step1"));
    }
    if($_step == 1){
      redirect(base_url("customtour/create/step1"));
    }else if($_step == 2){
      redirect(base_url("customtour/create/step2"));
    }

    $this->_assign("session",$_session);

    //print_r($tagQuery); exit;
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagtypeModel");

    $this->load->model("tag_model", "tagModel");
    $this->load->model("tagtour_model", "tagtourModel");
    $this->load->model("taghotel_model", "taghotelModel");
    if($id){
      //Edit

    }else{
      ////////////////////////
      // Tour
      ////////////////////////

      //Type
      $args["where"]["name"] = "customtour_tour_filter";
      $typeTour = $this->typeModel->get($args);

      //First tag
      $firstTagTour["type_id"] = $typeTour[0]["id"];
      $firstTagTour["parent_id"] = 0;
      $this->db->order_by($this->tagtypeModel->getColumn("index"), "ASC");
      $firstTagTourQuery = $this->tagtypeModel->getCustomTourRecord($firstTagTour);

      $defaultTag = $firstTagTourQuery[0]["name"];

      //Second tag
      foreach ($firstTagTourQuery as $key => $valueFirstTag) {
        $secondTagTour["where_in"][] = $valueFirstTag["tag_id"];
      }
      $secondTagTour["type_id"] = $typeTour[0]["id"];
      $this->db->order_by($this->tagtypeModel->getColumn("index"), "ASC");
      $secondTagTourQuery = $this->tagtypeModel->getUniqRecordByWhereIn($secondTagTour);

      //Third tag
      $thirdTagTour["type_id"] = $typeTour[0]["id"];
      $thirdTagTour["parent_id"]  = $secondTagTourQuery[0]["tag_id"];
      $this->db->order_by($this->tagtypeModel->getColumn("index"), "ASC");
      $thirdTagTourQuery  = $this->tagtypeModel->getRecordByTypeAndParent($thirdTagTour);

      $data["tours"]["filter"]["firsttag"] = $firstTagTourQuery;
      $data["tours"]["filter"]["secondtag"] = $secondTagTourQuery;
      $data["tours"]["filter"]["thirdtag"] = $thirdTagTourQuery;

      $data["tours"]["filter"]["defaulttag"] = $firstTagTourQuery[0]["name"];
      $data["tours"]["filter"]["defaulttag_id"] = $firstTagTourQuery[0]["tag_id"];

      $argTour["type_id"] = $firstTagTourQuery[0]["tag_id"];
      $argTour["tag_id"]  = $secondTagTourQuery[0]["tag_id"];
      $argTour["menu"][0] = $firstTagTourQuery[0]["tag_id"];
      $argTour["menu"][1] = $secondTagTourQuery[0]["tag_id"];
      $argTour["per_page"] = 20;
      $argTour["offset"] = 0;
      $data["tours"]["tour"] = $this->tagtourModel->getRecordByType($argTour);

      ////////////////////////
      // Hotel
      ////////////////////////
      //Type
      $args["name"] = "customtour_hotel_filter";
      $typeHotel = $this->typeModel->get($args);

      //First tag
      $firstTagHotel["type_id"] = $typeHotel[0]["id"];
      $firstTagHotel["parent_id"] = 0;
      $firstTagHotelQuery = $this->tagtypeModel->getCustomTourRecord($firstTagHotel);

      $defaultTagHotel = $firstTagHotelQuery[0]["name"];
    //Assign Province
    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);
    $this->_assign("main_menu",Menu::main_menu());

      //Second tag
      foreach ($firstTagHotelQuery as $key => $valueFirstTag) {
        $secondTagHotel["where_in"][] = $valueFirstTag["tag_id"];
      }
      $secondTagHotel["type_id"] = $typeHotel[0]["id"];
      $secondTagHotelQuery = $this->tagtypeModel->getUniqRecordByWhereIn($secondTagHotel);

      //Third tag
      $thirdTagHotel["type_id"] = $typeHotel[0]["id"];
      $thirdTagHotel["parent_id"]  = $secondTagHotelQuery[0]["tag_id"];
      $thirdTagHotelQuery = $this->tagtypeModel->getRecordByTypeAndParent($thirdTagHotel);


      $data["hotels"]["filter"]["firsttag"] = $firstTagHotelQuery;
      $data["hotels"]["filter"]["secondtag"] = $secondTagHotelQuery;
      $data["hotels"]["filter"]["thirdtag"] = $thirdTagHotelQuery;

      $data["hotels"]["filter"]["defaulttag"] = $firstTagHotelQuery[0]["name"];


      $argHotel["type_id"] = $firstTagHotelQuery[0]["tag_id"];
      $argHotel["tag_id"]  = $firstTagHotelQuery[0]["tag_id"];
      $argHotel["menu"][0] = $firstTagHotelQuery[0]["tag_id"];
      $argHotel["menu"][1] = $secondTagHotelQuery[0]["tag_id"];
      $argHotel["per_page"] = 20;
      $argHotel["offset"] = 0;
      $data["hotels"]["hotel"] = $this->taghotelModel->getRecordByTag($argHotel);

    }
    $this->_fetch('user_create', $data);
  }


  function user_add($data = false){
    $this->load->model("tour_model","tourModel");

    $post = $this->input->post();
    

    $query["where"]["package_name"] = trim($post["packageName"]);
    $result = $this->customtourModel->get($query);
    if(!empty($result)){
      $addData["url"] = Util::url_title($post["packageName"]."-".(count($result)+1));
    }else{
      $addData["url"] = Util::url_title($post["packageName"]);
    }
    //Generate Code
    $last_id = $this->db->query("SELECT MAX(cus_id) as cus_id from ci_customtour")->row();
    $next_id = $last_id->cus_id+1;
    $digit = sprintf("%06d", $next_id);
    $code = "CT".$digit;

    $post["code"] = $code;
    $post["url"] = $addData["url"];

    $addData["code"] = $code;
    $addData["package_name"] = $post["packageName"];
    $addData["days"] = $post["customtour"]["totalday"];

    $addData["lang"] = $this->lang->lang();
    $addData["tour_id"] = serialize($post["packagedata"]);
    
    $addResult = $this->customtourModel->add($addData);
    $post["tour_id"] = $addResult;
    if($addResult){
      $this->session->set_userdata("customtour","");
      $this->session->set_userdata("step",0);

      //Pre-paring data and add to tourcustomer
      $this->load->model("tourcustomer_model", "tourCustomerModel");
      if(!$tourCustomer = $this->tourCustomerModel->addTourCustomer($post)){
        log_message('error', '[Booking Error] - Can\'t add booking detail. ['.__FILE__.':'.__LINE__.']');
      }

      $user_id = $this->facebook->getUser();
      log_message("debug","Facebook UserId[".__LINE__."]: ".$user_id);
      $this->session->set_userdata("forword_booking",base_url(urlencode($this->lang->line("url_lang_tour"))."/booking/".$tourCustomer["hashcode"]));
      if($user_id){
        $this->_publish($addResult);
      }else{
        $this->session->set_userdata("forword",base_url(urlencode($this->lang->line("url_lang_tour"))."/booking/".$tourCustomer["hashcode"]));
        $params = array(
          'scope' => $this->config->item("facebook_scope"),
          'fbconnect' => 1,
          'display' => "page",
          'redirect_uri' => base_url("user/fblogin")
        );
        $url = $this->facebook->getLoginUrl($params);

        redirect($url);
        exit();
      }
      redirect(base_url($this->lang->line("url_lang_tour")."/booking/".$tourCustomer["hashcode"]));
      exit();
    }else{
      redirect(base_url("/customtour/create"));
      exit();
    }
  }

  function user_publish($input = ""){
    if(empty($input)){
      redirect(base_url());
    }
    $result = $this->_publish($input);
    if($result){
      $forword = $this->session->userdata("forword_booking");
      log_message("debug","Forword [".__LINE__."]: ".$forword);
      if(!empty($forword)){
        $this->session->unset_userdata("forword_booking");
        redirect($forword,"refresh");
      }else{
        redirect(base_url("/customtour/".$result[0]["url"]));
      }
    }else{
      redirect(base_url("/customtour/"));
    }
    exit;
  }

  function _publish($input){
    if(!empty($input)){
      $this->load->model("tour_model","tourModel");
      if(is_numeric($input)){
        $customTourResult = $this->customtourModel->get($input);
      }else{
        $where["where"]["url"] = urldecode($input);
        $customTourResult = $this->customtourModel->get($where);
      }

      $tourPackage = unserialize($customTourResult[0]["tour_id"]);
      $rand_keys = array_rand($tourPackage, 1);
      $pickedTour = $tourPackage[$rand_keys][0];
      $tourResult = $this->tourModel->get($pickedTour);
      $args = array(
                    //'url' => "http://xn--o3caa7bbc1ad9fyb2h4b8byc.com/themes/Travel06062013/images/banner/banner-01.jpg",
                    'url' => base_url($tourResult[0]["background_image"]),
                    'message' => $this->lang->line("facebook_message_for_publishing_lead").$customTourResult[0]["package_name"].'
                    '.base_url("/customtour/".$customTourResult[0]["url"]).$this->lang->line("facebook_message_for_publishing").'

                    Click! >> '.base_url(),
                    'access_token' => $this->session->userdata("access_token")
                     );
      try {
        $result = $this->facebook->api('/me/photos/', 'POST', $args);
      }catch (Exception $e) {
        log_message("debug","Facebook Error: ".$e->getMessage());
        $this->session->set_userdata("forword",base_url("customtour/publish/".$input));
        $params = array(
          'scope' => $this->config->item("facebook_scope"),
          'fbconnect' => 1,
          'display' => "page",
          'redirect_uri' => base_url("user/fblogin")
        );
        $url = $this->facebook->getLoginUrl($params);
        redirect($url);
        exit();
      }
      return $customTourResult;
    }
    return FALSE;
  }

  function user_view($page){
    $this->load->model("tour_model","tourModel");
    $this->load->model("price_model","priceModel");
    $this->load->model("images_model", "imagesModel");
    $this->load->model("tagtour_model", "tagTourModel");
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");

    $query["url"] = trim($page);
    $query["limit"] = 1;
    $buffer = $this->customtourModel->get($query);

    if(empty($buffer)){
      show_404();
    }
    //Update View
    $updateView["id"] = $buffer[0]["id"];
    $updateView["view"] = $buffer[0]["view"]+1;
    $this->customtourModel->add($updateView);

    $result["packageData"] = $buffer[0];
    unset($buffer);
    $result["packageData"]["tour_id"] = unserialize($result["packageData"]["tour_id"]);

    foreach ($result["packageData"]["tour_id"] as $day => $dayValue) {
      foreach ($dayValue as $key => $item) {
        $whereTour["where"]["id"] = $item;
        $whereTour["where"]["lang"] = $this->lang->lang();
        $tourResult = $this->tourModel->get($whereTour);
        $wherePrice["where"]["tour_id"] = $item;
        $wherePrice["where"]["lang"] = $this->lang->lang();
        $tourResult[0]["price"] = $this->priceModel->get($wherePrice);
        //Images
        $tourResult[0]["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$item,'table_id'=>2)));

        $tourPackageData[$day][$key] = $tourResult[0];
        $tourPackageData[$day][$key] = $tourResult[0];
        unset($wherePrice);
        unset($tourResult);

        $whereTagTour["where"]["tour_id"] = $item;
        $tourPackageData[$day][$key]["tags"] = $this->tagTourModel->getTagTourList($whereTagTour);
        unset($whereTagTour);
      }
    }

    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);
    $this->_assign("main_menu",Menu::main_menu());
    foreach ($tourPackageData[0][0]["tags"] as $tagKey => $tagValue) {
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
    if(!empty($tourPackageData[0][0]["tags"])){
      foreach ($tourPackageData as $dayKey => $dayValue) {
        foreach ($dayValue as $packageKey => $packageValue) {
          foreach ($packageValue["tags"] as $key => $value) {
            $keywordList[] = $value["tagt_name"];
            $tagsList[$value["tag_id"]] = $value;
          }
        }
      }
      $keywordList = array_unique($keywordList);

      $keywordString = Util::keywordProduce($keywordList);
      PageUtil::addVar("keywords",$keywordString);
    }else{
      PageUtil::addVar("keywords",$this->lang->line("global_lang_home_keyword"));
    }


// new 22/5/2557  เมนูแบบหน้าแรก
    $this->load->model('tagtour_model','tagTourModel');
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



    //Set Description
    if(!empty($tourPackageData[0][0]["description"])){
      PageUtil::addVar("description",str_replace(array('\'', '"','“','”','&ldquo;','&rdquo;','&nbsp;'), "", trim(strip_tags($tourPackageData[0][0]["description"]))));
    }
    PageUtil::addVar("title",$result["packageData"]["package_name"]);
    $this->_assign("tags",$tagsList);
    $this->_assign("packageTour",$tourPackageData);
    $this->_assign("packageData",$result["packageData"]);
    $this->_fetch('user_view', "");
  }

  function user_search($keyword, $page){
    echo "user list : ".$keyword."+".$page;
  }

  function user_list($start = 0){
    //Load Library
    $this->load->library('pagination');

    //Load Model
    $this->load->model("article_model","articleModel");
    $this->load->model("customtour_model","customtourModel");
    $this->load->model("tour_model","tourModel");

    $where["where"]["tag_id"] = 0;
    $where["where"]["display"] = 1;
    $where["where"]["type"] = 4;
    $where["where"]["lang"] = $this->lang->lang();
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    
    unset($where);
    if(empty($articleResult)){
      $articleResult[0] = FALSE;
    }else{
      $articleResult[0]["body_column"] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $articleResult[0]["body"]));
    }
    $this->_assign("article",$articleResult[0]);
    unset($where);


    //pagination
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['base_url'] = base_url("customtour");
    $config['total_rows'] = $this->customtourModel->count_rows();
    $config['per_page'] = 20;
    $config['uri_segment'] = $this->uri->total_segments();
    $this->pagination->initialize($config);

    $where['limit']['amount'] = $config['per_page'];
    $where['limit']['start'] = $start;
    $where["order"] = "cr_date DESC";
    
    $result = $this->customtourModel->get($where);
    foreach ($result as $key => $value) {
      $result[$key]["tour_id"] = unserialize($result[$key]["tour_id"]);
      if(!empty($result[$key]["tour_id"])){
        foreach ($result[$key]["tour_id"] as $dayKey => $dayValue) {
          foreach ($dayValue as $tourListKey => $tourListValue) {
            $whereTour["where"]["tour_id"] = $tourListValue;
            $whereTour["where"]["lang"] = $this->lang->lang();
            $resultTour = $this->tourModel->get($whereTour);
            if(empty($resultTour)){
              $resultTour[0] = FALSE;
            }else{
              //banner_image
              $result[$key]["images"][] = base_url($resultTour[0]["banner_image"]);
              $result[$key]["short_description"][] = $resultTour[0]["short_description"];
            }
            $result[$key]["tour_id"][$dayKey][$tourListKey] = $resultTour[0];            
          }
        }
      }
    }

// new 23/5/2557  เมนูแบบหน้าแรก
    $this->load->model('tagtour_model','tagTourModel');
    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");
    $this->load->model("price_model","priceModel");
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



  //Assign Province แก้ไข วันที่ 23/5/2557
    $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
    $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

    $this->_assign("allProvince",$tagProvinceList);
    $this->_assign("main_menu",Menu::main_menu());


    if(!empty($tagQuery)){
      $query["tag_id"] = $tagQuery[0]["id"];
      $query["join"] = true;

    // แก้ไขใหม่

      $this->load->model("tagtour_model", "tagTourModel");
      $data["tour"] = $this->tagTourModel->getRecordByTag($query);
    }else{
      $data["tour"] = false;
    }
    $this->_assign("packettours",$data["tour"]);








    $this->_assign("customtour",$result);


    $this->_fetch("user_list", "");
  }
}
?>