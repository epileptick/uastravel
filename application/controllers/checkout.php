<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Omnipay\Omnipay;

class Checkout extends MY_Controller {

  function __construct(){
    parent::__construct();
  }


  function user_do_payment($md5code = NULL){
    if(empty($md5code)){
      show_404();
    }
    $tourcustomerWhere["where"]["hashcode"] = $md5code;

    $this->load->model("tourcustomer_model", "tourcustomerModel");
    $bookingData = $this->tourcustomerModel->get($tourcustomerWhere);
    //$this->assign("bookingData",$bookingData);
    if(empty($bookingData)){
      show_404();
    }

    if($bookingData[0]["payment_status"]){
      show_404();
    }

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername($this->config->item("paypal_username"));
    $gateway->setPassword($this->config->item("paypal_password"));
    $gateway->setSignature($this->config->item("paypal_signature"));
    $gateway->setTestMode($this->config->item("paypal_testmode"));

    $response = $gateway->purchase(array(
                                    'amount' => floatval($bookingData[0]["grand_total_price"]),
                                    'currency' => 'THB',
                                    'description' => "Booking Code: ".$bookingData[0]["code"],
                                    'return_url' => base_url('checkout/payment_return/'.$md5code),
                                    'cancel_url' => base_url('checkout/payment_cancel/'.$md5code)
                                    ))->send();
    $response->redirect();
  }

  function user_payment_return($md5code = NULL){
    if(empty($md5code)){
      show_404();
    }
    $tourcustomerWhere["where"]["hashcode"] = $md5code;

    $this->load->model("tourcustomer_model", "tourcustomerModel");
    $bookingData = $this->tourcustomerModel->get($tourcustomerWhere);
    //$this->assign("bookingData",$bookingData);
    if(empty($bookingData) OR $bookingData[0]["payment_status"] == "completed"){
      show_404();
    }

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername($this->config->item("paypal_username"));
    $gateway->setPassword($this->config->item("paypal_password"));
    $gateway->setSignature($this->config->item("paypal_signature"));
    $gateway->setTestMode($this->config->item("paypal_testmode"));

    $response = $gateway->completePurchase(array(
                                    'amount' => floatval($bookingData[0]["grand_total_price"]),
                                    'currency' => 'THB',
                                    'description' => "Booking Code: ".$bookingData[0]["code"],
                                    'return_url' => base_url('checkout/payment_return/'.$md5code),
                                    'cancel_url' => base_url('checkout/payment_cancel/'.$md5code)
                                    ))->send();
    if($response->isSuccessful()){
      $responseData = $response->getData();
      $paymentDataUpdate["id"] = $bookingData[0]["id"];
      $paymentDataUpdate["payment_ack"] = 1;;
      $paymentDataUpdate["payment_status"] = strtolower($responseData["PAYMENTINFO_0_PAYMENTSTATUS"]); //completed,pending
      if(strtolower($responseData["PAYMENTINFO_0_PAYMENTSTATUS"]) == "pending"){
        $paymentDataUpdate["payment_pending_reason"] = strtolower($responseData["PAYMENTINFO_0_PENDINGREASON"]);
      }
      $paymentDataUpdate["payment_amount"] = $responseData["PAYMENTINFO_0_AMT"];
      $paymentDataUpdate["payment_fee"] = $responseData["PAYMENTINFO_0_FEEAMT"];
      $paymentDataUpdate["payment_net"] = ($responseData["PAYMENTINFO_0_AMT"] - $responseData["PAYMENTINFO_0_FEEAMT"]);
      $paymentDataUpdate["payment_transaction_id"] = $responseData["PAYMENTINFO_0_TRANSACTIONID"];
      $paymentDataUpdate["payment_transaction_type"] = $responseData["PAYMENTINFO_0_TRANSACTIONTYPE"];
      $paymentDataUpdate["payment_type"] = $responseData["PAYMENTINFO_0_PAYMENTTYPE"];
      $paymentDataUpdate["payment_return"] = serialize($responseData);

      if(!$this->tourcustomerModel->add($paymentDataUpdate)){
        log_message('error', '[Payment Error] - Can\'t update payment status. ['.__FILE__.':'.__LINE__.']');
      }

      $bookingData[0]["payment"] = $responseData;

      if(!$this->_sendmail_admin($bookingData)){
        log_message('error', '[Send E-Mail Error] - Can\'t send email to admin. ['.__FILE__.':'.__LINE__.']');
      }

      if(!$this->_sendmail_user($bookingData)){
        log_message('error', '[Send E-Mail Error] - Can\'t send email to user. ['.__FILE__.':'.__LINE__.']');
      }

      redirect(base_url("/checkout/success"));
    }else{
      // display error to customer
      redirect(base_url("/checkout/error"));
      
    }
  }

