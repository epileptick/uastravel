<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $hotel[0]->name;?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo (!empty($hotel[0]->short_description))?$hotel[0]->short_description:"";?>" />
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


<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // validate signup form on keyup and submit
    var validator = $("#booking_validate").validate({
      rules: {
        hoc_firstname: "required",
        hoc_lastname: "required",
        hoc_address: "required",
        hoc_city: "required",
        hoc_province: "required",
        hoc_zipcode: "required",
        hoc_nationality: "required",
        hoc_telephone: "required",
        hoc_email: "required",
        hoc_checkin_date: "required",
        hoc_checkout_date: "required",
        hoc_room_amount: "required",
        hoc_room_amount: "required",
        hoc_child_amount: "required",
        hoc_infant_amount: "required",
      },
      messages: {
      },
      // the errorPlacement has to take the table layout into account
      errorPlacement: function(error, element) {
        if ( element.is(":radio") )
          error.appendTo( element.parent().next().next() );
        else if ( element.is(":checkbox") )
          error.appendTo ( element.next() );
        else
          error.appendTo( element.parent().next() );
      },
      // set this class to error-labels to indicate valid fields
      success: function(label) {
        // set &nbsp; as text for IE
        label.html("&nbsp;").addClass("checked");
      }
    });

  });
</script>

<script>

  $(function() {
    $( "#hoc_checkin_date" ).datepicker({
        numberOfMonths: 1,  
        minDate: 1,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,     
        dayNames: ['อาทิตย์', 'จันทร์','อังคาร','พุธ','พฤหัส','ศุกร์','เสาร์'],       
        dayNamesMin: ['อา','จ','อ','พ','พฤ','ศ','ส'],     
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']       
    });
  });
  </script>  

  <script>

  $(function() {
    $( "#hoc_checkout_date" ).datepicker({
        numberOfMonths: 1,  
        minDate: 1,
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,     
        dayNames: ['อาทิตย์', 'จันทร์','อังคาร','พุธ','พฤหัส','ศุกร์','เสาร์'],       
        dayNamesMin: ['อา','จ','อ','พ','พฤ','ศ','ส'],     
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']       
    });
  });
  </script>
