

<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/user_view.css').'">'); ?>
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/tour_userview.css').'">'); ?>
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/css/flexslider.css'); ?>" type="text/css" media="screen" />
  <!-- FlexSlider -->
  <script defer src="<?php echo base_url('themes/uastravel2014/js/jquery.flexslider.js'); ?>"></script>
  <!-- ปุ่ม Like google facebook  -->
  <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508ccf0302149b28"></script>
  <!--END ปุ่ม -->
<div class="row">
  <div class="col-md-4">

    <!-- กล่องสีฟ้าซ้อนกัน
    <div class="backbox1 pull-right">
      <div class="col-md-12 gridstlyebox" >
        <span class="titlebox">ทัว์ยอดนิยม</span>
        <div class="col-md-12">
          <div class="backbox2">
            <span>เกราะตราชัย</span>
          </div>
        </div>
      </div>
    </div>
    -->


    <div class="row">
      <div class="col-md-12">
        <br / >
        <h3><?php echo $this->lang->line("tour_lang_packages_tour_suggest");?></h3>

                  <?php 
                  if(!empty($promotedTour)):
                    foreach ($promotedTour as $key => $promo):

                  ?>
                    <div class="list_packet">
                      <div class="row">
                        <div class="col-md-12 columns">
                          <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$promo["tout_url"].'-'.$promo["tour_id"]);?>">
                            <img src="<?php echo $promo["banner_image"]; ?>" style="width:100%;">
                          </a>
                        </div>

                        <div class="col-md-7 columns">
                          <div class="row">
                            <div class="col-md-12 columns">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$promo["tout_url"].'-'.$promo["tour_id"]);?>">
                                    <?php echo $promo ["tout_name"]; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5 columns packetprice">
                          <div class="price">
                            <span class="pull-right priceprice">
                            <?php
                                if(!empty($promo["price"])){

                                    echo $promo["price"]["sale_adult_price"];
                                    echo " ".$this->lang->line("global_lang_baht");
                                  //text-decoration: line-through; color: #โค้ดสีเส้น;
                                }else{
                                  echo "Call";
                                  echo " ".$this->lang->line("global_lang_baht");
                                }
                              ?>
                            </span>
                            <span class="glyphicon glyphicon-tags pull-right"></span>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php
                    endforeach;
                  endif;
                  ?>
      </div>
    </div>
