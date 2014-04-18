<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->lang->lang();?>"> <!--<![endif]-->
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


    <!-- Tour Information -->
    <div class="row">
      <div class="twelve columns ">
        {_include slideshow}
        <div class="white_box">
          <div class="right_columns" id="detail">
            {_include searchbox}
            <?php
              if(!empty($article)){
            ?>
            <h1 class="head_title"><?php echo $article["title"];?></h1>
            
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
          <div class="left_columns">
              <ul class="side_bar" id="mainmenu">
                {_include main_menu}
              </ul>
              <div class="clr"></div>
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
        </div>
      </div>
    </div>
    <!-- End Tour Information -->


    {_include facebook_fanpage}

    {_include footer}

  </div>
  <script src="<?php echo $themepath.'/bootstrap/js/bootstrap.js';?>"></script>
  <!-- Gallery -->
  <script type="text/javascript" src="<?php echo $themepath.'/js/gallery/js/jquery.galleriffic.js';?>"></script>
  <!-- Gallery Mobile -->
  <link href="<?php echo $themepath.'/js/gallery_mobie/photoswipe.css';?>" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="<?php echo $themepath.'/js/code.photoswipe/lib/klass.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo $themepath.'/js/code.photoswipe/code.photoswipe-3.0.5.min.js';?>"></script>
  <!--Hover effect-->
  <script type="text/javascript" src="<?php echo $themepath.'/js/DirectionAwareHoverEffect/js/jquery.hoverdir.js';?>"></script>
  <script type="text/javascript" src="<?php echo $jspath.'/home.js';?>"></script>
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
{_include tracker}
</body>
</html>