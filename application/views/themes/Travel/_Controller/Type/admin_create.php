<?php
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/tag.css">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/type.css">');
?>
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
<section class="similar_hotels grid_12">

  <h2 class="section_heading"><?php echo $this->lang->line("tag_lang_add_type");?></h2>  
    <?php echo form_open(base_url("admin/type/create"),'name="tagTypeForm" id="tagTypeForm"'); ?>
      <input name="id" id="id" type="hidden" value="<?=$typeData[0]["id"]?>">
      <div class="form-field form-required form-invalid">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" value="<?=$typeData[0]["name"]?>" size="40" aria-required="true">
      </div>
      <div class="form-field">
        <label for="description">Description</label>
        <input name="description" id="description" type="text" value="<?=$typeData[0]["description"]?>" size="40">
      </div>
      <div class="form-field">
        <label for="parent_id">Parent</label>
        <select name="parent_id" id="parent_id" class="postform">
          <option value="0">None</option>
          <?php
            if($allTypeData):
              foreach ($allTypeData as $typeKey => $typeValue) :
                if($typeValue["parent_id"] == 0):
                  if($typeData[0]["parent_id"] == $typeValue["id"]):
                  ?>
                    <option value="<?php echo $typeValue['id'];?>" selected><?php echo $typeValue['name'];?></option>
                  <?php
                  else:
                  ?>
                    <option value="<?php echo $typeValue['id'];?>"><?php echo $typeValue['name'];?></option>
                  <?php
                  endif;
                endif;
              endforeach;
            endif;
          ?>
        </select>
      </div>
      <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add New Category"></p>
</section>
<section class="similar_hotels grid_12">
  <h2 class="section_heading"><?php echo $this->lang->line("tag_lang_tag_management");?></h2>
  <div id="ck-button">
<?php
  foreach($tagData AS $tagDataKey => $tagDataValue){
    $printed = 0;
    if(!empty($tagTypeData)){
      foreach($tagTypeData AS $tagTypeDataKey=>$tagTypeDataValue){
        if($tagTypeDataValue["tag_id"] == $tagDataValue["id"]){
          echo "<label>
                  <input name=\"tag[id][]\" type=\"checkbox\" value=\"$tagDataValue[id]\" checked><span>$tagDataValue[name]</span>
               </label>";
          $printed = 1;
          break;
        }
      }
    }
    
    if(!$printed){
      echo "<label>
                <input name=\"tag[id][]\" type=\"checkbox\" value=\"$tagDataValue[id]\"><span>$tagDataValue[name]</span>
             </label>";
    }
  }
?>
  </div>
</section>
<?php echo form_close(); ?>
</div>