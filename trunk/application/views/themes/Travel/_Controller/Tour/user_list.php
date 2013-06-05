<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

<?php

  //Check class
  if($this->uri->segment(1) == $this->lang->line("url_lang_tour")){
    $index = 1;
    //echo $index;
  }else if($this->uri->segment(2) == $this->lang->line("url_lang_tour")){
    $index = 2;
    //echo $index;
  }

  $maintag = str_replace("-", " ",$this->uri->segment(1+$index));

  //Title
  $secondSegment = $this->uri->segment(2+$index);
  if(!empty($secondSegment)){
    $title1 = str_replace("-", " ",$this->uri->segment(1+$index))." - ".str_replace("-", " ",$secondSegment);
  }else{
    $title1 = str_replace("-", " ",$this->uri->segment(1+$index));
  }
  $title2 = "";
  if($this->uri->segment(3+$index)){
    $title2 = str_replace("-", " ",$this->uri->segment(3+$index)).str_replace("-", " ",$this->uri->segment(2+$index));
  }

  $title = trim($title1." ".$title2);
 //$myString = "เกาะไข่";
  //$myString = "เกาะไข่ ทัวร์ 2 วัน 3 คืน";
  if (strpos($title, $this->lang->line("global_lang_tour")) !== FALSE) {
    if(strpos($title, $this->lang->line("global_lang_tour"), 1) > 0  && strpos($title, $this->lang->line("global_lang_tour")) == 0 ){
      $title = $title;
    }else if(strpos($title, $this->lang->line("global_lang_tour"), 1) > 0 ){
      $title = $this->lang->line("global_lang_tour_title").$title;
    }
  }else{
    $title = $this->lang->line("global_lang_tour_title").$title;
  }


  $tour_keyword = $this->lang->line("global_lang_tour_title").$this->uri->segment(2+$index).", ".$this->lang->line("global_lang_tour_title").$this->uri->segment(2+$index);
  $keyword = $title1.", ".$tour_keyword;
