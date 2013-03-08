<?php
  if(!empty($tours["filter"]["thirdtag"])){
?>
  <form class="search_thirdtag">
  <?php
    foreach ($tours["filter"]["thirdtag"] as $key => $value) {
  ?>
      <span class="btn">
        <?php echo $value['name'];?>
        <input type="checkbox" class="hide" name="example1[]" value="<?php echo $value['tag_id'];?>">
      </span>
  <?php                   
    }
  ?>
  </form>

<?php
  }else{
    echo "Not data";
  }
?>  