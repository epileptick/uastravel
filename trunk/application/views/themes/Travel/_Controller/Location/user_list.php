<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

<?php
  //Check class
  if($this->uri->segment(1) == $this->lang->line("url_lang_location")){
    $index = 1;
    //echo $index;
  }else if($this->uri->segment(2) == $this->lang->line("url_lang_location")){
    $index = 2;
    //echo $index;
  }

  //Title
  $title = $this->lang->line("global_lang_location")." ".str_replace("-", " ",$this->uri->segment(1+$index));
  $keyword = $title.", ".$this->lang->line("global_lang_location").str_replace("-", " ",$this->uri->segment(1+$index)).", ทัวร์".str_replace("-", " ",$this->uri->segment(1+$index)).", เที่ยวไทย".str_replace("-", " ",$this->uri->segment(1+$index)).", ท่องเที่ยว".str_replace("-", " ",$this->uri->segment(1+$index)).", ที่ท่องเที่ยว".str_replace("-", " ",$this->uri->segment(1+$index)).", ท่องเที่ยวไทย".str_replace("-", " ",$this->uri->segment(1+$index)).", เที่ยวทั่วไทย".str_replace("-", " ",$this->uri->segment(1+$index));
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

  <!-- Search selection -->
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
                <li><a class="active" href="<?php echo base_url($this->lang->line("url_lang_location"));?>"><?php echo $this->lang->line("global_lang_location"); ?></a></li>
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
              <div class="row-fluid">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div id="options">
                          <ul class="option-set nav" >
                            <span class="brand">Filter :</span>
                            <?php
                            if(!empty($menu))
                            if($menu[0]->select_all == 1){
                            ?>
                              <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>" class="selected"><?php echo $this->lang->line("global_lang_all");?></a></li>
                            <?php
                            }else{
                            ?>
                              <li><a href="<?php echo base_url($this->lang->line("url_lang_location"));?>"><?php echo $this->lang->line("global_lang_all");?></a></li>
                            <?php
                            }
                            ?>

                            <?php
                              if(!empty($menu))
                              foreach ($menu as $key => $value) {
                            ?>
                              <li>
                                <a href="<?php echo base_url($this->lang->line("url_lang_location")."/".$value->url);?>"
                                  <?php
                                    if($value->select == 1){
                                      echo "class='selected'";
                                    }else{
                                      echo "";
                                    }
                                  ?>
                                >
                                  <?php echo $value->name; ?>
                                </a>
                              </li>
                            <?php
                              }
                            ?>
                          </ul>
                        </div>
                        <form name="input" action="<?php echo base_url($this->lang->line("url_lang_location").'/search'); ?>" method="post" class="navbar-form pull-right form_search" id="search-form">
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



        <?php
        if(!empty($location)){

          //print_r($location); exit;
        ?>


              <div class="row-fluid">
                <div class="span12">
                  <div id="attractions" style="display:none;" class="clickable variable-sizes">


                      <?php
                          foreach ($location as $key => $value) {
                        ?>
                          <div class="list_attractions" data-category="transition">
                            <!-- div class="sticker new">New</div -->
                            <a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value['location']["url"].'-'.$value['location']["loc_id"]);?>" target="_blank" >
                              <?php
                                if($value['location']["first_image"]){
                              ?>
                                  <img src="<?php echo $value['location']["first_image"];?>">
                              <?php
                                }
                              ?>
                              <div><span></span></div>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value['location']["url"].'-'.$value['location']["loc_id"]);?>" target="_blank" >
                                  <?php echo $value['location']["title"]; ?>
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
                                <div class="icon location" rel="tooltip" title="แหล่งท่องเทียว"></div>
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>
                              <div class="span5">
                                <span class="tag">
                                  <?php
                                    //print_r($value["tag"]); exit;
                                    foreach ($value["tag"] as $keyTag => $valueTag) {
                                  ?>
                                  <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$valueTag["url"]);?>" style="color: #0CACE1;">
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
                        <a href="<?php echo base_url(uri_string().'/2');?>"></a>
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

    <?php include_once("themes/Travel/tour/analyticstracking.php") ?>
  </body>
</html>
