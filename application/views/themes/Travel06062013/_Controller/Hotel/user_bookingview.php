


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<style>
  h5 {
    margin-top: -7px !important;
  }

</style>
<head>
  <title><?php echo $booking[0]->hoc_code."(".$booking[0]->hoc_hotel_name.")";?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="จอง<?php echo $booking[0]->hoc_hotel_name.'('.$booking[0]->hoc_hotel_code.')';?>" />
  <meta name="keywords" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/foundation.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/app.css');?>">
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/modernizr.foundation.js');?>"></script>
  <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Menu -->
  <div class="overly-bg"></div>


  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Menu -->
    <!--
    <div class="row">
      <div class="twelve columns">
        <nav class="top-bar">
          <ul>
            <li class="name">
              <a href="<?php echo base_url();?>"> 
                <img src="<?php echo base_url('themes/Travel/tour/images/logo.png');?>">
              </a>
            </li>
            <li class="toggle-topbar"><a href="#"></a></li>
          </ul>
          <section>
            <ul class="right">
              <li><a href="<?php echo base_url();?>">หน้าแรก</a></li>
              <li><a href="<?php echo base_url('location');?>">แหล่งท่องเที่ยว</a></li>
              <li><a class="active" href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์</a></li> 
              <li><a href="#">โปรโมชั่น</a></li>
                <li><a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>                
            </ul>
          </section>
        </nav>
      </div>
    </div>
   <br>
  -->
  <!-- End Menu -->

  <!-- Content -->
  <div class="row" style="border-style:solid; border-width:1px;">
    <div class="twelve columns">
      <div class="box_white_in_columns article_tour">

        <!-- Header -->
        <div class="row">
          <div class="twelve columns" >

              <div class="row">
                <div class="twelve columns">
                    <div class="five columns" style="margin-top:-10px">
                      <br/>                     
                        <img src="<?php echo base_url('themes/Travel/tour/images/logo_booking600.jpg');?>">   
                         <h4 style="margin-top:0px; margin-bottom:0px">   www.uastravel.com </h4>
                    </div>
                    <div class="six columns" style="margin-top:-7px">
                      <center style="font-size:150%; !important;" >  
                      <br/>                 
                      หจก.ยู แอส ทราเวล / U As Travel.Ltd.,Part.<br/>
                      80/86 ม.3 ต.รัษฎา อ.เมือง ภูเก็ต 83000<br/>
                      โทร : 076-331280 แฟกซ์ : 076-331273<br/>
                      Email : info@uastravel.com  
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
                  <div class="five columns" style="margin-bottom:-2px; font-size:350%; margin-top:-12px;">
                      <strong>Hotel</strong> <strong style="color:#FE5214;">Booking</strong>
                    
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
              <div class="twelve columns">
                <h5>
                    <b>รายละเอียดลูกค้า (Customer Information) </b>
                </h5> 
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Booking ID : <br>
                    หมายเลขการจอง : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_code;?>
                </h5> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns" >
                <div class="six columns">

                <h5>
                    Hotel Name : <br>
                    ชื่อโรงแรม : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_hotel_name;?>
                </h5> 
                </div>
              </div>
            </div>  

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Client : <br>
                    ลูกค้า : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_firstname;?> <?php echo $booking[0]->hoc_lastname;?>
                </h5> 
                </div>
              </div>
            </div>    


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Nationality : <br>
                    สัญชาติ : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_nationality;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Address : <br>
                    ที่อยู่ : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_address;?>, 
                 <?php echo $booking[0]->hoc_city;?>, 
                 <?php echo $booking[0]->hoc_province;?>, 
                 <?php echo $booking[0]->hoc_zipcode;?>
                </h5> 
                </div>
              </div>
            </div>          


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Telephone : <br>
                    เบอร์โทร : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_telephone;?>
                </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Email : <br>
                    อีเมล์ : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_email;?>
                </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                  <h5>
                      Check In: <br>
                      วันที่เช็คอินท์ : 
                  </h5>               
                </div>
                <div class="six columns">

                  <h5>
                   <?php 
                      $dateExplode = explode("-", $booking[0]->hoc_checkin_date);
                      $checkin_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      echo $checkin_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                  <h5>
                      Check Out: <br>
                      วันที่เช็คเอาท์ : 
                  </h5>               
                </div>
                <div class="six columns">

                  <h5>
                   <?php 
                      $dateExplode = explode("-", $booking[0]->hoc_checkout_date);
                      $checkout_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      echo $checkout_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                  <h5>
                      Request  : <br>
                      ความต้องการเพิ่มเติม : 
                  </h5>                  
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_request;?>
                </h5> 
                </div>
              </div> 
            </div> 
            <!-- End Customer -->

            <div class="border"></div>

           
            <!-- Passenger -->
            <div class="row">
              <div class="twelve columns">
                <h5>
                    <b>จำนวนผู้เข้าพัก (Number of guests) </b>
                </h5> 
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Number of Adults : <br>
                    จำนวนผู้ใหญ่ : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_adult_amount;?>
                </h5> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                <h5>
                    Number of Children : <br>
                    จำนวนเด็ก : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_child_amount;?>
                </h5> 
                </div>
              </div>
            </div>    

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">
                <h5>
                    Number of Infants : <br>
                    จำนวนเด็กทารก : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->hoc_infant_amount;?>
                </h5> 
                </div>
              </div>
            </div>   
            <div class="clearfix"></div>
            <!-- End Passenger -->

          </div>
          <!-- End Left Column -->




          <!-- Right Column -->
          <div class="six columns">


            <!-- Price -->
            <div class="row">
              <div class="twelve columns">
                <h5>
                     <b>ราคาห้องพัก (Rooms Price)  </b>
                </h5> 
              </div>
            </div>

            <?php
              foreach ($booking[0]->price as $key => $value) {
            ?>

              <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Room Type : <br>
                      ประเภทห้อง : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5>
<?php 
                    $price_sale = $value->hob_total_price;
                    $amount_room = $value->hob_room_amount_booking;
                    $amount_date = $value->hob_date_amount_booking;
                    $total_room_date = $amount_room * $amount_date;
                    $price_total = $price_sale / $total_room_date;

                  ?>
                   <?php echo $value->hob_price_name;?> ( <?php echo number_format ($price_total) ;?> ) / ห้อง  / วัน)
                   <!--<?php echo $value->hob_price_name;?> ( <?php echo number_format($value->hob_discount_room_price);?> / ห้อง  / วัน)-->
                  
                  </h5> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Number of Rooms : <br>
                      จำนวนห้อง : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5>
                   <?php echo $value->hob_room_amount_booking;?> ห้อง
                  </h5> 
                  </div>
                </div>
              </div>

                            <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Number of Date : <br>
                      จำนวนวัน : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5>
                   <?php echo $value->hob_date_amount_booking;?> วัน
                  </h5> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Price  : <br>
                      ราคารวม : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5>
                   <?php echo number_format($value->hob_total_price);?> บาท 
                   
                  </h5> 
                  </div>
                </div>
              </div> 
              <div class="clearfix"></div>
            <div class="border"></div>

            <?php
              }
            ?>  

            <div class="row">
              <div class="twelve columns" >
                <div class="twelve columns"   style="border-style:solid; border-width:1px;">
                  <div class="five columns" >
                    <h5 style="color:red; margin-top:10px !important;">
                        Total Price : <br>
                        ราคารวมทั้งหมด : 
                    </h5>                
                  </div>
                  <div class="five columns">
                    <h5 style="color:red; font-size:180%; margin-top:10px !important;" >
                      <?php echo number_format($booking[0]->hoc_grand_total_price, 0);?> บาท
                    </h5> 
                  </div>
                  <div class="two columns" style="border-style:solid; margin-top:10px; border-width:0px;">
                      <input type="image" src="<?php echo base_url('themes/Travel/images/button_print.jpg');?>" onClick="window.print()" >
                  </div>
                </div>
              </div>
            </div> 
            <!-- End Price -->

          </div>

          <!-- End Column -->
        </div>
        <!-- End Row 1 -->


