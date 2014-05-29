<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/user_view.css').'">'); ?>
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/tour_userview.css').'">'); ?>
<div class="row">
	<div class="col-md-4">

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
			      <h1 class="head_title">รายการทัวร์ที่จัดโดยสมาชิก</h1>
	<div class="row">
		<div class="col-md-12" style="margin-top:15px; margin-bottom:15px;">
	      <div class="backyoutube">
	        <iframe width="740" height="410" src="http://www.youtube.com/embed/Rns13G5eMFc" frameborder="0" allowfullscreen></iframe>
	        <a href="<?php echo base_url("customtour/create");?> " target="_blank">
          </a>
	      </div>
	    </div>
	</div>

	    <div class="row">
	    	<div class="col-md-12">
	    		<h1 class="head_title">รายการทัวร์ที่จัดโดยสมาชิก</h1>
	    		    <div class="col-md-12 ">


            </div>
	    	</div>
	    </div>
	</div>
</div>