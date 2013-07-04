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
        <td>
          <span>Ops</span>
        </td>
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
                <span>(<?php echo $value["used"]; ?>) X</span>
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
</div>