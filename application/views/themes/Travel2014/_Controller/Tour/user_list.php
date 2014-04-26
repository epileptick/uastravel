โย้ว user list นะโว้ย

<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/user_view.css').'">'); ?>
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/tour_userview.css').'">'); ?>
<link rel="stylesheet" href="<?php echo base_url('themes/uastravel2014/css/flexslider.css'); ?>" type="text/css" media="screen" />
  <!-- FlexSlider -->
  <script defer src="<?php echo base_url('themes/uastravel2014/js/jquery.flexslider.js'); ?>"></script>


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

		<!-- new google map  AND tour small -->
		<div class="row">
			<div class="col-md-12">
				<br / >
				<h3><?php echo $this->lang->line("tour_lang_packages_tour_suggest");?></h3>

                  <?php
                  if(!empty($related )):
                    foreach ($related as $key => $value):
                  ?>
                    <div class="list_packet">
                      <div class="row">
                        <div class="col-md-12 columns">
                          <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                            <img src="<?php echo $value["tour"]->tou_banner_image; ?>" alt="<?php echo $value["tour"]->tout_name; ?>" style="width:100%;">
                          </a>
                        </div>

                        <div class="col-md-12 columns">
                          <div class="row">
                            <div class="col-md-12 columns">
                              <div class="title_tour">
                                <h4>
                                  <a href="<?php echo $value["tour"]->tout_url."-".$value["tour"]->tou_id; ?>">
                                    <?php echo $value["tour"]->tout_name; ?>
                                  </a>
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="border"></div>
                        </div>
                        <div class="col-md-12 columns">

                          <div class="price">
                          	
                            <span class="pull-right">
                            <?php
                                if(!empty($value["price"]->pri_sale_adult_price)){
                                  if($value["price"]->pri_discount_adult_price>0){
                                    $priceAdultDiscount = number_format($value["price"]->pri_discount_adult_price, 0);
                                    $priceAdult = number_format($value["price"]->pri_sale_adult_price, 0);
                                    echo "<f style='text-decoration: line-through;'>".$priceAdult."</f>&nbsp;".$priceAdultDiscount;
                                    echo " ".$this->lang->line("global_lang_baht");
                                  }else{
                                    echo number_format($value["price"]->pri_sale_adult_price, 0);
                                    echo " ".$this->lang->line("global_lang_baht");
                                  }
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
		<!-- END google map -->






			</div>
		</div>
<!-- END col-md-4 and row  -->






	</div>
	<div class="col-md-8">
     <h2 class="head_title pull-left"><?php echo $article["title"];?></h2>
		<div class="row">
			<div class="col-md-12">
			<!-- slide -->
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
      <!--end-->
			</div>
		</div>

			<div class="row">
				<div class="col-md-12">


					<p ></p>

					<h3 style="padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                    <?php echo $this->lang->line("tour_lang_tour_price"); ?>
                  </h3>
                  <!-- Table new-->
           			<div class="row">
           				<div class="col-md-12">


                </div>
                </div>

           <!-- Table new --> 
              


					<h3 style=" margin-top:0px; padding:4px 4px 8px 4px; border:2px solid; border-color:#FAA20A; background-color:#FAA20A; color:#FFF; text-shadow: none !important;">
                    <?php echo $this->lang->line("tour_lang_program_and_itinerary");?>
                  </h3>

           
					<p></p>



  



				</div>
			</div>


	</div>
</div>

