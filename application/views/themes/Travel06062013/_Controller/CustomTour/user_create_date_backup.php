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
                <!-- div class="date_tour">
                  <div class="selects">
                    <div class="select-block">
                      <label>เวลาเริ่ม</label>
                      <select id="time_start" name="time_start">
                          <option value="08.00">08.00</option>
                          <option value="09.00">09.00</option>
                          <option value="10.00">10.00</option>
                          <option value="11.00">11.00</option>
                          <option value="12.00">12.00</option>
                          <option value="13.00">13.00</option>
                          <option value="14.00">14.00</option>
                          <option value="15.00">15.00</option>
                          <option value="16.00">16.00</option>
                          <option value="17.00">17.00</option>
                          <option value="18.00">18.00</option>
                          <option value="19.00">19.00</option>
                     </select>
                   </div>
                  </div>
                </div -->
                <ul class="connected list no1" >
                </ul>
                <a class="close tooltip_ne" title="ลบ"></a>
              </div>

              <div class="packet_item"  number="2">
                <div class="sticker_date">วันที่ 2</div>
                <ul class="connected list no1" >
                </ul>
                <a class="close tooltip_ne" title="ลบ"></a>
              </div>

              <div class="packet_item" number="3">
                <div class="sticker_date">วันที่ 3</div>
                <!-- div class="date_tour">
                  <div class="selects">
                    <div class="select-block">
                      <label>เวลาสิ้นสุด</label>
                      <select id="time_end" name="time_end">
                          <option value="08.00">08.00</option>
                          <option value="09.00">09.00</option>
                          <option value="10.00">10.00</option>
                          <option value="11.00">11.00</option>
                          <option value="12.00">12.00</option>
                          <option value="13.00">13.00</option>
                          <option value="14.00">14.00</option>
                          <option value="15.00">15.00</option>
                          <option value="16.00">16.00</option>
                          <option value="17.00">17.00</option>
                          <option value="18.00">18.00</option>
                          <option value="19.00">19.00</option>
                     </select>
                   </div>
                  </div>
                </div -->
                <ul class="connected list no1">
                </ul>
                <a class="close tooltip_ne" title="ลบ"></a>
              </div>
            </div>
            <div class="abstract">
              <div class="row">
                <div class="six columns">
                  <h4>สรุปข้อมูลทัวร์</h4>
                  <ul class="square">
                    <li>จำนวนวัน 2 วัน / 2 คืน</li>
                  </ul>
                </div>
                <div class="six columns">
                  <h4>สรุปราคา</h4>
                  <ul class="square">
                    <li>ราคาผู้ใหญ่ 6,000 บาท</li>
                    <li>ราคาเด็ก 3,000 บาท</li>
                  </ul>
                  <p class="totol_price">ราคารวม 6,000 บาท</p>
                </div>
              </div>
            </div>
            <p class="action_button">
              <a class="button add_date">เพิ่มวัน</a>
              <a class="button" href="">จองทัวร์นี้</a>
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
                              $firttag_id = $value->tag_id;
                            }
                        ?>
                          <option value="<?php echo $value->tag_id;?>">
                            <?php echo $value->name;?>
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
                            <option value="<?php echo $value->tag_id;?>">
                              <?php echo $value->name;?>
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
                          <?php echo $value->name;?>
                          <input  type="checkbox" 
                                  class="hide" 
                                  name="thirdtag[]" 
                                  value="<?php echo $value->tag_id;?>"
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


                                          <input  id="packagedata"
                                                  packageid="<?php echo $value['tour']->tou_id; ?>" 
                                                  title="<?php echo $value['tour']->tout_name; ?>" 
                                                  adultprice="<?php echo $value['price']->pri_sale_adult_price; ?>"
                                                  tag="<?php echo $tours["filter"]["defaulttag"]; ?>"
                                                  type="hidden" 
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

                        <?
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
                            //print_r($tour); exit;
                          if(!empty($hotel)){
                            foreach ($hotel as $key => $value) {
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
  //var customPackage = new Array();
  var customPackageObject = new Object(); 
  var customPackageArray = new Array(); 


  function setCustomTourData(thisObj){   


    console.log(thisObj.find("input").attr('tag'));

    var tag = thisObj.find("input").attr('tag');

    if(tag == "ทัวร์ครึ่งวัน"){
      console.log(tag);
    }else if(tag == "ทัวร์ 1 วัน"){
      console.log(tag);
    }else if(tag == "ทัวร์ 2 วัน 1 คืน"){
      console.log(tag);
    }else if(tag == "ทัวร์ 3 วัน 2  คืน"){
      console.log(tag);
    }


/*
    customPackageObject.packageId = new Array();
    customPackageObject.title = new Array();
    customPackageObject.tag = new Array();
    customPackageObject.adultPrice = new Array();
    customPackageObject.childPrice = new Array();

    //customPackageProperty.packageid = [];
    var dragAndDropHtml = "";

    var countDay = 0;
    var countPackage = 0;
 
    $(".packet").find("ul").attr('class', 'connected list no1').each(function( index1 ) {
      customPackageArray[index1] = new Array();

      //Object array
      customPackageObject.packageId[index1] = new Array();
      customPackageObject.title[index1] = new Array();
      customPackageObject.tag[index1] = new Array();
      customPackageObject.adultPrice[index1] = new Array();
      customPackageObject.childPrice[index1] = new Array();

      $(this).find('input').each(function(index2){

        var packageid = $(this).attr('packageid');
        if(typeof packageid != 'undefined'){
         
          //countPackage++;
          //packageArray[index1][index2]  =  index1+":"+$(this).attr('packageid');

          customPackageArray[index1][index2] = $(this).attr('packageid');


          //Init data
          customPackageObject.packageId[index1][index2] = $(this).attr('packageid');
          customPackageObject.title[index1][index2] = $(this).attr('title');
          customPackageObject.tag[index1][index2] = $(this).attr('tag');
          customPackageObject.adultPrice[index1][index2] = $(this).attr('adultprice');


        
          console.log("add("+index1+":"+index2+"="+$(this).attr('packageid')+")");
          console.log("Object : "+customPackageObject.title[index1][index2]);
          
          //console.log(countPackage);     
        }
      });

      //console.log(countDay);
    });

*/


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
    $('.packet').append('<div class="packet_item" style="display:none"></a><div class="sticker_date">วันที่ 2</div><ul class="connected list no1"></ul><a class="close tooltip_ne" title="ลบ"></div>');
      $('.tooltip_ne').powerTip({placement: 'ne'});
    $(".packet_item").fadeIn("slow");

    $('.connected').sortable({
      connectWith: '.connected'
    });

    $('.tooltip_ne').powerTip({placement: 'ne'});

  });

  //Close button
  $(".packet_item a.close").click(function() {
    $(this).parents("packet_item .connected.no1 li").fadeOut(function () {
      $(this).prependTo(".connected.no2");
    });
    alert("Close all");
  });

  $(document).on("click", ".packet_item a.close", function (e) {
    e.preventDefault();
    $(this).closest(".packet_item").fadeOut(function () {
      $(this).remove();
    });
  });

  $(document).on("click", ".connected li a.delete", function (e) {
    e.preventDefault();
    $(this).closest(".connected li").fadeOut(function () {
      $(this).prependTo(".connected.no2");
      $(this).fadeIn("slow");
    });


    //console.log($(this).attr('packageid'));

    var packageid = $(this).attr('packageid');



    findArray(packageid, customPackageArray);

  });


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
