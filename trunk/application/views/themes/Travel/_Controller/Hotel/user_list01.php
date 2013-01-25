
<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

 

  <title><?php echo "จองโรงแรม U As Travel" ;?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="ROBOTS" content="NOODP" />
  <meta name="description" content="สถานที่ท่องเที่ยวยอดนิยมในประเทศไทย รวมบทความและรูปภาพของสถานที่ท่องเที่ยว และแพคเกจสถานที่ท่องเที่ยวราคาพิเศษ" />
  <meta name="keywords" content="สถานที่ท่องเที่ยว, แพคเกจทัวร์, ทัวร์, เที่ยวไทย, ท่องเที่ยว, ที่ท่องเที่ยว, ท่องเที่ยวไทย, เที่ยวทั่วไทย" />
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="http://localhost/themes/Travel/tour/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="http://localhost/themes/Travel/tour/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="http://localhost/themes/Travel/tour/stylesheets/main.css" rel="stylesheet">
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Search selection -->
  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $("#selectsearch").change(function() {
        var action = $(this).val() == "tour" ? "tour" : "location";
        var uri = action+"/search/";
        var url = "";

        //Check host
        if(document.domain == "localhost"){
          url = "http://localhost/uastravel/"+uri;
        }else{
          url = "http://"+document.domain+"/"+uri;
        }

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
              <a class="logo"> <img src="http://localhost/themes/Travel/tour/images/logo_home.png"></a>
              <div class="address">
                <p><a>uastravel@gmail.com</a></p>
                <!--<p>085-7148830</p>
                <p class="copyright">Copyright © Uastravel.com</p>-->
              </div>
            </header>
            <div class="line"></div>
            <nav>
              <ul>
                <li><a href="http://localhost/">หน้าแรก</a></li>
                <li><a href="http://localhost/location">สถานที่ท่องเที่ยว</a></li>
                <li><a href="http://localhost/tour/ทัวร์ครึ่งวัน">ทัวร์ครึ่งวัน</a></li>
                <li><a href="http://localhost/tour/ทัวร์-1-วัน">ทัวร์ 1 วัน</a></li>
                <li><a href="http://localhost/tour/ทัวร์-2-วัน-1-คืน">ทัวร์ 2 วัน 1 คืน</a></li>
                <li><a href="http://localhost/tour/ทัวร์-3-วัน-2-คืน">ทัวร์ 3 วัน 2 คืน</a></li>
                <li><a href="http://localhost/tour/โชว์กลางคืน">โชว์กลางคืน</a></li>
                <li><a href="http://localhost/tour/สปาแพ็คเกจ">สปาแพ็คเกจ</a></li>
                <li><a href="http://localhost/tour/กอล์ฟแพ็คเกจ">กอล์ฟแพ็คเกจ</a></li>
                <li><a href="http://localhost/tour/เช่าเรือเหมาลำ">เช่าเรือเหมาลำ</a></li>
                <li><a href="http://localhost/tour/จองตั๋วเรือโดยสาร">จองตั๋วเรือโดยสาร</a></li>
                <li><a href="http://localhost/carrent/list">จองรถเช่า</a></li>
                <li><a href="http://localhost/airline/list">จองตั๋วเครื่องบิน</a></li>
                <li class="active"><a href="http://localhost/hotel/list">จองโรงแรม</a></li>
                <li><a href="http://localhost/tour/โปรโมชั่น">โปรโมชั่น</a></li>
                <li><a href="http://localhost/location/ติดต่อเรา-119">ติดต่อเรา</a></li>
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
                    <div class="navbar-inner">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <span class="brand">Filter :</span>
                        <div id="options" class="nav-collapse collapse">
                          <ul class="option-set nav" >
                                                          <li>
                                <a href="<?php echo base_url('hotel/list/ทั้งหมด');?>" class="selected">ทั้งหมด</a></li>
                                                          <li>
                                <a href="<?php echo base_url('hotel/list/พังงา');?>">พังงา  </a>                                   
                              </li>
                                                          <li>
                                <a href="<?php echo base_url('hotel/list/ภูเก็ต');?>"> ภูเก็ต </a>                                                              
                              </li>
                                                          <li>
                                <a href="<?php echo base_url('hotel/list/กระบี่');?>">กระบี่ </a>                                                               
                              </li>
                                                      </ul>
                        </div>

<!--test-->

<!--test-->
<?php

$hotel = array();
$hotel["พังงา"]["aaa"][0] = 1;
$hotel["พังงา"]["aaa"][1] = 21;
$hotel["พังงา"]["bbb"][2] = 3;


$hotel["ภูเก็ต"]["karonbeach"][0] = 6;
$hotel["ภูเก็ต"]["karonbeach"][1] = 9;
$hotel["ภูเก็ต"]["karonbeach"][2] = 10;


$hotel["ภูเก็ต"]["katabeach"][0] = 6;
$hotel["ภูเก็ต"]["patongbeach"][1] = 9;
$hotel["ภูเก็ต"]["karonbeach"][2] = 10;


$hotel["กระบี่"]["katabeach"][0] = 5;
$hotel["กระบี่"]["katabeach"][0] = 6;

//Print_r($hotel);
?>
<!--test-->

                        <div style="float:right;">

                          <form name="input" action="location/search" method="post" id="search-form"> 
                            <select name="select" id="selectsearch" style="margin:10px 5px 0px 0px; height:22px; width:120px;" >
                              <option value="tour">แพคเกจทัวร์</option>
                              <option value="location" selected>สถานที่ท่องเที่ยว</option>
                            </select>

                            <input type="text" name="search" style="margin:10px 5px 0px 0px; height:12px; width:120px;" 
                                    value=""
                            >
                            <input type="submit" value="ค้นหา" style="margin:10px 10px 0px 0px; height:22px; width:60px;">
                          </form>
                        </div>  
                    </div>
                  </div>
              </div>



        

              <div class="row-fluid">
                <div class="span12">
                  <div id="attractions" style="display:none;" class="clickable variable-sizes">


                                                <div class="list_attractions" data-category="transition" id="พังงา">
                            <!-- div class="sticker new">New</div -->
                            <a href="<?php echo base_url('hotel/view/1/Diamond-Cottage-Resort-And-Spa');?>" target="_blank" >
                                                               <img src="<?php echo base_url('themes/Travel/images/first_diamond.jpg');?>" />
                                                            <div><span></span></div>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url('hotel/view/1/Diamond-Cottage-Resort-And-Spa');?>" target="_blank" >
                                  Diamond Cottage Resort And Spa                                  </a>
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
                                <img src="<?php echo base_url('themes/Travel/tour/images/icon/24tour.png');?>" style="margin-left:7px;">
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>
                              <div class="span5">
                                <span class="tag">
                                                                    <a href="<?php echo base_url('hotel/list/พังงา');?>" style="color: #0CACE1;">
                                    พังงา                                  </a>
                                                                    
                                </span>
                                <span class="icon  tag_icon"></span>
                              </div>
                            </div>
                          </div>                                        
                  
                                                       <div class="list_attractions" data-category="transition" >
                            <!-- div class="sticker new">New</div -->
                            <a href="<?php echo base_url('hotel/view/2/Karon-Beach-Resort-And-Spa');?>" target="_blank" >
                                                               <img src="<?php echo base_url('themes/Travel/images/first_diamond.jpg');?>" />
                                                            <div><span></span></div>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url('hotel/view/2/Karon-Beach-Resort-And-Spa');?>" target="_blank" >
                                  Karon Beach Resort And Spa                                 </a>
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
                                <img src="<?php echo base_url('themes/Travel/tour/images/icon/24tour.png');?>" style="margin-left:7px;">
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>
                              <div class="span5">
                                <span class="tag">
                                                                    <a href="<?php echo base_url('hotel/list/พังงา');?>" style="color: #0CACE1;">
                                    พังงา                                  </a>
                                                                    
                                </span>
                                <span class="icon  tag_icon"></span>
                              </div>
                            </div>
                          </div>    
                                                               <div class="list_attractions" data-category="transition" >
                            <!-- div class="sticker new">New</div -->
                            <a href="<?php echo base_url('hotel/view/01/Diamond-Cottage-Resort-And-Spa');?>" target="_blank" >
                                                               <img src="<?php echo base_url('themes/Travel/images/first_diamond.jpg');?>" />
                                                            <div><span></span></div>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url('hotel/view/01/Diamond-Cottage-Resort-And-Spa');?>" target="_blank" >
                                  Diamond Cottage Resort And Spa                                  </a>
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
                                <img src="<?php echo base_url('themes/Travel/tour/images/icon/24tour.png');?>" style="margin-left:7px;">
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>
                              <div class="span5">
                                <span class="tag">
                                                                    <a href="<?php echo base_url('hotel/list/ภูเก็ต');?>" style="color: #0CACE1;">
                                    ภูเก็ต                                  </a>
                                                                    
                                </span>
                                <span class="icon  tag_icon"></span>
                              </div>
                            </div>
                          </div>    
                                                               <div class="list_attractions" data-category="transition" >
                            <!-- div class="sticker new">New</div -->
                            <a href="<?php echo base_url('hotel/view/01/Diamond-Cottage-Resort-And-Spa');?>" target="_blank" >
                                                               <img src="<?php echo base_url('themes/Travel/images/first_diamond.jpg');?>" />
                                                            <div><span></span></div>
                            </a>
                            <div class="row-fluid">
                              <div class="span8">
                                <h3>
                                  <a href="<?php echo base_url('hotel/view/01/Diamond-Cottage-Resort-And-Spa');?>" target="_blank" >
                                  Diamond Cottage Resort And Spa                                  </a>
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
                                <img src="<?php echo base_url('themes/Travel/tour/images/icon/24tour.png');?>" style="margin-left:7px;">
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>
                              <div class="span5">
                                <span class="tag">
                                                                    <a href="<?php echo base_url('hotel/list/พังงา');?>" style="color: #0CACE1;">
                                    พังงา                                  </a>
                                                                    
                                </span>
                                <span class="icon  tag_icon"></span>
                              </div>
                            </div>
                          </div>    


                      <nav id="page_nav">
                        <a href="http://localhost/hotel/list"></a>
                      </nav>

                  </div> <!-- #attractions -->

                </div><!--/span12-->
              </div>


                    
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
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/jquery.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-transition.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-alert.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-modal.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-tab.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-popover.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-button.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="http://localhost/themes/Travel/tour/bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="http://localhost/themes/Travel/tour/javascripts/function.js"></script>

    <!-- Hover Effect -->
    <script type="text/javascript" src="http://localhost/themes/Travel/tour/javascripts/DirectionAwareHoverEffect/js/jquery.hoverdir.js"></script>
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
    <script src="http://localhost/themes/Travel/tour/javascripts/top-scrollbar/js/easing.js" type="text/javascript"></script>
    <script src="http://localhost/themes/Travel/tour/javascripts/top-scrollbar/js/jquery.ui.totop.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen,projection" href="http://localhost/themes/Travel/tour/javascripts/top-scrollbar/css/ui.totop.css" />

    <!-- Isotope -->
    <script src="http://localhost/themes/Travel/tour/javascripts/isotope/jquery.isotope.min.js"></script>
    <script src="http://localhost/themes/Travel/tour/javascripts/isotope/js/jquery.infinitescroll.min.js"></script>


    <!-- Jquery Search -->
    <script src="http://localhost/themes/Travel/tour/javascripts/jquerysearch/js/jquery.color.js"></script>
    <script src="http://localhost/themes/Travel/tour/javascripts/jquerysearch/js/script.js"></script>

    <!-- Full Screen -->
    <script type="text/javascript" src="http://localhost/themes/Travel/tour/javascripts/Full-screen/jquery.fullscreen-min.js"></script>


    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36723098-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 
<?php include_once("themes/Travel/tour/analyticstracking.php") ?>
 </body>
</html>