  function user_payment_cancel($md5code = NULL){
    if(empty($md5code)){
      show_404();
    }

  }

  function user_success(){
    $this->_fetch('user_success', "", false, true);
  }

  function _sendmail_admin($booking = NULL){
    if(empty($booking)){
      return false;
    }
    // subject
    $subject = 'แจ้งเตือนการจ่ายเงินของคุณ '.$booking[0]["firstname"]." ".$booking[0]["lastname"].' (Paypal)';

    $message ='<p>มีการจ่ายเงินจากคุณ '.$booking[0]["firstname"]." ".$booking[0]["lastname"].' เมื่อ '.date(DATE_RFC2822,$booking[0]["payment"]["TIMESTAMP"]).' (Paypal)</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking[0]["code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking[0]["tour_name"].'('.$booking[0]["tour_code"].')';
    $message .='  <br />ลิงค์ข้อมูลทัวร์ : <a href="'.base_url($this->lang->line("url_lang_tour").'/'.$booking[0]["tour_url"].'-'.$booking[0]["tour_id"].'">'.$booking[0]["tour_name"]).'</a>';


    $message .='  <br /><br />########## รายละเอียดการจ่ายเงิน ##########';
    foreach ($booking[0]["payment"] as $key => $value) {
      $message .='  <br />'.$key.' : '.$value;
    }

    $message .='  <br /><br />##########  รายละเอียดราคา ##########';
    foreach ($booking[0]["price"] as $key => $value) {
      $message .='  <br />';
      $message .='  <br />ชื่อแพ็คเกจ : '.$value["price_name"];
      $message .='  <br />ราคารวมของผู้ใหญ่ ('.$value["adult_amount_booking"].') : '.$value["total_adult_price"];
      $message .='  <br />ราคารวมของเด็ก ('.$value["child_amount_booking"].') : '.$value["total_child_price"];
      $message .='  <br />ราคารวมของทารก : ฟรี';
    }

    $message .='  <br />ราคารวมทั้งหมด : '.$booking[0]["grand_total_price"];
    $message .='  <br /><br />เงินที่ตัดจากลูกค้า (Paypal): '.$booking[0]["payment"]["PAYMENTINFO_0_AMT"].' '.$booking[0]["payment"]["PAYMENTINFO_0_CURRENCYCODE"];
    $message .='  <br />ค่าบริการ (Paypal) : '.$booking[0]["payment"]["PAYMENTINFO_0_FEEAMT"].' '.$booking[0]["payment"]["PAYMENTINFO_0_CURRENCYCODE"];
    $message .='  <br />ยอดสุทธิ : '.($booking[0]["payment"]["PAYMENTINFO_0_AMT"] - $booking[0]["payment"]["PAYMENTINFO_0_FEEAMT"]).' '.$booking[0]["payment"]["PAYMENTINFO_0_CURRENCYCODE"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ที่อยู่ : '.$booking[0]["address"].', '.$booking[0]["city"].', '.$booking[0]["province"].', '.$booking[0]["zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking[0]["telephone"];
    $message .='  <br />อีเมล : '.$booking[0]["email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking[0]["hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking[0]["room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking[0]["tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking[0]["request"];
    $message .='  <br />';
    $message .='</blockquote>';


    $this->load->library('email');

    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    $this->email->from('noreply@uastravel.com', 'ทัวร์เที่ยวไทย.com');
    $this->email->to('booking.uastravel@gmail.com');
    $this->email->bcc('payment@uastravel.com');

    $this->email->subject($subject);
    $this->email->message($message);

    return $this->email->send();
  }

  function _sendmail_user($booking = NULL){
    if(empty($booking)){
      return false;
    }
    // subject
    $subject = 'ยืนยันการจ่ายเงินของท่าน ('.$booking[0]["code"].')';

    $message ='<p>ท่านได้ทำการจ่ายเงิน เป็นจำนวน '.$booking[0]["payment"]["PAYMENTINFO_0_AMT"].' '.$booking[0]["payment"]["PAYMENTINFO_0_CURRENCYCODE"].' เมื่อ '.date(DATE_RFC2822,$booking[0]["payment"]["TIMESTAMP"]).'</p>';
    $message .='<blockquote>';
    $message .='  ##########  รายละเอียดการจอง ##########';
    $message .='  <br />หมายเลขการจอง : '.$booking[0]["code"];
    $message .='  <br />ชื่อทัวร์ : '.$booking[0]["tour_name"].'('.$booking[0]["tour_code"].')';
    if(strpos($booking[0]["tour_code"], "CT") === FALSE){
      $message .='  <br />ลิงค์ข้อมูลทัวร์ : <a href="'.base_url($this->lang->line("url_lang_tour").'/'.$booking[0]["tour_url"].'-'.$booking[0]["tour_id"].'">'.$booking[0]["tour_name"]).'</a>';
    }else{
      $message .='  <br />ลิงค์ข้อมูลทัวร์ : <a href="'.base_url('customtour/'.$booking[0]["tour_url"].'-'.$booking[0]["tour_id"].'">'.$booking[0]["tour_name"]).'</a>';
    } 
    $message .='  <br />##########  รายละเอียดราคา ##########';
    foreach ($booking[0]["price"] as $key => $value) {
      $message .='  <br />';
      $message .='  <br />ชื่อแพ็คเกจ : '.$value["price_name"];
      $message .='  <br />ราคารวมของผู้ใหญ่ ('.$value["adult_amount_booking"].') : '.$value["total_adult_price"];
      $message .='  <br />ราคารวมของเด็ก ('.$value["child_amount_booking"].') : '.$value["total_child_price"];
      $message .='  <br />ราคารวมของทารก : ฟรี';
    }

    $message .='  <br />ราคารวมทั้งหมด : '.$booking[0]["grand_total_price"];
    $message .='  <br />จำนวนเงินที่จ่าย : '.$booking[0]["payment"]["PAYMENTINFO_0_AMT"].' '.$booking[0]["payment"]["PAYMENTINFO_0_CURRENCYCODE"];
    $message .='  <br />';

    $message .='  <br />##########  รายละเอียดผู้จอง ##########';
    $message .='  <br />ที่อยู่ : '.$booking[0]["address"].', '.$booking[0]["city"].', '.$booking[0]["province"].', '.$booking[0]["zipcode"];
    $message .='  <br />เบอร์ติดต่อ : '.$booking[0]["telephone"];
    $message .='  <br />อีเมล : '.$booking[0]["email"];
    $message .='  <br />';
    $message .='  <br />ชื่อโรงแรมที่พัก : '.$booking[0]["hotel_name"];
    $message .='  <br />หมายเลขห้อง : '.$booking[0]["room_number"];
    $message .='  <br />วันที่เดินทาง : '.$booking[0]["tranfer_date"];
    $message .='  <br />ความต้องการเพิ่มเติม : '.$booking[0]["request"];
    $message .='  <br />';
    $message .='</blockquote>';
    $message .= '<p>หากมีข้อสงสัยกรุณาสอบถามเพิ่มเติม 093-741-8887 หรือ 076-331-280<br />
      หจก.ยูแอสทราเวล (ใบอนุญาตเลขที่ 34/000837)<br />
      เรายินดีให้บริการค่ะ</p>
        <a href="'.base_url().'">ทัวร์เที่ยวไทย.com</a>
        <br />โทร. 093-741-8887 หรือ 076-331-280
        <br />แฟกซ์. 076-331-273
        <br />80/86 หมู่บ้านศุภาลัยซิตี้ฮิลล์ ม.3
        <br />ต.รัษฎา อ.เมือง ภูเก็ต 83000
    ';


    $this->load->library('email');

    $config['mailtype'] = 'html';
    $this->email->initialize($config);

    $this->email->from('noreply@uastravel.com', 'ทัวร์เที่ยวไทย.com');
    $this->email->to($booking[0]["email"]);
    //$this->email->bcc('payment@uastravel.com');

    $this->email->subject($subject);
    $this->email->message($message);

    return $this->email->send();
  }
}

?>