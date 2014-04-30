<?php /*PageUtil::addVar("stylesheet",'<link rel="stylesheet" href="'.Util::ThemePath().'/style/form.css">');

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

*/
?>
<?php PageUtil::addVar("stylesheet",'<link rel="stylesheet" media="all" type="text/css"  href="'.base_url('themes/uastravel2014/css/admin_list.css').'">'); ?>


  <!-- Search selection -->
  <!-- script src="http://code.jquery.com/jquery-1.8.3.js"></script -->
  <script type="text/javascript">
    $(document).ready(function() {

      $("#display").live("click", function(){



        var url = "tour/setdisplay";
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

<div class="allcontent">
<!--head-->
  <div class="col-md-12 margincol">
    <div class="box-sh">
      <span><?php echo $this->lang->line("location_lang_location_list");?></span>
    </div>
<!-- end head-->

<!-- head button -->
<div class="row margincol">
  <div class="col-md-5">
    <button class="blogg-button" tabindex="0" id="btnSelect"><?php echo $this->lang->line("global_lang_select_all");?></button>



<!-- -->
      <span class="GM1BAGKBGJB">


      <!-- Tag Menu -->
      <button id="tag_button" class="blogg-button blogg-menu-button blogg-collapse-right" aria-haspopup="true" title="ติดป้ายกำกับโพสต์ที่เลือก" tabindex="0">
        <span class="blogg-menu-button-content">
        <span class="glyphicon glyphicon-tag"></span> Star
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




      <button class="blogg-button blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/tour/create");?>'>
        <?php echo $this->lang->line("location_lang_publish");?>
      </button>

      <button class="blogg-button blogg-collapse-left blogg-collapse-right" tabindex="0" href='<?php echo base_url("admin/tour/create");?>'>
        <?php echo $this->lang->line("location_lang_unpublish");?>
      </button>
      <button class="blogg-button blogg-collapse-left" tabindex="0" href='#' id="btnDelete">
        <img class="blogg-button-image" alt="" src="<?php echo $themepath."/image/delete.png" ?>" />
      </button>
      </span>

<!-- -->






  </div>
  <div class="col-md-5 col-md-offset-2">

    <!-- new -->
      <div class="pull-left">
        <a class="blogg-button blogg-primary" tabindex="0" href='<?php echo base_url("admin/tour/create");?>'>
          <?php echo $this->lang->line("location_lang_add_post");?>
        </a>
      </div>

      <div class="pull-left">
        <div>
          <span class="GM1BAGKBD5B"><?php echo $start_offset;?>-<?php echo $end_offset;?> จาก <?php echo $total_rows;?></span>
            <?php
              echo $this->pagination->create_links();
            ?>
         </div>
       </div>
  </div>

  </div>
    <!-- -->

<!-- table  tour -->
    <div class="row">
      <div class="col-md-12">
        


      <!--new-->
      <?php
      if(!empty($tour)):
        $count = 0;
        foreach ($tour as $key => $value) :
      ?>
      <div class="tour">
        <!-- image check box -->

            <?php
            if($value['tour']["display"] == 0){
            ?>
              <img src="<?php echo $themepath.'/image/enable.png';?>"
                  valign="top"
                  id="display"
                  class="display_show"
                  status="show"
                  idval="<?php echo $value['tour']["tour_id"];?>"
                  idname="display_show_<?php echo $value['tour']["tour_id"];?>"
                  style="display:none;"
              >
              <img src="<?php echo $themepath.'/image/disable.png';?>"
                  valign="top"
                  id="display"
                  class="display_hide"
                  status="hide"
                  idval="<?php echo $value['tour']["tour_id"];?>"
                  idname="display_hide_<?php echo $value['tour']["tour_id"];?>"
              >
            <?php
            }else if($value['tour']["display"] == 1){
            ?>
              <img src="<?php echo $themepath.'/image/enable.png';?>"
                  valign="top"
                  id="display"
                  class="display_show"
                  status="show"
                  idval="<?php echo $value['tour']["tour_id"];?>"
                  idname="display_show_<?php echo $value['tour']["tour_id"];?>"
              >
              <img src="<?php echo $themepath.'/image/disable.png';?>"
                  valign="top"
                  id="display"
                  class="display_hide"
                  status="hide"
                  idval="<?php echo $value['tour']["tour_id"];?>"
                  idname="display_hide_<?php echo $value['tour']["tour_id"];?>"
                  style="display:none;"
              >
            <?php
            }
            ?>
            <input type="checkbox" name="<?php echo $value['tour']["tour_id"];?>" id="tour_<?php echo $value['tour']["tour_id"];?>" style="">
        <!-- end check box -->
        <!-- title tour -->

              <span>
              <a href="<?php echo base_url('tour/'.$value['tour']["url"].'-'.$value['tour']["tour_id"]);?>" target="_blank">
                <?php echo $value['tour']["name"];?>
              </a>

                <?php

                  if(!empty($value['tag'])){
                    $countTag = count($value['tag']);
                    $count = 1;
                    foreach ($value['tag'] as $keyTag => $valueTag) {
                ?>
                <?php
                      if($countTag != $count){
                        //echo ",&nbsp;";
                      }
                      $count++;
                    }
                  }
                ?>
            </span>
            <!-- end title tour -->
            <!-- view eite del -->
            <div class="pull-right">
              <span id="location-list-control">
              <a href="<?php echo base_url($this->lang->line("url_lang_tour").'/'.$value['tour']["url"].'-'.$value['tour']["tour_id"]);?>" target="_blank">
               view
              </a> |
              <a href="<?php echo base_url('admin/tour/create/'.$value['tour']["tour_id"]);?>">
                <?php echo $this->lang->line("global_lang_edit");?>
              </a> |
              <a href="<?php echo base_url('admin/tour/delete/'.$value['tour']["tour_id"]);?>"  onclick="return confirm('Are you sure you want to delete?')">
              <?php echo $this->lang->line("global_lang_delete");?>
              </a>
            </span>
          </div>
            <!-- End view eite del -->




        <!-- end tour -->

      </div>
    <?php  endforeach; endif; ?>
      <!--new-->



        
      </div>
    </div>

<!-- end table tour -->




<!-- end div allcontent-->
</div>





