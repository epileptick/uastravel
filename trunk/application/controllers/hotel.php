 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends MY_Controller {
  function __construct(){
    parent::__construct();
  }
  

  function user_index(){

    //Check class
    if($this->uri->segment(1) == $this->router->class){
      $index = 1;
    }else if($this->uri->segment(2) == $this->router->class){
      $index = 2;
    }

    //Check path
      if($this->uri->segment($index+1)=="list"){
        $first_tag = $this->uri->segment($index+2);
        $second_tag = $this->uri->segment($index+3);
        $this->user_list($first_tag, $second_tag);

     } else if($this->uri->segment($index+1)=="view"){
        $segment_id = $this->uri->segment($index+2);

      if($segment_id){
        $this->user_view($segment_id);
      }else{
        show_404();
      }
        
    } else if($this->uri->segment($index+1)=="inquiry"){
        $this->user_inquiry();
    }else if($this->uri->segment($index+1) == "booking"){

      $segment_id = $this->uri->segment($index+2);

      if($segment_id){
        $this->user_bookingview($segment_id); 
      }else{
        $args = $this->input->post(); 
        $this->user_booking($args);
      }
    }
  }



 function user_inquiry(){

    $this->_fetch('user_inquiry',false, false, true);

  }

  function user_view($id = 0){

    if($id > 0){
      $this->_fetch('user_view_'.$id, false, false, true);
    }else{
      show_404(); 
    }

  }


  function initHotel(){

    $hotel = array();  
    //Phuket hotel
    $hotel[0]["hot_id"] = "1";
    $hotel[0]["hot_province"] = "ภูเก็ต";
    $hotel[0]["hot_location"] = "กะรน";
    $hotel[0]["hot_name"] = "Diamond Cottage Resort And Spa";
    $hotel[0]["hot_url"] = "view/1/Diamond-Cottage-Resort-And-Spa";
    $hotel[0]["hot_star"] = "2";
    $hotel[0]["hot_firstimage"] = "http://localhost/themes/Travel/images/first_diamond.jpg";


    $hotel[1]["hot_id"] = "2";
    $hotel[1]["hot_province"] = "ภูเก็ต";
    $hotel[1]["hot_location"] = "กะรน";
    $hotel[1]["hot_name"] = "Karon Beach Resort And Spa";
    $hotel[1]["hot_url"] = "view/2/Karon-Beach-Resort-And-Spa";
    $hotel[1]["hot_star"] = "4";
    $hotel[1]["hot_firstimage"] = "http://localhost/themes/Travel/images/first_karonbeach.jpg";


    $hotel[2]["hot_id"] = "3";
    $hotel[2]["hot_province"] = "ภูเก็ต";
    $hotel[2]["hot_location"] = "ป่าตอง";
    $hotel[2]["hot_name"] = "Baumanburi Hotel";
    $hotel[2]["hot_url"] = "Baumanburi Hotel";
    $hotel[2]["hot_star"] = "5";
    $hotel[2]["hot_firstimage"] = "http://localhost/themes/Travel/images/first_diamond.jpg";

    //Phangha
    $hotel[3]["hot_id"] = "4";
    $hotel[3]["hot_province"] = "พังงา";
    $hotel[3]["hot_location"] = "คุระบุรี";
    $hotel[3]["hot_name"] = "kuraburi beach hotel";
    $hotel[3]["hot_url"] = "kuraburi-beach-hotel";
    $hotel[3]["hot_star"] = "5";
    $hotel[3]["hot_firstimage"] = "http://localhost/themes/Travel/images/first_diamond.jpg";


    $hotel[4]["hot_id"] = "5";
    $hotel[4]["hot_province"] = "พังงา";
    $hotel[4]["hot_location"] = "คุระบุรี";
    $hotel[4]["hot_name"] = "phangha bay hotel";
    $hotel[4]["hot_url"] = "phangha-bay-hotel";
    $hotel[4]["hot_star"] = "3";
    $hotel[4]["hot_firstimage"] = "http://localhost/themes/Travel/images/first_diamond.jpg";

    $hotel[5]["hot_id"] = "6";
    $hotel[5]["hot_province"] = "กระบี่";
    $hotel[5]["hot_location"] = "เกาะพีพี";
    $hotel[5]["hot_name"] = "Andaman Beach Resort";
    $hotel[5]["hot_url"] = "Andaman-Beach-Resort";
    $hotel[5]["hot_star"] = "3";
    $hotel[5]["hot_firstimage"] = "http://localhost/themes/Travel/images/first_diamond.jpg";


    return $hotel; 
  }

   function initMenu(){

    $menu = array();  
    //Phuket hotel
    $menu[0]["meu_id"] = "1";
    $menu[0]["meu_province"] = "ภูเก็ต";
    $menu[0]["meu_url"] = "list/ภูเก็ต";
  
    $menu[1]["meu_id"] = "2";
    $menu[1]["meu_province"] = "พังงา";
    $menu[1]["meu_url"] = "list/พังงา";

    $menu[2]["meu_id"] = "3";
    $menu[2]["meu_province"] = "กระบี่";
    $menu[2]["meu_url"] = "list/กระบี่";


    return $menu; 
  }

   function initSubmenu(){

    $submenu = array();  
    //Phuket hotel
    $submenu[0]["sme_id"] = "1";
    $submenu[0]["sme_province"] = "ภูเก็ต";
    $submenu[0]["sme_location"] = "ป่าตอง";
    $submenu[0]["sme_url"] = "list/ป่าตอง";
  
    $submenu[1]["sme_id"] = "2";
    $submenu[1]["sme_province"] = "ภูเก็ต";
    $submenu[1]["sme_location"] = "กมลา";
    $submenu[1]["sme_url"] = "list/กมลา";

    $submenu[2]["sme_id"] = "3";
    $submenu[2]["sme_province"] = "ภูเก็ต";
    $submenu[2]["sme_location"] = "กะรน";
    $submenu[2]["sme_url"] = "list/กะรน";

    $submenu[3]["sme_id"] = "4";
    $submenu[3]["sme_province"] = "ภูเก็ต";
    $submenu[3]["sme_location"] = "กะตะ";
    $submenu[3]["sme_url"] = "list/กะตะ";

    $submenu[4]["sme_id"] = "5";
    $submenu[4]["sme_province"] = "ภูเก็ต";
    $submenu[4]["sme_location"] = "เกาะราชา";
    $submenu[4]["sme_url"] = "list/เกาะราชา";

    $submenu[5]["sme_id"] = "6";
    $submenu[5]["sme_province"] = "ภูเก็ต";
    $submenu[5]["sme_location"] = "เมืองภูเก็ต";
    $submenu[5]["sme_url"] = "list/เมืองภูเก็ต";

    $submenu[6]["sme_id"] = "7";
    $submenu[6]["sme_province"] = "กระบี่";
    $submenu[6]["sme_location"] = "เกาะพีพี";
    $submenu[6]["sme_url"] = "list/เกาะพีพี";

    return $submenu; 
  }


  function user_list($first_tag=false, $second_tag=false){

header('Content-Type: text/html; charset=utf-8');
    $data = array();
    if($first_tag && $second_tag){
        
    }if($first_tag){

    }else{
      $data["hotel"] = $this->initHotel();
      $data["menu"] = $this->initMenu();
      $data["submenu"] = $this->initSubmenu();
    }


   

    //print_r($data); exit;

    $this->_fetch('user_list', $data, false, true);
  }



  function user_booking($args){

    if(!empty($args)){

      $this->load->model("hotelbooking_model", "hotelbooking_model");
      $booking = $this->hotelbooking_model->addRecord($args);


      //print_r($booking); exit;
      //Send Mail
     // $this->sendmail_booking_user($booking);
     // $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url("hotel/booking/".$booking["hob_hashcode"]));  

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
    $headers .= 'To: คุณ '.$booking["hob_firstname"].' <'.$booking["hob_email"].'>' . "\r\n";
    $headers .= 'From: uastravel.com <booking@uastravel.com>' . "\r\n";

    $to = $booking["hob_email"];


    $subject = "คุณได้ทำการจองโรงแรม ผ่านทาง uastravel.com";

    $message .='  ##########  ระบบการจองโรงแรม  ##########';
    $message = '<p>สวัสดีค่ะ คุณ'.$booking["hob_firstname"].',</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="http://www.uastravel.com">uastravel.com</a></p>';
    $message .='<p>รายละเอียดการจองโรงแรมของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจองโรงแรม ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["hob_code"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียด ##########';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["hob_adult_amount"];
    $message .='  <br />จำนวนเด็ก : '.$booking["hob_child_amount"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["hob_infant_amount"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["hob_firstname"].' '.$booking["hob_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["hob_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["hob_address"].', '.$booking["hob_city"].', '.$booking["hob_province"].', '.$booking["hob_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["hob_telephone"];
    $message .='  <br />อีเมล : '.$booking["hob_email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรม : '.$booking["hob_hotelname"];
    $message .='  <br />จำนวนห้องพัก : '.$booking["hob_room_amount"].' ห้อง';
    $message .='  <br />วันที่เช็คอิน : '.$booking["hob_checkin_date"];
    $message .='  <br />วันที่เช็คเอาท์ : '.$booking["hob_checkout_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["hob_message"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/hotel/booking/'.$booking["hob_hashcode"].'">'.$booking["hob_code"].'</a>';
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
    $subject = 'ข้อมูลการจองโรงแรมของคุณ '.$booking["hob_firstname"];

          $message .='<p>รายละเอียดการจองโรงแรมมีดังนี้</p>';
          $message .='<blockquote>';
          $message .='  ##########  รายละเอียดการจอง  ##########';
          $message .='  <br />หมายเลขการจอง : '.$booking["hob_code"];
          $message .='  <br />';
          $message .='  <br />##########  รายละเอียด ##########';
          $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["hob_adult_amount"];
          $message .='  <br />จำนวนเด็ก : '.$booking["hob_child_amount"];
          $message .='  <br />จำนวนเด็กทารก : '.$booking["hob_infant_amount"];
          $message .='  <br />';
          $message .='  <br />##########  รายละเอียดผู้จอง  ##########';
          $message .='  <br />ชื่อผู้จอง : '.$booking["hob_firstname"].' '.$booking["hob_lastname"];
          $message .='  <br />สัญชาติ : '.$booking["hob_nationality"];
          $message .='  <br />ที่อยู่ : '.$booking["hob_address"].', '.$booking["hob_city"].', '.$booking["hob_province"].', '.$booking["hob_zipcode"];
          $message .='  <br />เบอร์ติดต่อ : '.$booking["hob_telephone"];
          $message .='  <br />อีเมล : '.$booking["hob_email"];
          $message .='  <br />';
          $message .='  <br />ชื่อโรงแรม : '.$booking["hob_hotelname"];
          $message .='  <br />จำนวนห้องพัก : '.$booking["hob_room_amount"].' ห้อง';
          $message .='  <br />วันที่เช็คอิน : '.$booking["hob_checkin_date"];
          $message .='  <br />วันที่เช็คเอาท์ : '.$booking["hob_checkout_date"];
          $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["hob_message"];
          $message .='  <br />';
          $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
          $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/hotel/booking/'.$booking["hob_hashcode"].'">'.$booking["hob_code"].'</a>';
          $message .='  <br />';
          $message .='</blockquote>';   

    //echo $message; exit;
    mail($to,$subject,$message,$headers);
  }


  

  function user_bookingview($hashcode){

    $args["hob_hashcode"] = $hashcode;

    $this->load->model("hotelbooking_model", "hotelbooking_model");
    $data["booking"] = $this->hotelbooking_model->getRecord($args);   
    

    //print_r($data); exit;

    $this->_fetch('user_booking', $data, false, true);

  }


 
}

?>