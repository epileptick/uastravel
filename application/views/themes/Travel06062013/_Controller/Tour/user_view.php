<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->lang->lang();?>"> <!--<![endif]-->
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <?php
    if(!empty($tour[0]["short_description"])){
  ?>
    <meta name="description" content="" />
  <?php
    }else{
  ?>
    <meta name="description" content="<?php echo $this->lang->line("global_lang_home_desc");?>" />
  <?php
    }
  ?>
  
  <meta name="keywords" content="" />
  <meta name="geo.placename" content="<?php echo $currentProvince;?>" />
  <meta name="geo.position" content="<?php echo $tour[0]["latitude"];?>;<?php echo $tour[0]["longitude"];?>" />
  <meta name="ICBM" content="<?php echo $tour[0]["latitude"];?>,<?php echo $tour[0]["longitude"];?>" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="<?php echo $jspath.'/iview/css/iview.css';?>">
  <link rel="stylesheet" href="<?php echo $jspath.'/iview/css/skin 4/style.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/iview.css';?>">
  <script type="text/javascript" src="<?php echo $jspath;?>/iview/js/raphael-min.js"></script>
  <script type="text/javascript" src="<?php echo $jspath;?>/iview/js/iview.js"></script>
  <script type="text/javascript">
    (function( $ ) {   
      $(document).ready(function(){
        $('#iview').iView({
          pauseTime: 10000,
          pauseOnHover: true,
          directionNavHoverOpacity: 0,
          timer: "Bar",
          timerDiameter: "50%",
          timerPadding: 0,
          timerStroke: 7,
          timerBarStroke: 0,
          timerColor: "#FFF",
          timerPosition: "bottom-right"
        });
      });
    })(jQuery);  
  </script>
  <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508ccf0302149b28"></script>
  <?php
    PageUtil::addVar("javascript", '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>');
  ?>

  <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php
  if(!empty($caconical)):
  ?>
  <link rel="canonical" href="<?php echo $caconical;?>">
  <?php
  endif;
  ?>
