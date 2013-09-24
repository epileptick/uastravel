<?php
  if(!empty($tours["tour"])){
    foreach ($tours["tour"] as $key => $value) {
      if(!empty($value['price'])){
?>

    <li class="sortable_item">
      <div class="list_packet">
        <div class="row">
          <div class="twelve columns">
            <a href="<?php echo base_url("tour/".$value["tour"]["tout_url"]."-".$value["tour"]["tour_id"]); ?>" target="_blank">
              <img src="<?php echo $value["tour"]["banner_image"]; ?>">
            </a>
          </div>
          <div class="twelve columns">
            <div class="row">
              <div class="nine columns">
                <div class="title_tour">
                  <h4>
                    <a href=""><?php echo $value['tour']["tout_name"]; ?></a>
                    <?php
                      if($tours["filter"]["defaulttag_id"] == 85){
                        $day = 0.5;
                      }else if($tours["filter"]["defaulttag_id"] == 95){
                        $day = 1;
                      }else if($tours["filter"]["defaulttag_id"] == 166){
                        $day = 2;
                      }else if($tours["filter"]["defaulttag_id"] == 163){
                        $day = 3;
                      }
                    ?>
                    <input  class="item_property"
                            type="hidden"
                            id="packagedata"
                            name="packagedata[]"
                            value="<?php echo $value['tour']["tour_id"]; ?>"
                            packagetype="tour"
                            packageid="<?php echo $value['tour']["tour_id"]; ?>"
                            title="<?php echo $value['tour']["tout_name"]; ?>"
                            adultprice="<?php echo $value['price']->pri_sale_adult_price; ?>"
                            childprice="<?php echo $value['price']->pri_sale_child_price; ?>"
                            discountadultprice="<?php echo $value['price']->pri_discount_adult_price; ?>"
                            discountchildprice="<?php echo $value['price']->pri_discount_child_price; ?>"
                            tag="<?php echo $tours["filter"]["defaulttag"]; ?>"
                            tagid="<?php echo $tours["filter"]["defaulttag_id"]; ?>"
                            totalday="<?php echo $day; ?>"
                    />
                  </h4>
                </div>
              </div>
              <div class="three columns">
                <div class="rating three_star"></div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="border"></div>
          </div>
          <div class="twelve columns">
            <div class="icon time tooltip_se" title="เวลา">
              <!-- <?php echo $value['tour']->tou_start_time1; ?> - <?php echo $value['tour']->tou_end_time1; ?> -->
              N/A
            </div>
            <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
            <div class="price"><span><?php echo $value['price']->pri_sale_adult_price; ?> B</span> / <?php echo $day; ?> วัน</div>
          </div>
        </div>
      </div>
      <a class="delete tooltip_ne" title="ลบ" packageid="<?php echo $value['tour']["tour_id"]; ?>"></a>
      <a class="add tooltip_ne" title="เพิ่ม"></a>
    </li>

<?php
      }
    }
  }else{
    echo "No data";
  }
?>