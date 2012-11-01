<?php

  if($images){
    foreach($images AS $key=>$value):
?>
      <div>
      <img src="<?=$value['url']?>" width="66" height="66" border="0" id="side_bar_block_image_img" />
      <a href="<?php echo base_url("images/ajax_delete/".$value['id']);?>">X</a>
      </div>
<?php
    endforeach;
  }
?>