<!--
        <div class="clearfix"></div>
        <div class="border"></div>
-->

        <!-- Row 2 -->
        <div class="row">

            <div class="row">
              <div class="twelve columns">
                <div class="eight columns">
                  <div class="row">
                    <div class="twelve columns">
                      <!-- h5>
                          <b>Remarks (หมายเหตุ)</b> <br>
                          1. blah blah blah <br>
                          2. blah blah blah
                      </h5 -->                
                    </div>
                  </div> 
                </div>
                <div class="four columns">
                 <!-- Sign Image -->
                </div>            
            </div>
          </div>
          <!-- End Row 2 -->
        <!--
          <div class="row">
            <div class="twelve columns" >
                                <h5>
              หมายเหตุ
                   image<br>
                   image<br>
                   image<br>
                   image<br>
                  </h5>
            </div>
          </div>

        -->
      </div>
    </div>
  </div>
  <!-- End Content -->

  <!--Remark-->
           <div class="twelve columns">
            <div class="twelve columns" style="border-style:solid; border-width:1px; margin-top:-5px; margin-bottom:10px; border-color:#C0C0C0; !important;">
              <b style="color:red; font-size:200%; margin-top:-6px; margin-bottom:-22px; !important;" > หมายเหตุ : </b>
              <ul style="margin-bottom:5px;"> 
                <li style="font-size:115%;"><b>การชำระเงิน :</b> โดยการโอนเงินผ่านธนาคารกสิกรไทย / ชื่อบัญชี : นาง วารีรัตน์ คู่อรุณ / เลขที่บัญชี 482-2-41669-7 <br/> 
                  &nbsp;&nbsp;&nbsp;หรือ ธนาคารไทยพาณิชย์ / ชื่อบัญชี : นางวารีรัตน์ คู่อรุณ / เลขที่บัญชี 817-241178-7</li>                <li style="font-size:115%;">แฟกซ์เอกสารการโอนเงิน มาที่ 076-331273 หรือ Email แจ้งที่ info@uastravel.com </li>
                <li style="font-size:115%;">เมื่อได้รับการยืนยัน การชำระเงินแล้ว ทางทีมงานจะจัดส่งใบยืนยัน และใบเสร็จรับเงิน ให้ทางอีเมล ( ภายในเวลาไม่เกิน 1 วัน นับจากวันโอนเงิน )</li>
                <li style="font-size:115%;"><b> สอบถามข้อมูลเพิ่มเติม ติดต่อ :</b> info@uastravel.com  หรือโทร 082-812-1146 ขอบคุณค่ะ</li>
            </ul> 
            </div>  
          </div>
          
  <!--End Remark-->

</div>
<br>
{_include tracker}
</body>
</html>
