<?php

PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/tour/bootstrap/css/bootstrap.css">');
PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/tag.css">');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/tour/bootstrap/js/bootstrap.js"></script>');
PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/tour/bootstrap/js/application.js"></script>');
//PageUtil::addVar("javascript",'<script type="text/javascript" src="'.Util::ThemePath().'/tour/bootstrap/js/jquery.js"></script>');
//PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/tour/foundation/stylesheets/app.css">');
//PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/tour/foundation/javascripts/modernizr.foundation.js">');
PageUtil::addVar("javascript",'<script type="text/javascript">
$(document).ready(function() {
    
    $("label").each(function(index) {
      var checkBoxes = $(this).find("input:checkbox");
      if(checkBoxes.prop("checked")){
        $(this).addClass("btn-info");
      }else{
        $(this).removeClass("btn-info");
      }
    });

  
  $("label").click(
    function () {
      var checkBoxes = $(this).find("input:checkbox");
      checkBoxes.prop("checked", !checkBoxes.prop("checked"));
      if(checkBoxes.prop("checked")){
        $(this).addClass("btn-info");
      }else{
        $(this).removeClass("btn-info");
      }
    }
  );
  

  $("#btnSelect").click(
    function () {
      selectAll();
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
  <section class="span12">
    <h2 class="section_heading"><?php echo $this->lang->line("tag_lang_tag");?></h2>  
    <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                
                <li class="active"><a href="#lA" data-toggle="tab">Section 1</a></li>
                <li><a href="#lB" data-toggle="tab">Section 2</a></li>
                <li><a href="#lC" data-toggle="tab">Section 3</a></li>
                 
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="lA">
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox1" class="inlineCheckbox" value="option1" checked="checked"> TAG1sdfsdfds
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox2" class="inlineCheckbox" value="option2"> TAG2fsfdsdf
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3"> TAG3fefwewrwertwtw
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3" checked="checked"> TAG3fefwewrwertwtw
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3"> TAG3fefwewrwertwtw
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3"> TAG3fefwewrwertwtw
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3"> TAG3fefwewrwertwtw
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3" checked="checked"> TAG3fefwewrwertwtw
                  </label>
                  <label class="checkbox inline inlineLabel btn">
                    <input type="checkbox" id="inlineCheckbox3" class="inlineCheckbox" value="option3"> TAG3fefwewrwertwtw
                  </label>
                </div>
                <div class="tab-pane" id="lB">
                  <p>Howdy, I'm in Section B.</p>
                </div>
                <div class="tab-pane" id="lC">
                  <p>What up girl, this is Section C.</p>
                </div>
              </div>
            </div>
    
    
  </section>
</div>