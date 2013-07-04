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
        toc_firstname: "required",
        toc_lastname: "required",
        toc_address: "required",
        toc_city: "required",
        toc_province: "required",
        toc_zipcode: "required",
        toc_nationality: "required",
        toc_telephone: "required",
        toc_email: "required",
        toc_tranfer_date: "required",
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
    $( "#toc_tranfer_date" ).datepicker({
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
              <li><a href="<?php echo base_url($this->lang->line("tour_lang_location"));?>"><?php echo $this->lang->line("tour_lang_location"); ?></a></li>
              <?php
                if(!empty($main_menu)){
                  foreach ($main_menu as $main_menuKey => $main_menuValue) {
                    $mainURL = base_url($this->lang->line("url_lang_tour").'/'.$main_menuValue["url"]);
                    if(!empty($main_menuValue["child"])){
                      echo "<li class=\"has-dropdown\">";
                    }else{
                      echo "<li>";
                    }
                    echo "<a href=\"$mainURL\">$main_menuValue[name]</a>";
                    if(!empty($main_menuValue["child"])){
                      echo "<ul class=\"dropdown\">";
                      foreach ($main_menuValue["child"] as $childKey => $childValue) {
                        echo "<li>";
                        $childURL = base_url($this->lang->line("url_lang_tour").'/'.$childValue["url"]);
                        echo "<a href=\"$childURL\">$childValue[name]</a>";
                        echo "</li>";
                      }
                      echo "</ul>";
                    }
                    echo "</li>";
                  }
                }
              ?>
              <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>
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
        action="<?php echo base_url($this->lang->line("url_lang_tour")."/booking");?>"
        method="post"
  >

      <input type="hidden" name="toc_tour_id" value="<?php echo $tour[0]->id;?>">
      <input type="hidden" name="toc_tour_code" value="<?php echo $tour[0]->code;?>">
      <input type="hidden" name="toc_tour_name" value="<?php echo $tour[0]->name;?>">
      <input type="hidden" name="toc_tour_url" value="<?php echo $tour[0]->url;?>">

      <!-- Start Content -->
      <div class="row">
<?php
    $input_session = $this->session->all_userdata();


    //print_r($input_session);
?>
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
                <div class="two columns">
                  <label style="float:right;"><b>ผู้ใหญ่(บาท)</b></label>
                </div>
                <div class="two columns">
                  <label style="float:right;"><b>เด็ก(บาท)</b></label>
                </div>
                <div class="two columns">
                  <label style="float:right;"><b>รวม(บาท)</b></label>
                </div>
              </div>
              <?php

              //print_r($extendprice);
              $count = 0;
              $grand_total_price = 0;
              $total_adult = 0;
              $total_child = 0;
              foreach ($price as $key => $value) {
              ?>
                <div class="row">
                  <div class="six columns">
                    <label>
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_price_id]"
                      value="<?php echo $value["pri_id"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_agency_id]"
                      value="<?php echo $value["pri_agency_id"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_tour_id]"
                      value="<?php echo $value["pri_tour_id"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_adult_amount_booking]"
                      value='<?php echo ($value["pri_adult_amount_booking"]>0)?$value["pri_adult_amount_booking"]:"0";?>'
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_child_amount_booking]"
                      value='<?php echo ($value["pri_child_amount_booking"]>0)?$value["pri_child_amount_booking"]:"0";?>'
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_price_name]"
                      value="<?php echo $value["pri_name"];?>"
                      >

                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_sale_adult_price]"
                      value="<?php echo $value["pri_sale_adult_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_discount_adult_price]"
                      value="<?php echo $value["pri_discount_adult_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_sale_child_price]"
                      value="<?php echo $value["pri_sale_child_price"];?>"
                      >
                       <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_discount_child_price]"
                      value="<?php echo $value["pri_discount_child_price"];?>"
                      >
                      <!--<input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_adult_price]"
                      value="<?php echo $value["pri_total_adult_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_child_price]"
                      value="<?php echo $value["pri_total_child_price"];?>"
                      >-->
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_price]"
                      value="<?php echo $value["pri_total_price"];?>"
                      >

                      <!--
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_net_adult_price]"
                      value="<?php echo $value["pri_net_adult_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_net_child_price]"
                      value="<?php echo $value["pri_net_child_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_adult_net_price]"
                      value="<?php echo $value["pri_total_adult_net_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_child_net_price]"
                      value="<?php echo $value["pri_total_child_net_price"];?>"
                      >
                      <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_net_price]"
                      value="<?php echo $value["pri_total_net_price"];?>"
                      >

                    -->
                      <?php echo $value["pri_name"];?>
                      <?php $count++;?>
                    </label>
                  </div>

                  <div class="two columns">
                    <?php
                          //Adult price
                          $adult_price = 0;
                          if($value["pri_discount_adult_price"] > 0){
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

                  <div class="two columns">

                      <?php
                          //Child price
                          $child_price = 0;
                          if($value["pri_discount_child_price"] > 0){
                      ?>

                          <center>
                              <label style="float:right;">
                              <!--  <?php echo number_format($value["price"]->pri_discount_adult_price, 0);?>-->

                               <?php
                                  echo number_format($value["pri_discount_child_price"], 0);
                                  $child_price = $value["pri_discount_child_price"];

                               ?>
                                (
                                  <?php
                                    $child_amount = ($value["pri_child_amount_booking"]>0)?$value["pri_child_amount_booking"]:"0";
                                    echo $child_amount;
                                  ?>
                                )
                              </label>
                          </center>

                     <?php
                      }
                      else{
                     ?>

                          <center><label style="float:right;">
                              <?php
                                echo number_format($value["pri_sale_child_price"], 0);
                                $child_price = $value["pri_sale_child_price"];
                              ?>
                              (
                                <?php
                                  $child_amount =  ($value["pri_child_amount_booking"]>0)?$value["pri_child_amount_booking"]:"0";
                                  echo $child_amount;
                                ?>
                              )
                            </label>
                          </center>

                    <?php
                        }


                    ?>

                  </div>

                  <div class="two columns">

                    <?php
                      $total_price = ($adult_price*$adult_amount)+($child_price * $child_amount);
                      $total_adult_price = $adult_price*$adult_amount;
                      $total_child_price = $child_price * $child_amount;
                      $grand_total_price += $total_price;
                      $total_adult += $adult_amount;
                      $total_child += $child_amount;
                    ?>

                    <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_adult_price]"
                      value="<?php echo $total_adult_price ;?>"
                    >
                    <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_child_price]"
                    value="<?php echo $total_child_price ;?>"
                    >
                    <input type="hidden" name="tob_price[<?php echo $value["pri_id"];?>][tob_total_price]"
                      value="<?php echo $total_price ;?>"
                    >

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
                  <!-- input type="hidden" name="toc_grand_total_net_price" value="<?php echo $value["pri_total_net_price"];?>" -->
                  <input type="hidden" name="toc_grand_total_price" value="<?php echo $grand_total_price ;?>">
              <label style="float:right;"><b><u><?php echo number_format($grand_total_price, 0);?></u></b></label>
            </div>
          </div>



          <div class="row">
          <div class="twelve columns">
              <h2>รายละเอียดลูกค้า</h2>
              <div class="row">
                <div class="six columns">
                  <label>ชื่อ</label>
                  <input type="text" placeholder="Firstname" id="toc_firstname" name="toc_firstname" value="<?php echo set_value('tob_firstname');?>"/>
                </div>
                <div class="six columns">
                  <label>นามสกุล</label>
                  <input type="text" placeholder="Lastname" id="toc_lastname" name="toc_lastname"/>
                </div>
              </div>
              <label>ที่อยู่</label>
              <input type="text" class="twelve" placeholder="Address" id="toc_address" name="toc_address"/>
              <div class="row">
                <div class="six columns">
                  <input type="text" placeholder="City"  id="tob_city" name="toc_city"/>
                </div>
                <div class="three columns">
                  <input type="text" placeholder="Province/State"  id="toc_province" name="toc_province"/>
                </div>
                <div class="three columns">
                  <input type="text" placeholder="ZIP" id="toc_zipcode" name="toc_zipcode"/>
                </div>
              </div>

              <div class="row">
                <div class="six columns">
                  <label>สัญชาติ</label>
                  <input type="text" placeholder="Nationality" id="toc_nationality" name="toc_nationality"/>
                </div>
              </div>

              <div class="row">
                <div class="six columns">
                  <label>เบอร์โทร</label>
                  <input type="text" placeholder="Telephone" id="toc_telephone" name="toc_telephone"/>
                </div>
                <div class="six columns">
                  <label>อีเมล์</label>
                  <input type="text" placeholder="Email" id="toc_email" name="toc_email"/>
                </div>
              </div>



              <h2>รายละเอียดที่พัก</h2>
              <div class="row">
                <div class="nine columns">
                <label>ชื่อโรงแรม</label>
                  <input type="text"placeholder="Hotel Name" id="toc_hotel_name" name="toc_hotel_name"/>
                </div>
                <div class="three columns">
                  <label>หมายเลขห้องพัก</label>
                  <input type="text" placeholder="Room Number" id="toc_room_number" name="toc_room_number"/>
                </div>
              </div>

              <h2>ข้อมูลทัวร์เพิ่มเติม</h2>
              <div class="row">
                <div class="three columns">
                  <label>จำนวนผู้ใหญ่ : <?php echo ($total_adult);?></label>
                 <input type="hidden" name="toc_adult_amount_passenger" value="<?php echo ($total_adult);?>"/>
                </div>

                <div class="four columns">
                  <label>จำนวนเด็ก (4 - 12years) : <?php echo ($total_child);?></label>
                 <input type="hidden" name="toc_child_amount_passenger" value="<?php echo ($total_child);?>"/>
                </div>

                <div class="five columns">
                  <label>จำนวนทารก (under 4 years)</label>
                  <select name="toc_infant_amount_passenger">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <label>วันเดินทาง</label>
                  <input type="text" placeholder="Travel Date" id="toc_tranfer_date" name="toc_tranfer_date"/>
                </div>
              </div>

              <label>สิ่งที่ต้องการเพิ่มเติม</label>
              <textarea placeholder="Message" rows="5" id="message" name="toc_request"></textarea>

                      <!--Captcha-->
          <div class="row">
             <div class="five columns">

           <label>พิมพ์ตัวอักษรที่เห็นในรูปด้านล่าง</label>

            <?php
              //echo $imageCaptcha;

              //echo '<input type="text" name="captcha" value="" />';
            ?>
            </div>
          </div>
          <!--End Captcha-->


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

    //print_r($related);
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
            <div class="title_tour">
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
