<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
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
                <p><a>uastravel@gmail.com</a></p>
                <!--<p>085-7148830</p>
                <p class="copyright">Copyright © Uastravel.com</p>-->
              </div>
            </header>
            <div class="line"></div>
            <nav>
              <ul>
                <li><a href="<?php echo base_url();?>">หน้าแรก</a></li>
                <li class="active"><a href="<?php echo base_url('tour');?>">แพ็คเกจทัวร์</a></li>
                <li><a href="#">โปรโมชั่น</a></li> 
                <li><a href="#">เกี่ยวกับเรา</a></li>
                <li><a href="#">ติดต่อเรา</a></li>             
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
            <!--
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=357467797616103";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="facebookOuter"> 
                <div class="facebookInner"> 
                  <div 
                  class="fb-like-box" 
                  data-href="https://www.facebook.com/usedInstrument" 
                  data-width="182" data-height="320" 
                  data-colorscheme="dark" 
                  data-show-faces="true" 
                  data-stream="false" 
                  data-header="false"
                  css="stylesheets/fb-code.css"
                  >
                  </div>
                </div>
              </div>
            </div>
            <div class="like_button">
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=357467797616103";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-like" data-href="https://www.facebook.com/usedInstrument" data-send="true" data-layout="button_count" data-width="200" data-show-faces="true" data-colorscheme="dark"  data-font="tahoma"></div>
            </div>
          -->
          <div class="footer_menu"></div>
          <div class="shadow"></div>
          </div><!--/sidebar-->
          <div class="main">
            <div class="content">

              <!-- Menu -->
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
                          <ul id="filters" class="option-set nav" data-option-key="filter">
                            <li><a href="#filter" data-option-value="*" class="selected">ทั้งหมด</a></li>
                            <li><a href="#filter" data-option-value=".nonmetal">พัทยา</a></li>
                            <li><a href="#filter" data-option-value=".metal">ภูเก็ต</a></li>
                            <li><a href="#filter" data-option-value=".post-transition">กรุงเทพ</a></li>
                            <li><a href="#filter" data-option-value=".nonmetal">เชียงใหม่</a></li>
                            <li><a href="#filter" data-option-value=".inner-transition">กระบี่่</a></li>
                            <li><a href="#filter" data-option-value=".alkali, .alkaline-earth">พังงา</a></li>
                            <li><a href="#filter" data-option-value=":not(.transition)">แม่ฮ่องสอน</a></li>
                            <li><a href="#filter" data-option-value=".metal:not(.transition)">เบตง</a></li>
                            <li><a href="#filter" data-option-value=".nonmetal">ปาย</a></li>
                            <li><a href="#filter" data-option-value=".metal">ชะอำ </a></li>  
                          </ul>
                          <form class="navbar-form pull-right" id="searchForm">
                            <fieldset>
                                <div class="input">
                                    <input type="text" name="search" id="search" value="ค้นหา" />
                                </div>
                                <input type="submit" id="searchSubmit" value="" />
                            </fieldset>
                          </form>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- End Menu -->


              <!-- Main content -->
              <div class="row-fluid">
                <div class="span12">
                  <div id="attractions" style="display:none;" class="clickable variable-sizes">

                      <!-- list tour -->  
                      <div class="list_attractions transition metal" data-category="transition">
                        <div class="sticker new">New</div>
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p5.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions metalloid" data-category="metalloid">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p11.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      
                          
                      <div class="list_attractions post-transition metal" data-category="post-transition">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p3.png');?>">
                          <div><span></span></div>
                        </a>
                            <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      
                          
                      <div class="list_attractions transition metal" data-category="transition">
                        <div class="sticker popular">Popular</div>
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p1.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      
                          
                      <div class="list_attractions alkaline-earth metal" data-category="alkaline-earth">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p2.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      
                          
                      <div class="list_attractions transition metal" data-category="transition">
                        <div class="sticker recommend">Recommend</div>
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p6.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      
                          
                      <div class="list_attractions post-transition metal" data-category="post-transition">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p9.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions metalloid" data-category="metalloid">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p4.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions transition metal" data-category="transition">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p10.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions lanthanoid metal inner-transition" data-category="lanthanoid">
                        <div class="sticker recommend">Popular</div>
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p7.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions noble-gas nonmetal" data-category="noble-gas">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p14.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions alkali metal" data-category="alkali">
                        <div class="sticker new">New</div>
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p12.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions other nonmetal" data-category="other">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p13.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                    
                      
                          
                      <div class="list_attractions actinoid metal inner-transition" data-category="actinoid">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p8.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      
                          
                      <div class="list_attractions actinoid metal inner-transition" data-category="actinoid">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p15.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>

                      <div class="list_attractions actinoid metal inner-transition" data-category="actinoid">
                        <a href="detail.html">
                          <img src="<?php echo base_url('themes/Travel/tour/images/attractions/p16.png');?>">
                          <div><span></span></div>
                        </a>
                        <div class="row-fluid">
                          <div class="span8">
                            <h3><a href="detail.html">เกาะเมียงหรือเกาะสี่</a></h3>
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
                            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                          </div>
                          <div class="span5">
                            <span class="tag">กระบี่</span><span class="icon  tag_icon"></span>
                          </div>
                        </div>
                      </div>
                      <nav id="page_nav">
                        <a href="pages/2.html"></a>
                      </nav>

                  </div> <!-- #attractions -->
                </div><!--/span12-->
              </div>
                      <!-- End list tour -->
              </div>
              <!-- End Main content -->




            </div>
          </div><!-- Endcontent-->
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


  </body>
</html>
