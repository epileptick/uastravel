

<?php
  //print_r($tour); exit;

  if(!empty($home)){

    foreach ($home as $key => $value) {
  ?>
    <div class="list_attractions" data-category="transition">
      <?php
          if(!empty($value["price"]->agt_sale_adult_price)){
      ?>
            <div class="sticker_status">
              <div class="sticker price">
                <?php  
                  echo number_format($value["price"]->pri_sale_adult_price, 0);
                ?>
                บาท
              </div> 
            </div>                                 
      <?php                                    
          }
      ?>
      <?php 
        if(isset($value["tour"]->tou_url)){
      ?>
          <a href="<?php echo base_url('tour/'.$value["tour"]->tou_url.'-'.$value["tour"]->tou_id);?>" target="_blank" >
      <?php
        }else if(isset($value["location"]->loc_url)){
      ?>
          <a href="<?php echo base_url('location/'.$value["location"]->loc_url.'-'.$value["location"]->loc_id);?>" target="_blank" >
      <?php
        }
      ?>  
        <?php
          if(!empty($value["tour"]->tou_first_image)){
        ?>
            <img src="<?php echo $value["tour"]->tou_first_image;?>">
        <?php
          }else if(!empty($value["location"]->loc_first_image)){
        ?>
            <img src="<?php echo $value["location"]->loc_first_image;?>">
        <?php

          }
        ?>

          <?php
            //print_r($value["price"]); exit;
            if($value["price"]->pri_discount_adult_price > 0){
          ?>

            <div class="promotion style2">
              <!--<img src="<?php echo base_url('themes/Travel/tour/images/best_price_en.png');?>">-->
              <img src="<?php echo base_url('themes/Travel/tour/images/best_price_th2.png');?>">
              <p>จาก 
                <span>
                  <?php
                    echo number_format($value["price"]->pri_sale_adult_price);
                  ?>
                </span>  ลดเหลือ 
                <span class="reduce_price"> 
                  <?php
                    echo number_format($value["price"]->pri_discount_adult_price, 0);
                  ?>
                </span> บาท
                </p>
            </div>

          <?php
            }
          ?>
      </a>


      <!-- Title/Name-->
      <div class="row-fluid">
        <div class="span8">
          <h3>
            <?php 
              if(isset($value["tour"]->tou_url)){
            ?>
                <a href="<?php echo base_url('tour/'.$value["tour"]->tou_url.'-'.$value["tour"]->tou_id);?>" target="_blank" >
            <?php
              }else if(isset($value["location"]->loc_url)){
            ?>
                <a href="<?php echo base_url('location/'.$value["location"]->loc_url.'-'.$value["location"]->loc_id);?>" target="_blank" >
            <?php
              }
            ?>  
            <?php 
              if(isset($value["tour"]->tou_name)){
                echo $value["tour"]->tou_name;
              }else if(isset($value["location"]->loc_title)){
                echo $value["location"]->loc_title;
              }
            ?>  
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
            if(isset($value["tour"]->tou_name)){
          ?>
            <div class="icon tour" rel="tooltip" title="แพ็กเก็จทัวร์"></div>
            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
        <?php
            }else if(isset($value["location"]->loc_title)){
          ?>
            <div class="icon location" rel="tooltip" title="แหล่งท่องเทียว"></div>
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
              <a href="<?php echo base_url('tour/'.$valueTag->tag_url);?>" style="color: #0CACE1;">
                <?php echo $valueTag->tag_name; ?>
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
  }//End loop tour 
?>

<?php include_once("themes/Travel/tour/analyticstracking.php") ?>