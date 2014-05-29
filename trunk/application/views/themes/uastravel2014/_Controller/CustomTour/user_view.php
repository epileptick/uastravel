<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/customtour.css').'">'); ?>
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
     <h2 class="head_title pull-left col-md-12" >
      <?php echo $packageData["package_name"];?>
    </h2>
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
          if(!empty($packageTour)):
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
                      foreach ($packageTour as $day => $dayValue):
                        foreach ($dayValue as $count => $item):
                        if(!empty($item["images"])){
                          foreach ($item["images"] as $key => $value) { 
                    ?> 
                    <?php
                      //print_r($images); exit;

                   /* if(!empty($images)){
                      foreach ($images as $key => $value) {*/
                    ?>
                    <li>
                      <a class="thumb"  href="<?php echo $value['url'];?>" >
                        <img src="<?php echo $value['url'];?>" alt="<?php echo $packageData["package_name"];?>" />
                        <div><span></span></div>
                      </a>
                      <div class="captions">
                        <div class="image-title"><?php echo $packageData["package_name"];?></div>
                        <div class="image-desc"><?php echo $item["short_description"]; ?></div>
                      </div>
                    </li>
                    <?php
                      }
                      }
                      endforeach; endforeach;
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
                      <img src="<?php echo $value['url'];?>" alt="<?php echo $tour[0]["name"];?>" />
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

      <div class="col-md-6">
<!-- รหัส ทัวร์  
      <ul class="tags codepost">

        <li><a class="tags_name" href="#">รหัส</a></li>
      <li class="child"><<?php echo $tour[0]["code"];?></li>
      </ul>
