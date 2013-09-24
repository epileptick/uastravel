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
                     'zipcode'                    => $this->_prefix.'_zipcode',
                     'telephone'                  => $this->_prefix.'_telephone',
                     'email'                      => $this->_prefix.'_email',
                     'nationality'                => $this->_prefix.'_nationality',
                     'hotel_name'                 => $this->_prefix.'_hotel_name',
                     'room_number'                => $this->_prefix.'_room_number',
                     'tranfer_date'               => $this->_prefix.'_tranfer_date',
                     'request'                    => $this->_prefix.'_request',
                     'adult_amount_passenger'     => $this->_prefix.'_adult_amount_passenger',
                     'child_amount_passenger'     => $this->_prefix.'_child_amount_passenger',
                     'infant_amount_passenger'    => $this->_prefix.'_infant_amount_passenger',
                     'grand_total_price'          => $this->_prefix.'_grand_total_price',
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
        $total_price_adult += ($resultPrice[0]["sale_adult_price"]*$value["adult_amount"]);
        $total_price_child += ($resultPrice[0]["sale_child_price"]*$value["child_amount"]);
        $tourCustomer["adult_amount_passenger"] += $value["adult_amount"];
        $tourCustomer["child_amount_passenger"] += $value["child_amount"];
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
        $priceList[$key]["total_adult_price"] = $total_price_adult;
        $priceList[$key]["total_child_price"] = $total_price_child;
        $priceList[$key]["total_price"] = $tourCustomer["grand_total_price"];

        //Date default
        $priceList[$key]["cr_date"] = date("Y-m-d H:i:s");
        $priceList[$key]["lu_date"] = date("Y-m-d H:i:s");

        $this->tourbookingModel->add($priceList[$key]);
      }
      //Booing price
      //print_r($tourBooking); exit;

      $tourPrice["price"] = $priceList;
      $booking = $tourCustomer+ $tourPrice;

      return $booking;
    }else{
      return ;
    }

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
}
?>