</head>

  <body style="background: #ededed url(<?php echo $imagepath.'/bg5.jpg';?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
    {_include user_tab}

  <div class="overly-bg"></div>
  <div id="wrapper">
    {_widget menu}

    <div class="row">
      <div class="twelve columns ">
        {_include slideshow}
        <div class="white_box">
          <div class="right_columns">
            {_include searchbox}
            <!-- Tour Information -->
            <div class="row">
              <div class="twelve columns">
                <div class="article_tour">
                  <!-- Title -->
                  <div class="row">
                    <div class="twelve columns">
                      
                      <h2 class="head_title" id="detail">(<?php echo $tour[0]["code"];?>) <?php echo $tour[0]["name"];?>
                      <?php
                        $user_data = $this->session->userdata("user_data");
                        if($this->session->userdata("logged_in")){
                          if($user_data["group"] == 1){
                            echo "[ <a href=\"".base_url("admin/tour/create/".$tour[0]["tour_id"])."\" target=\"_blank\">Edit</a> ]";
                          }
                        }
                      ?></h2>
                    </div>
                  </div>
                  <!-- End Title -->
                  <!-- Gallery -->
                      <?php
                      if(!empty($images)):
                      ?>
                      <div class="row" id="gallery_row">
                        <section class="gallery_pc">
                          <div class="twelve columns">
                            <div id="gallery" class="content">
                              <div id="controls" class="controls"></div>
                              <div class="slideshow-container">
                                <div id="loading" class="loader"></div>
                                <div id="slideshow" class="slideshow"></div>
                              </div>
                              <div id="caption" class="caption-container"></div>
                            </div>
                          </div>
                          <div class="twelve columns">
                            <div id="thumbs" class="navigation">
                              <ul class="thumbs noscript">
                                <?php
                                  //print_r($images); exit;
                                if(!empty($images)){
                                  foreach ($images as $key => $value) {
                                ?>
                                <li>
                                  <a class="thumb"  href="<?php echo $value['url'];?>" >
                                    <img src="<?php echo $value['url'];?>" alt="<?php echo $tour[0]["name"];?>" />
                                    <div><span></span></div>
                                  </a>
                                  <div class="captions">
                                    <div class="image-title"><?php echo $tour[0]["name"];?></div>
                                    <div class="image-desc"><?php echo $tour[0]["short_description"]; ?></div>
                                  </div>
                                </li>
                                <?php
                                  }
                                }
                                ?>
                              </ul>
                            </div>
                          </div>
                        </section>
                        <section class="gallery_mobile">
                          <ul id="gallery_mobile">
                            <?php
                              //print_r($images); exit;
                            if(!empty($images)){
                              foreach ($images as $key => $value) {
                            ?>
                              <li>
                                <a href="<?php echo $value['url'];?>">
                                  <img src="<?php echo $value['url'];?>" alt="<?php echo $tour[0]["name"];?>" />
                                </a>
                              </li>
                            <?php
                              }
                            }
                            ?>
                          </ul>
                        </section>
                      </div>
                      <?php
                        endif;
                      ?>
                      <!-- End Gallery -->

                    <div class="twelve">
                      <div class="social_network">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style" >
                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>

                        <!--<a class="addthis_counter addthis_pill_style"></a>-->
                        </div>
                        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508ccf0302149b28"></script>
                        <!-- AddThis Button END -->
                      </div>
                    </div>
                  <p><?php echo $tour[0]["description"];?></p>
                  <h3 style="padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                    <?php echo $this->lang->line("tour_lang_program_and_itinerary");?>
                  </h3>
                  <p>
                    <?php echo $tour[0]["detail"];?>
                  </p>

                  <?php
                    if(!empty($tour[0]["included"]) && !empty($tour[0]["remark"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                        <!--
                        <ul class="disc">
                          <li>รถรับส่งโรงแรม-ท่าเรือ-โรงแรม</li>
                          <li>ค่าเรือเดินทาง</li>
                          <li>อุปกรณ์ดำผิวน้ำและเสื้อชูชีพ</li>
                          <li>อาหารกลางวัน </li>
                          <li>มัคคุเทศก์ </li>
                          <li>ประกันภัย </li>
                        </ul>
                        -->
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($tour[0]["included"])?$tour[0]["included"]:"");?>
                          </div>
                        </p>
                      </div>

                      <div class="seven columns">
                        <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo $tour[0]["remark"];?>
                          </div>
                        </p>
                        <!--
                        <ul class="disc">
                          <li>โปรแกรมทัวร์อาจเปลี่ยนแปลงได้ตามความเหมาะสมขึ้นอยู่กับสภาพภูมิอากาศ</li>
                          <li>เกาะตาชัยเปิดให้เข้าสัมผัสความงามตั้งแต่เดือนพ.ย.-เม.ย. ของทุกปี</li>
                        </ul>
                        -->
                      </div>
                    </div>
                  <?php
                  }else if(!empty($tour[0]["included"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($tour[0]["included"])?$tour[0]["included"]:"");?>
                          </div>
                        </p>
                      </div>
                    </div>
                  <?php
                  }else if(!empty($tour[0]["remark"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                          <!--
                        <ul class="disc">
                          <li>รถรับส่งโรงแรม-ท่าเรือ-โรงแรม</li>
                          <li>ค่าเรือเดินทาง</li>
                          <li>อุปกรณ์ดำผิวน้ำและเสื้อชูชีพ</li>
                          <li>อาหารกลางวัน </li>
                          <li>มัคคุเทศก์ </li>
                          <li>ประกันภัย </li>
                        </ul>
                        -->
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($tour[0]["included"])?$tour[0]["remark"]:"");?>
                          </div>
                        </p>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
              <form name="form" action="<?php echo base_url($this->lang->line("url_lang_tour").'/inquiry');?>" method="post">
                <?php
                  if(!empty($price)){
                ?>
                <div class="row">
                  <h3><?php echo $this->lang->line("tour_lang_tour_price"); ?></h3>
                  <table class="twelve booking_price">
                    <thead>
                      <tr>
                        <th class="five"><?php echo $this->lang->line("tour_lang_tour_list"); ?></th>
                        <th class="two"><?php echo $this->lang->line("tour_lang_tour_adult_price"); ?></th>
                        <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                        <th class="two"><?php echo $this->lang->line("tour_lang_tour_child_price"); ?></th>
                        <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                    //print_r($price); exit;
                    $countPrice =0;
                    foreach ($price as $key => $value) {
                    ?>

                      <tr>
                        <td >
                          <?php
                            if($value["show_firstpage"] == 1 && $firstpage_price == 1){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])? $value["name"] : "");?>
                              </label>
                          <?php
                            }else if($countPrice == 0 && $firstpage_price == 0){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])?$value["name"] : "");?>
                              </label>
                          <?php

                            }else{
                          ?>
                            <label for="checkbox_<?php echo $value["price_id"];?>">
                              <input name="price_id[]"
                                      type="checkbox"
                                      id="checkbox_<?php echo $value["price_id"];?>"
                                      value="<?php echo $value["price_id"];?>"
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            } //End
                          ?>
                        </td>


                        <td >

                            <?php

                                if($value["discount_adult_price"]>0){
                            ?>

                                 <center><label><strike><?php echo number_format($value["sale_adult_price"], 0);?></strike>
                                <?php echo number_format($value["discount_adult_price"], 0);?></label></center>

                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_adult_price"], 0);?></label></center>

                            <?php
                                }
                             ?>
                        </td>

                        <td >
                          <?php
                            if($value["show_firstpage"] == 1 && $firstpage_price == 1){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="1">
                          <?php
                            }else if($countPrice == 0 && $firstpage_price == 0){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="1">
                          <?php
                            }else{
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="0">
                          <?php
                              }
                           ?>
                        </td>
                        <td >
                            <?php
                                if($value["discount_child_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_child_price"], 0);?></strike>
                                <?php echo number_format($value["discount_child_price"], 0);?></label></center>
                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_child_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>

                        <td >
                          <input name="child_amount_booking[<?php echo $value["price_id"];?>]"
                                  type="text"
                                  id="amount_child_<?php echo $value["price_id"];?>"
                                  class="twelve text-center"
                                  value="0"
                          >
                        </td>
                      </tr>
                    <?php
                      $countPrice++;
                    }
                    ?>
                      <tr>
                        <td class="price_booking" colspan="5">
                            <input type="hidden" name="id" value="<?php echo $tour[0]["tour_id"];?>">
                            <input class="btn btn-primary float-right"  type="submit" value="<?php echo $this->lang->line("tour_lang_tour_booking");?>">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php
                  }
                ?>
                <!-- End price -->
              </form>
                <!-- Start contact -->
                <div class="row">
                 <div class="twelve columns">
                      <span style="font-size:18px; color:#FE5214; margin:-10px 0 10px 0; display:inline-block;" ><?php echo $this->lang->line("global_lang_contact_us");?> : </span>
                      <span style="font-size:14px;"><b><?php echo $this->lang->line("global_lang_telephone");?>.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b><?php echo $this->lang->line("global_lang_fax");?>.</b> 076-331273&nbsp;&nbsp;<b><?php echo $this->lang->line("global_lang_e_mail");?></b> info@uastravel.com</span>
                  </div>
                </div>
                <!-- End contact -->

                <!-- Start tag -->
                <div class="border"></div>
                <div class="row">
                  <div class="twelve columns">
                    <ul class="tags">
                      <li><a class="tags_name" href="#">Tags</a></li>
                      <?php
                        if(!empty($tag)){

                          foreach ($tag as $key => $value) {
                            if(!empty($value["tagt_url"]) &&  $value["tag_id"] != 1){
                      ?>
                            <li><a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tagt_url"]);?>"><?php echo $value["tagt_name"]; ?></a></li>
                      <?php
                            }
                          }
                        }
                      ?>
                    </ul>
                  </div>
                </div>
                <!-- End tag -->
              </div>
              <!-- End box_white_in_columns-->
              <!-- End Tour Information -->

                <!-- Map -->
                  <div class="row">
                    <div class="eight columns">
                      <h3><?php echo $this->lang->line("global_lang_map");?></h3>
                      <div class="map">
                        <script type="text/javascript">
                              <?php
                                if($tour[0]["latitude"] && $tour[0]["longitude"]){
                              ?>
                                  var lat = <?php echo $tour[0]["latitude"];?>;
                                  var lon = <?php echo $tour[0]["longitude"];?>;
                              <?php
                                }else{
                              ?>
                                  var lat = 7.893989;
                                  var lon = 98.407288;
                              <?php
                                }
                              ?>
                              var map;
                              var latLng = new google.maps.LatLng(lat, lon);
                              function initialize() {
                                var myOptions = {
                                  zoom: 13,
                                  center: latLng,
                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
                                marker = new google.maps.Marker({
                                  position: latLng,
                                  title: '<?php echo $tour[0]["name"];?>',
                                  map: map,
                                  draggable: false
                                });
                              }

                              google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                        <div id="map_canvas" style="width:100%;height:650px;"></div>
                      </div>

                    </div>

                <!-- Right bar -->
                <div class="four columns">
                  <!-- Packet -->
                  <h3><?php echo $this->lang->line("tour_lang_packages_tour_suggest");?></h3>

                  <?php
                  if(!empty($related )):
                    foreach ($related as $key => $value):
                  ?>
                    <div class="list_packet">
                      <div class="row">
                        <div class="twelve columns">
                          <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                            <img src="<?php echo $value["tour"]->tou_banner_image; ?>" alt="<?php echo $value["tour"]->tout_name; ?>">
                          </a>
                        </div>
                        <div class="twelve columns">
                          <div class="row">
                            <div class="twelve columns">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                                    <?php echo $value["tour"]->tout_name; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                          </div>
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
                                    $priceAdultDiscount = number_format($value["price"]->pri_discount_adult_price, 0);
                                    $priceAdult = number_format($value["price"]->pri_sale_adult_price, 0);
                                    echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                                    echo " ".$this->lang->line("global_lang_baht");
                                  }else{
                                    echo number_format($value["price"]->pri_sale_adult_price, 0);
                                    echo " ".$this->lang->line("global_lang_baht");
                                  }
                                  //text-decoration: line-through; color: #โค้ดสีเส้น;
                                }else{
                                  echo "Call";
                                  echo " ".$this->lang->line("global_lang_baht");
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

                  <!-- End Packet -->
                </div>
                <!-- End Right bar -->
                  </div>
              </div>
              <!-- End Map -->

            </div>

            <div class="row">
              <div class="facebook_comment">
                <div class="twelve columns">
                  <h3><?php echo $this->lang->line("global_lang_comment");?></h3>
                  <div id="fb-root"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/<?php echo strtolower($this->lang->lang()); ?>_<?php echo strtoupper($this->lang->lang()); ?>/all.js#xfbml=1&appId=357467797616103";
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>
                  <div class="fb-comments" data-href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$tour[0]["url"].'-'.$tour[0]["tour_id"]);?>" data-num-posts="20" data-width=""></div>
                </div>
              </div>
            </div>
          </div>
          <div class="left_columns">
            <ul class="side_bar" id="mainmenu">
              {_include main_menu}
            </ul>
            <div class="clr"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Tour Information -->

    {_include facebook_fanpage}

    {_include footer}

  </div>
  <script src="<?php echo $jspath.'/jquery.placeholder.js';?>"></script>
  <script src="<?php echo $jspath.'/jquery.foundation.orbit.js';?>"></script>
  <script src="<?php echo $themepath.'/bootstrap/js/bootstrap.js';?>"></script>
  <script src="<?php echo $jspath.'/foundation.min.js';?>"></script>
  <script src="<?php echo $jspath.'/jquery.foundation.navigation.js';?>"></script>
  <script src="<?php echo $jspath.'/modernizr.foundation.js';?>"></script>
  <script src="<?php echo $jspath.'/app.js';?>"></script>
  
  <!-- Gallery -->
  <script type="text/javascript" src="<?php echo $themepath.'/js/gallery/js/jquery.galleriffic.js';?>"></script>
  <!-- Gallery Mobile -->
  <link href="<?php echo $themepath.'/js/gallery_mobie/photoswipe.css';?>" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="<?php echo $themepath.'/js/gallery_mobie/lib/klass.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo $themepath.'/js/gallery_mobie/code.photoswipe-3.0.5.min.js';?>"></script>
  <!--Hover effect-->
  <script type="text/javascript" src="<?php echo $themepath.'/js/DirectionAwareHoverEffect/js/jquery.hoverdir.js';?>"></script>

  <!-- We only want the thunbnails to display when javascript is disabled -->
  <script type="text/javascript">
    document.write('<style>.noscript { display: none; }</style>');
  </script>

  <noscript>
    <style>
      .thumbs > li  a div {
        top: 0px;
        left: -100%;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
      }
      .thumbs > li  a:hover div{
        left: 0px;
      }
    </style>
  </noscript>
  <script type="text/javascript" src="<?php echo $jspath.'/home.js';?>"></script>
{_include tracker}
</body>
</html>