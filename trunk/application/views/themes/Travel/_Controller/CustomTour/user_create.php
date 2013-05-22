<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/foundation.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/stylesheets/app.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/style/customtour.css');?>">
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/modernizr.foundation.js');?>"></script>
  <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>


  <script src="<?php echo base_url('themes/Travel/tour/javascripts/foundation.min.js'); ?>"></script>
  <!-- Initialize JS Plugins -->
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/app.js'); ?>"></script>
  <!-- To top scrollbar  -->
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/easing.js'); ?>" type="text/javascript"></script>
  <!-- UItoTop plugin -->
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js'); ?>" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css'); ?>" />
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/powertip/jquery.powertip.js'); ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/Travel/tour/javascripts/powertip/jquery.powertip.css'); ?>" />

  <script src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.nanoscroller.min.js'); ?>"></script>


  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/selectik-master/js/jquery.mousewheel.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/selectik-master/js/jquery.selectik.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.easytabs.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/alertify.js'); ?>"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.selectable.min.js'); ?>"></script>
  <script>
  // Tab
  $(document).ready(function() {
    $('.tabs').easytabs({
      animate : true,
      updateHash : false,
      animationSpeed :'normal',
      defaultTab: "li:last-child"
    });
  });

</script>
</head>
<body style="background: #ededed url(<?php echo base_url('themes/Travel/tour/images/bg1.jpg');?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
  <div class="overly-bg"></div>
  <div id="wrapper">
    <!-- Menu -->
    <div class="row">
      <div class="twelve columns">
        <nav class="top-bar">
          <ul>
            <li class="name"><a href=""> <img src="<?php echo base_url('themes/Travel/tour/images/logo.png');?>"></a></li>
            <li class="toggle-topbar"><a href="#"></a></li>
          </ul>
          <section>
            <ul class="right">
              <li><a href="http://uastravel.com/demo/">หน้าแรก</a></li>
              <li><a class="active" href="#">แหล่งท่องเที่ยว</a></li>
              <li><a href="#">แพ๊คเกจทัวร์</a></li>
              <li><a href="#">เกี่ยวกับเรา</a></li>
              <li><a href="#">ติดต่อเรา</a></li>
              <li><a href="#">โปรโมชั่น</a></li>
            </ul>
          </section>
        </nav>
      </div>
    </div>
    <!-- End Menu -->
    <br/><br/><br/><br/><br/>

    <form name="package_customize"
          id="form_package_customize"
          action="<?php echo base_url('customtour/add');?>"
          method="post"
    >

    <div class="row">
      <section class="article darg_packet">
        <div class="row">
          <div class="eight mobile-three columns">
            <div class="packet">
              <h3>จัดทัวร์ </h3>
              <p class="action_button top_add_date">
                <a class="button add_date">เพิ่มวัน</a>
              </p>
              <input type="text" placeholder="ชื่อทัวร์" name="packageName">
              <div class="packet_item" number="1">
                <div class="sticker_date">วันที่ 1</div>
                <ul class="connected list no1" >
                </ul>
                <a class="close tooltip_ne" title="ลบ"></a>
              </div>


            </div>
            <div class="abstract">
              <div class="row">
                <div class="six columns">
                  <h4>สรุปข้อมูลทัวร์</h4>
                  <ul class="square">
                    <li>
                      จำนวนวัน <span id="summary_day">1</span> วัน /
                      <span id="summary_night">0</span> คืน
                    </li>
                  </ul>
                </div>
                <div class="six columns">
                  <h4>สรุปราคา</h4>
                  <ul class="square">
                    <li>
                      ราคาผู้ใหญ่ <span id="summary_adult_price">0</span> บาท
                    </li>
                    <li>
                      ราคาเด็ก <span id="summary_child_price">0</span> บาท
                    </li>
                  </ul>
                  <!-- p class="totol_price">ราคารวม 6,000 บาท</p -->
                </div>
              </div>
            </div>
            <p class="action_button">

                <a class="button clear_date">เคลียทั้งหมด</a>
                <a class="button add_date">เพิ่มวัน</a>

                <!-- Booking data -->
                <input type="hidden" name="id" value=""></input>
                <input class="button"  type="submit" value="จัดทัวร์">
              </form>
            </p>
          </div>
          <div class="four mobile-one columns sticky_content">
          <div class="tabs">
            <ul class='etabs'>
               <li><a href="#tabs3">ร้านอาหาร</a></li>
               <li><a href="#tabs3">การเดินทาง</a></li>
               <li><a href="#tabs2">ที่พัก</a></li>
               <li><a href="#tabs1">แพ็กเก็จทัวร์</a></li>
            </ul>
            <div class='tabs-container'>



              <!-- Tour -->
              <div id="tabs1">

                <input type="hidden" id="example1-serialized" class="span6"></textarea>
                <div class="search_package">
                  <div class="selects">
                    <div class="select-block">
                      <h4>จำนวนวันที่ต้องการ</h4>
                      <select name='day_tour' id='day_tour'>
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

                      <h4>จังหวัด</h4>
                      <select name='secondtag_tour' id='secondtag_tour'>
                        <?php
                          $count = 0;
                          $secondtag_id = 0;
                          foreach ($tours["filter"]["secondtag"] as $key => $value) {
                        ?>
                            <option value="<?php echo $value["tag_id"];?>">
                              <?php echo $value["name"];?>
                            </option>
                        <?php
                          }
                        ?>
                     </select>
                    <h4>แพ็กเก็จทัวร์</h4>
                      <form >
                      <select name='firsttag_tour' id='firsttag_tour'>
                        <?php
                          $count = 0;
                          $firttag_id = 0;
                          foreach ($tours["filter"]["firsttag"] as $key => $value) {
                            if($count == 0){
                              $firttag_id = $value["tag_id"];
                            }
                        ?>
                          <option value="<?php echo $value["tag_id"];?>">
                            <?php echo $value["name"];?>
                          </option>
                        <?php
                            $count++;
                          }
                        ?>
                     </select>
                     </form>
                   </div>
                  </div>

                  <h4>ตัวกรอง</h4>
                  <div class="tag" id="thirdtag_tour">
                    <form class="search_thirdtag">
                    <?php
                      foreach ($tours["filter"]["thirdtag"] as $key => $value) {
                    ?>
                        <span class="btn" id="btn_tag">
                          <?php echo $value["name"];?>
                          <input  type="checkbox"
                                  class="hide"
                                  name="thirdtag[]"
                                  value="<?php echo $value["tag_id"];?>"
                                  id="thirdtag_checked"
                            >
                        </span>
                    <?php
                      }
                    ?>
                    </form>
                  </div>
                  <div class="input_search">
                    <input type="text" placeholder="Search...">
                    <input type="submit"class="button_search" value="ค้นหา">
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="scrollbar">
                  <div class="nano">
                    <div class="content">
                      <form>
                      <ul class="connected list no2" id="data">
                        <?php
                          //print_r($tours); exit;
                          if(!empty($tours["tour"]))
                          foreach ($tours["tour"] as $key => $value) {
                            if(!empty($value['price'])){
                        ?>

                          <li class="sortable_item">
                            <div class="list_packet">
                              <div class="row">
                                <div class="twelve columns">
                                  <a href="<?php echo base_url("tour/".$value["tour"]->tout_url."-".$value["tour"]->tou_id); ?>" target="_blank">
                                    <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
                                  </a>
                                </div>
                                <div class="twelve columns">
                                  <div class="row">
                                    <div class="nine columns">
                                      <div class="title_tour">
                                        <h4>
                                          <a href=""><?php echo $value['tour']->tout_name; ?></a>
                                          <?php
                                            if($tours["filter"]["defaulttag_id"] == 85){
                                              $day = 0.5;
                                            }else if($tours["filter"]["defaulttag_id"] == 95){
                                              $day = 1;
                                            }else if($tours["filter"]["defaulttag_id"] == 166){
                                              $day = 2;
                                            }else if($tours["filter"]["defaulttag_id"] == 163){
                                              $day = 3;
                                            }
                                          ?>
                                          <input  class="item_property"
                                                  type="hidden"
                                                  id="packagedata"
                                                  name="packagedata[]"
                                                  value="<?php echo $value['tour']->tou_id; ?>"
                                                  packagetype="tour"
                                                  packageid="<?php echo $value['tour']->tou_id; ?>"
                                                  title="<?php echo $value['tour']->tout_name; ?>"
                                                  adultprice="<?php echo $value['price']->pri_sale_adult_price; ?>"
                                                  childprice="<?php echo $value['price']->pri_sale_child_price; ?>"
                                                  discountadultprice="<?php echo $value['price']->pri_discount_adult_price; ?>"
                                                  discountchildprice="<?php echo $value['price']->pri_discount_child_price; ?>"
                                                  tag="<?php echo $tours["filter"]["defaulttag"]; ?>"
                                                  tagid="<?php echo $tours["filter"]["defaulttag_id"]; ?>"
                                                  totalday="<?php echo $day; ?>"
                                          />
                                        </h4>
                                      </div>
                                    </div>
                                    <div class="three columns">
                                      <div class="rating three_star"></div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </div>
                                  <div class="border"></div>
                                </div>
                                <div class="twelve columns">
                                  <div class="icon time tooltip_se" title="เวลา">
                                    <!-- <?php echo $value['tour']->tou_start_time1; ?> - <?php echo $value['tour']->tou_end_time1; ?> -->
                                    08.00 - 15.30
                                  </div>
                                  <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด">
                                    <a href="#" data-reveal-id="myTourModal_<?php echo $value['tour']->tou_id; ?>">รายละเอียด</a>
                                  </div>
                                  <div class="price"><span><?php echo $value['price']->pri_sale_adult_price; ?> B</span></div>
                                </div>
                              </div>
                            </div>
                            <a class="delete tooltip_ne" title="ลบ" packageid="<?php echo $value['tour']->tou_id; ?>"></a>
                            <a class="add tooltip_ne" title="เพิ่ม"></a>
                          </li>

                        <?php
                            }
                        ?>

                        <?php
                          }
                        ?>
                      <div class="clearfix"></div>
                      </ul>
                    </form>
                    </div>
                  </div>
                </div>
                <!-- END scrollbar -->
              </div>
              <!-- END tabs1 -->
              <!-- End Tour-->



              <!-- Hotel -->
              <div id="tabs2">
                <h3>ที่พัก</h3>
                <form class="search_package">
                  <div class="selects">
                    <div class="select-block">
                      <select id="firsttag_hotel" name="firsttag_hotel">
                          <option value="ภูเก็ต">ภูเก็ต</option>
                          <option value="กระบี่">กระบี่</option>
                          <option value="พังงา">พังงา</option>
                          <option value="ตรัง">ตรัง</option>
                          <option value="ภูเก็ต">ภูเก็ต</option>
                          <option value="กระบี่">กระบี่</option>
                          <option value="พังงา">พังงา</option>
                          <option value="ตรัง">ตรัง</option>
                          <option value="ภูเก็ต">ภูเก็ต</option>
                          <option value="กระบี่">กระบี่</option>
                          <option value="พังงา">พังงา</option>
                          <option value="ตรัง">ตรัง</option>
                     </select>
                   </div>
                  </div>

                  <div class="tag">
                    <span class="btn">
                      กะตะ
                      <input type="checkbox" class="hide" name="example1[]" value="Hey">
                    </span>
                    <span class="btn">
                      ในหาน
                      <input type="checkbox" class="hide" name="example1[]" value="Hey">
                    </span>
                    <span class="btn">
                      กะรน
                      <input type="checkbox" class="hide" name="example1[]" value="Click">
                    </span>
                    <span class="btn">
                      ป่าตอง
                      <input type="checkbox" class="hide" name="example1[]" value="Should">
                    </span>
                  </div>
                  <div class="input_search">
                    <input type="text" placeholder="Search...">
                    <input type="submit"class="button_search" value="ค้นหา">
                    <div class="clearfix"></div>
                  </div>
                </form>
                <div class="scrollbar">
                  <div class="nano">
                    <div class="content">
                      <ul class="connected list no2">

                        <?php
                            //print_r($hotels); exit;
                          if(!empty($hotels)){
                            foreach ($hotels["hotel"] as $key => $value) {
                              //print_r($value); exit;
                              if(!empty($value['price'])){
                        ?>
                              <li>
                                <div class="list_packet">
                                <div class="ribbon_hotel"></div>
                                  <div class="row">
                                    <div class="twelve columns">
                                      <a href="<?php echo base_url("hotel/".$value["hotel"]->hott_url."-".$value["hotel"]->hot_id); ?>" target="_blank">
                                        <img src="<?php echo $value["hotel"]->hot_banner_image; ?>">
                                      </a>
                                    </div>
                                    <div class="twelve columns">
                                      <div class="row">
                                        <div class="nine columns">
                                          <div class="title_tour">
                                            <h4><a href=""><?php echo $value['hotel']->hott_name; ?></a></h4>


                                          <input  type="hidden"
                                                  id="packagedata"
                                                  packagetype="hotel"
                                                  packageid="<?php echo $value['hotel']->hott_id; ?>"
                                                  title="<?php echo $value['hotel']->hott_name; ?>"
                                                  adultprice="<?php echo $value['price']->prh_sale_room_price; ?>"
                                                  childprice="<?php echo $value['price']->prh_sale_room_price; ?>"
                                                  discountadultprice="<?php echo $value['price']->prh_discount_room_price; ?>"
                                                  discountchildprice="<?php echo $value['price']->prh_discount_room_price; ?>"
                                                  tag="<?php echo $hotels["filter"]["defaulttag"]; ?>"
                                                  day="1"
                                          />
                                          </div>
                                        </div>
                                        <div class="three columns">
                                          <div class="rating three_star"></div>
                                          <div class="clearfix"></div>
                                        </div>
                                      </div>
                                      <div class="border"></div>
                                    </div>
                                    <div class="twelve columns">
                                      <div class="icon time tooltip_se" title="เวลา">N/A</div>
                                      <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                      <div class="price"><span><?php echo $value['price']->prh_sale_room_price; ?> B</span> / <?php echo $day; ?> วัน</div>
                                    </div>
                                  </div>
                                </div>
                                <a class="delete tooltip_ne" title="ลบ"></a>
                                <a class="add tooltip_ne" title="เพิ่ม"></a>
                              </li>

                        <?php
                              }
                            }
                          }
                        ?>
                        <div class="clearfix"></div>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- END scrollbar -->
              </div>
              <!-- END Tab2-->
              <!-- End Hotel -->


              <div id="tabs3">
                <h3>การเดินนทาง</h3>
                <form class="search_package">
                  <div class="selects">
                    <div class="select-block">
                      <select  name='firsttag_tranfer' id='firsttag_tranfer'>
                          <option value="ภูเก็ต">ภูเก็ต</option>
                          <option value="กระบี่">กระบี่</option>
                          <option value="พังงา">พังงา</option>
                          <option value="ตรัง">ตรัง</option>
                          <option value="ภูเก็ต">ภูเก็ต</option>
                          <option value="กระบี่">กระบี่</option>
                          <option value="พังงา">พังงา</option>
                          <option value="ตรัง">ตรัง</option>
                          <option value="ภูเก็ต">ภูเก็ต</option>
                          <option value="กระบี่">กระบี่</option>
                          <option value="พังงา">พังงา</option>
                          <option value="ตรัง">ตรัง</option>
                     </select>
                   </div>
                  </div>

                  <div class="tag">
                    <span class="btn">
                      กะตะ
                      <input type="checkbox" class="hide" name="thirdtag[]" value="Hey">
                    </span>
                    <span class="btn">
                      ในหาน
                      <input type="checkbox" class="hide" name="thirdtag[]" value="Hey">
                    </span>
                    <span class="btn">
                      กะรน
                      <input type="checkbox" class="hide" name="thirdtag[]" value="Click">
                    </span>
                    <span class="btn">
                      ป่าตอง
                      <input type="checkbox" class="hide" name="thirdtag[]" value="Should">
                    </span>
                  </div>
                  <div class="input_search">
                    <input type="text" placeholder="Search...">
                    <input type="submit"class="button_search" value="ค้นหา">
                    <div class="clearfix"></div>
                  </div>
                </form>
                <div class="scrollbar">
                  <div class="nano">
                    <div class="content">
                      <ul class="connected list no2">
                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/2.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/3.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/4.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/5.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png');?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png');?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png');?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด">
                                  <a href="#" data-reveal-id="myModal">รายละเอียด</a>
                                </div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png'); ?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->

                      <!--BEGIN List 1-->
                        <li>
                          <div class="list_packet">
                            <div class="row">
                              <div class="twelve columns">
                                <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png')?>"></a>
                              </div>
                              <div class="twelve columns">
                                <div class="row">
                                  <div class="nine columns">
                                    <div class="title_tour">
                                      <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                                    </div>
                                  </div>
                                  <div class="three columns">
                                    <div class="rating three_star"></div>
                                    <div class="clearfix"></div>
                                  </div>
                                </div>
                                <div class="border"></div>
                              </div>
                              <div class="twelve columns">
                                <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                <div class="price"><span>8,780 B</span> / 3 วัน</div>
                              </div>
                            </div>
                          </div>
                          <a class="delete tooltip_ne" title="ลบ"></a>
                          <a class="add tooltip_ne" title="เพิ่ม"></a>
                        </li>
                      <!--END List 1-->
                        <div class="clearfix"></div>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- END scrollbar -->
              </div>
              <!-- END tab3-->
            </div>
          </div>
          </div>
        </div>

      </section>
    </div>


    <?php
      if(!empty($tours["tour"]))
      foreach ($tours["tour"] as $key => $value) {
    ?>
      <div id="myTourModal_<?php echo $value['tour']->tou_id; ?>" class="reveal-modal [expand, xlarge, large, medium, small]">
        <?php echo $value['tour']->tout_detail; ?>
        <a class="close-reveal-modal">&#215;</a>
      </div>

    <?php
      }
    ?>



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
            <p>31/1 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Gallery -->
  </div>

