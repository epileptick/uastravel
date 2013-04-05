<?php
  if(!empty($location)){

    foreach ($location as $key => $value) {
  ?>
    <div class="list_attractions" data-category="transition">
      <!-- div class="sticker new">New</div -->
      <a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value['location']["url"].'-'.$value['location']["id"]);?>" target="_blank" >
        <?php
          if($value['location']["first_image"]){
        ?>
            <img src="<?php echo $value['location']["first_image"];?>">
        <?php
          }
        ?>
        <div><span></span></div>
      </a>
      <div class="row-fluid">
        <div class="span8">
          <h3>
            <a href="<?php echo base_url($this->lang->line("url_lang_location").'/'.$value['location']["url"].'-'.$value['location']["id"]);?>" target="_blank" >
            <?php echo $value['location']["title"]; ?>
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
            if(isset($value['location']["title"])){
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
            <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$valueTag["url"]);?>" style="color: #0CACE1;">
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
  }//End loop tour
?>

<?php include_once("themes/Travel/tour/analyticstracking.php") ?>