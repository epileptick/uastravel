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
			      <h1 class="head_title"><?php echo $article["title"];?></h1>
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="margin-top:15px; margin-bottom:15px;">
	      <div class="backyoutube">
	        <iframe width="360" height="210" src="http://www.youtube.com/embed/Rns13G5eMFc" frameborder="0" allowfullscreen></iframe>
	        <a href="<?php echo base_url("customtour/create");?> " target="_blank">
            <img src="<?php echo $imagepath.'/picyoutube.png' ?>" />
          </a>
	      </div>
	    </div>
	</div>

	    <div>
	      <div class="row">
	        <div class="col-md-7" style="width:100%">
	            <?php
	            if(! empty($article['body_column'][0])){
	              echo $article['body_column'][0];
	            }
	            ?>
	        </div>
	      </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-12">
	    		<h1 class="head_title">รายการทัวร์ที่จัดโดยสมาชิก</h1>
	    		    <div class="col-md-12 ">

      <?php
        if(!empty($customtour)) {
          foreach ($customtour as $key => $value) {

      ?>   
      <div class="packet" style="margin"> 
        <div class="img-pecket">
          <div class="row ">
            <a href="<?php echo base_url('customtour/'.$value["url"]);?>" target="_blank">
            <div class="col-md-4">
              <?php if (!empty($value["images"][1])){ ?>
              <img src="<?php echo $value["images"][1]  ?>"> 
              <?php }else{ ?>
              <img src="<?php echo $imagepath.'/no_image.png'?>"> 
              <?php } ?>
            </div>
            <div class="col-md-8" style="padding-left:0px; padding-right:0px;">
            <div class="media-body">
                <h4 class="media-heading hig"><?php echo $value["package_name"];?></h4>
                <span style=""><?php echo (!empty($value["short_description"][0])?mb_substr($value["short_description"][0],0,120):"");?></span>
                 <div class="row viewmore">
                  <div class="col-md-12">
                    <!--<a href="#">View More</a>-->
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>

      <?php
            }
          }else{
        ?>
          <div class="alert-error">
            <h4 class="text-center">No Data</h4>
          </div>
        <?php
          }
        ?>
    </div>

	    	</div>
	    </div>
	</div>
</div>