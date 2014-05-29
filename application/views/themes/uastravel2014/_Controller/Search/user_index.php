
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/search.css').'">'); ?>
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
    <!--
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
                        <div class="col-md-12 ">
                          <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$promo["tout_url"].'-'.$promo["tour_id"]);?>">
                            <img src="<?php echo $promo["banner_image"]; ?>" style="width:100%;">
                          </a>
                        </div>

                        <div class="col-md-12 ">
                          <div class="row">
                            <div class="col-md-12 ">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$promo["tout_url"].'-'.$promo["tour_id"]);?>">
                                    <?php echo $promo ["tout_name"]; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="border"></div>
                        </div>
                        <div class="col-md-12 ">

                          <div class="price">
                            
                            <span class="pull-right">
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
  <div class="col-md-8 stylecol8">

     <h2 class="head_title pull-left col-md-12" ><span style="font-size:23px;"></span><?php echo $this->lang->line("search_result");?>'<?php echo $tour[0]['keyword']; ?>' </h2>
          <div class="row">
                <div class="col-md-12 ">
              <?php
                if(!empty($tour)) {
                  foreach ($tour as $key => $value) {
              ?>
                    <div class="col-md-12 search_result_item">
                      <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tout_url"].'-'.$value["tour_id"]);?>" target="_blank">
                        <div class="col-md-2  search_result_item_image" style="">
                          <img src="<?php echo $value["first_image"];?>">
                        </div>
                      </a>
                      <div class="col-md-8  search_result_item_detail">
                        <h2 class="search_result_tour_name">
                          <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tout_url"].'-'.$value["tour_id"]);?>" target="_blank">
                            <?php echo $value["tout_name"];?>
                          </a>
                        </h2>
                        
                        <h3 class="search_result_tour_description">
                          <?php echo $value["short_description"];?>
                        </h3>
                      </div>
                      <div class="col-md-2  search_result_tour_price">
                        <h3>{_global_lang_title_money_sign}</h3>
                        <h3 class="search_result_tour_price_price"><?php
                          if(!empty($value["firstpage_price"])){
                            echo (!empty($value["selected_price"]["discount_adult_price"])? $value["selected_price"]["discount_adult_price"]:$value["selected_price"]["sale_adult_price"]);
                          }else{
                            echo "-";
                          }
                        ?></h3>
                        <h3 class="search_result_tour_price"> {_global_lang_money_sign}</h3>
                      </div>
                    </div>
              <?php
                  }
                }else{
              ?>
                <div class="alert-error">
                  <h4 class="text-center"><?php echo $this->lang->line("search_lang_no_result"); ?></h4>
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

