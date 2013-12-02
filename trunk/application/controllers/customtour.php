<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomTour extends MY_Controller {

  var $per_page = 20;

  function __construct(){
    parent::__construct();
  }


  function user_index(){

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

    }else if($this->uri->total_segments() == 1){
      $this->user_list();
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
    if(!empty($dataToFetch)){
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
      }
      if($_step == 3){
        redirect(base_url("customtour/create"));
      }
    }
    $this->session->set_userdata("step",1);
    $this->_fetch('user_create_step1' ,"",false, true);
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
    $this->_fetch('user_create_step2' ,"",false, true);
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

    $this->_fetch('user_create', $data, false, true);

  }


  function user_add($data = false){
    $this->load->model("tour_model","tourModel");

    $post = $this->input->post();

    $query["package_name"] = trim($post["packageName"]);
    $result = $this->customtourModel->get($query);
    if(!empty($result)){
      $addData["url"] = Util::url_title($post["packageName"]."-".(count($result)+1));
    }else{
      $addData["url"] = Util::url_title($post["packageName"]);
    }

    $addData["package_name"] = $post["packageName"];
    $addData["days"] = $post["customtour"]["totalday"];

    $addData["lang"] = $this->lang->lang();
    $addData["tour_id"] = serialize($post["packagedata"]);
    
    $addResult = $this->customtourModel->add($addData);

    if($addResult){
      $this->session->set_userdata("customtour","");
      $this->session->set_userdata("step",0);
      $user_id = $this->facebook->getUser();
      
      if($user_id){
        $this->_publish($addResult);
      }else{
        $this->session->set_userdata("forword",base_url("customtour/publish/".$addData["url"]));
        $params = array(
          'scope' => 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos,photo_upload,user_photo_video_tags',
          'fbconnect' => 1,
          'display' => "page",
          'redirect_uri' => base_url("user/fblogin")
        );
        $url = $this->facebook->getLoginUrl($params);

        redirect($url);
        exit();
      }
      redirect(base_url("/customtour/".$addData["url"]));
    }else{
      redirect(base_url("/customtour/create"));
    }
  }

  function user_publish($input = ""){
    if(empty($input)){
      redirect(base_url());
    }
    $result = $this->_publish($input);
    if($result){
      redirect(base_url("/customtour/".$result[0]["url"]));
    }else{
      redirect(base_url("/customtour/"));
    }
  }

  function _publish($input){
    if(!empty($input)){
      $this->load->model("tour_model","tourModel");
      if(is_numeric($input)){
        $customTourResult = $this->customtourModel->get($input);
      }else{
        $where["where"]["url"] = $input;
        $customTourResult = $this->customtourModel->get($where);
      }

      $tourPackage = unserialize($customTourResult[0]["tour_id"]);
      $rand_keys = array_rand($tourPackage, 1);
      $pickedTour = $tourPackage[$rand_keys][0];

      $tourResult = $this->tourModel->get($pickedTour);
      $args = array(
                    'url' => "http://xn--o3caa7bbc1ad9fyb2h4b8byc.com/themes/Travel06062013/images/banner/banner-01.jpg",
                    //'url' => base_url($tourResult[0]["background_image"]),
                    'message' => $this->lang->line("facebook_message_for_publishing_lead").$customTourResult[0]["package_name"].'
                    '.base_url("/customtour/".$customTourResult[0]["url"]).$this->lang->line("facebook_message_for_publishing").'

                    Click! >> '.base_url(),
                    'access_token' => $this->session->userdata("access_token")
                     );
      $result = $this->facebook->api('/me/photos/', 'POST', $args);
      return $tourResult;
    }
    return FALSE;
  }

  function user_view($page){
    $this->load->model("tour_model","tourModel");
    $this->load->model("price_model","priceModel");
    $this->load->model("images_model", "imagesModel");

    $query["url"] = trim($page);
    $query["limit"] = 1;
    $buffer = $this->customtourModel->get($query);
    $result["packageData"] = $buffer[0];
    unset($buffer);
    $result["packageData"]["tour_id"] = unserialize($result["packageData"]["tour_id"]);

    foreach ($result["packageData"]["tour_id"] as $day => $dayValue) {
      foreach ($dayValue as $key => $item) {
        $tourResult = $this->tourModel->get($item);
        $wherePrice["tour_id"] = $item;
        $wherePrice["event"] = "display";
        $priceDummy = Util::objectToArray($this->priceModel->getRecord($wherePrice));
        $tourResult[0]["price"] = $priceDummy[0];
        //Images
        $tourResult[0]["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$wherePrice["tour_id"],'table_id'=>2)));

        $tourPackageData[$day][$key] = $tourResult[0];
        $tourPackageData[$day][$key] = $tourResult[0];
        unset($priceDummy);
        unset($wherePrice);
        unset($tourResult);
      }
    }
    //var_dump($tourPackageData);exit;
    $result["packageTour"] = $tourPackageData;
    $this->_fetch('user_view', $result, false, true);
  }

  function user_search($keyword, $page){
    echo "user list : ".$keyword."+".$page;
  }

  function user_list(){
    $result = $this->customtourModel->get();
    var_dump($result);exit;
  }
}
?>