<?php
      //print_r($hotel); exit;
?>
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


  <!-- Search selection -->
  <!-- script src="http://code.jquery.com/jquery-1.8.3.js"></script -->
  <script type="text/javascript">
    $(document).ready(function() {

      $("#display").live("click", function(){



        var url = "hotel/setdisplay";
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


<div class="container_12">
<section class="similar_hotels grid_12">

    <h2 class="section_heading">Hotel List</h2>  
    <div class="topHolder bottom-shadow">
      <span class="GM1BAGKBGJB">
      <button class="blogg-button" tabindex="0" id="btnSelect"><?php echo $this->lang->line("global_lang_select_all");?></button>
      </span>
      <span class="GM1BAGKBGJB">
<!--
      <button class="blogg-button blogg-menu-button blogg-collapse-right" aria-haspopup="true" title="ติดป้ายกำกับโพสต์ที่เลือก" tabindex="0">
        <span class="blogg-menu-button-content">
          <img class="blogg-button-image" alt="ติดป้ายกำกับโพสต์ที่เลือก" src="http://www.yasnaratraining.com/wp-content/themes/yas/images/tag-icon.jpg">
        </span>
        <span class="blogg-disclosureindicator">
        </span>

<div style="position: absolute; overflow-x: visible; overflow-y: visible; left: 281px; top: 185px; visibility: visible; " class="blogg-menu-popup"><div class="popupContent"><div><div tabindex="0"><input type="text" tabindex="-1" role="presentation" style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; "></div> <div tabindex="0" class="GFUQPS5BEGB"><input type="text" tabindex="-1" role="presentation" style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; "><div><div class="GFUQPS5BCGB"><div tabindex="0" role="listbox" style="outline-style: none; outline-width: initial; outline-color: initial; "><input type="text" tabindex="-1" role="presentation" style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; " aria-hidden="true"><div><div value="__new__" class="GFUQPS5BODB" role="option" id="gwt-uid-935">ป้ายกำกับใหม่...
</div><div class="GFUQPS5BAEB" role="presentation" id="gwt-uid-936"></div><div value="ของกินภูเก็ต" class="GFUQPS5BODB" role="option" id="gwt-uid-937" title="เพิ่มหรือลบป้าย ของกินภูเก็ต">ของกินภูเก็ต</div><div value="ร้านอาหาร" class="GFUQPS5BODB" role="option" id="gwt-uid-938" title="เพิ่มหรือลบป้าย ร้านอาหาร">ร้านอาหาร</div><div value="หน้าแรก" class="GFUQPS5BODB" role="option" id="gwt-uid-939" title="เพิ่มหรือลบป้าย หน้าแรก">หน้าแรก</div><div value="อาหารภูเก็ต" class="GFUQPS5BODB" role="option" id="gwt-uid-940" title="เพิ่มหรือลบป้าย อาหารภูเก็ต">อาหารภูเก็ต</div><div value="เฉาก๊วย" class="GFUQPS5BODB" role="option" id="gwt-uid-941" title="เพิ่มหรือลบป้าย เฉาก๊วย">เฉาก๊วย</div></div></div></div></div></div> <div tabindex="0"><input type="text" tabindex="-1" role="presentation" style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; "></div></div></div></div>
-->


      <!-- Tag Menu -->
      <button id="tag_button" class="blogg-button blogg-menu-button blogg-collapse-right" aria-haspopup="true" title="ติดป้ายกำกับโพสต์ที่เลือก" tabindex="0">
        <span class="blogg-menu-button-content">
          <img class="blogg-button-image" alt="ติดป้ายกำกับโพสต์ที่เลือก" src="http://www.yasnaratraining.com/wp-content/themes/yas/images/tag-icon.jpg">
        </span>
        <span class="blogg-disclosureindicator">
        </span>
      </button>

      <script>
        $(document).ready( function(){

          var numclick = 1;
          $("#tag_button").click( function(){
            //alert("Fed ped");

            if(numclick%2 == 0){
              $("#tag_list").css("display", "none");              
            }else{
              $("#tag_list").css("display", "block");              
            }

            numclick++;
          });
        });
      </script>


<!-- Tag list -->
<div id="tag_list" style="position: absolute; overflow-x: visible; overflow-y: visible; left: 310px; top: 385px; display:none; " 
class="blogg-menu-popup">
  <div class="popupContent">
  <div> 
    <div tabindex="0" class="GFUQPS5BEGB">
      <input type="text" tabindex="-1" role="presentation" 
      style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; border-bottom: solid 1px #ddd;">
    <div>
      <div class="GFUQPS5BCGB" 
            style="overflow-y: auto; ; background:white; border:1px solid #ddd; padding: 15px;height: 120px;">
        <div tabindex="0" role="listbox" 
              style="outline-style: none; outline-width: initial; outline-color: initial; " 
              aria-activedescendant="gwt-uid-935">
          <input type="text" tabindex="-1" role="presentation" 
        style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; " 
        aria-hidden="true">
          <style type="text/css">
            #tags:hover {
              color:#fff;
              background: #FFA951;
              cursor:pointer; 
            }
          </style>
          <div>


            <script>
            function addNewTag(){
              var x;

              var name=prompt("ป้อนป้ายกำกับใหม่","");

              if (name!=null){

                alert(name);
              //x="Hello " + name + "! How are you today?";
              //document.getElementById("demo").innerHTML=x;
              }
            }
            </script>

            <div id="tags" value="__new__" class="GFUQPS5BODB selected" role="option" id="gwt-uid-935" 
            style="border-bottom:1px solid #ccc;"
            onclick="addNewTag()"
            >
              ป้ายกำกับใหม่...
            </div>
            <div id="tags"
                 value="ของกินภูเก็ต" 
                 class="GFUQPS5BODB" 
                 role="option" 
                 id="gwt-uid-937" 
                 title="เพิ่มหรือลบป้าย ของกินภูเก็ต"
            >
              ของกินภูเก็ต
          </div>
            <div id="tags" value="ร้านอาหาร" class="GFUQPS5BODB" role="option" id="gwt-uid-938" title="เพิ่มหรือลบป้าย ร้านอาหาร">ร้านอาหาร</div>
            <div id="tags" value="หน้าแรก" class="GFUQPS5BODB" role="option" id="gwt-uid-939" title="เพิ่มหรือลบป้าย หน้าแรก">หน้าแรก</div>
            <div id="tags" value="อาหารภูเก็ต" class="GFUQPS5BODB" role="option" id="gwt-uid-940" title="เพิ่มหรือลบป้าย อาหารภูเก็ต">อาหารภูเก็ต</div>
            <div id="tags" value="เฉาก๊วย" class="GFUQPS5BODB" role="option" id="gwt-uid-941" title="เพิ่มหรือลบป้าย เฉาก๊วย">เฉาก๊วย</div>
          </div>
      </div>
    </div>
  </div>
</div> 
<div tabindex="0">
  <input type="text" tabindex="-1" role="presentation" 
  style="opacity: 0; height: 1px; width: 1px; z-index: -1; overflow-x: hidden; overflow-y: hidden; position: absolute; ">
</div>
</div>
</div>
</div>          




      <button class="blogg-button blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/hotel/create");?>'>
        <?php echo $this->lang->line("location_lang_publish");?>
      </button>
    
      <button class="blogg-button blogg-collapse-left blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/hotel/create");?>'>
        <?php echo $this->lang->line("location_lang_unpublish");?>
      </button>
      <button class="blogg-button blogg-collapse-left" tabindex="0" href='#' id="btnDelete">
        <img class="blogg-button-image" alt="" src="<?php echo $imagepath."/delete.png" ?>" />
      </button>
      </span>
      <span class="GM1BAGKBNIB">
        <a class="blogg-button blogg-primary" tabindex="0" href='<?php echo base_url("admin/hotel/create");?>'>
          <?php echo $this->lang->line("location_lang_add_post");?>
        </a>
      </span>
      <!--
      <div class="GM1BAGKBG5B">
        <div>
          <span class="GM1BAGKBD5B"><?php //echo $start_offset;?>-<?php //echo $end_offset;?> จาก <?php //echo $total_rows;?></span>
            <?php
              //echo $this->pagination->create_links();
            ?>
        </div>
      </div>
    -->
    </div>
    <?php //echo form_open('','name="locationList" id="locationList"'); ?>
    <ul id="location-list">
    <?php
      if(!empty($hotel)):
        $count = 0;
        foreach ($hotel as $key => $value) :
      ?>
        <li>
          <span>

            <?php 
            if($value['hotel']->display == 0){
            ?>
              <img src="<?php echo base_url('themes/Travel/images/enable.png');?>" 
                  valign="top" 
                  id="display" 
                  class="display_show"
                  status="show" 
                  idval="<?php echo $value['hotel']->id;?>"
                  idname="display_show_<?php echo $value['hotel']->id;?>"
                  style="display:none;"
              >
              <img src="<?php echo base_url('themes/Travel/images/disable.png');?>" 
                  valign="top" 
                  id="display"
                  class="display_hide" 
                  status="hide" 
                  idval="<?php echo $value['hotel']->id;?>"
                  idname="display_hide_<?php echo $value['hotel']->id;?>"
              >
            <?php 
            }else if($value['hotel']->display == 1){
            ?>
              <img src="<?php echo base_url('themes/Travel/images/enable.png');?>" 
                  valign="top" 
                  id="display" 
                  class="display_show"
                  status="show" 
                  idval="<?php echo $value['hotel']->id;?>"
                  idname="display_show_<?php echo $value['hotel']->id;?>"
              >
              <img src="<?php echo base_url('themes/Travel/images/disable.png');?>" 
                  valign="top" 
                  id="display"
                  class="display_hide" 
                  status="hide" 
                  idval="<?php echo $value['hotel']->id;?>"
                  idname="display_hide_<?php echo $value['hotel']->id;?>"
                  style="display:none;"
              >
            <?php 
            }
            ?>
            <input type="checkbox" name="<?php echo $value['hotel']->id;?>" id="hotel_<?php echo $value['hotel']->id;?>">
          </span>
          <div>
            <span>  
            <h3>
              <a href="<?php echo base_url('hotel/'.$value['hotel']->url.'-'.$value['hotel']->id);?>" target="_blank">
                <?php echo $value['hotel']->name;?>
              </a>                
                &nbsp;&nbsp;
                <?php
                //print_r($value['tag']); exit;
                  if(!empty($value['tag'])){
                    $countTag = count($value['tag']);
                    $count = 1;
                    foreach ($value['tag'] as $keyTag => $valueTag) {
                ?>
                    <font color="#FFA951">
                      <a href="<?php echo base_url('admin/hotel/'.$valueTag->tag_name);?>" style="color:#FFA951;">
                        <i><u>
                          <?php echo $valueTag->tag_name; ?>
                        </u></i>
                      </a>
                    </font>
                <?php  
                      if($countTag != $count){
                        echo ",&nbsp;";
                      } 
                      $count++;
                    }                                  
                  }
                ?>
            </h3>
            </span>            
            <span id="location-list-control">
              <a href="<?php echo base_url('hotel/'.$value['hotel']->url.'-'.$value['hotel']->id);?>" target="_blank">
               view
              </a> | 
              <a href="<?php echo base_url('admin/hotel/create/'.$value['hotel']->id);?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> |
              <a href="<?php echo base_url('admin/hotel/delete/'.$value['hotel']->id);?>"  onclick="return confirm('Are you sure you want to delete?')">
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