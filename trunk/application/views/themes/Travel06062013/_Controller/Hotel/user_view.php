<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $hotel[0]["name"]; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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


    <!-- Title -->
    <div class="row">
      <div class="twelve columns">
        <a href="" class="arrow previous tooltip_nw" title=""></a>
        <h1 class="title">
            <a href="#detail" id="title">
              <?php
                if(!empty($hotel[0]["name"])){
                  echo $hotel[0]["name"];
                }else{
                  echo $this->lang->line("global_lang_location");
                }
              ?>
            <img src="<?php echo $imagepath.'/anchor.png';?>" width="1px" height="1px" align="absmiddle"/></a>
          <span class="subtitle"><?php echo $hotel[0]["short_description"]; ?></span>
        </h1>
        <a href="" class="arrow next south" title=""></a>
      </div>
    </div>
    <!-- End Title -->


    <!-- Gallery -->
    <?php
    if(!empty($images)):
    ?>
    <div class="row" id="gallery_row">
      <section class="gallery_pc">
        <div class="eight columns">
          <div id="gallery" class="content">
            <div id="controls" class="controls"></div>
            <div class="slideshow-container">
              <div id="loading" class="loader"></div>
              <div id="slideshow" class="slideshow"></div>
            </div>
            <div id="caption" class="caption-container"></div>
          </div>
        </div>
        <div class="four columns">
          <div id="thumbs" class="navigation">
            <ul class="thumbs noscript">
              <?php
                //print_r($images); exit;
              if(!empty($images)){
                foreach ($images as $key => $value) {
              ?>
              <li>
                <a class="thumb"  href="<?php echo $value['url'];?>" >
                  <img src="<?php echo $value['url'];?>" alt="<?php echo $hotel[0]["name"];?>" />
                  <div><span></span></div>
                </a>
                <div class="captions">
                  <div class="image-title"><?php echo $hotel[0]["name"];?></div>
                  <div class="image-desc"><?php echo $hotel[0]["short_description"]; ?></div>
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
                <img src="<?php echo $value['url'];?>" alt="<?php echo $hotel[0]["name"];?>" />
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

    <!-- Tour Information -->
    <div class="row">
      <div class="twelve columns ">
        <div class="white_box">
          <div class="left_columns">
              <ul class="side_bar" id="mainmenu">
                {_include main_menu}
                </li>
              </ul>

            <script type="text/javascript">
              var loading = false;
              $(".side_bar a.ajax-click").click(function(){
                if(!loading){
                  $(".right_columns").hide().html("<img style=\"width:48px; height:48px; margin:auto; margin-top: 50%; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
                  $("#gallery_row").hide().html("<img style=\"width:48px; height:48px; margin:auto; margin-top: 50%; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
                  $("#gallery_row").css("height","448px")
                  link = $(this).attr("href")+"?ajax=true";
                  linkRedirect = $(this).attr("href");
                  $(".side_bar a").removeClass("active");
                  $(this).addClass("active");
                  jqxhr = $.get(link);
                  loading = true;
                  jqxhr.success(function(data) {
                                  loading = false;
                                  var json = jQuery.parseJSON(data);
                                  //console.log(json);
                                  $(".right_columns").hide().html(json.bodyRedered).fadeIn(300);
                                  $("#gallery_row").hide().html(json.imagesRedered).fadeIn(300).css("height","");
                                  $("a#title").html(json.data.name);
                                  $("span.subtitle").html(json.data.short_description);
                                  if(json.data.background_image){
                                    $("body").css('background-image',"url("+json.data.background_image+")");
                                  }
                                  initialize(json.data.latitude, json.data.longitude);
                                  processAjaxData(json.data.name, json, $(".left_columns").html(), linkRedirect);
                                });
                }else{
                  $(".right_columns").hide().html("<p style=\"width:100px; height:18px; margin:auto; margin-top: 50%; display: block;\">We're loading...</p><br /><img style=\"width:48px; height:48px; margin:auto; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
                }
                return false;
              });

              $('#mainmenu li a').click(function () {
                var count = $(this).parent().children('ul').length;
                if(count > 0){
                  $(this).parent().children('ul').toggle(200);
                  $(this).children('img').toggleClass("rotate");
                  return false;
                }
              });
              $('ul.sub-menu').each(function (item) {
                if($(this).attr("active") == "false"){
                  $(this).toggle(200);
                }else{
                  $(this).parent().find('img:first').addClass("rotate");
                }
              });
            </script>
            
          </div>
          <div class="right_columns">
            <!-- Tour Information -->
            <div class="row">
              <div class="twelve columns">
                <div class="article_tour">
                  <!-- Title -->
                  <div class="row">
                    <div class="eight columns">
                      <h3 class="title_tour" id="detail">(<?php echo $hotel[0]["code"];?>) <?php echo $hotel[0]["name"];?>
                      <?php
                        $user_data = $this->session->userdata("user_data");
                        if($this->session->userdata("logged_in")){
                          if($user_data["group"] == 1){
                            echo "[ <a href=\"".base_url("admin/tour/create/".$hotel[0]["hotel_id"])."\" target=\"_blank\">Edit</a> ]";
                          }
                        }
                      ?></h3>
                    </div>
                    <div class="four columns">
                      <div class="social_network">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>

                        <!--<a class="addthis_counter addthis_pill_style"></a>-->
                        </div>
                        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508ccf0302149b28"></script>
                        <!-- AddThis Button END -->
                      </div>
                    </div>
                  </div>
                  <!-- End Title -->
                  <div class="border"></div>
                  <p><?php echo $hotel[0]["description"];?></p>
                  <h3 style="padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                    <?php echo $this->lang->line("tour_lang_program_and_itinerary");?>
                  </h3>
                  <p>
                    <?php echo $hotel[0]["detail"];?>
                  </p>



                  <?php
                    if(!empty($hotel[0]["included"]) && !empty($hotel[0]["remark"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($hotel[0]["included"])?$hotel[0]["included"]:"");?>
                          </div>
                        </p>
                      </div>

                      <div class="seven columns">
                        <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo $hotel[0]["remark"];?>
                          </div>
                        </p>

                      </div>
                    </div>
                  <?php
                  }else if(!empty($hotel[0]["included"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($hotel[0]["included"])?$hotel[0]["included"]:"");?>
                          </div>
                        </p>
                      </div>
                    </div>
                  <?php
                  }else if(!empty($hotel[0]["remark"])){
                  ?>
                    <div class="row">
                      <div class="five columns">
                        <h3><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                        <p>
                          <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                            <?php echo (!empty($hotel[0]["included"])?$hotel[0]["remark"]:"");?>
                          </div>
                        </p>
                      </div>
                    </div>
                  <?php
                  }
                  ?>


              <form name="input"
                    action="<?php echo base_url('hotel/inquiry');?>"
                    method="post"
              >
                <!-- price -->
                <?php
                  if(!empty($price)){
                ?>
                <div class="row">

                  <h3>ราคาทัวร์</h3>
                  <table class="twelve">
                    <thead>
                      <tr>
                        <th style="font-size:18px !important;">รายการ</th>
                        <th style="font-size:18px !important;">ราคาห้องพัก(บาท)</th>
                        <th style="font-size:18px !important;">จำนวน(ห้อง)</th>
                        <th style="font-size:18px !important;">จำนวน(วัน)</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $countPrice =0;
                    foreach ($price as $key => $value) {
                    ?>

                      <tr>
                        <td style="font-size:18px !important;">
                          <?php
                            if($countPrice == 0){
                          ?>
                            <label for="checkbox_<?php echo $value["id"];?>">
                              <input name="price_id[]"
                                      type="checkbox"
                                      id="radio_<?php echo $value["id"];?>"
                                      value="<?php echo $value["id"];?>"
                                      CHECKED
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            }else{
                          ?>
                            <label for="checkbox_<?php echo $value["id"];?>">
                              <input name="price_id[]"
                                      type="checkbox"
                                      id="radio_<?php echo $value["id"];?>"
                                      value="<?php echo $value["id"];?>"
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            }
                          ?>
                        </td>

                        <td style="font-size:18px !important;">
                            <?php
                            if($value["discount_room_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_room_price"], 0);?></strike>
                                <?php echo number_format($value["discount_room_price"], 0);?></label></center>

                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_room_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>

                        <td style="font-size:18px !important;">
                          <input name="room_amount_booking[<?php echo $value["id"];?>]"
                                  type="text"
                                  id="amount_room_<?php echo $value["id"];?>"
                                  style="height: 20px !important; width: 30px !important;"

                        >
                        </td>


                        <td style="font-size:18px !important;">
                          <input name="date_amount_booking[<?php echo $value["id"];?>]"
                                  type="text"
                                  id="amount_date_<?php echo $value["id"];?>"
                                  style="height: 20px !important; width: 30px !important;"
                          >
                        </td>
                      </tr>
                    <?php
                      $countPrice++;
                    }
                    ?>
                      <tr>
                        <td class="price_booking" colspan="5">
                            <input type="hidden" name="id" value="<?php echo $hotel[0]["hotel_id"];?>"></input>
                            <input class="button small  booking" type="submit" value="จองโรงแรมนี้">
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
                      <span style="font-size:30px; color:#FE5214; margin:-10px 0 10px 0; display:inline-block;" ><?php echo $this->lang->line("global_lang_contact_us");?> : </span>
                      <span style="font-size:18px;"><b><?php echo $this->lang->line("global_lang_telephone");?>.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b><?php echo $this->lang->line("global_lang_fax");?>.</b> 076-331273&nbsp;&nbsp;<b><?php echo $this->lang->line("global_lang_e_mail");?></b> info@uastravel.com</span>
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
                        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
                        <script type="text/javascript">
                              <?php
                                if($hotel[0]["latitude"] && $hotel[0]["longitude"]){
                              ?>
                                  var lat = <?php echo $hotel[0]["latitude"];?>;
                                  var lon = <?php echo $hotel[0]["longitude"];?>;
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
                                map = new google.maps.Map(document.getElementById('map_canvas'),
                                    myOptions);

                                marker = new google.maps.Marker({
                                  position: latLng,
                                  title: '<?php echo $hotel[0]["name"];?>',
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
                          <a href="<?php echo $value["hotel"]->hott_url."-".$value["hotel"]->hot_id; ?>">
                            <img src="<?php echo $value["hotel"]->hot_banner_image; ?>">
                          </a>
                        </div>
                        <div class="twelve columns">
                          <div class="row">
                            <div class="nine columns">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo $value["hotel"]->hott_url."-".$value["hotel"]->hot_id; ?>">
                                    <?php echo $value["hotel"]->hott_name; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                            <div class="three columns">
                              <div class="rating one_star" style="display:none"></div>
                              <div class="rating two_star" style="display:none"></div>
                              <div class="rating three_star"></div>
                              <div class="rating four_star" style="display:none"></div>
                              <div class="rating five_star"style="display:none"></div>
                              <div class="clearfix"></div>
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
                  <div class="fb-comments" data-href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$hotel[0]["url"].'-'.$hotel[0]["hotel_id"]);?>" data-num-posts="20" data-width=""></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Tour Information -->

    {_include facebook_fanpage}

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

  <script type="text/javascript">
      (function($){
          $.fn.GalleryRefresh = function(){
            // We only want these styles applied when javascript is enabled
            $('div.content').css('display', 'block');
            if($("div.right_columns").outerHeight(true) > $(".side_bar").height()){
              $(".left_columns").height(($("div.right_columns").outerHeight(true)+100));
            }
            // Initially set opacity on thumbs and add
            // additional styling for hover effect on thumbs
            var onMouseOutOpacity = 1;
            // Initialize Advanced Galleriffic Gallery
            var gallery = $('#thumbs').galleriffic({
              delay:                     2500,
              numThumbs:                 15,
              preloadAhead:              40,
              enableTopPager:            false,
              enableBottomPager:         false,
              maxPagesToShow:            7,
              imageContainerSel:         '#slideshow',
              controlsContainerSel:      '#controls',
              captionContainerSel:       '#caption',
              loadingContainerSel:       '#loading',
              renderSSControls:          false,
              renderNavControls:         true,
              playLinkText:              'Play Slideshow',
              pauseLinkText:             'Pause Slideshow',
              prevLinkText:              'รูปก่อนหน้า',
              nextLinkText:              'รูปถัดไป',
              nextPageLinkText:          'Next &rsaquo;',
              prevPageLinkText:          '&lsaquo; Prev',
              enableHistory:             false,
              autoStart:                 false,
              syncTransitions:           true,
              defaultTransitionDuration: 900,
              onSlideChange:             function(prevIndex, nextIndex) {
                // 'this' refers to the gallery, which is an extension of $('#thumbs')
                this.find('ul.thumbs').children()
                  .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                  .eq(nextIndex).fadeTo('fast', 0.67);
              },
              onPageTransitionOut:       function(callback) {
                this.fadeTo('fast', 0.0, callback);
              },
              onPageTransitionIn:        function() {
                this.fadeTo('fast', 1.0);
              }
            });
            (function(window, PhotoSwipe){

              document.addEventListener('DOMContentLoaded', function(){

                var
                  options = {},
                  instance = PhotoSwipe.attach( window.document.querySelectorAll('#gallery_mobile a'), options );

              }, false);


            }(window, window.Code.PhotoSwipe));
            $('.thumbs > li a').hoverdir();
          };
      })(jQuery);
      function initialize(latitude, longitude) {
                            var latLng = new google.maps.LatLng(latitude,longitude);
                            var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                              scrollwheel: false,
                              zoom: 13,
                              center: latLng,
                              disableDefaultUI:false,
                              streetViewControl:true,
                              mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            marker = new google.maps.Marker({
                              position: latLng,
                              title: '',
                              map: map,
                              draggable: false
                            });
                          }
  </script>
  <script type="text/javascript">
      jQuery(document).ready(function($) {
        $().GalleryRefresh();
      });
      $(document).ajaxComplete(function(){
          try{
              FB.XFBML.parse();
              $().GalleryRefresh();
          }catch(ex){}
      });
      function processAjaxData(title, respond, left, urlPath){
         document.title = title;
         window.history.pushState({"respond":respond,"left":left,"pageTitle":title},"", urlPath);
      }
      window.onpopstate = function(e){
                                      if(e.state){
                                        console.dir(e.state);
                                        //$("#wrapper").html(e.state.html)
                                        document.title = e.state.pageTitle;
                                        $(".right_columns").hide().html(e.state.respond.bodyRedered).fadeIn(300);
                                        $(".left_columns").hide().html(e.state.left).fadeIn(300);
                                        $("#gallery_row").hide().html(e.state.respond.imagesRedered).fadeIn(300).css("height","");
                                        $("a#title").html(e.state.pageTitle);
                                        initialize(e.state.respond.data.location.latitude, e.state.respond.data.location.longitude);
                                        FB.XFBML.parse();
                                        $().GalleryRefresh();
                                      }
                                    };
  </script>
{_include tracker}
</body>
</html>