<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TourCustomer_model extends MY_Model {

  function __construct(){
    parent::__construct();
    $this->_prefix = "toc";
    $this->_column = array(
                     'id'                         => $this->_prefix.'_id',
                     'code'                       => $this->_prefix.'_code',
                     'hashcode'                   => $this->_prefix.'_hashcode',
                     'tour_id'                    => $this->_prefix.'_tour_id',
                     'tour_code'                  => $this->_prefix.'_tour_code',
                     'tour_name'                  => $this->_prefix.'_tour_name',
                     'tour_url'                   => $this->_prefix.'_tour_url',
                     'firstname'                  => $this->_prefix.'_firstname',
                     'lastname'                   => $this->_prefix.'_lastname',
                     'address'                    => $this->_prefix.'_address',
                     'city'                       => $this->_prefix.'_city',
                     'province'                   => $this->_prefix.'_province',
                     'country'                    => $this->_prefix.'_country',
                     'zipcode'                    => $this->_prefix.'_zipcode',
                     'telephone'                  => $this->_prefix.'_telephone',
                     'email'                      => $this->_prefix.'_email',
                     'nationality'                => $this->_prefix.'_nationality',
                     'hotel_name'                 => $this->_prefix.'_hotel_name',
                     'room_number'                => $this->_prefix.'_room_number',
                     'tranfer_date'               => $this->_prefix.'_tranfer_date',
                     'return_date'                => $this->_prefix.'_return_date',
                     'totalday'                   => $this->_prefix.'_totalday',
                     'request'                    => $this->_prefix.'_request',
                     'adult_amount_passenger'     => $this->_prefix.'_adult_amount_passenger',
                     'child_amount_passenger'     => $this->_prefix.'_child_amount_passenger',
                     'infant_amount_passenger'    => $this->_prefix.'_infant_amount_passenger',
                     'grand_total_price'          => $this->_prefix.'_grand_total_price',
                     'payment_status'             => $this->_prefix.'_payment_status',
                     'payment_amount'             => $this->_prefix.'_payment_amount',
                     'payment_net'                => $this->_prefix.'_payment_net',
                     'payment_fee'                => $this->_prefix.'_payment_fee',
                     'payment_transaction_id'     => $this->_prefix.'_payment_transaction_id',
                     'payment_transaction_type'   => $this->_prefix.'_payment_transaction_type',
                     'payment_type'               => $this->_prefix.'_payment_type',
                     'payment_return'             => $this->_prefix.'_payment_return',
                     'cr_date'                    => $this->_prefix.'_cr_date',
                     'cr_uid'                     => $this->_prefix.'_cr_uid',
                     'lu_date'                    => $this->_prefix.'_lu_date',
                     'lu_uid'                     => $this->_prefix.'_lu_uid'
    );

  }

  function getRecord($args=false, $field=false){
    //print_r($args); exit;

    if(isset($args["toc_id"])){
      //Get category by id
      $query = $this->db->get_where('ci_tourcustomer', array('toc_id' => $args["toc_id"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["toc_code"])){
      //Get category by id
      $query = $this->db->get_where('ci_tourcustomer', array('toc_code' => $args["toc_code"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else if(isset($args["toc_hashcode"])){
      //Get category by id
      $query = $this->db->get_where('ci_tourcustomer', array('toc_hashcode' => $args["toc_hashcode"]), 1, 0);

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }else{
      //Get list page
      ($field)?$this->db->select($field):"";
      $this->db->order_by('CONVERT( toc_code USING tis620 ) ASC');
      $query = $this->db->get("ci_tourcustomer");

      if($query->num_rows > 0){
        return $query->result();
      }else{
        return false;
      }
    }

  }

  function addRecord($data=false){
    if(!empty($data)){
      $this->load->model("price_model", "priceModel");
      $this->load->model("tourbooking_model", "tourbookingModel");

      $tourCustomer = $data;
      $total_price_adult = 0;
      $total_price_child = 0;
      $tourCustomer["adult_amount_passenger"] = 0;
      $tourCustomer["child_amount_passenger"] = 0;
      //Get adult total price
      foreach ($data["price"] as $key => $value) {
        $wherePrice["where"]["id"] = intval($key);
        $wherePrice["where"]["lang"] = $this->lang->lang();;
        $resultPrice = $this->priceModel->get($wherePrice);
        $priceList[$key] = $resultPrice[0];
        $priceList[$key]["adult_amount_booking"] = $value["adult_amount"];
        $priceList[$key]["child_amount_booking"] = $value["child_amount"];
        if($resultPrice[0]["discount_adult_price"] > 0){
          $total_price_adult += ($resultPrice[0]["discount_adult_price"]*$value["adult_amount"]);
          $priceList[$key]["total_adult_price"] = ($resultPrice[0]["discount_adult_price"]*$value["adult_amount"]);
        }else{
          $total_price_adult += ($resultPrice[0]["sale_adult_price"]*$value["adult_amount"]);
          $priceList[$key]["total_adult_price"] = ($resultPrice[0]["sale_adult_price"]*$value["adult_amount"]);
        }
        if($value["child_amount"] > 0){
          if($resultPrice[0]["discount_child_price"] > 0){
            $total_price_adult += ($resultPrice[0]["discount_child_price"]*$value["child_amount"]);
            $priceList[$key]["total_child_price"] = ($resultPrice[0]["discount_child_price"]*$value["child_amount"]);
          }else{
            $total_price_child += ($resultPrice[0]["sale_child_price"]*$value["child_amount"]);
            $priceList[$key]["total_child_price"] = ($resultPrice[0]["sale_child_price"]*$value["child_amount"]);
          }
        }

        if(!empty($priceList[$key]["total_adult_price"]) AND !empty($priceList[$key]["total_child_price"])){
          $priceList[$key]["total_price"] = ($priceList[$key]["total_adult_price"]+$priceList[$key]["total_child_price"]);
        }
        $tourCustomer["adult_amount_passenger"] = $value["adult_amount"];
        $tourCustomer["child_amount_passenger"] = $value["child_amount"];

      }

      unset($tourCustomer["grand_total_price"]);
      $tourCustomer["grand_total_price"] = ($total_price_adult+$total_price_child);
      //Generate hashcode
      $last_id = $this->db->query("SELECT MAX(toc_id) as toc_id from ci_tourcustomer")->row();
      $next_id = $last_id->toc_id+1;
      $digit = sprintf("%06d", $next_id);
      $code = "B".$digit;
      $hashcode = Hash::gen()->hash($code);

      $tourCustomer["hashcode"] = md5($hashcode);
      $tourCustomer["code"] = $code;

      //Tranfer date
      $dateExplode = explode("/", $data["tranfer_date"]);
      $toc_tranfer_date = $dateExplode[2]."-".$dateExplode[1]."-".$dateExplode[0];
      $tourCustomer["tranfer_date"] = $toc_tranfer_date;

      //Date default
      $tourCustomer["cr_date"] = date("Y-m-d H:i:s");
      $tourCustomer["lu_date"] = date("Y-m-d H:i:s");

      unset($tourCustomer["price"]);
      //Add data to tourcustom table

      $current_customer_id = self::add($tourCustomer);

      foreach ($priceList as $key => $value) {
        unset($priceList[$key]["id"]);
        $priceList[$key]["price_name"] = $priceList[$key]["name"];
        $priceList[$key]["tourcustomer_id"] = $current_customer_id;

        //Date default
        $priceList[$key]["cr_date"] = date("Y-m-d H:i:s");
        $priceList[$key]["lu_date"] = date("Y-m-d H:i:s");

        $this->tourbookingModel->add($priceList[$key]);
      }
      
      //Booing price
      //print_r($tourBooking); exit;

      $tourPrice["price"] = $priceList;
      $booking = $tourCustomer+$tourPrice;

      //Send Mail
      if(!$this->sendmail_booking_user($booking)){
        log_message('error', '[Booking Error] - Can\'t send email to user. ['.__FILE__.':'.__LINE__.']');
      }
      if(!$this->sendmail_booking_admin($booking)){
        log_message('error', '[Booking Error] - Can\'t send email to admin. ['.__FILE__.':'.__LINE__.']');
      }
      
      return $booking;
    }else{
      return false;
    }

  }


  function addTourCustomer($data = NULL){
    if(empty($data)){
      return false;
    }
    $tourCustomer = $data["customtour"];

    $this->load->model("price_model", "priceModel");
    $this->load->model("tourbooking_model", "tourbookingModel");

    $total_price_adult = 0;
    $total_price_child = 0;
    $tourCustomer["adult_amount_passenger"] = $data["customtour"]["adult"];
    $tourCustomer["child_amount_passenger"] = $data["customtour"]["child"];
    $tourCustomer["infant_amount_passenger"] = $data["customtour"]["infant"];
    //Get adult total price
    
    foreach ($data["price_selected"] as $priceKey => $priceValue) {
      $priceValue = array_unique($priceValue);
      foreach ($priceValue as $key => $value) {
        $wherePrice["where"]["id"] = intval($value);
        $wherePrice["where"]["lang"] = $this->lang->lang();;
        $resultPrice = $this->priceModel->get($wherePrice);
        $priceList[$value] = $resultPrice[0];
        $priceList[$value]["adult_amount_booking"] = $tourCustomer["adult_amount_passenger"];
        $priceList[$value]["child_amount_booking"] = $tourCustomer["child_amount_passenger"];
        $priceList[$value]["infant_amount_booking"] = $tourCustomer["infant_amount_passenger"];
        if($resultPrice[0]["discount_adult_price"] > 0){
          $total_price_adult += ($resultPrice[0]["discount_adult_price"]*$tourCustomer["adult_amount_passenger"]);
        }else{
          $total_price_adult += ($resultPrice[0]["sale_adult_price"]*$tourCustomer["adult_amount_passenger"]);
        }
        if(!empty($tourCustomer["child_amount_passenger"])){
          if($resultPrice[0]["discount_child_price"] > 0){
            $total_price_child += ($resultPrice[0]["discount_child_price"]*$tourCustomer["child_amount_passenger"]);
          }else{
            $total_price_child += ($resultPrice[0]["sale_child_price"]*$tourCustomer["child_amount_passenger"]);
          }
        }
      }
    }
    $tourCustomer["grand_total_price"] = intval($total_price_adult+$total_price_child);
    //Generate hashcode
    $last_id = $this->db->query("SELECT MAX(toc_id) as toc_id from ci_tourcustomer")->row();
    $next_id = $last_id->toc_id+1;
    $digit = sprintf("%06d", $next_id);
    $code = "B".$digit;
    $hashcode = Hash::gen()->hash($code);

    $tourCustomer["hashcode"] = md5($hashcode);
    $tourCustomer["code"] = $code;
    $tourCustomer["tour_code"] = $data["code"];
    $tourCustomer["tour_name"] = $data["packageName"];
    $tourCustomer["tour_url"] = $data["url"];
    $tourCustomer["tour_id"] = $data["tour_id"];

    //Tranfer date
    $dateExplodeDepartureDate = explode("/", $data["customtour"]["departuredate"]);
    $toc_tranfer_date = $dateExplodeDepartureDate[2]."-".$dateExplodeDepartureDate[1]."-".$dateExplodeDepartureDate[0];
    $tourCustomer["tranfer_date"] = $toc_tranfer_date." ".$data["customtour"]["departuretime"];
    //Return date
    $dateExplodeReturnDate = explode("/", $data["customtour"]["returndate"]);
    $toc_return_date = $dateExplodeReturnDate[2]."-".$dateExplodeReturnDate[1]."-".$dateExplodeReturnDate[0];
    $tourCustomer["return_date"] = $toc_return_date." ".$data["customtour"]["returntime"];

    //Date default
    $tourCustomer["cr_date"] = date("Y-m-d H:i:s");
    $tourCustomer["lu_date"] = date("Y-m-d H:i:s");

    //Add data to tourcustom table
    $current_customer_id = self::add($tourCustomer);

    
    foreach ($priceList as $key => $value) {
      unset($priceList[$key]["id"]);
      $priceList[$key]["total_adult_price"] = 0;
      $priceList[$key]["total_child_price"] = 0;
      $priceList[$key]["price_name"] = $priceList[$key]["name"];
      $priceList[$key]["tourcustomer_id"] = $current_customer_id;
      if($value["discount_adult_price"] > 0){
        $priceList[$key]["total_adult_price"] = intval($value["discount_adult_price"]*$value["adult_amount_booking"]);
      }else{
        $priceList[$key]["total_adult_price"] = intval($value["sale_adult_price"]*$value["adult_amount_booking"]);
      }
      if(!empty($value["child_amount_booking"])){
        if($value["discount_child_price"] > 0){
          $priceList[$key]["total_child_price"] = intval($value["discount_child_price"]*$value["child_amount_booking"]);
        }else{
          $priceList[$key]["total_child_price"] = intval($value["sale_child_price"]*$value["child_amount_booking"]);
        }
        
      }
      $priceList[$key]["total_price"] = intval($priceList[$key]["total_adult_price"]+$priceList[$key]["total_child_price"]);

      //Date default
      $priceList[$key]["cr_date"] = date("Y-m-d H:i:s");
      $priceList[$key]["lu_date"] = date("Y-m-d H:i:s");

      $this->tourbookingModel->add($priceList[$key]);
    }
    
    //Booing price
    //print_r($tourBooking); exit;

    $tourPrice["price"] = $priceList;
    $booking = $tourCustomer+$tourPrice;

    //Send Mail
    if(!$this->sendmail_booking_user($booking)){
      log_message('error', '[Booking Error] - Can\'t send email to user. ['.__FILE__.':'.__LINE__.']');
    }
    if(!$this->sendmail_booking_admin($booking)){
      log_message('error', '[Booking Error] - Can\'t send email to admin. ['.__FILE__.':'.__LINE__.']');
    }

    return $booking;
  }

  function updateRecord($data=false){
    return ;
  }

  function deleteRecord($id=false){
    if($id){
      $this->db->where("toc_id", $id);
      $this->db->delete("ci_tourcustomer");
    }
  }

  function searchRecord($args=false){

  }

  function sendmail_booking_user($booking = NULL){
    if(empty($booking)){
      return false;
    }

    $subject = "Booking Information - ".$this->config->item("website");

    $message = '<p>สวัสดีค่ะ คุณ '.$booking["firstname"].' '.$booking["lastname"].'</p>';
    $message .='<p>ขอขอบคุณที่ไว้วางใจในบริการของ <a href="'.base_url().'" target="_blank">'.$this->config->item("website").'</a></p>';
    $message .='<p>รายละเอียดการจองทัวร์ของคุณมีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : <a href="'.base_url($this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"]).'">'.$booking["code"].'</a>';

    if(strpos($booking["tour_code"], "CT") === false){
      $message .='  <br />ชื่อทัวร์ : <a href="'.base_url($this->lang->line("url_lang_tour").'/'.$booking["tour_url"]).'">'.$booking["tour_name"].'</a> ('.$booking["tour_code"].')';
    }else{
      $message .='  <br />ชื่อทัวร์ : <a href="'.base_url('customtour/'.$booking["tour_url"]).'">'.$booking["tour_name"].'</a> ('.$booking["tour_code"].')';
    }
    
    $message .='  <br />ลิงค์ข้อมูลการจอง : <a href="'.base_url($this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"]).'">'.$this->config->item("website")."/".$this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"].'</a>';
    
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
    $message .='  <br />ลิงค์ข้อมูลการจอง : <a href="'.base_url($this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"]).'">'.$this->config->item("website")."/".$this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"].'</a>';
    $message .='  <br />';
    $message .='</blockquote>';

    $message .= '<p>หากมีข้อสงสัยกรุณาสอบถามเพิ่มเติม 093-741-8887 หรือ 076-331-280<br />
        หจก.ยูแอสทราเวล (ใบอนุญาตเลขที่ 34/000837)<br />
        เรายินดีให้บริการค่ะ</p>
          <a href="'.base_url().'">'.$this->config->item("website").'</a>
          <br />โทร. 093-741-8887 หรือ 076-331-280
          <br />แฟกซ์. 076-331-273
          <br />80/86 หมู่บ้านศุภาลัยซิตี้ฮิลล์ ม.3
          <br />ต.รัษฎา อ.เมือง ภูเก็ต 83000
      ';

    $this->load->library('email');

    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    $this->email->from('info@uastravel.com', $this->config->item("website"));
    $this->email->to(trim($booking["email"]));
    //$this->email->bcc('ottowan@gmail.com');

    $this->email->subject($subject);
    $this->email->message($message);

    return $this->email->send();

    //echo $message; exit;
    //mail($to,$subject,$message,$headers);
  }

  function sendmail_booking_admin($booking = NULL){
    if(empty($booking)){
      return false;
    }

    // subject
    $subject = 'Booking Information for '.$booking["firstname"]." ".$booking["lastname"];

    $message ='<p>รายละเอียดการจองทัวร์มีดังนี้</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking["code"];

    if(strpos($booking["tour_code"], "CT") === false){
      $message .='  <br />ชื่อทัวร์ : <a href="'.base_url($this->lang->line("url_lang_tour").'/'.$booking["tour_url"]).'">'.$booking["tour_name"].'</a> ('.$booking["tour_code"].')';
    }else{
      $message .='  <br />ชื่อทัวร์ : <a href="'.base_url('customtour/'.$booking["tour_url"]).'">'.$booking["tour_name"].'</a> ('.$booking["tour_code"].')';
    }
    
    $message .='  <br />ลิงค์ข้อมูลการจอง : <a href="'.base_url($this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"]).'">'.$this->config->item("website")."/".$this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"].'</a>';
     

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
    $message .='  <br />ลิงค์ข้อมูลการจอง : <a href="'.base_url($this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"]).'">'.$this->config->item("website")."/".$this->lang->line("url_lang_tour").'/booking/'.$booking["hashcode"].'</a>';
     
    $message .='  <br />';
    $message .='</blockquote>';


    $this->load->library('email');

    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    $this->email->from('info@uastravel.com', $this->config->item("website"));
    $this->email->to('booking.uastravel@gmail.com');
    //$this->email->bcc('ottowan@gmail.com');

    $this->email->subject($subject);
    $this->email->message($message);

    return $this->email->send();

    //echo $message; exit;
    //mail($to,$subject,$message,$headers);
  }

}
?>