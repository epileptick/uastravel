

<?php
  //print_r($tour); exit;

  if(!empty($home)){

    foreach ($home as $key => $value) {
  ?>
    <div class="list_attractions" data-category="transition">
      <!-- div class="sticker new">New</div -->
      <?php 
        if(isset($value["tour"]->tou_url)){
      ?>
          <a href="<?php echo base_url('tour/'.$value["tour"]->tou_url.'-'.$value["tour"]->tou_id);?>">
      <?php
        }else if(isset($value["location"]->loc_url)){
      ?>
          <a href="<?php echo base_url('location/'.$value["location"]->loc_url.'-'.$value["location"]->loc_id);?>">
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
        <div><span></span></div>
      </a>


      <!-- Title/Name-->
      <div class="row-fluid">
        <div class="span8">
          <h3>
            <?php 
              if(isset($value["tour"]->tou_url)){
            ?>
                <a href="<?php echo base_url('tour/'.$value["tour"]->tou_url.'-'.$value["tour"]->tou_id);?>">
            <?php
              }else if(isset($value["location"]->loc_url)){
            ?>
                <a href="<?php echo base_url('location/'.$value["location"]->loc_url.'-'.$value["location"]->loc_id);?>">
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
            <img src="<?php echo base_url('themes/Travel/tour/images/icon/24tour.png');?>" style="margin-left:7px;">
            <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
            <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
        <?php
            }else if(isset($value["location"]->loc_title)){
          ?>
            <img src="<?php echo base_url('themes/Travel/tour/images/icon/24location.png');?>" style="margin-left:7px;">
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