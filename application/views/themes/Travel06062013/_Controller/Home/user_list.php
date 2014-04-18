<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->lang->lang();?>"> <!--<![endif]-->
<head>
  <title><?php echo $article["title"];?></title>

  {_include meta}
  <meta name="description" content="<?php echo $this->lang->line("global_lang_home_desc");?>" />
  <meta name="keywords" content="<?php echo $this->lang->line("global_lang_home_keyword");?>" />
  <meta name="geo.placename" content="Thailand" />
  <meta name="geo.position" content="15.87003;100.99254" />
  <meta name="geo.region" content="THA" />
  <meta name="ICBM" content="15.87003,100.99254" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo $jspath;?>/iview/js/raphael-min.js"></script>
  <link rel="stylesheet" href="<?php echo $jspath.'/iview/css/iview.css';?>">
  <link rel="stylesheet" href="<?php echo $jspath.'/iview/css/skin 4/style.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/iview.css';?>">
  <script type="text/javascript" src="<?php echo $jspath;?>/iview/js/iview.js"></script>
  <script type="text/javascript">
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


    <!-- Main Menu -->
    <div class="row">
      <div class="twelve columns ">
        {_include slideshow}
        <div class="white_box">
          <div class="right_columns">
            {_include searchbox}
           
            <div id="detail">
              <h1 class="head_title"><?php echo $article["title"];?></h1>
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
            </div>
            {_widget customtour}
            
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
    <!-- End Main Menu -->


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