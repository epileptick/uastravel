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
  <meta name="keywords" content="" />

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
              <li><a href="<?php echo base_url();?>">หน้าแรก</a></li>
              <li><a href="<?php echo base_url('location');?>">แหล่งท่องเที่ยว</a></li>
              <li><a class="active" href="<?php echo base_url('tour');?>">แพ๊คเกจทัวร์</a></li> 
              <li><a href="#">โปรโมชั่น</a></li>
                <li><a href="<?php echo base_url('location/ติดต่อเรา-119');?>">ติดต่อเรา</a></li>                
            </ul>
          </section>
        </nav>
      </div>
    </div>
    <!-- End Menu -->

    <!-- Tour Information -->
    <div class="row">
      <div class="eight columns">
        <div class="box_white_in_columns article_tour">
          <div class="row">
            <div class="six columns">
              <h3><?php echo $tour[0]->name;?></h3>
            </div>
            <div class="six columns">
              <div class="social_network">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_pinterest_pinit"></a>
                <a class="addthis_button_tweet"></a>
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

          <!-- Start price -->
          <div class="row">
              <div class="price_booking"> 
             
                <div class="twelve columns">
                  <div class="two columns">
                    <span class="title">ราคาทัวร์</span>
                  </div>

                  <div class="four columns">
                    <span>
                      <strong>ผู้ใหญ่ : </strong> 
                      <?php
                        //print_r($price); exit;
                        if(!empty($price[0]->sale_adult_price)){
                          
                          if($price[0]->discount_adult_price>0){

                            $priceAdultDiscount = number_format($price[0]->sale_adult_price - $price[0]->discount_adult_price, 0);
                            $priceAdult = number_format($price[0]->sale_adult_price, 0);
                          
                            echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                            echo " บาท";

                          }else{
                            echo "<f style='font-size:30px; color:#0089E0;'>".number_format($price[0]->sale_adult_price, 0)."&nbsp; บาท</f>";
                          }

                          //text-decoration: line-through; color: #โค้ดสีเส้น;

                        }else{
                          echo "Call";
                          echo " บาท";
                        }
                        
                      ?> 
                    </span> 
                  </div>

                  <div class="four columns">
                    <span>
                      <strong>เด็ก : </strong>
                      <?php 
                      
                        if(!empty($price[0]->sale_child_price)){
                          
                          if($price[0]->discount_child_price>0){

                            $priceChildDiscount = number_format($price[0]->sale_child_price - $price[0]->discount_child_price, 0);
                            $priceChild = number_format($price[0]->sale_child_price, 0);
                            echo "<f style='text-decoration: line-through;'>".$priceChild."</f>&nbsp;".$priceChildDiscount;
                            echo " บาท";

                          }else{
                            echo "<f style='font-size:30px; color:#0089E0;'>".number_format($price[0]->sale_child_price, 0)."&nbsp; บาท</f>";
                          }

                          //text-decoration: line-through; color: #โค้ดสีเส้น;

                        }else{
                          echo "Call";
                          echo " บาท";
                        }
                        
                      ?> 
                    </span>
                  </div>

                  <div class="two columns">

                    <form name="input" 
                          action="<?php echo base_url('tour/booking');?>" 
                          method="post"

                    >
                    <input type="hidden" name="id" value="<?php echo $tour[0]->id;?>"></input>
                    <input class="button small  booking"  type="submit" value="จองทันที">
                    </form>

                    <!-- a class="button small  booking" 
                       href="<?php echo base_url('tour/booking');?>"
                    >
                      จองทันที
                    </a -->
                  </div>

                </div>
              <div class="clearfix"></div>
            </div>
          </div>
        <!-- End price -->


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

        <!-- Start Booking Form -->
        <div class="border"></div> 
        <div class="row">         
          <div class="twelve columns">
            <form  class="custom">
              <h2>รายละเอียดลูกค้า</h2>
              <div class="row">
                <div class="six columns">
                  <label>ชื่อ</label>
                  <input type="text" placeholder="Firstname" />
                </div>
                <div class="six columns">
                  <label>นามสกุล</label>
                  <input type="text" placeholder="Lastname" />
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <label>สัญชาติ</label>
                  <input type="text" placeholder="Nation" />
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <label>เบอร์โทร</label>
                  <input type="text" placeholder="Telephone" />
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <label>อีเมล์</label>
                  <input type="text" placeholder="Email" />
                </div>
              </div>
              <label>ที่อยู่</label>
              <input type="text" class="twelve" placeholder="Street" />
              <div class="row">
                <div class="six columns">
                  <input type="text" placeholder="City" />
                </div>
                <div class="three columns">
                  <input type="text" placeholder="State" />
                </div>
                <div class="three columns">
                  <input type="text" placeholder="ZIP" />
                </div>
              </div>

              <h2>รายละเอียดที่พัก</h2>
              <label>ชื่อโรงแรม</label>
              <input type="text" class="twelve" placeholder="Hotel Name" />
              <div class="row">
                <div class="six columns">
                  <label>หมายเลขห้องพัก</label>
                  <input type="text" placeholder="Room Number" />
                </div>
              </div>

              <h2>ข้อมูลทัวร์เพิ่มเติม</h2>
              <div class="row">
                <div class="four columns">
                  <label>จำนวนผู้ใหญ่</label>
                  <input type="text" placeholder="Room Number" />
                </div>
                <div class="four columns">
                  <label>จำนวนเด็ก</label>
                  <input type="text" placeholder="Room Number" />
                </div>
                <div class="four columns">
                  <label>จำนวนทารก</label>
                  <input type="text" placeholder="Room Number" />
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <label>วันเดินทาง</label>
                  <input type="text" placeholder="Room Number" />
                </div>           
              </div>


              <div class="row">
                <div class="four columns">
                  <div class="row">
                    <div class="six columns">
                      <label>Guest </label>
                      <select name="guest" style="display: none; ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      <div class="custom dropdown" style="width: 98px; ">
                        <a href="#" class="current">1</a>
                        <a href="#" class="selector"></a>
                        <ul style="width: 96px; ">
                          <li class="selected">1</li>
                          <li>2</li>
                          <li>3</li>
                          <li>4</li>
                        </ul>
                      </div>
                    </div>

                    <div class="six columns">
                      <label>Rooms </label>
                      <select name="guest" style="display: none; ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      <div class="custom dropdown" style="width: 98px; ">
                        <a href="#" class="current">1</a>
                        <a href="#" class="selector"></a>
                        <ul style="width: 96px; ">
                          <li class="selected">1</li>
                          <li>2</li>
                          <li>3</li>
                          <li>4</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <label>สิ่งที่ต้องการเพิ่มเติม</label>
              <textarea placeholder="Message"></textarea>              

            

            </form>
          </div>
        </div>
        <!-- End Booking Form -->
      </div>
      <!-- End row of  Tour Information  -->      
      </div>
      <!-- End Tour Information -->  


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
                <a href="<?php echo $value["tour"]->tou_url."-".$value["tour"]->tou_id; ?>">
                  <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
                </a>
              </div>
              <div class="twelve columns">
                <div class="title_tour">
                  <h4>
                    <a href="<?php echo $value["tour"]->tou_url."-".$value["tour"]->tou_id; ?>">
                      <?php echo $value["tour"]->tou_name; ?>
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
                      if(!empty($value["price"]->agt_sale_adult_price)){
                        
                        if($value["price"]->agt_discount_adult_price>0){

                          $priceAdultDiscount = number_format($value["price"]->agt_sale_adult_price - $value["price"]->agt_discount_adult_price, 0);
                          $priceAdult = number_format($value["price"]->agt_sale_adult_price, 0);
                        
                          echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                          echo " บาท";

                        }else{
                          echo number_format($value["price"]->agt_sale_adult_price, 0);
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


<?php include_once("themes/Travel/tour/analyticstracking.php") ?>
</body>
</html>
