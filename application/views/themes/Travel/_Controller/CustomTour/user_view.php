<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $packageData["package_name"];?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo (!empty($tour[0]["short_description"]))?$tour[0]["short_description"]:"";?>" />
  <meta name="keywords" content="" />

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

<?php 
  $rand_keys = array_rand($packageTour, 1);
  //var_dump($rand_keys);
  $pickedTour = $packageTour[$rand_keys];

  if(!empty($pickedTour[0]["background_image"])){
?>
<body style="background: #ededed url(<?php echo $pickedTour[0]["background_image"];?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
<?php
  }else{
?>

<body style="background: #ededed url(<?php echo base_url('themes/Travel/tour/images/bg1.jpg');?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->

<?php
  }
?>
  <div class="overly-bg"></div>
  <div id="wrapper">
    <!-- Menu -->
    {_widget menu}
    <!-- End Menu -->

    <!-- Title -->
    <div class="row">
      <div class="twelve columns">
        <a href="" class="arrow previous tooltip_nw" title="<?php echo $this->lang->line("tour_lang_next_previous");?>"><?php echo $this->lang->line("tour_lang_next_previous");?></a>
        <h1 class="title"><a href=""><?php echo $packageData["package_name"];?></a>
            <a href="#detail">
            <img src="<?php echo base_url('themes/Travel/images/anchor.png');?>" width="23px" height="23px" align="absmiddle"/></a>
          <span class="subtitle"><?php echo (!empty($tour[0]["short_description"]))?$tour[0]["short_description"]:"";?></span>
        </h1>
        <a href="" class="arrow next south" title="<?php echo $this->lang->line("tour_lang_next_location");?>"><?php echo $this->lang->line("tour_lang_next_location");?></a>
      </div>
    </div>
    <!-- End Title -->


    <!-- Gallery -->
    <div class="row">
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
              foreach ($packageTour as $day => $dayValue):
              foreach ($dayValue as $count => $item):
              if(!empty($item["images"])){
                foreach ($item["images"] as $key => $value) {
              ?>
              <li>
                <a class="thumb"  href="<?php echo $value['url'];?>" >
                  <img src="<?php echo $value['url'];?>" alt="<?php echo $packageData["package_name"];?>" />
                  <div><span></span></div>
                </a>
                <div class="captions">
                  <div class="image-title"><?php echo $packageData["package_name"];?></div>
                  <div class="image-desc"></div>
                </div>
              </li>
              <?php
                }
              }
              endforeach;
              endforeach;
              ?>
            </ul>
          </div>
        </div>
      </section>
      <section class="gallery_mobile">
        <ul id="gallery_mobile">
          <?php
          foreach ($packageTour as $day => $dayValue):
          foreach ($dayValue as $count => $item):
          if(!empty($item["images"])){
            foreach ($item["images"] as $key => $value) {
          ?>
            <li>
              <a href="<?php echo $value['url'];?>">
                <img src="<?php echo $value['url'];?>" alt="<?php echo $packageData["package_name"];?>" />
              </a>
            </li>
          <?php
            }
          }
          endforeach;
          endforeach;
          ?>
        </ul>
      </section>
    </div>
    <!-- End Gallery -->

    <div class="row">
      <div class="twelve columns">
        <div class="box_white_in_columns package_tour">
          <!-- Title -->
          <div class="row">
            <div class="eight columns">
              <h3 class="title_tour" id="detail"><?php echo $packageData["package_name"];?></h3>
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
          </div>
      </div>
    </div>

          <?php
            foreach ($packageTour as $day => $dayValue):
          ?>
    <div class="row">
      <div class="twelve columns">
        <div class="box_white_in_columns package_tour">
          <!-- BEGIN Row Package-->
          <div class="row">
            <div class="twelve columns">
              <h3><span>วันที่ <?php echo ++$day;?> </span></h3>
              <div class="row">
                <div class="eight columns">
                  <div class="box_white_in_columns article_packagetour">
              <?php
                foreach ($dayValue as $count => $item):
              ?>
              
                    <?php echo $item["short_description"] ?>
                    <?php
                      if(count($dayValue)>1 and $count == 0){
                        echo " และ ";
                      }
                    ?>
              
              <?php
                endforeach;
              ?>
                  </div>
                </div>
              </div>

              <div style="text-align: center;float: left; margin-bottom:10px;">
              <?php
                foreach ($dayValue as $count => $item):
              ?>
              <!-- BEGIN List Package-->
              <div class="list_packet" style="display: inline-block !important;">
                <div class="row">
                  <div class="twelve columns">
                    <a href="<?php echo base_url($this->lang->line("url_lang_tour")."/".$item["url"]."-".$item["tour_id"]);?>"><img src="<?php echo $item["banner_image"];?>"></a>
                  </div>
                  <div class="twelve columns">
                    <div class="row">
                      <div class="nine columns">
                        <div class="title_tour">
                          <h4><a href="<?php echo base_url($this->lang->line("url_lang_tour")."/".$item["url"]."-".$item["tour_id"]);?>"><?php echo $item["name"];?></a></h4>
                        </div>
                      </div>
                      <div class="three columns time_package">
                      </div>
                    </div>
                    <div class="border"></div>
                  </div>
                  <div class="twelve columns">
                    <div class="icon time tooltip_se" title="เวลา"><?php echo substr($item["start_time1"],0,5);?> - <?php echo substr($item["end_time1"],0,5);?></div>
                    <div class="price"><span><?php echo Util::money_format('%!.00i', $item["price"]["sale_adult_price"]);?> B</span></div>
                  </div>
                </div>

              </div>
              <!-- END List Package-->
              <?php
                endforeach;
              ?>

              <!-- BEGIN List Package-->
              <div class="list_packet list_hotel">
                <div class="ribbon_hotel"></div>
                <div class="row boder_left">
                  <div class="twelve columns">
                    <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/3.png');?>"></a>
                  </div>
                  <div class="twelve columns">
                    <div class="row">
                      <div class="nine columns">
                        <div class="title_tour">
                          <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
                        </div>
                      </div>
                      <div class="three columns time_package">
                        Fullday
                      </div>
                    </div>
                    <div class="border"></div>
                  </div>
                  <div class="twelve columns">
                    <div class="icon time tooltip_se" title="เวลา">08.00 - 15.30 </div>
                    <div class="price"><span>8,780 B</span> / 3 วัน</div>
                  </div>
                </div>
              </div>
              <!-- END List Package-->
          </div>
        </div>
      </div>
    </div>

          <!-- END Row Package -->

          <?php
            endforeach;
          ?>

