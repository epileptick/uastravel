<?php
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/tag.css">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');


PageUtil::addVar("javascript",'<script type="text/javascript">
$(document).ready(function() {
  $("li").hover(
    function () {
      console.log($(this).find("span.tag-list-control").addClass("display-block"));
      $(this).find("span.tag-list-control").addClass("display-block");
    },
    function () {
      $(this).find("span.tag-list-control").removeClass("display-block");
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

  <script type="text/javascript">
    $(document).ready(function() {

      $("#display").live("click", function(){

        var url = "location/setdisplay";
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
          status = "hide";
          //$(".diplay_show").hide();
          //$(".diplay_hide").show();
        }else{
          $("[idname="+name+"]").hide();
          $("[idname=display_show_"+id+"]").show();
          status = "show";
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

<div class="container_12" style="background-color:#FFF;">

<h2 class="section_heading" style="margin-bottom:10px;font-size:24px;"><?php echo $this->lang->line("tag_lang_tag_control");?></h2>  
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

  <h2 class="section_heading"><?php echo $this->lang->line("tag_lang_add_type");?></h2>  
    <?php echo form_open(base_url("admin/type/create"),'name="tagTypeForm" id="tagTypeForm"'); ?>
      <div class="form-field form-required form-invalid">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" value="" size="40" aria-required="true">
      </div>
      <div class="form-field">
        <label for="description">Description</label>
        <input name="description" id="description" type="text" value="" size="40">
      </div>
      <div class="form-field">
        <label for="url">URL</label>
        <input name="url" id="url" type="text" value="" size="40">
      </div>
      
      <div class="form-field">
        <label for="parent_id">Parent</label>
        <select name="parent_id" id="parent_id" class="postform">
          <option value="0">None</option>
          <?php
            if($typeData):
              foreach ($typeData as $typeKey => $typeValue) :
                if($typeValue["parent_id"] == 0):
          ?>
          <option value="<?php echo $typeValue['id'];?>"><?php echo $typeValue['name'];?></option>
          <?php
                endif;
              endforeach;
            endif;
          ?>
        </select>
            
      </div>
      
      <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add New Category"></p>
    <?php echo form_close(); ?>
</section>
<section class="similar_hotels grid_6">
    <h2 class="section_heading"><?php echo $this->lang->line("tag_lang_tag_type_list");?></h2>  
    <div class="topHolder bottom-shadow">
      <span class="GM1BAGKBGJB">
      <button class="blogg-button" tabindex="0" id="btnSelect"><?php echo $this->lang->line("global_lang_select_all");?></button>
      </span>
      <span class="GM1BAGKBGJB">
      <button class="blogg-button blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/location/create");?>'><?php echo $this->lang->line("global_lang_publish");?></button>
      <button class="blogg-button blogg-collapse-left blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/location/create");?>'><?php echo $this->lang->line("global_lang_unpublish");?></button>
      <button class="blogg-button blogg-collapse-left" tabindex="0" href='#' id="btnDelete">
        <img class="blogg-button-image" alt="" src="<?php echo $imagepath."/delete.png" ?>" />
      </button>
      </span>
      <span class="GM1BAGKBNIB">
        <a class="blogg-button blogg-primary" tabindex="0" href='<?php echo base_url("admin/location/create");?>'><?php echo $this->lang->line("tag_lang_add_type");?></a>
      </span>
    </div>
    <?php echo form_open('','name="tagTypeList" id="tagTypeList"'); ?>
    <ul id="location-list">
    <?php
      
      if($typeData):
        foreach ($typeData as $typeKey => $typeValue) :
        if($typeValue["parent_id"] == 0):
      ?>
        <li>
          <span>

            <?php 
            
            if($typeValue['status'] == 0){
            ?>
              <img src="<?php echo base_url('themes/Travel/images/enable.png');?>" 
                  valign="top" 
                  id="display" 
                  class="display_show"
                  status="show" 
                  idval="<?php echo $typeValue['id'];?>"
                  idname="display_show_<?php echo $typeValue['id'];?>"
                  style="display:none;"
              >
              <img src="<?php echo base_url('themes/Travel/images/disable.png');?>" 
                  valign="top" 
                  id="display"
                  class="display_hide" 
                  status="hide" 
                  idval="<?php echo $typeValue['id'];?>"
                  idname="display_hide_<?php echo $typeValue['id'];?>"
              >
            <?php 
            }else if($typeValue['status'] == 1){
            ?>
              <img src="<?php echo base_url('themes/Travel/images/enable.png');?>" 
                  valign="top" 
                  id="display" 
                  class="display_show"
                  status="show" 
                  idval="<?php echo $typeValue['id'];?>"
                  idname="display_show_<?php echo $typeValue['id'];?>"
              >
              <img src="<?php echo base_url('themes/Travel/images/disable.png');?>" 
                  valign="top" 
                  id="display"
                  class="display_hide" 
                  status="hide" 
                  idval="<?php echo $typeValue['id'];?>"
                  idname="display_hide_<?php echo $typeValue['id'];?>"
                  style="display:none;"
              >
            <?php 
            }
            
            ?>
            <input type="checkbox" name="<?php echo $typeValue["id"];?>" id="location_<?php echo $typeValue["id"];?>">
          </span>
          <div>
            <span>  
            <h3><a href="<?php echo base_url("admin/type/create/$typeValue[id]");?>" target="_blank"><?php echo $typeValue["name"];?></a></h3>
            </span>
            
            
            <span class="tag-list-control">               
              <a href="<?php echo base_url("admin/type/create/$typeValue[id]");?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> | 

              <a href="<?php echo base_url("admin/type/delete/$typeValue[id]");?>" onclick="return confirm('Are you sure you want to delete?')">
                <?php echo $this->lang->line("global_lang_delete");?>
              </a>               
            </span>
          </div>
          
        </li>
      <?php
          unset($typeData[$typeKey]);
          endif;
          foreach($typeData AS $typeKey2=>$typeValue2):
            if($typeValue["id"] == $typeValue2["parent_id"]):
          ?>
          <li>
          <span>

            <?php 
            
            if($typeValue2['status'] == 0){
            ?>
              <img src="<?php echo base_url('themes/Travel/images/enable.png');?>" 
                  valign="top" 
                  id="display" 
                  class="display_show"
                  status="show" 
                  idval="<?php echo $typeValue2['id'];?>"
                  idname="display_show_<?php echo $typeValue2['id'];?>"
                  style="display:none;"
              >
              <img src="<?php echo base_url('themes/Travel/images/disable.png');?>" 
                  valign="top" 
                  id="display"
                  class="display_hide" 
                  status="hide" 
                  idval="<?php echo $typeValue2['id'];?>"
                  idname="display_hide_<?php echo $typeValue2['id'];?>"
              >
            <?php 
            }else if($typeValue2['status'] == 1){
            ?>
              <img src="<?php echo base_url('themes/Travel/images/enable.png');?>" 
                  valign="top" 
                  id="display" 
                  class="display_show"
                  status="show" 
                  idval="<?php echo $typeValue2['id'];?>"
                  idname="display_show_<?php echo $typeValue2['id'];?>"
              >
              <img src="<?php echo base_url('themes/Travel/images/disable.png');?>" 
                  valign="top" 
                  id="display"
                  class="display_hide" 
                  status="hide" 
                  idval="<?php echo $typeValue2['id'];?>"
                  idname="display_hide_<?php echo $typeValue2['id'];?>"
                  style="display:none;"
              >
            <?php 
            }
            
            ?>
            <input type="checkbox" name="<?php echo $typeValue2["id"];?>" id="location_<?php echo $typeValue2["id"];?>">
          </span>
          <div>
            <span>  
            <h3><a href="<?php echo base_url("admin/type/create/$typeValue2[id]");?>" target="_blank"> — <?php echo $typeValue2["name"];?></a></h3>
            </span>
            
            
            <span class="tag-list-control">               
              <a href="<?php echo base_url("admin/type/create/$typeValue2[id]");?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> | 

              <a href="<?php echo base_url("admin/type/delete/$typeValue2[id]");?>" onclick="return confirm('Are you sure you want to delete?')">
                <?php echo $this->lang->line("global_lang_delete");?>
              </a>               
            </span>
          </div>
          
        </li>
          <?php
            endif;
          endforeach;
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