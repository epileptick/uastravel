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
  <link rel="stylesheet" href="<?php echo $jspath.'/iview/css/iview.css';?>">
  <link rel="stylesheet" href="<?php echo $jspath.'/iview/css/skin 4/style.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/iview.css';?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo $jspath;?>/iview/js/raphael-min.js"></script>
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

    <!-- SlideShow -->
    <div class="row">
      <div class="twelve columns">
        <div id="iview">
          <div data-iview:thumbnail="<?php echo $imagepath;?>/banner/banner-01.jpg" data-iview:image="<?php echo $imagepath;?>/banner/banner-01.jpg">
            <div class="iview-caption caption1" data-width="550" data-height="50"  data-x="20" data-y="10" data-transition="wipeRight"><span class="caption-text-1">ดูโชว์ความเป็นไทยแบบอลังการ พร้อมรับประทานอาหารค่ำ ได้ที่ภูเก็ตแฟนตาซี</span></div>
            <div class="iview-caption caption3" data-width="310" data-height="55"  data-x="20" data-y="70" data-transition="wipeLeft"><span class="caption-text-2">ราคาพิเศษ! โทร 082-812-1146</span></div>
          </div>
          <div data-iview:thumbnail="<?php echo $imagepath;?>/banner/banner-02.jpg" data-iview:image="<?php echo $imagepath;?>/banner/banner-02.jpg">
            <div class="iview-caption caption1" data-width="330" data-height="130"  data-x="550" data-y="10" data-transition="wipeRight"><span class="caption-text-1">หาดกะตะคือชายหาดที่มีชื่อเสียงเป็นที่นิยมของนักท่องเที่ยว ทั้งชาวไทยและชาวต่างชาติ เพราะขึ้นชื่อในเรื่องของความขาวสะอาด และความละเอียดของเม็ดทราย</span></div>
          </div>
          <!--
          <div data-iview:thumbnail="<?php echo $imagepath;?>/banner/banner-03.jpg" data-iview:image="<?php echo $imagepath;?>/banner/banner-03.jpg">
            <div class="iview-caption caption3" data-width="520" data-height="50" data-x="350" data-y="300" data-transition="expandLeft">GORGEOUS ANIMATED TIMERS WITH HIGH CUSTOMIZABLE OPTIONS</div>
          </div>
          -->
          <div data-iview:thumbnail="<?php echo $imagepath;?>/banner/banner-04.jpg" data-iview:image="<?php echo $imagepath;?>/banner/banner-04.jpg">
             <div class="iview-caption caption1" data-width="280" data-height="150"  data-x="55" data-y="50" data-transition="wipeRight"><span class="caption-text-3">โปรแกรมนำเที่ยวภูเก็ต แนะนำสถานที่สำคัญต่าง ๆ ที่ควรไปเยือน เก็บภาพความสวยงาม และเข้าถึงจังหวัดภูเก็ตอย่างแท้จริง!</span></div>
            <div class="iview-caption caption1" data-easing="easeInOutElastic" data-width="380" data-height="55"  data-x="10" data-y="220" data-transition="wipeLeft"><span class="caption-text-2">สอบถามรายละเอียดโทร 082-812-1146</span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End SlideShow -->

    <div class="row" id="gallery_row">
    </div>
    <!-- Main Menu -->
    <div class="row">
      <div class="twelve columns ">
        <div class="breadcrumb">
          <span></span>
        </div>
        <div class="white_box">
          <div class="left_columns">
            <ul class="side_bar" id="mainmenu">
              {_include main_menu}
            </ul>
          </div>
          <div class="right_columns" id="detail">
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
        </div>
      </div>
    </div>
    <!-- End Main Menu -->


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
    <!-- End Gallery -->
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