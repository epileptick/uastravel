<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $tour[0]->name;?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo (!empty($tour[0]->short_description))?$tour[0]->short_description:"";?>" />
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
        tob_firstname: "required",
        tob_lastname: "required",
        tob_address: "required",
        tob_city: "required",
        tob_province: "required",
        tob_zipcode: "required",
        tob_nationality: "required",
        tob_telephone: "required",
        tob_email: "required",
        tob_tranfer_date: "required",
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
    $( "#tob_tranfer_date" ).datepicker({
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
                <a class="active" href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/ทัวร์ครึ่งวัน');?>">ทัวร์ครึ่งวัน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-1-วัน');?>">ทัวร์ 1 วัน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-2-วัน-1-คืน');?>">ทัวร์ 2 วัน 1 คืน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-3-วัน-2-คืน');?>">ทัวร์ 3 วัน 2 คืน</a></li>
                </ul>                
              </li>
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์อื่นๆ</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/โชว์กลางคืน');?>">โชว์กลางคืน</a></li>
                  <li><a href="<?php echo base_url('tour/สปาแพ็คเกจ');?>">สปาแพ็คเกจ</a></li>
                  <li><a href="<?php echo base_url('tour/กอล์ฟแพ็คเกจ');?>">กอล์ฟแพ็คเกจ</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour/การเดินทาง');?>">การเดินทาง</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/เช่าเรือเหมาลำ');?>">เช่าเรือเหมาลำ</a></li>
                  <li><a href="<?php echo base_url('tour/จองตั๋วเรือโดยสาร');?>">จองตั๋วเรือโดยสาร</a></li>
                  <li><a href="<?php echo base_url('carrent/list');?>">จองรถเช่า</a></li>
                  <li><a href="<?php echo base_url('airline/list');?>">จองตั๋วเครื่องบิน</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour/ที่พัก');?>">ที่พัก</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/จองโรงแรม');?>">จองโรงแรม</a></li>
                  <li><a href="<?php echo base_url('tour/จองห้องเช่า');?>">จองห้องเช่า</a></li>
                </ul>                
              </li>
              <li><a href="<?php echo base_url('tour/โปรโมชั่น');?>">โปรโมชั่น</a></li>
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
        action="<?php echo base_url('tour/booking');?>" 
        method="post"
  >

    <input type="hidden" name="tob_tour_id" value="<?php echo $tour[0]->id;?>">
    <input type="hidden" name="tob_tour_code" value="<?php echo $tour[0]->code;?>">
    <input type="hidden" name="tob_tour_name" value="<?php echo $tour[0]->name;?>">
    <input type="hidden" name="tob_tour_url" value="<?php echo $tour[0]->url;?>">

    <!-- Start Content -->
    <div class="row">

      <!-- Tour Information -->
      <div class="eight columns">
        <div class="box_white_in_columns article_tour">
          <div class="row">
            <div class="twelve columns">
              <h3 style="color:#FE5214;">
                <?php echo $tour[0]->name;?> <span  style="color:#4E4E4E;">(<?php echo $tour[0]->code;?>)</span>
              </h3>
            </div>
          </div><!-- Title -->
          <div class="border"></div>

        <!-- extendprice -->
        <?php 
          if(!empty($extendprice)){
        ?>
        <div class="row">
          <div class="twelve columns">
            <div class="row">
              <div class="twelve columns">
                <label><b>[ราคาเพิ่มเติม]</b></label>
              </div>
            </div>
            <div class="row">
              <div class="six columns">
                <label><b>รายการ</b></label>
              </div>
              <div class="three columns">
                <label><b>ราคาผู้ใหญ่(บาท)</b></label>
              </div>
              <div class="three columns">
                <label><b>ราคาเด็ก(บาท)</b></label>
              </div>
            </div>
            <?php

            //print_r($extendprice);
            $count = 0;
            foreach ($extendprice as $key => $value) {
            ?>
              <div class="row">
                <div class="six columns">
                  <label>
                    <input type="checkbox" name="tob_extend_price[<?php echo $value->extp_id;?>][extp_id]" value="<?php echo $value->extp_id;?>">
                    <input type="hidden" name="tob_extend_price[<?php echo $value->extp_id;?>][extp_name]" value="<?php echo $value->extp_name;?>">
                    <input type="hidden" name="tob_extend_price[<?php echo $value->extp_id;?>][extp_sale_adult_price]" value="<?php echo $value->extp_sale_adult_price;?>">
                    <input type="hidden" name="tob_extend_price[<?php echo $value->extp_id;?>][extp_sale_child_price]" value="<?php echo $value->extp_sale_child_price;?>">
                    <?php echo $value->extp_name;?>
                    <?php $count++;?>
                  </label>
                </div>
                <div class="three columns">
                  <center><label><?php echo $value->extp_sale_adult_price;?></label></center>
                </div>
                <div class="three columns">
                  <center><label><?php echo $value->extp_sale_child_price;?></label></center>
                </div>
              </div>
            <?
            }
            ?>
            <div class="row">
              <div class="twelve columns">
                <label><font color="red"><u>หมายเหตุ</u></font> ราคานี้ไม่รวมกับราคาทัวร์หลัก</label>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <!-- End extendprice -->
          <!-- Start price -->
          <div class="row">
              <div class="price_booking"> 
             
                <div class="twelve columns">
                  <div class="two columns">
                    <span class="title">ราคาทัวร์</span>
                  </div>

                  <div class="four columns">
                    <span>
                      <strong>ผู้ใหญ่ : </strong> 
                      <?php
                        //print_r($price); exit;
                        $tob_adult_price = 0;
                        $tob_discount_adult_price = 0;
                        if(!empty($price[0]->sale_adult_price)){
                          
                          if($price[0]->discount_adult_price>0){

                            $priceAdultDiscount = number_format($price[0]->sale_adult_price - $price[0]->discount_adult_price, 0);
                            $tob_adult_price = $price[0]->sale_adult_price - $price[0]->discount_adult_price;
                            $tob_discount_adult_price = $price[0]->discount_adult_price;
                            $priceAdult = number_format($price[0]->sale_adult_price, 0);
                          
                            echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                            echo " บาท";

                          }else{
                            $tob_adult_price = $price[0]->sale_adult_price;
                            echo "<f style='font-size:30px; color:#0089E0;'>".number_format($price[0]->sale_adult_price, 0)."&nbsp; บาท</f>";
                          }

                        }else{
                          echo "Call";
                          echo " บาท";
                        }
                        
                      ?> 
                    </span>
                    <input type="hidden" name="tob_adult_price" value="<?php echo $tob_adult_price;?>">
                    <input type="hidden" name="tob_discount_adult_price" value="<?php echo $tob_discount_adult_price;?>"> 
                  </div>

                  <div class="four columns">
                    <span>
                      <strong>เด็ก : </strong>
                      <?php 

                        $tob_child_price = 0;
                        $tob_discount_child_price = 0;                      
                        if(!empty($price[0]->sale_child_price)){
                          
                          if($price[0]->discount_child_price>0){

                            $priceChildDiscount = number_format($price[0]->sale_child_price - $price[0]->discount_child_price, 0);
                            $tob_child_price = $price[0]->sale_child_price - $price[0]->discount_child_price;
                            $tob_discount_child_price = $price[0]->discount_child_price; 
                            $priceChild = number_format($price[0]->sale_child_price, 0);
                            echo "<f style='text-decoration: line-through;'>".$priceChild."</f>&nbsp;".$priceChildDiscount;
                            echo " บาท";

                          }else{
                            $tob_child_price = $price[0]->sale_child_price;
                            echo "<f style='font-size:30px; color:#0089E0;'>".number_format($price[0]->sale_child_price, 0)."&nbsp; บาท</f>";
                          }
                          //text-decoration: line-through; color: #โค้ดสีเส้น;

                        }else{
                          echo "Call";
                          echo " บาท";
                        }
                        
                      ?> 
                    </span>
                    <input type="hidden" name="tob_child_price" value="<?php echo $tob_child_price;?>">
                    <input type="hidden" name="tob_discount_child_price" value="<?php echo $tob_discount_child_price;?>">                     
                  </div>

                </div>
              <div class="clearfix"></div>
            </div>
          </div>
        <!-- End price -->

        <!-- Start Booking Form -->
        <div class="border"></div> 
        <div class="row">         
        <div class="twelve columns">
            <h2>รายละเอียดลูกค้า</h2>
            <div class="row">
              <div class="six columns">
                <label>ชื่อ</label>
                <input type="text" placeholder="Firstname" id="tob_firstname" name="tob_firstname" value="<?php echo set_value('tob_firstname');?>"/>
              </div>
              <div class="six columns">
                <label>นามสกุล</label>
                <input type="text" placeholder="Lastname" id="tob_lastname" name="tob_lastname"/>
              </div>
            </div>
            <label>ที่อยู่</label>
            <input type="text" class="twelve" placeholder="Address" id="tob_address" name="tob_address"/>
            <div class="row">
              <div class="six columns">
                <input type="text" placeholder="City"  id="tob_city" name="tob_city"/>
              </div>
              <div class="three columns">
                <input type="text" placeholder="Province/State"  id="tob_province" name="tob_province"/>
              </div>
              <div class="three columns">
                <input type="text" placeholder="ZIP" id="tob_zipcode" name="tob_zipcode"/>
              </div>
            </div>

            <div class="row">
              <div class="six columns">
                <label>สัญชาติ</label>
                <input type="text" placeholder="Nationality" id="tob_nationality" name="tob_nationality"/>
              </div>
            </div>

            <div class="row">
              <div class="six columns">
                <label>เบอร์โทร</label>
                <input type="text" placeholder="Telephone" id="tob_telephone" name="tob_telephone"/>
              </div>
              <div class="six columns">
                <label>อีเมล์</label>
                <input type="text" placeholder="Email" id="tob_email" name="tob_email"/>
              </div>
            </div>



            <h2>รายละเอียดที่พัก</h2>
            <div class="row">
              <div class="nine columns">
              <label>ชื่อโรงแรม</label>
                <input type="text"placeholder="Hotel Name" id="tob_hotel_name" name="tob_hotel_name"/>
              </div>
              <div class="three columns">
                <label>หมายเลขห้องพัก</label>
                <input type="text" placeholder="Room Number" id="tob_room_number" name="tob_room_number"/>
              </div>
            </div>

            <h2>ข้อมูลทัวร์เพิ่มเติม</h2>
            <div class="row">
              <div class="four columns">
                <label>จำนวนผู้ใหญ่</label>
                <select name="tob_adult_amount">
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
              <div class="four columns">
                <label>จำนวนเด็ก (4 - 12 years)</label>
                <select name="tob_child_amount">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="4">5</option>
                </select>
              </div>
              <div class="four columns">
                <label>จำนวนทารก (under 4 years)</label>
                <select name="tob_infant_amount">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="six columns">
                <label>วันเดินทาง</label>
                <input type="text" placeholder="Travel Date" id="tob_tranfer_date" name="tob_tranfer_date"/>
              </div>           
            </div>

            <label>สิ่งที่ต้องการเพิ่มเติม</label>
            <textarea placeholder="Message" rows="5" id="message" name="tob_request"></textarea>              


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
                    <input class="button small  booking" style="width:150px;" type="submit" value="จองทัวร์นี้">
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
            <a href="<?php echo $value["tour"]->tou_url."-".$value["tour"]->tou_id; ?>">
              <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
            </a>
          </div>
          <div class="twelve columns">
            <div class="title_tour">
              <h4>
                <a href="<?php echo $value["tour"]->tou_url."-".$value["tour"]->tou_id; ?>">
                  <?php echo $value["tour"]->tou_name; ?>
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
                  if(!empty($value["price"]->agt_sale_adult_price)){
                    
                    if($value["price"]->agt_discount_adult_price>0){

                      $priceAdultDiscount = number_format($value["price"]->agt_sale_adult_price - $value["price"]->agt_discount_adult_price, 0);
                      $priceAdult = number_format($value["price"]->agt_sale_adult_price, 0);
                    
                      echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                      echo " บาท";

                    }else{
                      echo number_format($value["price"]->agt_sale_adult_price, 0);
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
