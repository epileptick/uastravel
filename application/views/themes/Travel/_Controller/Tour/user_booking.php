


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $tour[0]->name;?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="จอง<?php echo $booking[0]->tob_tour_name.'('.$booking[0]->tob_tour_code.')';?>" />
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
  <div class="row">
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
                  <div class="four columns">
                    
                  </div>
                  <div class="four columns" style="text-align:right;">
                    <h1>
                      <strong>Tour</strong> <strong style="color:#FE5214;">Voucher</strong>
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
                <div class="four columns">

                <h5>
                    Booking ID : <br>
                    หมายเลขการจอง : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_code;?>
                </h5> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Tour Name : <br>
                    ชื่อทัวร์ : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_tour_name;?>
                </h5> 
                </div>
              </div>
            </div>  

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Client : <br>
                    ลูกค้า : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_firstname;?> <?php echo $booking[0]->tob_lastname;?>
                </h5> 
                </div>
              </div>
            </div>    


            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Nationality : <br>
                    สัญชาติ : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_nationality;?>
                </h5> 
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Address : <br>
                    ที่อยู่ : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_address;?>, <?php echo $booking[0]->tob_city;?>, <?php echo $booking[0]->tob_province;?>, <?php echo $booking[0]->tob_zipcode;?>
                </h5> 
                </div>
              </div>
            </div>          


            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Telephone : <br>
                    เบอร์โทร : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_telephone;?>
                </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Email : <br>
                    อีเมล์ : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_email;?>
                </h5> 
                </div>
              </div>
            </div> 

          </div>
          <!-- End Customer -->



          <!-- Amount -->
          <div class="six columns">

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Number of Adults : <br>
                    จำนวนผู้ใหญ่ : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_adult_amount;?>
                </h5> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Number of Children : <br>
                    จำนวนเด็ก : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_child_amount;?>
                </h5> 
                </div>
              </div>
            </div>    

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">
                <h5>
                    Number of Infants : <br>
                    จำนวนเด็กทารก : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo $booking[0]->tob_infant_amount;?>
                </h5> 
                </div>
              </div>
            </div>   


            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Price of Adults : <br>
                    ราคาผู้ใหญ่ : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo number_format($booking[0]->tob_total_adult_price, 0);?> บาท
                </h5> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">

                <h5>
                    Price of Children : <br>
                    ราคาเด็ก : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 <?php echo number_format($booking[0]->tob_total_child_price, 0);?> บาท
                </h5> 
                </div>
              </div>
            </div>    

            <div class="row">
              <div class="twelve columns">
                <div class="four columns">
                <h5>
                    Price of Infants : <br>
                    ราคาเด็กทารก : 
                </h5>                
                </div>
                <div class="eight columns">
                <h5>
                 0 บาท
                </h5> 
                </div>
              </div>
            </div> 


            <div class="row">
              <div class="twelve columns">
                <div class="four columns" >
                  <h5 style="color:red;">
                      Total Price : <br>
                      ราคารวมทั้งหมด : 
                  </h5>                
                </div>
                <div class="eight columns" >
                  <h5 style="color:red;">
                   <?php echo number_format($booking[0]->tob_total_price, 0);?> บาท
                  </h5> 
                </div>
              </div>
            </div> 



          </div>
          <!-- End Amount -->
        </div>
        <!-- End Row 1 -->



        <div class="clearfix"></div>
        <div class="border"></div>


        <!-- Row 1 -->
        <div class="row">
          <!-- Customer -->
          <div class="twelve columns">

            <div class="row">
              <div class="four columns">

                <div class="row">
                  <div class="twelve columns">
                    <div class="four columns">
                      <h5>
                          Hotel: <br>
                          ชื่อที่พัก : 
                      </h5>                
                    </div>
                    <div class="eight columns">
                      <h5>
                       <?php echo $booking[0]->tob_hotel_name;?>
                      </h5> 
                    </div>
                  </div>
                </div>               
              </div>


              <div class="four columns" >
                <div class="row">
                  <div class="twelve columns">
                    <div class="four columns">
                      <h5>
                          Room  : <br>
                          เลขห้อง : 
                      </h5>                
                    </div>
                    <div class="eight columns">
                      <h5>
                       <?php echo $booking[0]->tob_room_number;?>
                      </h5> 
                    </div>
                  </div>
                </div>  
              </div>


              <div class="four columns">
                <div class="row">
                  <div class="twelve columns">
                    <div class="four columns">
                      <h5>
                          Tranfer: <br>
                          วันเดินทาง : 
                      </h5>                
                    </div>
                    <div class="eight columns">
                      <h5>
                       <?php 
                          $dateExplode = explode("-", $booking[0]->tob_tranfer_date);
                          $tranfer_date = $dateExplode[2]."/".$dateExplode[1]."/".$dateExplode[0];
                          echo $tranfer_date;
                       ?>
                      </h5> 
                    </div>
                  </div>
                </div>  
              </div>
            </div>  


            <div class="row">
              <div class="twelve columns">
                <div class="eight columns">
                  <div class="row">
                    <div class="twelve columns">
                      <h5>
                          Remarks : <br>
                          ความต้องการเพิ่มเติม : 
                      </h5>                
                    </div>
                  </div> 
                  <div class="row">
                    <div class="twelve columns">
                        <h5>
                          <?php echo $booking[0]->tob_request;?>
                        </h5>               
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

  <footer>
    <div class="row">
      <div class="shadow"></div>
      <div class="seven columns">
        <nav>
          <ul class="menu_footer">
            <li><a href="">หน้าแรก</a></li>
            <li><a href="">แพ็คเกจทัวร์</a></li>
            <li><a href="">เกี่ยวกับเรา</a></li>
            <li><a href="">ติดต่อเรา</a></li>
            <li><a href="">โปรโมชั่น</a></li>                           
          </ul>
        </nav>
        <div class="clearfix"></div>
        <p>Copyright © Uastravel.com</p>          
      </div>
      <div class="five columns">
        <div class="address">
          <p>Uastravel</p>
          <p>uastravel@hotmail.com</p>
          <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- End Wraper -->

<?php include_once("themes/Travel/tour/analyticstracking.php") ?>
</body>
</html>
