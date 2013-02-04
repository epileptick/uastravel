<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends MY_Controller {

  var $per_page = 20;

  function __construct(){
    parent::__construct();
    $this->lang->load('hotel', 'thai');
  }


  function user_index(){

    //print_r($this->lang->lang()); exit;
    //Default function for call read method
    if($this->uri->segment(1) == $this->router->class){
      $index = 1;
      //echo $index; 
    }else if($this->uri->segment(2) == $this->router->class){
      $index = 2;
      //echo $index; 
    }

    ///////////////////////////
    // Check segment
    /////////////////////////// 
    if(is_numeric($this->uri->segment($index+4))){
      ////////////////////////////
      // subtype/page
      // algorithm : http://www/hotel/2/3/4/5
      // algorithm : http://www/hotel/tag/type/subtype/page        
      // sample : http://uastravel.com/hotel/halfday/phuket/boat/10
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
      // algorithm : http://www/hotel/2/3/4
      // algorithm : http://www/hotel/tag/type/page        
      // sample : http://uastravel.com/hotel/halfday/phuket/10
      ////////////////////////////
      $page = $this->uri->segment($index+3);//4; 
      $tag = $this->uri->segment($index+1);//2
      $type = $this->uri->segment($index+2);//3; 
      $subtype = 0; 

      $this->user_listbytype($tag, $type, $page);

    }else if($this->uri->segment($index+3)){
      ////////////////////////////
      // subtype
      // algorithm : http://www/hotel/2/3/4
      // algorithm : http://www/hotel/tag/type/subtype        
      // sample : http://uastravel.com/hotel/halfday/phuket/boat
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
      // algorithm : http://www/hotel/inquiry       
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
      // algorithm : http://www/hotel/booking       
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
      // algorithm : http://www/hotel/2/3
      // algorithm : http://www/hotel/tag/page        
      // sample : http://uastravel.com/hotel/halfday/10
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
      // algorithm : http://www/hotel/2/3
      // algorithm : http://www/hotel/tag/type        
      // sample : http://uastravel.com/hotel/halfday/phuket
      ////////////////////////////
      $page = 0;
      $tag = $this->uri->segment($index+1);//2
      $type = $this->uri->segment($index+2);//3
      $subtype = 0; 
      //echo "type"; 

      $this->user_listbytype($tag, $type, $page);


    }else if(is_numeric($this->uri->segment($index+1))){
      ////////////////////////////
      // hotel/page
      // algorithm : http://www/hotel/2
      // algorithm : http://www/hotel/tag/page          
      // sample : http://uastravel.com/hotel/10
      ////////////////////////////
      $page = $this->uri->segment($index+1); //2
      $tag = 0;
      $type = 0;
      $subtype = 0; 
      //echo "hotel/".$page;

      $this->user_list($page); 

    }else if($this->uri->segment($index+1)){
      ////////////////////////////
      // tag
      // algorithm : http://www/hotel/2 
      // algorithm : http://www/hotel/tag       
      // sample : http://uastravel.com/hotel/halfday
      ////////////////////////////
      $page = 0;
      $tag = $this->uri->segment($index+1); //2
      $type = 0;
      $subtype = 0; 
      //$call = "tag";

      $this->user_listbytag($tag, $page);      

    }else{
      ////////////////////////////
      // hotel
      // algorithm : http://www/hotel
      // algorithm : http://www/hotel       
      // sample : http://uastravel.com/hotel
      ////////////////////////////
      $page = 0;
      $tag = 0;
      $cat = 0;
      $subcat = 0;      
      //echo "hotel";

      $this->user_list($page);      
    }

  }

  function user_test(){
      $this->_fetch('user_test', "", false, true);
  }
  
  function _hotel_menu($argTag=false, $argType=false, $argSubType=false){

    if($argTag){
      //hotel & tag
      //Query tag_name by tag_url
      $tag["url"] = $argTag;
      $this->load->model("tag_model", "tagModel");        
      $tagQuery = $this->tagModel->getRecord($tag);
      unset($tag);
      //print_r($tagQuery); exit;

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
		$type["type_id"] = 4; 
		$this->load->model("tagtype_model", "tagtypeModel");   
		$menuQuery = $this->tagtypeModel->getRecord($type);
		//print_r($menuQuery); exit;

		//Query type_id by parent_id 
		$parent["parent_id"] = $type["type_id"];
		$this->load->model("type_model", "typeModel");
		$parenttypeQuery = $this->typeModel->getRecord($parent);
		//print_r($parenttypeQuery); exit;  

		//Query tagname by type_id (Submenu)
    if(!empty($parenttypeQuery[0]->id)){
      $type["type_id"] = $parenttypeQuery[0]->id;
    }
		
		$this->load->model("tagtype_model", "tagtypeModel");   
		$subMenuQuery = $this->tagtypeModel->getRecord($type); 
		//print_r($subMenuQuery); exit;
	}
	  
    //Query tagname by type_id (Menu)
    $count = 0;
    $menu_select_all = true;
    foreach ($menuQuery as $key => $value) {
      //Menu Tag
	    $return["menu"][$count] = new stdClass();
      $return["menu"][$count]->tag_id = $value->id;
      $return["menu"][$count]->name = $value->name;
      $return["menu"][$count]->url = $value->url;

      //Select element
      if($argType && $argType == $value->url){
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
        $return["submenu"][$count]->tag_id = $value->id;
        $return["submenu"][$count]->name = $value->name;
        $return["submenu"][$count]->url = $value->url;

        //Select element
        if($argType && $argType == $value->url){
          $return["submenu"][$count]->select = 1;
          $submenu_select_all = false;
        }else if($argSubType && $argSubType == $value->url){
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

  function _hotel_list($tags){

    $count = 0;
    $this->load->model("taghotel_model", "taghotelModel");
    $hotel = $this->taghotelModel->getRecord($tags);

    //print_r($this->_shuffle_assoc($hotel)); exit;

    if(!empty($hotel)){
      return $this->_shuffle_assoc($hotel);
    }else{
      return ;
    }
  }  

  function user_list($page=0){

    //echo "Call user_list()"; exit;

    $data = $this->_hotel_menu();
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }  

    //////////////////////////////////////////////////////
    // List all 
    // algorithm : localhost/uastravel/hotel/page
    // example : localhost/uastravel/hotel/
    //           localhost/uastravel/hotel/2
    //           localhost/uastravel/hotel/3
    //////////////////////////////////////////////////////
    //Filter all
    $query["tag_id"] = $query["menu"];
    $query["join"] = true;
    $query["in"] = true;
    $query["per_page"] = $this->per_page;
    $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;   

    //Send tag for get data
    //$data["hotel"] = $this->_hotel_list($query);

    //Get hotel
    $this->load->model("taghotel_model", "taghotelModel");
    $hotel = $this->taghotelModel->getRecordFirstpage($query);

    //print_r($this->_shuffle_assoc($hotel)); exit;

    if(!empty($hotel)){
      $data["hotel"] =  $this->_shuffle_assoc($hotel);
    }   

    //print_r($data); exit;

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

  function user_listbytag($tag=false, $page=0){

    //echo "Call user_listbytag()"; exit;

    //Check menu is active
    if(empty($tag)){
      $data= $this->_hotel_menu();
    }else{
      $data= $this->_hotel_menu($tag);
    }
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }  
    //print_r($data); exit;
    $argTag["url"] = $tag;
    $this->load->model("tag_model", "tagModel");      
    $tagQuery = $this->tagModel->getRecord($argTag);

      //print_r($tagQuery); exit;
    if(!empty($tagQuery)){
      $query["tag_id"] = $tagQuery[0]->id;
      $query["join"] = true;
      $query["per_page"] = $this->per_page;
      $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;    

      //Get hotel by tag
      $this->load->model("taghotel_model", "taghotelModel");
      $data["hotel"] = $this->taghotelModel->getRecordByTag($query);      
      //$data["hotel"] = $this->_hotel_list($query);
    }else{
      $data["hotel"] = false;
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

  function user_listbytype($tag=false, $type=false, $page=0){


    //echo "Call user_listbytype()"; exit;

    $data = $this->_hotel_menu($tag, $type);

    //print_r($data); exit;
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $this->load->model("tag_model", "tagModel");   

    $argTag["url"] = $tag;      
    $tagQuery = $this->tagModel->getRecord($argTag); 
    $argType["url"] = $type;      
    $typeQuery = $this->tagModel->getRecord($argType);
    //print_r($query); exit;



    if(!empty($tagQuery)  && !empty($typeQuery)){

      $query["tag_id"] = $tagQuery[0]->id;
      $query["type_id"] = $typeQuery[0]->id;

      $query["join"] = true;
      $query["per_page"] = $this->per_page;
      $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;    
      //Hotel
      $this->load->model("taghotel_model", "taghotelModel");  
      $data["hotel"] = $this->taghotelModel->getRecordByType($query);
    }else{
      $data["hotel"] = false;
    }

    //print_r($data); exit;

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


  function user_listbysubtype($tag=false, $type=false, $subtype=false, $page=0){


    //echo "Call user_listbytype()"; exit;

    $data = $this->_hotel_menu($tag, $type, $subtype);

    //print_r($data); exit;
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $this->load->model("tag_model", "tagModel");   

    $argTag["url"] = $tag;      
    $tagQuery = $this->tagModel->getRecord($argTag); 

    $argType["url"] = $type;      
    $typeQuery = $this->tagModel->getRecord($argType);

    $argSubType["url"] = $subtype;      
    $subTypeQuery = $this->tagModel->getRecord($argSubType);

    //var_dump($typeQuery); exit;

    if(!empty($tagQuery) && !empty($typeQuery) && !empty($subTypeQuery) ){
      
      $query["tag_id"] = $tagQuery[0]->id;
      $query["type_id"] = $typeQuery[0]->id;
      $query["subtype_id"] = $subTypeQuery[0]->id;

      $query["join"] = true;
      $query["per_page"] = $this->per_page;
      $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;    
      //Hotel
      $this->load->model("taghotel_model", "taghotelModel");  
      $data["hotel"] = $this->taghotelModel->getRecordBySubType($query);
    }else{
      $data["hotel"] = false;
    }

    //print_r($data); exit;

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


    $data = $this->_hotel_menu();
    if(!empty($keyword["search"])){

      foreach ($data["menu"] as $key => $valueTag) {
        $query["menu"][] = $valueTag->tag_id;
      }

      $query["tou_name"] = $keyword["search"];
      $query["user_search"] = true; 

      $data["hotel"] = $this->hotelModel->searchRecord($query);
      $data["search"] = $keyword["search"];

      $this->_fetch('user_list', $data, false, true); 

    }else{
      $this->_fetch('user_list', $data, false, true); 
    }
  }


  function user_view($id=false){

    if($id){    
      //Hotel
      $hotel["id"] = $id;
      $taghotel["hotel_id"] = $id;
      $agencyhotel["hotel_id"] = $id; 
      $agencyhotel["event"] = "display";
      $extendprice["prh_hotel_id"] = $id;  
      $data["hotel"] = $this->hotelModel->getRecord($hotel); 

      //Check has hotel
      if(count($data["hotel"]) < 1  || empty($data["hotel"])){
        show_404(); 
      }

      //Check translate
      if(empty($data["hotel"][0]->name)){
        show_404(); 
      }

      //Tag
      $this->load->model("taghotel_model", "taghotelModel");
      $taghotelQuery["tag"] = $this->taghotelModel->getRecord($taghotel);
      if(!empty($taghotelQuery["tag"])){
        //TagHotel
        $count = 0;
        foreach ($taghotelQuery["tag"] as $key => $value) {
          $this->load->model("tag_model", "tagModel");

          $tag["id"] = $value->tag_id;
          $query["menu"][] = $value->tag_id;
          $tagQuery = $this->tagModel->getRecord($tag);
          $data["tag"][] = $tagQuery[0];
          $count++;
        }

        //Related Hotel
        $query["hotel_id"] = $id;
        $query["tag_id"] = $query["menu"];
        $query["hotel_tag"] = $data["tag"];
        $query["mainper_page"] = 3;
        $query["per_page"] = 5;
        $query["offset"] = 0;
        $data["related"] = $this->taghotelModel->getRecordRelated($query);


        //print_r($related); exit;
      }


      //Price

      //print_r($agencyhotel); exit;
      $this->load->model("pricehotel_model", "pricehotelModel");
      $priceQuery = $this->pricehotelModel->getRecord($agencyhotel);

      //exit;
      if(!empty($priceQuery)){

        //Duplicate agency
        $duplicateArray = array();
        foreach ($priceQuery as $value){
          if (isset($duplicateArray[$value->agency_id]))
              $duplicateArray[$value->agency_id]++;
          else
              $duplicateArray[$value->agency_id] = 1;
        }

        //Main price
        foreach ($duplicateArray as $keyAgencyID => $valueAgncyID) {
          $name_length = 99999;
          foreach ($priceQuery as $key => $value) {
            if($value->agency_id == $keyAgencyID){

              if(!empty($value->name)){
                if(strlen($value->name) < $name_length){
                  $mainPrice[$keyAgencyID] =  $value;
                  $name_length = strlen($value->name);
                }
              }
            }
          }
        }

        if(!empty($mainPrice)){
          //Max price
          $maxSalePrice = 0;
          $maxSalePriceID = 0;
          foreach ($mainPrice as $key => $value) {         
            if($value->sale_adult_price > $maxSalePrice){
              $maxSalePriceID  = $value->agency_id;
              $maxSalePrice = $value->sale_adult_price;
            }
          }

          //Price selection
          foreach ($priceQuery as $key => $value) {
            if($value->agency_id == $maxSalePriceID){
              $data["price"][] = $value;
            }
          } 

        }       


      }//End price


      //Images
      $this->load->model("images_model", "imagesModel");
      $data["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$id,'table_id'=>3)));
      //print_r($data["images"]);exit;


      if(!empty($data)){
        //Return
        $this->_fetch('user_view', $data, false, true);
      }else{
        show_404(); 
      }

    }else{
      show_404();        
    }

  }//End user_view function



  function user_inquiry($args){

    
    if($args["id"]){   

      //Hotel

      $hotel["id"] = $args["id"];
      $taghotel["hotel_id"] = $args["id"];
      $agencyhotel["hotel_id"] = $args["id"];    
      //$hotel["field"] = "tou_id, tou_code, tou_name, tou_url, tou_first_image, tou_short_description";     
      $data["hotel"] = $this->hotelModel->getRecord($hotel); 

      if(count($data["hotel"]) < 1  || empty($data["hotel"])){
        show_404(); 
      }


      //Tag
      $this->load->model("taghotel_model", "taghotelModel");
      $taghotelQuery["tag"] = $this->taghotelModel->getRecord($taghotel);
      if(!empty($taghotelQuery["tag"])){
        //TagHotel
        $count = 0;
        foreach ($taghotelQuery["tag"] as $key => $value) {
          $this->load->model("tag_model", "tagModel");

          $tag["id"] = $value->tag_id;
          $query["menu"][] = $value->tag_id;
          $tagQuery = $this->tagModel->getRecord($tag);
          $data["tag"][] = $tagQuery[0];
          $count++;
        }

        //Related Hotel
        $query["hotel_id"] = $args["id"];
        $query["tag_id"] = $query["menu"];
        $query["hotel_tag"] = $data["tag"];
        $query["mainper_page"] = 3;
        $query["per_page"] = 4;
        $query["offset"] = 0;
        $data["related"] = $this->taghotelModel->getRecordRelated($query);


        //print_r($related); exit;
      }


      //print_r($data);  exit;

      //Price compute
      if(!empty($args["pricehotel_id"])){
        $this->load->model("pricehotel_model", "pricehotelModel");
        foreach ($args["pricehotel_id"] as $key => $value) {
          $price["id"] = $value; 
          $queryPrice = $this->pricehotelModel->getRecord($price);
          $queryPriceID = $queryPrice[0]->id;
          $dataPrice[$queryPriceID] = $queryPrice[0];
          //$dataPrice["price"][$queryPriceID] = $queryPrice[0];
          //print_r($dataPrice); exit;
          //$data["price"][$queryPriceID] = $queryPrice[0];
          $adult_amount_booking = $args["adult_amount_booking"][$queryPriceID];
          $child_amount_booking = $args["child_amount_booking"][$queryPriceID];

          $data["price"][$queryPriceID]["prh_id"] = $queryPriceID;
          $data["price"][$queryPriceID]["prh_agency_id"] = $dataPrice[$queryPriceID]->agency_id;
          $data["price"][$queryPriceID]["prh_hotel_id"] = $dataPrice[$queryPriceID]->hotel_id;
          $data["price"][$queryPriceID]["prh_name"] = $dataPrice[$queryPriceID]->name;
          $data["price"][$queryPriceID]["prh_sale_adult_price"] = $dataPrice[$queryPriceID]->sale_adult_price;
          $data["price"][$queryPriceID]["prh_net_adult_price"] = $dataPrice[$queryPriceID]->net_adult_price;
          $data["price"][$queryPriceID]["prh_discount_adult_price"] = $dataPrice[$queryPriceID]->discount_adult_price;
          $data["price"][$queryPriceID]["prh_sale_child_price"] = $dataPrice[$queryPriceID]->sale_child_price;
          $data["price"][$queryPriceID]["prh_net_child_price"] = $dataPrice[$queryPriceID]->net_child_price;
          $data["price"][$queryPriceID]["prh_discount_child_price"] = $dataPrice[$queryPriceID]->discount_child_price;
          $data["price"][$queryPriceID]["prh_adult_amount_booking"] = $adult_amount_booking;
          $data["price"][$queryPriceID]["prh_child_amount_booking"] = $child_amount_booking;

          $total_adult_price = $adult_amount_booking * $dataPrice[$queryPriceID]->sale_adult_price;
          $total_child_price = $child_amount_booking * $dataPrice[$queryPriceID]->sale_child_price;
          $data["price"][$queryPriceID]["prh_total_adult_price"] = $total_adult_price;
          $data["price"][$queryPriceID]["prh_total_child_price"] = $total_child_price;
          $data["price"][$queryPriceID]["prh_total_price"] = $total_adult_price + $total_child_price;
          
        }
      }



      print_r($data["price"]); exit;

      //print_r($data); exit;
      //Return
      if(!empty($data)){
        $this->_fetch('user_inquiry', $data, false, true);
      }else{
        show_404(); 
      }


    }else{ //id not send
      show_404();  
    }

  }//End user_booking


  function user_booking($args){

    //print_r($args); exit;

    if(!empty($args)){

      $this->load->model("hotelcustomer_model", "hotelcustomerModel");
      $booking = $this->hotelcustomerModel->addRecord($args);


      //print_r($booking); exit;
      //Send Mail
      $this->sendmail_booking_user($booking);
      $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url("hotel/booking/".$booking["toc_hashcode"]));  

      //print_r($insert_id); exit;
    }else{ //id not send
      //Redirect
      redirect(base_url("hotel/inquiry/".$args["id"]));    
    }


  }

  function sendmail_booking_user($booking){


    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: คุณ '.$booking["toc_firstname"].' <'.$booking["toc_email"].'>' . "\r\n";
    $headers .= 'From: uastravel.com <booking@uastravel.com>' . "\r\n";

    $to = $booking["toc_email"];


    $subject = "คุณได้ทำการจอง ".$booking["toc_hotel_name"]." ผ่านทาง uastravel.com";


    $message = '<p>สวัสดีค่ะ คุณ'.$booking["toc_firstname"].',</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="http://www.uastravel.com">uastravel.com</a></p>';
    $message .='<p>รายละเอียดการจองทัวร์ของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["toc_code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking["toc_hotel_name"].'('.$booking["toc_hotel_code"].')';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/hotel/'.$booking["toc_hotel_url"].'-'.$booking["toc_hotel_id"].'">'.$booking["toc_hotel_name"].'</a>';


    $message .='  <br />##########  จำนวนผู้เดินทาง ##########';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["toc_adult_amount_passenger"];
    $message .='  <br />จำนวนเด็ก : '.$booking["toc_child_amount_passenger"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["toc_infant_amount_passenger"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดราคา ##########';
    foreach ($booking["price"] as $key => $value) {
      $message .='  <br />';
      $message .='  <br />ชื่อราคา : '.$value["tob_pricehotel_name"];
      $message .='  <br />ราคารวมของผู้ใหญ่ ('.$value["tob_adult_amount_booking"].') : '.$value["tob_total_adult_price"];
      $message .='  <br />ราคารวมของเด็ก ('.$value["tob_child_amount_booking"].') : '.$value["tob_total_child_price"];
      $message .='  <br />ราคารวมของทารก : ฟรี';
      $message .='  <br />';
    }

    $message .='  <br />ราคารวมทั้งหมด : '.$booking["toc_grand_total_price"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["toc_firstname"].' '.$booking["toc_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["toc_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["toc_address"].', '.$booking["toc_city"].', '.$booking["toc_province"].', '.$booking["toc_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["toc_telephone"];
    $message .='  <br />อีเมล : '.$booking["toc_email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking["toc_hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking["toc_room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking["toc_tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["toc_request"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/hotel/booking/'.$booking["toc_hashcode"].'">'.$booking["toc_code"].'</a>';
    $message .='  <br />';
    $message .='</blockquote>';   

    $message .= '<p>หากมีข้อสงสัยกรุณาสอบถามเพิ่มเติม 082-8121146 หรือ 076-331280</p>
        <p>หจก.ยูแอสทราเวล (ใบอนุญาตเลขที่ 34/000837)</p>
        <p>เรายินดีให้บริการค่ะ</p>        
          <a href="http://uastravel.com">uastravel.com</a>
          <br />โทร.  082-8121146 หรือ 076-331280
          <br />แฟกซ์. 076-331273
          <br />80/86 หมู่บ้านศุภาลัยซิตี้ฮิลล์ ม.3
          <br />ต.รัษฎา อ.เมือง ภูเก็ต 83000
      ';        


    //echo $message; exit;
    mail($to,$subject,$message,$headers);
  }

  function sendmail_booking_admin($booking){

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: booking@uastravel.com <booking@uastravel.com >' . "\r\n";
    $headers .= 'From: uastravel.com <info@uastravel.com>' . "\r\n";

    $to = "booking.uastravel@gmail.com";



    // subject
    $subject = 'ข้อมูลการจองทัวร์ของคุณ '.$booking["toc_firstname"];

    $message ='<p>รายละเอียดการจองทัวร์มีดังนี้</p>';
    $message .='<blockquote>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["toc_code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking["toc_hotel_name"].'('.$booking["toc_hotel_code"].')';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/hotel/'.$booking["toc_hotel_url"].'-'.$booking["toc_hotel_id"].'">'.$booking["toc_hotel_name"].'</a>';


    $message .='  <br />##########  จำนวนผู้เดินทาง ##########';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["toc_adult_amount_passenger"];
    $message .='  <br />จำนวนเด็ก : '.$booking["toc_child_amount_passenger"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["toc_infant_amount_passenger"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดราคา ##########';
    foreach ($booking["price"] as $key => $value) {
      $message .='  <br />';
      $message .='  <br />ชื่อราคา : '.$value["tob_pricehotel_name"];
      $message .='  <br />ราคารวมของผู้ใหญ่ ('.$value["tob_adult_amount_booking"].') : '.$value["tob_total_adult_price"];
      $message .='  <br />ราคารวมของเด็ก ('.$value["tob_child_amount_booking"].') : '.$value["tob_total_child_price"];
      $message .='  <br />ราคารวมของทารก : ฟรี';
      $message .='  <br />';
    }

    $message .='  <br />ราคารวมทั้งหมด : '.$booking["toc_grand_total_price"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["toc_firstname"].' '.$booking["toc_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["toc_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["toc_address"].', '.$booking["toc_city"].', '.$booking["toc_province"].', '.$booking["toc_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["toc_telephone"];
    $message .='  <br />อีเมล : '.$booking["toc_email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking["toc_hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking["toc_room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking["toc_tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["toc_request"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/hotel/booking/'.$booking["toc_hashcode"].'">'.$booking["toc_code"].'</a>';
    $message .='  <br />';
    $message .='</blockquote>';   


    //echo $message; exit;
    mail($to,$subject,$message,$headers);
  }


  function user_bookingview($hashcode){

    $args["toc_hashcode"] = $hashcode;

    $this->load->model("hotelcustomer_model", "hotelcustomerModel");
    $data["booking"] = $this->hotelcustomerModel->getRecord($args);  


    $this->load->model("hotelbooking_model", "hotelbookingModel");
    $args["tob_hotelcustomer_id"] = $data["booking"][0]->toc_id;
    $data["booking"][0]->price = $this->hotelbookingModel->getRecord($args); 


    //print_r($data["booking"]); exit;

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

      //$field["field"] = "hot_id, hott_name, hott_url, hot_first_image, hot_display";
      $data["hotel"] = $this->hotelModel->getRecord();
      //echo $this->db->last_query();
      //print_r($data["hotel"]); exit;

      if($data["hotel"]){
          $count = 0;
          foreach ($data["hotel"] as $key => $value) {

            $query["join"] = true;        
            $query["hotel_id"] = $value->id;

            $result["hotel"][$count]["hotel"] = $value;

            $this->load->model("taghotel_model","taghotelModel");  
            $result["hotel"][$count]["tag"] = $this->taghotelModel->getRecord($query);  

            $count++;       
           } 

          //print_r($result); exit;
          $this->_fetch('admin_list', $result);

        }else{
          $result = false;
          $this->_fetch('admin_list', $result);
        }
   }

  function admin_create($id=false){
    //implement code here  

    //Get argument from post page
    $args = $this->input->post();


    //Send argument to validate function
    $validate = $this->validate($args);


    $this->load->model("tag_model","tagModel"); 
    $field = "tag_id, tag_name";  
    $data["tag"] = $this->tagModel->getRecord(false, $field);   


    $this->load->model("agency_model","agencyModel"); 
    $field = "agn_id, agn_name";  
    $data["agency"] = $this->agencyModel->getRecord(false, $field);   




         
    //////////
    //Query 
    /////////
    if($id){

      //Query data by hotel_id
      $args["id"] = $id;      
      $data["hotel"] = $this->hotelModel->getRecord($args);

      

      //print_r($data["hotel"]); exit;
      //Check update     
      if(count($data["hotel"])>0){

        $this->load->model("pricehotel_model", "pricehotelModel");  
        $agency["hotel_id"] = $id; 
        $agency["distinct"] = 1;
        $agency["distinct_field"] = "prh_agency_id";
        $queryPrice = $this->pricehotelModel->getRecord($agency);  


        //print_r($this->db->last_query()); exit;
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
                $price["hotel_id"] = $id;
                $price["agency_id"] = $valueAgency->agency_id;
                $queryPrice = $this->pricehotelModel->getRecord($price); 
                //echo $this->db->last_query(); exit;
                $data["price"][$count]["pricehotel_data"] = $queryPrice;
                $countPrice++;
              } 

            }

            //print_r($data["price"]); exit;

            $count++;
            
          }
        }

        //print_r($data["price"]); exit;
        //Tag
        $this->load->model("taghotel_model", "taghotelModel");  
        $tagHotel["hotel_id"] = $id;
        $data["tagHotel"] = $this->taghotelModel->getRecord($tagHotel, $field);  

        //echo $this->db->last_query(); exit;
        //print_r($data["tagHotel"]); exit;
        if(!empty($data["tagHotel"]) && $data["tagHotel"]){
          //$this->load->model("tag_model", "tagModel");  
          foreach ($data["tagHotel"] as $key => $value) {
            //echo $value->tag_id; echo "<br>";
            $this->load->model("tag_model"," tagModel"); 
            $tagHotel["id"] = $value->tag_id;
            $tag_result = $this->tagModel->getRecord($tagHotel);
            $data["tag_query"][] = $tag_result[0];
          }
        }
        


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

        $this->load->model("tag_model","tagModel"); 
        $field = "tag_id, tag_name";  
        $data["tag"] = $this->tagModel->getRecord(false, $field);   

        $this->_fetch('admin_create', $data);
      }else{


        //print_r($args); exit;
        //print_r($args); exit;
        ////////////////////////////////////////////
        //Add (Hotel) main table 
        ////////////////////////////////////////////
        $insertID =  $this->hotelModel->addRecord($args);
        

        $this->_uploadImage($insertID);
        
        ////////////////////////////////////////////
        //Update images parent_id 
        //////////////////////////////////////////// 
        if(!empty($insertID)){
          $this->load->model("images_model","imagesModel"); 
          $options = array(
                            'where'=>array(
                                          'parent_id'=>$args['fakeid']
                                          ),
                            'set'=>array(
                                          'parent_id'=>$insertID)
                          );
          $this->imagesModel->update($options);
        }

        ////////////////////////////////////////////
        //Add (AgencyHotel) relationship data table 
        ////////////////////////////////////////////  
        //print_r($args["price"]); exit;
        if(!empty($args["price"])){
          $this->load->model("pricehotel_model","pricehotelModel"); 
          $count = 0;

          foreach ($args["price"] as $keyAgencyId => $valueAgency) {
            foreach ($valueAgency as $keyPriceId => $valuePriceId) {
              foreach ($valuePriceId as $keyPrice => $valuePrice) {
                $price[$count]["hotel_id"]   = $insertID;
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

          //print_r($price); exit;
          $this->pricehotelModel->addMultipleRecord($price);


          //print_r($args); exit;

        }



        ////////////////////////////////////////////
        //Add (TagHotel) relationship data table 
        ////////////////////////////////////////////        
        $this->load->model("taghotel_model", "tagHotelModel");
        $count = 0; 
        $tagHotel = false;
        
        $this->load->model("tag_model", "tagModel");
        $tagArray = $this->tagModel->cleanTagAndAddTag($args["tags"]);
        foreach ($tagArray as $key => $value) {
          $tagHotel[$count]["tag_id"] = $value->id;
          $tagHotel[$count]["hotel_id"] = $insertID;
          $count++;
        }
        $this->tagHotelModel->addMultipleRecord($tagHotel);
        
        //Redirect
        redirect(base_url("admin/hotel/"));
      }
    }

  }

  function admin_view($tag=false, $hotelname=false){
    //implement code here

     //Get argument from url
    $hotel["name"] = $hotelname;
    $tag["name"] = $tag;



    if($tag["name"] && $hotel["name"]){
      echo "tag && hotel";
    }else if($tag["name"]){
      ////////////////////////////////////////////
      //Get tag data
      ////////////////////////////////////////////        
      $this->load->model("tag_model", "tagModel");
      $tagQuery["tag"] = $this->tagModel->getRecord($tag);
      $tagArgument["tag_id"] = $tagQuery["tag"][0]->id;
      //print_r($data["tag"][0]); exit;

      ////////////////////////////////////////////
      //Get taghotel data
      ////////////////////////////////////////////        
      $this->load->model("taghotel_model", "taghotelModel");
      $taghotelQuery["tag"] = $this->taghotelModel->getRecord($tagArgument);

      $count = 0;
      foreach ($taghotelQuery["tag"] as $key => $value) {
        # code...
        $hotel["id"] = $value->hotel_id;

        $hotelQuery = $this->hotelModel->getRecord($hotel);  
        $data["hotel"][$count] = $hotelQuery[0];
        $data["hotel"][$count]->tag_id = $value->tag_id;
        $data["hotel"][$count]->tag_name = $tagQuery["tag"][0]->name;
        $count++;
      }


      ////////////////////////////////////////////
      //Get hotel data
      //////////////////////////////////////////// 
      //print_r($data) ; exit;
      $this->_fetch('list', $data);
      //$this->_fetch('userview', $data, false, true);          
    }
  }

  function admin_update(){


    //echo "Call admin_update"; exit;
    //Get argument from post page
    header ('Content-type: text/html; charset=utf-8');
    $args = $this->input->post();
    //$args["url"] = Util::url_title($args["name"])."-".$args["id"];

    //print_r($args); exit;

    //$args["tag"] =
    //Send argument to validate function
    $validate = $this->validate($args);



    if($args["id"]) {

        //Update & get current hotel id
        $updateHotelID = $this->hotelModel->updateRecord($args);
        ////////////////////////////////////////////
        //Add (TagHotel) relationship data table 
        ////////////////////////////////////////////  
        if(!empty($args["tags"])){ 

          if($args["tags"] == "[]"){ 
            $hotel["hotel_id"] = $args["id"];
            $this->load->model("taghotel_model", "tagHotelModel");
            $this->tagHotelModel->deleteRecord($hotel);

          }else{        
            $this->load->model("taghotel_model", "tagHotelModel");
            $this->tagHotelModel->updateRecord($args);
          }
        }


        //print_r($args["price"]); exit;
        if(!empty($args["price"])){
          $this->load->model("pricehotel_model","pricehotelModel"); 
          $count = 0;
          $price["hotel_id"] = $args["id"];
          foreach ($args["price"] as $keyAgencyId => $valueAgency) {
            foreach ($valueAgency as $keyPriceId => $valuePriceId) {
              foreach ($valuePriceId as $keyPrice => $valuePrice) {

                $price["price"][$count]["id"]   = $keyPriceId;
                $price["price"][$count]["hotel_id"]   = $args["id"];
                $price["price"][$count]["agency_id"] = $keyAgencyId;
                $price["price"][$count]["lang"]   = $this->lang->lang();
                $price["price"][$count]["name"] = $valuePrice["name"];
                $price["price"][$count]["sale_adult_price"] = $valuePrice["sale_adult_price"];
                $price["price"][$count]["net_adult_price"] = $valuePrice["net_adult_price"];
                $price["price"][$count]["discount_adult_price"] = $valuePrice["discount_adult_price"];
                $price["price"][$count]["sale_child_price"] = $valuePrice["sale_child_price"];
                $price["price"][$count]["net_child_price"] = $valuePrice["net_child_price"];
                $price["price"][$count]["discount_child_price"] = $valuePrice["discount_child_price"];
                //$pricehotel_id = $this->pricehotelModel->addRecord($price["price"][$count]);

                $count++;  
              }
            }
          }     
          //print_r($price); exit;
          $this->pricehotelModel->updateRecord($price);          
        }else{
          $this->load->model("pricehotel_model", "pricehotelModel");
          $hotel["hotel_id"] = $args["id"];
          $this->pricehotelModel->deleteRecord($hotel);
        }

        $this->_uploadImage($args["id"]);
        //Redirect
        redirect(base_url("admin/hotel")); 
    } else {
        $this->hotelModel->addRecord($args);
        //Redirect
        redirect(base_url("admin/hotel")); 
    } 

  } 

  function admin_delete($id=false){
    //implement code here
    if($id) {

        $this->hotelModel->deleteRecord($id);

        $args["hotel_id"] = $id;

        //Delete tag
        $this->load->model("taghotel_model", "taghotelModel");
        $this->taghotelModel->deleteRecord($id);

        //Delete agency
        $this->load->model("pricehotel_model", "pricehotelModel");
        $this->pricehotelModel->deleteRecord($id);

        //Delete Images
        $this->load->model("images_model", "imagesModel");
        $this->imagesModel->delete(array(
                                        'parent_id' => $id ,
                                        'table_id' => 2
                                        )
                                   );
        
        //Redirect
        redirect(base_url("admin/hotel"));      
    } 
  }  

  function admin_createtag($tag=false, $hotel=false){
    //implement code here 

    if($tag && $hotel){
      $argTag["name"] = $tag; 
      $this->load->model("tag_model", "tagModel");     
      $tagQuery = $this->tagModel->getRecord($argTag);

      $hotels = explode("-", $hotel);

      $this->load->model("taghotel_model", "taghotelModel");
      foreach ($hotels as $key => $value) {
        $args['tag_id']  = $tagQuery[0]->id;
        $args['hotel_id'] = $value[0];

        $taghotel = $this->taghotelModel->getRecord($args);

        if(empty($taghotel)){
          //Add
          $this->taghotelModel->addRecord($args);
          echo "insert finished.";
        }else{
          //Delete
          $this->taghotelModel->deleteRecord($args);
          echo "delete finished.";
        }
      }


    }
  }

  function admin_setdisplay(){
    //Get argument from post page
    $args = $this->input->post();
    $this->hotelModel->updateDisplayRecord($args);
    print_r($args); exit();
  }

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'hotel name', 'required');
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

      $data["menu"]= $this->_hotel_menu();

      foreach ($data["menu"] as $key => $valueTag) {
        $query["menu"][] = $valueTag->tag_id;
      }

      $query["tou_name"] = $keyword["search"];
      $query["user_search"] = true; 

      $data["hotel"] = $this->hotelModel->searchRecord($query);
      $data["search"] = $keyword["search"];

      $this->_fetch('user_list', $data, false, true);


    }else if($keyword && $render == "admin_list"){
      $args["tou_name"] = $keyword["search"];
      $hotel = $this->hotelModel->searchRecord($args);

      //print_r($data["hotel"]); exit;
      $count = 0;
      foreach ($hotel as $key => $value) {

        $query["join"] = true;        
        $query["hotel_id"] = $value->id;

        $data["hotel"][$count]["hotel"] = $value;

        $this->load->model("taghotel_model","taghotelModel");  
        $data["hotel"][$count]["tag"] = $this->taghotelModel->getRecord($query);  

        $count++;       
       } 

      $this->_fetch($render, $data);
    }else{
      return;
    }
 
  }
  
  function _uploadImage($HotelID=""){
    if(empty($HotelID)){
      return FALSE;
    }
    
    //Upload and update Images
    $this->load->library('upload');
    $dir = Hash::make("hotel_images")->hash(md5($HotelID));
    
    if(!file_exists($dir)){
      mkdir($dir, 0755,true);
    }
    
    if(empty($_FILES['first_image']["name"]) AND empty($_FILES['background_image']["name"]) AND empty($_FILES['banner_image']["name"])){
      return FALSE;
    }
    
    if(!empty($_FILES['first_image']["name"])){
      if(file_exists($dir."/".md5($HotelID)."_first.jpg")){
        Util::rrmdir($dir."/".md5($HotelID)."_first.jpg");
        
      }
      
      $config[0]['upload_path'] = $dir;
      $config[0]['allowed_types'] = 'gif|jpg|png';
      $config[0]['file_name'] = md5($HotelID)."_first.jpg";
      $this->upload->initialize($config[0]);
      $this->upload->do_upload("first_image");
      $_firstImg = $this->upload->data();
      $imgData["first_image"] = base_url("/".$dir."/".$_firstImg["file_name"]);
      
    }

    
    if(!empty($_FILES['background_image']["name"])){
      if(file_exists($dir."/".md5($HotelID)."_background.jpg")){
        Util::rrmdir($dir."/".md5($HotelID)."_background.jpg");
      }
      $config[1]['upload_path'] = $dir;
      $config[1]['allowed_types'] = 'gif|jpg|png';
      $config[1]['file_name'] = md5($HotelID)."_background.jpg";
      $this->upload->initialize($config[1]);
      $this->upload->do_upload("background_image");
      $_backgroundImg = $this->upload->data();
      $imgData["background_image"] = base_url("/".$dir."/".$_backgroundImg["file_name"]);
    }

    if(!empty($_FILES['banner_image']["name"])){
      if(file_exists($dir."/".md5($HotelID)."_banner.jpg")){
        Util::rrmdir($dir."/".md5($HotelID)."_banner.jpg");
      }
      $config[2]['upload_path'] = $dir;
      $config[2]['allowed_types'] = 'gif|jpg|png';
      $config[2]['file_name'] = md5($HotelID)."_banner.jpg";
      $this->upload->initialize($config[2]);
      $this->upload->do_upload("banner_image");
      $_bannerImg = $this->upload->data();
      $imgData["banner_image"] = base_url("/".$dir."/".$_bannerImg["file_name"]);
    }
    
    $imgData["id"] = $HotelID;
    return $this->hotelModel->updateRecord($imgData);
  }

}
?>