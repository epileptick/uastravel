<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/tag.css">');?>
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');


PageUtil::addVar("javascript",'<script type="text/javascript">
$(document).ready(function() {
  $("li").hover(
    function () {
      $(this).find("#location-list-control").addClass("display-block");
    },
    function () {
      $(this).find("#location-list-control").removeClass("display-block");
    }
  );
  $("input:checkbox, li").click(
    function () {

      var checkBoxes = $(this).find("input:checkbox");
      checkBoxes.prop("checked", !checkBoxes.prop("checked"));
      if(checkBoxes.prop("checked")){
        $(this).addClass("highlight");
      }else{
        $(this).removeClass("highlight");
      }
    }
  );

  $("input:checkbox").click(
    function () {
      $(this).prop("checked", !$(this).prop("checked"));
    }
  );
  $("#btnSelect").click(
    function () {
      selectAll();
    }
  );
  $("#btnDelete").click(
    function () {
      $.post("'.base_url('admin/location/ajax_delete').'", $("#locationList").serialize(),
        function(data) {
          location.reload();
      });
    }
  );

});
function selectAll(){
    var checkBoxes = $("ul#location-list").find("input:checkbox");
    $("ul#location-list").prop("checkedall",!$("ul#location-list").prop("checkedall"));
    checkBoxes.prop("checked", $("ul#location-list").prop("checkedall"));

    if(!$("ul#location-list").prop("checkedall")){
      $("ul#location-list li").removeClass("highlight");
      $("#btnSelect").html("'.$this->lang->line("global_lang_select_all").'");
    }else{
      $("ul#location-list li").addClass("highlight");
      $("#btnSelect").html("'.$this->lang->line("global_lang_unselect_all").'");
    }

  }
</script>');


?>
<div class="container_12">
<section class="similar_hotels grid_12">
  <?php echo form_open(base_url("admin/tag/updatelang"),'name="tagList" id="tagList"'); ?>
    <h2 class="section_heading">User List</h2>
    <div class="topHolder bottom-shadow">

      <span class="GM1BAGKBNIB">
        <input class="blogg-button blogg-primary" tabindex="0" value="<?php echo $this->lang->line("global_lang_delete");?>" type="submit">
      </span>
      <span class="GM1BAGKBNIB">
        <button class="blogg-button" title="โพสต์เก่า" tabindex="0"><a href="<?php echo base_url("admin/tag/create")?>"><?php echo $this->lang->line("tag_lang_add");?></a></button>
      </span>


      <div class="GM1BAGKBG5B">
        <div>
          <span class="GM1BAGKBD5B"><?php echo $start_offset;?>-<?php echo $end_offset;?> จาก <?php echo $total_rows;?></span>
            <?php
              echo $this->pagination->create_links();
            ?>
         </div>
       </div>
    </div>

    <ul id="location-list">
    <?php

      if($user_list):
        foreach ($user_list as $key => $value) :
      ?>
        <li style="height: 20px;">
          <span>
            <input type="checkbox" name="<?php echo $value["id"];?>" id="location_<?php echo $value["id"];?>">
          </span>
          <div>
            <span>

            <h3><a href="" target="_blank"><?php echo $value["name"];?> (<?php echo $value["id"];?>)</a></h3>
            </span>

            <span id="location-list-control">
              <a href="<?php echo base_url("admin/user/create/$value[id]");?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> |
              <a href="<?php echo base_url("admin/user/delete/$value[id]");?>" onclick="return confirm('Are you sure you want to delete?')">
                <?php echo $this->lang->line("global_lang_delete");?>
              </a>
            </span>
          </div>

        </li>
      <?php
        endforeach;
      else:
      ?>
        <li>
          <span>Data not found</span>
        </li>
      <?php
      endif;
      ?>
    </ul>

    <div class="topHolder bottom-shadow">
      <span class="GM1BAGKBNIB">
        <input class="blogg-button blogg-primary" tabindex="0" value="<?php echo $this->lang->line("global_lang_delete");?>" type="submit">
      </span>

      <div class="GM1BAGKBG5B">
        <div>
          <span class="GM1BAGKBD5B"><?php echo $start_offset;?>-<?php echo $end_offset;?> จาก <?php echo $total_rows;?></span>
            <?php
              echo $this->pagination->create_links();
            ?>
         </div>
       </div>
    </div>
  </section>
  <?php echo form_close(); ?>
</div>