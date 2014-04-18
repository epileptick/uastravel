<?php
  if(!empty($tour) ){
    echo "<ul class=\"sub-menu tour-list\">";
    foreach ($tour as $key => $value) {
      if(!empty($value["tour"])){
    ?>
      <li>

        <a class="ajax-click"  href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value["tour"]["tout_url"].'-'.$value["tour"]["tour_id"]);?>">
        <?php
          if($value["tour"]["first_image"]){
        ?>
          <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $value["tour"]["first_image"];?>">
        <?php
          }else{
        ?>
          <img style="width:30px;height:30px;margin-top:-4px;" src="<?php echo $imagepath;?>/camera_icon.jpg">
        <?php
          }
        ?>
          <?php echo (!empty($value['tour']["tout_short_name"]) ? $value['tour']["tout_short_name"] : $value['tour']["tout_name"]); ?>
        </a></li>
    <?php
      }
    }
    echo "</ul>";
  }else{
    echo "<li><a href='#' style='font-size: 16px;color:#4e4e4e;'> <img style=\"vertical-align: top;margin-top: 12px;margin-left: 8px;\" src=\"$themepath/images/list.png\"> ".$this->lang->line("global_lang_data_not_found")."</a></li>";
  }