</head>


  <div class="overly-bg"></div>
  <div id="wrapper">
    <!-- Menu -->
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
              <li><a href="<?php echo base_url('location');?>">สถานที่ท่องเที่ยว</a></li>
              <li class="has-dropdown">
                <a class="active" href="<?php echo base_url('hotel');?>">แพ๊คเกจทัวร์</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('hotel/ทัวร์ครึ่งวัน');?>">ทัวร์ครึ่งวัน</a></li>
                  <li><a href="<?php echo base_url('hotel/ทัวร์-1-วัน');?>">ทัวร์ 1 วัน</a></li>
                  <li><a href="<?php echo base_url('hotel/ทัวร์-2-วัน-1-คืน');?>">ทัวร์ 2 วัน 1 คืน</a></li>
                  <li><a href="<?php echo base_url('hotel/ทัวร์-3-วัน-2-คืน');?>">ทัวร์ 3 วัน 2 คืน</a></li>
                </ul>                
              </li>
              <li class="has-dropdown">
                <a href="<?php echo base_url('hotel');?>">แพ๊คเกจทัวร์อื่นๆ</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('hotel/โชว์กลางคืน');?>">โชว์กลางคืน</a></li>
                  <li><a href="<?php echo base_url('hotel/สปาแพ็คเกจ');?>">สปาแพ็คเกจ</a></li>
                  <li><a href="<?php echo base_url('hotel/กอล์ฟแพ็คเกจ');?>">กอล์ฟแพ็คเกจ</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('hotel/การเดินทาง');?>">การเดินทาง</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('hotel/เช่าเรือเหมาลำ');?>">เช่าเรือเหมาลำ</a></li>
                  <li><a href="<?php echo base_url('hotel/จองตั๋วเรือโดยสาร');?>">จองตั๋วเรือโดยสาร</a></li>
                  <li><a href="<?php echo base_url('carrent/list');?>">จองรถเช่า</a></li>
                  <li><a href="<?php echo base_url('airline/list');?>">จองตั๋วเครื่องบิน</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('hotel/ที่พัก');?>">ที่พัก</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('hotel');?>">จองโรงแรม</a></li>
                  <li><a href="<?php echo base_url('hotel/จองห้องเช่า');?>">จองห้องเช่า</a></li>
                </ul>                
              </li>
              <li><a href="<?php echo base_url('hotel/โปรโมชั่น');?>">โปรโมชั่น</a></li>
              <li><a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>                
            </ul>
          </section>
        </nav>
      </div>
    </div>
    <!-- End Menu -->
   <br>


  <form class="custom" 
        id="booking_validate" 
        name="input" 
        action="<?php echo base_url('hotel/booking');?>" 
        method="post"
  >

    <input type="hidden" name="hoc_hotel_id" value="<?php echo $hotel[0]->id;?>">
    <input type="hidden" name="hoc_hotel_code" value="<?php echo $hotel[0]->code;?>">
    <input type="hidden" name="hoc_hotel_name" value="<?php echo $hotel[0]->name;?>">
    <input type="hidden" name="hoc_hotel_url" value="<?php echo $hotel[0]->url;?>">

    <!-- Start Content -->
    <div class="row">

      <!-- Tour Information -->
      <div class="eight columns">
        <div class="box_white_in_columns article_hotel">
          <div class="row">
            <div class="twelve columns">
              <h3 style="color:#FE5214;">
                <?php echo $hotel[0]->name;?> <span  style="color:#4E4E4E;">(<?php echo $hotel[0]->code;?>)</span>
              </h3>
            </div>
          </div><!-- Title -->
          <div class="border"></div>

        <!-- price -->
        <?php 
          if(!empty($price)){
        ?>
        <div class="row">
          <div class="twelve columns">
            <div class="row">
              <div class="twelve columns">
                <label><b>[สรุปราคาทัวร์]</b></label>
              </div>
            </div>
            <div class="row">
              <div class="six columns">
                <label style="float:center;"><b>รายการ</b></label>
              </div>
              <div class="three columns">
                <label style="float:right;"><b>ห้องพัก(ห้องxวัน)</b></label>
              </div>
              <!--<div class="two columns">
                <label style="float:right;"><b>เด็ก(บาท)</b></label>
              </div>-->
              <div class="three columns">
                <label style="float:right;"><b>รวม(บาท)</b></label>
              </div>
            </div>
            <?php

            
            $count = 0;
            $grand_total_price = 0;
            foreach ($price as $key => $value) {
            ?>
              <div class="row">
                <div class="six columns">
                  <label>
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_price_id]" 
                    value="<?php echo $value["prh_id"];?>"
                    >
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_agency_id]" 
                    value="<?php echo $value["prh_agency_id"];?>"
                    >
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_hotel_id]" 
                    value="<?php echo $value["prh_hotel_id"];?>"
                    >
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_room_amount_booking]" 
                    value='<?php echo ($value["prh_room_amount_booking"]>0)?$value["prh_room_amount_booking"]:"0";?>'
                    >
                     <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_date_amount_booking]" 
                    value='<?php echo ($value["prh_date_amount_booking"]>0)?$value["prh_date_amount_booking"]:"0";?>'
                    >
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_price_name]" 
                    value="<?php echo $value["prh_name"];?>"
                    >
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_sale_room_price]" 
                    value="<?php echo $value["prh_sale_room_price"];?>"
                    >
                    <input type="hidden" name="hob_price[<?php echo $value["prh_id"];?>][hob_total_price]" 
                    value="<?php echo $value["prh_total_price"];?>"
                    >
                    <?php echo $value["prh_name"];?>
                    <?php $count++;?>
                  </label>
                </div>

                <div class="three columns">
                  <?php 
                        //Adult price   
                        $adult_price = 0;                    
                        if($value["prh_discount_room_price"] > 0){
                    ?>

                      <center>
                          <label style="float:right;">
                          <!--  <?php echo number_format($value["price"]->pri_discount_adult_price, 0);?>-->

                           <?php 
                              echo number_format($value["pri_discount_adult_price"], 0);
                              $adult_price = $value["pri_discount_adult_price"];

                           ?>
                              ( 
                                <?php 
                                  $adult_amount = ($value["pri_adult_amount_booking"]>0)?$value["pri_adult_amount_booking"]:"0";
                                  echo $adult_amount;
                                ?> 
                              )

                         </label>
                      </center>


                   <?php  
                    }else{
                   ?>
                      <center>
                          <label style="float:right;">
                            <?php 
                              echo number_format($value["pri_sale_adult_price"], 0);
                              $adult_price = $value["pri_sale_adult_price"];

                            ?>
                              ( 
                                <?php 
                                  $adult_amount = ($value["pri_adult_amount_booking"]>0)?$value["pri_adult_amount_booking"]:"0";
                                  echo $adult_amount;
                                ?> 
                              )
                          </label>
                      </center>

                  <?php
                      }
                  ?> 
                </div>

                <div class="three columns">

                  <?php
                    $total_price = ($adult_price*$adult_amount)+($child_price * $child_amount);
                    $grand_total_price += $total_price;
                  ?>
                  <label style="float:right;">
                    <b>
                    <?php echo number_format($total_price, 0);?>
                    </b>
                </label>
               </div>

              </div>
            <?php
            }//End foreach
            ?>
          </div>
        </div>
        <?php
          }
        ?>

        <!-- Start Booking Form -->
        <div class="border"></div> 
        <div class="row"> 
          <div class="nine columns">
            <label style="float:right;"><b>รวมราคาทั้งหมด</b></label>
          </div>
          <div class="three columns">
                    <input type="hidden" name="hoc_grand_total_price" value="<?php echo $grand_total_price ;?>">
            <label style="float:right;"><b><u><?php echo number_format($grand_total_price, 0);?></u></b></label>
          </div>
        </div>



        <div class="row">         
        <div class="twelve columns">
            <h2>รายละเอียดลูกค้า</h2>
            <div class="row">
              <div class="six columns">
                <label>ชื่อ</label>
                <input type="text" placeholder="Firstname" id="hoc_firstname" name="hoc_firstname" value="<?php echo set_value('hoc_firstname');?>"/>
              </div>
              <div class="six columns">
                <label>นามสกุล</label>
                <input type="text" placeholder="Lastname" id="hoc_lastname" name="hoc_lastname"/>
              </div>
            </div>
            <label>ที่อยู่</label>
            <input type="text" class="twelve" placeholder="Address" id="hoc_address" name="hoc_address"/>
            <div class="row">
              <div class="six columns">
                <input type="text" placeholder="City"  id="hoc_city" name="hoc_city"/>
              </div>
              <div class="three columns">
                <input type="text" placeholder="Province/State"  id="hoc_province" name="hoc_province"/>
              </div>
              <div class="three columns">
                <input type="text" placeholder="ZIP" id="hoc_zipcode" name="hoc_zipcode"/>
              </div>
            </div>

            <div class="row">
              <div class="six columns">
                <label>สัญชาติ</label>
                <input type="text" placeholder="Nationality" id="hoc_nationality" name="hoc_nationality"/>
              </div>
            </div>

            <div class="row">
              <div class="six columns">
                <label>เบอร์โทร</label>
                <input type="text" placeholder="Telephone" id="hoc_telephone" name="hoc_telephone"/>
              </div>
              <div class="six columns">
                <label>อีเมล์</label>
                <input type="text" placeholder="Email" id="hoc_email" name="hoc_email"/>
              </div>
            </div>


            <h2>ข้อมูลการจองห้องพัก</h2>
