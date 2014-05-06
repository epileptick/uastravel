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

{_widget menutoursmall}
<!-- END col-md-4 and row  -->

  </div>
  <div class="col-md-8">
     <h2 class="head_title pull-left col-md-12" ><span style="font-size:23px;"></span><?php echo $article["title"];?></h2>
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

        <!--
        <div class="col-md-12">
          <?php
                  if(! empty($article['body_column'][0])){
                    echo $article['body_column'][0];
                    echo $article['body_column'][1];
                    echo $article['body_column'][2];
                  }
                  ?>
        </div>

      -->
      
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

