<?php
  //print_r($tour); exit;

  if(!empty($home)){

    foreach ($home as $key => $value) {
  ?>
    <div class="list_attractions" data-category="transition">
      <!-- div class="sticker new">New</div -->
      <?php 
        if(isset($value->tou_url)){
      ?>
          <a href="<?php echo base_url($value->tou_url);?>">
      <?php
        }else if(isset($value->loc_url)){
      ?>
          <a href="<?php echo base_url($value->loc_url);?>">
      <?php
        }
      ?>  
        <?php
          if($value->tou_first_image){
        ?>
            <img src="<?php echo $value->tou_first_image;?>">
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
              if(isset($value->tou_url)){
            ?>
                <a href="<?php echo base_url('tour/'.$value->tou_url.'-'.$value->tou_id);?>">
            <?php
              }else if(isset($value->loc_url)){
            ?>
                <a href="<?php echo base_url('location/'.$value->loc_url.'-'.$value->loc_id);?>">
            <?php
              }
            ?>  
            <?php 
              if(isset($value->tou_name)){
                echo $value->tou_name;
              }else if(isset($value->loc_title)){
                echo $value->loc_title;
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
          <div class="icon view" rel="tooltip" title="จำนวนคนดู">1358</div>
          <div class="icon comment" rel="tooltip" title="จำนวนคอมเม้น">25</div>
        </div>
        <div class="span5">
          <span class="tag">
          <?php 
            if(isset($value->tou_name)){
          ?>
            <a href="<?php echo base_url('tour/'.$value->tag_url);?>" style="color: #0CACE1;">
          <?php
            }else if(isset($value->loc_title)){
          ?>
            <a href="<?php echo base_url('location/'.$value->tag_url);?>" style="color: #0CACE1;">
          <?php
            }
          ?> 
              <?php echo $value->tag_name; ?>
            </a>
          </span>
          <span class="icon  tag_icon"></span>
        </div>
      </div>
    </div>

<?php
    }
  }//End loop tour 
?>