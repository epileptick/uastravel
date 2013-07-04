


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<style>
  h5 {
    margin-top: 0px !important;
  }
</style>
<head>
  <title><?php echo $booking[0]->flt_code."(".$booking[0]->flt_nameairline.")";?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="จอง<?php echo $booking[0]->flt_firstname.'('.$booking[0]->flt_code.')';?>" />
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

   <?php $today = date("j / n / Y"); ?>

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

        <!-- Header Line-->
         <div class="row">
          <div class="twelve columns">

              <div class="row" style="border-style:solid; border-width:1px; margin-top:10px; margin-bottom:10px; border-color:#000000; !important;">
                <div class="twelve columns" >

                  <div class="eight columns" style="font-size:400%; margin-top:-7px;">
                      <center><strong>Airline</strong> <strong style="color:#FE5214;">Voucher</strong></center>
                    
                  </div>
                  <div class="four columns" style="font-size:150%; margin-top:5px; margin-bottom:7px;">
                    Voucher No. &nbsp;:     <?php echo $booking[0]->flt_code;?> <br/>
                    Voucher Date :  <?php echo($today); ?> 

                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- End Header Line-->

        <div class="clearfix"></div>

        <!-- Row 1 -->
        <div class="row">
          <!-- Customer -->
          <div class="six columns">

            <div class="row">
              <div class="twelve columns">
                <h5>
                    <b>รายละเอียดลูกค้า (Customer Information) </b>
                </h5> 
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Client : <br>
                    ลูกค้า : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_firstname;?> <?php echo $booking[0]->flt_lastname;?>
                </h5> 
                </div>
              </div>
            </div>    


            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Nationality : <br>
                    สัญชาติ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_nationality;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Address : <br>
                    ที่อยู่ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_address;?>, <?php echo $booking[0]->flt_city;?>, <?php echo $booking[0]->flt_province;?>, <?php echo $booking[0]->flt_zipcode;?>
                </h5> 
                </div>
              </div>
            </div>          


            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Telephone : <br>
                    เบอร์โทร : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_telephone;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Email : <br>
                    อีเมล์ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_email;?>
                </h5> 
                </div>
              </div>
            </div> 

    <!-- End Customer -->

    <!-- Amount -->

            <div class="row">
              <div class="twelve columns">
                <h5>
                    <b>จำนวนผู้เดินทาง (Passenger) </b>
                </h5> 
              </div>
            </div>

          <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Number of Adults : <br>
                    จำนวนผู้ใหญ่ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_adult_amount;?>
                </h5> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Number of Children: <br>
                    จำนวนเด็ก : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_child_amount;?>
                </h5> 
                </div>
              </div>
            </div>    

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">
                <h5>
                    Number of Infants : <br>
                    จำนวนเด็กทารก : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_infant_amount;?>
                </h5> 
                </div>
              </div>
            </div>  

          </div>
    <!-- End Amount -->



    <!-- Airline Booking-->
          <div class="six columns">
            <div class="row">
              <div class="twelve columns">
                <h5>
                    <b>รายละเอียดการจองตั๋วเครื่องบิน (Airline Booking Information) </b>
                </h5> 
              </div>
            </div>


            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Airline : <br>
                    สายการบิน : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_nameairline;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    From : <br>
                    เดินทางจาก : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_from_location;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    To : <br>
                    ไป : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_go_to_location;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Depart date : <br>
                      วันที่ออกเดินทาง : 
                  </h5>               
                </div>
                <div class="seven columns">

                  <h5>
                   <?php 
                      $dateExplode = explode("-", $booking[0]->flt_depart_date);
                      $flt_depart_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      echo $flt_depart_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Depart time : <br>
                    เวลาออกเดินทาง : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_depart_time;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Return date : <br>
                      วันที่เดินทางกลับ : 
                  </h5>               
                </div>
                <div class="seven columns">

                  <h5>
                   <?php 
                      $dateExplode = explode("-", $booking[0]->flt_return_date);
                      $flt_return_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      echo $flt_return_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Return time : <br>
                    เวลาเดินทางกลับ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_return_time;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Request  : <br>
                      ความต้องการเพิ่มเติม: 
                  </h5>                  
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_message;?>
                </h5> 
                </div>
              </div> 
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Type  : <br>
                      ประเภท : 
                  </h5>                  
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_type;?>
                </h5> 
                </div>
              </div> 
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      class : <br>
                      ชั้นที่นั่ง : 
                  </h5>                  
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->flt_class;?>
                </h5> 
                </div>
              </div> 
            </div> 



          <div class="clearfix"></div>
          <div class="border"></div>
          <div class="row">
            <div class="twelve columns">
              <div class="twelve columns" style="border-style:solid; border-width:1px;">
                <div class="ten columns">
                  <center style="color:red; margin-top:6px; margin-bottom:6px; font-size:135%; !important;">
                        ขอขอบคุณที่ไว้วางใจในบริการของเรา <br />ทางทีมงานจะติดต่อกลับภายใน 24 ชั่วโมง               
                  </center>
                </div>
                <div class="two columns" style="border-style:solid; margin-top:5px; border-width:0px;">
                  <input type="image" src="<?php echo base_url('themes/Travel/images/button_print.jpg');?>" onClick="window.print()" >
                </div>
              </div>
            </div> 
          </div>
          <!-- End Airline Booking -->
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

</div>
<!-- End Wraper -->

{_include tracker}
</body>
</html>