<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

  
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $("#selectsearch").change(function() {
      var action = $(this).val() == "location" ? "location" : "tour";
      var url = action+"/search/";
      $("#search-form").attr("action", url);
    });
  });
</script>

<?php
  if($this->uri->segment(1)){
?>
  <title>ท่องเที่ยวไปในสถานที่ท่องเที่ยวจังหวัด<?php echo $this->uri->segment(1);?> ด้วยแพคเกจทัวร์<?php echo $this->uri->segment(1);?>ราคาพิเศษ - U As Travel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="สถานที่ท่องเที่ยวในจังหวัด<?php echo $this->uri->segment(1);?> และทัวร์ยอดนิยมในประเทศไทย รวมบทความและรูปภาพของสถานที่ท่องเที่ยวในจังหวัด<?php echo $this->uri->segment(1);?>  และแพคเกจทัวร์ราคาพิเศษ" />
  <meta name="keywords" content="" />
<?php   
  }else{
?>
  <title>ท่องเที่ยวไปในสถานที่ท่องเที่ยว ด้วยแพคเกจทัวร์ราคาพิเศษ - U As Travel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="สถานที่ท่องเที่ยว และทัวร์ยอดนิยมในประเทศไทย รวมบทความและรูปภาพของสถานที่ท่องเที่ยว  และแพคเกจทัวร์ราคาพิเศษ" />
  <meta name="keywords" content="" />
<?php
  }
  ?>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('themes/Travel/tour/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('themes/Travel/tour/bootstrap/css/bootstrap-responsive.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('themes/Travel/tour/stylesheets/main.css');?>" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="sidebar" style="display:none;">
            <header class="header">
              <a class="logo"> <img src="<?php echo base_url('themes/Travel/tour/images/logo_home.png');?>"></a>
              <div class="address">
                <p class="copyright">ใบอนุญาตเลขที่ 34/000837</p>
                <!--<p>085-7148830</p>
                <p class="copyright">Copyright © Uastravel.com</p>-->
              </div>
            </header>
            <div class="line"></div>
            <nav>
              <ul class="accordion">
                <li><a class="active" href="<?php echo base_url();?>">หน้าแรก</a></li>
                <li><a href="<?php echo base_url('location');?>">สถานที่ท่องเที่ยว</a></li>
                <li>
                  <a>แพ๊คเกจทัวร์ <span class="arrow_menu"></span></a>
                  <ul class="sub-menu">
                    <li><a href="<?php echo base_url('tour/ทัวร์ครึ่งวัน');?>">ทัวร์ครึ่งวัน</a></li>
                    <li><a href="<?php echo base_url('tour/ทัวร์-1-วัน');?>">ทัวร์ 1 วัน</a></li>
                    <li><a href="<?php echo base_url('tour/ทัวร์-2-วัน-1-คืน');?>">ทัวร์ 2 วัน 1 คืน</a></li>
                    <li><a href="<?php echo base_url('tour/ทัวร์-3-วัน-2-คืน');?>">ทัวร์ 3 วัน 2 คืน</a></li>
                  </ul>                
                </li>
                <li>
                  <a>แพ๊คเกจทัวร์อื่นๆ <span class="arrow_menu"></span></a>
                  <ul class="sub-menu">
                    <li><a href="<?php echo base_url('tour/โชว์กลางคืน');?>">โชว์กลางคืน</a></li>
                    <li><a href="<?php echo base_url('tour/สปาแพ็คเกจ');?>">สปาแพ็คเกจ</a></li>
                    <li><a href="<?php echo base_url('tour/กอล์ฟแพ็คเกจ');?>">กอล์ฟแพ็คเกจ</a></li>
                  </ul>                
                </li> 
                <li>
                  <a>การเดินทาง <span class="arrow_menu"></span></a>
                  <ul class="sub-menu">
                    <li><a href="<?php echo base_url('tour/เช่าเรือเหมาลำ');?>">เช่าเรือเหมาลำ</a></li>
                    <li><a href="<?php echo base_url('tour/จองตั๋วเรือโดยสาร');?>">จองตั๋วเรือโดยสาร</a></li>
                    <li><a href="<?php echo base_url('carrent/list');?>">จองรถเช่า</a></li>
                    <li><a href="<?php echo base_url('airline/list');?>">จองตั๋วเครื่องบิน</a></li>
                  </ul>                
                </li> 
                <li><a href="<?php echo base_url('hotel');?>">จองโรงแรม</a></li>
                <!-- li>
                  <a>ที่พัก <span class="arrow_menu"></span></a>
                  <ul class="sub-menu">
                    <li><a href="<?php echo base_url('hotel');?>">จองโรงแรม</a></li>
                    <li><a href="<?php echo base_url('tour/จองห้องเช่า');?>">จองห้องเช่า</a></li>
                  </ul>                
                </li -->
                <li><a href="<?php echo base_url('tour/โปรโมชั่น');?>">โปรโมชั่น</a></li>
                <li><a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>    
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
                              <li><a href="<?php echo base_url();?>" class="selected">ทั้งหมด</a></li>
                            <?php
                            }else{
                            ?>
                              <li><a href="<?php echo base_url();?>">ทั้งหมด</a></li>
                            <?php
                            }
                            ?>
                            
                            <?php
                              if(!empty($menu))
                              foreach ($menu as $key => $value) {
                            ?>
                              <li>
                                <a href="<?php echo base_url("location/".$value->url);?>" 
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
                        <form name="input" action="tour/search" method="post" class="navbar-form pull-right form_search" id="search-form"> 
                          <select name="select" id="selectsearch">
                            <option value="tour">แพคเกจทัวร์</option>
                            <option value="location">สถานที่ท่องเที่ยว</option>
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
        if(!empty($home)){        
        ?>

              <div class="row-fluid">
                <div class="span12">
                  <div id="attractions" style="display:none;" class="clickable variable-sizes">


                      <?php
                          //print_r($home); exit;
                          foreach ($home as $key => $value) {
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
                                  บาท
                                </div> 
                              </div>                                  
                            <?php                                    
                                }
                            ?>
                            <?php 
                              if(isset($value["tour"]->tout_url)){
                            ?>
                                <a href="<?php echo base_url('tour/'.$value["tour"]->tout_url.'-'.$value["tour"]->tou_id);?>" target="_blank" >
                            <?php
                              }else if(isset($value["location"]->loc_url)){
                            ?>
                                <a href="<?php echo base_url('location/'.$value["location"]->loc_url.'-'.$value["location"]->loc_id);?>" target="_blank" >
                            <?php
                              }
                            ?>  
                              <?php
                                if(!empty($value["tour"]->tou_first_image)){
                              ?>
                                  <img src="<?php echo $value["tour"]->tou_first_image;?>">
                              <?php
                                }else if(!empty($value["location"]->loc_first_image)){
                              ?>
                                  <img src="<?php echo $value["location"]->loc_first_image;?>">
                              <?php

                                }
                              ?>
                              <!-- 
                              <style>
                              .promotion{ display: none;}
                              </style>
                             
                              <div class="promotion style1">
                                <img src="<?php echo base_url('themes/Travel/tour/images/best_price_en.png');?>">
                                <img src="<?php echo base_url('themes/Travel/tour/images/best_price_th.png');?>">
                                <p>จาก <span>15,500</span>  ลดเหลือ <span class="reduce_price"> 5,500</span> บาท</p>

                              </div> -->
                              <?php
                                //print_r($value["price"]); exit;

                                if(!empty($value["price"]->pri_discount_adult_price )){
                                  if($value["price"]->pri_discount_adult_price > 0){
                              ?>

                                    <div class="promotion style2">
                                      <!--<img src="<?php echo base_url('themes/Travel/tour/images/best_price_en.png');?>">-->
                                      <img src="<?php echo base_url('themes/Travel/tour/images/best_price_th2.png');?>">
                                      <p>จาก 
                                        <span>
                                          <?php
                                            echo number_format($value["price"]->pri_sale_adult_price);
                                          ?>
                                        </span>  ลดเหลือ 
                                        <span class="reduce_price"> 
                                          <?php
                                            echo number_format($value["price"]->pri_discount_adult_price, 0);
                                          ?>
                                        </span> บาท
                                        </p>
                                    </div>

                              <?php
                                  }
                                }
                              ?>
                            </a>


                            <!-- Title/Name-->
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <?php 
                                    if(isset($value["tour"]->tout_url)){
                                  ?>
                                      <a href="<?php echo base_url('tour/'.$value["tour"]->tout_url.'-'.$value["tour"]->tou_id);?>" target="_blank" >
                                  <?php
                                    }else if(isset($value["location"]->loc_url)){
                                  ?>
                                      <a href="<?php echo base_url('location/'.$value["location"]->loc_url.'-'.$value["location"]->loc_id);?>" target="_blank" >
                                  <?php
                                    }
                                  ?>  
                                  <?php 
                                    if(isset($value["tour"]->tout_name)){
                                      echo $value["tour"]->tout_name;
                                    }else if(isset($value["location"]->loc_title)){
                                      echo $value["location"]->loc_title;
                                    }
                                  ?>  
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
                              <?php 
                                  if(isset($value["tour"]->tout_name)){
                                ?>
                                  <div class="icon tour" rel="tooltip" title="แพ็กเก็จทัวร์"></div>
                                  <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                  <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              <?php
                                  }else if(isset($value["location"]->loc_title)){
                                ?>
                                  <div class="icon location" rel="tooltip" title="แหล่งท่องเทียว"></div>
                                  <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                  <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              <?php
                                  }
                              ?> 
                              </div>
                              <div class="span5">
                                <span class="tag">
                                  <?php
                                    //print_r($value["tag"]); exit;
                                    foreach ($value["tag"] as $keyTag => $valueTag) {

                                      if(!empty($value["tour"]->maintag_url)){
                                  ?>
                                        <a href="<?php echo base_url('tour/'.$value["tour"]->maintag_url."/".$valueTag->tag_url);?>" 
                                          style="color: #0CACE1;"
                                          title="<?php echo $valueTag->tag_name.' '.$value["tour"]->maintag_name;?>"
                                          target="_blank"
                                        >
                                          <?php echo $valueTag->tag_name; ?>
                                        </a>
                                  <?php
                                      }else{
                                 ?>
                                        <a href="<?php echo base_url('tour/'.$valueTag->tag_url);?>" 
                                          style="color: #0CACE1;"
                                          target="_blank" 
                                        >
                                          <?php echo $valueTag->tag_name; ?>
                                        </a>
                                  <?php
                                      }
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