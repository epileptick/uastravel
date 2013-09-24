<?php
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/tag.css">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />');
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

  $(function() {

    $("a.delete").click(function() {
      if(!confirm("Are you sure you want to delete?")){
        return false;
      }
      var tag_id = $(this).attr("tag_id");
      var tr = this;
      var post = $.post("'.base_url("admin/tag/ajaxdelete").'", {tag_id:tag_id});
                  post.done(function(json) {
                    var data = jQuery.parseJSON(json);
                    if(data["code"] == 1){
                      $(tr).closest("tr").fadeOut("slow");
                    }else{
                      alert(data["message"]);
                    }
                  });
      return false;
    });

    var tips = $( ".validateTips" );

    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }

    $.extend($.ui.dialog.prototype.options, { 
      create: function() {
        var $this = $(this);

        // focus first button and bind enter to it
        $this.parent().find(".ui-dialog-buttonpane button:first").focus();
        $this.keypress(function(e) {
            if( e.keyCode == 13 ) {
                $this.parent().find(".ui-dialog-buttonpane button:first").click();
                return false;
            }
        });
      }
    });

    $("a.move").click(function() {
      var a = this;
      $("#dialog-form").dialog({
        autoOpen: true,
        height: 250,
        width: 350,
        modal: true,
        buttons: {
          "Submit": function() {
            var moveto = $("#moveto").val();
            var tag_id = $(a).attr("tag_id");
            if(moveto && tag_id){
              console.log($(a).attr("tag_id"));
              console.log($("#moveto").val());
              var post = $.post("'.base_url("admin/tag/move").'", {tag_id:tag_id,moveto:moveto});
              post.done(function(data) {
                console.log(data);
                $("#dialog-form").dialog("close");
                location.reload();
              });
            }else{
              alert("Incorrect value.");
              $(this).dialog("close");
            }
          },
          Cancel: function() {
            $(this).dialog("close");
            $("#moveto").val("");
            $("#tag_name").html("");
          },
        }
      });
      return false;
    });
  });
  </script>');


?>
<div class="container_12">
<section class="similar_hotels grid_12">
  <?php echo form_open(base_url("admin/tag/updatelang"),'name="tagList" id="tagList"'); ?>
    <h2 class="section_heading"><?php echo $this->lang->line("tag_lang_tag_list");?></h2>
    <div class="topHolder bottom-shadow">

      <span class="GM1BAGKBNIB">
        <input class="blogg-button blogg-primary" tabindex="0" value="<?php echo $this->lang->line("tag_lang_submit");?>" type="submit">
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

    <table width="100%">
    <?php

      if(!empty($tag)):
      ?>
      <tr>
        <th>
          ID
        </th>
        <?php
          foreach ($this->config->item("language_list") as $langListKey => $langListValue) :
        ?>
          <th>
            <?php echo $langListValue; ?> (<?php echo $langListKey; ?>)
          </th>
        <?php
          endforeach;
        ?>
        <th>
          <span>Total Used - T/L/H</span>
        </th>
        <th>
          <span>Ops</span>
        </th>
      </tr>
      <?php
        //var_dump($tag);exit;
        foreach ($tag as $key => $value) :
      ?>
        <tr>
          <td>
            <span><?php echo $value["tag_id"]; ?></span>
          </td>
          <?php
            foreach ($this->config->item("language_list") as $langListKey => $langListValue) {
              ?>
              <td>
                <input value="<?php echo $value[$langListKey]["name"]; ?>" name="tagData[<?php echo $value["tag_id"]; ?>][<?php echo $langListKey; ?>]">
              </td>
              <?php
            }
          ?>
          <td>
            <span><?php echo $value["used"]; ?> - <?php echo $value["tour_used"]; ?>/<?php echo $value["location_used"]; ?>/<?php echo $value["hotel_used"]; ?></span>
          </td>
          <td>
            <span><a href="#" tag_id="<?php echo $value["tag_id"]; ?>" class="move" target="_blank">Move</a> - <a href="#" target="_blank" tag_id="<?php echo $value["tag_id"]; ?>" class="delete">Delete</a></span>
          </td>
        </tr>
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
    </table>

    <div class="topHolder bottom-shadow">

      <span class="GM1BAGKBNIB">
        <input class="blogg-button blogg-primary" tabindex="0" value="<?php echo $this->lang->line("tag_lang_submit");?>" type="submit">
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

<div id="dialog-form" title="Move all post in this tag to another tag.">
<p class="validateTips">All form fields are required.</p>

<form>
<fieldset>
  <label for="moveto">Move To:
  <input type="text" name="moveto" id="moveto" class="text ui-widget-content ui-corner-all" /><span id="tag_name"></span>
  </label>
</fieldset>
</form>
<p>*มีโอกาศแค่ครั้งเดียวนะ คิดให้ดีๆ นะจ๊ะ</p>
</div>
</div>