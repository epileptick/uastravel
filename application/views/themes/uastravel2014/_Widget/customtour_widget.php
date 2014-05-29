
    <div class="col-md-4 ">
      <div class="box-menu">
        <span>รายการจัดทัวร์โดยสมาชิก</span>
      </div>
      <?php
        if(!empty($customtour)) {
          foreach ($customtour as $key => $value) {

      ?>   
      <div class="packet" style="margin"> 
        <div class="img-pecket">
          <div class="row">
            <a href="<?php echo base_url('customtour/'.$value["url"]);?>" target="_blank">
            <div class="col-md-4">
              <?php if (!empty($value["images"][1])){ ?>
              <img src="<?php echo $value["images"][1]  ?>"> 
              <?php }else{ ?>
              
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

   <div class="row viewmore">
      <div class="col-md-12">
        <a href="<?php echo base_url("customtour");?>">View More</a>
      </div>
    </div>

    </div>
<!--
      <div class="packet" style="margin"> 
        <div class="img-pecket">
          <div class="row">
            <div class="col-md-4">
              <img src= "<?php echo $imagepath.'/egg2.jpg' ?>"  />
            </div>
            <div class="col-md-8" style="padding-left:0px; padding-right:0px;">
            <div class="media-body">
                <h4 class="media-heading hig">เที่ยวภูเก็ต</h4>
                <span style="">ทัวร์เกาะตาชัย 1 วัน สัมผัสความบริสุทธิ์และธรรมชาติที่สมบูรณ์ที่สุดแห่งท้องทะเลอันดามัน</span>
                 <div class="row viewmore">
                  <div class="col-md-12">
                    <a href="#">View More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
-->














<!--
<div class="row">
  <div class="twelve columns">
    <h1 class="head_title">รายการทัวร์ที่จัดโดยสมาชิก</h1>
    <div class="row">
        <div class="twelve columns">
      <?php
        if(!empty($customtour)) {
          foreach ($customtour as $key => $value) {
      ?>
            <div class="six columns">
              <div class="customtour_item">
                <a href="<?php echo base_url('customtour/'.$value["url"]);?>" target="_blank">
                  <div class="three columns customtour_result_item_image" style="background:url(<?php echo (!empty($value["images"][0]) ? $value["images"][0] :$imagepath."/camera_icon.jpg");?>)  center center;background-size: auto 100%;background-repeat: no-repeat;">
                    
                  </div>
                </a>
                <div class="nine columns search_result_item_detail">
                  <h2 class="customtour_tour_name">
                    <a href="<?php echo base_url('customtour/'.$value["url"]);?>" target="_blank">
                      <?php echo $value["package_name"];?>
                    </a>
                  </h2>
                  
                  <h3 class="customtour_tour_description">
                    <?php echo (!empty($value["short_description"][0])?mb_substr($value["short_description"][0],0,120):"");?>
                  </h3>
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
      <hr>
      <a href="<?php echo base_url("customtour");?>" class="btn btn-success pull-right"><?php echo $this->lang->line("customtour_lang_more_tour_list");?></a>
  </div>
</div>
-->