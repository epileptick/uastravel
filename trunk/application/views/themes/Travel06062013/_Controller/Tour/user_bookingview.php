<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<style>
  h5 {
    margin-top:-7px !important;
  }
</style>
<head>
  <title>ข้อมูลการจอง <?php echo $booking[0]["code"]." (".$booking[0]["tour_name"].")";?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo $this->lang->line("tour_lang_tour_booking");?> <?php echo $booking[0]["tour_name"].'('.$booking[0]["tour_code"].')';?>" />
  <meta name="keywords" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">

  <script src="<?php echo $jspath.'/modernizr.foundation.js';?>"></script>
  <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="<?php echo $stylepath.'/tour.css';?>">
</head>
<body style="background: #ededed url(<?php echo $imagepath.'/bg5.jpg';?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
  <!-- Menu -->
  <div class="overly-bg"></div>


  <!-- Wrapper -->
  <div id="wrapper">

  <!-- Content -->
  <div class="row">
    <div class="twelve">
      <div class="print_page article_tour">

        <!-- Header -->
        <div class="row">
          <div class="twelve columns" >

              <div class="row">
                <div class="twelve columns">
                    <div class="five columns">
                        <img src="<?php echo $imagepath.'/logo_booking600.jpg';?>">
                        <h3 style="margin-top:5px; margin-bottom:5px;text-align: center;font-size: 22px;">ทัวร์เที่ยวไทย.com</h3>
                    </div>
                    <div class="six columns">
                      <center style="font-size:100%; !important;line-height: 150%;" >
                      <br/>
                      หจก.ยู แอส ทราเวล / U As Travel.Ltd.,Part.<br/>
                      80/86 ม.3 ต.รัษฎา อ.เมือง ภูเก็ต 83000<br/>
                      โทร : 076-331-280, 093-741-8887 แฟกซ์ : 076-331-273<br/>
                      Email : info@uastravel.com
                      Website: ทัวร์เที่ยวไทย.com
                      </center>
                    </div>


                </div>
              </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="clearfix"></div>
        <div class="border" style="margin-bottom:0px !important;"></div>

        <!-- Header Line-->
        <div class="row">
          <div class="twelve columns">

              <div class="row">
                <div class="twelve columns" >
                  <div class="four columns" >
                  </div>
                  <div class="five columns">
                      <h3>
                        <strong>Tour</strong> <strong style="color:#FE5214;">Booking</strong>
                      </h3>
                  </div>
                  <div class="three columns" >
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- End Header Line-->


        <div class="clearfix"></div>
        <div class="border"></div>

        <!-- Row 1 -->
        <div class="row">
          <!-- Left Column -->
          <div class="six columns">

          <!-- Customer -->
            <div class="row">
              <div class="twelve columns_2">
                <h4>
                    <?php echo $this->lang->line("tour_lang_customer_informations");?>
                </h4>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5><?php echo $this->lang->line("tour_lang_booking_id");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["code"];?>
                </h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2" >
                <div class="five columns_2">

                <h5><?php echo $this->lang->line("tour_lang_tour_name");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                  <a href="<?php echo $booking[0]["tour_link"];?>">
                    <?php echo $booking[0]["tour_name"];?>
                  </a>
                </h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5><?php echo $this->lang->line("tour_lang_client");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["firstname"];?> <?php echo $booking[0]["lastname"];?>
                </h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5><?php echo $this->lang->line("tour_lang_address");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["address"];?>,
                 <?php echo $booking[0]["city"];?>,
                 <?php echo $booking[0]["province"];?>,
                 <?php echo $booking[0]["zipcode"];?>
                </h5>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5><?php echo $this->lang->line("tour_lang_telephone");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["telephone"];?>
                </h5>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5><?php echo $this->lang->line("tour_lang_email");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["email"];?>
                </h5>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                  <h5><?php echo $this->lang->line("tour_lang_tranfer");?> :</h5>
                </div>
                <div class="seven columns_2">
                  <h5>
                   <?php
                      echo $booking[0]["tranfer_date"];
                   ?>
                  </h5>
                </div>
              </div>
            </div>
            <?php if(!empty($booking[0]["return_date"])){ ?>
            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                  <h5><?php echo $this->lang->line("tour_lang_return_tranfer");?> :</h5>
                </div>
                <div class="seven columns_2">
                  <h5>
                   <?php
                      echo $booking[0]["return_date"];
                   ?>
                  </h5>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">
                  <h5><?php echo $this->lang->line("tour_lang_hotel");?> :</h5>
                </div>
                <div class="seven columns_2">
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
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                  <h5><?php echo $this->lang->line("tour_lang_request");?> :</h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo (!empty($booking[0]["request"])? $booking[0]["request"]:"-");?>
                </h5>
                </div>
              </div>
            </div>
            <!-- End Customer -->

            <div class="border"></div>


            <!-- Passenger -->
            <div class="row">
              <div class="twelve columns_2">
                <h4>
                    <?php echo $this->lang->line("tour_lang_passenger");?>
                </h4>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5>
                    <?php echo $this->lang->line("tour_lang_amount_adult");?> :
                </h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["adult_amount_passenger"];?>
                </h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">

                <h5>
                    <?php echo $this->lang->line("tour_lang_amount_children");?> :
                </h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["child_amount_passenger"];?>
                </h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
                <div class="five columns_2">
                <h5>
                    <?php echo $this->lang->line("tour_lang_amount_infant");?> :
                </h5>
                </div>
                <div class="seven columns_2">
                <h5>
                 <?php echo $booking[0]["infant_amount_passenger"];?>
                </h5>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <!-- End Passenger -->

            <div class="border"></div>

            <!-- Invoice Status -->
            <div class="row">
              <div class="twelve columns_2">
                <h4>
                    <?php echo $this->lang->line("tour_lang_invoice_status");?>
                </h4>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns_2">
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
                  <h2 class="alert alert-error text-center invoice-status">ยังไม่ชำระ</h2>
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
            </div>
            
            <div class="clearfix"></div>
            <!-- End Invoice Status -->

          </div>
          <!-- End Left Column -->




          <!-- Right Column -->
          <div class="six columns">


            <!-- Price -->
            <div class="row">
              <div class="twelve columns_2">
                <h4>ราคาแพคเกจทัวร์ (Tour Price)</h4>
              </div>
            </div>

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
            <div class="border"></div>
            <div class="row">
              <div class="two columns_2" style="border-style:solid; margin-top:10px; border-width:0px;">
                <input type="image" src="<?php echo $imagepath.'/button_print.jpg';?>" onClick="window.print()" >
              </div>
              <div class="ten columns">
                <input type="hidden" name="grand_total_price" value="500">
                <div class="grand_total_price"><?php echo $this->lang->line("tour_lang_package_grand_total");?> <span class="total_number"><?php echo number_format($booking[0]["grand_total_price"], 0);?></span> บาท</div>
              </div>
              
            </div>
            <!-- End Price -->
          </div>
          <!-- End Column -->
        </div>
        <!-- End Row 1 -->
      </div>
    </div>
  </div>
  <!-- End Content -->
</div>

<DIV style="page-break-after:always"></DIV>

<div class="row print_page">
  <!-- Header -->
        <div class="row">
          <div class="twelve columns" >

              <div class="row">
                <div class="twelve columns">
                    <div class="five columns">
                        <img src="<?php echo $imagepath.'/logo_booking600.jpg';?>">
                        <h3 style="margin-top:5px; margin-bottom:5px;text-align: center;font-size: 22px;">ทัวร์เที่ยวไทย.com</h3>
                    </div>
                    <div class="six columns">
                      <center style="font-size:100%; !important;line-height: 150%;" >
                      <br/>
                      หจก.ยู แอส ทราเวล / U As Travel.Ltd.,Part.<br/>
                      80/86 ม.3 ต.รัษฎา อ.เมือง ภูเก็ต 83000<br/>
                      โทร : 076-331-280, 093-741-8887 แฟกซ์ : 076-331-273<br/>
                      Email : info@uastravel.com
                      Website: ทัวร์เที่ยวไทย.com
                      </center>
                    </div>


                </div>
              </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="clearfix"></div>
        <div class="border" style="margin-bottom:0px !important;"></div>

        <!-- Header Line-->
        <div class="row">
          <div class="twelve columns">
              <div class="row">
                <div class="twelve columns" >
                  <div class="four columns" >
                  </div>
                  <div class="five columns">
                      <h3>
                        <strong>Tour</strong> <strong style="color:#FE5214;">Booking</strong>
                      </h3>
                  </div>
                  <div class="three columns" >
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- End Header Line-->
        <div class="border"></div>
        <!--Remark-->
          <div class="twelve">
            <div class="alert">
              <h4>เงื่อนไขการจองทัวร์</h4>
              <ol>
                <li>เด็กอายุต่ำกว่า 3 ขวบ (ส่วนสูงไม่เกิน 90 เซนติเมตร) ไม่คิดค่าบริการ</li>
                <li>เด็กอายุ 3-11 ขวบ  (หรือส่วนสูง 90-140 เซนติเมตร) คิดราคาเด็ก </li>
                <li>ราคาข้างต้น ไม่รวมภาษีหัก ณ ที่จ่าย 3%  </li>
              </ol>

              <h4>การขอยกเลิก / เลื่อนวันเดินทาง</h4>
              <ul>
                <li>กรณีลูกค้ายกเลิกการเดินทาง หากแจ้งหลังจากจ่ายเงินมัดจำแล้ว</li>
                <li style="list-style: none;">
                  <ul>
                    <li>กรณีแจ้งยกเลิก / เลื่อนการเดินทาง ก่อน 30 วัน คืนเงินมัดจำ 100% (ยกเว้น ค่าที่พัก)</li>
                    <li>กรณีแจ้งยกเลิก / เลื่อนการเดินทาง ก่อน 10 วัน ขอสงวนสิทธิ์ในการไม่คืนเงินมัดจำ 50%</li>
                    <li>กรณีแจ้งยกเลิก / เลื่อนการเดินทาง น้อยกว่า 7 วัน ขอสงวนสิทธิ์ในการไม่คืนเงินค่าทัวร์ทั้งหมด</li>
                  </ul>
                </li>
              </ul>

              <h4>การจองทัวร์</h4>
              <ul>
                <li style="list-style: none;">สามารถจองทัวร์ผ่านหน้าเว็บไซต์ <a href="<?php echo base_url(); ?>"><?php echo $this->config->item("website"); ?></a> หรือแจ้งรายละเอียด และ ข้อมูลสำหรับจองทัวร์  มีดังนี้</li>
                <li style="list-style: none;">
                  <ol>
                    <li>รายการทัวร์ที่ต้องการ</li>
                    <li>ชื่อผู้เดินทาง</li>
                    <li>จำนวนผู้เดินทาง ผู้ใหญ่ / เด็ก (กรุณาระบุอายุของเด็กด้วย)</li>
                    <li>วันที่ใช้บริการท่องเที่ยว</li>
                    <li>ชื่อโรงแรม ที่พัก ในภูเก็ต</li>
                    <li>เบอร์โทรฯ มือถือ / อีเมล์ ที่สามารถติดต่อได้สะดวก</li>
                  </ol>
                </li>
              </ul>

            </div>
            
          </div>
          <div class="twelve">
            <div class="twelve column alert alert-success">
              <h4>ชำระมัดจำค่าทัวร์ 50% ผ่านบัญชีธนาคารส่วนที่เหลือ ชำระก่อนเดินทาง 15 วัน</h4>
              <div class="six column">
                <ul>
                  <li style="list-style: none;">ธนาคารไทยพาณิชย์สาขาเซ็นทรัล ภูเก็ต</li>
                  <li style="list-style: none;">ชื่อบัญชี นางวารีรัตน์ คู่อรุณเลขที่บัญชี 817-241178-7</li>
                  <li style="list-style: none;">SWIFT CODE: SICOTHBK</li>
                </ul>
              </div>
              <div class="six column">
                <ul>
                  <li style="list-style: none;">ธนาคารกสิกรไทยสาขาเซ็นทรัล ภูเก็ต</li>
                  <li style="list-style: none;">ชื่อบัญชี นางวารีรัตน์ คู่อรุณเลขที่บัญชี 482-2-41669-7</li>
                  <li style="list-style: none;">SWIFT CODE: KASITHBK</li>
                </ul>
              </div>
            </div>

          </div>
          

        <!--End Remark-->
</div>
<br>
{_include tracker}
</body>
</html>
