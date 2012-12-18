<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Controller {

  var $per_page = 20;

  function __construct(){
    parent::__construct();
    $this->lang->load('tour', 'thai');
  }


  function user_index(){
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
        $this->user_inquiry($args['id']); 
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
		$type["type_id"] = $parenttypeQuery[0]->id;
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

  function _tour_list($tags){

    $count = 0;
    $this->load->model("tagtour_model", "tagtourModel");
    $tour = $this->tagtourModel->getRecord($tags);

    //print_r($this->_shuffle_assoc($tour)); exit;

    if(!empty($tour)){
      return $this->_shuffle_assoc($tour);
    }else{
      return ;
    }
  }  

  function user_list($page=0){

    //echo "Call user_list()"; exit;

    $data = $this->_tour_menu();
    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }  

    //////////////////////////////////////////////////////
    // List all 
    // algorithm : localhost/uastravel/tour/page
    // example : localhost/uastravel/tour/
    //           localhost/uastravel/tour/2
    //           localhost/uastravel/tour/3
    //////////////////////////////////////////////////////
    //Filter all
    $query["tag_id"] = $query["menu"];
    $query["join"] = true;
    $query["in"] = true;
    $query["per_page"] = $this->per_page;
    $query["offset"] = ($page>0)?($page-1)*$query["per_page"]:0;   

    //Send tag for get data
    //$data["tour"] = $this->_tour_list($query);

    //Get tour
    $this->load->model("tagtour_model", "tagtourModel");
    $tour = $this->tagtourModel->getRecordFirstpage($query);

    //print_r($this->_shuffle_assoc($tour)); exit;

    if(!empty($tour)){
      $data["tour"] =  $this->_shuffle_assoc($tour);
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
      $data= $this->_tour_menu();
    }else{
      $data= $this->_tour_menu($tag);
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

      //Get tour by tag
      $this->load->model("tagtour_model", "tagtourModel");
      $data["tour"] = $this->tagtourModel->getRecordByTag($query);      
      //$data["tour"] = $this->_tour_list($query);
    }else{
      $data["tour"] = false;
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

    $data = $this->_tour_menu($tag, $type);

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
      //Tour
      $this->load->model("tagtour_model", "tagtourModel");  
      $data["tour"] = $this->tagtourModel->getRecordByType($query);
    }else{
      $data["tour"] = false;
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

    $data = $this->_tour_menu($tag, $type, $subtype);

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
      //Tour
      $this->load->model("tagtour_model", "tagtourModel");  
      $data["tour"] = $this->tagtourModel->getRecordBySubType($query);
    }else{
      $data["tour"] = false;
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

  function user_view($id=false){

    if($id){    
      //Tour
      $tour["id"] = $id;
      $tagtour["tour_id"] = $id;
      $agencytour["tour_id"] = $id;      
      $data["tour"] = $this->tourModel->getRecord($tour); 


      if(count($data["tour"]) < 1  || empty($data["tour"])){
        show_404(); 
      }

      //Tag
      $this->load->model("tagtour_model", "tagtourModel");
      $tagtourQuery["tag"] = $this->tagtourModel->getRecord($tagtour);
      if(!empty($tagtourQuery["tag"])){
        //TagTour
        $count = 0;
        foreach ($tagtourQuery["tag"] as $key => $value) {
          $this->load->model("tag_model", "tagModel");

          $tag["id"] = $value->tag_id;
          $query["menu"][] = $value->tag_id;
          $tagQuery = $this->tagModel->getRecord($tag);
          $data["tag"][] = $tagQuery[0];
          $count++;
        }

        //Related Tour
        $query["tour_id"] = $id;
        $query["tag_id"] = $query["menu"];
        $query["tour_tag"] = $data["tag"];
        $query["mainper_page"] = 3;
        $query["per_page"] = 5;
        $query["offset"] = 0;
        $data["related"] = $this->tagtourModel->getRecordRelated($query);


        //print_r($related); exit;
      }


      //Price
      $this->load->model("agencytour_model", "agencytourModel");
      $agencytourQuery["price"] = $this->agencytourModel->getRecord($agencytour);

      //print_r($agencytourQuery); exit;  
      if(!empty($agencytourQuery["price"])){
        $maxAgencyPrice = 0;
        foreach ($agencytourQuery["price"] as $key => $value) {
          # code...
          if($value->sale_adult_price > $maxAgencyPrice){
            $data["price"][0] = $value;
            $maxAgencyPrice = $value->sale_adult_price;
          }
        }
      }

      //Images
      $this->load->model("images_model", "imagesModel");
      $data["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$id,'table_id'=>2)));
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

  function user_inquiry($id){
    
    if($id){   

      //Tour

      $tour["id"] = $id;
      $tagtour["tour_id"] = $id;
      $agencytour["tour_id"] = $id;    
      $tour["field"] = "tou_id, tou_code, tou_name, tou_url, tou_first_image, tou_short_description";     
      $data["tour"] = $this->tourModel->getRecord($tour); 

      if(count($data["tour"]) < 1  || empty($data["tour"])){
        show_404(); 
      }


      //Tag
      $this->load->model("tagtour_model", "tagtourModel");
      $tagtourQuery["tag"] = $this->tagtourModel->getRecord($tagtour);
      if(!empty($tagtourQuery["tag"])){
        //TagTour
        $count = 0;
        foreach ($tagtourQuery["tag"] as $key => $value) {
          $this->load->model("tag_model", "tagModel");

          $tag["id"] = $value->tag_id;
          $query["menu"][] = $value->tag_id;
          $tagQuery = $this->tagModel->getRecord($tag);
          $data["tag"][] = $tagQuery[0];
          $count++;
        }

        //Related Tour
        $query["tour_id"] = $id;
        $query["tag_id"] = $query["menu"];
        $query["tour_tag"] = $data["tag"];
        $query["mainper_page"] = 3;
        $query["per_page"] = 4;
        $query["offset"] = 0;
        $data["related"] = $this->tagtourModel->getRecordRelated($query);


        //print_r($related); exit;
      }
      //Price
      $agencytour["tour_id"] = $id; 
      $this->load->model("agencytour_model", "agencytourModel");
      $agencytourQuery["price"] = $this->agencytourModel->getRecord($agencytour);
      if(!empty($agencytourQuery["price"])){
        $maxAgencyPrice = 0;
        foreach ($agencytourQuery["price"] as $key => $value) {
          # code...
          if($value->sale_adult_price > $maxAgencyPrice){
            $data["price"][0] = $value;
            $maxAgencyPrice = $value->sale_adult_price;
          }
        }
      }

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



    if(!empty($args)){

      $this->load->model("tourbooking_model", "tourbookingModel");
      $booking = $this->tourbookingModel->addRecord($args);


      //print_r($booking); exit;
      //Send Mail
      $this->sendmail_booking_user($booking);
      $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url("tour/booking/".$booking["tob_hashcode"]));  

      //print_r($insert_id); exit;
    }else{ //id not send
      //Redirect
      redirect(base_url("tour/inquiry/".$args["id"]));    
    }


  }

  function sendmail_booking_user($booking){


    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: คุณ '.$booking["tob_firstname"].' <'.$booking["tob_email"].'>' . "\r\n";
    $headers .= 'From: uastravel.com <booking@uastravel.com>' . "\r\n";

    $to = $booking["tob_email"];


    $subject = "คุณได้ทำการจอง ".$booking["tob_tour_name"]." ผ่านทาง uastravel.com";


    $message = '<p>สวัสดีค่ะ คุณ'.$booking["tob_firstname"].',</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="http://www.uastravel.com">uastravel.com</a></p>';
    $message .='<p>รายละเอียดการจองทัวร์ของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["tob_code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking["tob_tour_name"].'('.$booking["tob_tour_code"].')';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/tour/'.$booking["tob_tour_url"].'-'.$booking["tob_tour_id"].'">'.$booking["tob_tour_name"].'</a>';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["tob_adult_amount"];
    $message .='  <br />จำนวนเด็ก : '.$booking["tob_child_amount"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["tob_infant_amount"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดราคา ##########';
    $message .='  <br />ราคารวมของผู้ใหญ่ : '.$booking["tob_total_adult_price"];
    $message .='  <br />ราคารวมของเด็ก : '.$booking["tob_total_child_price"];
    $message .='  <br />ราคารวมของทารก : ฟรี';
    $message .='  <br />ราคารวมทั้งหมด : '.$booking["tob_total_price"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["tob_firstname"].' '.$booking["tob_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["tob_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["tob_address"].', '.$booking["tob_city"].', '.$booking["tob_province"].', '.$booking["tob_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["tob_telephone"];
    $message .='  <br />อีเมล : '.$booking["tob_email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking["tob_hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking["tob_room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking["tob_tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["tob_request"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/tour/booking/'.$booking["tob_hashcode"].'">'.$booking["tob_code"].'</a>';
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
    $subject = 'ข้อมูลการจองทัวร์ของคุณ '.$booking["tob_firstname"];

    $message ='<p>รายละเอียดการจองทัวร์มีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["tob_code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking["tob_tour_name"].'('.$booking["tob_tour_code"].')';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/tour/'.$booking["tob_tour_url"].'-'.$booking["tob_tour_id"].'">'.$booking["tob_tour_name"].'</a>';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["tob_adult_amount"];
    $message .='  <br />จำนวนเด็ก : '.$booking["tob_child_amount"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["tob_infant_amount"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดราคา ##########';
    $message .='  <br />ราคารวมของผู้ใหญ่ : '.$booking["tob_total_adult_price"];
    $message .='  <br />ราคารวมของเด็ก : '.$booking["tob_total_child_price"];
    $message .='  <br />ราคารวมของทารก : ฟรี';
    $message .='  <br />ราคารวมทั้งหมด : '.$booking["tob_total_price"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["tob_firstname"].' '.$booking["tob_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["tob_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["tob_address"].', '.$booking["tob_city"].', '.$booking["tob_province"].', '.$booking["tob_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["tob_telephone"];
    $message .='  <br />อีเมล : '.$booking["tob_email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking["tob_hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking["tob_room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking["tob_tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["tob_request"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/tour/booking/'.$booking["tob_hashcode"].'">'.$booking["tob_code"].'</a>';
    $message .='  <br />';
    $message .='</blockquote>';  

    //echo $message; exit;
    mail($to,$subject,$message,$headers);
  }

  function user_bookingview($hashcode){

    $args["tob_hashcode"] = $hashcode;

    $this->load->model("tourbooking_model", "tourbookingModel");
    $data["booking"] = $this->tourbookingModel->getRecord($args);    

    //print_r($data); exit;

    $this->_fetch('user_booking', $data, false, true);

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

      $tourField["field"] = "tou_id, tou_name, tou_url, tou_first_image";
      $data["tour"] = $this->tourModel->getRecord($tourField);

      //print_r($data["tour"]); exit;
      $count = 0;
      foreach ($data["tour"] as $key => $value) {

        $query["join"] = true;        
        $query["tour_id"] = $value->id;

        $result["tour"][$count]["tour"] = $value;

        $this->load->model("tagtour_model","tagtourModel");  
        $result["tour"][$count]["tag"] = $this->tagtourModel->getRecord($query);  

        $count++;       
       } 

      //print_r($result); exit;
      $this->_fetch('admin_list', $result);
   }

  function admin_create($id=false){
    //implement code here  

    //Get argument from post page
    $args = $this->input->post();

    //Send argument to validate function
    $validate = $this->validate($args);

    //Load other model
    $this->load->model("language_model","languageModel");  
    $data["language"] = $this->languageModel->getRecord();    


    $this->load->model("tag_model","tagModel"); 
    $field = "tag_id, tag_name";  
    $data["tag"] = $this->tagModel->getRecord(false, $field);   


    $this->load->model("agency_model","agencyModel"); 
    $field = "agn_id, agn_name";  
    $data["agency"] = $this->agencyModel->getRecord(false, $field);   


    //print_r($data["agency"]); exit;

    ///////////////////////
    //Check update (id)
    ///////////////////////
    if($id){
      //Query data by tour_id
      $args["id"] = $id;      
      $data["tour"] = $this->tourModel->getRecord($args);

      //Check update     
      if($data["tour"]>0){

        //Query (AgencyTour) relationship data table by tour_id
        $this->load->model("agencytour_model", "agencytourModel");  
        $agencyTour["tour_id"] = $id;
        $data["agencyTour"] = $this->agencytourModel->getRecord($agencyTour);  
        
        if(!empty($data["agencyTour"])){
          $this->load->model("agency_model", "agencyModel");  
          $field = "agn_id, agn_name"; 
          foreach ($data["agencyTour"] as $key => $value) {
            $agency["id"] = $value->agency_id;
            $queryAgency = $this->agencyModel->getRecord($agency);  
            //print_r($queryAgency);

            $data["agencyTour"][$key]->agency_name = $queryAgency[0]->name;
          }
        } 
           
        //Query (TagTour) relationship data table by tour_id
        $this->load->model("tagtour_model", "tagtourModel");  
        $tagTour["tour_id"] = $id;
        $data["tagTour"] = $this->tagtourModel->getRecord($tagTour, $field);  
        //print_r($data["tagTour"]); exit;
        if(!empty($data["tagTour"]) && $data["tagTour"]){
          //$this->load->model("tag_model", "tagModel");  
          foreach ($data["tagTour"] as $key => $value) {
            //echo $value->tag_id; echo "<br>";
            $this->load->model("tag_model","tagModel"); 
            $tagTour["id"] = $value->tag_id;
            $tag_result = $this->tagModel->getRecord($tagTour);
            $data["tag_query"][] = $tag_result[0];
          }
        }
        
        //Send data to update form
        $this->_fetch('admin_update', $data);
      }else{
        //Send to create form
        $this->_fetch('admin_create', $data);
      }
    
    ///////////////////////
    //End update (id)
    ///////////////////////
    }else{
      if($validate == FALSE){
        //Send to create form

        $this->load->model("tag_model","tagModel"); 
        $field = "tag_id, tag_name";  
        $data["tag"] = $this->tagModel->getRecord(false, $field);   

        $this->_fetch('admin_create', $data);
      }else{

        ////////////////////////////////////////////
        //Add (Tour) main table 
        //////////////////////////////////////////// 
        $insertTourID =  $this->tourModel->addRecord($args);

        //$args["url"] = Util::url_title($args["name"])."-".$insertTourID;
        //$tour["id"] = $insertTourID;
        //$insertTourID =  $this->tourModel->updateRecord($tour);
        

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
        if(!empty($args["agency_tour"])){
          $this->load->model("agencytour_model", "agencytourModel"); 
          foreach ($args["agency_tour"] as $key => $value) {
            $args["agency_tour"][$key]["tour_id"] = $insertTourID;
          }
          $this->agencytourModel->addMultipleRecord($args["agency_tour"]);

        }

        ////////////////////////////////////////////
        //Add (TagTour) relationship data table 
        ////////////////////////////////////////////        
        $this->load->model("tagtour_model", "tagTourModel");
        $count = 0; 
        $tagTour = false;
        
        $this->load->model("tag_model", "tagModel");
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
      echo "tag && tour";
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
      $this->load->model("tagtour_model", "tagtourModel");
      $tagtourQuery["tag"] = $this->tagtourModel->getRecord($tagArgument);

      $count = 0;
      foreach ($tagtourQuery["tag"] as $key => $value) {
        # code...
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
      //print_r($data) ; exit;
      $this->_fetch('list', $data);
      //$this->_fetch('userview', $data, false, true);          
    }
  }

  function admin_update(){


    //Get argument from post page
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

        ///////////////////////////////////////////
        // Update relationship table (AgencyTour)
        ///////////////////////////////////////////   
        if(!empty($args["agency_tour"])){
          $this->load->model("agencytour_model", "agencytourModel");
          $this->agencytourModel->updateRecord($args);
        }else{
          $this->load->model("agencytour_model", "agencytourModel");
          $tour["tour_id"] = $args["id"];
          $this->agencytourModel->deleteRecord($tour);
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
        $this->load->model("tagtour_model", "tagtourModel");
        $this->tagtourModel->deleteRecord($id);

        //Delete agency
        $this->load->model("agencytour_model", "agencytourModel");
        $this->agencytourModel->deleteRecord($id);

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

      $this->load->model("tagtour_model", "tagtourModel");
      foreach ($tours as $key => $value) {
        $args['tag_id']  = $tagQuery[0]->id;
        $args['tour_id'] = $value[0];

        $tagtour = $this->tagtourModel->getRecord($args);

        if(empty($tagtour)){
          //Add
          $this->tagtourModel->addRecord($args);
          echo "insert finished.";
        }else{
          //Delete
          $this->tagtourModel->deleteRecord($args);
          echo "delete finished.";
        }
      }


    }
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

        $this->load->model("tagtour_model","tagtourModel");  
        $data["tour"][$count]["tag"] = $this->tagtourModel->getRecord($query);  

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