<br/><br/>
    <div class="row">
      <div class="twelve columns">
        <div class="footer_tour">
        </div>
      </div>
    </div>


    <div class="row">
      <div class="box_white_in_row">
        <div class="six columns">
          <div class="abstract">
            <div class="row">
              <div class="twelve columns">
                <h4>รายละเอียดทัวร์</h4>
                <dl>
                  <?php
                    $lastItemID = 0;
                    $adultTotalPrice = 0;
                    $childTotalPrice = 0;
                    foreach ($packageTour as $day => $dayValue):

                  ?>
                  <div class="row">
                  <dt>วันที่ <?php echo ++$day; ?></dt>
                  <?php
                      foreach ($dayValue as $count => $item):
                        if($lastItemID != $item["tour_id"]){
                          $adultTotalPrice += $item["price"]["sale_adult_price"];
                          $childTotalPrice += $item["price"]["sale_child_price"];
                        }
                  ?>
                    <div class="twelve columns">
                      <dd><?php echo $item["name"];?>
                        <span>ราคาผู้ใหญ่  <?php if($lastItemID != $item["tour_id"]){echo Util::money_format('%!.00i', $item["price"]["sale_adult_price"]);}else{echo "-";}?> B </span>
                      </dd>
                      <dd>
                        <span>ราคาเด็ก      <?php if($lastItemID != $item["tour_id"]){echo Util::money_format('%!.00i', $item["price"]["sale_child_price"]);}else{echo "-";}?> B </span>
                      </dd>
                    </div>
                  <?php
                    $lastItemID = $item["tour_id"];
                    endforeach;
                  ?>
                    </div>
                  <?php
                      endforeach;
                  ?>
                </dl>
                <p class="totol_price2">
                  ราคารวม  ผู้ใหญ่  <?php echo $adultTotalPrice;?> บาท<br/>
                  ราคารวม  เด็ก      <?php echo $childTotalPrice;?> บาท
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="six columns">
          <h3>รายละเอียดลูกค้า</h3>
          <form class="custom">
            <div class="row">
              <div class="six columns">
                <label>ชื่อ</label>
                <input type="text">
              </div>
              <div class="six columns">
                <label>นามสกุล</label>
                <input type="text">
              </div>
            </div>
            <label>ที่อยู่</label>
            <input type="text" class="twelve" placeholder="ถนน">
            <div class="row">
              <div class="four columns">
                <input type="text" placeholder="จังหวัด">
              </div>
              <div class="four columns">
                <input type="text" placeholder="อำเภอ">
              </div>
              <div class="four columns">
                <input type="text" placeholder="รหัสไปรษณีย์">
              </div>
            </div>
            <div class="row">
              <div class="six columns">
                <label>อีเมล์</label>
                <input type="text">
              </div>
              <div class="six columns">
                <label>เบอร์โทร</label>
                <input type="text">
              </div>
            </div>

            <div class="row">
              <div class="six columns">
                <label>จำนวนผู้ใหญ่</label>
                <input type="text">
              </div>
              <div class="six columns">
                <label>จำนวนเด็ก</label>
                <input type="text" >
              </div>
            </div>
            <br/>
            <p class="action_button">
              <a class="button" href="" class="share">Share<i class="share-facebook"></i></a>
              <a class="button" href="">จองทัวร์นี้</a>
            </p>
          </form>
        </div>

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
          <div class="fb-comments" data-href="" data-num-posts="4" data-width=""></div>
        </div>
      </div>
    </div>



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

  <script src="<?php echo base_url('themes/Travel/tour/javascripts/jquery.js');?>"></script>
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/foundation.min.js');?>"></script>
  <!-- Initialize JS Plugins -->
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/app.js');?>"></script>
  <!-- Gallery -->
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/gallery/js/jquery.galleriffic.js');?>"></script>
  <!-- We only want the thunbnails to display when javascript is disabled -->
  <script type="text/javascript">
    document.write('<style>.noscript { display: none; }</style>');
  </script>
  <script type="text/javascript">
      jQuery(document).ready(function($) {
        // We only want these styles applied when javascript is enabled
        $('div.content').css('display', 'block');

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
      });
  </script>

  <!-- Gallery Mobile -->
  <link href="<?php echo base_url('themes/Travel/tour/javascripts/gallery_mobie/photoswipe.css');?>" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/gallery_mobie/lib/klass.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/gallery_mobie/code.photoswipe-3.0.5.min.js');?>"></script>


  <script type="text/javascript">

    (function(window, PhotoSwipe){

      document.addEventListener('DOMContentLoaded', function(){

        var
          options = {},
          instance = PhotoSwipe.attach( window.document.querySelectorAll('#gallery_mobile a'), options );

      }, false);


    }(window, window.Code.PhotoSwipe));

  </script>

  <!-- To top scrollbar  -->
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/easing.js');?>" type="text/javascript"></script>
  <!-- UItoTop plugin -->
  <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js');?>" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css');?>" />
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
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/powertip/jquery.powertip.js');?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/Travel/tour/javascripts/powertip/jquery.powertip.css');?>" />
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

  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/background_slide/jquery.vegas.js');?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('themes/Travel/tour/javascripts/background_slide/jquery.vegas.css');?>">


  <!--Hover effect-->
  <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/DirectionAwareHoverEffect/js/jquery.hoverdir.js');?>"></script>
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
    $(function() {
      $('.thumbs > li a').hoverdir();
    });
  </script>

  <script>
  /*$( function() {
    $.vegas( 'slideshow', {
      delay: 5000,
      backgrounds: [
        { src: 'images/bg1.jpg', fade: 2000 },
        { src: 'images/bg2.jpg', fade: 2000 },
        { src: 'images/bg3.jpg', fade: 2000 },
        { src: 'images/bg4.jpg', fade: 2000 },
        { src: 'images/bg.jpg', fade: 2000 },
      ]
    } )
  } );*/
  </script>

{_include tracker}
</body>
</html>