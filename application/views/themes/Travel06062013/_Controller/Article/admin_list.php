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
      var liObj = $(this);
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
      $.post("'.base_url('admin/article/ajax_delete').'", $("#locationList").serialize(),
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

  <script type="text/javascript">
    $(document).ready(function() {

      $("#display").live("click", function(){



        var url = "<?php echo base_url("admin/article/setdisplay");?>";
        var status = $(this).attr("status");
        var id = $(this).attr("idval");
        var name = $(this).attr("idname");

        //alert(name);
        //Check status
        if(status == "show"){
          //$("[attr_name=value]")
          //$("[data-fundId="+$(this).data('fundId')+"]").hide();

          $("[idname="+name+"]").hide();
          $("[idname=display_hide_"+id+"]").show();
          status = 0;
          //$(".diplay_show").hide();
          //$(".diplay_hide").show();
        }else{
          $("[idname="+name+"]").hide();
          $("[idname=display_show_"+id+"]").show();
          status = 1;
        }


        //Send data
        var data =  { id: id, display: status };
        $.ajax({
            type: 'POST',
            url: url,
            data: data
          });
        });


    });
  </script>

<div class="container_12">
<section class="similar_hotels grid_12">

    <h2 class="section_heading"><?php echo $this->lang->line("location_lang_location_list");?></h2>
    <div class="topHolder bottom-shadow">
      <span class="GM1BAGKBGJB">
      <button class="blogg-button" tabindex="0" id="btnSelect"><?php echo $this->lang->line("global_lang_select_all");?></button>
      </span>
      <span class="GM1BAGKBGJB">
      <button class="blogg-button blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/article/create");?>'><?php echo $this->lang->line("location_lang_publish");?></button>
      <button class="blogg-button blogg-collapse-left blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/article/create");?>'><?php echo $this->lang->line("location_lang_unpublish");?></button>
      <button class="blogg-button blogg-collapse-left" tabindex="0" href='#' id="btnDelete">
        <img class="blogg-button-image" alt="" src="<?php echo $imagepath."/delete.png" ?>" />
      </button>
      </span>
      <span class="GM1BAGKBNIB">
        <a class="blogg-button blogg-primary" tabindex="0" href='<?php echo base_url("admin/article/create");?>'><?php echo $this->lang->line("location_lang_add_post");?></a>
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
    <?php echo form_open('','name="locationList" id="locationList"'); ?>
    <ul id="location-list">
    <?php

      if($article):
        foreach ($article as $key => $value) :
      ?>
        <li>
          <span>

            <?php
            if($value['display'] == 0){
            ?>
              <img src="<?php echo $themepath.'/images/enable.png';?>"
                  valign="top"
                  id="display"
                  class="display_show"
                  status="show"
                  idval="<?php echo $value['id'];?>"
                  idname="display_show_<?php echo $value['id'];?>"
                  style="display:none;"
              >
              <img src="<?php echo $themepath.'/images/disable.png';?>"
                  valign="top"
                  id="display"
                  class="display_hide"
                  status="hide"
                  idval="<?php echo $value['id'];?>"
                  idname="display_hide_<?php echo $value['id'];?>"
              >
            <?php
            }else if($value['display'] == 1){
            ?>
              <img src="<?php echo $themepath.'/images/enable.png';?>"
                  valign="top"
                  id="display"
                  class="display_show"
                  status="show"
                  idval="<?php echo $value['id'];?>"
                  idname="display_show_<?php echo $value['id'];?>"
              >
              <img src="<?php echo $themepath.'/images/disable.png';?>"
                  valign="top"
                  id="display"
                  class="display_hide"
                  status="hide"
                  idval="<?php echo $value['id'];?>"
                  idname="display_hide_<?php echo $value['id'];?>"
                  style="display:none;"
              >
            <?php
            }
            ?>
            <input type="checkbox" name="<?php echo $value["id"];?>" id="location_<?php echo $value["id"];?>">
          </span>
          <div>
            <span>

            <h3><a href="<?php echo base_url($this->lang->line("url_lang_location")."/$value[url]-$value[id]");?>" target="_blank"><?php echo $value["title"];?></a></h3>
            </span>
            <span class="description"><?php echo trim(substr(strip_tags($value["body"]),0,100));?></span>

            <span id="location-list-control">
              <a href="<?php echo base_url("admin/article/create/$value[id]");?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> |
              <a href="<?php echo base_url("admin/article/delete/$value[id]");?>" onclick="return confirm('Are you sure you want to delete?')">
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