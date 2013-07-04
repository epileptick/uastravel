<?php
  if($images){
    foreach($images AS $key=>$value):
?>
      <div class="image_list">
      <a href="<?php echo base_url("images/ajax_delete/".$value['id']);?>">X</a>
      <img src="<?=$value['url']?>" width="66" height="66" border="0" id="side_bar_block_image_img" />
      </div>
<?php
    endforeach;
  }
?>