<script type="text/javascript">
  $(document).ready(function() {
    var defaults = {
      containerID: 'moccaUItoTop', // fading element id
      containerHoverClass: 'moccaUIhover', // fading element hover class
      scrollSpeed: 1200,
      easingType: 'linear'
    };

    $().UItoTop({ easingType: 'easeOutQuart' });

  });

  $(function() {
    // placement examples
    $('.tooltip_n').powerTip({placement: 'n'});
    $('.east').powerTip({placement: 'e'});
    $('.south').powerTip({placement: 's'});
    $('.west').powerTip({placement: 'w'});
    $('.tooltip_nw').powerTip({placement: 'nw'});
    $('.tooltip_ne').powerTip({placement: 'ne'});
    $('.south-west').powerTip({placement: 'sw'});
    $('.tooltip_se').powerTip({placement: 'se'});
    // api examples
  });

  $(function(){

    $(".nano").nanoScroller(
      {
        scroll: 'top',
        sliderMaxHeight: 200,
        alwaysVisible: true,
        sliderClass: 'pane'
      }
    );

  });

  $(function () {
    var offset = $(".sticky_content").offset();
    var topPadding = 34;
    $(window).scroll(function () {
      if ($(window).scrollTop() > offset.top) {
        $(".sticky_content").stop().animate({
          marginTop: $(window).scrollTop() - offset.top + topPadding
        });
      } else {
        $(".sticky_content").stop().animate({
          marginTop: 0
        });
      }
    });
  });

  $(document).ready(function() {
    $("#buttonForModal").click(function() {
      $("#myModal").reveal();
    });
  });

  $(document).ready(function() {
    setDragAndDropDataForExternalFile();
    /////////////////////////////////
    //
    // Search box use jquery
    //
    /////////////////////////////////

    //First tag and Second tag
    $("#secondtag_tour , #firsttag_tour").change(function() {
      updateTab();
    });

    //Third tag
    var count = 0;
    $('.tag .btn').selectable({
      class: 'btn-info',
      onChange: function() {
        //Request
        if(count > 0){
          var model = "tour";
          var firsttag_id = $("#firsttag_tour").val();
          var secondtag_id = $("#secondtag_tour").val();
          var thirdtag_id = 0;
          $('#thirdtag_tour :checkbox:checked').each(function() {
            thirdtag_id += $(this).val()+",";
          });

          //Response
          var responseData = data_filter(model, firsttag_id, secondtag_id, thirdtag_id);
          $('#data').html("<div style=\"text-align:center;\"><img src=<?php echo Util::ThemePath().'/images/ajax-loader.gif'; ?> /></div>");
          responseData.done(function(data) {
            $('#data').hide().html(data).fadeIn("slow");

            $("#data").append(function(){
              setDragAndDropDataForExternalFile();
              setDateDataForExternalFile();
              //setCheckedBoxTagForExternalFile();
            });
          });
        }
        count++;
      }
    });

  });

  function setDateDataForExternalFile(){
    $(".add").click(function() {
      alertify.set({ delay: 2000 });
      alertify.prompt("เลือกวันที", function (e, str) {
          if (e) {
            alertify.success("สำเร็จ " + str);
          } else {
            alertify.error("ยกเลิก");
          }
        });
        return false;
    });
  }

  function tag_filter(model, firsttag_id, secondtag_id, thirdtag_id){
      var data =  {
                    model : model,
                    firsttag_id: firsttag_id,
                    secondtag_id: secondtag_id ,
                    thirdtag_id: thirdtag_id
                  };
      var url = "ajax/tourfilter/tag";

      return  $.post(url, data);
  }

  function data_filter(model, firsttag_id, secondtag_id, thirdtag_id){
      var data =  {
                    model : model,
                    firsttag_id: firsttag_id,
                    secondtag_id: secondtag_id ,
                    thirdtag_id: thirdtag_id
                  };
      var url = "ajax/tourfilter/data";

      return  $.post(url, data);
  }

  function setDragAndDropDataForExternalFile(){
    $(function() {
      $('.connected').sortable({
        connectWith: '.connected',
        items: ".sortable_item",
        forcePlaceholderSize: true,
        revert: true,
        start: function(event, ui){
          $(ui.item).find("input").attr("dragging","true");
          $(".packet_item").each(function(list_index, list_item) {
            if($(list_item).find("li input").attr("value") == $(ui.item).find("input").attr("value") && $(list_item).find("li input").attr("dragging") == "false"){
              $(list_item).find("li").fadeOut("slow",function(){
                $(this).remove();
              });
            }
          });
        },
        stop: function(event, ui){
          $(ui.item).find("input").attr("dragging","false");
          //console.log(ui.item);
          $(".packet_item").each(function(index, item) {
            if($(this).find("li").length > 1){
              var count_day = 0;
              $(this).find("li input").each(function(index, item) {
                count_day = count_day+parseFloat($(item).attr("totalday"));
              });
              console.log("count_day: "+count_day);
              if(count_day > 1){
                alertify.error("ไม่สามารถเพิ่มทัวร์ได้เนื่องจากเกินเวลาที่กำหนดค่ะ")
                $(ui.item).fadeOut("slow",function(){
                  $(this).prependTo("#tabs1 .connected.no2");
                  $(this).fadeIn("slow");
                });
              }
            }
          });
          setCustomTourData(ui.item);
        },
        create:function(){
            var list=this;
            resize=function(){
                jQuery(list).css("height","auto");
                jQuery(list).height(jQuery(list).height());
            };
            jQuery(list).height(jQuery(list).height());
        }
      }).disableSelection();
      $(".sortable_item").disableSelection();
    });
  }

  function setCustomTourData(thisObj){
    //Drag&drop item
    var itemHtml = thisObj.html();
    var Looped = false;
    var packageDay = $(thisObj).find("input").attr("totalday");
    if(packageDay > 1){
      var objID = $(thisObj).find("input").attr("value");
      $(".packet_item").each(function(list_index, list_item) {
        if($(list_item).find("li input").attr("value") == objID && !Looped){
          Looped = true;
          for(var i = 1; i<packageDay;i++){
            if($(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+")").find("li input").attr("value") != objID){
              if($(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+")").length == 0 || $(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+")").find("li").length > 0){
                var html = '<div class="packet_item" style="display:none"></a>';
                    html += '<div class="sticker_date"></div>';
                    html += '<ul class="connected list no1">';
                    html += '<li draggable="true" class="" style="display: list-item;">';
                    html += itemHtml;
                    html += '</li>';
                    html += '</ul>';
                    html += '<a class="close tooltip_ne" title="ลบ"></a></div>';
                    $(list_item).after(html).append(function(){
                      setDragAndDropDataForExternalFile();
                      setDateDataForExternalFile();
                    });
              }else{
                var html = '<li draggable="true" class="" style="display: list-item;">';
                    html += itemHtml;
                    html += '</li>';
                $(".packet_item:eq("+parseInt((parseInt(list_index)+parseInt(i)))+") ul").append(html).fadeIn("slow");
              }
            }
          }
          $(".packet_item").fadeIn("slow");
        }

      });
    }
    updateAllPackage();
  }

  $(".add_date").click(function() {
    addDate();
  });
  $(".clear_date").click(function() {
    clearDate();
    updateTab();

  });

  function clearDate(item){
    $(".packet_item").each(function(list_index, list_item) {
      $(list_item).find("li").fadeOut("slow", function(){
        $(this).remove();
        alertify.success("เคลียร์สำเร็จ!");
      });
    });
  }

  function addDate(item){
    if(item){
      //Init with data
      var html = '<div class="packet_item" style="display:none"></a>';
      html += '<div class="sticker_date">วันที่ '+countDayDisplay+'</div>';
      html += '<ul class="connected list no1">';
      html += '<li draggable="true" class="" style="display: list-item;">';
      html += item;
      html += '</li>';
      html += '</ul>';
      html += '<a class="close tooltip_ne" title="ลบ"></a></div>';
      $('.packet').append(html);
      $('.tooltip_ne').powerTip({placement: 'ne'});
      $(".packet_item").fadeIn("slow");

      $('.connected').sortable({
        connectWith: '.connected'
      });

      $('.tooltip_ne').powerTip({placement: 'ne'});
    }else{
      //Init without data
      var html = '<div class="packet_item" style="display:none"></a>';
      html += '<div class="sticker_date"></div>';
      html += '<ul class="connected list no1"></ul>';
      html += '<a class="close tooltip_ne" title="ลบ"></a></div>';
      $('.packet').append(html);
        $('.tooltip_ne').powerTip({placement: 'ne'});
      $(".packet_item").fadeIn("slow");

      $('.connected').sortable({
        connectWith: '.connected'
      });

      $('.tooltip_ne').powerTip({placement: 'ne'});
    }
    alertify.success("เพิ่มวันสำเร็จ!");
    window.setTimeout(updateAllPackage, 500);
  }

  $(document).on("click", ".packet_item a.close", function (e) {
    e.preventDefault();
    var isInList = false;
    $(this).closest(".packet_item").fadeOut(function () {
      //console.log($(this));
      $(this).find(".no1 li").fadeOut(function () {
        isInList = false;
        //console.log($(this));
        $(this).find("input").each(function(index, item) {
          //console.log(item);
          packageid = $(item).attr('packageid');
        });
        $("#tabs1 .connected.no2").find("li").each(function(index, no2Item) {
          $(no2Item).find("input").each(function(index, inputItem) {
            if($(inputItem).attr('packageid') == packageid){
              isInList = true;
            }
          });
        });
        if(!isInList){
          $(this).prependTo("#tabs1 .connected.no2");
          $(this).fadeIn("slow");
        }else{
          $(this).remove();
        }
        $(".packet_item").find("li").each(function(index, inputItem) {
          if($(inputItem).find('input').attr('packageid') == packageid){
            $(inputItem).fadeOut("slow", function() {
              $(this).remove();
            });
          }
        });
      });
      $(this).remove();
    });
    deleteDate();
  });

  $(document).on("click", ".connected li a.delete", function (e) {
    e.preventDefault();
    var isInList = false;
    $(this).closest(".connected li").fadeOut(function () {
      isInList = false;
      $(this).find("input").each(function(index, item) {
        packageid = $(item).attr('packageid');
      });
      $("#tabs1 .connected.no2").find("li").each(function(index, no2Item) {
        $(no2Item).find("input").each(function(index, inputItem) {
          if($(inputItem).attr('packageid') == packageid){
            isInList = true;
          }
        });
      });
      //console.log(isInList);
      if(!isInList){
        $(this).prependTo("#tabs1 .connected.no2");
        $(this).fadeIn("slow");
      }else{
        $(this).remove();
      }
      $(".packet_item").find("li").each(function(index, inputItem) {
        if($(inputItem).find('input').attr('packageid') == packageid){
          $(inputItem).fadeOut("slow", function() {
            $(this).remove();
          });
        }
      });
    });
    var packageid = $(this).attr('packageid');
    deletePackageItem();
  });

  function deletePakckageFromDisplay(thisObj){
    thisObj.closest(".connected li").fadeOut(function () {
      thisObj.prependTo(".connected.no2");
      thisObj.fadeIn("slow");
    });
  }

  function deletePackageItem(){
    window.setTimeout(updateAllPackage, 500);
  }


  function deleteDate(){
    window.setTimeout(updateAllPackage, 500);
  }

  function updateAllPackage(){
    summaryDisplay();
    updateDate();
    updatePackgaeDate();
    updateDayOptions();
  }

  function checkDayLimit(){

  }

  function updateDayOptions(){
    console.log($(".packet_item").length);
    var package_count = $(".packet_item").length;
    $("#day_tour").val(package_count);
    $("span.custom-text:eq(0)").html(package_count);
  }

  function summaryDisplay(){
    var summaryAdultPrice = 0;
    var summaryChildPrice = 0;
    var packagePrice = new Array();
    //console.dir(packagePrice);
    $(".packet_item").find("input.item_property").each(function(index, item) {
      var isInArray = false;
      $.each(packagePrice, function(index, value) {
        if(value["id"] == $(item).attr('packageid')){
          isInArray = true;
        }
      });
      if(isInArray != true){
        packagePrice.push(priceObject($(item).attr('packageid'),$(item).attr('adultprice'),$(item).attr('childprice')));
      }
    });
    $.each(packagePrice, function(index, value) {
      summaryAdultPrice += parseFloat(value.adultprice);
      summaryChildPrice += parseFloat(value.childprice);
    });


    $("#summary_day").text($(".packet_item").length);
    $("#summary_night").text(($(".packet_item").length-1));

    $("#summary_adult_price").text(addCommas(summaryAdultPrice));
    $("#summary_child_price").text(addCommas(summaryChildPrice));
  }

  function priceObject(id,adultprice,childprice){
    return {
      id:id,
      adultprice:adultprice,
      childprice:childprice
    }
  }

  function updateDate(){
    $(".packet_item").find("div.sticker_date").each(function(index, item) {
      //console.log(index);
      $(item).html("วันที่ "+(index+1));
    });
  }

  function updatePackgaeDate(){
    $(".packet_item").each(function(packet_item_index, packet_item) {
      $(packet_item).append(function(){
        setDragAndDropDataForExternalFile();
        setDateDataForExternalFile();
      });

      $(packet_item).find("li").each(function(list_index, list_item) {
        //console.log(list_item);
      });
    });
  }

  function updateTab(){
    //Request
    var model = "tour";
    var firsttag_id = $("#firsttag_tour").val();
    var secondtag_id = $("#secondtag_tour").val();
    var thirdtag_id = 0;
    $('#thirdtag_tour :checkbox:checked').each(function() {
      thirdtag_id += $(this).val()+",";
    });

    //Response
    var responseTag = tag_filter(model, firsttag_id, secondtag_id, thirdtag_id);
    responseTag.done(function(data) {
      $('#thirdtag_tour').hide().html(data).fadeIn("slow");
    });

    var responseData = data_filter(model, firsttag_id, secondtag_id, thirdtag_id);

    $('#data').html("<div style=\"text-align:center;\"><img src=<?php echo Util::ThemePath().'/images/ajax-loader.gif'; ?> /></div>");
    responseData.done(function(data) {
      $('#data').hide().html(data).fadeIn("slow");

      $("#data").append(function(){
          setDragAndDropDataForExternalFile();
          setDateDataForExternalFile();
      });
    });

  }

  function addCommas(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }

  $(document).ready(function() {
    // attach the plugin to all selects
    $('.search_package .selects select').selectik({maxItems: 8});
    $('.date_tour .selects select').selectik({maxItems: 6});

    $(".add").click(function() {
      alertify.set({ delay: 2000 });
      alertify.prompt("เลือกวันที", function (e, str) {
          if (e) {
            alertify.success("สำเร็จ " + str);
          } else {
            alertify.error("ยกเลิก");
          }
        });
        return false;
    });

    $("#day_tour").change(function() {
      var day_tour = $("#day_tour option:selected").val();
      var packet_item = $(".packet_item").length;
      var deleted = 0;
      if(packet_item < day_tour){
        for (var i = 0; i < (day_tour - packet_item); i++) {
          addDate();
        };
      }else if(packet_item > day_tour){
        $(".packet_item").each(function(index, item) {
          if(($(".packet_item").length-deleted) > day_tour){
            if($(this).find("li").length == 0){
              $(this).fadeOut("slow",function(){
                $(this).remove();
              });
              deleted = deleted+1;
            }
          }
        });
      }
      window.setTimeout(updateAllPackage, 1000);
    });

  });
</script>

</body>
</html>