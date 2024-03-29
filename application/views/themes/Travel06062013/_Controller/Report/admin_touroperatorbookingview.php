


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
  <title><?php echo $booking[0]->toc_code."(".$booking[0]->toc_tour_name.")";?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="จอง<?php echo $booking[0]->toc_tour_name.'('.$booking[0]->toc_tour_code.')';?>" />
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

  <script type="text/javascript">
//<![CDATA[
  function redirect(url) {
    window.location.href = url;
  }
//]]>
</script>

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
                      <center><strong>Tour</strong> <strong style="color:#FE5214;">Voucher</strong></center>
                    
                  </div>
                  <div class="four columns" style="font-size:150%; margin-top:5px; margin-bottom:7px;">
                    <b>Voucher No. &nbsp;:</b>     <?php echo $booking[0]->toc_code;?> <br/>
                    <b>Voucher Date : </b> <?php echo($today); ?> 

                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- End Header Line-->


        <div class="clearfix"></div>
        

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
              <div class="twelve columns" >
                <div class="six columns">

                <h5>
                    Tour Name : <br>
                    ชื่อทัวร์ : 
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->toc_tour_name;?>
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
                 <?php echo $booking[0]->toc_firstname;?> <?php echo $booking[0]->toc_lastname;?>
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
                 <?php echo $booking[0]->toc_nationality;?>
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
                 <?php echo $booking[0]->toc_address;?>, 
                 <?php echo $booking[0]->toc_city;?>, 
                 <?php echo $booking[0]->toc_province;?>, 
                 <?php echo $booking[0]->toc_zipcode;?>
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
                 <?php echo $booking[0]->toc_telephone;?>
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
                 <?php echo $booking[0]->toc_email;?>
                </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                  <h5>
                      Tranfer: <br>
                      วันเดินทาง : 
                  </h5>               
                </div>
                <div class="six columns">

                  <h5>
                   <?php 
                      $dateExplode = explode("-", $booking[0]->toc_tranfer_date);
                      $tranfer_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                      echo $tranfer_date;
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                  <h5>
                      Hotel: <br>
                      ชื่อที่พัก : 
                  </h5>               
                </div>
                <div class="six columns">

                  <h5>
                   <?php 
                    if(!empty($booking[0]->toc_hotel_name)){
                      echo $booking[0]->toc_hotel_name;
                    }else{
                      echo "-";
                    }
                   ?>
                  </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="six columns">
                  <h5>
                      Room  : <br>
                      เลขห้อง : 
                  </h5>                  
                </div>
                <div class="six columns">
                <h5>
                 <?php 
                  if($booking[0]->toc_room_number != 0){
                    echo $booking[0]->toc_room_number;
                  }else{
                    echo "-";
                  }
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
                      ความต้องการเพิ่มเติม: 
                  </h5>                  
                </div>
                <div class="six columns">
                <h5>
                 <?php echo $booking[0]->toc_request;?>
                </h5> 
                </div>
              </div> 
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="six columns">

                  <h5>
                      Service Order  : <br>
                      ส่งให้ทัวร์: 
                  </h5>                  
                </div>
                <div class="six columns">
                <h5>
               
                  <?php 
                    foreach ($getprice as $key => $value) { ?>
                  <?php
                      if(urldecode($this->uri->segment(6)) == $value->pri_agency_id){
                  ?>

                     <?php echo $value->agn_name;?><br/>
                 
                 
                 <?php
                      }  
                    }
                 ?> 

                 <br/>

                  <?php 
                    foreach ($getprice as $key => $value) { ?>
                  <?php
                      if(urldecode($this->uri->segment(6)) == $value->pri_agency_id){
                  ?>

                    
                    <?php echo $value->pri_net_adult_price; ?>
                    <?php echo $value->pri_net_child_price; ?><br/>
                 
                 <?php
                      }  
                    }
                 ?> 

          
                </h5> 
                </div>
              </div> 
            </div>             
            <!-- End Customer -->

            

          

          </div>
          <!-- End Left Column -->




          <!-- Right Column -->
          <div class="six columns">
            <!-- Passenger -->
            <div class="row">
              <div class="twelve columns">
                <h5>
                    <b>จำนวนผู้เดินทาง (Passenger) </b>
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
                 <?php echo $booking[0]->toc_adult_amount_passenger;?>
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
                 <?php echo $booking[0]->toc_child_amount_passenger;?>
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
                 <?php echo $booking[0]->toc_infant_amount_passenger;?>
                </h5> 
                </div>
              </div>
            </div>   

            <div class="clearfix"></div>
            <div class="border"></div>
            <!-- End Passenger -->
             <div class="row">
              <div class="twelve columns">
                <div class="six columns">
                <h5>
                    Issue by : <br>                  
                </h5>                
                </div>
                <div class="six columns">
                <h5>
                 Three 082-812-1146
                </h5> 
                </div>
              </div>
            </div>

        <!-- Price -->


            <div class="row">
              <div class="twelve columns">
                <h5>
                     <b>ราคาแพคเกจทัวร์ (Tour Price)  </b>
                </h5> 
              </div>
            </div>

            <?php
            foreach ($booking[0]->price as $key => $value) {
             
                foreach( $agencies as $key => $valueagency) {  
                  if(urldecode($this->uri->segment(6)) == $valueagency->agn_id ){   
               
            ?>

              <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Name of Price : <br>
                      ชื่อราคา : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5> 
                   <?php echo $value->tob_price_name;?>
                  </h5> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Price of Adults : <br>
                      ราคาผู้ใหญ่ : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5>
       

                  <?php 
                    $adult_net = $valueagency->pri_net_adult_price;
                    $amount_adult = $value->tob_adult_amount_booking;
                    $total_net_price_adult = $adult_net * $amount_adult;
                  ?>

                   <?php echo number_format($total_net_price_adult, 0);?> บาท 
                   (<?php echo number_format($valueagency->pri_net_adult_price, 0);?> x <?php echo $value->tob_adult_amount_booking;?>)

     
                  </h5> 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="twelve columns">
                  <div class="five columns">

                  <h5>
                      Price of Children : <br>
                      ราคาเด็ก : 
                  </h5>                
                  </div>
                  <div class="seven columns">
                  <h5>

                  <?php 
                    $child_net = $valueagency->pri_net_child_price;
                    $amount_child = $value->tob_child_amount_booking;
                    $total_net_price_child = $child_net * $amount_child;
                  ?>

                   <?php echo number_format($total_net_price_child, 0);?> บาท 
                   (<?php echo number_format($valueagency->pri_net_child_price, 0);?> x <?php echo $value->tob_child_amount_booking;?>)
  
                  </h5> 
                  </div>
                </div>
              </div> 
              <div class="clearfix"></div>
            <div class="border"></div>
            <?php
                  }
                 } 
               }
            ?> 
 <?php
