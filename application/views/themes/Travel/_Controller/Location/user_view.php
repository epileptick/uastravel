<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $location['title'];?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <?php

    if(!empty($location['subtitle'])){
?>

  <meta name="description" content="<?php echo $location['subtitle'];?>" />
<?php
    }else{
?>

  <meta name="description" content="" />
<?php
    }
  ?>
  <?php
    $tag_keyword = "สถานที่ท่องเที่ยว, เที่ยวไทย, ";
    if(!empty($tag)){
      foreach ($tag as $key => $value) {
        if(!empty($value->url) &&  $value->id != 1){
          $tag_keyword .= $value->name.", ";
        }
      }

      //Remove last string
      $tag_keyword = substr(trim($tag_keyword), 0, -1);
    }
  ?>
  <meta name="keywords" content="<?php echo $tag_keyword;?>" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

<?php
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/tour/stylesheets/foundation.css").'">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/tour/stylesheets/style.css").'">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/tour/stylesheets/app.css").'">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/style/location_view.css").'">');
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("/themes/Travel/tour/javascripts/modernizr.foundation.js").'"></script>');
PageUtil::addVar("javascript", '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript">
      function initialize() {

        var latLng = new google.maps.LatLng('.$location['latitude'].','.$location['longitude'].');
        var map = new google.maps.Map(document.getElementById(\'mapCanvas\'), {
          scrollwheel: false,
          zoom: 13,
          center: latLng,
          disableDefaultUI:false,
          streetViewControl:true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        marker = new google.maps.Marker({
          position: latLng,
          title: \'\',
          map: map,
          draggable: false
        });
      }

      // Onload handler to fire off the app.
      google.maps.event.addDomListener(window, \'load\', initialize);

      </script>');

preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);

if (count($matches)>1){
  //Then we're using IE
  $version = $matches[1];

  switch(true){
    case ($version<=8):
      //IE 8 or under!
      break;

    case ($version==9):
      //IE9!
      PageUtil::addVar("javascript", '<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>');
      break;

    default:
      //You get the idea
  }
}

?>
<link rel="canonical" href="<?php echo $caconical?>">
</head>
<?php
if(!empty($location['background_image'])){
?>
<body style="background: #ededed url('<?php echo $location['background_image']; ?>') no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
<?php
}else{
?>
<body style="background: #ededed url('/themes/Travel/tour/images/bg1.jpg') no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
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
        <a href="" class="arrow previous tooltip_nw" title="แหล่งท่องเที่ยวก่อนหน้า">แหล่งท่องเที่ยวก่อนหน้า</a>
        <h1 class="title"><a href=""><?php echo $location['title'];?></a>
          <a href="#detail">
            <img src="<?php echo base_url('themes/Travel/images/anchor.png');?>" width="23px" height="23px" align="absmiddle"/>
          </a>
          <?php if(!empty($location['subtitle'])): ?>
          <span class="subtitle"><?php echo $location['subtitle'];?></span>
          <?php endif; ?>
        </h1>
        <a href="" class="arrow next tooltip_ne" title="แหล่งท่องเที่ยวถัดไป">แหล่งท่องเที่ยวถัดไป</a>
      </div>
    </div>
    <!-- End Title -->

    <!-- Gallery -->
    <?php
      if(!empty($images)):
    ?>
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
              foreach($images AS $image):
              ?>
                <li>
                  <a class="thumb"  href="<?php echo $image['url'];?>" title="<?php echo $location['title'];?>">
                    <img src="<?php echo $image['url'];?>" alt="<?php echo $location['title'];?>" />
                  </a>
                  <div class="captions">
                    <div class="image-title"><?php echo $location['title'];?></div>
                    <div class="image-desc"></div>
                  </div>
                </li>
              <?php
              endforeach;
              ?>
              </ul>
            </div>
          </div>
        </section>

          <section class="gallery_mobile">
            <ul id="gallery_mobile">

            <?php
            foreach($images AS $image):
            ?>
              <li>
                <a href="<?php echo $image['url'];?>" title="<?php echo $location['title'];?>" >
                  <img src="<?php echo $image['url'];?>" alt="<?php echo $location['title'];?>" />
                </a>
              </li>
            <?php
            endforeach;
            ?>
              </ul>
            </section>
        </div>

    <?php
      endif;
    ?>
    <!-- End Gallery -->

    <div class="row">
      <section class="article">
        <div class="row">
          <div class="seven columns">
            <h3 id="detail"><?php echo $location['title'];?>
              <?php
                if($this->session->userdata("logged_in")){
                  echo "[ <a href=\"".base_url("admin/location/create/".$location['id'])."\" target=\"_blank\">Edit</a> ]";
                }
              ?></h3>
          </div>
          <div class="five columns">
          </div>
        </div>
        <div class="border"></div>
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
                //print_r($tag);
                if(!empty($tag)){

                  foreach ($tag as $key => $value) {
                    if(!empty($value["url"]) &&  $value["id"] != 1){
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

      </section>
    </div>


    <!-- Relate -->
    <div class="row">
      <div class="eight columns">
        <div class="row">
          <div class="twelve columns">
            <h3>แผนที่</h3>
            <div class="map">
              <?php
                if(empty($location['suggestion']) AND empty($location['route'])):
              ?>
              <div id="mapCanvas" style="height:650px;"></div>
              <?php
                else:
              ?>
              <div id="mapCanvas" style="height:277px;"></div>
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
                      <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
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
  <script src="/themes/Travel/tour/javascripts/jquery.js"></script>
  <script src="/themes/Travel/tour/javascripts/foundation.min.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="/themes/Travel/tour/javascripts/app.js"></script>

  <!-- Gallery -->
  <script type="text/javascript" src="/themes/Travel/tour/javascripts/gallery/js/jquery.galleriffic.js"></script>
  <script type="text/javascript" src="/themes/Travel/tour/javascripts/gallery/js/jquery.opacityrollover.js"></script>
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
        $('#thumbs ul.thumbs li').opacityrollover({
          mouseOutOpacity:   onMouseOutOpacity,
          mouseOverOpacity:  0.67,
          fadeSpeed:         'fast',
          exemptionSelector: '.selected'
        });

        // Initialize Advanced Galleriffic Gallery
        var gallery = $('#thumbs').galleriffic({
          delay:                     2500,
          numThumbs:                 15,
          preloadAhead:              10,
          enableTopPager:            true,
          enableBottomPager:         true,
          maxPagesToShow:            7,
          imageContainerSel:         '#slideshow',
          controlsContainerSel:      '#controls',
          captionContainerSel:       '#caption',
          loadingContainerSel:       '#loading',
          renderSSControls:          true,
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
  <link href="/themes/Travel/tour/javascripts/gallery_mobie/photoswipe.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="/themes/Travel/tour/javascripts/gallery_mobie/lib/klass.min.js"></script>
  <script type="text/javascript" src="/themes/Travel/tour/javascripts/gallery_mobie/code.photoswipe-3.0.5.min.js"></script>


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
  <script src="/themes/Travel/tour/javascripts/top-scrollbar/js/easing.js" type="text/javascript"></script>
  <!-- UItoTop plugin -->
  <script src="/themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="/themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css" />
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
  <script type="text/javascript" src="/themes/Travel/tour/javascripts/powertip/jquery.powertip.js"></script>
  <link rel="stylesheet" type="text/css" href="/themes/Travel/tour/javascripts/powertip/jquery.powertip.css" />
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

      // mouse follow examples
      $('#mousefollow-examples div').powerTip({followMouse: true});

      // mouse-on examples
      $('#mouseon-examples div').data('powertipjq', $([
        '<p><b>Here is some content</b></p>',
        '<p><a href="http://stevenbenner.com/">Maybe a link</a></p>',
        '<p><code>{ placement: \'e\', mouseOnToPopup: true }</code></p>'
      ].join('\n')));
      $('#mouseon-examples div').powerTip({
        placement: 'e',
        mouseOnToPopup: true
      });

      // api examples
      $('#api-open').on('click', function() {
        $.powerTip.showTip($('#mouseon-examples div'));
      });
      $('#api-close').on('click', function() {
        $.powerTip.closeTip();
      });
    });
  </script>

{_include tracker}
</body>
</html>
