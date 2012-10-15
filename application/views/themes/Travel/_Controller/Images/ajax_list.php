<?php
  if($images){
    foreach($images AS $key=>$value):
?>
      <img src="<?=$value['img_url']?>" width="66" height="66" border="0" id="side_bar_block_image_img" />
<?php
    endforeach;
  }
?>
