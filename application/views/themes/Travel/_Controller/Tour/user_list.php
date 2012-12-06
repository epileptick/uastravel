<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo str_replace("-", " ",$this->uri->segment(3));?> <?php  echo str_replace("-", " ",$this->uri->segment(2));?> - U As Travel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="<?php echo str_replace("-", " ",$this->uri->segment(3));?> <?php echo str_replace("-", " ",$this->uri->segment(2));?>ยอดนิยมในประเทศไทย รวมบทความและรูปภาพของ<?php echo $this->uri->segment(3); echo $this->uri->segment(2);?> และแพคเกจ<?php echo $this->uri->segment(3); echo $this->uri->segment(2);?>ราคาพิเศษ" />
  <meta name="keywords" content="" />
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
                <p><a>uastravel@gmail.com</a></p>
                <!--<p>085-7148830</p>
                <p class="copyright">Copyright © Uastravel.com</p>-->
              </div>
            </header>
            <div class="line"></div>
            <nav>
              <ul>
                <li>
                  <a href="<?php echo base_url();?>">หน้าแรก</a>
                </li>
                <li>
                  <a href="<?php echo base_url('location');?>">สถานที่ท่องเที่ยว</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="ทัวร์ครึ่งวัน")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/ทัวร์ครึ่งวัน');?>">ทัวร์ครึ่งวัน</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="ทัวร์-1-วัน")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/ทัวร์-1-วัน');?>">ทัวร์ 1 วัน</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="ทัวร์-2-วัน-1-คืน")? 'class="active"':''; ?>>
                  <a href="<?php echo base_url('tour/ทัวร์-2-วัน-1-คืน');?>">ทัวร์ 2 วัน 1 คืน</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="ทัวร์-3-วัน-2-คืน")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/ทัวร์-3-วัน-2-คืน');?>">ทัวร์ 3 วัน 2 คืน</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="โชว์กลางคืน")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/โชว์กลางคืน');?>">โชว์กลางคืน</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="สปาแพ็คเกจ")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/สปาแพ็คเกจ');?>">สปาแพ็คเกจ</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="กอล์ฟแพ็คเกจ")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/กอล์ฟแพ็คเกจ');?>">กอล์ฟแพ็คเกจ</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="เช่าเรือเหมาลำ")? 'class="active"':'';?>>
                  <a href="<?php echo base_url('tour/เช่าเรือเหมาลำ');?>">เช่าเรือเหมาลำ</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="จองรถเช่า")? 'class="active"':'';?>>
                  <a href="#">จองรถเช่า</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="จองตั๋วเครื่องบิน")? 'class="active"':'';?>>
                  <a href="#">จองเครื่องบิน</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="จองโรงแรม")? 'class="active"':'';?>>
                  <a href="#">จองโรงแรม</a>
                </li>
                <li <?php echo ($this->uri->segment(2)=="โปรโมชั่น")? 'class="active"':'';?>>
                  <a href="#">โปรโมชั่น</a>
                </li>
                <li>
                  <a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a>
                </li>               
              </ul>
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
                <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script>
                <script type="text/javascript">FB.init("1690883eb733618b294e98cb1dfba95a");</script>
                <fb:fan 
                profile_id="478557815500701" 
                stream="0" 
                connections="12" 
                logobar="0" 
                width="200" 
                height="200" 
                css="https://upload-my-file.googlecode.com/svn/trunk/custom_fanpage.css?1" 
                class=" FB_fan FB_ElementReady">
                </fb:fan>
              </div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=357467797616103";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
            </div>
          <div class="footer_menu"></div>
          <div class="shadow"></div>
          </div><!--/sidebar-->
          <div class="main">
            <div class="content">
              <div class="row-fluid">
                <div class="navbar">                          
                    <!-- Start first menu -->
                    <div class="navbar-inner">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <div id="options" class="nav-collapse collapse">
                          <ul class="option-set nav" >
                          <span class="brand">จังหวัด :</span>
                            <?php
                            if($menu_selectall == true){
                            ?>
                              <li>
                                <a href="<?php echo base_url('tour/'.$this->uri->segment(2));?>" 
                                  class="selected"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                  ทั้งหมด
                                </a>
                              </li>
                            <?php
                            }else{
                            ?>
                              <li>
                                <a href="<?php echo base_url('tour/'.$this->uri->segment(2));?>"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                  ทั้งหมด
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
                                if($value->name == $this->uri->segment(3)){
                                  $isMenu = true;
                                }
                              }  

                              foreach ($menu as $key => $value) {
                                if($isMenu){
                                  $link = base_url('tour/'.$uri1.$value->url); 
                                }else{
                                  $link = base_url('tour/'.$uri1.$value->url."/".$uri2); 
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
                        <div style="float:right;">
                          <form name="input" action="<?php echo base_url('tour');?>" method="post">
                            <input type="text" name="search" style="margin:10px 5px 0px 0px; height:12px; width:120px;" value="<?php echo (!empty($search))?$search:"";?>">
                            <input type="submit" value="ค้นหา" style="margin:10px 10px 0px 0px; height:22px; width:60px;">
                          </form>
                        </div>                        
                    </div>
                    <!-- End first menu -->

                  </div>
              </div>

              <!-- Start sub menu -->
              <?php
              if(!empty($submenu)){

                //Check submenu link
                $isSubMenu = false;
                foreach ($submenu as $key => $value) {
                  if($value->name == $this->uri->segment(3)){
                    $isSubMenu = true;
                  }
                }                  
              ?>   
              <div class="row-fluid">
                <div class="navbar">                                       
                    <div class="navbar-inner">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <div id="options" class="nav-collapse collapse">
                          <ul class="option-set nav" >
                          <span class="brand">หมวดหมู่ :</span>

                            <?php

                            if($isMenu){
                              $link = base_url('tour/'.$uri1.$uri2); 
                            }else{
                              $link = base_url('tour/'.$uri1); 
                            }

                            if($submenu_selectall == true){
                            ?>
                              <li>
                                <a href="<?php echo $link;?>" class="selected"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                ทั้งหมด
                                </a>
                              </li>
                            <?php
                            }else{
                            ?>
                              <li>
                                <a href="<?php echo $link;?>"
                                  title="<?php echo  str_replace("-", " ", $this->uri->segment(2));?>"
                                >
                                ทั้งหมด
                                </a>
                              </li>
                            <?php
                            }
           
              
                            foreach ($submenu as $key => $value) {
                              if($isSubMenu){
                                  $link = base_url('tour/'.$uri1.$value->url); 
                              }else{
                                $link = base_url('tour/'.$uri1.$uri2.$value->url); 
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
                                if(!empty($value["price"]->agt_sale_adult_price)){
                            ?>
                              <div class="sticker recommend">
                                <?php  
                                  $sale_price = $value["price"]->agt_sale_adult_price - $value["price"]->agt_discount_adult_price;
                                  echo number_format($sale_price, 0);
                                ?>
                                บาท
                              </div>                                    
                            <?php                                    
                                }
                            ?>
                            <a href="<?php echo base_url('tour/'.$value['tour']->tou_url.'-'.$value['tour']->tou_id);?>" 
                              target="_blank" 
                              title="<?php echo $value['tour']->tou_name;?>"                                
                            >
                              <?php
                                if($value['tour']->tou_first_image){
                              ?>
                                  <img src="<?php echo $value['tour']->tou_first_image;?>">
                              <?php
                                }
                              ?>
                              <div><span></span></div>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url('tour/'.$value['tour']->tou_url.'-'.$value['tour']->tou_id);?>" 
                                    target="_blank" 
                                    title="<?php echo $value['tour']->tou_name;?>"                                    
                                  >
                                  <?php echo $value['tour']->tou_name; ?>
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
                                <img src="<?php echo base_url('themes/Travel/tour/images/icon/24tour.png');?>" style="margin-left:7px;">
                                
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>                              
                              <div class="span5">
                                <span class="tag">
                                  <?php
                                    //print_r($value["tag"]); exit;
                                    foreach ($value["tag"] as $keyTag => $valueTag) {
                                  ?>
                                  <a href="<?php echo base_url('tour/'.$uri1.$valueTag->tag_url);?>" 
                                      style="color: #0CACE1;"
                                      title="<?php echo $valueTag->tag_name." ".str_replace("-", " ", $this->uri->segment(2))." ".str_replace("-", " ", $this->uri->segment(3));?>"
                                  >
                                    <?php echo $valueTag->tag_name; ?>
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
      <div class="full_screen_icon">
        <div class="icon full_screen" rel="tooltip" data-placement="right" title="ดูเต็มจอ" onclick="$(document).fullScreen(true)">Fullscreen </div>
        <div class="icon exit hidden" rel="tooltip" data-placement="right" title="ย่อ" onclick="$(document).fullScreen(false)">Exit</div>
      </div>

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

    <!-- Hover Effect -->
    <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/DirectionAwareHoverEffect/js/jquery.hoverdir.js');?>"></script>
    <noscript>
      <style>
        .clickable .list_attractions  a div {
          top: 0px;
          left: -100%;
          -webkit-transition: all 0.3s ease;
          -moz-transition: all 0.3s ease-in-out;
          -o-transition: all 0.3s ease-in-out;
          -ms-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
        }
        .clickable .list_attractions  a:hover div{
          left: 0px;
        }
      </style>
    </noscript>

    <!-- To top scrollbar  -->  
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/easing.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js');?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo base_url('themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css');?>" />

    <!-- Isotope -->
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/isotope/jquery.isotope.min.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/isotope/js/jquery.infinitescroll.min.js');?>"></script>


    <!-- Jquery Search -->
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/jquerysearch/js/jquery.color.js');?>"></script>
    <script src="<?php echo base_url('themes/Travel/tour/javascripts/jquerysearch/js/script.js');?>"></script>

    <!-- Full Screen -->
    <script type="text/javascript" src="<?php echo base_url('themes/Travel/tour/javascripts/Full-screen/jquery.fullscreen-min.js');?>"></script>


    <?php include_once("themes/Travel/tour/analyticstracking.php") ?>
  </body>
</html>
