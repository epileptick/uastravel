<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrent extends MY_Controller {
  function __construct(){
    parent::__construct();
    //var_dump($this->lang->lang());
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
        $this->user_list();
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

   function user_list(){

    $this->_fetch('user_list',false, false, true);
  }


  function user_booking($args){

    if(!empty($args)){

      $this->load->model("carbooking_model", "carbookingModel");
      $booking = $this->carbookingModel->addRecord($args);


      //print_r($booking); exit;
      //Send Mail
      $this->sendmail_booking_user($booking);
      $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url("carrent/booking/".$booking["cab_hashcode"]));  

      //print_r($insert_id); exit;
    }else{ //id not send
      //Redirect
      redirect(base_url("carrent/inquiry/".$args["id"]));    
    }

  }


  function sendmail_booking_user($booking){


    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: คุณ '.$booking["cab_firstname"].' <'.$booking["cab_email"].'>' . "\r\n";
    $headers .= 'From: uastravel.com <booking@uastravel.com>' . "\r\n";

    $to = $booking["cab_email"];


    $subject = "คุณได้ทำการจองรถ ผ่านทาง uastravel.com";

    $message .=' ########## ระบบการจองรถเช่า ##########';
    $message = '<p>สวัสดีค่ะ คุณ'.$booking["cab_firstname"].',</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="http://www.uastravel.com">uastravel.com</a></p>';
    $message .='<p>รายละเอียดการจองรถของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["cab_code"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียด ##########';
    $message .='  <br />จำนวนผู้โดยสาร : '.$booking["cab_passenger_amount"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["cab_firstname"].' '.$booking["cab_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["cab_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["cab_address"].', '.$booking["cab_city"].', '.$booking["cab_province"].', '.$booking["cab_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["cab_telephone"];
    $message .='  <br />อีเมล : '.$booking["cab_email"];
    $message .='  <br />';
    $message .='  <br />สถานที่รับรถ : '.$booking["cab_pickup_location"];
    $message .='  <br />วันที่รับรถ : '.$booking["cab_pickup_date"];
    $message .='  <br />เวลาที่รับรถ : '.$booking["cab_pickup_time"];
    $message .='  <br />สถานที่คืนรถ : '.$booking["cab_dropoff_location"];
    $message .='  <br />วันที่คืนรถ : '.$booking["cab_dropoff_date"];
    $message .='  <br />เวลาที่คืนรถ : '.$booking["cab_dropoff_time"];
    $message .='  <br />บัตรเครดิต : '.$booking["cab_credit"];
    $message .='  <br />ประเภทรถยนต์ : '.$booking["cab_typecar"];
    $message .='  <br />ราคา : '.$booking["cab_price"].' บาท / วัน';
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["cab_message"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/carrent/booking/'.$booking["cab_hashcode"].'">'.$booking["cab_code"].'</a>';
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
    $subject = 'ข้อมูลการจองรถเช่า '.$booking["tob_firstname"];

          $message .='  ##########  รายละเอียดการจอง ( จองรถเช่า ) ##########';
          $message .='  <br />หมายเลขการจอง : '.$booking["cab_code"];
          $message .='  <br />';
          $message .='  <br />##########  รายละเอียด  ##########';
          $message .='  <br />จำนวนผู้โดยสาร : '.$booking["cab_passenger_amount"];
          $message .='  <br />';
          $message .='  <br />##########  รายละเอียดผู้จอง  ##########';
          $message .='  <br />ชื่อผู้จอง : '.$booking["cab_firstname"].' '.$booking["cab_lastname"];
          $message .='  <br />สัญชาติ : '.$booking["cab_nationality"];
          $message .='  <br />ที่อยู่ : '.$booking["cab_address"].', '.$booking["cab_city"].', '.$booking["cab_province"].', '.$booking["cab_zipcode"];
          $message .='  <br />เบอร์ติดต่อ : '.$booking["cab_telephone"];
          $message .='  <br />อีเมล : '.$booking["cab_email"];
          $message .='  <br />';
          $message .='  <br />สถานที่รับรถ : '.$booking["cab_pickup_location"];
          $message .='  <br />วันที่รับรถ : '.$booking["cab_pickup_date"];
          $message .='  <br />เวลาที่รับรถ : '.$booking["cab_pickup_time"];
          $message .='  <br />สถานที่คืนรถ : '.$booking["cab_dropoff_location"];
          $message .='  <br />วันที่คืนรถ : '.$booking["cab_dropoff_date"];
          $message .='  <br />เวลาที่คืนรถ : '.$booking["cab_dropoff_time"];
          $message .='  <br />บัตรเครดิต : '.$booking["cab_credit"];
          $message .='  <br />ประเภทรถยนต์ : '.$booking["cab_typecar"];
          $message .='  <br />ราคา : '.$booking["cab_price"].' บาท / วัน';
          $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["cab_message"];
          $message .='  <br />';
          $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
          $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/carrent/booking/'.$booking["cab_hashcode"].'">'.$booking["cab_code"].'</a>';
          $message .='  <br />';
          $message .='</blockquote>';  

    //echo $message; exit;
    mail($to,$subject,$message,$headers);
  }

  function user_bookingview($hashcode){

    $args["cab_hashcode"] = $hashcode;

    $this->load->model("carbooking_model", "carbookingModel");
    $data["booking"] = $this->carbookingModel->getRecord($args);   

    //print_r($data); exit;

    $this->_fetch('user_booking', $data, false, true);

  }
}
?>