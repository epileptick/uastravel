


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
  <title><?php echo "จองรถเช่า U As Travel";?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="จอง<?php echo $booking[0]->cab_firstname.'('.$booking[0]->cab_code.')';?>" />
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



<!--test-->

<!--End test-->

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
  <div class="row" style="border-style:solid; border-width:2px;">
    <div class="twelve columns">
      <div class="box_white_in_columns article_tour">

        <!-- Header -->
        <div class="row">
          <div class="twelve columns" >

              <div class="row">
                <div class="twelve columns">
                  <div class="four columns">
                    <br>
                    <a href="<?php echo base_url();?>">
                      <img src="<?php echo base_url('themes/Travel/tour/images/logo.png');?>">
                    </a>
                  </div>
                  <div class="two columns">
                    
                  </div>
                  <div class="six columns" style="text-align:right;">
                    <h1>
                      <strong>Carrent</strong> <strong style="color:#FE5214;">Booking</strong>
                    </h1>                
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
                <div class="twelve columns">
                  <div class="two columns">
                    uastravel
                  </div>
                  <div class="two columns">
                    uastravel
                  </div>
                  <div class="two columns">
                    uastravel
                  </div>
                  <div class="two columns">
                    uastravel
                  </div>
                  <div class="two columns">
                    uastravel
                  </div>
                  <div class="two columns">
                    uastravel
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
                    Booking ID : <br>
                    หมายเลขการจอง : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_code;?>
                </h5> 
                </div>
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
                 <?php echo $booking[0]->cab_firstname;?> <?php echo $booking[0]->cab_lastname;?>
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
                 <?php echo $booking[0]->cab_nationality;?>
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
                 <?php echo $booking[0]->cab_address;?>, <?php echo $booking[0]->cab_city;?>, <?php echo $booking[0]->cab_province;?>, <?php echo $booking[0]->cab_zipcode;?>
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
                 <?php echo $booking[0]->cab_telephone;?>
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
                 <?php echo $booking[0]->cab_email;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Request  : <br>
                      ความต้องการเพิ่มเติม : 
                  </h5>                  
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_message;?>
                </h5> 
                </div>
              </div> 
            </div> 

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
                    Number of Passenger: <br>
                    จำนวนผู้โดยสาร : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_passenger_amount;?>
                </h5> 
                </div>
              </div>
            </div> 

          </div>
          <!-- End Customer -->



          <!-- Detail Booking-->
          <div class="six columns">
            <div class="row">
              <div class="twelve columns">
                <h5>
                    <b>รายละเอียดการจองรถ (Carrent Booking Information) </b>
                </h5> 
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Type of car : <br>
                    ประเภทรถยนต์ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_typecar;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Price : <br>
                    ราคา : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo number_format ($booking[0]->cab_price);?> ฿ / วัน
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Pick up location : <br>
                    สถานที่รับรถ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_pickup_location;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Tranfer: <br>
                      วันที่จองรถ : 
                  </h5>               
                </div>
                <div class="seven columns">

                  <h5>
                   <?php 
                      $dateExplode = explode("-", $booking[0]->cab_pickup_date);
                      $cab_pickup_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      echo $cab_pickup_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Pick up location : <br>
                    เวลาที่รับรถ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_pickup_time;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Drop off location : <br>
                    สถานที่คืนรถ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_dropoff_location;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                  <h5>
                      Tranfer: <br>
                      วันที่คืนรถ : 
                  </h5>               
                </div>
                <div class="seven columns">

                  <h5>
                   <?php 
                      $sdateExplode = explode("-", $booking[0]->cab_dropoff_date);
                      $cab_dropoff_date = $sdateExplode[2]."/".$sdateExplode[1]."/".$sdateExplode[0];
                      echo $cab_dropoff_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Pick up location : <br>
                    เวลาที่คืนรถ : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_dropoff_time;?>
                </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="five columns">

                <h5>
                    Credit card : <br>
                    บัตรเครดิต : 
                </h5>                
                </div>
                <div class="seven columns">
                <h5>
                 <?php echo $booking[0]->cab_credit;?>
                </h5> 
                </div>
              </div>
            </div> 


          <div class="clearfix"></div>
          <div class="border"></div>
          <div class="row">
            <div class="twelve columns" >
              <div class="twelve columns" style="border-style:solid; border-width:1px;">
                <div class="row">
                    <?php 
                      $dateExplode = explode("-", $booking[0]->cab_pickup_date);
                      $cab_pickup_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      $sdateExplode = explode("-", $booking[0]->cab_dropoff_date);
                      $cab_dropoff_date = $sdateExplode[2]."/".$sdateExplode[1]."/".$sdateExplode[0];
                      $price = ($booking[0]->cab_price);                     
                        $mymonth=$dateExplode[1];
                        $mymonth2=$sdateExplode[1];
                        $myday=$dateExplode[2];
                        $myday2=$sdateExplode[2];
                        $myyear=$dateExplode[0];
                        $myyear2=$sdateExplode[0];
                        $jdDay = gregoriantojd($mymonth,$myday,$myyear); 
                        $jdDay2 = gregoriantojd($mymonth2,$myday2,$myyear2); 
                        $mycal = $jdDay2-$jdDay;
                            $mycal = $jdDay2 - $jdDay;

                            $totalprice = $mycal * $price;
                    ?>
                  <div class="six columns" >
                    <h5 style="color:red; margin-top:10px !important;">
                        Total Price : <br>
                        ราคารวมทั้งหมด : 
                    </h5>                
                  </div>
                  <div class="six columns">
                    <h5 style="color:red; font-size:200%; margin-top:10px !important;" >
                    <?php echo number_format("$totalprice") ;?> บาท
                    </h5> 
                  </div>  
                </div>

              </div>
            </div>        
          </div>

          <div class="row">
            <div class="twelve columns" ><center style="color:red; font-size:130%; margin-top:10px !important;">
               ขอขอบคุณที่ไว้วางใจในบริการของเรา ทางทีมงานจะติดต่อกลับภายใน 24 ชั่วโมง</center>
            </div>
          </div>
           
        </div> 
  
 <!-- End Carrent Booking -->

      

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
            <div class="twelve columns" style="border-style:solid; border-width:1px; border-color:#C0C0C0;">
              <b style="color:red; font-size:200%; margin-top:2px !important;" > หมายเหตุ : </b>
              <ul>
                <li><b>การชำระเงิน :</b> โดยการโอนเงินผ่านธนาคารกสิกรไทย / ชื่อบัญชี : หจก.ยู แอสทราเวล / เลขที่บัญชี  482-2-39689-0</li>
                <li>โทรแจ้งการโอนเงิน / สอบถามข้อมูลเพิ่มเติม ที่หมายเลข โทรศัพท์ (082)812-1146, (088)766-1657, หรือ Email แจ้งที่ info@uastravel.com </li>
                <li>เมื่อได้รับการยืนยัน การชำระเงินแล้ว ทางทีมงานจะจัดส่งใบยืนยัน และใบเสร็จรับเงิน ให้ทางอีเมล ( ภายในเวลาไม่เกิน 1 วัน นับจากวันโอนเงิน )</li>
                <li><b> สอบถามข้อมูลเพิ่มเติม ติดต่อ :</b> info@uastravel.com  หรือโทร 082-812-1146 ขอบคุณค่ะ</li>
             </ul>
            </div>  
          </div>
          
  <!--End Remark-->

  <footer>
    <div class="row">
      <div class="shadow"></div>
      <div class="seven columns">    
        <h4>
            &nbsp;&nbsp;&nbsp;&nbsp;Uastravel<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;info@uastravel.com<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000                                              
         </h4>  
      </div>
      <div class="five columns">
        <div class="address">
          <br/><br/><br/>
          <p>Copyright © Uastravel.com&nbsp;&nbsp;</p>
        </div>
      </div>
    </div>
  </footer>
</div>

<?php include_once("themes/Travel/tour/analyticstracking.php") ?>
</body>
</html>