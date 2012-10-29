<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

<?php 
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/tour/stylesheets/foundation.css").'">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/tour/stylesheets/style.css").'">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.base_url("/themes/Travel/tour/stylesheets/app.css").'">');
PageUtil::addVar("javascript", '<script type="text/javascript" src="'.base_url("/themes/Travel/tour/javascripts/modernizr.foundation.js").'"></script>');
PageUtil::addVar("javascript", '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript">

      function initialize() {
        
        var latLng = new google.maps.LatLng('.$location['latitude'].','.$location['longitude'].');

        var map = new google.maps.Map(document.getElementById(\'mapCanvas\'), {
          scrollwheel: false,
          zoom: 16,
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

</head>
<body style="background: #ededed url('/themes/Travel/tour/images/bg1.jpg') no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg--> 
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
              <li><a href="#">หน้าแรก</a></li>
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

    <!-- Title -->
    <div class="row">
      <div class="twelve columns">
        <a href="" class="arrow previous tooltip_nw" title="แหล่งท่องเที่ยวก่อนหน้า">แหล่งท่องเที่ยวก่อนหน้า</a>
        <h1 class="title"><?php echo $location['title'];?>
          <span class="subtitle">มัลดีฟเมืองไทย สวรรค์เหนือผืนทราย ใต้ฟ้าคราม</span>
        </h1>
        <a href="" class="arrow next tooltip_ne" title="แหล่งท่องเที่ยวถัดไป">แหล่งท่องเที่ยวถัดไป</a>
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
            
            foreach($images AS $image):
            ?>
              <li>
                <a class="thumb"  href="<?php echo $image['url'];?>" title="หมู่เกาะสิมิลัน">
                  <img src="<?php echo $image['url'];?>" alt="หมู่เกาะสิมิลัน" />
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
                <a href="<?php echo $image['url'];?>" title="หมู่เกาะสิมิลัน" >
                  <img src="<?php echo $image['url'];?>" alt="หมู่เกาะสิมิลัน" />
                </a>
              </li>
            <?php
            endforeach;
            ?>
        </ul>
      </section>
    </div>
    <div class="row">
      <section class="article">
        <div class="row border">
          <div class="seven columns">
            <h3><?php echo $location['title'];?></h3>
          </div>
          <div class="five columns">
          </div>
        </div>
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
      </section>
    </div>

    <div class="row">
      <div class="eight columns">
        <div class="row">
          <div class="twelve columns">
            <h3>แผนที่</h3>
            <div class="map">
            
              <div id="mapCanvas" style="width:100%;height:277px;"></div>
              
            </div>
            <div class="border"></div>
          </div>
        </div>
        <div class="row">
          <div class="six columns">
            <h3>กฎระเบียบข้อห้าม</h3>
            <p>การท่องเที่ยวพักผ่อนในเขตพื้นที่ของอุทยานแห่งชาติ มีกฎระเบียบที่  นักท่องเที่ยวผู้มีจิตสำนึกทุกคนต้องยึดถือปฏิบัติเพื่อให้เกิดความ  เรียบร้อยในการใช้พื้นที่ร่วมกันอย่างยั่งยืนถาวร ดังนี้</p>
            <ul class="square">
              <li>ไม่เก็บทุกอย่างออกจากพื้นที่นอกจากขยะ</li>
              <li>ไม่ส่งเสียงดังอันเป็นการรบกวนผู้อื่น รวมทั้งสัตว์ป่า</li>
              <li>ไม่ล่า ทำลาย หรือกระทำการใดๆ อันจะทำให้พืช สัตว์ และสภาพ แวดล้อมเสียหาย</li>
              <li>ไม่ส่งเสียงดังอันเป็นการรบกวนผู้อื่น รวมทั้งสัตว์ป่า</li>
            </ul>
          </div>
          <div class="six columns">
            <h3>การเดินทาง</h3>
            <p>นักท่องเที่ยวส่วนใหญ่จะไปลงเรือที่ท่าเรือทับละมุ จ.พังงาจาก ทางหลวง หมายเลข 4 (ช่วงระนอง-พังงา) ช่วง ต.ลำแก่น มีทาง แยกขวาไปท่าเรือ ทับละมุอีกประมาณ 5 กิโลเมตร ก่อนถึงท่าเรือ ด้านซ้ายมือเป็นที่ตั้งของ ที่ทำการและศูนย์บริการนักท่องเที่ยวอุทยานแห่งชาติหมู่เกาะสิมิลันหากเดินทางโดยรถโดยสารประจำทางจากสถานีขนส่งสายใต้ ก่อนถึงท่าเรือ ด้านซ้ายมือเป็นที่ตั้งของ สามารถ ไปได้ทุกคันที่วิ่งสายระนอง-พังงา ลงที่ทางแยกไปท่าเรือทับละมุแล้ว ต่อ รถรับจ้างมาที่ท่าเรือ</p>
          </div>
        </div>
      </div>
      <div class="four columns">
        <h3>แพ็กเก็จทัวร์แนะนำ</h3>
        <div class="list_packet">
          <div class="row">
            <div class="twelve columns">
              <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/1.png');?>"></a>
            </div>
            <div class="twelve columns">
              <div class="title_tour">
                <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
              </div>
              <div class="rating one_star" style="display:none"></div>
              <div class="rating two_star" style="display:none"></div>
              <div class="rating three_star"></div>
              <div class="rating four_star" style="display:none"></div>
              <div class="rating five_star"style="display:none"></div>
              <div class="clearfix"></div>
              <div class="border"></div>
            </div>
            <div class="twelve columns">
              <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
              <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
              <div class="price"><span>8,780 B</span> / 3 วัน</div>
            </div>
          </div>
        </div>
        <div class="list_packet">
          <div class="row">
            <div class="twelve columns">
              <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/2.png');?>"></a>
            </div>
            <div class="twelve columns">
              <div class="title_tour">
                <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
              </div>
              <div class="rating one_star" style="display:none"></div>
              <div class="rating two_star" style="display:none"></div>
              <div class="rating three_star"></div>
              <div class="rating four_star" style="display:none"></div>
              <div class="rating five_star"style="display:none"></div>
              <div class="clearfix"></div>
              <div class="border"></div>
            </div>
            <div class="twelve columns">
              <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
              <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
              <div class="price"><span>8,780 B</span> / 3 วัน</div>
            </div>
          </div>
        </div>
        <div class="list_packet">
          <div class="row">
            <div class="twelve columns">
              <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/3.png')?>"></a>
            </div>
            <div class="twelve columns">
              <div class="title_tour">
                <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
              </div>
              <div class="rating one_star" style="display:none"></div>
              <div class="rating two_star" style="display:none"></div>
              <div class="rating three_star"></div>
              <div class="rating four_star" style="display:none"></div>
              <div class="rating five_star"style="display:none"></div>
              <div class="clearfix"></div>
              <div class="border"></div>
            </div>
            <div class="twelve columns">
              <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
              <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
              <div class="price"><span>8,780 B</span> / 3 วัน</div>
            </div>
          </div>
        </div>
        <div class="list_packet">
          <div class="row">
            <div class="twelve columns">
              <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/4.png'); ?>"></a>
            </div>
            <div class="twelve columns">
              <div class="title_tour">
                <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
              </div>
              <div class="rating one_star" style="display:none"></div>
              <div class="rating two_star" style="display:none"></div>
              <div class="rating three_star"></div>
              <div class="rating four_star" style="display:none"></div>
              <div class="rating five_star"style="display:none"></div>
              <div class="clearfix"></div>
              <div class="border"></div>
            </div>
            <div class="twelve columns">
              <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
              <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
              <div class="price"><span>8,780 B</span> / 3 วัน</div>
            </div>
          </div>
        </div>
        <div class="list_packet">
          <div class="row">
            <div class="twelve columns">
              <a href=""><img src="<?php echo base_url('themes/Travel/tour/images/packet/5.png');?>"></a>
            </div>
            <div class="twelve columns">
              <div class="title_tour">
                <h4><a href="">เกาะเมียงหรือเกาะสี่</a></h4>
              </div>
              <div class="rating one_star" style="display:none"></div>
              <div class="rating two_star" style="display:none"></div>
              <div class="rating three_star"></div>
              <div class="rating four_star" style="display:none"></div>
              <div class="rating five_star"style="display:none"></div>
              <div class="clearfix"></div>
              <div class="border"></div>
            </div>
            <div class="twelve columns">
              <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
              <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
              <div class="price"><span>8,780 B</span> / 3 วัน</div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
            <div class="fb-comments" data-href="<?php echo base_url('location/'.$location['url']."-".$location['id']);?>" data-num-posts="2" data-width=""></div>
          </div>
        </div>
      </div>

    <footer>
      <div class="row">
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

</body>
</html>
