 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Airline extends MY_Controller {
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
      $segment = $this->uri->segment($index+2);

      if(empty($segment)){
        //Return
        $this->_fetch('user_list',$segment, false, true);
      }else{
        $this->user_list($segment);
      }    
     
    }

    else if($this->uri->segment($index+1)=="inquiry"){
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
header('Content-Type: text/html; charset=utf-8');
    $this->_fetch('user_inquiry',false, false, true);

  }

  function user_view($id = 0){

    if($id > 0){
      $this->_fetch('user_view_'.$id, false, false, true);
    }else{
      show_404(); 
    }

  }

   function user_list($segment=false){
    //header('Content-Type: text/html; charset=utf-8');
    //print_r($segment);exit;

    if(!empty($segment)){
      $this->_fetch('user_'.$segment,false, false, true);
    }else{
      $this->_fetch('user_thaiairways',false, false, true);
    }

   // $this->_fetch('user_list',false, false, true);

  }

  function user_booking($args){

    if(!empty($args)){

      $this->load->model("airlinebooking_model", "airlinebooking_model");
      $booking = $this->airlinebooking_model->addRecord($args);


      //print_r($booking); exit;
      //Send Mail
      $this->sendmail_booking_user($booking);
      $this->sendmail_booking_admin($booking);

      //Forward
      redirect(base_url("airline/booking/".$booking["flt_hashcode"]));  

      //print_r($insert_id); exit;
    }else{ //id not send
      //Redirect
      redirect(base_url("airline/inquiry/".$args["id"]));    
    }


  }

  function sendmail_booking_user($booking){


    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: คุณ '.$booking["flt_firstname"].' <'.$booking["flt_email"].'>' . "\r\n";
    $headers .= 'From: uastravel.com <booking@uastravel.com>' . "\r\n";

    $to = $booking["flt_email"];


    $subject = "คุณได้ทำการจองตั๋วเครื่องบิน ผ่านทาง uastravel.com";

    $message .='  ##########  ระบบการจองตั๋วเครื่องบิน  ##########';
    $message = '<p>สวัสดีค่ะ คุณ'.$booking["flt_firstname"].',</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="http://www.uastravel.com">uastravel.com</a></p>';
    $message .='<p>รายละเอียดการจองตั๋วเครื่องบินของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจองตั๋วเครื่องบิน ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["flt_code"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียด ##########';
    $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["flt_adult_amount"];
    $message .='  <br />จำนวนเด็ก : '.$booking["flt_child_amount"];
    $message .='  <br />จำนวนเด็กทารก : '.$booking["flt_infant_amount"];
    $message .='  <br />';
    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ชื่อผู้จอง : '.$booking["flt_firstname"].' '.$booking["flt_lastname"];
    $message .='  <br />สัญชาติ : '.$booking["flt_nationality"];
    $message .='  <br />ที่อยู่ : '.$booking["flt_address"].', '.$booking["flt_city"].', '.$booking["flt_province"].', '.$booking["flt_zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking["flt_telephone"];
    $message .='  <br />อีเมล : '.$booking["flt_email"];
    $message .='  <br />';
    $message .='  <br />สายการบิน : '.$booking["flt_nameairline"];
    $message .='  <br />ประเภท : '.$booking["flt_type"];
    $message .='  <br />ชั้นที่นั่ง : '.$booking["flt_class"];
    $message .='  <br />เดินทางจาก : '.$booking["flt_from_location"];
    $message .='  <br />เดินทางไป : '.$booking["flt_go_to_location"];
    $message .='  <br />วันที่ออกเดินทาง : '.$booking["flt_depart_date"];
    $message .='  <br />เวลาที่ออกเดินทาง : '.$booking["flt_depart_time"];
    $message .='  <br />วันที่เดินทางกลับ : '.$booking["flt_return_date"];
    $message .='  <br />เวลาที่เดินทางกลับ : '.$booking["flt_return_time"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["flt_message"];
    $message .='  <br />';
    $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
    $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/airline/booking/'.$booking["flt_hashcode"].'">'.$booking["flt_code"].'</a>';
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
    $subject = 'ข้อมูลการจองตั๋วเครื่องบินของคุณ '.$booking["flt_firstname"];

          $message .='<p>รายละเอียดการจองตั๋วเครื่องบินมีดังนี้</p>';
          $message .='<blockquote>';
          $message .='  ##########  รายละเอียดการจอง  ##########';
          $message .='  <br />หมายเลขการจอง : '.$booking["flt_code"];
          $message .='  <br />';
          $message .='  <br />##########  รายละเอียด ##########';
          $message .='  <br />จำนวนผู้ใหญ่ : '.$booking["flt_adult_amount"];
          $message .='  <br />จำนวนเด็ก : '.$booking["flt_child_amount"];
          $message .='  <br />จำนวนเด็กทารก : '.$booking["flt_infant_amount"];
          $message .='  <br />';
          $message .='  <br />##########  รายละเอียดผู้จอง  ##########';
          $message .='  <br />ชื่อผู้จอง : '.$booking["flt_firstname"].' '.$booking["flt_lastname"];
          $message .='  <br />สัญชาติ : '.$booking["flt_nationality"];
          $message .='  <br />ที่อยู่ : '.$booking["flt_address"].', '.$booking["flt_city"].', '.$booking["flt_province"].', '.$booking["flt_zipcode"];
          $message .='  <br />เบอร์ติดต่อ : '.$booking["flt_telephone"];
          $message .='  <br />อีเมล : '.$booking["flt_email"];
          $message .='  <br />';
          $message .='  <br />สายการบิน : '.$booking["flt_nameairline"];
          $message .='  <br />ประเภท : '.$booking["flt_type"];
          $message .='  <br />ชั้นที่นั่ง : '.$booking["flt_class"];
          $message .='  <br />เดินทางจาก : '.$booking["flt_from_location"];
          $message .='  <br />เดินทางไป : '.$booking["flt_go_to_location"];
          $message .='  <br />วันที่ออกเดินทาง : '.$booking["flt_depart_date"];
          $message .='  <br />เวลาที่ออกเดินทาง : '.$booking["flt_depart_time"];
          $message .='  <br />วันที่เดินทางกลับ : '.$booking["flt_return_date"];
          $message .='  <br />เวลาที่เดินทางกลับ : '.$booking["flt_return_time"];
          $message .='  <br />ความต้องการเพิ่มเติม : '.$booking["flt_message"];
          $message .='  <br />';
          $message .='  <br />##########  ลิงค์รายละเอียดการจอง ##########';
          $message .='  <br />ลิงค์ข้อมลการจอง : <a href="http://www.uastravel.com/airline/booking/'.$booking["flt_hashcode"].'">'.$booking["flt_code"].'</a>';
          $message .='  <br />';
          $message .='</blockquote>';   

    //echo $message; exit;
    mail($to,$subject,$message,$headers);
  }

  function user_bookingview($hashcode){

    $args["flt_hashcode"] = $hashcode;

    $this->load->model("airlinebooking_model", "airlinebooking_model");
    $data["booking"] = $this->airlinebooking_model->getRecord($args);   
    

    //print_r($data); exit;

    $this->_fetch('user_booking', $data, false, true);

  }
 
}

?>