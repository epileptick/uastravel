 <?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/user_inquiry.css').'">'); ?>

 <div class="row">
  <div class="col-md-6">
    <img src="<?php echo $imagepath.'/logo_booking600.jpg';?>">
    <h3 style="margin-top:5px; margin-bottom:5px;text-align: center;font-size: 22px;">ทัวร์เที่ยวไทย.com</h3>            
  </div>
  <div class="col-md-6">
    <center style="font-size:100%; !important;line-height: 150%; padding-top:50px;" >
    <br/>
    หจก.ยู แอส ทราเวล / U As Travel.Ltd.,Part.<br/>
    80/86 ม.3 ต.รัษฎา อ.เมือง ภูเก็ต 83000<br/>
    โทร : 076-331-280, 093-741-8887 แฟกซ์ : 076-331-273<br/>
    Email : info@uastravel.com
    Website: ทัวร์เที่ยวไทย.com
    </center>

  </div>
 </div>



  <div class="row">
    <div class="col-md-12 ">
        <div class="border" style="margin-bottom:0px !important;"></div>
    </div>
  </div>

 <div class="row">
  <div class="col-md-12">
    <h3 class="text-center">
      <strong>Tour</strong> <strong style="color:#FE5214;">Booking</strong>
    </h3>
    <div class="row">
      <div class="col-md-12 ">
          <div class="border"></div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-12">
        <h4>
          <?php echo $this->lang->line("tour_lang_customer_informations");?>
        </h4>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h5><?php echo $this->lang->line("tour_lang_booking_id");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_tour_name");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_client");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_address");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_telephone");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_email");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_tranfer");?> :</h5>
          <?php if(!empty($booking[0]["return_date"])){ ?>
          <h5><?php echo $this->lang->line("tour_lang_return_tranfer");?> :</h5>
          <?php } ?>
          <h5><?php echo $this->lang->line("tour_lang_hotel");?> :</h5>
          <h5><?php echo $this->lang->line("tour_lang_request");?> :</h5>
        </div>
        <div class="col-md-6">
          <h5><?php echo $booking[0]["code"];?></h5>
          <h5>
            <a href="<?php echo $booking[0]["tour_link"];?>">
              <?php echo $booking[0]["tour_name"];?>
            </a>
          </h5>
          <h5>
           <?php echo $booking[0]["firstname"];?> <?php echo $booking[0]["lastname"];?>
          </h5>
          <h5>
           <?php echo $booking[0]["address"];?>,
           <?php echo $booking[0]["city"];?>,
           <?php echo $booking[0]["province"];?>,
           <?php echo $booking[0]["zipcode"];?>
          </h5>
          <h5>
           <?php echo $booking[0]["telephone"];?>
          </h5>
          <h5>
           <?php echo $booking[0]["email"];?>
          </h5>
          <h5>
           <?php
              echo $booking[0]["tranfer_date"];
           ?>
          </h5>
          <?php if(!empty($booking[0]["return_date"])){ ?>
          <h5>
           <?php
              echo $booking[0]["return_date"];
           ?>
          </h5>
           <?php } ?>
          <h5>
             <?php
              if(!empty($booking[0]["hotel_name"])){
                echo $booking[0]["hotel_name"];
              }else{
                echo "-";
              }
             ?>
             <?php
              if($booking[0]["room_number"] != 0){
                echo " ".$this->lang->line("tour_lang_room")." ".$booking[0]["room_number"];
              }else{
                echo "-";
              }
           ?>
          </h5>
          <h5>
           <?php echo (!empty($booking[0]["request"])? $booking[0]["request"]:"-");?>
          </h5>


        </div>

      </div>

          <!-- เริ่มการเขียน แบบในบัดทันเดียวกัน-->
          <div class="row">
            <div class="col-md-12 ">
                <div class="border"></div>
            </div>
          </div>


         <div class="row">
          <div class="col-md-12">
            <h4>
                <?php echo $this->lang->line("tour_lang_passenger");?>
            </h4>
          </div>
          <div class="col-md-6">
            <h5>
                <?php echo $this->lang->line("tour_lang_amount_adult");?> :
            </h5>
          </div>
          <div class="col-md-6">
            <h5>
             <?php echo $booking[0]["adult_amount_passenger"];?>
            </h5>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <h5>
              <?php echo $this->lang->line("tour_lang_amount_children");?> :
            </h5>
          </div>
          <div class="col-md-6">
              <h5>
                <?php echo $booking[0]["child_amount_passenger"];?>
              </h5>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <h5>
              <?php echo $this->lang->line("tour_lang_amount_infant");?> :
            </h5>
          </div>
          <div class="col-md-6">
              <h5>
                <?php echo $booking[0]["infant_amount_passenger"];?>
              </h5>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 ">
            <div class="border"></div>
          </div>
        </div>
        <h4>
            <?php echo $this->lang->line("tour_lang_invoice_status");?>
        </h4>
        <?php
        if($booking[0]["payment_status"] == "completed"){
          ?>
          <h2 class="alert alert-success text-center invoice-status">ชำระแล้ว</h2>
          <?php
        }else if($booking[0]["payment_status"] == "pending"){
          ?>
          <h2 class="alert alert-info text-center invoice-status">ชำระแล้ว (รอคอนเฟิร์ม)</h2>
          <?php
        }else{
          ?>
          <p class="bg-danger text-center" style="font-size:30px;">ยังไม่ชำระ</p>
          <div class="clearfix"></div>
          <p class="text-center">ท่านสามารถชำระเงินได้โดยการคลิ๊กปุ่มด้านล่าง</p>
            <div class="twelve columns_2">
              <!-- PayPal Logo -->
              <table border="0" cellpadding="10" cellspacing="0" align="center" class="twelve columns_2 text-center">
                <tr>
                  <td class="twelve columns_2 text-center"><a href="<?php echo base_url("checkout/payment/".$booking[0]["hashcode"]);?>"><img src="<?php echo $imagepath."/btn-checkout-with-paypal.png";?>" width="256"/></a></td>
                </tr>
                <tr>
                  <td class="twelve columns_2 text-center">
                    <a href="https://www.paypal.com/th/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/th/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;">
                      <img src="https://www.paypalobjects.com/webstatic/en_TH/mktg/Logos/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">
                    </a>
                  </td>
                </tr>
              </table>
              <!-- PayPal Logo -->
            </div>
          <?php
        }
        ?>

    </div>

    
    


    <div class="col-md-6">
      <h4>ราคาแพคเกจทัวร์ (Tour Price)</h4>
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:43%;"><?php echo $this->lang->line("tour_lang_package_name");//ชื่อทัวร์?></th>
            <th style="width:13%;"><?php echo $this->lang->line("tour_lang_package_adult_price");//ราคาผู้ใหญ่?></th>
            <th style="width:10%;" class="text-center"><small><?php echo $this->lang->line("tour_lang_package_amount");//จำนวน?></small></th>
            <th style="width:13%;"><?php echo $this->lang->line("tour_lang_package_child_price");//ราคาเด็ก?></th>
            <th style="width:10%;" class="text-center"><small><?php echo $this->lang->line("tour_lang_package_amount");//จำนวน?></small></th>
            <th><?php echo $this->lang->line("tour_lang_package_total_price");//รวม?></th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($booking[0]["price"] as $key => $value) {
              $total_price_adult = 0;
              $total_price_child = 0;
            if(!empty($value["adult_amount_booking"])){
              $total_price_adult = $value["total_adult_price"] / $value["adult_amount_booking"];
            }
            if(!empty($value["total_child_price"])){
              $total_price_child = $value["total_child_price"] / $value["child_amount_booking"];
            }else{
              $value["total_child_price"] = 0;
            }
            $total_price = ($value["total_adult_price"] + $value["total_child_price"]);
          ?>
          <tr>
            <td><?php echo $value["price_name"];?></td>
            <td>
              <?php echo number_format($total_price_adult, 0);?>
            </td>
            <td class="text-center"><?php echo $value["adult_amount_booking"];?></td>
            <td class="text-center">
              <?php echo ($value["child_amount_booking"]  > 0 )? number_format($total_price_child, 0):"-"; ?>
            </td>
            <td><?php echo ($value["child_amount_booking"]  > 0 )? $value["child_amount_booking"]:"-"; ?></td>
            <td><?php echo number_format($total_price, 0);?></td>
          </tr>   
          <?php
            }
          ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12 ">
          <div class="border"></div>
        </div>
      </div>
      <input type="image" src="<?php echo $imagepath.'/button_print.jpg';?>" onClick="window.print()" >
      <input type="hidden" name="grand_total_price" value="500">
      <div class="grand_total_price pull-right"><?php echo $this->lang->line("tour_lang_package_grand_total");?> <span class="total_number"><?php echo number_format($booking[0]["grand_total_price"], 0);?></span> บาท</div>



    </div>
  </div>
 </div>


