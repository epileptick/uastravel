<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->lang->lang();?>"> <!--<![endif]-->
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="geo.placename" content="<?php echo $currentProvince;?>" />
  <meta name="geo.position" content="<?php echo $location["latitude"];?>;<?php echo $location["longitude"];?>" />
  <meta name="ICBM" content="<?php echo $location["latitude"];?>,<?php echo $location["longitude"];?>" />

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

  
<?php

if(!empty($location['background_image'])){
?>
<body style="background: #ededed url('<?php echo $location['background_image']; ?>') no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
<?php
}else{
?>
<body style="background: #ededed url(<?php echo $imagepath.'/bg5.jpg';?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
<?php
}
?>
    {_include user_tab}

  <div class="overly-bg"></div>
  <div id="wrapper">
    {_widget menu}

    <!-- Tour Information -->
    <div class="row">
      <div class="twelve columns ">
        {_include slideshow}
        <div class="white_box">
          <div class="right_columns">
            {_include searchbox}
                <h2 class="head_title"><?php echo $location['title'];?>
                <?php
                  if($this->session->userdata("logged_in")){
                    echo "[ <a href=\"".base_url("admin/location/create/".$location['id'])."\" target=\"_blank\">Edit</a> ]";
                  }
                ?></h2>
                <!-- Gallery -->
                <div class="row" id="gallery_row">
                <?php
                if(!empty($images)):
                ?>
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
                              <img src="<?php echo $value['url'];?>" alt="<?php echo $location["title"];?>" />
                              <div><span></span></div>
                            </a>
                            <div class="captions">
                              <div class="image-title"><?php echo $location["title"];?></div>
                              <div class="image-desc"></div>
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
                            <img src="<?php echo $value['url'];?>" alt="<?php echo $location["title"];?>" />
                          </a>
                        </li>
                      <?php
                        }
                      }
                      ?>
                    </ul>
                  </section>
                <?php
                  endif;
                ?>
                </div>
                <!-- End Gallery -->
                <div class="twelve">
                  <div class="social_network">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <!--<a class="addthis_counter addthis_pill_style"></a>-->
                    </div>
                    <!-- AddThis Button END -->
                  </div>
                </div>
                <div class="row">
                  <div class="four columns">
                    <?php
                    if(! empty($location['body'][0])){
                      echo $location['body'][0];
                    }
                    ?>
                  </div>
                  <div class="four columns">
                    <?php
                    if(! empty($location['body'][1])){
                      echo $location['body'][1];
                    }
                    ?>
                  </div>
                  <div class="four columns">
                    <?php
                    if(! empty($location['body'][2])){
                      echo $location['body'][2];
                    }
                    ?>
                  </div>
                </div>

                <!-- Tag -->
                <div class="row">
                  <div class="twelve columns">
                  <div class="border"></div>
                    <ul class="tags">
                      <li><a class="tags_name" href="#">Tags</a></li>
                      <?php
                        if(!empty($tag)){
                          foreach ($tag as $key => $value) {
                            if(!empty($value["url"]) &&  $value["tag_id"] != 1){
                      ?>
                              <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value["url"]);?>"><?php echo $value["name"]; ?></a></li>
                      <?php
                            }
                          }
                        }
                      ?>
                    </ul>
                  </div>
                </div>
                <!-- End Tag -->
            <div class="row">
              <div class="eight columns">
                <div class="row">
                  <div class="twelve columns">
                    <h3>แผนที่</h3>
                    <div class="map">
                        <script type="text/javascript">
                              <?php
                                if($location["latitude"] && $location["longitude"]){
                              ?>
                                  var lat = <?php echo $location["latitude"];?>;
                                  var lon = <?php echo $location["longitude"];?>;
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
                                  title: '<?php echo $location["title"];?>',
                                  map: map,
                                  draggable: false
                                });
                              }

                              google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                      <?php
                        if(empty($location['suggestion']) AND empty($location['route'])):
                      ?>
                      <div id="map_canvas" style="height:650px;"></div>
                      <?php
                        else:
                      ?>
                      <div id="map_canvas" style="height:277px;"></div>
                      <div class="border"></div>
                      <?php
                        endif;
                      ?>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <?php
                    if(! empty($location['suggestion'])):
                  ?>
                  <div class="six columns">
                    <h3>{_ location_lang_suggestion}</h3>
                    <?php echo $location['suggestion'];?>
                  </div>
                  <?php
                    endif;
                    if(! empty($location['route'])):
                  ?>
                  <div class="six columns">
                    <h3>{_ location_lang_route}</h3>
                    <?php echo $location['route'];?>
                  </div>
                  <?php
                    endif;
                  ?>
                </div>
              </div>
              <div class="four columns">
                <h3>แพ็กเก็จทัวร์แนะนำ</h3>

                <?php
                  if(!empty($related)){


                    foreach ($related as $key => $value) {
                  # code...
                ?>
                      <div class="list_packet">
                        <div class="row">
                          <div class="twelve columns">
                            <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]->tout_url."-".$value["tour"]->tou_id);?>">
                              <img src="<?php echo $value["tour"]->tou_banner_image; ?>" alt="<?php echo $value["tour"]->tout_name; ?>">
                            </a>
                          </div>
                          <div class="twelve columns">
                            <div class="row">
                              <div class="nine columns">
                                <div class="title_tour">
                                  <h4>
                                    <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]->tout_url."-".$value["tour"]->tou_id);?>">
                                      <?php echo $value["tour"]->tout_name; ?>
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

                                        $priceAdultDiscount = number_format($value["price"]->pri_sale_adult_price, 0);
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
                    }
                  }else{
                    echo "ไม่มีรายการใกล้เคียง";
                  }
                ?>
              </div>
            </div>
            <!-- End Relate -->

              <div class="row">
                <div class="facebook_comment">
                  <div class="twelve columns">
                    <h3>แสดงความคิดเห็น</h3>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=357467797616103";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-comments" data-href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$location['url']."-".$location['id']);?>" data-num-posts="2" data-width=""></div>
                  </div>
                </div>
              </div>
          </div>
          <div class="left_columns">
            <ul class="side_bar">
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