<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title></title>
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


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

  <body style="background: #ededed url(<?php echo $imagepath.'/bg'.rand(2,5).'.jpg';?>) no-repeat top center;"><!-- ใส่รูปพื้นหลังตรงนี้ แทน bg1.jpg-->
    {_include user_tab}

  <div class="overly-bg"></div>
  <div id="wrapper">
    {_widget menu}


    <!-- Title -->
    <div class="row">
      <div class="twelve columns">
        <a href="" class="arrow previous tooltip_nw" title=""></a>
        <h1 class="title"><a href=""></a>
            <a href="#detail">
            <img src="<?php echo $imagepath.'/anchor.png';?>" width="23px" height="23px" align="absmiddle"/></a>
          <span class="subtitle"></span>
        </h1>
        <a href="" class="arrow next south" title=""></a>
      </div>
    </div>
    <!-- End Title -->

    <div class="row">
      <div class="twelve columns">
      <?php
        foreach ($home as $promoTourKey=>$promoTourValue){
      ?>
        <div class="promoted_list">
          <div class="list_packet">
            <div class="row">
              <div class="twelve columns">
                <a href="<?php echo base_url($this->lang->line("url_lang_tour")."/".$promoTourValue["tour"]->tout_url."-".$promoTourValue["tour"]->tou_id); ?>" target="_blank">
                  <img src="<?php echo $promoTourValue["tour"]->tou_banner_image; ?>">
                </a>
              </div>
              <div class="twelve columns">
                <div class="row">
                  <div class="twelve columns">
                    <div class="title_tour">
                      <h4>
                        <a href="<?php echo base_url($this->lang->line("url_lang_tour")."/".$promoTourValue["tour"]->tout_url."-".$promoTourValue["tour"]->tou_id); ?>" target="_blank">
                          <?php echo $promoTourValue["tour"]->tout_name; ?>
                        </a>
                      </h4>
                    </div>
                  </div>
                  
                </div>
                <div class="border"></div>
              </div>
              <div class="twelve columns">
                <div class="five columns clear_padding">
                    <div class="rating one_star" style="display:none"></div>
                    <div class="rating two_star" style="display:none"></div>
                    <div class="rating three_star"></div>
                    <div class="rating four_star" style="display:none"></div>
                    <div class="rating five_star"style="display:none"></div>
                    <div class="clearfix"></div>
                </div>
              <!--
                <div class="icon view tooltip_se" title="จำนวนคนดู">1358</div>
                <div class="icon comment tooltip_se" title="จำนวนคอมเม้น">25</div>
              -->
                <div class="seven columns clear_padding">
                <div class="price">
                  <span>

                  <?php
                      if(!empty($promoTourValue["price"]->pri_sale_adult_price)){

                        if($promoTourValue["price"]->pri_discount_adult_price>0){

                          $priceAdultDiscount = number_format($promoTourValue["price"]->pri_discount_adult_price, 0);
                          $priceAdult = number_format($promoTourValue["price"]->pri_sale_adult_price, 0);

                          echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                          echo " ".$this->lang->line("global_lang_baht");

                        }else{
                          echo number_format($promoTourValue["price"]->pri_sale_adult_price, 0);
                          echo " ".$this->lang->line("global_lang_baht");
                        }

                        //text-decoration: line-through; color: #โค้ดสีเส้น;

                      }else{
                        echo "Call";
                        echo " ".$this->lang->line("global_lang_baht");
                      }
                    ?>
                  </span>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
      </div>
    </div>

    <!-- Tour Information -->
    <div class="row">
      <div class="twelve columns ">
        <div class="white_box">
          <div class="left_columns">
              <ul class="side_bar">
                <li><a class="active" href="<?php echo base_url();?>"><?php echo $this->lang->line("global_lang_home");?></a></li>
                <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a>
                    <ul class="sub-menu">
                      <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>/<?php echo Util::getTag(57);?>" ><?php echo $this->lang->line("global_lang_travel_in"); ?><?php echo Util::getTag(57);?></a></li>
                      <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>/<?php echo Util::getTag(56);?>" ><?php echo $this->lang->line("global_lang_travel_in"); ?><?php echo Util::getTag(56);?></a></li>
                      <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>/<?php echo Util::getTag(58);?>" ><?php echo $this->lang->line("global_lang_travel_in"); ?><?php echo Util::getTag(58);?></a></li>
                    </ul>
                </li>
                <?php
                    if(!empty($main_menu)){
                      foreach ($main_menu as $main_menuKey => $main_menuValue) {
                        echo "<li>";
                        $span = "";
                        $mainURL = base_url($this->lang->line("url_lang_tour").'/'.$main_menuValue["url"]);
                        echo "<a href=\"$mainURL\">$main_menuValue[name]</a>";
                        if(!empty($main_menuValue["child"])){
                          echo "<ul class=\"sub-menu\">";
                          foreach ($main_menuValue["child"] as $childKey => $childValue) {
                            echo "<li>";
                            $childURL = base_url($this->lang->line("url_lang_tour").'/'.$childValue["url"]);
                            echo "<a href=\"$childURL\">$childValue[name]</a>";
                            echo "</li>";
                          }
                          echo "</ul>";
                        }
                        echo "</li>";
                      }
                    }
                  ?>
                <li><a href="<?php echo base_url($this->lang->line("url_lang_hotel"));?>"><?php echo $this->lang->line("global_lang_hotel"); ?></a></li>
                <li><a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.Util::url_title($this->lang->line("global_lang_contact_us")).'-119');?>"><?php echo $this->lang->line("global_lang_contact_us");?></a></li>
              </ul>
          </div>
          <div class="right_columns">
            <h2><?php echo $article["title"];?></h2>
              <?php echo $article["body"];?>
          </div>
        </div>
      </div>
    </div>
    <!-- End Tour Information -->

    <script type="text/javascript">
      var loading = false;
      $(".side_bar a.ajax-click").click(function(){
        if(!loading){
          $(".right_columns").hide().html("<img style=\"width:48px; height:48px; margin:auto; margin-top: 50%; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
          link = $(this).attr("href")+"?ajax=true";
          $(".side_bar a").removeClass("active");
          $(this).addClass("active");
          jqxhr = $.get(link);
          loading = true;
          jqxhr.success(function(data) {
                          loading = false;
                          $(".right_columns").hide().html(data).fadeIn(300);
                        });
        }else{
          $(".right_columns").hide().html("<p style=\"width:100px; height:18px; margin:auto; margin-top: 50%; display: block;\">We're loading...</p><br /><img style=\"width:48px; height:48px; margin:auto; display: block;\" src=\"<?php echo Util::ThemePath();?>/images/loader.gif\" border=\"0\">").fadeIn(300);
        }
        return false;
      });
    </script>

    <!-- Tour Information -->
    <div class="row">
      <div class="twelve columns">
        <div class="box_white_in_columns">
          <div class="button_like">
            <h3>Uastravel.com Fanpage</h3>
            <div class="fb-like" data-href="https://www.facebook.com/UasTravelThailand" data-send="false" data-layout="button_count" data-width="200" data-show-faces="true" data-font="verdana"></div>
          </div>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $this->config->item('appId'); ?>";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
          </script>
          <div class="facebookOuter">
           <div class="facebookInner">
            <div 
              class="fb-like-box" 
              data-width="960" 
              data-height="335" 
              data-href="https://www.facebook.com/UasTravelThailand" 
              data-border-color="#fff" 
              data-show-faces="true" 
              data-stream="false" 
              data-header="false"
            >
            </div>          
           </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Tour Information -->

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
  <script src="<?php echo $jspath.'/jquery.placeholder.js';?>"></script>
  <script src="<?php echo $jspath.'/jquery.foundation.orbit.js';?>"></script>
  <script src="<?php echo $themepath.'/bootstrap/js/bootstrap.js';?>"></script>
  <script src="<?php echo $jspath.'/foundation.min.js';?>"></script>
  <script src="<?php echo $jspath.'/jquery.foundation.navigation.js';?>"></script>
  <script src="<?php echo $jspath.'/modernizr.foundation.js';?>"></script>
  <script src="<?php echo $jspath.'/app.js';?>"></script>
{_include tracker}
</body>
</html>