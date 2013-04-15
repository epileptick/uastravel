<?php
  //print_r($hotel); exit;
  //echo $this->pagination->create_links();
  //echo "<br><br><br><br>";

  if(!empty($hotel)){

    foreach ($hotel as $key => $value) {
  ?>
    <div class="list_attractions" data-category="transition">
      <?php
          if(!empty($value["price"]->prh_sale_adult_price)){
      ?>
        <div class="sticker_status">
          <div class="sticker price">
            <?php
              //$sale_price = $value["price"]->prh_sale_adult_price - $value["price"]->prh_discount_adult_price;
              echo number_format($prh_sale_room_price, 0);
            ?>
            บาท
          </div>
        </div>
      <?php
          }
      ?>
      <a href="<?php echo base_url($this->lang->line("url_lang_hotel").'/'.$value['hotel']->hott_url.'-'.$value['hotel']->hot_id);?>" target="_blank" >
        <?php
          if($value['hotel']->hot_first_image){
        ?>
            <img src="<?php echo $value['hotel']->hot_first_image;?>">
        <?php
          }
        ?>
        <?php
          //print_r($value["price"]); exit;
          if(!empty($value["price"]->prh_discount_room_price )){

            if($value["price"]->prh_discount_room_price > 0){
        ?>

              <div class="promotion style2">
                <!--<img src="<?php echo base_url('themes/Travel/tour/images/best_price_en.png');?>">-->
                <img src="<?php echo base_url('themes/Travel/tour/images/best_price_th2.png');?>">
                <p>จาก
                  <span>
                    <?php
                      echo number_format($value["price"]->prh_sale_room_price);
                    ?>
                  </span>  ลดเหลือ
                  <span class="reduce_price">
                    <?php
                      echo number_format($value["price"]->prh_discount_room_price, 0);
                    ?>
                  </span> บาท
                  </p>
              </div>

        <?php
            }
          }
        ?>
      </a>
      <div class="row-fluid">
        <div class="span8">
          <h3>
            <a href="<?php echo base_url($this->lang->line("url_lang_hotel").'/'.$value['hotel']->hott_url.'-'.$value['hotel']->hot_id);?>" target="_blank" >
              <?php echo $value['hotel']->hott_name; ?>
            </a>
          </h3>
        </div>
        <div class="span4">
          <div class="rating one_star" style="display:none"></div>
          <div class="rating two_star" style="display:none"></div>
          <div class="rating three_star"></div>
          <div class="rating four_star" style="display:none"></div>
          <div class="rating five_star"style="display:none"></div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="border"></div>
      <div class="row-fluid">
        <div class="span7">
          <?php
              if(isset($value['hotel']->hott_name)){
            ?>
              <div class="icon hotel" rel="tooltip" title="แพ็กเก็จทัวร์"></div>
              <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
              <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
          <?php
              }
            ?>
        </div>
        <div class="span5">
          <span class="tag">
            <?php
              //print_r($value["tag"]); exit;
              foreach ($value["tag"] as $keyTag => $valueTag) {
            ?>
            <a href="<?php echo base_url($this->lang->line("url_lang_hotel").'/'.$valueTag["url"]);?>" style="color: #0CACE1;">
              <?php echo $valueTag["name"]; ?>
            </a>
            <?php
              }
            ?>
          </span>
          <span class="icon  tag_icon"></span>
        </div>
      </div>
    </div>

<?php
    }
  }//End loop hotel
?>
<?php include_once("themes/Travel/hotel/analyticstracking.php") ?>