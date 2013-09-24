<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php
                if(!empty($article["title"])){
                  echo $article["title"];
                }else{
                  echo $this->lang->line("global_lang_location");
                }
              ?></title>
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
                if(!empty($article["title"])){
                  echo $article["title"];
                }else{
                  echo $this->lang->line("global_lang_location");
                }
              ?>
            <img src="<?php echo $imagepath.'/anchor.png';?>" width="1px" height="1px" align="absmiddle"/></a>
          <span class="subtitle"></span>
        </h1>
        <a href="" class="arrow next south" title=""></a>
      </div>
    </div>
    <!-- End Title -->


    <!-- Gallery -->
    <div class="row" id="gallery_row">
    <?php
    if(!empty($images)):
    ?>
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
                  <img src="<?php echo $value['url'];?>" alt="<?php echo $article["title"];?>" />
                  <div><span></span></div>
                </a>
                <div class="captions">
                  <div class="image-title"><?php echo $article["title"];?></div>
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
                <img src="<?php echo $value['url'];?>" alt="<?php echo $article["title"];?>" />
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

    <!-- Tour Information -->
    <div class="row">
      <div class="twelve columns ">
        <div class="white_box">
          <div class="left_columns">
              <ul class="side_bar" id="mainmenu">
                {_include main_menu}
                <?php
                  if(!empty($tour)){
                    foreach ($tour as $key => $value) {
                      if(!empty($value["tour"])){
                    ?>
                      <li>

                        <a class="ajax-click" href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]["tout_url"].'-'.$value["tour"]["tour_id"]);?>">
                        <?php
                          if($value["tour"]["first_image"]){
                        ?>
                          <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $value["tour"]["first_image"];?>">
                        <?php
                          }else{
                        ?>
                          <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $imagepath;?>/camera_icon.jpg">
                        <?php
                          }
                        ?>
                          <?php echo $value["tour"]["tout_name"]; ?>
                        </a></li>
                    <?php
                      }
                    }
                  }
                
                ?>
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
                                    $(".right_columns").hide().html(json.bodyRedered).fadeIn(300);
                                    $("#gallery_row").hide().html(json.imagesRedered).fadeIn(300).css("height","");
                                    $("a#title").html(json.data.location.short_title);
                                    $("span.subtitle").html(json.data.location.subtitle);
                                    if(json.data.location.background_image){
                                      $("body").css('background-image',"url("+json.data.location.background_image+")");
                                    }
                                    initialize(json.data.location.latitude, json.data.location.longitude);
                                    processAjaxData(json.data.location.title, json, $(".left_columns").html(), linkRedirect);
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
            <?php
              if(!empty($article)){
            ?>
            <h2><?php echo $article["title"];?></h2>
              <div class="row">
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][0])){
                    echo $article['body_column'][0];
                  }
                  ?>
                </div>
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][1])){
                    echo $article['body_column'][1];
                  }
                  ?>
                </div>
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][2])){
                    echo $article['body_column'][2];
                  }
                  ?>
                </div>
              </div>
            <?php
            }
            ?>
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