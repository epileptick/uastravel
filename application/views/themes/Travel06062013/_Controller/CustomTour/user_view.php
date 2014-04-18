<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->lang->lang();?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->lang->lang();?>"> <!--<![endif]-->
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <?php
    if(!empty($packageTour[0][0]["short_description"])){
  ?>
    <meta name="description" content="" />
  <?php
    }else{
  ?>
    <meta name="description" content="<?php echo $this->lang->line("global_lang_home_desc");?>" />
  <?php
    }
  ?>
  
  <meta name="keywords" content="" />
  <meta name="geo.placename" content="<?php echo $currentProvince;?>" />
  <meta name="geo.position" content="<?php echo $packageTour[0][0]["latitude"];?>;<?php echo $packageTour[0][0]["longitude"];?>" />
  <meta name="ICBM" content="<?php echo $packageTour[0][0]["latitude"];?>,<?php echo $packageTour[0][0]["longitude"];?>" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo $themepath.'/bootstrap/css/bootstrap.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/foundation.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/userstyle.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/app.css';?>">
  <link rel="stylesheet" href="<?php echo $stylepath.'/customtour.css';?>">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

  <script src="<?php echo $jspath;?>/jquery.validate.js"></script>
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
    $("#form").validate({
      rules: {
        price_id: 'required',
      }
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

<?php
if(!empty($pickedTour[0]["background_image"])){
?>
  <body style="background: #ededed url(<?php echo $pickedTour[0]["background_image"];?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
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
            <!-- Tour Information -->
            <div class="row">
              <div class="twelve columns">
                <div class="article_tour">

                  <!-- Title -->
                  <div class="row">
                    <div class="twelve columns">
                      <h2 class="head_title" id="detail"><?php echo $packageData["package_name"];?></h2>
                    </div>
                    <div class="twelve columns">
                      <!-- Gallery -->
                      <div class="row" id="gallery_row">
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
                    </div>
                    <div class="twelve columns">
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
                    <?php
                      foreach ($packageTour as $day => $dayValue):
                    ?>
                      <!-- BEGIN Row Package-->
                        <div class="twelve columns">
                          <h3>
                            <span>วันที่ <?php echo ++$day;?> <?php
                                  if(count($dayValue)>1){
                                    echo $dayValue[0]["name"]." และ ".$dayValue[1]["name"];
                                  }else{
                                    echo $dayValue[0]["name"];
                                  }
                                ?>
                            </span>
                          </h3>
                          <div class="row">
                            <div class="twelve columns">
                              <span class="description_tour">
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
                              </span>
                              <div>
                                <?php
                                  foreach ($dayValue as $count => $item):
                                ?>
                                <div class="article_packagetour">
                                  <h4 style="text-align: center;float: left; margin-bottom:10px; width:100%"><?php echo $item["name"];?></h4>
                                  <p>
                                    <?php echo $item["detail"];?>
                                  </p>
                                </div>
                              <?php
                                endforeach;
                              ?>
                              </div>
                          </div>
                        </div>
                      </div>
                      <!-- END Row Package -->
                      <?php
                        endforeach;
                      ?>
                    
                  </div>
                  <!-- End Title -->

              <form name="form" action="<?php echo base_url($this->lang->line("url_lang_tour").'/inquiry');?>" method="post">
                <?php
                  if(!empty($packageTour)){
                ?>
                <div class="row">
                  <h3><?php echo $this->lang->line("tour_lang_tour_price"); ?></h3>
                  <?php
                    foreach ($packageTour as $day => $dayValue):
                  ?>
                  <table class="twelve booking_price">

                    <?php
                    $countPrice =0;
                    foreach ($dayValue as $tourPriceKey => $tourPriceValue) {
                      ?>
                      <thead>
                        <tr>
                          <th class="five"><?php echo $this->lang->line("tour_lang_tour_list"); echo $tourPriceValue["name"];?> </th>
                          <th class="two"><?php echo $this->lang->line("tour_lang_tour_adult_price"); ?></th>
                          <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                          <th class="two"><?php echo $this->lang->line("tour_lang_tour_child_price"); ?></th>
                          <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                        </tr>
                      </thead>
                    <tbody>
                      <?php
                      $countPrice = count($tourPriceValue["price"]);
                      foreach ($tourPriceValue["price"] as $key => $value) {
                      ?>                    
                      <tr>
                        <td>
                          <?php
                            if($value["show_firstpage"] == 1){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]" class="checked_price"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])? $value["name"] : "");?>
                              </label>
                          <?php
                            }else if($countPrice == 0){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]" class="checked_price"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])?$value["name"] : "");?>
                              </label>
                          <?php

                            }else{
                          ?>
                            <label for="checkbox_<?php echo $value["price_id"];?>">
                              <input name="price_id[]" class="checked_price"
                                      type="checkbox"
                                      id="checkbox_<?php echo $value["price_id"];?>"
                                      value="<?php echo $value["price_id"];?>"
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            } //End
                          ?>
                        </td>
                        <td>
                            <?php
                                if($value["discount_adult_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_adult_price"], 0);?></strike>
                                <?php echo number_format($value["discount_adult_price"], 0);?></label></center>
                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_adult_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>
                        <td>
                          <?php
                            if($value["show_firstpage"] == 1){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]" class="adult_amount_booking"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="1">
                          <?php
                            }else if($countPrice == 0){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]" class="adult_amount_booking"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="1">
                          <?php
                            }else{
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]" class="adult_amount_booking"
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="twelve text-center"
                                      value="0">
                          <?php
                              }
                           ?>
                        </td>
                        <td>
                            <?php
                                if($value["discount_child_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_child_price"], 0);?></strike>
                                <?php echo number_format($value["discount_child_price"], 0);?></label></center>
                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_child_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>

                        <td >
                          <input name="child_amount_booking[<?php echo $value["price_id"];?>]" class="child_amount_booking"
                                  type="text"
                                  id="amount_child_<?php echo $value["price_id"];?>"
                                  class="twelve text-center"
                                  value="0"
                          >
                        </td>
                      </tr>
                    <?php
                      $countPrice++;
                      }
                    }
                    endforeach;
                    ?>
                      <tr>
                        <td class="price_booking" colspan="5">
                          <input type="hidden" name="id" value="<?php echo $packageData["id"];?>">
                          <input type="hidden" name="type" value="customtour">
                          <input class="btn btn-primary float-right"  type="submit" value="<?php echo $this->lang->line("tour_lang_tour_booking");?>">
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
                        if(!empty($tags)){

                          foreach ($tags as $key => $value) {
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
            </div>

            <div class="twelve columns">
              <div class="facebook_comment">
                <h3><?php echo $this->lang->line("global_lang_comment");?></h3>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/<?php echo strtolower($this->lang->lang()); ?>_<?php echo strtoupper($this->lang->lang()); ?>/all.js#xfbml=1&appId=357467797616103";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-comments" data-href="<?php echo base_url('customtour/'.$packageTour[0][0]["url"].'-'.$packageTour[0][0]["tour_id"]);?>" data-num-posts="20" data-width=""></div>
              </div>
            </div>
          </div>
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
  <script type="text/javascript" src="<?php echo $jspath.'/home.js';?>"></script>
  <!--
  <script type="text/javascript">
  $(function(){
    function updatePriceList(){
      $("form").find(".adult_amount_booking").each(function(index, input_item){
        $(input_item).parent().parent().find(".checked_price").each(function(index, check_item){
          if($(this).prop('checked')){
            $(this).parent().parent().parent("tr").css("background","#FFF7A0");
          }else{
            $(this).parent().parent().parent("tr").css("background","none");
          }
        });
      });
    }

    $(".adult_amount_booking").on("keyup",function(){
      var value = $(this).val();
      $("form").find(".adult_amount_booking").each(function(index, input_item){
        $(input_item).parent().parent().find(".checked_price").each(function(index, check_item){
          if($(check_item).prop("checked")){
            $(input_item).val(value);
          }else{
            $(input_item).val(0);
          }
        });
      });
    });
    
    $(".child_amount_booking").on("keyup",function(){
      var value = $(this).val();
      $("form").find(".child_amount_booking").each(function(index, input_item){
        $(input_item).parent().parent().find(".checked_price").each(function(index, check_item){
          if($(check_item).prop("checked")){
            $(input_item).val(value);
          }else{
            $(input_item).val(0);
          }
        });
      });
    });

    $(".checked_price").on("change",function(){
      updatePriceList();
    });
    updatePriceList();
  });
  </script>
  -->
{_include tracker}
</body>
</html>