<!-- END col-md-4 and row  -->

  </div>
  <div class="col-md-8">
     <h2 class="head_title pull-left col-md-12" ><span style="font-size:23px;"></span><?php echo $article["title"]; ?></h2>
    <div class="row">

      <!--  Start  slide
      <div class="col-md-12">
      
      <section class="slider ">
        <div class="flexslider">
          <ul class="slides">
             <?php foreach ($images as $key => $image) {   ?>
              <li>
                <img src="<?php echo $image['url'];?>" />
              </li>
            <?php }
             ?>

          </ul>
        </div>
      </section>
      
      </div>
      end col-md-12 -->

     
      <!-- Gallery -->
        <div class="col-md-12" style="">
          <?php
          if(!empty($images)):
          ?>
          <div class="row" id="gallery_row">
            <section class="gallery_pc">
              <div class=" columns">
                <div id="gallery" class="content">
                  <div id="controls" class="controls"></div>
                  <div class="slideshow-container">
                    <div id="loading" class="loader"></div>
                    <div id="slideshow" class="slideshow"></div>
                  </div>
                  <div id="caption" class="caption-container"></div>
                </div>
              </div>
              <div class=" columns">
                <div id="thumbs" class="navigation">
                  <ul class="thumbs noscript">
                    <?php
                      //print_r($images); exit;
                    if(!empty($images)){
                      foreach ($images as $key => $value) {
                    ?>
                    <li>
                      <a class="thumb"  href="<?php echo $value['url'];?>" >
                        <img src="<?php echo $value['url'];?>" alt="<?php echo $article["title"];?>" />
                        <div><span></span></div>
                      </a>
                      <div class="captions">
                        <div class="image-title"><?php echo $article["title"];?></div>
                        <div class="image-desc"></div>
                      </div>
                    </li>
                    <?php
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </section>
            <section class="gallery_mobile">
              <ul id="gallery_mobile">
                <?php
                  //print_r($images); exit;
                if(!empty($images)){
                  foreach ($images as $key => $value) {
                ?>
                  <li>
                    <a href="<?php echo $value['url'];?>">
                      <img src="<?php echo $value['url'];?>" alt="<?php echo $article["title"];?>" />
                    </a>
                  </li>
                <?php
                  }
                }
                ?>
              </ul>
            </section>
          </div>
          <?php
            endif;
          ?>
          <!-- End Gallery -->

        </div>



    </div>

  <div class="row">
      <div class="col-md-12 colmargin">
              <div class="social_network pull-right">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <!--<a class="addthis_counter addthis_pill_style"></a>-->
                </div>
                <!-- AddThis Button END -->
              </div>
      </div>
    </div>


      <div class="row">
        <div class="col-md-12">


          <!-- new -->

        <!--end-->
        

          <?php
                  if(!empty($type)){
           ?>

           <div class="">
              <h3 style=" margin-top:0px; padding:8px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                <?php echo $article["title"];?>
              </h3>
                <?php
                echo $article['body'];
                ?>
              </div>


                <?php
                  }else{
                  ?>
        <div class="col-md-4">
          <?php
                  if(! empty($article['body_column'][0])){
                    echo $article['body_column'][0];
                  }
                  ?>

        </div>
        <div class="col-md-4">
           <?php
                  if(! empty($article['body_column'][1])){
                    echo $article['body_column'][1];
                  }
                  ?>
        </div>
        <div class="col-md-4">
          <?php
                  if(! empty($article['body_column'][2])){
                    echo $article['body_column'][2];
                  }
                  ?>
        </div>

        <?php } ?>
      </div>
        </div>


        <div class="row">
          <div class="col-md-12" style="padding-bottom:20px;">
                          <h3 style=" margin-top:0px; padding:8px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                ชนิดโปรแกรมทัวร์
              </h3>
                <?php 
                  foreach($packettours as $packettour){   
                 ?>
                 <div class="col-md-4 marginpackket">
                 <div class="row">
                 <div class=" col-md-12 ">
                  <?php if(!empty($packettour['tour']['banner_image'])){ ?> 
                  <div class="pic_programtour" style="background-image:url(<?php echo base_url($packettour['tour']['banner_image']);?>);">
                  <!-- check img empty    delate dai -->
                  <?php }else{  ?>
                   <div class="pic_programtour" style="background-image:url(<?php echo base_url($packettour['tour']['first_image']);?>);">
                  <?php } ?>
                  <!-- -->
                    <div class="ribbon">
                      <?php if(empty($packettour['show_price']['discount_adult_price'])){ ?>
                        <div class="backribbon_programtour">
                          <div class="textbackribbon">
                            <strong><?php echo $packettour['show_price']['sale_adult_price']?> {_ global_lang_money_sign}</strong>
                          </div>
                        </div>
                      <?php }else{ ?>
                        <div class="backribbonsell">
                          <div class="textbackribbonsell1">
                            <strong >Promotion</strong>
                            <strong style="text-decoration: line-through;"><?php echo $packettour['show_price']['sale_adult_price']?> {_ global_lang_money_sign}</strong>
                          </div>
                          <div class="textbackribbonsell">
                            <strong><?php echo $packettour['show_price']['discount_adult_price']?></strong>
                          </div>
                        </div>
                      <?php } ?>
                      <div class="gimmick"></div>
                    </div>
                     <div class="pac_titlewalpaper">
                      <div class="back_wall"></div>
                        <h4 class="title_wal_programtour pull-left">
                          <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$packettour['tour']["tout_url"].'-'.$packettour['tour']["tour_id"]);?>" ><?php if(empty($packettour['tour']["tout_short_name"])){ echo $packettour['tour']["tout_name"]; }else{echo $packettour['tour']["tout_short_name"]; }?></a>
                        </h4>
                        <div class="title_place ">
                          <!-- ไอค้น จีงหวัด
                          <span class="glyphicon glyphicon-map-marker"></span> 
                          
                          <span class="placesell"> <?php echo $packettour['tour']['province']; ?> </span>
                          -->
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



      </div>
    </div>



  <!-- Gallery -->
  <script type="text/javascript" src="<?php echo $themepath.'/js/gallery/js/jquery.galleriffic.js';?>"></script>
  <!-- Gallery Mobile -->
  <link href="<?php echo $themepath.'/js/gallery_mobie/photoswipe.css';?>" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="<?php echo base_url('themes/uastravel2014/js/gallery_mobie/lib/klass.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo $themepath.'/js/gallery_mobie/code.photoswipe-3.0.5.min.js';?>"></script>
  <!--Hover effect-->
  <script type="text/javascript" src="<?php echo $themepath.'/js/DirectionAwareHoverEffect/js/jquery.hoverdir.js';?>"></script>

    <script type="text/javascript" src="<?php echo base_url('/themes/uastravel2014/js/home.js'); ?>"></script>

