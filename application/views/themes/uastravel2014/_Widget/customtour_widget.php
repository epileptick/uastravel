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