<!--Person Amount-->
                <div class="row">
                  <div class="four columns">
                    <label>จำนวนผู้ใหญ่</label>
                    <select name="hoc_adult_amount">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                    </select>
                  </div>
                  <div class="four columns">
                    <label>จำนวนเด็ก (4 - 12 years)</label>
                    <select name="hoc_child_amount">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                    </select>
                  </div>
                  <div class="four columns">
                    <label>จำนวนทารก (under 4 years)</label>
                    <select name="hoc_infant_amount">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                </div>

<!--End Person Amount-->

        <br/>

        <!--Check in&out Date-->
        <div class="row">
          <div class="six columns">
            <label>วันที่เช็คอิน</label>
            <input type="text" placeholder="Check In Date" id="hoc_checkin_date" name="hoc_checkin_date">
          </div>      
     
          <div class="six columns">
            <label>วันที่เช็คเอาท์</label>
            <input type="text" placeholder="Check Out Date" id="hoc_checkout_date" name="hoc_checkout_date">
        </div>    
       
        </div>
        <!--End Check in&out Date-->
            <br>


            <label>สิ่งที่ต้องการเพิ่มเติม</label>
            <textarea placeholder="Message" rows="5" id="hoc_request" name="hoc_request"></textarea>              


            <!-- Start contact -->
            <div class="row">
             <div class="twelve columns">
                <ul class="tags">
                  <li style="font-size:30px; color:#FE5214;">ติดต่อเรา :</li>
                  <li><b>โทร.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b>แฟกซ์.</b> 076-331273&nbsp;&nbsp;<b>อีเมล์</b> info@uastravel.com</li>
                </ul>
              </div> 
            </div> 
            <!-- End contact -->

            <!-- Start price -->
            <div class="row">
              <div class="price_booking"  style="background:none; padding:0px 0px 0px 0px; margin:0px; border: none !important;"> 
                  <div class="eight columns">
                  </div>
                  <div class="four columns">
                    <input class="button small  booking" style="width:150px;" type="submit" value="จองโรงแรมนี้">
                  </div>

              </div>
              <div class="clearfix"></div>
            </div>
            <!-- End price -->

          </div><!-- End Columns -->
        </div><!-- End Rows -->
        <!-- End Booking Form -->

      </div><!-- End Rows -->
    </div>
    <!-- End Tour Information -->  

  </form>

  <!-- Statr Right bar -->
  <div class="four columns">
    <!-- Related Packet -->        
    <h3>แพ็กเก็จทัวร์แนะนำ</h3>

    <?php
    if(!empty($related )):
      foreach ($related as $key => $value):
    ?>
      <div class="list_packet">
        <div class="row">
          <div class="twelve columns">              
            <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
              <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
            </a>
          </div>
          <div class="twelve columns">
            <div class="title_hotel">
              <h4>
                <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                  <?php echo $value["tour"]->tout_name; ?>
                </a>
              </h4>
            </div>
            <div class="rating one_star" style="display:none"></div>
            <div class="rating two_star" style="display:none"></div>
            <div class="rating three_star"></div>
            <div class="rating four_star" style="display:none"></div>
            <div class="rating five_star"style="display:none"></div>
            <div class="clearfix"></div>
            <div class="border"></div>
          </div>
          <div class="twelve columns">
            <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
            <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
            <div class="price">
              <span>
              <?php 
                  if(!empty($value["price"]->pri_sale_adult_price)){
                    
                    if($value["price"]->pri_discount_adult_price>0){

                      $priceAdultDiscount = number_format($value["price"]->pri_sale_adult_price - $value["price"]->pri_discount_adult_price, 0);
                      $priceAdult = number_format($value["price"]->pri_sale_adult_price, 0);
                    
                      echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                      echo " บาท";

                    }else{
                      echo number_format($value["price"]->pri_sale_adult_price, 0);
                      echo " บาท";
                    }

                    //text-decoration: line-through; color: #โค้ดสีเส้น;

                  }else{
                    echo "Call";
                    echo " บาท";
                  }
                ?>             

              </span>
            </div>
          </div>
        </div>
      </div>

    <?php
      endforeach;
    endif;
    ?>
    <!-- End Related Packet -->
    </div>
    <!-- End Right bar -->


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
          <p>info@uastravel.com</p>
          <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
        </div>
      </div>
    </div>
  </footer>


<?php include_once("themes/Travel/tour/analyticstracking.php") ;?>
</body>
</html>
