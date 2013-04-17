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
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/modernizr.foundation.js');?>"></script>
  <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

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
    <div class="row">
      <section class="article darg_packet">
        <div class="row">
          <div class="eight mobile-three columns">
            <div class="packet">
              <h3>จัดทัวร์ </h3>
              <p class="action_button top_add_date">
                <a class="button add_date">เพิ่มวัน</a>
              </p>
              <input type="text" placeholder="ชื่อทัวร์">
              <div class="packet_item" number="1">
                <div class="sticker_date">วันที่ 1</div>
                <ul class="connected list no1" >
                </ul>
                <!-- a class="close tooltip_ne" title="ลบ"></a -->
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

              <form name="input"
                    action="<?php echo base_url('customtour/add');?>"
                    method="post"
              >
                <a class="button add_date">เพิ่มวัน</a>

                <!-- Booking data -->
                <input type="hidden" name="id" value=""></input>
                <input class="button"  type="submit" value="จองทัวร์นี้">
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


        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>

              <!-- Tour -->
              <div id="tabs1">
                <input type="hidden" id="example1-serialized" class="span6"></textarea>
                <h3>แพ็กเก็จทัวร์</h3>
                <div class="search_package">
                  <div class="selects">
                    <div class="select-block">
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
                   </div>
                  </div>

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
                      <ul class="connected list no2" id="data">
                        <?php
                          //print_r($tours); exit;
                          if(!empty($tours["tour"]))
                          foreach ($tours["tour"] as $key => $value) {
                            if(!empty($value['price'])){
                        ?>

                          <li>
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
                                              if($tours["filter"]["defaulttag"] == "ทัวร์ครึ่งวัน"){
                                                $day = 0.5;
                                              }else{
                                                $day = 1;
                                              }
                                            ?>

                                          <input  type="hidden"
                                                  id="packagedata"
                                                  packagetype="tour"
                                                  packageid="<?php echo $value['tour']->tou_id; ?>"
                                                  title="<?php echo $value['tour']->tout_name; ?>"
                                                  adultprice="<?php echo $value['price']->pri_sale_adult_price; ?>"
                                                  childprice="<?php echo $value['price']->pri_sale_child_price; ?>"
                                                  discountadultprice="<?php echo $value['price']->pri_discount_adult_price; ?>"
                                                  discountchildprice="<?php echo $value['price']->pri_discount_child_price; ?>"
                                                  tag="<?php echo $tours["filter"]["defaulttag"]; ?>"
                                                  day="<?php echo $day; ?>"
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
                                      <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                                      <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
                                      <div class="price"><span><?php echo $value['price']->prh_sale_room_price; ?> B</span> / 3 วัน</div>
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

<script src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.js'); ?>"></script>
<script src="<?php echo base_url('themes/Travel/tour/javascripts/foundation.min.js'); ?>"></script>
<!-- Initialize JS Plugins -->
<script src="<?php echo base_url('themes/Travel/tour/javascripts/app.js'); ?>"></script>
<!-- To top scrollbar  -->
<script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/easing.js'); ?>" type="text/javascript"></script>
<!-- UItoTop plugin -->
<script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css'); ?>" />
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
</script>

<!-- Tooltip -->
<script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/powertip/jquery.powertip.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/Travel/tour/javascripts/powertip/jquery.powertip.css'); ?>" />
<script type="text/javascript">
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
</script>


<!-- Nano Scroller -->
<script src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.nanoscroller.min.js'); ?>"></script>
<script>
  $(function(){

    $(".nano").nanoScroller({ scroll: 'top' });

  });
</script>

<!-- Scroll -->
<script type="text/javascript">
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
      };
    });
  });
</script>

<!-- Modal-->
<script type="text/javascript">
  $(document).ready(function() {
    $("#buttonForModal").click(function() {
      $("#myModal").reveal();
    });
  });
</script>

