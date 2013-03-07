<?php 
  //print_r($tours); exit;

  if(!empty($tours["tour"])){

    foreach ($tours["tour"] as $key => $value) {
      //print_r($value); exit;

      if(!empty($value['price'])){
?>

    <li>
      <div class="list_packet">
        <div class="row">
          <div class="twelve columns">              
            <a href="<?php echo base_url("tour/".$value["tour"]->tout_url."-".$value["tour"]->tou_id); ?>" target="_blank">
              <img src="<?php echo $value["tour"]->tou_banner_image; ?>">
            </a>
          </div>
          <div class="twelve columns">
            <div class="row">
              <div class="nine columns">
                <div class="title_tour">
                  <h4>
                    <a href=""><?php echo $value['tour']->tout_name; ?></a>
                    <?php
                      if($tours["filter"]["defaulttag"] == "ทัวร์ครึ่งวัน"){
                        $day = 0.5;
                      }else{
                        $day = 1;
                      }
                    ?>                    

                    <input  type="hidden" 
                            id="packagedata"
                            packagetype="tour"
                            packageid="<?php echo $value['tour']->tou_id; ?>" 
                            title="<?php echo $value['tour']->tout_name; ?>" 
                            adultprice="<?php echo $value['price']->pri_sale_adult_price; ?>"
                            childprice="<?php echo $value['price']->pri_sale_child_price; ?>"
                            discountadultprice="<?php echo $value['price']->pri_discount_adult_price; ?>"
                            discountchildprice="<?php echo $value['price']->pri_discount_child_price; ?>"
                            tag="<?php echo $tours["filter"]["defaulttag"]; ?>"
                            day="<?php echo $day; ?>"
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
              08.00 - 15.30 
            </div>
            <div class="icon readmore tooltip_se" title="คลิกเพื่อดูรายละเอียด"><a href="#" data-reveal-id="myModal">รายละเอียด</a></div>
            <div class="price"><span><?php echo $value['price']->pri_sale_adult_price; ?> B</span> / 3 วัน</div>
          </div>
        </div>
      </div>
      <a class="delete tooltip_ne" title="ลบ" packageid="<?php echo $value['tour']->tou_id; ?>"></a>
      <a class="add tooltip_ne" title="เพิ่ม"></a>
    </li>

<?php
      }
    }
  }else{
    echo "Not data";
  }
?>