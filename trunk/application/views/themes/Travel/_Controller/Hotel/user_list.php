<?php
  //print_r($hotel); exit;
?>
<!DOCTYPE html>
<!--[if IE ]>    <html class="no-js ie-all" lang="en"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

<?php 
  //Check class
  if($this->uri->segment(1) == $this->router->class){
    $index = 1;
    //echo $index; 
  }else if($this->uri->segment(2) == $this->router->class){
    $index = 2;
    //echo $index; 
  }

  $maintag = str_replace("-", " ",$this->uri->segment(1+$index));

  //Title
  $title1 = str_replace("-", " ",$this->uri->segment(1+$index)).str_replace("-", " ",$this->uri->segment(2+$index));  
  $title2 = "";
  if($this->uri->segment(3+$index)){
    $title2 = str_replace("-", " ",$this->uri->segment(3+$index)).str_replace("-", " ",$this->uri->segment(2+$index));     
  }  
  $title = trim($title1." ".$title2);


  $hotel_keyword = "แพคเกจทัวร์".$this->uri->segment(2+$index).", ทัวร์".$this->uri->segment(2+$index).", เที่ยวไทย".$this->uri->segment(2+$index).", ท่องเที่ยว".$this->uri->segment(2+$index).", ที่ท่องเที่ยว".$this->uri->segment(2+$index).", ท่องเที่ยวไทย".$this->uri->segment(2+$index).", เที่ยวทั่วไทย".$this->uri->segment(2+$index);  

  if($maintag == "โชว์กลางคืน"){
    $keyword = "โชว์".$this->uri->segment(2+$index).", โชว์การแสดง".$this->uri->segment(2+$index).", โชว์กลางคืน".$this->uri->segment(2+$index).", ".$hotel_keyword;
  }else if($maintag == "สปาแพคเกจ"){
    $keyword = "สปา, สปาแพคเกจ".$this->uri->segment(2+$index).", แพคเกจสปา".$this->uri->segment(2+$index).", นวดสปาไทย".$this->uri->segment(2+$index).", สปาไทย".$this->uri->segment(2+$index).", นวดสปา".$this->uri->segment(2+$index).", ".$hotel_keyword;
  }else if($maintag == "กอล์ฟแพคเกจ"){
    $keyword = "กอล์ฟแพคเกจ".$this->uri->segment(2+$index).", สนามกอล์ฟ".$this->uri->segment(2+$index).", ".$hotel_keyword;
  }else if($maintag == "เช่าเรือเหมาลำ"){
    $keyword = "เช่าเรือเหมาลำ".$this->uri->segment(2+$index).", เรือทัวร์".$this->uri->segment(2+$index).", เหมาเรือ".$this->uri->segment(2+$index).", ท่องเที่ยว".$this->uri->segment(2+$index).", เรือสำราญ".$this->uri->segment(2+$index).", เรือสปีดโบ๊ท".$this->uri->segment(2+$index).", เรือเช้า".$this->uri->segment(2+$index).", บริการเช่าเรือ".$this->uri->segment(2+$index).", เช่าเหมาลำ".$this->uri->segment(2+$index);
  }else if($maintag == "จองตั๋วเรือโดยสาร"){
    $keyword = "จองตั๋วเรือโดยสาร".$this->uri->segment(2+$index).", ตั๋วเรือ".$this->uri->segment(2+$index).", จองตั๋วเรือ".$this->uri->segment(2+$index).", ตั๋ว".$this->uri->segment(2+$index).", ตั๋วโดยสาร".$this->uri->segment(2+$index);
  }else if($maintag == "จองรถเช่า"){
    $keyword = "จองรถเช่า".$this->uri->segment(2+$index).", เช่ารถ".$this->uri->segment(2+$index).", รถเช่า".$this->uri->segment(2+$index).", บริการเช่ารถ".$this->uri->segment(2+$index).", ให้เช่ารถ".$this->uri->segment(2+$index);
  }else if($maintag == "จองตั๋วเครื่องบิน"){
    $keyword = "จองตั๋วเครื่องบิน".$this->uri->segment(2+$index).", ตั๋วเครื่องบิน".$this->uri->segment(2+$index).", ตั๋ว".$this->uri->segment(2+$index).", ตั๋วเครื่องบินราคาถูก".$this->uri->segment(2+$index).", ตั๋วโดยสาร".$this->uri->segment(2+$index).", เช่าเครื่องเหมาลำ".$this->uri->segment(2+$index);
  }else if($maintag == "จองโรงแรม"){
    $keyword = "จองโรงแรม".$this->uri->segment(2+$index).", จองที่พัก".$this->uri->segment(2+$index).", โรงแรมที่พัก".$this->uri->segment(2+$index).", จองห้องพัก".$this->uri->segment(2+$index).", ห้องพัก".$this->uri->segment(2+$index).", เช่าห้อง".$this->uri->segment(2+$index).", เช่าห้องพัก".$this->uri->segment(2+$index).", รีสอร์ท".$this->uri->segment(2+$index).", จองรีสอร์ท".$this->uri->segment(2+$index);
  }else if(!empty($title2)){
    $keyword = $title1.", ".$title2.", ".$hotel_keyword;
  }else{
    $keyword = $title1.", ".$hotel_keyword;
  } 
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
        var action = $(this).val() == "hotel" ? "hotel" : "location";
        var uri = action+"/search/";
        var url = "";

        //Check host
        if(document.domain == "localhost"){
          url = "http://localhost/uastravel/"+uri;
        }else{name
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
                <li><a href="<?php echo base_url();?>">หน้าแรก</a></li>
                <li><a href="<?php echo base_url('location');?>">สถานที่ท่องเที่ยว</a></li>
                <li>
                  <a>แพ๊คเกจทัวร์ <span class="arrow_menu "></span></a>
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
                <li><a class="active"  href="<?php echo base_url('hotel');?>">จองโรงแรม</a></li>
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

              <!-- Start first menu -->
              <div class="row-fluid">
                <div class="navbar">     
                    <div class="navbar-inner">
                        <div id="options">
                          <ul class="option-set nav" >
                          <span class="brand">จังหวัด :</span>
                            <?php
                            if($menu_selectall == true){
                            ?>
                              <li>
                                <a href="<?php echo base_url('hotel/'.$this->uri->segment(2));?>" 
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
                                <a href="<?php echo base_url('hotel/'.$this->uri->segment(2));?>"
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
                                if($value->url == $this->uri->segment(3)){
                                  $isMenu = true;
                                }
                              }  

                              foreach ($menu as $key => $value) {
                                if($isMenu){
                                  $link = base_url('hotel/'.$uri1.$value->url); 
                                }else{
                                  $link = base_url('hotel/'.$uri1.$value->url."/".$uri2); 
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
                        <form name="input" action="hotel/search" method="post" class="navbar-form pull-right form_search" id="search-form"> 
                          <select name="select" id="selectsearch">
                            <option value="hotel">แพคเกจทัวร์</option>
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
                            <span class="brand">หมวดหมู่ :</span>
                            <?php

                            if($isMenu){
                              $link = base_url('hotel/'.$uri1.$uri2); 
                            }else{
                              $link = base_url('hotel/'.$uri1); 
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
                                  $link = base_url('hotel/'.$uri1.$value->url); 
                              }else{
                                $link = base_url('hotel/'.$uri1.$uri2.$value->url); 
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
    				if(!empty($hotel)){			  
    			  ?>
              <div class="row-fluid">
                <div class="span12">
                  <div id="attractions" style="display:none;" class="clickable variable-sizes">
                      <?php
                        //print_r($hotel); exit;
                        //echo $this->pagination->create_links();
                        //echo "<br><br><br><br>";
                          foreach ($hotel as $key => $value) {
                        ?>
                          <div class="list_attractions" data-category="transition">
                            <?php
                                if(!empty($value["price"]->prh_sale_room_price)){
                            ?>
                              <div class="sticker_status">
                                <div class="sticker price">
                                  <?php  
                                    //$sale_price = $value["price"]->prh_sale_adult_price - $value["price"]->prh_discount_adult_price;
                                    echo number_format($value["price"]->prh_sale_room_price, 0);
                                  ?>
                                  บาท
                                </div> 
                              </div>                                     
                            <?php                                    
                                }
                            ?>
                            <a href="<?php echo base_url('hotel/'.$value['hotel']->hott_url.'-'.$value['hotel']->hot_id);?>" 
                              target="_blank" 
                              title="<?php echo $value['hotel']->hott_name;?>"                                
                            >
                              <?php
                                if($value['hotel']->hot_first_image){
                              ?>
                                  <img src="<?php echo $value['hotel']->hot_first_image;?>">
                              <?php
                                }
                              ?>
                              <?php
                                //print_r($value["price"]); exit;
                                if(!empty($value["price"]->prh_discount_room_price )){

                                  if($value["price"]->prh_discount_room_price > 0){
                              ?>

                                    <div class="promotion style2">
                                      <!--<img src="<?php echo base_url('themes/Travel/tour/images/best_price_en.png');?>">-->
                                      <img src="<?php echo base_url('themes/Travel/tour/images/best_price_th2.png');?>">
                                      <p>จาก 
                                        <span>
                                          <?php
                                            echo number_format($value["price"]->prh_sale_room_price);
                                          ?>
                                        </span>  ลดเหลือ 
                                        <span class="reduce_price"> 
                                          <?php
                                            echo number_format($value["price"]->prh_discount_room_price, 0);
                                          ?>
                                        </span> บาท
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
                                  <a href="<?php echo base_url('hotel/'.$value['hotel']->hott_url.'-'.$value['hotel']->hot_id);?>" 
                                    target="_blank" 
                                    title="<?php echo $value['hotel']->hott_name;?>"                                    
                                  >
                                  <?php echo $value['hotel']->hott_name; ?>
                                  </a>
                                </h3>
                              </div>
                              <div class="span4">

                                <?php
                                  if($value['hotel']->hot_star == 2){
                                ?>
                                  <div class="rating two_star"></div>
                                <?php    
                                  }else{
                                ?>
                                  <div class="rating two_star" style="display:none"></div>                              
                                <?php
                                  }
                                ?>

                                <?php
                                  if($value['hotel']->hot_star == 3){
                                ?>
                                  <div class="rating three_star"></div>
                                <?php    
                                  }else{
                                ?>
                                  <div class="rating three_star" style="display:none"></div>                              
                                <?php
                                  }
                                ?>


                                <?php
                                  if($value['hotel']->hot_star == 4){
                                ?>
                                  <div class="rating four_star"></div>
                                <?php    
                                  }else{
                                ?>
                                  <div class="rating four_star" style="display:none"></div>                              
                                <?php
                                  }
                                ?>

                                <?php
                                  if($value['hotel']->hot_star == 5){
                                ?>
                                  <div class="rating five_star"></div>
                                <?php    
                                  }else{
                                ?>
                                  <div class="rating five_star" style="display:none"></div>                              
                                <?php
                                  }
                                ?>                                
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="border"></div>
                            <div class="row-fluid">
                              <div class="span7">
                                <!-- img src="http://icons.iconarchive.com/icons/dapino/summer-holiday/24/palm-tree-icon.png" -->
                                <div class="icon hotel" rel="tooltip" title="แพ็กเก็จทัวร์"></div>
                                <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
                                <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
                              </div>                              
                              <div class="span5">
                                <span class="tag">
                                  <?php
                                    //print_r($value["tag"]); exit;
                                    foreach ($value["tag"] as $keyTag => $valueTag) {
                                  ?>
                                  <a href="<?php echo base_url('hotel/'.$uri1.$valueTag->tag_url);?>" 
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
                          }//End loop hotel
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
    				//End check hotel
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


    <?php include_once("themes/Travel/tour/analyticstracking.php") ?>
  </body>
</html>