<!--  Filter  -->
<script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.selectable.min.js'); ?>"></script>
<script>
  $(function(){

    /////////////////////////////////
    //
    // Search box use jquery
    //
    /////////////////////////////////
    var loading = "<img src=<?php echo base_url('themes/Travel/tour/images/ajax-loader.gif'); ?> />";

    //First tag
    $("#firsttag_tour").change(function() {

      //Request
      var model = "tour";
      var firsttag_id = $(this).val();
      var secondtag_id = $("#secondtag_tour").val();
      var thirdtag_id = 0;
      $('#thirdtag_tour :checkbox:checked').each(function() {
          thirdtag_id += $(this).val()+",";
      });


      //Response
      var responseTag = tag_filter(model, firsttag_id, secondtag_id, thirdtag_id);
      $('#thirdtag_tour').html(responseTag);

      var responseData = data_filter(model, firsttag_id, secondtag_id, thirdtag_id);
      $('#data').html(loading);
      $('#data').html(responseData);
      $("#data").append(function(){
          setDragAndDropDataForExternalFile();
          setDateDataForExternalFile();
          //setCheckedBoxTagForExternalFile();
      });


    });


    //Second tag
    $("#secondtag_tour").change(function() {

      //Request
      var model = "tour";
      var firsttag_id = $("#firsttag_tour").val();
      var secondtag_id = $(this).val();
      var thirdtag_id = 0;
      $('#thirdtag_tour :checkbox:checked').each(function() {
        thirdtag_id += $(this).val()+",";
      });

      //Response
      var responseTag = tag_filter(model, firsttag_id, secondtag_id, thirdtag_id);
      $('#thirdtag_tour').html(responseTag);

      var responseData = data_filter(model, firsttag_id, secondtag_id, thirdtag_id);
      $('#data').html(loading);
      $('#data').html(responseData);

      $("#data").append(function(){
          setDragAndDropDataForExternalFile();
          setDateDataForExternalFile();
          //setCheckedBoxTagForExternalFile();
      });

    });


    //Third tag
    var count = 0;
    $('.search_thirdtag .btn').selectable({
      class: 'btn-info',
      onChange: function() {

        //Request
        //$('#thirdtag_tour-serialized').html( decodeURIComponent($('.search_thirdtag').serialize()) );
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
          $('#data').html(loading);
          $('#data').html(responseData);

          $("#data").append(function(){
            setDragAndDropDataForExternalFile();
            setDateDataForExternalFile();
            //setCheckedBoxTagForExternalFile();
          });
        }

        count++;
      }
    });

  });

  function setDragAndDropDataForExternalFile(){
    $(function() {
      $('.connected').sortable({
        connectWith: '.connected'
      });
    });
  }

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

      var response = "";
      $.ajax({
          type: 'POST',
          url: url,
          data: data,
           async: false,
           success : function(text)
           {
               response = text;
           }
      });

      return response;
  }

  function data_filter(model, firsttag_id, secondtag_id, thirdtag_id){
      var data =  {
                    model : model,
                    firsttag_id: firsttag_id,
                    secondtag_id: secondtag_id ,
                    thirdtag_id: thirdtag_id
                  };
      var url = "ajax/tourfilter/data";

      var response = "";
      $.ajax({
          type: 'POST',
          url: url,
          data: data,
           async: false,
           success : function(text)
           {
               response = text;
           }
      });

      return response;

  }
</script>
<!--  End Filter  -->


