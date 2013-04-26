
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/group.css">');?>
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
<div class="container_12" style="background-color:#FFF;">

<h2 class="section_heading" style="margin-bottom:10px;font-size:24px;">Group</h2>
<?php
  $get = $this->input->get();

  if(!empty($get)){
    if($get["error"]==01){
      echo "<h2 class=\"error_dialog\">".$this->lang->line("tag_lang_error_01")."</h2>";
    }else if($get["error"]==02){
      echo "<h2 class=\"error_dialog\">".$this->lang->line("tag_lang_error_02")."</h2>";
    }
  }

?>
<section class="similar_hotels grid_6">

  <h2 class="section_heading">Add Group</h2>
    <?php echo form_open(base_url("admin/group/create"),'name="tagTypeForm" id="tagTypeForm"'); ?>
    <input name="name" id="name" type="hidden" value="admin/group" size="40" aria-required="true">
      <div class="form-field">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" value="" size="40" aria-required="true">
      </div>
      <div class="form-field">
        <label for="level">Level</label>
        <input name="level" id="level" type="text" value="" size="40" aria-required="true">
      </div>
      <div class="form-field">
      <input type="submit" name="submit" id="submit" class="button button-primary" value="Submit">
      </div>
    <?php echo form_close(); ?>
</section>
<section class="similar_hotels grid_6">
    <h2 class="section_heading">Group list</h2>
    <?php echo form_open('','name="tagTypeList" id="tagTypeList"'); ?>
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
              <a href="<?php echo base_url("admin/group/create/$value[id]");?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> |
              <a href="<?php echo base_url("admin/group/delete/$value[id]");?>" onclick="return confirm('Are you sure you want to delete?')">
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
    <?php echo form_close(); ?>
  </section>

</div>