?>

  <title><?php echo trim($title); ?> - U As Travel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo $title; ?>ยอดนิยมในประเทศไทย รวมบทความและรูปภาพของ<?php echo $title; ?> และแพคเกจ<?php echo $title; ?>ราคาพิเศษ" />
  <meta name="keywords" content="<?php echo $keyword; ?>" />
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="<?php echo base_url('themes/Travel/tour/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/Travel/tour/bootstrap/css/bootstrap-responsive.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('themes/Travel/tour/stylesheets/main.css');?>" rel="stylesheet">
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $("#selectsearch").change(function() {
        var action = $(this).val() == "<?php echo $this->lang->line("url_lang_location"); ?>" ? "<?php echo $this->lang->line("url_lang_location"); ?>" : "<?php echo $this->lang->line("url_lang_tour"); ?>";
        var url = "<?php echo base_url(); ?>"+action+"/search/";
        $("#search-form").attr("action", url);
      });
    });
  </script>

  <link rel="canonical" href="<?php echo $caconical;?>">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="sidebar" style="display:none;">
            <header class="header">
              <a class="logo"> <img src="<?php echo base_url('themes/Travel/tour/images/logo_home.png');?>"></a>
              <div class="address">
                <p class="copyright"><?php echo $this->lang->line("global_lang_license_number");?> 34/00974</p>
                <p>
                  <a href="<?php echo $this->lang->switch_uri("en");?>">
                    <img src="<?php echo base_url('themes/Travel/images/flags/us.png');?>" border="0" />
                  </a>
                  <a href="<?php echo $this->lang->switch_uri("th");?>">
                  <img src="<?php echo base_url('themes/Travel/images/flags/th.png');?>" border="0" />
                  </a>
                </p>
                <!--<p class="copyright">Copyright © Uastravel.com</p>-->
              </div>
            </header>
            <div class="line"></div>
            <nav>
              <ul class="accordion">
                <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line("global_lang_home");?></a></li>
                <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a></li>
                <?php
                  if(!empty($main_menu)){
                    foreach ($main_menu as $main_menuKey => $main_menuValue) {
                      echo "<li>";
                      $span = "";
                      if(!empty($main_menuValue["child"])){
                        $span = "<span class=\"arrow_menu\"></span>";
                        echo "<a>$main_menuValue[name] $span</a>";
                      }else{
                        $mainURL = base_url($this->lang->line("url_lang_tour").'/'.$main_menuValue["url"]);
                        echo "<a href=\"$mainURL\">$main_menuValue[name]</a>";
                      }
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
              </ul><!-- End accordion -->
            </nav>
            <div class="social">
              <a href="" class="twitter icon">twitter</a>
              <a href="https://www.facebook.com/UasTravelThailand" target="_blank" class="facebook icon">facebook</a>
              <a href="" class="youtube icon">youtube</a>
              <a href="" class="google_plus icon">google_plus</a>
            </div>
            <div class="clearfix"></div>
            <div class="fan_page">
              <div class="inner">
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=357467797616103";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-like-box" data-href="https://www.facebook.com/UasTravelThailand" data-width="200" data-height="280" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-border-color="transparent" data-header="false"></div>
              </div>
            </div>
            <div class="button_like">
              <div class="fb-like" data-href="https://www.facebook.com/UasTravelThailand" data-send="false" data-layout="button_count" data-width="200" data-show-faces="true" data-font="verdana"></div>
            </div>
          <div class="footer_menu"></div>
          <div class="shadow"></div>
          </div><!--/sidebar-->
          <div class="main">
            <div class="content">
              {_include user_tab}
              {_block modal_login}
              <!-- Start first menu -->
              <div class="row-fluid">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div id="options">
                          <ul class="option-set nav" >
                          <span class="brand"><?php echo $this->lang->line("global_lang_province");?> :</span>
                            <?php
                            if($menu_selectall == true){
                            ?>
                              <li>
                                <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$this->uri->segment(2));?>"
                                  class="selected"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                  <?php echo $this->lang->line("global_lang_all");?>
                                </a>
                              </li>
                            <?php
                            }else{
                            ?>
                              <li>
                                <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$this->uri->segment(2));?>"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                  <?php echo $this->lang->line("global_lang_all");?>
                                </a>
                              </li>
                            <?php
                            }
                            ?>


                            <?php
                               //Main menu
                              $uri1 = "";
                              if($this->uri->segment(2)){
                                $uri1 = $this->uri->segment(2)."/";
                              }


                              $uri2 = "";
                              if($this->uri->segment(3)){
                                $uri2 = $this->uri->segment(3)."/";
                              }


                              //Check menu link
                              $isMenu = false;
                              foreach ($menu as $key => $value) {
                                if($value->url == $this->uri->segment(3)){
                                  $isMenu = true;
                                }
                              }

                              foreach ($menu as $key => $value) {
                                if($isMenu){
                                  $link = base_url($this->lang->line("url_lang_tour").'/'.$uri1.$value->url);
                                }else{
                                  $link = base_url($this->lang->line("url_lang_tour").'/'.$uri1.$value->url."/".$uri2);
                                }
                            ?>
                              <li>
                                <a href="<?php echo $link?>"
                                  <?php
                                    if($value->select == 1){
                                      echo "class='selected'";
                                    }else{
                                      echo "";
                                    }
                                  ?>
                                  title="<?php echo $value->name." ". str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                  <?php echo $value->name; ?>
                                </a>
                              </li>
                            <?php
                              }
                            ?>
                          </ul>
                        </div>


                      <!-- Search selection -->

                        <form name="input" action="<?php echo base_url($this->lang->line("url_lang_tour").'/search'); ?>" method="post" class="navbar-form pull-right form_search" id="search-form">
                          <select name="select" id="selectsearch">
                            <option value="<?php echo $this->lang->line("url_lang_tour"); ?>"><?php echo $this->lang->line("tour_lang_packages_tour"); ?></option>
                            <option value="<?php echo $this->lang->line("url_lang_location"); ?>"><?php echo $this->lang->line("global_lang_location"); ?></option>
                          </select>
                          <div class="input_search">
                            <input type="text" name="search" class="text_search"
                                   value="<?php echo (!empty($search))?$search:"";?>"
                            >
                            <input type="submit" value="ค้นหา" class="button_search">
                          </div>
                        </form>
                    </div>
                  </div>
              </div>
              <!-- End first menu -->

              <!-- Start sub menu -->
              <?php
              if(!empty($submenu)){

                //Check submenu link
                $isSubMenu = false;
                foreach ($submenu as $key => $value) {
                  if($value->url == $this->uri->segment(3)){
                    $isSubMenu = true;
                  }
                }
              ?>
              <div class="row-fluid">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div id="options">
                          <ul class="option-set nav" >
                            <span class="brand"><?php echo $this->lang->line("global_lang_category");?> :</span>
                            <?php

                            if($isMenu){
                              $link = base_url($this->lang->line("url_lang_tour").'/'.$uri1.$uri2);
                            }else{
                              $link = base_url($this->lang->line("url_lang_tour").'/'.$uri1);
                            }

                            if($submenu_selectall == true){
                            ?>
                              <li>
                                <a href="<?php echo $link;?>" class="selected"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                <?php echo $this->lang->line("global_lang_all");?>
                                </a>
                              </li>
                            <?php
                            }else{
                            ?>
                              <li>
                                <a href="<?php echo $link;?>"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                <?php echo $this->lang->line("global_lang_all");?>
                                </a>
                              </li>
                            <?php
                            }

                            foreach ($submenu as $key => $value) {
                              if($isSubMenu){
                                  $link = base_url($this->lang->line("url_lang_tour").'/'.$uri1.$value->url);
                              }else{
                                $link = base_url($this->lang->line("url_lang_tour").'/'.$uri1.$uri2.$value->url);
                              }
                            ?>
                              <li>
                                <a href="<?php echo $link?>"
                                  <?php
                                    if($value->select == 1){
                                      echo "class='selected'";
                                    }else{
                                      echo "";
                                    }
                                  ?>
                                  title="<?php echo str_replace("-", " ", $this->uri->segment(2))." ".$value->name;?>"
                                >
                                  <?php echo $value->name; ?>
                                </a>
                              </li>
                            <?php
                              }
                            ?>
                          </ul>
                        </div>
                    </div>

                  </div>
              </div>
              <?php
                }
              ?>
              <!-- End sub menu -->

            <?php
            if(!empty($tour)){
            ?>
              <div class="row-fluid">
                <div class="span12">
                  <div id="attractions" style="display:none;" class="clickable variable-sizes">
                      <?php
                        //print_r($tour); exit;
                        //echo $this->pagination->create_links();
                        //echo "<br><br><br><br>";
                          foreach ($tour as $key => $value) {
                        ?>
                          <div class="list_attractions" data-category="transition">
                            <?php
                                if(!empty($value["price"]->pri_sale_adult_price)){
                            ?>
                              <div class="sticker_status">
                                <div class="sticker price">
                                  <?php
                                    echo number_format($value["price"]->pri_sale_adult_price, 0);
                                  ?>
                                  <?php echo $this->lang->line("global_lang_baht");?>
                                </div>
                              </div>
                            <?php
                                }
                            ?>
                            <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value['tour']->tout_url.'-'.$value['tour']->tou_id);?>"
                              target="_blank"
                              title="<?php echo $value['tour']->tout_name;?>"
                            >
                              <?php
                                if($value['tour']->tou_first_image){
                              ?>
                                  <img src="<?php echo $value['tour']->tou_first_image;?>">
                              <?php
                                }
                              ?>

                              <?php
                                //print_r($value["price"]); exit;
                                if(!empty($value["price"]->pri_discount_adult_price )){

                                  if($value["price"]->pri_discount_adult_price > 0){
                              ?>

                                    <div class="promotion style2">
                                      <!--<img src="<?php echo base_url('themes/Travel/tour/images/best_price_en.png');?>">-->
                                      <img src="<?php echo base_url('themes/Travel/tour/images/best_price_th2.png');?>">
                                      <p><?php echo $this->lang->line("global_lang_from");?>
                                        <span>
                                          <?php
                                            echo number_format($value["price"]->pri_sale_adult_price);
                                          ?></span>  <?php echo $this->lang->line("global_lang_discount_to");?>
                                        <span class="reduce_price">
                                          <?php
                                            echo number_format($value["price"]->pri_discount_adult_price, 0);
                                          ?>
                                        </span> <?php echo $this->lang->line("global_lang_baht");?>
                                        </p>
                                    </div>

                              <?php
                                  }
                                }
                              ?>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value['tour']->tout_url.'-'.$value['tour']->tou_id);?>"
                                    target="_blank"
                                    title="<?php echo $value['tour']->tout_name;?>"
                                  >
                                  <?php echo $value['tour']->tout_name; ?>
                                  </a>
                                </h3>
                              </div>
                              <div class="span4">
                                <div class="rating one_star" style="display:none"></div>
                                <div class="rating two_star" style="display:none"></div>
                                <div class="rating three_star"></div>
                                <div class="rating four_star" style="display:none"></div>
                                <div class="rating five_star"style="display:none"></div>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="border"></div>
                            <div class="row-fluid">
                              <div class="span7">
                                <!-- img src="http://icons.iconarchive.com/icons/dapino/summer-holiday/24/palm-tree-icon.png" -->
                                <div class="icon tour" rel="tooltip" title="<?php echo $this->lang->line("global_lang_tour_packages"); ?>"></div>
                                <div class="icon view" rel="tooltip" title="<?php echo $this->lang->line("global_lang_views"); ?>">1358</div>
                                <div class="icon comment" rel="tooltip" title="<?php echo $this->lang->line("global_lang_comments"); ?>">25</div>
                              </div>
                              <div class="span5">
                                <span class="tag">
                                  <?php
                                    //print_r($value["tag"]); exit;
                                    if(!empty($value["tag"]))
                                    foreach ($value["tag"] as $keyTag => $valueTag) {
                                  ?>
                                  <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$uri1.$valueTag["url"]);?>"
                                      style="color: #0CACE1;"
                                      title="<?php echo $valueTag["name"]." ".str_replace("-", " ", $this->uri->segment(2))." ".str_replace("-", " ", $this->uri->segment(3));?>"
                                  >
                                    <?php echo $valueTag["name"]; ?>
                                  </a>
                                  <?php
                                    }
                                  ?>
                                </span>
                                <span class="icon  tag_icon"></span>
                              </div>
                            </div>
                          </div>

                      <?php
                          }//End loop tour
                      ?>



                      <nav id="page_nav">
                        <?php
                          if(empty($search)){
                        ?>
                            <a href="<?php echo base_url(uri_string().'/2');?>"></a>

                        <?php
                          }
                        ?>
                      </nav>

                  </div> <!-- #attractions -->
                </div><!--/span12-->
              </div>
            <?php
            }else{
            ?>
              <br><br><br><br><br>
              <center>
              <font size="28">
                ไม่พบข้อมูลที่ท่านต้องการ
              </font>
              <center>

            <?php
            }
            //End check tour
            ?>

            </div>
          </div><!--/content-->
        </div>
      </div><!--/row-->
    </div><!--/.fluid-container-->




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-transition.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-alert.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-modal.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-dropdown.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-scrollspy.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-tab.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-tooltip.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-popover.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-button.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-collapse.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-carousel.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/bootstrap/js/bootstrap-typeahead.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/function.js');?>"></script>

    <!-- To top scrollbar  -->
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/easing.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js');?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css');?>" />

    <!-- Isotope -->
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/isotope/jquery.isotope.min.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/isotope/js/jquery.infinitescroll.min.js');?>"></script>

    <!-- Full Screen -->
    <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/Full-screen/jquery.fullscreen-min.js');?>"></script>
    {_include tracker}
  </body>
</html>