if($booking[0]->toc_grand_total_net_price > 0){
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
                    <h5 style="color:red; font-size:200%; margin-top:10px !important;" >
                      <?php echo number_format($booking[0]->toc_grand_total_net_price, 0);?> บาท
                    </h5> 
                  </div>

                </div>
              </div>
            </div> 

            <?php
}else{}

            ?>




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
  <!-- End Con -->
                 
  
</div>

    <!-- Agency -->

        <div class="row">
          <div class="twelve columns">
              <div class="six columns">
                <script>
                  var agencies = new Array();
                  var price = new Array();
                </script>
                  <h2 class="section_heading" >
                    <span style="margin: 5px 0px 0px 0px; font: 16px Arial, sans-serif;">
                      Service Order
                      <!-- input type="search" id="query_agencyname" style="width:30%;" disabled/ -->
                      <select id="query_agencyname" style="margin: 5px 0px 0px 0px; font: 14px Arial, sans-serif;"  onchange="redirect(this.value);">
                      <option value="<?php echo base_url('#');?>" selected>** Select Service Order **</option>
                      <?php 
                        foreach ($getprice as $key => $value) { ?>
                       <?php   

                          if(urldecode($this->uri->segment(6)) == $value->agn_id){

                      ?>
                          <option value="<?php echo base_url("admin/report/tour/admin/".$this->uri->segment(5)."/".$value->agn_id);?>">
                            <?php echo $value->agn_name;?>
                          </option>
                      <?php

                          }else{
                      ?> 

                          <option value="<?php echo base_url("admin/report/tour/admin/".$this->uri->segment(5)."/".$value->agn_id);?>">
                            <?php echo $value->agn_name;?>
                          </option>

                      <?php
                          }
                      ?>
                        


                      <?php
                        }
                      ?>  
                      </select>

                    </span>
                  </h2>
                <br>
            </div>
            <div class="six columns" style="border-style:solid; margin-top:63px; border-width:0px;">
              <input type="image" src="<?php echo base_url('themes/Travel/images/button_print.jpg');?>" onClick="window.print()" >
            </div>

          </div>
        </div>

  <!-- Agency End -->

<br>
{_include tracker}
</body>
</html>