-->
    </div>
      <div class="col-md-4 col-md-offset-2">
              <div class="social_network ">
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



      <div>
        <h3 style=" margin-top:0px; padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
        <?php echo $this->lang->line("tour_lang_program_and_itinerary");?>
        </h3>
      </div>




                <?php
                  foreach ($packageTour as $day => $dayValue):
                ?>
      <div class="row">
          <div class="col-md-12 content">
            <h3>
              <span>วันที่ <?php echo ++$day;?> <?php
                    if(count($dayValue)>1){
                      echo $dayValue[0]["name"]." และ ".$dayValue[1]["name"];
                    }else{
                      echo $dayValue[0]["name"];
                    }
                  ?>
              </span>
            </h3>
            <div class="row">
              <div class="col-md-12">
                <span class="description_tour">
                <?php
                  foreach ($dayValue as $count => $item):
                ?>
                  <?php echo $item["short_description"] ?>
                  <?php
                    if(count($dayValue)>1 and $count == 0){
                      echo " และ ";
                    }
                  ?>
                <?php
                  endforeach;
                ?>
                </span>
                <div>
                  <?php
                    foreach ($dayValue as $count => $item):
                  ?>
                  <div class="article_packagetour">
                    <h4 style="text-align: center;float: left; margin-bottom:10px; width:100%"><?php echo $item["name"];?></h4>
                    <p>
                      <?php echo $item["detail"];?>
                    </p>
                  </div>
                <?php
                  endforeach;
                ?>
                </div>
            </div>
          </div>
          </div>
          </div>

          <!-- END Row Package -->
          <?php
            endforeach;
          ?>


              <div class="row">
              <div class="col-md-12">

              <form name="form" action="<?php echo base_url($this->lang->line("url_lang_tour").'/inquiry');?>" method="post">
                <?php
                  if(!empty($packageTour)){
                ?>
                <div class="row">
                <h3 style="padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                  <?php echo $this->lang->line("tour_lang_tour_price"); ?>
                </h3>
                  <?php
                    foreach ($packageTour as $day => $dayValue):
                  ?>
                  <table class="table table-hover">

                    <?php
                    $countPrice =0;
                    foreach ($dayValue as $tourPriceKey => $tourPriceValue) {
                      ?>
                      <thead>
                        <tr>
                          <th class="five"><?php echo $this->lang->line("tour_lang_tour_list"); echo $tourPriceValue["name"];?> </th>
                          <th class="two"><?php echo $this->lang->line("tour_lang_tour_adult_price"); ?></th>
                          <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                          <th class="two"><?php echo $this->lang->line("tour_lang_tour_child_price"); ?></th>
                          <th class="one"><?php echo $this->lang->line("tour_lang_tour_amount"); ?></th>
                        </tr>
                      </thead>
                    <tbody>
                      <?php
                      $countPrice = count($tourPriceValue["price"]);
                      foreach ($tourPriceValue["price"] as $key => $value) {
                      ?>                    
                      <tr>
                        <td>
                          <?php
                            if($value["show_firstpage"] == 1){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]" class="checked_price"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])? $value["name"] : "");?>
                              </label>
                          <?php
                            }else if($countPrice == 0){
                          ?>
                              <label for="checkbox_<?php echo $value["price_id"];?>">
                                <input name="price_id[]" class="checked_price"
                                        type="checkbox"
                                        id="checkbox_<?php echo $value["price_id"];?>"
                                        value="<?php echo $value["price_id"];?>"
                                        CHECKED
                                >
                                <?php echo (!empty($value["name"])?$value["name"] : "");?>
                              </label>
                          <?php

                            }else{
                          ?>
                            <label for="checkbox_<?php echo $value["price_id"];?>">
                              <input name="price_id[]" class="checked_price"
                                      type="checkbox"
                                      id="checkbox_<?php echo $value["price_id"];?>"
                                      value="<?php echo $value["price_id"];?>"
                              >
                              <?php echo (!empty($value["name"])?$value["name"]:"");?>
                            </label>
                          <?php
                            } //End
                          ?>
                        </td>
                        <td>
                            <?php
                                if($value["discount_adult_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_adult_price"], 0);?></strike>
                                <?php echo number_format($value["discount_adult_price"], 0);?></label></center>
                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_adult_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>
                        <td>
                          <?php
                            if($value["show_firstpage"] == 1){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]" 
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="form-control text-center"
                                      value="1">
                          <?php
                            }else if($countPrice == 0){
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]" 
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="form-control text-center"
                                      value="1">
                          <?php
                            }else{
                          ?>
                              <input name="adult_amount_booking[<?php echo $value["price_id"];?>]" 
                                      type="text"
                                      id="amount_adult_<?php echo $value["price_id"];?>"
                                      class="form-control text-center"
                                      value="0">
                          <?php
                              }
                           ?>
                        </td>
                        <td>
                            <?php
                                if($value["discount_child_price"]>0){
                            ?>
                                 <center><label><strike><?php echo number_format($value["sale_child_price"], 0);?></strike>
                                <?php echo number_format($value["discount_child_price"], 0);?></label></center>
                              <?php
                            }else{
                              ?>
                                <center><label><?php echo number_format($value["sale_child_price"], 0);?></label></center>
                            <?php
                                }
                             ?>
                        </td>

                        <td >
                          <input name="child_amount_booking[<?php echo $value["price_id"];?>]" class="child_amount_booking"
                                  type="text"
                                  id="amount_child_<?php echo $value["price_id"];?>"
                                  class="twelve text-center"
                                  value="0"
                          >
                        </td>
                      </tr>
                    <?php
                      $countPrice++;
                      }
                    }
                    endforeach;
                    ?>
                      <tr>
                        <td class="price_booking" colspan="5">
                          <input type="hidden" name="id" value="<?php echo $packageData["id"];?>">
                          <input type="hidden" name="type" value="customtour">
                          <input class="btn btn-primary float-right"  type="submit" value="<?php echo $this->lang->line("tour_lang_tour_booking");?>">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
                <?php
                  }
                ?>
                <!-- End price -->
              </form>
              
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

