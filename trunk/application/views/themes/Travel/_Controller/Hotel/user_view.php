<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $tour[0]->name;?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo (!empty($tour[0]->short_description))?$tour[0]->short_description:"";?>" />
  <?php
    $tag_keyword = "แพ็คเกจทัวร์, ทัวร์, ";
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
  if(!empty($tour[0]->background_image)){
?>
    <body style="background: #ededed url(<?php echo $tour[0]->background_image;?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg--> 
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
    <div class="row">
      <div class="twelve columns">
        <nav class="top-bar">
          <ul>
            <li class="name">
              <a href="<?php echo base_url();?>"> 
                <img src="<?php echo base_url('themes/Travel/tour/images/logo.png');?>">
              </a>
            </li>
            <li class="toggle-topbar"><a href="#"></a></li>
          </ul>


          <section>
            <ul class="right">
              <li><a href="<?php echo base_url('location');?>">สถานที่ท่องเที่ยว</a></li>
              <li class="has-dropdown">
                <a class="active" href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/ทัวร์ครึ่งวัน');?>">ทัวร์ครึ่งวัน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-1-วัน');?>">ทัวร์ 1 วัน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-2-วัน-1-คืน');?>">ทัวร์ 2 วัน 1 คืน</a></li>
                  <li><a href="<?php echo base_url('tour/ทัวร์-3-วัน-2-คืน');?>">ทัวร์ 3 วัน 2 คืน</a></li>
                </ul>                
              </li>
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์อื่นๆ</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/โชว์กลางคืน');?>">โชว์กลางคืน</a></li>
                  <li><a href="<?php echo base_url('tour/สปาแพ็คเกจ');?>">สปาแพ็คเกจ</a></li>
                  <li><a href="<?php echo base_url('tour/กอล์ฟแพ็คเกจ');?>">กอล์ฟแพ็คเกจ</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour/การเดินทาง');?>">การเดินทาง</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/เช่าเรือเหมาลำ');?>">เช่าเรือเหมาลำ</a></li>
                  <li><a href="<?php echo base_url('tour/จองตั๋วเรือโดยสาร');?>">จองตั๋วเรือโดยสาร</a></li>
                  <li><a href="<?php echo base_url('carrent/list');?>">จองรถเช่า</a></li>
                  <li><a href="<?php echo base_url('airline/list');?>">จองตั๋วเครื่องบิน</a></li>
                </ul>                
              </li> 
              <li class="has-dropdown">
                <a href="<?php echo base_url('tour/ที่พัก');?>">ที่พัก</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('tour/จองโรงแรม');?>">จองโรงแรม</a></li>
                  <li><a href="<?php echo base_url('tour/จองห้องเช่า');?>">จองห้องเช่า</a></li>
                </ul>                
              </li>
              <li><a href="<?php echo base_url('tour/โปรโมชั่น');?>">โปรโมชั่น</a></li>
              <li><a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>                
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
        <h1 class="title"><a href=""><?php echo $tour[0]->name;?></a>
            <a href="#<?php echo $tour[0]->name;?>">
            <img src="<?php echo base_url('themes/Travel/images/anchor.png');?>" width="23px" height="23px" align="absmiddle"/></a>
          <span class="subtitle"><?php echo (!empty($tour[0]->short_description))?$tour[0]->short_description:"";?></span>
        </h1>
        <a href="" class="arrow next south" title="แหล่งท่องเที่ยวถัดไป">แหล่งท่องเที่ยวถัดไป</a>
      </div>
    </div>
    <!-- End Title -->

    <!--TEST-->


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
                //print_r($images); exit;
              if(!empty($images)){
                foreach ($images as $key => $value) {
              ?>
              <li>
                <a class="thumb"  href="<?php echo $value['url'];?>" >
                  <img src="<?php echo $value['url'];?>" alt="<?php echo $tour[0]->name;?>" />
                  <div><span></span></div>
                </a>
                <div class="captions">
                  <div class="image-title"><?php echo $tour[0]->name;?></div>
                  <div class="image-desc"><?php echo $tour[0]->short_description;?></div>
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
                <img src="<?php echo $value['url'];?>" alt="<?php echo $tour[0]->name;?>" />
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
    <div class="row">
      <div class="eight columns">
        <h4  style="margin-bottom:0px !important;"  id="<?php echo $tour[0]->name;?>">ID : <?php echo $tour[0]->code;?></h4>
      </div>
    </div>  
    <!-- Tour Information -->
    <div class="row">
      <div class="eight columns">
        <div class="box_white_in_columns article_tour">
          <div class="row">
            <div class="eight columns">
              <h3 style="color:#FE5214;"><?php echo $tour[0]->name;?></h3>
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
          </div><!-- Title -->
          <div class="border"></div>
          <p><?php echo $tour[0]->description;?></p>
          <h3 style="padding:4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
            <?php echo $this->lang->line("tour_lang_program_and_itinerary");?> 
          </h3>
          <!--
          <p><span class="color_blue">ช่วงเช้า: </span> รถรับท่านจากโรงแรมที่พักในจังหวัดภูเก็ต หรือ เขาหลัก มุ่งหน้าสู่ท่าเรือคุระบุรี จังหวัดพังงา ออกเดินทางจากท่าเรือ สู่อุทยานฯ หมู่เกาะสุรินทร์ ด้วยเรือสปีดโบ๊ทขนาดใหญ่ เดินทามาถึงอุทยานแห่งชาติ หมู่เกาะสุรินทร์  ดำน้ำดูปะการังบริเวณ อ่าวแม่ยาย และ อ่าวเต่า สนุกสนานกับการเล่นน้ำ ดำน้ำชมปะการัง หรือพักผ่อนตามอัธยาศัย</p>
          <p><span class="color_blue">เที่ยง:</span> รับประทานอาหารกลางวัน ณ ที่ทำการอุทยานแห่งชาติหมู่เกาะสุรินทร์</p>
          <p><span class="color_blue">ช่วงบ่าย:</span> ออกเดินทางต่อไปดำน้ำดูปะการังบริเวณ อ่าวผักกาด และ เกาะตอรินลา</p>
          <p>ได้เวลาพอสมควร ออกเดินทางกลับจากอุทยานแห่งชาติหมู่เกาะสุรินทร์ สู่ท่าเรือ คุระบุรี จังหวัดพังงา เดินทางกลับสู่ที่พัก ประมาณ 1 ทุ่ม  ส่งท่านถึงที่โรงแรมที่พักในจังหวัดภูเก็ต</p>
          -->
          <p>
            <?php echo $tour[0]->detail;?>
          </p>

   

          <?php 
            if(!empty($tour[0]->included) && !empty($tour[0]->remark)){
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
                    <?php echo (!empty($tour[0]->included)?$tour[0]->included:"");?>
                  </div>
                </p>
              </div>

              <div class="seven columns">
                <h3 style="color:#0000;"><?php echo $this->lang->line("tour_lang_tour_remark");?></h3>
                <p>
                  <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                    <?php echo $tour[0]->remark;?>
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
          }else if(!empty($tour[0]->included)){
          ?>
            <div class="row">
              <div class="five columns">
                <h3><?php echo $this->lang->line("tour_lang_tour_includes");?></h3>
                <p>
                  <div style="padding:4px; border-left:2px solid; border-color:#FFC000;">
                    <?php echo (!empty($tour[0]->included)?$tour[0]->included:"");?>
                  </div>
                </p>
              </div>
            </div>              
          <?php
          }else if(!empty($tour[0]->remark)){
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
                    <?php echo (!empty($tour[0]->included)?$tour[0]->remark:"");?>
                  </div>
                </p>
              </div>
            </div>
          <?php
          }
          ?>


      <form name="input" 
            action="<?php echo base_url('tour/inquiry');?>" 
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
                <th style="font-size:18px !important;">ราคาผู้ใหญ่(บาท)</th>
                <th style="font-size:18px !important;">จำนวน</th>
                <th style="font-size:18px !important;">ราคาเด็ก(บาท)</th>
                <th style="font-size:18px !important;">จำนวน</th>
              </tr>
            </thead> 
            <tbody>
            <?php

            //print_r($extendprice);
            $countPrice =0;
            foreach ($price as $key => $value) {
            ?>

              <tr>
                <td style="font-size:18px !important;">
                  <?php
                    if($countPrice == 0){
                  ?>
                    <label for="checkbox_<?php echo $value->id;?>">
                      <input name="price_id[]" 
                              type="checkbox" 
                              id="radio_<?php echo $value->id;?>" 
                              value="<?php echo $value->id;?>" 
                              CHECKED
                      >
                      <?php echo $value->name;?>
                    </label>
                  <?php
                    }else{
                  ?>
                    <label for="checkbox_<?php echo $value->id;?>">
                      <input name="price_id[]" 
                              type="checkbox" 
                              id="radio_<?php echo $value->id;?>" 
                              value="<?php echo $value->id;?>"
                      >
                      <?php echo $value->name;?>
                    </label>
                  <?php
                    }
                  ?>
                </td>

                <td style="font-size:18px !important;">
                  <center><label><?php echo number_format($value->sale_adult_price, 0);?></label></center>
                </td>

                <td style="font-size:18px !important;">
                  <input name="adult_amount_booking[<?php echo $value->id;?>]" 
                          type="text" 
                          id="amount_adult_<?php echo $value->id;?>"
                          style="height: 20px !important; width: 30px !important;"
                  >
                </td>

                <td style="font-size:18px !important;">
                  <center><label><?php echo number_format($value->sale_child_price, 0);?></label></center>
                </td>


                <td style="font-size:18px !important;">
                  <input name="child_amount_booking[<?php echo $value->id;?>]" 
                          type="text" 
                          id="amount_child_<?php echo $value->id;?>"
                          style="height: 20px !important; width: 30px !important;"
                  >

                </td>
              </tr>    
            <?
              $countPrice++;
            }
            ?>


              <tr>
                <td class="price_booking" colspan="5">
                    <input type="hidden" name="id" value="<?php echo $tour[0]->id;?>"></input>
                    <input class="button small  booking"  type="submit" value="จองทัวร์นี้">
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
            <ul class="tags">
              <li style="font-size:30px; color:#FE5214;">ติดต่อเรา :</li>
              <li><b>โทร.</b> 082-8121146, 076-331280&nbsp;&nbsp;<b>แฟกซ์.</b> 076-331273&nbsp;&nbsp;<b>อีเมล์</b> info@uastravel.com</li>
            </ul>
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
                //print_r($tag);
                if(!empty($tag)){

                  foreach ($tag as $key => $value) {
                    if(!empty($value->url) &&  $value->id != 1){
              ?>
                    <li><a href="<?php echo base_url('/tour/'.$value->url);?>"><?php echo $value->name; ?></a></li>
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
            <div class="twelve columns">
              <h3>แผนที่</h3>
              <div class="map">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
                <script type="text/javascript">
                      <?php
                        if($tour[0]->latitude && $tour[0]->longitude){
                      ?>
                          var lat = <?php echo $tour[0]->latitude;?>;
                          var lon = <?php echo $tour[0]->longitude;?>;
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
                          title: '<?php echo $tour[0]->name;?>',
                          map: map,
                          draggable: false
                        });                        
                      }
                 
                      google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                <div id="map_canvas" style="width:100%;height:280px;"></div>
              </div>
            </div>
          </div>          
      </div>
      <!-- End Map -->
      <?php
        //print_r($related); 
      ?>
      <!-- Right bar -->
      <div class="four columns">
        <!-- Packet -->        
        <h3>แพ็กเก็จทัวร์แนะนำ</h3>

        <?php
        if(!empty($related )):
          foreach ($related as $key => $value):
        ?>
          <div class="list_packet">
            <div class="row">
              <div class="twelve columns">              
                <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                  <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
                </a>
              </div>
              <div class="twelve columns">
                <div class="title_tour">
                  <h4>
                    <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                      <?php echo $value["tour"]->tout_name; ?>
                    </a>
                  </h4>
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
                <div class="price">
                  <span>
                  <?php 
                      if(!empty($value["price"]->pri_sale_adult_price)){
                        
                        if($value["price"]->pri_discount_adult_price>0){

                          $priceAdultDiscount = number_format($value["price"]->pri_sale_adult_price - $value["price"]->pri_discount_adult_price, 0);
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
          endforeach;
        endif;
        ?>

        <!-- End Packet -->

    </div>
    <!-- End Right bar -->
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
          <div class="fb-comments" data-href="<?php echo base_url('tour/'.$tour[0]->url.'-'.$tour[0]->id);?>" data-num-posts="20" data-width=""></div>
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
            <p>80/86 หมู่บ้านศุภาลัยฮิล ซ.5 อ.เมือง จ.ภูเก็ต 83000</p>
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

<?php include_once("themes/Travel/tour/analyticstracking.php") ?>
</body>
</html>