<!-- Drag data-->
<script>
  //Get data from drag&drop
  var customPackageObject = new Object();

  var itemObject = new Object();
  var countSelection = 0;

  var countDay = 1;
  var countDayDisplay = 2;
  var countDayElement = 0;

  //var countItem = 0;
  customPackageObject.day = new Array();
  customPackageObject.packagetype = new Array();
  customPackageObject.packageId = new Array();
  customPackageObject.title = new Array();
  customPackageObject.tag = new Array();
  customPackageObject.adultPrice = new Array();
  customPackageObject.childPrice = new Array();
  customPackageObject.discountAdultPrice = new Array();
  customPackageObject.discountChildPrice = new Array();
  customPackageObject.realday = new Array();


  //customPackageObject.day[countDayElement] = new Array();
  var countItemInDropArea = 0;

  function setCustomTourData(thisObj){

    //Drag&drop item
    var itemHtml = thisObj.html();

    //Get value from drag&drop
    var tag = thisObj.find("input").attr('tag');
    var title = thisObj.find("input").attr('title');
    var day = thisObj.find("input").attr('day');
    var packagetype = thisObj.find("input").attr('packagetype');
    var packageid = thisObj.find("input").attr('packageid');
    var adultPrice = thisObj.find("input").attr('adultprice');
    var childPrice = thisObj.find("input").attr('childprice');
    var discountAdultPrice = thisObj.find("input").attr('discountadultprice');
    var discountChildPrice = thisObj.find("input").attr('discountchildprice');
    var realday = thisObj.find("input").attr('realday');



    if(packagetype == "tour"){
        if(typeof customPackageObject.day[countDayElement] == 'undefined'){
          //1D
          customPackageObject.day[countDayElement] = new Array();
          customPackageObject.packagetype[countDayElement] = new Array();
          customPackageObject.packageId[countDayElement] = new Array();
          customPackageObject.title[countDayElement] = new Array();
          customPackageObject.tag[countDayElement] = new Array();
          customPackageObject.adultPrice[countDayElement] = new Array();
          customPackageObject.childPrice[countDayElement] = new Array();
          customPackageObject.discountAdultPrice[countDayElement] = new Array();
          customPackageObject.discountChildPrice[countDayElement] = new Array();
          customPackageObject.realday[countDayElement] = new Array();
        }

        if(countItemInDropArea == 0){
          //2D
          customPackageObject.day[countDayElement][countItemInDropArea] = new Array();
          customPackageObject.packagetype[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.packageId[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.title[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.tag[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.adultPrice[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.childPrice[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.discountAdultPrice[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.discountChildPrice[countDayElement][countItemInDropArea]  = new Array();
          customPackageObject.realday[countDayElement][countItemInDropArea]  = new Array();

          if(tag == "ทัวร์ครึ่งวัน"){

            customPackageObject.day[countDayElement][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement][countItemInDropArea]  = 0.5;

            console.log("Add item("+countDayElement+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement][countItemInDropArea]);

          }else if(tag == "ทัวร์ 1 วัน"){

            customPackageObject.day[countDayElement][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement][countItemInDropArea]  = 1;

            //console.log("Add item ("+countDayElement+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement][countItemInDropArea]);

          }else if(tag == "ทัวร์ 2 วัน 1 คืน"){

            customPackageObject.day[countDayElement][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement][countItemInDropArea]  = 2;
            //console.log("Add item ("+countDayElement+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement][countItemInDropArea]);



            customPackageObject.day[countDayElement+1] = new Array();
            customPackageObject.packagetype[countDayElement+1] = new Array();
            customPackageObject.packageId[countDayElement+1] = new Array();
            customPackageObject.title[countDayElement+1] = new Array();
            customPackageObject.tag[countDayElement+1] = new Array();
            customPackageObject.adultPrice[countDayElement+1] = new Array();
            customPackageObject.childPrice[countDayElement+1] = new Array();
            customPackageObject.discountAdultPrice[countDayElement+1] = new Array();
            customPackageObject.discountChildPrice[countDayElement+1] = new Array();
            customPackageObject.realday[countDayElement+1] = new Array();

            customPackageObject.day[countDayElement+1][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement+1][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement+1][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement+1][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement+1][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement+1][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement+1][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement+1][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement+1][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement+1][countItemInDropArea]  = 2;
            //console.log("Add item ("+(countDayElement+1)+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement+1][countItemInDropArea]);


            addDate(itemHtml);
          }else if(tag == "ทัวร์ 3 วัน 2 คืน"){

            customPackageObject.day[countDayElement][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement][countItemInDropArea]  = 3;
            //console.log("Add item ("+countDayElement+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement][countItemInDropArea]);


            customPackageObject.day[countDayElement+1] = new Array();
            customPackageObject.packagetype[countDayElement+1] = new Array();
            customPackageObject.packageId[countDayElement+1] = new Array();
            customPackageObject.title[countDayElement+1] = new Array();
            customPackageObject.tag[countDayElement+1] = new Array();
            customPackageObject.adultPrice[countDayElement+1] = new Array();
            customPackageObject.childPrice[countDayElement+1] = new Array();
            customPackageObject.discountAdultPrice[countDayElement+1] = new Array();
            customPackageObject.discountChildPrice[countDayElement+1] = new Array();
            customPackageObject.realday[countDayElement+1] = new Array();

            customPackageObject.day[countDayElement+1][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement+1][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement+1][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement+1][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement+1][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement+1][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement+1][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement+1][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement+1][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement+1][countItemInDropArea]  = 3;
            //console.log("Add item ("+(countDayElement+1)+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement+1][countItemInDropArea]);




            customPackageObject.day[countDayElement+2] = new Array();
            customPackageObject.packagetype[countDayElement+2] = new Array();
            customPackageObject.packageId[countDayElement+2] = new Array();
            customPackageObject.title[countDayElement+2] = new Array();
            customPackageObject.tag[countDayElement+2] = new Array();
            customPackageObject.adultPrice[countDayElement+2] = new Array();
            customPackageObject.childPrice[countDayElement+2] = new Array();
            customPackageObject.discountAdultPrice[countDayElement+2] = new Array();
            customPackageObject.discountChildPrice[countDayElement+2] = new Array();
            customPackageObject.realday[countDayElement+2] = new Array();

            customPackageObject.day[countDayElement+2][countItemInDropArea] = day;
            customPackageObject.packagetype[countDayElement+2][countItemInDropArea] = packagetype;
            customPackageObject.packageId[countDayElement+2][countItemInDropArea]  = packageid
            customPackageObject.title[countDayElement+2][countItemInDropArea]  = title;
            customPackageObject.tag[countDayElement+2][countItemInDropArea]  = tag;
            customPackageObject.adultPrice[countDayElement+2][countItemInDropArea]  = adultPrice;
            customPackageObject.childPrice[countDayElement+2][countItemInDropArea]  = childPrice;
            customPackageObject.discountAdultPrice[countDayElement+2][countItemInDropArea]  = discountAdultPrice;
            customPackageObject.discountChildPrice[countDayElement+2][countItemInDropArea]  = discountChildPrice;
            customPackageObject.realday[countDayElement+2][countItemInDropArea]  = 3;
            //console.log("Add item ("+(countDayElement+2)+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement+2][countItemInDropArea]);


            addDate(itemHtml);
            addDate(itemHtml);
          }
          summaryDisplay();

        }else{
          if(customPackageObject.day[countDayElement][0] == 1 ){

            //console.log("Equal 1");
            alert("ท่านไม่สามารถเพิ่ม package ในวันนี้ได้แล้ว \nกรุณาเพิ่มในวันอื่น");
            deletePakckageFromDisplay(thisObj);
            return false;

          }else if(customPackageObject.day[countDayElement][0] == 0.5 ){

            //alert("Check : "+day);
            if(customPackageObject.day[countDayElement][0] == 0.5 ){

              //alert("current : "+day);
              //2D
              customPackageObject.day[countDayElement][0] = new Array();
              customPackageObject.packagetype[countDayElement][0]  = new Array();
              customPackageObject.packageId[countDayElement][0]  = new Array();
              customPackageObject.title[countDayElement][0]  = new Array();
              customPackageObject.tag[countDayElement][0]  = new Array();
              customPackageObject.adultPrice[countDayElement][0]  = new Array();
              customPackageObject.childPrice[countDayElement][0]  = new Array();
              customPackageObject.discountAdultPrice[countDayElement][0]  = new Array();
              customPackageObject.discountChildPrice[countDayElement][0]  = new Array();
              customPackageObject.realday[countDayElement][0]  = new Array();



              customPackageObject.day[countDayElement][0] = day;
              customPackageObject.packagetype[countDayElement][0] = packagetype;
              customPackageObject.packageId[countDayElement][0]  = packageid
              customPackageObject.title[countDayElement][0]  = title;
              customPackageObject.tag[countDayElement][0]  = tag;
              customPackageObject.adultPrice[countDayElement][0]  = adultPrice;
              customPackageObject.childPrice[countDayElement][0]  = childPrice;
              customPackageObject.discountAdultPrice[countDayElement][0]  = discountAdultPrice;
              customPackageObject.discountChildPrice[countDayElement][0]  = discountChildPrice;
              customPackageObject.realday[countDayElement][0]  = 0.5;
              console.log("Add item("+countDayElement+":"+0+")"+customPackageObject.day[countDayElement]);



              customPackageObject.day[countDayElement][1] = new Array();
              customPackageObject.packagetype[countDayElement][1]  = new Array();
              customPackageObject.packageId[countDayElement][1]  = new Array();
              customPackageObject.title[countDayElement][1]  = new Array();
              customPackageObject.tag[countDayElement][1]  = new Array();
              customPackageObject.adultPrice[countDayElement][1]  = new Array();
              customPackageObject.childPrice[countDayElement][1]  = new Array();
              customPackageObject.discountAdultPrice[countDayElement][1]  = new Array();
              customPackageObject.discountChildPrice[countDayElement][1]  = new Array();
              customPackageObject.realday[countDayElement][1]  = new Array();

              customPackageObject.day[countDayElement][1] = day;
              customPackageObject.packagetype[countDayElement][1]= packagetype;
              customPackageObject.packageId[countDayElement][1]  = packageid
              customPackageObject.title[countDayElement][1]  = title;
              customPackageObject.tag[countDayElement][1] = tag;
              customPackageObject.adultPrice[countDayElement][1] = adultPrice;
              customPackageObject.childPrice[countDayElement][1]  = childPrice;
              customPackageObject.discountAdultPrice[countDayElement][1] = discountAdultPrice;
              customPackageObject.discountChildPrice[countDayElement][1]  = discountChildPrice;
              customPackageObject.realday[countDayElement][1] = 0.5;
              console.log("Add item("+(countDayElement+1)+":"+countItemInDropArea+")"+customPackageObject.day[countDayElement]);


              customPackageObject.day[countDayElement][0] = 1;
              summaryDisplay();
            }else{
              //console.log("Equal 1");
              alert("กรุณาเลือก package ครึ่งวัน");
              deletePakckageFromDisplay(thisObj);
              return false;

            }

          }
        }
    }else if(packagetype = "hotel"){

        if(typeof customPackageObject.hotelDay[countDayElement] == 'undefined'){
          //1D
          customPackageObject.day[countDayElement] = new Array();
          customPackageObject.packagetype[countDayElement] = new Array();
          customPackageObject.packageId[countDayElement] = new Array();
          customPackageObject.title[countDayElement] = new Array();
          customPackageObject.tag[countDayElement] = new Array();
          customPackageObject.adultPrice[countDayElement] = new Array();
          customPackageObject.childPrice[countDayElement] = new Array();
          customPackageObject.discountAdultPrice[countDayElement] = new Array();
          customPackageObject.discountChildPrice[countDayElement] = new Array();
          customPackageObject.realday[countDayElement] = new Array();
        }

    }
    //console.log(customPackageObject.day[countDayElement]);
    //Defined array



    //alert("item after:"+countItemInDropArea);


    countItemInDropArea++;

  }

</script>




<!-- Drop data  -->
<script src="<?php echo base_url('themes/Travel/tour/javascripts/sortable-master/jquery.sortable.js');?>"></script>

<!-- Drop Area Connection  -->
<script>
  $(function() {
    $('.connected').sortable({
      connectWith: '.connected'
    });
  });

</script>


<!-- Add date button   -->
<script>


  $(".add_date").click(function() {
    addDate();
  });



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
      html += '<a class="close tooltip_ne" title="ลบ"></div>';
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
      html += '<div class="sticker_date">วันที่ '+countDayDisplay+'</div>';
      html += '<ul class="connected list no1"></ul>';
      html += '<a class="close tooltip_ne" title="ลบ"></div>';
      $('.packet').append(html);
        $('.tooltip_ne').powerTip({placement: 'ne'});
      $(".packet_item").fadeIn("slow");

      $('.connected').sortable({
        connectWith: '.connected'
      });

      $('.tooltip_ne').powerTip({placement: 'ne'});
    }



    //customPackageObject.day[countDayElement] = new Array();

    //console.log("Add day : "+countDayDisplay);
    countItemInDropArea = 0;
    countDay++;
    countDayDisplay++;
    countDayElement++;

  }


  //Close button
  $(".packet_item a.close").click(function() {
    $(this).parents("packet_item .connected.no1 li").fadeOut(function () {
      $(this).prependTo(".connected.no2");
    });
    alert("Close all");
    deleteDate();
  });

  $(document).on("click", ".packet_item a.close", function (e) {
    e.preventDefault();
    $(this).closest(".packet_item").fadeOut(function () {
      $(this).remove();
    });

    deleteDate();
  });

  $(document).on("click", ".connected li a.delete", function (e) {
    e.preventDefault();

    $(this).closest(".connected li").fadeOut(function () {
      $(this).prependTo(".connected.no2");
      $(this).fadeIn("slow");
    });

    var packageid = $(this).attr('packageid');


    deletePackageItem();
    //findArray(packageid, customPackageArray);

  });

  function deletePakckageFromDisplay(thisObj){
    thisObj.closest(".connected li").fadeOut(function () {
      thisObj.prependTo(".connected.no2");
      thisObj.fadeIn("slow");
    });
  }

  function deletePackageItem(){



    if(countItemInDropArea > 0){
      countItemInDropArea--;

      //console.log("delete package : ["+countDayElement+","+countItemInDropArea+"]");
      //console.log("delete package value : "+customPackageObject.day[countDayElement][countItemInDropArea]);
      delete customPackageObject.day[countDayElement][countItemInDropArea];
      //console.log("after delete package value : "+customPackageObject.day[countDayElement][countItemInDropArea]);

    }else if(countItemInDropArea == 0){
      delete customPackageObject.day[countDayElement][0];
      countItemInDropArea = 0;
    }


    summaryDisplay();
  }


  function deleteDate(){

    //console.log("delete day : "+countDayDisplay);
    //console.log("delete day value : "+customPackageObject.day[countDayElement]);
    delete customPackageObject.day[countDayElement][countItemInDropArea];
    delete customPackageObject.day[countDayElement];
    //console.log("after delete day value : "+customPackageObject.day[countDayElement]);

    countDay--;
    countDayDisplay--;
    countDayElement--;
    summaryDisplay();
  }
/*
  function findArray(thing, theArray) {
      var results, col, row, subArray;

      results = []; // Empty array
      for (row = 0; row < theArray.length; ++row) {
          subArray = theArray[row];
          for (col = 0; col < subArray.length; ++col) {
              value = subArray[col];
              if (value == thing) { // or whatever your criterion
                  //results.push({row: row, col: col});
                  console.log("delete("+row+":"+col+"="+packageArray[row][col]+")");
                  customPackageArray[row][col] = 0;
              }
          }
      }

      //console.log(packageArray[0][0]);
      //return results;
  }

  */



  var summaryAdultPrice = 0;
  var summaryChildPrice = 0;
  function summaryDisplay(){

    for (var i = 0; i < customPackageObject.day.length; i++) {
      for (var j = 0; j < customPackageObject.day[i].length; j++) {
        //console.log("length 2D ["+i+","+j+"]: "+customPackageObject.realday[i][j]);


        if(customPackageObject.realday[i][j] == 2 || customPackageObject.realday[i][j] == 3){

          if(i==countDayElement){
            summaryAdultPrice += parseInt(customPackageObject.adultPrice[i][j]);
            summaryChildPrice += parseInt(customPackageObject.childPrice[i][j]);
          }

        }else if(customPackageObject.realday[i][j] == 1 ){
          if(i==countDayElement){
            summaryAdultPrice += parseInt(customPackageObject.adultPrice[i][j]);
            summaryChildPrice += parseInt(customPackageObject.childPrice[i][j]);
          }
        }

      }
    }

    console.log(i+":"+j);
    if(customPackageObject.realday[i-1][0] == 0.5){
      console.log(customPackageObject.adultPrice[i-1][0]);
      if((typeof customPackageObject.adultPrice[i-1][0] == 'undefined') ){
        summaryAdultPrice += parseInt(customPackageObject.adultPrice[i-1][0]);
        summaryChildPrice += parseInt(customPackageObject.childPrice[i-1][0]);
      }else{
        summaryAdultPrice += parseInt(customPackageObject.adultPrice[i-1][0]);
        summaryChildPrice += parseInt(customPackageObject.childPrice[i-1][0]);
      }

    }

    //
    console.log("######## Summary Data ########");
    var summaryDay = parseInt(countDayElement)+1;
    var summaryNight = countDayElement;
    console.log("Summary day : "+ summaryDay);
    console.log("Summary night : "+ summaryNight);
    console.log("Summary adult price : "+summaryAdultPrice);
    console.log("Summary child price : "+summaryChildPrice);

    $("#summary_day").text(summaryDay);
    $("#summary_night").text(summaryNight);

    $("#summary_adult_price").text(addCommas(summaryAdultPrice));
    $("#summary_child_price").text(addCommas(summaryChildPrice));




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
</script>


<!-- -->

<script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/selectik-master/js/jquery.mousewheel.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/selectik-master/js/jquery.selectik.js'); ?>"></script>
<script>
  $(document).ready(function() {
      // attach the plugin to all selects
      $('.search_package .selects select').selectik({maxItems: 8});
      $('.date_tour .selects select').selectik({maxItems: 6});

  });
</script>

<script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.easytabs.min.js'); ?>"></script>
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

<script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/alertify.js'); ?>"></script>
<script>
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
</script>

</body>
</html>